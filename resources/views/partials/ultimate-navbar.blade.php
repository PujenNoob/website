<!-- Ultimate Navbar - Bug-Free & Perfect -->
<header class="ultimate-header" id="ultimate-header">
    <div class="ultimate-header__container">
        <div class="ultimate-header__content">
            <!-- Ultimate Logo -->
            <a href="{{ route('home') }}" class="ultimate-header__logo">
                <div class="ultimate-header__logo-icon">
                    <i class="fas fa-store"></i>
                </div>
                <span>MaleFashion</span>
            </a>

            <!-- Ultimate Desktop Navigation -->
            <nav class="ultimate-header__nav">
                <ul class="ultimate-header__nav-list">
                    <li class="ultimate-header__nav-item">
                        <a href="{{ route('home') }}" class="ultimate-header__nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="ultimate-header__nav-item">
                        <a href="{{ route('shop') }}" class="ultimate-header__nav-link {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                            <i class="fas fa-shopping-bag"></i>
                            <span>Shop</span>
                        </a>
                    </li>
                    <li class="ultimate-header__nav-item">
                        <a href="{{ route('about') }}" class="ultimate-header__nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li class="ultimate-header__nav-item">
                        <a href="{{ route('blog') }}" class="ultimate-header__nav-link {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="ultimate-header__nav-item">
                        <a href="{{ route('contacts') }}" class="ultimate-header__nav-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Ultimate Action Buttons -->
            <div class="ultimate-header__actions">
                <!-- Ultimate Currency Selector -->
                <div class="ultimate-header__currency">
                    <form method="POST" action="{{ route('currency.change') }}" id="currency-form">
                        @csrf
                        <select name="currency" id="currency-select" onchange="document.getElementById('currency-form').submit()" class="ultimate-header__currency-select">
                            <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ session('currency', 'USD') == 'GBP' ? 'selected' : '' }}>GBP</option>
                            <option value="JPY" {{ session('currency', 'USD') == 'JPY' ? 'selected' : '' }}>JPY</option>
                        </select>
                    </form>
                </div>

                <!-- Ultimate Shopping Cart -->
                @if(auth()->check())
                    <a href="{{ route('shopping-cart') }}" class="ultimate-header__cart" title="Shopping Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="ultimate-header__cart-badge" id="cartCount">{{ array_sum(session('cart', [])) }}</span>
                    </a>
                    
                    <!-- Ultimate Wishlist -->
                    <a href="{{ route('wishlist') }}" class="ultimate-header__wishlist" title="Wishlist">
                        <i class="fas fa-heart"></i>
                        <span class="ultimate-header__wishlist-badge wishlist-count-badge" style="display: none;">0</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="ultimate-header__cart" title="Login to access cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="ultimate-header__cart-badge">0</span>
                    </a>
                    
                    <a href="{{ route('login') }}" class="ultimate-header__wishlist" title="Login to access wishlist">
                        <i class="fas fa-heart"></i>
                        <span class="ultimate-header__wishlist-badge">0</span>
                    </a>
                @endif

                <!-- Ultimate User Account -->
                @if(auth()->check())
                    <div class="ultimate-header__user">
                        <button class="ultimate-header__user-toggle" id="userDropdownToggle">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar" class="ultimate-header__user-avatar">
                            @else
                                <div class="ultimate-header__user-avatar" style="background: linear-gradient(135deg, var(--primary-500), var(--secondary-500)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1rem;">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span>{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>

                        <!-- Ultimate User Dropdown -->
                        <div class="ultimate-header__user-dropdown" id="userDropdown">
                            <div class="ultimate-header__user-dropdown-content">
                                <div class="ultimate-header__user-dropdown-header">
                                    <div class="ultimate-header__user-dropdown-avatar">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar">
                                        @else
                                            <div style="background: linear-gradient(135deg, var(--primary-500), var(--secondary-500)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; width: 100%; height: 100%; border-radius: 50%; font-size: 1.25rem;">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ultimate-header__user-dropdown-info">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p>{{ auth()->user()->email }}</p>
                                        <div class="ultimate-header__user-status">
                                            <span class="ultimate-header__user-status-dot"></span>
                                            <span>Online</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ultimate-header__user-dropdown-divider"></div>
                                <div class="ultimate-header__user-dropdown-menu">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.dashboard') }}" class="ultimate-header__user-dropdown-item">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>Admin Dashboard</span>
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('user.profile.show') }}" class="ultimate-header__user-dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('shopping-cart') }}" class="ultimate-header__user-dropdown-item">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>My Cart</span>
                                        <span class="ultimate-header__user-dropdown-badge">{{ array_sum(session('cart', [])) }}</span>
                                    </a>
                                    <a href="{{ route('wishlist') }}" class="ultimate-header__user-dropdown-item">
                                        <i class="fas fa-heart"></i>
                                        <span>Wishlist</span>
                                        <span class="ultimate-header__user-dropdown-badge wishlist-count-badge" style="display: none;">0</span>
                                    </a>
                                    <a href="#" class="ultimate-header__user-dropdown-item">
                                        <i class="fas fa-box"></i>
                                        <span>My Orders</span>
                                    </a>
                                    <a href="#" class="ultimate-header__user-dropdown-item">
                                        <i class="fas fa-cog"></i>
                                        <span>Settings</span>
                                    </a>
                                    <div class="ultimate-header__user-dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}" class="ultimate-header__user-dropdown-item">
                                        @csrf
                                        <button type="submit" class="ultimate-header__user-dropdown-logout">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="ultimate-header__login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                @endif

                <!-- Ultimate Mobile Menu Toggle -->
                <button class="ultimate-header__mobile-toggle" id="mobileMenuToggle" style="display: flex !important; visibility: visible !important; opacity: 1 !important; position: relative !important; z-index: 9999 !important; min-width: 44px !important; min-height: 44px !important;">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Ultimate Mobile Menu -->
    <div class="ultimate-header__mobile-menu" id="mobileMenu">
        <div class="ultimate-header__mobile-menu-content">
            <!-- Mobile Navigation Links -->
            <nav class="ultimate-header__mobile-nav">
                <a href="{{ route('home') }}" class="ultimate-header__mobile-nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="{{ route('shop') }}" class="ultimate-header__mobile-nav-link {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Shop</span>
                </a>
                <a href="{{ route('about') }}" class="ultimate-header__mobile-nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
                <a href="{{ route('blog') }}" class="ultimate-header__mobile-nav-link {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
                <a href="{{ route('contacts') }}" class="ultimate-header__mobile-nav-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
            </nav>

            <!-- Mobile Actions Section -->
            <div class="ultimate-header__mobile-actions">
                <!-- Currency Selector -->
                <div class="ultimate-header__mobile-currency">
                    <label for="mobile-currency-select" class="ultimate-header__mobile-currency-label">Currency</label>
                    <form method="POST" action="{{ route('currency.change') }}" id="mobile-currency-form">
                        @csrf
                        <select name="currency" id="mobile-currency-select" onchange="document.getElementById('mobile-currency-form').submit()" class="ultimate-header__mobile-currency-select">
                            <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ session('currency', 'USD') == 'GBP' ? 'selected' : '' }}>GBP</option>
                            <option value="JPY" {{ session('currency', 'USD') == 'JPY' ? 'selected' : '' }}>JPY</option>
                        </select>
                    </form>
                </div>

                <!-- User Actions -->
                <div class="ultimate-header__mobile-user-actions">
                    @if(auth()->check())
                        <a href="{{ route('shopping-cart') }}" class="ultimate-header__mobile-action-btn ultimate-header__mobile-action-btn--primary">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Shopping Cart</span>
                            <span class="ultimate-header__mobile-action-badge">{{ array_sum(session('cart', [])) }}</span>
                        </a>
                        <a href="{{ route('wishlist') }}" class="ultimate-header__mobile-action-btn ultimate-header__mobile-action-btn--secondary">
                            <i class="fas fa-heart"></i>
                            <span>Wishlist</span>
                            <span class="ultimate-header__mobile-action-badge wishlist-count-badge" style="display: none;">0</span>
                        </a>
                        <a href="{{ route('user.profile.show') }}" class="ultimate-header__mobile-action-btn ultimate-header__mobile-action-btn--outline">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="ultimate-header__mobile-logout-form">
                            @csrf
                            <button type="submit" class="ultimate-header__mobile-action-btn ultimate-header__mobile-action-btn--danger">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="ultimate-header__mobile-action-btn ultimate-header__mobile-action-btn--primary">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="ultimate-header__mobile-action-btn ultimate-header__mobile-action-btn--outline">
                            <i class="fas fa-user-plus"></i>
                            <span>Register</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Ultimate User Dropdown Styles -->
