<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form-enhancements.css') }}" type="text/css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-bg: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light-bg);
            color: #374151;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .sidebar-header p {
            font-size: 0.875rem;
            opacity: 0.8;
            margin: 0.25rem 0 0 0;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-right: 3px solid white;
        }

        .nav-link i {
            width: 20px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .top-navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            min-height: 80px;
        }

        .content-wrapper {
            padding: 2rem;
        }

        /* Navbar Improvements */
        .navbar-left {
            flex: 1;
        }

        .navbar-right {
            gap: 1rem;
        }

        .page-title h4 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .page-title small {
            font-size: 0.875rem;
        }

        .user-info {
            background: rgba(99, 102, 241, 0.1);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .user-details {
            line-height: 1.2;
        }

        .user-name {
            font-size: 0.95rem;
            color: var(--dark-color);
        }

        .user-role {
            font-size: 0.8rem;
            color: #6b7280;
        }

        /* Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .stat-card-body {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-info h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            color: var(--dark-color);
        }

        .stat-info p {
            color: #6b7280;
            margin: 0.25rem 0 0 0;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.users { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
        .stat-icon.products { background: linear-gradient(135deg, #10b981, #047857); }
        .stat-icon.orders { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .stat-icon.revenue { background: linear-gradient(135deg, #ef4444, #dc2626); }

        /* Tables */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        .table-card-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            background: #f8fafc;
        }

        .table-card-header h5 {
            margin: 0;
            font-weight: 600;
            color: var(--dark-color);
        }

        .table-responsive {
            border-radius: 0 0 12px 12px;
        }

        .table th {
            background: #f8fafc;
            border: none;
            font-weight: 600;
            color: var(--dark-color);
            padding: 1rem;
        }

        .table td {
            border: none;
            border-bottom: 1px solid #f3f4f6;
            padding: 1rem;
            vertical-align: middle;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background: #5856eb;
            border-color: #5856eb;
        }

        .btn-success {
            background: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-warning {
            background: var(--warning-color);
            border-color: var(--warning-color);
        }

        .btn-danger {
            background: var(--danger-color);
            border-color: var(--danger-color);
        }

        /* Badges */
        .badge {
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
        }

        /* Forms */
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-wrapper {
                padding: 1rem;
            }

            /* Mobile sidebar overlay */
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            /* Mobile navigation improvements */
            .nav-link {
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }

            .nav-link i {
                font-size: 1.2rem;
                margin-right: 1rem;
            }

            /* Mobile top navbar */
            .top-navbar {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                min-height: auto;
            }

            .navbar-left,
            .navbar-right {
                width: 100%;
                justify-content: space-between;
            }

            .page-title h4 {
                font-size: 1.25rem;
            }

            .page-title small {
                font-size: 0.8rem;
            }

            /* Mobile user info */
            .user-info {
                display: none;
            }

            .user-profile-btn {
                padding: 0.5rem;
            }

            .user-avatar {
                width: 36px;
                height: 36px;
            }

            /* Mobile dropdowns */
            .notification-dropdown-menu,
            .user-dropdown-menu {
                width: 280px;
                right: -50px;
            }
        }

        /* User Profile Dropdown */
        .user-profile-dropdown {
            position: relative;
        }

        .user-profile-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .user-profile-btn:hover {
            background: #f9fafb;
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
        }

        .user-avatar {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder {
            color: white;
            font-size: 1.25rem;
        }

        .status-indicator {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .status-indicator.online {
            background: #10b981;
        }

        .status-indicator.away {
            background: #f59e0b;
        }

        .status-indicator.offline {
            background: #6b7280;
        }

        .user-info {
            text-align: left;
        }

        .user-name {
            font-weight: 600;
            color: #111827;
            font-size: 0.875rem;
        }

        .user-role {
            color: #6b7280;
            font-size: 0.75rem;
        }

        .dropdown-arrow {
            color: #6b7280;
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .user-profile-btn.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .user-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            width: 320px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            margin-top: 8px;
        }

        .user-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            padding: 1.5rem 1.25rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 12px 12px 0 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar-large {
            width: 60px;
            height: 60px;
            min-width: 60px;
            min-height: 60px;
            flex-shrink: 0;
            border-radius: 50%;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .avatar-img-large {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder-large {
            color: white;
            font-size: 1.5rem;
        }

        .user-details {
            flex: 1;
        }

        .user-name-large {
            font-weight: 700;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }

        .user-email {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .user-role-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .dropdown-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 0;
        }

        .dropdown-section {
            padding: 0.75rem 0;
        }

        .section-title {
            padding: 0.5rem 1.25rem;
            color: #6b7280;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            color: #374151;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .dropdown-item:hover {
            background: #f9fafb;
            color: var(--primary-color);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .dropdown-footer {
            padding: 0.75rem 0;
        }

        .logout-btn {
            color: #ef4444 !important;
        }

        .logout-btn:hover {
            background: #fef2f2 !important;
            color: #dc2626 !important;
        }

        /* Alerts */
        .alert {
            border-radius: 8px;
            border: none;
            padding: 1rem 1.25rem;
        }

        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-left: 4px solid var(--danger-color);
        }

        .alert-warning {
            background: #fffbeb;
            color: #92400e;
            border-left: 4px solid var(--warning-color);
        }

        .alert-info {
            background: #eff6ff;
            color: #1e40af;
            border-left: 4px solid var(--primary-color);
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-user"></i> User Panel</h3>
            <p>Shopping Dashboard</p>
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.shop*') ? 'active' : '' }}" href="{{ route('user.shop') }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Shop</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.cart') ? 'active' : '' }}" href="{{ route('user.cart') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Cart</span>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="badge bg-danger ms-auto">{{ count(session('cart')) }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.orders*') ? 'active' : '' }}" href="{{ route('user.orders') }}">
                    <i class="fas fa-list-alt"></i>
                    <span>My Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.profile*') ? 'active' : '' }}" href="{{ route('user.profile') }}">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.about') ? 'active' : '' }}" href="{{ route('user.about') }}">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.contact') ? 'active' : '' }}" href="{{ route('user.contact') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.blog') ? 'active' : '' }}" href="{{ route('user.blog') }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
            </li>
            <hr style="border-color: rgba(255, 255, 255, 0.1); margin: 1rem 0;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>View Site</span>
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent text-start w-100" style="color: rgba(255, 255, 255, 0.8);">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <!-- Left Section -->
            <div class="navbar-left d-flex align-items-center">
                <button class="btn btn-link d-md-none me-4" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="page-title">
                    <h4 class="mb-0 text-dark">@yield('page-title', 'Dashboard')</h4>
                    <small class="text-muted">Welcome back, {{ auth()->user()->name }}</small>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="navbar-right d-flex align-items-center">
                <!-- User Profile Dropdown -->
                <div class="user-profile-dropdown">
                    <button class="user-profile-btn" id="userProfileBtn" type="button">
                        <div class="user-avatar">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="avatar-img">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                            <div class="status-indicator online"></div>
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ auth()->user()->name }}</div>
                            <div class="user-role">Customer</div>
                        </div>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </button>
                    
                    <div class="user-dropdown-menu" id="userDropdownMenu">
                        <div class="dropdown-header">
                            <div class="user-avatar-large">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="avatar-img-large">
                                @else
                                    <div class="avatar-placeholder-large">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="user-details">
                                <div class="user-name-large">{{ auth()->user()->name }}</div>
                                <div class="user-email">{{ auth()->user()->email }}</div>
                                <div class="user-role-badge">Customer</div>
                            </div>
                        </div>
                        
                        <div class="dropdown-divider"></div>
                        
                        <div class="dropdown-section">
                            <div class="section-title">Account</div>
                            <a href="{{ route('user.profile') }}" class="dropdown-item">
                                <i class="fas fa-user me-3"></i>
                                <span>My Profile</span>
                            </a>
                            <a href="{{ route('user.orders') }}" class="dropdown-item">
                                <i class="fas fa-shopping-bag me-3"></i>
                                <span>My Orders</span>
                            </a>
                            <a href="{{ route('user.cart') }}" class="dropdown-item">
                                <i class="fas fa-shopping-cart me-3"></i>
                                <span>Shopping Cart</span>
                            </a>
                        </div>
                        
                        <div class="dropdown-section">
                            <div class="section-title">Quick Actions</div>
                            <a href="{{ route('user.shop') }}" class="dropdown-item">
                                <i class="fas fa-shopping-bag me-3"></i>
                                <span>Shop Now</span>
                            </a>
                            <a href="{{ route('home') }}" class="dropdown-item" target="_blank">
                                <i class="fas fa-external-link-alt me-3"></i>
                                <span>View Site</span>
                                <i class="fas fa-external-link-alt ms-auto"></i>
                            </a>
                        </div>
                        
                        <div class="dropdown-divider"></div>
                        
                        <div class="dropdown-footer">
                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">
                                    <i class="fas fa-sign-out-alt me-3"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/form-enhancements.js') }}"></script>

    <script>
        // Enhanced Sidebar Toggle for Mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                if (sidebarOverlay) {
                    sidebarOverlay.classList.toggle('show');
                }
                document.body.classList.toggle('sidebar-open');
            });
        }

        // Close sidebar when clicking overlay
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
                document.body.classList.remove('sidebar-open');
            });
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && 
                    !sidebarToggle.contains(event.target) && 
                    sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                    if (sidebarOverlay) {
                        sidebarOverlay.classList.remove('show');
                    }
                    document.body.classList.remove('sidebar-open');
                }
            }
        });

        // Close sidebar on window resize if screen becomes larger
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('show');
                }
                document.body.classList.remove('sidebar-open');
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Enhanced Dropdown Functionality
        document.addEventListener('DOMContentLoaded', function() {
            // User Profile Dropdown
            const userProfileBtn = document.getElementById('userProfileBtn');
            const userDropdownMenu = document.getElementById('userDropdownMenu');
            
            if (userProfileBtn && userDropdownMenu) {
                userProfileBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Toggle dropdown
                    userDropdownMenu.classList.toggle('show');
                    userProfileBtn.classList.toggle('active');
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                // Close user dropdown
                if (userProfileBtn && userDropdownMenu && 
                    !userProfileBtn.contains(event.target) && 
                    !userDropdownMenu.contains(event.target)) {
                    userDropdownMenu.classList.remove('show');
                    userProfileBtn.classList.remove('active');
                }
            });

            // Close dropdowns on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (userDropdownMenu && userDropdownMenu.classList.contains('show')) {
                        userDropdownMenu.classList.remove('show');
                        userProfileBtn.classList.remove('active');
                    }
                }
            });

            // Logout confirmation
            const logoutForm = document.querySelector('.logout-form');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    if (confirm('Are you sure you want to logout?')) {
                        this.submit();
                    }
                });
            }

            // Add hover effects to dropdown items
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
