<?php

namespace App\Providers;

use App\Events\OrderCreatedEvent;
use App\Listeners\SendAdminNotification;
use App\Listeners\SendNotificationToVendor;
use App\Listeners\SendOrderConfirmMail;
use App\Listeners\SendSMSNotificationToDelivery;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
