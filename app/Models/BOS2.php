<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\importlogs;

class BOS2 extends Model
{
    use HasFactory;

    protected $table = "bos2_data";
 
    protected $fillable = ['client_id','default_type','crn','date_joined','title','name','name_first','name_middle','name_last','address','address_unit_number','address_number','address_name','address_city','address_state','address_postcode','address_lat','address_lng','address_municipality','address_region','address_zone','delivery_address','delivery_address_unit_number','delivery_address_number','delivery_address_name','delivery_address_city','delivery_address_state','delivery_address_postcode','delivery_address_lat','delivery_address_lng','delivery_address_municipality','delivery_address_region','delivery_address_zone','phone','mobile','email','dob','driver_license','driver_license_state_code','passport','passport_country_code','nlr_name','nlr_name_first','nlr_name_last','nlr_address','nlr_address_unit_number','nlr_address_number','nlr_address_name','nlr_address_city','nlr_address_state','nlr_address_postcode','nlr_phone','nlr_relationship','centrelink_income','centrelink_deductions','other_income','other_deduction','comment','customer_status','adjustment','medicare_card','medicare_card_reference','medicare_card_expiry','medicare_card_colour','medicare_card_middle_name','defaulted','relationship','dependents','shared','living_situation','partner_income','statement_value','system','import_flag']; 

	public static function store($data,$system){ 
		$counter = 0;
		$logArr = array();
		$call = new BOS2;
		foreach ($data as $key => $value) {
			$checkExist = DB::table("bos2_data")->select('client_id')->where(["client_id"=>$value['client_id'],"import_flag"=>"1"])->get();
			if(count($checkExist)==0){

				$add = new BOS2();
	            $add->client_id                   = $value['client_id'];
	            $add->default_type                = $value['default_type'];
	            $add->crn                         = $value['crn'];
	            $add->date_joined                 = $value['date_joined'];
	            $add->title                       = $value['title'];
	            $add->name                        = $value['name'];
	            $add->name_first                  = $value['name_first'];
	            $add->name_middle                 = $value['name_middle'];
	            $add->name_last                   = $value['name_last'];
	            $add->address                     = $value['address'];
	            $add->address_unit_number         = $value['address_unit_number'];
	            $add->address_number              = $value['address_number'];
	            $add->address_name                = $value['address_name'];
	            $add->address_city                = $value['address_city'];
	            $add->address_state               = $value['address_state'];
	            $add->address_postcode            = $value['address_postcode'];
	            $add->address_lat                 = $value['address_lat'];
	            $add->address_lng                 = $value['address_lng'];
	            $add->address_municipality        = $value['address_municipality'];
	            $add->address_region              = $value['address_region'];
	            $add->address_zone                = $value['address_zone'];
	            $add->delivery_address            = $value['delivery_address'];
	            $add->delivery_address_unit_number= $value['delivery_address_unit_number'];
	            $add->delivery_address_number     = $value['delivery_address_number'];
	            $add->delivery_address_name       = $value['delivery_address_name'];
	            $add->delivery_address_city       = $value['delivery_address_city'];
	            $add->delivery_address_state      = $value['delivery_address_state'];
	            $add->delivery_address_postcode   = $value['delivery_address_postcode'];
	            $add->delivery_address_lat        = $value['delivery_address_lat'];
	            $add->delivery_address_lng        = $value['delivery_address_lng'];
	            $add->delivery_address_municipality= $value['delivery_address_municipality'];
	            $add->delivery_address_region     = $value['delivery_address_region'];
	            $add->delivery_address_zone       = $value['delivery_address_zone'];
	            $add->phone                       = $value['phone'];
	            $add->mobile                      = $value['mobile'];
	            $add->email                       = $value['email'];
	            $add->dob                         = $value['dob'];
	            $add->driver_license = $value['driver_license'];
	            $add->driver_license_state_code = $value['driver_license_state_code'];
	            $add->passport = $value['passport'];
	            $add->passport_country_code = $value['passport_country_code'];
	            $add->nlr_name = $value['nlr_name'];
	            $add->nlr_name_first = $value['nlr_name_first'];
	            $add->nlr_name_last = $value['nlr_name_last'];
	            $add->nlr_address = $value['nlr_address'];
	            $add->nlr_address_unit_number = $value['nlr_address_unit_number'];
	            $add->nlr_address_number = $value['nlr_address_number'];
	            $add->nlr_address_name = $value['nlr_address_name'];
	            $add->nlr_address_city = $value['nlr_address_city'];
	            $add->nlr_address_state = $value['nlr_address_state'];
	            $add->nlr_address_postcode = $value['nlr_address_postcode'];
	            $add->nlr_phone = $value['nlr_phone'];
	            $add->nlr_relationship = $value['nlr_relationship'];
	            $add->centrelink_income = $value['centrelink_income'];
	            $add->centrelink_deductions = $value['centrelink_deductions'];
	            $add->other_income = $value['other_income'];
	            $add->other_deduction = $value['other_deduction'];
	            $add->comment = $value['comment'];
	            $add->customer_status = $value['customer_status'];
	            $add->adjustment = $value['adjustment'];
	            $add->medicare_card = $value['medicare_card'];
	            $add->medicare_card_reference = $value['medicare_card_reference'];
	            $add->medicare_card_expiry = $value['medicare_card_expiry'];
	            $add->medicare_card_colour = $value['medicare_card_colour'];
	            $add->medicare_card_middle_name = $value['medicare_card_middle_name'];
	            $add->defaulted = $value['defaulted'];
	            $add->relationship = $value['relationship'];
	            $add->dependents = $value['dependents'];
	            $add->shared = $value['shared'];
	            $add->living_situation = $value['living_situation'];
	            $add->partner_income = $value['partner_income'];
	            $add->statement_value = $value['statement_value'];
	            $add->system    =  $system;    
	            $add->import_flag = "1";
	            $add->save();  
	            if($add->id>0){
	              $counter++;
	            }

	            if($key==0){
	            	array_push($logArr,$add->id);	
	            }
            	
	            if($key==(count($data)-1)){
	            	array_push($logArr,$add->id);
	            	$call->StorImportLogs($logArr,$counter,$system);	
	            }
			}else{
				$updateBOS1 = \App\Helpers\UpdateHelper::Update_BOS2_intials($value['client_id'],$value);
			}
			

		}
	}

	public static function StorImportLogs(array $data,$rowcount,$system){
       $first = $data[0];
       $last  = end($data);
       $importLog = new importlogs();
       $importLog->startClientMappingId = $first;
       $importLog->endClientMappingId = $last;
       $importLog->system = $system;
       $importLog->totalRecords = $rowcount;
       $importLog->save();
    }
}
