<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Masters\Sardar; 
use App\Models\Masters\Worker; 
use DB, Crypt, Helper, Validator, Redirect, Auth;
use App\Models\SardarWorkers\WorkerProduction;

class WorkersController extends Controller
{
    public function productionEntry() {
    	//d$sardars   	= Helper::allSardars($list = true); 
        $sardars    = Helper::allContractualSardars($list = true); 
    	return view('employee.workers.production_entry', compact('sardars'));
    }

    public function saveProductionEntry(Request $request) {
    	$workers = $request->worker_ids;

    	if(count($workers)) {
    		DB::beginTransaction();
    		for($i = 0; $i < count($workers); $i++) {

    			$worker_id 	= $workers[$i];
    			$worker 	= Worker::whereId($worker_id)->with('sardars')->first();
    			$unit_cost 	= $request->rates[$i];
    			$production = $request->productions[$i];
    			

    			$data = [];

    			$data['worker_id'] 	= $worker_id;
    			$data['unit_cost'] 	= $unit_cost;
    			
    			$data['date'] 		= date('Y-m-d');
    			$data['employee_id']= Auth::user()->id;
    			if($worker->sardars->sardar_type_id == 2) {
    				$total 				= ($unit_cost/1000)*$production;
    				$data['total'] 		= $total;
    				$data['bricks_manufactured']= $production;
    			}else if($worker->sardars->sardar_type_id == 3) {
    				$total 				= $unit_cost*$production;
    				$data['total'] 		= $total;
    				$data['bricks_lined_up']= $production;
    			}

    			WorkerProduction::create($data);
    		}
    		DB::commit();

    		return Redirect::route('employee.worker.production.view_all')->with(['message' => 'Inserted Successfully !', 'alert-class' => 'alert-danger']);
    	}
    }

    public function viewAllProductionEntry(Request $request) {
    	$where = [];
    	$result = WorkerProduction::where($where)->where('status',1)->orderBy('date', 'DESC')->with('worker', 'employee');
    	if($request->sardar_id) {
    		$workers = Worker::where('sardar_id', $request->sardar_id)->where('status',1)->get();
    		$whereIn = [];
    		foreach($workers as $k => $v) {
    			$whereIn[] = $v->id;
    		}

    		$result = $result->whereIn('worker_id', $whereIn);
    	}

    	if($request->date_from) {
    		$dateFrom = date('Y-m-d', strtotime($request->date_form));
    		$result = $result->where('date', '>=',  $dateFrom);
    	}

    	if($request->date_to) {
    		$dateTo = date('Y-m-d', strtotime($request->date_to));
    		$result = $result->where('date', '<=',  $dateTo);
    	}

    	$results = $result->get();

    	$sardars   	= Helper::allContractualSardars($list = true); 

    	return view('employee.workers.view_production_entries', compact('results', 'sardars'));
    }
}
