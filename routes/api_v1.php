<?php

use App\Http\Controllers\Api\V1\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return json_encode([
        'text' => 'Welcome to Rentaflat API (version 1)',
    ]);
});

Route::group(['namespace' => 'Api\V1\Advertisement'], function () {
    Route::get('/advertisements', 'IndexController')
        ->name('advertisement.index');
});
