<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\importlogs;

class MIM extends Model 
{	
	use HasFactory;
	protected $table = 'mim_data';  
	protected $fillable = ['client_id','order_id','customer_id','first_name','middle_name','last_name','date_of_birth','flat_number','street_number','street_name','suburb','country','licence_number','licence_state','terms_conditions_accepted','entered','entered_user_id','verification_status','passport_number','passport_country','passport_expiry','status','last_updated','crn_number','home_phone_area_code','home_phone','mobile_phone','email','dob','address1','address2','postcode','state','benefit_id','account_no','email_optout','is_newsletter_unsubscribed','unique_id','is_test_account','fortnightly_income','fortnightly_expenses','home_phone_area_code_2nd','home_phone_2nd','mobile_phone_2nd','unit_no','street_no','street_type','account_type','frequency_type','account_holder_name','bsb','bank_account_no','ezidebit_account_no','ezidebit_creation','driver_license_no','medicare_no','passport_no','previous_unit_no','previous_street_no','previous_street_name','previous_street_type','previous_postcode','previous_suburb','previous_state','is_skip_tally_limit','skip_tally_limit_updated_by','skip_tally_limit_updated_at','residency_status','is_consent_privacy_act','is_essential_opt_out','is_essential_opt_out_sms','customer_password','authorised_person','authorised_relation','authorised_dob','marital_status','dependants','is_qualify','is_no_recent_payment','no_recent_payment_at','user_id'
	];  


	public static function store($data,$system){
		$counter = 0;
		$logArr = array();
		$call = new MIM;



		foreach ($data as $key => $value) {
			$checkExist = DB::table("mim_data")->select('client_id')->where(["client_id"=>$value['client_id'],"import_flag"=>"1"])->get();
			if(count($checkExist)==0){

				$add = new MIM();
	            $add->client_id = $value['client_id'];
	            $add->order_id = $value['order_id'];
	            $add->customer_id = $value['customer_id'];
        		$add->first_name = $value['first_name'];
        		$add->middle_name = $value['middle_name'];
        		$add->last_name = $value['last_name'];
        		$add->date_of_birth = $value['date_of_birth'];
        		$add->flat_number = $value['flat_number'];
        		$add->street_number = $value['street_number'];
        		$add->street_name = $value['street_name'];
        		$add->suburb = $value['suburb'];
        		$add->country = $value['country'];
        		$add->licence_number = $value['licence_number'];
        		$add->licence_state = $value['licence_state'];
        		$add->terms_conditions_accepted = $value['terms_conditions_accepted'];
        		$add->entered = $value['entered'];
        		$add->entered_user_id = $value['entered_user_id'];
        		$add->verification_status = $value['verification_status'];
        		$add->passport_number = $value['passport_number'];
        		$add->passport_country = $value['passport_country'];
        		$add->passport_expiry = $value['passport_expiry'];
        		$add->status = $value['status'];
        		$add->last_updated = $value['last_updated'];
        		$add->crn_number = $value['crn_number'];
        		$add->home_phone_area_code = $value['home_phone_area_code'];
        		$add->home_phone = $value['home_phone'];
        		$add->mobile_phone = $value['mobile_phone'];
        		$add->email = $value['email'];
        		$add->dob = $value['dob'];
        		$add->address1 = $value['address1'];
        		$add->address2 = $value['address2'];
        		$add->postcode = $value['postcode'];
        		$add->state = $value['state'];
        		$add->benefit_id = $value['benefit_id'];
        		$add->account_no = $value['account_no'];
        		$add->email_optout = $value['email_optout'];
        		$add->is_newsletter_unsubscribed = $value['is_newsletter_unsubscribed'];
        		$add->unique_id = $value['unique_id'];
        		$add->is_test_account = $value['is_test_account'];
        		$add->fortnightly_income = $value['fortnightly_income'];
        		$add->fortnightly_expenses = $value['fortnightly_expenses'];
    			$add->home_phone_area_code_2nd = $value['home_phone_area_code_2nd'];
        		$add->home_phone_2nd = $value['home_phone_2nd'];
        		$add->mobile_phone_2nd = $value['mobile_phone_2nd'];
        		$add->unit_no = $value['unit_no'];
        		$add->street_no = $value['street_no'];
        		$add->street_type = $value['street_type'];
        		$add->account_type = $value['account_type'];
        		$add->frequency_type = $value['frequency_type'];
        		$add->account_holder_name = $value['account_holder_name'];
        		$add->bsb = $value['bsb'];
        		$add->bank_account_no = $value['bank_account_no'];
        		$add->ezidebit_account_no = $value['ezidebit_account_no'];
        		$add->ezidebit_creation = $value['ezidebit_creation'];
        		$add->driver_license_no = $value['driver_license_no'];
        		$add->medicare_no = $value['medicare_no'];
        		$add->passport_no = $value['passport_no'];
        		$add->previous_unit_no = $value['previous_unit_no'];
        		$add->previous_street_no = $value['previous_street_no'];
        		$add->previous_street_name = $value['previous_street_name'];
        		$add->previous_street_type = $value['previous_street_type'];
        		$add->previous_postcode = $value['previous_postcode'];
        		$add->previous_suburb = $value['previous_suburb'];
        		$add->previous_state = $value['previous_state'];
        		$add->is_skip_tally_limit = $value['is_skip_tally_limit'];
        		$add->skip_tally_limit_updated_by = $value['skip_tally_limit_updated_by'];
        		$add->skip_tally_limit_updated_at = $value['skip_tally_limit_updated_at'];
        		$add->residency_status = $value['residency_status'];
        		$add->is_consent_privacy_act = $value['is_consent_privacy_act'];
        		$add->is_essential_opt_out = $value['is_essential_opt_out'];
        		$add->is_essential_opt_out_sms = $value['is_essential_opt_out_sms'];
        		$add->customer_password = $value['customer_password'];
        		$add->authorised_person = $value['authorised_person'];
        		$add->authorised_relation = $value['authorised_relation'];
        		$add->authorised_dob = $value['authorised_dob'];
        		$add->marital_status = $value['marital_status'];
        		$add->dependants = $value['dependants'];
        		$add->is_qualify = $value['is_qualify'];
        		$add->is_no_recent_payment = $value['is_no_recent_payment'];
        		$add->no_recent_payment_at = $value['no_recent_payment_at'];
        		$add->user_id = $value['user_id'];
	            // $add->system    =  $system;    
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
	            	$call->StorImportLogs($logArr,$counter,$system,'INSERT');	
	            }
			}else{
				$updateBOS1 = \App\Helpers\UpdateHelper::update_MIM_intials($value['client_id'],$value);
				
			}

			

		}
	}



	public static function StorImportLogs(array $data,$rowcount,$system,$type){
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
