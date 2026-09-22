@extends('layouts.main')
@section('title', 'Our Work | WeGrow IT')
@section('content')
<style>
    .campaign-wrapper {
  border: 1px solid #ccc;
  background: #f9f9f9;
}

.title {
  color: #031740;
  font-weight: 600;
}

.border-box {
  border: 1px solid #ccc;
  padding: 20px;
}

/* Card Layout */
.campaign-card {
  gap: 15px;
  align-items: flex-start;
}

.campaign-card img {
  width: 120px;
  height: 120px;
  object-fit: cover;
}

.campaign-card .content h5 {
  font-weight: 600;
  margin-bottom: 10px;
}

.campaign-card .content p {
  font-size: 14px;
  color: #555;
}

/* ✅ Responsive */
@media (max-width: 991px) {
  .campaign-card {
    flex-direction: column;
    text-align: center;
  }

  .campaign-card img {
    margin: auto;
  }
}
</style>

    <!-- Banner Section Start -->
    <section class="breadcrumb-section position-relative fix">
        <div class="container">
            <div class="bread-content text-center">
                <ul class="d-flex align-items-center gap-3 justify-content-center">
                    <li>
                        <a href="index.html" class="p3-clr">Home</a>
                    </li>
                    <li class="p3-clr">/</li>
                    <li class="white">Corporate</li>
                </ul>
                <h1 class="white visible-from-right">Corporate details</h1>
            </div>
        </div>
        <!-- bread Element -->
        <img src="assets/img/element/bread-ele.png" alt="img" class="bread-ele">
    </section>
    <!-- Banner Section Start -->
          <!-- Gateway Section Start -->
    <section class="gateway-section2 section-padding bg-color fix">
        <div class="container">
            <div
                class="text-lg-start text-center d-lg-flex d-grid gap-3 flex-lg-nowrap flex-wrap align-items-end justify-content-lg-between justify-content-center pb-md-5 mb-4 pb-2">
                <div class="section-title">
                   
                    <h2 class="wow fadeInUp black fw-bold visible-slowly-right" data-wow-delay=".3s">
                        Oue Social Media   <br>
                        Client
                    </h2>
                </div>
                <div class="array-button justify-content-lg-start justify-content-center wow fadeInUp"
                    data-wow-delay=".5s">
                    <button class="array-prev whitebg border-0"><i class="fal fa-arrow-left black"></i></button>
                    <button class="array-next whitebg border-0"><i class="fal fa-arrow-right black"></i></button>
                </div>
            </div>
            <div class="gateway-wrapper swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Shailesh Phanse</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Shailesh Phanse</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Haji Shaikh</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Haji Shaikh</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Renu Hansraj</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Renu Hansraj</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Yogesh Patil</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Yogesh Patil</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Sadanand Parab</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Sadanand Parab</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Nilesh Bhosale</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Nilesh Bhosale</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Pankaj Chandanshive</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Pankaj Chandanshive</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Dilip Lande</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Dilip Lande</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Nitin Salagre</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Nitin Salagre</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Rajul Patel</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Rajul Patel</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Sujata Phatak</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Sujata Phatak</a></h5>
                               
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gateway-items style2 rounded-4 w-100">
                            <img src="assets/img/services/se-img1.png?v=2" alt="img" class="w-100 rounded-4">
                            <h5 class="static white">Vaibhav Dhanwade</h5>
                            <div class="content2">
                                <h5 class="white mb-xxl-3 mb-2"><a href="#" class="white">Vaibhav Dhanwade</a></h5>
                               
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
      
    </section>

