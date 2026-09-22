@extends('layouts.main')
@section('title', 'Our Products | Northakross Syntex Private Limited — Premium Fabric Manufacturing Since 2007')

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
            <h1>Our Products</h1>
        </div>
    </section>
    
    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left"><h2>Our Products</h2></div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Products</li>
                </ul>
            </div>
        </div>
    </section>
    
    
    <!--Gallery Section-->
    <section class="gallery-section portfolio-with-caption">
         <div class="auto-container">
         
            <!--Section Title-->
            <div class="sec-title-four">
                <h2>From Satins to Dress Materials - Crafted for Fashion &amp; Function</h2>
            </div>
            
            <!--Mixituo Gallery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center">
                	<div class="icon-box"><span class="fa fa-picture-o"></span></div>
                
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All Products</li>          
                        <li class="filter" data-role="button" data-filter=".fancy">Fancy Fabrics</li>
                        <li class="filter" data-role="button" data-filter=".satin">Satin</li>
                        <li class="filter" data-role="button" data-filter=".dress">Dress Materials</li>
                        <li class="filter" data-role="button" data-filter=".cotton">Cotton</li>
                        <li class="filter" data-role="button" data-filter=".viscose">Viscose</li>
                        <li class="filter" data-role="button" data-filter=".polyester">Polyester</li>
                    </ul>
                </div>
                
                
                <div class="filter-list row clearfix">
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all fancy cotton">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/26.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Fancy Jacquard Fabric</a></h3>
                                <div class="cat-links"><a href="#">Fancy</a> , <a href="#">Cotton</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all satin polyester">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/27.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Premium Satin Weave</a></h3>
                                <div class="cat-links"><a href="#">Satin</a> , <a href="#">Polyester</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all dress cotton">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/28.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Cotton Dress Material</a></h3>
                                <div class="cat-links"><a href="#">Dress Materials</a> , <a href="#">Cotton</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all satin viscose">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/29.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Viscose Satin</a></h3>
                                <div class="cat-links"><a href="#">Satin</a> , <a href="#">Viscose</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all fancy viscose">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/30.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Fancy Viscose Weave</a></h3>
                                <div class="cat-links"><a href="#">Fancy</a> , <a href="#">Viscose</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all polyester cotton">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/31.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">PV / PC Rayon Blend</a></h3>
                                <div class="cat-links"><a href="#">Polyester</a> , <a href="#">Cotton</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all polyester satin">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/32.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Recycled Polyester Fabric</a></h3>
                                <div class="cat-links"><a href="#">Polyester</a> , <a href="#">Sustainable</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all dress viscose">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/33.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Printed Dress Material</a></h3>
                                <div class="cat-links"><a href="#">Dress Materials</a> , <a href="#">Viscose</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all cotton">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/34.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Cotton Shirting Fabric</a></h3>
                                <div class="cat-links"><a href="#">Cotton</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all satin">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/26.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Luxury Satin Drape</a></h3>
                                <div class="cat-links"><a href="#">Satin</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all fancy dress">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/27.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Fancy Embroidered Fabric</a></h3>
                                <div class="cat-links"><a href="#">Fancy</a> , <a href="#">Dress Materials</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Default Portfolio Item-->
                    <div class="col-md-4 col-sm-6 col-xs-12 default-portfolio-item mix mix_all all dress viscose polyester">
                        <div class="inner-box">
                            <figure class="image-box">
                            	<img src="{{ asset('assets/images/gallery/28.jpg') }}" alt="">
                            	<!--Overlay Box-->
                                <div class="overlay-one">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="#" class="proj-link"><span class="fa fa-link"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            
                            <!--Caption Box-->
                            <div class="caption-box-two">
                                <h3><a href="#">Rayon Dress Material</a></h3>
                                <div class="cat-links"><a href="#">Dress Materials</a> , <a href="#">Viscose</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div><!--End Mixituo Gallery-->
            
            <!-- Styled Pagination removed (single page of products, non-functional)
            <div class="styled-pagination padd-top-40 text-center">
                <ul>
                	<li><a class="prev" href="#"><span class="fa fa-angle-left"></span></a></li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a class="next" href="#"><span class="fa fa-angle-right"></span></a></li>
                </ul>
            </div>
            -->
                
        </div>
    </section>

@endsection