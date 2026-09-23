{{--
============================================================================
resources/views/courses/show.blade.php
ONE template for every program page: /courses/jee, /courses/neet, ...
UI = Eduhive "course-details" (tabs, accordion, carousel run on eduhive.js)
Data = config/programs.php via ProgramController@show
Vars: $slug, $program, $image, $curriculum, $features, $mentor, $others
============================================================================
--}}
@extends('layouts.main')

@section('title', $program['meta_title'])

@section('meta')
    <meta name="description" content="{{ $program['meta_desc'] }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $program['meta_title'] }}">
    <meta property="og:description" content="{{ $program['meta_desc'] }}">
    <meta property="og:image" content="{{ asset($image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $program['meta_title'] }}">
    <meta name="twitter:description" content="{{ $program['meta_desc'] }}">
    <meta name="twitter:image" content="{{ asset($image) }}">
@endsection

@section('content')

    @php
        $ask = 'Ask us';
        $contactUrl = url('/contact') . '?program=' . $slug;
        $pageUrl = urlencode(url()->current());
        $shareText = rawurlencode($program['name'] . ' at SG Educare, Kalyan');
    @endphp

    {{-- ================= PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/courses') }}">Programs</a></li>
                    <li><span>{{ $program['short'] }}</span></li>
                </ul>
                <h1 class="page-header__title">{{ $program['name'] }}</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    {{-- ================= COURSE DETAILS ================= --}}
    <section class="course-details section-space">
        <div class="container">
            <div class="row gutter-y-40">

                <div class="col-xl-8 col-lg-7">
                    <div class="course-details__inner">
                        <h2 class="course-details__title">{{ $program['tagline'] }}</h2>

                        <div class="course-details__info-wrapper">
                            <div class="course-details__class">
                                <span class="course-details__class__icon"><i class="icon-graduation"></i></span>
                                <p class="course-details__class__text">{{ $program['for'] }}</p>
                            </div>
                            <div class="course-details__class">
                                <span class="course-details__class__icon"><i class="icon-ranking"></i></span>
                                <p class="course-details__class__text">{{ $program['exam'] }}</p>
                            </div>
                            <div class="course-details__class">
                                <span class="course-details__class__icon"><i class="icon-open-book"></i></span>
                                <p class="course-details__class__text">{{ count($program['subjects']) }} Subjects</p>
                            </div>
                        </div>

                        <div class="course-details__image">
                            <img src="{{ asset($image) }}" alt="{{ $program['name'] }} coaching at SG Educare">
                            @if (!empty($program['video']))
                                <a href="{{ $program['video'] }}" class="course-details__video-btn video-btn video-popup"
                                    aria-label="Play video">
                                    <i class="icon-play"></i>
                                    <span></span><span></span><span></span><span></span>
                                </a>
                            @endif
                            <span class="course-details__category">{{ $program['short'] }}</span>
                        </div>

                        {{-- ---------- TABS ---------- --}}
                        <div class="course-details__main-tab-box tabs-box">
                            <ul class="tab-buttons">
                                <li data-tab="#overview" class="tab-btn active-btn">overview</li>
                                <li data-tab="#curriculum" class="tab-btn">curriculum</li>
                                @if (!empty($program['faqs']))
                                    <li data-tab="#faqs" class="tab-btn">FAQs</li>
                                @endif
                            </ul>

                            <div class="tabs-content">

                                {{-- OVERVIEW --}}
                                <div class="tab active-tab fadeInUp animated" data-wow-delay="200ms" id="overview"
                                    style="display: block;">
                                    <div class="course-details__description wow fadeInUp" data-wow-duration="1500ms">
                                        <h3 class="course-details__title course-details__title--description">About this
                                            program</h3>
                                        <div class="course-details__description__inner">
                                            @foreach ($program['overview'] as $para)
                                                <p class="course-details__description__text">{{ $para }}</p>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="course-details__requirements wow fadeInUp" data-wow-duration="1500ms">
                                        <h3 class="course-details__title course-details__title--requirements">What every
                                            student gets</h3>
                                        <p class="course-details__requirements__text">Every SG Educare program is built
                                            around close attention, regular testing and clear communication with parents.
                                        </p>
                                        <ul class="course-details__requirements__list list-unstyled">
                                            @foreach ($features as $feature)
                                                <li class="course-details__requirements__item">
                                                    <span class="course-details__requirements__list__icon"><i
                                                            class="icon-check-2"></i></span>
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                {{-- CURRICULUM --}}
                                <div class="tab fadeInUp animated" data-wow-delay="200ms" id="curriculum"
                                    style="display: none;">
                                    <div class="course-details__accordion">
                                        <div class="eduhive-accordion" data-grp-name="eduhive-accordion-curriculum">
                                            @foreach ($curriculum as $subject => $units)
                                                <div class="accordion {{ $loop->first ? 'active' : '' }}">
                                                    <div class="accordion-title">
                                                        <h4>{{ $subject }}</h4>
                                                        <span class="accordion-title__icon"></span>
                                                    </div>
                                                    <div class="accordion-content">
                                                        <div class="inner">
                                                            <div class="course-details__accordion__inner">
                                                                @forelse ($units as $unit)
                                                                    <div class="course-details__accordion__class">
                                                                        <span class="course-details__accordion__class__title">
                                                                            <span class="course-details__accordion__class__icon"><i
                                                                                    class="icon-files"></i></span>
                                                                            {{ $unit }}
                                                                        </span>
                                                                    </div>
                                                                @empty
                                                                    <div class="course-details__accordion__class">
                                                                        <span class="course-details__accordion__class__title">
                                                                            <span class="course-details__accordion__class__icon"><i
                                                                                    class="icon-files"></i></span>
                                                                            Full {{ $subject }} syllabus as per your class and
                                                                            board. Ask us for the chapter plan.
                                                                        </span>
                                                                    </div>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- FAQS --}}
                                @if (!empty($program['faqs']))
                                    <div class="tab fadeInUp animated" data-wow-delay="200ms" id="faqs" style="display: none;">
                                        <div class="course-details__accordion">
                                            <div class="eduhive-accordion" data-grp-name="eduhive-accordion-faqs">
                                                @foreach ($program['faqs'] as $faq)
                                                    <div class="accordion {{ $loop->first ? 'active' : '' }}">
                                                        <div class="accordion-title">
                                                            <h4>{{ $faq['q'] }}</h4>
                                                            <span class="accordion-title__icon"></span>
                                                        </div>
                                                        <div class="accordion-content">
                                                            <div class="inner">
                                                                <p class="course-details__description__text">{{ $faq['a'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                {{-- ---------- SIDEBAR ---------- --}}
                <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <div class="course-details__info">
                        <h3 class="course-details__info__title">Program details:</h3>
                        <ul class="course-details__info__list list-unstyled">
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-graduation"></i></span>
                                        Classes:
                                    </div>
                                    <span>{{ $program['for'] }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-ranking"></i></span>
                                        Exam:
                                    </div>
                                    <span>{{ $program['exam'] }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-clock-1"></i></span>
                                        Duration:
                                    </div>
                                    <span>{{ $program['duration'] ?? $ask }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-multiple-users"></i></span>
                                        Batches:
                                    </div>
                                    <span>{{ $program['batches'] ?? $ask }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-medal"></i></span>
                                        Subjects:
                                    </div>
                                    <span>{{ implode(', ', $program['subjects']) }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="course-details__info__text">
                                    <div class="course-details__info__text__title">
                                        <span class="course-details__info__icon"><i class="icon-globe"></i></span>
                                        Mode:
                                    </div>
                                    <span>{{ $program['mode'] ?? $ask }}</span>
                                </div>
                            </li>
                        </ul>

                        <div class="course-details__info__price">Fees: {{ $program['fees'] ?? $ask }}</div>

                        <a href="{{ $contactUrl }}" class="course-details__info__btn eduhive-btn">
                            <span class="eduhive-btn__text">Book Free Counselling</span>
                            <span class="eduhive-btn__icon">
                                <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                            </span>
                        </a>

                        <div class="course-details__social">
                            <h3 class="course-details__social__title">Share:</h3>
                            <div class="course-details__social__group social-links-two">
                                <a href="https://wa.me/?text={{ $shareText }}%20{{ $pageUrl }}" target="_blank"
                                    rel="noopener">
                                    <span class="social-links-two__icon"><i class="fab fa-whatsapp"
                                            aria-hidden="true"></i></span>
                                    <span class="sr-only">Share on WhatsApp</span>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $pageUrl }}" target="_blank"
                                    rel="noopener">
                                    <span class="social-links-two__icon"><i class="fab fa-facebook-f"
                                            aria-hidden="true"></i></span>
                                    <span class="sr-only">Share on Facebook</span>
                                </a>
                                <a href="https://x.com/intent/tweet?url={{ $pageUrl }}&text={{ $shareText }}"
                                    target="_blank" rel="noopener">
                                    <span class="social-links-two__icon"><i class="fab fa-twitter"
                                            aria-hidden="true"></i></span>
                                    <span class="sr-only">Share on X</span>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $pageUrl }}" target="_blank"
                                    rel="noopener">
                                    <span class="social-links-two__icon"><i class="fab fa-linkedin-in"
                                            aria-hidden="true"></i></span>
                                    <span class="sr-only">Share on LinkedIn</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= MENTOR (shows only when bio is filled in config) ================= --}}
    @if (!empty($mentor['bio']))
        <section class="course-instructor-details">
            <div class="container">
                <div class="course-instructor-details__inner">
                    @if (!empty($mentor['image']) && file_exists(public_path($mentor['image'])))
                        <div class="course-instructor-details__image">
                            <img src="{{ asset($mentor['image']) }}" alt="{{ $mentor['name'] }}">
                        </div>
                    @endif
                    <div class="course-instructor-details__info">
                        <h3 class="course-instructor-details__name">{{ $mentor['name'] }}</h3>
                        @if (!empty($mentor['designation']))
                            <p class="course-instructor-details__designation">{{ $mentor['designation'] }}</p>
                        @endif
                        <p class="course-instructor-details__text">{{ $mentor['bio'] }}</p>
                        @if (!empty($mentor['experience']))
                            <div class="course-instructor-details__course-info">
                                <div class="course-instructor-details__experience">
                                    Experience: <span>{{ $mentor['experience'] }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ================= OTHER PROGRAMS (Eduhive carousel) ================= --}}
    @if (!empty($others))
        <section class="courses-four section-space2">
            <div class="container">
                <div class="courses-four__top">
                    <div class="row gutter-y-50 align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <h6 class="sec-title__tagline">our programs</h6>
                                <h3 class="sec-title__title"><span>Explore</span> <span
                                        class="sec-title__title__shape">Other</span> <span
                                        class="sec-title__title__text">Programs</span></h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="courses-four__custome-navs"></div>
                        </div>
                    </div>
                </div>

                <div class="courses-four__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
                            "items": 1,
                            "margin": 10,
                            "loop": true,
                            "smartSpeed": 700,
                            "nav": false,
                            "dots": false,
                            "navContainer": ".courses-four__custome-navs",
                            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                            "autoplay": true,
                            "responsive": {
                                "0":   { "items": 1, "nav": true, "margin": 10 },
                                "768": { "items": 2, "margin": 30 },
                                "992": { "items": 3, "margin": 30 }
                            }
                        }'>
                    @foreach ($others as $oSlug => $o)
                        @php
                            $oUrl = url('/courses/' . $oSlug);
                            $oImg = 'assets/images/programs/' . $oSlug . '.jpg';
                            $oImg = file_exists(public_path($oImg)) ? $oImg : 'assets/images/courses/course-1-' . (($loop->index % 9) + 1) . '.jpg';
                        @endphp
                        <div class="item">
                            <div class="course-card wow fadeInUp" data-wow-duration="1500ms"
                                data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                                <div class="course-card__image">
                                    <img src="{{ asset($oImg) }}" alt="{{ $o['name'] }}">
                                </div>
                                <div class="course-card__content">
                                    <div class="course-card__content__top">
                                        <div class="course-card__category">{{ $o['short'] }}</div>
                                        <div class="course-card__duration">
                                            <span class="course-card__duration__icon"><i class="icon-clock"></i></span>
                                            {{ $o['for'] }}
                                        </div>
                                    </div>
                                    <h3 class="course-card__title"><a href="{{ $oUrl }}">{{ $o['name'] }}</a></h3>
                                    <div class="course-card__info">
                                        <div class="course-card__lessons">
                                            <span class="course-card__lessons__icon"><i class="icon-open-book"></i></span>
                                            {{ count($o['subjects']) }} Subjects
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card__hover"
                                    style="background-image: url({{ asset('assets/images/shapes/course-card-bg-1-1.png') }});">
                                    <div class="course-card__hover__content">
                                        <div class="course-card__content__top course-card__content__top--hover">
                                            <div class="course-card__category">{{ $o['short'] }}</div>
                                            <div class="course-card__duration">
                                                <span class="course-card__duration__icon"><i class="icon-clock"></i></span>
                                                {{ $o['for'] }}
                                            </div>
                                        </div>
                                        <h3 class="course-card__title course-card__title--hover"><a
                                                href="{{ $oUrl }}">{{ $o['name'] }}</a></h3>
                                        <p class="course-card__text">{{ $o['tagline'] }}</p>
                                        <a href="{{ $oUrl }}" class="course-card__btn eduhive-btn eduhive-btn--border">
                                            <span>view program</span>
                                            <span class="eduhive-btn__icon">
                                                <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                            </span>
                                        </a>
                                        <div class="course-card__info course-card__info--hover">
                                            <div class="course-card__lessons">
                                                <span class="course-card__lessons__icon"><i class="icon-open-book"></i></span>
                                                {{ implode(', ', $o['subjects']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

@section('scripts')
    {{-- Course schema (rich results) --}}
    <script type="application/ld+json">
        {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Course',
        'name' => $program['name'],
        'description' => $program['meta_desc'],
        'url' => url()->current(),
        'provider' => [
            '@type' => 'EducationalOrganization',
            'name' => 'SG Educare',
            'sameAs' => url('/'),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
@endsection