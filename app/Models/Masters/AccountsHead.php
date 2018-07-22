<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class AccountsHead extends Model
{
    protected $table = 'accounts_heads';
    public $primaryKey = 'id';
    public $timestamps =true;
    protected $fillable 	= array('name'); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required',
    ];
     public function ledgers()
    {
        return $this->hasMany('App\Models\Masters\Ledger'); 
	}
}
