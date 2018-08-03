<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Crypt, Helper, Validator, Redirect;
use App\Models\Masters\BrickType,App\Models\Masters\Worker,App\Models\Masters\Customer ;
class APIController extends Controller
{
    public function getBrickTypeData(Request $request) {
    	$brick_type_id = $request->brick_type_id;
    	return BrickType::whereId($brick_type_id)->select('name', 'unit')->first();
    }

    public function getSardarWorkersData(Request $request) {
    	$sardar_id = $request->sardar_id;
    	return Worker::where('sardar_id', $sardar_id)->with('sardars')->where('status', 1)->get();
    }

    public function getCustomerData(Request $request) {
    	$customer_id = $request->customer_id;
    	return Customer::whereId($customer_id)->where('status', 1)->select('id', 'name', 'address', 'mobile_number')->first();
    }
}
