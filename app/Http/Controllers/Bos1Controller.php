<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BOS1;

class Bos1Controller extends Controller
{
	function __construct()
	{ 

	}

	public function index(){
		// $bos1 = BOS1::paginate(50)->onEachSide(5);
		$bos1 = BOS1::orderBy('bos1_id', 'desc')->get();
		// dd($bos1);
		return view('bos1.index',compact("bos1"));
		//return view('bos1.index');
	}

	public function create(){
		$data = "";
		return view('bos1.create',compact("data"));
	}

	public function edit($id){
		$data = "";
		$bos1 = BOS1::where('bos1_id',$id)->get();
		return view('bos1.edit',compact("data",'bos1'));
	}

	public function bos1Data(Request $request){
		$bos1 = BOS1::all();
		
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
		
		
		
		
		$totalRecords = BOS1::all()->count();

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
		$searchValue = $_POST['search']['value'];
		if($columnName == 'action'){
		 	if($searchValue != ''){
			 	$bos1 = BOS1::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->orderBy('bos1_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$bos1Cnt = BOS1::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->get()->count();
			} else {
				$bos1 = BOS1::orderBy('bos1_id', 'desc')->offset($row)->limit($rowperpage)->get();
				$bos1Cnt = BOS1::all()->count();
			}
		}else{
			if($searchValue != ''){
			 	$bos1 = BOS1::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$bos1Cnt = BOS1::orWhere("client_id","like","%$searchValue%")->orWhere("name_first","like","%$searchValue%")->orWhere("name_last","like","%$searchValue%")->orWhere("crn","like","%$searchValue%")->orWhere("mobile","like","%$searchValue%")->get()->count();
			} else {
				$bos1 = BOS1::orderBy($columnName, $columnSortOrder)->offset($row)->limit($rowperpage)->get();
				$bos1Cnt = BOS1::all()->count();
			}
		}
		

		foreach ($bos1 as $bk => $bos1Val) {
			$data[] = array( 
				"bos1_id"=>$bos1Val['bos1_id'],
				"action"=>'<a href="'.route("bos1.edit",$bos1Val['bos1_id']).'" class="btn btn-primary btn-gray-edit">Edit</a>',
				"client_id"=>$bos1Val['client_id'],
				"name_first"=>$bos1Val['name_first'],
				"name_last"=>$bos1Val['name_last'],
				"dob"=>$bos1Val['dob'],
				"driver_license"=>$bos1Val['driver_license'],
				"crn"=>$bos1Val['crn'],
				"phone"=>$bos1Val['phone'],
				"mobile"=>$bos1Val['mobile'],
				"email"=>$bos1Val['email'],
				"passport"=>$bos1Val['passport']
			);
		}

		// ## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $bos1Cnt,
			"aaData" => $data
		);

		echo json_encode($response);
		}
}
