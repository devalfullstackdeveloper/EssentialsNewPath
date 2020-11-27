<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller as Controller;
use App\Models\BOS1;
use App\Models\BOS2;
use App\Models\MIM;
use App\Models\RCS;
use App\Models\MatchResults;
use App\Models\ClientLogs;
use App\Models\MatchResultLogs;
use App\Jobs\AddRCSJobApi;
use App\Jobs\UpdateRCSJobApi;
use App\Jobs\AddMIMJobApi;
use App\Jobs\UpdateMIMJobApi;
use App\Jobs\AddBOS1JobApi;
use App\Jobs\UpdateBOS1JobApi;
use App\Jobs\AddBOS2JobApi;
use App\Jobs\UpdateBOS2JobApi;
use App\Helpers\Helper;
 
use DB;

class SystemClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    	           $response['status'] = 400; 
                    $response['message'] = 'No Such Id Found';
                    return response()->json($response);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function clientMapping(Request $request)
    {   
    	if(!isset($request->system))
    	{
    		$response['status'] = 400;
    		$response['message'] = "System Is Required";
    		return response()->json($response); 
    	}
    	if(!isset($request->client_id))
    	{
    		$response['status'] = 400;
    		$response['message'] = "Client Id Required";
    		return response()->json($response);
    	}

       
        $client_id = $request->client_id;
    	if($request->system == 'BOS1')
    	{
            $count_bos1_records_with_client_id = BOS1::where('client_id',$client_id)->get()->count();
    		
    		if($count_bos1_records_with_client_id > 0)
    		{
    			$client_id = '';
    			if(!isset($request->client_id))
    			{
    				$response['status'] = 400;
    				$response['message'] = 'Client Id Is Required'; 
    				return response()->json($response);
    			}
    			else
    			{ 
    				$client_id = $request->client_id;
    			} 
    			try {
    				
    				if($count_bos1_records_with_client_id > 0)
    				{   
                        $input_request = $request->all();
                        $update_bos1_data = new UpdateBOS1JobApi('BOS1',$input_request,$client_id); 
                        dispatch($update_bos1_data);  
    					$response['status'] = 200; 
    					$response['message'] = 'Updated Client Successfully';
    					return response()->json($response);
    				}
    				else
    				{
    					$response['status'] = 400; 
    					$response['message'] = 'No Such Id Found';
    				}
    			} 
    			catch (\Exception $e) { 
    				$response['status'] = 400;
    				$response['message'] = $e; 
    			}
    			return response()->json($response);
    		}
    		else
    		{
    			try { 
                        $input_request = $request->all();
                        $add_bos1_data = new AddBOS1JobApi('BOS1',$input_request);
                        dispatch($add_bos1_data);

    				$response['status'] = 200;
    				$response['message'] = 'Added Client Successfully';
    			}
    			catch (\Exception $e) { 
    				$response['status'] = 400;
    				$response['message'] = $e; 
    			}
    			return response()->json($response);
    		}
    	} 

    	if($request->system == 'BOS2')
    	{
    		$count = BOS2::where('client_id',$request->client_id)->get()->count();

    		if($count > 0)
    		{
    			$client_id = '';
    			if(!isset($request->client_id))
    			{
    				$response['status'] = 400;
    				$response['message'] = 'Client Id Is Required'; 
    				return response()->json($response);
    			}
    			else
    			{ 
    				$client_id = $request->client_id;
    			} 
    			try {
    				$count = BOS2::where('client_id',$client_id)->get()->count();
    				if($count > 0)
    				{   
                        $input_array = $request->all();
                        $updateBos2 = new UpdateBOS2JobApi('BOS2',$input_array,$client_id); 
                        dispatch($updateBos2);

    					$response['status'] = 200; 
    					$response['message'] = 'Updated Successfully';
    					return response()->json($response);


    				}
    				else
    				{
    					$response['status'] = 400; 
    					$response['message'] = 'No Such Id Found';
    				}

    			} 
    			catch (\Exception $e) { 
    				$response['status'] = 400;
    				$response['message'] = $e; 
    			}
    			return response()->json($response);
    		}
    		else
    		{
    			try { 
    				
                    $input_array = $request->all();
                    $addBos2 = new AddBOS2JobApi('BOS2',$input_array);
                    dispatch($addBos2);

    				$response['status'] = 200;
    				$response['message'] = 'Added Client Successfully';
    			}
    			catch (\Exception $e) { 
    				$response['status'] = 400;
    				$response['message'] = $e; 
    			}
    			return response()->json($response);
    		}
    	}

    	if($request->system == 'MIM')
    	{
    		$count = MIM::where('client_id',$request->client_id)->get()->count();
    		if($count > 0)
    		{
    			$client_id = '';
    			if(!isset($request->client_id))
    			{
    				$response['status'] = 400;
    				$response['message'] = 'Client Id Is Required'; 
    				return response()->json($response);
    			}
    			else
    			{ 
    				$client_id = $request->client_id;
    			} 
    			try {
    				$count = MIM::where('client_id',$client_id)->get()->count();
    				if($count > 0)
    				{   
                        //Update MIM Through Queue
                        $input_array = $request->all();
                        $updateMIM =  new UpdateMIMJobApi('MIM',$input_array,$client_id);
                        dispatch($updateMIM);

    					$response['status'] = 200; 
    					$response['message'] = 'Updated Successfully';
    					return response()->json($response);


    				}
    				else
    				{
    					$response['status'] = 400; 
    					$response['message'] = 'No Such Id Found';
    				}

    			} 
    			catch (\Exception $e) { 
    				$response['status'] = 400;
    				$response['message'] = $e; 
    			}
    			return response()->json($response);
    		}
    		else
    		{
    			try { 
    				
                    $input_array = $request->all();
                    $addMIM =  new AddMIMJobApi('MIM',$input_array);
                    dispatch($addMIM);
    				$response['status'] = 200;
    				$response['message'] = 'Added Client Successfully';
    			}
    			catch (\Exception $e) { 
    				$response['status'] = 400;
    				$response['message'] = $e; 
    			}
    			return response()->json($response);
    		}
    	}

         if($request->system == 'RCS')
        {
            $count = RCS::where('client_id',$request->client_id)->get()->count();
            if($count > 0)
            {
                $client_id = '';
                if(!isset($request->client_id))
                {
                    $response['status'] = 400;
                    $response['message'] = 'Client Id Is Required'; 
                    return response()->json($response);
                }
                else
                { 
                    $client_id = $request->client_id;
                } 
                try {
                    $count = RCS::where('client_id',$client_id)->get()->count();
                    if($count > 0)
                    {   
                       $input_array = $request->all();
                       $updateRcs =  new UpdateRCSJobApi('RCS',$input_array,$client_id);
                       dispatch($updateRcs);
                        $response['status'] = 200; 
                        $response['message'] = 'Updated Successfully';
                        return response()->json($response);
                    }
                    else
                    {
                        $response['status'] = 400; 
                        $response['message'] = 'No Such Id Found';
                    }

                } 
                catch (\Exception $e) { 
                    $response['status'] = 400;
                    $response['message'] = $e; 
                }
                return response()->json($response);
            }
            else
            {
                try { 
                    $input_array = $request->all();
                    $addRcs =  new AddRCSJobApi('RCS',$input_array);
                    dispatch($addRcs);
                    $response['status'] = 200;
                    $response['message'] = 'Added Client Successfully';
                }
                catch (\Exception $e) { 
                    $response['status'] = 400;
                    $response['message'] = $e; 
                }
                return response()->json($response);
            }
        }

    }

    public function clientMapping1(Request $request)
    {   
    	if(!isset($request->system))
    	{
    		$response['status'] = 400;
    		$response['message'] = "System Is Required";
    		return response()->json($response); 
    	}

    	if(!isset($request->type))
    	{
    		$response['status'] = 400;
    		$response['message'] = "Type Is Required";
    		return response()->json($response); 
    	}



    	if($request->system == 'BOS1' && $request->type == 'add')
    	{   
    		try { 
    			$var1 = BOS1::create($request->all()); 

    			$response['status'] = 200;
    			$response['message'] = 'Success';
    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		}
    		return response()->json($response);
    	}

    	if($request->system == 'BOS2' && $request->type == 'add')
    	{
    		try {
    			$var1 = BOS2::create($request->all()); 

    			$response['status'] = 200;
    			$response['message'] = 'Success';
    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		}
    		return response()->json($response);
    	}

    	if($request->system == 'MIM' && $request->type == 'add')
    	{
    		try {
    			$var1 = BOS2::create($request->all()); 

    			$response['status'] = 200;
    			$response['message'] = 'Success';
    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		}
    		return response()->json($response);
    	}


    	if($request->system == 'BOS1' && $request->type == 'update')
    	{

    		$BOS1id = '';
    		if(!isset($request->client_id))
    		{
    			$response['status'] = 400;
    			$response['message'] = 'Bos 1 Id Is Required'; 
    			return response()->json($response);
    		}
    		else
    		{ 
    			$BOS1id = $request->client_id;
    		} 
    		try {
    			$count = BOS1::where('client_id',$BOS1id)->get()->count();
    			if($count > 0)
    			{   
    				unset($request['client_id']);
    				$var1 = BOS1::where('client_id',$BOS1id)->update($request->all());
    				$response['status'] = 200; 
    				$response['message'] = 'Success';
    			}
    			else
    			{
    				$response['status'] = 400; 
    				$response['message'] = 'No Such Id Found';
    			}

    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		}
    		return response()->json($response);


    	}

    	if($request->system == 'BOS2' && $request->type == 'update')
    	{
    		$BOS2id = '';
    		if(!isset($request->client_id))
    		{
    			$response['status'] = 400;
    			$response['message'] = 'Client Id Is Required'; 
    			return response()->json($response);
    		}
    		else
    		{
    			$BOS2id = $request->client_id;
    		} 
    		try {

    			$count = BOS2::where('client_id',$BOS2id)->get()->count();
    			if($count > 0)
    			{
    				$var1 = BOS2::where('client_id',$BOS2id)->update($request->all());
    				$response['status'] = 200;
    				$response['message'] = 'Success';
    			}
    			else
    			{
    				$response['status'] = 400;
    				$response['message'] = 'No Such Id Found';
    			}


    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		}
    		return response()->json($response);
    	}

    	if($request->system == 'MIM' && $request->type == 'update')
    	{
    		$mimid = '';
    		if(!isset($request->client_id)) 
    		{
    			$response['status'] = 400;
    			$response['message'] = 'Client Id Is Required'; 
    			return response()->json($response);
    		}
    		else
    		{
    			$mimid = $request->client_id;
    		} 
    		try {

    			$count = MIM::where('client_id',$mimid)->get()->count();
    			if($count > 0)
    			{
    				$var1 = MIM::where('client_id',$mimid)->update($request->all());
    				$response['status'] = 200;
    				$response['message'] = 'Success';
    			}
    			else
    			{
    				$response['status'] = 400; 
    				$response['message'] = 'No Such Id Found';
    			}


    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		}
    		return response()->json($response); 
    	}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)  
    {   
    	$BOS1id = ''; 
    	if(!isset($request->bos1_id))
    	{
    		$response['status'] = 400;
    		$response['message'] = 'Bos 1 Id Is Required'; 
    		return response()->json($response);
    	}
    	else
    	{
    		try {
    			$count = BOS1::where('bos1_id', $request->bos1_id)->get()->count();

    			if($count > 0)
    			{
    				BOS1::where('bos1_id', $request->bos1_id)->delete();
    				$response['status'] = 200;   
    				$response['message'] = 'Success'; 
    			}
    			else
    			{
    				$response['status'] = 400;   
    				$response['message'] = 'No Such Id Found'; 
    			}


    		}
    		catch (\Exception $e) { 
    			$response['status'] = 400;
    			$response['message'] = $e; 
    		} 
    		return response()->json($response);
    	} 


    }


