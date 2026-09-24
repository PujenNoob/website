<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ultimate Male Fashion - World-Class Design">
    <meta name="keywords" content="Ultimate Fashion, Luxury, Modern Design">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ultimate Male Fashion | World-Class Design</title>

    <!-- Ultimate Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome 6.4.0 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Ultimate CSS Framework -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Ultimate UI Styles -->
    <link rel="stylesheet" href="{{ asset('css/ultimate-ui.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-hero.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-products.css') }}" type="text/css">
    
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

        /* Ultimate Features Section */
        .ultimate-features {
            padding: var(--space-32) 0;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: var(--glass-backdrop);
            -webkit-backdrop-filter: var(--glass-backdrop);
        }
        
        .ultimate-features__container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--space-6);
        }
        
        .ultimate-features__header {
            text-align: center;
            margin-bottom: var(--space-20);
        }
        
        .ultimate-features__title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: var(--space-4);
        }
        
        .ultimate-features__subtitle {
            font-size: 1.125rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .ultimate-features__grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--space-8);
        }
        
        .ultimate-feature-card {
            text-align: center;
            padding: var(--space-8);
            background: rgba(255, 255, 255, 0.8);
            border-radius: var(--radius-3xl);
            backdrop-filter: var(--glass-backdrop);
            -webkit-backdrop-filter: var(--glass-backdrop);
            border: 1px solid var(--glass-border);
            transition: var(--transition-all);
        }
        
        .ultimate-feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .ultimate-feature-card__icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto var(--space-6);
            box-shadow: var(--shadow-lg);
        }
        
        .ultimate-feature-card__title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: var(--space-3);
        }
        
        .ultimate-feature-card__description {
            color: var(--gray-600);
            line-height: 1.6;
        }
        
        /* Ultimate Footer */
        .ultimate-footer {
            background: linear-gradient(135deg, var(--gray-900), var(--gray-800));
            color: white;
            padding: var(--space-20) 0 var(--space-8);
        }
        
        .ultimate-footer__container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--space-6);
        }
        
        .ultimate-footer__content {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: var(--space-16);
            margin-bottom: var(--space-12);
        }
        
        .ultimate-footer__logo {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: var(--space-4);
        }
        
        .ultimate-footer__logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }
        
        .ultimate-footer__description {
            color: var(--gray-300);
            margin-bottom: var(--space-6);
            line-height: 1.6;
        }
        
        .ultimate-footer__social {
            display: flex;
            gap: var(--space-4);
        }
        
        .ultimate-footer__social-link {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition-all);
        }
        
        .ultimate-footer__social-link:hover {
            background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        
        .ultimate-footer__links {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-8);
        }
        
        .ultimate-footer__title {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: var(--space-4);
            color: white;
        }
        
        .ultimate-footer__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .ultimate-footer__list li {
            margin-bottom: var(--space-2);
        }
        
        .ultimate-footer__list a {
            color: var(--gray-300);
            text-decoration: none;
            transition: color var(--transition-fast);
        }
        
        .ultimate-footer__list a:hover {
            color: var(--primary-400);
            text-decoration: none;
        }
        
        .ultimate-footer__bottom {
            border-top: 1px solid var(--gray-700);
            padding-top: var(--space-6);
            text-align: center;
        }
        
        .ultimate-footer__copyright {
            color: var(--gray-400);
            font-size: 0.875rem;
        }
        
        @media (max-width: 768px) {
            .ultimate-footer__content {
                grid-template-columns: 1fr;
                gap: var(--space-8);
            }
            
            .ultimate-footer__links {
                grid-template-columns: 1fr;
                gap: var(--space-6);
            }
        }
    </style>
</head>

