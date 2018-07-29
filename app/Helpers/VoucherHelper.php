<?php
namespace App\Helpers;
use DB, Validator, Redirect, Auth,  Crypt;
use App\Models\Profile\UserProfile; 
use App\Models\Masters\Ledger; 
use App\Models\Accounting\Voucher; 
use App\Models\Accounting\VoucherTransaction; 
use App\Helpers\Helper;  
class VoucherHelper
{

    public static function voucher(string $date, $v_type, string $remarks )
    {
        $data[]="";
        $data['date'] =   $date; 
        $data['voucher_type']= $v_type;
        $data['remarks'] = $remarks; 
        $last_voucher_data = Voucher::whereStatus(1)->orderBy('voucher_number', 'DESC')->first(); 
        $new_voucher_number = 1; 
        if($last_voucher_data) {
            $new_voucher_number = ($last_voucher_data->voucher_number) + 1;
        } 
        $data['voucher_number'] =$new_voucher_number;  
        $validator = Validator::make($data, Voucher::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        $result = Voucher::create($data);
        return $result;
    }
    public static function vouchertrans(string $id, string $lid, string $cr, string $dr )
    {
        $val['voucher_id'] =  $id; 
        $val['ledger_id']= $lid;   
        $val['cr'] = $cr; 
        $val['dr'] = $dr;  
       // $validator = Validator::make($val, VoucherTransaction::$rules);
        //if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput(); 
        $result = VoucherTransaction::create($val);
        return $result;
    }
}
?>