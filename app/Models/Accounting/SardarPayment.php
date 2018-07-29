<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class SardarPayment extends Model
{
    protected $table    = 'sardar_payments';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('voucher_id','sardar_id'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
        'voucher_id' 	    => 'required|exists:vouchers,id', 
        'sardar_id' 	    => 'required|exists:sardars,id',     
    ]; 
}
