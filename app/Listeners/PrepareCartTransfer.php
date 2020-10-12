<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrepareCartTransfer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        if (Auth::guest()) {
            session()->flash('guest_cart', [
                'session' => session()->getId(),
                'data' => \Cart::getContent() // i have a global cart() function in my app which sets the correct session
            ]);
        }
    }
}
