<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['namespace' => 'Advertisement'], function () {
    Route::get('/advertisements', 'IndexController')
        ->name('advertisement.index');
    Route::get('/advertisements/create', 'CreateController')
        ->name('advertisement.create');
    Route::post('/advertisements', 'StoreController')
        ->name('advertisement.store');
    Route::get('/advertisements/{advertisement}', 'ShowController')
        ->name('advertisement.show');
    Route::get('/advertisements/{advertisement}/edit', 'EditController')
        ->name('advertisement.edit');
    Route::patch('/advertisements/{advertisement}', 'UpdateController')
        ->name('advertisement.update');
    Route::delete('/advertisements/{advertisement}', 'DestroyController')
        ->name('advertisement.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Advertisement'], function () {
        Route::get('/advertisement', 'IndexController')
            ->name('admin.advertisement.index');
    });
    Route::group(['namespace' => 'Amenity'], function () {
        Route::get('/amenities', 'IndexController')
            ->name('admin.amenity.index');
        Route::get('/amenities/create', 'CreateController')
            ->name('admin.amenity.create');
        Route::post('/amenities', 'StoreController')
            ->name('admin.amenity.store');
        Route::get('/amenities/{amenity}', 'ShowController')
            ->name('admin.amenity.show');
        Route::get('/amenities/{amenity}/edit', 'EditController')
            ->name('admin.amenity.edit');
        Route::patch('/amenities/{amenity}', 'UpdateController')
            ->name('admin.amenity.update');
        Route::delete('/amenities/{amenity}', 'DestroyController')
            ->name('admin.amenity.delete');
    });
    Route::group(['namespace' => 'User'], function () {
        Route::get('/user', 'IndexController')
            ->name('admin.user.index');
        Route::get('/user/{user}', 'ShowController')
            ->name('admin.user.show');
        Route::get('/user/{user}/edit', 'EditController')
            ->name('admin.user.edit');
        Route::patch('/user/{user}', 'UpdateController')
            ->name('admin.user.update');
    });
});

Auth::routes();

Route::group(['namespace' => 'Home'], function () {
    Route::get('/home', 'IndexController')
        ->name('home.index');
});
