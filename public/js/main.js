(function($) {

	'use strict';

  $('.site-menu-toggle').click(function(){
    var $this = $(this);
    if ( $('body').hasClass('menu-open') ) {
      $this.removeClass('open');
      $('.js-site-navbar').fadeOut(400);
      $('body').removeClass('menu-open');
    } else {
      $this.addClass('open');
      $('.js-site-navbar').fadeIn(400);
      $('body').addClass('menu-open');
    }
  });


	$('nav .dropdown').hover(function(){
		var $this = $(this);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			$this.find('.dropdown-menu').removeClass('show');
	});



	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
    });

  // aos
  AOS.init({
    duration: 1000
  });

	// home slider
	$('.home-slider').owlCarousel({
    loop:true,
    autoplay: true,
    margin:10,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav:true,
    autoplayHoverPause: true,
    items: 1,
    autoheight: true,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:1,
        nav:false
      },
      1000:{
        items:1,
        nav:true
      }
    }
	});

	// owl carousel
	var majorCarousel = $('.js-carousel-1');
	majorCarousel.owlCarousel({
    loop:true,
    autoplay: true,
    stagePadding: 7,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav: true,
    autoplayHoverPause: true,
    items: 3,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:2,
        nav:false
      },
      1000:{
        items:3,
        nav:true,
        loop:false
      }
  	}
	});

	// owl carousel
	var major2Carousel = $('.js-carousel-2');
	major2Carousel.owlCarousel({
    loop:true,
    autoplay: true,
    stagePadding: 7,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav: true,
    autoplayHoverPause: true,
    items: 4,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:3,
        nav:false
      },
      1000:{
        items:4,
        nav:true,
        loop:false
      }
  	}
    });

    $(".CartAlert").on("click", () => {
        alert("Producto añadido al carrito de compras");
        });


    // $("#cartAlert").on("click", function(){
    //     alert("Producto añadido al carrito.");
    //     });

    $(function() {
        $(".checkoutData").validate({
            rules: {
                'shipping_fullname': {
                    required: true,
                    minlength: 8,
                    maxlength: 50
                },
                'shipping_phone' : {
                    required: true,
                    minlength: 10,
                    maxlength: 13
                },
                'buyer_email' : {
                    required: true,
                    email: true
                },
                'shipping_state' : {
                    required: true,
                },
                'shipping_city': {
                    required: true
                },
                'shipping_zipcode' : {
                    required: true,
                    number: true,
                },
                'shipping_address': {
                    required: true,
                    minlength: 8,
                    maxlength: 50
                }
            },
            messages: {
                'shipping_fullname': {
                    required: "Ingresa tu nombre",
                    minlength: 'El nombre es muy corto',
                    maxlength: 'El nombre es muy largo'
                },
                'shipping_phone' : {
                    required: 'Ingresa teléfono',
                    minlength: 'mínimo 10 dígitos',
                    maxlength: 'máximo 13 dígitos'
                },
                'buyer_email' : {
                    required: 'por favor ingresa correo',
                    email: 'ingresa un correo válido'
                },
                'shipping_state' : {
                    required: 'por favor ingresa estado',
                },
                'shipping_city': {
                    required: 'por favor ingresa ciudad'
                },
                'shipping_zipcode' : {
                    required: 'por favor ingresa código postal',
                    number: 'debe ser número',
                },
                'shipping_address': {
                    required: 'por favor ingresa tu dirección',
                    minlength: 'dirección muy corta',
                    maxlength: 'dirección muy larga'
                }
            },
            submitHandler: function(form) {
            form.submit();
            }
        });
    });

    // $(document).ready(function() {
        // $('.checkoutData').submit(function(e) {
        //     e.preventDefault();
        //     var shipping_fullname = $('#shipping_fullname').val();
        //     $('.error').remove();

        //     if (shipping_fullname.length = 0) {
        //         $('#shipping_fullname').after('<span class="error"> Por favor ingresa tu nombre </span>');
        //     }
        //     if (shipping_fullname.length > 50) {
        //         $('#shipping_fullname').after('<span class="error"> Máximo 50 palabras </span>');
        //     }
        // });
    // });

	var contentWayPoint = function() {
		var i = 0;
		$('.element-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('element-animated') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .element-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn element-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft element-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight element-animated');
							} else {
								el.addClass('fadeInUp element-animated');
							}
							el.removeClass('item-animate');
						},  k * 100);
					});

				}, 100);

			}

		} , { offset: '95%' } );
	};
	contentWayPoint();



})(jQuery);


