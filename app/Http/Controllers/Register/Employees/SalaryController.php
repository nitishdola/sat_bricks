<?php

namespace App\Http\Controllers\Register\Employees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Employee; 
use DB, Crypt, Helper, Validator, Redirect;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navlink='2';
        $urls1 = 'admin.register.employee.salary.create';
        $urls2  =  'admin.register.employee.salary.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
         
        return view('register.employeesalary.view', compact('navlink','urls1','urls2','link1','link2')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navlink='1';
        $urls1 = 'admin.register.employee.salary.create';
        $urls2  = 'admin.register.employee.salary.index';
        $link1 = 'Add';
        $link2 = 'View'; 
        $where = [];
        $employee  = Helper::allEmployees($list = true); 
       
        return view('register.employeesalary.create', compact('employee','navlink','urls1','urls2','link1','link2')); 
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
