<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Employee; 
use DB, Crypt, Helper, Validator, Redirect;
class EmployeesController extends Controller
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
        $urls1 = 'admin.employee.create';
        $urls2  =  'admin.employee.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
        if($request->q) { 
            $where[] = array('name', 'LIKE', trim($request->q).'%');
        }
        $employees = Employee::where('status','1')->where($where)->orderBy('name', 'asc')->paginate(20); 
        
        return view('master.employee.view', compact('employees','request','navlink','urls1','urls2','link1','link2')); 
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navlink='1';
        $urls1 = 'admin.employee.create';
        $urls2  =  'admin.employee.index';
        $link1 = 'Add';
        $link2 = 'View';  
        return view("master.employee.create", compact('navlink','urls1','urls2','link1','link2')); 
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
        $data['password'] = bcrypt('password');
        $validator = Validator::make($data, Employee::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        
        if(Employee::create($data)) {
            $class      .= 'alert-success';
            $message    .= 'Employee added successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable store Employee !';
        }
        return Redirect::route('admin.employee.index')->with('message', $message)->with('class', $class );   
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
        $urls1 = 'admin.employee.create';
        $urls2  =  'admin.employee.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $id = Crypt::decrypt($id); 
        $employee = Employee::findOrFail($id);  
        return view("master.employee.edit", compact( 'employee','navlink','urls1','urls2','link1','link2')); 
    
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
        $id = Crypt::decrypt($id);
        $message    = $class = '';
        $data       = $request->all();   
        $employee = Employee::find($id); 

        $rules      = Employee::$rules;
        $rules['mobile_number'] = $rules['mobile_number'] . ',mobile_number,'. $id.',id' ;  
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $employee->fill($data);

        if($employee->save()) {
            $class      .= 'alert-success';
            $message    .= 'Employee has been updated successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable update employee !';
        }   

        return Redirect::route('admin.employee.index')->with(['message' => $message, 'class' => $class]);
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
        $employee = Employee::find($id);
        $employee->status ="0";  
        if($employee->save()) {
            $class      .= 'alert-success';
            $message    .= 'Employee has been deleted successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable delete employee !';
        } 
        DB::commit(); 
        return Redirect::route('admin.employee.index')->with(['message' => $message, 'class' => $class]); 
    }
    public function password($id)
    {    
        $id = Crypt::decrypt($id); 
        $employee = Employee::findOrFail($id); 
        return view("master.employee.password", compact( 'employee'));  
    }

    public function change(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $message    = $class = '';  
        $employee = Employee::find($id);  
        $employee->password = bcrypt($request->input('password'));  

        if($employee->save()) {
            $class      .= 'alert-success';
            $message    .= 'Password has been updated successfully !';
        }else{
            $class      .= 'alert-danger';
            $message    .= 'Unable update password !';
        }   

        return Redirect::route('admin.employee.index')->with(['message' => $message, 'class' => $class]);
    }

}
