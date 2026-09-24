@extends('layouts.user')

@section('title', 'About Us')
@section('page-title', 'About Us')
@section('description', 'Learn more about our company and mission')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">About Us</h1>
                <p class="lead text-muted">Discover our story and commitment to excellence</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-heart fa-3x text-primary"></i>
                            </div>
                            <h4 class="card-title text-center">Our Mission</h4>
                            <p class="card-text text-muted">
                                We are committed to providing high-quality products and exceptional customer service. 
                                Our mission is to make shopping an enjoyable and seamless experience for all our customers.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-eye fa-3x text-success"></i>
                            </div>
                            <h4 class="card-title text-center">Our Vision</h4>
                            <p class="card-text text-muted">
                                To become the leading e-commerce platform that customers trust and love. 
                                We envision a future where shopping is not just a transaction, but a delightful experience.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-star fa-3x text-warning"></i>
                            </div>
                            <h4 class="card-title text-center">Our Values</h4>
                            <p class="card-text text-muted">
                                Quality, integrity, and customer satisfaction are at the core of everything we do. 
                                We believe in building lasting relationships with our customers through trust and transparency.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-users fa-3x text-info"></i>
                            </div>
                            <h4 class="card-title text-center">Our Team</h4>
                            <p class="card-text text-muted">
                                Our dedicated team of professionals works tirelessly to ensure that every customer 
                                receives the best possible service and products that exceed their expectations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Why Choose Us?</h3>
                        <div class="row g-4">
                            <div class="col-md-4 text-center">
                                <i class="fas fa-shipping-fast fa-2x text-primary mb-3"></i>
                                <h5>Fast Shipping</h5>
                                <p class="text-muted small">Quick and reliable delivery to your doorstep</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="fas fa-shield-alt fa-2x text-success mb-3"></i>
                                <h5>Secure Payment</h5>
                                <p class="text-muted small">Your payment information is always protected</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="fas fa-headset fa-2x text-warning mb-3"></i>
                                <h5>24/7 Support</h5>
                                <p class="text-muted small">Our customer service team is always here to help</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
