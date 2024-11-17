<?php

use App\Http\Controllers\Guest\GuestController;
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

Route::group(['prefix' => 'guests', 'name' => 'guests.'], function () {
    Route::post('/', [GuestController::class, 'store'])->name('store');
    Route::get('/', [GuestController::class, 'index'])->name('index');
    Route::get('/{guest_id}', [GuestController::class, 'show'])->name('show');
    Route::put('/{guest_id}', [GuestController::class, 'update'])->name('update');
    Route::delete('/{guest_id}', [GuestController::class, 'destroy'])->name('destroy');
});
