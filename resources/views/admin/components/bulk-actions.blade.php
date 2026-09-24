@props(['actions' => [], 'model' => 'items'])

<div class="bulk-actions-panel mb-3" style="display: none;">
    <div class="card border-warning">
        <div class="card-body py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted small">
                        <span id="selectedCount">0</span> {{ $model }} selected
                    </span>
                    <div class="btn-group" role="group">
                        @foreach($actions as $action)
                            <button type="button" 
                                    class="btn btn-sm {{ $action['class'] ?? 'btn-outline-primary' }}" 
                                    onclick="bulkAction('{{ $action['action'] }}')"
                                    title="{{ $action['title'] ?? $action['label'] }}">
                                <i class="{{ $action['icon'] ?? 'fas fa-check' }} me-1"></i>
                                {{ $action['label'] }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearSelection()">
                    <i class="fas fa-times me-1"></i>Clear Selection
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let selectedItems = new Set();
    
    // Toggle item selection
    function toggleItemSelection(itemId, checkbox) {
        if (checkbox.checked) {
            selectedItems.add(itemId);
        } else {
            selectedItems.delete(itemId);
        }
        updateBulkActionsPanel();
    }
    
    // Select all items
    function selectAllItems(selectAllCheckbox) {
        const itemCheckboxes = document.querySelectorAll('.item-checkbox');
        selectedItems.clear();
        
        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
            if (checkbox.checked) {
                selectedItems.add(checkbox.value);
            }
        });
        
        updateBulkActionsPanel();
    }
    
    // Update bulk actions panel visibility and count
    function updateBulkActionsPanel() {
        const panel = document.querySelector('.bulk-actions-panel');
        const countElement = document.getElementById('selectedCount');
        
        if (selectedItems.size > 0) {
            panel.style.display = 'block';
            countElement.textContent = selectedItems.size;
        } else {
            panel.style.display = 'none';
        }
    }
    
    // Clear all selections
    function clearSelection() {
        selectedItems.clear();
        document.querySelectorAll('.item-checkbox, .select-all-checkbox').forEach(checkbox => {
            checkbox.checked = false;
        });
        updateBulkActionsPanel();
    }
    
    // Perform bulk action
    function bulkAction(action) {
        if (selectedItems.size === 0) {
            alert('Please select at least one item.');
            return;
        }
        
        const actionText = {
            'delete': 'delete',
            'activate': 'activate',
            'deactivate': 'deactivate',
            'export': 'export'
        }[action] || action;
        
        if (confirm(`Are you sure you want to ${actionText} ${selectedItems.size} selected item(s)?`)) {
            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ request()->url() }}/bulk-action';
            
            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);
            
            // Add action
            const actionInput = document.createElement('input');
            actionInput.type = 'hidden';
            actionInput.name = 'action';
            actionInput.value = action;
            form.appendChild(actionInput);
            
            // Add selected items
            selectedItems.forEach(itemId => {
                const itemInput = document.createElement('input');
                itemInput.type = 'hidden';
                itemInput.name = 'items[]';
                itemInput.value = itemId;
                form.appendChild(itemInput);
            });
            
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    }
</script>
@endpush

@push('styles')
<style>
    .bulk-actions-panel .card {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .bulk-actions-panel .btn-group .btn {
        border-radius: 6px;
        font-size: 0.875rem;
        padding: 0.375rem 0.75rem;
    }
    
    .item-checkbox {
        transform: scale(1.1);
    }
    
    .select-all-checkbox {
        transform: scale(1.2);
    }
</style>
@endpush
