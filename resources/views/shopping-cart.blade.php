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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subtotal = 0; @endphp
                                @forelse($cartItems as $item)
                                    @php
                                        $product = $item['product'];
                                        $quantity = $item['quantity'];
                                        $price = $product->price;
                                        $total = $price * $quantity;
                                        $subtotal += $total;
                                    @endphp
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                @if($product->images->count())
                                                    <img src="{{ asset('products/' . basename($product->images->first()->path)) }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit: cover;" class="img-fluid">
                                                @else
                                                    <img src="https://via.placeholder.com/80x80?text=No+Image" alt="No image" class="img-fluid">
                                                @endif
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $product->name }}</h6>
                                                <h5>{{ get_currency_symbol() }}{{ number_format(convert_price($price), 2) }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="number" class="cart-qty-input quantity-input" data-id="{{ $item['id'] }}" value="{{ $quantity }}" min="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ get_currency_symbol() }} {{ number_format(convert_price($total), 2) }}</td>
                                        <td class="cart__close">
                                            <form method="POST" action="{{ route('cart.remove', $item['id']) }}" class="remove-item-form" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-remove-item" aria-label="Remove item" style="background: none; border: none; color: #e74c3c; cursor: pointer; font-size: 18px;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('shop') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>{{ get_currency_symbol() }} {{ number_format(convert_price($subtotal), 2) }}</span></li>
                            <li>Total <span>{{ get_currency_symbol() }} {{ number_format(convert_price($subtotal), 2) }}</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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
        // Handle cart item removal with AJAX
        document.addEventListener('DOMContentLoaded', function() {
            const removeForms = document.querySelectorAll('.remove-item-form');
            
            removeForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Show confirmation dialog
                    if (!confirm('Are you sure you want to remove this item from your cart?')) {
                        return;
                    }
                    
                    const button = this.querySelector('.btn-remove-item');
                    const originalContent = button.innerHTML;
                    
                    // Show loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    button.disabled = true;
                    
                    // Get CSRF token
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    console.log('Removing item from cart:', this.action);
                    console.log('CSRF Token:', token);
                    console.log('Form element:', this);
                    
                    // Make AJAX request using XMLHttpRequest for better compatibility
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', this.action, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    const formData = '_token=' + encodeURIComponent(token) + '&_method=DELETE';
                    
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                try {
                                    const data = JSON.parse(xhr.responseText);
                                    if (data.success) {
                                        // Show success message
                                        showNotification('Item removed from cart successfully!', 'success');
                                        
                                        // Remove the table row
                                        const row = form.closest('tr');
                                        row.style.opacity = '0.5';
                                        row.style.transition = 'opacity 0.3s ease';
                                        
                                        setTimeout(() => {
                                            row.remove();
                                            
                                            // Check if cart is empty
                                            const tbody = document.querySelector('tbody');
                                            if (tbody.children.length === 1 && tbody.children[0].textContent.includes('empty')) {
                                                // Cart is already empty, reload page to show empty state
                                                window.location.reload();
                                            } else {
                                                // Update cart totals and counts
                                                updateCartTotals();
                                            }
                                        }, 300);
                                    } else {
                                        showNotification(data.message || 'Failed to remove item from cart', 'error');
                                        // Restore button state
                                        button.innerHTML = originalContent;
                                        button.disabled = false;
                                    }
                                } catch (e) {
                                    console.error('JSON Parse Error:', e);
                                    showNotification('Invalid response from server', 'error');
                                    // Restore button state
                                    button.innerHTML = originalContent;
                                    button.disabled = false;
                                }
                            } else {
                                console.error('HTTP Error:', xhr.status, xhr.statusText);
                                showNotification('Server error: ' + xhr.status + ' ' + xhr.statusText, 'error');
                                
                                // Fallback: submit form normally
                                console.log('Falling back to normal form submission');
                                form.removeEventListener('submit', arguments.callee);
                                form.submit();
                            }
                        }
                    };
                    
                    xhr.send(formData);
                });
            });
        });
        
        // Initialize subtotal on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateSubtotal();
        });
        
        function updateCartTotals() {
            // Update cart count in navbar
            const cartCount = document.getElementById('cartCount');
            const mobileCartCount = document.getElementById('mobileCartCount');
            
            if (cartCount) {
                const currentCount = parseInt(cartCount.textContent) || 0;
                cartCount.textContent = Math.max(0, currentCount - 1);
            }
            
            if (mobileCartCount) {
                const currentCount = parseInt(mobileCartCount.textContent) || 0;
                mobileCartCount.textContent = Math.max(0, currentCount - 1);
            }
            
            // Update subtotal and total
            updateSubtotal();
        }
        
        function updateSubtotal() {
            // Calculate new subtotal from remaining items
            let newSubtotal = 0;
            const tbody = document.querySelector('tbody');
            
            if (tbody) {
                const rows = tbody.querySelectorAll('tr');
                rows.forEach(row => {
                    // Skip empty state row
                    if (row.textContent.includes('empty') || row.textContent.includes('No items')) {
                        return;
                    }
                    
                    const priceCell = row.querySelector('.cart__price');
                    if (priceCell) {
                        // Extract price from text, handling various currency formats
                        const priceText = priceCell.textContent.trim();
                        // Remove currency symbols and extract numbers
                        const priceMatch = priceText.match(/[\d,]+\.?\d*/);
                        if (priceMatch) {
                            const price = parseFloat(priceMatch[0].replace(/,/g, '')) || 0;
                            newSubtotal += price;
                        }
                    }
                });
            }
            
            // Update subtotal display
            const subtotalElements = document.querySelectorAll('.cart__total ul li');
            subtotalElements.forEach(element => {
                const text = element.textContent.toLowerCase();
                if (text.includes('subtotal')) {
                    const span = element.querySelector('span');
                    if (span) {
                        span.textContent = `{{ get_currency_symbol() }} ${newSubtotal.toFixed(2)}`;
                    }
                } else if (text.includes('total') && !text.includes('subtotal')) {
                    const span = element.querySelector('span');
                    if (span) {
                        span.textContent = `{{ get_currency_symbol() }} ${newSubtotal.toFixed(2)}`;
                    }
                }
            });
            
            // If cart is empty, show empty state
            if (newSubtotal === 0) {
                const tbody = document.querySelector('tbody');
                if (tbody && tbody.children.length > 0) {
                    // Check if there's already an empty state row
                    const emptyRow = tbody.querySelector('tr td[colspan]');
                    if (!emptyRow) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="empty-cart">
                                        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">Your cart is empty</h5>
                                        <p class="text-muted">Add some items to get started!</p>
                                        <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
                                    </div>
                                </td>
                            </tr>
                        `;
                    }
                }
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

/* Remove button hover effects */
.btn-remove-item:hover {
    color: #c0392b !important;
    transform: scale(1.1);
    transition: all 0.2s ease;
}

.btn-remove-item:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
</body>

</html>