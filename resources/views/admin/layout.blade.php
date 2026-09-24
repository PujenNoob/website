<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
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

            .user-info {
                padding: 0.5rem 0.75rem;
            }

            .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }

            .page-title h4 {
                font-size: 1.25rem;
            }
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

            /* Mobile cards */
            .stat-card-body {
                padding: 1rem;
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .stat-info h3 {
                font-size: 1.5rem;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }

            /* Mobile tables */
            .table-responsive {
                font-size: 0.875rem;
            }

            .table th,
            .table td {
                padding: 0.5rem;
            }

            /* Mobile forms */
            .form-control,
            .form-select {
                font-size: 16px; /* Prevents zoom on iOS */
            }

            /* Mobile buttons */
            .btn {
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }

            /* Mobile badges */
            .badge {
                font-size: 0.7rem;
                padding: 0.4rem 0.6rem;
            }
        }

        /* Tablet Responsive */
        @media (min-width: 769px) and (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }

            .main-content {
                margin-left: 240px;
            }

            .content-wrapper {
                padding: 1.5rem;
            }

            .stat-card-body {
                padding: 1.25rem;
            }

            .stat-info h3 {
                font-size: 1.75rem;
            }

            .stat-icon {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }
        }

        /* Small Mobile Responsive */
        @media (max-width: 480px) {
            .content-wrapper {
                padding: 0.75rem;
            }

            .top-navbar {
                padding: 0.75rem;
            }

            .page-title h4 {
                font-size: 1.1rem;
            }

            .stat-card-body {
                padding: 0.75rem;
            }

            .stat-info h3 {
                font-size: 1.25rem;
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .table th,
            .table td {
                padding: 0.25rem;
                font-size: 0.8rem;
            }

            .btn {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }

            .notification-dropdown-menu,
            .user-dropdown-menu {
                width: 260px;
                right: -30px;
            }

            /* Small mobile dropdown avatar fixes */
            .user-dropdown-menu .user-avatar-large {
                width: 45px;
                height: 45px;
                min-width: 45px;
                min-height: 45px;
            }

            .user-dropdown-menu .avatar-placeholder-large {
                font-size: 1.1rem;
            }

            .user-dropdown-menu .dropdown-header {
                padding: 0.75rem 1rem;
                gap: 0.75rem;
            }

            .user-dropdown-menu .user-name-large {
                font-size: 0.95rem;
            }

            .user-dropdown-menu .user-email {
                font-size: 0.75rem;
            }
        }

        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
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

        /* Enhanced Dropdown Styles */
        .navbar-right {
            gap: 1rem;
        }

        /* Notification Dropdown */
        .notification-dropdown {
            position: relative;
        }

        .notification-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            width: 350px;
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

        .notification-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .notification-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            transition: all 0.2s ease;
            position: relative;
        }

        .notification-item:hover {
            background: #f9fafb;
        }

        .notification-item.unread {
            background: #fef3c7;
            border-left: 3px solid #f59e0b;
        }

        .notification-item.unread::before {
            content: '';
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
        }

        .notification-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.25rem;
        }

        .notification-text {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .notification-time {
            color: #9ca3af;
            font-size: 0.75rem;
        }

        .notification-footer {
            padding: 1rem 1.25rem;
            border-top: 1px solid #e5e7eb;
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

        /* Dark Mode Toggle */
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .notification-dropdown-menu,
            .user-dropdown-menu {
                width: 280px;
                right: -50px;
            }

            .user-profile-btn {
                padding: 0.5rem;
            }

            .user-info {
                display: none;
            }

            /* Fix mobile dropdown avatar sizing */
            .user-dropdown-menu .user-avatar-large {
                width: 50px;
                height: 50px;
                min-width: 50px;
                min-height: 50px;
            }

            .user-dropdown-menu .avatar-placeholder-large {
                font-size: 1.25rem;
            }

            .user-dropdown-menu .dropdown-header {
                padding: 1rem 1.25rem;
            }

            .user-dropdown-menu .user-name-large {
                font-size: 1rem;
            }

            .user-dropdown-menu .user-email {
                font-size: 0.8rem;
            }
        }

        /* Animation for dropdown items */
        .dropdown-item {
            animation: slideInRight 0.3s ease forwards;
            opacity: 0;
            transform: translateX(20px);
        }

        .dropdown-item:nth-child(1) { animation-delay: 0.1s; }
        .dropdown-item:nth-child(2) { animation-delay: 0.15s; }
        .dropdown-item:nth-child(3) { animation-delay: 0.2s; }
        .dropdown-item:nth-child(4) { animation-delay: 0.25s; }
        .dropdown-item:nth-child(5) { animation-delay: 0.3s; }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Pulse animation for notification badge */
        .notification-dropdown-menu.show ~ #notificationBadge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Dark Mode Styles */
        .dark-mode {
            background-color: #1a1a1a !important;
            color: #e5e5e5 !important;
        }

        .dark-mode .sidebar {
            background: linear-gradient(135deg, #2d3748, #4a5568) !important;
        }

        .dark-mode .main-content {
            background-color: #1a1a1a !important;
        }

        .dark-mode .top-navbar {
            background-color: #2d3748 !important;
            border-bottom-color: #4a5568 !important;
        }

        .dark-mode .card {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
            color: #e5e5e5 !important;
        }

        .dark-mode .card-header {
            background-color: #374151 !important;
            border-bottom-color: #4a5568 !important;
        }

        .dark-mode .form-control {
            background-color: #374151 !important;
            border-color: #4a5568 !important;
            color: #e5e5e5 !important;
        }

        .dark-mode .form-control:focus {
            background-color: #374151 !important;
            border-color: var(--primary-color) !important;
            color: #e5e5e5 !important;
        }

        .dark-mode .table {
            color: #e5e5e5 !important;
        }

        .dark-mode .table th {
            border-color: #4a5568 !important;
        }

        .dark-mode .table td {
            border-color: #4a5568 !important;
        }

        .dark-mode .dropdown-menu {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
        }

        .dark-mode .dropdown-item {
            color: #e5e5e5 !important;
        }

        .dark-mode .dropdown-item:hover {
            background-color: #374151 !important;
            color: #e5e5e5 !important;
        }

        .dark-mode .notification-dropdown-menu {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
        }

        .dark-mode .notification-item {
            border-bottom-color: #4a5568 !important;
        }

        .dark-mode .notification-item:hover {
            background-color: #374151 !important;
        }

        .dark-mode .user-dropdown-menu {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
        }

        .dark-mode .dropdown-header {
            background: linear-gradient(135deg, #4a5568, #2d3748) !important;
        }

        .dark-mode .dropdown-divider {
            background-color: #4a5568 !important;
        }

        .dark-mode .section-title {
            color: #9ca3af !important;
        }

        .dark-mode .text-muted {
            color: #9ca3af !important;
        }

        .dark-mode .text-dark {
            color: #e5e5e5 !important;
        }

        .dark-mode .btn-outline-primary {
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }

        .dark-mode .btn-outline-primary:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
        }

        .dark-mode .alert {
            background-color: #374151 !important;
            border-color: #4a5568 !important;
            color: #e5e5e5 !important;
        }

        .dark-mode .alert-success {
            background-color: #064e3b !important;
            color: #a7f3d0 !important;
            border-left-color: #10b981 !important;
        }

        .dark-mode .alert-danger {
            background-color: #7f1d1d !important;
            color: #fecaca !important;
            border-left-color: #ef4444 !important;
        }

        .dark-mode .alert-warning {
            background-color: #78350f !important;
            color: #fde68a !important;
            border-left-color: #f59e0b !important;
        }

        .dark-mode .alert-info {
            background-color: #1e3a8a !important;
            color: #bfdbfe !important;
            border-left-color: var(--primary-color) !important;
        }

        /* Additional Mobile Enhancements */
        @media (max-width: 768px) {
            /* Prevent body scroll when sidebar is open */
            body.sidebar-open {
                overflow: hidden;
            }

            /* Mobile-friendly sidebar */
            .sidebar {
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }

            /* Mobile table improvements */
            .table-responsive {
                border: none;
                box-shadow: none;
            }

            .table {
                margin-bottom: 0;
            }

            /* Mobile form improvements */
            .form-floating > label {
                font-size: 0.875rem;
            }

            /* Mobile card improvements */
            .card {
                margin-bottom: 1rem;
                border-radius: 8px;
            }

            .card-header {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }

            .card-body {
                padding: 1rem;
            }

            /* Mobile button groups */
            .btn-group-vertical {
                width: 100%;
            }

            .btn-group-vertical .btn {
                margin-bottom: 0.25rem;
            }

            /* Mobile pagination */
            .pagination {
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
            }

            /* Mobile modals */
            .modal-dialog {
                margin: 0.5rem;
                max-width: calc(100% - 1rem);
            }

            .modal-content {
                border-radius: 8px;
            }

            /* Mobile alerts */
            .alert {
                margin-bottom: 1rem;
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }

            /* Mobile breadcrumbs */
            .breadcrumb {
                font-size: 0.8rem;
                padding: 0.5rem 0;
            }

            /* Mobile search */
            .search-box {
                width: 100%;
                margin-bottom: 1rem;
            }

            /* Mobile filters */
            .filter-panel {
                margin-bottom: 1rem;
            }

            .filter-panel .row {
                margin: 0;
            }

            .filter-panel .col-md-3,
            .filter-panel .col-md-4 {
                margin-bottom: 0.5rem;
            }
        }

        /* Touch-friendly improvements */
        @media (hover: none) and (pointer: coarse) {
            .btn {
                min-height: 44px;
                min-width: 44px;
            }

            .nav-link {
                min-height: 48px;
            }

            .dropdown-item {
                min-height: 44px;
                padding: 0.75rem 1.25rem;
            }

            .form-control,
            .form-select {
                min-height: 44px;
            }
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
            <h3><i class="fas fa-crown"></i> Admin Panel</h3>
            <p>Management Dashboard</p>
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            <hr style="border-color: rgba(255, 255, 255, 0.1); margin: 1rem 0;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guest.home') }}" target="_blank">
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
                <!-- Notifications -->
                <div class="notification-dropdown me-3">
                    <button class="btn btn-link position-relative" id="notificationBtn" type="button">
                        <i class="fas fa-bell text-muted"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notificationBadge">
                            3
                        </span>
                    </button>
                    <div class="notification-dropdown-menu" id="notificationDropdown">
                        <div class="notification-header">
                            <h6 class="mb-0">Notifications</h6>
                            <button class="btn btn-sm btn-link text-primary" id="markAllRead">Mark all read</button>
                        </div>
                        <div class="notification-list">
                            <div class="notification-item unread">
                                <div class="notification-icon">
                                    <i class="fas fa-user-plus text-success"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">New User Registered</div>
                                    <div class="notification-text">John Doe has registered on the site</div>
                                    <div class="notification-time">2 minutes ago</div>
                                </div>
                            </div>
                            <div class="notification-item unread">
                                <div class="notification-icon">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">New Order Received</div>
                                    <div class="notification-text">Order #12345 has been placed</div>
                                    <div class="notification-time">5 minutes ago</div>
                                </div>
                            </div>
                            <div class="notification-item">
                                <div class="notification-icon">
                                    <i class="fas fa-exclamation-triangle text-warning"></i>
                                </div>
                                <div class="notification-content">
                                    <div class="notification-title">Low Stock Alert</div>
                                    <div class="notification-text">Product "T-Shirt" is running low</div>
                                    <div class="notification-time">1 hour ago</div>
                                </div>
                            </div>
                        </div>
                        <div class="notification-footer">
                            <a href="#" class="btn btn-sm btn-outline-primary w-100">View All Notifications</a>
                        </div>
                    </div>
                </div>

                <!-- User Profile Dropdown -->
                <div class="user-profile-dropdown">
                    <button class="user-profile-btn" id="userProfileBtn" type="button">
                        <div class="user-avatar">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="avatar-img">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                            @endif
                            <div class="status-indicator online"></div>
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ auth()->user()->name }}</div>
                            <div class="user-role">Administrator</div>
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
                                        <i class="fas fa-user-shield"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="user-details">
                                <div class="user-name-large">{{ auth()->user()->name }}</div>
                                <div class="user-email">{{ auth()->user()->email }}</div>
                                <div class="user-role-badge">Administrator</div>
                            </div>
                        </div>
                        
                        <div class="dropdown-divider"></div>
                        
                        <div class="dropdown-section">
                            <div class="section-title">Account</div>
                            <a href="{{ route('admin.profile.show') }}" class="dropdown-item">
                                <i class="fas fa-user me-3"></i>
                                <span>My Profile</span>
                            </a>
                            <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                                <i class="fas fa-cog me-3"></i>
                                <span>Account Settings</span>
                            </a>
                            <a href="{{ route('admin.profile.security') }}" class="dropdown-item">
                                <i class="fas fa-shield-alt me-3"></i>
                                <span>Security</span>
                            </a>
                        </div>
                        
                        <div class="dropdown-section">
                            <div class="section-title">Admin</div>
                            <a href="{{ route('admin.settings.index') }}" class="dropdown-item">
                                <i class="fas fa-cogs me-3"></i>
                                <span>System Settings</span>
                            </a>
                            <a href="{{ route('admin.analytics') }}" class="dropdown-item">
                                <i class="fas fa-chart-line me-3"></i>
                                <span>Analytics</span>
                            </a>
                        </div>
                        
                        <div class="dropdown-section">
                            <div class="section-title">Quick Actions</div>
                            <a href="{{ route('home') }}" class="dropdown-item" target="_blank">
                                <i class="fas fa-external-link-alt me-3"></i>
                                <span>View Site</span>
                                <i class="fas fa-external-link-alt ms-auto"></i>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-moon me-3"></i>
                                <span>Dark Mode</span>
                                <div class="form-check form-switch ms-auto">
                                    <input class="form-check-input" type="checkbox" id="darkModeToggle">
                                </div>
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        // DataTables
        $(document).ready(function() {
            $('.data-table').DataTable({
                responsive: true,
                pageLength: 10,
                paging: false, // Disable DataTables pagination to use Laravel pagination
                info: false,   // Disable DataTables info to avoid conflicts
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        });

        // Delete Confirmation
        function confirmDelete(url, title = 'Are you sure?', text = 'You won\'t be able to revert this!') {
            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

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
                    
                    // Close notification dropdown if open
                    const notificationDropdown = document.getElementById('notificationDropdown');
                    if (notificationDropdown) {
                        notificationDropdown.classList.remove('show');
                    }
                });
            }

            // Notification Dropdown
            const notificationBtn = document.getElementById('notificationBtn');
            const notificationDropdown = document.getElementById('notificationDropdown');
            
            if (notificationBtn && notificationDropdown) {
                notificationBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Toggle dropdown
                    notificationDropdown.classList.toggle('show');
                    
                    // Close user dropdown if open
                    if (userDropdownMenu) {
                        userDropdownMenu.classList.remove('show');
                        userProfileBtn.classList.remove('active');
                    }
                });
            }

            // Mark all notifications as read
            const markAllReadBtn = document.getElementById('markAllRead');
            if (markAllReadBtn) {
                markAllReadBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Call backend to mark all as read
                    fetch('{{ route("admin.notifications.mark-all-read") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove unread class from all notification items
                            const unreadItems = document.querySelectorAll('.notification-item.unread');
                            unreadItems.forEach(item => {
                                item.classList.remove('unread');
                            });
                            
                            // Hide notification badge
                            const notificationBadge = document.getElementById('notificationBadge');
                            if (notificationBadge) {
                                notificationBadge.style.display = 'none';
                            }
                            
                            // Show success message
                            showNotification('All notifications marked as read', 'success');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('Failed to mark notifications as read', 'error');
                    });
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
                
                // Close notification dropdown
                if (notificationBtn && notificationDropdown && 
                    !notificationBtn.contains(event.target) && 
                    !notificationDropdown.contains(event.target)) {
                    notificationDropdown.classList.remove('show');
                }
            });

            // Close dropdowns on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (userDropdownMenu && userDropdownMenu.classList.contains('show')) {
                        userDropdownMenu.classList.remove('show');
                        userProfileBtn.classList.remove('active');
                    }
                    if (notificationDropdown && notificationDropdown.classList.contains('show')) {
                        notificationDropdown.classList.remove('show');
                    }
                }
            });

            // Dark mode toggle
            const darkModeToggle = document.getElementById('darkModeToggle');
            if (darkModeToggle) {
                // Load saved dark mode preference
                const savedTheme = localStorage.getItem('darkMode');
                if (savedTheme === 'enabled') {
                    darkModeToggle.checked = true;
                    document.body.classList.add('dark-mode');
                }

                darkModeToggle.addEventListener('change', function() {
                    if (this.checked) {
                        document.body.classList.add('dark-mode');
                        localStorage.setItem('darkMode', 'enabled');
                        showNotification('Dark mode enabled', 'success');
                    } else {
                        document.body.classList.remove('dark-mode');
                        localStorage.setItem('darkMode', 'disabled');
                        showNotification('Dark mode disabled', 'info');
                    }
                });
            }

            // Logout confirmation
            const logoutForm = document.querySelector('.logout-form');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will be logged out of the admin panel.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, logout!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
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

            // Load notifications on page load
            loadNotifications();

            // Notification item click handlers
            document.addEventListener('click', function(e) {
                if (e.target.closest('.notification-item')) {
                    const notificationItem = e.target.closest('.notification-item');
                    const notificationId = notificationItem.dataset.notificationId;
                    
                    // Mark as read
                    notificationItem.classList.remove('unread');
                    
                    // Call backend to mark as read
                    if (notificationId) {
                        fetch('{{ route("admin.notifications.mark-read") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                notification_id: notificationId
                            })
                        });
                    }
                    
                    // Update badge count
                    updateNotificationBadge();
                }
            });

            // Function to update notification badge
            function updateNotificationBadge() {
                const unreadCount = document.querySelectorAll('.notification-item.unread').length;
                const notificationBadge = document.getElementById('notificationBadge');
                
                if (notificationBadge) {
                    if (unreadCount > 0) {
                        notificationBadge.textContent = unreadCount;
                        notificationBadge.style.display = 'block';
                    } else {
                        notificationBadge.style.display = 'none';
                    }
                }
            }

            // Function to load notifications
            function loadNotifications() {
                fetch('{{ route("admin.notifications.index") }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.notifications) {
                            updateNotificationList(data.notifications);
                            updateNotificationBadge();
                        }
                    })
                    .catch(error => {
                        console.error('Error loading notifications:', error);
                    });
            }

            // Function to update notification list
            function updateNotificationList(notifications) {
                const notificationList = document.querySelector('.notification-list');
                if (notificationList) {
                    notificationList.innerHTML = '';
                    
                    notifications.forEach(notification => {
                        const notificationElement = document.createElement('div');
                        notificationElement.className = `notification-item ${notification.read ? '' : 'unread'}`;
                        notificationElement.dataset.notificationId = notification.id;
                        
                        notificationElement.innerHTML = `
                            <div class="notification-icon">
                                <i class="${notification.icon} ${notification.icon_color}"></i>
                            </div>
                            <div class="notification-content">
                                <div class="notification-title">${notification.title}</div>
                                <div class="notification-text">${notification.message}</div>
                                <div class="notification-time">${notification.created_at}</div>
                            </div>
                        `;
                        
                        notificationList.appendChild(notificationElement);
                    });
                }
            }

            // Function to show notifications
            function showNotification(message, type = 'info') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: type,
                    title: message
                });
            }

            // Simulate real-time notifications (for demo purposes)
            setInterval(function() {
                const notificationBadge = document.getElementById('notificationBadge');
                if (notificationBadge && Math.random() > 0.8) {
                    const currentCount = parseInt(notificationBadge.textContent) || 0;
                    notificationBadge.textContent = currentCount + 1;
                    notificationBadge.style.display = 'block';
                    
                    // Add new notification to the list
                    addNewNotification();
                }
            }, 30000); // Check every 30 seconds

            function addNewNotification() {
                const notificationList = document.querySelector('.notification-list');
                if (notificationList) {
                    const newNotification = document.createElement('div');
                    newNotification.className = 'notification-item unread';
                    newNotification.innerHTML = `
                        <div class="notification-icon">
                            <i class="fas fa-info-circle text-info"></i>
                        </div>
                        <div class="notification-content">
                            <div class="notification-title">System Update</div>
                            <div class="notification-text">New system update available</div>
                            <div class="notification-time">Just now</div>
                        </div>
                    `;
                    
                    notificationList.insertBefore(newNotification, notificationList.firstChild);
                    
                    // Limit to 5 notifications
                    const notifications = notificationList.querySelectorAll('.notification-item');
                    if (notifications.length > 5) {
                        notifications[notifications.length - 1].remove();
                    }
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
