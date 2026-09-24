<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male Fashion - Premium Fashion Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ui-fixes.css') }}" type="text/css">

    <style>
        /* Remove any spacing between header and banner */
        body {
            margin: 0;
            padding: 0;
        }
        
        .guest-banner {
            background: linear-gradient(135deg, rgba(191, 169, 128, 0.9), rgba(191, 169, 128, 0.7)), 
                        url('{{ asset("img/malefashion-img/hero/hero-1.jpg") }}') center/cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        
        .guest-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .banner-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
        }
        
        .banner-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .banner-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .cta-btn.primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
        }
        
        .cta-btn.secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: white;
            text-decoration: none;
        }
        
        .features-section {
            padding: 100px 0;
            background: #f8f9fa;
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }
        
        .products-preview {
            padding: 100px 0;
        }
        
        .product-preview-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .product-preview-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .product-preview-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .product-preview-info {
            padding: 1.5rem;
        }
        
        .guest-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .login-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white !important;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 140px;
            font-size: 0.95rem;
            line-height: 1.4;
        }
        
        .login-btn::before {
            display: none; /* Remove any pseudo-elements that might create circles */
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white !important;
            text-decoration: none;
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        
        .login-btn:focus {
            color: white !important;
            text-decoration: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
            outline: none;
        }
        
        .login-btn:active {
            color: white !important;
            text-decoration: none;
            transform: translateY(0);
        }
        
        .login-btn i {
            margin-right: 8px;
            font-size: 0.9rem;
        }
        
        /* Ensure login button and dropdown are right-aligned */
        .header .col-lg-3:last-child {
            text-align: right;
        }
        
        .dropdown-menu {
            right: 0;
            left: auto;
        }
        
        .login-prompt {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            padding: 80px 0;
        }
        
        /* Simple Mobile Menu Styles */
        #mobile-menu-toggle {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: scale(1);
        }
        
        #mobile-menu-toggle:hover {
            color: #667eea !important;
            transform: scale(1.1);
        }
        
        #mobile-menu-toggle:hover i {
            color: #667eea !important;
        }
        
        #mobile-menu-toggle.active {
            transform: scale(0.95);
        }
        
        #mobile-menu-toggle i {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        #mobile-menu-toggle.active i {
            transform: rotate(90deg);
        }
        
        .header {
            margin: 0 !important;
            padding: 0 !important;
        }
        
        .header .row {
            align-items: center;
            min-height: 60px;
            margin: 0 !important;
        }
        
        .header .container {
            margin: 0 !important;
            padding: 15px 15px 0 15px !important;
        }
        
        .header__logo {
            height: 100%;
        }
        
        .header__logo img {
            max-height: 50px;
            width: auto;
        }
        
        .header__nav__option {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        
        .header__nav__option__item {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        
        .mobile-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            border-radius: 0 0 12px 12px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-15px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }
        
        .mobile-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }
        
        .mobile-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            transform: translateY(-10px);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu.active ul {
            transform: translateY(0);
        }
        
        .mobile-menu li {
            border-bottom: 1px solid #f0f0f0;
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu li:nth-child(1) { transition-delay: 0.1s; }
        .mobile-menu li:nth-child(2) { transition-delay: 0.15s; }
        .mobile-menu li:nth-child(3) { transition-delay: 0.2s; }
        .mobile-menu li:nth-child(4) { transition-delay: 0.25s; }
        .mobile-menu li:nth-child(5) { transition-delay: 0.3s; }
        .mobile-menu li:nth-child(6) { transition-delay: 0.35s; }
        
        .mobile-menu.active li {
            opacity: 1;
            transform: translateX(0);
        }
        
        .mobile-menu li:last-child {
            border-bottom: none;
        }
        
        .mobile-menu a {
            display: block;
            padding: 18px 20px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .mobile-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }
        
        .mobile-menu a:hover {
            color: white;
            padding-left: 30px;
        }
        
        .mobile-menu a:hover::before {
            width: 100%;
        }
        
        .mobile-menu .header__nav__option {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            background: #f8f9fa;
        }
        
        @media (max-width: 768px) {
            .banner-title {
                font-size: 2.5rem;
            }
            .banner-subtitle {
                font-size: 1.2rem;
            }
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .header {
                padding: 15px 0;
            }
            
            .header__logo img {
                max-height: 40px;
            }
            
            .header .row {
                min-height: 50px;
            }
        }
        
        @media (min-width: 769px) {
            .canvas__open {
                display: none !important;
            }
            
            /* Ensure right alignment on desktop */
            .header .col-lg-3:last-child {
                display: flex !important;
                justify-content: flex-end !important;
                align-items: center !important;
            }
            
            .header__nav__option {
                justify-content: flex-end !important;
            }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header guest-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 d-flex align-items-center justify-content-start">
                    <div class="header__logo d-flex align-items-center">
                        <a href="{{ route('guest.home') }}" class="d-flex align-items-center">
                            <img src="{{ asset('img/malefashion-img/logo.png') }}" alt="" class="img-fluid" style="max-height: 40px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-none d-lg-block">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('guest.home') }}">Home</a></li>
                            <li><a href="{{ route('guest.products') }}">Browse Products</a></li>
                            <li><a href="{{ route('guest.about') }}">About</a></li>
                            <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3 d-none d-lg-block text-end">
                    <div class="header__nav__option">
                        <div class="header__nav__option__item">
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if(auth()->user()->role === 'admin')
                                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                                            </a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                            <i class="fas fa-user me-2"></i>My Profile
                                        </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="login-btn">
                                    <i class="fas fa-user me-2"></i>Login to Shop
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-6 d-lg-none d-flex align-items-center justify-content-end">
                    <button class="btn btn-link p-2 d-flex align-items-center justify-content-center" id="mobile-menu-toggle" style="height: 40px; width: 40px; border: none; background: none;">
                        <i class="fas fa-bars" style="font-size: 1.2rem; color: #333;"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <ul>
                <li><a href="{{ route('guest.home') }}">Home</a></li>
                <li><a href="{{ route('guest.products') }}">Browse Products</a></li>
                <li><a href="{{ route('guest.about') }}">About</a></li>
                <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                <li><a href="{{ route('guest.contact') }}">Contact</a></li>
            </ul>
            <div class="header__nav__option">
                <div class="header__nav__option__item">
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                                    </a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fas fa-user me-2"></i>My Profile
                                    </a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn w-100 text-center d-block">
                            <i class="fas fa-user me-2"></i>Login to Shop
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Banner -->
    <section class="guest-banner">
        <div class="container">
            <div class="banner-content">
                <h1 class="banner-title">Welcome to Male Fashion</h1>
                <p class="banner-subtitle">Discover premium fashion collections and trending styles</p>
                <div class="cta-buttons">
                    <a href="{{ route('guest.products') }}" class="cta-btn primary">
                        <i class="fas fa-shopping-bag"></i>
                        Browse Products
                    </a>
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="cta-btn secondary">
                                <i class="fas fa-tachometer-alt"></i>
                                Admin Dashboard
                            </a>
                        @else
                            <a href="{{ route('user.profile') }}" class="cta-btn secondary">
                                <i class="fas fa-user"></i>
                                My Profile
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="cta-btn secondary">
                            <i class="fas fa-user"></i>
                            Login to Shop
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="mb-3">Why Choose Male Fashion?</h2>
                    <p class="lead text-muted">Experience the best in fashion with our premium features</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #10b981, #047857);">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h4 class="mb-3">Premium Quality</h4>
                        <p class="text-muted">High-quality materials and craftsmanship in every piece</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h4 class="mb-3">Fast Shipping</h4>
                        <p class="text-muted">Quick and reliable delivery to your doorstep</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="fas fa-undo"></i>
                        </div>
                        <h4 class="mb-3">Easy Returns</h4>
                        <p class="text-muted">Hassle-free returns and exchanges within 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Preview -->
    <section class="products-preview">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="mb-3">Featured Products</h2>
                    <p class="lead text-muted">Get a glimpse of our latest collection</p>
                </div>
            </div>
            <div class="row">
                @foreach($featuredProducts as $product)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="product-preview-card">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-preview-image"
                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                            @else
                                <div class="product-preview-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            <div class="product-preview-info">
                                <h5 class="mb-2">{{ $product->name }}</h5>
                                <p class="text-muted mb-3">{{ Str::limit($product->description, 60) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-success mb-0">${{ number_format($product->price, 2) }}</span>
                                    <a href="{{ route('guest.product.detail', $product->id) }}" class="btn btn-outline-primary btn-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('guest.products') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-eye me-2"></i>View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Login Prompt Section -->
    <section class="login-prompt">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="mb-4">Ready to Start Shopping?</h2>
                    <p class="lead mb-4">Create an account to add items to cart, track orders, and enjoy personalized recommendations</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ route('guest.home') }}"><img src="{{ asset('img/malefashion-img/logo.png') }}" alt=""></a>
                        </div>
                        <p>Premium fashion store offering the latest trends and timeless classics for the modern man.</p>
                        <div class="footer__payment">
                            <a href="#"><img src="{{ asset('img/malefashion-img/payment/payment-1.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/malefashion-img/payment/payment-2.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/malefashion-img/payment/payment-3.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/malefashion-img/payment/payment-4.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/malefashion-img/payment/payment-5.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Explore</h6>
                        <ul>
                            <li><a href="{{ route('guest.products') }}">Products</a></li>
                            <li><a href="{{ route('guest.about') }}">About Us</a></li>
                            <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                @else
                                    <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-start" style="color: inherit; text-decoration: none;">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('login') }}">Register</a></li>
                            @endauth
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Size Guide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-8">
                    <div class="footer__widget">
                        <h6>Support</h6>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact Support</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <div class="footer__widget">
                        <h6>Follow Us</h6>
                        <div class="footer__social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
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
                <input type="text" id="search-input" placeholder="Search products...">
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

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card, .product-preview-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        // Simple Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuToggle && mobileMenu) {
                mobileMenuToggle.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                    mobileMenuToggle.classList.toggle('active');
                });
                
                // Close mobile menu when clicking on a link
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.remove('active');
                        mobileMenuToggle.classList.remove('active');
                    });
                });
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.remove('active');
                        mobileMenuToggle.classList.remove('active');
                    }
                });
            }
        });
    </script>

</body>
</html>
