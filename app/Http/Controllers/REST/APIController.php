<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Crypt, Helper, Validator, Redirect;
use App\Models\Masters\BrickType;
class APIController extends Controller
{
    public function getBrickTypeData(Request $request) {
    	$brick_type_id = $request->brick_type_id;
    	return BrickType::whereId($brick_type_id)->select('name', 'unit')->first();
    }
}
