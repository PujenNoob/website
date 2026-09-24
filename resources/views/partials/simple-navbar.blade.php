<!-- Simple Navbar - Clean Implementation -->
<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-lg-3 col-md-3 col-6">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/malefashion-img/logo.png') }}" alt="Male Fashion Logo" class="img-fluid" style="max-height: 50px;">
                    </a>
                </div>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="col-lg-6 col-md-6 d-none d-lg-block">
                <nav class="header__menu">
                    <ul class="mb-0 d-flex justify-content-center">
                        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ Route::currentRouteName() == 'shop' ? 'active' : '' }}"><a href="{{ route('shop') }}">Browse Products</a></li>
                        <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                        <li class="{{ Route::currentRouteName() == 'blog' ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="{{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}"><a href="{{ route('contacts') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            
            <!-- Right Side Elements -->
            <div class="col-lg-3 col-md-3 col-6">
                <div class="navbar-right d-flex align-items-center justify-content-end">
                    <!-- Currency Dropdown -->
                    <div class="currency-dropdown me-3 d-none d-lg-block">
                        <form method="POST" action="{{ route('currency.change') }}" id="currency-form">
                            @csrf
                            <select name="currency" id="currency-select" onchange="document.getElementById('currency-form').submit()" class="form-select form-select-sm">
                                <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            </select>
                        </form>
                    </div>
                    
                    <!-- Shopping Cart -->
                    @if(auth()->check())
                        <a href="{{ route('shopping-cart') }}" class="cart-icon me-3 d-none d-lg-block" id="cartIcon">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count" id="cartCount">{{ array_sum(session('cart', [])) }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="cart-icon me-3 d-none d-lg-block" id="cartIcon" title="Login to access cart">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count" id="cartCount">0</span>
                        </a>
                    @endif
                    
                    <!-- User Account/Login -->
                    @if(auth()->check())
                        <div class="dropdown d-none d-lg-block">
                            <div class="user-avatar" id="navbarAccountDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ substr(e(auth()->user()->name), 0, 1) }}
                            </div>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarAccountDropdown">
                                @if(auth()->user()->role === 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-shield me-2"></i>Admin Dashboard
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fas fa-user me-2"></i>My Profile
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn d-none d-lg-block">
                            <i class="fas fa-user me-2"></i>Login to Shop
                        </a>
                    @endif
                    
                    <!-- Mobile Hamburger -->
                    <button class="btn btn-link p-2 d-lg-none" id="mobile-menu-toggle" type="button">
                        <i class="fas fa-bars" style="font-size: 1.2rem; color: #333;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu d-lg-none" id="mobile-menu">
        <div class="container">
            <nav class="mobile-nav">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('home') }}" class="mobile-nav-link">Home</a></li>
                    <li><a href="{{ route('shop') }}" class="mobile-nav-link">Browse Products</a></li>
                    <li><a href="{{ route('about') }}" class="mobile-nav-link">About</a></li>
                    <li><a href="{{ route('blog') }}" class="mobile-nav-link">Blog</a></li>
                    <li><a href="{{ route('contacts') }}" class="mobile-nav-link">Contact</a></li>
                </ul>
                <div class="mobile-nav-actions mt-3">
                    <!-- Mobile Currency -->
                    <div class="mb-3">
                        <form method="POST" action="{{ route('currency.change') }}" id="mobile-currency-form">
                            @csrf
                            <select name="currency" id="mobile-currency-select" onchange="document.getElementById('mobile-currency-form').submit()" class="form-select w-100">
                                <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                            </select>
                        </form>
                    </div>
                    
                    <!-- Mobile Cart -->
                    @if(auth()->check())
                        <a href="{{ route('shopping-cart') }}" class="btn btn-outline-success w-100 mb-2">
                            <i class="fas fa-shopping-cart me-2"></i>Shopping Cart 
                            <span class="badge bg-success ms-2" id="mobileCartCount">{{ array_sum(session('cart', [])) }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success w-100 mb-2" title="Login to access cart">
                            <i class="fas fa-shopping-cart me-2"></i>Shopping Cart 
                            <span class="badge bg-success ms-2" id="mobileCartCount">0</span>
                        </a>
                    @endif
                    
                    <!-- Mobile User Account -->
                    @if(auth()->check())
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu w-100">
                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-shield me-2"></i>Admin Dashboard
                                    </a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fas fa-user me-2"></i>My Profile
                                    </a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">
                            <i class="fas fa-user me-2"></i>Login to Shop
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</header>

<style>
/* Simple Navbar Styles */
.header {
    background: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 0 !important;
    margin: 0 !important;
}

.header .container {
    padding: 10px 15px !important;
    margin: 0 !important;
}

.header .row {
    margin: 0 !important;
    padding: 0 !important;
    min-height: 50px;
    align-items: center;
}

.navbar-right {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-end !important;
    gap: 1rem;
}

/* Currency Dropdown */
.currency-dropdown select {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    padding: 6px 12px;
    font-size: 14px;
    color: #374151;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 80px;
}

.currency-dropdown select:hover {
    border-color: #f59e0b;
    box-shadow: 0 0 0 1px #f59e0b;
}

.currency-dropdown select:focus {
    outline: none;
    border-color: #f59e0b;
    box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.2);
}

/* Cart Icon */
.cart-icon {
    position: relative;
    color: #374151;
    text-decoration: none;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    padding: 0.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cart-icon:hover {
    color: #f59e0b;
    background-color: rgba(245, 158, 11, 0.1);
    text-decoration: none;
    transform: scale(1.1);
}

.cart-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    min-width: 20px;
}

.cart-count:empty {
    display: none;
}

/* Login Button */
.login-btn {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.login-btn:hover {
    background: linear-gradient(135deg, #d97706, #b45309);
    color: white;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}

/* User Avatar */
.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.user-avatar:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}

/* Mobile Menu */
.mobile-menu {
    display: none;
    background: white;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border-radius: 0 0 12px 12px;
    padding: 1rem 0;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 1000;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(-10px);
}

.mobile-menu.active {
    display: block;
    max-height: 500px;
    opacity: 1;
    transform: translateY(0);
}

.mobile-nav-link {
    display: block;
    padding: 12px 20px;
    color: #374151;
    text-decoration: none;
    transition: all 0.3s ease;
    border-bottom: 1px solid #f3f4f6;
}

.mobile-nav-link:hover {
    background-color: #f9fafb;
    color: #f59e0b;
    text-decoration: none;
}

.mobile-nav-actions {
    padding: 0 20px;
}

/* Mobile Hamburger */
#mobile-menu-toggle {
    border: none !important;
    background: none !important;
    color: #333;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    padding: 8px !important;
    margin: 0 !important;
    outline: none !important;
    box-shadow: none !important;
}

#mobile-menu-toggle:hover {
    color: #f59e0b;
    transform: scale(1.1);
    background: none !important;
    border: none !important;
}

#mobile-menu-toggle:focus {
    outline: none !important;
    box-shadow: none !important;
    background: none !important;
    border: none !important;
}

