<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index () {


        $cartItems = \Cart::getContent();

        return view ('cart.index', compact ('cartItems'));
    }

    public function add (Request $request) {

        // dd ($product);

        $product = Product::find($request->input('product'));

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->description,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return back();
    }

    public function destroy ($item) {
        \Cart::remove($item);

        return back ();
    }

    public function checkout ($type)
    {
        $payment = $type == 1 ? 'bank' : 'paypal';

        if (auth()->user() == null && $payment == 'bank') {
            Session::flash('message', "Por favor inicia sesión para generar tu orden");
            return redirect('/login');
        } else {
            if ((auth()->user() && $payment == 'bank')) {
                return view ('cart.checkout', compact('payment'));
            } else {
                return view ('cart.checkout', compact('payment'));
            }
        }

    }

    public function applyCoupon () {

        $coupon = request('coupon_code');
        // dd ($coupon);
        if (!$coupon) {
            return back();
        }

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 12.5%',
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '-50%'
            // 'attributes' => array( // attributes field is optional
            //     'description' => 'Value added tax',
            //     'more_data' => 'more data here'
            )
        );

        \Cart::condition($condition);

        return back()->withMessage('Cupón aplicado exitosamente');
    }
}
