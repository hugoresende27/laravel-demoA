<?php

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

//Route::get('sample', [\App\Http\Controllers\IoC_DIController::class, 'index']);
Route::get('sample', [\App\Http\Controllers\SampleController::class, 'index']);


Route::get('form', [\App\Http\Controllers\FormController::class, 'index'])->name('form');
Route::post('form', [\App\Http\Controllers\FormController::class, 'store']);

Route::get('contact-form-captcha', [CaptchaValidationController::class, 'index']);
Route::post('captcha-validation', [CaptchaValidationController::class, 'capthcaFormValidate']);
Route::get('reload-captcha', [CaptchaValidationController::class, 'reloadCaptcha']);


Route::get('pay', [\App\Http\Controllers\PayOrderController::class, 'storeOld']);
Route::get('pay-di', [\App\Http\Controllers\PayOrderController::class, 'storeExampleID']);


Route::get('channels', [\App\Http\Controllers\ChannelController::class, 'index']);
Route::get('post/create', [\App\Http\Controllers\PostController::class, 'create']);

Route::get('poly', [\App\Http\Controllers\SampleController::class, 'poly']);


Route::get('macro', [\App\Http\Controllers\SampleController::class, 'macro']);
