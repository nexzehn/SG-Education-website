{{-- ============================================================
resources/views/home.blade.php
SG Educare — home page content (@yield('content'))
Extends layouts/main.blade.php (the Eduhive→Blade master layout).
NOTE: no
<link canonical> here — canonical lives in the layout.
Counters use Eduhive's jquery-appear + circle-progress (no extra script needed).
============================================================ --}}
@extends('layouts.main')

@section('title', 'SG Educare | Best Coaching Classes in Kalyan for JEE, NEET, MHT-CET & Boards')

@section('meta')
    <meta name="description"
        content="SG Educare — Kalyan's results-focused coaching institute for JEE (Main + Advanced), NEET-UG, MHT-CET, NDA and School Boards (Classes 8–10). Small batches, weekly testing and personal mentoring across 3 Kalyan campuses.">
    <meta name="keywords"
        content="coaching classes Kalyan, JEE coaching Kalyan, NEET coaching Kalyan, MHT-CET classes Kalyan, best coaching classes Kalyan, NDA coaching Kalyan, board tuition Kalyan, foundation classes Kalyan">

    <meta property="og:type" content="website">
    <meta property="og:title" content="SG Educare — Kalyan's Results-Focused Coaching Institute">
    <meta property="og:description"
        content="JEE, NEET, MHT-CET, NDA & Boards (8–10) coaching in Kalyan. Small batches, weekly tests, personal mentoring across 3 campuses.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SG Educare — Coaching Classes in Kalyan">
    <meta name="twitter:description"
        content="JEE, NEET, MHT-CET, NDA & Boards coaching in Kalyan. Small batches, weekly tests, personal mentoring.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
@endsection

