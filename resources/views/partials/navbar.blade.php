<!-- resources/views/partials/navbar.blade.php - Updated: {{ now() }} -->
<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-6">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/malefashion-img/logo.png') }}" alt="Male Fashion Logo" class="img-fluid" style="max-height: 50px;">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 d-none d-lg-block">
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
            <div class="col-lg-4 col-md-4 col-6 d-flex justify-content-end align-items-center">
                <div class="header__nav__option d-flex align-items-center">
                    <!-- Desktop Currency Dropdown - Hidden on mobile -->
                    <div class="header__currency__dropdown me-1 d-none d-lg-block">
                        <form method="POST" action="{{ route('currency.change') }}" id="currency-form">
                            @csrf
                            <select name="currency" id="currency-select" onchange="document.getElementById('currency-form').submit()" class="form-select form-select-sm" style="width: auto; min-width: 60px; font-size: 0.8rem; padding: 2px 6px;">
                                <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            </select>
                        </form>
                    </div>
                    
                    <!-- Desktop Shopping Cart Icon - Hidden on mobile -->
                    @if(auth()->check())
                        <a href="{{ route('shopping-cart') }}" class="cart-icon me-1 d-none d-lg-block" id="cartIcon">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count" id="cartCount">{{ array_sum(session('cart', [])) }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="cart-icon me-1 d-none d-lg-block" id="cartIcon" title="Login to access cart">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count" id="cartCount">0</span>
                        </a>
                    @endif
                    
                    <!-- Desktop User Account/Login - Hidden on mobile -->
                    @if(auth()->check())
                        <div class="user-dropdown d-none d-lg-block">
                            <div class="user-avatar" id="userAvatar" role="button" title="{{ auth()->user()->name }}">
                                @if(auth()->user()->avatar && file_exists(public_path(auth()->user()->avatar)))
                                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Profile Picture" class="avatar-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <span class="avatar-initial" style="display: none;">{{ substr(e(auth()->user()->name), 0, 1) }}</span>
                                @else
                                    <span class="avatar-initial">{{ substr(e(auth()->user()->name), 0, 1) }}</span>
                                @endif
                            </div>
                            <div class="user-dropdown-menu" id="userDropdownMenu">
                                @if(auth()->user()->role === 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-shield me-2"></i>Admin Dashboard
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('user.profile.show') }}">
                                    <i class="fas fa-user me-2"></i>My Profile
                                </a>
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
                    
                    <!-- Mobile Hamburger Menu - Only visible on mobile -->
                    <button class="btn btn-link p-2 d-lg-none" id="mobile-menu-toggle" type="button" style="border: none; background: none; cursor: pointer;">
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
                    <!-- Mobile Currency Dropdown -->
                    <div class="mb-3">
                        <form method="POST" action="{{ route('currency.change') }}" id="mobile-currency-form">
                            @csrf
                            <select name="currency" id="mobile-currency-select" onchange="document.getElementById('mobile-currency-form').submit()" class="form-select w-100">
                                <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                            </select>
                        </form>
                    </div>
                    
                    <!-- Mobile Cart Button - Visible to all users -->
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
                    
                    @if(auth()->check())
                        <!-- User Account Dropdown -->
                        <div class="mobile-user-dropdown">
                            <button class="btn btn-outline-primary w-100" type="button" id="mobileUserButton" title="{{ auth()->user()->name }}">
                                @if(auth()->user()->avatar && file_exists(public_path(auth()->user()->avatar)))
                                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Profile Picture" class="mobile-avatar-image me-2" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">
                                    <i class="fas fa-user me-2" style="display: none;"></i>
                                @else
                                    <i class="fas fa-user me-2"></i>
                                @endif
                                {{ auth()->user()->name }}
                            </button>
                            <div class="mobile-user-dropdown-menu" id="mobileUserDropdownMenu">
                                @if(auth()->user()->role === 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-shield me-2"></i>Admin Dashboard
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('user.profile.show') }}">
                                    <i class="fas fa-user me-2"></i>My Profile
                                </a>
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
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">
                            <i class="fas fa-user me-2"></i>Login to Shop
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</header>