<!-- Service Dev Section Start -->
<section class="services-development-section fix section-padding whitebg" style="padding: 76px 0;">
    <div class="container">
         <div class="row g-4">
            <div class="col-lg-12 pe-5">
                <div class="common-left-sidebar" >
                    <div class="common-left-barbox mb-xl-5 mb-4">
                        <h4 class="black mb-xxl-4 mb-3">
                            Campaign
                        </h4>
                        <div class="d-grid gap-2">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <a href="javascript:void(0)"
                                        class="cate-tags d-flex align-items-center justify-content-between gap-2 fs-seven pra  active-cat"
                                        data-cat="influ-mark" onclick="showCategory('influ-mark', this)">
                                        INFLUENCER MARKETING  <i class="fa-solid fa-angle-down"></i>
                                    </a>
                                      
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <a href="javascript:void(0)"
                                        class="cate-tags d-flex align-items-center justify-content-between gap-2 fs-seven pra "
                                        data-cat="adani" onclick="showCategory('adani', this)">
                                        Adani Dharavi Project  <i class="fa-solid fa-angle-down"></i>
                                    </a>
                                      
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="javascript:void(0)"
                                        class="cate-tags d-flex align-items-center justify-content-between gap-2 fs-seven pra "
                                        data-cat="saridon" onclick="showCategory('saridon', this)">
                                        Saridon Campaign <i class="fa-solid fa-angle-down"></i>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="javascript:void(0)"
                                        class="cate-tags d-flex align-items-center justify-content-between gap-2 fs-seven pra "
                                        data-cat="digital" onclick="showCategory('digital', this)">
                                        Mumbai Indians Event <i class="fa-solid fa-angle-down"></i>
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="javascript:void(0)"
                                        class="cate-tags d-flex align-items-center justify-content-between gap-2 fs-seven pra "
                                        data-wow-delay=".6s" data-cat="mulund-fest" onclick="showCategory('mulund-fest', this)">
                                        Mulund Flash Mob <i class="fa-solid fa-angle-down"></i>
                                    </a>
                                </div>
                              
                             </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        
        <div class="row g-4" >
            <div class="col-lg-12">
                <!-- ===== DATA VISUALIZATION PANEL ===== -->
                <div class="service-details-content cat-panel" id="panel-influ-mark">
                     <section class="sponsor-section space-top fix" style="padding:0px;">
                        <div class="container">
                            <div class="sponsor-wrapper swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="sponsor-item">
                                            <img src="assets/img/sponsor/google.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sponsor-item">
                                            <img src="assets/img/sponsor/amazon.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sponsor-item">
                                            <img src="assets/img/sponsor/mircrosoft.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sponsor-item">
                                            <img src="assets/img/sponsor/ola.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sponsor-item">
                                            <img src="assets/img/sponsor/fedex.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="sponsor-item">
                                            <img src="assets/img/sponsor/walmart.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- ===== DATA VISUALIZATION PANEL ===== -->
                <div class="service-details-content cat-panel" id="panel-adani">
                    <div class="row">
                        <div class="col-md-5">
                           <div class="gateway-items style2 rounded-4 w-100">
                            <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-VR.jpg" alt="img" class="w-100 rounded-4">
                           
                        </div>

                        </div>
                        <div class="col-md-7">
                                <div class="mb-xl-2 mb-2 pb-2">
                                    <h3 class="black mb-xl-1 mb-lg-1 mb-1" >
                                        Adani Group
                                    </h3>
                                    <!-- <p class="pra fs-seven mb-1 " >
                                        BJP IT CELL
                                    </p> -->
                                </div>
                                <div class="mb-xl-5 mb-4 pb-sm-2 mb-1">
                                    <h4 class="black mb-xxl-4 mb-3 " >Details</h4>
                                    <ul class="about-list d-grid gap-2">
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Category:</div>
                                                <p class="fs-seven fw_400 pra">Documentary Video Production</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Year:</div>
                                                <p class="fs-seven fw_400 pra">2026</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">What We Did :</div>
                                                <p class="fs-seven fw_400 pra">Produced a documentary video for the Adani Dharavi Redevelopment Project in Mumbai.</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Result / Outcome :</div>
                                                <p class="fs-seven fw_400 pra">Completed documentary film showing the vision, progress, and impact of the Dharavi project</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Key Highlight  :</div>
                                                <p class="fs-seven fw_400 pra">High-profile production for one of India's biggest conglomerates, covering a landmark urban redevelopment project in Mumbai</p>
                                            </div>
                                        </li>
                                         <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Proof / Link  :</div>
                                                <p class="fs-seven fw_400 pra">Recent project – link to be added once published</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                              

                        </div>
                        <section class="about-section style2 fix">
                            <div class="about-wrapper ">
                                <div class="container">
                                    <div
                                        class="row flex-row-reverse justify-content-lg-between justify-content-center g-4 align-items-center">
                                        <div class="col-xl-7 col-lg-7">
                                            <div class="about-content">
                                                <div class="section-title text-lg-start text-center mb-4">
                                                
                                                    <h3 class="mb-xxl-4 mb-3  black fw-bold "
                                                        >
                                                        ABOUT THIS PROJECT
                                                    </h3>
                                                    <p class="pra fs-seven">
                                                        We produced a documentary video for the Adani Group's Dharavi Redevelopment Project. Dharavi is
                                                        one of Asia's largest urban redevelopment projects. Our job was to tell the story of this project
                                                        through video — capturing the vision, the people involved, and the impact it will have on Mumbai.
                                                        This is one of our most significant video production projects to date.
                                                    </p>
                                                </div>
                                                    <a  href="javascript:void(0)"
                                                        class="share-btn common-btn box-style cmn-style1 d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs18 fw-semibold white overflow-hidden rounded-5 p3-bg" onclick="shareCampaign('adani')">
                                                        Share
                                                    </a>
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5">
                                            <div class="about-thumb position-relative  w-100">
                                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-VR.jpg" alt="img" class="w-100">
                                                <!-- Ele -->
                                                <img src="assets/img/element/dot-grp1.png" alt="img" class="about-ele">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="services-development-section fix section-padding whitebg">
                        <div class="container">
                        <div class="container my-5">
                        <div class="campaign-wrapper p-4">
                            
                            <h3 class="text-center mb-4 title">List of Campaigns</h3>

                            <div class="row g-0">

                                <!-- Card 1 -->
                                <div class="col-lg-6 border-box">
                                    <div class="campaign-card d-flex">
                                        <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/05/list-of-campaings-img-22.jpg" class="img-fluid">
                                        <div class="content">
                                            <h5> Documentary Film Production:</h5>
                                            <p>
                                                Full video production for the Adani Dharavi Redevelopment Project — scripting, filming, and editing.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="col-lg-6 border-box">
                                    <div class="campaign-card d-flex">
                                        <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/05/list-of-campaings-img-28.jpg" class="img-fluid">
                                        <div class="content">
                                            <h5>Storytelling & Narrative:</h5>
                                            <p>
                                                Crafted the narrative around the project's vision and community impact.

                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                        </div>
                        </section>
                        

                    </div>
                </div>

                <!-- ===== UI/UX DESIGNING PANEL ===== -->
                <div class="service-details-content cat-panel" id="panel-saridon" style="display:none;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="thumb rounded-3 mb-xl-5 mb-4 " >
                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-SR-Patil.jpg" alt="img" class="w-100 rounded-3">
                            </div>
                        </div>
                        <div class="col-md-7">
                                <div class="mb-xl-2 mb-2 pb-2">
                                    <h3 class="black mb-xl-1 mb-lg-1 mb-1" >
                                        Saridon 
                                    </h3>
                                    <p class="pra fs-seven mb-1 " >
                                        Pain Relief Brand
                                    </p>
                                </div>
                                <div class="mb-xl-5 mb-4 pb-sm-2 mb-1">
                                    <h4 class="black mb-xxl-4 mb-3 " >Details</h4>
                                    <ul class="about-list d-grid gap-2">
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Category:</div>
                                                <p class="fs-seven fw_400 pra"> Healthcare / FMCG</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Year:</div>
                                                <p class="fs-seven fw_400 pra">2023</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">What We Did :</div>
                                                <p class="fs-seven fw_400 pra">Created and managed an influencer video campaign around the 'No Pain Period' theme for Saridon</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Result / Outcome :</div>
                                                <p class="fs-seven fw_400 pra">Influencer content published and distributed across social media platforms .</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Key Highlight  :</div>
                                                <p class="fs-seven fw_400 pra">First healthcare influencer campaign — coordinated multiple creators for one unified campaign theme</p>
                                            </div>
                                        </li>
                                          <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Proof / Link  :</div>
                                                <p class="fs-seven fw_400 pra">Campaign content – no direct public link</p>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                              

                        </div>
                        <section class="about-section style2 fix">
                            <div class="about-wrapper ">
                                <div class="container">
                                    <div
                                        class="row flex-row-reverse justify-content-lg-between justify-content-center g-4 align-items-center">
                                        <div class="col-xl-7 col-lg-7">
                                            <div class="about-content">
                                                <div class="section-title text-lg-start text-center mb-4">
                                                
                                                    <h3 class="mb-xxl-4 mb-3  black fw-bold "
                                                        >
                                                        ABOUT THIS PROJECT
                                                    </h3>
                                                    <p class="pra fs-seven">
                                                        In 2023, we worked with Saridon, a well-known pain relief brand, to create an influencer marketing
                                                        campaign. The campaign theme was 'No Pain Period.' We found the right influencers, briefed them,
                                                        coordinated the video content, and made sure the campaign message was consistent across all
                                                        creators.

                                                    </p>
                                                </div>
                                                <a  href="javascript:void(0)"
                                                        class="share-btn common-btn box-style cmn-style1 d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs18 fw-semibold white overflow-hidden rounded-5 p3-bg" onclick="shareCampaign('saridon')">
                                                        Share
                                                    </a>
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5">
                                            <div class="about-thumb position-relative  w-100">
                                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-SR-Patil.jpg" alt="img" class="w-100">
                                                <!-- Ele -->
                                                <img src="assets/img/element/dot-grp1.png" alt="img" class="about-ele">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="services-development-section fix section-padding whitebg">
                            <div class="container">
                                <div class="container my-5">
                                    <div class="campaign-wrapper p-4">
                                        <h3 class="text-center mb-4 title">List of Campaigns</h3>
                                        <div class="row g-0">

                                            <!-- Card 1 -->
                                            <div class="col-lg-6 border-box">
                                                <div class="campaign-card d-flex">
                                                    <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/05/list-of-campaings-img-22.jpg" class="img-fluid">
                                                    <div class="content">
                                                        <h5>  Influencer Video Campaign:</h5>
                                                        <p>
                                                             Influencer Video Campaign Identified and briefed influencers. Coordinated video content production around the 'No Pain Period' campaign theme.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Card 3 -->
                                            <div class="col-lg-6 border-box">
                                                <div class="campaign-card d-flex">
                                                    <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/05/list-of-campaings-img-28.jpg" class="img-fluid">
                                                    <div class="content">
                                                        <h5>Multi-Creator Campaign Management:</h5>
                                                        <p>
                                                            Managed multiple influencers at the same time to keep the campaign message uniform.

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- ===== DIGITAL MARKETING PANEL ===== -->
                <div class="service-details-content cat-panel" id="panel-digital" style="display:none;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="thumb rounded-3 mb-xl-5 mb-4 " >
                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-CP-Joshi.jpg" alt="img" class="w-100 rounded-3">
                            </div>
                        </div>
                        <div class="col-md-7">
                                <div class="mb-xl-2 mb-2 pb-2">
                                    <h3 class="black mb-xl-1 mb-lg-1 mb-1" >
                                        Mumbai Indians
                                    </h3>
                                    <p class="pra fs-seven mb-1 " >
                                        IPL Cricket Team
                                    </p>
                                </div>
                                <div class="mb-xl-5 mb-4 pb-sm-2 mb-1">
                                    <h4 class="black mb-xxl-4 mb-3 " >Details</h4>
                                    <ul class="about-list d-grid gap-2">
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Category:</div>
                                                <p class="fs-seven fw_400 pra">Corporate Event – Flash Mob</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Year:</div>
                                                <p class="fs-seven fw_400 pra">2013</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">What We Did :</div>
                                                <p class="fs-seven fw_400 pra">Planned and performed a dance flash mob for Mumbai Indians as part of their fan engagement event.</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Result / Outcome :</div>
                                                <p class="fs-seven fw_400 pra">Successful brand activation event for one of India's biggest sports teams.</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Key Highlight  :</div>
                                                <p class="fs-seven fw_400 pra">Worked with a national IPL franchise — Mumbai Indians</p>
                                            </div>
                                        </li>
                                         <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Proof / Link  :</div>
                                                <p class="fs-seven fw_400 pra">Archival work – no public link</p>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                              

                        </div>
                        <section class="about-section style2 fix">
                            <div class="about-wrapper ">
                                <div class="container">
                                    <div
                                        class="row flex-row-reverse justify-content-lg-between justify-content-center g-4 align-items-center">
                                        <div class="col-xl-7 col-lg-7">
                                            <div class="about-content">
                                                <div class="section-title text-lg-start text-center mb-4">
                                                
                                                    <h3 class="mb-xxl-4 mb-3  black fw-bold "
                                                        >
                                                        ABOUT THIS PROJECT
                                                    </h3>
                                                    <p class="pra fs-seven">
                                                        In 2013, we created and performed a flash mob for Mumbai Indians, one of the most popular IPL
                                                        cricket teams in India. This was a fan engagement and brand activation event. We planned the
                                                        performance, managed the performers, and executed the flash mob at the event location.


                                                    </p>
                                                </div>
                                                <a  href="javascript:void(0)"
                                                        class="share-btn common-btn box-style cmn-style1 d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs18 fw-semibold white overflow-hidden rounded-5 p3-bg" onclick="shareCampaign('digital')">
                                                        Share
                                                    </a>
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5">
                                            <div class="about-thumb position-relative  w-100">
                                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-CP-Joshi.jpg" alt="img" class="w-100">
                                                <!-- Ele -->
                                                <img src="assets/img/element/dot-grp1.png" alt="img" class="about-ele">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="services-development-section fix section-padding whitebg">
                            <div class="container">
                                <div class="container my-5">
                                    <div class="campaign-wrapper p-4">
                                        <h3 class="text-center mb-4 title">List of Campaigns</h3>
                                        <div class="row g-0">

                                            <!-- Card 1 -->
                                            <div class="col-lg-6 border-box">
                                                <div class="campaign-card d-flex">
                                                    <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/05/list-of-campaings-img-22.jpg" class="img-fluid">
                                                    <div class="content">
                                                        <h5>  Mumbai Indians Fan Engagement Flash Mob:</h5>
                                                        <p>
                                                            Full flash mob concept, choreography, and execution for the Mumbai Indians event.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                         


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- ===== DATA mulund-fest PANEL ===== -->
                <div class="service-details-content cat-panel" id="panel-mulund-fest" style="display:none;">
                     <div class="row">
                        <div class="col-md-5">
                            <div class="thumb rounded-3 mb-xl-5 mb-4 " >
                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-Ashok-Tanwar.jpg" alt="img" class="w-100 rounded-3">
                            </div>
                        </div>
                        <div class="col-md-7">
                                <div class="mb-xl-2 mb-2 pb-2">
                                    <h3 class="black mb-xl-1 mb-lg-1 mb-1" >
                                        Mulund Fest
                                    </h3>
                                    <p class="pra fs-seven mb-1 " >
                                        Annual Community Festival, Mumbai
                                    </p>
                                </div>
                                <div class="mb-xl-5 mb-4 pb-sm-2 mb-1">
                                    <h4 class="black mb-xxl-4 mb-3 " >Details</h4>
                                    <ul class="about-list d-grid gap-2">
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Category:</div>
                                                <p class="fs-seven fw_400 pra">Live Event – Flash Mob Performance</p>
                                            </div>
                                        </li>
       
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">What We Did :</div>
                                                <p class="fs-seven fw_400 pra">Designed and delivered training sessions for BJP volunteers on election management, voter communication, and digital tools.</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                                <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                                <div class="fw-semibold black">
                                                    <div class="fs-six fw_700 d-block mb-1">Year :</div>
                                                    <p class="fs-seven fw_400 pra">2012</p>
                                                </div>
                                        </li>
                                         <li class="d-flex gap-2">
                                                <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                                <div class="fw-semibold black">
                                                    <div class="fs-six fw_700 d-block mb-1">What We Did :</div>
                                                    <p class="fs-seven fw_400 pra">Choreographed and performed a dance flash mob as the official opening act of the Mulund Fest.</p>
                                                </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Result / Outcome :</div>
                                                <p class="fs-seven fw_400 pra">Successful high-energy opening ceremony performance</p>
                                            </div>
                                        </li>
                                        <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Key Highlight  :</div>
                                                <p class="fs-seven fw_400 pra">One of our earliest flash mob productions — the project that started it all</p>
                                            </div>
                                        </li>
                                         <li class="d-flex gap-2">
                                            <span class="icon mt-1 d-center"><i class="fa-solid fa-check p1-clr fs-eight"></i></span>
                                            <div class="fw-semibold black">
                                                <div class="fs-six fw_700 d-block mb-1">Proof / Link  :</div>
                                                <p class="fs-seven fw_400 pra">Archival work – no public link</p>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                              

                        </div>
                        <section class="about-section style2 fix">
                            <div class="about-wrapper ">
                                <div class="container">
                                    <div
                                        class="row flex-row-reverse justify-content-lg-between justify-content-center g-4 align-items-center">
                                        <div class="col-xl-7 col-lg-7">
                                            <div class="about-content">
                                                <div class="section-title text-lg-start text-center mb-4">
                                                
                                                    <h3 class="mb-xxl-4 mb-3  black fw-bold "
                                                        >
                                                        ABOUT THIS PROJECT
                                                    </h3>
                                                    <p class="pra fs-seven">
                                                       In 2012, we performed a dance flash mob as the opening ceremony of Mulund Fest, a popular annual
                                                        community event in Mumbai. This was one of our first big live event productions. We choreographed
                                                        the entire performance and coordinated the team of performers for a surprise, high-energy opening
                                                        that excited the crowd.
                                                    </p>
                                                </div>
                                                <a  href="javascript:void(0)"
                                                        class="share-btn common-btn box-style cmn-style1 d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs18 fw-semibold white overflow-hidden rounded-5 p3-bg" onclick="shareCampaign('mulund-fest')">
                                                        Share
                                                    </a>
                                            
                                            
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-5">
                                            <div class="about-thumb position-relative  w-100">
                                                <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/04/our-leaders-Ashok-Tanwar.jpg" alt="img" class="w-100">
                                                <!-- Ele -->
                                                <img src="assets/img/element/dot-grp1.png" alt="img" class="about-ele">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="services-development-section fix section-padding whitebg">
                            <div class="container">
                                <div class="container my-5">
                                    <div class="campaign-wrapper p-4">
                                        <h3 class="text-center mb-4 title">List of Campaigns</h3>
                                        <div class="row g-0">

                                            <!-- Card 1 -->
                                            <div class="col-lg-6 border-box">
                                                <div class="campaign-card d-flex">
                                                    <img src="https://lightblue-bison-691648.hostingersite.com/wp-content/uploads/2025/05/list-of-campaings-img-22.jpg" class="img-fluid">
                                                    <div class="content">
                                                        <h5> Opening Ceremony Flash Mob Performance:</h5>
                                                        <p>
                                                            Full choreography and execution of the flash mob opening act for Mulund Fest 2012.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                       


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>                   
                  
                   
                </div>

            

            </div>
        </div>
    </div>
