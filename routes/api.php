<?php

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
//Resources Routing
Route::resource('image', 'Unsplash\UnsplashImageController', ['except' => 'create', 'edit']);

//Get Routing
Route::get('image/rand', 'Unsplash\UnsplashImageController@getImages');
Route::get('images/getRandomImagesSet', 'Unsplash\UnsplashImageController@getRandomImagesSet');
Route::get('images/getFavouritImages', 'Unsplash\UnsplashImageController@getFavouritImages');
Route::get('images/getRandomImages', 'Unsplash\UnsplashImageController@getRandomImages');
Route::get('images/saveImages', 'Unsplash\UnsplashImageController@saveImages');  //inside this request post request is sent to save data in db


