<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Wishlist | Male-Fashion</title>

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

        /* Wishlist Page Styles */
        .wishlist-header {
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--primary-900) 50%, var(--secondary-900) 100%);
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .wishlist-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .wishlist-header h4 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .wishlist-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            padding: 3rem 0;
        }

        .wishlist-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius-xl);
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .wishlist-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-2xl);
            border-color: var(--primary-300);
        }

        .wishlist-card__image {
            position: relative;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .wishlist-card__image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .wishlist-card:hover .wishlist-card__image img {
            transform: scale(1.05);
        }

        .wishlist-card__actions {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .wishlist-card__action {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-full);
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .wishlist-card__action:hover {
            background: var(--primary-500);
            color: white;
            transform: scale(1.1);
        }

        .wishlist-card__action.remove {
            color: var(--red-500);
        }

        .wishlist-card__action.remove:hover {
            background: var(--red-500);
            color: white;
        }

        .wishlist-card__content h5 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--gray-900);
        }

        .wishlist-card__price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-600);
            margin-bottom: 1rem;
        }

        .wishlist-card__buttons {
            display: flex;
            gap: 0.75rem;
        }

        .wishlist-card__btn {
            flex: 1;
            padding: 0.75rem 1rem;
            border-radius: var(--radius-lg);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .wishlist-card__btn--primary {
            background: var(--primary-500);
            color: white;
        }

        .wishlist-card__btn--primary:hover {
            background: var(--primary-600);
            transform: translateY(-2px);
        }

        .wishlist-card__btn--secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .wishlist-card__btn--secondary:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
        }

        .wishlist-empty {
            text-align: center;
            padding: 4rem 2rem;
        }

        .wishlist-empty__icon {
            font-size: 4rem;
            color: var(--gray-400);
            margin-bottom: 1rem;
        }

        .wishlist-empty h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 1rem;
        }

        .wishlist-empty p {
            color: var(--gray-600);
            margin-bottom: 2rem;
        }

        .wishlist-empty__btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--primary-500);
            color: white;
            text-decoration: none;
            border-radius: var(--radius-lg);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .wishlist-empty__btn:hover {
            background: var(--primary-600);
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .wishlist-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius-lg);
        }

        .wishlist-count {
            font-size: 1.1rem;
            color: var(--gray-700);
            font-weight: 600;
        }

        .wishlist-clear-btn {
            padding: 0.75rem 1.5rem;
            background: var(--red-500);
            color: white;
            border: none;
            border-radius: var(--radius-lg);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .wishlist-clear-btn:hover {
            background: var(--red-600);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .wishlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
                padding: 2rem 0;
            }

            .wishlist-header h4 {
                font-size: 2rem;
            }

            .wishlist-actions {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('partials.ultimate-navbar')

    <!-- Wishlist Header -->
    <section class="wishlist-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>My Wishlist</h4>
                    <p>Save your favorite products for later</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Wishlist Content -->
    <section class="wishlist-content spad">
        <div class="container">
            @if($wishlistItems->count() > 0)
                <!-- Wishlist Actions -->
                <div class="wishlist-actions">
                    <div class="wishlist-count">
                        <i class="fas fa-heart"></i> {{ $wishlistItems->total() }} item(s) in your wishlist
                    </div>
                    <button class="wishlist-clear-btn" onclick="clearWishlist()">
                        <i class="fas fa-trash"></i> Clear All
                    </button>
                </div>

                <!-- Wishlist Grid -->
                <div class="wishlist-grid">
                    @foreach($wishlistItems as $product)
                        <div class="wishlist-card" data-product-id="{{ $product->id }}">
                            <div class="wishlist-card__image">
                                @if($product->images->count() > 0)
                                    @php
                                        $firstImage = $product->images->first();
                                        $imagePath = $firstImage->path;
                                        $imageUrl = asset($imagePath);
                                    @endphp
                                    <img src="{{ $imageUrl }}" 
                                         alt="{{ $product->name }}" 
                                         onerror="console.log('Image failed to load: {{ $imageUrl }}'); this.src='{{ asset('img/malefashion-img/product-1.jpg') }}';"
                                         onload="console.log('Image loaded successfully: {{ $imageUrl }}');">
                                @else
                                    <img src="{{ asset('img/malefashion-img/product-1.jpg') }}" alt="{{ $product->name }}">
                                @endif
                                
                                <div class="wishlist-card__actions">
                                    <button class="wishlist-card__action remove" onclick="removeFromWishlist({{ $product->id }})" title="Remove from wishlist">
                                        <i class="fas fa-heart-broken"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="wishlist-card__content">
                                <h5>{{ $product->name }}</h5>
                                <div class="wishlist-card__price">
                                    {{ get_currency_symbol() }}{{ number_format(convert_price($product->price), 2) }}
                                </div>
                                
                                <div class="wishlist-card__buttons">
                                    <a href="{{ route('shop_detail', $product->id) }}" class="wishlist-card__btn wishlist-card__btn--primary">
                                        <i class="fas fa-eye"></i> View Details
                                    </a>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}" style="flex: 1;">
                                        @csrf
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="wishlist-card__btn wishlist-card__btn--secondary">
                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center">
                            {{ $wishlistItems->links() }}
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Wishlist -->
                <div class="wishlist-empty">
                    <div class="wishlist-empty__icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Your wishlist is empty</h3>
                    <p>Start adding products you love to your wishlist!</p>
                    <a href="{{ route('shop') }}" class="wishlist-empty__btn">
                        <i class="fas fa-shopping-bag"></i> Browse Products
                    </a>
                </div>
            @endif
        </div>
    </section>

    @include('partials.ultimate-footer')

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
        // Set CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Remove item from wishlist
        function removeFromWishlist(productId) {
            if (confirm('Are you sure you want to remove this item from your wishlist?')) {
                $.ajax({
                    url: `/user/wishlist/remove/${productId}`,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            // Remove the card from the page
                            $(`.wishlist-card[data-product-id="${productId}"]`).fadeOut(300, function() {
                                $(this).remove();
                                
                                // Check if wishlist is now empty
                                if ($('.wishlist-card').length === 0) {
                                    location.reload(); // Reload to show empty state
                                }
                            });
                            
                            // Show success message
                            showNotification('Product removed from wishlist!', 'success');
                            
                            // Update wishlist count in navbar
                            updateWishlistCount();
                        }
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        showNotification(response.message || 'Error removing item from wishlist', 'error');
                    }
                });
            }
        }

        // Clear entire wishlist
        function clearWishlist() {
            if (confirm('Are you sure you want to clear your entire wishlist? This action cannot be undone.')) {
                $.ajax({
                    url: '/wishlist/clear',
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Reload to show empty state
                            showNotification('Wishlist cleared successfully!', 'success');
                            updateWishlistCount();
                        }
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        showNotification(response.message || 'Error clearing wishlist', 'error');
                    }
                });
            }
        }

        // Update wishlist count in navbar
        function updateWishlistCount() {
            $.ajax({
                url: '/wishlist/count',
                type: 'GET',
                success: function(response) {
                    // Update wishlist count in navbar if element exists
                    const wishlistCount = $('.wishlist-count-badge');
                    if (wishlistCount.length) {
                        if (response.count > 0) {
                            wishlistCount.text(response.count).show();
                        } else {
                            wishlistCount.hide();
                        }
                    }
                }
            });
        }

        // Show notification
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

        // Initialize wishlist count on page load
        $(document).ready(function() {
            updateWishlistCount();
        });
    </script>
</body>

</html>
