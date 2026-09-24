@props(['filters' => [], 'searchPlaceholder' => 'Search...', 'showDateRange' => true, 'showSort' => true])

<div class="filter-panel mb-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">
                    <i class="fas fa-filter me-2"></i>Filters & Search
                </h6>
                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
        <div class="collapse" id="filterCollapse">
            <div class="card-body">
                <form method="GET" action="{{ request()->url() }}" id="filterForm">
                    <!-- Preserve existing query parameters -->
                    @foreach(request()->except(['search', 'status', 'role', 'payment_status', 'payment_method', 'price_min', 'price_max', 'date_from', 'date_to', 'sort_by', 'sort_order', 'page']) as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

                    <div class="row g-3">
                        <!-- Search -->
                        <div class="col-md-4">
                            <label for="search" class="form-label">Search</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="search" 
                                       name="search" 
                                       value="{{ request('search') }}" 
                                       placeholder="{{ $searchPlaceholder }}">
                            </div>
                        </div>

                        <!-- Dynamic Filters -->
                        @foreach($filters as $filter)
                            <div class="col-md-3">
                                <label for="{{ $filter['name'] }}" class="form-label">{{ $filter['label'] }}</label>
                                <select class="form-select" id="{{ $filter['name'] }}" name="{{ $filter['name'] }}">
                                    <option value="">All {{ $filter['label'] }}</option>
                                    @foreach($filter['options'] as $value => $label)
                                        <option value="{{ $value }}" {{ request($filter['name']) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                        <!-- Date Range -->
                        @if($showDateRange)
                            <div class="col-md-3">
                                <label for="date_from" class="form-label">Date From</label>
                                <input type="date" 
                                       class="form-control" 
                                       id="date_from" 
                                       name="date_from" 
                                       value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="date_to" class="form-label">Date To</label>
                                <input type="date" 
                                       class="form-control" 
                                       id="date_to" 
                                       name="date_to" 
                                       value="{{ request('date_to') }}">
                            </div>
                        @endif

                        <!-- Price Range (for products) -->
                        @if($showPriceRange ?? false)
                            <div class="col-md-3">
                                <label for="price_min" class="form-label">Min Price</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="price_min" 
                                       name="price_min" 
                                       value="{{ request('price_min') }}" 
                                       placeholder="0" 
                                       min="0" 
                                       step="0.01">
                            </div>
                            <div class="col-md-3">
                                <label for="price_max" class="form-label">Max Price</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="price_max" 
                                       name="price_max" 
                                       value="{{ request('price_max') }}" 
                                       placeholder="1000" 
                                       min="0" 
                                       step="0.01">
                            </div>
                        @endif

                        <!-- Sort Options -->
                        @if($showSort)
                            <div class="col-md-3">
                                <label for="sort_by" class="form-label">Sort By</label>
                                <select class="form-select" id="sort_by" name="sort_by">
                                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date Created</option>
                                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                                    @if($showPriceRange ?? false)
                                        <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
                                    @endif
                                    @if(isset($filters['status']))
                                        <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                                    @endif
                                    @if(isset($filters['role']))
                                        <option value="role" {{ request('sort_by') == 'role' ? 'selected' : '' }}>Role</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="sort_order" class="form-label">Order</label>
                                <select class="form-select" id="sort_order" name="sort_order">
                                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                </select>
                            </div>
                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-2"></i>Apply Filters
                                </button>
                                <a href="{{ request()->url() }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Clear All
                                </a>
                                <button type="button" class="btn btn-outline-info" onclick="exportResults()">
                                    <i class="fas fa-download me-2"></i>Export
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .filter-panel .card {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    
    .filter-panel .card-header {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-bottom: 1px solid #e2e8f0;
        border-radius: 12px 12px 0 0;
    }
    
    .filter-panel .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }
    
    .filter-panel .form-control,
    .filter-panel .form-select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .filter-panel .form-control:focus,
    .filter-panel .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .filter-panel .input-group-text {
        background: #f8fafc;
        border: 1px solid #d1d5db;
        color: #6b7280;
    }
    
    .filter-panel .btn {
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .filter-panel .btn:hover {
        transform: translateY(-1px);
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto-submit form on filter change
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filterForm');
        const filterInputs = filterForm.querySelectorAll('select, input[type="date"], input[type="number"]');
        
        filterInputs.forEach(input => {
            input.addEventListener('change', function() {
                // Add a small delay to prevent multiple rapid requests
                setTimeout(() => {
                    filterForm.submit();
                }, 300);
            });
        });
    });
    
    // Export functionality
    function exportResults() {
        const form = document.getElementById('filterForm');
        const exportForm = form.cloneNode(true);
        exportForm.action = '{{ request()->url() }}/export';
        exportForm.method = 'POST';
        exportForm.target = '_blank';
        
        // Add CSRF token
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        exportForm.appendChild(csrfToken);
        
        document.body.appendChild(exportForm);
        exportForm.submit();
        document.body.removeChild(exportForm);
    }
</script>
@endpush
