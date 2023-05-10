<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/json-test', function () {
    return response()->json([
        'name' => 'Jone',
        'updated' => true,
    ]);
});

Route::get('/dev', function () {
   echo "aqui";
   print "aqui";
});

Route::get('sample', [\App\Http\Controllers\IoC_DIController::class, 'index']);

