<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ui-fixes.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-ui.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-hero.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-products.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-footer.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Ultimate Global Styles */
        body {
            font-family: var(--font-body);
            background: linear-gradient(135deg, 
                var(--gray-50) 0%, 
                var(--primary-50) 25%, 
                var(--secondary-50) 50%, 
                var(--accent-50) 75%, 
                var(--gray-50) 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Ultimate Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
            border-radius: var(--radius-full);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--secondary-600));
        }

        /* Ultimate Selection */
        ::selection {
            background: rgba(14, 165, 233, 0.2);
            color: var(--gray-900);
        }

        /* Ultimate Focus */
        *:focus {
            outline: 2px solid var(--primary-500);
            outline-offset: 2px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('partials.ultimate-navbar')
    <!-- Header Section End -->
    <div id="mobile-menu-wrap"></div>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('order.store') }}" method="POST" id="checkoutForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" name="billing_first_name" value="{{ old('billing_first_name', auth()->user()->name ?? '') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="billing_last_name" value="{{ old('billing_last_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="billing_country" value="{{ old('billing_country') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="billing_address" placeholder="Street Address" value="{{ old('billing_address') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="billing_city" value="{{ old('billing_city') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="billing_state" value="{{ old('billing_state') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="billing_zip" value="{{ old('billing_zip') }}" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="billing_phone" value="{{ old('billing_phone') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="billing_email" value="{{ old('billing_email', auth()->user()->email ?? '') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <textarea name="notes" rows="3" placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @forelse($cartItems as $index => $item)
                                        <li>{{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}. {{ $item['product']->name }} x {{ $item['quantity'] }} <span>{{ get_currency_symbol() }} {{ number_format(convert_price($item['total']), 2) }}</span></li>
                                    @empty
                                        <li>Your cart is empty.</li>
                                    @endforelse
                                </ul>
                                <ul class="checkout__total__all">
                                    @php
                                        $tax = $subtotal * 0.1;
                                        $shipping = $subtotal > 100 ? 0 : 10;
                                        $total = $subtotal + $tax + $shipping;
                                    @endphp
                                    <li>Subtotal <span>{{ get_currency_symbol() }} {{ number_format(convert_price($subtotal), 2) }}</span></li>
                                    <li>Tax (10%) <span>{{ get_currency_symbol() }} {{ number_format(convert_price($tax), 2) }}</span></li>
                                    <li>Shipping <span>{{ get_currency_symbol() }} {{ number_format(convert_price($shipping), 2) }}</span></li>
                                    <li>Total <span>{{ get_currency_symbol() }} {{ number_format(convert_price($total), 2) }}</span></li>
                                </ul>
                                
                                <div class="payment-methods mb-3">
                                    <h6>Payment Method</h6>
                                    <div class="checkout__input__checkbox">
                                        <label for="cash_on_delivery">
                                            <input type="radio" name="payment_method" value="cash_on_delivery" id="cash_on_delivery" required>
                                            <span class="checkmark"></span>
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="bank_transfer">
                                            <input type="radio" name="payment_method" value="bank_transfer" id="bank_transfer" required>
                                            <span class="checkmark"></span>
                                            Bank Transfer
                                        </label>
                                    </div>
                                </div>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('img/malefashion-img/footer-logo.png') }}" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{ asset('img/malefashion-img/payment.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/malefashion-js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/main.js') }}"></script>
    
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Custom validation styles
            const validationCSS = `
                <style>
                    .error {
                        color: #dc3545;
                        font-size: 0.875rem;
                        margin-top: 0.25rem;
                        display: block;
                    }
                    .valid {
                        border-color: #28a745 !important;
                    }
                    .error-input {
                        border-color: #dc3545 !important;
                    }
                    .checkout__input {
                        position: relative;
                        margin-bottom: 1.5rem;
                    }
                    .form-loading {
                        opacity: 0.7;
                        pointer-events: none;
                    }
                    .submit-loading {
                        position: relative;
                        color: transparent !important;
                    }
                    .submit-loading::after {
                        content: '';
                        position: absolute;
                        width: 16px;
                        height: 16px;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        margin: auto;
                        border: 2px solid #ffffff;
                        border-radius: 50%;
                        border-right-color: transparent;
                        animation: spin 1s linear infinite;
                    }
                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>
            `;
            $('head').append(validationCSS);
            
            // Initialize form validation
            $('#checkoutForm').validate({
                rules: {
                    billing_first_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                    },
                    billing_last_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                    },
                    billing_email: {
                        required: true,
                        email: true,
                        maxlength: 100
                    },
                    billing_phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                        digits: true
                    },
                    billing_address: {
                        required: true,
                        minlength: 10,
                        maxlength: 200
                    },
                    billing_city: {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                    },
                    billing_state: {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                    },
                    billing_country: {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                    },
                    billing_zip: {
                        required: true,
                        minlength: 3,
                        maxlength: 10
                    },
                    payment_method: {
                        required: true
                    }
                },
                messages: {
                    billing_first_name: {
                        required: "Please enter your first name",
                        minlength: "First name must be at least 2 characters",
                        maxlength: "First name cannot exceed 50 characters"
                    },
                    billing_last_name: {
                        required: "Please enter your last name",
                        minlength: "Last name must be at least 2 characters",
                        maxlength: "Last name cannot exceed 50 characters"
                    },
                    billing_email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        maxlength: "Email cannot exceed 100 characters"
                    },
                    billing_phone: {
                        required: "Please enter your phone number",
                        minlength: "Phone number must be at least 10 digits",
                        maxlength: "Phone number cannot exceed 15 digits",
                        digits: "Please enter only numbers"
                    },
                    billing_address: {
                        required: "Please enter your address",
                        minlength: "Address must be at least 10 characters",
                        maxlength: "Address cannot exceed 200 characters"
                    },
                    billing_city: {
                        required: "Please enter your city",
                        minlength: "City must be at least 2 characters",
                        maxlength: "City cannot exceed 50 characters"
                    },
                    billing_state: {
                        required: "Please enter your state",
                        minlength: "State must be at least 2 characters",
                        maxlength: "State cannot exceed 50 characters"
                    },
                    billing_country: {
                        required: "Please enter your country",
                        minlength: "Country must be at least 2 characters",
                        maxlength: "Country cannot exceed 50 characters"
                    },
                    billing_zip: {
                        required: "Please enter your ZIP/postal code",
                        minlength: "ZIP code must be at least 3 characters",
                        maxlength: "ZIP code cannot exceed 10 characters"
                    },
                    payment_method: {
                        required: "Please select a payment method"
                    }
                },
                errorElement: 'span',
                errorClass: 'error',
                validClass: 'valid',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('error-input').removeClass('valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('error-input').addClass('valid');
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    // Show loading state
                    const submitBtn = $(form).find('button[type="submit"]');
                    const originalText = submitBtn.text();
                    
                    submitBtn.addClass('submit-loading').prop('disabled', true);
                    $(form).addClass('form-loading');
                    
                    // Submit the form
                    form.submit();
                }
            });
            
            // Real-time validation feedback
            $('input[required]').on('blur keyup', function() {
                $(this).valid();
            });
            
            // Phone number formatting
            $('input[name="billing_phone"]').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            
            // ZIP code formatting
            $('input[name="billing_zip"]').on('input', function() {
                this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
            });
            
            // Name fields - only letters and spaces
            $('input[name="billing_first_name"], input[name="billing_last_name"]').on('input', function() {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });
            
            // Auto-capitalize names
            $('input[name="billing_first_name"], input[name="billing_last_name"], input[name="billing_city"], input[name="billing_state"], input[name="billing_country"]').on('input', function() {
                const words = this.value.split(' ');
                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                }
                this.value = words.join(' ');
            });
            
            // Payment method selection feedback
            $('input[name="payment_method"]').on('change', function() {
                $('.payment-methods').find('.error').remove();
                if ($(this).is(':checked')) {
                    $('.payment-methods').addClass('valid');
                }
            });
            
            // Form submission confirmation
            $('#checkoutForm').on('submit', function(e) {
                if ($(this).valid()) {
                    const confirmed = confirm('Are you sure you want to place this order?');
                    if (!confirmed) {
                        e.preventDefault();
                        $('.submit-loading').removeClass('submit-loading').prop('disabled', false);
                        $('.form-loading').removeClass('form-loading');
                    }
                }
            });
            
            // Scroll to first error
            $('#checkoutForm').on('invalid-form.validate', function() {
                const firstError = $(this).find('.error-input').first();
                if (firstError.length) {
                    $('html, body').animate({
                        scrollTop: firstError.offset().top - 100
                    }, 500);
                    firstError.focus();
                }
            });
        });
    </script>
</body>

</html>