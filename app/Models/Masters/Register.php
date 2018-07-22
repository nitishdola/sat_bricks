<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'registers';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ]; 
}
