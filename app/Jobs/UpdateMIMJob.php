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

class UpdateMIMJob implements ShouldQueue
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
            $find = MIM::where('client_id','=',$this->request['client_id'])->get();
            
            if(count($find)>0){
                $cols = DB::getSchemaBuilder()->getColumnListing('mim_data');
                $this->versionData($this->request['client_id'],$this->request);
                foreach ($this->request as $key => $value) {
                    if(in_array($key,$cols)){
                        $update = DB::table('mim_data')->where(["MIM_id"=>$find[0]->MIM_id]); 
                        $update = $update->update([$key => $value]);    
                    }
                }
                
            }
            
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }

    public function versionData($client_id,$data){
        
        $getClient = db::table("mim_data")->where(["client_id"=>$client_id])->get();
        if(count($getClient)>0){
            $getColumns = DB::getSchemaBuilder()->getColumnListing('mim_data');
            $data = $data;
            foreach ($getColumns as $key => $value) {
                
                if(array_key_exists($value, $data)){
                    if($key=="client_id"){
                    }else{

                        if($getClient[0]->$value!=$data[$value]){
                            
                            $storeDataVersion = \App\Helpers\UpdateHelper::Store_Data_Version($getClient[0]->MIM_id,$client_id,'MIM',$value,$getClient[0]->$value);
                        }else{
                            
                        }
                        
                    }
                }
            }       
        }
    }
}
