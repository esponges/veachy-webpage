<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /* flash cart items */
        \Illuminate\Auth\Events\Attempting::class => [
            \App\Listeners\PrepareCartTransfer::class
        ],
        /* add flashed cart items to authenticated user cart */
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\TransferGuestCartToUser::class
        ]
        /* end cart item */
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
