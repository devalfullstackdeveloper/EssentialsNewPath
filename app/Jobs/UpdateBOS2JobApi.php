<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\BOS2;
use Exception;
use DB;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\Schema;
use App\Models\ClientLogs;

class UpdateBOS2JobApi implements ShouldQueue
{ 
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $system;
    protected $request;
    protected $clientid;
    
    public function __construct($system,$request,$clientid) 
    {
         $this->system = $system;
        $this->request = $request;
        $this->clientId = $clientid;
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
           $client_id = $this->clientid; 

           if($client_id == '')
           {
            $client_id = $request_data['client_id'];
           }
          

            $previous_data = BOS2::where('client_id',$client_id)->first();
             $check_client_data_present = BOS2::where('client_id','=',$client_id)->get();
            
            if(count($check_client_data_present)>0){
                $columns = DB::getSchemaBuilder()->getColumnListing('bos2_data');
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$columns)){
                        $update = DB::table('bos2_data')->where(["bos2_id"=>$check_client_data_present[0]->bos2_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                 
            } 
                
                        $previous_data_json_encoded = json_encode($previous_data);
                        $logs = array('system_id'=>$previous_data->bos2_id,'system_name'=>'BOS2','client_id'=>$previous_data->client_id,'action_performed'=>'Update','previous_data'=>$previous_data_json_encoded);
                        $client_logs = ClientLogs::insert($logs);

                        $match_data = \App\Helpers\Helper::matchData($this->system,$request_data);
 

        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }  
}


