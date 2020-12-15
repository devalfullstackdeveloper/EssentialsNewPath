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

class UpdateMIMJobApi implements ShouldQueue
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
        $this->clientid = $clientid;
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

            $previous_data = MIM::where('client_id',$client_id)->first();
             $check_client_data_present = MIM::where('client_id','=',$client_id)->get();
            
            if(count($check_client_data_present)>0){
                $database_columns = DB::getSchemaBuilder()->getColumnListing('mim_data');
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$database_columns)){
                        $update = DB::table('mim_data')->where(["MIM_id"=>$check_client_data_present[0]->MIM_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                
            }
                    $previous_data_json_encoded = json_encode($previous_data);
                        // $mim1_update = MIM::where('client_id',$client_id)->update($this->request);
                        $logs = array('system_id'=>$previous_data->MIM_id,'system_name'=>'MIM','client_id'=>$previous_data->client_id,'action_performed'=>'Update','previous_data'=>$previous_data_json_encoded);
                        $cleintLogs = ClientLogs::insert($logs);

                        $check_client_data_present_match = \App\Helpers\Helper::matchData($this->system,$request_data); 
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }  
}


