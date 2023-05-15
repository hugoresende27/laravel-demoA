<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\Mixins\StrMixins;
use App\Models\Channel;
use App\Services\PostCardSendingService;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //bind creates a new instance every time, discount is set to 0
//        $this->app->bind(PaymentGateway::class, function($app) {
//           return new PaymentGateway("EUR");
//        });

        //singleton to get same object after first time
//        $this->app->singleton(BankPaymentGateway::class, function($app) {
//            return new BankPaymentGateway("EUR");
//        });

        //after implementing the interface
        $this->app->singleton(PaymentGatewayContract::class, function($app) {

            //http://localhost:8000/pay-di?credit=true
            if (request()->has('credit')) {
                return new CreditPaymentGateway("EUR");
            } else {
                return new BankPaymentGateway("EUR");
            }

        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //Every single View // Option 1
//        View::share('channels', Channel::orderBy('name')->get());


        //composer views // Option 2
//        View::composer(['post.*', 'channel.*'], function ($view) {
//           $view->with('channels', Channel::orderBy('name')->get());
//        });


        //Dedicated Class // Option 3
        View::composer(['partials.channels.*'], ChannelsComposer::class);


        //facades lesson
        $this->app->singleton('Postcard', function ($app) {
            return new PostCardSendingService('pt',10,10);
        });

        //Macros lesson
//        Str::macro('partNumber', function ($part) {
//            return 'AB-' . substr($part, 0 ,4) . '-' . substr($part,3);
//        });

        Str::mixin(new StrMixins());

        ResponseFactory::macro( 'errorJson', function ($message = "Default Error Message") {
            return [
                'message' => $message,
                'error_code' => 666
            ];
        });


    }
}