<script>
(function() {
    'use strict';
    
    // Wait for DOM to be ready
    function initNavbar() {
        console.log('Initializing navbar...');
        
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        console.log('Mobile menu toggle:', mobileMenuToggle);
        console.log('Mobile menu:', mobileMenu);
        
        // Desktop User Dropdown Functionality
        const userAvatar = document.getElementById('userAvatar');
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        
        if (userAvatar && userDropdownMenu) {
            // Remove any existing event listeners to prevent duplicates
            userAvatar.removeEventListener('click', handleUserAvatarClick);
            userAvatar.addEventListener('click', handleUserAvatarClick);
            
            function handleUserAvatarClick(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Toggle dropdown visibility
                userDropdownMenu.classList.toggle('show');
                
                // Add visual feedback
                userAvatar.classList.toggle('active');
            }
            
            // Close dropdown when clicking outside
            function handleOutsideClick(event) {
                if (!userAvatar.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                    userDropdownMenu.classList.remove('show');
                    userAvatar.classList.remove('active');
                }
            }
            
            // Remove existing listener and add new one
            document.removeEventListener('click', handleOutsideClick);
            document.addEventListener('click', handleOutsideClick);
            
            // Close dropdown when pressing Escape
            function handleEscapeKey(e) {
                if (e.key === 'Escape' && userDropdownMenu.classList.contains('show')) {
                    userDropdownMenu.classList.remove('show');
                    userAvatar.classList.remove('active');
                    userAvatar.focus();
                }
            }
            
            document.removeEventListener('keydown', handleEscapeKey);
            document.addEventListener('keydown', handleEscapeKey);
        }
        
        // Mobile User Dropdown Functionality
        const mobileUserButton = document.getElementById('mobileUserButton');
        const mobileUserDropdownMenu = document.getElementById('mobileUserDropdownMenu');
        
        if (mobileUserButton && mobileUserDropdownMenu) {
            // Remove any existing event listeners to prevent duplicates
            mobileUserButton.removeEventListener('click', handleMobileUserClick);
            mobileUserButton.addEventListener('click', handleMobileUserClick);
            
            function handleMobileUserClick(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Toggle dropdown visibility
                mobileUserDropdownMenu.classList.toggle('show');
                
                // Add visual feedback
                mobileUserButton.classList.toggle('active');
            }
            
            // Close dropdown when clicking outside
            function handleMobileOutsideClick(event) {
                if (!mobileUserButton.contains(event.target) && !mobileUserDropdownMenu.contains(event.target)) {
                    mobileUserDropdownMenu.classList.remove('show');
                    mobileUserButton.classList.remove('active');
                }
            }
            
            // Remove existing listener and add new one
            document.removeEventListener('click', handleMobileOutsideClick);
            document.addEventListener('click', handleMobileOutsideClick);
            
            // Close dropdown when pressing Escape
            function handleMobileEscapeKey(e) {
                if (e.key === 'Escape' && mobileUserDropdownMenu.classList.contains('show')) {
                    mobileUserDropdownMenu.classList.remove('show');
                    mobileUserButton.classList.remove('active');
                    mobileUserButton.focus();
                }
            }
            
            document.removeEventListener('keydown', handleMobileEscapeKey);
            document.addEventListener('keydown', handleMobileEscapeKey);
        }
    
        // Mobile Menu Functionality
        if (mobileMenuToggle && mobileMenu) {
            console.log('Mobile menu elements found, adding event listeners');
            
            // Test if button is clickable
            mobileMenuToggle.style.pointerEvents = 'auto';
            mobileMenuToggle.style.zIndex = '9999';
            
            mobileMenuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                console.log('Mobile menu toggle clicked');
                
                // Toggle the active class on mobile menu
                mobileMenu.classList.toggle('active');
                
                // Toggle the active class on the button for visual feedback
                mobileMenuToggle.classList.toggle('active');
                
                // Change icon from bars to X when open
                const icon = mobileMenuToggle.querySelector('i');
                if (mobileMenu.classList.contains('active')) {
                    icon.className = 'fas fa-times';
                    console.log('Mobile menu opened');
                } else {
                    icon.className = 'fas fa-bars';
                    console.log('Mobile menu closed');
                }
            });
            
            // Also add a simple test click handler
            mobileMenuToggle.addEventListener('mousedown', function() {
                console.log('Mobile menu button mousedown detected');
            });
            
            // Close mobile menu when clicking on a link
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    const icon = mobileMenuToggle.querySelector('i');
                    icon.className = 'fas fa-bars';
                });
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                    mobileMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    const icon = mobileMenuToggle.querySelector('i');
                    icon.className = 'fas fa-bars';
                }
            });
        } else {
            console.log('Mobile menu elements not found!');
            console.log('Toggle element:', mobileMenuToggle);
            console.log('Menu element:', mobileMenu);
        }
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initNavbar);
    } else {
        initNavbar();
    }
    
    // Also try to initialize after a short delay to ensure all scripts are loaded
    setTimeout(function() {
        console.log('Delayed initialization attempt...');
        initNavbar();
    }, 1000);
    
    // Re-initialize if elements are dynamically added
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                // Check if navbar elements were added
                if (document.getElementById('userAvatar') || document.getElementById('mobileUserButton')) {
                    initNavbar();
                }
            }
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
})();
</script>

