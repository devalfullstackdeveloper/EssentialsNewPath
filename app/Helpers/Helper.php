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
use App\Models\MatchResult;
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

  public static function MatchData1($data,$systems){
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

  
  public static function matchData($system,$request)
    {       
    
     
     
        // try {

      if(isset($system) && $system == 'MIM' || isset($request['system']) && $request['system'] == 'MIM' ) 
      {
        $request['name_first'] = $request['first_name'];
        $request['name_last'] = $request['last_name'];
        $request['crn'] = $request['crn_number'];
        $request['driver_license'] = $request['driver_license_no'];
        $request['passport'] = $request['passport_no'];
        $request['medicare_card'] = $request['medicare_no'];
        $request['phone'] = $request['home_phone'];
        $request['mobile'] = $request['mobile_phone'];
        $request['address'] = $request['address1'];
        $request['delivery_address'] = $request['address2'];
      }
      else
      {

        $request['first_name'] = $request['name_first'];
        $request['last_name'] = $request['name_last'];
        $request['crn_number'] = $request['crn'];
        $request['driver_license_no'] = $request['driver_license'];
        $request['passport_no'] =  $request['passport'];
        $request['medicare_no'] = $request['medicare_card'];
        $request['home_phone'] = $request['phone'];
        $request['mobile_phone'] = $request['mobile'];
        $request['address1'] = $request['address'];
        $request['address2'] = $request['delivery_address'];
      }
     

    

            $arrayMatch = array(); 
            $call = new Helper;
            $bos1_row_count = $call->get_system_rows_count_by_client_id_and_system('BOS1',$request,1);
            $bos2_row_count = $call->get_system_rows_count_by_client_id_and_system('BOS2',$request,1);
            $mim_row_count = $call->get_system_rows_count_by_client_id_and_system('MIM',$request,1);
            $rcs_row_count = $call->get_system_rows_count_by_client_id_and_system('RCS',$request,1);

            $bos1_row_count = $bos1_row_count > 0 ? 1 : 0;
            $bos2_row_count = $bos2_row_count > 0 ? 1 : 0;
            $mim_row_count = $mim_row_count > 0 ? 1 : 0;
            $rcs_row_count = $rcs_row_count > 0 ? 1 : 0; 
            $match_result_array = array();

           $requested_client_id = $request['client_id'];
           $requested_system = $request['system'];
            

            $bos1_total_percentage = 0;

             
            if($bos1_row_count > 0)
            {
                $bos1 = $call->checkresult($request,'BOS1');

                foreach ($bos1[1] as $bkey => $bvalue) {      
              
                      $getClientId = BOS1::where('bos1_id',$bkey)->first();
                      $matched_client_id = $getClientId->client_id;
                      $matched_percentage = $bvalue['percentage'];
                      $matched_system = $bvalue['Matched_System'];

                      $check_if_record_exist_in_match_table = MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->get()->count();
                    
                      $one_decimal_place = number_format($matched_percentage, 1);
                      if($check_if_record_exist_in_match_table > 0)
                      {
                          
                          $matched_Data = MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->first();


                        $updateDetails = [
                          'confidence_level' => $one_decimal_place
                        ];

                        DB::table('match_result')
                        ->where('match_result_id', $matched_Data->match_result_id)
                        ->update($updateDetails);

                      }
                      else
                      {
                       
                        $matchresults = new MatchResult();
                        $matchresults->requested_client_id = $requested_client_id;
                        $matchresults->requested_system = $requested_system;
                        $matchresults->matched_system = 'BOS1';
                        $matchresults->matched_client_id = $matched_client_id;
                        $matchresults->confidence_level = $one_decimal_place;
                        if($matched_client_id != $requested_client_id && $check_if_record_exist_in_match_table < 1 )
                        {
                          
                          $matchresults->save();  
                        } 

                      }
                }
              
            } 

           
 

            if($bos2_row_count > 0)
            {
               $bos2 = $call->checkresult($request,'BOS2');


               foreach ($bos2[1] as $bkey => $bvalue) {
                        
                      $getClientId = BOS2::where('bos2_id',$bkey)->first();

                       $matched_client_id = $getClientId->client_id;
                      $matched_percentage = $bvalue['percentage'];
                      $matched_system = $bvalue['Matched_System'];
                      $check_if_record_exist_in_match_table = MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->get()->count();
                      $one_decimal_place = number_format($matched_percentage, 1);
                      if($check_if_record_exist_in_match_table > 0)
                      {

                        $matched_Data = MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->first();

                        $updateDetails = [
                          'confidence_level' => $one_decimal_place
                        ];

                        DB::table('match_result')
                        ->where('match_result_id', $matched_Data->match_result_id)
                        ->update($updateDetails);

                      }
                      else
                      {
                        $matchresults = new MatchResult();
                        $matchresults->requested_client_id = $requested_client_id;
                        $matchresults->requested_system = $requested_system;
                        $matchresults->matched_system = 'BOS2';
                        $matchresults->matched_client_id = $matched_client_id;
                        $matchresults->confidence_level = $one_decimal_place;
                        if($matched_client_id != $requested_client_id && $check_if_record_exist_in_match_table < 1 )
                        {
                          $matchresults->save();  
                        }

                       
                      }
                }
            }


            
            $mim_total_percentage = 0;
            if($mim_row_count > 0)
            {
              $mim = $call->checkresult($request,'MIM');
             
              foreach ($mim[1] as $bkey => $bvalue) {
                        
                      $getClientId = MIM::where('MIM_id',$bkey)->first();
                  
                       $matched_client_id = $getClientId->client_id;
                      $matched_percentage = $bvalue['percentage'];
                      $matched_system = $bvalue['Matched_System'];

                     $check_if_record_exist_in_match_table = MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->get()->count();

                      $one_decimal_place = number_format($matched_percentage, 1);

                     
                      if($check_if_record_exist_in_match_table > 0)
                      {
                        
                          $matched_Data =   MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->first();
                        $updateDetails = [
                          'confidence_level' => $one_decimal_place
                        ];

                        DB::table('match_result')
                        ->where('match_result_id', $matched_Data->match_result_id)
                        ->update($updateDetails);
                      }
                      else
                      {
                         $matchresults = new MatchResult();
                        $matchresults->requested_client_id = $requested_client_id;
                        $matchresults->requested_system = $requested_system;
                        $matchresults->matched_system = 'MIM';
                        $matchresults->matched_client_id = $matched_client_id;
                        $matchresults->confidence_level = $one_decimal_place;
                        if($matched_client_id != $requested_client_id && $check_if_record_exist_in_match_table < 1)
                        { 
                          $matchresults->save();  
                        }

                      }
                }

             
            } 


            $rcs_total_percentage = 0; 
            
            if($rcs_row_count > 0)
            {




                $rcs = $call->checkresult($request,'RCS');

                foreach ($rcs[1] as $bkey => $bvalue) {
                        
                      $getClientId = RCS::where('rcs_id',$bkey)->first();
                      
                      $matched_client_id = $getClientId->client_id;
                      $matched_percentage = $bvalue['percentage'];
                      $matched_system = $bvalue['Matched_System'];


                     $check_if_record_exist_in_match_table = MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->get()->count();


                      $one_decimal_place = number_format($matched_percentage, 1);
                      if($check_if_record_exist_in_match_table > 0)
                      {
                        
                          $matched_Data =   MatchResult::where('requested_client_id',$requested_client_id)->where('requested_system',$requested_system)->where('matched_system',$matched_system)->where('matched_client_id',$matched_client_id)->first();
                        $updateDetails = [
                          'confidence_level' => $one_decimal_place
                        ];

                        DB::table('match_result')
                        ->where('match_result_id', $matched_Data->match_result_id)
                        ->update($updateDetails);
                      }
                      else
                      {
                         $matchresults = new MatchResult();
                        $matchresults->requested_client_id = $requested_client_id;
                        $matchresults->requested_system = $requested_system;
                        $matchresults->matched_system = 'RCS';
                        $matchresults->matched_client_id = $matched_client_id;
                        $matchresults->confidence_level = $one_decimal_place;
                        if($matched_client_id != $requested_client_id && $check_if_record_exist_in_match_table < 1 )
                        {
                          $matchresults->save();  
                        }

                      }
                }

               
            } 

          


    }


    public static function get_system_rows_count_by_client_id_and_system($system,$request,$is_count)
    {

    

        //Is_count pass 1 if we want count of data , else result set will be returned

        $model_prefix="App\Models";
        $type = $system;
        $modal = $model_prefix.'\\'.$type; 
        $input = $request;
        $count = $is_count > 0 ? '->count()' : '';
        if($system == 'MIM') 
        {
             if(isset($input['crn']))
             {
                $input['crn_number'] = $input['crn'];
             }

             if(isset($input['driver_license']))
             {
                $input['driver_license_no'] = $input['driver_license'];
            }
            if(isset($input['passport']))
            {
                $input['passport_no'] = $input['passport'];
            }
            if(isset($input['medicare_card']))
            {
                 $input['medicare_no'] = $input['medicare_card'];
            }    

        }    
        
        $default_data_matching_fields = DB::table('data_matching_fields')->where('system_name',$system)->where('status','Active')->where('is_default_search','1')->pluck('field_name')->toArray();

        $row_count = $modal::where(function($row_count) use ($request,$input,$default_data_matching_fields){
          foreach ($input as $request_input_key => $request_input_value) {
           
            if(in_array($request_input_key,$default_data_matching_fields))
            {
               if(isset($input[$request_input_key]) && $input[$request_input_key] != '' )
               {
                $row_count->orWhere($request_input_key, $request_input_value);
            }
        }
    }
})->get();


    if($is_count > 0)
        {
             return count($row_count);
        }
        else
        {
            return $row_count;
        }
       
    } 


    //  public function checkresult($request,$system)
    // {
    //     $system_count = Helper::get_system_rows_count_by_client_id_and_system($system,$request,1);
    //     $system_data = Helper::get_system_rows_count_by_client_id_and_system($system,$request,0);
    //     $request_data = $request;
    //     $system_total_array = array();
    //     $system_total_percentage = 100;
    //     $system_data_matching_fields = DB::table('data_matching_fields')->where('system_name',$system)->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();
    //     foreach ($system_data as $key => $value) {

    //             foreach ($request_data as $requestkey => $requestvalue) {
    //                 if(array_key_exists($requestkey,$system_data_matching_fields))
    //                 {    
                        
    //                     if(isset($system_data[$key]->$requestkey) && $system_data[$key]->$requestkey != '')
    //                     {

    //                         if($request[$requestkey] != $system_data[$key]->$requestkey )
    //                         {   

    //                             $system_total_percentage = $system_total_percentage - $system_data_matching_fields[$requestkey];
    //                         }
    //                     }
    //                     if($system_data[$key]->$requestkey == '' )
    //                         {   
                            
    //                             $system_total_percentage = $system_total_percentage - $system_data_matching_fields[$requestkey];
    //                         }

    //                     if($system_total_percentage != '' && $system_total_percentage > 0)
    //                     {
    //                         $system_total_percentage =  number_format((float)$system_total_percentage, 2, '.', '');
    //                     }
    //                 }

    //                     if($system == 'BOS1')
    //                     {
    //                         $system_total_array[$value->bos1_id] = $system_total_percentage;
    //                     }
    //                     else if($system == 'BOS2')
    //                     {
    //                         $system_total_array[$value->bos2_id] = $system_total_percentage;
    //                     }
    //                     else if($system == 'MIM')
    //                     {
    //                         $system_total_array[$value->MIM_id] = $system_total_percentage;
    //                     }
    //                     else if($system == 'RCS')
    //                     {
    //                         $system_total_array[$value->rcs_id] = $system_total_percentage;
    //                     }

                        
    //             }

    //     }
    //     arsort($system_total_array);
    //      $max = max($system_total_array); 
    //     $key_of_max = key($system_total_array);

    //     $max_array = array($key_of_max,$max);

    //     return $max_array;
    // }


    public function checkresult($request,$system)
    { 
        
     
        $model_prefix="App\Models";
        $type = $system;
        $modal = $model_prefix.'\\'.$type;

        $system_data = $modal::search($request);
       
        $request_data = $request;
        $system_total_array = array();
       // $system_total_percentage = 100;
      $system_data_matching_fields = DB::table('data_matching_fields')->where('system_name',$system)->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

      $unmatched_request = array();
      $unmatched_data = array();
        if(!empty($system_data) && count($system_data) > 0) {
            foreach ($system_data as $key => $value) {
                //echo " System $system < $key > => [ $value ] ";
                $system_total_percentage = 100;

              

                foreach ($request_data as $requestkey => $requestvalue) {
                    //echo " Request $system < $requestkey > => [ $requestvalue ] ";


                   
                    if(array_key_exists($requestkey,$system_data_matching_fields))
                    {    
                        
                        if(isset($system_data[$key]->$requestkey) && $system_data[$key]->$requestkey != '')
                        {

                            if($request[$requestkey] != $system_data[$key]->$requestkey )
                            {   

                                //$unmatched_request[$system][] = array('requestkey'=>$requestkey);

                          $system_total_percentage = $system_total_percentage - $system_data_matching_fields[$requestkey];
                         
                          // echo $system. "=====" .$request[$requestkey]. "=====" .$requestkey. "=========" .$system_data[$key]->$requestkey. "=====" .$system_total_percentage. "=====" .$system_data_matching_fields[$requestkey]. "=====" .$key ."======".'\n'; 
                         
                           
                            \Log::info($system. "=====" .$request[$requestkey]. "=====" .$requestkey. "=========" .$system_data[$key]->$requestkey. "=====" .$system_total_percentage. "=====" .$system_data_matching_fields[$requestkey]. "=====" .$key ."======".'\n');
                            }

                            
                             
                        }
                        // if($system_data[$key]->$requestkey == '' )
                        //     {   
                            
                        //         $system_total_percentage = $system_total_percentage - $system_data_matching_fields[$requestkey];
                        //     }

                        if($system_total_percentage != '' && $system_total_percentage > 0)
                        {
                            $system_total_percentage =  number_format((float)$system_total_percentage, 2, '.', '');
                        }
                    }

                        if($system == 'BOS1')
                        {
                           $system_total_array[$value->bos1_id] = array('percentage' => $system_total_percentage , 'Matched_System' => 'BOS1' ,'MatchedId'=>$value->bos1_id);  
                        } 
                        else if($system == 'BOS2')
                        {
                            $system_total_array[$value->bos2_id] = array('percentage' => $system_total_percentage , 'Matched_System' => 'BOS2','MatchedId'=>$value->bos2_id);
                            
                            
                            
                        }
                        else if($system == 'MIM')
                        {
                            $system_total_array[$value->MIM_id] = array('percentage' => $system_total_percentage , 'Matched_System' => 'MIM','MatchedId'=>$value->MIM_id  );
                            
                        }
                        else if($system == 'RCS')
                        {
                            $system_total_array[$value->rcs_id] = array('percentage' => $system_total_percentage , 'Matched_System' => 'RCS','MatchedId'=>$value->rcs_id  );
                            
                        }

                        
                }

        }
        } 

      
        /*
        arsort($system_total_array);
         $max = max($system_total_array); 
    $key_of_max = key($system_total_array);

    $max_array = array($key_of_max,$max);
        */

        $key_of_max = key($system_total_array);

        $max_array = array($key_of_max,$system_total_array);



        return $max_array;
    }


}