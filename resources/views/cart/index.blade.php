
@extends('style')

<style>
    body {
        background-color: rgb(230, 189, 224) !important;
    }

</style>

@section('content')

    <section class="container section slider-section" style="margin-top: 150px;">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <h4 class="heading" data-aos="fade-up"><em><b>Tu carrito</b></em></h4>
            </div>
        </div>
    </section>
    @if ( \Cart::getTotal() != 0.0)
        <section class="container section slider-section" style="max-width: 85%;">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <table class="table" data-aos="fade-up" data-aos-delay="100">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Artículo</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($cartItems as $item)
                            <tbody>
                                <tr>
                                    <td scope="row">{{ $item->name }}</td>
                                    <td>$ {{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <a href="{{ route('cart.destroy', $item->id) }}" class="btn btn-danger"
                                            style="padding: 5px 10px; margin-top: 3px;"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                </div>
                <div class="container mt-2" style="text-align: right;">
                    <p class="txt" data-aos="fade-up" data-aos-delay="100"><b> Total: $ <u>{{ Cart::getTotal() }} mxn
                    <!-- </u>&nbsp;&nbsp;&nbsp;&nbsp;</b><span class="fa fa-money"></span></p><br> -->
                </div>
            </div>
        </section>
        <section class="container section slider-section">
            <div class="container">
                <div class="row justify-content-center text-center">

                    {{-- <div class="col-md-4 p-4 text-right">
                        <p>*Depósito bancario o PayPal</p>
                    </div> --}}
                    <div class="col-md-3">
                        <p><a href="{{ route('cart.checkout', 0) }}" class="btn btn-primary" data-aos="fade-up"
                                data-aos-delay="100" style="background-color: yellow; color: blue;">Pago con Paypal <span class="fa fa-paypal"></span></a></p><br>
                    </div>
                    <div class="col-md-3">
                        <p><a href="{{ route('cart.checkout', 1) }}" class="btn btn-primary" data-aos="fade-up"
                                data-aos-delay="100">Depósito bancario <span class="fa fa-bank"></span></a></p><br>
                    </div>

                    <div class="col-md-6">
                        <form action="{{ route('cart.apply')}}" method="get">
                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Cupón" type="text" data-aos="fade-up" style="max-width: 100px;">
                                <span>
                                    <input class="btn btn-secondary btn-sm" name="apply_coupon" value="Aplicar" type="submit" data-aos="fade-up" style="padding: 7px 20px;">
                                </span>
                            </form>
                        </a></p><br>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container mb-5 text-center">
            <h1><em>Tu carrito de compras está vacío</em> </h1>
        </div>
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <a href="/"><h1 class="btn btn-outline-secondary" data-aos="fade-up"><em>Página principal</em></h1></a>
            </div>
        </div>
    @endif


    {{-- {{dd(\Cart::getTotal())}} --}}


@endsection


