@extends('style')

<style>
body {
    background-color:rgb(230, 189, 224) !important;
}
</style>

@section('content')
    <table class="table" style="margin-top: 150px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Total Pedido</th>
                <th>Productos</th>
                <th>Pago</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>CP</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($orders as $item)
                @php
                    $date = date('Y-m-d H:i:s',strtotime($item->created_at . " -" . 5 . " hours"));
                @endphp
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td scope="row">{{$date}}</td>
                        <td>{{ $item->grand_total}}</td>
                        <td>{{ $item->item_count}}</td>
                        <td>{{ $item->payment_method}}</td>
                        <td>{{ $item->shipping_fullname}}</td>
                        <td>{{ $item->buyer_email}}</td>
                        <td>{{ $item->shipping_address}}</td>
                        <td>{{ $item->shipping_city}}</td>
                        <td>{{ $item->shipping_state}}</td>
                        <td>{{ $item->shipping_zipcode}}</td>
                        <td>{{ $item->shipping_phone}}</td>
                    </tr>
                @endforeach
            <!-- pagination -->
        </tbody>
    </table>
    <div class="container"> {{$orders->links()}}</div>

@endsection



