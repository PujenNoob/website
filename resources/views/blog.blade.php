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

        /* Creative Blog Animations */
        .blog-hero {
            background: linear-gradient(135deg, var(--primary-600) 0%, var(--secondary-600) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .blog-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(1deg); }
        }
        
        .blog__hero__text h2 {
            background: linear-gradient(45deg, #fff, #f0f0f0, #fff);
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
        
        .blog__details__pic {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .blog__details__pic img {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform: scale(1);
        }
        
        .blog__details__pic:hover img {
            transform: scale(1.05);
        }
        
        .blog__details__content {
            position: relative;
        }
        
        .blog__details__share {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 50px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .blog__details__share:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .blog__details__share ul li a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0 5px;
        }
        
        .blog__details__share ul li a:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .blog__details__text p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 25px;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .blog__details__text p:nth-child(1) { animation-delay: 0.2s; }
        .blog__details__text p:nth-child(2) { animation-delay: 0.4s; }
        .blog__details__text p:nth-child(3) { animation-delay: 0.6s; }
        .blog__details__text p:nth-child(4) { animation-delay: 0.8s; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .blog__details__quote {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 20px;
            margin: 40px 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
        }
        
        .blog__details__quote::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 10s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .blog__details__quote i {
            font-size: 3rem;
            opacity: 0.3;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        
        .blog__details__quote p {
            font-size: 1.3rem;
            font-style: italic;
            margin: 20px 0;
            position: relative;
            z-index: 2;
        }
        
        .blog__details__quote h6 {
            position: relative;
            z-index: 2;
            margin: 0;
            font-weight: 600;
        }
        
        .blog__details__author {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .blog__details__author:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .blog__details__author__pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
            border: 3px solid #667eea;
        }
        
        .blog__details__author__pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .blog__details__author:hover .blog__details__author__pic img {
            transform: scale(1.1);
        }
        
        .blog__details__tags a {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            text-decoration: none;
            margin: 5px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .blog__details__tags a:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .blog__details__btns__item {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-decoration: none;
            color: inherit;
            display: block;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .blog__details__btns__item:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            text-decoration: none;
            color: inherit;
        }
        
        .blog__details__comment {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px;
            padding: 40px;
            margin-top: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .blog__details__comment input,
        .blog__details__comment textarea {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px 20px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .blog__details__comment input:focus,
        .blog__details__comment textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
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
        }
        
        .site-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
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
        
        /* Parallax effect for hero section */
        .blog-hero {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        /* Mobile optimizations */
        @media (max-width: 768px) {
            .blog__details__share {
                padding: 15px 20px;
            }
            
            .blog__details__quote {
                padding: 25px;
            }
            
            .blog__details__quote p {
                font-size: 1.1rem;
            }
            
            .blog__details__comment {
                padding: 25px;
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

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 col-md-10 col-sm-12 text-center">
                    <div class="blog__hero__text" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Are you one of the thousands of Iphone owners who has no idea</h2>
                        <ul data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <li>By Deercreative</li>
                            <li>February 21, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="blog__details__pic" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                     <img src="{{ asset('products/product-1.jpg') }}" alt="Blog Image" class="img-fluid">
                     <img src="{{ asset('img/malefashion-img/blog-details.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                            <p>Hydroderm is the highly desired anti-aging cream on the block. This serum restricts the
                                occurrence of early aging sings on the skin and keeps the skin younger, tighter and
                                healthier. It reduces the wrinkles and loosening of skin. This cream nourishes the skin
                                and brings back the glow that had lost in the run of hectic years.</p>
                            <p>The most essential ingredient that makes hydroderm so effective is Vyo-Serum, which is a
                                product of natural selected proteins. This concentrate works actively in bringing about
                                the natural youthful glow of the skin. It tightens the skin along with its moisturizing
                                effect on the skin. The other important ingredient, making hydroderm so effective is
                                "marine collagen" which along with Vyo-Serum helps revitalize the skin.</p>
                        </div>
                        <div class="blog__details__quote" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="800">
                            <i class="fa fa-quote-left"></i>
                            <p>"When designing an advertisement for a particular product many things should be
                                researched like where it should be displayed."</p>
                            <h6>_ John Smith _</h6>
                        </div>
                        <div class="blog__details__text" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1000">
                            <p>Vyo-Serum along with tightening the skin also reduces the fine lines indicating aging of
                                skin. Problems like dark circles, puffiness, and crow's feet can be control from the
                                strong effects of this serum.</p>
                            <p>Hydroderm is a multi-functional product that helps in reducing the cellulite and giving
                                the body a toned shape, also helps in cleansing the skin from the root and not letting
                                the pores clog, nevertheless also let's sweeps out the wrinkles and all signs of aging
                                from the sensitive near the eyes.</p>
                        </div>
                        <div class="blog__details__option" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1200">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="{{ asset('img/malefashion-img/blog-author.jpg') }}" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h5>Aiden Blair</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__tags">
                                        <a href="#">#Fashion</a>
                                        <a href="#">#Trending</a>
                                        <a href="#">#2020</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__btns" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1400">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="" class="blog__details__btns__item">
                                        <p><span class="arrow_left"></span> Previous Pod</p>
                                        <h5>It S Classified How To Utilize Free Classified Ad Sites</h5>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="" class="blog__details__btns__item blog__details__btns__item--next">
                                        <p>Next Pod <span class="arrow_right"></span></p>
                                        <h5>Tips For Choosing The Perfect Gloss For Your Lips</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1600">
                            <h4>Leave A Comment</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type="text" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <textarea placeholder="Comment"></textarea>
                                        <button type="submit" class="site-btn">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

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
    <script src="{{ asset('js/malefashion-js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/malefashion-js/main.js') }}"></script>
    
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
        
        // Add custom scroll animations for blog elements
        document.addEventListener('DOMContentLoaded', function() {
            // Parallax effect for hero section
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('.blog-hero');
                if (hero) {
                    hero.style.transform = `translateY(${scrolled * 0.5}px)`;
                }
            });
            
            // Add hover effects to social share buttons
            const socialButtons = document.querySelectorAll('.blog__details__share ul li a');
            socialButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) scale(1.1)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Add typing effect to blog title
            const title = document.querySelector('.blog__hero__text h2');
            if (title) {
                const text = title.textContent;
                title.textContent = '';
                let i = 0;
                
                function typeWriter() {
                    if (i < text.length) {
                        title.textContent += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 50);
                    }
                }
                
                setTimeout(typeWriter, 1000);
            }
        });
    </script>
</body>

</html>