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

    }

    public function UploadCsv(ImportCsvReqeust $request){

        if($request->system == 'BOS1')
        {
            if($request->loadtype=='intial'){
                $count=0;    
                $import = Excel::toCollection(new BOS1ClientImport($request->system,$count), request()->file('csvfile'));
                $gapArray = ""; $wrngArray = ""; $status=true; $message = ""; $existArr=""; $dataArr = array();
                $crnArray = ""; $passPortArray = ""; $licence = "";
                foreach ($import as $key => $value) {
                    foreach ($value as $k => $v) {
                        if(empty($v['client_id'])){
                            $gapArray .="A".($k+2).",";
                            unset($value[$k]);
                        }
                        if(!is_numeric($v['client_id'])){
                            if(empty($v['client_id'])){
                                // for checking if it is blank row then not consider as not a numeric   
                            }else{
                                $wrngArray .="A".($k+2).","; 
                                unset($value[$k]);
                            }
                        }

                        if(!empty($v['crn'])){
                            $pattern = "/^[0-9]{9}[A-Z]{1}$/m";
                            if(preg_match($pattern, $v['crn'])==0){
                                $crnArray .="C".($k+2).",";
                                unset($value[$k]);
                            }
                        }

                        if(!empty($v['passport'])){
                            $pattern = "/^[A-Z]{1}[0-9]{7}$/m";
                            if(preg_match($pattern, $v['passport'])==0){
                                $passPortArray .="AN".($k+2).",";
                                unset($value[$k]);
                            }
                        }

                        if(!empty($v['driver_license'])){
                            $pattern = "/^[0-9]{10}[A-z]{1}$/m";
                            if(preg_match($pattern, $v['driver_license'])==0){
                                $licence .="AL".($k+2).",";
                                unset($value[$k]);
                            }
                        }

                        // $cexist = DB::table('bos1_data')->select('client_id')->where(["client_id"=>$v['client_id'],"import_flag"=>"1"])->get();
                        // if(count($cexist)>0){
                        //     $existArr .="A".($k+2).",";
                        // }
                        $count++;
                    }
                    if(count($value)>0){
                        $store = BOS1::store($value,$request->system);        
                    }
                    
                }
                
                
                if(!empty($gapArray)){
                    $message .= Config::get('constants.importError.rowGap')." ".$gapArray."<br>";
                    $status = false;
                }

                if(!empty($wrngArray)){
                    $message .= Config::get('constants.importError.invalidClientId')." ".$wrngArray."<br>";
                    $status = false;
                }

                // if(!empty($existArr)){
                //     $message .= Config::get('constants.importError.clientExist')." ".$existArr."<br>";

                // }

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
        }else if($request->loadtype=='update'){

            $import = Excel::toCollection(new BOS1ClientImport($request->system), request()->file('csvfile'));
            $requestj = array();
            foreach ($import as $key => $value) {
                foreach ($value as $k => $v) {
                    $requestj[$k] = $v;
                }
            }
            $requestj = json_decode(json_encode($requestj)); 
            foreach ($requestj as $key => $value) {
              if($requestj[$key]->client_id != '')
              {
                $tarr = array();
                foreach ($value as $k => $v) {
                    $tarr[$k] = $v;
                }

                echo "<pre>";
                print_r($tarr);
                echo "</pre>";
                exit();

                $update = new UpdateBOS1JOB('bos1',$tarr);
                dispatch($update);
            }

        } 
                // $response = array("status"=>true,"data"=>"","message"=>"Records Updated Successfully"); 
                // echo json_encode($response);
                // exit();
    }  
}

if($request->system == 'BOS2')
{   

    if($request->loadtype=='intial'){
        $count=0;    
        $import = Excel::toCollection(new BOS2ClientImport($request->system,$count), request()->file('csvfile'));
        $gapArray = ""; $wrngArray = ""; $status=true; $message = ""; $existArr=""; $dataArr = array();
        $crnArray = ""; $passPortArray = ""; $licence = "";
        foreach ($import as $key => $value) {
            foreach ($value as $k => $v) {
                if(empty($v['client_id'])){
                    $gapArray .="A".($k+2).",";
                    unset($value[$k]);
                }
                if(!is_numeric($v['client_id'])){
                    if(empty($v['client_id'])){
                                // for checking if it is blank row then not consider as not a numeric   
                    }else{
                        $wrngArray .="A".($k+2).","; 
                        unset($value[$k]);
                    }
                }
                if(!empty($v['crn'])){
                    $pattern = "/^[0-9]{9}[A-Z]{1}$/m";
                    if(preg_match($pattern, $v['crn'])==0){
                        $crnArray .="C".($k+2).",";
                        unset($value[$k]);
                    }
                }

                if(!empty($v['passport'])){
                    $pattern = "/^[A-Z]{1}[0-9]{7}$/m";
                    if(preg_match($pattern, $v['passport'])==0){
                        $passPortArray .="AN".($k+2).",";
                        unset($value[$k]);
                    }
                }

                if(!empty($v['driver_license'])){
                    $pattern = "/^[0-9]{10}[A-z]{1}$/m";
                    if(preg_match($pattern, $v['driver_license'])==0){
                        $licence .="AL".($k+2).",";
                        unset($value[$k]);
                    }
                }
                        // $cexist = DB::table('bos2_data')->select('client_id')->where(["client_id"=>$v['client_id'],"import_flag"=>"1"])->get();
                        // if(count($cexist)>0){
                        //     $existArr .="A".($k+2).",";
                        // }
                $count++;
            }
            if(count($value)>0){
                $store = BOS2::store($value,$request->system);        
            }

        }


        if(!empty($gapArray)){
            $message .= Config::get('constants.importError.rowGap')." ".$gapArray."<br>";
            $status = false;
        }

        if(!empty($wrngArray)){
            $message .= Config::get('constants.importError.invalidClientId')." ".$wrngArray."<br>";
            $status = false;
        }

        if(!empty($existArr)){
            $message .= Config::get('constants.importError.clientExist')." ".$existArr."<br>";

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
}else{
    $import = Excel::toCollection(new BOS2ClientImport($request->system), request()->file('csvfile'));
    $requestj = array();
    foreach ($import as $key => $value) {
        foreach ($value as $k => $v) {
            $requestj[$k] = $v;
        }
    }
    $requestj = json_decode(json_encode($requestj)); 
    foreach ($requestj as $key => $value) {
        if($requestj[$key]->client_id != '')
        {
            $tarr = array();
            foreach ($value as $k => $v) {
                $tarr[$k] = $v;
            }
            $update = new UpdateBOS2Job('bos2',$tarr);
            dispatch($update);
        }

    }
    $response = array("status"=>true,"data"=>"","message"=>"Records Updated Successfully"); 
    echo json_encode($response);
    exit();
}   

}

if($request->system == 'MIM')
{

    if($request->loadtype=='intial'){
        $count=0;    
        $import = Excel::toCollection(new MIMClientImport($request->system,$count), request()->file('csvfile'));
        $gapArray = ""; $wrngArray = ""; $status=true; $message = ""; $existArr=""; $dataArr = array();
        $crnArray = ""; $passPortArray = ""; $licence = "";
        foreach ($import as $key => $value) {
            foreach ($value as $k => $v) {
                if(empty($v['client_id'])){
                    $gapArray .="A".($k+2).",";
                    unset($value[$k]);
                }
                if(!is_numeric($v['client_id'])){
                    if(empty($v['client_id'])){
                                // for checking if it is blank row then not consider as not a numeric   
                    }else{
                        $wrngArray .="A".($k+2).","; 
                        unset($value[$k]);
                    }
                }
                if(!empty($v['crn'])){
                    $pattern = "/^[0-9]{9}[A-Z]{1}$/m";
                    if(preg_match($pattern, $v['crn'])==0){
                        $crnArray .="C".($k+2).",";
                        unset($value[$k]);
                    }
                }

                if(!empty($v['passport'])){
                    $pattern = "/^[A-Z]{1}[0-9]{7}$/m";
                    if(preg_match($pattern, $v['passport'])==0){
                        $passPortArray .="AN".($k+2).",";
                        unset($value[$k]);
                    }
                }

                if(!empty($v['driver_license'])){
                    $pattern = "/^[0-9]{10}[A-z]{1}$/m";
                    if(preg_match($pattern, $v['driver_license'])==0){
                        $licence .="AL".($k+2).",";
                        unset($value[$k]);
                    }
                }
                        // $cexist = DB::table('bos2_data')->select('client_id')->where(["client_id"=>$v['client_id'],"import_flag"=>"1"])->get();
                        // if(count($cexist)>0){
                        //     $existArr .="A".($k+2).",";
                        // }
                $count++;
            }
            if(count($value)>0){
                $store = MIM::store($value,$request->system);        
            }

        }


        if(!empty($gapArray)){
            $message .= Config::get('constants.importError.rowGap')." ".$gapArray."<br>";
            $status = false;
        }

        if(!empty($wrngArray)){
            $message .= Config::get('constants.importError.invalidClientId')." ".$wrngArray."<br>";
            $status = false;
        }

                // if(!empty($existArr)){
                //     $message .= Config::get('constants.importError.clientExist')." ".$existArr."<br>";

                // }

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
}else{


    $import = Excel::toCollection(new MIMClientImport($request->system), request()->file('csvfile'));
    $requestj = array();
    foreach ($import as $key => $value) {
        foreach ($value as $k => $v) {
            $requestj[$k] = $v;
        }
    }
    $requestj = json_decode(json_encode($requestj)); 

 
    foreach ($requestj as $key => $value) {
        if($requestj[$key]->client_id != '')
        {
         $tarr = array();
         foreach ($value as $k => $v) {
            $tarr[$k] = $v;
        }
        $update = new UpdateMIMJob('mim',$tarr);
        dispatch($update); 
    }


}
$response = array("status"=>true,"data"=>"","message"=>"Records Updated Successfully"); 
echo json_encode($response);
exit();
}   

}

if($request->system == 'RCS')
{
   if($request->loadtype=='intial'){
    $count=0;    
    $import = Excel::toCollection(new RCSClientImport($request->system,$count), request()->file('csvfile'));
    $gapArray = ""; $wrngArray = ""; $status=true; $message = ""; $existArr=""; $dataArr = array();
    $crnArray = ""; $passPortArray = ""; $licence = "";
    foreach ($import as $key => $value) {
        foreach ($value as $k => $v) {
            if(empty($v['client_id'])){
                $gapArray .="A".($k+2).",";
                unset($value[$k]);
            }
            if(!is_numeric($v['client_id'])){
                if(empty($v['client_id'])){
                                // for checking if it is blank row then not consider as not a numeric   
                }else{
                    $wrngArray .="A".($k+2).","; 
                    unset($value[$k]);
                }
            }
            if(!empty($v['crn'])){
                $pattern = "/^[0-9]{9}[A-Z]{1}$/m";
                if(preg_match($pattern, $v['crn'])==0){
                    $crnArray .="C".($k+2).",";
                    unset($value[$k]);
                }
            }

            if(!empty($v['passport'])){
                $pattern = "/^[A-Z]{1}[0-9]{7}$/m";
                if(preg_match($pattern, $v['passport'])==0){
                    $passPortArray .="AN".($k+2).",";
                    unset($value[$k]);
                }
            }

            if(!empty($v['driver_license'])){
                $pattern = "/^[0-9]{10}[A-z]{1}$/m";
                if(preg_match($pattern, $v['driver_license'])==0){
                    $licence .="AL".($k+2).",";
                    unset($value[$k]);
                }
            }
                        // $cexist = DB::table('bos2_data')->select('client_id')->where(["client_id"=>$v['client_id'],"import_flag"=>"1"])->get();
                        // if(count($cexist)>0){
                        //     $existArr .="A".($k+2).",";
                        // }
            $count++;
        }
        if(count($value)>0){
            $store = RCS::store($value,$request->system);        
        }

    }


    if(!empty($gapArray)){
        $message .= Config::get('constants.importError.rowGap')." ".$gapArray."<br>";
        $status = false;
    }

    if(!empty($wrngArray)){
        $message .= Config::get('constants.importError.invalidClientId')." ".$wrngArray."<br>";
        $status = false;
    }

    if(!empty($existArr)){
        $message .= Config::get('constants.importError.clientExist')." ".$existArr."<br>";

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
}else{
    $import = Excel::toCollection(new BOS2ClientImport($request->system), request()->file('csvfile'));
    $requestj = array();
    foreach ($import as $key => $value) {
        foreach ($value as $k => $v) {
            $requestj[$k] = $v;
        }
    }
    $requestj = json_decode(json_encode($requestj)); 
    foreach ($requestj as $key => $value) {
      if($requestj[$key]->client_id != '')
      {
       $tarr = array();
       foreach ($value as $k => $v) {
        $tarr[$k] = $v;
    }
    $update = new UpdateRCSJOB('rcs',$tarr);
    dispatch($update);
}


}
$response = array("status"=>true,"data"=>"","message"=>"Records Updated Successfully"); 
echo json_encode($response);
exit();
}   
}


}



public function addorupdatecsv(ImportCsvReqeust $request){
    	// implement logic for Importing to System	
}

public function addorupdatejson(ImportJsonReqeust $request){

}

public function updateViacsv($request){
        // print_r($request->file('csvfile'));
        // die();
    $import = Excel::toArray(new BOS1ClientImport($request->system), request()->file('csvfile')); 
    if($import){
        $response = array("status"=>true,"data"=>"","message"=>"File Imported Successfully");
    }else{
        $response = array("status"=>false,"data"=>"","message"=>"Failed To Import File");
    }
        // echo json_encode($response);

}

}
