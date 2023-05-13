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

Route::get('/fac', function () {
    return "facades";
});


//withour facades
Route::get('/postcards', function () {

    $postCardService = new \App\Services\PostCardSendingService("Portugal", 4, 6);

    $postCardService->hello("Hello from coder's Tape's Portugal", "test@test.com");
});



//with facades, static function
Route::get('/facades', function () {

//    \App\FacadesLesson\Postcard::any();
    \App\FacadesLesson\Postcard::hello('hello from facades', 'hugo@higo');
});
