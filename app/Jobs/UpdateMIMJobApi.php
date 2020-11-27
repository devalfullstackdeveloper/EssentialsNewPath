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
    protected $clientId;
    
    public function __construct($system,$request,$clientId) 
    {
         $this->system = $system;
        $this->request = $request;
        $this->clientId = $clientId;
    }

    /**
     * Execute the job. 
     *
     * @return void
     */
   public function handle()
    {
        try{
            $arrayData = array();
           $arrayData = $this->request;
           $ClientId = $this->clientId;

            $previousData = MIM::where('client_id',$ClientId)->first();
             $find = MIM::where('client_id','=',$ClientId)->get();
            
            if(count($find)>0){
                $cols = DB::getSchemaBuilder()->getColumnListing('mim_data');
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$cols)){
                        $update = DB::table('mim_data')->where(["MIM_id"=>$find[0]->MIM_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                
            }
               
                       
                        $prev_data = json_encode($previousData);
                        $var1 = MIM::where('client_id',$ClientId)->update($this->request);
                        $logs = array('system_id'=>$previousData->MIM_id,'system_name'=>'MIM','client_id'=>$previousData->client_id,'action_performed'=>'Update','previous_data'=>$prev_data);
                        $cleintLogs = ClientLogs::insert($logs);

                        $find_match = \App\Helpers\Helper::matchData1($this->system,$arrayData); 
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }  
}


