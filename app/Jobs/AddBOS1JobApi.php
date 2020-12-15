<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\BOS1;
use Exception;
use DB;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\Schema;
use App\Models\ClientLogs;

class AddBOS1JobApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $system;
    protected $request;
    
    public function __construct($system,$request)
    {
         $this->system = $system;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
   public function handle()
    {
        try{
            $request_data = array();
            //Array to assign request data 
           $request_data = $this->request;
           //Insert Eloquent
             $insert_data = BOS1::create($request_data); 
                    $previous_data = BOS1::where('client_id',$insert_data->client_id)->first();
                    $previous_data_json_encoded = json_encode($previous_data); 
                     $logs = array('system_id'=>$previous_data->bos1_id,'system_name'=>'BOS1','client_id'=>$previous_data->client_id,'action_performed'=>'Add','previous_data'=>$previous_data);
                    //Insert Client Logs Eloquent
                    $client_logs = ClientLogs::insert($logs);
                    //Matching Algorithm
                    $match_data = \App\Helpers\Helper::matchData('BOS1',$request_data);  
 
        }catch(\Exception $ex){ 
            print_r($ex->getMessage());  
        }
    } 
}


