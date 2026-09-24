/*  ---------------------------------------------------
    Template Name: Male Fashion
    Description: Male Fashion - ecommerce teplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.product__filter').length > 0) {
            var containerEl = document.querySelector('.product__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    // SlickNav initialization disabled - using custom mobile menu instead
    // $(".mobile-menu").slicknav({
    //     prependTo: '#mobile-menu-wrap',
    //     allowParentLinks: true,
    //     closedSymbol: '<i class="fa fa-plus"></i>',
    //     openedSymbol: '<i class="fa fa-minus"></i>',
    //     label: 'Menu'
    // });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    //Canvas Menu
    if (!$('.offcanvas-menu-overlay').length) {
        $('body').append('<div class="offcanvas-menu-overlay"></div>');
    }

    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_left'><span/>", "<span class='arrow_right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
		Radio Btn
	--------------------- */
    $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").on('click', function () {
        $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
		Scroll
	--------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // Set countdown to 7 days from now
    var today = new Date();
    var countdownDate = new Date(today.getTime() + (7 * 24 * 60 * 60 * 1000)); // 7 days from now
    
    var dd = String(countdownDate.getDate()).padStart(2, '0');
    var mm = String(countdownDate.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = countdownDate.getFullYear();
    
    var timerdate = mm + '/' + dd + '/' + yyyy;
    
    console.log('Countdown target date:', timerdate);

    // Initialize countdown if element exists
    if ($("#countdown").length > 0) {
        try {
            $("#countdown").countdown(timerdate, function (event) {
                $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"));
            });
            console.log('jQuery countdown initialized successfully');
        } catch (error) {
            console.error('jQuery countdown failed:', error);
            // Fallback to custom countdown
            initCustomCountdown();
        }
    } else {
        console.log('Countdown element not found');
    }
    
    // Custom countdown fallback function
    function initCustomCountdown() {
        const countdownElement = document.getElementById('countdown');
        if (!countdownElement) return;
        
        // Set target date to 7 days from now
        const targetDate = new Date();
        targetDate.setDate(targetDate.getDate() + 7);
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate.getTime() - now;
            
            if (distance < 0) {
                countdownElement.innerHTML = '<div class="cd-item"><span>0</span><p>Days</p></div><div class="cd-item"><span>0</span><p>Hours</p></div><div class="cd-item"><span>0</span><p>Minutes</p></div><div class="cd-item"><span>0</span><p>Seconds</p></div>';
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            countdownElement.innerHTML = 
                '<div class="cd-item"><span>' + days + '</span><p>Days</p></div>' +
                '<div class="cd-item"><span>' + hours + '</span><p>Hours</p></div>' +
                '<div class="cd-item"><span>' + minutes + '</span><p>Minutes</p></div>' +
                '<div class="cd-item"><span>' + seconds + '</span><p>Seconds</p></div>';
        }
        
        // Update countdown every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
        
        console.log('Custom countdown initialized');
    }

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="fa fa-angle-up dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-down inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    var proQty = $('.pro-qty-2');
    proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var $input = $button.parent().find('input');
        var oldValue = $input.val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below one
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $input.val(newVal).trigger('change');
    });

    /*------------------
        Achieve Counter
    --------------------*/
    $('.cn_num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);

// Cart quantity update handler
$(document).on('change', '.cart-qty-input', function() {
    var quantities = {};
    $('.cart-qty-input').each(function() {
        quantities[$(this).data('id')] = $(this).val();
    });
    $.ajax({
        url: '/cart/update',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || window.Laravel?.csrfToken || '',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify({ quantities: quantities }),
        success: function(response) {
            // Update each row's total
            response.cartItems.forEach(function(item) {
                $('.cart-qty-input[data-id="' + item.id + '"]')
                    .closest('tr')
                    .find('.cart__price')
                    .text('$ ' + item.total.toFixed(2));
            });
            // Update subtotal and total
            $('.cart__total li:contains("Subtotal") span').text('$ ' + response.subtotal.toFixed(2));
            $('.cart__total li:contains("Total") span').text('$ ' + response.total.toFixed(2));
            // Update navbar cart total
            $('.header__nav__option .price, .offcanvas__nav__option .price').text('$' + response.total.toFixed(2));
        }
    });
});