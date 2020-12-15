<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\RCS;
use Exception;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Models\ClientLogs;

class UpdateRCSJOB implements ShouldQueue
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
            $find = RCS::where('client_id','=',$this->request['client_id'])->get();
             $this->request['system'] = 'RCS'; 
            if(count($find)>0){
                $cols = DB::getSchemaBuilder()->getColumnListing('rcs_data');
                $this->versionData($this->request['client_id'],$this->request);
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$cols)){
                        $update = DB::table('rcs_data')->where(["rcs_id"=>$find[0]->rcs_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                
            }
            else
            {
                $request_data = array();
                $arrayData = $this->request;
                $var1 = RCS::create($arrayData); 
                $previous_data = RCS::where('client_id',$var1->client_id)->first();
                $previous_data_json_encoded = json_encode($previous_data); 


                $logs = array('system_id'=>$previous_data->rcs_id,'system_name'=>'RCS','client_id'=>$previous_data->client_id,'action_performed'=>'Add'   ,'previous_data'=>$previous_data);

                $client_logs = ClientLogs::insert($logs);  

                $match_data = \App\Helpers\Helper::matchData('RCS',$arrayData);
            } 
            
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }

    public function versionData($client_id,$data){
        
        $getClient = db::table("rcs_data")->where(["client_id"=>$client_id])->get();
        if(count($getClient)>0){
            $getColumns = DB::getSchemaBuilder()->getColumnListing('rcs_data');
            $data = $data;
            foreach ($getColumns as $key => $value) {
                
                if(array_key_exists($value, $data)){
                    if($key=="client_id"){
                    }else{

                        if($getClient[0]->$value!=$data[$value]){
                            
                            $storeDataVersion = \App\Helpers\UpdateHelper::Store_Data_Version($getClient[0]->rcs_id,$client_id,'RCS',$value,$getClient[0]->$value);
                        }else{
                            
                        }
                        
                    }
                } 
            }       
        }
    }
}


