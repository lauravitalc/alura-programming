<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
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
    return redirect('/series');
});

// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/create', 'create')->name('series.create');
//     Route::post('/series/save', 'store')->name('series.store');
// });

Route::resource('/series', SeriesController::class)
->except(['show']);
// ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

// Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');

// Route::get('/series', [SeriesController::class, 'index']);
// Route::get('/series/create', [SeriesController::class, 'create']);
// Route::post('/series/save', [SeriesController::class, 'store']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');