<!-- Ultimate Footer - World-Class Design -->
<footer class="ultimate-footer">
    <div class="ultimate-footer__container">
        <div class="ultimate-footer__main">
            <div class="ultimate-footer__content">
                <!-- Ultimate Footer Brand Section -->
                <div class="ultimate-footer__brand">
                    <a href="{{ route('home') }}" class="ultimate-footer__logo">
                        <div class="ultimate-footer__logo-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <span>MaleFashion</span>
                    </a>
                    <p class="ultimate-footer__description">
                        Ultimate fashion for the modern gentleman. Experience luxury perfected with our exclusive collection of premium clothing and accessories.
                    </p>
                    <div class="ultimate-footer__social">
                        <a href="#" class="ultimate-footer__social-link" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="ultimate-footer__social-link" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="ultimate-footer__social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="ultimate-footer__social-link" title="Pinterest">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" class="ultimate-footer__social-link" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="ultimate-footer__social-link" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <div class="ultimate-footer__newsletter">
                        <h3 class="ultimate-footer__newsletter-title">Stay Updated</h3>
                        <p class="ultimate-footer__newsletter-description">
                            Subscribe to our newsletter for exclusive offers, new arrivals, and fashion tips.
                        </p>
                        <form class="ultimate-footer__newsletter-form" id="newsletterForm">
                            @csrf
                            <input type="email" name="email" class="ultimate-footer__newsletter-input" placeholder="Enter your email address" required>
                            <button type="submit" class="ultimate-footer__newsletter-button">
                                <i class="fas fa-paper-plane"></i>
                                Subscribe
                            </button>
                        </form>
                        <p class="ultimate-footer__newsletter-privacy">
                            We respect your privacy. Unsubscribe at any time.
                            <a href="#">Privacy Policy</a>
                        </p>
                    </div>
                </div>

                <!-- Ultimate Footer Quick Links -->
                <div class="ultimate-footer__section">
                    <h3 class="ultimate-footer__section-title">Quick Links</h3>
                    <ul class="ultimate-footer__links">
                        <li><a href="{{ route('home') }}" class="ultimate-footer__link">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="ultimate-footer__link">Shop</a></li>
                        <li><a href="{{ route('about') }}" class="ultimate-footer__link">About Us</a></li>
                        <li><a href="{{ route('blog') }}" class="ultimate-footer__link">Blog</a></li>
                        <li><a href="{{ route('contacts') }}" class="ultimate-footer__link">Contact</a></li>
                        <li><a href="#" class="ultimate-footer__link">Size Guide</a></li>
                        <li><a href="#" class="ultimate-footer__link">Care Instructions</a></li>
                        <li><a href="#" class="ultimate-footer__link">Store Locator</a></li>
                    </ul>
                </div>

                <!-- Ultimate Footer Customer Service -->
                <div class="ultimate-footer__section">
                    <h3 class="ultimate-footer__section-title">Customer Service</h3>
                    <ul class="ultimate-footer__links">
                        <li><a href="#" class="ultimate-footer__link">Help Center</a></li>
                        <li><a href="#" class="ultimate-footer__link">Shipping Info</a></li>
                        <li><a href="#" class="ultimate-footer__link">Returns & Exchanges</a></li>
                        <li><a href="#" class="ultimate-footer__link">Track Your Order</a></li>
                        <li><a href="#" class="ultimate-footer__link">Size Exchange</a></li>
                        <li><a href="#" class="ultimate-footer__link">Gift Cards</a></li>
                        <li><a href="#" class="ultimate-footer__link">Wishlist</a></li>
                        <li><a href="#" class="ultimate-footer__link">FAQ</a></li>
                    </ul>
                </div>

                <!-- Ultimate Footer Company -->
                <div class="ultimate-footer__section">
                    <h3 class="ultimate-footer__section-title">Company</h3>
                    <ul class="ultimate-footer__links">
                        <li><a href="#" class="ultimate-footer__link">About Us</a></li>
                        <li><a href="#" class="ultimate-footer__link">Careers</a></li>
                        <li><a href="#" class="ultimate-footer__link">Press</a></li>
                        <li><a href="#" class="ultimate-footer__link">Sustainability</a></li>
                        <li><a href="#" class="ultimate-footer__link">Partnerships</a></li>
                        <li><a href="#" class="ultimate-footer__link">Investor Relations</a></li>
                        <li><a href="#" class="ultimate-footer__link">Terms of Service</a></li>
                        <li><a href="#" class="ultimate-footer__link">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Ultimate Footer Contact Info -->
                <div class="ultimate-footer__section">
                    <h3 class="ultimate-footer__section-title">Contact Info</h3>
                    <div class="ultimate-footer__contact">
                        <div class="ultimate-footer__contact-item">
                            <div class="ultimate-footer__contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <strong>Address</strong><br>
                                123 Fashion Street<br>
                                New York, NY 10001
                            </div>
                        </div>
                        <div class="ultimate-footer__contact-item">
                            <div class="ultimate-footer__contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <strong>Phone</strong><br>
                                +1 (555) 123-4567<br>
                                Mon-Fri 9AM-6PM EST
                            </div>
                        </div>
                        <div class="ultimate-footer__contact-item">
                            <div class="ultimate-footer__contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <strong>Email</strong><br>
                                hello@malefashion.com<br>
                                support@malefashion.com
                            </div>
                        </div>
                        <div class="ultimate-footer__contact-item">
                            <div class="ultimate-footer__contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <strong>Store Hours</strong><br>
                                Mon-Sat: 10AM-8PM<br>
                                Sun: 12PM-6PM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ultimate Footer Bottom -->
        <div class="ultimate-footer__bottom">
            <div class="ultimate-footer__copyright">
                <i class="fas fa-copyright ultimate-footer__copyright-icon"></i>
                <span>2024 MaleFashion. All rights reserved. Ultimate fashion for the modern world.</span>
            </div>
            <ul class="ultimate-footer__bottom-links">
                <li><a href="#" class="ultimate-footer__bottom-link">Terms of Service</a></li>
                <li><a href="#" class="ultimate-footer__bottom-link">Privacy Policy</a></li>
                <li><a href="#" class="ultimate-footer__bottom-link">Cookie Policy</a></li>
                <li><a href="#" class="ultimate-footer__bottom-link">Accessibility</a></li>
            </ul>
            <div class="ultimate-footer__payments">
                <span class="ultimate-footer__payment-title">We Accept:</span>
                <div class="ultimate-footer__payment-methods">
                    <div class="ultimate-footer__payment-method" title="Visa">VISA</div>
                    <div class="ultimate-footer__payment-method" title="Mastercard">MC</div>
                    <div class="ultimate-footer__payment-method" title="American Express">AE</div>
                    <div class="ultimate-footer__payment-method" title="PayPal">PP</div>
                    <div class="ultimate-footer__payment-method" title="Apple Pay">AP</div>
                    <div class="ultimate-footer__payment-method" title="Google Pay">GP</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Ultimate Footer JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ultimate Newsletter Form
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[name="email"]').value;
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Show success state
                button.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                button.style.background = 'linear-gradient(135deg, var(--success), #059669)';
                
                // Reset form
                this.reset();
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    button.style.background = 'linear-gradient(135deg, var(--primary-500), var(--secondary-500))';
                }, 3000);
                
                // Show success message
                showNotification('Successfully subscribed to our newsletter!', 'success');
            }, 2000);
        });
    }
    
    // Ultimate Smooth Scroll for Footer Links
    const footerLinks = document.querySelectorAll('.ultimate-footer__link[href^="#"]');
    footerLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Ultimate Social Link Analytics
    const socialLinks = document.querySelectorAll('.ultimate-footer__social-link');
    socialLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const platform = this.querySelector('i').className.split('fa-')[1];
            console.log(`Social link clicked: ${platform}`);
            // Add analytics tracking here
        });
    });
    
    // Ultimate Payment Method Hover Effects
    const paymentMethods = document.querySelectorAll('.ultimate-footer__payment-method');
    paymentMethods.forEach(method => {
        method.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(2deg)';
        });
        
        method.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });
});

