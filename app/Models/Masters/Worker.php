<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table    = 'workers';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('name','salary','sardar_id','salary_type'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required|max:127', 
    	'salary' 			=> 'required|max:12',
    	'sardar_id' 	    => 'required|exists:sardars,id', 
    ]; 
    
    

    public function sardars(){
        return $this->belongsTo('App\Models\Masters\Sardar','sardar_id');
    }  
}
