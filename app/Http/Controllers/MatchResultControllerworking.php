<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BOS1;
use App\Models\BOS2;
use App\Models\MIM;
use App\Models\RCS;
use App\Models\MatchResult;
use DB;
class MatchResultController extends Controller
{
	function __construct()
	{ 

	}

	public function index(){
		return view('matchresult.index');
	}


	public function matchresultData(Request $request){
		$matchresult = MatchResult::all();
		$draw = $request->draw;
		$row = $request->start;
		$rowperpage = $request->length; // Rows display per page
		
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		
		$totalRecords = MatchResult::all()->count();

		
		$data = array();
		if($columnName == 'action'){
			$matchresult = MatchResult::offset($row)->limit($rowperpage)->get();
			$matchresultCnt = MatchResult::all()->count();
		}else{
			$matchresult = MatchResult::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
			$matchresultCnt = MatchResult::all()->count();
		}
				

		
		foreach ($matchresult as $bk => $rcsVal) {

			$requested_client_data = array();
			$matched_client_data = array();

				$matched_client_data = '';
				$first_name = '';
				$middle_name = '';
				$last_name = '';

				if($rcsVal['matched_system'] == 'BOS1')
				{
					$system_data_matching_fields = DB::table('data_matching_fields')->where('system_name','BOS1')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

					$model_prefix="App\Models";
					$type = $rcsVal['requested_system'];
					$modal = $model_prefix.'\\'.$type;
						$requested_client_data = $modal::where('client_id',$rcsVal['requested_client_id'])->first();
						
						if($type == 'MIM')
						{
							$requested_client_data['name_first'] = $requested_client_data['first_name'];
							$requested_client_data['name_middle'] = $requested_client_data['middle_name'];
							$requested_client_data['name_last'] = $requested_client_data['last_name'];

						}

						$matched_client_data = BOS1::where('client_id',$rcsVal['matched_client_id'])->first();


				
						if($matched_client_data['matched_system'] == 'MIM')
						{

							
							$matched_client_data['name_first'] = $matched_client_data['first_name'];
							$matched_client_data['name_middle'] = $matched_client_data['middle_name'];
							$matched_client_data['name_last'] = $matched_client_data['last_name'];
							$matched_client_data['adrress'] = $matched_client_data['address1'];
							$matched_client_data['delivery_address'] = $matched_client_data['address2'];
							$matched_client_data['mobile'] = $matched_client_data['mobile_phone'];
							$matched_client_data['phone'] = $matched_client_data['home_phone'];
							$matched_client_data['crn'] = $matched_client_data['crn_number'];
							$matched_client_data['driver_licence'] = $matched_client_data['driver_licence_no'];
							$matched_client_data['passport'] = $matched_client_data['passport_no'];
							$matched_client_data['medicare_card'] = $matched_client_data['medicare_card_no'];
						}

				}
				elseif($rcsVal['matched_system'] == 'BOS2')
				{
					
					$model_prefix="App\Models";
					$type = $rcsVal['requested_system'];
					$modal = $model_prefix.'\\'.$type;
						$requested_client_data = $modal::where('client_id',$rcsVal['requested_client_id'])->first();
						
						if($type == 'MIM')
						{
							$requested_client_data['name_first'] = $requested_client_data['first_name'];
							$requested_client_data['name_middle'] = $requested_client_data['middle_name'];
							$requested_client_data['name_last'] = $requested_client_data['last_name'];
						}
					$matched_client_data = BOS2::where('client_id',$rcsVal['matched_client_id'])->first();

						if($matched_client_data['matched_system'] == 'MIM')
						{
							$matched_client_data['name_first'] = $matched_client_data['first_name'];
							$matched_client_data['name_middle'] = $matched_client_data['middle_name'];
							$matched_client_data['name_last'] = $matched_client_data['last_name'];
							$matched_client_data['adrress'] = $matched_client_data['address1'];
							$matched_client_data['delivery_address'] = $matched_client_data['address2'];
							$matched_client_data['mobile'] = $matched_client_data['mobile_phone'];
							$matched_client_data['phone'] = $matched_client_data['home_phone'];
							$matched_client_data['crn'] = $matched_client_data['crn_number'];
							$matched_client_data['driver_licence'] = $matched_client_data['driver_licence_no'];
							$matched_client_data['passport'] = $matched_client_data['passport_no'];
							$matched_client_data['medicare_card'] = $matched_client_data['medicare_card_no'];
						}

				}
				elseif($rcsVal['matched_system'] == 'MIM')
				{
					
					$model_prefix="App\Models";
					$type = $rcsVal['requested_system'];
					$modal = $model_prefix.'\\'.$type;
						$requested_client_data = $modal::where('client_id',$rcsVal['requested_client_id'])->first();
						
						if($type == 'MIM')
						{
							$requested_client_data['name_first'] = $requested_client_data['first_name'];
							$requested_client_data['name_middle'] = $requested_client_data['middle_name'];
							$requested_client_data['name_last'] = $requested_client_data['last_name'];
						}

					$matched_client_data = MIM::where('client_id',$rcsVal['matched_client_id'])->first();


						
						if($matched_client_data['matched_system'] == 'MIM')
						{
							$matched_client_data['name_first'] = $matched_client_data['first_name'];
							$matched_client_data['name_middle'] = $matched_client_data['middle_name'];
							$matched_client_data['name_last'] = $matched_client_data['last_name'];
							$matched_client_data['adrress'] = $matched_client_data['address1'];
							$matched_client_data['delivery_address'] = $matched_client_data['address2'];
							$matched_client_data['mobile'] = $matched_client_data['mobile_phone'];
							$matched_client_data['phone'] = $matched_client_data['home_phone'];
							$matched_client_data['crn'] = $matched_client_data['crn_number'];
							$matched_client_data['driver_licence'] = $matched_client_data['driver_licence_no'];
							$matched_client_data['passport'] = $matched_client_data['passport_no'];
							$matched_client_data['medicare_card'] = $matched_client_data['medicare_card_no'];
						}

				}
				elseif($rcsVal['matched_system'] == 'RCS')
				{

					$model_prefix="App\Models";
					$type = $rcsVal['requested_system'];
					$modal = $model_prefix.'\\'.$type;
						$requested_client_data = $modal::where('client_id',$rcsVal['requested_client_id'])->first();
						
						if($type == 'MIM')
						{
							$requested_client_data['name_first'] = $requested_client_data['first_name'];
							$requested_client_data['name_middle'] = $requested_client_data['middle_name'];
							$requested_client_data['name_last'] = $requested_client_data['last_name'];
						}

					$matched_client_data = RCS::where('client_id',$rcsVal['matched_client_id'])->first();


						if($matched_client_data['matched_system'] == 'MIM')
						{


							$matched_client_data['name_first'] = $matched_client_data['first_name'];
							$matched_client_data['name_middle'] = $matched_client_data['middle_name'];
							$matched_client_data['name_last'] = $matched_client_data['last_name'];
							$matched_client_data['adrress'] = $matched_client_data['address1'];
							$matched_client_data['delivery_address'] = $matched_client_data['address2'];
							$matched_client_data['mobile'] = $matched_client_data['mobile_phone'];
							$matched_client_data['phone'] = $matched_client_data['home_phone'];
							$matched_client_data['crn'] = $matched_client_data['crn_number'];
							$matched_client_data['driver_licence'] = $matched_client_data['driver_licence_no'];
							$matched_client_data['passport'] = $matched_client_data['passport_no'];
							$matched_client_data['medicare_card'] = $matched_client_data['medicare_card_no'];
						}
					
				}


if($matched_client_data['system'] == 'MIM')
						{
							$matched_client_data['name_first'] = $matched_client_data['first_name'];
							$matched_client_data['name_middle'] = $matched_client_data['middle_name'];
							$matched_client_data['name_last'] = $matched_client_data['last_name'];
							$matched_client_data['adrress'] = $matched_client_data['address1'];
							$matched_client_data['delivery_address'] = $matched_client_data['address2'];
							$matched_client_data['mobile'] = $matched_client_data['mobile_phone'];
							$matched_client_data['phone'] = $matched_client_data['home_phone'];
							$matched_client_data['crn'] = $matched_client_data['crn_number'];
							$matched_client_data['driver_licence'] = $matched_client_data['driver_licence_no'];
							$matched_client_data['passport'] = $matched_client_data['passport_no'];
							$matched_client_data['medicare_card'] = $matched_client_data['medicare_card_no'];
						}


	

 
			$data[] = array( 
				"requested_client_id"=>$requested_client_data['client_id'],
				"requested_system"=>$requested_client_data['system'],
				"requested_title"=>$requested_client_data['title'],
				"requested_first_name"=>$requested_client_data['name_first'],
				"requested_middle_name"=>$requested_client_data['name_middle'],
				"requested_last_name"=>$requested_client_data['name_last'],
				"requested_address"=>$requested_client_data['address'],
				"requested_delivery_address"=>$requested_client_data['delivery_address'],
				"requested_dob"=>$requested_client_data['dob'],
				"requested_phone"=>$requested_client_data['phone'],
				"requested_mobile"=>$requested_client_data['mobile'],
				"requested_email"=>$requested_client_data['email'],
				"requested_crn"=>$requested_client_data['crn'],
				"requested_driver_licence"=>$requested_client_data['driver_licence'],
				"requested_passport"=>$requested_client_data['passport'],
				"requested_medicare_card_no"=>$requested_client_data['medicare_card'],
				"requested_medicare_card_reference"=>$requested_client_data['medicare_card_reference'],
				"matched_client_id"=>$matched_client_data['client_id'],
				"matched_system"=>$matched_client_data['system'],
				"matched_title"=>$matched_client_data['title'],
				"matched_first_name"=>$matched_client_data['name_first'],
				"matched_middle_name"=>$matched_client_data['name_middle'],
				"matched_last_name"=>$matched_client_data['name_last'],
				"matched_address"=>$matched_client_data['address'],
				"matched_delivery_address"=>$matched_client_data['delivery_address'],
				"matched_dob"=>$matched_client_data['dob'],
				"matched_phone"=>$matched_client_data['phone'],
				"matched_mobile"=>$matched_client_data['mobile'],
				"matched_email"=>$matched_client_data['email'],
				"matched_crn"=>$matched_client_data['crn'],
				"matched_driver_licence"=>$matched_client_data['driver_licence'],
				"matched_passport"=>$matched_client_data['passport'],
				"matched_medicare_card_no"=>$matched_client_data['medicare_card'],
				"matched_medicare_card_reference"=>$matched_client_data['medicare_card_reference'],
				"matched_confidence_level"=>$rcsVal['confidence_level']
			);
		}
 
		

		// ## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $matchresultCnt,
			"aaData" => array_reverse($data)
		);

