<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MIM;

class MimController extends Controller
{
	function __construct()
	{ 

	}

	public function index(){
		return view('mim.index');
	}

	public function create(){
		$data = "";
		return view('mim.create',compact("data"));
	}

	public function edit(){
		$data = "";
		return view('mim.edit',compact("data"));
	}

	public function mimData(Request $request){
		$mim = MIM::all();
		
    	## Read value
		$draw = $request->draw;
		$row = $request->start;
		$rowperpage = $request->length; // Rows display per page
		// exit();
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		// $searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

		// ## Search 
		// $searchQuery = " ";
		// if($searchValue != ''){
		// 	$searchQuery = " and (emp_name like '%".$searchValue."%' or 
		// 	email like '%".$searchValue."%' or 
		// 	city like'%".$searchValue."%' ) ";
		// }

		// ## Total number of records without filtering
		// $sel = mysqli_query($con,"select count(*) as allcount from employee");
		// $records = mysqli_fetch_assoc($sel);
		$totalRecords = MIM::all()->count();

		// ## Total number of record with filtering
		// $sel = mysqli_query($con,"select count(*) as allcount from employee WHERE 1 ".$searchQuery);
		// $records = mysqli_fetch_assoc($sel);
		// $totalRecordwithFilter = $records['allcount'];

		// ## Fetch records
		// $empQuery = "select * from employee WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
		// $empRecords = mysqli_query($con, $empQuery);
		// $data = array();

		// while ($row = mysqli_fetch_assoc($empRecords)) {
		// 	$data[] = array( 
		// 		"emp_name"=>$row['emp_name'],
		// 		"email"=>$row['email'],
		// 		"gender"=>$row['gender'],
		// 		"salary"=>$row['salary'],
		// 		"city"=>$row['city']
		// 	);
		// }
		$data = array();
		/*
		if($columnName == 'action'){
			$mim = MIM::offset($row)->limit($rowperpage)->get();
			$mimCnt = MIM::all()->count();
		}else{
			$mim = MIM::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
			$mimCnt = MIM::all()->count();
		}
		*/
		
		$searchValue = $_POST['search']['value'];
		if($columnName == 'action'){
		 	if($searchValue != ''){
			 	$mim = MIM::orWhere("client_id","like","%$searchValue%")->orWhere("first_name","like","%$searchValue%")->orWhere("last_name","like","%$searchValue%")->orWhere("crn_number","like","%$searchValue%")->orWhere("mobile_phone","like","%$searchValue%")->orderBy('mim_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$mimCnt = MIM::orWhere("client_id","like","%$searchValue%")->orWhere("first_name","like","%$searchValue%")->orWhere("last_name","like","%$searchValue%")->orWhere("crn_number","like","%$searchValue%")->orWhere("mobile_phone","like","%$searchValue%")->get()->count();
			} else {
				$mim = MIM::orderBy('mim_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$mimCnt = MIM::all()->count();
			}
		}else{
			if($searchValue != ''){
			 	$mim = MIM::orWhere("client_id","like","%$searchValue%")->orWhere("first_name","like","%$searchValue%")->orWhere("last_name","like","%$searchValue%")->orWhere("crn_number","like","%$searchValue%")->orWhere("mobile_phone","like","%$searchValue%")->orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$mimCnt = MIM::orWhere("client_id","like","%$searchValue%")->orWhere("first_name","like","%$searchValue%")->orWhere("last_name","like","%$searchValue%")->orWhere("crn_number","like","%$searchValue%")->orWhere("mobile_phone","like","%$searchValue%")->get()->count();
			} else {
				$mim = MIM::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$mimCnt = MIM::all()->count();
			}
		}
		
		

		foreach ($mim as $bk => $mimVal) {
			$data[] = array( 
				"MIM_id"=>$mimVal['MIM_id'],
				"client_id"=>$mimVal['client_id'],
				"name_first"=>$mimVal['first_name'],
				"name_last"=>$mimVal['last_name'],
				"dob"=>$mimVal['date_of_birth'],
				"driver_license"=>$mimVal['driver_license'],
				"crn"=>$mimVal['crn_number'],
				"phone"=>$mimVal['home_phone'],
				"mobile"=>$mimVal['mobile_phone'],
				"email"=>$mimVal['email'],
				"passport"=>$mimVal['passport_no']
			);
		}

		// ## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $mimCnt,
			"aaData" => $data
		);

		echo json_encode($response);
		}
}
