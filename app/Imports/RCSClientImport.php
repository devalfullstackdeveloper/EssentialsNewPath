<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\RCS;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\importlogs;

use DB;

class RCSClientImport implements ToModel, WithHeadingRow, WithChunkReading, ToCollection
{
    /**
    * @param Collection $collection
    */

    private $rows = 0;
    protected $LogArr;
    protected $counter;

    public function  __construct($system,$count='')
    {
        $this->system= $system;
        $this->count= $count; 
        $this->LogArr = array();
        $this->counter = 0;
    }

    public function model(array $row)
    {
        ++$this->rows;
        $system = $this->system;
        $checkExist = DB::table("rcs_data")->select('client_id')->where(["client_id"=>$row['client_id'],"import_flag"=>"1"])->get();
        if(count($checkExist)>0){
        }else{
            $add = new RCS();
            $add->client_id                   = $row['client_id'];
            $add->title                       = $row['title'];
            $add->name_first                  = $row['name_first'];
            $add->name_last                   = $row['name_last'];
            $add->name_middle                 = $row['name_middle'];            
            $add->address                     = $row['address'];
            $add->delivery_address            = $row['delivery_address'];
            $add->dob                         = $row['dob'];
            $add->mobile					  = $row['mobile'];
            $add->phone						  =	$row['phone'];
            $add->email						  = $row['email'];	
            $add->driver_license 			  = $row['driver_license'];            
            $add->passport 					  = $row['passport'];
            $add->medicare_card 			  = $row['medicare_card'];
            $add->medicare_card_reference     = $row['medicare_card_reference'];
            $add->green_id_passport			  = $row['green_id(Passport)'];
            $add->green_id_medicare           = $row['green_id (Medicare)'];
            $add->green_id_driving_license    = $row['green_id(Drivers license)'];
            $add->bsb						  = $row['bsb'];
            $add->account_number			  = $row['account_number'];
            $add->contract_id				  = $row['contract_id'];
            // $add->system    =  $system;    
            $add->import_flag = "1";
            $add->save();  
            // if($add->id>0){
            //   $this->counter++;
            // }

            

            // // if($this->rows==1){
            //     array_push($this->LogArr, $add->id);
            // // }

            
            // if($this->rows==$this->count){
            //     array_push($this->LogArr, $add->id);
            //     $this->StorImportLogs($this->LogArr,($this->counter)); 
            // }

            return $add;
           
        }
        
    }

    public function collection(Collection $rows)
    {
        return $rows;
        // foreach ($rows as $row) 
        // {
        //     User::create([
        //         'name' => $row[0],
        //     ]);
        // }
        
    }

    public function chunkSize(): int
    {
        return 100000;

    }

    public function addData($data){

    }

    public function StorImportLogs(array $data,$rowcount){
       $first = $data[0];
       $last  = end($data);
       $importLog = new importlogs();
       $importLog->startClientMappingId = $first;
       $importLog->endClientMappingId = $last;
       $importLog->system = $this->system;
       $importLog->totalRecords = $rowcount;
       $importLog->save();
    }
    
}
