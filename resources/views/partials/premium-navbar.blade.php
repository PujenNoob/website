<!-- Premium Navbar - World-Class Design -->
<header class="premium-header" id="premium-header">
    <div class="premium-header__container">
        <div class="premium-header__content">
            <!-- Premium Logo -->
            <a href="{{ route('home') }}" class="premium-header__logo">
                <div class="premium-header__logo-icon">
                    <i class="fas fa-store"></i>
                </div>
                <span>MaleFashion</span>
            </a>

            <!-- Premium Desktop Navigation -->
            <nav class="premium-header__nav">
                <ul class="premium-header__nav-list">
                    <li class="premium-header__nav-item">
                        <a href="{{ route('home') }}" class="premium-header__nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="premium-header__nav-item">
                        <a href="{{ route('shop') }}" class="premium-header__nav-link {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                            <i class="fas fa-shopping-bag"></i>
                            <span>Shop</span>
                        </a>
                    </li>
                    <li class="premium-header__nav-item">
                        <a href="{{ route('about') }}" class="premium-header__nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li class="premium-header__nav-item">
                        <a href="{{ route('blog') }}" class="premium-header__nav-link {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="premium-header__nav-item">
                        <a href="{{ route('contacts') }}" class="premium-header__nav-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Premium Action Buttons -->
            <div class="premium-header__actions">
                <!-- Premium Currency Selector -->
                <div class="premium-header__currency">
                    <form method="POST" action="{{ route('currency.change') }}" id="currency-form">
                        @csrf
                        <select name="currency" id="currency-select" onchange="document.getElementById('currency-form').submit()" class="premium-header__currency-select">
                            <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ session('currency', 'USD') == 'GBP' ? 'selected' : '' }}>GBP</option>
                            <option value="JPY" {{ session('currency', 'USD') == 'JPY' ? 'selected' : '' }}>JPY</option>
                        </select>
                    </form>
                </div>

                <!-- Premium Shopping Cart -->
                @if(auth()->check())
                    <a href="{{ route('shopping-cart') }}" class="premium-header__cart" title="Shopping Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="premium-header__cart-badge" id="cartCount">{{ array_sum(session('cart', [])) }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="premium-header__cart" title="Login to access cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="premium-header__cart-badge">0</span>
                    </a>
                @endif

                <!-- Premium User Account -->
                @if(auth()->check())
                    <div class="premium-header__user">
                        <button class="premium-header__user-toggle" id="userDropdownToggle">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar" class="premium-header__user-avatar">
                            @else
                                <div class="premium-header__user-avatar" style="background: linear-gradient(135deg, var(--primary-500), var(--secondary-500)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1rem;">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span>{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>

                        <!-- Premium User Dropdown -->
                        <div class="premium-header__user-dropdown" id="userDropdown">
                            <div class="premium-header__user-dropdown-content">
                                <div class="premium-header__user-dropdown-header">
                                    <div class="premium-header__user-dropdown-avatar">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar">
                                        @else
                                            <div style="background: linear-gradient(135deg, var(--primary-500), var(--secondary-500)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; width: 100%; height: 100%; border-radius: 50%; font-size: 1.25rem;">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="premium-header__user-dropdown-info">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p>{{ auth()->user()->email }}</p>
                                        <div class="premium-header__user-status">
                                            <span class="premium-header__user-status-dot"></span>
                                            <span>Online</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="premium-header__user-dropdown-divider"></div>
                                <div class="premium-header__user-dropdown-menu">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.dashboard') }}" class="premium-header__user-dropdown-item">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>Admin Dashboard</span>
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('user.profile.show') }}" class="premium-header__user-dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('shopping-cart') }}" class="premium-header__user-dropdown-item">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>My Cart</span>
                                        <span class="premium-header__user-dropdown-badge">{{ array_sum(session('cart', [])) }}</span>
                                    </a>
                                    <a href="#" class="premium-header__user-dropdown-item">
                                        <i class="fas fa-heart"></i>
                                        <span>Wishlist</span>
                                        <span class="premium-header__user-dropdown-badge">12</span>
                                    </a>
                                    <a href="#" class="premium-header__user-dropdown-item">
                                        <i class="fas fa-box"></i>
                                        <span>My Orders</span>
                                    </a>
                                    <a href="#" class="premium-header__user-dropdown-item">
                                        <i class="fas fa-cog"></i>
                                        <span>Settings</span>
                                    </a>
                                    <div class="premium-header__user-dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}" class="premium-header__user-dropdown-item">
                                        @csrf
                                        <button type="submit" class="premium-header__user-dropdown-logout">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="premium-header__login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                @endif

                <!-- Premium Mobile Menu Toggle -->
                <button class="premium-header__mobile-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Premium Mobile Menu -->
    <div class="premium-header__mobile-menu" id="mobileMenu">
        <ul class="premium-header__mobile-nav">
            <li>
                <a href="{{ route('home') }}" class="premium-header__mobile-nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('shop') }}" class="premium-header__mobile-nav-link {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Shop</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="premium-header__mobile-nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blog') }}" class="premium-header__mobile-nav-link {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li>
                <a href="{{ route('contacts') }}" class="premium-header__mobile-nav-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>
            <li>
                <div class="premium-header__mobile-actions">
                    <div class="premium-header__mobile-currency">
                        <form method="POST" action="{{ route('currency.change') }}" id="mobile-currency-form">
                            @csrf
                            <select name="currency" id="mobile-currency-select" onchange="document.getElementById('mobile-currency-form').submit()" class="form-select">
                                <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                <option value="GBP" {{ session('currency', 'USD') == 'GBP' ? 'selected' : '' }}>GBP</option>
                                <option value="JPY" {{ session('currency', 'USD') == 'JPY' ? 'selected' : '' }}>JPY</option>
                            </select>
                        </form>
                    </div>
                    @if(auth()->check())
                        <a href="{{ route('shopping-cart') }}" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Shopping Cart ({{ array_sum(session('cart', [])) }})</span>
                        </a>
                        <a href="{{ route('user.profile.show') }}" class="btn btn-outline-primary w-100 mb-3">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-user-plus"></i>
                            <span>Register</span>
                        </a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</header>

