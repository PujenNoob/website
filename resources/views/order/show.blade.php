@extends('layouts.user')

@section('title', 'Order Details')
@section('page-title', 'Order Details: ' . $order->order_number)

@section('content')
<div class="container-fluid">
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
                        <label class="form-label text-muted">Order Date</label>
                        <p class="mb-0">{{ $order->created_at->format('M d, Y g:i A') }}</p>
                    </div>
                    
                    @if($order->status === 'pending')
                        <div class="d-grid">
                            <form method="POST" action="{{ route('user.order.cancel', $order) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger" 
                                        onclick="return confirm('Are you sure you want to cancel this order?')">
                                    <i class="fas fa-times me-2"></i>Cancel Order
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Billing Information -->
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-map-marker-alt me-2"></i>Billing Address</h5>
                </div>
                <div class="p-4">
                    <div class="address-info">
                        <p class="mb-1"><strong>{{ $order->billing_name }}</strong></p>
                        @if($order->billing_address)
                            <p class="mb-1">{{ $order->billing_address }}</p>
                        @endif
                        @if($order->billing_city)
                            <p class="mb-1">{{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_postal_code }}</p>
                        @endif
                        @if($order->billing_country)
                            <p class="mb-1">{{ $order->billing_country }}</p>
                        @endif
                        @if($order->billing_phone)
                            <p class="mb-0"><i class="fas fa-phone me-1"></i>{{ $order->billing_phone }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="col-lg-8 mb-4">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-box me-2"></i>Order Items</h5>
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
                                                     alt="{{ $item->product->name }}" 
                                                     class="me-3" 
                                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;"
                                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                            @else
                                                <div class="me-3 bg-light d-flex align-items-center justify-content-center" 
                                                     style="width: 60px; height: 60px; border-radius: 8px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-1">{{ $item->product->name ?? 'Product Not Found' }}</h6>
                                                @if($item->product && $item->product->category)
                                                    <small class="text-muted">{{ $item->product->category }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-medium">${{ number_format($item->price, 2) }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $item->quantity }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-top">
                                <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                                <td class="fw-bold">${{ number_format($order->total, 2) }}</td>
                            </tr>
                            @if($order->tax_amount > 0)
                                <tr>
                                    <td colspan="3" class="text-end">Tax:</td>
                                    <td>${{ number_format($order->tax_amount, 2) }}</td>
                                </tr>
                            @endif
                            @if($order->shipping_amount > 0)
                                <tr>
                                    <td colspan="3" class="text-end">Shipping:</td>
                                    <td>${{ number_format($order->shipping_amount, 2) }}</td>
                                </tr>
                            @endif
                            <tr class="border-top">
                                <td colspan="3" class="text-end fw-bold fs-5">Total:</td>
                                <td class="fw-bold fs-5 text-success">${{ number_format($order->total, 2) }}</td>
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
                        <div class="timeline-item completed">
                            <div class="timeline-marker">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Order Placed</h6>
                                <p class="text-muted mb-0">{{ $order->created_at->format('M d, Y g:i A') }}</p>
                            </div>
                        </div>
                        
                        @if($order->status === 'confirmed' || in_array($order->status, ['processing', 'shipped', 'delivered']))
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Order Confirmed</h6>
                                    <p class="text-muted mb-0">Your order has been confirmed</p>
                                </div>
                            </div>
                        @else
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Order Confirmation</h6>
                                    <p class="text-muted mb-0">Waiting for confirmation</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->status === 'processing' || in_array($order->status, ['shipped', 'delivered']))
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Processing</h6>
                                    <p class="text-muted mb-0">Your order is being prepared</p>
                                </div>
                            </div>
                        @else
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Processing</h6>
                                    <p class="text-muted mb-0">Not yet started</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->status === 'shipped' || $order->status === 'delivered')
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Shipped</h6>
                                    <p class="text-muted mb-0">Your order is on the way</p>
                                </div>
                            </div>
                        @else
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Shipping</h6>
                                    <p class="text-muted mb-0">Not yet shipped</p>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->status === 'delivered')
                            <div class="timeline-item completed">
                                <div class="timeline-marker">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Delivered</h6>
                                    <p class="text-muted mb-0">Order delivered successfully</p>
                                </div>
                            </div>
                        @else
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Delivery</h6>
                                    <p class="text-muted mb-0">Not yet delivered</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
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

    .badge {
        font-weight: 500;
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem;
        border-radius: 6px;
    }

    .address-info p {
        margin-bottom: 0.25rem;
    }

    /* Timeline Styles */
    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 1rem;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 2rem;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-marker {
        position: absolute;
        left: -2rem;
        top: 0;
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.75rem;
    }

    .timeline-item.completed .timeline-marker {
        background: #10b981;
    }

    .timeline-content h6 {
        margin: 0;
        font-weight: 600;
        color: #374151;
    }

    .timeline-content p {
        margin: 0;
        font-size: 0.875rem;
    }
</style>
@endpush
