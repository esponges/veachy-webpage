<!doctype html>
<html lang="en">

    @extends('style')

    @section('content')

    <section class="site-hero overlay" style="background-image: url(img/hero_1.jpg)">
        <div class="container">
          <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center">
              <h1 class="heading" data-aos="fade-up"><em>Bienvenida</em> </h1>
              <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Discover our world-class hotel &amp; restaurant resort.</p>
              <p data-aos="fade-up" data-aos-delay="100"><a href="https://www.instagram.com/veachy_swimwear" class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block">Síguenos en ig <span class="fa fa-instagram"></span></a></p>
              <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100"></p>
              <p data-aos="fade-up" data-aos-delay="100"><a href="#bikini" class="btn uppercase btn-outline-light d-sm-inline d-block">Bikini</a>  <a href="#cover_up" class="btn uppercase btn-outline-light d-sm-inline d-block">Cover up</a>  <a href="#entero" class="btn uppercase btn-outline-light d-sm-inline d-block">Entero</a></p>


            </div>
          </div>
          <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
      </section>
      <!-- END section -->

      {{-- <section class="section visit-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading" data-aos="fade-right">You Can Visit</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right">
              <a href="restaurant.html"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"> </a>
              <h3><a href="restaurant.html">Food &amp; Wines</a></h3>
              <div class="reviews-star float-left">
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star-half"></span>
                <span class="ion-android-star-outline"></span>
              </div>
              <span class="reviews-count float-right">
                3,239 reviews
              </span>
            </div>
            <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="100">
              <a href="restaurant.html"><img src="img/img_2.jpg" alt="Image placeholder" class="img-fluid"> </a>
              <h3><a href="restaurant.html">Resort &amp; Spa</a></h3>
              <div class="reviews-star float-left">
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star-half"></span>
                <span class="ion-android-star-outline"></span>
              </div>
              <span class="reviews-count float-right">
                4,921 reviews
              </span>
            </div>
            <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="200">
              <a href="hotel.html"><img src="img/img_4.jpg" alt="Image placeholder" class="img-fluid"> </a>
              <h3><a href="hotel.html">Hotel Rooms</a></h3>
              <div class="reviews-star float-left">
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star-outline"></span>
              </div>
              <span class="reviews-count float-right">
                2,112 reviews
              </span>
            </div>
            <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right" data-aos-delay="300">
              <a href="yacht.html"><img src="img/img_5.jpg" alt="Image placeholder" class="img-fluid"> </a>
              <h3><a href="yacht.html">Yacht Club</a></h3>
              <div class="reviews-star float-left">
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star"></span>
                <span class="ion-android-star-outline"></span>
              </div>
              <span class="reviews-count float-right">
                6,421 reviews
              </span>
            </div>
          </div>
        </div>
      </section>
      <!-- END section --> --}}

      <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
              <div class="iframe-container ">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/a1aCwrR_DNU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        <div class="row">
      </section>

      <section class="jumbotron section slider-section">
        <div class="container">
            <div class="row justify-content-center text-
            center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up"></h2>
            <h4 class="heading display-4" data-aos="fade-up" style="color: #f84b93"><em><b>Envíos gratis a todo México <span class="fa fa-heart"></span><span class="fa fa-plane"></span></b></em></h4>
            </div>
            </div>
        </div>
    </section>

    <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5" id="bikini">
            <h1 class="heading" data-aos="fade-up"><em><b>Bikini</b></em></h1>
          </div>
        </div>
    </section>

      @foreach ($allProducts as $product)

      <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h4 class="heading" data-aos="fade-up"><em>{{ $product->name }}</em></h4>
                <p class="lead" data-aos="fade-up" data-aos-delay="100"><b>{{ $product->price}} mxn</b></p>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">{{ $product->description}}</p>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">Disponibilidad: {{ $product->disponibilidad }}</p>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                @php
                    $x = $product->total_fotos;
                @endphp
                @for ($i = 1; $i < $x+1; $i++)
                    <div class="slider-item">
                    <img src="img/<?php echo $product->name . $i . ".jpg"; ?>" alt="Image placeholder" class="img-fluid">
                    </div>
                @endfor
              </div>
            </div>
          </div>
        </div>
        </section>
        @endforeach

      <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5" id="cover_up">
            <h1 class="heading" data-aos="fade-up"><em><b>Cover Up</b></em></h1>
          </div>
        </div>
    </section>

      @foreach ($allCoverUps as $cover_ups)

      <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
            <h4 class="heading" data-aos="fade-up"><em>{{ $cover_ups->name }}</em></h4>
            <p class="lead" data-aos="fade-up" data-aos-delay="100"><b>{{ $cover_ups->price}} mxn</b></p>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">{{ $cover_ups->description}}</p>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">Disponibilidad: {{ $cover_ups->disponibilidad }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="slider-item">
                  <img src="img/cover_up1.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/cover_up2.jpg" alt="Image placeholder" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endforeach

      <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5" id="entero">
            <h1 class="heading" data-aos="fade-up"><em><b>Entero</b></em></h1>
          </div>
        </div>
    </section>

      @foreach ($allEnteros as $enteros)

      <section class="section slider-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
            <h4 class="heading" data-aos="fade-up"><em>{{ $enteros->name }}</em></h4>
            <p class="lead" data-aos="fade-up" data-aos-delay="100"><b>{{ $enteros->price}} mxn</b></p>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">{{ $enteros->description}}</p>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">Disponibilidad: {{ $enteros->disponibilidad }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="slider-item">
                  <img src="img/entero1.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/entero2.jpg" alt="Image placeholder" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endforeach
      <!-- END section -->

      {{-- <section class="section blog-post-entry bg-pattern">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
              <h2 class="heading" data-aos="fade-up">Recent Blog Post</h2>
              <p class="lead" data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis laboriosam alias. Sed.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

              <div class="media media-custom d-block mb-4">
                <a href="#" class="mb-4 d-block"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <span class="meta-post">February 26, 2018</span>
                  <h2 class="mt-0 mb-3"><a href="#">Five Reasons to Stay at Villa Resort</a></h2>
                </div>
              </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="200">
              <div class="media media-custom d-block mb-4">
                <a href="#" class="mb-4 d-block"><img src="img/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <span class="meta-post">February 26, 2018</span>
                  <h2 class="mt-0 mb-3"><a href="#">Five Reasons to Stay at Villa Resort</a></h2>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="300">
              <div class="media media-custom d-block mb-4">
                <a href="#" class="mb-4 d-block"><img src="img/img_3.jpg" alt="Image placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <span class="meta-post">February 26, 2018</span>
                  <h2 class="mt-0 mb-3"><a href="#">Five Reasons to Stay at Villa Resort</a></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- END section --> --}}
      <section class="section testimonial-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
              <h2 class="heading" data-aos="fade-up">Testimonial</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="testimonial text-center">
                <div class="author-image mb-3">
                  <img src="img/person_1.jpg" alt="Image placeholder" class="rounded-circle">
                </div>
                <blockquote>

                  <p>&ldquo;Et quidem, impedit eum fugiat excepturi iste aliquid suscipit, tempore, delectus rem soluta voluptatem distinctio sed dolores, magni fugit nemo cum expedita. Totam a accusantium sunt aut autem placeat officia.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; Jean Smith</em></p>

              </div>
            </div>
            <!-- END col -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="testimonial text-center">
                <div class="author-image mb-3">
                  <img src="img/person_2.jpg" alt="Image placeholder" class="rounded-circle">
                </div>
                <blockquote>
                  <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis laboriosam alias&rdquo;</p>
                </blockquote>
                <p><em>&mdash; John Doe</em></p>
              </div>
            </div>
            <!-- END col -->

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="testimonial text-center">
                <div class="author-image mb-3">
                  <img src="img/person_3.jpg" alt="Image placeholder" class="rounded-circle">
                </div>
                <blockquote>

                  <p>&ldquo;Nostrum, alias, provident magnam sit blanditiis laboriosam unde quaerat, at ipsam, ratione maiores saepe nisi modi corporis quas! Beatae quam, quod aspernatur debitis nesciunt quasi porro ea iste nobis aliquid perspiciatis nostrum culpa impedit aut, iure blanditiis itaque similique sunt!&rdquo;</p>
                </blockquote>
                <p><em>&mdash; John Doe</em></p>
              </div>
            </div>
            <!-- END col -->
          </div>
        </div>
      </section>
    @endsection
</html>
