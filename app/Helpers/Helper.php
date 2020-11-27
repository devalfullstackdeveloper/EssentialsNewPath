<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Schema;
use DB;
use App\Models\importlogs;
use App\Models\BOS1;
use App\Models\BOS2;
use App\Models\MIM;
use App\Models\RCS;
use App\Models\client_data_versions;
use App\Models\client_bank_details;
use App\Models\ClientLogs;
use App\Models\MatchResults; 
use App\Models\MatchResultLogs;  


class Helper{

	/* get client data from requested table */
	public static function dataMatching($clientId,$system){
		$call = new Helper;
		if($system == "BOS1"){
			$data = BOS1::where('client_id',"=",$clientId)->first();
		}

		if($system == "BOS2"){
			$data = BOS1::where('client_id',"=",$clientId)->first();
		}

		if($system == "MIM"){
			$data = BOS1::where('client_id',"=",$clientId)->first();
		}

		if($system == "RCS"){
			$data = BOS1::where('client_id',"=",$clientId)->first();
		}

		if($data!=""){
			$getResult = $call->FindClientInAnotherTable($data,$system);	
		}else{
			echo "No Matched Found";			
		}
		
	}

	/* make search cases from requested system */
	public static function FindClientInAnotherTable($data,$system){
		$call = new Helper;
		switch ($system) {
			case 'BOS1':
			$matchIn = array("bos2_data","mim_data","rcs_data");
			break;
			case 'BOS2':
			$matchIn = array("bos1_data","mim_data","rcs_data");
			break;
			case 'MIM':
			$matchIn = array("bos1_data","bos2_data","rcs_data");
			break;
			case 'RCS':
			$matchIn = array("bos1_data","bos2_data","mim_data");
			break;
		}
		$getMatch = $call->MatchData($data,$matchIn);
	}

	/* match data in appropriate tables */

