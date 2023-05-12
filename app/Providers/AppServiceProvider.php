<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelsComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    }
}
