<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Premium Male Fashion - World-Class Design">
    <meta name="keywords" content="Premium Fashion, Luxury, Modern Design">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Premium Male Fashion | World-Class Design</title>

    <!-- Premium Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome 6.4.0 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Premium CSS Framework -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Premium UI Styles -->
    <link rel="stylesheet" href="{{ asset('css/premium-ui.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/premium-hero.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/premium-products.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ui-fixes.css') }}" type="text/css">
    
    <style>
        /* Premium Global Styles */
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

        /* Premium Scrollbar */
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

        /* Premium Selection */
        ::selection {
            background: rgba(14, 165, 233, 0.2);
            color: var(--gray-900);
        }

        /* Premium Focus */
        *:focus {
            outline: 2px solid var(--primary-500);
            outline-offset: 2px;
        }
    </style>
</head>

<body>
    <!-- Premium Loading Screen -->
    <div id="premium-loader" class="premium-loader">
        <div class="premium-loader__content">
            <div class="premium-loader__logo">
                <div class="premium-loader__icon">
                    <i class="fas fa-store"></i>
                </div>
                <span>MaleFashion</span>
            </div>
            <div class="premium-loader__progress">
                <div class="premium-loader__bar"></div>
            </div>
            <div class="premium-loader__text">Loading Premium Experience...</div>
        </div>
    </div>

    @include('partials.premium-navbar')

    <!-- Premium Hero Section -->
    <section class="premium-hero">
        <div class="premium-hero__container">
            <div class="premium-hero__content">
                <div class="premium-hero__text">
                    <div class="premium-hero__badge">
                        <span class="premium-hero__badge-text">
                            <i class="fas fa-crown"></i>
                            Premium Collection
                        </span>
                    </div>
                    <h1 class="premium-hero__title">
                        <span class="premium-hero__title-line">Luxury Fashion</span>
                        <span class="premium-hero__title-line premium-hero__title-line--accent">Redefined</span>
                    </h1>
                    <p class="premium-hero__description">
                        Experience the pinnacle of modern fashion with our exclusive collection. 
                        Crafted with precision, designed for perfection, and built for the extraordinary.
                    </p>
                    <div class="premium-hero__actions">
                        <a href="{{ route('shop') }}" class="premium-hero__btn premium-hero__btn--primary">
                            <span>Explore Collection</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('about') }}" class="premium-hero__btn premium-hero__btn--secondary">
                            <span>Discover More</span>
                        </a>
                    </div>
                    <div class="premium-hero__stats">
                        <div class="premium-hero__stat">
                            <span class="premium-hero__stat-number">1000+</span>
                            <span class="premium-hero__stat-label">Premium Products</span>
                        </div>
                        <div class="premium-hero__stat">
                            <span class="premium-hero__stat-number">50K+</span>
                            <span class="premium-hero__stat-label">Satisfied Customers</span>
                        </div>
                        <div class="premium-hero__stat">
                            <span class="premium-hero__stat-number">150+</span>
                            <span class="premium-hero__stat-label">Countries Worldwide</span>
                        </div>
                    </div>
                </div>
                <div class="premium-hero__visual">
                    <div class="premium-hero__image-container">
                        <div class="premium-hero__image premium-hero__image--primary">
                            <img src="{{ asset('img/malefashion-img/hero-1.jpg') }}" alt="Premium Fashion Collection" loading="lazy">
                        </div>
                        <div class="premium-hero__image premium-hero__image--secondary">
                            <img src="{{ asset('img/malefashion-img/hero-2.jpg') }}" alt="Premium Fashion Collection" loading="lazy">
                        </div>
                        <div class="premium-hero__floating-card premium-hero__floating-card--1">
                            <div class="premium-hero__card-content">
                                <div class="premium-hero__card-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="premium-hero__card-text">
                                    <div class="premium-hero__card-title">Free Shipping</div>
                                    <div class="premium-hero__card-subtitle">Worldwide Delivery</div>
                                </div>
                            </div>
                        </div>
                        <div class="premium-hero__floating-card premium-hero__floating-card--2">
                            <div class="premium-hero__card-content">
                                <div class="premium-hero__card-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div class="premium-hero__card-text">
                                    <div class="premium-hero__card-title">Premium Quality</div>
                                    <div class="premium-hero__card-subtitle">Luxury Materials</div>
                                </div>
                            </div>
                        </div>
                        <div class="premium-hero__floating-card premium-hero__floating-card--3">
                            <div class="premium-hero__card-content">
                                <div class="premium-hero__card-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="premium-hero__card-text">
                                    <div class="premium-hero__card-title">Secure Payment</div>
                                    <div class="premium-hero__card-subtitle">100% Protected</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="premium-hero__background">
            <div class="premium-hero__gradient"></div>
            <div class="premium-hero__pattern"></div>
        </div>
        <div class="premium-hero__particles">
            <div class="premium-hero__particle"></div>
            <div class="premium-hero__particle"></div>
            <div class="premium-hero__particle"></div>
            <div class="premium-hero__particle"></div>
            <div class="premium-hero__particle"></div>
            <div class="premium-hero__particle"></div>
            <div class="premium-hero__particle"></div>
        </div>
    </section>

    <!-- Premium Product Section -->
    <section class="premium-products">
        <div class="premium-products__container">
            <div class="premium-products__header">
                <div class="premium-products__badge">
                    <span class="premium-products__badge-text">
                        <i class="fas fa-star"></i>
                        Featured Collection
                    </span>
                </div>
                <h2 class="premium-products__title">Exclusive Products</h2>
                <p class="premium-products__subtitle">
                    Discover our curated selection of premium fashion items, 
                    each piece carefully selected for its exceptional quality and timeless design.
                </p>
            </div>
            
            <div class="premium-products__filters">
                <button class="premium-products__filter premium-products__filter--active" data-filter="*">All Products</button>
                <button class="premium-products__filter" data-filter=".new-arrivals">New Arrivals</button>
                <button class="premium-products__filter" data-filter=".hot-sales">Hot Sales</button>
                <button class="premium-products__filter" data-filter=".bestsellers">Bestsellers</button>
                <button class="premium-products__filter" data-filter=".featured">Featured</button>
            </div>
            
            <div class="premium-products__grid">
                @foreach($products as $index => $product)
                    @php
                        // Assign classes based on product index for variety
                        $productClass = $index < count($products) / 4 ? 'new-arrivals' : 
                                      ($index < (count($products) * 2) / 4 ? 'hot-sales' : 
                                      ($index < (count($products) * 3) / 4 ? 'bestsellers' : 'featured'));
                    @endphp
                    <div class="premium-product-card mix {{ $productClass }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="premium-product-card__image">
                            @if($product->images->count())
                                <img src="{{ asset('products/' . basename($product->images->first()->path)) }}" alt="{{ $product->name }}" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/400x400?text=Premium+Product" alt="Premium Product" loading="lazy">
                            @endif
                            <div class="premium-product-card__overlay">
                                <div class="premium-product-card__actions">
                                    <button class="premium-product-card__action" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="premium-product-card__action" title="Add to Wishlist">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="premium-product-card__action" title="Add to Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                            @if($productClass === 'hot-sales')
                                <div class="premium-product-card__badge premium-product-card__badge--sale">
                                    <span>Sale</span>
                                </div>
                            @elseif($productClass === 'new-arrivals')
                                <div class="premium-product-card__badge premium-product-card__badge--new">
                                    <span>New</span>
                                </div>
                            @elseif($productClass === 'featured')
                                <div class="premium-product-card__badge premium-product-card__badge--featured">
                                    <span>Featured</span>
                                </div>
                            @endif
                        </div>
                        <div class="premium-product-card__content">
                            <div class="premium-product-card__category">{{ $product->category ?? 'Premium Fashion' }}</div>
                            <h3 class="premium-product-card__title">
                                <a href="{{ route('shop_detail', $product->id) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="premium-product-card__rating">
                                <div class="premium-product-card__stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="premium-product-card__rating-count">({{ rand(50, 500) }})</span>
                            </div>
                            <div class="premium-product-card__price">
                                <span class="premium-product-card__price-current">
                                    {{ session('currency', 'USD') == 'EUR' ? '€' : '$' }}{{ number_format(convert_price($product->price), 2) }}
                                </span>
                                @if($productClass === 'hot-sales')
                                    <span class="premium-product-card__price-original">
                                        {{ session('currency', 'USD') == 'EUR' ? '€' : '$' }}{{ number_format(convert_price($product->price * 1.4), 2) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="premium-products__cta">
                <a href="{{ route('shop') }}" class="premium-products__btn">
                    <span>View All Products</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Premium Features Section -->
    <section class="premium-features">
        <div class="premium-features__container">
            <div class="premium-features__header">
                <h2 class="premium-features__title">Why Choose Premium Fashion?</h2>
                <p class="premium-features__subtitle">Experience the difference with our premium services and quality</p>
            </div>
            <div class="premium-features__grid">
                <div class="premium-feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="premium-feature-card__icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3 class="premium-feature-card__title">Premium Quality</h3>
                    <p class="premium-feature-card__description">Only the finest materials and craftsmanship</p>
                </div>
                <div class="premium-feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="premium-feature-card__icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3 class="premium-feature-card__title">Fast Delivery</h3>
                    <p class="premium-feature-card__description">Express shipping worldwide with tracking</p>
                </div>
                <div class="premium-feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="premium-feature-card__icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h3 class="premium-feature-card__title">Easy Returns</h3>
                    <p class="premium-feature-card__description">30-day hassle-free return policy</p>
                </div>
                <div class="premium-feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="premium-feature-card__icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="premium-feature-card__title">24/7 Support</h3>
                    <p class="premium-feature-card__description">Premium customer service always available</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Premium Footer -->
    <footer class="premium-footer">
        <div class="premium-footer__container">
            <div class="premium-footer__content">
                <div class="premium-footer__brand">
                    <div class="premium-footer__logo">
                        <div class="premium-footer__logo-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <span>MaleFashion</span>
                    </div>
                    <p class="premium-footer__description">
                        Premium fashion for the modern gentleman. 
                        Experience luxury redefined.
                    </p>
                    <div class="premium-footer__social">
                        <a href="#" class="premium-footer__social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="premium-footer__social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="premium-footer__social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="premium-footer__social-link"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="premium-footer__links">
                    <div class="premium-footer__column">
                        <h4 class="premium-footer__title">Quick Links</h4>
                        <ul class="premium-footer__list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contacts') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="premium-footer__column">
                        <h4 class="premium-footer__title">Customer Service</h4>
                        <ul class="premium-footer__list">
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Size Guide</a></li>
                        </ul>
                    </div>
                    <div class="premium-footer__column">
                        <h4 class="premium-footer__title">Company</h4>
                        <ul class="premium-footer__list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Sustainability</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="premium-footer__bottom">
                <p class="premium-footer__copyright">
                    © 2024 MaleFashion. All rights reserved. Premium fashion for the modern world.
                </p>
            </div>
        </div>
    </footer>

    <!-- Premium JavaScript Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
    
    <!-- Premium JavaScript -->
    <script>
        // Premium Loading Screen
        window.addEventListener('load', function() {
            const loader = document.getElementById('premium-loader');
            const progressBar = document.querySelector('.premium-loader__bar');
            
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
            const container = document.querySelector('.premium-products__grid');
            if (container) {
                const mixer = mixitup(container, {
                    selectors: {
                        target: '.premium-product-card'
                    },
                    animation: {
                        duration: 500,
                        effects: 'fade scale(0.8)',
                        easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                    }
                });

                // Handle filter button clicks
                const filterButtons = document.querySelectorAll('.premium-products__filter');
                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // Remove active class from all buttons
                        filterButtons.forEach(btn => btn.classList.remove('premium-products__filter--active'));
                        // Add active class to clicked button
                        this.classList.add('premium-products__filter--active');
                    });
                });
            }
        });

        // Premium scroll effects
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.premium-hero__background');
            if (parallax) {
                const speed = scrolled * 0.3;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Premium product card interactions
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.premium-product-card');
            
            productCards.forEach(card => {
                const actionButtons = card.querySelectorAll('.premium-product-card__action');
                
                actionButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        // Add premium ripple effect
                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;
                        
                        ripple.style.width = ripple.style.height = size + 'px';
                        ripple.style.left = x + 'px';
                        ripple.style.top = y + 'px';
                        ripple.classList.add('premium-ripple');
                        
                        this.appendChild(ripple);
                        
                        setTimeout(() => {
                            ripple.remove();
                        }, 800);
                        
                        // Handle different actions
                        const icon = this.querySelector('i');
                        if (icon.classList.contains('fa-eye')) {
                            // Quick view functionality
                            console.log('Premium quick view clicked');
                        } else if (icon.classList.contains('fa-heart')) {
                            // Wishlist functionality
                            this.classList.toggle('active');
                            console.log('Premium wishlist toggled');
                        } else if (icon.classList.contains('fa-shopping-cart')) {
                            // Add to cart functionality
                            console.log('Premium add to cart clicked');
                        }
                    });
                });
            });
        });

        // Premium cursor effects
        document.addEventListener('mousemove', function(e) {
            const cursor = document.querySelector('.premium-cursor');
            if (cursor) {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
            }
        });

        // Add premium styles
        const style = document.createElement('style');
        style.textContent = `
            .premium-loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, var(--gray-50), var(--primary-50), var(--secondary-50));
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                transition: opacity 0.5s ease;
            }
            
            .premium-loader__content {
                text-align: center;
                color: var(--gray-700);
            }
            
            .premium-loader__logo {
                display: flex;
                align-items: center;
                gap: var(--space-3);
                font-size: 2rem;
                font-weight: 800;
                margin-bottom: var(--space-8);
                color: var(--primary-600);
            }
            
            .premium-loader__icon {
                width: 48px;
                height: 48px;
                background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
                border-radius: var(--radius-2xl);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
                animation: pulse 2s infinite;
            }
            
            .premium-loader__progress {
                width: 300px;
                height: 4px;
                background: var(--gray-200);
                border-radius: var(--radius-full);
                overflow: hidden;
                margin-bottom: var(--space-4);
            }
            
            .premium-loader__bar {
                height: 100%;
                background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
                border-radius: var(--radius-full);
                transition: width 0.3s ease;
                width: 0%;
            }
            
            .premium-loader__text {
                font-size: 0.875rem;
                color: var(--gray-600);
                font-weight: 500;
            }
            
            .premium-product-card__action {
                position: relative;
                overflow: hidden;
            }
            
            .premium-ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.8);
                transform: scale(0);
                animation: premium-ripple-animation 0.8s linear;
                pointer-events: none;
            }
            
            @keyframes premium-ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .premium-product-card__action.active {
                background: var(--error) !important;
                color: white !important;
            }
            
            .premium-features {
                padding: var(--space-32) 0;
                background: rgba(255, 255, 255, 0.5);
                backdrop-filter: var(--glass-backdrop);
                -webkit-backdrop-filter: var(--glass-backdrop);
            }
            
            .premium-features__container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 var(--space-6);
            }
            
            .premium-features__header {
                text-align: center;
                margin-bottom: var(--space-20);
            }
            
            .premium-features__title {
                font-size: clamp(2rem, 4vw, 3rem);
                font-weight: 800;
                color: var(--gray-900);
                margin-bottom: var(--space-4);
            }
            
            .premium-features__subtitle {
                font-size: 1.125rem;
                color: var(--gray-600);
                max-width: 600px;
                margin: 0 auto;
            }
            
            .premium-features__grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: var(--space-8);
            }
            
            .premium-feature-card {
                text-align: center;
                padding: var(--space-8);
                background: rgba(255, 255, 255, 0.8);
                border-radius: var(--radius-3xl);
                backdrop-filter: var(--glass-backdrop);
                -webkit-backdrop-filter: var(--glass-backdrop);
                border: 1px solid var(--glass-border);
                transition: var(--transition-all);
            }
            
            .premium-feature-card:hover {
                transform: translateY(-8px);
                box-shadow: var(--shadow-xl);
            }
            
            .premium-feature-card__icon {
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
            
            .premium-feature-card__title {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--gray-900);
                margin-bottom: var(--space-3);
            }
            
            .premium-feature-card__description {
                color: var(--gray-600);
                line-height: 1.6;
            }
            
            .premium-footer {
                background: linear-gradient(135deg, var(--gray-900), var(--gray-800));
                color: white;
                padding: var(--space-20) 0 var(--space-8);
            }
            
            .premium-footer__container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 var(--space-6);
            }
            
            .premium-footer__content {
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: var(--space-16);
                margin-bottom: var(--space-12);
            }
            
            .premium-footer__logo {
                display: flex;
                align-items: center;
                gap: var(--space-3);
                font-size: 1.5rem;
                font-weight: 800;
                margin-bottom: var(--space-4);
            }
            
            .premium-footer__logo-icon {
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
            
            .premium-footer__description {
                color: var(--gray-300);
                margin-bottom: var(--space-6);
                line-height: 1.6;
            }
            
            .premium-footer__social {
                display: flex;
                gap: var(--space-4);
            }
            
            .premium-footer__social-link {
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
            
            .premium-footer__social-link:hover {
                background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
                transform: translateY(-2px);
                color: white;
                text-decoration: none;
            }
            
            .premium-footer__links {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: var(--space-8);
            }
            
            .premium-footer__title {
                font-size: 1.125rem;
                font-weight: 700;
                margin-bottom: var(--space-4);
                color: white;
            }
            
            .premium-footer__list {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            
            .premium-footer__list li {
                margin-bottom: var(--space-2);
            }
            
            .premium-footer__list a {
                color: var(--gray-300);
                text-decoration: none;
                transition: color var(--transition-fast);
            }
            
            .premium-footer__list a:hover {
                color: var(--primary-400);
                text-decoration: none;
            }
            
            .premium-footer__bottom {
                border-top: 1px solid var(--gray-700);
                padding-top: var(--space-6);
                text-align: center;
            }
            
            .premium-footer__copyright {
                color: var(--gray-400);
                font-size: 0.875rem;
            }
            
            @media (max-width: 768px) {
                .premium-footer__content {
                    grid-template-columns: 1fr;
                    gap: var(--space-8);
                }
                
                .premium-footer__links {
                    grid-template-columns: 1fr;
                    gap: var(--space-6);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>