</section>
<!-- Service Dev Section end -->

    

<!-- ===== CATEGORY SWITCH JS ===== -->


    <!--<< Customer Touch Section Start >>-->
    <section class="customer-touch fix">
        <div class="container">
            <div class="customer-touch-wrap">
                <div class="section-title">
                    <span class="sub-badge white fs-seven text-uppercase d-block mb-2">Get to meet Your Next
                        Agency</span>
                    <h2 class=" white fw-bold visible-slowly-right" >
                        We’re delivering the best
                        customer experience
                    </h2>
                </div>
                <a href="contact.html"
                    class="common-btn text-nowrap heading-font box-style d-inline-flex justify-content-center align-items-center gap-xxl-2 gap-2 fs18 fw-semibold black overflow-hidden bg-white rounded100">
                    Get In Touch
                </a>
            </div>
        </div>
    </section>

<script>
// function showCategory(cat, clickedEl = null, updateUrl = true) {

//     // Hide all panels
//     document.querySelectorAll('.cat-panel').forEach(function(panel) {
//         panel.style.display = 'none';
//     });

//     // Remove active class
//     document.querySelectorAll('.cate-tags').forEach(function(tag) {
//         tag.classList.remove('active-cat');
//     });

//     // Show selected panel
//     var panel = document.getElementById('panel-' + cat);
//     if (panel) {
//         panel.style.display = 'block';
//     }

