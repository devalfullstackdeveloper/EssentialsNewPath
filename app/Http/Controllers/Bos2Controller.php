<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BOS2;

class Bos2Controller extends Controller
{
	function __construct()
	{ 

	}

	public function index(){
		return view('bos2.index');
	} 

	public function create(){
		$data = "";
		return view('bos2.create',compact("data"));
	}

	public function edit($id){
		$data = "";
		$bos2 = BOS2::where('bos2_id',$id)->get();
		return view('bos2.edit',compact("data","bos2"));
	}

	public function bos2Data(Request $request){
		$bos2 = BOS2::all();
		
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
		$totalRecords = BOS2::all()->count();

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
			$bos2 = BOS2::orderBy('bos2_id', 'desc')->offset($row)->limit($rowperpage)->get();
			$bos2Cnt = BOS2::all()->count();
		}else{
			$bos2 = BOS2::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
			$bos2Cnt = BOS2::all()->count();
		}
		*/
		$searchValue = $_POST['search']['value'];
		if($columnName == 'action'){
		 	if($searchValue != ''){
			 	$bos2 = BOS2::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->orderBy('bos2_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$bos2Cnt = BOS2::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->get()->count();
			} else {
				$bos2 = BOS2::orderBy('bos2_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$bos2Cnt = BOS2::all()->count();
			}
		}else{
			if($searchValue != ''){
			 	$bos2 = BOS2::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$bos2Cnt = BOS2::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->get()->count();
			} else {
				$bos2 = BOS2::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$bos2Cnt = BOS2::all()->count();
			}
		}
		

		foreach ($bos2 as $bk => $bos2Val) {
			$data[] = array( 
				"bos2_id"=>$bos2Val['bos2_id'],
				"action"=>'<a href="'.route("bos2.edit",$bos2Val['bos2_id']).'" class="btn btn-primary btn-gray-edit">Edit</a>',
				"client_id"=>$bos2Val['client_id'],
				"name_first"=>$bos2Val['name_first'],
				"name_last"=>$bos2Val['name_last'],
				"dob"=>$bos2Val['dob'],
				"driver_license"=>$bos2Val['driver_license'],
				"crn"=>$bos2Val['crn'],
				"phone"=>$bos2Val['phone'],
				"mobile"=>$bos2Val['mobile'],
				"email"=>$bos2Val['email'],
				"passport"=>$bos2Val['passport']
			);
		}

		// ## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $bos2Cnt,
			"aaData" => $data
		);

		echo json_encode($response);
		}
}
