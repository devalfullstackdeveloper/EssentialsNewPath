<?php

namespace App\Imports;

// use App\client_details;  
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\BOS2; 
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BOS2ClientImport implements ToModel, WithHeadingRow, WithChunkReading, ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function  __construct($system)
    {
        $this->system= $system; 
    }

    public function model(array $row)
    {
        $system = $this->system;
       
        return new Bos2([ 
          'default_type' => $row['default_type'],
          'crn' => $row['crn'],
          'date_joined' => $row['date_joined'],
          'title' => $row['title'],
          'name' => $row['name'],
          'name_first' => $row['name_first'],
          'name_middle' => $row['name_middle'],
          'name_last' => $row['name_last'],
          'address' => $row['address'],
          'address_unit_number' => $row['address_unit_number'],
          'address_number' => $row['address_number'],
          'address_name' => $row['address_name'],
          'address_city' => $row['address_city'],
          'address_state' => $row['address_state'],
          'address_postcode' => $row['address_postcode'],
          'address_lat' => $row['address_lat'],
          'address_lng' => $row['address_lng'],
          'address_municipality' => $row['address_municipality'],
          'address_region' => $row['address_region'],
          'address_zone' => $row['address_zone'],
          'delivery_address' => $row['delivery_address'],
          'delivery_address_unit_number' => $row['delivery_address_unit_number'],
          'delivery_address_number' => $row['delivery_address_number'],
          'delivery_address_name' => $row['delivery_address_name'],
          'delivery_address_city' => $row['delivery_address_city'],
          'delivery_address_state' => $row['delivery_address_state'],
          'delivery_address_postcode' => $row['delivery_address_postcode'],
          'delivery_address_lat' => $row['delivery_address_lat'],
          'delivery_address_lng' => $row['delivery_address_lng'],
          'delivery_address_municipality' => $row['delivery_address_municipality'],
          'delivery_address_region' => $row['delivery_address_region'],
          'delivery_address_zone' => $row['delivery_address_zone'],
          'phone' => $row['phone'],
          'mobile' => $row['mobile'],
          'email' => $row['email'],
          'dob' => $row['dob'],
          'driver_license' => $row['driver_license'],
          'driver_license_state_code' => $row['driver_license_state_code'],
          'passport' => $row['passport'],
          'passport_country_code' => $row['passport_country_code'],
          'nlr_name' => $row['nlr_name'],
          'nlr_name_first' => $row['nlr_name_first'],
          'nlr_name_last' => $row['nlr_name_last'],
          'nlr_address' => $row['nlr_address'],
          'nlr_address_unit_number' => $row['nlr_address_unit_number'],
          'nlr_address_number' => $row['nlr_address_number'],
          'nlr_address_name' => $row['nlr_address_name'],
          'nlr_address_city' => $row['nlr_address_city'],
          'nlr_address_state' => $row['nlr_address_state'],
          'nlr_address_postcode' => $row['nlr_address_postcode'],
          'nlr_phone' => $row['nlr_phone'],
          'nlr_relationship' => $row['nlr_relationship'],
          'centrelink_income' => $row['centrelink_income'],
          'centrelink_deductions' => $row['centrelink_deductions'],
          'other_income' => $row['other_income'],
          'other_deduction' => $row['other_deduction'],
          'comment' => $row['comment'],
          'customer_status' => $row['customer_status'],
          'adjustment' => $row['adjustment'],
          'medicare_card' => $row['medicare_card'],
          'medicare_card_reference' => $row['medicare_card_reference'],
          'medicare_card_expiry' => $row['medicare_card_expiry'],
          'medicare_card_colour' => $row['medicare_card_colour'],
          'medicare_card_middle_name' => $row['medicare_card_middle_name'],
          'defaulted' => $row['defaulted'],
          'relationship' => $row['relationship'],
          'dependents' => $row['dependents'],
          'shared' => $row['shared'],
          'living_situation' => $row['living_situation'],
          'partner_income' => $row['partner_income'],
          'statement_value' => $row['statement_value'],
          'system'    =>  $system
      ]);
    }

    public function collection(Collection $rows)
    {
        return $rows;
    }

    public function chunkSize(): int
    {
        return 100;
    } 
}
