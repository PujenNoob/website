{{-- Responsive Form Component --}}
@props([
    'method' => 'POST',
    'action' => '',
    'enctype' => 'application/x-www-form-urlencoded',
    'fields' => [],
    'submitText' => 'Save',
    'submitClass' => 'btn-primary',
    'cancelUrl' => null,
    'cancelText' => 'Cancel',
    'title' => null,
    'description' => null
])

<div class="responsive-form-container">
    @if($title || $description)
        <div class="form-header mb-4">
            @if($title)
                <h3 class="form-title">{{ $title }}</h3>
            @endif
            @if($description)
                <p class="form-description text-muted">{{ $description }}</p>
            @endif
        </div>
    @endif

    <form method="{{ $method === 'GET' ? 'GET' : 'POST' }}" 
          action="{{ $action }}" 
          enctype="{{ $enctype }}"
          class="responsive-form">
        @csrf
        @if($method !== 'GET' && $method !== 'POST')
            @method($method)
        @endif

        <div class="form-fields">
            @foreach($fields as $field)
                <div class="form-field-group {{ $field['group_class'] ?? '' }}">
                    @if($field['type'] === 'text' || $field['type'] === 'email' || $field['type'] === 'password' || $field['type'] === 'number' || $field['type'] === 'tel' || $field['type'] === 'url')
                        <div class="form-floating mb-3">
                            <input type="{{ $field['type'] }}" 
                                   class="form-control @error($field['name']) is-invalid @enderror" 
                                   id="{{ $field['name'] }}" 
                                   name="{{ $field['name'] }}" 
                                   placeholder="{{ $field['placeholder'] ?? $field['label'] }}"
                                   value="{{ old($field['name'], $field['value'] ?? '') }}"
                                   {{ $field['required'] ?? false ? 'required' : '' }}
                                   {{ $field['readonly'] ?? false ? 'readonly' : '' }}
                                   {{ $field['disabled'] ?? false ? 'disabled' : '' }}
                                   {{ isset($field['min']) ? 'min=' . $field['min'] : '' }}
                                   {{ isset($field['max']) ? 'max=' . $field['max'] : '' }}
                                   {{ isset($field['step']) ? 'step=' . $field['step'] : '' }}>
                            <label for="{{ $field['name'] }}">{{ $field['label'] }}{{ $field['required'] ?? false ? ' *' : '' }}</label>
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($field['help']))
                                <div class="form-text">{{ $field['help'] }}</div>
                            @endif
                        </div>

                    @elseif($field['type'] === 'textarea')
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error($field['name']) is-invalid @enderror" 
                                      id="{{ $field['name'] }}" 
                                      name="{{ $field['name'] }}" 
                                      placeholder="{{ $field['placeholder'] ?? $field['label'] }}"
                                      style="height: {{ $field['height'] ?? '100px' }}"
                                      {{ $field['required'] ?? false ? 'required' : '' }}
                                      {{ $field['readonly'] ?? false ? 'readonly' : '' }}
                                      {{ $field['disabled'] ?? false ? 'disabled' : '' }}>{{ old($field['name'], $field['value'] ?? '') }}</textarea>
                            <label for="{{ $field['name'] }}">{{ $field['label'] }}{{ $field['required'] ?? false ? ' *' : '' }}</label>
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($field['help']))
                                <div class="form-text">{{ $field['help'] }}</div>
                            @endif
                        </div>

                    @elseif($field['type'] === 'select')
                        <div class="form-floating mb-3">
                            <select class="form-select @error($field['name']) is-invalid @enderror" 
                                    id="{{ $field['name'] }}" 
                                    name="{{ $field['name'] }}"
                                    {{ $field['required'] ?? false ? 'required' : '' }}
                                    {{ $field['disabled'] ?? false ? 'disabled' : '' }}>
                                @if(isset($field['placeholder']))
                                    <option value="">{{ $field['placeholder'] }}</option>
                                @endif
                                @foreach($field['options'] as $value => $label)
                                    <option value="{{ $value }}" {{ old($field['name'], $field['value'] ?? '') == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="{{ $field['name'] }}">{{ $field['label'] }}{{ $field['required'] ?? false ? ' *' : '' }}</label>
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($field['help']))
                                <div class="form-text">{{ $field['help'] }}</div>
                            @endif
                        </div>

                    @elseif($field['type'] === 'checkbox')
                        <div class="form-check mb-3">
                            <input class="form-check-input @error($field['name']) is-invalid @enderror" 
                                   type="checkbox" 
                                   id="{{ $field['name'] }}" 
                                   name="{{ $field['name'] }}" 
                                   value="1"
                                   {{ old($field['name'], $field['value'] ?? false) ? 'checked' : '' }}
                                   {{ $field['required'] ?? false ? 'required' : '' }}
                                   {{ $field['disabled'] ?? false ? 'disabled' : '' }}>
                            <label class="form-check-label" for="{{ $field['name'] }}">
                                {{ $field['label'] }}{{ $field['required'] ?? false ? ' *' : '' }}
                            </label>
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($field['help']))
                                <div class="form-text">{{ $field['help'] }}</div>
                            @endif
                        </div>

                    @elseif($field['type'] === 'radio')
                        <div class="mb-3">
                            <label class="form-label">{{ $field['label'] }}{{ $field['required'] ?? false ? ' *' : '' }}</label>
                            @foreach($field['options'] as $value => $label)
                                <div class="form-check">
                                    <input class="form-check-input @error($field['name']) is-invalid @enderror" 
                                           type="radio" 
                                           id="{{ $field['name'] }}_{{ $value }}" 
                                           name="{{ $field['name'] }}" 
                                           value="{{ $value }}"
                                           {{ old($field['name'], $field['value'] ?? '') == $value ? 'checked' : '' }}
                                           {{ $field['required'] ?? false ? 'required' : '' }}
                                           {{ $field['disabled'] ?? false ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="{{ $field['name'] }}_{{ $value }}">
                                        {{ $label }}
                                    </label>
                                </div>
                            @endforeach
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($field['help']))
                                <div class="form-text">{{ $field['help'] }}</div>
                            @endif
                        </div>

                    @elseif($field['type'] === 'file')
                        <div class="mb-3">
                            <label for="{{ $field['name'] }}" class="form-label">
                                {{ $field['label'] }}{{ $field['required'] ?? false ? ' *' : '' }}
                            </label>
                            <input type="file" 
                                   class="form-control @error($field['name']) is-invalid @enderror" 
                                   id="{{ $field['name'] }}" 
                                   name="{{ $field['name'] }}"
                                   {{ $field['required'] ?? false ? 'required' : '' }}
                                   {{ $field['disabled'] ?? false ? 'disabled' : '' }}
                                   {{ isset($field['accept']) ? 'accept=' . $field['accept'] : '' }}
                                   {{ isset($field['multiple']) && $field['multiple'] ? 'multiple' : '' }}>
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(isset($field['help']))
                                <div class="form-text">{{ $field['help'] }}</div>
                            @endif
                            @if(isset($field['current_value']) && $field['current_value'])
                                <div class="mt-2">
                                    <small class="text-muted">Current: {{ $field['current_value'] }}</small>
                                </div>
                            @endif
                        </div>

                    @elseif($field['type'] === 'hidden')
                        <input type="hidden" 
                               name="{{ $field['name'] }}" 
                               value="{{ $field['value'] ?? '' }}">

                    @elseif($field['type'] === 'custom')
                        <div class="mb-3">
                            {!! $field['content'] !!}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="form-actions">
            <div class="d-flex flex-column flex-md-row gap-2 justify-content-end">
                @if($cancelUrl)
                    <a href="{{ $cancelUrl }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>{{ $cancelText }}
                    </a>
                @endif
                <button type="submit" class="btn {{ $submitClass }}">
                    <i class="fas fa-save me-2"></i>{{ $submitText }}
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    /* Responsive Form Styles */
    .responsive-form-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        padding: 2rem;
    }

    .form-header {
        border-bottom: 1px solid #e2e8f0;
        padding-bottom: 1rem;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1e293b;
        margin: 0;
    }

    .form-description {
        margin: 0.5rem 0 0 0;
        font-size: 0.95rem;
    }

    .form-fields {
        margin-bottom: 2rem;
    }

    .form-field-group {
        margin-bottom: 1rem;
    }

    .form-actions {
        border-top: 1px solid #e2e8f0;
        padding-top: 1.5rem;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .responsive-form-container {
            padding: 1.5rem;
            margin: 0 -0.5rem;
            border-radius: 8px;
        }

        .form-title {
            font-size: 1.25rem;
        }

        .form-description {
            font-size: 0.875rem;
        }

        .form-actions .d-flex {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .form-actions .btn:last-child {
            margin-bottom: 0;
        }

        /* Mobile form controls */
        .form-control,
        .form-select {
            font-size: 16px; /* Prevents zoom on iOS */
            padding: 0.75rem 1rem;
        }

        .form-floating > label {
            font-size: 0.875rem;
        }

        /* Mobile file inputs */
        .form-control[type="file"] {
            padding: 0.5rem;
        }

        /* Mobile checkboxes and radios */
        .form-check {
            padding-left: 1.5rem;
        }

        .form-check-input {
            width: 1.25rem;
            height: 1.25rem;
        }

        .form-check-label {
            font-size: 0.95rem;
            padding-left: 0.5rem;
        }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
        .responsive-form-container {
            padding: 1rem;
        }

        .form-title {
            font-size: 1.1rem;
        }

        .form-control,
        .form-select {
            font-size: 16px;
            padding: 0.6rem 0.8rem;
        }
    }

    /* Dark Mode Support */
    .dark-mode .responsive-form-container {
        background-color: #2d3748;
        border-color: #4a5568;
    }

    .dark-mode .form-header {
        border-bottom-color: #4a5568;
    }

    .dark-mode .form-title {
        color: #e5e5e5;
    }

    .dark-mode .form-description {
        color: #9ca3af;
    }

    .dark-mode .form-actions {
        border-top-color: #4a5568;
    }

    /* Form validation styles */
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #ef4444;
        box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.25);
    }

    .form-control.is-valid,
    .form-select.is-valid {
        border-color: #10b981;
        box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
    }

    /* Loading state */
    .form-loading {
        opacity: 0.6;
        pointer-events: none;
    }

    .form-loading .btn {
        position: relative;
    }

    .form-loading .btn::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        margin: auto;
        border: 2px solid transparent;
        border-top-color: #ffffff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    // Form enhancement script
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.responsive-form');
        if (form) {
            // Add loading state on submit
            form.addEventListener('submit', function() {
                this.classList.add('form-loading');
            });

            // Auto-resize textareas
            const textareas = form.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = this.scrollHeight + 'px';
                });
            });

            // File input preview
            const fileInputs = form.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const files = this.files;
                    if (files.length > 0) {
                        const preview = this.parentNode.querySelector('.file-preview');
                        if (preview) {
                            preview.remove();
                        }
                        
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'file-preview mt-2';
                        
                        Array.from(files).forEach(file => {
                            const fileInfo = document.createElement('div');
                            fileInfo.className = 'badge bg-info me-2 mb-2';
                            fileInfo.textContent = file.name;
                            previewDiv.appendChild(fileInfo);
                        });
                        
                        this.parentNode.appendChild(previewDiv);
                    }
                });
            });
        }
    });
</script>
