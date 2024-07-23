<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\JournalController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('shipments', ShipmentController::class);
Route::post('shipments/{shipment}/status', [ShipmentController::class, 'changeStatus'])->name('shipments.changeStatus');
Route::resource('journals', JournalController::class)->only(['index']);

