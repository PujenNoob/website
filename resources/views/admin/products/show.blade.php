@extends('admin.layout')

@section('title', 'View Product')
@section('page-title', 'Product Details: ' . $product->name)

@section('content')
    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-5 mb-4">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-images me-2"></i>Product Images ({{ $product->images->count() }})</h5>
                </div>
                <div class="p-4">
                    @if($product->images->count() > 0)
                        <!-- Main Image -->
                        <div class="mb-3">
                            <img src="{{ $product->images->first()->url }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-fluid rounded" 
                                 id="mainImage"
                                 style="width: 100%; height: 300px; object-fit: cover;"
                                 onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                        </div>
                        
                        <!-- Thumbnail Images -->
                        @if($product->images->count() > 1)
                            <div class="row">
                                @foreach($product->images as $index => $image)
                                    <div class="col-3 mb-2">
                                        <img src="{{ $image->url }}" 
                                             alt="{{ $product->name }}" 
                                             class="img-thumbnail w-100 thumbnail-img {{ $index === 0 ? 'active' : '' }}" 
                                             style="height: 60px; object-fit: cover; cursor: pointer;"
                                             onclick="changeMainImage('{{ $image->url }}', this)"
                                             onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-image fa-4x text-muted mb-3"></i>
                            <p class="text-muted">No images uploaded for this product</p>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                                <i class="fas fa-plus me-2"></i>Add Images
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Product Details -->
        <div class="col-lg-7">
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <h5><i class="fas fa-info-circle me-2"></i>Product Information</h5>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Product ID</label>
                            <p class="h6">#{{ $product->id }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Product Name</label>
                            <p class="h6">{{ $product->name }}</p>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label text-muted">Description</label>
                            <div class="bg-light rounded p-3">
                                <p class="mb-0">{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Price</label>
                            <p class="h4 text-success mb-0">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Total Images</label>
                            <p class="h6">
                                <span class="badge {{ $product->images->count() > 0 ? 'bg-info' : 'bg-warning' }} fs-6">
                                    {{ $product->images->count() }} {{ $product->images->count() === 1 ? 'image' : 'images' }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Timestamps -->
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <h5><i class="fas fa-clock me-2"></i>Timestamps</h5>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Created</label>
                            <p class="h6">{{ $product->created_at->format('M d, Y H:i') }}</p>
                            <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <p class="h6">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                            <small class="text-muted">{{ $product->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-chart-bar me-2"></i>Product Statistics</h5>
                </div>
                <div class="p-4">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-eye fa-2x text-primary mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Views</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-shopping-cart fa-2x text-success mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Orders</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-heart fa-2x text-danger mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Favorites</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-star fa-2x text-warning mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Reviews</small>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Statistics will be available when analytics are implemented
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Products
        </a>
        <div>
            <a href="{{ route('shop_detail', $product->id) }}" class="btn btn-info me-2" target="_blank">
                <i class="fas fa-external-link-alt me-2"></i>View on Site
            </a>
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Edit Product
            </a>
            <button type="button" 
                    class="btn btn-danger" 
                    onclick="confirmDelete('{{ route('admin.products.destroy', $product) }}', 'Delete Product', 'Are you sure you want to delete {{ $product->name }}? This will also delete all associated images.')">
                <i class="fas fa-trash me-2"></i>Delete Product
            </button>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .thumbnail-img {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .thumbnail-img:hover,
    .thumbnail-img.active {
        border-color: var(--primary-color);
        transform: scale(1.05);
    }
    
    #mainImage {
        transition: all 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
    // Change main image when thumbnail is clicked
    function changeMainImage(imageSrc, thumbnail) {
        document.getElementById('mainImage').src = imageSrc;
        
        // Remove active class from all thumbnails
        document.querySelectorAll('.thumbnail-img').forEach(img => {
            img.classList.remove('active');
        });
        
        // Add active class to clicked thumbnail
        thumbnail.classList.add('active');
    }

    // Delete confirmation
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

    // Image zoom functionality (optional enhancement)
    document.getElementById('mainImage')?.addEventListener('click', function() {
        const img = this;
        Swal.fire({
            imageUrl: img.src,
            imageAlt: '{{ $product->name }}',
            showConfirmButton: false,
            showCloseButton: true,
            width: 'auto',
            customClass: {
                image: 'img-fluid'
            }
        });
    });
</script>
@endpush
