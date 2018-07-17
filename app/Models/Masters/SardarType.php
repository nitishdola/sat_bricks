<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class SardarType extends Model
{
    protected $table    = 'sardar_types';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('name'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ];
     public function sardars()
    {
        return $this->hasMany('App\Models\Masters\Sardar'); 
	}

}
