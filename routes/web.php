<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vericontroller;
use App\Http\Controllers\Modelcontroller;



Route::get('/', function () {
    return view('welcome');
});




Route::get('/get-data/{api}/{item?}', [Modelcontroller::class, "get_data"]);
Route::get('/get-data', [Modelcontroller::class, "data_list"]);
Route::get('/create-data', [Modelcontroller::class, "create_data"]);
Route::get('/update', [Modelcontroller::class, "update"]);