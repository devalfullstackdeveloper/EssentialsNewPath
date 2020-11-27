<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Http\Controllers\Controller as Controller;
use App\Jobs\SendEmailJob;
use App\Jobs\UpdateBOS1JOB;
use App\Jobs\testjob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use DB;


class QueueController extends Controller
{


	//this is for testing purpose
    public function sendEmail(){
    	$emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(15));
    	dispatch($emailJob);
        echo 'Record Inserted';
    }

    // this function is used for updating records for bos1 using queue
    public function UpdateQueueBOS1(Request $request){
    	$request = array('client_id'=>'1521','default_type'=>"122");
    	$update = new UpdateBOS1JOB('bos1',$request);
    	dispatch($update);
    }


    //testque
    public function testqueue(Request $request)
    {
        $request = array('1','2','3','4');
        $add = new testjob('testqueue',$request);
        dispatch($add);
    }	
}
