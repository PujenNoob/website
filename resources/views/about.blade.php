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

        /* Creative About Us Animations */
        .about-hero {
            position: relative;
            overflow: hidden;
        }
        
        .about-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
            z-index: 1;
        }
        
        .about-hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
            animation: float 15s ease-in-out infinite;
            z-index: 2;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(0.5deg); }
        }
        
        .about-hero .container {
            position: relative;
            z-index: 3;
        }
        
        .about-hero h1 {
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
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .timeline-modern {
            position: relative;
        }
        
        .timeline-event {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: translateY(30px);
        }
        
        .timeline-event.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        .timeline-circle {
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .timeline-circle::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(180, 140, 90, 0.3), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }
        
        .timeline-event:hover .timeline-circle::before {
            opacity: 1;
            animation: shine 0.6s ease;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .timeline-event:hover .timeline-circle {
            transform: scale(1.1);
            box-shadow: 0 10px 30px rgba(180, 140, 90, 0.4);
        }
        
        .timeline-content {
            transition: all 0.3s ease;
        }
        
        .timeline-event:hover .timeline-content {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .about__item {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .about__item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: all 0.6s ease;
        }
        
        .about__item:hover::before {
            left: 100%;
        }
        
        .about__item:hover {
            transform: translateY(-10px);
            border-color: #667eea;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
        }
        
        .about__item h4 {
            color: #667eea;
            transition: all 0.3s ease;
        }
        
        .about__item:hover h4 {
            transform: scale(1.05);
        }
        
        .testimonial {
            position: relative;
            overflow: hidden;
        }
        
        .testimonial::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            z-index: 1;
        }
        
        .testimonial .container-fluid {
            position: relative;
            z-index: 2;
        }
        
        .testimonial__text {
            position: relative;
        }
        
        .testimonial__text span {
            font-size: 4rem;
            color: #667eea;
            opacity: 0.3;
            position: absolute;
            top: -20px;
            left: 20px;
            animation: float 3s ease-in-out infinite;
        }
        
        .testimonial__author {
            transition: all 0.3s ease;
        }
        
        .testimonial__author:hover {
            transform: translateX(10px);
        }
        
        .testimonial__author__pic {
            transition: all 0.3s ease;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .testimonial__author:hover .testimonial__author__pic {
            transform: scale(1.1);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }
        
        .counter__item {
            text-align: center;
            padding: 40px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .counter__item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: all 0.6s ease;
            z-index: 1;
        }
        
        .counter__item:hover::before {
            opacity: 1;
        }
        
        .counter__item:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
        }
        
        .counter__item > * {
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        .counter__item:hover > * {
            color: white;
        }
        
        .counter__item__number h2 {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
            transition: all 0.3s ease;
        }
        
        .counter__item:hover .counter__item__number h2 {
            color: white;
            transform: scale(1.1);
        }
        
        .team__item {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .team__item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: all 0.6s ease;
            z-index: 1;
        }
        
        .team__item:hover::before {
            opacity: 1;
        }
        
        .team__item:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.3);
        }
        
        .team__item > * {
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        .team__item:hover > * {
            color: white;
        }
        
        .team__item img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #667eea;
            transition: all 0.3s ease;
        }
        
        .team__item:hover img {
            border-color: white;
            transform: scale(1.1);
        }
        
        .client__item {
            display: block;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
        }
        
        .client__item:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
        }
        
        .client__item img {
            max-width: 100%;
            height: auto;
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }
        
        .client__item:hover img {
            filter: grayscale(0%);
            transform: scale(1.1);
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
            .about-hero h1 {
                font-size: 2.5rem;
            }
            
            .counter__item {
                padding: 30px 15px;
            }
            
            .counter__item__number h2 {
                font-size: 2.5rem;
            }
            
            .team__item {
                padding: 25px 15px;
            }
            
            .team__item img {
                width: 100px;
                height: 100px;
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>About Us</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Hero Section Begin -->
<section class="about-hero d-flex align-items-center justify-content-center" style="background: url('{{ asset('img/malefashion-img/about-us-hero.jpg') }}') center center/cover no-repeat; min-height: 350px; position: relative;">
    <div style="background: rgba(0,0,0,0.5); position: absolute; top:0; left:0; width:100%; height:100%;"></div>
    <div class="container position-relative" style="z-index:2;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 text-center text-white">
                <h1 class="display-4 font-weight-bold" data-aos="fade-up" data-aos-duration="1000">About Us</h1>
                <p class="lead mt-3" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">Empowering your style journey with passion, creativity, and innovation. Discover the story behind our brand and meet the people who make it possible.</p>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Our Story / Timeline Section Begin -->
<section class="our-story spad bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <span class="section-title" data-aos="fade-up" data-aos-duration="800">Our Story</span>
                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">From Humble Beginnings to Fashion Forward</h2>
                <p class="text-muted" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">Founded in 2020, our brand started as a small dream in a home studio. Today, we are a passionate team dedicated to bringing you the latest trends, timeless classics, and a shopping experience you'll love. Our journey is fueled by creativity, quality, and a commitment to our customers.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="timeline-modern">
                    <div class="timeline-event" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                        <div class="timeline-circle">2020</div>
                        <div class="timeline-content">Brand founded in a small studio with a vision for accessible fashion.</div>
                    </div>
                    <div class="timeline-event" data-aos="fade-up" data-aos-delay="800" data-aos-duration="800">
                        <div class="timeline-circle">2021</div>
                        <div class="timeline-content">Launched our first collection and online store, reaching customers nationwide.</div>
                    </div>
                    <div class="timeline-event" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="800">
                        <div class="timeline-circle">2022</div>
                        <div class="timeline-content">Expanded our team and introduced sustainable materials in our products.</div>
                    </div>
                    <div class="timeline-event" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="800">
                        <div class="timeline-circle">2023</div>
                        <div class="timeline-content">Partnered with top designers and grew our community of loyal customers.</div>
                    </div>
                    <div class="timeline-event" data-aos="fade-up" data-aos-delay="1400" data-aos-duration="800">
                        <div class="timeline-circle">2024</div>
                        <div class="timeline-content">Recognized as a leading e-commerce fashion brand, with a focus on innovation and customer care.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.timeline-modern {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    position: relative;
    margin: 40px 0 60px 0;
    padding: 0 10px;
    overflow-x: auto;
}
.timeline-event {
    flex: 1 1 0;
    min-width: 180px;
    max-width: 220px;
    text-align: center;
    position: relative;
    margin: 0 10px;
}
.timeline-circle {
    width: 60px;
    height: 60px;
    background: #fff;
    border: 4px solid #b48c5a;
    color: #b48c5a;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.3em;
    margin: 0 auto 15px auto;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    z-index: 2;
}
.timeline-content {
    background: #fff;
    border-radius: 10px;
    padding: 15px 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    font-size: 1em;
    color: #444;
    margin-bottom: 10px;
}
.timeline-modern:before {
    content: '';
    position: absolute;
    top: 30px;
    left: 0;
    right: 0;
    height: 4px;
    background: #e0e0e0;
    z-index: 1;
}
.timeline-event {
    position: relative;
}
.timeline-event:not(:last-child):after {
    content: '';
    position: absolute;
    top: 30px;
    right: -10px;
    width: 20px;
    height: 4px;
    background: #e0e0e0;
    z-index: 1;
}
@media (max-width: 991px) {
    .timeline-modern {
        flex-direction: column;
        align-items: stretch;
    }
    .timeline-event {
        max-width: 100%;
        margin: 0 0 30px 0;
    }
    .timeline-modern:before {
        top: 0;
        left: 30px;
        right: auto;
        width: 4px;
        height: 100%;
    }
    .timeline-circle {
        margin: 0 0 10px 0;
    }
    .timeline-event:not(:last-child):after {
        top: auto;
        left: 30px;
        right: auto;
        width: 4px;
        height: 30px;
    }
}
</style>
<!-- Our Story / Timeline Section End -->

<!-- About Section Begin (Who We Are, What We Do, Why Choose Us) -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="about__item shadow p-4 rounded h-100" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                    <h4>Who We Are</h4>
                    <p>We are a collective of designers, creators, and dreamers who believe fashion is for everyone. Our mission is to inspire confidence and self-expression through thoughtfully crafted collections and a seamless online experience.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="about__item shadow p-4 rounded h-100" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                    <h4>What We Do</h4>
                    <p>We curate and create fashion-forward pieces that blend comfort, quality, and style. From everyday essentials to statement pieces, we help you build a wardrobe that reflects your unique personality.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="about__item shadow p-4 rounded h-100" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                    <h4>Why Choose Us</h4>
                    <p>Our commitment to quality, sustainability, and customer satisfaction sets us apart. We offer fast shipping, easy returns, and a dedicated support team to ensure you love every purchase.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="testimonial__text" data-aos="fade-right" data-aos-duration="1000">
                        <span class="icon_quotations"></span>
                        <p>"Going out after work? Take your butane curling iron with you to the office, heat it up,
                            style your hair before you leave the office and you won't have to make a trip back home."
                        </p>
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="{{ asset('img/malefashion-img/testimonial-author.jpg') }}" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Augusta Schultz</h5>
                                <p>Fashion Design</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="testimonial__pic set-bg" data-setbg="{{ asset('img/malefashion-img/testimonial-pic.jpg') }}" data-aos="fade-left" data-aos-duration="1000"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Counter Section Begin -->
    <section class="counter spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800">
                        <div class="counter__item__number">
                            <h2 class="cn_num">102</h2>
                        </div>
                        <span>Our <br />Clients</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="800">
                        <div class="counter__item__number">
                            <h2 class="cn_num">30</h2>
                        </div>
                        <span>Total <br />Categories</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="800">
                        <div class="counter__item__number">
                            <h2 class="cn_num">102</h2>
                        </div>
                        <span>In <br />Country</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item" data-aos="zoom-in" data-aos-delay="800" data-aos-duration="800">
                        <div class="counter__item__number">
                            <h2 class="cn_num">98</h2>
                            <strong>%</strong>
                        </div>
                        <span>Happy <br />Customer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->

    <!-- Team Section Begin -->
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>Meet Our Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item" data-aos="flip-up" data-aos-delay="200" data-aos-duration="800">
                        <img src="{{ asset('img/malefashion-img/team-1.jpg') }}" alt="" class="img-fluid">
                        <h4>John Smith</h4>
                        <span>Fashion Design</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item" data-aos="flip-up" data-aos-delay="400" data-aos-duration="800">
                        <img src="{{ asset('img/malefashion-img/team-2.jpg') }}" alt="" class="img-fluid">
                        <h4>Christine Wise</h4>
                        <span>C.E.O</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item" data-aos="flip-up" data-aos-delay="600" data-aos-duration="800">
                        <img src="{{ asset('img/malefashion-img/team-3.jpg') }}" alt="" class="img-fluid">
                        <h4>Sean Robbins</h4>
                        <span>Manager</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item" data-aos="flip-up" data-aos-delay="800" data-aos-duration="800">
                        <img src="{{ asset('img/malefashion-img/team-4.jpg') }}" alt="" class="img-fluid">
                        <h4>Lucy Myers</h4>
                        <span>Delivery</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Client Section Begin -->
    <section class="clients spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Partner</span>
                        <h2>Happy Clients</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-1.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-2.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-3.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="500" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-4.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="600" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-5.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="700" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-6.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="800" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-7.png') }}" alt="" class="img-fluid"></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item" data-aos="fade-up" data-aos-delay="900" data-aos-duration="600"><img src="{{ asset('img/malefashion-img/client-8.png') }}" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->

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
        
        // Add custom scroll animations for about us elements
        document.addEventListener('DOMContentLoaded', function() {
            // Counter animation
            const counters = document.querySelectorAll('.cn_num');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.textContent);
                        let current = 0;
                        const increment = target / 50;
                        
                        const updateCounter = () => {
                            if (current < target) {
                                current += increment;
                                counter.textContent = Math.ceil(current);
                                setTimeout(updateCounter, 50);
                            } else {
                                counter.textContent = target;
                            }
                        };
                        
                        updateCounter();
                        counterObserver.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
            
            // Timeline animation
            const timelineEvents = document.querySelectorAll('.timeline-event');
            const timelineObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('animated');
                        }, index * 200);
                        timelineObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });
            
            timelineEvents.forEach(event => {
                timelineObserver.observe(event);
            });
            
            // Parallax effect for hero section
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('.about-hero');
                if (hero) {
                    hero.style.transform = `translateY(${scrolled * 0.3}px)`;
                }
            });
            
            // Add hover effects to team members
            const teamItems = document.querySelectorAll('.team__item');
            teamItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.05)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Add typing effect to hero title
            const heroTitle = document.querySelector('.about-hero h1');
            if (heroTitle) {
                const text = heroTitle.textContent;
                heroTitle.textContent = '';
                let i = 0;
                
                function typeWriter() {
                    if (i < text.length) {
                        heroTitle.textContent += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 100);
                    }
                }
                
                setTimeout(typeWriter, 1000);
            }
        });
    </script>
</body>

</html>