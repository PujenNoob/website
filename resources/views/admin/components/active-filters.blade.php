@if(request()->hasAny(['search', 'status', 'role', 'payment_status', 'payment_method', 'price_min', 'price_max', 'date_from', 'date_to', 'sort_by', 'sort_order']))
    <div class="active-filters mb-3">
        <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="text-muted small me-2">
                <i class="fas fa-filter me-1"></i>Active Filters:
            </span>
            
            @if(request('search'))
                <span class="badge bg-primary">
                    Search: "{{ request('search') }}"
                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="text-white ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('status'))
                <span class="badge bg-info">
                    Status: {{ ucfirst(request('status')) }}
                    <a href="{{ request()->fullUrlWithQuery(['status' => null]) }}" class="text-white ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('role'))
                <span class="badge bg-warning">
                    Role: {{ ucfirst(request('role')) }}
                    <a href="{{ request()->fullUrlWithQuery(['role' => null]) }}" class="text-white ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('payment_status'))
                <span class="badge bg-success">
                    Payment: {{ ucfirst(request('payment_status')) }}
                    <a href="{{ request()->fullUrlWithQuery(['payment_status' => null]) }}" class="text-white ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('payment_method'))
                <span class="badge bg-secondary">
                    Method: {{ ucwords(str_replace('_', ' ', request('payment_method'))) }}
                    <a href="{{ request()->fullUrlWithQuery(['payment_method' => null]) }}" class="text-white ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('price_min') || request('price_max'))
                <span class="badge bg-dark">
                    Price: ${{ request('price_min', '0') }} - ${{ request('price_max', '∞') }}
                    <a href="{{ request()->fullUrlWithQuery(['price_min' => null, 'price_max' => null]) }}" class="text-white ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('date_from') || request('date_to'))
                <span class="badge bg-light text-dark">
                    Date: {{ request('date_from', 'Start') }} to {{ request('date_to', 'End') }}
                    <a href="{{ request()->fullUrlWithQuery(['date_from' => null, 'date_to' => null]) }}" class="text-dark ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            @if(request('sort_by') && request('sort_by') !== 'created_at')
                <span class="badge bg-outline-primary">
                    Sort: {{ ucfirst(str_replace('_', ' ', request('sort_by'))) }} ({{ request('sort_order', 'desc') }})
                    <a href="{{ request()->fullUrlWithQuery(['sort_by' => null, 'sort_order' => null]) }}" class="text-primary ms-1" title="Remove filter">
                        <i class="fas fa-times"></i>
                    </a>
                </span>
            @endif
            
            <a href="{{ request()->url() }}" class="btn btn-sm btn-outline-danger">
                <i class="fas fa-times me-1"></i>Clear All
            </a>
        </div>
    </div>
@endif

@push('styles')
<style>
    .active-filters .badge {
        font-size: 0.75rem;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .active-filters .badge a {
        text-decoration: none;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }
    
    .active-filters .badge a:hover {
        opacity: 1;
    }
    
    .active-filters .btn {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
    }
</style>
@endpush
