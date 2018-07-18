<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Sardar extends Model
{
    protected $table    = 'sardars';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('name','mobile_number','address','sardar_type_id','mill_id'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required|max:127',
    	'mobile_number' 	=> 'required|unique:sardars|numeric|digits:10',
    	'address' 			=> 'required|max:227',
    	'sardar_type_id' 	=> 'required|exists:sardar_types,id',
    	'mill_id' 			=> 'required|exists:mills,id', 
    ]; 
    
    public static $updateRules = [
        'name' 				=> 'required|max:127',
    	'mobile_number' 	=> 'required|numeric|digits:10',
    	'address' 			=> 'required|max:227',
    	'sardar_type_id' 	=> 'required|exists:sardar_types,id',
    	'mill_id' 			=> 'required|exists:mills,id', 
    ];

    public function sardar_types(){
        return $this->belongsTo('App\Models\Masters\SardarType','sardar_type_id');
    } 

    public function mills(){
        return $this->belongsTo('App\Models\Masters\mill','mill_id');
    } 
}
