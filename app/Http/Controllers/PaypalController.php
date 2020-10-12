<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    public function  getExpressCheckout ($orderId) {

        // dd($orderId);

        $checkoutData = $this->checkoutData($orderId); // llama a la función de checkout data, así no lo repetimos en cada función
        // dd ($checkoutData);
        $provider = new ExpressCheckout();

        // $config = [];
        // dd ($provider->setApiCredentials($config));


        $response = $provider->setExpressCheckout($checkoutData);

        // dd($response);
        // this will loop unless you add false to 'validate_ssl'   => false, @ config/Paypal.php
        // also add the env requirements of paypal sandbox/live account

        return redirect($response['paypal_link']);
        //te lleva a la página de paypal, si el pago procede se ejecuta
        //getExpressCheckoutSuccess, si falla, se ejecuta cancelPage


    }

    private function checkoutData($orderId)
    {
        $cart = \Cart::getContent();
        $cart2 = \Cart::getTotal();
        // Estructura de paypal - Transformamos nuestra información a esta estructura (abajo)
        // $data['items'] = [
        //     [
        //         'name' => 'Product 1',
        //         'price' => 9.99,
        //         'desc'  => 'Description for product 1',
        //         'qty' => 1
        //     ],
        //     [
        //         'name' => 'Product 2',
        //         'price' => 4.99,
        //         'desc'  => 'Description for product 2',
        //         'qty' => 2
        //     ]
        // ];

        $cartItems = array_map( function($item){
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']
            ];
        }, $cart->toarray());

        //check if it's passing the items
        // dd($cartItems);

        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success', $orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => 'order description',
            'total' => $cart2
        ];

        return $checkoutData;
    }

    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $checkoutData = $this->checkoutData($orderId);

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])) {

            // Perform transaction on Paypal

            $payment_status = $provider->doExpressCheckoutPayment($checkoutData,$token,$payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            // if success after paying
            // dd('Payment Successfull');

            if (in_array($status, ['Completed','Processed'])) {
                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();

                // send mail -- creamos la clase con make:mail OrderMail --markdown=mail.order.paid
                Mail::to($order->buyer_email)->send(new OrderMail($order));

                \Cart::clear();


                // return redirect()->route('index')->withMessage('Order has been placed. Thanks!');
                return view ('newOrder.success', compact('order'));
            }

            dd  ('payment successfull' , $orderId);
        }

        return redirect()->route('home')->WithError('Payment unsuccessful! Something went wrong');
    }
}
