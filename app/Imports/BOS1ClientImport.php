<?php

namespace App\Imports;

// use App\client_details;  
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\BOS1;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\importlogs;

use DB;


class BOS1ClientImport implements ToModel, WithHeadingRow, WithChunkReading, ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
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
        $checkExist = DB::table("bos1_data")->select('client_id')->where(["client_id"=>$row['client_id'],"import_flag"=>"1"])->get();
        if(count($checkExist)>0){
        }else{
            
            
            $add = new BOS1();
            $add->client_id                   = $row['client_id'];
            $add->default_type                = $row['default_type'];
            $add->crn                         = $row['crn'];
            $add->date_joined                 = $row['date_joined'];
            $add->title                       = $row['title'];
            $add->name                        = $row['name'];
            $add->name_first                  = $row['name_first'];
            $add->name_middle                 = $row['name_middle'];
            $add->name_last                   = $row['name_last'];
            $add->address                     = $row['address'];
            $add->address_unit_number         = $row['address_unit_number'];
            $add->address_number              = $row['address_number'];
            $add->address_name                = $row['address_name'];
            $add->address_city                = $row['address_city'];
            $add->address_state               = $row['address_state'];
            $add->address_postcode            = $row['address_postcode'];
            $add->address_lat                 = $row['address_lat'];
            $add->address_lng                 = $row['address_lng'];
            $add->address_municipality        = $row['address_municipality'];
            $add->address_region              = $row['address_region'];
            $add->address_zone                = $row['address_zone'];
            $add->delivery_address            = $row['delivery_address'];
            $add->delivery_address_unit_number= $row['delivery_address_unit_number'];
            $add->delivery_address_number     = $row['delivery_address_number'];
            $add->delivery_address_name       = $row['delivery_address_name'];
            $add->delivery_address_city       = $row['delivery_address_city'];
            $add->delivery_address_state      = $row['delivery_address_state'];
            $add->delivery_address_postcode   = $row['delivery_address_postcode'];
            $add->delivery_address_lat        = $row['delivery_address_lat'];
            $add->delivery_address_lng        = $row['delivery_address_lng'];
            $add->delivery_address_municipality= $row['delivery_address_municipality'];
            $add->delivery_address_region     = $row['delivery_address_region'];
            $add->delivery_address_zone       = $row['delivery_address_zone'];
            $add->phone                       = $row['phone'];
            $add->mobile                      = $row['mobile'];
            $add->email                       = $row['email'];
            $add->dob                         = $row['dob'];
            $add->driver_license = $row['driver_license'];
            $add->driver_license_state_code = $row['driver_license_state_code'];
            $add->passport = $row['passport'];
            $add->passport_country_code = $row['passport_country_code'];
            $add->nlr_name = $row['nlr_name'];
            $add->nlr_name_first = $row['nlr_name_first'];
            $add->nlr_name_last = $row['nlr_name_last'];
            $add->nlr_address = $row['nlr_address'];
            $add->nlr_address_unit_number = $row['nlr_address_unit_number'];
            $add->nlr_address_number = $row['nlr_address_number'];
            $add->nlr_address_name = $row['nlr_address_name'];
            $add->nlr_address_city = $row['nlr_address_city'];
            $add->nlr_address_state = $row['nlr_address_state'];
            $add->nlr_address_postcode = $row['nlr_address_postcode'];
            $add->nlr_phone = $row['nlr_phone'];
            $add->nlr_relationship = $row['nlr_relationship'];
            $add->centrelink_income = $row['centrelink_income'];
            $add->centrelink_deductions = $row['centrelink_deductions'];
            $add->other_income = $row['other_income'];
            $add->other_deduction = $row['other_deduction'];
            $add->comment = $row['comment'];
            $add->customer_status = $row['customer_status'];
            $add->adjustment = $row['adjustment'];
            $add->medicare_card = $row['medicare_card'];
            $add->medicare_card_reference = $row['medicare_card_reference'];
            $add->medicare_card_expiry = $row['medicare_card_expiry'];
            $add->medicare_card_colour = $row['medicare_card_colour'];
            $add->medicare_card_middle_name = $row['medicare_card_middle_name'];
            $add->defaulted = $row['defaulted'];
            $add->relationship = $row['relationship'];
            $add->dependents = $row['dependents'];
            $add->shared = $row['shared'];
            $add->living_situation = $row['living_situation'];
            $add->partner_income = $row['partner_income'];
            $add->statement_value = $row['statement_value'];
            $add->system    =  $system;    
            $add->import_flag = "1";
            $add->save();  
            if($add->id>0){
              $this->counter++;
            }

            

            // if($this->rows==1){
                array_push($this->LogArr, $add->id);
            // }

            
            if($this->rows==$this->count){
                array_push($this->LogArr, $add->id);
                $this->StorImportLogs($this->LogArr,($this->counter)); 
            }

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
        return 100;

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
