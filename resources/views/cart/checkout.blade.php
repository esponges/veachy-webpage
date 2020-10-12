@extends('style')

<style>
    body {
        background-color:rgb(230, 189, 224) !important;
    }
</style>

@php
    $pago = $payment == 'bank' ? 'con depósito bancario' : 'pagando con PayPal';
    $fa = $payment == 'bank' ? 'fa fa-bank' : 'fa fa-paypal';
@endphp


@section('content')

<section class="section slider-section" style="margin-top: 150px;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <div class="container">
                    <h1><em>Check out <br><b>{{ $pago}}</b></em> <span class="{{$fa}}"></span> </h1>
                    <h3><br> Información de envío again</h3>
                </div>
                <form action="{{ route ('orders.store')}}" method="post" style="margin-top: 50px;" class="checkoutData">
                    @csrf

                    <div class="form-group">
                      <label for="shipping_fullname">Nombre Completo</label>
                      <input type="text" class="form-control" name="shipping_fullname" id="shipping_fullname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_phone">Teléfono celular</label>
                        <input type="number" class="form-control" name="shipping_phone" id="shipping_phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="buyer_email">Correo electrónico</label>
                        <input type="text" class="form-control" name="buyer_email" id="buyer_email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_state">Estado</label>
                        <input type="text" class="form-control" name="shipping_state" id="shipping_state" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="shipping_city">Ciudad/Municipio</label>
                          <input type="text" class="form-control" name="shipping_city" id="shipping_city" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="shipping_zipcode">Código postal</label>
                          <input type="number" class="form-control" name="shipping_zipcode" id="shipping_zipcode" class="form-control">
                      </div>

                    <div class="form-group">
                        <label for="shipping_address">Dirección Completa</label>
                        <input type="text" class="form-control" name="shipping_address" id="shipping_address" class="form-control">
                    </div>

                    {{-- <h4>Opción de pago</h4> --}}

                    <input type="hidden" name="payment_method" value="<?php echo ($payment == 'paypal'? 'paypal' : 'cash_on_deliverry');?>" >
                    {{-- {{dd (($payment == 'paypal'? 'paypal' : 'cash_on_deliverry'))}} --}}

                    {{-- <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="payment_method" id="" value="cash_on_delivery" checked> Depósito
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="payment_method" id="" value="paypal"> Paypal
                        </label>
                    </div> --}}
                <br>
                    <button type="submit" class="btn btn-primary mt-3">Crear Orden/Pago</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
