<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(\Cart::getContent());
        $orders = Order::orderBy('updated_at','desc')->paginate(20);;

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // almacenamos información del usuario

        $request -> validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required',
            'payment_method' => 'required',
            'buyer_email' => 'required'
        ]);

        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_zipcode = $request->input('shipping_zipcode');
        $order->buyer_email = $request->input ('buyer_email');

        if (!$request->has('billing_fullname')){
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_zipcode = $request->input('shipping_zipcode');
            $order->buyer_email = $request->input ('buyer_email');
        } else {
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
            $order->buyer_email = $request->input ('billing_email');
        }


        $order->grand_total = \Cart::getTotal();
        $order->item_count = \Cart::getContent()->count();

        // si no lo especificaste en la migración
        // $order->status = 'pending';

        // $order->user_id = auth()->id();

        if(request('payment_method') == 'paypal')
         {
            $order->payment_method = 'paypal';
         }


        $order->save();

        // dd('order created', $order);

        // create order items migration before next steps and then create relationships
        // save order items

        $cartItems = \Cart::getContent();

        /* Populate order_items table video #4 min 25 */
        foreach ($cartItems as $item) {
            $order->items()->attach($item->id, ['price'=>$item->price, 'quantity'=>$item->quantity]);
        }

        // payment method
        // redirect to paypal
        // package github: srmklive/laravel-paypal - follow instructions

        if(request('payment_method') == 'paypal')
         {
            // video 6 - passing orderId to next steps (starts Here)
            return redirect()->route('paypal.checkout', $order->id);
         }

        //empty cart

        //send email to customer - creamos la clase con make:mail OrderMail --markdown=mail.order.paid
        Mail::to($order->buyer_email)->send(new OrderMail($order));

        \Cart::clear();

        // thank user

        // return redirect()->route('index')->withMessage('Thanks for your purchase!');
        return view ('newOrder.success', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