<body>
    <!-- Ultimate Loading Screen -->
    <div id="ultimate-loader" class="ultimate-loader">
        <div class="ultimate-loader__content">
            <div class="ultimate-loader__logo">
                <div class="ultimate-loader__icon">
                    <i class="fas fa-store"></i>
                </div>
                <span>MaleFashion</span>
            </div>
            <div class="ultimate-loader__progress">
                <div class="ultimate-loader__bar"></div>
            </div>
            <div class="ultimate-loader__text">Loading Ultimate Experience...</div>
        </div>
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
                                    <div class="ultimate-hero__card-title">Free Shipping</div>
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
                                    <button class="ultimate-product-card__action" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="ultimate-product-card__action" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="ultimate-product-card__action" title="Add to Cart">
                                        <i class="fas fa-shopping-cart"></i>
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
                                    {{ session('currency', 'USD') == 'EUR' ? '€' : '$' }}{{ number_format(convert_price($product->price), 2) }}
                                </span>
                                @if($productClass === 'hot-sales')
                                    <span class="ultimate-product-card__price-original">
                                        {{ session('currency', 'USD') == 'EUR' ? '€' : '$' }}{{ number_format(convert_price($product->price * 1.4), 2) }}
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

    <!-- Ultimate Features Section -->
    <section class="ultimate-features">
        <div class="ultimate-features__container">
            <div class="ultimate-features__header">
                <h2 class="ultimate-features__title">Why Choose Ultimate Fashion?</h2>
                <p class="ultimate-features__subtitle">Experience the difference with our ultimate services and quality</p>
            </div>
            <div class="ultimate-features__grid">
                <div class="ultimate-feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="ultimate-feature-card__icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3 class="ultimate-feature-card__title">Ultimate Quality</h3>
                    <p class="ultimate-feature-card__description">Only the finest materials and craftsmanship</p>
                </div>
                <div class="ultimate-feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="ultimate-feature-card__icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3 class="ultimate-feature-card__title">Fast Delivery</h3>
                    <p class="ultimate-feature-card__description">Express shipping worldwide with tracking</p>
                </div>
                <div class="ultimate-feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="ultimate-feature-card__icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h3 class="ultimate-feature-card__title">Easy Returns</h3>
                    <p class="ultimate-feature-card__description">30-day hassle-free return policy</p>
                </div>
                <div class="ultimate-feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="ultimate-feature-card__icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="ultimate-feature-card__title">24/7 Support</h3>
                    <p class="ultimate-feature-card__description">Ultimate customer service always available</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ultimate Footer -->
    <footer class="ultimate-footer">
        <div class="ultimate-footer__container">
            <div class="ultimate-footer__content">
                <div class="ultimate-footer__brand">
                    <div class="ultimate-footer__logo">
                        <div class="ultimate-footer__logo-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <span>MaleFashion</span>
                    </div>
                    <p class="ultimate-footer__description">
                        Ultimate fashion for the modern gentleman. 
                        Experience luxury perfected.
                    </p>
                    <div class="ultimate-footer__social">
                        <a href="#" class="ultimate-footer__social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="ultimate-footer__social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="ultimate-footer__social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="ultimate-footer__social-link"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="ultimate-footer__links">
                    <div class="ultimate-footer__column">
                        <h4 class="ultimate-footer__title">Quick Links</h4>
                        <ul class="ultimate-footer__list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contacts') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="ultimate-footer__column">
                        <h4 class="ultimate-footer__title">Customer Service</h4>
                        <ul class="ultimate-footer__list">
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Size Guide</a></li>
                        </ul>
                    </div>
                    <div class="ultimate-footer__column">
                        <h4 class="ultimate-footer__title">Company</h4>
                        <ul class="ultimate-footer__list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Sustainability</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ultimate-footer__bottom">
                <p class="ultimate-footer__copyright">
                    © 2024 MaleFashion. All rights reserved. Ultimate fashion for the modern world.
                </p>
            </div>
        </div>
    </footer>

    <!-- Ultimate JavaScript Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
    
    <!-- Ultimate JavaScript -->
    <script>
        // Ultimate Loading Screen
        window.addEventListener('load', function() {
            const loader = document.getElementById('ultimate-loader');
            const progressBar = document.querySelector('.ultimate-loader__bar');
            
            let progress = 0;
            const interval = setInterval(() => {
                progress += Math.random() * 15;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(interval);
                    setTimeout(() => {
                        loader.style.opacity = '0';
                        setTimeout(() => {
                            loader.style.display = 'none';
                        }, 500);
                    }, 200);
                }
                progressBar.style.width = progress + '%';
            }, 100);
        });

        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out-cubic',
            once: true,
            offset: 100,
            delay: 100
        });

        // Initialize MixItUp for product filtering
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.ultimate-products__grid');
            if (container) {
                const mixer = mixitup(container, {
                    selectors: {
                        target: '.ultimate-product-card'
                    },
                    animation: {
                        duration: 500,
                        effects: 'fade scale(0.8)',
                        easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                    }
                });

                // Handle filter button clicks
                const filterButtons = document.querySelectorAll('.ultimate-products__filter');
                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // Remove active class from all buttons
                        filterButtons.forEach(btn => btn.classList.remove('ultimate-products__filter--active'));
                        // Add active class to clicked button
                        this.classList.add('ultimate-products__filter--active');
                    });
                });
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

        // Add ultimate styles
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
    </script>
</body>

</html>
