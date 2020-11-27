<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchResults extends Model 
{
	protected $table = 'match_results';  
	protected $fillable = [
		'id','bos1_client_id','bos1_per','bos2_client_id','bos2_per','mim_client_id','mim_per','rcs_client_id','rcs_per','requested_clientid','system_name'
	];  
}
