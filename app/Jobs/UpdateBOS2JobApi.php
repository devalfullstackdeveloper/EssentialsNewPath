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

            $previousData = BOS2::where('client_id',$ClientId)->first();
             $find = BOS2::where('client_id','=',$ClientId)->get();
            
            if(count($find)>0){
                $cols = DB::getSchemaBuilder()->getColumnListing('bos2_data');
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$cols)){
                        $update = DB::table('bos2_data')->where(["bos2_id"=>$find[0]->bos2_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                 
            } 
                
                        $prev_data = json_encode($previousData);
                        $logs = array('system_id'=>$previousData->bos2_id,'system_name'=>'BOS2','client_id'=>$previousData->client_id,'action_performed'=>'Update','previous_data'=>$prev_data);
 

                        $cleintLogs = ClientLogs::insert($logs);

                        $find_match = \App\Helpers\Helper::matchData1($this->system,$arrayData);
 

        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }  
}


