<?php

namespace App\Models\SardarWorkers;

use Illuminate\Database\Eloquent\Model;

class WorkerProduction extends Model
{
    protected $table 		= 'worker_productions';

    public $fillable 	= array('worker_id', 'bricks_manufactured', 'bricks_lined_up', 'unit_cost', 'date', 'employee_id' ); 
    public $guarded   	= ['_token'];
    public static $rules 	= [
        'worker_id'       	=> 'required|exists:workers,id',
    	'date' 				=> 'required|date_format:Y-m-d',
    	'unit_cost' 		=> 'required|numeric|between:0,100000',
        'employee_id'    	=> 'required|exists:employees,id',
       
    ];
    public function worker()
    {
        return $this->belongsTo('App\Models\Worker', 'worker_id'); 
	}

    public function employee()
    {
        return $this->belongsTo('App\Employee'); 
    }
}
