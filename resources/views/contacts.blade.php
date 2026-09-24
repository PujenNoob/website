<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ui-fixes.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-ui.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-hero.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-products.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/ultimate-footer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/form-enhancements.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* Ultimate Global Styles */
        body {
            font-family: var(--font-body);
            background: linear-gradient(135deg, 
                var(--gray-50) 0%, 
                var(--primary-50) 25%, 
                var(--secondary-50) 50%, 
                var(--accent-50) 75%, 
                var(--gray-50) 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
            min-height: 100vh;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Ultimate Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-500), var(--secondary-500));
            border-radius: var(--radius-full);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--secondary-600));
        }

        /* Ultimate Selection */
        ::selection {
            background: rgba(14, 165, 233, 0.2);
            color: var(--gray-900);
        }

        /* Ultimate Focus */
        *:focus {
            outline: 2px solid var(--primary-500);
            outline-offset: 2px;
        }

        /* Creative Contact Page Animations */
        .map {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin-bottom: 50px;
        }
        
        .map iframe {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            filter: grayscale(20%);
        }
        
        .map:hover iframe {
            filter: grayscale(0%);
            transform: scale(1.02);
        }
        
        .map::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            opacity: 0;
            transition: all 0.6s ease;
            z-index: 1;
            pointer-events: none;
        }
        
        .map:hover::before {
            opacity: 1;
        }
        
        .contact {
            position: relative;
            overflow: hidden;
        }
        
        .contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="contact-dots" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="2" fill="rgba(102, 126, 234, 0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23contact-dots)"/></svg>');
            animation: float 20s ease-in-out infinite;
            z-index: 0;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(0.5deg); }
        }
        
        .contact .container {
            position: relative;
            z-index: 1;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
            animation: expandLine 1s ease-out 0.5s both;
        }
        
        @keyframes expandLine {
            from { width: 0; }
            to { width: 60px; }
        }
        
        .section-title h2 {
            background: linear-gradient(45deg, #667eea, #764ba2, #667eea);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .contact__text {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .contact__text::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: all 0.8s ease;
        }
        
        .contact__text:hover::before {
            left: 100%;
        }
        
        .contact__text:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.2);
        }
        
        .contact__text ul {
            list-style: none;
            padding: 0;
        }
        
        .contact__text ul li {
            padding: 20px 0;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .contact__text ul li:last-child {
            border-bottom: none;
        }
        
        .contact__text ul li::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .contact__text ul li:hover::before {
            height: 40px;
        }
        
        .contact__text ul li:hover {
            transform: translateX(10px);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            border-radius: 10px;
            padding-left: 20px;
        }
        
        .contact__text ul li h4 {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .contact__text ul li:hover h4 {
            transform: scale(1.05);
        }
        
        .contact__form {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .contact__form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.02) 0%, rgba(118, 75, 162, 0.02) 100%);
            z-index: 0;
        }
        
        .contact__form:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.2);
        }
        
        .contact__form .form-group {
            position: relative;
            margin-bottom: 25px;
        }
        
        .contact__form .form-control {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
            position: relative;
            z-index: 1;
        }
        
        .contact__form .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
            transform: translateY(-2px);
        }
        
        .contact__form .form-control::placeholder {
            color: #a0a0a0;
            transition: all 0.3s ease;
        }
        
        .contact__form .form-control:focus::placeholder {
            color: #667eea;
            transform: translateY(-5px);
        }
        
        .site-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            padding: 15px 40px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .site-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transition: all 0.3s ease;
            z-index: -1;
        }
        
        .site-btn:hover::before {
            left: 0;
        }
        
        .site-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
        }
        
        .site-btn i {
            transition: all 0.3s ease;
        }
        
        .site-btn:hover i {
            transform: translateX(5px);
        }
        
        /* Form validation animations */
        .form-control.is-valid {
            border-color: #28a745;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Success message animation */
        .alert-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 15px;
            color: white;
            padding: 20px;
            margin-top: 20px;
            animation: slideInUp 0.5s ease;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Loading animation */
        .btn-loading {
            position: relative;
            color: transparent;
        }
        
        .btn-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
        
        /* Scroll-triggered animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Mobile optimizations */
        @media (max-width: 768px) {
            .contact__text,
            .contact__form {
                padding: 25px;
            }
            
            .map {
                border-radius: 15px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('partials.ultimate-navbar')
    <!-- Header Section End -->
    <div id="mobile-menu-wrap"></div>

    <!-- Map Begin -->
    <div class="map" data-aos="zoom-in" data-aos-duration="1000">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="contact__text" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                                <h4>America</h4>
                                <p>195 E Parker Square Dr, Parker, CO 801 <br />+43 982-314-0958</p>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                                <h4>France</h4>
                                <p>109 Avenue Léon, 63 Clermont-Ferrand <br />+12 345-423-9893</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12">
                    <div class="contact__form" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                        <form action="#" id="contactForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" data-aos="fade-up" data-aos-delay="500" data-aos-duration="600">
                                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" data-aos="fade-up" data-aos-delay="600" data-aos-duration="600">
                                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group" data-aos="fade-up" data-aos-delay="700" data-aos-duration="600">
                                        <textarea name="message" placeholder="Message" class="form-control" required></textarea>
                                    </div>
                                    <button type="submit" class="site-btn" data-aos="fade-up" data-aos-delay="800" data-aos-duration="600">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    @include('partials.ultimate-footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset('js/malefashion-js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.nice-select.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.countdown.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/jquery.slicknav.js') }}"></script>
    <script src="{{asset('js/malefashion-js/mixitup.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/owl.carousel.min.js') }}"></script>
    <script src="{{asset('js/malefashion-js/main.js') }}"></script>
    <script src="{{asset('js/form-enhancements.js') }}"></script>
    
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
        
        // Add custom scroll animations for contact page elements
        document.addEventListener('DOMContentLoaded', function() {
            // Form submission with loading animation
            const contactForm = document.getElementById('contactForm');
            const submitBtn = contactForm.querySelector('.site-btn');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Add loading state
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
                
                // Simulate form submission (replace with actual form handling)
                setTimeout(() => {
                    // Remove loading state
                    submitBtn.classList.remove('btn-loading');
                    submitBtn.disabled = false;
                    
                    // Show success message
                    showSuccessMessage();
                }, 2000);
            });
            
            function showSuccessMessage() {
                const successAlert = document.createElement('div');
                successAlert.className = 'alert-success';
                successAlert.innerHTML = '<i class="fas fa-check-circle me-2"></i>Thank you! Your message has been sent successfully.';
                
                contactForm.appendChild(successAlert);
                
                // Remove success message after 5 seconds
                setTimeout(() => {
                    successAlert.remove();
                }, 5000);
            }
            
            // Add floating animation to contact information items
            const contactItems = document.querySelectorAll('.contact__text ul li');
            contactItems.forEach((item, index) => {
                item.addEventListener('mouseenter', function() {
                    this.style.animation = `float 2s ease-in-out infinite`;
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.animation = 'none';
                });
            });
            
            // Add typing effect to section title
            const sectionTitle = document.querySelector('.section-title h2');
            if (sectionTitle) {
                const text = sectionTitle.textContent;
                sectionTitle.textContent = '';
                let i = 0;
                
                function typeWriter() {
                    if (i < text.length) {
                        sectionTitle.textContent += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 100);
                    }
                }
                
                setTimeout(typeWriter, 1000);
            }
            
            // Add parallax effect to map
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const map = document.querySelector('.map');
                if (map) {
                    map.style.transform = `translateY(${scrolled * 0.2}px)`;
                }
            });
            
            // Add hover effects to form inputs
            const formInputs = document.querySelectorAll('.contact__form .form-control');
            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-5px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
            
            // Add ripple effect to submit button
            submitBtn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
        
        // Add ripple effect CSS
        const rippleCSS = `
            <style>
                .site-btn {
                    position: relative;
                    overflow: hidden;
                }
                
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    transform: scale(0);
                    animation: ripple-animation 0.6s linear;
                    pointer-events: none;
                }
                
                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            </style>
        `;
        document.head.insertAdjacentHTML('beforeend', rippleCSS);
    </script>
</body>

</html>