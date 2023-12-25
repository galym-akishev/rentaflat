<?php


use App\Http\Controllers\HomeController;
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
});

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
});

Route::group(['namespace' => 'Amenity'], function () {
    Route::get('/amenities', 'IndexController')
        ->name('amenity.index');
    Route::get('/amenities/create', 'CreateController')
        ->name('amenity.create');
    Route::post('/amenities', 'StoreController')
        ->name('amenity.store');
    Route::get('/amenities/{amenity}', 'ShowController')
        ->name('amenity.show');
    Route::get('/amenities/{amenity}/edit', 'EditController')
        ->name('amenity.edit');
    Route::patch('/amenities/{amenity}', 'UpdateController')
        ->name('amenity.update');
    Route::delete('/amenities/{amenity}', 'DestroyController')
        ->name('amenity.delete');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
