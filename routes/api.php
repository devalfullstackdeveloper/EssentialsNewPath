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
	
	Route::get('/truncate_table', ['uses'=>'\\'.$namespace.'\\SystemClientsController@truncate_table', 'as'=>strtolower( $namespace.'\\SystemClientsController.truncate_table' )]); 
	
	Route::post('/initalmatch', ['uses'=>'\\'.$namespace.'\\SystemClientsController@MatchingAlgorithmAfterInitialUpload', 'as'=>strtolower( $namespace.'\\SystemClientsController.MatchingAlgorithmAfterInitialUpload' )]); 
 
	Route::get('type/search/{search?}', ['uses'=>'\\'.$namespace.'\\TypeController@search', 'as'=>strtolower( $namespace.'\\TypeController.typesearch' )]);  

}); 