<style>
.ultimate-header__user-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: var(--space-3);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: var(--glass-backdrop);
    -webkit-backdrop-filter: var(--glass-backdrop);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-3xl);
    box-shadow: var(--shadow-2xl);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-20px) scale(0.95);
    transition: all var(--transition-all);
    z-index: var(--z-dropdown);
    min-width: 320px;
    overflow: hidden;
}

.ultimate-header__user-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

.ultimate-header__user-dropdown-content {
    padding: var(--space-6);
}

.ultimate-header__user-dropdown-header {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    margin-bottom: var(--space-6);
    padding: var(--space-4);
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.05), rgba(217, 70, 239, 0.05));
    border-radius: var(--radius-2xl);
}

.ultimate-header__user-dropdown-avatar {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-full);
    overflow: hidden;
    border: 3px solid var(--glass-border);
    box-shadow: var(--shadow-md);
}

.ultimate-header__user-dropdown-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.ultimate-header__user-dropdown-info h4 {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0 0 var(--space-1) 0;
}

.ultimate-header__user-dropdown-info p {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0 0 var(--space-2) 0;
}

.ultimate-header__user-status {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: 0.75rem;
    color: var(--success);
    font-weight: 600;
}

.ultimate-header__user-status-dot {
    width: 8px;
    height: 8px;
    background: var(--success);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

.ultimate-header__user-dropdown-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gray-200), transparent);
    margin: var(--space-4) 0;
}