		echo json_encode($response);
		}

	public function matchresultData1(Request $request){
		$match_result = MatchResult::all();
		$draw = $request->draw;
		$row = $request->start;
		$rowperpage = $request->length; // Rows display per page
		
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		
		$totalRecords = MatchResult::all()->count();

		
		$data = array();
		if($columnName == 'action'){
			$match_result = MatchResult::offset($row)->limit($rowperpage)->get();
			$match_resultCnt = MatchResult::all()->count();
		}else{
			$match_result = MatchResult::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
			$match_resultCnt = MatchResult::all()->count();
		}
		

		
		foreach ($match_result as $match_result_key => $match_result_value) {
			$requested_client_data = array();
			$matched_client_data = array();

			$matched_client_data = '';
			$first_name = '';
			$middle_name = '';
			$last_name = '';

			$system_data_matching_fields = DB::table('data_matching_fields')->where('system_name',$match_result_value['requested_system'])->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

			$model_prefix="App\Models";
			$type = $match_result_value['requested_system'];
			$modal = $model_prefix.'\\'.$type;
			$matched_system = $model_prefix.'\\'.$match_result_value['matched_system'];
			$requested_client_data = $modal::where('client_id',$match_result_value['requested_client_id'])->first();
			
			if($type == 'MIM')
			{
				$requested_client_data['name_first'] = $requested_client_data['first_name'];
				$requested_client_data['name_middle'] = $requested_client_data['middle_name'];
				$requested_client_data['name_last'] = $requested_client_data['last_name'];

			}

			$matched_client_data = $matched_system::where('client_id',$match_result_value['matched_client_id'])->first(); 


			
			if($matched_client_data['matched_system'] == 'MIM')
			{

				
				$matched_client_data['name_first'] = $matched_client_data['first_name'];
				$matched_client_data['name_middle'] = $matched_client_data['middle_name'];
				$matched_client_data['name_last'] = $matched_client_data['last_name'];
				$matched_client_data['adrress'] = $matched_client_data['address1'];
				$matched_client_data['delivery_address'] = $matched_client_data['address2'];
				$matched_client_data['mobile'] = $matched_client_data['mobile_phone'];
				$matched_client_data['phone'] = $matched_client_data['home_phone'];
				$matched_client_data['crn'] = $matched_client_data['crn_number'];
				$matched_client_data['driver_licence'] = $matched_client_data['driver_licence_no'];
				$matched_client_data['passport'] = $matched_client_data['passport_no'];
				$matched_client_data['medicare_card'] = $matched_client_data['medicare_card_no'];
			}
			
			
			$data[] = array( 
				"requested_client_id"=>$requested_client_data['client_id'],
				"requested_system"=>$requested_client_data['system'],
				"requested_title"=>$requested_client_data['title'],
				"requested_first_name"=>$requested_client_data['name_first'],
				"requested_middle_name"=>$requested_client_data['name_middle'],
				"requested_last_name"=>$requested_client_data['name_last'],
				"requested_address"=>$requested_client_data['address'],
				"requested_delivery_address"=>$requested_client_data['delivery_address'],
				"requested_dob"=>$requested_client_data['dob'],
				"requested_phone"=>$requested_client_data['phone'],
				"requested_mobile"=>$requested_client_data['mobile'],
				"requested_email"=>$requested_client_data['email'],
				"requested_crn"=>$requested_client_data['crn'],
				"requested_driver_licence"=>$requested_client_data['driver_licence'],
				"requested_passport"=>$requested_client_data['passport'],
				"requested_medicare_card_no"=>$requested_client_data['medicare_card'],
				"requested_medicare_card_reference"=>$requested_client_data['medicare_card_reference'],
				"matched_client_id"=>$matched_client_data['client_id'],
				"matched_system"=>$matched_client_data['system'],
				"matched_title"=>$matched_client_data['title'],
				"matched_first_name"=>$matched_client_data['name_first'],
				"matched_middle_name"=>$matched_client_data['name_middle'],
				"matched_last_name"=>$matched_client_data['name_last'],
				"matched_address"=>$matched_client_data['address'],
				"matched_delivery_address"=>$matched_client_data['delivery_address'],
				"matched_dob"=>$matched_client_data['dob'],
				"matched_phone"=>$matched_client_data['phone'],
				"matched_mobile"=>$matched_client_data['mobile'],
				"matched_email"=>$matched_client_data['email'],
				"matched_crn"=>$matched_client_data['crn'],
				"matched_driver_licence"=>$matched_client_data['driver_licence'],
				"matched_passport"=>$matched_client_data['passport'],
				"matched_medicare_card_no"=>$matched_client_data['medicare_card'],
				"matched_medicare_card_reference"=>$matched_client_data['medicare_card_reference'],
				"matched_confidence_level"=>$match_result_value['confidence_level']
			);
		}
		
		

		// ## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $match_resultCnt,
			"aaData" => array_reverse($data)
		);

		echo json_encode($response);
	}
}
