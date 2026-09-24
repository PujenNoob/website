/**
 * UI Enhancements for Male Fashion
 * Common JavaScript functionality for improved user experience
 */

(function() {
    'use strict';

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initializeUI();
    });

    function initializeUI() {
        // Initialize tooltips
        initializeTooltips();
        
        // Initialize form validation
        initializeFormValidation();
        
        // Initialize loading states
        initializeLoadingStates();
        
        // Initialize accessibility features
        initializeAccessibility();
        
        // Initialize responsive features
        initializeResponsiveFeatures();
        
        // Initialize animations
        initializeAnimations();
    }

    /**
     * Initialize Bootstrap tooltips
     */
    function initializeTooltips() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    /**
     * Initialize form validation and enhancements
     */
    function initializeFormValidation() {
        // Real-time validation for forms
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        // Auto-format phone numbers
        var phoneInputs = document.querySelectorAll('input[type="tel"], input[name*="phone"]');
        phoneInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });

        // Auto-format names (capitalize first letter of each word)
        var nameInputs = document.querySelectorAll('input[name*="name"]');
        nameInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                var words = this.value.split(' ');
                for (var i = 0; i < words.length; i++) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                }
                this.value = words.join(' ');
            });
        });
    }

    /**
     * Initialize loading states for buttons and forms
     */
    function initializeLoadingStates() {
        // Add loading state to form submissions
        var forms = document.querySelectorAll('form');
        forms.forEach(function(form) {
            form.addEventListener('submit', function() {
                var submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.classList.add('btn-loading');
                    submitBtn.disabled = true;
                }
                form.classList.add('loading');
            });
        });

        // Add loading state to buttons with data-loading attribute
        var loadingButtons = document.querySelectorAll('[data-loading]');
        loadingButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                this.classList.add('btn-loading');
                this.disabled = true;
            });
        });
    }

    /**
     * Initialize accessibility features
     */
    function initializeAccessibility() {
        // Skip to content link
        var skipLink = document.createElement('a');
        skipLink.href = '#main-content';
        skipLink.textContent = 'Skip to main content';
        skipLink.className = 'skip-link';
        document.body.insertBefore(skipLink, document.body.firstChild);

        // Add main content ID if it doesn't exist
        var mainContent = document.querySelector('main, .main-content, #main-content');
        if (mainContent && !mainContent.id) {
            mainContent.id = 'main-content';
        }

        // Improve focus management for dropdowns
        var dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(function(dropdown) {
            var toggle = dropdown.querySelector('.dropdown-toggle');
            var menu = dropdown.querySelector('.dropdown-menu');
            
            if (toggle && menu) {
                toggle.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        toggle.click();
                    }
                });
            }
        });

        // Add ARIA labels to buttons without text
        var iconButtons = document.querySelectorAll('button:not([aria-label]):not([title])');
        iconButtons.forEach(function(button) {
            var icon = button.querySelector('i[class*="fa-"]');
            if (icon) {
                var iconClass = icon.className;
                var label = getIconLabel(iconClass);
                if (label) {
                    button.setAttribute('aria-label', label);
                }
            }
        });
    }

    /**
     * Get human-readable label for Font Awesome icons
     */
    function getIconLabel(iconClass) {
        var iconLabels = {
            'fa-shopping-cart': 'Shopping Cart',
            'fa-user': 'User Account',
            'fa-search': 'Search',
            'fa-heart': 'Add to Wishlist',
            'fa-eye': 'View Details',
            'fa-edit': 'Edit',
            'fa-trash': 'Delete',
            'fa-plus': 'Add',
            'fa-minus': 'Remove',
            'fa-times': 'Close',
            'fa-bars': 'Menu',
            'fa-arrow-left': 'Go Back',
            'fa-arrow-right': 'Go Forward',
            'fa-check': 'Confirm',
            'fa-close': 'Close'
        };

        for (var icon in iconLabels) {
            if (iconClass.includes(icon)) {
                return iconLabels[icon];
            }
        }
        return null;
    }

    /**
     * Initialize responsive features
     */
    function initializeResponsiveFeatures() {
        // Mobile menu toggle
        var mobileMenuToggle = document.querySelector('#mobile-menu-toggle');
        var mobileMenu = document.querySelector('#mobile-menu');
        
        if (mobileMenuToggle && mobileMenu) {
            mobileMenuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
                this.classList.toggle('active');
                
                // Update ARIA attributes
                var isExpanded = mobileMenu.classList.contains('active');
                this.setAttribute('aria-expanded', isExpanded);
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!mobileMenuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                    mobileMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                }
            });

            // Close mobile menu when pressing Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                    mobileMenuToggle.focus();
                }
            });

            // Close mobile menu when clicking on a link
            var mobileNavLinks = mobileMenu.querySelectorAll('.mobile-nav-link');
            mobileNavLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    mobileMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                });
            });
        }

        // Responsive table wrapper
        var tables = document.querySelectorAll('table');
        tables.forEach(function(table) {
            if (!table.closest('.table-responsive')) {
                var wrapper = document.createElement('div');
                wrapper.className = 'table-responsive';
                table.parentNode.insertBefore(wrapper, table);
                wrapper.appendChild(table);
            }
        });
    }

    /**
     * Initialize animations and transitions
     */
    function initializeAnimations() {
        // Intersection Observer for fade-in animations
        if ('IntersectionObserver' in window) {
            var observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe elements with animation classes
            var animatedElements = document.querySelectorAll('.animate-on-scroll, .stat-card, .modern-card, .product__item');
            animatedElements.forEach(function(element) {
                observer.observe(element);
            });
        }

        // Smooth scrolling for anchor links
        var anchorLinks = document.querySelectorAll('a[href^="#"]');
        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Utility function to show toast notifications
     */
    function showToast(message, type = 'info') {
        var toast = document.createElement('div');
        toast.className = 'toast align-items-center text-white bg-' + type + ' border-0';
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.setAttribute('aria-atomic', 'true');
        
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;

        var toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(toastContainer);
        }

        toastContainer.appendChild(toast);
        
        var bsToast = new bootstrap.Toast(toast);
        bsToast.show();

        // Remove toast element after it's hidden
        toast.addEventListener('hidden.bs.toast', function() {
            toast.remove();
        });
    }

    /**
     * Utility function to format currency
     */
    function formatCurrency(amount, currency = 'USD') {
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: currency
        }).format(amount);
    }

    /**
     * Utility function to debounce function calls
     */
    function debounce(func, wait) {
        var timeout;
        return function executedFunction() {
            var later = function() {
                clearTimeout(timeout);
                func();
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Expose utility functions globally
    window.UIEnhancements = {
        showToast: showToast,
        formatCurrency: formatCurrency,
        debounce: debounce
    };

})();
