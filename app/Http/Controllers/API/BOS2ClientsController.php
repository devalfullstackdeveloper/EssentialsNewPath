<?php

 namespace App\Http\Controllers\Api;

use App\Models\BOS2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use DB;

class BOS2ClientsController extends Controller
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
        $BOS2id = '';
        if(!isset($request->bos2_id))
        {
            $response['status'] = 400;
            $response['message'] = 'Bos 2 Id Is Required'; 
            return response()->json($response);
        }
        else
        {
            $BOS2id = $request->bos2_id;
        } 
        try {

             $count = BOS2::where('bos2_id',$BOS2id)->get()->count();
            if($count > 0)
            {
                $var1 = BOS2::where('bos2_id',$BOS2id)->update($request->all());
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
        $BOS2id = ''; 
        if(!isset($request->bos2_id))
        {
            $response['status'] = 400;
            $response['message'] = 'Bos 2 Id Is Required'; 
            return response()->json($response);
        }
        else
        { 
            try {

                 $count = BOS2::where('bos2_id', $request->bos2_id)->get()->count();

                 if($count > 0)
                 {
                   BOS2::where('bos2_id', $request->bos2_id)->delete(); 
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
}
