<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_details extends Model
{
    use HasFactory;

    protected $table = "client_details";

    protected $fillable = ['client_id','title','name_first','name_last','name_middle',
			'address','delivery_address','dob','mobile','phone','email','crn','driver_license','passport',
			'medicare_card','delivery_card_reference','system'];

	public function store($data){

	}
}
