{{-- Responsive Table Component --}}
@props([
    'headers' => [],
    'data' => [],
    'actions' => [],
    'bulkActions' => [],
    'model' => 'item',
    'pagination' => null,
    'searchable' => true,
    'sortable' => true
])

<div class="responsive-table-container">
    {{-- Mobile Card View --}}
    <div class="d-md-none mobile-cards">
        @foreach($data as $item)
            <div class="mobile-card mb-3">
                <div class="mobile-card-header d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center">
                        @if(isset($bulkActions) && count($bulkActions) > 0)
                            <input type="checkbox" class="form-check-input me-2 item-checkbox" value="{{ $item->id }}" onchange="toggleItemSelection({{ $item->id }}, this)">
                        @endif
                        <div class="mobile-card-title">
                            @if(isset($headers['name']))
                                <h6 class="mb-1">{{ $item->name ?? $item->title ?? 'Item #' . $item->id }}</h6>
                            @else
                                <h6 class="mb-1">Item #{{ $item->id }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="mobile-card-actions">
                        @if(isset($actions) && count($actions) > 0)
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach($actions as $action)
                                        @if($action['type'] === 'link')
                                            <li><a class="dropdown-item" href="{{ $action['url']($item) }}">
                                                <i class="{{ $action['icon'] ?? 'fas fa-eye' }} me-2"></i>{{ $action['label'] }}
                                            </a></li>
                                        @elseif($action['type'] === 'button')
                                            <li><button class="dropdown-item" onclick="{{ $action['onclick']($item) }}">
                                                <i class="{{ $action['icon'] ?? 'fas fa-edit' }} me-2"></i>{{ $action['label'] }}
                                            </button></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mobile-card-body">
                    @foreach($headers as $key => $header)
                        @if($key !== 'name' && $key !== 'actions' && isset($item->$key))
                            <div class="mobile-card-row">
                                <span class="mobile-card-label">{{ $header }}:</span>
                                <span class="mobile-card-value">
                                    @if($key === 'role')
                                        <span class="badge bg-{{ $item->$key === 'admin' ? 'danger' : 'primary' }}">{{ ucfirst($item->$key) }}</span>
                                    @elseif($key === 'status')
                                        <span class="badge bg-{{ $item->$key === 'active' ? 'success' : 'secondary' }}">{{ ucfirst($item->$key) }}</span>
                                        @elseif($key === 'created_at' || $key === 'updated_at')
                                            {{ \Carbon\Carbon::parse($item->$key)->format('M d, Y') }}
                                        @elseif($key === 'price')
                                            <span class="badge bg-success">${{ number_format($item->$key, 2) }}</span>
                                        @elseif($key === 'images_count')
                                            <span class="badge bg-info">{{ $item->$key }}</span>
                                        @else
                                            {{ $item->$key }}
                                        @endif
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Desktop Table View --}}
    <div class="d-none d-md-block">
        <div class="table-card">
            <div class="table-card-header">
                <h5><i class="fas fa-table me-2"></i>Data Table</h5>
            </div>
            <div class="table-responsive">
                <table class="table data-table">
                    <thead>
                        <tr>
                            @if(isset($bulkActions) && count($bulkActions) > 0)
                                <th style="width: 40px;">
                                    <input type="checkbox" class="form-check-input select-all-checkbox" onchange="selectAllItems(this)">
                                </th>
                            @endif
                            @foreach($headers as $key => $header)
                                <th>{{ $header }}</th>
                            @endforeach
                            @if(isset($actions) && count($actions) > 0)
                                <th style="width: 120px;">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                @if(isset($bulkActions) && count($bulkActions) > 0)
                                    <td>
                                        <input type="checkbox" class="form-check-input item-checkbox" value="{{ $item->id }}" onchange="toggleItemSelection({{ $item->id }}, this)">
                                    </td>
                                @endif
                                @foreach($headers as $key => $header)
                                    <td>
                                        @if($key === 'name')
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                    {{ strtoupper(substr($item->name ?? 'U', 0, 2)) }}
                                                </div>
                                                <div>
                                                    <strong>{{ $item->name ?? $item->title ?? 'Item #' . $item->id }}</strong>
                                                    @if($item->id === auth()->id())
                                                        <span class="badge bg-info ms-2">You</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @elseif($key === 'role')
                                            <span class="badge bg-{{ $item->$key === 'admin' ? 'danger' : 'primary' }}">{{ ucfirst($item->$key) }}</span>
                                        @elseif($key === 'status')
                                            <span class="badge bg-{{ $item->$key === 'active' ? 'success' : 'secondary' }}">{{ ucfirst($item->$key) }}</span>
                                        @elseif($key === 'created_at' || $key === 'updated_at')
                                            {{ \Carbon\Carbon::parse($item->$key)->format('M d, Y') }}
                                        @elseif($key === 'price')
                                            <span class="badge bg-success">${{ number_format($item->$key, 2) }}</span>
                                        @elseif($key === 'images_count')
                                            <span class="badge bg-info">{{ $item->$key }}</span>
                                        @else
                                            {{ $item->$key }}
                                        @endif
                                    </td>
                                @endforeach
                                @if(isset($actions) && count($actions) > 0)
                                    <td>
                                        <div class="btn-group" role="group">
                                            @foreach($actions as $action)
                                                @if($action['type'] === 'link')
                                                    <a href="{{ $action['url']($item) }}" class="btn btn-sm btn-outline-{{ $action['class'] ?? 'primary' }}" title="{{ $action['label'] }}">
                                                        <i class="{{ $action['icon'] ?? 'fas fa-eye' }}"></i>
                                                    </a>
                                                @elseif($action['type'] === 'button')
                                                    <button class="btn btn-sm btn-outline-{{ $action['class'] ?? 'primary' }}" onclick="{{ $action['onclick']($item) }}" title="{{ $action['label'] }}">
                                                        <i class="{{ $action['icon'] ?? 'fas fa-edit' }}"></i>
                                                    </button>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    @if($pagination)
        <div class="d-flex justify-content-center mt-4">
            {{ $pagination->links() }}
        </div>
    @endif
