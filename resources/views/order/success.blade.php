<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Success | Male Fashion</title>

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

    <style>
        .success-section {
            padding: 100px 0;
            background: #f8f9fa;
        }
        
        .success-card {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: pulse 2s infinite;
        }
        
        .success-icon i {
            color: white;
            font-size: 3rem;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .order-details-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }
        
        .order-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .order-info-item {
            text-align: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .order-info-item strong {
            display: block;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .order-items-table {
            margin: 2rem 0;
        }
        
        .order-items-table table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .order-items-table th,
        .order-items-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .order-items-table th {
            background: #f8f9fa;
            font-weight: 600;
        }
        
        .order-total-row {
            background: #f8f9fa !important;
            font-weight: bold;
        }
        
        .btn-custom {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            color: white;
            text-decoration: none;
        }
        
        .btn-outline-custom {
            background: transparent;
            color: #007bff;
            border: 2px solid #007bff;
        }
        
        .btn-outline-custom:hover {
            background: #007bff;
            color: white;
            text-decoration: none;
        }
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
    </style>
</head>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

    @include('partials.navbar')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Order Success</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('shop') }}">Shop</a>
                        <span>Order Success</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Success Section Begin -->
<section class="success-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="success-card">
                    <div class="success-icon">
                        <i class="fa fa-check"></i>
                    </div>
                    
                    <h2 class="mb-3" style="color: #28a745;">Order Placed Successfully!</h2>
                    <p class="lead mb-4">Thank you for your order. We'll process it shortly and send you a confirmation email.</p>
                </div>
                
                <div class="order-details-card">
                    <h4 class="mb-4">Order Details</h4>
                    
                    <div class="order-info-grid">
                        <div class="order-info-item">
                            <strong>Order Number</strong>
                            <span>{{ $order->order_number }}</span>
                        </div>
                        <div class="order-info-item">
                            <strong>Order Date</strong>
                            <span>{{ $order->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="order-info-item">
                            <strong>Payment Method</strong>
                            <span>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                        </div>
                        <div class="order-info-item">
                            <strong>Status</strong>
                            <span class="status-badge status-pending">{{ ucfirst($order->status) }}</span>
                        </div>
                    </div>
                    
                    <div class="order-items-table">
                        <h5 class="mb-3">Items Ordered</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>${{ number_format($item->product_price, 2) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr class="order-total-row">
                                    <td colspan="3"><strong>Subtotal</strong></td>
                                    <td><strong>${{ number_format($order->subtotal, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tax (10%)</td>
                                    <td>${{ number_format($order->tax, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Shipping</td>
                                    <td>${{ number_format($order->shipping, 2) }}</td>
                                </tr>
                                <tr class="order-total-row">
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('order.show', $order) }}" class="btn-custom btn-outline-custom">
                            <i class="fa fa-eye"></i> View Order Details
                        </a>
                        <a href="{{ route('shop') }}" class="btn-custom btn-primary-custom">
                            <i class="fa fa-shopping-bag"></i> Continue Shopping
                        </a>
                    </div>
                    
                    <div class="mt-4 pt-3 text-center" style="border-top: 1px solid #eee;">
                        <p class="text-muted mb-0">
                            <i class="fa fa-envelope"></i>
                            You will receive a confirmation email shortly at <strong>{{ $order->billing_email }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Success Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{ asset('img/malefashion-img/logo.png') }}" alt=""></a>
                    </div>
                    <p>Thank you for choosing us! Your order has been placed successfully and will be processed soon.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="{{ asset('img/malefashion-img/payment.png') }}" alt="Payment methods"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('blog') }}">Blogs</a></li>
                        <li><a href="{{ route('contacts') }}">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="{{ route('order.index') }}">Order Tracking</a></li>
                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-8">
                <div class="footer__widget">
                    <h6>Support</h6>
                    <ul>
                        <li><a href="#">Feedback</a></li>
                        <li><a href="{{ route('contacts') }}">Contact us</a></li>
                        <li><a href="#">Download app</a></li>
                        <li><a href="#">Terms condition</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-4">
                <div class="footer__widget">
                    <h6>Follow us</h6>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
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
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

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

</body>
</html>
