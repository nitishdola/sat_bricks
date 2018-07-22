<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table    = 'ledgers';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('name','head_id','register','cash_ledger'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
        'name' 				=> 'required|max:127|unique:ledgers', 
        'head_id' 	=> 'required|exists:accounts_heads,id', 
    ]; 
    
     
}
