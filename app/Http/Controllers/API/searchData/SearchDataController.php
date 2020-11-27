<?php

namespace App\Http\Controllers\API\searchData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportDataModel;
use App\Http\Requests\SearchClientRequest;

class SearchDataController extends Controller
{
    public function __construct(){

    }

    public function searchclient(SearchClientRequest $reuqest){
    	// implementing the mathing algorithm                                                    
    }
}
