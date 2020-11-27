<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// $namespace = 'App\Http\Controllers\Api';
$namespace = 'App\Http\Controllers\API';

Route::group(['prefix' => 'v1'], function () use ($namespace) {

	Route::post('/cmsclient', ['uses'=>'\\'.$namespace.'\\SystemClientsController@clientMapping', 'as'=>strtolower( $namespace.'\\SystemClientsController.client' )]);

Route::post('/matchData', ['uses'=>'\\'.$namespace.'\\SystemClientsController@matchData', 'as'=>strtolower( $namespace.'\\SystemClientsController.clientMatch' )]);

Route::post('/checkmatch', ['uses'=>'\\'.$namespace.'\\SystemClientsController@checkmatch', 'as'=>strtolower( $namespace.'\\SystemClientsController.checkmatch' )]);

	 

	// Route::post('/matchData', ['uses'=>'\\'.$namespace.'\\SystemClientsController@matchData', 'as'=>strtolower( $namespace.'\\SystemClientsController.matchData' )]); 
	 
	 Route::get('/cmsclient1', ['uses'=>'\\'.$namespace.'\\SystemClientsController@index', 'as'=>$namespace.'\\SystemClientsController.cmsclient1']);    
	  
	// Route::post('bos1/add', ['uses'=>'\\'.$namespace.'\\BOS1ClientsController@store', 'as'=>strtolower( $namespace.'\\BOS1ClientsController.store' )]);

	// Route::post('bos1/update', ['uses'=>'\\'.$namespace.'\\BOS1ClientsController@update', 'as'=>strtolower( $namespace.'\\BOS1ClientsController.update' )]); 

	// Route::post('bos1/destroy', ['uses'=>'\\'.$namespace.'\\BOS1ClientsController@destroy', 'as'=>strtolower( $namespace.'\\BOS1ClientsController.destroy' )]); 

	// Route::post('bos2/add', ['uses'=>'\\'.$namespace.'\\BOS2ClientsController@store', 'as'=>strtolower( $namespace.'\\BOS2ClientsController.store' )]); 

	// Route::post('bos2/update', ['uses'=>'\\'.$namespace.'\\BOS2ClientsController@update', 'as'=>strtolower( $namespace.'\\BOS2ClientsController.update' )]); 

	// Route::post('bos2/destroy', ['uses'=>'\\'.$namespace.'\\BOS2ClientsController@destroy', 'as'=>strtolower( $namespace.'\\BOS2ClientsController.destroy' )]);  


	// Route::post('mim/add', ['uses'=>'\\'.$namespace.'\\MIMClientsController@store', 'as'=>strtolower( $namespace.'\\MIMClientsController.store' )]);  

	// Route::post('mim/update', ['uses'=>'\\'.$namespace.'\\MIMClientsController@update', 'as'=>strtolower( $namespace.'\\MIMClientsController.update' )]); 

	// Route::post('mim/destroy', ['uses'=>'\\'.$namespace.'\\MIMClientsController@destroy', 'as'=>strtolower( $namespace.'\\MIMClientsController.destroy' )]); 

	// Route::get('mimindex', ['uses'=>'\\'.$namespace.'\\MIMClientsController@index', 'as'=>strtolower( $namespace.'\\MIMClientsController.index' )]); 

	 

}); 

Route::prefix('v1')->group(function(){
    Route::get('mimindex', 'App\Http\Controllers\Api\MIMClientsController@index');
    Route::post("updatejson","App\Http\Controllers\API\UpdateJsonController@UpdateViaJSON"); /* update in queue via json */
    Route::post("matchjson","App\Http\Controllers\API\UpdateJsonController@MatchViaJSON"); /* matching via json */
});


 