// Ultimate Notification System
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `ultimate-notification ultimate-notification--${type}`;
    notification.innerHTML = `
        <div class="ultimate-notification__content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
        <button class="ultimate-notification__close">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add notification styles
    const style = document.createElement('style');
    style.textContent = `
        .ultimate-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: var(--glass-backdrop);
            -webkit-backdrop-filter: var(--glass-backdrop);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius-2xl);
            padding: var(--space-4) var(--space-6);
            box-shadow: var(--shadow-xl);
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: var(--space-3);
            max-width: 400px;
            animation: slideInRight 0.5s ease-out;
        }
        
        .ultimate-notification--success {
            border-left: 4px solid var(--success);
        }
        
        .ultimate-notification--error {
            border-left: 4px solid var(--error);
        }
        
        .ultimate-notification--info {
            border-left: 4px solid var(--info);
        }
        
        .ultimate-notification__content {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            color: var(--gray-800);
            font-weight: 500;
        }
        
        .ultimate-notification__content i {
            color: var(--success);
        }
        
        .ultimate-notification__close {
            background: none;
            border: none;
            color: var(--gray-500);
            cursor: pointer;
            padding: var(--space-1);
            border-radius: var(--radius-full);
            transition: var(--transition-all);
        }
        
        .ultimate-notification__close:hover {
            background: var(--gray-100);
            color: var(--gray-700);
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.5s ease-out';
        setTimeout(() => {
            notification.remove();
        }, 500);
    }, 5000);
    
    // Close button functionality
    notification.querySelector('.ultimate-notification__close').addEventListener('click', () => {
        notification.style.animation = 'slideOutRight 0.5s ease-out';
        setTimeout(() => {
            notification.remove();
        }, 500);
    });
}
</script>