//     // Active tab highlight
//     if (clickedEl) {
//         clickedEl.classList.add('active-cat');
//     } else {
//         let activeTab = document.querySelector(`[data-cat="${cat}"]`);
//         if (activeTab) {
//             activeTab.classList.add('active-cat');
//         }
//     }

//     // URL update
//     if (updateUrl) {
//         const newUrl = window.location.pathname + '?campaign=' + cat;
//         window.history.pushState({}, '', newUrl);
//     }
// }
function showCategory(cat, clickedEl = null, updateUrl = true) {

    // Hide all panels
    document.querySelectorAll('.cat-panel').forEach(function(panel) {
        panel.style.display = 'none';
    });

    // Remove active class
    document.querySelectorAll('.cate-tags').forEach(function(tag) {
        tag.classList.remove('active-cat');
    });

    // Show selected panel
    var panel = document.getElementById('panel-' + cat);
    if (panel) {
        panel.style.display = 'block';
    }

    // Active tab
    if (clickedEl) {
        clickedEl.classList.add('active-cat');
    } else {
        let activeTab = document.querySelector(`[data-cat="${cat}"]`);
        if (activeTab) {
            activeTab.classList.add('active-cat');
        }
    }

    // URL update
    if (updateUrl) {
        const newUrl = window.location.pathname + '?campaign=' + cat;
        window.history.pushState({}, '', newUrl);
    }

    // IMPORTANT: re-init swiper when influencer tab opens
   if (cat === 'influ-mark') {
    setTimeout(() => {
        sponsorWrapper.update();

        if (sponsorWrapper.autoplay) {
            sponsorWrapper.autoplay.start();
        }
    }, 500);
}
}


// Share function
function shareCampaign(cat) {
    const shareUrl = window.location.origin + 
                     window.location.pathname + 
                     '?campaign=' + cat;

    // Modern browsers
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(shareUrl)
            .then(() => {
                alert("Link copied successfully!");
            })
            .catch(err => {
                console.log(err);
            });
    } 
    else {
        // Fallback for old browsers / HTTP websites
        const textArea = document.createElement("textarea");
        textArea.value = shareUrl;
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            document.execCommand('copy');
            alert("Link copied successfully!");
        } catch (err) {
            alert("Unable to copy link");
        }

        document.body.removeChild(textArea);
    }
}


// Page load par URL check karo
window.addEventListener('load', function () {
    const params = new URLSearchParams(window.location.search);
    const campaign = params.get('campaign');

    if (campaign) {
        showCategory(campaign, null, false);
    } else {
        showCategory('influ-mark', null, false); // default tab
    }
});

</script>
@endsection