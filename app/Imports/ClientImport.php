<?php

namespace App\Imports;

// use App\client_details;  
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\client_details;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ClientImport implements ToModel, WithHeadingRow, WithChunkReading
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
        
        return new client_details([
           'client_id' => $row['client_id'],
            'title'     => $row['title'],
            'name_first'=> $row['name_first'],
            'name_last' => $row['name_last'],
            'name_middle'=> $row['name_middle'],
            'address'    => $row['address'],
            'delivery_address' => $row['delivery_address'],
            'dob'       => $row['dob'],
            'mobile'    => $row['mobile'],
            'phone'     => $row['phone'],
            'email'     => $row['email'],
            'crn'       => $row['crn'],
            'driver_license'=> $row['driver_license'],
            'passport'  => $row['passport'],
            'medicare_card' => $row['medicare_card'],
            'medicare_card_reference' => $row['medicare_card_reference'],
            'system'    =>  $this->system
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    } 
}
