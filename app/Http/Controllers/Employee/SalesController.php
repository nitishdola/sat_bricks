<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Masters\Customer;
use App\Models\Sales\Sale, App\Models\Sales\SaleItem;
use App\Models\Masters\Ledger; 
use App\Models\Accounting\Voucher; 
use App\Models\Accounting\VoucherTransaction; 
use App\Helpers\VoucherHelper; 
use DB, Crypt, Helper, Validator, Redirect, Auth ;
class SalesController extends Controller
{
    public function createReceipt() {
    	$customers = Helper::allCustomers($list = true);
    	$brick_types = Helper::allBrickTypes($list = true);
    	return view('employee.sales.create_receipt', compact('customers', 'brick_types'));
    }

    public function saveReceipt(Request $request) {
    //dd($request->all());
        if(count($request->brick_type_ids)):
        	$data = $request->all();
        	if(is_numeric($request->name)) {
        		$data['customer_id'] = $request->name;

                $customer = Customer::find($request->name);

                if($customer) {
                    $customer->address       = $request->address; 
                    $customer->mobile_number = $request->mobile_number;
                    $customer->save();
                }else{
                    return Redirect::back()->with(['message' =>'Invalid Customer', 'alert-class' => 'alert-danger']);
                }
        	}else{
        		$customer_data['name'] 			= $request->name;
        		$customer_data['address'] 		= $request->address;
        		$customer_data['mobile_number'] = $request->mobile_number; 
        		$customer = Customer::create($customer_data); 
        		$data['customer_id'] = $customer->id;
            } 
            //Voucher Entry 
            $ledger = Ledger::where('register',3)->first();  
            $result = VoucherHelper::voucher(date('Y-m-d'), 2, "Sales Entry"); 
            if($result) 
            { 
                $item_cost = 0; 
                $brick_type_ids = $request->brick_type_ids;
                $unit_costs     = $request->unit_costs;
                $quantities     = $request->quantities; 
                for($indx = 0; $indx < count($request->brick_type_ids); $indx++) {
                    if($brick_type_ids[$indx] != '') { 
                        $item_cost      += $quantities[$indx]*$unit_costs[$indx];
                    }
                }
                $id = $result->id; 
                $paid_amt= $data['amount_paid'];
                $bal =   $item_cost -  $paid_amt; 
                if($paid_amt > 0)
                { 
                    $result = VoucherHelper::vouchertrans($id, 2, $paid_amt, '0' ); // Add Amount to Cash in Hand / bank// ***************change later
                }
                if($bal > 0)
                { 
                    $result = VoucherHelper::vouchertrans($id, 1, $bal, '0' ); //INSERT VOUCHER TRANSACTION TABLE FIRST ENTRY
                }
                if($bal < 0)
                { 
                    $result = VoucherHelper::vouchertrans($id, 1, '0', $bal ); //INSERT VOUCHER TRANSACTION TABLE FIRST ENTRY
                } 
                if($result) 
                {             
                    $result = VoucherHelper::vouchertrans($id, $ledger->id, '0', $item_cost ); //INSERT VOUCHER TRANSACTION TABLE SECOND ENTRY
                    if($result) 
                    {
                        //voucher id
                        $data['voucher_id']  =   $id ;
                        //last invoice number
                        $last_invoice_data = Sale::whereStatus(1)->orderBy('invoice_number', 'DESC')->first();

                        $new_invoice_number = 1;

                        if($last_invoice_data) {
                            $new_invoice_number = ($last_invoice_data->invoice_number) + 1;
                        }

                        $data['invoice_number']  = $new_invoice_number; 
                        $data['invoice_date'] 	 = date('Y-m-d');

                        $data['employee_id']     = Auth::guard('employee')->user()->id;
                        DB::beginTransaction();

                        $validator = Validator::make($data, Sale::$rules);
                        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
 
                        $sale = Sale::create($data); 
                        for($indx = 0; $indx < count($request->brick_type_ids); $indx++) {
                            if($brick_type_ids[$indx] != '') {
                                $items_data = [];
                                $items_data['sale_id']          = $sale->id;
                                $items_data['brick_type_id']    = $brick_type_ids[$indx];
                                $items_data['unit_cost']        = $unit_costs[$indx];
                                $items_data['quantity']         = $quantities[$indx];
                                $items_data['total_cost']       = $quantities[$indx]*$unit_costs[$indx];


                                $ivalidator = Validator::make($items_data, SaleItem::$rules);
                                if ($ivalidator->fails()) return Redirect::back()->withErrors($ivalidator)->withInput();

                                SaleItem::create($items_data);
                                DB::commit();
                            }
                            
                        }
                    }
                    else
                    { 
                        $class      .= 'alert-danger';
                        $message    .= 'Unable store Voucher Transactions 3!';
                        return Redirect::route('register.sardar.create')->with('message', $message)->with('class', $class ); 
                    }
                }
                else
                { 
                    $class      .= 'alert-danger';
                    $message    .= 'Unable store Voucher Transactions 2!';
                    return Redirect::route('register.sardar.create')->with('message', $message)->with('class', $class ); 
                }
            }
            else
            {   
                $class      .= 'alert-danger';
                $message    .= 'Unable store Voucher Transactions 1!';
                return Redirect::route('register.sardar.create')->with('message', $message)->with('class', $class ); 
            }

            return Redirect::route('employee.receipt.view', Crypt::encrypt($sale->id));
        else:
            return Redirect::back()->with(['message' => 'You must select at least one item !', 'alert-class' => 'alert-danger']);
        endif;
    }


    public function viewReceipt($receipt_id = null) {
        $sale       = Sale::with('customers', 'employee')->whereId(Crypt::decrypt($receipt_id))->first();
  
        $sale_items = SaleItem::where('sale_id', Crypt::decrypt($receipt_id))->with('brick_type')->get();
      
        $voucher = Voucher::where('id', $sale->voucher_id )->first();
        $voucher_trans = VoucherTransaction::where('voucher_id', $sale->voucher_id )->where('ledger_id', 2 )->first();// ***************change later

        return view('employee.sales.receipt', compact('sale', 'sale_items', 'voucher_trans'));
    }

    public function viewAllReceipts(Request $request) {
        $sales       = Sale::with('customers', 'employee')->whereStatus(1)->get();

        return view('employee.sales.view_all_receipt', compact('sales'));
    }
}
