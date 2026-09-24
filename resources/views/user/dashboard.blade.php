@extends('layouts.user')

@section('title', 'My Dashboard')
@section('page-title', 'Dashboard')

@section('content')
            <!-- Welcome Section -->
            <div class="welcome-card">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <h2 class="mb-2">Welcome back, {{ auth()->user()->name }}!</h2>
                <p class="mb-0">Ready to explore our latest collection?</p>
            </div>

            <!-- Statistics Row -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="stat-number">{{ $stats['total_orders'] }}</div>
                        <div class="stat-label">Total Orders</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number">{{ $stats['pending_orders'] }}</div>
                        <div class="stat-label">Pending Orders</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #047857);">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-number">${{ number_format($stats['total_spent'], 0) }}</div>
                        <div class="stat-label">Total Spent</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="stat-number">0</div>
                        <div class="stat-label">Wishlist Items</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Quick Actions -->
                <div class="col-lg-4 mb-4">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header">
                            <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                        </div>
                        <div class="dashboard-card-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <a href="{{ route('user.shop') }}" class="quick-action-btn">
                                        <div class="quick-action-icon">
                                            <i class="fas fa-shopping-bag"></i>
                                        </div>
                                        <strong>Shop Now</strong>
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('user.cart') }}" class="quick-action-btn">
                                        <div class="quick-action-icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <strong>View Cart</strong>
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('user.orders') }}" class="quick-action-btn">
                                        <div class="quick-action-icon">
                                            <i class="fas fa-list"></i>
                                        </div>
                                        <strong>My Orders</strong>
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ route('user.profile') }}" class="quick-action-btn">
                                        <div class="quick-action-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <strong>Profile</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="col-lg-8 mb-4">
                    <div class="dashboard-card">
                        <div class="dashboard-card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-shopping-bag me-2"></i>Recent Orders</h5>
                            <a href="{{ route('user.orders') }}" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="dashboard-card-body">
                            @forelse($stats['recent_orders'] as $order)
                                <div class="order-item">
                                    <div>
                                        <strong>{{ $order->order_number }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $order->created_at->format('M d, Y') }} • {{ $order->items->count() }} items</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge {{ $order->status_badge }}">{{ ucfirst($order->status) }}</span>
                                        <br>
                                        <strong class="text-success">${{ number_format($order->total, 2) }}</strong>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No orders yet</h5>
                                    <p class="text-muted mb-3">Start shopping to see your orders here</p>
                                    <a href="{{ route('user.shop') }}" class="btn btn-primary">
                                        <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                                    </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Products -->
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <h5 class="mb-0"><i class="fas fa-star me-2"></i>Featured Products</h5>
                </div>
                <div class="dashboard-card-body">
                    <div class="row">
                        @foreach($featuredProducts as $product)
                            <div class="col-lg-2 col-md-4 col-6 mb-3">
                                <div class="product-card-mini">
                                    @if($product->images->count() > 0)
                                        <img src="{{ $product->images->first()->url }}" 
                                             alt="{{ $product->name }}" 
                                             class="product-image-mini"
                                             onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                    @else
                                        <div class="product-image-mini bg-light d-flex align-items-center justify-content-center">
                                            <i class="fas fa-image fa-2x text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="p-3">
                                        <h6 class="mb-2">{{ Str::limit($product->name, 20) }}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-success fw-bold">${{ number_format($product->price, 2) }}</span>
                                            <a href="{{ route('user.shop.detail', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('user.shop') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Shop All Products
                        </a>
                    </div>
                </div>
            </div>
@endsection

@push('styles')
<style>
    .user-dashboard {
        background: #f8f9fa;
        min-height: 100vh;
        padding: 2rem 0;
    }
    
    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        padding: 3rem;
        margin-bottom: 2rem;
        text-align: center;
    }
    
    .user-avatar {
        width: 120px;
        height: 60px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.8rem;
        border: 3px solid rgba(255, 255, 255, 0.3);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
    }
    
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.8rem;
        color: white;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #1f2937;
    }
    
    .stat-label {
        color: #6b7280;
        font-weight: 500;
    }
    
    .dashboard-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }
    
    .dashboard-card-header {
        background: #f8f9fa;
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .dashboard-card-body {
        padding: 1.5rem;
    }
    
    .quick-action-btn {
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        text-decoration: none;
        color: #374151;
        transition: all 0.3s ease;
        display: block;
        text-align: center;
    }
    
    .quick-action-btn:hover {
        border-color: #6366f1;
        background: #6366f1;
        color: white;
        transform: translateY(-2px);
        text-decoration: none;
    }
    
    .quick-action-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        background: #f3f4f6;
        color: #6b7280;
        transition: all 0.3s ease;
    }
    
    .quick-action-btn:hover .quick-action-icon {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }
    
    .order-item {
        padding: 1rem;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .order-item:last-child {
        border-bottom: none;
    }
    
    .product-card-mini {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .product-card-mini:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    .product-image-mini {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
</style>
@endpush

@push('scripts')
<script>
    // Add entrance animations
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stat-card, .dashboard-card, .product-card-mini');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // Update cart badge in real-time
    function updateCartBadge() {
        // This would be connected to your cart system
        // For now, it reads from session
    }
</script>
@endpush
