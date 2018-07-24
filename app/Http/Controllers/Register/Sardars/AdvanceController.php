<?php

namespace App\Http\Controllers\Register\Sardars;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Sardar; 
use App\Models\Masters\Ledger; 
use App\Models\Accounting\SardarAdvance; 
use App\Models\Accounting\Voucher; 
use App\Models\Accounting\VoucherTransaction; 
use App\Helpers\VoucherHelper; 
use DB, Crypt, Helper, Validator, Redirect;

class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $navlink='2';
        $urls1 = 'admin.register.sardar.create';
        $urls2  =  'admin.register.sardar.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
        if($request->sardar_id) { 
            $where[] = array('sardars.id',  $request->sardar_id );
        }
        $sardars = DB::table('vouchers')
        ->join('voucher_transactions', 'vouchers.id', '=', 'voucher_transactions.voucher_id')
        ->join('sardar_advances', 'voucher_transactions.id', '=', 'sardar_advances.trans_id')
        ->join('ledgers', 'ledgers.id', '=', 'voucher_transactions.ledger_id')
        ->join('sardars', 'sardars.id', '=', 'sardar_advances.sardar_id')
        ->select('vouchers.id','vouchers.date', 'vouchers.remarks', 'ledgers.name as ledger_name', 'voucher_transactions.cr',  'voucher_transactions.dr', 'sardars.name as sardar_name')
        ->where('vouchers.status',1)->where('voucher_transactions.status',1)->where('sardar_advances.status',1)
        ->where($where)
        ->orderby('vouchers.date','desc')
        ->get();
        
        $sardar_list  = Helper::allSardars($list = true);
        return view('register.sardar.view', compact('sardars','sardar_list','request','navlink','urls1','urls2','link1','link2')); 
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navlink='1';
        $urls1 = 'admin.register.sardar.create';
        $urls2  =  'admin.register.sardar.index';
        $link1 = 'Add';
        $link2 = 'View';  
        
        $ledger  = Helper::allCashLedger($list = true); 
        $sardar  = Helper::allSardars($list = true); 
        return view("register.sardar.create", compact('sardar','ledger','navlink','urls1','urls2','link1','link2')); 
 
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
        $ledger = Ledger::where('register',1)->first();
        $message    = $class = '';
        $data       = $request->all();  
        $result = VoucherHelper::voucher(date('y-m-d', strtotime($data['date'])), 1, $data['remarks']);   
        if($result) 
        {
            $id = $result->id;
           $result = VoucherHelper::vouchertrans($id,  $data['ledger'], '0', $data['amount'] );  
            if($result) 
            {            
                $result = VoucherHelper::vouchertrans($id,  $ledger->id, $data['amount'], '0' ); 
                if($result) 
                {
                    $transid = $result->id; 
                    $val['trans_id'] =  $transid; 
                    $val['sardar_id']= $data['sardar_id']; 
                    if(SardarAdvance::create($val)) { //INSERT SARDAR ADVANCE TABLE
                        $class      .= 'alert-success';
                        $message    .= 'Sardar Advance Payment done successfully !';
                    }
                    else
                    {
                        $class      .= 'alert-danger';
                        $message    .= 'Unable store Sardar Advance Payment !';
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
        }  
        else
        {
            $class      .= 'alert-danger';
            $message    .= 'Unable store Voucher !';
            return Redirect::route('register.sardar.create')->with('message', $message)->with('class', $class ); 
        }
        DB::commit(); 
        return Redirect::route('admin.register.sardar.create')->with('message', $message)->with('class', $class );    
   
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
