@extends('layouts.user')

@section('title', 'Blog')
@section('page-title', 'Blog')
@section('description', 'Read our latest articles and updates')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">Our Blog</h1>
                <p class="lead text-muted">Stay updated with the latest trends, tips, and news from our team</p>
            </div>

            <!-- Featured Article -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="featured-image" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); height: 100%; min-height: 250px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-newspaper fa-4x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <span class="badge bg-primary mb-2">Featured</span>
                            <h3 class="card-title">Welcome to Our New Blog Section</h3>
                            <p class="card-text text-muted">
                                We're excited to launch our blog where we'll be sharing insights, tips, and updates 
                                about our products and services. Stay tuned for regular content that will help you 
                                make the most of your shopping experience.
                            </p>
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ now()->format('M d, Y') }}
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    Admin Team
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Categories -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-3">Categories</h4>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="category-card text-center p-3 border rounded">
                                        <i class="fas fa-shopping-bag fa-2x text-primary mb-2"></i>
                                        <h6>Fashion Tips</h6>
                                        <small class="text-muted">Style guides and trends</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="category-card text-center p-3 border rounded">
                                        <i class="fas fa-truck fa-2x text-success mb-2"></i>
                                        <h6>Shipping Info</h6>
                                        <small class="text-muted">Delivery updates and policies</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="category-card text-center p-3 border rounded">
                                        <i class="fas fa-gift fa-2x text-warning mb-2"></i>
                                        <h6>Special Offers</h6>
                                        <small class="text-muted">Deals and promotions</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="category-card text-center p-3 border rounded">
                                        <i class="fas fa-star fa-2x text-info mb-2"></i>
                                        <h6>Customer Stories</h6>
                                        <small class="text-muted">Reviews and testimonials</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coming Soon Articles -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-tshirt fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">Fashion Trends for 2024</h5>
                            <p class="card-text text-muted">
                                Discover the latest fashion trends and how to incorporate them into your wardrobe. 
                                From colors to styles, we'll guide you through what's hot this year.
                            </p>
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    <i class="fas fa-calendar me-1"></i>
                                    Coming Soon
                                </small>
                                <span class="badge bg-secondary">Fashion</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-heart fa-3x text-danger"></i>
                            </div>
                            <h5 class="card-title">Customer Spotlight</h5>
                            <p class="card-text text-muted">
                                Read inspiring stories from our customers and learn how our products have made 
                                a positive impact in their lives. Share your story with us!
                            </p>
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    <i class="fas fa-calendar me-1"></i>
                                    Coming Soon
                                </small>
                                <span class="badge bg-secondary">Stories</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-shipping-fast fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title">Shipping & Returns Guide</h5>
                            <p class="card-text text-muted">
                                Everything you need to know about our shipping policies, return process, and 
                                how to track your orders. We've made it simple and transparent.
                            </p>
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    <i class="fas fa-calendar me-1"></i>
                                    Coming Soon
                                </small>
                                <span class="badge bg-secondary">Guide</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <i class="fas fa-percent fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title">Seasonal Sales & Promotions</h5>
                            <p class="card-text text-muted">
                                Stay updated on our latest sales, promotions, and special offers. 
                                Don't miss out on great deals and exclusive discounts for our loyal customers.
                            </p>
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    <i class="fas fa-calendar me-1"></i>
                                    Coming Soon
                                </small>
                                <span class="badge bg-secondary">Offers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Signup -->
            <div class="mt-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-3">Stay Updated</h3>
                        <p class="text-muted mb-4">
                            Subscribe to our newsletter to receive the latest blog posts, updates, and exclusive offers directly in your inbox.
                        </p>
                        <form class="newsletter-form d-flex justify-content-center">
                            <div class="input-group" style="max-width: 400px;">
                                <input type="email" class="form-control" placeholder="Enter your email address" required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .category-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .category-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-color: #6366f1 !important;
    }
    
    .featured-image {
        background-size: cover;
        background-position: center;
    }
    
    .newsletter-form .input-group {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush
