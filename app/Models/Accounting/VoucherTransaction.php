<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class VoucherTransaction extends Model
{
    protected $table    = 'voucher_transactions';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('voucher_id','ledger_id','cr','dr'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [ 
        'voucher_id' 	    => 'required|exists:vouchers,id', 
        'ledger_id' 	    => 'required|exists:ledgers,id', 
        'cr' 				=> "required|regex:/^\d*(\.\d{1,2})?$/",    
        'dr' 				=> "required|regex:/^\d*(\.\d{1,2})?$/",    
    ]; 

    public function vouchers()
    {
        return $this->belongsTo('App\Models\Accounting\Voucher', 'voucher_id'); 
	}
}
