<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Profile\UserProfile;
class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }
    public static function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	public static function allSardars($list = false)
    {
    	if($list) return DB::table('sardars')->orderBy('name','asc')->where('status',1)->pluck('name','id');
		return DB::table('sardars')->orderBy('name','asc')->where('status',1)->get();
        
    }

    public static function allSardarTypes($list = false)
    {
    	if($list) return DB::table('sardar_types')->orderBy('name','asc')->where('status',1)->pluck('name','id');
		return DB::table('sardar_types')->orderBy('name','asc')->where('status',1)->get();
        
    }

    public static function allMills($list = false)
    {
        if($list) return DB::table('mills')->orderBy('name','asc')->where('status',1)->pluck('name','id');
        return DB::table('mills')->orderBy('name','asc')->where('status',1)->get();
        
    }
}