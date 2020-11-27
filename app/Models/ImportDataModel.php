<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDataModel extends Model
{
    use HasFactory;

    

    public function model(array $row){
    	return new client_details([
    		'client_id' => $row[0],
    		'title'		=> $row[1],
    		'name_first'=> $row[2],
    		'name_last'	=> $row[3],
    		'name_middle'=> $row[4],
    		'address'	 => $row[5],
    		'delivery_address' => $row[6],
    		'dob'		=> $row[7],
    		'mobile'	=> $row[8],
    		'phone'		=> $row[9],
    		'email'		=> $row[10],
    		'crn'		=> $row[11],
    		'driver_license'=> $row[12],
    		'passport'	=> $row[13],
    		'medicare_card' => $row[14],
    		'delivery_card_reference' => $row[15],
    		'system'	=>	$this->system
    	]);
    }
}
