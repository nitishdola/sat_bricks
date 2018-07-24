<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class SardarAdvance extends Model
{
    protected $table    = 'sardar_advances';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('trans_id','sardar_id'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
        'trans_id' 	        => 'required|exists:voucher_transactions,id', 
        'sardar_id' 	    => 'required|exists:sardars,id',     
    ]; 
}
