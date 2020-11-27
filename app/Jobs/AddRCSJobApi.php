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

class AddRCSJobApi implements ShouldQueue
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
            $arrayData = array();
           $arrayData = $this->request;
             $var1 = RCS::create($arrayData); 
                    $previousData = RCS::where('client_id',$var1->client_id)->first();
                    $prev_data = json_encode($previousData); 


                    $logs = array('system_id'=>$previousData->rcs_id,'system_name'=>'RCS','client_id'=>$previousData->client_id,'action_performed'=>'Add'   ,'previous_data'=>$previousData);

                    $cleintLogs = ClientLogs::insert($logs);  

                    $find_match = \App\Helpers\Helper::matchData1('RCS',$arrayData);
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }

    // public function versionData($client_id,$data){
        
    //     $getClient = db::table("rcs_data")->where(["client_id"=>$client_id])->get();
    //     if(count($getClient)>0){
    //         $getColumns = DB::getSchemaBuilder()->getColumnListing('rcs_data');
    //         $data = $data;
    //         foreach ($getColumns as $key => $value) {
                
    //             if(array_key_exists($value, $data)){
    //                 if($key=="client_id"){
    //                 }else{

    //                     if($getClient[0]->$value!=$data[$value]){
                            
    //                         $storeDataVersion = \App\Helpers\UpdateHelper::Store_Data_Version($getClient[0]->rcs_id,$client_id,'RCS',$value,$getClient[0]->$value);
    //                     }else{
                            
    //                     }
                        
    //                 }
    //             }
    //         }       
    //     }
    // }
}


