<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchResultLogs extends Model
{
 
    protected $table = "logs";

    protected $fillable = ['id','description','category'];  
} 
