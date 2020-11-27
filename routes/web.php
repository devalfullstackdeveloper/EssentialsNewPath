<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:cache');
    Artisan::call('config:clear');
    echo "cleared";
    // Artisan::call('optimize --force');
});

Route::get("home","App\Http\Controllers\API\IndexController@index");
// Route::get("/setHome","App\Http\Controllers\API\IndexController@setHome");
// Route::get("/home",function(){
	// echo "hello";
// });

Route::post("/importdata/csv","App\Http\Controllers\API\importData\ImportDataController@UploadCsv")->name('importCsv');
Route::post("/addupdate/csv","App\Http\Controllers\API\importData\ImportDataController@addorupdatecsv");
Route::post("/addupdate/json","App\Http\Controllers\API\importData\ImportDataController@addorupdatejson");
Route::post("/searchclient","App\Http\Controllers\API\searchData\SearchDataController@searchclient");


//testing for implementing queue jobs
Route::get('/queueemail', 'App\Http\Controllers\API\QueueController@UpdateQueueBOS1');
Route::get('/queuetest', 'App\Http\Controllers\API\QueueController@testqueue');

// Route::get("queueemail",function(){
	// echo "this is for queueemail";
// });

Route::get('/configurations',function(){
	echo phpinfo();
});