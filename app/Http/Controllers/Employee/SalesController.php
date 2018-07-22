<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Masters\Customer;
use App\Models\Sales\Sale, App\Models\Sales\SaleItem;
use DB, Crypt, Helper, Validator, Redirect, Auth;
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
        	}else{
        		$customer_data['name'] 			= $request->name;
        		$customer_data['address'] 		= $request->address;
        		$customer_data['mobile_number'] = $request->mobile_number;

        		$customer = Customer::create($customer_data);

        		$data['customer_id'] = $customer->id;
        	}

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

            $brick_type_ids = $request->brick_type_ids;
            $unit_costs     = $request->unit_costs;
            $quantities     = $request->quantities;


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
                }
                
            }

            DB::commit();

            return Redirect::route('employee.receipt.view', Crypt::encrypt($sale->id));
        else:
            return Redirect::back()->with(['message' => 'You must select at least one item !', 'alert-class' => 'alert-danger']);
        endif;
    }


    public function viewReceipt($receipt_id = null) {
        $sale       = Sale::with('customers', 'employee')->whereId(Crypt::decrypt($receipt_id))->first();
  
        $sale_items = SaleItem::where('sale_id', Crypt::decrypt($receipt_id))->with('brick_type')->get();

        return view('employee.sales.receipt', compact('sale', 'sale_items'));
    }

    public function viewAllReceipts(Request $request) {
        $sales       = Sale::with('customers', 'employee')->whereStatus(1)->get();

        return view('employee.sales.view_all_receipt', compact('sales'));
    }
}