	public static function MatchData($data,$systems){
		if(count($systems)>0){
			$data = json_decode(json_encode($data));
			foreach ($systems as $requestkey => $requestvalue) {
				$getColumns = DB::getSchemaBuilder()->getColumnListing($requestvalue);
				foreach ($getColumns as $k => $v) {
					if(array_key_exists($v,$data)){
						if($v=='client_id'){
						}else{
							$check = db::table($requestvalue)->where([$v=>$data->$v])->get();
							if(count($check)>0){
								echo "client_id = ".$check[0]->client_id." <b>found in </b><strong>".$requestvalue."</strong><br>";
								break;
							}
						}
					}
				}
			}
		}
	}

	
	public static function matchData1($system,$request)
    {       

    	
        // try {

        	$match_result_array = '';
            if(!isset($request['system']) || $request['system'] == '')
            {
                $response['status'] = 400;
                $response['Message'] = 'System Is Required';
                return json_encode($response);
            }

            if($request['system']!='BOS1' && $request['system']!='BOS2' && $request['system']!='MIM' && $request['system']!='RCS' )
            {
                $response['status'] = 400;
                $response['Message'] = 'Invalid System';
                return json_encode($response);
            }

            if($request['system'] == 'MIM')
            {
            	$request['crn'] = $request['crn_number'];
            	$request['driver_license'] = $request['driver_license_no'];
            	$request['passport'] = $request['passport_no'];
            	$request['medicare_card'] = $request['medicare_no'];
            }


            $arrayMatch = array(); 

            $bos1_row_count = BOS1::where(function($bos1_row_count) use ($request){
                if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'BOS1')
                {
                    $bos1_row_count->where('client_id', $request['client_id']);
                }
                if(isset($request['crn']) && $request['crn'] != '')
                {
                    $bos1_row_count->orWhere('crn', $request['crn']);
                }
                if(isset($request['driver_license']) && $request['driver_license'] != '')
                {
                    $bos1_row_count->orWhere('driver_license', $request['driver_license']);
                }
                if(isset($request['passport']) && $request['driver_license'] != '')
                {
                    $bos1_row_count->orWhere('passport', $request['passport']);
                } 
                if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                {
                    $bos1_row_count->orWhere('medicare_card', $request['medicare_card']);
                }
            })->get()->count();

           
            $bos2_row_count = BOS2::where(function($bos2_row_count) use ($request){

                if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'BOS2')
                {
                    $bos2_row_count->where('client_id', $request['client_id']);
                }
                if(isset($request['crn']) && $request['crn'] != '')
                {
                    $bos2_row_count->orWhere('crn', $request['crn']);
                }
                if(isset($request['driver_license']) && $request['driver_license'] != '')
                {
                    $bos2_row_count->orWhere('driver_license', $request['driver_license']);
                }
                if(isset($request['passport']) && $request['driver_license'] != '')
                {
                    $bos2_row_count->orWhere('passport', $request['passport']);
                } 
                if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                {
                    $bos2_row_count->orWhere('medicare_card', $request['medicare_card']);
                }

            })->get()->count();

            $mim_row_count = MIM::where(function($mim_row_count) use ($request){
                if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'MIM')
                {
                    $mim_row_count->where('client_id', $request['client_id']);
                }
                if(isset($request['crn']) && $request['crn'] != '')
                {
                    $mim_row_count->orWhere('crn_number', $request['crn']);
                }
                if(isset($request['driver_license']) && $request['driver_license'] != '')
                {
                    $mim_row_count->orWhere('licence_number', $request['driver_license']);
                }
                if(isset($request['passport']) && $request['driver_license'] != '')
                {
                    $mim_row_count->orWhere('passport_no', $request['passport']);
                } 
                if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                {
                    $mim_row_count->orWhere('medicare_no', $request['medicare_card']);
                } 
            })->get()->count();


          
        $rcs_row_count = RCS::where(function($rcs) use ($request){
                if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'RCS')
                {
                    $rcs->where('client_id', $request['client_id']);
                }


                if(isset($request['crn']) && $request['crn'] != '')
                {
                    $rcs->orWhere('crn', $request['crn']);
                }
                if(isset($request['driver_license']) && $request['driver_license'] != '')
                {
                    $rcs->orWhere('driver_license', $request['driver_license']);
                }
                if(isset($request['passport']) && $request['driver_license'] != '')
                {
                    $rcs->orWhere('passport', $request['passport']);
                } 
                if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                {
                    $rcs->orWhere('medicare_card', $request['medicare_card']);
                }
                })->get()->count();

            $bos1_row_count = $bos1_row_count > 0 ? 1 : 0;
            $bos2_row_count = $bos2_row_count > 0 ? 1 : 0;
            $mim_row_count = $mim_row_count > 0 ? 1 : 0;
            $rcs_row_count = $rcs_row_count > 0 ? 1 : 0; 

            $match_result_array = array();

            $bos1_total_percentage = 0;

           

            if($bos1_row_count > 0)
            {
                $bos1_data = BOS1::where(function($bos1_data) use ($request){
                    if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'BOS1' )
                    {
                        $bos1_data->where('client_id', $request['client_id']);
                    }
                    if(isset($request['crn']) && $request['crn'] != '')
                    {
                        $bos1_data->orWhere('crn', $request['crn']);
                    }
                    if(isset($request['driver_license']) && $request['driver_license'] != '')
                    {
                        $bos1_data->orWhere('driver_license', $request['driver_license']);
                    }
                    if(isset($request['passport']) && $request['driver_license'] != '')
                    {
                        $bos1_data->orWhere('passport', $request['passport']);
                    } 
                    if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                    {
                        $bos1_data->orWhere('medicare_card', $request['medicare_card']);
                    }
                })->get();

                $bos1_total_percentage = 100;


                $bos1_data_matching_fields = DB::table('data_matching_fields')->where('system_name','BOS1')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

                foreach ($request as $requestkey => $requestvalue) {
                    $field = $requestkey;
                    if(array_key_exists($requestkey,$bos1_data_matching_fields))
                    {    
                        if(isset($bos1_data[0]->$field) && $bos1_data[0]->$field != '')
                        {
                            if($request[$requestkey] != $bos1_data[0]->$field )
                            {   
                                $bos1_total_percentage = $bos1_total_percentage - $bos1_data_matching_fields[$requestkey];
                            }
                        }

                    }
                }

                if($bos1_total_percentage != '' && $bos1_total_percentage > 0)
                {
                    $bos1_total_percentage =  number_format((float)$bos1_total_percentage, 2, '.', '');
                }

                $match_result_array['bos1_matched_id'] = $bos1_data[0]->client_id;
                $match_result_array['bos1_total_percentage'] = $bos1_total_percentage;



            }

            if($bos2_row_count > 0)
            {
                $bos2_data = BOS2::where(function($bos2_data) use ($request){
                    if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'BOS2')
                    {
                        $bos2_data->where('client_id', $request['client_id']);
                    }
                    if(isset($request['crn']) && $request['crn'] != '')
                    {
                        $bos2_data->orWhere('crn', $request['crn']);
                    }
                    if(isset($request['driver_license']) && $request['driver_license'] != '')
                    {
                        $bos2_data->orWhere('driver_license', $request['driver_license']);
                    }
                    if(isset($request['passport']) && $request['driver_license'] != '')
                    {
                        $bos2_data->orWhere('passport', $request['passport']);
                    } 
                    if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                    {
                        $bos2_data->orWhere('medicare_card', $request['medicare_card']);
                    }
                })->get();

                $bos2_total_percentage = 100;

                $bos2_data_matching_fields = DB::table('data_matching_fields')->where('system_name','BOS2')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

                foreach ($request as $requestkey => $requestvalue) {
                    $field = $requestkey;
                    if(array_key_exists($requestkey,$bos2_data_matching_fields))
                    {    
                        if(isset($bos2_data[0]->$field) && $bos2_data[0]->$field != '')
                        {
                            if($request[$requestkey] != $bos2_data[0]->$field )
                            {   
                                $bos2_total_percentage = $bos2_total_percentage - $bos2_data_matching_fields[$requestkey];
                            }
                        }

                    }
                }

                if($bos2_total_percentage != '' && $bos2_total_percentage > 0)
                {
                    $bos2_total_percentage =  number_format((float)$bos2_total_percentage, 2, '.', '');
                }

                $match_result_array['bos2_matched_id'] = $bos2_data[0]->client_id;
                $match_result_array['bos2_total_percentage'] = $bos2_total_percentage ;
            }

            $mim_total_percentage = 0;
            if($mim_row_count > 0)
            {
                $mim_data = MIM::where(function($mim_data) use ($request){
                    if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'MIM')
                    {
                        $mim_data->where('client_id', $request['client_id']);
                    }

                    if(isset($request['crn']) && $request['crn'] != '' )
                    {
                        $mim_data->orWhere('crn_number', $request['crn']);
                    }
                    if(isset($request['driver_license']) && $request['driver_license'] != '')
                    {
                        $mim_data->orWhere('licence_number', $request['driver_license']);
                    }
                    if(isset($request['passport']) && $request['driver_license'] != '')
                    {
                        $mim_data->orWhere('passport_no', $request['passport']);
                    } 
                    if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                    {
                        $mim_data->orWhere('medicare_no', $request['medicare_card']);
                    }
                })->get();
                
                $mim_total_percentage = 100;

                   $mim_data_matching_fields = DB::table('data_matching_fields')->where('system_name','MIM')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

                foreach ($request as $requestkey => $requestvalue) {
                    $field = $requestkey;
                    if(array_key_exists($requestkey,$mim_data_matching_fields))
                    {    
                        if(isset($mim_data[0]->$field) && $mim_data[0]->$field != '')
                        {
                            if($request[$requestkey] != $mim_data[0]->$field )
                            {   
                                $mim_total_percentage = $mim_total_percentage - $mim_data_matching_fields[$requestkey];
                            }
                        }

                    }
                }


                if($mim_total_percentage != '' && $mim_total_percentage > 0)
                {
                    $mim_total_percentage =  number_format((float)$mim_total_percentage, 2, '.', '');
                }

                $match_result_array['mim_matched_id'] = $mim_data[0]->client_id; 
                $match_result_array['mim_total_percentage'] = $mim_total_percentage; 
            } 
            $rcs_total_percentage = 0;
            
            if($rcs_row_count > 0)
            {
                $rcs_data = RCS::where(function($rcs_data) use ($request){
                    if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'RCS')
                    {
                        $rcs_data->where('client_id', $request['client_id']);
                    }
                    if(isset($request['crn']) && $request['crn'] != '')
                    {
                        $rcs_data->orWhere('crn', $request['crn']);
                    }
                    if(isset($request['driver_license']) && $request['driver_license'] != '')
                    {
                        $rcs_data->orWhere('driver_license', $request['driver_license']);
                    }
                    if(isset($request['passport']) && $request['driver_license'] != '')
                    {
                        $rcs_data->orWhere('passport', $request['passport']);
                    } 
                    if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                    {
                        $rcs_data->orWhere('medicare_card', $request['medicare_card']);
                    }
                })->get();


                $rcs_total_percentage = 100;

                $rcs_data_matching_fields = DB::table('data_matching_fields')->where('system_name','MIM')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

                foreach ($request as $requestkey => $requestvalue) {
                    $field = $requestkey;
                    if(array_key_exists($requestkey,$rcs_data_matching_fields))
                    {    
                        if(isset($rcs_data[0]->$field) && $rcs_data[0]->$field != '')
                        {
                            if($request[$requestkey] != $rcs_data[0]->$field )
                            {   
                                $rcs_total_percentage = $rcs_total_percentage - $rcs_data_matching_fields[$requestkey];
                            }
                        }

                    }
                }
                if($rcs_total_percentage != '' && $rcs_total_percentage > 0)
                {
                    $rcs_total_percentage =  number_format((float)$rcs_total_percentage, 2, '.', '');
                }

                $match_result_array['rcs_matched_id'] = $rcs_data[0]->client_id; 
                $match_result_array['rcs_total_percentage'] = $rcs_total_percentage; 

            }


            if(!isset($match_result_array['bos1_matched_id']))
            {
                $match_result_array['bos1_matched_id'] = 0;
                $match_result_array['bos1_total_percentage'] = '0';
            }

            if(!isset($match_result_array['bos2_matched_id']))
            {
                $match_result_array['bos2_matched_id'] = 0;
                $match_result_array['bos2_total_percentage'] = '0';
            }

            if(!isset($match_result_array['mim_matched_id']))
            {
                $match_result_array['mim_matched_id'] = 0;
                $match_result_array['mim_total_percentage'] = '0';
            }

            if(!isset($match_result_array['rcs_matched_id']))
            {
                $match_result_array['rcs_matched_id'] = 0;
                $match_result_array['rcs_total_percentage'] = '0';
            }

            $countMatch = MatchResults::where('requested_clientid',$request['client_id'])->where('system_name',$request['system'])->get()->count();



            if($countMatch > 0)
            {

                $OldArray = MatchResults::where('requested_clientid',$request['client_id'])->where('system_name',$request['system'])->get()->toArray();

                $logs = array('client_id'=>$request['client_id'],'description'=>json_encode($OldArray),'category'=>'Updated Match Result');
                $cleintLogs = MatchResultLogs::insert($logs);
                $updateDetails = [
                    'bos1_client_id'=>$match_result_array['bos1_matched_id'],
                    'bos1_per' => $match_result_array['bos1_total_percentage'],
                    'bos2_client_id' => $match_result_array['bos2_matched_id'],
                    'bos2_per' => $match_result_array['bos2_total_percentage'],
                    'mim_client_id' => $match_result_array['mim_matched_id'],
                    'mim_per' => $match_result_array['mim_total_percentage'],
                    'rcs_client_id' => $match_result_array['rcs_matched_id'],
                    'rcs_per' => $match_result_array['rcs_total_percentage'],
                    'requested_clientid' => $request['client_id'],
                    'system_name' => $request['system']
                ];


			 DB::table('match_results')
                ->where('requested_clientid', $request['client_id'])
                ->where('system_name',$request['system'])
                ->update($updateDetails);



               
                // $response['status'] = 200;   
                // $response['message'] = 'Updated';
                // $response['result'] = $updateDetails;

            }
            else
            {
                $matchresults = new MatchResults();
                $matchresults->bos1_client_id = $match_result_array['bos1_matched_id'];
                $matchresults->bos1_per = $match_result_array['bos1_total_percentage'];
                $matchresults->bos2_client_id = $match_result_array['bos2_matched_id'];
                $matchresults->bos2_per = $match_result_array['bos2_total_percentage'];
                $matchresults->mim_client_id = $match_result_array['mim_matched_id'];
                $matchresults->mim_per = $match_result_array['mim_total_percentage'];
                $matchresults->rcs_client_id = $match_result_array['rcs_matched_id'];
                $matchresults->rcs_per = $match_result_array['rcs_total_percentage'];
                $matchresults->requested_clientid = $request['client_id'];
                $matchresults->system_name = $request['system'];
                $matchresults->save();

               
                $arrayNew = array(
                    'bos1_client_id'=>$match_result_array['bos1_matched_id'],
                    'bos1_per'=>$match_result_array['bos1_total_percentage'],
                    'bos2_client_id'=>$match_result_array['bos2_matched_id'],
                    'bos2_per'=>$match_result_array['bos2_total_percentage'],
                    'mim_client_id'=>$match_result_array['mim_matched_id'],
                    'mim_per'=>$match_result_array['mim_total_percentage'],
                    'rcs_client_id'=>$match_result_array['rcs_matched_id'],
                    'rcs_per'=>$match_result_array['rcs_total_percentage'],
                    'requested_clientid'=>$request['client_id'],
                    'system_name'=>$request['system']
                );
                $logs = array('client_id'=>$request['client_id'],'description'=>json_encode($arrayNew),'category'=>'Added Match Result');
                $cleintLogs = MatchResultLogs::insert($logs);

 
                // $response['status'] = 200;   
                // $response['message'] = 'Added';
                // $response['result'] = $arrayNew;
            }

             // $arraydata  = array('countMatch' => $countMatch , 'cid' =>$request['client_id'] , 'snmae'=>$request['system'] );

             // $logs = array('client_id'=>'7777','description'=>json_encode($arraydata),'category'=>'Added Custom Match Result');
             //    $cleintLogs = MatchResultLogs::insert($logs); 

            	

       

           // return response()->json($response); 
        // }
        // catch (\Exception $e) { 
        //     $response['status'] = 400;
        //     $response['message'] = $e; 
        // }



       
    }


    public function get_system_rows_count_by_client_id_and_system()
    {
        $bos1_row_count = BOS1::where(function($bos1_row_count) use ($request){
                if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'BOS1')
                {
                    $bos1_row_count->where('client_id', $request['client_id']);
                }
                if(isset($request['crn']) && $request['crn'] != '')
                {
                    $bos1_row_count->orWhere('crn', $request['crn']);
                }
                if(isset($request['driver_license']) && $request['driver_license'] != '')
                {
                    $bos1_row_count->orWhere('driver_license', $request['driver_license']);
                }
                if(isset($request['passport']) && $request['driver_license'] != '')
                {
                    $bos1_row_count->orWhere('passport', $request['passport']);
                } 
                if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                {
                    $bos1_row_count->orWhere('medicare_card', $request['medicare_card']);
                }
            })->get()->count();
    }

	// public static function matchDatanew($system,$request)
	// {
	// 	$prev_data = json_encode($request); 
	// 	$logs = array('system_id'=>12121210,'system_name'=>'BOS1','client_id'=>2121121,'action_performed'=>'Update','previous_data'=>$request['client_id']);

	// 	$cleintLogs = ClientLogs::insert($logs);
	// }


	

}