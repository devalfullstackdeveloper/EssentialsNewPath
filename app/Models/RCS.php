<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\importlogs;


class RCS extends Model
{
    use HasFactory;
    protected $table = "rcs_data";

    protected $fillable = ['client_id','title','name_first','name_last','name_middle','address','delivery_address',
							'dob','mobile','phone','email','crn','driver_license','passport','medicare_card',
							'medicare_card_reference','green_id_passport','green_id_medicare','green_id_driving_license',
							'bsb','account_number','contract_id','system'];  

	public static function store($data,$system){
		$counter = 0;
		$logArr = array();
		$call = new RCS;



		foreach ($data as $key => $value) {
			$checkExist = DB::table("rcs_data")->select('client_id')->where(["client_id"=>$value['client_id'],"import_flag"=>"1"])->get();
			if(count($checkExist)==0){
				$add = new RCS();
	           	$add->client_id                   = $value['client_id'];
	            $add->title                       = $value['title'];
	            $add->name_first                  = $value['name_first'];
	            $add->name_last                   = $value['name_last'];
	            $add->name_middle                 = $value['name_middle'];            
	            $add->address                     = $value['address'];
	            $add->delivery_address            = $value['delivery_address'];
	            $add->dob                         = $value['dob'];
	            $add->mobile					  = $value['mobile'];
	            $add->phone						  =	$value['phone'];
	            $add->email						  = $value['email'];	
	            $add->driver_license 			  = $value['driver_license'];            
	            $add->passport 					  = $value['passport'];
	            $add->medicare_card 			  = $value['medicare_card'];
	            $add->medicare_card_reference     = $value['medicare_card_reference'];
	            $add->green_id_passport			  = $value['green_id_passport'];
	            $add->green_id_medicare           = $value['green_id_medicare'];
	            $add->green_id_driving_license    = $value['green_id_drivers_license'];
	            $add->bsb						  = $value['bsb'];
	            $add->account_number			  = $value['account_number'];
	            $add->contract_id				  = $value['contract_id'];
	            // $add->system    =  $system;    
	            $add->import_flag = "1";
	            $add->save();  
	            if($add->id>0){
	              $counter++; 
	            }

	            
	          	array_push($logArr,$add->id);	
	          
			}else{
				$updateBOS1 = \App\Helpers\UpdateHelper::update_RCS_intials($value['client_id'],$value);
			}

			

		}
		$call->StorImportLogs($logArr,$counter,$system,'INSERT');	
	}



	public static function StorImportLogs(array $data,$rowcount,$system,$type){
	   if(count($data)>0){
	   		$first = $data[0];
       $last  = end($data);
       $importLog = new importlogs();
       $importLog->startClientMappingId = $first;
       $importLog->endClientMappingId = $last;
       $importLog->system = $system;
       $importLog->totalRecords = $rowcount;
       $importLog->log_at = $type;
       $importLog->save();	
	   }	
       
    }

    /*
    public static function search($search) {

    $columns = ["name_first", "name_last"]; 
      $fname = implode("%", str_split($search['name_first']));
      $fname = "%$fname%";
      	$lname = implode("%", str_split($search['name_last']));
      	$lname = "%$lname%";
      	
      	return static::where("name_first", "like", $fname)->orWhere("name_last", "like", $lname)->get();
  }
*/

public static function searchplugin($search) {
    $columns = ["name_first", "name_last"]; 
      $fname = implode("%", str_split($search['name_first']));
      $fname = "%$fname%";
      	$lname = implode("%", str_split($search['name_last']));
      	$lname = "%$lname%";
      	DB::enableQueryLog(); 
      	$rcs_row =  static::where(function($rcs_row) use ($search){
                if(isset($fname) && $fname != '' )
                {
                    $rcs_row->where("name_first", "like", $fname);
                }
                if(isset($lname) && $lname != '' )
                {
                    $rcs_row->where("name_last", "like", $lname);
                }
                if(isset($search['dob']) && $search['dob'] != '')
                {
                    $rcs_row->where('dob', $search['dob']);
                }
                if(isset($search['crn']) && $search['crn'] != '')
                {
                    $rcs_row->orWhere('crn', $search['crn']);
                }
                if(isset($search['driver_license']) && $search['driver_license'] != '')
                {
                    $rcs_row->orWhere('driver_license', $search['driver_license']);
                }
                if(isset($search['passport']) && $search['driver_license'] != '')
                {
                    $rcs_row->orWhere('passport', $search['passport']);
                } 
                if(isset($search['medicare_card']) && $search['medicare_card'] != '')
                {
                    $rcs_row->orWhere('medicare_card', $search['medicare_card']);
                }
            })->get();
      	
	

			return $rcs_row;
      	     	// return static::where("name_first", "like", $fname)->orWhere("name_last", "like", $lname)->get();
  }

  public static function search($search) {
    $columns = ["name_first", "name_last"]; 
    $fname = implode("%", str_split($search['name_first']));
    $fname = "%$fname%";
    $lname = implode("%", str_split($search['name_last']));
    $lname = "%$lname%";


    $rcs_row = static::query();

    if(isset($fname) && $fname != '' ) {
      $rcs_row = $rcs_row->where("name_first", "like", $fname);
    }
    if(isset($lname) && $lname != '' ) {
      $rcs_row = $rcs_row->where("name_last", "like", $lname);
    }

    if(isset($search['dob']) && $search['dob'] != '')
    {
      $rcs_row = $rcs_row->where('dob', $search['dob']);
    }
    if(isset($search['crn']) && $search['crn'] != '')
    {
      $rcs_row = $rcs_row->orWhere('crn', $search['crn']);
    }
    if(isset($search['driver_license']) && $search['driver_license'] != '')
    {
      $rcs_row = $rcs_row->orWhere('driver_license', $search['driver_license']);
    }
    if(isset($search['passport']) && $search['passport'] != '')
    {
      $rcs_row = $rcs_row->orWhere('passport', $search['passport']);
    } 
    if(isset($search['medicare_card']) && $search['medicare_card'] != '')
    {                   
      $rcs_row = $rcs_row->orWhere('medicare_card', $search['medicare_card']);
    }
    $rcs_row = $rcs_row->get();
    return $rcs_row;
  }



  						
}
