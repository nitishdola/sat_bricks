<?php

namespace App\Http\Controllers\Register\Sardars;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Sardar; 
use App\Models\Masters\Ledger; 
use App\Models\Accounting\SardarPayment; 
use App\Models\Accounting\Voucher; 
use App\Models\Accounting\VoucherTransaction; 
use App\Helpers\VoucherHelper; 
use DB, Crypt, Helper, Validator, Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id="";
        if($request->id) { 
            $id=$request->id;
        }
        $ledger  = Helper::allCashLedger($list = true); 
        $sardar  = Helper::allSardars($list = true);  
       
        $sardarsPay=  DB::select( 'SELECT a.id as sardar_id,  a.name as SardarName, (SELECT sum(CR-DR)
        from voucher_transactions c inner join sardar_payments b on b.voucher_id = c.voucher_id inner join 
       ledgers d on c.ledger_id= d.id where b.sardar_id=a.id and d.register=1) as advance_recovery , 
       (select sum((bricks_manufactured+bricks_lined_up)*unit_cost) - 
       IFNULL((SELECT sum(CR) from voucher_transactions c inner join sardar_payments b on b.voucher_id = 
       c.voucher_id inner join ledgers d on c.ledger_id= d.id where b.sardar_id=a.id and d.register=5),0) 
       from worker_productions w inner join workers wk on wk.id=w.worker_id where wk.sardar_id=a.id) 
       as total_amount from sardars a where a.id='.$id) ; 
        return view("register.sardarpayment.create", compact('sardar','ledger','','id')); 
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();  
        $advance_id = Ledger::where('register',1)->first();
        $payment_id = Ledger::where('register',5)->first(); 
        $message    = $class = '';
        $data       = $request->all();  
        $result = VoucherHelper::voucher(date('y-m-d', strtotime($data['date'])), 1, $data['remarks']);   
        if($result) 
        {
            $id = $result->id;
            $result = VoucherHelper::vouchertrans($id,  $data['ledger'], '0', $data['payment'] );  //insert bank ledger
            if($result) 
            {            
                $result = VoucherHelper::vouchertrans($id,  $advance_id->id,'0', $data['advance_recovery']  ); // insert advance recovery ledger
                if($result) 
                { 
                    $result = VoucherHelper::vouchertrans($id,  $payment_id->id, $data['total_amount'],'0'  ); // insert Payment amount
                    if($result) 
                    { 
                        $val['voucher_id'] =   $id ; 
                        $val['sardar_id']= $data['sardar_id']; 
                        if(SardarPayment::create($val)) { //INSERT SARDAR ADVANCE TABLE
                            $class      .= 'alert-success';
                            $message    .= 'Sardar Payment done successfully !';
                        }
                        else
                        {
                            $class      .= 'alert-danger';
                            $message    .= 'Unable store Sardar Payment !';
                        }
                    }
                }
                else
                {
                    $class      .= 'alert-danger';
                    $message    .= 'Unable store Voucher Transactions !';
                    return Redirect::route('admin.register.sardar.payment.create')->with('message', $message)->with('class', $class ); 
                }
            }
            else
            { 
                $class      .= 'alert-danger';
                $message    .= 'Unable store Voucher Transactions !';
                return Redirect::route('admin.register.sardar.payment.create')->with('message', $message)->with('class', $class ); 
            }
        }  
        else
        {
            $class      .= 'alert-danger';
            $message    .= 'Unable store Voucher !';
            return Redirect::route('admin.register.sardar.payment.create')->with('message', $message)->with('class', $class ); 
        }
        DB::commit(); 
        return Redirect::route('admin.register.sardar.payment.create')->with('message', $message)->with('class', $class );    
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
