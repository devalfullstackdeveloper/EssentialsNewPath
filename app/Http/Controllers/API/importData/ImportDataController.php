<?php

namespace App\Http\Controllers\API\importData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImportCsvReqeust;
use App\Http\Requests\ImportJsonReqeust;
use App\Models\ImportDataModel;
use App\Imports\ClientImport;
use App\Imports\BOS1ClientImport;
use App\Imports\BOS2ClientImport;
use App\Imports\MIMClientImport; 
use App\Imports\RCSClientImport;
use App\Models\client_details;
use App\Models\client_bank_details;
use App\Models\client_data_version;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Config;
use App\Exceptions\Handler;
use App\Models\BOS1;
use App\Models\BOS2;
use App\Models\MIM;
use App\Models\RCS;
use App\Jobs\UpdateBOS1JOB;
use App\Jobs\UpdateBOS2Job;
use App\Jobs\UpdateMIMJob;
use App\Jobs\UpdateRCSJOB;


class ImportDataController extends Controller
{
    public function __construct(){
        //Constructor
    }

//Functiuon to upload csv
    public function UploadCsv(ImportCsvReqeust $request){

        //Set System , System Model , System Importer Class and Job To Update System
        $system = $request->system;
        $systemname = strtolower($request->system);
        $model = '';
        $imports = '';
        $job = '';
        
        if($system == 'BOS1')
        {
            $model="App\Models\BOS1"; 
            $importer = "App\Imports\BOS1ClientImport"; 
            $job = "App\Jobs\UpdateBOS1JOB"; 
        }

        if($system == 'BOS2')
        {
            $model="App\Models\BOS2"; 
            $importer = "App\Imports\BOS2ClientImport"; 
            $job = "App\Jobs\UpdateBOS2JOB"; 
        }

        if($system == 'MIM')
        {
            $model="App\Models\MIM"; 
            $importer = "App\Imports\MIMClientImport"; 
            $job = "App\Jobs\UpdateMIMJob"; 
            //Add name of fields for validation as MIM has differnet field names
            $request['crn'] = $request['crn_number'];
            $request['passport'] = $request['passport_number'];
            $request['driver_license'] = $request['driver_license_no'];
        }

        if($system == 'RCS')
        {
            $model="App\Models\RCS"; 
            $importer = "App\Imports\RCSClientImport"; 
            $job = "App\Jobs\UpdateRCSJOB"; 
        }


        //Check if the load type is inital
            if($request->loadtype=='intial'){
                $count=0;    
                //Used to import csv
                $import = Excel::toCollection(new $importer($request->system,$count), request()->file('csvfile'));
                //Arrays used for checking validations and for returning responses
                $gapArray = ""; $wrngArray = ""; $status=true; $message = ""; $existArr=""; $dataArr = array();
                $crnArray = ""; $passPortArray = ""; $licence = "";

                foreach ($import as $import_key => $import_value) {
                    foreach ($import_value as $import_value_key => $import_value_value) {
                        if($import_value_value['client_id'] == '') 
                        {
                            unset($import_value[$import_value_key]);
                        }
                    }
                }
               
                //Loop through imported rows and check for validations and add data to system
                foreach ($import as $import_key => $import_value) {
                    foreach ($import_value as $import_value_key => $import_value_value) {
                        //Check for empty row
                        if($import_value_value['client_id'] == '') 
                        {
                            unset($import_value[$import_value_key]);
                        }
                        
                        if(empty($import_value_value['client_id'])){
                            $gapArray .="A".($import_value_key+2).",";
                            unset($import_value[$import_value_key]);
                        }
                        //check if client_id is numeric
                        if(!is_numeric($import_value_value['client_id'])){
                            if(empty($import_value_value['client_id'])){
                            }else{
                                $wrngArray .="A".($import_value_key+2).","; 
                                unset($import_value[$import_value_key]);
                            }
                        }

                        //validation for crn
                        if(!empty($import_value_value['crn'])){
                            $pattern = "/^[0-9]{9}[A-Z]{1}$/m";
                            if(preg_match($pattern, $import_value_value['crn'])==0){
                                $crnArray .="C".($import_value_key+2).",";
                                unset($import_value[$import_value_key]);
                            }
                        }

                        //validation for passport
                        if(!empty($import_value_value['passport'])){
                            $pattern = "/^[A-Z]{1}[0-9]{7}$/m";
                            if(preg_match($pattern, $import_value_value['passport'])==0){
                                $passPortArray .="AN".($import_value_key+2).",";
                                unset($import_value[$import_value_key]);
                            }
                        }
                        //validation for driver license
                        if(!empty($import_value_value['driver_license'])){
                            $pattern = "/^[0-9]{10}[A-z]{1}$/m";
                            if(preg_match($pattern, $import_value_value['driver_license'])==0){
                                $licence .="AL".($import_value_key+2).",";
                                unset($import_value[$import_value_key]);
                            }
                        }

                        $count++;
                    }
                    if(count($import_value)>0){
                        //Add data to system if not present or update if present
                        $store = $model::store($import_value,$request->system);        
                    }
                    
                }
                
                //Set Message for Response    
                if(!empty($gapArray)){
                    $message .= Config::get('constants.importError.rowGap')." ".$gapArray."<br>";
                    $status = false;
                }

                if(!empty($wrngArray)){
                    $message .= Config::get('constants.importError.invalidClientId')." ".$wrngArray."<br>";
                    $status = false;
                }


                if(!empty($crnArray)){
                    $message .= Config::get('constants.importError.invalidCrn')." ".$crnArray."<br>";
                    $status = false;
                }

                if(!empty($passPortArray)){
                    $message .= Config::get('constants.importError.invalidPassport')." ".$passPortArray."<br>";
                    $status = false;
                }

                if(!empty($licence)){
                    $message .= Config::get('constants.importError.invalidLicence')." ".$licence."<br>";
                    $status = false;
                }
                if($status==true){
                    try{
                     $response = array("status"=>true,"data"=>"","message"=>"File Imported Successfully".$message); 
                 }catch(\Exception $ex){
                    $response = array("status"=>false,"data"=>"","message"=>$ex->getMessage());
                }
            }else{
                $response = array("status"=>false,"data"=>"","message"=>$message);    
            }
            echo json_encode($response);
            exit();
        }
        //if loadtype is update
        else if($request->loadtype=='update'){
            //import csv data
            $import = Excel::toCollection(new $importer($request->system), request()->file('csvfile'));
            $request_data = array();
            //Loop through imported rows
            foreach ($import as $importer => $import_value) {
                foreach ($import_value as $import_value_key => $import_value_value) {
                    $request_data[$import_value_key] = $import_value_value;
                }
            }
            $request_data = json_decode(json_encode($request_data)); 
            foreach ($request_data as $$importer => $import_value) {
              if($request_data[$import_key]->client_id != '')
              {
                $request_data_array = array();
                foreach ($import_value as $import_value_key => $import_value_value) {
                    $request_data_array[$import_value_key] = $import_value_value;
                }
                //Create Object for Update Job for the respective systems
                $update = $importer($systemname,$request_data_array);
                //Add Job to queue
                dispatch($update);
            }

        } 
                $response = array("status"=>true,"data"=>"","message"=>"Records Updated Successfully"); 
                echo json_encode($response);
                exit();
    }  
}




}
