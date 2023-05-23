<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaValidationController;


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

Route::get('/softs', [\App\Http\Controllers\SoftsController::class, 'index']);
Route::get('/softs/{id}', [\App\Http\Controllers\SoftsController::class, 'findWithTrashed']);
Route::get('/softs-restore/{id}', [\App\Http\Controllers\SoftsController::class, 'restore']);
Route::get('/softs-del/{id}', [\App\Http\Controllers\SoftsController::class, 'delete']);
