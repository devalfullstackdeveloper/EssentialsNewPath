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

class UpdateBOS2Job implements ShouldQueue
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
            $find = BOS2::where('client_id','=',$this->request['client_id'])->get();
            
            if(count($find)>0){
                $cols = DB::getSchemaBuilder()->getColumnListing('bos2_data');
                $this->versionData($this->request['client_id'],$this->request);
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$cols)){
                        $update = DB::table('bos2_data')->where(["bos2_id"=>$find[0]->bos2_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                
            }
            
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }

    public function versionData($client_id,$data){
        
        $getClient = db::table("bos2_data")->where(["client_id"=>$client_id])->get();
        if(count($getClient)>0){
            $getColumns = DB::getSchemaBuilder()->getColumnListing('bos2_data');
            $data = $data;
            foreach ($getColumns as $key => $value) {
                
                if(array_key_exists($value, $data)){
                    if($key=="client_id"){
                    }else{

                        if($getClient[0]->$value!=$data[$value]){
                            
                            $storeDataVersion = \App\Helpers\UpdateHelper::Store_Data_Version($getClient[0]->bos2_id,$client_id,'BOS2',$value,$getClient[0]->$value);
                        }else{
                            
                        }
                        
                    }
                }
            }       
        }
    }
}
