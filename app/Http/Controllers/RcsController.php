<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RCS;

class RcsController extends Controller
{
	function __construct()
	{ 

	}

	public function index(){
		return view('rcs.index');
	}

	public function create(){
		$data = "";
		return view('rcs.create',compact("data"));
	}

	public function edit(){
		$data = "";
		return view('rcs.edit',compact("data"));
	}

	public function rcsData(Request $request){
		$rcs = RCS::all();
		
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
		$totalRecords = RCS::all()->count();

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
			$rcs = RCS::offset($row)->limit($rowperpage)->get();
			$rcsCnt = RCS::all()->count();
		}else{
			$rcs = RCS::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
			$rcsCnt = RCS::all()->count();
		}
		*/
		
		$searchValue = $_POST['search']['value'];
		if($columnName == 'action'){
		 	if($searchValue != ''){
			 	$rcs = RCS::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->orderBy('rcs_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$rcsCnt = RCS::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->get()->count();
			} else {
				$rcs = RCS::orderBy('rcs_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$rcsCnt = RCS::all()->count();
			}
		}else{
			if($searchValue != ''){
			 	$rcs = RCS::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$rcsCnt = RCS::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->get()->count();
			} else {
				$rcs = RCS::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$rcsCnt = RCS::all()->count();
			}
		}
		

		foreach ($rcs as $bk => $rcsVal) {
			$data[] = array( 
				"rcs_id"=>$rcsVal['rcs_id'],
				"action"=>'<a href="'.route("rcs.edit",$rcsVal['rcs_id']).'" class="btn btn-primary">Edit</a>',
				"client_id"=>$rcsVal['client_id'],
				"name_first"=>$rcsVal['name_first'],
				"name_last"=>$rcsVal['name_last'],
				"dob"=>$rcsVal['dob'],
				"driver_license"=>$rcsVal['driver_license'],
				"crn"=>$rcsVal['crn'],
				"phone"=>$rcsVal['phone'],
				"mobile"=>$rcsVal['mobile'],
				"email"=>$rcsVal['email'],
				"passport"=>$rcsVal['passport']
			);
		}

		// ## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $rcsCnt,
			"aaData" => $data
		);

		echo json_encode($response);
		}
}
