<?php


use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/advertisements', [AdvertisementController::class, 'index' ])
    ->name('advertisement.index');
Route::get('/advertisements/create', [AdvertisementController::class, 'create'])
    ->name('advertisement.create');
Route::post('/advertisements', [AdvertisementController::class, 'store'])
    ->name('advertisement.store');
Route::get('/advertisements/{advertisement}', [AdvertisementController::class, 'show'])
    ->name('advertisement.show');
Route::get('/advertisements/{advertisement}/edit', [AdvertisementController::class, 'edit'])
    ->name('advertisement.edit');
Route::patch('/advertisements/{advertisement}', [AdvertisementController::class, 'update'])
    ->name('advertisement.update');
Route::delete('/advertisements/{advertisement}', [AdvertisementController::class, 'destroy'])
    ->name('advertisement.delete');