</div>

<style>
    /* Mobile Card Styles */
    .mobile-cards {
        padding: 0;
    }

    .mobile-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #e5e7eb;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .mobile-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .mobile-card-header {
        padding: 1rem;
        border-bottom: 1px solid #f3f4f6;
        background: #f8fafc;
    }

    .mobile-card-title h6 {
        font-weight: 600;
        color: #111827;
        margin: 0;
    }

    .mobile-card-body {
        padding: 1rem;
    }

    .mobile-card-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .mobile-card-row:last-child {
        border-bottom: none;
    }

    .mobile-card-label {
        font-weight: 500;
        color: #6b7280;
        font-size: 0.875rem;
    }

    .mobile-card-value {
        color: #111827;
        font-size: 0.875rem;
        text-align: right;
    }

    .mobile-card-actions .dropdown-toggle {
        border: none;
        background: none;
        color: #6b7280;
        padding: 0.25rem 0.5rem;
    }

    .mobile-card-actions .dropdown-toggle:hover {
        color: #374151;
        background: #f3f4f6;
    }

    /* Responsive Table Container */
    .responsive-table-container {
        width: 100%;
    }

    /* Mobile-specific improvements */
    @media (max-width: 767px) {
        .mobile-card {
            margin-bottom: 1rem;
        }

        .mobile-card-header {
            padding: 0.75rem;
        }

        .mobile-card-body {
            padding: 0.75rem;
        }

        .mobile-card-row {
            padding: 0.4rem 0;
        }

        .mobile-card-label {
            font-size: 0.8rem;
        }

        .mobile-card-value {
            font-size: 0.8rem;
        }
    }

    /* Dark mode support */
    .dark-mode .mobile-card {
        background-color: #2d3748;
        border-color: #4a5568;
    }

    .dark-mode .mobile-card-header {
        background-color: #374151;
        border-bottom-color: #4a5568;
    }

    .dark-mode .mobile-card-title h6 {
        color: #e5e5e5;
    }

    .dark-mode .mobile-card-label {
        color: #9ca3af;
    }

    .dark-mode .mobile-card-value {
        color: #e5e5e5;
    }

    .dark-mode .mobile-card-row {
        border-bottom-color: #4a5568;
    }
</style>

<script>
    // Bulk selection functionality
    function selectAllItems(checkbox) {
        const itemCheckboxes = document.querySelectorAll('.item-checkbox');
        itemCheckboxes.forEach(cb => {
            cb.checked = checkbox.checked;
            toggleItemSelection(cb.value, cb);
        });
    }

    function toggleItemSelection(itemId, checkbox) {
        // Add your bulk action logic here
        const selectedItems = document.querySelectorAll('.item-checkbox:checked');
        const bulkActionsContainer = document.querySelector('.bulk-actions-container');
        
        if (bulkActionsContainer) {
            if (selectedItems.length > 0) {
                bulkActionsContainer.style.display = 'block';
            } else {
                bulkActionsContainer.style.display = 'none';
            }
        }
    }
</script>
