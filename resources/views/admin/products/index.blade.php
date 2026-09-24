@extends('admin.layout')

@section('title', 'Product Management')
@section('page-title', 'Product Management')

@push('styles')
<style>
    .product-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        overflow: hidden;
        position: relative;
    }
    
    .product-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        border-color: #e2e8f0;
    }
    
    .product-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.02);
    }
    
    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .product-card:hover .product-overlay {
        opacity: 1;
    }
    
    .product-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: none;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.875rem;
    }
    
    .action-btn:hover {
        transform: scale(1.05);
        color: white;
    }
    
    .action-btn.view { background: #0ea5e9; }
    .action-btn.edit { background: #f59e0b; }
    .action-btn.external { background: #6366f1; }
    .action-btn.delete { background: #ef4444; }
    
    .product-info {
        padding: 1.25rem;
    }
    
    .product-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #1e293b;
        line-height: 1.4;
    }
    
    .product-description {
        color: #64748b;
        font-size: 0.875rem;
        margin-bottom: 1rem;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .product-price {
        font-size: 1.125rem;
        font-weight: 700;
        color: #059669;
        margin-bottom: 0.75rem;
    }
    
    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.875rem;
        color: #6b7280;
    }
    
    .image-count {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .no-image-placeholder {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 3rem;
    }
    
    .stats-row {
        margin-bottom: 2rem;
    }
    
    .stat-item {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .stat-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: white;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: #1f2937;
    }
    
    .stat-label {
        color: #6b7280;
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .view-toggle {
        background: white;
        border-radius: 8px;
        padding: 0.25rem;
        border: 1px solid #e5e7eb;
    }
    
    .view-toggle .btn {
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    
    .view-toggle .btn.active {
        background: var(--primary-color);
        color: white;
    }
</style>
@endpush

@section('content')
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Product Management</h2>
            <p class="text-muted">Manage your product catalog and inventory</p>
        </div>
        <div class="d-flex gap-3 align-items-center">
            <!-- View Toggle -->
            <div class="view-toggle">
                <button class="btn btn-sm active" id="cardView" onclick="switchView('card')" title="Card View">
                    <i class="fas fa-th"></i>
                </button>
                <button class="btn btn-sm" id="tableView" onclick="switchView('table')" title="Table View">
                    <i class="fas fa-list"></i>
                </button>
            </div>
            
            <span class="badge bg-primary fs-6">{{ $products->total() }} Products</span>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>Add New Product
            </a>
        </div>
    </div>

    <!-- Filter Panel -->
    @include('admin.components.filter-panel', [
        'filters' => [],
        'searchPlaceholder' => 'Search by product name or description...',
        'showDateRange' => true,
        'showPriceRange' => true
    ])

    <!-- Active Filters -->
    @include('admin.components.active-filters')

    <!-- Statistics Row -->
    <div class="row stats-row">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-item">
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #047857);">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-number">{{ $products->total() }}</div>
                <div class="stat-label">Total Products</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-item">
                <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                    <i class="fas fa-images"></i>
                </div>
                <div class="stat-number">{{ $products->sum(function($p) { return $p->images->count(); }) }}</div>
                <div class="stat-label">Total Images</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-item">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-number">${{ number_format($products->avg('price'), 0) }}</div>
                <div class="stat-label">Average Price</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-item">
                <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="stat-number">{{ $products->where('created_at', '>=', now()->subDays(30))->count() }}</div>
                <div class="stat-label">Added This Month</div>
            </div>
        </div>
    </div>

    <!-- Card View -->
    <div id="cardViewContainer">
        <div class="row">
            @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="product-card">
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images->first()->url }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-image"
                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                            @else
                                <div class="no-image-placeholder">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay Actions -->
                            <div class="product-overlay">
                                <div class="product-actions">
                                    <a href="{{ route('admin.products.show', $product) }}" class="action-btn view" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="action-btn edit" title="Edit Product">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('guest.product.detail', $product->id) }}" class="action-btn external" title="View on Site" target="_blank">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <button type="button" 
                                            class="action-btn delete" 
                                            title="Delete Product"
                                            onclick="confirmDelete('{{ route('admin.products.destroy', $product) }}', 'Delete Product', 'Are you sure you want to delete {{ $product->name }}? This will also delete all associated images.')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Image Count Badge -->
                            @if($product->images->count() > 1)
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="image-count">
                                        <i class="fas fa-images me-1"></i>{{ $product->images->count() }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                            <div class="product-price">${{ number_format($product->price, 2) }}</div>
                            <div class="product-meta">
                                <span>
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $product->created_at->format('M d, Y') }}
                                </span>
                                <span>
                                    <i class="fas fa-hashtag me-1"></i>
                                    ID: {{ $product->id }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Table View (Hidden by default) -->
    <div id="tableViewContainer" style="display: none;">
        @include('admin.components.responsive-table', [
            'headers' => [
                'id' => 'ID',
                'name' => 'Product',
                'price' => 'Price',
                'images_count' => 'Images',
                'created_at' => 'Created'
            ],
            'data' => $products->map(function($product) {
                $product->images_count = $product->images->count() . ' ' . ($product->images->count() === 1 ? 'image' : 'images');
                return $product;
            }),
            'actions' => [
                [
                    'type' => 'link',
                    'label' => 'View',
                    'icon' => 'fas fa-eye',
                    'class' => 'info',
                    'url' => fn($product) => route('admin.products.show', $product)
                ],
                [
                    'type' => 'link',
                    'label' => 'Edit',
                    'icon' => 'fas fa-edit',
                    'class' => 'warning',
                    'url' => fn($product) => route('admin.products.edit', $product)
                ],
                [
                    'type' => 'link',
                    'label' => 'View on Site',
                    'icon' => 'fas fa-external-link-alt',
                    'class' => 'primary',
                    'url' => fn($product) => route('guest.product.detail', $product->id),
                    'target' => '_blank'
                ],
                [
                    'type' => 'button',
                    'label' => 'Delete',
                    'icon' => 'fas fa-trash',
                    'class' => 'danger',
                    'onclick' => fn($product) => "confirmDelete('" . route('admin.products.destroy', $product) . "', 'Delete Product', 'Are you sure you want to delete " . $product->name . "? This will also delete all associated images.')"
                ]
            ],
            'model' => 'products',
            'pagination' => $products
        ])
    </div>

    <!-- Clean Pagination -->
    @if($products->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
            </div>
            <div class="pagination-wrapper">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @endif

    <!-- Empty State -->
    @if($products->count() === 0)
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="fas fa-box-open fa-4x text-muted"></i>
            </div>
            <h4 class="text-muted mb-3">No Products Found</h4>
            <p class="text-muted mb-4">Start building your product catalog by adding your first product.</p>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus me-2"></i>Add Your First Product
            </a>
        </div>
    @endif
@endsection

@push('scripts')
<script>
    // View toggle functionality
    function switchView(viewType) {
        const cardView = document.getElementById('cardViewContainer');
        const tableView = document.getElementById('tableViewContainer');
        const cardBtn = document.getElementById('cardView');
        const tableBtn = document.getElementById('tableView');
        
        if (viewType === 'card') {
            cardView.style.display = 'block';
            tableView.style.display = 'none';
            cardBtn.classList.add('active');
            tableBtn.classList.remove('active');
            localStorage.setItem('productViewType', 'card');
        } else {
            cardView.style.display = 'none';
            tableView.style.display = 'block';
            cardBtn.classList.remove('active');
            tableBtn.classList.add('active');
            localStorage.setItem('productViewType', 'table');
        }
    }
    
    // Remember view preference
    document.addEventListener('DOMContentLoaded', function() {
        const savedView = localStorage.getItem('productViewType') || 'card';
        switchView(savedView);
    });
    
    // Delete confirmation function
    function confirmDelete(url, title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete product!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Please wait while we delete the product.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
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
    
    // Add smooth animations to cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.product-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-in');
        });
    });
    
    // Note: Search functionality is now handled by the filter component
</script>

<style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-in {
        animation: slideInUp 0.6s ease-out forwards;
    }
    
    .pagination-wrapper .pagination {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
    }
    
    .pagination-wrapper .page-link {
        border: none;
        padding: 0.5rem 0.75rem;
        color: #64748b;
        transition: all 0.3s ease;
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .pagination-wrapper .page-link:hover {
        background: #f1f5f9;
        color: #475569;
    }
    
    .pagination-wrapper .page-item.active .page-link {
        background: #6366f1;
        color: white;
        box-shadow: 0 2px 4px rgba(99, 102, 241, 0.3);
    }
    
    /* Hide DataTables pagination and info to prevent conflicts */
    .dataTables_paginate,
    .dataTables_info,
    .dataTables_length,
    .dataTables_filter {
        display: none !important;
    }
    
    /* Hide any floating arrow elements */
    .dataTables_wrapper .dataTables_paginate .paginate_button,
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        display: none !important;
    }
    
    /* Clean Table Styles */
    .table-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        overflow: hidden;
    }
    
    .table-card-header {
        background: #f8fafc;
        padding: 1.25rem;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .data-table th {
        background: #f8fafc;
        border: none;
        padding: 0.875rem;
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .data-table td {
        border: none;
        padding: 0.875rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .data-table tbody tr:hover {
        background: #f8fafc;
    }
</style>
@endpush
