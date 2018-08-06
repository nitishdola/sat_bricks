<?php

namespace App\Http\Controllers\Ledger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Register; 
use App\Models\Masters\Ledger; 
use App\Models\Masters\AccountsHead; 
use DB, Crypt, Helper, Validator, Redirect;

class LedgersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $navlink='2';
        $urls1 = 'admin.ledger.create';
        $urls2  =  'admin.ledger.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }
        $ledger = Ledger::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20); 
        
        return view('master.ledger.view', compact('ledger','request','navlink','urls1','urls2','link1','link2')); 
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navlink='1';
        $urls1 = 'admin.ledger.create';
        $urls2  =  'admin.ledger.index';
        $link1 = 'Add';
        $link2 = 'View';  

        $register   = Helper::allRegisters($list = true);

        $accountheads   = Helper::allAccountHeads($list = true);
        return view("master.ledger.create", compact('register', 'accountheads','navlink','urls1','urls2','link1','link2')); 
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message    = $class = '';
        $data       = $request->all(); 
        $data['head_id'] = 1;
        if($request->input('register')=="")
        {
            $data['register']  = 0 ;  
        }
        else
        {
            $data['register']  =  $request->input('register'); 
        } 
        if($request->input('cash_ledger')=="on")
        {
            $data['cash_ledger']  = 1 ;  
        }
        else
        {
            $data['cash_ledger']  = 0 ;  
        }

        $validator = Validator::make($data, Ledger::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
       
        
        if(Ledger::create($data)) {
            $class      .= 'alert-success';
            $message    .= 'Ledger added successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable store Ledger !';
        }
        return Redirect::route('admin.ledger.index')->with('message', $message)->with('class', $class );    
   
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
    public function ledgers(Request $request)
    {
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }  
        $ledger = DB::table('ledgers')
        ->join('voucher_transactions', 'ledgers.id', '=', 'voucher_transactions.ledger_id')  
        ->select( 'ledgers.name', 'ledgers.id',   DB::raw('SUM(voucher_transactions.cr-voucher_transactions.dr) as amt')  )
        ->where('voucher_transactions.status',1)->where('ledgers.status',1)
        ->where($where)   
        ->groupby('ledgers.name','ledgers.id')
        ->orderby('ledgers.name','asc')
        ->get();
        return view('report.accounts.ledger_report', compact('ledger','request')); 
    }
}
