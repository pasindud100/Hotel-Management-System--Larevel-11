<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('storehotel',[HotelController::class,'store']);
Route::get('allhotels',[HotelController::class,'index']);
Route::post('updatehotel/{id}',[HotelController::class,'update']);
Route::post('deletehotel',[HotelController::class,'destroy']);