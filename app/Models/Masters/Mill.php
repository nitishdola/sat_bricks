<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Mill extends Model
{
    protected $table = 'mills';
    public $primaryKey = 'id';
    public $timestamps =true;
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
