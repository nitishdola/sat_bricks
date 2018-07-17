<?php

namespace App\Http\Controllers\Sardar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Mill;
use App\Models\Masters\SardarType;
use App\Models\Masters\Sardar; 
use DB, Crypt;
class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    { 

        session(['navlink' => '1']);
        session(['urls1' => 'master/sardar']);
        session(['urls2' => 'master/sardar/create']); 
        session(['link1' => 'View']);
        session(['link2' => 'Add']); 
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
    public function create(Request $request)
    { 
        session(['navlink' => '2']);
        session(['urls1' => 'master/sardar']);
        session(['urls2' => 'master/sardar/create']); 
        session(['link1' => 'View']);
        session(['link2' => 'Add']); 
        $mill = Mill::where('status','1')->orderBy('name', 'asc')->get();  
        $type= SardarType::where('status','1')->orderBy('name', 'asc')->get();  
        return view("master.sardar_create")->with('mill',$mill)->with('type',$type); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msgtype='error';
		$msg='Somethings went Wrong!';
        DB::beginTransaction();
        $sardar= Sardar::where('status','1')->where('mobile_number',$request->mobile);
        if(!$sardar->count() > 0)
        {
            $sardar = new Sardar;
            $sardar->name = $request->input('name'); 
            $sardar->mobile_number = $request->input('mobile'); 
            $sardar->address = $request->input('address'); 
            $sardar->sardar_type_id = $request->input('sardar_type'); 
            $sardar->mill_id = $request->input('mill');  
            $sardar->save(); 
            $msgtype='success';
			$msg='Record has been saved successfully.'; 
        }   
        else
        {
            $msgtype='error';
            $msg='Mobile number is already exist!';
        }
		DB::commit();
        return redirect('/master/sardar/create')->with($msgtype,$msg);    
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
        $id = Crypt::decrypt($id);
        $mill = Mill::where('status','1')->orderBy('name', 'asc')->get();  
        $type= SardarType::where('status','1')->orderBy('name', 'asc')->get();  
        $sardars = Sardar::where('status','1')->where('id','=', $id)->first();  
        return view("master.sardar_edit")->with('sardars', $sardars)->with('mill',$mill)->with('type',$type); 
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
        $msgtype='error';
		$msg='Somethings went Wrong!';
        DB::beginTransaction();
        $id=$request->input('sardar_id');
        $sardar= Sardar::where('id' ,'<>', $id)->where('status','1')->where('mobile_number',$request->mobile);
        if(!$sardar->count() > 0)
        {
            $sardar = Sardar::find($id);
            $sardar->name = $request->input('name'); 
            $sardar->mobile_number = $request->input('mobile'); 
            $sardar->address = $request->input('address'); 
            $sardar->sardar_type_id = $request->input('sardar_type'); 
            $sardar->mill_id = $request->input('mill');   
            $sardar->save(); 
            $msgtype='success';
			$msg='Sardar has been updated successfully.'; 
        }   
        else
        {
            $msgtype='error';
            $msg='Mobile number is already exist!'; 
            $id = Crypt::encrypt($id);
            return redirect('/master/sardar/'.$id.'/edit')->with($msgtype,$msg);
        }
		DB::commit();
        return redirect('/master/sardar/')->with($msgtype,$msg); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msgtype='error';
		$msg='Somethings went Wrong!';
        DB::beginTransaction();  
        $sardar = Sardar::find($id);
        $sardar->status ="0";  
        $sardar->save(); 
        $msgtype='success';
        $msg='Sardar has been deleted successfully.'; 
        
		DB::commit(); 
        return redirect('/master/sardar/')->with($msgtype,$msg); 
    }
}
