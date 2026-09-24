@extends('admin.layout')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product: ' . $product->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Product: {{ $product->name }}</h5>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="admin-form">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Product Details -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name *</label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $product->name) }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="6" 
                                              required>{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" 
                                               class="form-control @error('price') is-invalid @enderror" 
                                               id="price" 
                                               name="price" 
                                               value="{{ old('price', $product->price) }}" 
                                               step="0.01" 
                                               min="0" 
                                               required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category *</label>
                                    <select class="form-control @error('category') is-invalid @enderror" 
                                            id="category" 
                                            name="category" 
                                            required>
                                        <option value="">Select a category</option>
                                        <option value="clothing" {{ old('category', $product->category) == 'clothing' ? 'selected' : '' }}>Clothing</option>
                                        <option value="shoes" {{ old('category', $product->category) == 'shoes' ? 'selected' : '' }}>Shoes</option>
                                        <option value="accessories" {{ old('category', $product->category) == 'accessories' ? 'selected' : '' }}>Accessories</option>
                                        <option value="bags" {{ old('category', $product->category) == 'bags' ? 'selected' : '' }}>Bags</option>
                                        <option value="watches" {{ old('category', $product->category) == 'watches' ? 'selected' : '' }}>Watches</option>
                                        <option value="jewelry" {{ old('category', $product->category) == 'jewelry' ? 'selected' : '' }}>Jewelry</option>
                                        <option value="sports" {{ old('category', $product->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                                        <option value="casual" {{ old('category', $product->category) == 'casual' ? 'selected' : '' }}>Casual</option>
                                        <option value="formal" {{ old('category', $product->category) == 'formal' ? 'selected' : '' }}>Formal</option>
                                        <option value="summer" {{ old('category', $product->category) == 'summer' ? 'selected' : '' }}>Summer</option>
                                        <option value="winter" {{ old('category', $product->category) == 'winter' ? 'selected' : '' }}>Winter</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Product Info -->
                                <div class="bg-light rounded p-3 mb-4">
                                    <h6 class="mb-3">Product Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="text-muted">Product ID:</small>
                                            <p class="mb-2"><strong>#{{ $product->id }}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted">Created:</small>
                                            <p class="mb-2"><strong>{{ $product->created_at->format('M d, Y') }}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted">Last Updated:</small>
                                            <p class="mb-0"><strong>{{ $product->updated_at->format('M d, Y H:i') }}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted">Total Images:</small>
                                            <p class="mb-0"><strong>{{ $product->images->count() }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <!-- Current Images -->
                                @if($product->images->count() > 0)
                                    <div class="mb-4">
                                        <h6>Current Images ({{ $product->images->count() }})</h6>
                                        <div class="row">
                                            @foreach($product->images as $image)
                                                <div class="col-6 mb-3">
                                                    <div class="position-relative">
                                                <img src="{{ $image->url }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="img-thumbnail w-100" 
                                                     style="height: 120px; object-fit: cover;"
                                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                                        <button type="button" 
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" 
                                                                onclick="removeImage({{ $image->id }})"
                                                                title="Remove Image">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                
                                <!-- Add New Images -->
                                <div class="mb-3">
                                    <label for="images" class="form-label">Add New Images</label>
                                    <input type="file" 
                                           class="form-control @error('images.*') is-invalid @enderror" 
                                           id="images" 
                                           name="images[]" 
                                           multiple 
                                           accept="image/*">
                                    <small class="text-muted">You can select multiple images. Max 2MB each.</small>
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Image Preview -->
                                <div id="imagePreview" class="mt-3"></div>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Products
                            </a>
                            <div>
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info me-2">
                                    <i class="fas fa-eye me-2"></i>View Product
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Image Preview Functionality
    document.getElementById('images').addEventListener('change', function() {
        const files = this.files;
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = '';
        
        if (files.length > 0) {
            const previewTitle = document.createElement('h6');
            previewTitle.textContent = 'New Images Preview:';
            previewTitle.className = 'mb-3';
            previewContainer.appendChild(previewTitle);
        }
        
        Array.from(files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageDiv = document.createElement('div');
                    imageDiv.className = 'mb-3';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail';
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '150px';
                    
                    const fileName = document.createElement('small');
                    fileName.textContent = file.name;
                    fileName.className = 'd-block text-muted mt-1';
                    
                    imageDiv.appendChild(img);
                    imageDiv.appendChild(fileName);
                    previewContainer.appendChild(imageDiv);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Remove Image Function
    function removeImage(imageId) {
        Swal.fire({
            title: 'Remove Image?',
            text: 'Are you sure you want to remove this image? This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route('admin.products.images.destroy', ['product' => $product->id, 'image' => ':imageId']) }}`.replace(':imageId', imageId);
                
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

    // Auto-resize textarea
    document.getElementById('description').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
</script>
@endpush
