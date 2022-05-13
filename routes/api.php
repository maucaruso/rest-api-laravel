<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (Request $request) {

    // dd($request->headers->all());
    // dd($request->headers->get('Autorization'));

    $response = new Response(json_encode(['msg' => 'Minha primeira resposta de API']));
    $response->header('Content-Type', 'application/json');
    return $response;
});

// Products Route
Route::namespace('App\\Http\\Controllers\\Api\\')->prefix('products')->group(function () {
    Route::get('/', 'ProductController@index');
    Route::get('/{id}', 'ProductController@show');
    Route::post('/', 'ProductController@save');
    Route::put('/', 'ProductController@update');
    Route::patch('/', 'ProductController@update');
    Route::delete('/{id}', 'ProductController@delete');
});
