{{--
============================================================================
  READ ME FIRST:
  1. ASSET PATHS: sab raw "assets/img/..." ko {{ asset() }} me wrap kiya
     (nested route /service pe 404 hone se bachne ke liye).
  2. ROUTES: service-detail links url('service/...') singular par consistent.
     Confirm karo ye routes routes/web.php me defined hain.
  3. CONTACT FORM: form ka action="#" tha — abhi bhi placeholder hai.
     Isko real route pe point karo, e.g. action="{{ route('contact.store') }}"
     aur ek controller banao jo mail bheje/DB me save kare. Warna form
     submit hone pe kuch nahi hoga. (Neeche TODO marked hai.)
  4. SOCIAL LINKS: href="#" — real profile URLs daal do.
============================================================================
--}}

@extends('layouts.main')

@section('title', 'Services | Northakross Syntex Private Limited — Premium Fabric Manufacturing Since 2007')

@section('meta')
    <meta name="description" content="Northakross Syntex is an integrated textile manufacturer in Mumbai producing 22–25 lakh meters of premium satin, fancy, and dress-material fabrics monthly across 680+ looms. Spinning, weaving, finishing, and sustainable recycled-polyester sourcing.">
    <meta name="keywords" content="textile manufacturer Mumbai, satin fabric, fancy fabric, dress material, recycled polyester yarn, fabric weaving, textile supplier India">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Northakross Syntex — Weaving Tomorrow's Fabrics Today">
    <meta property="og:description" content="Integrated textile manufacturing at scale — 680+ looms, 22–25 lakh meters monthly, premium quality, sustainable sourcing. Mumbai, India.">
    <meta property="og:image" content="{{ asset('assets/img/og-image.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Northakross Syntex — Textile Manufacturing in Mumbai">
    <meta name="twitter:description" content="680+ looms, 22–25 lakh meters monthly, premium satin & fancy fabrics, sustainable sourcing.">
    <meta name="twitter:image" content="{{ asset('assets/img/og-image.png') }}">
@endsection

@section('content')

   <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('assets/images/background/bg-page-title-1.jpg') }}');">
        <div class="auto-container">
            <h1>Our Services</h1>
        </div>
    </section>
    
    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left"><h2>What We Offer</h2></div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </section>
    
    
    <!--Services Section-->
    <section class="services-section">
    	<div class="auto-container">
            
        	<div class="row clearfix">
            	
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-1.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-improvement"></span></div>
                        	<h3><a href="#">Yarn Spinning</a></h3>
                            <div class="text">Advanced spinning transforms premium and recycled raw yarns into the strong, consistent foundation behind every fabric we make.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-2.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-parquet"></span></div>
                        	<h3><a href="#">Fabric Weaving</a></h3>
                            <div class="text">680+ advanced looms weave luxurious satins, intricate fancy fabrics and versatile dress materials at scale, month after month.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-3.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-compass"></span></div>
                        	<h3><a href="#">Dyeing &amp; Printing</a></h3>
                            <div class="text">Advanced dyeing and printing bring colour, pattern and character to woven cloth with rich, consistent and lasting results.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-4.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-tiles"></span></div>
                        	<h3><a href="#">Quality Finishing</a></h3>
                            <div class="text">Precision finishing turns woven fabric into market-ready material, checked at multiple stages to guarantee our Finest Quality standard.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-5.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-two"></span></div>
                        	<h3><a href="#">Raw Material Trading</a></h3>
                            <div class="text">We source and trade essential raw materials - cotton fabrics and textile fibers - from trusted local partners for a seamless supply chain.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-6.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-layers"></span></div>
                        	<h3><a href="#">Yarn Import &amp; Sourcing</a></h3>
                            <div class="text">Importing specialised and 100% recycled polyester yarns from China, Malaysia, Thailand and Indonesia to keep supply cost-competitive.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-7.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-bright-lightbulb"></span></div>
                        	<h3><a href="#">Sustainable Recycled Yarns</a></h3>
                            <div class="text">Our recycled polyester programme cuts waste and honours the planet while delivering high-performance, cost-effective fabrics.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-8.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-houses"></span></div>
                        	<h3><a href="#">Custom Fabric Solutions</a></h3>
                            <div class="text">Bespoke fabrics across cotton, viscose and PV/PC rayon-polyester blends, tailored to your fashion, function and price-point needs.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                <!--Service Block-->
                <div class="default-services-block col-md-4 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<figure class="image-box"><img src="{{ asset('assets/images/resource/service-image-9.jpg') }}" alt=""><a href="#" class="overlay-box"><span class="fa fa-link"></span></a></figure>
                        <div class="lower-content">
                        	<div class="transparen-icon"><span class="flaticon-copy"></span></div>
                        	<h3><a href="#">Logistics &amp; Supply Coordination</a></h3>
                            <div class="text">An experienced back-office team manages logistics and supplier coordination with precision, enabling rapid 24-48 hour delivery.</div>
                            <div class="link-box"><a href="#" class="theme-btn read-more">Read More</a></div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    
    
    <!--call-to-action-->
    <section class="call-to-action" style="background-image:url({{ asset('assets/images/background/image-1.jpg') }});">
    	<div class="auto-container">
        	<div class="row">
            	<div class="text">Partner with Northakross Syntex and</div>
                <h2>Let's Weave Success Together!</h2>
                
                <a class="theme-btn btn-style-one" href="index.html#contact">Contact Us</a>
                <a class="theme-btn btn-style-two" href="index.html#projects">View Products</a>
                
            </div>
        </div>
    </section>

@endsection