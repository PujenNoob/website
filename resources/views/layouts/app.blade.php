<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="@yield('description', 'Male Fashion - Premium Fashion Store')">
    <meta name="keywords" content="@yield('keywords', 'Male_Fashion, fashion, clothing, style')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Male Fashion')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome 6.4.0 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ui-fixes.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/form-enhancements.css') }}" type="text/css">

    @stack('styles')
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('img/malefashion-img/footer-logo.png') }}" alt="Male Fashion Logo"></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{ asset('img/malefashion-img/payment.png') }}" alt="Payment Methods"></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="{{ route('shop') }}">Clothing Store</a></li>
                            <li><a href="{{ route('shop') }}">Trending Shoes</a></li>
                            <li><a href="{{ route('shop') }}">Accessories</a></li>
                            <li><a href="{{ route('shop') }}">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Support</h6>
                        <ul>
                            <li><a href="{{ route('contacts') }}">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivery</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Newsletter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#" method="POST" class="newsletter-form">
                                @csrf
                                <input type="email" name="email" placeholder="Your email" required>
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | Male Fashion
                        </p>
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
    <script src="{{ asset('js/ui-enhancements.js') }}"></script>
    <script src="{{ asset('js/form-enhancements.js') }}"></script>

    @stack('scripts')
</body>
</html>
