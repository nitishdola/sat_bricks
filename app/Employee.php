<?php

namespace App;

use App\Notifications\EmployeeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $table    = 'employees';
    public $primaryKey  = 'id';
    public $timestamps  = true;
    protected $fillable 	= array('name','mobile_number','password','address','salary' ); 
    protected $guarded   	= ['_token'];
    public static $rules 	= [
    	'name' 				=> 'required|max:127',
    	'mobile_number' 	=> 'required|numeric|digits:10|unique:employees',
    	'address' 			=> 'required|max:200',
    	'salary'         	=> "required|regex:/^\d*(\.\d{1,2})?$/",
    ]; 
     
    protected $hidden = [
        'password', 'remember_token',
    ]; 
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPassword($token));
    }
}
