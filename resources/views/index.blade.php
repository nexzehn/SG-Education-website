{{-- ============================================================
resources/views/home.blade.php
SG Education — Home page. Content from Website.docx, UI = Eduhive sections
+ shared "sg-" components from public/assets/css/sg-custom.css.
Extends layouts/main.blade.php.

Images: client photos in public/assets/images/sg/ (see $img below).
A missing file falls back to the Eduhive stock image automatically.
============================================================ --}}
@extends('layouts.main')

@section('title', 'SG Education | Coaching Classes in Kalyan for Grades 9–12, JEE, NEET & MHT-CET')

@section('meta')
    <meta name="description"
        content="SG Education, Khadakpada, Kalyan: focused coaching for Grades 8–12 (State Board), JEE Foundation, NEET Foundation, JEE Main & Advanced, NEET and MHT-CET. Small batches, concept-first teaching, regular tests and performance tracking.">
    <meta name="keywords"
        content="coaching classes Kalyan, JEE coaching Kalyan, NEET coaching Kalyan, MHT-CET classes Kalyan, Class 10 tuition Kalyan, 11th science classes Kalyan, JEE foundation Kalyan, Khadakpada coaching">

    <meta property="og:type" content="website">
    <meta property="og:title" content="SG Education | Building Concepts. Creating Achievers.">
    <meta property="og:description"
        content="Focused coaching in Kalyan for Grades 9–12, JEE, NEET & MHT-CET. Small batches, regular tests and performance tracking.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SG Education | Coaching Classes in Kalyan">
    <meta name="twitter:description"
        content="Grades 9–12, JEE, NEET & MHT-CET coaching in Kalyan. Learn, practise, test, analyse and improve.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
@endsection