#mobile-menu-toggle.active {
    color: #f59e0b;
}

/* Force mobile menu to work */
@media (max-width: 991px) {
    .mobile-menu {
        display: none !important;
    }
    
    .mobile-menu.active {
        display: block !important;
    }
    
    .navbar-right {
        gap: 0.5rem;
    }
    
    .header .container {
        padding: 8px 15px !important;
    }
    
    .header .row {
        min-height: 45px;
    }
}

@media (max-width: 768px) {
    .header .container {
        padding: 5px 15px !important;
    }
    
    .header .row {
        min-height: 40px;
    }
    
    .header__logo img {
        max-height: 35px;
    }
    
    .navbar-right {
        gap: 0.25rem;
    }
}

/* Override any conflicting styles */
.header {
    margin: 0 !important;
    padding: 0 !important;
}

.header .container {
    margin: 0 !important;
}

.header .row {
    margin: 0 !important;
    padding: 0 !important;
}
</style>

<script>
// Mobile menu functionality - works on all pages
function initMobileMenu() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuToggle && mobileMenu) {
        // Remove any existing event listeners
        mobileMenuToggle.replaceWith(mobileMenuToggle.cloneNode(true));
        const newToggle = document.getElementById('mobile-menu-toggle');
        
        // Add click event
        newToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            mobileMenu.classList.toggle('active');
            newToggle.classList.toggle('active');
            
            const icon = newToggle.querySelector('i');
            if (icon) {
                if (mobileMenu.classList.contains('active')) {
                    icon.className = 'fas fa-times';
                } else {
                    icon.className = 'fas fa-bars';
                }
            }
        });
        
        // Close on link click
        const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                newToggle.classList.remove('active');
                const icon = newToggle.querySelector('i');
                if (icon) {
                    icon.className = 'fas fa-bars';
                }
            });
        });
        
        // Close on outside click
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !newToggle.contains(event.target)) {
                mobileMenu.classList.remove('active');
                newToggle.classList.remove('active');
                const icon = newToggle.querySelector('i');
                if (icon) {
                    icon.className = 'fas fa-bars';
                }
            }
        });
    }
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
} else {
    initMobileMenu();
}

// Also initialize after a short delay to ensure everything is loaded
setTimeout(initMobileMenu, 100);
</script>
