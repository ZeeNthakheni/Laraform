<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\submissions_controller;
 
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


Route::get('/', [submissions_controller::class, 'index']);


Route::post('/submit', [submissions_controller::class, 'submit']);


