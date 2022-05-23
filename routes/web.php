<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('configurations', App\Http\Controllers\ConfigurationController::class);
    Route::get('configurations/stop/{id}',  [App\Http\Controllers\ConfigurationController::class, 'stop'])->name('configurations.stop');
    Route::get('configurations/destroy/{id}',  [App\Http\Controllers\ConfigurationController::class, 'destroy'])->name('configurations.destroy');
    Route::get('configurations/start/{id}',  [App\Http\Controllers\ConfigurationController::class, 'start'])->name('configurations.start');
    Route::get('/download/{zip}', [App\Http\Controllers\DownloadController::class, 'download'])->name('download');
});


