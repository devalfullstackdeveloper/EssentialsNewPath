<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLogs extends Model
{
 
    protected $table = "client_logs";

    protected $fillable = ['system_id','system_name','client_id','action_performed','previous_data'];  
} 
