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
Route::get('pipes', [\App\Http\Controllers\PostController::class, 'index']);

//repositories
Route::get('customers', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::get('customers/{customerID}', [\App\Http\Controllers\CustomerController::class, 'show']);
Route::get('customers/{customerID}/update', [\App\Http\Controllers\CustomerController::class, 'update']);
Route::get('customers/{customerID}/delete', [\App\Http\Controllers\CustomerController::class, 'destroy']);


//lazy collection
Route::get('lazy', function() {
//   $collection = \Illuminate\Support\Collection::times(1000000)
//       ->map(function ($number) {
//           return pow(2, $number);
//       })
//        ->all();

//    $collection = \Illuminate\Support\LazyCollection::times(10000000)
//        ->map(function ($number) {
//            return pow(2, $number);
//        })
//        ->all();
//    var_dump( $collection);

//    return User::all();
    return User::cursor();  //cursor() is the same as all(), but lazy collection

});

Route::get('generator', function () {
   function happyFunction(string $string) {
       yield $string;
   }

   //special methods on the use of yield
//   return get_class( happyFunction('super happy') );    //return "Generator"
//   return get_class_methods( happyFunction('super happy') );    //return [
                                                                                //    "rewind",
                                                                                //"valid",
                                                                                //"current",
                                                                                //"key",
                                                                                //"next",
                                                                                //"send",
                                                                                //"throw",
                                                                                //"getReturn"
                                                                                //]

    return  happyFunction('super happy')->current();
});

Route::get('generator2', function () {
    function happyFunction() {
        yield 'one';
        yield 'two';
        yield 'three';
    }

//    return happyFunction()->current();
    $return = happyFunction();
    dump ($return->current());//one
    $return->next();
    dump($return->current());//two

    echo ('//can use a foreach loop instead of next()<hr>');
    foreach (happyFunction() as $result) {
        if (strtoupper($result) == strtoupper( "TWO")) {
            continue ;
        }
        dump ($result);
    }

    echo ('happyFunction2 () <hr>');
    function happyFunction2($strings) {
        foreach ($strings as $str) {
            dump ('start');
            yield $str;
            dump ('end');
        }
    }



    foreach (happyFunction2(['AAA', 'BBB', 'CCC']) as $result) {
        if ($result == "BBB") {
            echo "BBB here";
        }
        dump ($result);
    }

    echo ('notHappy()<hr>');
    function notHappy($number) {
        $return = [];

        for ($i = 1; $i <= $number; $i++) {
            $return[] = $i;
        }
        return $return;
    }

    //to fix max allowed memory, with lazy collection
    //use the yield
    function notHappy2($number) {
        for ($i = 1; $i <= $number; $i++) {
            yield $i;
        }
    }

    foreach (notHappy2(100000000) as $item) {
        if ($item % 1000 == 0) {
            dump ('hello');
        }
    }


});




