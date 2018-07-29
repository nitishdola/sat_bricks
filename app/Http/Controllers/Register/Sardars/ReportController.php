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

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allsardars(request $request)
    {
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }
        $sardars = Sardar::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20); 
        return view('report.sardar.sardarlist', compact('sardars','request')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sardarpayment(request $request)
    { 
         $where = [];
        if($request->id) { 
            $where[] = array('sardars.id',  $request->id );
        }
        $sardars = Sardar::where('status','1')->where($where)->first() ;
        
        $payments = DB::table('vouchers')
        ->join('voucher_transactions', 'vouchers.id', '=', 'voucher_transactions.voucher_id')
        ->join('sardar_payments', 'vouchers.id', '=', 'sardar_payments.voucher_id')
        ->join('ledgers', 'ledgers.id', '=', 'voucher_transactions.ledger_id')
        ->join('sardars', 'sardars.id', '=', 'sardar_payments.sardar_id')
        
        ->select( 'vouchers.date','ledgers.name', 'vouchers.remarks',   DB::raw('SUM(voucher_transactions.cr) as cr') ,   DB::raw('SUM(voucher_transactions.dr) as dr')  ,   'sardars.name as sardar_name')
        ->where('vouchers.status',1)->where('voucher_transactions.status',1)->where('sardar_payments.status',1)
        ->where($where) 
        ->where('ledgers.cash_ledger','0')
        ->groupby( 'vouchers.date', 'vouchers.remarks','ledgers.name', 'sardars.name')
        ->orderby('vouchers.date','asc')
        ->get();
        
        $sardar_list  = Helper::allSardars($list = true);
        return view('report.sardar.sardarpayments', compact('payments','sardar_list','sardars')); 
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