.ultimate-header__user-dropdown-menu {
    display: flex;
    flex-direction: column;
    gap: var(--space-1);
}

.ultimate-header__user-dropdown-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-4);
    color: var(--gray-700);
    text-decoration: none;
    border-radius: var(--radius-xl);
    transition: all var(--transition-fast);
    font-weight: 500;
    position: relative;
    overflow: hidden;
}

.ultimate-header__user-dropdown-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: var(--radius-xl);
}

.ultimate-header__user-dropdown-item:hover::before {
    opacity: 0.1;
}

.ultimate-header__user-dropdown-item:hover {
    color: var(--primary-600);
    text-decoration: none;
    transform: translateX(8px);
}

.ultimate-header__user-dropdown-item i:first-child {
    width: 20px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.ultimate-header__user-dropdown-item span {
    flex: 1;
    position: relative;
    z-index: 1;
}

.ultimate-header__user-dropdown-badge {
    background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
    color: white;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: var(--radius-full);
    min-width: 20px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.ultimate-header__user-dropdown-logout {
    background: none;
    border: none;
    color: var(--error);
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-4);
    border-radius: var(--radius-xl);
    transition: all var(--transition-fast);
    width: 100%;
    text-align: left;
    position: relative;
    overflow: hidden;
}

.ultimate-header__user-dropdown-logout::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(239, 68, 68, 0.1);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: var(--radius-xl);
}

.ultimate-header__user-dropdown-logout:hover::before {
    opacity: 1;
}

.ultimate-header__user-dropdown-logout:hover {
    color: var(--error);
    transform: translateX(8px);
}

.ultimate-header__user-dropdown-logout i {
    width: 20px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.ultimate-header__user-dropdown-logout span {
    position: relative;
    z-index: 1;
}

.ultimate-header__mobile-actions {
    padding: var(--space-6);
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.05), rgba(217, 70, 239, 0.05));
    border-radius: var(--radius-2xl);
    margin-top: var(--space-6);
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
    /* iPhone X support */
    padding-left: env(safe-area-inset-left, 0px);
    padding-right: env(safe-area-inset-right, 0px);
    padding-bottom: calc(var(--space-6) + env(safe-area-inset-bottom, 0px));
}

.ultimate-header__mobile-currency {
    margin-bottom: var(--space-4);
}

.ultimate-header__mobile-currency .form-select {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-xl);
    padding: var(--space-3);
    font-weight: 500;
    color: var(--gray-700);
    backdrop-filter: var(--glass-backdrop);
    -webkit-backdrop-filter: var(--glass-backdrop);
}

.ultimate-header__mobile-nav-link.active {
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(217, 70, 239, 0.1));
    color: var(--primary-600);
    transform: translateX(8px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .ultimate-header__user-dropdown {
        min-width: 280px;
        right: -20px;
    }
}
</style>

