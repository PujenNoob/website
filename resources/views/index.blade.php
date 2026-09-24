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

    <!-- Modern Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome 6.4.0 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Modern CSS Framework -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Ultimate UI Styles -->
    <link rel="stylesheet" href="{{ asset('css/ultimate-ui.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-hero.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-products.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-footer.css') }}" type="text/css">
    
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

    @include('partials.ultimate-navbar')

    <!-- Ultimate Hero Section -->
    <section class="ultimate-hero">
        <div class="ultimate-hero__container">
            <div class="ultimate-hero__content">
                <div class="ultimate-hero__text">
                    <div class="ultimate-hero__badge">
                        <span class="ultimate-hero__badge-text">
                            <i class="fas fa-crown"></i>
                            Ultimate Collection
                        </span>
                    </div>
                    <h1 class="ultimate-hero__title">
                        <span class="ultimate-hero__title-line">Luxury Fashion</span>
                        <span class="ultimate-hero__title-line ultimate-hero__title-line--accent">Perfected</span>
                    </h1>
                    <p class="ultimate-hero__description">
                        Experience the pinnacle of modern fashion with our exclusive collection. 
                        Crafted with precision, designed for perfection, and built for the extraordinary.
                    </p>
                    <div class="ultimate-hero__actions">
                        <a href="{{ route('shop') }}" class="ultimate-hero__btn ultimate-hero__btn--primary">
                            <span>Explore Collection</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('about') }}" class="ultimate-hero__btn ultimate-hero__btn--secondary">
                            <span>Discover More</span>
                        </a>
                    </div>
                    <div class="ultimate-hero__stats">
                        <div class="ultimate-hero__stat">
                            <span class="ultimate-hero__stat-number">1000+</span>
                            <span class="ultimate-hero__stat-label">Ultimate Products</span>
                        </div>
                        <div class="ultimate-hero__stat">
                            <span class="ultimate-hero__stat-number">50K+</span>
                            <span class="ultimate-hero__stat-label">Satisfied Customers</span>
                        </div>
                        <div class="ultimate-hero__stat">
                            <span class="ultimate-hero__stat-number">150+</span>
                            <span class="ultimate-hero__stat-label">Countries Worldwide</span>
                        </div>
                    </div>
                </div>
                <div class="ultimate-hero__visual">
                    <div class="ultimate-hero__image-container">
                        <div class="ultimate-hero__image ultimate-hero__image--primary">
                            <img src="{{ asset('img/malefashion-img/hero-1.jpg') }}" alt="Ultimate Fashion Collection" loading="lazy">
                        </div>
                        <div class="ultimate-hero__image ultimate-hero__image--secondary">
                            <img src="{{ asset('img/malefashion-img/hero-2.jpg') }}" alt="Ultimate Fashion Collection" loading="lazy">
                        </div>
                        <div class="ultimate-hero__floating-card ultimate-hero__floating-card--1">
                            <div class="ultimate-hero__card-content">
                                <div class="ultimate-hero__card-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="ultimate-hero__card-text">
                                    <div class="ultimate-hero__card-title">free Shipping</div>
                                    <div class="ultimate-hero__card-subtitle">Worldwide Delivery</div>
                                </div>
                            </div>
                        </div>
                        <div class="ultimate-hero__floating-card ultimate-hero__floating-card--2">
                            <div class="ultimate-hero__card-content">
                                <div class="ultimate-hero__card-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div class="ultimate-hero__card-text">
                                    <div class="ultimate-hero__card-title">Ultimate Quality</div>
                                    <div class="ultimate-hero__card-subtitle">Luxury Materials</div>
                                </div>
                            </div>
                        </div>
                        <div class="ultimate-hero__floating-card ultimate-hero__floating-card--3">
                            <div class="ultimate-hero__card-content">
                                <div class="ultimate-hero__card-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="ultimate-hero__card-text">
                                    <div class="ultimate-hero__card-title">Secure Payment</div>
                                    <div class="ultimate-hero__card-subtitle">100% Protected</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ultimate-hero__background">
            <div class="ultimate-hero__gradient"></div>
            <div class="ultimate-hero__pattern"></div>
        </div>
        <div class="ultimate-hero__particles">
            <div class="ultimate-hero__particle"></div>
            <div class="ultimate-hero__particle"></div>
            <div class="ultimate-hero__particle"></div>
            <div class="ultimate-hero__particle"></div>
            <div class="ultimate-hero__particle"></div>
            <div class="ultimate-hero__particle"></div>
            <div class="ultimate-hero__particle"></div>
        </div>
    </section>

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4 col-md-8 offset-md-4 col-sm-12 offset-sm-0">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('img/malefashion-img/banner-1.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2030</h2>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('img/malefashion-img/banner-2.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{ asset('img/malefashion-img/banner-3.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Spring 2030</h2>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Ultimate Product Section -->
    <section class="ultimate-products">
        <div class="ultimate-products__container">
            <div class="ultimate-products__header">
                <div class="ultimate-products__badge">
                    <span class="ultimate-products__badge-text">
                        <i class="fas fa-star"></i>
                        Featured Collection
                    </span>
                </div>
                <h2 class="ultimate-products__title">Ultimate Products</h2>
                <p class="ultimate-products__subtitle">
                    Discover our curated selection of ultimate fashion items, 
                    each piece carefully selected for its exceptional quality and timeless design.
                </p>
            </div>
            
            <div class="ultimate-products__filters">
                <button class="ultimate-products__filter ultimate-products__filter--active" data-filter="*">All Products</button>
                <button class="ultimate-products__filter" data-filter=".new-arrivals">New Arrivals</button>
                <button class="ultimate-products__filter" data-filter=".hot-sales">Hot Sales</button>
                <button class="ultimate-products__filter" data-filter=".bestsellers">Bestsellers</button>
                <button class="ultimate-products__filter" data-filter=".featured">Featured</button>
            </div>
            
            <div class="ultimate-products__grid">
                @foreach($products as $index => $product)
                    @php
                        // Assign classes based on product index for variety
                        $productClass = $index < count($products) / 4 ? 'new-arrivals' : 
                                      ($index < (count($products) * 2) / 4 ? 'hot-sales' : 
                                      ($index < (count($products) * 3) / 4 ? 'bestsellers' : 'featured'));
                    @endphp
                    <div class="ultimate-product-card mix {{ $productClass }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="ultimate-product-card__image">
                            @if($product->images->count())
                                <img src="{{ asset('products/' . basename($product->images->first()->path)) }}" alt="{{ $product->name }}" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/400x400?text=Ultimate+Product" alt="Ultimate Product" loading="lazy">
                            @endif
                            <div class="ultimate-product-card__overlay">
                                <div class="ultimate-product-card__actions">
                                    <button class="ultimate-product-card__action" onclick="quickView({{ $product->id }})" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            @if($productClass === 'hot-sales')
                                <div class="ultimate-product-card__badge ultimate-product-card__badge--sale">
                                    <span>Sale</span>
                                </div>
                            @elseif($productClass === 'new-arrivals')
                                <div class="ultimate-product-card__badge ultimate-product-card__badge--new">
                                    <span>New</span>
                                </div>
                            @elseif($productClass === 'featured')
                                <div class="ultimate-product-card__badge ultimate-product-card__badge--featured">
                                    <span>Featured</span>
                                </div>
                            @endif
                        </div>
                        <div class="ultimate-product-card__content">
                            <div class="ultimate-product-card__category">{{ $product->category ?? 'Ultimate Fashion' }}</div>
                            <h3 class="ultimate-product-card__title">
                                <a href="{{ route('shop_detail', $product->id) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="ultimate-product-card__rating">
                                <div class="ultimate-product-card__stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="ultimate-product-card__rating-count">({{ rand(50, 500) }})</span>
                            </div>
                            <div class="ultimate-product-card__price">
                                <span class="ultimate-product-card__price-current">
                                    {{ get_currency_symbol() }}{{ number_format(convert_price($product->price), 2) }}
                                </span>
                                @if($productClass === 'hot-sales')
                                    <span class="ultimate-product-card__price-original">
                                        {{ get_currency_symbol() }}{{ number_format(convert_price($product->price * 1.4), 2) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="ultimate-products__cta">
                <a href="{{ route('shop') }}" class="ultimate-products__btn">
                    <span>View All Products</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="categories__hot__deal">
                        <img src="{{ asset('img/malefashion-img/product-sale.png') }}" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6 col-sm-12">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('img/malefashion-img/instagram-1.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('img/malefashion-img/instagram-2.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('img/malefashion-img/instagram-3.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('img/malefashion-img/instagram-4.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('img/malefashion-img/instagram-5.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('img/malefashion-img/instagram-6.jpg') }}"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <h3>#Male_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog__item">
                         <div class="blog__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/blog-1.jpg') }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/malefashion-img/calendar.png') }}" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/blog-2.jpg') }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/malefashion-img/calendar.png') }}" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/blog-3.jpg') }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/malefashion-img/calendar.png') }}" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    @include('partials.ultimate-footer')

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
    <script src="{{ asset('js/malefashion-js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/main.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            // Custom User Dropdown Implementation
            console.log('Initializing custom dropdowns...');
            
            // Debug: Check if elements exist
            console.log('User avatar element:', $('#userAvatar').length);
            console.log('User dropdown menu element:', $('#userDropdownMenu').length);
            console.log('Mobile user button element:', $('#mobileUserButton').length);
            console.log('Mobile user dropdown menu element:', $('#mobileUserDropdownMenu').length);
            
            // Additional mobile debugging
            setTimeout(function() {
                console.log('Mobile elements after page load:');
                console.log('Mobile user button:', $('#mobileUserButton').length);
                console.log('Mobile dropdown menu:', $('#mobileUserDropdownMenu').length);
                console.log('Mobile dropdown container:', $('.mobile-user-dropdown').length);
            }, 1000);
            
            // Desktop user dropdown
            $('#userAvatar').on('click', function(e) {
                console.log('User avatar clicked!');
                e.preventDefault();
                e.stopPropagation();
                
                var $dropdown = $('#userDropdownMenu');
                var isVisible = $dropdown.hasClass('show');
                
                // Close all dropdowns first
                $('.user-dropdown-menu, .mobile-user-dropdown-menu').removeClass('show');
                
                // Toggle current dropdown
                if (!isVisible) {
                    $dropdown.addClass('show');
                    console.log('Desktop dropdown opened');
                } else {
                    console.log('Desktop dropdown closed');
                }
            });
            
            // Mobile user dropdown
            $(document).on('click', '#mobileUserButton', function(e) {
                console.log('Mobile user button clicked!');
                e.preventDefault();
                e.stopPropagation();
                
                var $dropdown = $('#mobileUserDropdownMenu');
                var isVisible = $dropdown.hasClass('show');
                
                console.log('Mobile dropdown element found:', $dropdown.length);
                console.log('Mobile dropdown currently visible:', isVisible);
                
                // Close all dropdowns first
                $('.user-dropdown-menu, .mobile-user-dropdown-menu').removeClass('show');
                
                // Toggle current dropdown
                if (!isVisible) {
                    $dropdown.addClass('show');
                    console.log('Mobile dropdown opened');
                } else {
                    console.log('Mobile dropdown closed');
                }
            });
            
            // Close dropdowns when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.user-dropdown, .mobile-user-dropdown').length) {
                    $('.user-dropdown-menu, .mobile-user-dropdown-menu').removeClass('show');
                    console.log('Dropdowns closed by outside click');
                }
            });
            
            // Close dropdowns when pressing Escape
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    $('.user-dropdown-menu, .mobile-user-dropdown-menu').removeClass('show');
                    console.log('Dropdowns closed by Escape key');
                }
            });
        });
    </script>
    
    <!-- Custom Countdown Fallback -->
    <script>
        $(document).ready(function() {
            // Fallback countdown implementation
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
            
            // Check if jQuery countdown worked, if not use custom implementation
            setTimeout(function() {
                const countdownElement = document.getElementById('countdown');
                if (countdownElement && countdownElement.innerHTML.includes('3')) {
                    console.log('jQuery countdown not working, initializing custom countdown');
                    initCustomCountdown();
                }
            }, 2000);
        });
    </script>

    <!-- Modern JavaScript Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Modern JavaScript -->
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Initialize MixItUp for product filtering
        $(document).ready(function() {
            console.log('Initializing product filtering...');
            
            const container = $('.ultimate-products__grid');
            console.log('Container found:', container.length);
            
            if (container.length) {
                console.log('Initializing MixItUp...');
                
                // Initialize MixItUp with jQuery
                const mixer = mixitup(container[0], {
                    selectors: {
                        target: '.ultimate-product-card'
                    },
                    animation: {
                        duration: 500,
                        effects: 'fade scale(0.8)',
                        easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                    }
                });

                console.log('MixItUp initialized:', mixer);

                // Handle filter button clicks
                $('.ultimate-products__filter').on('click', function() {
                    const filter = $(this).data('filter');
                    console.log('Filter clicked:', filter);
                    
                    // Remove active class from all buttons
                    $('.ultimate-products__filter').removeClass('ultimate-products__filter--active');
                    // Add active class to clicked button
                    $(this).addClass('ultimate-products__filter--active');
                    
                    // Filter products
                    mixer.filter(filter);
                });
            } else {
                console.error('Could not find .ultimate-products__grid container');
            }
        });

        // Ultimate scroll effects
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.ultimate-hero__background');
            if (parallax) {
                const speed = scrolled * 0.3;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Ultimate product card interactions
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.ultimate-product-card');
            
            productCards.forEach(card => {
                const actionButtons = card.querySelectorAll('.ultimate-product-card__action');
                
                actionButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        // Add ultimate ripple effect
                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;
                        
                        ripple.style.width = ripple.style.height = size + 'px';
                        ripple.style.left = x + 'px';
                        ripple.style.top = y + 'px';
                        ripple.classList.add('ultimate-ripple');
                        
                        this.appendChild(ripple);
                        
                        setTimeout(() => {
                            ripple.remove();
                        }, 800);
                        
                        // Handle different actions
                        const icon = this.querySelector('i');
                        if (icon.classList.contains('fa-eye')) {
                            // Quick view functionality
                            console.log('Ultimate quick view clicked');
                        } else if (icon.classList.contains('fa-heart')) {
                            // Wishlist functionality
                            this.classList.toggle('active');
                            console.log('Ultimate wishlist toggled');
                        } else if (icon.classList.contains('fa-shopping-cart')) {
                            // Add to cart functionality
                            console.log('Ultimate add to cart clicked');
                        }
                    });
                });
            });
        });

        // Add ultimate ripple effect styles
        const style = document.createElement('style');
        style.textContent = `
            .ultimate-product-card__action {
                position: relative;
                overflow: hidden;
            }
            
            .ultimate-ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.8);
                transform: scale(0);
                animation: ultimate-ripple-animation 0.8s linear;
                pointer-events: none;
            }
            
            @keyframes ultimate-ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .ultimate-product-card__action.active {
                background: var(--error) !important;
                color: white !important;
            }
        `;
        document.head.appendChild(style);

        function quickView(productId) {
            // Implement quick view functionality
            showNotification('Quick view feature coming soon!', 'info');
        }

        function showNotification(message, type = 'info') {
            const notification = $(`
                <div class="notification notification-${type}" style="
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
                    color: white;
                    padding: 1rem 1.5rem;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    z-index: 9999;
                    font-weight: 500;
                ">
                    ${message}
                </div>
            `);
            
            $('body').append(notification);
            
            setTimeout(() => {
                notification.fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }
    </script>
</body>

</html>