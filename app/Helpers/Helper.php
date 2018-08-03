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
	public static function allSardars($list = false, $where = [])
    {
    	if($list) return DB::table('sardars')->orderBy('name','asc')->where($where)->where('status',1)->pluck('name','id');
		return DB::table('sardars')->orderBy('name','asc')->where($where)->where('status',1)->get();
        
    }


    public static function allCustomers($list = false)
    {
        if($list) return DB::table('customers')->orderBy('name','asc')->where('status',1)->pluck('name','id');
        return DB::table('customers')->orderBy('name','asc')->where('status',1)->get();
        
    }

    public static function allBrickTypes($list = false)
    {
        if($list) return DB::table('brick_types')->orderBy('name','asc')->where('status',1)->pluck('name','id');
        return DB::table('brick_types')->orderBy('name','asc')->where('status',1)->get();
        
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
    public static function allPaymentType($list = false)
    { 
        $list = array('1' => 'Per Month', '2' => 'Per Day');
        return $list;
        
    }

    public static function allEmployees($list = false)
    {
    	if($list) return DB::table('employees')->orderBy('name','asc')->where('status',1)->pluck('name','id');
		return DB::table('employees')->orderBy('name','asc')->where('status',1)->get();
        
    }

    public  static function convrtToIndianCurrency($number) {
       $no = round($number);
       $point = round($number - $no, 2) * 100;
       $hundred = null;
       $digits_1 = strlen($no);
       $i = 0;
       $str = array();
       $words = array('0' => '', '1' => 'one', '2' => 'two',
        '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
        '7' => 'seven', '8' => 'eight', '9' => 'nine',
        '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
        '13' => 'thirteen', '14' => 'fourteen',
        '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
        '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
        '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninety');
       $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
       while ($i < $digits_1) {
         $divider = ($i == 2) ? 10 : 100;
         $number = floor($no % $divider);
         $no = floor($no / $divider);
         $i += ($divider == 10) ? 1 : 2;
         if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
         } else $str[] = null;
      }
      $str = array_reverse($str);
      $result = implode('', $str);
      $points = ($point) ?
        "." . $words[$point / 10] . " " . 
              $words[$point = $point % 10] : '';
      return ucfirst($result) . "Rupees  ";
    }

    public static function allRegisters($list = false)
    {
    	if($list) return DB::table('registers')->orderBy('name','asc')->pluck('name','id');
		return DB::table('registers')->orderBy('name','asc')->get();
        
    }

    public static function allAccountHeads($list = false)
    {
    	if($list) return DB::table('accounts_heads')->orderBy('name','asc')->pluck('name','id');
		return DB::table('accounts_heads')->orderBy('name','asc')->get();
        
    }
    public static function allLedger($list = false)
    {
        if($list) return DB::table('ledgers')->orderBy('name','asc')->where('status',1)->pluck('name','id');
		return DB::table('ledgers')->orderBy('name','asc')->where('status',1)->get();
        
    }
    public static function allCashLedger($list = false)
    {
    	if($list) return DB::table('ledgers')->orderBy('name','asc')->where('status',1)->where('cash_ledger',1)->pluck('name','id');
		return DB::table('ledgers')->orderBy('name','asc')->where('status',1)->where('cash_ledger',1)->get();
        
    }
}