<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransferGuestCartToUser
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // dd (session('guest_cart.data'), \Cart::getContent());
        // dd( session(($event->user->id != null) ? $event->user->id : 0 ));
        $userCart = \Cart::getContent();
        $userCartItems = $userCart->toArray();

        // if (!empty($guestCart)) {
        //     $guestCartItems = $guestCart->toArray();
        // }

        if (session('guest_cart.data') != null ) {
            $guestCart = session('guest_cart.data');
            $guestCartItems = $guestCart->toArray();
        }
        // dd(empty($guestCartItems));

        // my app does not require quantities so I can just add new items as cart lines regardless of
        // duplicates. If your app needs to merge in duplicate product quantities, you can just make
        // the ID of the existing items you are adding the same as the matching items in the user's cart.
        // This library will automatically add in the relative quantity.
        // Or just wipe the user's cart and replace it entirely.
        if ($userCart->isNotEmpty() && !empty($guestCartItems)) {
            $maxUserCartId = max(array_column($userCartItems, 'id'));

            // user cart has items, make sure the guest cart item ID's don't clash
            $guestCartItems = array_map(function ($item) use (&$maxUserCartId) {
                return array_merge($item, ['id' => ++$maxUserCartId]);
            }, $guestCartItems);
        }

        // dd($guestCartItems);
        // if ($guestCart->isNotEmpty()) $userCart->add($guestCartItems);

        // $dbCart = \App\Cart::find(session('guest_cart.session') . '_cart_items'); // <- using DB storage for cart

        // if ($dbCart) $dbCart->delete(); // or clear from session
    }
}
