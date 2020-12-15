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
// Route::get("/bos1","App\Http\Controllers\API\IndexController@Bos1");
// Route::get("/bos1","App\Http\Controllers\Bos1Controller@index");

/* BOS1 Resourse*/
Route::resource('bos1', \App\Http\Controllers\Bos1Controller::class);
/* Get Bos1 Data Ajax*/
Route::post('bos1Data','\App\Http\Controllers\Bos1Controller@bos1Data')->name('bos1Data');
/* BOS2 Resourse*/
Route::resource('bos2', \App\Http\Controllers\Bos2Controller::class);
/* Get Bos2 Data Ajax*/
Route::post('bos2Data','\App\Http\Controllers\Bos2Controller@bos2Data')->name('bos2Data');
/* MIM Resourse*/
Route::resource('mim', \App\Http\Controllers\MimController::class);
/* Get MIM Data Ajax*/
Route::post('mimData','\App\Http\Controllers\MimController@mimData')->name('mimData');
/* RCS Resourse*/
Route::resource('rcs', \App\Http\Controllers\RcsController::class);
/* Get RCS Data Ajax*/
Route::post('rcsData','\App\Http\Controllers\RcsController@rcsData')->name('rcsData');

/* Match Result Resourse*/
Route::resource('matchresult', \App\Http\Controllers\MatchResultController::class);
/* Get Match Result Data Ajax*/
Route::post('matchresultData','\App\Http\Controllers\MatchResultController@matchresultData')->name('matchresultData');



// Route::get("/bos2","App\Http\Controllers\API\IndexController@Bos2");
// Route::get("/mim","App\Http\Controllers\API\IndexController@MIM");
// Route::get("/rcs","App\Http\Controllers\API\IndexController@RCS");
Route::get("/table","App\Http\Controllers\API\IndexController@Table");
Route::get("/table1","App\Http\Controllers\API\IndexController@Table1");
Route::get("/cidm","App\Http\Controllers\API\IndexController@cidm");
Route::get("/truncatebos1","App\Http\Controllers\API\IndexController@truncatebos1");
Route::get("/truncatebos2","App\Http\Controllers\API\IndexController@truncatebos2");
Route::get("/truncatemim","App\Http\Controllers\API\IndexController@truncatemim");
Route::get("/truncatercs","App\Http\Controllers\API\IndexController@truncatercs");
Route::get("/truncatematchresults","App\Http\Controllers\API\IndexController@truncatematchresults");


Route::post("/importdata/csv","App\Http\Controllers\API\importData\ImportDataController@UploadCsv")->name('importCsv');
Route::post("/addupdate/csv","App\Http\Controllers\API\importData\ImportDataController@addorupdatecsv");
Route::post("/addupdate/json","App\Http\Controllers\API\importData\ImportDataController@addorupdatejson");
Route::post("/searchclient","App\Http\Controllers\API\searchData\SearchDataController@searchclient");




//testing for implementing queue jobs
Route::get('/queueemail', 'App\Http\Controllers\API\QueueController@UpdateQueueBOS1');
Route::get('/queuetest', 'App\Http\Controllers\API\QueueController@testqueue');
Route::get('/configurations',function(){
	echo phpinfo();
});