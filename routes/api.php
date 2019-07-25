<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->middleware('auth:api')->group(function(){
  Route::get('/movies', 'MovieController@index');   // all movies
  Route::get('/movies/{id}', 'MovieController@show');  // show
  Route::post('/movies', 'MovieController@store');   // create
  Route::post('/movies/{id}', 'MovieController@update');  // update
  // Route::put('/movies/{id}', 'MovieController@update'); Oppure così sempre per l'update specificando _method = 'PUT' e la chiamata tipo su Postman sempre in POST
  Route::post('/movies/{id}/delete', 'MovieController@destroy');  // destroy
  // Route::delete('/movies/{id}/delete', 'MovieController@destroy'); Oppure così sempre per la destroy specificando _method = 'DELETE' e la chiamata tipo su Postman sempre in POST
});
