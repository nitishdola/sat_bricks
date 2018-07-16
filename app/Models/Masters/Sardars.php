<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Sardars extends Model
{
    protected $table = 'sardars';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name','mobile_number','address','sardar_type_id','mill_id','created_by','updated_by'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    	'mobile_number' 				=> 'required',
    	'address' 				=> 'required',
    	'sardar_type_id' 				=> 'required',
    	'mill_id' 				=> 'required',
    	'created_by' 				=> 'required',
    	'updated_by' 				=> 'required', 
    ]; 
     
    public function sardar_types(){
        return $this->belongsTo('App\Models\Masters\Sardar_types','sardar_type_id');
    } 

    public function mills(){
        return $this->belongsTo('App\Models\Masters\mill','mill_id');
    } 
}
