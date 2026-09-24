<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Browse Products - Male Fashion">
    <meta name="keywords" content="Male_Fashion, products, browse, shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browse Products | Male Fashion</title>

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
        /* Modern Browse Page Styles */
        .guest-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .login-btn {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white !important;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 140px;
            font-size: 0.95rem;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
            color: white !important;
            text-decoration: none;
            background: linear-gradient(135deg, #d97706, #b45309);
        }
        
        .login-btn i {
            margin-right: 8px;
            font-size: 0.9rem;
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .page-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }
        
        .page-header .lead {
            font-size: 1.2rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        /* Main Content Layout */
        .main-content {
            padding: 60px 0;
            background: #f8fafc;
            min-height: 80vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
            position: sticky;
            top: 120px;
        }
        
        .sidebar h5 {
            color: #1f2937;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .filter-group {
            margin-bottom: 2rem;
        }
        
        .filter-group:last-child {
            margin-bottom: 0;
        }
        
        .filter-group h6 {
            color: #374151;
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .filter-option {
            display: block;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        
        .filter-option:hover,
        .filter-option.active {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            border-color: #f59e0b;
            text-decoration: none;
            transform: translateX(4px);
        }
        
        .filter-option input[type="checkbox"] {
            margin-right: 0.5rem;
        }
        
        .price-range {
            margin-top: 1rem;
        }
        
        .price-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 0.5rem;
        }
        
        .price-slider {
            width: 100%;
            height: 6px;
            border-radius: 3px;
            background: #e5e7eb;
            outline: none;
            -webkit-appearance: none;
        }
        
        .price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #f59e0b;
            cursor: pointer;
        }
        
        .price-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #f59e0b;
            cursor: pointer;
            border: none;
        }
        
        /* Products Grid */
        .products-grid {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }
        
        .products-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .products-count {
            color: #6b7280;
            font-size: 0.95rem;
        }
        
        .sort-dropdown {
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #374151;
        }
        
        .product-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }
        
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-color: #f59e0b;
        }
        
        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        
        .product-info {
            padding: 1.5rem;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
            line-height: 1.4;
        }
        
        .product-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #059669;
            margin-bottom: 1rem;
        }
        
        .product-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-view {
            flex: 1;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            color: #374151;
            padding: 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .btn-view:hover {
            background: #e5e7eb;
            color: #1f2937;
            text-decoration: none;
        }
        
        .login-to-buy {
            flex: 1;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-to-buy:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            color: white;
            text-decoration: none;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                margin-bottom: 2rem;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .page-header .lead {
                font-size: 1rem;
            }
        }
        
        /* Loading and Empty States */
        .loading-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
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
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ route('guest.home') }}"><img src="{{ asset('img/malefashion-img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ route('guest.home') }}">Home</a></li>
                            <li><a href="{{ route('guest.products') }}" class="active">Browse Products</a></li>
                            <li><a href="{{ route('guest.about') }}">About</a></li>
                            <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <div class="header__nav__option__item">
                            <a href="{{ route('login') }}" class="login-btn">
                                <i class="fas fa-user me-2"></i>Login to Shop
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open d-lg-none"><i class="fas fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="mb-3">Browse Our Collection</h1>
            <p class="lead">Discover premium fashion pieces - Login to start shopping</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar">
                        <h5><i class="fas fa-filter me-2"></i>Filters</h5>
                        
                        <!-- Search -->
                        <div class="filter-group">
                            <h6>Search</h6>
                            <input type="text" class="form-control" id="searchInput" placeholder="Search products...">
                        </div>
                        
                        <!-- Categories -->
                        <div class="filter-group">
                            <h6>Categories</h6>
                            <label class="filter-option">
                                <input type="checkbox" value="all" checked> All Products
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" value="shirts"> Shirts
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" value="pants"> Pants
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" value="shoes"> Shoes
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" value="accessories"> Accessories
                            </label>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="filter-group">
                            <h6>Price Range</h6>
                            <div class="price-range">
                                <input type="number" class="price-input" id="minPrice" placeholder="Min" value="0">
                                <input type="number" class="price-input" id="maxPrice" placeholder="Max" value="1000">
                                <input type="range" class="price-slider" id="priceSlider" min="0" max="1000" value="1000">
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">$0</small>
                                    <small class="text-muted">$1000+</small>
                </div>
            </div>
        </div>
                        
                        <!-- Sort By -->
                        <div class="filter-group">
                            <h6>Sort By</h6>
                            <select class="form-control" id="sortSelect">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="name">Name: A to Z</option>
                            </select>
                        </div>
                        
                        <!-- Clear Filters -->
                        <button class="btn btn-outline-secondary w-100 mt-3" id="clearFilters">
                            <i class="fas fa-times me-2"></i>Clear All Filters
                        </button>
                    </div>
                </div>

    <!-- Products Grid -->
                <div class="col-lg-9 col-md-8">
                    <div class="products-grid">
                        <div class="products-header">
                            <div class="products-count">
                                <span id="productsCount">{{ $products->count() }}</span> products found
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="text-muted">View:</span>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-secondary active" id="gridView">
                                        <i class="fas fa-th"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" id="listView">
                                        <i class="fas fa-list"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" id="productsContainer">
                @foreach($products as $product)
                                <div class="col-lg-4 col-md-6 mb-4 product-item" 
                                     data-name="{{ strtolower($product->name) }}" 
                                     data-price="{{ $product->price }}"
                                     data-category="all">
                        <div class="product-card">
                            @if($product->images->count() > 0)
                                            <img src="{{ asset('storage/' . $product->images->first()->path) }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-image"
                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                            @else
                                <div class="product-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="product-info">
                                <h5 class="product-title">{{ $product->name }}</h5>
                                <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                                <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                
                                            <div class="product-actions">
                                                <a href="{{ route('guest.product.detail', $product->id) }}" class="btn-view">
                                                    <i class="fas fa-eye me-2"></i>View
                                                </a>
                                                <a href="{{ route('login') }}" class="login-to-buy">
                                        <i class="fas fa-shopping-cart me-2"></i>Login to Buy
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                        
                        <!-- Loading State -->
                        <div class="loading-state" id="loadingState" style="display: none;">
                            <i class="fas fa-spinner fa-spin fa-2x mb-3"></i>
                            <p>Loading products...</p>
                        </div>
                        
                        <!-- Empty State -->
                        <div class="empty-state" id="emptyState" style="display: none;">
                            <i class="fas fa-search"></i>
                            <h4>No products found</h4>
                            <p>Try adjusting your filters or search terms</p>
            </div>
            
            <!-- Pagination -->
            @if($products->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h3 class="mb-3">Ready to Start Shopping?</h3>
                    <p class="lead mb-4">Create an account to add items to your cart and enjoy personalized shopping experience</p>
                    <a href="{{ route('login') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-user-plus me-2"></i>Create Account & Start Shopping
                    </a>
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
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('login') }}">Register</a></li>
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
        // Advanced Filter System
        class ProductFilter {
            constructor() {
                this.products = document.querySelectorAll('.product-item');
                this.searchInput = document.getElementById('searchInput');
                this.categoryCheckboxes = document.querySelectorAll('.filter-option input[type="checkbox"]');
                this.minPriceInput = document.getElementById('minPrice');
                this.maxPriceInput = document.getElementById('maxPrice');
                this.priceSlider = document.getElementById('priceSlider');
                this.sortSelect = document.getElementById('sortSelect');
                this.clearFiltersBtn = document.getElementById('clearFilters');
                this.productsCount = document.getElementById('productsCount');
                this.productsContainer = document.getElementById('productsContainer');
                this.loadingState = document.getElementById('loadingState');
                this.emptyState = document.getElementById('emptyState');
                this.gridViewBtn = document.getElementById('gridView');
                this.listViewBtn = document.getElementById('listView');
                
                this.init();
            }
            
            init() {
                // Event listeners
                this.searchInput.addEventListener('input', () => this.filterProducts());
                this.categoryCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', () => this.filterProducts());
                });
                this.minPriceInput.addEventListener('input', () => this.filterProducts());
                this.maxPriceInput.addEventListener('input', () => this.filterProducts());
                this.priceSlider.addEventListener('input', () => this.updatePriceRange());
                this.sortSelect.addEventListener('change', () => this.sortProducts());
                this.clearFiltersBtn.addEventListener('click', () => this.clearAllFilters());
                this.gridViewBtn.addEventListener('click', () => this.setGridView());
                this.listViewBtn.addEventListener('click', () => this.setListView());
                
                // Initial setup
                this.updatePriceRange();
                this.animateProducts();
            }
            
            filterProducts() {
                this.showLoading();
                
                setTimeout(() => {
                    const searchTerm = this.searchInput.value.toLowerCase();
                    const selectedCategories = Array.from(this.categoryCheckboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);
                    const minPrice = parseFloat(this.minPriceInput.value) || 0;
                    const maxPrice = parseFloat(this.maxPriceInput.value) || Infinity;
                    
                    let visibleCount = 0;
                    
                    this.products.forEach(product => {
                        const productName = product.dataset.name;
                        const productPrice = parseFloat(product.dataset.price);
                        const productCategory = product.dataset.category;
                        
                        const matchesSearch = productName.includes(searchTerm);
                        const matchesCategory = selectedCategories.includes('all') || selectedCategories.includes(productCategory);
                        const matchesPrice = productPrice >= minPrice && productPrice <= maxPrice;
                        
                        if (matchesSearch && matchesCategory && matchesPrice) {
                            product.style.display = 'block';
                            product.style.animation = 'fadeInUp 0.5s ease forwards';
                            visibleCount++;
                        } else {
                            product.style.display = 'none';
                        }
                    });
                    
                    this.updateProductsCount(visibleCount);
                    this.hideLoading();
                    
                    if (visibleCount === 0) {
                        this.showEmptyState();
                    } else {
                        this.hideEmptyState();
                    }
                }, 300);
            }
            
            updatePriceRange() {
                const sliderValue = this.priceSlider.value;
                this.maxPriceInput.value = sliderValue;
                this.filterProducts();
            }
            
            sortProducts() {
                const sortBy = this.sortSelect.value;
                const container = this.productsContainer;
                const products = Array.from(this.products).filter(p => p.style.display !== 'none');
                
                products.sort((a, b) => {
                    switch(sortBy) {
                        case 'newest':
                            return 0; // Already in creation order
                        case 'oldest':
                            return 0; // Reverse would be needed
                        case 'price-low':
                            return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                        case 'price-high':
                            return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                        case 'name':
                            return a.dataset.name.localeCompare(b.dataset.name);
                        default:
                            return 0;
                    }
                });
                
                // Reorder products in DOM
                products.forEach(product => {
                    container.appendChild(product);
                });
            }
            
            clearAllFilters() {
                this.searchInput.value = '';
                this.categoryCheckboxes.forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                this.minPriceInput.value = '0';
                this.maxPriceInput.value = '1000';
                this.priceSlider.value = '1000';
                this.sortSelect.value = 'newest';
                
                this.filterProducts();
            }
            
            setGridView() {
                this.productsContainer.className = 'row';
                this.gridViewBtn.classList.add('active');
                this.listViewBtn.classList.remove('active');
                
                this.products.forEach(product => {
                    product.className = 'col-lg-4 col-md-6 mb-4 product-item';
                });
            }
            
            setListView() {
                this.productsContainer.className = 'row list-view';
                this.listViewBtn.classList.add('active');
                this.gridViewBtn.classList.remove('active');
                
                this.products.forEach(product => {
                    product.className = 'col-12 mb-3 product-item';
                });
            }
            
            updateProductsCount(count) {
                this.productsCount.textContent = count;
            }
            
            showLoading() {
                this.loadingState.style.display = 'block';
            }
            
            hideLoading() {
                this.loadingState.style.display = 'none';
            }
            
            showEmptyState() {
                this.emptyState.style.display = 'block';
            }
            
            hideEmptyState() {
                this.emptyState.style.display = 'none';
            }
            
            animateProducts() {
                this.products.forEach((product, index) => {
                    product.style.opacity = '0';
                    product.style.transform = 'translateY(30px)';
                    
                    setTimeout(() => {
                        product.style.transition = 'all 0.6s ease';
                        product.style.opacity = '1';
                        product.style.transform = 'translateY(0)';
                    }, index * 50);
                });
            }
        }
        
        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            new ProductFilter();
            
            // Add CSS animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                
                .list-view .product-card {
                    display: flex;
                    flex-direction: row;
                    height: auto;
                }
                
                .list-view .product-image {
                    width: 200px;
                    height: 150px;
                    flex-shrink: 0;
                }
                
                .list-view .product-info {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                
                .list-view .product-actions {
                    margin-top: auto;
                }
            `;
            document.head.appendChild(style);
        });
    </script>

</body>
</html>
