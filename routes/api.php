<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegisterController;
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

Route::post('register', 'Api\RegisterController@register');

Route::post('login', 'Api\LoginController@login');
Route::post('refresh-token', 'Api\LoginController@refreshToken');

Route::delete('delete-token', 'Api\LogoutController@deleteToken');

Route::get('product', 'Api\ProductController@index');