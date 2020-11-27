<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\UpdateBOS1JOB;
use App\Jobs\UpdateBOS2Job;
use App\Jobs\UpdateMIMJob;
use App\Jobs\UpdateRCSJOB;
use DB;

class UpdateJsonController extends Controller
{
    public function UpdateViaJSON(Request $request){
    	$request = $request->all();
    	if($request['system']=="bos1"){
    		$update = new UpdateBOS1JOB('bos1',$request);
    		dispatch($update);
    		return response()->json(["status"=>200,"message"=>"successFully Updates"]);	
    	}

    	if($request['system']=="bos2"){
    		$update = new UpdateBOS2Job('bos2',$request);
    		dispatch($update);
    		return response()->json(["status"=>200,"message"=>"successFully Updates"]);	
    	}

    	if($request['system']=="mim"){
    		$update = new UpdateMIMJob('mim',$request);
    		dispatch($update);
    		return response()->json(["status"=>200,"message"=>"successFully Updates"]);	
    	}

    	if($request['system']=="rcs"){
            $update = new UpdateRCSJOB('rcs',$request);
            dispatch($update);
            return response()->json(["status"=>200,"message"=>"successFully Updates"]); 
    	}
    }

    public function MatchViaJSON(Request $request){
        $request = $request->all();
        $find_match = \App\Helpers\Helper::dataMatching($request['client_id'],$request['system']);
    }
}