@section('content')

    @php
        $video = config('sg.video');
        $whatsapp = 'https://wa.me/91' . config('sg.whatsapp') . '?text=' . rawurlencode('Hi, I want to book an academic counselling session at SG Education.');

        // Client photo if present in public/assets/images/sg/, otherwise template stock
        $img = function (string $file, string $stock) {
            $p = config('sg.img_dir', 'assets/images/sg') . '/' . $file;
            return asset(file_exists(public_path($p)) ? $p : $stock);
        };
    @endphp

    {{-- ================= 1. HERO SLIDER ================= --}}
    @php
        $slides = [
            [
                'sub' => 'Focused Coaching Classes in Kalyan',
                'title' => 'Building <span class="main-slider-one__title__shape">Concepts.</span><br>Creating <span class="main-slider-one__title__text">Achievers.</span>',
                'text' => 'Grades 9–12, JEE, NEET & MHT-CET. Small batches, personalised attention, regular tests and performance tracking.',
                'img' => [
                    $img('classroom-senior.webp', 'assets/images/main-slider/main-slider-1-1.jpg'),
                    $img('library-books.webp', 'assets/images/main-slider/main-slider-1-2.jpg'),
                    $img('counselling-cabin.webp', 'assets/images/main-slider/main-slider-1-3.jpg'),
                ],
            ],
            [
                'sub' => 'The SG Academic Excellence System',
                'title' => 'Learn. Practise. <span class="main-slider-one__title__shape">Test.</span><br>Analyse. <span class="main-slider-one__title__text">Improve.</span>',
                'text' => 'At SG Education, students don\'t just attend lectures. They learn, practise, test, analyse and improve.',
                'img' => [
                    $img('classroom-junior.webp', 'assets/images/main-slider/main-slider-1-4.jpg'),
                    $img('fp-student-self-study.webp', 'assets/images/main-slider/main-slider-1-5.jpg'),
                    $img('fp-teacher-teaching.webp', 'assets/images/main-slider/main-slider-1-6.jpg'),
                ],
            ],
        ];
    @endphp
    <section class="main-slider-one" id="home">
        <div class="main-slider-one__carousel eduhive-owl__carousel eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
            data-owl-options='{"items": 1, "margin": 0, "animateIn": "fadeIn", "animateOut": "fadeOut", "loop": true, "smartSpeed": 1000, "nav": false, "dots": false, "autoplay": true, "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"]}'>
            @foreach ($slides as $slide)
                <div class="main-slider-one__item">
                    <div class="container">
                        <div class="row gutter-y-60 align-items-center">
                            <div class="main-slider-one__col-content">
                                <div class="main-slider-one__content">
                                    <img src="{{ asset('assets/images/shapes/main-slider-shape-1-1.png') }}" alt=""
                                        class="main-slider-one__content__shape slider-image" />
                                    <p class="main-slider-one__sub-title">{{ $slide['sub'] }}</p>
                                    @if ($loop->first)
                                        <h1 class="main-slider-one__title">{!! $slide['title'] !!}</h1>
                                    @else
                                        <h2 class="main-slider-one__title">{!! $slide['title'] !!}</h2>
                                    @endif
                                    <div class="main-slider-one__description">
                                        <p class="main-slider-one__text">{{ $slide['text'] }}</p>
                                    </div>
                                    <div class="main-slider-one__button">
                                        <a href="{{ url('/contact') }}" class="main-slider-one__btn-1 eduhive-btn">
                                            <span>Book Academic Counselling</span>
                                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                                        class="icon-right-arrow"></i></span></span>
                                        </a>
                                        <a href="{{ url('/courses') }}"
                                            class="main-slider-one__btn-2 eduhive-btn eduhive-btn--border">
                                            <span>Explore Courses</span>
                                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                                        class="icon-right-arrow"></i></span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-slider-one__col-image">
                                <div class="main-slider-one__image">
                                    <div class="main-slider-one__image__left">
                                        <div class="main-slider-one__image__one">
                                            <div class="main-slider-one__image__one__inner">
                                                <img src="{{ $slide['img'][0] }}" alt="Students in class at SG Education, Kalyan"
                                                    class="slider-image" />
                                            </div>
                                            <div class="total-student">
                                                <div class="total-student__inner">
                                                    <div class="total-student__image">
                                                        <img src="{{ asset('assets/images/main-slider/main-slider-student-1-1.png') }}"
                                                            alt="" class="slider-image" />
                                                        <img src="{{ asset('assets/images/main-slider/main-slider-student-1-2.png') }}"
                                                            alt="" class="slider-image" />
                                                    </div>
                                                    <h4 class="total-student__text count-box">
                                                        <span class="count-text" data-stop="6" data-speed="1500">0</span><span>
                                                            Step <br /> System</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-slider-one__image__right">
                                        <div class="main-slider-one__image__two">
                                            <img src="{{ $slide['img'][1] }}" alt="" class="slider-image" />
                                        </div>
                                        <div class="main-slider-one__image__three">
                                            <img src="{{ $slide['img'][2] }}" alt="" class="slider-image" />
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/images/shapes/main-slider-shape-1-3.png') }}" alt=""
                                        class="main-slider-one__image__shape-one slider-image" />
                                    <img src="{{ asset('assets/images/shapes/main-slider-shape-1-4.png') }}" alt=""
                                        class="main-slider-one__image__shape-two slider-image" />
                                    <img src="{{ asset('assets/images/shapes/main-slider-shape-1-5.png') }}" alt=""
                                        class="main-slider-one__image__shape-three slider-image" />
                                    <div class="main-slider-one__image__shape-four"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-slider-one__shape-one"></div>
                    <div class="main-slider-one__shape-two"></div>
                    <div class="main-slider-one__shape-three"></div>
                    <img src="{{ asset('assets/images/shapes/main-slider-shape-1-2.png') }}" alt=""
                        class="main-slider-one__shape-four slider-image" />
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= 2. WHY SG ================= --}}
    @php
        $why = [
            ['icon' => 'icon-multiple-users', 'title' => 'Small Batches', 'text' => 'Focused attention for every student in a distraction-free environment.'],
            ['icon' => 'icon-open-book', 'title' => 'Concept First', 'text' => 'Understand the logic deeply. We teach you how to think, not just memorise.'],
            ['icon' => 'icon-files', 'title' => 'Regular Tests', 'text' => 'Frequent assessments so you always know exactly where your preparation stands.'],
            ['icon' => 'icon-ranking', 'title' => 'Performance Tracking', 'text' => 'Detailed analysis of your weak points, week by week, to ensure continuous growth.'],
            ['icon' => 'icon-instructors', 'title' => 'Faculty Mentorship', 'text' => 'Expert guidance, doubt-solving support, and direction that goes beyond lectures.'],
        ];
    @endphp
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">why SG?</h6>
                <h3 class="sec-title__title">What Makes <span class="sec-title__title__text">SG</span>
                    <span class="sec-title__title__shape">Different</span>
                </h3>
            </div>

            <div class="sg-why-wrap">
                @foreach ($why as $w)
                    <div class="sg-why-card wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 120 }}ms">
                        <div class="sg-why-card__watermark" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="sg-why-card__icon"><i class="{{ $w['icon'] }}" aria-hidden="true"></i></div>
                        <h4>{{ $w['title'] }}</h4>
                        <p>{{ $w['text'] }}</p>
                        <div class="sg-why-card__line" aria-hidden="true"></div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="course-category__shape-one"></div>
        <div class="course-category__shape-two"></div>
    </section>

    {{-- ================= 3. COMPLETE ACADEMIC SYSTEM ================= --}}
    <section class="about-one section-space" id="about">
        <div class="about-one__bg" style="background-image: url({{ asset('assets/images/shapes/about-bg-1-1.png') }})">
        </div>
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-one__image">
                        <div class="about-one__image__one">
                            <img src="{{ $img('fp-teacher-teaching.webp', 'assets/images/about/about-1-1.jpg') }}"
                                alt="Teacher explaining a concept at SG Education" />
                            <div class="about-one__video">
                                <a href="{{ $video }}" class="about-one__video__btn video-btn video-popup"
                                    aria-label="Play video">
                                    <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                                </a>
                                <p class="about-one__video__text">play now</p>
                            </div>
                        </div>
                        <div class="about-one__image__two">
                            <img src="{{ $img('library-books.webp', 'assets/images/about/about-1-2.jpg') }}" alt="" />
                        </div>
                        <img src="{{ asset('assets/images/shapes/about-shape-1-1.png') }}" alt=""
                            class="about-one__image__shape" />
                        <div class="about-one__image__circle">
                            <div class="about-one__image__circle__inner"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">our approach</h6>
                            <h3 class="sec-title__title">More Than Classes. <br>A <span
                                    class="sec-title__title__shape">Complete Academic</span> <span
                                    class="sec-title__title__text">System.</span></h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">A student doesn't improve simply by
                            attending lectures. They improve when they <strong>learn, practise, test, analyse and
                                improve</strong>, again and again. That's the SG Academic Excellence System.</p>

                        @include('partials.sg-chain', ['live' => true])

                        <ul class="sg-focus">
                            @foreach (['Learn & Practise', 'Test & Analyse', 'Improve & Excel'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ url('/our-methodology') }}" class="eduhive-btn eduhive-btn--border wow fadeInUp"
                            data-wow-duration="1500ms">
                            <span>See How It Works</span>
                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                        class="icon-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 4. EVERY ACADEMIC STAGE ================= --}}
    @php
        $stages = [
            ['filter' => 'school', 'cat' => 'School', 'grades' => 'Grade 9 | 10', 'title' => 'School Courses (State Board)', 'text' => 'Build strong fundamentals and prepare with confidence.', 'info' => 'Grade 9 & 10', 'url' => '/courses/boards', 'img' => $img('classroom-junior.webp', 'assets/images/courses/course-1-1.jpg'), 'btn' => 'Explore School Courses'],
            ['filter' => 'foundation', 'cat' => 'Foundation', 'grades' => 'Grade 8 – 10', 'title' => 'JEE Foundation | NEET Foundation', 'text' => 'Start early. Build strong.', 'info' => 'Early preparation', 'url' => '/courses/foundation', 'img' => $img('fp-student-self-study.webp', 'assets/images/courses/course-1-2.jpg'), 'btn' => 'Explore Foundation'],
            ['filter' => 'competitive', 'cat' => 'Competitive', 'grades' => 'Class 11 & 12', 'title' => 'JEE Main & Advanced | NEET | MHT-CET', 'text' => 'Concepts. Problem Solving. Testing. Strategy.', 'info' => 'Entrance exams', 'url' => '/courses?stage=entrance', 'img' => $img('fp-exam-hall.webp', 'assets/images/courses/course-1-3.jpg'), 'btn' => 'Explore Competitive Courses'],
            ['filter' => 'science', 'cat' => '11th–12th', 'grades' => 'Science', 'title' => 'PCMB | JEE | NEET | MHT-CET', 'text' => 'Build the foundation for the next level.', 'info' => 'Physics, Chemistry, Maths, Biology', 'url' => '/courses/science', 'img' => $img('fp-science-lab.webp', 'assets/images/courses/course-1-4.jpg'), 'btn' => 'Explore Science Courses'],
        ];
    @endphp
    <section class="courses-two section-space" id="courses">
        <div class="courses-two__bg" style="background-image: url({{ asset('assets/images/shapes/courses-bg-2-1.png') }});">
        </div>
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our courses</h6>
                <h3 class="sec-title__title"><span>One Place.</span> <span class="sec-title__title__shape">Every</span>
                    <span>Academic</span> <span class="sec-title__title__text">Stage.</span>
                </h3>
            </div>
            <ul class="list-unstyled courses-two__filter-list owl-filter-bar wow fadeInUp" data-wow-duration="1500ms">
                <li class="item active" data-owl-filter="*">All Courses</li>
                <li class="item" data-owl-filter=".school">school</li>
                <li class="item" data-owl-filter=".foundation">foundation</li>
                <li class="item" data-owl-filter=".competitive">competitive</li>
                <li class="item" data-owl-filter=".science">11th–12th science</li>
            </ul>
        </div>
        <div class="courses-two__container container">
            <div class="courses-two__carousel eduhive-owl__carousel--progress eduhive-owl__carousel--filter-with-counter eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-filters-div=".courses-two__filter-list"
                data-progress-options='{"size": "1px", "margin": "0 auto", "foregroundColor": "var(--eduhive-border-color)", "color": "var(--eduhive-base)", "borderRadius": 0, "transitionInterval": 1, "progressBarClassName": "courses-two__carousel__progress-bar", "scrollerClassName": "courses-two__carousel__scroller"}'
                data-owl-options='{"items": 1, "margin": 10, "loop": false, "smartSpeed": 700, "nav": true, "dots": false, "navContainer": ".courses-two__custome-navs", "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"], "autoplay": true, "responsive": {"0": {"items": 1, "margin": 10}, "576": {"items": 1, "margin": 30, "stagePadding": 100}, "768": {"items": 1, "margin": 30, "stagePadding": 200}, "992": {"items": 2, "margin": 30, "stagePadding": 120}, "1200": {"items": 2, "margin": 30, "stagePadding": 270}, "1400": {"items": 3, "margin": 30, "stagePadding": 120}, "1600": {"items": 3, "margin": 30, "stagePadding": 210}, "1800": {"items": 3, "margin": 30, "stagePadding": 375}}}'>
                @foreach ($stages as $s)
                    <div class="item {{ $s['filter'] }}">
                        <div class="course-card wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="course-card__image">
                                <img src="{{ $s['img'] }}" alt="{{ $s['title'] }} at SG Education" loading="lazy">
                            </div>
                            <div class="course-card__content">
                                <div class="course-card__content__top">
                                    <div class="course-card__category">{{ $s['cat'] }}</div>
                                    <div class="course-card__duration">
                                        <span class="course-card__duration__icon"><i class="icon-clock"></i></span>
                                        {{ $s['grades'] }}
                                    </div>
                                </div>
                                <h3 class="course-card__title"><a href="{{ url($s['url']) }}">{{ $s['title'] }}</a></h3>
                                <div class="course-card__info">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon"><i class="icon-open-book"></i></span>
                                        {{ $s['info'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="course-card__hover"
                                style="background-image: url({{ asset('assets/images/shapes/course-card-bg-1-1.png') }});">
                                <div class="course-card__hover__content">
                                    <div class="course-card__content__top course-card__content__top--hover">
                                        <div class="course-card__category">{{ $s['cat'] }}</div>
                                        <div class="course-card__duration">
                                            <span class="course-card__duration__icon"><i class="icon-clock"></i></span>
                                            {{ $s['grades'] }}
                                        </div>
                                    </div>
                                    <h3 class="course-card__title course-card__title--hover"><a
                                            href="{{ url($s['url']) }}">{{ $s['title'] }}</a></h3>
                                    <p class="course-card__text">{{ $s['text'] }}</p>
                                    <a href="{{ url($s['url']) }}" class="course-card__btn eduhive-btn eduhive-btn--border">
                                        <span>{{ $s['btn'] }}</span>
                                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                                    class="icon-right-arrow"></i></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="courses-two__custome-navs"></div>
        </div>
        <div class="courses-two__box-one"></div>
        <div class="courses-two__box-two"></div>
        <img src="{{ asset('assets/images/shapes/courses-shape-2-1.png') }}" alt="" class="courses-two__shape-one">
        <img src="{{ asset('assets/images/shapes/courses-shape-2-2.png') }}" alt="" class="courses-two__shape-two">
    </section>

    {{-- ================= 5. WHAT PARENTS WANT TO KNOW ================= --}}
    @php
        $parents = [
            ['q' => 'Is my child understanding the concepts?', 'a' => 'Concept-focused teaching', 'icon' => 'icon-open-book'],
            ['q' => 'Is my child practising enough?', 'a' => 'Structured homework & practice', 'icon' => 'icon-copy-writing'],
            ['q' => 'How is my child performing?', 'a' => 'Regular tests & performance analysis', 'icon' => 'icon-ranking'],
            ['q' => 'Where is my child weak?', 'a' => 'Chapter-wise identification of gaps', 'icon' => 'icon-files'],
            ['q' => 'Who will guide my child?', 'a' => 'Faculty mentorship & doubt support', 'icon' => 'icon-instructors'],
            ['q' => 'Will I know about the progress?', 'a' => 'Regular parent communication', 'icon' => 'icon-community'],
        ];
    @endphp
    <section class="offer-one section-space">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="offer-one__image">
                        <img src="{{ $img('counselling-cabin.webp', 'assets/images/resources/offer-1-1.jpg') }}"
                            alt="Counselling cabin at SG Education, Khadakpada" class="offer-one__image__one">
                        <img src="{{ $img('fp-parent-counselling.webp', 'assets/images/resources/offer-1-2.jpg') }}" alt=""
                            class="offer-one__image__two">
                        <img src="{{ asset('assets/images/shapes/offer-shape-1-1.png') }}" alt=""
                            class="offer-one__image__shape">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">for parents</h6>
                            <h3 class="sec-title__title"><span class="sec-title__title__shape">What Parents</span> Want to
                                <span class="sec-title__title__text">Know</span>
                            </h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">Every parent has the same six questions
                            about their child's preparation. At SG Education, each one has a clear answer built into the way
                            we teach, test and communicate.</p>
                        <div class="sg-callout wow fadeInUp" data-wow-duration="1500ms" style="margin-bottom: 24px;">
                            <i class="icon-community" aria-hidden="true"></i>
                            You shouldn't have to wait for the final exam to know how your child is doing.
                        </div>
                        <a href="{{ url('/contact') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms">
                            <span>Talk to Our Team</span>
                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                        class="icon-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row gutter-y-30" style="margin-top: 70px;">
                @foreach ($parents as $p)
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1500ms"
                        data-wow-delay="{{ ($loop->index % 2) * 120 }}ms">
                        <div class="sg-qa-tile">
                            <div class="sg-qa-tile__icon"><i class="{{ $p['icon'] }}" aria-hidden="true"></i></div>
                            <div>
                                <h4 class="sg-qa-tile__q">{{ $p['q'] }}</h4>
                                <div class="sg-qa-tile__a">
                                    <i class="icon-check-2" aria-hidden="true"></i>
                                    <span>{{ $p['a'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="offer-one__shape-box"></div>
    </section>

    {{-- ================= 6. CLASS 11 CHANGES EVERYTHING ================= --}}
    <section class="about-two section-space">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ $img('classroom-senior.webp', 'assets/images/about/about-2-1.jpg') }}"
                            alt="Class 11 science students at SG Education" class="about-two__image__one">
                        <img src="{{ $img('fp-student-thinking.webp', 'assets/images/about/about-2-2.jpg') }}" alt=""
                            class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt=""
                            class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">11th science</h6>
                            <h3 class="sec-title__title">Class 11 <span class="sec-title__title__shape">Changes</span> <span
                                    class="sec-title__title__text">Everything.</span></h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">The jump from Grade 10 to science can be
                            significant: deeper concepts, a larger syllabus and more analytical questions. If the goal is
                            JEE, NEET or MHT-CET, Class 11 becomes even more important. SG Education helps students:</p>

                        <ul class="sg-focus">
                            @foreach (['Understand deeper concepts', 'Build problem-solving ability', 'Stay on schedule', 'Test regularly', 'Identify weaknesses early'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <ul class="sg-tags wow fadeInUp" data-wow-duration="1500ms">
                            <li class="sg-tags__label">Courses:</li>
                            <li>PCMB</li>
                            <li>JEE</li>
                            <li>NEET</li>
                            <li>MHT-CET</li>
                        </ul>

                        <a href="{{ url('/courses') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms">
                            <span>Explore 11th Science</span>
                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                        class="icon-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 7. RESULTS ================= --}}
    @include('partials.results')

    {{-- ================= 8. TESTIMONIALS =================
    Hidden until real ones exist. Add entries (with the parent's/student's consent),
    photo in public/assets/images/testimonials/. Never publish made-up quotes.
    --}}
    @php
        $testimonials = [
            // ['name' => 'Parent of Riya S.', 'role' => 'Grade 10, Kalyan', 'quote' => '...', 'img' => 'riya-parent.jpg'],
        ];
    @endphp
    @if (count($testimonials))
        <section class="testimonials-one section-space" id="testimonials">
            <div class="container">
                <div class="row gutter-y-50">
                    <div class="col-xl-4">
                        <div class="testimonials-one__content">
                            <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <h6 class="sec-title__tagline">testimonials</h6>
                                <h3 class="sec-title__title">Don't Take <span class="sec-title__title__shape">Our
                                        Word</span><br><span class="sec-title__title__text">For It.</span></h3>
                            </div>
                            <div class="testimonials-one__description wow fadeInUp" data-wow-duration="1500ms">
                                <p class="testimonials-one__text">Hear from the students and parents who have experienced
                                    the SG way of learning.</p>
                            </div>
                            <div class="testimonials-one__custome-navs"></div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="eduhive-stretch-element-inside-column">
                            <div class="testimonials-one__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow owl-theme owl-carousel"
                                data-owl-options='{"items": 1, "margin": 30, "smartSpeed": 700, "loop": {{ count($testimonials) > 2 ? 'true' : 'false' }}, "autoplay": 600, "nav": true, "navContainer": ".testimonials-one__custome-navs", "dots": false, "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"], "responsive": {"0": {"items": 1, "margin": 10}, "576": {"items": 1.5}, "768": {"items": 1.8}, "992": {"items": 2.6}, "1200": {"items": 2.3}, "1536": {"items": 2.5}, "1800": {"items": 2.94}}}'>
                                @foreach ($testimonials as $t)
                                    <div class="item">
                                        <div class="testimonial-card">
                                            <div class="testimonial-card__top">
                                                <div class="testimonial-card__image">
                                                    <img src="{{ asset('assets/images/testimonials/' . $t['img']) }}"
                                                        alt="{{ $t['name'] }}" loading="lazy" />
                                                    <span class="testimonial-card__icon"><i class="icon-quote-2"></i></span>
                                                </div>
                                                <div class="testimonial-card__identity">
                                                    <h5 class="testimonial-card__name">{{ $t['name'] }}</h5>
                                                    <p class="testimonial-card__designation">{{ $t['role'] }}</p>
                                                </div>
                                            </div>
                                            <div class="testimonial-card__content">
                                                <p class="testimonial-card__quote">{{ $t['quote'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/images/shapes/testimonials-shape-1-1.png') }}" alt="" class="testimonials-one__shape" />
            <div class="testimonials-one__shape-box"></div>
        </section>
    @endif

    {{-- ================= 9. VISION / FOUNDER ================= --}}
    <section class="course-instructor-details section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our founder</h6>
                <h3 class="sec-title__title">The <span class="sec-title__title__shape">Vision</span> Behind <span
                        class="sec-title__title__text">SG Education</span></h3>
            </div>
            <div class="course-instructor-details__inner">
                <div class="course-instructor-details__image">
                    <img src="{{ $img('founder-latesh-ghavat.webp', 'assets/images/courses/course-d-instructor-1-9.jpg') }}"
                        alt="Latesh Ghavat, Founder, SG Education">
                </div>
                <div class="course-instructor-details__info">
                    <h3 class="course-instructor-details__name">Latesh Ghavat</h3>
                    <p class="course-instructor-details__designation">Founder, SG Education</p>
                    <blockquote class="sg-quote">
                        <i class="icon-quote" aria-hidden="true"></i>
                        "Education is not about completing chapters. It is about developing the ability to understand,
                        think, solve and improve."
                    </blockquote>
                    <p class="sg-lede">SG Education was built around a simple belief: <strong>strong fundamentals +
                            consistent practice + meaningful feedback = better academic growth.</strong> Our aim is to create
                        an academic environment where students receive the direction, discipline and support required to
                        keep improving.</p>
                    <a href="{{ url('/about') }}#founder" class="eduhive-btn">
                        <span>Meet the Founder</span>
                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                    class="icon-right-arrow"></i></span></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 10. LEARNING BEYOND THE CLASSROOM ================= --}}
    <section class="online-class section-space-bottom">
        <div class="online-class__inner">
            <div class="online-class__inner__bg"
                style="background-image: url({{ asset('assets/images/shapes/online-class-bg-1-1.png') }});"></div>
        </div>
        <div class="container">
            <div class="video-one wow fadeInUp" data-wow-duration="1500ms">
                <div class="video-one__bg"
                    style="background-image: url({{ $img('fp-seminar.webp', 'assets/images/resources/video-1-1.jpg') }});">
                    <img src="{{ $img('fp-seminar.webp', 'assets/images/resources/video-1-2.jpg') }}"
                        alt="Student seminar at SG Education">
                    <a href="{{ $video }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
                        <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                    </a>
                </div>
            </div>
            <div class="online-class__content">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h6 class="sec-title__tagline">events &amp; initiatives</h6>
                    <h3 class="sec-title__title"><span>Learning</span> <span class="sec-title__title__shape">Beyond</span>
                        <span>the</span> <span class="sec-title__title__text">Classroom</span>
                    </h3>
                </div>
                <div class="online-class__description wow fadeInUp" data-wow-duration="1500ms">
                    <p class="online-class__text">Career guidance, academic seminars, scholarship tests, student workshops
                        and felicitation events. SG Education conducts initiatives designed to help students and parents
                        make better academic decisions.</p>
                </div>
                <div class="online-class__class-wrapper">
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="online-class__class__icon online-class__class__icon--audio">
                            <span class="online-class__class__icon__inner"><i class="icon-graduation"></i></span>
                        </div>
                        <h4 class="online-class__class__title">Career Guidance</h4>
                    </div>
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="online-class__class__icon online-class__class__icon--live">
                            <span class="online-class__class__icon__inner"><i class="icon-live-streaming"></i></span>
                        </div>
                        <h4 class="online-class__class__title">Seminars &amp; Workshops</h4>
                    </div>
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="online-class__class__icon online-class__class__icon--recorded">
                            <span class="online-class__class__icon__inner"><i class="icon-medal"></i></span>
                        </div>
                        <h4 class="online-class__class__title">Scholarship Tests</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="online-class__shape"></div>
        <div class="online-class__box"></div>
    </section>

    {{-- ================= 11a. YOUR JOURNEY ================= --}}
    @php
        $journey = [
            ['grade' => 'Grade 9', 'step' => 'Build', 'text' => 'Strong fundamentals and study habits.', 'icon' => 'icon-open-book'],
            ['grade' => 'Grade 10', 'step' => 'Master', 'text' => 'Board preparation with confidence.', 'icon' => 'icon-batch-assign'],
            ['grade' => '11th – 12th', 'step' => 'Strengthen', 'text' => 'Deeper concepts and problem solving.', 'icon' => 'icon-graduation'],
            ['grade' => 'JEE / NEET / CET', 'step' => 'Compete', 'text' => 'Speed, accuracy and exam strategy.', 'icon' => 'icon-ranking'],
        ];
    @endphp
    <section class="sg-path sg-path--tinted">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">your journey</h6>
                <h3 class="sec-title__title">Your Journey <span class="sec-title__title__text">Starts</span> <span
                        class="sec-title__title__shape">Here.</span></h3>
            </div>
            <ol class="sg-path__list" style="--cols: 4;">
                @foreach ($journey as $j)
                    <li class="sg-path__item wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 120 }}ms">
                        <span class="sg-path__dot"><i class="{{ $j['icon'] }}" aria-hidden="true"></i></span>
                        <div>
                            <span class="sg-path__grade">{{ $j['grade'] }}</span>
                            <h4 class="sg-path__label">{{ $j['step'] }}</h4>
                            <p class="sg-path__text">{{ $j['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
            <p class="sg-callout sg-callout--center wow fadeInUp" data-wow-duration="1500ms">
                <i class="icon-right-up" aria-hidden="true"></i>
                We don't just prepare students for the next examination. We prepare them for the next level.
            </p>
        </div>
    </section>

    {{-- ================= 11b. FAQ ================= --}}
    @php
        $faqs = [
            ['q' => 'Which classes does SG Education offer?', 'a' => 'Grades 8–10, Foundation, 11th–12th Science, JEE, NEET and MHT-CET Courses.'],
            ['q' => 'Where is SG Education located?', 'a' => 'SG Education is located at Khadakpada, Kalyan, above HDFC Bank, offering School, Foundation and Competitive Courses.'],
            ['q' => 'How can I choose the right program?', 'a' => 'Book an academic counselling session and discuss your child\'s class, board, academic level and future goals with our team.'],
            ['q' => 'How are students tested and tracked?', 'a' => 'Through chapter tests, unit tests, cumulative tests and mock tests, followed by analysis of why marks were lost and a plan to improve.'],
        ];
    @endphp
    <section class="faq-one section-space" id="faq">
        <div class="container">
            <div class="row gutter-y-50 align-items-start">
                <div class="col-lg-5">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">FAQs</h6>
                        <h3 class="sec-title__title">Frequently <span class="sec-title__title__text">Asked</span>
                            <span class="sec-title__title__shape">Questions</span>
                        </h3>
                    </div>
                    <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">Quick answers for parents and students.
                        Still unsure? Talk to our team and we'll help you pick the right program.</p>

                    <div class="sg-faq-support wow fadeInUp" data-wow-duration="1500ms">
                        <div class="sg-faq-support__label"><i class="icon-location" aria-hidden="true"></i> Visit / Contact</div>
                        <h4 class="sg-faq-support__title">SG Education, Khadakpada</h4>
                        <p class="sg-faq-support__text">Above HDFC Bank, opposite Gurudev NX Hotel, Kalyan</p>
                        <div class="sg-faq-support__meta">
                            <span class="sg-faq-support__chip">School</span>
                            <span class="sg-faq-support__chip">Foundation</span>
                            <span class="sg-faq-support__chip">Competitive</span>
                        </div>
                        <a href="{{ $whatsapp }}" class="sg-faq-wa" target="_blank" rel="noopener">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            <span>Ask Us on WhatsApp</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    @include('partials.sg-accordion', ['items' => $faqs])
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 12. BLOG / KNOWLEDGE HUB (real posts) ================= --}}
    @php
        $latestPosts = app(\App\Services\BlogRepository::class)->latest(6);
        $blogOwl = [
            'items' => 1, 'margin' => 30, 'loop' => $latestPosts->count() > 3, 'smartSpeed' => 700,
            'nav' => true, 'dots' => false, 'navContainer' => '.blog-three__custome-navs',
            'navText' => ['<span class="icon-arrow-left"></span>', '<span class="icon-arrow-right"></span>'],
            'autoplay' => $latestPosts->count() > 2,
            'responsive' => ['0' => ['items' => 1, 'margin' => 10], '576' => ['items' => 1.5], '768' => ['items' => 2.2], '992' => ['items' => 1.55], '1200' => ['items' => 2.2], '1400' => ['items' => 2.35], '1600' => ['items' => 2.6]],
        ];
    @endphp
    @if ($latestPosts->isNotEmpty())
        <section class="blog-three section-space" id="blog">
            <div class="container">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-xl-4 col-lg-5">
                        <div class="blog-three__content">
                            <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <h6 class="sec-title__tagline">SG knowledge hub</h6>
                                <h3 class="sec-title__title"><span class="sec-title__title__shape">Learn Better.</span> <span
                                        class="sec-title__title__text">Prepare <br> Better.</span></h3>
                            </div>
                            <div class="blog-three__description">
                                <p class="blog-three__text">Practical guides for students and parents on boards, JEE, NEET
                                    and choosing the right preparation path.</p>
                                <a href="{{ route('blog.index') }}" class="eduhive-btn eduhive-btn--border" style="margin-top: 20px;">
                                    <span>Explore SG Knowledge Hub</span>
                                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                                class="icon-right-arrow"></i></span></span>
                                </a>
                            </div>
                            <div class="blog-three__custome-navs"></div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="eduhive-stretch-element-inside-column">
                            <div class="blog-three__carousel eduhive-owl__carousel owl-carousel owl-theme"
                                data-owl-options="{{ json_encode($blogOwl) }}">
                                @foreach ($latestPosts as $post)
                                    @php $postUrl = route('blog.show', $post['slug']); @endphp
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="blog-card__image">
                                                @if (!empty($post['image']))
                                                    <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" loading="lazy">
                                                @else
                                                    @include('blog.partials.cover', ['post' => $post, 'size' => 'sm'])
                                                @endif
                                                <a href="{{ $postUrl }}" class="blog-card__image__link"><span
                                                        class="sr-only">{{ $post['title'] }}</span></a>
                                            </div>
                                            <div class="blog-card__content">
                                                <ul class="list-unstyled blog-card__meta">
                                                    <li><span class="blog-card__meta__icon"><i class="far fa-folder"></i></span>
                                                        {{ $post['category'] }} · {{ $post['read_minutes'] }} min read</li>
                                                </ul>
                                                <h3 class="blog-card__title"><a href="{{ $postUrl }}">{{ $post['title'] }}</a></h3>
                                                <a href="{{ $postUrl }}" class="blog-card__link">
                                                    read more
                                                    <span class="blog-card__link__icon"><span class="blog-card__link__icon__inner"><i
                                                                class="icon-arrow-right"></i></span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/images/shapes/blog-shape-3-1.png') }}" alt="" class="blog-three__shape-one">
            <div class="blog-three__shape-two"></div>
        </section>
    @endif

    {{-- ================= 13. ABOUT SG EDUCATION (SEO summary) ================= --}}
    <section class="sg-summary-sec">
        <div class="container">
            <div class="row gutter-y-40 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                    <span class="sg-summary-badge"><i class="icon-graduation" aria-hidden="true"></i> About SG Education</span>
                    <h2 class="sg-summary-title">Coaching Institute in Kalyan for Grades 8 to 12</h2>
                    <div class="sg-summary-location">
                        <i class="icon-location" aria-hidden="true"></i>
                        <span>Khadakpada, Kalyan, Maharashtra</span>
                    </div>
                    <ul class="sg-chips-wrap">
                        <li class="sg-chip-item">Maharashtra State Board</li>
                        <li class="sg-chip-item">JEE Foundation</li>
                        <li class="sg-chip-item">NEET Foundation</li>
                        <li class="sg-chip-item">JEE Main &amp; Advanced</li>
                        <li class="sg-chip-item">NEET</li>
                        <li class="sg-chip-item">MHT-CET</li>
                    </ul>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <p class="sg-lede">SG Education is a coaching institute in Kalyan offering academic courses for Grades
                        8 to 12 (Maharashtra State Board), JEE, NEET and MHT-CET. Built on concept-first teaching and
                        individual performance tracking, we help students build consistent academic results.</p>
                    <ul class="sg-feature-grid">
                        <li class="sg-feature-card"><i class="icon-multiple-users" aria-hidden="true"></i><span>Focused Batches</span></li>
                        <li class="sg-feature-card"><i class="icon-open-book" aria-hidden="true"></i><span>Concept Teaching</span></li>
                        <li class="sg-feature-card"><i class="icon-files" aria-hidden="true"></i><span>Regular Tests</span></li>
                        <li class="sg-feature-card"><i class="icon-ranking" aria-hidden="true"></i><span>Performance Analysis</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 14. CTA ================= --}}
    <section class="sg-cta-repo">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-graduation" aria-hidden="true"></i> Admissions Open</span>
                    <h2 class="sg-cta__title">Ready to Build a Stronger<br>Academic Future?</h2>
                    <p class="sg-cta__text">Book a free academic counselling session or message us on WhatsApp. We'll help
                        you pick the right program for your child.</p>
                </div>
                <div class="sg-cta__actions">
                    <a href="{{ url('/contact') }}" class="sg-cta__btn sg-cta__btn--primary">
                        <span>Book Academic Counselling</span>
                        <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                    </a>
                    <a href="{{ $whatsapp }}" class="sg-cta__btn sg-cta__btn--wa" target="_blank" rel="noopener">
                        <span>WhatsApp Us</span>
                        <span class="sg-cta__btn-icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection