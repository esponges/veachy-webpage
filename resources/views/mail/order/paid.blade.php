@component('mail::message')
# Gracias por comprar con nosotras!

{{-- {{ dd ($order->items)}} --}}

@if ( $order->is_paid == 1)
Tipo de pago: <b>Paypal</b>

Tu envío será realizado a la brevedad. <br>
@else
Tipo de pago: <b>Depósito Bancario</b>

Una vez confirmado tu pago será realizado tu envío. <br><br>
@endif

N° de orden: {{ $order->id }} <br>

Nombre del comprador: {{$order->shipping_fullname}} <br>

<b>Dirección de envío:</b> <br>
Calle: {{$order->shipping_address}} <br>
Ciudad: {{$order->shipping_city}} <br>
Estado: {{$order->shipping_state}} <br>
Código postal: {{$order->shipping_zipcode}} <br>
Teléfono: {{$order->shipping_phone}} <br> <br> <br>



<table class="table" style="margin-left:auto;margin-right:auto;">
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
</table> <br> <br>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Equipo de VeachySwimwear<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
