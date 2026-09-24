@extends('admin.layout')

@section('title', 'Order Details')
@section('page-title', 'Order Details: ' . $order->order_number)

@section('content')
    <div class="row">
        <!-- Order Summary Card -->
        <div class="col-lg-4 mb-4">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-receipt me-2"></i>Order Summary</h5>
                </div>
                <div class="p-4">
                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h4 class="mb-1">{{ $order->order_number }}</h4>
                        <p class="text-muted">Order #{{ $order->id }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted">Status</label>
                        <div>
                            <span class="badge {{ $order->status_badge }} fs-6">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted">Total Amount</label>
                        <h4 class="text-success mb-0">${{ number_format($order->total, 2) }}</h4>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted">Payment Method</label>
                        <p class="mb-0">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted">Payment Status</label>
                        <div>
                            <span class="badge {{ $order->payment_status === 'pending' ? 'bg-warning' : 'bg-success' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label text-muted">Order Date</label>
                        <p class="mb-0">{{ $order->created_at->format('M d, Y H:i') }}</p>
                        <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                    </div>
                    
                    <!-- Quick Status Update -->
                    <div class="d-grid gap-2">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-edit me-2"></i>Update Status
                            </button>
                            <ul class="dropdown-menu w-100">
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
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Order Details -->
        <div class="col-lg-8">
            <!-- Customer Information -->
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <h5><i class="fas fa-user me-2"></i>Customer Information</h5>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Customer</label>
                                <p class="mb-0">
                                    <strong>{{ $order->user->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $order->user->email }}</small>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Billing Address</label>
                                <p class="mb-0">
                                    {{ $order->billing_first_name }} {{ $order->billing_last_name }}<br>
                                    {{ $order->billing_address }}<br>
                                    {{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_zip }}<br>
                                    {{ $order->billing_country }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Contact Information</label>
                                <p class="mb-0">
                                    <i class="fas fa-envelope me-2"></i>{{ $order->billing_email }}<br>
                                    <i class="fas fa-phone me-2"></i>{{ $order->billing_phone }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Shipping Address</label>
                                <p class="mb-0">
                                    @if($order->shipping_address)
                                        {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}<br>
                                        {{ $order->shipping_address }}<br>
                                        {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}<br>
                                        {{ $order->shipping_country }}
                                    @else
                                        <em class="text-muted">Same as billing address</em>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    @if($order->notes)
                        <div class="mt-3">
                            <label class="form-label text-muted">Order Notes</label>
                            <div class="bg-light rounded p-3">
                                <p class="mb-0">{{ $order->notes }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Order Items -->
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <h5><i class="fas fa-box me-2"></i>Order Items ({{ $order->items->count() }})</h5>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->product && $item->product->images->count() > 0)
                                                <img src="{{ $item->product->images->first()->url }}" 
                                                     alt="{{ $item->product_name }}" 
                                                     class="rounded me-3" 
                                                     style="width: 50px; height: 50px; object-fit: cover;"
                                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                            @else
                                                <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <strong>{{ $item->product_name }}</strong>
                                                @if($item->product)
                                                    <br><small class="text-muted">Product ID: #{{ $item->product_id }}</small>
                                                @else
                                                    <br><small class="text-warning">Product no longer exists</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>${{ number_format($item->product_price, 2) }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $item->quantity }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-success">${{ number_format($item->total, 2) }}</strong>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <td colspan="3"><strong>Subtotal</strong></td>
                                <td><strong>${{ number_format($order->subtotal, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3">Tax (10%)</td>
                                <td>${{ number_format($order->tax, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Shipping</td>
                                <td>${{ number_format($order->shipping, 2) }}</td>
                            </tr>
                            <tr class="table-success">
                                <td colspan="3"><strong>Total</strong></td>
                                <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <!-- Order Timeline -->
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-history me-2"></i>Order Timeline</h5>
                </div>
                <div class="p-4">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Order Placed</h6>
                                <p class="text-muted mb-0">{{ $order->created_at->format('M d, Y H:i') }}</p>
                                <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        
                        @if($order->status !== 'pending')
                            <div class="timeline-item">
                                <div class="timeline-marker bg-info"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Order Processing Started</h6>
                                    <p class="text-muted mb-0">{{ $order->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->shipped_at)
                            <div class="timeline-item">
                                <div class="timeline-marker bg-warning"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Order Shipped</h6>
                                    <p class="text-muted mb-0">{{ $order->shipped_at->format('M d, Y H:i') }}</p>
                                    <small class="text-muted">{{ $order->shipped_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->delivered_at)
                            <div class="timeline-item">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Order Delivered</h6>
                                    <p class="text-muted mb-0">{{ $order->delivered_at->format('M d, Y H:i') }}</p>
                                    <small class="text-muted">{{ $order->delivered_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->status === 'cancelled')
                            <div class="timeline-item">
                                <div class="timeline-marker bg-danger"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Order Cancelled</h6>
                                    <p class="text-muted mb-0">{{ $order->updated_at->format('M d, Y H:i') }}</p>
                                    <small class="text-muted">{{ $order->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Orders
        </a>
        <div>
            <button type="button" 
                    class="btn btn-danger me-2" 
                    onclick="confirmDelete('{{ route('admin.orders.destroy', $order) }}', 'Delete Order', 'Are you sure you want to delete order {{ $order->order_number }}? This action cannot be undone.')">
                <i class="fas fa-trash me-2"></i>Delete Order
            </button>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .timeline {
        position: relative;
        padding-left: 2rem;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
    }
    
    .timeline-marker {
        position: absolute;
        left: -2rem;
        top: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 3px solid white;
        z-index: 1;
    }
    
    .timeline-content {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        margin-left: 1rem;
    }
    
    .timeline-content h6 {
        color: #495057;
        margin-bottom: 0.5rem;
    }
</style>
@endpush

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
