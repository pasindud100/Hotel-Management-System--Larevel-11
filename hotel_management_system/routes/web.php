<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('storehotel', [HotelController::class, 'store'])->name('hotels.store');
Route::get('allhotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('edit-hotel/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::post('updatehotel/{id}', [HotelController::class, 'update'])->name('hotels.update');