<!-- Ultimate JavaScript for Navbar -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('ultimate-header');
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdown = document.getElementById('userDropdown');

    // EMERGENCY FIX - Force mobile toggle visibility
    function forceMobileToggleVisibility() {
        if (mobileToggle) {
            const isMobile = window.innerWidth <= 1024;
            console.log('Screen width:', window.innerWidth, 'Is mobile:', isMobile);
            
            if (isMobile) {
                // Force visibility with multiple methods
                mobileToggle.style.display = 'flex';
                mobileToggle.style.visibility = 'visible';
                mobileToggle.style.opacity = '1';
                mobileToggle.style.position = 'relative';
                mobileToggle.style.zIndex = '9999';
                mobileToggle.style.width = 'auto';
                mobileToggle.style.height = 'auto';
                mobileToggle.style.minWidth = '44px';
                mobileToggle.style.minHeight = '44px';
                
                // Remove any conflicting classes
                mobileToggle.classList.remove('hidden', 'd-none');
                
                console.log('Mobile toggle FORCED to be visible');
            } else {
                mobileToggle.style.display = 'none';
                console.log('Mobile toggle hidden on desktop');
            }
        } else {
            console.log('ERROR: Mobile toggle element not found!');
        }
    }

    // Force visibility immediately
    forceMobileToggleVisibility();
    
    // Check on load and resize
    window.addEventListener('resize', forceMobileToggleVisibility);
    window.addEventListener('load', forceMobileToggleVisibility);
    
    // Also check after a short delay to override any other scripts
    setTimeout(forceMobileToggleVisibility, 100);
    setTimeout(forceMobileToggleVisibility, 500);
    setTimeout(forceMobileToggleVisibility, 1000);

    // Ultimate header scroll effect
    let lastScrollY = window.scrollY;
    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScrollY = currentScrollY;
    });

    // Ultimate mobile menu toggle - Enhanced for better UX
    if (mobileToggle && mobileMenu) {
        let isMenuOpen = false;
        let scrollPosition = 0;
        
        // Simple menu toggle function
        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                // Store current scroll position
                scrollPosition = window.pageYOffset;
                
                // Add active classes
                mobileToggle.classList.add('active');
                mobileMenu.classList.add('active');
                
                // Prevent body scroll
                document.body.style.position = 'fixed';
                document.body.style.top = `-${scrollPosition}px`;
                document.body.style.width = '100%';
                document.body.style.overflow = 'hidden';
            } else {
                // Remove active classes
                mobileToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                
                // Restore body scroll
                document.body.style.position = '';
                document.body.style.top = '';
                document.body.style.width = '';
                document.body.style.overflow = '';
                
                // Restore scroll position
                window.scrollTo(0, scrollPosition);
            }
        }
        
        // EMERGENCY FIX - Simple event handling
        mobileToggle.addEventListener('click', function(e) {
            console.log('Mobile toggle clicked!');
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });

        // Also add touch event for mobile
        mobileToggle.addEventListener('touchstart', function(e) {
            console.log('Mobile toggle touched!');
            e.preventDefault();
            e.stopPropagation();
            toggleMenu();
        });

        // Force the button to be clickable
        mobileToggle.style.pointerEvents = 'auto';
        mobileToggle.style.cursor = 'pointer';

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (isMenuOpen && 
                !mobileToggle.contains(e.target) && 
                !mobileMenu.contains(e.target)) {
                toggleMenu();
            }
        });

        // Close mobile menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMenu();
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024 && isMenuOpen) {
                toggleMenu();
            }
        });
        
        // Handle orientation change
        window.addEventListener('orientationchange', function() {
            setTimeout(function() {
                if (isMenuOpen) {
                    toggleMenu();
                }
            }, 100);
        });
    }

    // Ultimate user dropdown toggle
    if (userDropdownToggle && userDropdown) {
        userDropdownToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userDropdownToggle.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.remove('active');
            }
        });
    }

    // Close mobile menu when clicking on a link
    const mobileNavLinks = document.querySelectorAll('.ultimate-header__mobile-nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Enhanced close menu with proper scroll restoration
            const toggle = document.getElementById('mobileMenuToggle');
            const menu = document.getElementById('mobileMenu');
            if (toggle && menu && isMenuOpen) {
                toggleMenu();
            }
        });
    });
    
    // Close mobile menu when clicking on action buttons
    const mobileActionBtns = document.querySelectorAll('.ultimate-header__mobile-action-btn');
    mobileActionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (isMenuOpen) {
                toggleMenu();
            }
        });
    });

    // Ultimate hover effects for navigation links
    const navLinks = document.querySelectorAll('.ultimate-header__nav-link');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'translateY(0)';
            }
        });
    });

    // Ultimate cart badge animation
    const cartBadge = document.querySelector('.ultimate-header__cart-badge');
    if (cartBadge) {
        cartBadge.addEventListener('animationiteration', function() {
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = 'pulse 2s infinite';
            }, 100);
        });
    }
});
</script>
