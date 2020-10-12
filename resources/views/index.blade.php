

@extends('style')

@section('content')

  <section class="site-hero overlay" style="background-image: url(/../img/hero_3.jpg);">
      <div class="container">
          <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center">
              <h1 class="heading" style="margin-top: 100px;" data-aos="fade-up"><em>Bienvenida</em> </h1>
              <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Discover our world-class hotel &amp; restaurant resort.</p>
              {{-- <p data-aos="fade-up" data-aos-delay="100"><a href="https://www.instagram.com/veachy_swimwear" class="btn uppercase btn-primary btn-block mr-md-2 mr-0 mb-3 d-sm-inline">Follow Us<span class="fa fa-instagram"></span></a></p>
              <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100"></p>
              <p data-aos="fade-up" data-aos-delay="100"><a href="https://wa.me/5213323633343" class="btn uppercase btn-light btn-block mr-md-2 mr-0 mb-3 d-sm-inline" style="background-color: green; ">WhatsApp <span class="fa fa-whatsapp"></span></a></p>
              <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100"></p> --}}
              <p data-aos="fade-up" data-aos-delay="100">
              <a href="#bikini" class="btn uppercase btn-outline-light d-sm-inline">Bikinis</a>
              <a href="#cover_up" class="btn uppercase btn-outline-light d-sm-inline">Coverups</a>
              <a href="#entero" class="btn uppercase btn-outline-light d-sm-inline">Onepiece</a></p>
          </div>
          </div>
          <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
      </div>
    </section>
      <!-- END section -->

  <section>
    <div class="container">
        <div class="row mb-5">
        <div class="col">
            <div class="iframe-container ">
            <iframe src="https://www.youtube.com/embed/a1aCwrR_DNU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        </div>
    <div class="row">
  </section>

  <section class="container section slider-section" style="margin-bottom: -60px;" >
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <h4 class="text-center heading display-4" data-aos="fade-up" style="color: #f84b93">
                <em><b>Envíos gratis a todo México <span class="fa fa-heart"></span><span class="fa fa-plane"></span></b></em></h4>
        </div>
      </div>
  </section>

  <div class="d-inline-flex p-2 bd-highlight" style="margin-bottom: 30px;">

  </div>

@include('partials.main.body')

@include('partials.main.testimonial')

@endsection
