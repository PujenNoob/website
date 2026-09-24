@extends('admin.layout')

@section('title', 'Create Product')
@section('page-title', 'Create New Product')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-plus me-2"></i>Create New Product</h5>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="admin-form">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Product Details -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name *</label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
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
                                              required>{{ old('description') }}</textarea>
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
                                               value="{{ old('price') }}" 
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
                                        <option value="clothing" {{ old('category') == 'clothing' ? 'selected' : '' }}>Clothing</option>
                                        <option value="shoes" {{ old('category') == 'shoes' ? 'selected' : '' }}>Shoes</option>
                                        <option value="accessories" {{ old('category') == 'accessories' ? 'selected' : '' }}>Accessories</option>
                                        <option value="bags" {{ old('category') == 'bags' ? 'selected' : '' }}>Bags</option>
                                        <option value="watches" {{ old('category') == 'watches' ? 'selected' : '' }}>Watches</option>
                                        <option value="jewelry" {{ old('category') == 'jewelry' ? 'selected' : '' }}>Jewelry</option>
                                        <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                                        <option value="casual" {{ old('category') == 'casual' ? 'selected' : '' }}>Casual</option>
                                        <option value="formal" {{ old('category') == 'formal' ? 'selected' : '' }}>Formal</option>
                                        <option value="summer" {{ old('category') == 'summer' ? 'selected' : '' }}>Summer</option>
                                        <option value="winter" {{ old('category') == 'winter' ? 'selected' : '' }}>Winter</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <!-- Image Upload -->
                                <div class="mb-3">
                                    <label for="images" class="form-label">Product Images</label>
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
                                
                                <!-- Product Guidelines -->
                                <div class="bg-light rounded p-3 mt-4">
                                    <h6 class="mb-3">Product Guidelines</h6>
                                    <ul class="small text-muted mb-0">
                                        <li>Use clear, high-quality images</li>
                                        <li>Write detailed descriptions</li>
                                        <li>Set competitive pricing</li>
                                        <li>Include product specifications</li>
                                        <li>Add multiple images from different angles</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Products
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Create Product
                            </button>
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
            previewTitle.textContent = 'Image Preview:';
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

    // Auto-resize textarea
    document.getElementById('description').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Price formatting
    document.getElementById('price').addEventListener('input', function() {
        const value = parseFloat(this.value);
        if (!isNaN(value)) {
            // Optional: Add real-time formatting
        }
    });
</script>
@endpush
