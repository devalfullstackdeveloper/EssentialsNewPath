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

class UpdateBOS1JOB implements ShouldQueue
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
            $find = BOS1::where('client_id','=',$this->request['client_id'])->get();
             $this->request['system'] = 'BOS1'; 
            if(count($find)>0){
                $cols = DB::getSchemaBuilder()->getColumnListing('bos1_data');
                $this->versionData($this->request['client_id'],$this->request);
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$cols)){
                        $update = DB::table('bos1_data')->where(["bos1_id"=>$find[0]->bos1_id]); 
                        $update = $update->update([$key => $value]);
                    }
                }
 
               $match_data = \App\Helpers\Helper::matchData('BOS1',$this->request); 

            }
            else
            {
                $insert_data = BOS1::create($this->request); 
                    $previous_data = BOS1::where('client_id',$insert_data->client_id)->first();
                    $previous_data_json_encoded = json_encode($previous_data); 
                     $logs = array('system_id'=>$previous_data->bos1_id,'system_name'=>'BOS1','client_id'=>$previous_data->client_id,'action_performed'=>'Add','previous_data'=>$previous_data);
                    //Insert Client Logs Eloquent
                    $client_logs = ClientLogs::insert($logs);
                    //Matching Algorithm
                    $match_data = \App\Helpers\Helper::matchData('BOS1',$this->request);  
                } 
            
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }

    public function versionData($client_id,$data){
        
        $getClient = db::table("bos1_data")->where(["client_id"=>$client_id])->get();
        if(count($getClient)>0){
            $getColumns = DB::getSchemaBuilder()->getColumnListing('bos1_data');
            $data = $data;
            foreach ($getColumns as $key => $value) {
                
                if(array_key_exists($value, $data)){
                    if($key=="client_id"){
                    }else{

                        if($getClient[0]->$value!=$data[$value]){
                            
                            $storeDataVersion = \App\Helpers\UpdateHelper::Store_Data_Version($getClient[0]->bos1_id,$client_id,'BOS1',$value,$getClient[0]->$value);
                        }else{
                            
                        }
                        
                    }
                }
            }       
        }
    }

    

    
}
