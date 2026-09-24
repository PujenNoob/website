@extends('admin.layout')

@section('title', 'Order Management')
@section('page-title', 'Order Management')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Orders</h2>
            <p class="text-muted">Manage all customer orders and track their status</p>
        </div>
        <div class="d-flex gap-2">
            <span class="badge bg-primary fs-6">{{ $orders->total() }} Orders</span>
        </div>
    </div>

    <!-- Filter Panel -->
    @include('admin.components.filter-panel', [
        'filters' => [
            [
                'name' => 'status',
                'label' => 'Status',
                'options' => [
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled'
                ]
            ],
            [
                'name' => 'payment_status',
                'label' => 'Payment Status',
                'options' => [
                    'pending' => 'Pending',
                    'completed' => 'Completed',
                    'failed' => 'Failed'
                ]
            ],
            [
                'name' => 'payment_method',
                'label' => 'Payment Method',
                'options' => [
                    'credit_card' => 'Credit Card',
                    'paypal' => 'PayPal',
                    'bank_transfer' => 'Bank Transfer',
                    'cash_on_delivery' => 'Cash on Delivery'
                ]
            ]
        ],
        'searchPlaceholder' => 'Search by order number, customer name, or email...'
    ])

    <!-- Quick Filters -->
    @include('admin.components.quick-filters', [
        'filters' => [
            [
                'param' => 'status',
                'value' => 'pending',
                'label' => 'Pending Orders',
                'icon' => 'fas fa-clock',
                'count' => $orders->where('status', 'pending')->count()
            ],
            [
                'param' => 'status',
                'value' => 'processing',
                'label' => 'Processing',
                'icon' => 'fas fa-cog',
                'count' => $orders->where('status', 'processing')->count()
            ],
            [
                'param' => 'status',
                'value' => 'shipped',
                'label' => 'Shipped',
                'icon' => 'fas fa-shipping-fast',
                'count' => $orders->where('status', 'shipped')->count()
            ],
            [
                'param' => 'status',
                'value' => 'delivered',
                'label' => 'Delivered',
                'icon' => 'fas fa-check-circle',
                'count' => $orders->where('status', 'delivered')->count()
            ]
        ]
    ])

    <!-- Active Filters -->
    @include('admin.components.active-filters')

    <!-- Order Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-info">
                        <h3>{{ $orders->where('status', 'pending')->count() }}</h3>
                        <p>Pending Orders</p>
                    </div>
                    <div class="stat-icon orders" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-info">
                        <h3>{{ $orders->where('status', 'processing')->count() }}</h3>
                        <p>Processing</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                        <i class="fas fa-cog"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-info">
                        <h3>{{ $orders->where('status', 'shipped')->count() }}</h3>
                        <p>Shipped</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-card-body">
                    <div class="stat-info">
                        <h3>{{ $orders->where('status', 'delivered')->count() }}</h3>
                        <p>Delivered</p>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #047857);">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-card-header">
            <h5><i class="fas fa-shopping-cart me-2"></i>All Orders ({{ $orders->total() }})</h5>
        </div>
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <strong>{{ $order->order_number }}</strong>
                                <br>
                                <small class="text-muted">#{{ $order->id }}</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        {{ strtoupper(substr($order->user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <strong>{{ $order->user->name }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $order->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $order->items->count() }} items</span>
                                <br>
                                <small class="text-muted">{{ $order->items->sum('quantity') }} qty</small>
                            </td>
                            <td>
                                <strong class="text-success">${{ number_format($order->total, 2) }}</strong>
                                <br>
                                <small class="text-muted">
                                    Subtotal: ${{ number_format($order->subtotal, 2) }}
                                </small>
                            </td>
                            <td>
                                <span class="badge {{ $order->status_badge }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                @if($order->status === 'shipped' && $order->shipped_at)
                                    <br><small class="text-muted">{{ $order->shipped_at->format('M d') }}</small>
                                @elseif($order->status === 'delivered' && $order->delivered_at)
                                    <br><small class="text-muted">{{ $order->delivered_at->format('M d') }}</small>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <strong>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</strong>
                                    <br>
                                    <span class="badge {{ $order->payment_status === 'pending' ? 'bg-warning' : 'bg-success' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <strong>{{ $order->created_at->format('M d, Y') }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-info" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" title="Update Status">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if($order->status !== 'pending')
                                                <li>
                                                    <button class="dropdown-item" onclick="updateOrderStatus({{ $order->id }}, 'pending')">
                                                        <i class="fas fa-clock text-warning me-2"></i>Mark as Pending
                                                    </button>
                                                </li>
                                            @endif
                                            @if($order->status !== 'processing')
                                                <li>
                                                    <button class="dropdown-item" onclick="updateOrderStatus({{ $order->id }}, 'processing')">
                                                        <i class="fas fa-cog text-info me-2"></i>Mark as Processing
                                                    </button>
                                                </li>
                                            @endif
                                            @if($order->status !== 'shipped')
                                                <li>
                                                    <button class="dropdown-item" onclick="updateOrderStatus({{ $order->id }}, 'shipped')">
                                                        <i class="fas fa-shipping-fast text-primary me-2"></i>Mark as Shipped
                                                    </button>
                                                </li>
                                            @endif
                                            @if($order->status !== 'delivered')
                                                <li>
                                                    <button class="dropdown-item" onclick="updateOrderStatus({{ $order->id }}, 'delivered')">
                                                        <i class="fas fa-check-circle text-success me-2"></i>Mark as Delivered
                                                    </button>
                                                </li>
                                            @endif
                                            @if($order->status !== 'cancelled')
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <button class="dropdown-item text-danger" onclick="updateOrderStatus({{ $order->id }}, 'cancelled')">
                                                        <i class="fas fa-times-circle me-2"></i>Cancel Order
                                                    </button>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger" 
                                            title="Delete Order"
                                            onclick="confirmDelete('{{ route('admin.orders.destroy', $order) }}', 'Delete Order', 'Are you sure you want to delete order {{ $order->order_number }}? This action cannot be undone.')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($orders->hasPages())
            <div class="d-flex justify-content-center p-4">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    // Update order status function
    function updateOrderStatus(orderId, status) {
        const statusText = status.charAt(0).toUpperCase() + status.slice(1);
        
        Swal.fire({
            title: `Update Order Status`,
            text: `Are you sure you want to mark this order as ${statusText}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6366f1',
            cancelButtonColor: '#6b7280',
            confirmButtonText: `Yes, mark as ${statusText}`,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/orders/${orderId}/status`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';
                statusInput.value = status;
                
                form.appendChild(csrfToken);
                form.appendChild(statusInput);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Delete confirmation function
    function confirmDelete(url, title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete order!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endpush
