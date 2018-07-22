<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class BrickType extends Model
{
    protected $table = 'brick_types';
    protected $fillable 	= array('name', 'unit'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ];
}
