<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table 		= 'sales';

    public $fillable 	= array('employee_id', 'customer_id', 'discount', 'gst', 'invoice_date', 'invoice_number','voucher_id', 'vehicle_number', 'driver_name', 'fare' ); 
    public $guarded   	= ['_token'];
    public static $rules 	= [
        'employee_id'       => 'required|exists:employees,id',
    	'customer_id' 		=> 'required',
    	'invoice_date' 		=> 'required|date_format:Y-m-d',
    	'invoice_number' 	=> 'required|integer',
        'vehicle_number'    => 'required',
        'driver_name'       => 'required',
        'fare'              => 'required|numeric'
    ];
    public function customers()
    {
        return $this->belongsTo('App\Models\Masters\Customer', 'customer_id'); 
	}

    public function employee()
    {
        return $this->belongsTo('App\Employee'); 
    }
}
