<?php

namespace App\Http\Controllers\Register\Sardars;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Sardar; 
use App\Models\Masters\Ledger; 
use App\Models\Accounting\SardarAdvance; 
use App\Models\Accounting\Voucher; 
use App\Models\Accounting\VoucherTransaction; 
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
        if($request->q) { 
            $where[] = array('sardars.name', 'LIKE', trim($request->q).'%');
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
        
        return view('register.sardar.view', compact('sardars','request','navlink','urls1','urls2','link1','link2')); 
 
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
        $voucher['date'] =  date('y-m-d', strtotime($data['date'])); 
        $voucher['voucher_type']=1;
        $voucher['remarks'] = $data['remarks'];

        $last_voucher_data = Voucher::whereStatus(1)->orderBy('voucher_number', 'DESC')->first();

        $new_voucher_number = 1;

        if($last_voucher_data) {
            $new_voucher_number = ($last_voucher_data->voucher_number) + 1;
        }

        $voucher['voucher_number']  = $new_voucher_number; 
        $validator = Validator::make($data, Voucher::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        $result = Voucher::create($voucher); //INSERT VOUCHER TABLE
        if($result) 
        {
            $id = $result->id;
            $val['voucher_id'] =  $id; 
            $val['ledger_id']= $data['ledger'];
            $val['cr'] = 0; 
            $val['dr'] = $data['amount']; 
            $result = VoucherTransaction::create($val); //INSERT VOUCHER TRANSACTION TABLE FIRST ENTRY
            if($result) 
            {            
                $val['voucher_id'] =  $id; 
                $val['ledger_id']= $ledger->id;
                $val['cr'] = $data['amount'];
                $val['dr'] = 0; 
                $result = VoucherTransaction::create($val); //INSERT VOUCHER TRANSACTION TABLE SECOND ENTRY
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
