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
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(request $request)
    { 
    
        $navlink='2';
        $urls1 = 'admin.sardar.create';
        $urls2  =  'admin.sardar.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }
        $sardars = Sardar::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20); 
        
        return view('master.view', compact('sardars','request','navlink','urls1','urls2','link1','link2')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $navlink='1';
        $urls1 = 'admin.sardar.create';
        $urls2  =  'admin.sardar.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $sardars = new Sardar;
        $mills          = Helper::allMills($list = true); 
        $sardar_types   = Helper::allSardarTypes($list = true);
        return view("master.sardar_create", compact('mills', 'sardar_types', 'sardars','navlink','urls1','urls2','link1','link2')); 
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
        return Redirect::route('admin.sardar.index')->with('message', $message)->with('class', $class );    
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
        $navlink='2';
        $urls1 = 'admin.sardar.create';
        $urls2  =  'admin.sardar.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $id = Crypt::decrypt($id); 
        $sardars = Sardar::where('status','1')->where('id','=', $id)->first(); 
        $mills          = Helper::allMills($list = true); 
        $sardar_types   = Helper::allSardarTypes($list = true); 
        return view("master.sardar_edit", compact('mills', 'sardar_types', 'sardars','navlink','urls1','urls2','link1','link2')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
        $message    = $class = '';
        $data       = $request->all(); 
       $validator = Validator::make($data, Sardar::$updateRules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        DB::beginTransaction();  
        $id=$request->input('sardar_id');  
        
        $sardar= Sardar::where('id' ,'<>', $id)->where('status','1')->where('mobile_number',$request->mobile_number);
        if(!$sardar->count() > 0)
        {
            $data = Sardar::find($id);
            $data->name = $request->input('name'); 
            $data->mobile_number = $request->input('mobile_number'); 
            $data->address = $request->input('address'); 
            $data->sardar_type_id = $request->input('sardar_type_id'); 
            $data->mill_id = $request->input('mill_id');    
            if($data->save()) {
                $class      .= 'alert-success';
                $message    .= 'Sardar has been updated successfully !';
            }else{
                $class      .= 'alert-danger';
                $message    .= 'Unable delete sardar !';
            } 
        }   
        else
        {   
            $class      .= 'alert-danger';
            $message    .= 'Mobile Number is used by another Sardar!';
            return Redirect::back()->with('message', $message)->with('class', $class );   
        }
		DB::commit(); 
        return Redirect::route('admin.sardar.index')->with('message', $message)->with('class', $class );    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message    = $class = ''; 
        DB::beginTransaction();  
        $sardar = Sardar::find($id);
        $sardar->status ="0";  
        if($sardar->save()) {
            $class      .= 'alert-success';
            $message    .= 'Sardar has been deleted successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable delete sardar !';
        } 
        DB::commit(); 
        return Redirect::route('admin.sardar.index')->with('message', $message);  
    }
}
