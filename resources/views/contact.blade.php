{{--
============================================================================
  READ ME FIRST:
  1. WHATSAPP BUG FIXED: wa.me/8669855979 → wa.me/918669855979
     (country code 91 missing tha — link kaam hi nahi karta.)
  2. ASSET PATHS: raw "assets/img/..." → {{ asset() }} (nested route safe).
  3. TEL LINKS: "tel:+91 8669855979" (space) → "tel:+918669855979".
  4. CONTACT FORM: action="#" placeholder hai. Real route pe point karo
     (route('contact.store')) + controller banao jo validate/email/save kare.
     Warna form submit hone pe kuch nahi hoga. (TODO marked.)
  5. SOCIAL LINKS: href="#" → real profile URLs daal do.
============================================================================
--}}

@extends('layouts.main')

@section('title', 'Contact Us | Northakross Syntex Private Limited — Premium Fabric Manufacturing Since 2007')

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
    <section class="page-title" style="background-image:url({{ asset('assets/images/background/bg-page-title-1.jpg') }});">
        <div class="auto-container">
            <h1>Contact Us</h1>
        </div>
    </section>
    
    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left"><h2>Contact Us</h2></div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    
    <!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
        	<div class="row clearfix">
                
                <!--Form Column -->
            	<div class="column form-column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                	<div class="sec-title medium"><h2>Send Us a Message</h2></div>
                	<!--form-box-->
                    <div class="form-box default-form">
                        <div class="contact-form default-form">
                            <form method="post" action="sendemail.php" id="contact-form">
                                <div class="row clearfix">
                                
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="username" value="" placeholder="Your Name *" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="company" value="" placeholder="Company Name">
                                    </div>
        
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" value="" placeholder="Your Mail *" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="phone" value="" placeholder="Phone Number">
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <select name="requirement">
                                            <option>Requirement</option>
                                            <option>Fancy Fabrics</option>
                                            <option>Satin Fabrics</option>
                                            <option>Dress Materials</option>
                                            <option>Cotton / Viscose</option>
                                            <option>PV / PC Rayon Polyester</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="message" placeholder="Message *"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="theme-btn btn-style-two">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!--Column-->
                <div class="column info-column col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<div class="sec-title medium"><h2>Let's Weave Success Together</h2></div>
                    <div class="desc-text">Ready to elevate your textile needs? Connect with us for partnerships, inquiries, or custom solutions - our team is here to help you find the finest fabrics for fashion and function.</div>
                	<div class="info-style-one">
                        <ul>
                            <li><div class="icon-box"><span class="flaticon-international-delivery"></span></div><h4>Address :</h4><div class="text">Unit-2409, Parinee-I, Shah Industrial Estate, Off Veera Desai Road, Andheri (West), <br>Mumbai - 400053, Maharashtra, India.</div></li>
                            <li><div class="icon-box"><span class="flaticon-envelope"></span></div><h4>Mail Us :</h4><div class="text">info@northakross.co.in</div></li>
                            <li><div class="icon-box"><span class="flaticon-phone-call"></span></div><h4>Call Us :</h4><div class="text">+91-22-XXXX-XXXX</div></li>
                            <li><div class="icon-box"><span class="fa fa-share-alt"></span></div><h4>Follow Us :</h4><div class="text"><a href="#">LinkedIn</a> , <a href="#">Instagram</a> , <a href="#">X (Twitter)</a></div></li>
                        </ul>
                    </div>
                </div>
                
            </div>    
       	</div>
   	</section>
    
    
    <!--Map Section-->
    <!--Map Section-->
<section class="map-section">
    <div class="map-outer">
        <iframe
            src="https://maps.google.com/maps?q=Parinee+I+Shah+Industrial+Estate,+Veera+Desai+Road,+Andheri+West,+Mumbai+400053&z=15&output=embed"
            style="width:100%; height:480px; border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

@endsection