<!-- Premium User Dropdown Styles -->
<style>
.premium-header__user-dropdown {
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

.premium-header__user-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

.premium-header__user-dropdown-content {
    padding: var(--space-6);
}

.premium-header__user-dropdown-header {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    margin-bottom: var(--space-6);
    padding: var(--space-4);
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.05), rgba(217, 70, 239, 0.05));
    border-radius: var(--radius-2xl);
}

.premium-header__user-dropdown-avatar {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-full);
    overflow: hidden;
    border: 3px solid var(--glass-border);
    box-shadow: var(--shadow-md);
}

.premium-header__user-dropdown-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.premium-header__user-dropdown-info h4 {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0 0 var(--space-1) 0;
}

.premium-header__user-dropdown-info p {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0 0 var(--space-2) 0;
}

.premium-header__user-status {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: 0.75rem;
    color: var(--success);
    font-weight: 600;
}

.premium-header__user-status-dot {
    width: 8px;
    height: 8px;
    background: var(--success);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

.premium-header__user-dropdown-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gray-200), transparent);
    margin: var(--space-4) 0;
}

.premium-header__user-dropdown-menu {
    display: flex;
    flex-direction: column;
    gap: var(--space-1);
}

.premium-header__user-dropdown-item {
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

.premium-header__user-dropdown-item::before {
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

.premium-header__user-dropdown-item:hover::before {
    opacity: 0.1;
}

.premium-header__user-dropdown-item:hover {
    color: var(--primary-600);
    text-decoration: none;
    transform: translateX(8px);
}

.premium-header__user-dropdown-item i:first-child {
    width: 20px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.premium-header__user-dropdown-item span {
    flex: 1;
    position: relative;
    z-index: 1;
}

.premium-header__user-dropdown-badge {
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

.premium-header__user-dropdown-logout {
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

.premium-header__user-dropdown-logout::before {
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

.premium-header__user-dropdown-logout:hover::before {
    opacity: 1;
}

.premium-header__user-dropdown-logout:hover {
    color: var(--error);
    transform: translateX(8px);
}

.premium-header__user-dropdown-logout i {
    width: 20px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.premium-header__user-dropdown-logout span {
    position: relative;
    z-index: 1;
}

.premium-header__mobile-actions {
    padding: var(--space-6);
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.05), rgba(217, 70, 239, 0.05));
    border-radius: var(--radius-2xl);
    margin-top: var(--space-6);
}

.premium-header__mobile-currency {
    margin-bottom: var(--space-4);
}

.premium-header__mobile-currency .form-select {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-xl);
    padding: var(--space-3);
    font-weight: 500;
    color: var(--gray-700);
    backdrop-filter: var(--glass-backdrop);
    -webkit-backdrop-filter: var(--glass-backdrop);
}

.premium-header__mobile-nav-link.active {
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(217, 70, 239, 0.1));
    color: var(--primary-600);
    transform: translateX(8px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .premium-header__user-dropdown {
        min-width: 280px;
        right: -20px;
    }
}
</style>

<!-- Premium JavaScript for Navbar -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('premium-header');
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdown = document.getElementById('userDropdown');

    // Premium header scroll effect
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

    // Premium mobile menu toggle
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', () => {
            mobileToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
            }
        });
    }

    // Premium user dropdown toggle
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
    const mobileNavLinks = document.querySelectorAll('.premium-header__mobile-nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileToggle.classList.remove('active');
            mobileMenu.classList.remove('active');
        });
    });

    // Premium hover effects for navigation links
    const navLinks = document.querySelectorAll('.premium-header__nav-link');
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

    // Premium cart badge animation
    const cartBadge = document.querySelector('.premium-header__cart-badge');
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
