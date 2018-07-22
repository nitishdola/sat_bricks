<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name', 'mobile_number', 'address'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ];
     
}
