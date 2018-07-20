<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Masters\Sardar; 
use App\Models\Masters\Worker; 
use DB, Crypt, Helper, Validator, Redirect;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(request $request)
    {
        $navlink='2';
        $urls1 = 'admin.worker.create';
        $urls2  =  'admin.worker.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }
        $worker = Worker::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20); 
        
        return view('master.worker.view', compact('worker','request','navlink','urls1','urls2','link1','link2')); 
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navlink='1';
        $urls1 = 'admin.worker.create';
        $urls2  =  'admin.worker.index';
        $link1 = 'Add';
        $link2 = 'View';  
        $sardar  = Helper::allSardars($list = true);
        $salary_type = Helper::allPaymentType($list = true);
        return view("master.worker.create", compact('sardar','salary_type','navlink','urls1','urls2','link1','link2')); 
 
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
        $validator = Validator::make($data, Worker::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        
        if(Worker::create($data)) {
            $class      .= 'alert-success';
            $message    .= 'Worker added successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable store Worker !';
        }
        return Redirect::route('admin.worker.index')->with('message', $message)->with('class', $class );   
 
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
