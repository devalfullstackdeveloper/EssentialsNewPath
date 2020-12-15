<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller as Controller;
use App\Models\BOS1;
use App\Models\BOS2;
use App\Models\MIM;
use App\Models\RCS;
use App\Models\MatchResults;
use App\Models\ClientLogs;
use App\Models\MatchResultLogs;
use App\Jobs\AddRCSJobApi;
use App\Jobs\UpdateRCSJobApi;
use App\Jobs\AddMIMJobApi;
use App\Jobs\UpdateMIMJobApi;
use App\Jobs\AddBOS1JobApi;
use App\Jobs\UpdateBOS1JobApi;
use App\Jobs\AddBOS2JobApi;
use App\Jobs\UpdateBOS2JobApi;
use App\Helpers\Helper;
use DB;
use URL;

class SystemClientsController extends Controller
{
   
 public function clientMapping(Request $request)
{   
  //Check if system name is passed in the request , if not then return user with error message
  if(!isset($request->system))
  {
    $response['status'] = 400;
    $response['message'] = "System Is Required";
    return response()->json($response); 
  }
  //Check if Cleint Id is passed in the request , if not then return user with error message
  if(!isset($request->client_id))
  {
    $response['status'] = 400;
    $response['message'] = "Client Id Required";
    return response()->json($response);
  }
  $client_id = $request->client_id;

  $system = $request->system;
  $systemname = strtolower($request->system);
  $model = '';
  $job = '';

  //Set System , System Model , System Add Job And System Update Job
  if($system == 'BOS1')
  {
    $model="App\Models\BOS1"; 
    $system_add_job = "App\Jobs\AddBOS1JobApi"; 
    $system_update_job = "App\Jobs\UpdateBOS1JobApi";
  }

  if($system == 'BOS2')
  {
    $model="App\Models\BOS2"; 
    $system_add_job = "App\Jobs\AddBOS2JobApi"; 
    $system_update_job = "App\Jobs\UpdateBOS2JobApi";
  }

  if($system == 'MIM')
  {
    $model="App\Models\MIM"; 
    $system_add_job = "App\Jobs\AddMIMJobApi"; 
    $system_update_job = "App\Jobs\UpdateMIMJobApi";

  }

  if($system == 'RCS')
  {
    $model="App\Models\RCS"; 
    $system_add_job = "App\Jobs\AddRCSJobApi"; 
    $system_update_job = "App\Jobs\UpdateRCSJobApi"; 
  }

  //Count total system records
  $count_system_records_with_client_id = $model::where('client_id',$client_id)->get()->count();

  if($count_system_records_with_client_id > 0)
  {
    //Set Client Id
    $client_id = '';
    if(!isset($request->client_id))
    {
      $response['status'] = 400;
      $response['message'] = 'Client Id Is Required'; 
      return response()->json($response);
    }
    else
    { 
      $client_id = $request->client_id;
    } 
    try {
      //If record exists then update record or add record 
      if($count_system_records_with_client_id > 0)
      {   
        $input_request = $request->all();
        // Job Object to update system data
        $update_system_data = new $system_update_job($system,$input_request,$client_id); 
        // Dispatch job to add to queue
        dispatch($update_system_data);  
        $response['status'] = 200; 
        $response['message'] = 'Updated Client Successfully';
        return response()->json($response);
      }
      else
      {
        $response['status'] = 400; 
        $response['message'] = 'No Such Id Found';
      }
    } 
    catch (\Exception $e) { 
      $response['status'] = 400;
      $response['message'] = $e; 
    }
    return response()->json($response);
  }
  else
  {
    try { 

      $input_request = $request->all();
      // Job Object to add system data
      $add_system_data = new $system_add_job($system,$input_request);
      // Dispatch job to add to queue
      dispatch($add_system_data);
      $response['status'] = 200;
      $response['message'] = 'Added Client Successfully';
    }
    catch (\Exception $e) { 
      $response['status'] = 400;
      $response['message'] = $e; 
    }
    return response()->json($response);
  }
}   



    public function destroy(Request $request)  
    {   
    	$BOS1id = ''; 
    	if(!isset($request->bos1_id))
    	{
    		$response['status'] = 400;
    		$response['message'] = 'Bos 1 Id Is Required'; 
    		return response()->json($response);
    	}
    	else
    	{
    		try {
    			$count = BOS1::where('bos1_id', $request->bos1_id)->get()->count();

    			if($count > 0)
    			{
    				BOS1::where('bos1_id', $request->bos1_id)->delete();
    				$response['status'] = 200;   
    				$response['message'] = 'Success'; 
    			}
    			else
    			{
    				$response['status'] = 400;   
    				$response['message'] = 'No Such Id Found'; 
    			}


    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		} 
    		return response()->json($response);
    	} 


    }


    public function matchData(Request $request)
    {
      //Single match APi will use Helper for the same.
     // $model_prefix="App\Models";
     // $type = $request->system;
     // $modal = $model_prefix.'\\'.$type; 
       // $match_data = \App\Helpers\Helper::matchData1($modal,$request); 
    }

//this is for testing purpose will be removed in production
public function checkmatch(Request $request)
{   
    // $model_prefix="App\Models";
    // $type = $request->system;
    // $modal = $model_prefix.'\\'.$type;

    //      $match_data = \App\Helpers\Helper::matchData1($modal,$request); 
    //     $BOS1 = $this->checkresult($request,'BOS1');  
    //     $BOS2 = $this->checkresult($request,'BOS2');  
    //     $MIM = $this->checkresult($request,'MIM');  

    // 	$RCS = $this->checkresult($request,'RCS');  

    // echo "<pre>"; 
    // echo "BOS1";
    //     print_r($BOS1);  
    //  echo "BOS2";   
    //     print_r($BOS2);
    //     echo "MIM";
    //     print_r($MIM);
    //     echo "RCS";
    // print_r($RCS);
    // echo "</pre>";
    // exit(); 
}

//Just for testing purpose will be removed in production
public function checkresult($request,$system)
{

}


//Under Progress (Match all data after initial upload for all the systems)
public function MatchingAlgorithmAfterInitialUpload()
{

    $system_NameArray  = ['BOS1','BOS2','MIM','RCS'];

    foreach ($system_NameArray as $key => $systemname) {
      $model_prefix="App\Models";
      $type = $systemname;
      $modal = $model_prefix.'\\'.$type;

      $system_data = $modal::all()->map->toArray();
      foreach ($system_data as $key => $value) {
        $value['requested_system'] = $type;
        $value['system'] = $type;
        $system_value = \App\Helpers\Helper::matchData1($type,$value); 
      }

    }
   
} 

public function truncate_table(Request $request)
{  
   

  $system = $request['system'];
  $model_prefix="App\Models";
  $modal = '';
  if($system == 'bos1')
  {
     $modal = $model_prefix.'\\'.'BOS1';
  }

  if($system == 'bos2')
  {
     $modal = $model_prefix.'\\'.'BOS2';
  }
  
  if($system == 'mim')
  {
     $modal = $model_prefix.'\\'.'MIM';
  }

  if($system == 'rcs')
  {
     $modal = $model_prefix.'\\'.'RCS';
  }

  if($system == 'matchresult')
  {
    $modal = $model_prefix.'\\'.'MatchResult';
  }
  $modal::truncate();
  $base_url = URL::to('/');
   return redirect($base_url.'/'.$system);

}



}
