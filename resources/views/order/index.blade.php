@extends('layouts.user')

@section('title', 'My Orders')
@section('page-title', 'My Orders')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-shopping-bag me-2"></i>Order History</h5>
                    <p class="mb-0 text-muted">Track and manage your orders</p>
                </div>
                <div class="table-responsive">
                    @if($orders->count() > 0)
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <strong>{{ $order->order_number }}</strong>
                                        </td>
                                        <td>
                                            <div>
                                                <div class="fw-medium">{{ $order->created_at->format('M d, Y') }}</div>
                                                <small class="text-muted">{{ $order->created_at->format('g:i A') }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div class="fw-medium">{{ $order->items->count() }} item(s)</div>
                                                <small class="text-muted">
                                                    @foreach($order->items->take(2) as $item)
                                                        {{ $item->product->name }}
                                                        @if(!$loop->last), @endif
                                                    @endforeach
                                                    @if($order->items->count() > 2)
                                                        and {{ $order->items->count() - 2 }} more
                                                    @endif
                                                </small>
                                            </div>
                                        </td>
                                        <td>
                                            <strong class="text-success">${{ number_format($order->total, 2) }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge {{ $order->status_badge }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('user.order.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                @if($order->status === 'pending')
                                                    <form method="POST" action="{{ route('user.order.cancel', $order) }}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                onclick="return confirm('Are you sure you want to cancel this order?')">
                                                            <i class="fas fa-times"></i> Cancel
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-shopping-bag fa-4x text-muted"></i>
                            </div>
                            <h4 class="text-muted">No orders found</h4>
                            <p class="text-muted mb-4">You haven't placed any orders yet. Start shopping to see your orders here!</p>
                            <a href="{{ route('user.shop') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                            </a>
                        </div>
                    @endif
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

    .btn-group .btn {
        margin-right: 0.25rem;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }
</style>
@endpush
