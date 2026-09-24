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

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <!-- Modern Product Gallery -->
                    <div class="product-gallery">
                        @if($product->images->count())
                            <img id="mainProductImage" src="{{ asset('products/' . basename($product->images->first()->path)) }}" class="img-fluid mb-3 rounded shadow" alt="{{ $product->name }}" style="max-height: 400px; object-fit: contain; background: #fafafa;">
                            @if($product->images->count() > 1)
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    @foreach($product->images as $image)
                                        <img src="{{ asset('products/' . basename($image->path)) }}" class="img-thumbnail product-thumb img-fluid" style="width: 70px; height: 70px; object-fit: cover; cursor: pointer; border: 2px solid #eee;" onclick="document.getElementById('mainProductImage').src=this.src" alt="{{ $product->name }}">
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <img src="https://via.placeholder.com/500x400?text=No+Image" class="img-fluid mb-3 rounded shadow" alt="No image">
                        @endif
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2 class="display-5 font-weight-bold mb-2">{{ $product->name }}</h2>
                    <h4 class="text-primary mb-3">{{ get_currency_symbol() }}{{ number_format(convert_price($product->price), 2) }}</h4>
                    <p class="mb-4">{{ $product->description }}</p>
                    <div class="d-flex align-items-center mb-3" style="gap: 1.5rem;">
                        <form class="d-flex align-items-center add-to-cart-form" method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <input type="number" min="1" value="1" name="qty" class="form-control w-auto mr-2 quantity-input" style="max-width: 80px;" readonly>
                            <button class="btn btn-lg btn-dark px-4 shadow-sm" type="submit"><i class="fas fa-shopping-cart mr-2"></i>Add to Cart</button>
                        </form>
                        <button class="btn btn-lg btn-outline-danger px-4 shadow-sm wishlist-btn" onclick="toggleWishlist({{ $product->id }})" title="Add to Wishlist" data-product-id="{{ $product->id }}">
                            <i class="fas fa-heart mr-2"></i>Wishlist
                        </button>
                    </div>
                    <a href="{{ route('shop') }}" class="btn btn-outline-secondary mt-2">Back to Shop</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/product-1.jpg') }}">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                    <li><a href="#"><img src="{{ asset('img/malefashion-img/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Piqué Biker Jacket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active black" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                                <label class="grey" for="pc-3">
                                    <input type="radio" id="pc-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/product-2.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Piqué Biker Jacket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/product-3.jpg') }}">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Multi-pocket Chest Bag</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$43.48</h5>
                            <div class="product__color__select">
                                <label for="pc-7">
                                    <input type="radio" id="pc-7">
                                </label>
                                <label class="active black" for="pc-8">
                                    <input type="radio" id="pc-8">
                                </label>
                                <label class="grey" for="pc-9">
                                    <input type="radio" id="pc-9">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/malefashion-img/product-4.jpg') }}">
                            <ul class="product__hover">
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('img/malefashion-img/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Diagonal Textured Cap</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$60.9</h5>
                            <div class="product__color__select">
                                <label for="pc-10">
                                    <input type="radio" id="pc-10">
                                </label>
                                <label class="active black" for="pc-11">
                                    <input type="radio" id="pc-11">
                                </label>
                                <label class="grey" for="pc-12">
                                    <input type="radio" id="pc-12">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Section End -->

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
    <script src="{{ asset('js/malefashion-js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/main.js') }}"></script>
    
    <script>
        // Add to cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartForm = document.querySelector('.add-to-cart-form');
            
            if (addToCartForm) {
                addToCartForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const button = this.querySelector('button[type="submit"]');
                    const originalContent = button.innerHTML;
                    
                    // Show loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Adding...';
                    button.disabled = true;
                    
                    // Get form data
                    const formData = new FormData(this);
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    // Make AJAX request
                    fetch(this.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification('Item added to cart successfully!', 'success');
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
                        // Restore button state
                        button.innerHTML = originalContent;
                        button.disabled = false;
                    });
                });
            }
        });
        
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
        
        function showNotification(message, type) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.textContent = message;
            
            // Style the notification
            Object.assign(notification.style, {
                position: 'fixed',
                top: '20px',
                right: '20px',
                padding: '15px 20px',
                borderRadius: '5px',
                color: 'white',
                fontWeight: '500',
                zIndex: '10000',
                maxWidth: '300px',
                wordWrap: 'break-word',
                boxShadow: '0 4px 12px rgba(0, 0, 0, 0.15)',
                transform: 'translateX(100%)',
                transition: 'transform 0.3s ease'
            });
            
            // Set background color based on type
            if (type === 'success') {
                notification.style.backgroundColor = '#10b981';
            } else if (type === 'error') {
                notification.style.backgroundColor = '#ef4444';
            }
            
            // Add to page
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        // Wishlist functionality
        function toggleWishlist(productId) {
            $.ajax({
                url: `/wishlist/toggle/${productId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Update button appearance
                        const button = $(`.wishlist-btn[data-product-id="${productId}"]`);
                        const icon = button.find('i');
                        
                        if (response.message.includes('added')) {
                            icon.removeClass('far').addClass('fas');
                            button.removeClass('btn-outline-danger').addClass('btn-danger');
                            showNotification('Product added to wishlist!', 'success');
                        } else {
                            icon.removeClass('fas').addClass('far');
                            button.removeClass('btn-danger').addClass('btn-outline-danger');
                            showNotification('Product removed from wishlist!', 'info');
                        }
                        
                        // Update wishlist count in navbar
                        updateWishlistCount();
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    if (xhr.status === 401 && response.redirect) {
                        // Redirect to login if not authenticated
                        window.location.href = response.redirect;
                    } else {
                        showNotification(response.message || 'Error updating wishlist', 'error');
                    }
                }
            });
        }

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
                },
                error: function(xhr) {
                    // Hide wishlist count if not authenticated
                    const wishlistCount = $('.wishlist-count-badge');
                    if (wishlistCount.length) {
                        wishlistCount.hide();
                    }
                }
            });
        }

        // Initialize wishlist count on page load
        $(document).ready(function() {
            updateWishlistCount();
        });
    </script>
    
    <style>
/* Hide number input spinners for all browsers */
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] {
  -moz-appearance: textfield; /* Firefox */
}
</style>
</body>

</html>