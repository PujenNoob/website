/**
 * Comprehensive Form Enhancements with jQuery
 * Adds validation, animations, and user experience improvements to all forms
 */

$(document).ready(function() {
    'use strict';

    // ===========================================
    // FORM VALIDATION ENHANCEMENTS
    // ===========================================
    
    // Real-time validation for all input fields
    $('input, textarea, select').on('blur', function() {
        validateField($(this));
    });

    // Real-time validation for email fields
    $('input[type="email"]').on('input', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && !emailRegex.test(email)) {
            showFieldError($(this), 'Please enter a valid email address');
        } else {
            clearFieldError($(this));
        }
    });

    // Real-time validation for password fields
    $('input[type="password"]').on('input', function() {
        const password = $(this).val();
        const minLength = 8;
        
        if (password && password.length < minLength) {
            showFieldError($(this), `Password must be at least ${minLength} characters long`);
        } else {
            clearFieldError($(this));
        }
    });

    // ===========================================
    // FORM SUBMISSION ENHANCEMENTS
    // ===========================================
    
    // Enhanced form submission with loading states
    $('form').on('submit', function(e) {
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"], input[type="submit"]');
        const originalText = $submitBtn.text() || $submitBtn.val();
        
        // Validate all fields before submission
        let isValid = true;
        $form.find('input[required], textarea[required], select[required]').each(function() {
            if (!validateField($(this))) {
                isValid = false;
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            showFormError($form, 'Please fix the errors above before submitting');
            return false;
        }
        
        // Add loading state
        $submitBtn.prop('disabled', true);
        if ($submitBtn.is('button')) {
            $submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Processing...');
        } else {
            $submitBtn.val('Processing...');
        }
        
        // Add loading class to form
        $form.addClass('form-loading');
        
        // Re-enable button after 10 seconds (fallback)
        setTimeout(function() {
            $submitBtn.prop('disabled', false);
            if ($submitBtn.is('button')) {
                $submitBtn.html(originalText);
            } else {
                $submitBtn.val(originalText);
            }
            $form.removeClass('form-loading');
        }, 10000);
    });

    // ===========================================
    // CONTACT FORM SPECIFIC ENHANCEMENTS
    // ===========================================
    
    // Contact form specific validation
    $('#contactForm').on('submit', function(e) {
        const $form = $(this);
        const name = $form.find('input[placeholder="Name"]').val().trim();
        const email = $form.find('input[placeholder="Email"]').val().trim();
        const message = $form.find('textarea[placeholder="Message"]').val().trim();
        
        if (!name || !email || !message) {
            e.preventDefault();
            showFormError($form, 'Please fill out all required fields.');
            return false;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            showFormError($form, 'Please enter a valid email address.');
            return false;
        }
        
        // Show success message (since form action is "#")
        e.preventDefault();
        showFormSuccess($form, 'Thank you for your message! We will get back to you soon.');
        $form[0].reset();
    });

    // ===========================================
    // NEWSLETTER FORM ENHANCEMENTS
    // ===========================================
    
    // Newsletter form validation
    $('.footer__newslatter form, .footer__newslatter form').on('submit', function(e) {
        const $form = $(this);
        const email = $form.find('input[type="email"], input[placeholder*="email"]').val().trim();
        
        if (!email) {
            e.preventDefault();
            showFormError($form, 'Please enter your email address.');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            showFormError($form, 'Please enter a valid email address.');
            return false;
        }
        
        // Show success message
        e.preventDefault();
        showFormSuccess($form, 'Thank you for subscribing to our newsletter!');
        $form[0].reset();
    });

    // ===========================================
    // AUTHENTICATION FORMS ENHANCEMENTS
    // ===========================================
    
    // Login form enhancements
    $('#loginFormElement').on('submit', function(e) {
        const $form = $(this);
        const email = $form.find('input[name="email"]').val().trim();
        const password = $form.find('input[name="password"]').val().trim();
        
        if (!email || !password) {
            e.preventDefault();
            showFormError($form, 'Please fill out all fields.');
            return false;
        }
    });

    // Registration form enhancements
    $('#registerFormElement').on('submit', function(e) {
        const $form = $(this);
        const name = $form.find('input[name="name"]').val().trim();
        const email = $form.find('input[name="email"]').val().trim();
        const password = $form.find('input[name="password"]').val().trim();
        const confirmPassword = $form.find('input[name="password_confirmation"]').val().trim();
        
        if (!name || !email || !password || !confirmPassword) {
            e.preventDefault();
            showFormError($form, 'Please fill out all fields.');
            return false;
        }
        
        if (password !== confirmPassword) {
            e.preventDefault();
            showFormError($form, 'Passwords do not match.');
            return false;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            showFormError($form, 'Password must be at least 8 characters long.');
            return false;
        }
    });

    // ===========================================
    // SEARCH FORM ENHANCEMENTS
    // ===========================================
    
    // Search form enhancements
    $('.search-model-form').on('submit', function(e) {
        const $form = $(this);
        const searchTerm = $form.find('input[type="text"]').val().trim();
        
        if (!searchTerm) {
            e.preventDefault();
            showFormError($form, 'Please enter a search term.');
            return false;
        }
        
        if (searchTerm.length < 2) {
            e.preventDefault();
            showFormError($form, 'Search term must be at least 2 characters long.');
            return false;
        }
    });

    // ===========================================
    // ADMIN FORMS ENHANCEMENTS
    // ===========================================
    
    // Admin form enhancements
    $('form[action*="admin"]').on('submit', function(e) {
        const $form = $(this);
        const $requiredFields = $form.find('input[required], textarea[required], select[required]');
        
        let isValid = true;
        $requiredFields.each(function() {
            if (!$(this).val().trim()) {
                isValid = false;
                showFieldError($(this), 'This field is required');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            showFormError($form, 'Please fill out all required fields.');
            return false;
        }
    });

    // ===========================================
    // UTILITY FUNCTIONS
    // ===========================================
    
    function validateField($field) {
        const value = $field.val().trim();
        const isRequired = $field.prop('required');
        const fieldType = $field.attr('type');
        
        // Clear previous errors
        clearFieldError($field);
        
        // Required field validation
        if (isRequired && !value) {
            showFieldError($field, 'This field is required');
            return false;
        }
        
        // Email validation
        if (fieldType === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                showFieldError($field, 'Please enter a valid email address');
                return false;
            }
        }
        
        // Password validation
        if (fieldType === 'password' && value) {
            if (value.length < 8) {
                showFieldError($field, 'Password must be at least 8 characters long');
                return false;
            }
        }
        
        // Phone validation (if placeholder contains "phone")
        if ($field.attr('placeholder') && $field.attr('placeholder').toLowerCase().includes('phone') && value) {
            const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
            if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ''))) {
                showFieldError($field, 'Please enter a valid phone number');
                return false;
            }
        }
        
        return true;
    }
    
    function showFieldError($field, message) {
        clearFieldError($field);
        
        $field.addClass('is-invalid');
        $field.after(`<div class="invalid-feedback">${message}</div>`);
        
        // Add shake animation
        $field.addClass('shake');
        setTimeout(() => $field.removeClass('shake'), 500);
    }
    
    function clearFieldError($field) {
        $field.removeClass('is-invalid');
        $field.siblings('.invalid-feedback').remove();
    }
    
    function showFormError($form, message) {
        clearFormMessages($form);
        
        const $alert = $(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
        
        $form.prepend($alert);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => $alert.alert('close'), 5000);
    }
    
    function showFormSuccess($form, message) {
        clearFormMessages($form);
        
        const $alert = $(`
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
        
        $form.prepend($alert);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => $alert.alert('close'), 5000);
    }
    
    function clearFormMessages($form) {
        $form.find('.alert').remove();
    }

    // ===========================================
    // ANIMATION ENHANCEMENTS
    // ===========================================
    
    // Add focus animations to form fields
    $('input, textarea, select').on('focus', function() {
        $(this).closest('.form-group, .mb-3').addClass('focused');
    }).on('blur', function() {
        $(this).closest('.form-group, .mb-3').removeClass('focused');
    });
    
    // Add hover effects to form buttons
    $('button[type="submit"], input[type="submit"]').hover(
        function() { $(this).addClass('btn-hover'); },
        function() { $(this).removeClass('btn-hover'); }
    );

    // ===========================================
    // ACCESSIBILITY ENHANCEMENTS
    // ===========================================
    
    // Add ARIA labels to form fields without labels
    $('input:not([aria-label]):not([aria-labelledby])').each(function() {
        const placeholder = $(this).attr('placeholder');
        if (placeholder) {
            $(this).attr('aria-label', placeholder);
        }
    });
    
    // Add ARIA labels to textareas without labels
    $('textarea:not([aria-label]):not([aria-labelledby])').each(function() {
        const placeholder = $(this).attr('placeholder');
        if (placeholder) {
            $(this).attr('aria-label', placeholder);
        }
    });

    // ===========================================
    // CHARACTER COUNTERS
    // ===========================================
    
    // Add character counters to textareas
    $('textarea[maxlength]').each(function() {
        const $textarea = $(this);
        const maxLength = parseInt($textarea.attr('maxlength'));
        
        if (maxLength > 0) {
            const $counter = $(`<small class="text-muted character-counter">0 / ${maxLength}</small>`);
            $textarea.after($counter);
            
            $textarea.on('input', function() {
                const currentLength = $(this).val().length;
                $counter.text(`${currentLength} / ${maxLength}`);
                
                if (currentLength > maxLength * 0.9) {
                    $counter.addClass('text-warning');
                } else {
                    $counter.removeClass('text-warning');
                }
            });
        }
    });

    // ===========================================
    // FORM RESET ENHANCEMENTS
    // ===========================================
    
    // Enhanced form reset
    $('button[type="reset"], input[type="reset"]').on('click', function() {
        const $form = $(this).closest('form');
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.find('.invalid-feedback').remove();
        $form.find('.alert').remove();
        $form.removeClass('form-loading');
    });

    console.log('Form enhancements loaded successfully!');
});
