<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Schema;
use DB;
use App\Models\importlogs;
use App\Models\BOS1;
use App\Models\BOS2;
use App\Models\MIM;
use App\Models\client_data_versions;
use App\Models\client_bank_details;

class UpdateHelper{

	public static function ClientId_In_Data_Other_System($clientId,$data){

	}


	public static function Update_client_data_in_ohter_system($data){

		
	}


	public static function Update_BOS1_intials($clientId,$data){
		$call = new UpdateHelper;
		$getClient = db::table("bos1_data")->where(["client_id"=>$clientId])->get();
		if(count($getClient)>0){
			$getColumns = DB::getSchemaBuilder()->getColumnListing('bos1_data');
			$data = json_decode(json_encode($data));
			
			foreach ($getColumns as $key => $value) {
				$update = DB::table('bos1_data')->where(['bos1_id'=>$getClient[0]->bos1_id]);
				if(array_key_exists($value, $data)){
					if($getClient[0]->$value!=$data->$value){
						$storeDataVersion = $call->Store_Data_Version($getClient[0]->bos1_id,$clientId,'BOS1',$value,$getClient[0]->$value);
					}
					$update = $update->update([$value=>$data->$value]);
				}
			}	
			/*Matching Algorithm*/

			

				
		}

		

	}

	public static function Update_BOS2_intials($clientId,$data){
		$call = new UpdateHelper;
		$getClient = db::table("bos2_data")->select('bos2_id')->where(["client_id"=>$clientId])->get();
		if(count($getClient)>0){
			$getColumns = DB::getSchemaBuilder()->getColumnListing('bos2_data');
			$data = json_decode(json_encode($data));
			
			foreach ($getColumns as $key => $value) {
				$update = DB::table('bos2_data')->where(['bos2_id'=>$getClient[0]->bos2_id]);
				if(array_key_exists($value, $data)){
					if($getClient[0]->$value!=$data->$value){
						$storeDataVersion = $call->Store_Data_Version($getClient[0]->bos2_id,$clientId,'BOS2',$value,$getClient[0]->$value);
					}
					$update = $update->update([$value=>$data->$value]);
				}
			}
				
		}
	}

	public static function update_MIM_intials($clientId,$data){
		$call = new UpdateHelper;
		$getClient = db::table("mim_data")->where(["client_id"=>$clientId])->get();
		if(count($getClient)>0){
			$getColumns = DB::getSchemaBuilder()->getColumnListing('mim_data');
			$data = json_decode(json_encode($data));
			
			foreach ($getColumns as $key => $value) {
				$update = DB::table('mim_data')->where(['MIM_id'=>$getClient[0]->MIM_id]);
				if(array_key_exists($value, $data)){
					if($getClient[0]->$value!=$data->$value){
						$storeDataVersion = $call->Store_Data_Version($getClient[0]->MIM_id,$clientId,'mim_data',$value,$getClient[0]->$value);
						if($value=='bsb' || $value=='bank_account_no'){
							$storeBank = $call->Store_client_bank_details($clientId,$system,$value,$data->$value);	
						}
					}
					$update = $update->update([$value=>$data->$value]);
				}
			}
				
		}
	}

	public static function update_RCS_intials($clientId,$data){
		$call = new UpdateHelper;
		$getClient = db::table("rcs_data")->where(["client_id"=>$clientId])->get();
		if(count($getClient)>0){
			$getColumns = DB::getSchemaBuilder()->getColumnListing('rcs_data');
			$data = json_decode(json_encode($data));
			
			foreach ($getColumns as $key => $value) {
				$update = DB::table('rcs_data')->where(['rcs_id'=>$getClient[0]->rcs_id]);
				if(array_key_exists($value, $data)){
					if($getClient[0]->$value!=$data->$value){
						$storeDataVersion = $call->Store_Data_Version($getClient[0]->rcs_id,$clientId,'rcs_data',$value,$getClient[0]->$value);
						if($value=='bsb' || $value=='bank_account_no' || $value=='account_number'){
							$storeBank = $call->Store_client_bank_details($clientId,$system,$value,$data->$value);	
						}
					}
					$update = $update->update([$value=>$data->$value]);
				}
			}
				
		}
	}


	public static function Store_Data_Version($main_id,$client_id,$system,$column,$value){
		$getColumns = DB::getSchemaBuilder()->getColumnListing('client_data_versions');
		if(in_array($column, $getColumns)){
			$store = new client_data_versions();
			$store->client_main_id = $main_id;
			$store->client_id = $client_id;
			$store->system = $system;
			$store->$column = $value;	
			$store->save();
		}
	}

	public static function Store_client_bank_details($client_id,$system,$column,$value){
		$getColumns = DB::getSchemaBuilder()->getColumnListing('client_bank_details');
		if(in_array($column, $getColumns)){
			$SaveBankData = new client_bank_details();
			$SaveBankData->client_id = $client_id;
			$SaveBankData->system = $system;
			$SaveBankData->$column = $value;
			$SaveBankData->save();
		}
	}

}