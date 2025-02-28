<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

// Route::get('/', function () {
//     return view('welcome');
// });
//Home
Route::get('/', [HomeController::class, 'index']);

// hotel routes
Route::post('storehotel', [HotelController::class, 'store'])->name('hotels.store');
Route::get('allhotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('edit-hotel/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::post('updatehotel/{id}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('deletehotel/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');

// room routes
Route::post('storeroom', [RoomController::class, 'store'])->name('rooms.store');
Route::get('allrooms', [RoomController::class, 'index'])->name('rooms.index'); // list all rooms
Route::get('editroom/{id}', [RoomController::class, 'edit'])->name('rooms.edit'); // this route for edit a specific room
Route::post('updateroom/{id}', [RoomController::class, 'update'])->name('rooms.update'); // for update a specific room
Route::delete('deleteroom/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy'); 
