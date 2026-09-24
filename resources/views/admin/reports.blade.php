@extends('admin.layout')

@section('title', 'Reports')
@section('page-title', 'Business Reports')

@section('content')
    <!-- Reports Navigation -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-chart-bar me-2"></i>Report Categories</h5>
                </div>
                <div class="table-card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="report-category-card" onclick="showReport('sales')">
                                <div class="report-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <h6>Sales Report</h6>
                                <p>Order and revenue data</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="report-category-card" onclick="showReport('users')">
                                <div class="report-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h6>User Report</h6>
                                <p>Customer activity and orders</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="report-category-card" onclick="showReport('products')">
                                <div class="report-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <h6>Product Report</h6>
                                <p>Product performance metrics</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="report-category-card" onclick="showReport('monthly')">
                                <div class="report-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <h6>Monthly Sales</h6>
                                <p>Monthly revenue breakdown</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Report -->
    <div id="sales-report" class="report-section">
        <div class="table-card">
            <div class="table-card-header">
                <h5><i class="fas fa-shopping-cart me-2"></i>Sales Report</h5>
                <div class="table-card-actions">
                    <button class="btn btn-outline-primary btn-sm" onclick="exportReport('sales')">
                        <i class="fas fa-download me-1"></i>Export
                    </button>
                </div>
            </div>
            <div class="table-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports['sales_report'] as $order)
                                <tr>
                                    <td>
                                        <strong>#{{ $order->order_number }}</strong>
                                    </td>
                                    <td>
                                        <div class="customer-info">
                                            <strong>{{ $order->user->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $order->user->email }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $order->created_at->format('M d, Y') }}
                                        <br>
                                        <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $order->status === 'delivered' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $order->payment_status === 'completed' ? 'success' : 'warning' }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong>${{ number_format($order->total, 2) }}</strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                                        <p>No sales data available</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $reports['sales_report']->links() }}
            </div>
        </div>
    </div>

    <!-- User Report -->
    <div id="users-report" class="report-section" style="display: none;">
        <div class="table-card">
            <div class="table-card-header">
                <h5><i class="fas fa-users me-2"></i>User Report</h5>
                <div class="table-card-actions">
                    <button class="btn btn-outline-primary btn-sm" onclick="exportReport('users')">
                        <i class="fas fa-download me-1"></i>Export
                    </button>
                </div>
            </div>
            <div class="table-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Orders</th>
                                <th>Joined</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports['user_report'] as $user)
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <strong>{{ $user->name }}</strong>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $user->orders_count }}</span>
                                    </td>
                                    <td>
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $user->email_verified_at ? 'success' : 'warning' }}">
                                            {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        <i class="fas fa-users fa-2x mb-2"></i>
                                        <p>No user data available</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $reports['user_report']->links() }}
            </div>
        </div>
    </div>

    <!-- Product Report -->
    <div id="products-report" class="report-section" style="display: none;">
        <div class="table-card">
            <div class="table-card-header">
                <h5><i class="fas fa-box me-2"></i>Product Report</h5>
                <div class="table-card-actions">
                    <button class="btn btn-outline-primary btn-sm" onclick="exportReport('products')">
                        <i class="fas fa-download me-1"></i>Export
                    </button>
                </div>
            </div>
            <div class="table-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Orders</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports['product_report'] as $product)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            <strong>{{ $product->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        @if($product->images->count() > 0)
                                            <img src="{{ asset($product->images->first()->image_path) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="product-thumb">
                                        @else
                                            <div class="no-image-placeholder">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>${{ number_format($product->price, 2) }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $product->order_items_count }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($product->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $product->created_at->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        <i class="fas fa-box fa-2x mb-2"></i>
                                        <p>No product data available</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $reports['product_report']->links() }}
            </div>
        </div>
    </div>

    <!-- Monthly Sales Report -->
    <div id="monthly-report" class="report-section" style="display: none;">
        <div class="table-card">
            <div class="table-card-header">
                <h5><i class="fas fa-calendar-alt me-2"></i>Monthly Sales Report</h5>
                <div class="table-card-actions">
                    <button class="btn btn-outline-primary btn-sm" onclick="exportReport('monthly')">
                        <i class="fas fa-download me-1"></i>Export
                    </button>
                </div>
            </div>
            <div class="table-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Total Sales</th>
                                <th>Orders</th>
                                <th>Average Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports['monthly_sales'] as $monthly)
                                <tr>
                                    <td>
                                        <strong>{{ date('F', mktime(0, 0, 0, $monthly->month, 1)) }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $monthly->year }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-success">${{ number_format($monthly->total, 2) }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $monthly->orders_count ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        ${{ number_format($monthly->total / ($monthly->orders_count ?? 1), 2) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        <i class="fas fa-calendar-alt fa-2x mb-2"></i>
                                        <p>No monthly sales data available</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function showReport(reportType) {
        // Hide all report sections
        document.querySelectorAll('.report-section').forEach(section => {
            section.style.display = 'none';
        });
        
        // Show selected report
        document.getElementById(reportType + '-report').style.display = 'block';
        
        // Update active state
        document.querySelectorAll('.report-category-card').forEach(card => {
            card.classList.remove('active');
        });
        event.target.closest('.report-category-card').classList.add('active');
    }
    
    function exportReport(reportType) {
        // This would typically generate and download a CSV/PDF report
        alert('Export functionality for ' + reportType + ' report would be implemented here.');
    }
</script>
@endpush

@push('styles')
<style>
    .report-category-card {
        background: #fff;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .report-category-card:hover {
        border-color: #6366f1;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.15);
    }
    
    .report-category-card.active {
        border-color: #6366f1;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
    }
    
    .report-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.5rem;
    }
    
    .report-category-card.active .report-icon {
        background: rgba(255, 255, 255, 0.2);
    }
    
    .customer-info, .product-info, .user-info {
        min-width: 150px;
    }
    
    .product-thumb {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
    }
    
    .no-image-placeholder {
        width: 50px;
        height: 50px;
        background: #f3f4f6;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        border: 2px solid #e5e7eb;
    }
    
    .table-card-actions {
        display: flex;
        gap: 0.5rem;
    }
</style>
@endpush