public function matchData(Request $request)
    {
    // try {

        if(!isset($request->system) || $request->system == '')
        {
            $response['status'] = 400;
            $response['Message'] = 'System Is Required';
            return json_encode($response);
        }

        if($request->system!='BOS1' && $request->system!='BOS2' && $request->system!='MIM' && $request->system!='RCS' )
        {
            $response['status'] = 400;
            $response['Message'] = 'Invalid System';
            return json_encode($response);
        }

    $arrayMatch = array();  
$bos1 = BOS1::where(function($bos1) use ($request){
      if(isset($request->client_id) && $request->client_id != '' && $request->system == 'BOS1')
      {
        $bos1->where('client_id', $request->client_id);
      }
      if(isset($request->crn) && $request->crn != '')
                {
                   $bos1->orWhere('crn', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $bos1->orWhere('driver_license', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $bos1->orWhere('passport', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $bos1->orWhere('medicare_card', $request->medicare_card);
                }
  })->get()->count();
$bos2 = '0';




$bos2 = BOS2::where(function($bos2) use ($request){

   if(isset($request->client_id) && $request->client_id != '' && $request->system == 'BOS2')
      {
        $bos2->where('client_id', $request->client_id);
      }
      if(isset($request->crn) && $request->crn != '')
                {
                   $bos2->orWhere('crn', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $bos2->orWhere('driver_license', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $bos2->orWhere('passport', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $bos2->orWhere('medicare_card', $request->medicare_card);
                }

  })->get()->count();



$mim = MIM::where(function($mim) use ($request){
    if(isset($request->client_id) && $request->client_id != '' && $request->system == 'MIM')
      {
        $mim->where('client_id', $request->client_id);
      }
      if(isset($request->crn) && $request->crn != '')
                {
                   $mim->orWhere('crn_number', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $mim->orWhere('licence_number', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $mim->orWhere('passport_no', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $mim->orWhere('medicare_no', $request->medicare_card);
                }
  })->get()->count();


$rcs = RCS::where(function($rcs) use ($request){
    if(isset($request->client_id) && $request->client_id != '' && $request->system == 'RCS')
      {
        $rcs->where('client_id', $request->client_id);
      }

      
      if(isset($request->crn) && $request->crn != '')
                {
                   $rcs->orWhere('crn', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $rcs->orWhere('driver_license', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $rcs->orWhere('passport', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $rcs->orWhere('medicare_card', $request->medicare_card);
                }
  })->get()->count();



    
$bos1 = $bos1 > 0 ? 1 : 0;
$bos2 = $bos2 > 0 ? 1 : 0;
$mim = $mim > 0 ? 1 : 0;
$rcs = $rcs > 0 ? 1 : 0;

    

$resultArray = array();

/*bos1*/

$bos1Total = 0;
 
if($bos1 > 0)
{
    $bos1 = BOS1::where(function($bos1) use ($request){
      if(isset($request->client_id) && $request->client_id != '' && $request->system == 'BOS1' )
      {
        $bos1->where('client_id', $request->client_id);
      }
      if(isset($request->crn) && $request->crn != '')
                {
                   $bos1->orWhere('crn', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $bos1->orWhere('driver_license', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $bos1->orWhere('passport', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $bos1->orWhere('medicare_card', $request->medicare_card);
                }
  })->get();

$bos1Total = 100;

    if(isset($request->title) && $request->title != '')
    {
        if($request->title != $bos1[0]->title)
        {
            $bos1Total = $bos1Total - 1.6;
        }
    }

    if(isset($request->name_first) && $request->name_first != '')
    {
        if($request->name_first != $bos1[0]->name_first)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }


    if(isset($request->name_last) && $request->name_last != '')
    {
        if($request->name_last != $bos1[0]->name_last)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }

    if(isset($request->name_middle) && $request->name_middle != '')
    {
        if($request->name_middle != $bos1[0]->name_middle)
        {
            $bos1Total = $bos1Total - 3.2;
        }
    }

    if(isset($request->address) && $request->address != '')
    {
        if($request->address != $bos1[0]->address)
        {
            $bos1Total = $bos1Total - 4.0;
        }
    }

    if(isset($request->delivery_address) && $request->delivery_address != '')
    {
        if($request->delivery_address != $bos1[0]->delivery_address)
        {
            $bos1Total = $bos1Total - 1.6;
        }
    }

    if(isset($request->dob) && $request->dob != '')
    {
        if($request->dob != $bos1[0]->dob)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }

    if(isset($request->phone) && $request->phone != '')
    {
        if($request->phone != $bos1[0]->phone)
        {
            $bos1Total = $bos1Total - 4.0;
        }
    }
    if(isset($request->mobile) && $request->mobile != '')
    {
        if($request->mobile != $bos1[0]->mobile)
        {
            $bos1Total = $bos1Total - 4.0;
        }
    }


    if(isset($request->crn) && $request->crn != '')
    {
        if($request->crn != $bos1[0]->crn)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }

    if(isset($request->email) && $request->email != '')
    {
        if($request->email != $bos1[0]->email)
        {
            $bos1Total = $bos1Total - 4.0;
        }
    }

    if(isset($request->driver_license) && $request->driver_license != '')
    {
        if($request->driver_license != $bos1[0]->driver_license)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }

    if(isset($request->passport) && $request->passport != '')
    {
        if($request->passport != $bos1[0]->passport)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }

    if(isset($request->medicare_card) && $request->medicare_card != '')
    {
        if($request->medicare_card != $bos1[0]->medicare_card)
        {
            $bos1Total = $bos1Total - 8.0;
        }
    }
    if(isset($request->medicare_card_reference) && $request->medicare_card_reference != '')
    {
        if($request->medicare_card_reference != $bos1[0]->medicare_card_reference)
        {
            $bos1Total = $bos1Total - 2.0;
        }
    }

    if($bos1Total != '' && $bos1Total > 0)
    {
        $bos1Total =  number_format((float)$bos1Total, 2, '.', '');
    }

    $resultArray['bos1Id'] = $bos1[0]->client_id;
    $resultArray['bos1total'] = $bos1Total;



}

/*bos1 end*/


/*bos 2 */
if($bos2 > 0)
{
    $bos2 = BOS2::where(function($bos2) use ($request){
      if(isset($request->client_id) && $request->client_id != '' && $request->system == 'BOS2')
      {
        $bos2->where('client_id', $request->client_id);
      }
      if(isset($request->crn) && $request->crn != '')
                {
                   $bos2->orWhere('crn', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $bos2->orWhere('driver_license', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $bos2->orWhere('passport', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $bos2->orWhere('medicare_card', $request->medicare_card);
                }
  })->get();

$bos2Total = 100;

    if(isset($request->title) && $request->title != '')
    {
        if($request->title != $bos2[0]->title)
        {
            $bos2Total = $bos2Total - 1.6;
        }
    }

    if(isset($request->name_first) && $request->name_first != '')
    {
        if($request->name_first != $bos2[0]->name_first)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }


    if(isset($request->name_last) && $request->name_last != '')
    {
        if($request->name_last != $bos2[0]->name_last)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }

    if(isset($request->name_middle) && $request->name_middle != '')
    {
        if($request->name_middle != $bos2[0]->name_middle)
        {
            $bos2Total = $bos2Total - 3.2;
        }
    }

    if(isset($request->address) && $request->address != '')
    {
        if($request->address != $bos2[0]->address)
        {
            $bos2Total = $bos2Total - 4.0;
        }
    }

    if(isset($request->delivery_address) && $request->delivery_address != '')
    {
        if($request->delivery_address != $bos2[0]->delivery_address)
        {
            $bos2Total = $bos2Total - 1.6;
        }
    }

    if(isset($request->dob) && $request->dob != '')
    {
        if($request->dob != $bos2[0]->dob)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }

    if(isset($request->phone) && $request->phone != '')
    {
        if($request->phone != $bos2[0]->phone)
        {
            $bos2Total = $bos2Total - 4.0;
        }
    }
    if(isset($request->mobile) && $request->mobile != '')
    {
        if($request->mobile != $bos2[0]->mobile)
        {
            $bos2Total = $bos2Total - 4.0;
        }
    }


    if(isset($request->crn) && $request->crn != '')
    {
        if($request->crn != $bos2[0]->crn)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }

    if(isset($request->email) && $request->email != '')
    {
        if($request->email != $bos2[0]->email)
        {
            $bos2Total = $bos2Total - 4.0;
        }
    }

    if(isset($request->driver_license) && $request->driver_license != '')
    {
        if($request->driver_license != $bos2[0]->driver_license)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }

    if(isset($request->passport) && $request->passport != '')
    {
        if($request->passport != $bos2[0]->passport)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }

    if(isset($request->medicare_card) && $request->medicare_card != '')
    {
        if($request->medicare_card != $bos2[0]->medicare_card)
        {
            $bos2Total = $bos2Total - 8.0;
        }
    }
    if(isset($request->medicare_card_reference) && $request->medicare_card_reference != '')
    {
        if($request->medicare_card_reference != $bos2[0]->medicare_card_reference)
        {
            $bos2Total = $bos2Total - 2.0;
        }
    }
    if($bos2Total != '' && $bos2Total > 0)
    {
        $bos2Total =  number_format((float)$bos2Total, 2, '.', '');
    }
    
    $resultArray['bos2Id'] = $bos2[0]->client_id;
    $resultArray['bos2total'] = $bos2Total ;
}

/*bos 2 end*/

$mimtotal = 0;
if($mim > 0)
{
  $mim = MIM::where(function($mim) use ($request){
    if(isset($request->client_id) && $request->client_id != '' && $request->system == 'MIM')
    {
        $mim->where('client_id', $request->client_id);
    }
      
      if(isset($request->crn) && $request->crn != '' )
                {
                   $mim->orWhere('crn_number', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $mim->orWhere('licence_number', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $mim->orWhere('passport_no', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $mim->orWhere('medicare_no', $request->medicare_card);
                }
  })->get();
$mimtotal = 100;
   if(isset($mim[0]->first_name))
    {

    if(isset($request->name_first) && $request->name_first != '')
    {
        if($request->name_first != $mim[0]->first_name)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
}

    if(isset($mim[0]->middle_name))
    {
          if(isset($request->name_middle) && $request->name_middle != '')
    {
        if($request->name_middle != $mim[0]->middle_name)
        {
            $mimtotal = $mimtotal - 3.2;
        }
    }
    }
    

    if(isset($mim[0]->last_name))
    {
        if(isset($request->name_last) && $request->name_last != '')
    {
        if($request->name_last != $mim[0]->last_name)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
    }
    
    
    if(isset($mim[0]->address1))
    {
    if(isset($request->address) && $request->address != '')
    {
        if($request->address != $mim[0]->address1)
        {
            $mimtotal = $mimtotal - 4.0;
        }
    }
    }
    
    if(isset($mim[0]->address2))
    {
    if(isset($request->delivery_address) && $request->delivery_address != '')
    {
        if($request->delivery_address != $mim[0]->address2)
        {
            $mimtotal = $mimtotal - 1.6;
        }
    }
    }

if(isset($mim[0]->date_of_birth))
    {
    if(isset($request->dob) && $request->dob != '')
    {
        if($request->dob != $mim[0]->date_of_birth)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
}

if(isset($mim[0]->home_phone))
    {
    if(isset($request->phone) && $request->phone != '')
    {
        if($request->phone != $mim[0]->home_phone)
        {
            $mimtotal = $mimtotal - 4.0;
        }
    }
    }
    
    if(isset($mim[0]->mobile_phone))
    {
    if(isset($request->mobile) && $request->mobile != '')
    {
        if($request->mobile != $mim[0]->mobile_phone)
        {
            $mimtotal = $mimtotal - 4.0;
        }
    }
    }

if(isset($mim[0]->crn_number))
    {
    if(isset($request->crn) && $request->crn != '')
    {
        if($request->crn != $mim[0]->crn_number)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
}   

if(isset($mim[0]->email))
    {
    if(isset($request->email) && $request->email != '')
    {
        if($request->email != $mim[0]->email)
        {
            $mimtotal = $mimtotal - 4.0;
        }
    }
}   

if(isset($mim[0]->driver_license_no))
    {
    
    if(isset($request->driver_license) && $request->driver_license != '')
    {
        if($request->driver_license != $mim[0]->driver_license_no)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
    
}   

if(isset($mim[0]->passport_no))
    {
    if(isset($request->passport) && $request->passport != '')
    {
        if($request->passport != $mim[0]->passport_no)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
    }


if(isset($mim[0]->medicare_no))
    {
    if(isset($request->medicare_card) && $request->medicare_card != '')
    {
        if($request->medicare_card != $mim[0]->medicare_no)
        {
            $mimtotal = $mimtotal - 8.0;
        }
    }
  }

  if($mimtotal != '' && $mimtotal > 0)
    {
        $mimtotal =  number_format((float)$mimtotal, 2, '.', '');
    }

  $resultArray['mimid'] = $mim[0]->client_id; 
  $resultArray['mimtotal'] = $mimtotal; 
} 
$rcstotal = 0;
if($rcs > 0)
{
  $rcs = RCS::where(function($rcs) use ($request){
    if(isset($request->client_id) && $request->client_id != '' && $request->system == 'RCS')
    {
        $rcs->where('client_id', $request->client_id);
    }
      if(isset($request->crn) && $request->crn != '')
                {
                   $rcs->orWhere('crn', $request->crn);
                }
            if(isset($request->driver_license) && $request->driver_license != '')
                {
                    $rcs->orWhere('driver_license', $request->driver_license);
                }
                if(isset($request->passport) && $request->driver_license != '')
                {
                   $rcs->orWhere('passport', $request->passport);
                } 
                if(isset($request->medicare_card) && $request->medicare_card != '')
                {
                   $rcs->orWhere('medicare_card', $request->medicare_card);
                }
  })->get();


$rcstotal = 100;

    if(isset($rcs[0]->title))
    {
         if(isset($request->title) && $request->title != '')
    {
        if($request->title != $rcs[0]->title)
        {
            $rcstotal = $rcstotal - 1.6;
        }
    }
    }
    

    
   if(isset($rcs[0]->name_first))   
    {

    if(isset($request->name_first) && $request->name_first != '')
    {
        if($request->name_first != $rcs[0]->name_first)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
}

    if(isset($rcs[0]->name_middle))
    {
          if(isset($request->name_middle) && $request->name_middle != '')
    {
        if($request->name_middle != $rcs[0]->name_middle)
        {
            $rcstotal = $rcstotal - 3.2;
        }
    }
    }
    

    if(isset($rcs[0]->name_last))
    {
        if(isset($request->name_last) && $request->name_last != '')
    {
        if($request->name_last != $rcs[0]->name_last)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
    }
    
    
    if(isset($rcs[0]->address))
    {
    if(isset($request->address) && $request->address != '')
    {
        if($request->address != $rcs[0]->address)
        {
            $rcstotal = $rcstotal - 4.0;
        }
    }
    }
    
    if(isset($rcs[0]->delivery_address))
    {
    if(isset($request->delivery_address) && $request->delivery_address != '')
    {
        if($request->delivery_address != $rcs[0]->delivery_address)
        {
            $rcstotal = $rcstotal - 1.6;
        }
    }
    }

if(isset($rcs[0]->dob))
    {
    if(isset($request->dob) && $request->dob != '')
    {
        if($request->dob != $rcs[0]->dob)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
}

if(isset($rcs[0]->phone))
    {
    if(isset($request->phone) && $request->phone != '')
    {
        if($request->phone != $rcs[0]->phone)
        {
            $rcstotal = $rcstotal - 4.0;
        }
    }
    }
    
    if(isset($rcs[0]->mobile))
    {
    if(isset($request->mobile) && $request->mobile != '')
    {
        if($request->mobile != $rcs[0]->mobile)
        {
            $rcstotal = $rcstotal - 4.0;
        }
    }
    }

if(isset($rcs[0]->crn))
    {
    if(isset($request->crn) && $request->crn != '')
    {
        if($request->crn != $rcs[0]->crn)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
}   

if(isset($rcs[0]->email))
    {
    if(isset($request->email) && $request->email != '')
    {
        if($request->email != $rcs[0]->email)
        {
            $rcstotal = $rcstotal - 4.0;
        }
    }
}   

if(isset($rcs[0]->driver_license))
    {
    
    if(isset($request->driver_license) && $request->driver_license != '')
    {
        if($request->driver_license != $rcs[0]->driver_license)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
    
}   

if(isset($rcs[0]->passport))
    {
    if(isset($request->passport) && $request->passport != '')
    {
        if($request->passport != $rcs[0]->passport)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
    }


if(isset($rcs[0]->medicare_card))
    {
    if(isset($request->medicare_card) && $request->medicare_card != '')
    {
        if($request->medicare_card != $rcs[0]->medicare_card)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
  } 

  if(isset($rcs[0]->bsb))
    {
    if(isset($request->bsb) && $request->bsb != '')
    {
        if($request->bsb != $rcs[0]->bsb)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
  } 

   if(isset($rcs[0]->medicare_card_reference))
    {
    if(isset($request->medicare_card_reference) && $request->medicare_card_reference != '')
    {
        if($request->medicare_card_reference != $rcs[0]->medicare_card_reference)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
  }  

  if(isset($rcs[0]->account_number))
    {
    if(isset($request->account_number) && $request->account_number != '')
    {
        if($request->account_number != $rcs[0]->account_number)
        {
            $rcstotal = $rcstotal - 8.0;
        }
    }
  } 

  if($rcstotal != '' && $rcstotal > 0)
    {
        $rcstotal =  number_format((float)$rcstotal, 2, '.', '');
    }

  $resultArray['rcsid'] = $rcs[0]->client_id; 
  $resultArray['rcstotal'] = $rcstotal; 

}


if(!isset($resultArray['bos1Id']))
{
    $resultArray['bos1Id'] = 0;
    $resultArray['bos1total'] = '0';
}

if(!isset($resultArray['bos2Id']))
{
    $resultArray['bos2Id'] = 0;
    $resultArray['bos2total'] = '0';
}

if(!isset($resultArray['mimid']))
{
    $resultArray['mimid'] = 0;
    $resultArray['mimtotal'] = '0';
}

if(!isset($resultArray['rcsid']))
{
    $resultArray['rcsid'] = 0;
    $resultArray['rcstotal'] = '0';
}
   
    $countMatch = MatchResults::where('requested_clientid',$request->client_id)->where('system_name',$request->system)->get()->count();

    if($countMatch > 0)
    {

        $OldArray = MatchResults::where('requested_clientid',$request->client_id)->where('system_name',$request->system)->get()->toArray();

        $logs = array('client_id'=>$request->client_id,'description'=>json_encode($OldArray),'category'=>'Updated Match Result');
        $cleintLogs = MatchResultLogs::insert($logs);

    
         $updateDetails = [
            'bos1_client_id'=>$resultArray['bos1Id'],
            'bos1_per' => $resultArray['bos1total'],
            'bos2_client_id' => $resultArray['bos2Id'],
            'bos2_per' => $resultArray['bos2total'],
            'mim_client_id' => $resultArray['mimid'],
            'mim_per' => $resultArray['mimtotal'],
            'rcs_client_id' => $resultArray['rcsid'],
            'rcs_per' => $resultArray['rcstotal'],
            'requested_clientid' => $request->client_id,
            'system_name' => $request->system
        ];

       
        DB::table('match_results')
        ->where('requested_clientid', $request->client_id)
        ->where('system_name',$request->system)
        ->update($updateDetails);

         $response['status'] = 200;   
         $response['message'] = 'Updated';
         $response['result'] = $updateDetails;
       
    }
    else
    {
        $matchresults = new MatchResults();
        $matchresults->bos1_client_id = $resultArray['bos1Id'];
        $matchresults->bos1_per = $resultArray['bos1total'];
        $matchresults->bos2_client_id = $resultArray['bos2Id'];
        $matchresults->bos2_per = $resultArray['bos2total'];
        $matchresults->mim_client_id = $resultArray['mimid'];
        $matchresults->mim_per = $resultArray['mimtotal'];
        $matchresults->rcs_client_id = $resultArray['rcsid'];
        $matchresults->rcs_per = $resultArray['rcstotal'];
        $matchresults->requested_clientid = $request->client_id;
        $matchresults->system_name = $request->system;
        $matchresults->save();



        $arrayNew = array(
            'bos1_client_id'=>$resultArray['bos1Id'],
            'bos1_per'=>$resultArray['bos1total'],
            'bos2_client_id'=>$resultArray['bos2Id'],
            'bos2_per'=>$resultArray['bos2total'],
            'mim_client_id'=>$resultArray['mimid'],
            'mim_per'=>$resultArray['mimtotal'],
            'rcs_client_id'=>$resultArray['rcsid'],
            'rcs_per'=>$resultArray['rcstotal'],
            'requested_clientid'=>$request->client_id,
            'system_name'=>$request->system
        );

        // $arrayNew = array('bos1_client_id'=>$resultArray['bos1Id'],'bos1_per'=>$bos1Total,'bos2_per'=>$bos2Total,'mim_per'=>$mimtotal,'rcs_per'=>$rcstotal);

        $logs = array('client_id'=>$request->client_id,'description'=>json_encode($arrayNew),'category'=>'Added Match Result');
        $cleintLogs = MatchResultLogs::insert($logs);


        $response['status'] = 200;   
         $response['message'] = 'Added';
         $response['result'] = $arrayNew;
    }

    
        return response()->json($response);  
            // }
            // catch (\Exception $e) { 
            //     $response['status'] = 400;
            //     $response['message'] = $e; 
            // } 
    }

     public function checkmatch(Request $request)
    {

        $input = $request->all();

        
        $bos1Fields = DB::table('data_matching_fields')->where('system_name','BOS1')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();


        $bos1 = BOS1::where(function($bos1) use ($request){
                    if(isset($request['client_id']) && $request['client_id'] != '' && $request['system'] == 'BOS1' )
                    {
                        $bos1->where('client_id', $request['client_id']);
                    }
                    if(isset($request['crn']) && $request['crn'] != '')
                    {
                        $bos1->orWhere('crn', $request['crn']);
                    }
                    if(isset($request['driver_license']) && $request['driver_license'] != '')
                    {
                        $bos1->orWhere('driver_license', $request['driver_license']);
                    }
                    if(isset($request['passport']) && $request['driver_license'] != '')
                    {
                        $bos1->orWhere('passport', $request['passport']);
                    } 
                    if(isset($request['medicare_card']) && $request['medicare_card'] != '')
                    {
                        $bos1->orWhere('medicare_card', $request['medicare_card']);
                    }
                })->get();

        	
                $bos1Total = 100;


                $bos1Fields = DB::table('data_matching_fields')->where('system_name','BOS1')->where('status','Active')->pluck('normalised_weightage','field_name')->toArray();

                foreach ($input as $key => $value) {
                    $field = $key;
                 if(array_key_exists($key,$bos1Fields))
                 {    
                    if(isset($bos1[0]->$field) && $bos1[0]->$field != '')
                    {
                        if($input[$key] != $bos1[0]->$field )
                        {   
                            $bos1Total = $bos1Total - $bos1Fields[$key];
                        }
                    }

                }
            }

            echo "<pre>";
            print_r($bos1Total);
            echo "</pre>";
            exit(); 



    }

    

}