@section('content')

    <section class="main-slider-one" id="home">
        <div class="main-slider-one__carousel eduhive-owl__carousel eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
            data-owl-options='{
                            "items": 1,
                            "margin": 0,
                            "animateIn": "fadeIn",
                            "animateOut": "fadeOut",
                            "loop": true,
                            "smartSpeed": 1000,
                            "nav": false,
                            "dots": false,
                            "autoplay": true,
                            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"]
                        }'>
            <div class="main-slider-one__item">
                <div class="container">
                    <div class="row gutter-y-60 align-items-center">
                        <div class="main-slider-one__col-content">
                            <div class="main-slider-one__content">
                                <img src="assets/images/shapes/main-slider-shape-1-1.png" alt="shape"
                                    class="main-slider-one__content__shape slider-image" />
                                <p class="main-slider-one__sub-title">The Pathway to Education</p>
                                <!-- /.sub-title -->
                                <h2 class="main-slider-one__title">
                                    Learn New
                                    <span class="main-slider-one__title__shape">Skills Online</span>
                                    <br />
                                    With Top
                                    <span class="main-slider-one__title__text">instructors</span>
                                </h2>
                                <!-- /.title -->
                                <div class="main-slider-one__description">
                                    <p class="main-slider-one__text">
                                        There Are Many Variations Of Passages Of Lorem Ipsum
                                        Available, But The Majority Have Suffered Alteration In Some.
                                    </p>
                                    <!-- /.text -->
                                </div>
                                <!-- /.description -->
                                <div class="main-slider-one__button">
                                    <a href="courses.html" class="main-slider-one__btn-1 eduhive-btn">
                                        <span>find course</span>
                                        <span class="eduhive-btn__icon">
                                            <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                        </span> </a><!-- /.eduhive-btn -->
                                    <a href="about.html" class="main-slider-one__btn-2 eduhive-btn eduhive-btn--border">
                                        <span>About us</span>
                                        <span class="eduhive-btn__icon">
                                            <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                        </span> </a><!-- /.eduhive-btn -->
                                </div>
                                <!-- /.button -->
                            </div>
                            <!-- /.main-slider-one__content -->
                        </div>
                        <!-- /.main-slider-one__col-content -->
                        <div class="main-slider-one__col-image">
                            <div class="main-slider-one__image">
                                <div class="main-slider-one__image__left">
                                    <div class="main-slider-one__image__one">
                                        <div class="main-slider-one__image__one__inner">
                                            <img src="assets/images/main-slider/main-slider-1-1.jpg" alt="slider image"
                                                class="slider-image" />
                                        </div>
                                        <!-- /.main-slider-one__image__one__inner -->
                                        <div class="total-student">
                                            <div class="total-student__inner">
                                                <div class="total-student__image">
                                                    <img src="assets/images/main-slider/main-slider-student-1-1.png"
                                                        alt="student" class="slider-image" />
                                                    <img src="assets/images/main-slider/main-slider-student-1-2.png"
                                                        alt="student" class="slider-image" />
                                                </div>
                                                <!-- /.total-student__image -->
                                                <h4 class="total-student__text count-box">
                                                    <span class="count-text" data-stop="200"
                                                        data-speed="1500">0</span><span>k+ <br />
                                                        Students</span>
                                                </h4>
                                                <!-- /.total-student__text -->
                                            </div>
                                            <!-- /.total-student__inner -->
                                        </div>
                                        <!-- /.total-student -->
                                    </div>
                                    <!-- /.main-slider-one__image__one -->
                                </div>
                                <!-- /.main-slider-one__image__left -->
                                <div class="main-slider-one__image__right">
                                    <div class="main-slider-one__image__two">
                                        <img src="assets/images/main-slider/main-slider-1-2.jpg" alt="slider image"
                                            class="slider-image" />
                                    </div>
                                    <!-- /.main-slider-one__image__two -->
                                    <div class="main-slider-one__image__three">
                                        <img src="assets/images/main-slider/main-slider-1-3.jpg" alt="slider image"
                                            class="slider-image" />
                                    </div>
                                    <!-- /.main-slider-one__image__three -->
                                </div>
                                <!-- /.main-slider-one__image__right -->
                                <img src="assets/images/shapes/main-slider-shape-1-3.png" alt="shape"
                                    class="main-slider-one__image__shape-one slider-image" />
                                <img src="assets/images/shapes/main-slider-shape-1-4.png" alt="shape"
                                    class="main-slider-one__image__shape-two slider-image" />
                                <img src="assets/images/shapes/main-slider-shape-1-5.png" alt="shape"
                                    class="main-slider-one__image__shape-three slider-image" />
                                <div class="main-slider-one__image__shape-four"></div>
                                <!-- /.main-slider-one__image__shape -->
                            </div>
                            <!-- /.main-slider-one__image -->
                        </div>
                        <!-- /.main-slider-one__col-image -->
                    </div>
                    <!-- /.row gutter-y-60 -->
                </div>
                <!-- /.container -->
                <div class="main-slider-one__shape-one"></div>
                <!-- /.main-slider-one__shape-one -->
                <div class="main-slider-one__shape-two"></div>
                <!-- /.main-slider-one__shape-two -->
                <div class="main-slider-one__shape-three"></div>
                <!-- /.main-slider-one__shape-three -->
                <img src="assets/images/shapes/main-slider-shape-1-2.png" alt="shape"
                    class="main-slider-one__shape-four slider-image" />
            </div>
            <!-- /.main-slider-one__item -->
            <div class="main-slider-one__item">
                <div class="container">
                    <div class="row gutter-y-60 align-items-center">
                        <div class="main-slider-one__col-content">
                            <div class="main-slider-one__content">
                                <img src="assets/images/shapes/main-slider-shape-1-1.png" alt="shape"
                                    class="main-slider-one__content__shape slider-image" />
                                <p class="main-slider-one__sub-title">The Pathway to Education</p>
                                <!-- /.sub-title -->
                                <h2 class="main-slider-one__title">
                                    Learn
                                    <span class="main-slider-one__title__shape">New Skills</span> To
                                    Go <br />
                                    Ahead For Your
                                    <span class="main-slider-one__title__text">Career</span>
                                </h2>
                                <!-- /.title -->
                                <div class="main-slider-one__description">
                                    <p class="main-slider-one__text">
                                        Who's Responsible For The Ask For This Request? My Supervisor
                                        Didn't Like The Latest Revision You Gave Me Can You Switch
                                        Back.
                                    </p>
                                    <!-- /.text -->
                                </div>
                                <!-- /.description -->
                                <div class="main-slider-one__button">
                                    <a href="courses.html" class="main-slider-one__btn-1 eduhive-btn">
                                        <span>find course</span>
                                        <span class="eduhive-btn__icon">
                                            <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                        </span> </a><!-- /.eduhive-btn -->
                                    <a href="about.html" class="main-slider-one__btn-2 eduhive-btn eduhive-btn--border">
                                        <span>About us</span>
                                        <span class="eduhive-btn__icon">
                                            <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                        </span> </a><!-- /.eduhive-btn -->
                                </div>
                                <!-- /.button -->
                            </div>
                            <!-- /.main-slider-one__content -->
                        </div>
                        <!-- /.main-slider-one__col-content -->
                        <div class="main-slider-one__col-image">
                            <div class="main-slider-one__image">
                                <div class="main-slider-one__image__left">
                                    <div class="main-slider-one__image__one">
                                        <div class="main-slider-one__image__one__inner">
                                            <img src="assets/images/main-slider/main-slider-1-4.jpg" alt="slider image"
                                                class="slider-image" />
                                        </div>
                                        <!-- /.main-slider-one__image__one__inner -->
                                        <div class="total-student">
                                            <div class="total-student__inner">
                                                <div class="total-student__image">
                                                    <img src="assets/images/main-slider/main-slider-student-1-1.png"
                                                        alt="student" class="slider-image" />
                                                    <img src="assets/images/main-slider/main-slider-student-1-2.png"
                                                        alt="student" class="slider-image" />
                                                </div>
                                                <!-- /.total-student__image -->
                                                <h4 class="total-student__text count-box">
                                                    <span class="count-text" data-stop="200"
                                                        data-speed="1500">0</span><span>k+ <br />
                                                        Students</span>
                                                </h4>
                                                <!-- /.total-student__text -->
                                            </div>
                                            <!-- /.total-student__inner -->
                                        </div>
                                        <!-- /.total-student -->
                                    </div>
                                    <!-- /.main-slider-one__image__one -->
                                </div>
                                <!-- /.main-slider-one__image__left -->
                                <div class="main-slider-one__image__right">
                                    <div class="main-slider-one__image__two">
                                        <img src="assets/images/main-slider/main-slider-1-5.jpg" alt="slider image"
                                            class="slider-image" />
                                    </div>
                                    <!-- /.main-slider-one__image__two -->
                                    <div class="main-slider-one__image__three">
                                        <img src="assets/images/main-slider/main-slider-1-6.jpg" alt="slider image"
                                            class="slider-image" />
                                    </div>
                                    <!-- /.main-slider-one__image__three -->
                                </div>
                                <!-- /.main-slider-one__image__right -->
                                <img src="assets/images/shapes/main-slider-shape-1-3.png" alt="shape"
                                    class="main-slider-one__image__shape-one slider-image" />
                                <img src="assets/images/shapes/main-slider-shape-1-4.png" alt="shape"
                                    class="main-slider-one__image__shape-two slider-image" />
                                <img src="assets/images/shapes/main-slider-shape-1-5.png" alt="shape"
                                    class="main-slider-one__image__shape-three slider-image" />
                                <div class="main-slider-one__image__shape-four"></div>
                                <!-- /.main-slider-one__image__shape -->
                            </div>
                            <!-- /.main-slider-one__image -->
                        </div>
                        <!-- /.main-slider-one__col-image -->
                    </div>
                    <!-- /.row gutter-y-60 -->
                </div>
                <!-- /.container -->
                <div class="main-slider-one__shape-one"></div>
                <!-- /.main-slider-one__shape-one -->
                <div class="main-slider-one__shape-two"></div>
                <!-- /.main-slider-one__shape-two -->
                <div class="main-slider-one__shape-three"></div>
                <!-- /.main-slider-one__shape-three -->
                <img src="assets/images/shapes/main-slider-shape-1-2.png" alt="shape"
                    class="main-slider-one__shape-four slider-image" />
            </div>
            <!-- /.main-slider-one__item -->
        </div>
        <!-- /.main-slider-one__carousel -->
    </section>
    <!-- /.main-slider-one -->

    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our category</h6>
                <!-- /.sec-title__tagline -->
                <h3 class="sec-title__title">
                    our <span class="sec-title__title__text">Top</span>
                    <span class="sec-title__title__shape">Categories</span>
                </h3>
                <!-- /.sec-title__title -->
            </div>
            <!-- /.sec-title -->
            <div class="row gutter-y-30">
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="course-category__card course-category__card--1">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-1.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-briefcase"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">Business Management</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="course-category__card course-category__card--2">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-2.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-art-studies"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">Arts & Design</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="course-category__card course-category__card--3">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-3.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-self-confidence"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">Personal Development</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                    <div class="course-category__card course-category__card--4">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-4.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-setting"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">IT & Software</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="course-category__card course-category__card--5">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-5.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-healthcare"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">Health & Fitness</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="course-category__card course-category__card--6">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-6.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-coding-1"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">Computer Science</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="course-category__card course-category__card--7">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-7.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-clapperboard"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">Video & Photography</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                    <div class="course-category__card course-category__card--8">
                        <div class="course-category__card__inner">
                            <div class="course-category__card__bg" style="
                                    background-image: url(assets/images/course-category/course-category-card-bg-1-8.jpg);
                                  "></div>
                        </div>
                        <!-- /.course-category__card__inner -->
                        <div class="course-category__card__content">
                            <div class="course-category__card__icon-box">
                                <span class="course-category__card__icon">
                                    <i class="icon-megaphone"></i>
                                </span>
                            </div>
                            <!-- /.course-category__card__icon-box -->
                            <h4 class="course-category__card__title">digital Marketing</h4>
                            <!-- /.course-category__card__title -->
                        </div>
                        <!-- /.course-category__card__content -->
                    </div>
                    <!-- /.course-category__card -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
            </div>
            <!-- /.row gutter-y-30 -->
        </div>
        <!-- /.container -->
        <div class="course-category__shape-one"></div>
        <!-- /.course-category__shape-one -->
        <div class="course-category__shape-two"></div>
        <!-- /.course-category__shape-two -->
    </section>
    <!-- /.course-category section-space -->

    <section class="about-one section-space" id="about">
        <div class="about-one__bg" style="background-image: url(assets/images/shapes/about-bg-1-1.png)"></div>
        <!-- /.about-one__bg -->
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-one__image">
                        <div class="about-one__image__one">
                            <img src="assets/images/about/about-1-1.jpg" alt="about" />
                            <div class="about-one__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc"
                                    class="about-one__video__btn video-btn video-popup">
                                    <i class="icon-play"></i>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span> </a><!-- /.about-one__video-btn -->
                                <p class="about-one__video__text">play now</p>
                                <!-- /.about-one__video__text -->
                            </div>
                            <!-- /.about-one__video -->
                        </div>
                        <!-- /.about-one__image__one -->
                        <div class="about-one__image__two">
                            <img src="assets/images/about/about-1-2.jpg" alt="about" />
                        </div>
                        <!-- /.about-one__image__two -->
                        <img src="assets/images/shapes/about-shape-1-1.png" alt="about" class="about-one__image__shape" />
                        <div class="about-one__image__circle">
                            <div class="about-one__image__circle__inner"></div>
                        </div>
                        <!-- /.about-one__image__circle -->
                    </div>
                    <!-- /.about-one__image -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">about us</h6>
                            <!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title">
                                we are the most popular online <br />
                                <span class="sec-title__title__shape">skill development</span>
                                <span class="sec-title__title__text">platform</span>
                            </h3>
                            <!-- /.sec-title__title -->
                        </div>
                        <!-- /.sec-title -->
                        <div class="about-one__description wow fadeInUp" data-wow-duration="1500ms">
                            <p class="about-one__text">
                                Viverra Ipsum Nunc Aliquet Bibendum Enim Facilisis Gravida. Diam
                                Phasellus Vestibulum Lorem Sed Risus Ultricies. Magna Sit Amet
                                Purus Gravida Quis Blandit. Arcu Cursus Vitae Congue Mauris.
                            </p>
                            <!-- /.about-one__text -->
                        </div>
                        <!-- /.about-one__description -->
                        <div class="about-one__inner wow fadeInUp" data-wow-duration="1500ms">
                            <ul class="about-one__info list-unstyled">
                                <li>
                                    <span class="about-one__info__icon"><i class="icon-right-up"></i></span>
                                    Expert Trainers
                                </li>
                                <li>
                                    <span class="about-one__info__icon"><i class="icon-right-up"></i></span>
                                    Online Remote Learning
                                </li>
                                <li>
                                    <span class="about-one__info__icon"><i class="icon-right-up"></i></span>
                                    Lifetime Access
                                </li>
                            </ul>
                            <!-- /.about-one__info list-unstyled -->
                            <div class="about-one__button">
                                <a href="about.html" class="about-one__btn eduhive-btn eduhive-btn--border">
                                    <span>more About us</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span> </a><!-- /.eduhive-btn -->
                            </div>
                            <!-- /.about-one__button -->
                        </div>
                        <!-- /.about-one__inner -->
                    </div>
                    <!-- /.about-one__content -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row gutter-y-50 -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.about-one section-space -->

    <section class="our category
     section-space" id="courses">
        <div class="courses-two__bg" style="background-image: url(assets/images/shapes/courses-bg-2-1.png);"></div>
        <!-- /.courses-two__bg -->
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our courses</h6><!-- /.sec-title__tagline -->
                <h3 class="sec-title__title"><span>Our</span> <span class="sec-title__title__shape">Most</span>
                    <span>Popular</span> <span class="sec-title__title__text">Courses</span>
                </h3><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <ul class="list-unstyled courses-two__filter-list owl-filter-bar wow fadeInUp" data-wow-duration="1500ms">
                <li class="item active" data-owl-filter="*">All courses</li>
                <li class="item" data-owl-filter=".programming">programming</li>
                <li class="item" data-owl-filter=".digital-marketing">digital marketing</li>
                <li class="item" data-owl-filter=".graphic-design">graphic design</li>
            </ul><!-- /.list-unstyledf -->
        </div><!-- /.container -->
        <div class="courses-two__container container">
            <div class="courses-two__carousel eduhive-owl__carousel--progress eduhive-owl__carousel--filter-with-counter eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-filters-div=".courses-two__filter-list" data-progress-options='{
                                "size": "1px",
                                "margin": "0 auto",
                                "foregroundColor": "var(--eduhive-border-color)",
                                "color": "var(--eduhive-base)",
                                "borderRadius": 0,
                                "transitionInterval": 1,
                                "progressBarClassName": "courses-two__carousel__progress-bar",
                                "scrollerClassName": "courses-two__carousel__scroller"
                                }' data-owl-options='{
                                "items": 1,
                                "margin": 10,
                                "loop": false,
                                "smartSpeed": 700,
                                "nav": true,
                                "dots": false,
                                "navContainer": ".courses-two__custome-navs",
                                "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                                "autoplay": true,
                                "responsive": {
                                    "0": {
                                        "items": 1,
                                        "margin": 10
                                    },
                                    "576": {
                                        "items": 1,
                                        "margin": 30,
                                        "stagePadding": 100
                                    },
                                    "768": {
                                        "items": 1,
                                        "margin": 30,
                                        "stagePadding": 200
                                    },
                                    "992": {
                                        "items": 2,
                                        "margin": 30,
                                        "stagePadding": 120
                                    },
                                    "1200": {
                                        "items": 2,
                                        "margin": 30,
                                        "stagePadding": 270
                                    },
                                    "1400": {
                                        "items": 3,
                                        "margin": 30,
                                        "stagePadding": 120
                                    },
                                    "1600": {
                                        "items": 3,
                                        "margin": 30,
                                        "stagePadding": 210
                                    },
                                    "1800": {
                                        "items": 3,
                                        "margin": 30,
                                        "stagePadding": 375
                                    }
                                }
                            }'>
                <div class="item programming">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-1.jpg"
                                alt="WordPress for Everyone: Unlock Your Creativity Online">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    25 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="wordpress-development.html">WordPress for Everyone:
                                    Unlock Your Creativity Online</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    25 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    350 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>69.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        25 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="wordpress-development.html">WordPress for Everyone: Unlock Your Creativity
                                        Online</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Viverra ipsum nunc aliquet bibendum enim facilisis gravida.
                                    Diam phasellus vestibulum lorem sed risus</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="wordpress-development.html"
                                    class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        25 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        350 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item programming -->
                <div class="item digital-marketing">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-6.jpg"
                                alt="Digital Marketing course Guideline: Level Up Your Skills">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    28 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="digital-marketing.html">Digital Marketing course
                                    Guideline: Level Up Your Skills</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    26 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    100 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>20.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        28 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="digital-marketing.html">Digital Marketing course Guideline: Level Up Your
                                        Skills</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Unless they bother until the end of time maybe vis a vis too
                                    many cooks over the line encourage & support business</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="digital-marketing.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        26 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        100 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item digital-marketing -->
                <div class="item graphic-design">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-4.jpg"
                                alt="advanced Mastering UI/UX Design Fundamentals course">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    15 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="uiux-design.html">advanced Mastering UI/UX Design
                                    Fundamentals course</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    28 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    150 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>70.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        15 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a href="uiux-design.html">advanced
                                        Mastering UI/UX Design Fundamentals course</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">The closest elephant is the most dangerous. We should have a
                                    meeting to discuss the details of the next</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="uiux-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        28 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        150 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item graphic-design -->
                <div class="item programming">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-2.jpg"
                                alt="The Data Science Revolution: Upgrading Your Skills">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    20 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="data-science.html">The Data Science Revolution:
                                    Upgrading Your Skills</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    20 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    300 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>50.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        20 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a href="data-science.html">The
                                        Data Science Revolution: Upgrading Your Skills</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">We need to dialog around your choice of work attire we need
                                    more paper back of the net quick win yet today</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="data-science.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        20 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        300 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item programming -->
                <div class="item digital-marketing">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-7.jpg"
                                alt="The SEO Become an Expert in Search Engine Optimization">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    10 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="search-engine-optimization.html">The SEO Become an
                                    Expert in Search Engine Optimization</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    19 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    450 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>35.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        10 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="search-engine-optimization.html">The SEO Become an Expert in Search Engine
                                        Optimization</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">T-shaped individual start procrastinating 2 hours get to do
                                    work while procrastinating open book</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="search-engine-optimization.html"
                                    class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        19 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        450 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item digital-marketing -->
                <div class="item graphic-design">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-5.jpg"
                                alt="advanced Mastering graphics Design Fundamentals course">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    35 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="graphics-design.html">advanced Mastering graphics Design
                                    Fundamentals course</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    15 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    250 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>85.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        35 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="graphics-design.html">advanced Mastering graphics Design Fundamentals
                                        course</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">The flagpole bazooka that run it past the boss jump right in
                                    and banzai attack will they won't they its all greek</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="graphics-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        15 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        250 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item graphic-design -->

                <div class="item programming">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-3.jpg"
                                alt="From Zero to Website: A Web Development Adventure">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    30 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="web-development.html">From Zero to Website: A Web
                                    Development Adventure</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    32 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    250 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>40.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        30 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a href="web-development.html">From
                                        Zero to Website: A Web Development Adventure</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Yet today shall be a cloudy day, thanks to blue sky thinking,
                                    we can now deploy our new ui to the cloud</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="web-development.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        32 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        250 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item programming -->
                <div class="item digital-marketing">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-10.jpg"
                                alt="Social Media Marketing Mastering course From Zero to Hero">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    11 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="digital-marketing.html">Social Media Marketing Mastering
                                    course From Zero to Hero</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    21 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    150 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>36.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        11 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="digital-marketing.html">Social Media Marketing Mastering course From Zero to
                                        Hero</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Anim veritatis, so aliquip magna. Aut quis accusantium,
                                    doloremque suscipit, yet exercitation nostrum</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="digital-marketing.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        21 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        150 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item digital-marketing -->
                <div class="item graphic-design">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-15.jpg"
                                alt="advanced Mastering mobile app design Fundamentals course">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    37 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="graphics-design.html">advanced Mastering mobile app
                                    design Fundamentals course</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    16 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    210 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>80.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        37 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="graphics-design.html">advanced Mastering mobile app design Fundamentals
                                        course</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Quasi nequeporro modi ullamco tempor, yet quaerat, for vitae.
                                    Ullamco quo, but ipsa, nor ullamco, and adipisicing</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="graphics-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        16 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        210 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item graphic-design -->
                <div class="item programming">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-8.jpg"
                                alt="Apps Development Mastering course From Zero to Hero">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    40 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="apps-development.html">Apps Development Mastering course
                                    From Zero to Hero</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    37 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    400 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>55.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        40 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="apps-development.html">Apps Development Mastering course From Zero to Hero</a>
                                </h3><!-- /.course-card__title -->
                                <p class="course-card__text">Baseline the procedure and samepage your department i am dead
                                    inside, and move the needle, so exposing new</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="apps-development.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        37 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        400 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item programming -->
                <div class="item digital-marketing">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-11.jpg"
                                alt="advanced Marketing Analytics Mastering course From Zero to Hero">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    17 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="digital-marketing.html">advanced Marketing Analytics
                                    Mastering course From Zero to Hero</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    32 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    50 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>38.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        17 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="digital-marketing.html">advanced Marketing Analytics Mastering course From
                                        Zero to Hero</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Consectetur officia. Ea illo, yet velit, pariatur, but eu qui.
                                    Officia ullamco, for id dolores nihil Eius ipsam</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="digital-marketing.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        32 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        50 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item digital-marketing -->
                <div class="item graphic-design">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-16.jpg"
                                alt="advanced Mastering web UI/UX design Fundamentals course">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    39 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="uiux-design.html">advanced Mastering web UI/UX design
                                    Fundamentals course</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    18 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    220 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>79.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        39 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a href="uiux-design.html">advanced
                                        Mastering web UI/UX design Fundamentals course</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Accusantium incidunt mollit. Nesciunt quisquam accusantium, yet
                                    sint. Sunt nequeporro Totam commodi Omnis ab, or dolor, for ut</p>
                                <!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="uiux-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        18 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        220 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item graphic-design -->

                <div class="item programming">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-9.jpg"
                                alt="Web Design Wizardry Mastering Responsive Website">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    26 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="web-design.html">Web Design Wizardry Mastering
                                    Responsive Website</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    18 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    80 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>28.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        26 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a href="web-design.html">Web
                                        Design Wizardry Mastering Responsive Website</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Race without a finish line we don't want to boil the ocean.
                                    What do you feel you would bring to the table</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="web-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        18 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        80 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item programming -->
                <div class="item digital-marketing">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-12.jpg"
                                alt="advanced Affiliate Marketing Mastering course From Zero to Hero">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    18 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="digital-marketing.html">advanced Affiliate Marketing
                                    Mastering course From Zero to Hero</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    16 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    52 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>32.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        18 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="digital-marketing.html">advanced Affiliate Marketing Mastering course From
                                        Zero to Hero</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Illum explicabo, and dicta. Velit magni modi est, but non, and
                                    aut, yet pariatur. Quo. Sunt do, so ex id ipsum</p><!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="digital-marketing.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        16 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        52 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item digital-marketing -->
                <div class="item graphic-design">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-17.jpg"
                                alt="advanced Mastering professional logo design Fundamentals course">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    41 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="graphics-design.html">advanced Mastering professional
                                    logo design Fundamentals course</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    21 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    190 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>60.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        41 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="graphics-design.html">advanced Mastering professional logo design Fundamentals
                                        course</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Accusantium incidunt mollit. Nesciunt quisquam accusantium, yet
                                    sint. Sunt nequeporro Totam commodi Omnis ab, or dolor, for ut</p>
                                <!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="graphics-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        21 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        190 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item graphic-design -->
                <div class="item programming">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-14.jpg"
                                alt="advanced machine learning Mastering course From Zero to Hero">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    23 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="data-science.html">advanced machine learning Mastering
                                    course From Zero to Hero</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    41 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    56 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>33.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        23 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="data-science.html">advanced machine learning Mastering course From Zero to
                                        Hero</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Natus nequeporro. Adipisicing consequat nemo. Illum. Aliquip
                                    reprehenderit lorem duis, yet eum, and quasi qui Veritatis</p>
                                <!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="data-science.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        41 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        56 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item programming -->
                <div class="item digital-marketing">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-13.jpg"
                                alt="advanced Email Marketing Mastering course From Zero to Hero">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    21 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="digital-marketing.html">advanced Email Marketing
                                    Mastering course From Zero to Hero</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    14 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    54 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>29.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        21 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="digital-marketing.html">advanced Email Marketing Mastering course From Zero to
                                        Hero</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Et velit, for inventore ab, and quaerat suscipit. Minim. Minim
                                    adipisci. Totam architecto for non, so aut, for veniam pariatur</p>
                                <!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="digital-marketing.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        14 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        54 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item digital-marketing -->
                <div class="item graphic-design">
                    <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="course-card__image">
                            <img src="assets/images/courses/course-1-18.jpg"
                                alt="advanced Mastering business card design Fundamentals course">
                            <div class="course-card__ratings">
                                <div class="eduhive-ratings">
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                    <span class="eduhive-ratings__icon">
                                        <i class="fa fa-star"></i>
                                    </span><!-- /.eduhive-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                            </div><!-- /.course-card__ratings -->
                        </div><!-- /.course-card__image -->
                        <div class="course-card__content">
                            <div class="course-card__content__top">
                                <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                <div class="course-card__duration">
                                    <span class="course-card__duration__icon">
                                        <i class="icon-clock"></i>
                                    </span><!-- /.course-card__duration__icon -->
                                    45 weeks
                                </div><!-- /.course-card__duration -->
                            </div><!-- /.course-card__content__top -->
                            <h3 class="course-card__title"><a href="graphics-design.html">advanced Mastering business card
                                    design Fundamentals course</a></h3><!-- /.course-card__title -->
                            <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    25 lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    130 Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h4 class="course-card__price">$<span>55.00</span></h4><!-- /.course-card__price -->
                        </div><!-- /.course-card__content -->
                        <div class="course-card__hover"
                            style="background-image: url(assets/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__content__top course-card__content__top--hover">
                                    <div class="course-card__category">Experts</div><!-- /.course-card__category -->
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon">
                                            <i class="icon-clock"></i>
                                        </span><!-- /.course-card__duration__icon -->
                                        45 weeks
                                    </div><!-- /.course-card__duration -->
                                </div><!-- /.course-card__content__top -->
                                <h3 class="course-card__title course-card__title--hover"><a
                                        href="graphics-design.html">advanced Mastering business card design Fundamentals
                                        course</a></h3><!-- /.course-card__title -->
                                <p class="course-card__text">Perspiciatis tempor, but perspiciatis, adipisicing, but
                                    consequat magna, so illo. Cupidatat laudantium. Quis nihil illo</p>
                                <!-- /.course-card__text -->
                                <div class="course-card__ratings course-card__ratings--hover">
                                    <div class="eduhive-ratings">
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                        <span class="eduhive-ratings__icon">
                                            <i class="fa fa-star"></i>
                                        </span><!-- /.eduhive-ratings__icon -->
                                    </div><!-- /.product-ratings -->
                                    <p class="course-card__ratings__text">5 Ratings</p><!-- /.course-card__ratings__text -->
                                </div><!-- /.course-card__ratings -->
                                <a href="graphics-design.html" class="course-card__btn eduhive-btn eduhive-btn--border">
                                    <span>enroll now</span>
                                    <span class="eduhive-btn__icon">
                                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                    </span>
                                </a><!-- /.course-card__btn eduhive-btn -->
                                <div class="course-card__info course-card__info--hover">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon">
                                            <i class="icon-open-book"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        25 lessons
                                    </div><!-- /.course-card__lessons -->
                                    <div class="course-card__students">
                                        <span class="course-card__students__icon">
                                            <i class="icon-multiple-users-silhouette"></i>
                                        </span><!-- /.course-card__lessons__icon -->
                                        130 Students
                                    </div><!-- /.course-card__students -->
                                </div><!-- /.course-card__info -->
                            </div><!-- /.course-card__hover__content -->
                        </div><!-- /.course-card__hover -->
                    </div><!-- /.course-card -->
                </div><!-- /.item graphic-design -->
            </div><!-- /.courses-two__carousel -->
        </div><!-- /.courses-two__container container -->
        <div class="container">
            <div class="courses-two__custome-navs"></div><!-- /.courses-two__custome-navs -->
        </div><!-- /.container -->
        <div class="courses-two__box-one"></div><!-- /.courses-two__box-one -->
        <div class="courses-two__box-two"></div><!-- /.courses-two__box-two -->
        <img src="assets/images/shapes/courses-shape-2-1.png" alt="shape" class="courses-two__shape-one">
        <img src="assets/images/shapes/courses-shape-2-2.png" alt="shape" class="courses-two__shape-two">
    </section><!-- /.courses-two section-space-bottom -->

    <section class="faq-one faq-one--home section-space">
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6">
                    <div class="funfact-one">
                        <div class="funfact-one__grid">
                            <div class="funfact-one__item funfact-one__item--secondary wow fadeInUp"
                                data-wow-duration="1500ms" data-wow-delay="00ms">
                                <div class="funfact-one__icon">
                                    <span class="funfact-one__icon__inner"><i class="icon-connectibity"></i></span>
                                </div><!-- /.funfact-one__icon -->
                                <h3 class="funfact-one__title count-box">
                                    <span class="count-text" data-stop="30" data-speed="1500">0</span>
                                    <span>k+</span>
                                </h3><!-- /.funfact-one__title -->
                                <p class="funfact-one__text">Satisfied Student</p><!-- /.funfact-one__text -->
                            </div><!-- /.funfact-one__item -->
                            <div class="funfact-one__item funfact-one__item--primary wow fadeInUp"
                                data-wow-duration="1500ms" data-wow-delay="100ms">
                                <div class="funfact-one__icon">
                                    <span class="funfact-one__icon__inner"><i class="icon-batch-assign"></i></span>
                                </div><!-- /.funfact-one__icon -->
                                <h3 class="funfact-one__title count-box">
                                    <span class="count-text" data-stop="6500" data-speed="1500">0</span>
                                    <span>+</span>
                                </h3><!-- /.funfact-one__title -->
                                <p class="funfact-one__text">Class Completed</p><!-- /.funfact-one__text -->
                            </div><!-- /.funfact-one__item -->
                            <div class="funfact-one__item funfact-one__item--primary wow fadeInUp"
                                data-wow-duration="1500ms" data-wow-delay="00ms">
                                <div class="funfact-one__icon">
                                    <span class="funfact-one__icon__inner"><i class="icon-students"></i></span>
                                </div><!-- /.funfact-one__icon -->
                                <h3 class="funfact-one__title count-box">
                                    <span class="count-text" data-stop="6561" data-speed="1500">0</span>
                                    <span>+</span>
                                </h3><!-- /.funfact-one__title -->
                                <p class="funfact-one__text">Active Students</p><!-- /.funfact-one__text -->
                            </div><!-- /.funfact-one__item -->
                            <div class="funfact-one__item funfact-one__item--secondary wow fadeInUp"
                                data-wow-duration="1500ms" data-wow-delay="100ms">
                                <div class="funfact-one__icon">
                                    <span class="funfact-one__icon__inner"><i class="icon-instructors"></i></span>
                                </div><!-- /.funfact-one__icon -->
                                <h3 class="funfact-one__title count-box">
                                    <span class="count-text" data-stop="400" data-speed="1500">0</span>
                                    <span>+</span>
                                </h3><!-- /.funfact-one__title -->
                                <p class="funfact-one__text">Experts Instructors</p><!-- /.funfact-one__text -->
                            </div><!-- /.funfact-one__item -->
                        </div><!-- /.rfunfact-one__grid -->
                    </div><!-- /.funfact-one -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="faq-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">faq’s</h6><!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title">We Are Always Ensure <span class="sec-title__title__text">Best <br>
                                    Course</span> For <span class="sec-title__title__shape">Your Learning</span></h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="faq-one__accordion">
                            <div class="eduhive-accordion" data-grp-name="eduhive-accordion">
                                <div class="accordion wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="accordion-title">
                                        <h4>How long should a business plan be?</h4>
                                        <span class="accordion-title__icon">
                                            <i class="icon-double-arrow"></i>
                                        </span>
                                    </div><!-- /.accordion-title -->
                                    <div class="accordion-content">
                                        <div class="inner">
                                            <p>Bring to the table win-win survival strategies to ensure proactive
                                                domination. At the end of the day, going forward, a new normal.</p>
                                        </div><!-- /.inner -->
                                    </div><!-- /.accordion-content -->
                                </div><!-- /.accordion-item -->
                                <div class="accordion active wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="accordion-title">
                                        <h4>What is included in your services?</h4>
                                        <span class="accordion-title__icon">
                                            <i class="icon-double-arrow"></i>
                                        </span>
                                    </div><!-- /.accordion-title -->
                                    <div class="accordion-content">
                                        <div class="inner">
                                            <p>There are many variations of passages Lorem Ipsum but the majority have
                                                suffered alteration in some form, by injected humour.</p>
                                        </div><!-- /.inner -->
                                    </div><!-- /.accordion-content -->
                                </div><!-- /.accordion-item -->
                                <div class="accordion wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="accordion-title">
                                        <h4>What type of company is measured?</h4>
                                        <span class="accordion-title__icon">
                                            <i class="icon-double-arrow"></i>
                                        </span>
                                    </div><!-- /.accordion-title -->
                                    <div class="accordion-content">
                                        <div class="inner">
                                            <p>Prior to joining company, she spent 20+ years at Inmosys, where he held a
                                                wide range of global leadership roles, from services to products.</p>
                                        </div><!-- /.inner -->
                                    </div><!-- /.accordion-content -->
                                </div><!-- /.accordion-item -->
                            </div><!-- /.faq-accordion -->
                        </div><!-- /.faq-one__accordion -->
                    </div><!-- /.faq-one__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row gutter-y-50 -->
        </div><!-- /.container -->
        <div class="faq-one__image-inner">
            <img src="assets/images/faq/faq-2-1.jpg" alt="faq">
        </div><!-- /.faq-one__image-inner -->
        <img src="assets/images/shapes/faq-shape-1-5.png" alt="shape" class="faq-one__shape-three">
    </section><!-- /.faq-one section-space -->


    <section class="instructors-three section-space2" id="instructors">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our expert team</h6><!-- /.sec-title__tagline -->
                <h3 class="sec-title__title">Our <span class="sec-title__title__text">expert</span> <span
                        class="sec-title__title__shape">instructor</span></h3><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <div class="instructors-three__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                "items": 1,
                "margin": 10,
                "loop": true,
                "smartSpeed": 700,
                "nav": false,
                "dots": true,
                "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                "autoplay": true,
                "responsive": {
                    "0": {
                        "items": 1,
                        "nav": true,
                        "dots": false,
                        "margin": 10
                    },
                    "576": {
                        "items": 2,
                        "margin": 30
                    },
                    "992": {
                        "items": 3,
                        "margin": 30
                    },
                    "1200": {
                        "items": 4,
                        "margin": 30,
                        "dots": false
                    }
                }
            }'>
                <div class="item">
                    <div class="instructor-card-three instructor-card-three--top-identity wow fadeInUp"
                        data-wow-duration='1500ms' data-wow-delay='100ms'>
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="assets/images/instructors/instructor-3-1.jpg" alt="Anthony B. Castillo">
                                <div class="instructor-card-three__social social-links-two">
                                    <div class="social-links-two__item">
                                        <a href="https://facebook.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://twitter.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://instagram.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://youtube.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                </div><!-- /.instructor-card-three__social -->
                            </div><!-- /.instructor-card-three__image__inner -->
                        </div><!-- /.instructor-card-three__image -->
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">
                                <a href="instructor-details.html">Anthony B. Castillo</a>
                            </h3><!-- /.instructor-card-three__name -->
                            <p class="instructor-card-three__designation">Digital marketer</p>
                            <!-- /.instructor-card-three__designation -->
                        </div><!-- /.instructor-card-three__identity -->
                    </div><!-- /.instructor-card-three -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="instructor-card-three wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="assets/images/instructors/instructor-3-2.jpg" alt="david cooper">
                                <div class="instructor-card-three__social social-links-two">
                                    <div class="social-links-two__item">
                                        <a href="https://facebook.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://twitter.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://instagram.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://youtube.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                </div><!-- /.instructor-card-three__social -->
                            </div><!-- /.instructor-card-three__image__inner -->
                        </div><!-- /.instructor-card-three__image -->
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">
                                <a href="instructor-details.html">david cooper</a>
                            </h3><!-- /.instructor-card-three__name -->
                            <p class="instructor-card-three__designation">Sr. Manager</p>
                            <!-- /.instructor-card-three__designation -->
                        </div><!-- /.instructor-card-three__identity -->
                    </div><!-- /.instructor-card-three -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="instructor-card-three instructor-card-three--top-identity wow fadeInUp"
                        data-wow-duration='1500ms' data-wow-delay='100ms'>
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="assets/images/instructors/instructor-3-1.jpg" alt="Anthony B. Castillo">
                                <div class="instructor-card-three__social social-links-two">
                                    <div class="social-links-two__item">
                                        <a href="https://facebook.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://twitter.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://instagram.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://youtube.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                </div><!-- /.instructor-card-three__social -->
                            </div><!-- /.instructor-card-three__image__inner -->
                        </div><!-- /.instructor-card-three__image -->
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">
                                <a href="instructor-details.html">Anthony B. Castillo</a>
                            </h3><!-- /.instructor-card-three__name -->
                            <p class="instructor-card-three__designation">Digital marketer</p>
                            <!-- /.instructor-card-three__designation -->
                        </div><!-- /.instructor-card-three__identity -->
                    </div><!-- /.instructor-card-three -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="instructor-card-three wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="assets/images/instructors/instructor-3-2.jpg" alt="david cooper">
                                <div class="instructor-card-three__social social-links-two">
                                    <div class="social-links-two__item">
                                        <a href="https://facebook.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://twitter.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://instagram.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://youtube.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                </div><!-- /.instructor-card-three__social -->
                            </div><!-- /.instructor-card-three__image__inner -->
                        </div><!-- /.instructor-card-three__image -->
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">
                                <a href="instructor-details.html">david cooper</a>
                            </h3><!-- /.instructor-card-three__name -->
                            <p class="instructor-card-three__designation">Sr. Manager</p>
                            <!-- /.instructor-card-three__designation -->
                        </div><!-- /.instructor-card-three__identity -->
                    </div><!-- /.instructor-card-three -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="instructor-card-three instructor-card-three--top-identity wow fadeInUp"
                        data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="assets/images/instructors/instructor-3-3.jpg" alt="kevin martin">
                                <div class="instructor-card-three__social social-links-two">
                                    <div class="social-links-two__item">
                                        <a href="https://facebook.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://twitter.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://instagram.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://youtube.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                </div><!-- /.instructor-card-three__social -->
                            </div><!-- /.instructor-card-three__image__inner -->
                        </div><!-- /.instructor-card-three__image -->
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">
                                <a href="instructor-details.html">kevin martin</a>
                            </h3><!-- /.instructor-card-three__name -->
                            <p class="instructor-card-three__designation">Founder & CEO</p>
                            <!-- /.instructor-card-three__designation -->
                        </div><!-- /.instructor-card-three__identity -->
                    </div><!-- /.instructor-card-three -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="instructor-card-three wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="assets/images/instructors/instructor-3-4.jpg" alt="Adlof Carone">
                                <div class="instructor-card-three__social social-links-two">
                                    <div class="social-links-two__item">
                                        <a href="https://facebook.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://twitter.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://instagram.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Instagram</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                    <div class="social-links-two__item">
                                        <a href="https://youtube.com">
                                            <span class="social-links-two__icon">
                                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                            </span><!-- /.social-links-two__icon -->
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </div><!-- /.social-links-two__item -->
                                </div><!-- /.instructor-card-three__social -->
                            </div><!-- /.instructor-card-three__image__inner -->
                        </div><!-- /.instructor-card-three__image -->
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">
                                <a href="instructor-details.html">Adlof Carone</a>
                            </h3><!-- /.instructor-card-three__name -->
                            <p class="instructor-card-three__designation">UI/UX Designer</p>
                            <!-- /.instructor-card-three__designation -->
                        </div><!-- /.instructor-card-three__identity -->
                    </div><!-- /.instructor-card-three -->
                </div><!-- /.item -->
            </div><!-- /.instructors-three__carousel -->
        </div><!-- /.container -->
    </section><!-- /.instructors-three section-space2 -->

    <section class="testimonials-one section-space" id="testimonials">
        <div class="container">
            <div class="row gutter-y-50">
                <div class="col-xl-4">
                    <div class="testimonials-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">our testimonials</h6>
                            <!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title">
                                peoples <span class="sec-title__title__shape">say about</span>
                                <br />
                                <span class="sec-title__title__text">eduhive</span>
                            </h3>
                            <!-- /.sec-title__title -->
                        </div>
                        <!-- /.sec-title -->
                        <div class="testimonials-one__description wow fadeInUp" data-wow-duration="1500ms">
                            <p class="testimonials-one__text">
                                Aonsectetur adipiscing elit Aenean scelerisque augue vitae
                                consequat Juisque eget congue.
                            </p>
                            <!-- /.testimonials-one__text -->
                        </div>
                        <!-- /.testimonial-one__description -->
                        <div class="testimonials-one__custome-navs"></div>
                        <!-- /.testimonials-one__custome-navs -->
                    </div>
                    <!-- /.testimonials-one__content -->
                </div>
                <!-- /.col-xl-4 -->
                <div class="col-xl-8">
                    <div class="eduhive-stretch-element-inside-column">
                        <div class="testimonials-one__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow owl-theme owl-carousel"
                            data-owl-options='{
                                            "items": 1,
                                            "margin": 30,
                                            "smartSpeed": 700,
                                            "loop": true,
                                            "autoplay": 600,
                                            "nav": true,
                                            "navContainer": ".testimonials-one__custome-navs",
                                            "dots": false,
                                            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                                            "responsive":{
                                                "0":{
                                                    "items": 1,
                                                    "margin": 10
                                                },
                                                "576":{
                                                    "items": 1.5
                                                },
                                                "768":{
                                                    "items": 1.8
                                                },
                                                "992":{
                                                    "items": 2.6
                                                },
                                                "1200":{
                                                    "items": 2.3
                                                },
                                                "1360":{
                                                    "items": 2.3
                                                },
                                                "1536":{
                                                    "items": 2.5
                                                },
                                                "1600":{
                                                    "items": 2.7
                                                },
                                                "1800":{
                                                    "items": 2.94
                                                }
                                            }
                                            }'>
                            <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <div class="testimonial-card">
                                    <div class="testimonial-card__top">
                                        <div class="testimonial-card__image">
                                            <img src="assets/images/testimonials/testimonial-1-1.jpg" alt="Esther Howard" />
                                            <span class="testimonial-card__icon"><i
                                                    class="icon-quote-2"></i></span><!-- /.testimonial-card__icon -->
                                        </div>
                                        <!-- /.testimonial-card__image -->
                                        <div class="testimonial-card__identity">
                                            <h5 class="testimonial-card__name">Esther Howard</h5>
                                            <p class="testimonial-card__designation">Ethical Hacker</p>
                                        </div>
                                        <!-- /.testimonial-card__identity -->
                                    </div>
                                    <!-- /.testimonial-card__top -->
                                    <div class="testimonial-card__content">
                                        <p class="testimonial-card__quote">
                                            I think this should be fairly easy so if you just want to
                                            have a look what you've given us is texty, we want sexy.
                                            Labrador you might wanna give it
                                        </p>
                                        <!-- /.testimonial-card__quote -->
                                        <div class="eduhive-ratings">
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                        </div>
                                        <!-- /.product-ratings -->
                                    </div>
                                    <!-- /.testimonial-card__content -->
                                </div>
                                <!-- /.testimonial-card -->
                            </div>
                            <!-- /.owl-slide-item-->
                            <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                                <div class="testimonial-card">
                                    <div class="testimonial-card__top">
                                        <div class="testimonial-card__image">
                                            <img src="assets/images/testimonials/testimonial-1-2.jpg" alt="Sarah Albert" />
                                            <span class="testimonial-card__icon"><i
                                                    class="icon-quote-2"></i></span><!-- /.testimonial-card__icon -->
                                        </div>
                                        <!-- /.testimonial-card__image -->
                                        <div class="testimonial-card__identity">
                                            <h5 class="testimonial-card__name">Sarah Albert</h5>
                                            <p class="testimonial-card__designation">
                                                managing director
                                            </p>
                                        </div>
                                        <!-- /.testimonial-card__identity -->
                                    </div>
                                    <!-- /.testimonial-card__top -->
                                    <div class="testimonial-card__content">
                                        <p class="testimonial-card__quote">
                                            Can you make pink a little more pinkish can you remove my
                                            double chin on my business card photo? i don't like the way
                                            it looks can you
                                        </p>
                                        <!-- /.testimonial-card__quote -->
                                        <div class="eduhive-ratings">
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                        </div>
                                        <!-- /.product-ratings -->
                                    </div>
                                    <!-- /.testimonial-card__content -->
                                </div>
                                <!-- /.testimonial-card -->
                            </div>
                            <!-- /.owl-slide-item-->
                            <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                                <div class="testimonial-card">
                                    <div class="testimonial-card__top">
                                        <div class="testimonial-card__image">
                                            <img src="assets/images/testimonials/testimonial-1-3.jpg" alt="Kevin Martin" />
                                            <span class="testimonial-card__icon"><i
                                                    class="icon-quote-2"></i></span><!-- /.testimonial-card__icon -->
                                        </div>
                                        <!-- /.testimonial-card__image -->
                                        <div class="testimonial-card__identity">
                                            <h5 class="testimonial-card__name">Kevin Martin</h5>
                                            <p class="testimonial-card__designation">
                                                managing director
                                            </p>
                                        </div>
                                        <!-- /.testimonial-card__identity -->
                                    </div>
                                    <!-- /.testimonial-card__top -->
                                    <div class="testimonial-card__content">
                                        <p class="testimonial-card__quote">
                                            I really like the colour but can you change it, yet is there
                                            a way we can make the page feel more introductory without
                                            being cheesy can't you
                                        </p>
                                        <!-- /.testimonial-card__quote -->
                                        <div class="eduhive-ratings">
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                            <span class="eduhive-ratings__icon">
                                                <i class="fa fa-star"></i> </span><!-- /.eduhive-ratings__icon -->
                                        </div>
                                        <!-- /.product-ratings -->
                                    </div>
                                    <!-- /.testimonial-card__content -->
                                </div>
                                <!-- /.testimonial-card -->
                            </div>
                            <!-- /.owl-slide-item-->
                        </div>
                        <!-- /.testimonials-one__carousel -->
                    </div>
                    <!-- /.eduhive-stretch-element-inside-column -->
                </div>
                <!-- /.col-xl-8 -->
            </div>
            <!-- /.row gutter-y-50 -->
        </div>
        <!-- /.container -->
        <img src="assets/images/shapes/testimonials-shape-1-1.png" alt="shape" class="testimonials-one__shape" />
        <div class="testimonials-one__shape-box"></div>
        <!-- /.testimonials-one__shape-box -->
    </section>
    <!-- /.testimonials-one section-space -->

    <section class="cta-one">
        <div class="container">
            <div class="cta-one__content wow fadeInUp" data-wow-duration="1500ms">
                <h2 class="cta-one__title">
                    Get Your Quality Skills Certificate <br />
                    Through Eduhive
                </h2>
                <!-- /.cta-one__title -->
                <a href="contact.html" class="eduhive-btn">
                    <span>get started now</span>
                    <span class="eduhive-btn__icon">
                        <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                    </span> </a><!-- /.eduhive-btn -->
            </div>
            <!-- /.cta-one__conten -->
        </div>
        <!-- /.container -->
        <img src="assets/images/resources/cta-1-1.png" alt="shape" class="cta-one__image-one" />
        <img src="assets/images/resources/cta-1-2.png" alt="shape" class="cta-one__image-two" />
        <img src="assets/images/shapes/cta-shape-1-1.png" alt="shape" class="cta-one__shape-one" />
        <img src="assets/images/shapes/cta-shape-1-1.png" alt="shape" class="cta-one__shape-two" />
        <div class="cta-one__shape-box-one"></div>
        <!-- /.cta-one__shape-box-one -->
        <div class="cta-one__shape-box-two wow fadeInRight" data-wow-duration="1500ms"></div>
        <!-- /.cta-one__shape-box-two -->
    </section>
    <!-- /.cta-one -->

    <section class="blog-three section-space" id="blog">
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="blog-three__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">latest blog</h6><!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title"><span class="sec-title__title__shape">our latest</span> <span
                                    class="sec-title__title__text">blog <br> news</span></h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="blog-three__description">
                            <p class="blog-three__text">Are there any leftovers in the kitchen? that's not on the roadmap,
                                or drink from the firehose, nor time vampire what about scaling components to a global
                                audience</p><!-- /.blog-three__text -->
                        </div><!-- /.blog-three__description -->
                        <div class="blog-three__custome-navs"></div><!-- /.blog-three__custome-navs -->
                    </div><!-- /.blog-three__content -->
                </div><!-- /.col-xl-4 col-lg-7 -->
                <div class="col-xl-8 col-lg-7">
                    <div class="eduhive-stretch-element-inside-column">
                        <div class="blog-three__carousel eduhive-owl__carousel owl-carousel owl-theme" data-owl-options='{
                                    "items": 1,
                                    "margin": 30,
                                    "loop": true,
                                    "smartSpeed": 700,
                                    "nav": true,
                                    "dots": false,
                                    "navContainer": ".blog-three__custome-navs",
                                    "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                                    "autoplay": true,
                                    "responsive": {
                                        "0":{
                                            "items": 1,
                                            "margin": 10
                                        },
                                        "576":{
                                            "items": 1.5
                                        },
                                        "768":{
                                            "items": 2.2
                                        },
                                        "992":{
                                            "items": 1.55
                                        },
                                        "1200":{
                                            "items": 2.2
                                        },
                                        "1360":{
                                            "items": 2.25
                                        },
                                        "1400":{
                                            "items": 2.35
                                        },
                                        "1536":{
                                            "items": 2.45
                                        },
                                        "1600":{
                                            "items": 2.6
                                        },
                                        "1800":{
                                            "items": 2.94
                                        }
                                    }
                                }'>
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-1.jpg"
                                            alt="Talk About the Three Major Types of Floor Tiles">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Talk About the Three Major Types of Floor Tiles</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">29</span>
                                            <span class="blog-card__date__month">jan</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Talk About the Three
                                                Major Types of Floor Tiles</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-2.jpg"
                                            alt="Big Data. Are There Any Leftovers In The Kitchen">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Big Data. Are There Any Leftovers In The Kitchen</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">25</span>
                                            <span class="blog-card__date__month">june</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Big Data. Are There
                                                Any Leftovers In The Kitchen</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-3.jpg"
                                            alt="A Simple Lift And Shift Job Going Forward Price">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">A Simple Lift And Shift Job Going Forward Price</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">20</span>
                                            <span class="blog-card__date__month">jan</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">A Simple Lift And
                                                Shift Job Going Forward Price</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-4.jpg"
                                            alt="My Capacity Is Full We're Building The Plane">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">My Capacity Is Full We're Building The Plane</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">15</span>
                                            <span class="blog-card__date__month">jul</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">My Capacity Is Full
                                                We're Building The Plane</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-5.jpg"
                                            alt="Ny Leftovers In The Kitchen Touch Base">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Ny Leftovers In The Kitchen Touch Base</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">5</span>
                                            <span class="blog-card__date__month">june</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Ny Leftovers In The
                                                Kitchen Touch Base</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-6.jpg"
                                            alt="Circle Back, If You Want To Motivate These">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Circle Back, If You Want To Motivate These</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">28</span>
                                            <span class="blog-card__date__month">jul</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Circle Back, If You
                                                Want To Motivate These</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-7.jpg"
                                            alt="Nail Jelly To The Hothouse Wall Pixel Pushing">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Nail Jelly To The Hothouse Wall Pixel Pushing</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">10</span>
                                            <span class="blog-card__date__month">june</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Nail Jelly To The
                                                Hothouse Wall Pixel Pushing</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-8.jpg"
                                            alt="Copy And Paste From Stack Overflow Can You">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Copy And Paste From Stack Overflow Can You</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">2</span>
                                            <span class="blog-card__date__month">jan</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Copy And Paste From
                                                Stack Overflow Can You</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                            <div class="item">
                                <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                                    <div class="blog-card__image">
                                        <img src="assets/images/blog/blog-1-9.jpg"
                                            alt="Catching And Not Too Giant, Yet Drink From The">
                                        <a href="blog-details-right.html" class="blog-card__image__link"><span
                                                class="sr-only">Catching And Not Too Giant, Yet Drink From The</span>
                                            <!-- /.sr-only --></a>
                                        <div class="blog-card__date">
                                            <span class="blog-card__date__day">26</span>
                                            <span class="blog-card__date__month">june</span>
                                        </div><!-- /.blog-card__date -->
                                    </div><!-- /.blog-card__image -->
                                    <div class="blog-card__content">
                                        <ul class="list-unstyled blog-card__meta">
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    by Admin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="blog-card__meta__icon">
                                                        <i class="icon-comments"></i>
                                                    </span>
                                                    2 Comments
                                                </a>
                                            </li>
                                        </ul><!-- /.list-unstyled blog-card__meta -->
                                        <h3 class="blog-card__title"><a href="blog-details-right.html">Catching And Not Too
                                                Giant, Yet Drink From The</a></h3><!-- /.blog-card__title -->
                                        <a href="blog-details-right.html" class="blog-card__link">
                                            read More
                                            <span class="blog-card__link__icon">
                                                <span class="blog-card__link__icon__inner"><i
                                                        class="icon-arrow-right"></i></span>
                                            </span>
                                        </a><!-- /.blog-card__link -->
                                    </div><!-- /.blog-card__content -->
                                </div><!-- /.blog-card -->
                            </div><!-- /.item -->
                        </div><!-- /.blog-three__carousel -->
                    </div><!-- /.eduhive-stretch-element-inside-column -->
                </div><!-- /.col-xl-8 col-lg-5 -->
            </div><!-- /.row gutter-y-50 align-items-center -->
        </div><!-- /.container -->
        <img src="assets/images/shapes/blog-shape-3-1.png" alt="shape" class="blog-three__shape-one">
        <div class="blog-three__shape-two"></div><!-- /.blog-three__shape-two -->
    </section><!-- /.blog-three section-space -->

    <div class="client-carousel @@extraClassName">
        <div class="container-fluid">
            <div class="client-carousel__inner">
                <div class="container">
                    <div class="client-carousel__content">
                        <h4 class="client-carousel__title">2K+ brands trust us</h4><!-- /.client-carousel__title -->
                    </div><!-- /.client-carousel__content -->
                    <div class="client-carousel__carousel eduhive-owl__carousel owl-theme owl-carousel" data-owl-options='{
                            "items": 5,
                            "margin": 65,
                            "smartSpeed": 700,
                            "loop":true,
                            "autoplay": 6000,
                            "nav":false,
                            "dots":false,
                            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                            "responsive":{
                                "0":{
                                    "items": 2,
                                    "margin": 50
                                },
                                "500":{
                                    "items": 3,
                                    "margin": 60
                                },
                                "768":{
                                    "items": 3,
                                    "margin": 80
                                },
                                "992":{
                                    "items": 4,
                                    "margin": 60
                                },
                                "1200":{
                                    "items": 5,
                                    "margin": 163
                                }
                            }
                            }'>
                        <div class="client-carousel__item">
                            <img src="assets/images/brand/brand-1-1.png" alt="eduhive" class="client-carousel__image">
                            <img src="assets/images/brand/brand-1-1-hover.png" alt="eduhive"
                                class="client-carousel__hover-image">
                        </div><!-- /.owl-slide-item-->
                        <div class="client-carousel__item">
                            <img src="assets/images/brand/brand-1-2.png" alt="eduhive" class="client-carousel__image">
                            <img src="assets/images/brand/brand-1-2-hover.png" alt="eduhive"
                                class="client-carousel__hover-image">
                        </div><!-- /.owl-slide-item-->
                        <div class="client-carousel__item">
                            <img src="assets/images/brand/brand-1-3.png" alt="eduhive" class="client-carousel__image">
                            <img src="assets/images/brand/brand-1-3-hover.png" alt="eduhive"
                                class="client-carousel__hover-image">
                        </div><!-- /.owl-slide-item-->
                        <div class="client-carousel__item">
                            <img src="assets/images/brand/brand-1-4.png" alt="eduhive" class="client-carousel__image">
                            <img src="assets/images/brand/brand-1-4-hover.png" alt="eduhive"
                                class="client-carousel__hover-image">
                        </div><!-- /.owl-slide-item-->
                    </div><!-- /.client-carousel__carousel -->
                </div><!-- /.container -->
            </div><!-- /.client-carousel__inner -->
        </div><!-- /.container-fluid -->
    </div><!-- /.client-carousel -->


@endsection