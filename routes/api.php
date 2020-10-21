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

Route::apiResource('category','API\CategoryController')->names('api.categroy');

Route::apiResource('product','API\ProductController')->names('api.product');

Route::delete('/eliminarImagen/{id}','API\ProductController@eliminarImagen')->name('api.eliminarImagen');

Route::get('/autocomplete', 'API\AutocompleteController@autocomplete')->name('api.autocomplete');