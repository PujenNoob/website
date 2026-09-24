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
    <link rel="stylesheet" href="{{asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/malefashion-css/style.css') }}" type="text/css">
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

        /* Modern Shop Page Styles */
        .shop-header {
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--primary-900) 50%, var(--secondary-900) 100%);
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .shop-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .shop-header h4 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }
        
        .main-shop-content {
            padding: 60px 0;
            background: #f8fafc;
            min-height: 80vh;
        }
        
        /* Modern Sidebar */
        .modern-sidebar {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
            position: sticky;
            top: 120px;
        }
        
        .modern-sidebar h5 {
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
        
        .filter-option input[type="checkbox"],
        .filter-option input[type="radio"] {
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
            justify-content: space-between;
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
        
        /* Modern Product Cards */
        .modern-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }
        
        .modern-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-color: #f59e0b;
        }
        
        .modern-card-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .modern-card:hover .modern-card-img {
            transform: scale(1.05);
        }
        
        .modern-card .card-body {
            padding: 1.5rem;
        }
        
        .modern-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
            line-height: 1.4;
        }
        
        .modern-card .card-text {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .modern-card .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #059669;
            margin-bottom: 1rem;
        }
        
        .modern-card .btn-view {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            color: #374151;
            padding: 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            font-weight: 500;
            margin-right: 0.5rem;
        }
        
        .modern-card .btn-view:hover {
            background: #e5e7eb;
            color: #1f2937;
            text-decoration: none;
        }
        
        .modern-card .btn-dark {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: white;
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
        
        .modern-card .btn-dark:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            color: white;
            text-decoration: none;
        }
        
        /* Quick Add Button */
        .modern-card .quick-add {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }
        
        .modern-card:hover .quick-add {
            display: block;
        }
        
        .modern-card .quick-add .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .modern-sidebar {
                position: static;
                margin-bottom: 2rem;
            }
            
            .shop-header h4 {
                font-size: 2rem;
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

    @include('partials.ultimate-navbar')

    <!-- Shop Header -->
    <section class="shop-header">
        <div class="container">
            <h4 class="mb-3">Shop Our Collection</h4>
            <p class="lead">Discover premium fashion pieces for the modern man</p>
        </div>
    </section>

    <!-- Main Shop Content -->
    <section class="main-shop-content">
        <div class="container">
            <div class="row">
                <!-- Modern Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="modern-sidebar">
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
                            @foreach($categories as $category)
                                <label class="filter-option">
                                    <input type="checkbox" value="{{ $category }}"> {{ ucfirst($category) }}
                                </label>
                            @endforeach
                        </div>
                        
                        <!-- Price Range -->
                        <div class="filter-group">
                            <h6>Price Range</h6>
                            <div class="price-range">
                                <input type="number" class="price-input" id="minPrice" placeholder="Min" value="0">
                                <input type="number" class="price-input" id="maxPrice" placeholder="Max" value="150">
                                <input type="range" class="price-slider" id="priceSlider" min="0" max="150" value="150">
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">$0</small>
                                    <small class="text-muted">$150+</small>
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
                                     data-category="{{ $product->category }}">
                                    <div class="modern-card">
                                        @if($product->images->count())
                                            <img src="{{ asset('products/' . basename($product->images->first()->path)) }}" 
                                                 class="modern-card-img" 
                                                 alt="{{ $product->name }}"
                                                 onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                        @else
                                            <div class="modern-card-img bg-light d-flex align-items-center justify-content-center">
                                                <i class="fas fa-image fa-3x text-muted"></i>
                                            </div>
                                        @endif
                                        
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <div class="product-price">
                                                {{ get_currency_symbol() }}{{ number_format(convert_price($product->price), 2) }}
                                            </div>
                                            <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                                            
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('shop_detail', $product->id) }}" class="btn-view flex-fill">
                                                    <i class="fas fa-eye me-2"></i>View
                                                </a>
                                                <form method="POST" action="{{ route('cart.add', $product->id) }}" class="flex-fill add-to-cart-form">
                                                    @csrf
                                                    <input type="hidden" name="qty" value="1">
                                                    <button type="submit" class="btn btn-dark w-100">
                                                        <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                                    </button>
                                                </form>
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
                                <nav aria-label="Shop page navigation">
                                    <ul class="pagination">
                                        @if ($products->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                        @endif

                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                            @if ($page == $products->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if ($products->hasMorePages())
                                            <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                        @else
                                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="{{asset('js/malefashion-js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.nice-select.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.countdown.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.slicknav.js') }}"></script>
    <script src="{{asset('js/malefashion-js/mixitup.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/owl.carousel.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/main.js') }}"></script>

    <script>
        // Advanced Shop Filter System
        class ShopFilter {
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
                    const maxPrice = parseFloat(this.maxPriceInput.value) || 150;
                    
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
                this.maxPriceInput.value = '150';
                this.priceSlider.value = '150';
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
            new ShopFilter();
            
            // Add to cart functionality
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const button = this.querySelector('button[type="submit"]');
                    const originalText = button.innerHTML;
                    
                    // Show loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
                    button.disabled = true;
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification('Item added to cart successfully!', 'success');
                            // Update cart count if element exists
                            updateCartCount();
                        } else {
                            showNotification(data.message || 'Error adding item to cart', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('Error adding item to cart', 'error');
                    })
                    .finally(() => {
                        // Reset button state
                        button.innerHTML = originalText;
                        button.disabled = false;
                    });
                });
            });
            
            // Add CSS animations and notification styles
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
                
                .list-view .modern-card {
                    display: flex;
                    flex-direction: row;
                    height: auto;
                }
                
                .list-view .modern-card-img {
                    width: 200px;
                    height: 150px;
                    flex-shrink: 0;
                }
                
                .list-view .card-body {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                
                .list-view .d-flex.gap-2 {
                    margin-top: auto;
                }
                
                /* Notification styles */
                .notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 15px 20px;
                    border-radius: 8px;
                    color: white;
                    font-weight: 500;
                    z-index: 9999;
                    transform: translateX(400px);
                    transition: transform 0.3s ease;
                    max-width: 300px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                }
                
                .notification.show {
                    transform: translateX(0);
                }
                
                .notification.success {
                    background: linear-gradient(135deg, #10b981, #059669);
                }
                
                .notification.error {
                    background: linear-gradient(135deg, #ef4444, #dc2626);
                }
                
                .notification i {
                    margin-right: 8px;
                }
            `;
            document.head.appendChild(style);
        });
        
        // Notification functions
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                ${message}
            `;
            
            document.body.appendChild(notification);
            
            // Show notification
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            
            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        function updateCartCount() {
            // Update cart count in navbar
            const cartCount = document.getElementById('cartCount');
            const mobileCartCount = document.getElementById('mobileCartCount');
            
            if (cartCount) {
                const currentCount = parseInt(cartCount.textContent) || 0;
                cartCount.textContent = currentCount + 1;
            }
            
            if (mobileCartCount) {
                const currentCount = parseInt(mobileCartCount.textContent) || 0;
                mobileCartCount.textContent = currentCount + 1;
            }
        }

    </script>
</body>

</html>