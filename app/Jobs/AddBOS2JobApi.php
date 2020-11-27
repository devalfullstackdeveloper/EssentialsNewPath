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

class AddBOS2JobApi implements ShouldQueue
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
             $var1 = BOS2::create($arrayData); 
                    $previousData = BOS2::where('client_id',$var1->client_id)->first();
                    $prev_data = json_encode($previousData); 
                     $logs = array('system_id'=>$previousData->bos2_id,'system_name'=>'BOS2','client_id'=>$previousData->client_id,'action_performed'=>'Add','previous_data'=>$previousData);
                    $cleintLogs = ClientLogs::insert($logs);
                    $find_match = \App\Helpers\Helper::matchData1('BOS2',$arrayData); 
                    
        }catch(\Exception $ex){ 
            print_r($ex->getMessage()); 
        }
    } 
}


