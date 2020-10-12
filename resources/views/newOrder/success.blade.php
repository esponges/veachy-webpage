@extends('style')

<style>

body {
    background-color:rgb(230, 189, 224) !important;
}
</style>

@section('content')

<section class="section slider-section" style="margin-top: 150px;">
    <div class="container">
        <div class="row justify-content-center text-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="heading" data-aos="fade-up"><em>Gracias por comprar con nosotras</em></h5>
                    </div>
                    <div class="card-body">
                        @if ( $order->is_paid == 1 )
                            <p class="txt" data-aos="fade-up" data-aos-delay="100"><b>Tu envío será realizado a la brevedad</b></p>
                        @else
                            <p class="txt" data-aos="fade-up" data-aos-delay="100"><b>Tu envío será realizado una vez confirmado tu depósito</b></p>
                        @endif
                            <p class="txt" data-aos="fade-up" data-aos-delay="100"><b>N° de orden <u>{{$order->id}}</u></b></p>
                            <p class="txt" data-aos="fade-up" data-aos-delay="100">Nombre: {{$order->shipping_fullname}}</p>
                            <p class="txt" data-aos="fade-up" data-aos-delay="100">
                                <table class="table mt-4" style="margin-left:auto;margin-right:auto;">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td scope="row">{{$item->description}}</td>
                                                <td>$ {{ $item->price}} MXN</td>
                                                <td style="text-align:center">{{ $item->pivot->quantity}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </p>
                            <p class="txt mt-4" data-aos="fade-up" data-aos-delay="100">
                                    <b>Dirección de envío</b>:<br>
                                    Calle: {{$order->shipping_address}} <br>
                                    Ciudad: {{$order->shipping_city}} <br>
                                    Estado: {{$order->shipping_state}} <br>
                                    Código postal: {{$order->shipping_zipcode}} <br>
                                    Teléfono: {{$order->shipping_phone}} <br><br>

                        <a href="/" class="btn btn-primary">Regresa al inicio</a>
                    </div>
                  </div>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
