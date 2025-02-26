<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome');
});

// hotel routes
Route::post('storehotel', [HotelController::class, 'store'])->name('hotels.store');
Route::get('allhotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('edit-hotel/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::post('updatehotel/{id}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('deletehotel/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');

// room routes
Route::post('storeroom', [RoomController::class, 'store'])->name('rooms.store');
Route::get('allroom', [RoomController::class, 'index'])->name('index');
 Route::post('updateroom/{id}', [RoomController::class, 'update'])->name('update');
Route::delete('deleteroom/{id}', [RoomController::class, 'destroy'])->name('destroy');

