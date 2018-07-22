<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table    = 'vouchers';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('date','voucher_type','remarks'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
        'date' 				=> 'required',  
    ]; 
}
