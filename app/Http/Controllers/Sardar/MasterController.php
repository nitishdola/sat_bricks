<?php

namespace App\Http\Controllers\Sardar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Mill;
use App\Models\Masters\SardarType;
use App\Models\Masters\Sardar; 
use DB, Crypt, Helper, Validator, Redirect;
class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }
        $sardars = Sardar::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20); 
        
        return view('master.view', compact('sardars','request')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mills          = Helper::allMills($list = true); 
        $sardar_types   = Helper::allSardarTypes($list = true);
        return view("master.sardar_create", compact('mills', 'sardar_types')); 
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
        
        $validator = Validator::make($data, Sardar::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
       
        
        if(Sardar::create($data)) {
            $class      .= 'alert-success';
            $message    .= 'Sardar added successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable store sardar !';
        }
        return Redirect::route('admin.sardar.index')->with('message', $message);    
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
