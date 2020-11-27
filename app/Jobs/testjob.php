<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\testqueue;
use Exception;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class testjob implements ShouldQueue
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
            $add = new testqueue();
            $add->fname = $this->system;
            $add->lname = "test data";
            $add->save();
        }catch(\Exception $ex){
            print_r($ex->getMessage());
        }
    }

    

    
}
