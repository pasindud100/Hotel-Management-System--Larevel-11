<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('storehotel',[HotelController::class,'store'])->name('hotels.store');
Route::get('allhotels',[HotelController::class,'index']);
Route::post('updatehotel/{id}',[HotelController::class,'update'])->name('hotels.update');
Route::post('deletehotel',[HotelController::class,'destroy'])->name('hotels.destroy');