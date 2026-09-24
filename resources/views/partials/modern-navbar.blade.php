<!-- Modern Navbar with Glassmorphism Design -->
<header class="header" id="modern-header">
    <div class="header__container">
        <div class="header__content">
            <!-- Modern Logo -->
            <a href="{{ route('home') }}" class="header__logo">
                <div class="header__logo-icon">
                    <i class="fas fa-store"></i>
                </div>
                <span>MaleFashion</span>
            </a>

            <!-- Modern Desktop Navigation -->
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item">
                        <a href="{{ route('home') }}" class="header__nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="header__nav-item">
                        <a href="{{ route('shop') }}" class="header__nav-link {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                            <i class="fas fa-shopping-bag"></i>
                            <span>Shop</span>
                        </a>
                    </li>
                    <li class="header__nav-item">
                        <a href="{{ route('about') }}" class="header__nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li class="header__nav-item">
                        <a href="{{ route('blog') }}" class="header__nav-link {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="header__nav-item">
                        <a href="{{ route('contacts') }}" class="header__nav-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Modern Action Buttons -->
            <div class="header__actions">
                <!-- Currency Selector -->
                <div class="header__currency">
                    <form method="POST" action="{{ route('currency.change') }}" id="currency-form">
                        @csrf
                        <select name="currency" id="currency-select" onchange="document.getElementById('currency-form').submit()" class="header__currency-select">
                            <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ session('currency', 'USD') == 'GBP' ? 'selected' : '' }}>GBP</option>
                        </select>
                    </form>
                </div>

                <!-- Shopping Cart -->
                @if(auth()->check())
                    <a href="{{ route('shopping-cart') }}" class="header__cart" title="Shopping Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="header__cart-badge" id="cartCount">{{ array_sum(session('cart', [])) }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="header__cart" title="Login to access cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="header__cart-badge">0</span>
                    </a>
                @endif

                <!-- User Account -->
                @if(auth()->check())
                    <div class="header__user">
                        <button class="header__user-toggle" id="userDropdownToggle">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar" class="header__user-avatar">
                            @else
                                <div class="header__user-avatar" style="background: linear-gradient(135deg, var(--primary-500), var(--secondary-500)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span>{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>

                        <!-- Modern User Dropdown -->
                        <div class="header__user-dropdown" id="userDropdown">
                            <div class="header__user-dropdown-content">
                                <div class="header__user-dropdown-header">
                                    <div class="header__user-dropdown-avatar">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar">
                                        @else
                                            <div style="background: linear-gradient(135deg, var(--primary-500), var(--secondary-500)); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; width: 100%; height: 100%; border-radius: 50%;">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="header__user-dropdown-info">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p>{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <div class="header__user-dropdown-divider"></div>
                                <div class="header__user-dropdown-menu">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('admin.dashboard') }}" class="header__user-dropdown-item">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>Admin Dashboard</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('user.profile.show') }}" class="header__user-dropdown-item">
                                        <i class="fas fa-user"></i>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('shopping-cart') }}" class="header__user-dropdown-item">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>My Cart</span>
                                    </a>
                                    <a href="#" class="header__user-dropdown-item">
                                        <i class="fas fa-heart"></i>
                                        <span>Wishlist</span>
                                    </a>
                                    <a href="#" class="header__user-dropdown-item">
                                        <i class="fas fa-box"></i>
                                        <span>My Orders</span>
                                    </a>
                                    <div class="header__user-dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}" class="header__user-dropdown-item">
                                        @csrf
                                        <button type="submit" class="header__user-dropdown-logout">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="header__login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                @endif

                <!-- Mobile Menu Toggle -->
                <button class="header__mobile-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Modern Mobile Menu -->
    <div class="header__mobile-menu" id="mobileMenu">
        <ul class="header__mobile-nav">
            <li>
                <a href="{{ route('home') }}" class="header__mobile-nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('shop') }}" class="header__mobile-nav-link {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Shop</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="header__mobile-nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blog') }}" class="header__mobile-nav-link {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li>
                <a href="{{ route('contacts') }}" class="header__mobile-nav-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>
            <li>
                <div class="header__mobile-actions">
                    <div class="header__mobile-currency">
                        <form method="POST" action="{{ route('currency.change') }}" id="mobile-currency-form">
                            @csrf
                            <select name="currency" id="mobile-currency-select" onchange="document.getElementById('mobile-currency-form').submit()" class="form-select">
                                <option value="USD" {{ session('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="EUR" {{ session('currency', 'USD') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                <option value="GBP" {{ session('currency', 'USD') == 'GBP' ? 'selected' : '' }}>GBP</option>
                            </select>
                        </form>
                    </div>
                    @if(auth()->check())
                        <a href="{{ route('shopping-cart') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Shopping Cart ({{ array_sum(session('cart', [])) }})</span>
                        </a>
                        <a href="{{ route('user.profile.show') }}" class="btn btn-outline-primary w-100 mb-2">
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
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">
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

<!-- Modern JavaScript for Navbar -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('modern-header');
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdown = document.getElementById('userDropdown');

    // Header scroll effect
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

    // Mobile menu toggle
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

    // User dropdown toggle
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
    const mobileNavLinks = document.querySelectorAll('.header__mobile-nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileToggle.classList.remove('active');
            mobileMenu.classList.remove('active');
        });
    });
});
</script>

<!-- Modern User Dropdown Styles -->
<style>
.header__user-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: var(--space-2);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: var(--glass-backdrop);
    -webkit-backdrop-filter: var(--glass-backdrop);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all var(--transition-fast);
    z-index: 1000;
    min-width: 280px;
}

.header__user-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.header__user-dropdown-content {
    padding: var(--space-4);
}

.header__user-dropdown-header {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    margin-bottom: var(--space-4);
}

.header__user-dropdown-avatar {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-full);
    overflow: hidden;
    border: 2px solid var(--glass-border);
}

.header__user-dropdown-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.header__user-dropdown-info h4 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-900);
    margin: 0 0 var(--space-1) 0;
}

.header__user-dropdown-info p {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0;
}

.header__user-dropdown-divider {
    height: 1px;
    background: var(--gray-200);
    margin: var(--space-3) 0;
}

.header__user-dropdown-menu {
    display: flex;
    flex-direction: column;
    gap: var(--space-1);
}

.header__user-dropdown-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    color: var(--gray-700);
    text-decoration: none;
    border-radius: var(--radius-lg);
    transition: all var(--transition-fast);
    font-weight: 500;
}

.header__user-dropdown-item:hover {
    background: rgba(14, 165, 233, 0.1);
    color: var(--primary-600);
    text-decoration: none;
}

.header__user-dropdown-item i {
    width: 16px;
    text-align: center;
}

.header__user-dropdown-logout {
    background: none;
    border: none;
    color: var(--error);
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    border-radius: var(--radius-lg);
    transition: all var(--transition-fast);
    width: 100%;
    text-align: left;
}

.header__user-dropdown-logout:hover {
    background: rgba(239, 68, 68, 0.1);
    color: var(--error);
}

.header__mobile-actions {
    padding: var(--space-4);
    background: rgba(14, 165, 233, 0.05);
    border-radius: var(--radius-lg);
    margin-top: var(--space-4);
}

.header__mobile-currency {
    margin-bottom: var(--space-4);
}

.header__mobile-currency .form-select {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-lg);
    padding: var(--space-3);
    font-weight: 500;
    color: var(--gray-700);
}

.header__mobile-nav-link.active {
    background: rgba(14, 165, 233, 0.1);
    color: var(--primary-600);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .header__user-dropdown {
        min-width: 260px;
        right: -20px;
    }
}
</style>
