<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Masters\Sardar; 
use App\Models\Masters\Worker; 
use DB, Crypt, Helper, Validator, Redirect;

class WorkersController extends Controller
{
    public function productionEntry() {
    	$sardars   	= Helper::allSardars($list = true); 
    	return view('employee.workers.production_entry', compact('sardars'));
    }

    public function saveProductionEntry(Request $request) {
    	
    }
}
