@extends('admin.layout')

@section('title', 'User Management')
@section('page-title', 'User Management')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Users</h2>
            <p class="text-muted">Manage all registered users</p>
        </div>
        <div class="d-flex gap-2">
            <span class="badge bg-primary fs-6">{{ $users->total() }} Users</span>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New User
            </a>
        </div>
    </div>

    <!-- Filter Panel -->
    @include('admin.components.filter-panel', [
        'filters' => [
            [
                'name' => 'role',
                'label' => 'Role',
                'options' => [
                    'admin' => 'Admin',
                    'user' => 'User'
                ]
            ]
        ],
        'searchPlaceholder' => 'Search by name or email...'
    ])

    <!-- Active Filters -->
    @include('admin.components.active-filters')

    <!-- Bulk Actions -->
    @include('admin.components.bulk-actions', [
        'actions' => [
            [
                'action' => 'delete',
                'label' => 'Delete',
                'icon' => 'fas fa-trash',
                'class' => 'btn-outline-danger',
                'title' => 'Delete selected users'
            ],
            [
                'action' => 'export',
                'label' => 'Export',
                'icon' => 'fas fa-download',
                'class' => 'btn-outline-info',
                'title' => 'Export selected users'
            ]
        ],
        'model' => 'users'
    ])

    @include('admin.components.responsive-table', [
        'headers' => [
            'id' => 'ID',
            'name' => 'User',
            'email' => 'Email',
            'role' => 'Role',
            'created_at' => 'Joined'
        ],
        'data' => $users,
        'actions' => [
            [
                'type' => 'link',
                'label' => 'View',
                'icon' => 'fas fa-eye',
                'class' => 'info',
                'url' => fn($user) => route('admin.users.show', $user)
            ],
            [
                'type' => 'link',
                'label' => 'Edit',
                'icon' => 'fas fa-edit',
                'class' => 'warning',
                'url' => fn($user) => route('admin.users.edit', $user)
            ],
            [
                'type' => 'button',
                'label' => 'Delete',
                'icon' => 'fas fa-trash',
                'class' => 'danger',
                'onclick' => fn($user) => "confirmDelete('" . route('admin.users.destroy', $user) . "', 'Delete User', 'Are you sure you want to delete " . $user->name . "?')",
                'condition' => fn($user) => $user->id !== auth()->id()
            ]
        ],
        'bulkActions' => [
            [
                'action' => 'delete',
                'label' => 'Delete',
                'icon' => 'fas fa-trash',
                'class' => 'btn-outline-danger',
                'title' => 'Delete selected users'
            ],
            [
                'action' => 'export',
                'label' => 'Export',
                'icon' => 'fas fa-download',
                'class' => 'btn-outline-info',
                'title' => 'Export selected users'
            ]
        ],
        'model' => 'users',
        'pagination' => $users
    ])
@endsection

@push('scripts')
<script>
    // Custom delete function for users
    function confirmDelete(url, title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete user!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form and submit it
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
</script>
@endpush
