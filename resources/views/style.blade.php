<head>
    <title>Veachy Swimwear</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="icon" href="{{ URL::asset('/../v.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons"') }}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<header class="site-header">
    <div class="row">
        <div class="col-2 site-logo" data-aos="fade"><a href="/"><em>Veachy Swimwear</em></a></div>
        @auth
            @if (auth()->user()->role == 1)
                <div class="col-2" data-aos="fade"><a href="{{ route('inventory') }}"><em>Inventario</em></a>
                </div>
                <div class="col-2" data-aos="fade"><a href="{{ route('orders.index') }}"><em>Pedidos</em></a>
                </div>
            @endif
        @endauth
        <div class="col-6">
            <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
                <nav role="navigation">
                    <div class="container">
                        <div class="row full-height align-items-center">
                            <div class="col-md-6">
                                <ul class="list-unstyled menu">
                                    <li class="active"><a href="/">Home</a></li>
                                    <li><a href="#">Nosotras</a></li>
                                    <li><a href="#">Contacto</a></li>
                                    <li><a href="https://www.instagram.com/veachy_swimwear">Instragram</a><span
                                            class="fa fa-instagram"></span></li>
                                    <li><a href="https://www.facebook.com/veachyswimwearoficial">Facebook</a><span
                                            class="fa fa-facebook"></span></li>
                                    <li><a href="#">Política de envío</a><span class="fa fa-plane"></span></li>
                                    {{-- <li><a href="contact.html">Contacto</a></li>
                                    --}}
                                </ul>
                            </div>
                            <div class="col-md-6 extra-info">
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <h3>Showroom</h3>
                                        <p><em>Pink Girls Showroom</em> <br> Av. S. Bach 4930, Prados Guadalupe, <br>
                                            Zapopan Jalisco</p>
                                        <p>info@veachyswimwear.com</p>
                                        <p>whatsapp: +52 33 2363 3343</p>

                                    </div>
                                    <div class="col-md-6">
                                        <h3>Connect With Us</h3>
                                        <ul class="list-unstyled">
                                            {{-- <li><a href="#">Twitter</a></li>
                                            --}}
                                            <li><a href="https://www.facebook.com/veachyswimwearoficial">Facebook</a>
                                            </li>
                                            <li><a href="#">Instagram</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>


    {{-- cart btn style - couldnt override in app.css file
    --}}
    <style>
        .floating-btn {
            width: 100px;
            height: 100px;
            background: pink;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            box-shadow: 2px 2px 5px black;
            position: fixed;
            right: 50px;
            bottom: 50px;
            transition: background 0.25s;
        }

        @media (max-width: 991.98px) {
            .floating-btn {
                width: 50px;
                height: 50px;
                background: pink;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                border-radius: 50%;
                color: white;
                font-size: 20px;
                box-shadow: 2px 2px 5px black;
                position: fixed;
                right: 10px;
                bottom: 20px;
                transition-duration: background 0.25s;
            }
        }

        .floating-btn-ig {
            width: 60px;
            height: 60px;
            background: rgb(224, 75, 212);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            box-shadow: 2px 2px 5px black;
            position: fixed;
            right: 71px;
            bottom: 170px;
            transition: background 0.25s;
        }

        @media (max-width: 991.98px) {
            .floating-btn-ig {
                width: 50px;
                height: 50px;
                background: rgb(224, 75, 212);
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                border-radius: 50%;
                color: white;
                font-size: 20px;
                box-shadow: 2px 2px 5px black;
                position: fixed;
                right: 10px;
                bottom: 85px;
                transition-duration: background 0.25s;
            }
        }

        .floating-btn-whats {
            width: 60px;
            height: 60px;
            background: rgb(224, 75, 212);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 50%;
            color: white;
            font-size: 20px;
            box-shadow: 2px 2px 5px black;
            position: fixed;
            right: 71px;
            bottom: 250px;
            transition: background 0.25s;
        }

        @media (max-width: 991.98px) {
            .floating-btn-whats {
                width: 50px;
                height: 50px;
                background: rgb(224, 75, 212);
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                border-radius: 50%;
                color: white;
                font-size: 20px;
                box-shadow: 2px 2px 5px black;
                position: fixed;
                right: 10px;
                bottom: 150px;
                transition-duration: background 0.25s;
            }
        }

    </style>
    {{-- fixed float btns --}}
    <a href="https://www.instagram.com/veachy_swimwear" class="material-icons floating-btn-ig">
        <span class="fa fa-instagram"></span>
    </a>
    <a href="https://wa.me/5213323633343" class="material-icons floating-btn-whats" style="background-color: green;">
        <span class="fa fa-whatsapp"></span>
    </a>
    <a href=" {{ route('cart.index') }}" class="material-icons floating-btn">
        <span class="fa fa-cart-arrow-down">&nbsp;</span>
        @if (Cart::getContent()->count() > 0)
            <span class="badge badge-primary">{{ Cart::getContent()->count() }}</span>
        @endif
    </a>

</header>
<!-- END head -->

<body>

    @yield('content')
</body>



<footer class="section footer-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 mb-5">
                <ul class="list-unstyled link">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li {{-- <li><a href="#">Help</a>
                    </li>
                    <li><a href="#">Rooms</a></li> --}}
                </ul>
            </div>
            <div class="col-md-3 mb-5">
                <ul class="list-unstyled link">
                    <li><a href="#">Our Location</a></li>
                    {{-- <li><a href="#">The Hosts</a></li>
                    --}}
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="/inventory">Admin</a></li>
                    {{-- <li><a href="#">Restaurant</a></li>
                    --}}
                </ul>
            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
                <p><span class="d-block">Showroom:</span> <span> Pink Girls Showroom<br> Av. S. Bach 4930<br> Prados
                        Guadalupe<br> Zapopan, Jal</span></p>

            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
                <p><span class="d-block">Email:</span> <span> info@veachyswimwear.com</span></p>
                <p><span class="d-block">Whatsapp:</span> <span> +52 33 2363 3343 </span></p>
                {{-- <form action="#" class="footer-newsletter">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your email...">
                        <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
                    </div>
                </form> --}}
            </div>
        </div>
        <div class="row bordertop pt-5">
            <p class="cold-md-6">SITE BY <em><b><a href="https://klustermx.com/nosotros">Klustermx</a></b></em></p> <br>
            <p class="col-md-6 text-left">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());

                </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>

            <p class="col-md-6 text-right social">
                {{-- <a href="#"><span class="fa fa-tripadvisor"></span></a>
                --}}
                <a href="https://www.facebook.com/veachyswimwearoficial"><span class="fa fa-facebook"></span></a>
                <a href="https://www.instagram.com/veachy_swimwear"><span class="fa fa-instagram"></span></a>
            </p>
        </div>
    </div>
</footer>

<script src=" {{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js') }} ">
</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- <script src="js/jquery.waypoints.min.js"></script> -->
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script async src="{{ URL::asset('//www.instagram.com/embed.js') }}"></script>

</html>
