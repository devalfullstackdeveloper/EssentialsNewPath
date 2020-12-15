<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model 
{
	protected $table = 'match_result';  
	protected $fillable = [
		'match_result_id','requested_client_id','requested_system','matched_system','matched_client_id','confidence_level','matching_fields','non_matching_fields','is_manual_override','manually_entered_confidence','note'
	];  
}
