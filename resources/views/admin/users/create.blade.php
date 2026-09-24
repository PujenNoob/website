@extends('admin.layout')

@section('title', 'Create User')
@section('page-title', 'Create New User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @include('admin.components.responsive-form', [
                'method' => 'POST',
                'action' => route('admin.users.store'),
                'title' => 'Create New User',
                'description' => 'Fill in the details below to create a new user account.',
                'fields' => [
                    [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'Full Name',
                        'placeholder' => 'Enter full name',
                        'value' => old('name'),
                        'required' => true,
                        'group_class' => 'col-md-6'
                    ],
                    [
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email Address',
                        'placeholder' => 'Enter email address',
                        'value' => old('email'),
                        'required' => true,
                        'group_class' => 'col-md-6'
                    ],
                    [
                        'type' => 'password',
                        'name' => 'password',
                        'label' => 'Password',
                        'placeholder' => 'Enter password',
                        'required' => true,
                        'help' => 'Password must be at least 8 characters long',
                        'group_class' => 'col-md-6'
                    ],
                    [
                        'type' => 'password',
                        'name' => 'password_confirmation',
                        'label' => 'Confirm Password',
                        'placeholder' => 'Confirm password',
                        'required' => true,
                        'group_class' => 'col-md-6'
                    ],
                    [
                        'type' => 'select',
                        'name' => 'role',
                        'label' => 'Role',
                        'placeholder' => 'Select role',
                        'value' => old('role'),
                        'required' => true,
                        'options' => [
                            'user' => 'User',
                            'admin' => 'Admin'
                        ],
                        'help' => 'Choose the user role and permissions'
                    ]
                ],
                'submitText' => 'Create User',
                'submitClass' => 'btn-primary',
                'cancelUrl' => route('admin.users.index'),
                'cancelText' => 'Back to Users'
            ])
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Password strength indicator (optional enhancement)
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strength = document.getElementById('password-strength');
        
        if (password.length === 0) {
            if (strength) strength.remove();
            return;
        }
        
        let score = 0;
        if (password.length >= 8) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/[0-9]/.test(password)) score++;
        if (/[^A-Za-z0-9]/.test(password)) score++;
        
        let strengthText = '';
        let strengthClass = '';
        
        switch (score) {
            case 0:
            case 1:
                strengthText = 'Very Weak';
                strengthClass = 'text-danger';
                break;
            case 2:
                strengthText = 'Weak';
                strengthClass = 'text-warning';
                break;
            case 3:
                strengthText = 'Medium';
                strengthClass = 'text-info';
                break;
            case 4:
                strengthText = 'Strong';
                strengthClass = 'text-success';
                break;
            case 5:
                strengthText = 'Very Strong';
                strengthClass = 'text-success';
                break;
        }
        
        let strengthIndicator = document.getElementById('password-strength');
        if (!strengthIndicator) {
            strengthIndicator = document.createElement('small');
            strengthIndicator.id = 'password-strength';
            this.parentNode.appendChild(strengthIndicator);
        }
        
        strengthIndicator.className = `${strengthClass} d-block mt-1`;
        strengthIndicator.textContent = `Password Strength: ${strengthText}`;
    });
</script>
@endpush
