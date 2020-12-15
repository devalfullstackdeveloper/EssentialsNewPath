<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\MIM;
use Exception;
use DB;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\Schema;
use App\Models\ClientLogs;

class AddMIMJobApi implements ShouldQueue
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
           $request_data = $this->request;
             $insert_data = MIM::create($request_data); 
                    $previous_data = MIM::where('client_id',$insert_data->client_id)->first();
                    $previous_data_json_encoded = json_encode($previous_data); 
                    $logs = array('system_id'=>$previous_data->MIM_id,'system_name'=>'MIM','client_id'=>$previous_data->client_id,'action_performed'=>'Add'   ,'previous_data'=>$previous_data);
                    $client_logs = ClientLogs::insert($logs);
                    $match_data = \App\Helpers\Helper::matchData('MIM',$request_data); 
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    } 
}


