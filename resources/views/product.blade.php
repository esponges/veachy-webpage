@extends('style')

<style>
body {
    background-color:rgb(172, 159, 170) !important;
}
</style>

<body>
    @section('content')

        <div class="container" style="margin-top:130px;">
            <div class="row justify-content-center text-center" style="padding: 5%;">
                @foreach ($children as $item)
                    @if ($item->total_fotos == 1)
                        {{-- <div class="col-sm-12 col-lg-12"> --}}
                            <div class="container card mx-auto" data-aos="fade-up" style= "margin:30px;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 4em;"><b><em>{{ $item->name }} - {{ $item->color}}</em></b></h5>
                                    @php
                                        $photo = $item->name . ' ' . $item->color .  $item->total_fotos . '.jpg'
                                    @endphp
                                    <img src="/img/product/<?php echo $photo; ?>" alt="/img/product/<?php echo $photo; ?>" class="img-fluid">
                                    {{-- <p>/img/product/<?php echo $photo; ?></p> --}}
                                    <div class="container mb-1" style="margin: 5% 0% 5% 0%;">
                                        <h1 class="card-text">${{ $item->price}} <br>
                                            {{-- Disponibilidad: @if ($item->disponibilidad == 1) En stock @else Agotado @endif --}}
                                        </h1>
                                    </div>
                                    <div class="container card-product">
                                        <form action="{{ route ('cart.add') }}" method="get">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Stock disponible</label>
                                                <select class="form-control" name="product" id="">
                                                    @foreach ($children as $child)
                                                        @if ($child->color === $item->color)
                                                            <option value="{{ $child->id}}">{{$child->description}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                            <button type="submit" class="btn-ml btn-primary cartAlert">
                                                Comprar <span class="fa fa-cart-plus"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    @endif
                @endforeach
            </div>
        </div>
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <a href="/"><h1 class="btn btn-outline-secondary" data-aos="fade-up"><em>Página principal</em></h1></a>
                </div>
            </div>
    @endsection
</body>

