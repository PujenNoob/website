<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $product->name }} - Male Fashion">
    <meta name="keywords" content="Male_Fashion, {{ $product->name }}, product">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }} | Male Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/malefashion-css/style.css') }}" type="text/css">

    <style>
        .guest-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .login-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white !important;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 140px;
            font-size: 0.95rem;
            line-height: 1.4;
        }
        
        .login-btn::before {
            display: none;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white !important;
            text-decoration: none;
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        
        .login-btn:focus {
            color: white !important;
            text-decoration: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
            outline: none;
        }
        
        .login-btn:active {
            color: white !important;
            text-decoration: none;
            transform: translateY(0);
        }
        
        .login-btn i {
            margin-right: 8px;
            font-size: 0.9rem;
        }
        
        .product-detail-section {
            padding: 80px 0;
        }
        
        .product-gallery {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .main-product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        
        .thumbnail-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .thumbnail-image:hover,
        .thumbnail-image.active {
            border-color: #6366f1;
            transform: scale(1.05);
        }
        
        .product-info {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .product-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        .product-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: #059669;
            margin-bottom: 1.5rem;
        }
        
        .product-description {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 2rem;
        }
        
        .login-prompt-card {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            margin: 2rem 0;
        }
        
        /* Login button styling is now handled by main CSS file */
        
        .related-products {
            padding: 80px 0;
            background: #f8f9fa;
        }
        
        .related-product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .related-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .related-product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .breadcrumb-section {
            background: #f8f9fa;
            padding: 2rem 0;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header guest-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ route('guest.home') }}"><img src="{{ asset('img/malefashion-img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ route('guest.home') }}">Home</a></li>
                            <li><a href="{{ route('guest.products') }}">Browse Products</a></li>
                            <li><a href="{{ route('guest.about') }}">About</a></li>
                            <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <div class="header__nav__option__item">
                            <a href="{{ route('login') }}" class="login-btn">
                                <i class="fas fa-user me-2"></i>Login to Shop
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open d-lg-none"><i class="fas fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('guest.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('guest.products') }}">Products</a></li>
                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Product Detail Section -->
    <section class="product-detail-section">
        <div class="container">
            <div class="row">
                <!-- Product Gallery -->
                <div class="col-lg-6 mb-4">
                    <div class="product-gallery">
                        @if($product->images->count() > 0)
                            <img src="{{ $product->images->first()->url }}" 
                                 alt="{{ $product->name }}" 
                                 class="main-product-image"
                                 id="mainImage"
                                 onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                            
                            @if($product->images->count() > 1)
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach($product->images as $index => $image)
                                        <img src="{{ $image->url }}" 
                                             alt="{{ $product->name }}" 
                                             class="thumbnail-image {{ $index === 0 ? 'active' : '' }}"
                                             onclick="changeMainImage('{{ $image->url }}', this)"
                                             onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="main-product-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-image fa-4x text-muted"></i>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-info">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                        
                        <div class="product-description">
                            <h5 class="mb-3">Description</h5>
                            <p>{{ $product->description }}</p>
                        </div>
                        
                        <!-- Login Prompt -->
                        <div class="login-prompt-card">
                            <h4 class="mb-3">Want to Purchase This Item?</h4>
                            <p class="mb-4">Create an account or login to add this item to your cart and complete your purchase</p>
                            <a href="{{ route('login') }}" class="login-btn">
                                <i class="fas fa-shopping-cart me-2"></i>Login to Add to Cart
                            </a>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="mt-4">
                            <h6 class="mb-3">Product Information</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2"><strong>Product ID:</strong> #{{ $product->id }}</li>
                                <li class="mb-2"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</li>
                                <li class="mb-2"><strong>Images:</strong> {{ $product->images->count() }} available</li>
                                <li class="mb-2"><strong>Added:</strong> {{ $product->created_at->format('M d, Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="related-products">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h3>You Might Also Like</h3>
                    <p class="text-muted">Explore more products from our collection</p>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="related-product-card">
                            @if($relatedProduct->images->count() > 0)
                                <img src="{{ $relatedProduct->images->first()->url }}" 
                                     alt="{{ $relatedProduct->name }}" 
                                     class="related-product-image"
                                     onerror="this.src='{{ asset('img/malefashion-img/product-1.jpg') }}'">
                            @else
                                <div class="related-product-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                            @endif
                            <div class="p-3">
                                <h6 class="mb-2">{{ Str::limit($relatedProduct->name, 30) }}</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-success fw-bold">${{ number_format($relatedProduct->price, 2) }}</span>
                                    <a href="{{ route('guest.product.detail', $relatedProduct->id) }}" class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('guest.products') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Products
                </a>
            </div>
        </div>
    </section>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ route('guest.home') }}"><img src="{{ asset('img/malefashion-img/logo.png') }}" alt=""></a>
                        </div>
                        <p>Premium fashion store offering the latest trends and timeless classics for the modern man.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Explore</h6>
                        <ul>
                            <li><a href="{{ route('guest.products') }}">Products</a></li>
                            <li><a href="{{ route('guest.about') }}">About Us</a></li>
                            <li><a href="{{ route('guest.blog') }}">Blog</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('login') }}">Register</a></li>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Size Guide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-8">
                    <div class="footer__widget">
                        <h6>Support</h6>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{ route('guest.contact') }}">Contact Support</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <div class="footer__widget">
                        <h6>Follow Us</h6>
                        <div class="footer__social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | Male Fashion
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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

    <script>
        // Change main image when thumbnail is clicked
        function changeMainImage(imageSrc, thumbnail) {
            document.getElementById('mainImage').src = imageSrc;
            
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail-image').forEach(img => {
                img.classList.remove('active');
            });
            
            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');
        }

        // Image zoom functionality
        document.getElementById('mainImage')?.addEventListener('click', function() {
            // Simple image zoom (you could integrate a lightbox here)
            window.open(this.src, '_blank');
        });

        // Add entrance animations
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.product-gallery, .product-info, .related-product-card');
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>

</body>
</html>
