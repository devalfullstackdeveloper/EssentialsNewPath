<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Jobs\UpdateBOS1JOB;
use DB;

class UpdateJsonController extends Controller
{
	
    public function UpdateViaJSON(Request $request){
    	// $request = json_decode($request);
    	return 'hello';
    	// print_r($request);
    	// $update = new UpdateBOS1JOB('bos1',$request);
    	// dispatch($update);
    }
}
