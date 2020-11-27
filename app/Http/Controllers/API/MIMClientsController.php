<?php

 namespace App\Http\Controllers\Api;

use App\Models\MIM;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use DB;

class MIMClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "<pre>";
        print_r("index"); 
        echo "</pre>";
        exit();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       

        try {
           $var1 = MIM::create($request->all()); 
           $response['status'] = 200;
           $response['message'] = 'Success';
        }
            catch (\Exception $e) { 
                $response['status'] = 400;
                $response['message'] = $e; 
        } 
        return response()->json($response);
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
        $mimid = '';
        if(!isset($request->MIM_id)) 
        {
            $response['status'] = 400;
            $response['message'] = 'MIM Id Is Required'; 
            return response()->json($response);
        }
        else
        {
            $mimid = $request->MIM_id;
        } 
        try {

             $count = MIM::where('MIM_id',$mimid)->get()->count();
             if($count > 0)
             {
                $var1 = MIM::where('MIM_id',$mimid)->update($request->all());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mimid = ''; 
        if(!isset($request->MIM_id))
        {
            $response['status'] = 400;
            $response['message'] = 'MIM Id Is Required'; 
            return response()->json($response);
        }
        else
        {
            try {

                $count = MIM::where('MIM_id', $request->MIM_id)->get()->count();

                if($count > 0)
                {
                    MIM::where('MIM_id', $request->MIM_id)->delete(); 
                    $response['status'] = 200; 
                    $response['message'] = 'Success'; 
                }
                else
                {
                    MIM::where('MIM_id', $request->MIM_id)->delete(); 
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
}