<style>
/* Enhanced button reliability and visual feedback */
.user-avatar.active {
    background: linear-gradient(135deg, #ffe9b3 0%, #bfa980 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(191, 169, 128, 0.4);
}

.mobile-user-dropdown .btn.active {
    background: linear-gradient(135deg, #ffe9b3 0%, #bfa980 100%);
    border-color: #bfa980;
    transform: translateY(-1px);
}

/* Ensure buttons are always clickable */
.user-avatar, .mobile-user-dropdown .btn {
    cursor: pointer;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

/* Prevent button text selection */
.user-avatar *, .mobile-user-dropdown .btn * {
    pointer-events: none;
}

/* Ensure dropdown items are clickable */
.dropdown-item {
    cursor: pointer;
    user-select: none;
}

/* Fix for form buttons in dropdowns */
.dropdown-item button {
    cursor: pointer;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    padding: 0;
    margin: 0;
}

/* Ensure login button is always clickable */
.login-btn {
    cursor: pointer;
    user-select: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.login-btn:hover {
    text-decoration: none;
}

/* Prevent any interference with button clicks */
.user-dropdown, .mobile-user-dropdown {
    position: relative;
    z-index: 1000;
}

.user-dropdown-menu, .mobile-user-dropdown-menu {
    z-index: 1001;
}

/* Mobile Menu Styles */
.mobile-menu {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-top: 1px solid #e9ecef;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-100%);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
}

.mobile-menu.active {
    transform: translateY(0);
    opacity: 1;
    visibility: visible;
}

.mobile-nav ul {
    padding: 1rem 0;
}

.mobile-nav ul li {
    border-bottom: 1px solid #f8f9fa;
}

.mobile-nav ul li:last-child {
    border-bottom: none;
}

.mobile-nav-link {
    display: block;
    padding: 1rem 1.5rem;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.mobile-nav-link:hover {
    background-color: #f8f9fa;
    color: var(--primary-color, #007bff);
    text-decoration: none;
}

.mobile-nav-actions {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e9ecef;
    background-color: #f8f9fa;
}

/* Mobile menu toggle button styles */
#mobile-menu-toggle {
    transition: all 0.3s ease;
    position: relative;
    z-index: 9999;
    pointer-events: auto;
    min-width: 44px;
    min-height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
}

#mobile-menu-toggle:hover {
    background-color: #f8f9fa !important;
    border-radius: 4px;
}

#mobile-menu-toggle.active {
    background-color: #e9ecef !important;
}

#mobile-menu-toggle i {
    pointer-events: none;
}

/* Ensure mobile menu is hidden on larger screens */
@media (min-width: 992px) {
    .mobile-menu {
        display: none !important;
    }
}

/* Fix navbar spacing and prevent overlapping */
.header__nav__option {
    gap: 0.25rem;
    flex-wrap: nowrap;
    justify-content: flex-end;
}

.header__currency__dropdown {
    flex-shrink: 0;
    min-width: 60px;
    max-width: 65px;
}

.header__currency__dropdown select {
    min-width: 60px;
    max-width: 65px;
    font-size: 0.75rem;
    padding: 2px 4px;
    height: 28px;
    line-height: 1.2;
}

.cart-icon {
    flex-shrink: 0;
    min-width: 35px;
    padding: 4px;
}

.user-dropdown {
    flex-shrink: 0;
    min-width: 35px;
}

/* Ensure proper spacing on different screen sizes */
@media (min-width: 1200px) {
    .header__nav__option {
        gap: 0.5rem;
    }
    
    .header__currency__dropdown select {
        min-width: 65px;
        font-size: 0.8rem;
    }
}

@media (max-width: 1199px) and (min-width: 992px) {
    .header__nav__option {
        gap: 0.25rem;
    }
    
    .header__currency__dropdown select {
        min-width: 60px;
        font-size: 0.75rem;
        padding: 2px 4px;
        height: 26px;
    }
}

/* Extra tight spacing for smaller desktop screens */
@media (max-width: 1100px) and (min-width: 992px) {
    .header__nav__option {
        gap: 0.15rem;
    }
    
    .header__currency__dropdown select {
        min-width: 55px;
        font-size: 0.7rem;
        padding: 1px 3px;
        height: 24px;
    }
    
    .cart-icon {
        min-width: 30px;
        padding: 2px;
    }
}
</style> 