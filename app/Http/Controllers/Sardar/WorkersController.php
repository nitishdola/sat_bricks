<?php

namespace App\Http\Controllers\Sardar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masters\Sardar; 
use App\Models\Masters\Worker; 
use DB, Crypt, Helper, Validator, Redirect;
class WorkersController extends Controller
{
    public function addSalary() {
    	$navlink 	= '1';
        $urls1 		= 'admin.sardar.worker.salary.add';
        $urls2  	= 'admin.sardar.worker.salary.view_all';
        $link1 		= 'Add';
        $link2 		= 'View'; 
 
        $sardars   	= Helper::allSardars($list = true); 
    	return view('admin.sardar.worker.add_salary', compact('sardars', 'navlink', 'urls1', 'urls2', 'link1', 'link2'));
    }
}
