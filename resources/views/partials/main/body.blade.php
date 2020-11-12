<!-- @php
    $b = 0;
    $c = 0;
    $e = 0;
@endphp
 -->


    <section class="container section slider-section"  id="bikini">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <h1 class="heading-a" data-aos="fade-up"><em><b>Bikinis</b></em></h1>
            </div>
        </div>
    </section>

    @foreach ($bikinis as $product)
        <section class="section slider-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-2">
                    <div class="col-md-8" style="max-width: 50%">
                        <h4 class="heading" data-aos="fade-up"><em>{{ $product->name }}</em></h4>
                        <p class="txt" data-aos="fade-up" data-aos-delay="100"><b>{{ $product->price}} mxn</b></p>
                        <p data-aos="fade-up" data-aos-delay="100" id="product_text">{{ $product->description}}</p>
                        {{-- <p class="txt" data-aos="fade-up" data-aos-delay="100">Disponibilidad: {{ $product->disponibilidad }}</p> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-slider major-caousel owl-carousel mb-2" data-aos="fade-up" data-aos-delay="200" >
                            @php
                                $x = $product->total_fotos;
                            @endphp
                            @for ($i = 1; $i < $x+1; $i++)
                                <div class="slider-item">
                                    <img src="/../img/bikini/<?php echo $product->name . $i . ".jpg"; ?>" alt="/../img/bikini/<?php echo $product->name . $i . ".jpg"; ?>" class="img-fluid">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center text-center mb-2">
                    <div class="col-md-8">
                        <p class="txt" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route ('get.product', $product->id)}}" class="btn btn-primary">
                            <em>Tallas y colores&nbsp;&nbsp;&nbsp;</em></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endforeach


    <section class="container section slider-section"  id="cover_up">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <h1 class="heading-a" data-aos="fade-up"><em><b>Cover ups</b></em></h1>
            </div>
        </div>
    </section>


    @foreach ($coverUps as $product)
        <section class="section slider-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-2">
                    <div class="col-md-8">
                        <h4 class="heading" data-aos="fade-up"><em>{{ $product->name }}</em></h4>
                        <p class="txt" data-aos="fade-up" data-aos-delay="100"><b>{{ $product->price}} mxn</b></p>
                        <p data-aos="fade-up" data-aos-delay="100" id="product_text">{{ $product->description}}</p>
                        {{-- <p class="txt" data-aos="fade-up" data-aos-delay="100">Disponibilidad: {{ $product->disponibilidad }}</p> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-slider major-caousel owl-carousel mb-2" data-aos="fade-up" data-aos-delay="200" >
                            @php
                                $x = $product->total_fotos;
                            @endphp
                            @for ($i = 1; $i < $x+1; $i++)
                                <div class="slider-item">
                                    <img src="/../img/cover_up/<?php echo $product->name . $i . ".jpg"; ?>" alt="/../img/cover_up/<?php echo $product->name . $i . ".jpg"; ?>" class="img-fluid">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-8">
                        <p class="txt" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route ('get.product', $product->id)}}" class="btn btn-primary">
                            <em>Tallas y colores&nbsp;&nbsp;&nbsp;</em></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endforeach


    <section class="container section slider-section"  id="entero">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <h1 class="heading-a" data-aos="fade-up"><em><b>One piece</b></em></h1>
            </div>
        </div>
    </section>

    @foreach ($enteros as $product)
        <section class="section slider-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-2">
                    <div class="col-md-8">
                        <h4 class="heading" data-aos="fade-up"><em>{{ $product->name }}</em></h4>
                        <p class="txt" data-aos="fade-up" data-aos-delay="100"><b>{{ $product->price}} mxn</b></p>
                        <p data-aos="fade-up" data-aos-delay="100" id="product_text">{{ $product->description}}</p>
                        {{-- <p class="txt" data-aos="fade-up" data-aos-delay="100">Disponibilidad: {{ $product->disponibilidad }}</p> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-slider major-caousel owl-carousel mb-2" data-aos="fade-up" data-aos-delay="200" >
                            @php
                                $x = $product->total_fotos;
                            @endphp
                            @for ($i = 1; $i < $x+1; $i++)
                                <div class="slider-item">
                                    <img src="/../img/entero/<?php echo $product->name . $i . ".jpg"; ?>" alt="/../img/entero/<?php echo $product->name . $i . ".jpg"; ?>" class="img-fluid">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-8">
                        <p class="txt" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route ('get.product', $product->id)}}" class="btn btn-primary">
                            <em>Tallas y colores&nbsp;&nbsp;&nbsp;</em></a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

    @endforeach





