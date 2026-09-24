{{--
============================================================================
  resources/views/methodology.blade.php
  SG Education — Our Methodology (/our-methodology)
  Content from Website.docx, UI = Eduhive sections (no new CSS/JS).
  Tabs + accordion + carousels run on eduhive.js.

  DEMO markers (replace before go-live):
    - Section images: Eduhive stock
    - Video link: Eduhive demo YouTube
============================================================================
--}}
@extends('layouts.main')

@section('title', 'Our Methodology | SG Academic Excellence System | SG Education Kalyan')

@section('meta')
    <meta name="description" content="The SG Academic Excellence System: Learn, Practise, Test, Analyse, Improve, Excel. How SG Education, Kalyan uses regular testing, performance analysis, mentorship and parent communication to help students improve.">
    <meta name="keywords" content="SG Education methodology, SG Academic Excellence System, coaching methodology Kalyan, regular tests performance analysis, JEE NEET preparation method, Kalyan coaching classes">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Our Methodology | The SG Academic Excellence System">
    <meta property="og:description" content="Learn → Practise → Test → Analyse → Improve → Excel. A better way to learn, a smarter way to improve.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Our Methodology | SG Education">
    <meta name="twitter:description" content="Learn → Practise → Test → Analyse → Improve → Excel.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
@endsection

@section('content')

    @php
        $demoVideo = 'https://www.youtube.com/watch?v=h9MbznbxlLc'; // DEMO
        $variants  = ['primary', 'secondary', 'base'];

        // The 6 steps — used by the overview cards AND the detail tabs
        $steps = [
            [
                'id' => 'learn', 'no' => '01', 'name' => 'Learn', 'icon' => 'icon-open-book',
                'headline' => 'Understand Before You Memorise.',
                'intro' => [
                    'Every strong academic journey begins with fundamentals.',
                    'Our teaching focuses on helping students understand concepts clearly and connect them with practical applications and different question types.',
                ],
                'list_title' => 'We focus on:',
                'list' => ['Concept Clarity', 'Fundamentals', 'Logical Thinking', 'Application'],
                'close_label' => 'The question we ask:',
                'close' => 'Does the student understand the concept, or have they simply memorised the answer?',
            ],
            [
                'id' => 'practise', 'no' => '02', 'name' => 'Practise', 'icon' => 'icon-copy-writing',
                'headline' => 'Understanding Is Only the Beginning.',
                'intro' => [
                    'A student may understand a concept during a lecture but still struggle to solve a question independently. Practice bridges that gap.',
                    'Students are exposed to structured problems that gradually increase in complexity: Basic → Application → Advanced.',
                ],
                'list_title' => 'This helps students develop:',
                'list' => ['Problem-solving ability', 'Accuracy', 'Speed', 'Confidence', 'Question-handling skills'],
                'close_label' => 'Our objective:',
                'close' => 'Move students from "I understand it" to "I can solve it."',
            ],
            [
                'id' => 'test', 'no' => '03', 'name' => 'Test', 'icon' => 'icon-files',
                'headline' => 'Don\'t Wait for the Final Exam to Discover the Problems.',
                'intro' => [
                    'Testing is an integral part of our academic system.',
                    'Regular assessments allow students and teachers to identify gaps while there is still time to correct them.',
                ],
                'list_title' => 'Our assessment ecosystem can include:',
                'list' => [
                    'Chapter Tests: check understanding of individual topics',
                    'Unit Tests: evaluate multiple connected concepts',
                    'Cumulative Tests: test retention and application across chapters',
                    'Mock Tests: build examination temperament',
                    'Board / Competitive Exam Practice: familiarity with actual exam patterns',
                ],
                'close_label' => 'Testing develops:',
                'close' => 'Speed • Accuracy • Time Management • Exam Temperament',
            ],
            [
                'id' => 'analyse', 'no' => '04', 'name' => 'Analyse', 'icon' => 'icon-ranking',
                'headline' => 'Marks Tell You What Happened. Analysis Tells You Why.',
                'intro' => [
                    'A student scoring 60% doesn\'t automatically have a "60% knowledge level." The lost marks may come from completely different causes.',
                    'That\'s why we look beyond the score: Test → Diagnose → Correct.',
                ],
                'list_title' => 'For example:',
                'list' => [
                    'Concept Gap: didn\'t understand the underlying concept',
                    'Application Gap: understood the theory but couldn\'t apply it',
                    'Careless Error: knew the answer but made an avoidable mistake',
                    'Calculation Error: made an error while solving',
                    'Time Pressure: could not complete the paper',
                    'Question Selection: spent too much time on difficult questions',
                ],
                'close_label' => 'The objective isn\'t to tell students "You got 62%." It is to understand:',
                'close' => '"What prevented you from scoring higher?"',
            ],
            [
                'id' => 'improve', 'no' => '05', 'name' => 'Improve', 'icon' => 'icon-batch-assign',
                'headline' => 'Every Test Should Create an Improvement Plan.',
                'intro' => [
                    'A test without analysis is just a number.',
                    'Once weaknesses are identified, students need to work on them.',
                ],
                'list_title' => 'Improvement can involve:',
                'list' => [
                    'Targeted Practice: focus on specific weak concepts',
                    'Revision: revisit important concepts',
                    'Doubt Solving: resolve unresolved questions',
                    'Error Correction: understand recurring mistakes',
                    'Retesting: check whether the weakness has actually improved',
                ],
                'close_label' => 'The cycle becomes:',
                'close' => 'Mistake → Understand → Correct → Practise → Retest',
            ],
            [
                'id' => 'excel', 'no' => '06', 'name' => 'Excel', 'icon' => 'icon-medal',
                'headline' => 'Consistency Is the Final Advantage.',
                'intro' => [
                    'Excellence isn\'t created by one exceptional test. It is built through hundreds of small improvements.',
                    'A student who continuously improves concepts → accuracy → speed → problem solving → test performance gradually becomes better prepared for increasingly difficult academic challenges.',
                ],
                'list_title' => 'Every test starts the next cycle:',
                'list' => ['Learn', 'Practise', 'Test', 'Analyse', 'Improve', 'Retest', 'Learn Better'],
                'close_label' => 'Our objective:',
                'close' => 'Not one good score. A pattern of improvement.',
            ],
        ];
    @endphp

    {{-- ================= 1. PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    <li><span>Our Methodology</span></li>
                </ul>
                <h1 class="page-header__title">Our Methodology</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    {{-- ================= 2. INTRO ================= --}}
    <section class="about-one section-space">
        <div class="about-one__bg" style="background-image: url({{ asset('assets/images/shapes/about-bg-1-1.png') }})"></div>
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-one__image">
                        <div class="about-one__image__one">
                            <img src="{{ asset('assets/images/about/about-1-1.jpg') }}" alt="The SG Academic Excellence System" />
                            <div class="about-one__video">
                                <a href="{{ $demoVideo }}" class="about-one__video__btn video-btn video-popup" aria-label="Play video">
                                    <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                                </a>
                                <p class="about-one__video__text">play now</p>
                            </div>
                        </div>
                        <div class="about-one__image__two">
                            <img src="{{ asset('assets/images/about/about-1-2.jpg') }}" alt="" />
                        </div>
                        <img src="{{ asset('assets/images/shapes/about-shape-1-1.png') }}" alt="" class="about-one__image__shape" />
                        <div class="about-one__image__circle"><div class="about-one__image__circle__inner"></div></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">the SG academic excellence system</h6>
                            <h3 class="sec-title__title">A Better Way to Learn. <br>A <span class="sec-title__title__shape">Smarter Way</span> to <span class="sec-title__title__text">Improve.</span></h3>
                        </div>
                        <div class="about-one__description wow fadeInUp" data-wow-duration="1500ms">
                            <p class="about-one__text">At SG Education, we believe academic success is not the result of one factor. It is the outcome of <strong>strong concepts, deliberate practice, regular testing, honest analysis and continuous improvement.</strong> Our methodology takes students through this complete academic cycle.</p>
                            <p class="about-one__text"><strong>Learn → Practise → Test → Analyse → Improve → Excel</strong></p>
                        </div>
                        <div class="about-one__inner wow fadeInUp" data-wow-duration="1500ms">
                            <ul class="about-one__info list-unstyled">
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Strong Concepts</li>
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Honest Analysis</li>
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Continuous Improvement</li>
                            </ul>
                            <div class="about-one__button" style="display: flex; flex-wrap: wrap; gap: 15px;">
                                <a href="{{ url('/courses') }}" class="about-one__btn eduhive-btn">
                                    <span>Explore Our Programs</span>
                                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                                </a>
                                <a href="{{ url('/contact') }}" class="about-one__btn eduhive-btn eduhive-btn--border">
                                    <span>Book Academic Counselling</span>
                                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 3. SYLLABUS ≠ PREPARATION ================= --}}
    <section class="about-two section-space">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ asset('assets/images/about/about-2-1.jpg') }}" alt="Student preparing for exams" class="about-two__image__one">
                        <img src="{{ asset('assets/images/about/about-2-2.jpg') }}" alt="" class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt="" class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">why a methodology?</h6>
                            <h3 class="sec-title__title">Completing the Syllabus <span class="sec-title__title__shape">Is Not the Same as</span> <span class="sec-title__title__text">Preparing a Student.</span></h3>
                        </div>
                        <div class="about-two__description wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <p class="about-two__text">A chapter can be completed. A notebook can be full. A test can be conducted. And yet, a student may still struggle in the examination, because academic performance depends on more than content coverage. Students need to know:</p>
                        </div>
                        @php
                            $needs = ['What to learn', 'How to practise', 'Whether they can apply it', 'Where they are making mistakes', 'Why they are making those mistakes', 'What they need to improve next'];
                        @endphp
                        <div class="about-two__row row">
                            @foreach ($needs as $item)
                                <div class="col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 2) * 100 }}ms">
                                    <div class="about-two__info">
                                        <span class="about-two__info__icon"><i class="icon-check-2"></i></span>
                                        <h4 class="about-two__info__title">{{ $item }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="about-two__description wow fadeInUp" data-wow-duration="1500ms">
                            <p class="about-two__text"><strong>We don't just teach chapters. We build academic capability:</strong> Understanding → Thinking → Applying → Solving → Analysing → Improving. This ability becomes increasingly important as students move from school examinations to competitive examinations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 4. THE 6 STEPS — OVERVIEW ================= --}}
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">the SG academic excellence system</h6>
                <h3 class="sec-title__title">Six Steps. <span class="sec-title__title__text">One</span> <span class="sec-title__title__shape">Continuous Cycle.</span></h3>
            </div>
            <div class="row gutter-y-30">
                @foreach ($steps as $step)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="course-category__card course-category__card--{{ $loop->iteration }}">
                            <div class="course-category__card__inner">
                                <div class="course-category__card__bg" style="background-image: url({{ asset('assets/images/course-category/course-category-card-bg-1-' . $loop->iteration . '.jpg') }});"></div>
                            </div>
                            <div class="course-category__card__content">
                                <div class="course-category__card__icon-box">
                                    <span class="course-category__card__icon"><i class="{{ $step['icon'] }}"></i></span>
                                </div>
                                <h4 class="course-category__card__title">{{ $step['no'] }} &ndash; {{ $step['name'] }}</h4>
                                <p class="course-category__card__text" style="margin: 6px 0 0;">{{ $step['headline'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="course-category__shape-one"></div>
        <div class="course-category__shape-two"></div>
    </section>

    {{-- ================= 5. THE 6 STEPS — DETAIL (Eduhive tabs) ================= --}}
    <section class="course-details section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="course-details__inner">
                        <div class="course-details__main-tab-box tabs-box">
                            <ul class="tab-buttons">
                                @foreach ($steps as $step)
                                    <li data-tab="#step-{{ $step['id'] }}" class="tab-btn {{ $loop->first ? 'active-btn' : '' }}">{{ $step['no'] }} {{ $step['name'] }}</li>
                                @endforeach
                            </ul>
                            <div class="tabs-content">
                                @foreach ($steps as $step)
                                    <div class="tab {{ $loop->first ? 'active-tab' : '' }} fadeInUp animated" data-wow-delay="200ms" id="step-{{ $step['id'] }}" style="display: {{ $loop->first ? 'block' : 'none' }};">
                                        <div class="course-details__description">
                                            <h3 class="course-details__title course-details__title--description">{{ $step['no'] }} &ndash; {{ $step['name'] }}: {{ $step['headline'] }}</h3>
                                            <div class="course-details__description__inner">
                                                @foreach ($step['intro'] as $para)
                                                    <p class="course-details__description__text">{{ $para }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="course-details__requirements">
                                            <h3 class="course-details__title course-details__title--requirements">{{ $step['list_title'] }}</h3>
                                            <ul class="course-details__requirements__list list-unstyled">
                                                @foreach ($step['list'] as $item)
                                                    <li class="course-details__requirements__item">
                                                        <span class="course-details__requirements__list__icon"><i class="icon-check-2"></i></span>
                                                        {{ $item }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <p class="course-details__requirements__text">{{ $step['close_label'] }} <strong>{{ $step['close'] }}</strong></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 6. MID CTA — THE CYCLE ================= --}}
    <section class="cta-one">
        <div class="container">
            <div class="cta-one__content wow fadeInUp" data-wow-duration="1500ms">
                <h2 class="cta-one__title">
                    Every Test Starts the Next Cycle. <br />
                    Improvement Is a Process, Not an Event.
                </h2>
                <a href="{{ url('/contact') }}" class="eduhive-btn">
                    <span>Book Counselling</span>
                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                </a>
            </div>
        </div>
        <img src="{{ asset('assets/images/resources/cta-1-1.png') }}" alt="" class="cta-one__image-one" />
        <img src="{{ asset('assets/images/resources/cta-1-2.png') }}" alt="" class="cta-one__image-two" />
        <img src="{{ asset('assets/images/shapes/cta-shape-1-1.png') }}" alt="" class="cta-one__shape-one" />
        <img src="{{ asset('assets/images/shapes/cta-shape-1-1.png') }}" alt="" class="cta-one__shape-two" />
        <div class="cta-one__shape-box-one"></div>
        <div class="cta-one__shape-box-two wow fadeInRight" data-wow-duration="1500ms"></div>
    </section>

    {{-- ================= 7. DIFFERENT STUDENTS, DIFFERENT GAPS ================= --}}
    <section class="offer-one section-space-top">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="offer-one__image">
                        <img src="{{ asset('assets/images/resources/offer-1-1.jpg') }}" alt="Every student has different learning gaps" class="offer-one__image__one">
                        <img src="{{ asset('assets/images/resources/offer-1-2.jpg') }}" alt="" class="offer-one__image__two">
                        <img src="{{ asset('assets/images/shapes/offer-shape-1-1.png') }}" alt="" class="offer-one__image__shape">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">beyond marks</h6>
                            <h3 class="sec-title__title"><span class="sec-title__title__shape">One Classroom.</span> Different Students. <span class="sec-title__title__text">Different Gaps.</span></h3>
                        </div>
                        <p class="wow fadeInUp" data-wow-duration="1500ms">Not every student struggles for the same reason. One may need more conceptual support, another more practice, another more speed, another more consistency. That's why we look at every student through multiple dimensions, so support becomes targeted:</p>
                        @php
                            $dimensions = [
                                ['t' => 'Conceptual Understanding', 'd' => 'Does the student truly understand the underlying ideas?',        'i' => 'icon-open-book'],
                                ['t' => 'Problem Solving',          'd' => 'Can they apply concepts to unfamiliar questions?',               'i' => 'icon-copy-writing'],
                                ['t' => 'Accuracy',                 'd' => 'How many marks are lost to avoidable errors?',                    'i' => 'icon-check-2'],
                                ['t' => 'Speed',                    'd' => 'Can they finish the paper within the time limit?',               'i' => 'icon-clock'],
                                ['t' => 'Consistency',              'd' => 'Is preparation regular, week after week?',                       'i' => 'icon-batch-assign'],
                                ['t' => 'Test Performance',         'd' => 'How do scores move across chapter, unit and mock tests?',        'i' => 'icon-ranking'],
                            ];
                        @endphp
                        <div class="offer-one__inner">
                            @foreach ($dimensions as $dm)
                                <div class="offer-one__item wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="offer-one__item__icon offer-one__item__icon--{{ $variants[$loop->index % 3] }}">
                                        <i class="{{ $dm['i'] }}"></i>
                                    </div>
                                    <div class="offer-one__item__content">
                                        <h4 class="offer-one__item__title">{{ $dm['t'] }}</h4>
                                        <p class="offer-one__item__text">{{ $dm['d'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-one__shape-box"></div>
    </section>

    {{-- ================= 8. FOCUSED BATCHES ================= --}}
    <section class="about-two section-space">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ asset('assets/images/about/about-2-1.jpg') }}" alt="Focused batch classroom" class="about-two__image__one">
                        <img src="{{ asset('assets/images/about/about-2-2.jpg') }}" alt="" class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt="" class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">focused batches</h6>
                            <h3 class="sec-title__title">Focused Batches. <span class="sec-title__title__shape">Better Academic</span> <span class="sec-title__title__text">Interaction.</span></h3>
                        </div>
                        <div class="about-two__description wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <p class="about-two__text">Our focused batch structure is designed to create an environment where students can:</p>
                        </div>
                        @php
                            $batch = ['Ask questions', 'Participate actively', 'Receive classroom attention', 'Discuss difficult problems', 'Interact with faculty', 'Receive academic guidance'];
                        @endphp
                        <div class="about-two__row row">
                            @foreach ($batch as $item)
                                <div class="col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 2) * 100 }}ms">
                                    <div class="about-two__info">
                                        <span class="about-two__info__icon"><i class="icon-check-2"></i></span>
                                        <h4 class="about-two__info__title">{{ $item }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p class="wow fadeInUp" data-wow-duration="1500ms"><strong>The principle is simple: students shouldn't feel invisible in the classroom.</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 9. PARENTS + MENTORSHIP ================= --}}
    <section class="faq-one section-space">
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">for parents</h6>
                        <h3 class="sec-title__title">Parents Should See the <span class="sec-title__title__text">Journey,</span> Not Just the Result.</h3>
                    </div>
                    <p class="wow fadeInUp" data-wow-duration="1500ms">A parent shouldn't have to wait for the final examination to discover that a student has been struggling. Meaningful academic communication helps parents understand:</p>
                    @php
                        $parentView = [
                            ['n' => '01', 't' => 'Progress: is the student improving?',          'i' => 'icon-ranking',      'v' => 'secondary'],
                            ['n' => '02', 't' => 'Strengths & Weaknesses: what needs attention?', 'i' => 'icon-files',        'v' => 'primary'],
                            ['n' => '03', 't' => 'Consistency: is preparation regular?',          'i' => 'icon-batch-assign', 'v' => 'primary'],
                            ['n' => '04', 't' => 'Next Steps: what to focus on now?',             'i' => 'icon-right-up',     'v' => 'secondary'],
                        ];
                    @endphp
                    <div class="funfact-one">
                        <div class="funfact-one__grid">
                            @foreach ($parentView as $pv)
                                <div class="funfact-one__item funfact-one__item--{{ $pv['v'] }} wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 2) * 100 }}ms">
                                    <div class="funfact-one__icon"><span class="funfact-one__icon__inner"><i class="{{ $pv['i'] }}"></i></span></div>
                                    <h3 class="funfact-one__title">{{ $pv['n'] }}</h3>
                                    <p class="funfact-one__text">{{ $pv['t'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">mentorship</h6>
                            <h3 class="sec-title__title">Teaching Happens in the Classroom. <span class="sec-title__title__shape">Mentorship</span> <span class="sec-title__title__text">Goes Beyond It.</span></h3>
                        </div>
                        @php
                            // Questions from docx; short answers written to describe the mentorship approach (review with SG team)
                            $mentor = [
                                ['q' => 'Am I studying correctly?',                                   'a' => 'Mentors review how a student studies, not just what they study, and help build a structured routine for learning, practice and revision.'],
                                ['q' => 'Why aren\'t my marks improving?',                            'a' => 'Test analysis shows whether marks are lost to concept gaps, application gaps, careless errors or time pressure, so effort goes where it matters.'],
                                ['q' => 'Which subject needs more attention?',                        'a' => 'Subject-wise and chapter-wise performance helps decide where extra practice and doubt-solving time should go.'],
                                ['q' => 'How should I revise?',                                       'a' => 'Students get guidance on revision cycles, retesting weak chapters and using past papers and mock tests effectively.'],
                                ['q' => 'How should I manage school and competitive preparation?',    'a' => 'Mentors help students plan their week so board preparation and JEE / NEET / MHT-CET preparation support each other instead of competing.'],
                            ];
                        @endphp
                        <div class="faq-one__accordion">
                            <div class="eduhive-accordion" data-grp-name="eduhive-accordion-mentor">
                                @foreach ($mentor as $m)
                                    <div class="accordion {{ $loop->first ? 'active' : '' }} wow fadeInUp" data-wow-duration="1500ms">
                                        <div class="accordion-title">
                                            <h4>{{ $m['q'] }}</h4>
                                            <span class="accordion-title__icon"><i class="icon-double-arrow"></i></span>
                                        </div>
                                        <div class="accordion-content">
                                            <div class="inner"><p>{{ $m['a'] }}</p></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 10. DIFFERENT STAGES, DIFFERENT FOCUS ================= --}}
    @php
        $stageFocus = [
            ['cat' => 'Grade 9',           'title' => 'Build the Foundation',               'focus' => 'Concepts • Habits • Fundamentals • Problem Solving',                                   'url' => '/courses/boards', 'img' => 'course-1-1.jpg'],
            ['cat' => 'Grade 10',          'title' => 'Master the Board Preparation',       'focus' => 'Syllabus • Practice • Revision • Testing • Examination Strategy',                      'url' => '/courses/boards', 'img' => 'course-1-2.jpg'],
            ['cat' => 'Grade 11',          'title' => 'Build the Competitive Foundation',   'focus' => 'Deep Concepts • Problem Solving • Consistency • Competitive Thinking',                  'url' => '/courses',        'img' => 'course-1-3.jpg'],
            ['cat' => 'Grade 12',          'title' => 'Strengthen. Revise. Perform.',       'focus' => 'Advanced Practice • Revision • Testing • Exam Strategy',                               'url' => '/courses',        'img' => 'course-1-4.jpg'],
            ['cat' => 'JEE / NEET / CET',  'title' => 'Prepare to Perform Under Pressure',  'focus' => 'Concepts • Application • MCQs / Problems • Speed • Accuracy • Mock Tests • Analysis', 'url' => '/courses',        'img' => 'course-1-5.jpg'],
        ];
    @endphp
    <section class="courses-four section-space2">
        <div class="container">
            <div class="courses-four__top">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">stage-wise focus</h6>
                            <h3 class="sec-title__title"><span>Different</span> <span class="sec-title__title__shape">Stages.</span> <span>Different</span> <span class="sec-title__title__text">Focus.</span></h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="courses-four__custome-navs"></div>
                    </div>
                </div>
            </div>
            <div class="courses-four__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow eduhive-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
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
                @foreach ($stageFocus as $sf)
                    <div class="item">
                        <div class="course-card wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                            <div class="course-card__image">
                                <img src="{{ asset('assets/images/courses/' . $sf['img']) }}" alt="{{ $sf['cat'] }}: {{ $sf['title'] }}">
                            </div>
                            <div class="course-card__content">
                                <div class="course-card__content__top">
                                    <div class="course-card__category">{{ $sf['cat'] }}</div>
                                </div>
                                <h3 class="course-card__title"><a href="{{ url($sf['url']) }}">{{ $sf['title'] }}</a></h3>
                                <div class="course-card__info">
                                    <div class="course-card__lessons">
                                        <span class="course-card__lessons__icon"><i class="icon-open-book"></i></span>
                                        Focus areas
                                    </div>
                                </div>
                            </div>
                            <div class="course-card__hover" style="background-image: url({{ asset('assets/images/shapes/course-card-bg-1-1.png') }});">
                                <div class="course-card__hover__content">
                                    <div class="course-card__content__top course-card__content__top--hover">
                                        <div class="course-card__category">{{ $sf['cat'] }}</div>
                                    </div>
                                    <h3 class="course-card__title course-card__title--hover"><a href="{{ url($sf['url']) }}">{{ $sf['title'] }}</a></h3>
                                    <p class="course-card__text">Focus on: {{ $sf['focus'] }}</p>
                                    <a href="{{ url($sf['url']) }}" class="course-card__btn eduhive-btn eduhive-btn--border">
                                        <span>view programs</span>
                                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= 11. WHAT MAKES OUR APPROACH DIFFERENT ================= --}}
    <section class="online-class section-space-bottom">
        <div class="online-class__inner">
            <div class="online-class__inner__bg" style="background-image: url({{ asset('assets/images/shapes/online-class-bg-1-1.png') }});"></div>
        </div>
        <div class="container">
            <div class="video-one wow fadeInUp" data-wow-duration="1500ms">
                <div class="video-one__bg" style="background-image: url({{ asset('assets/images/resources/video-1-1.jpg') }});">
                    <img src="{{ asset('assets/images/resources/video-1-2.jpg') }}" alt="SG Education classroom">
                    <a href="{{ $demoVideo }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
                        <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                    </a>
                </div>
            </div>
            <div class="online-class__content">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h6 class="sec-title__tagline">what makes our approach different?</h6>
                    <h3 class="sec-title__title"><span>We Make</span> <span class="sec-title__title__shape">the Academic Process</span> <span class="sec-title__title__text">Visible.</span></h3>
                </div>
                <div class="online-class__description wow fadeInUp" data-wow-duration="1500ms">
                    <p class="online-class__text">Not "we teach better than everyone else." Instead: students know what they're learning. They practise it, test it, analyse mistakes, work on weaknesses and test again. Parents can understand the journey. Teachers can identify gaps. <strong>That creates accountability at every stage.</strong></p>
                </div>
                <div class="online-class__class-wrapper">
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="online-class__class__icon online-class__class__icon--audio">
                            <span class="online-class__class__icon__inner"><i class="icon-students"></i></span>
                        </div>
                        <h4 class="online-class__class__title">Students see their gaps</h4>
                    </div>
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="online-class__class__icon online-class__class__icon--live">
                            <span class="online-class__class__icon__inner"><i class="icon-community"></i></span>
                        </div>
                        <h4 class="online-class__class__title">Parents see the journey</h4>
                    </div>
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="online-class__class__icon online-class__class__icon--recorded">
                            <span class="online-class__class__icon__inner"><i class="icon-instructors"></i></span>
                        </div>
                        <h4 class="online-class__class__title">Teachers act on data</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="online-class__shape"></div>
        <div class="online-class__box"></div>
    </section>

    {{-- ================= 12. OUR COMMITMENT ================= --}}
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our commitment</h6>
                <h3 class="sec-title__title">What Every <span class="sec-title__title__text">Student</span> <span class="sec-title__title__shape">Receives</span></h3>
            </div>
            @php
                $commit = [
                    ['t' => 'Clear Concepts',                         'i' => 'icon-open-book'],
                    ['t' => 'Structured Preparation',                 'i' => 'icon-copy-writing'],
                    ['t' => 'Regular Assessment',                     'i' => 'icon-files'],
                    ['t' => 'Meaningful Feedback',                    'i' => 'icon-ranking'],
                    ['t' => 'Academic Guidance',                      'i' => 'icon-instructors'],
                    ['t' => 'Continuous Opportunities to Improve',    'i' => 'icon-medal'],
                ];
            @endphp
            <div class="row gutter-y-30">
                @foreach ($commit as $c)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="course-category__card course-category__card--{{ $loop->iteration }}">
                            <div class="course-category__card__inner">
                                <div class="course-category__card__bg" style="background-image: url({{ asset('assets/images/course-category/course-category-card-bg-1-' . $loop->iteration . '.jpg') }});"></div>
                            </div>
                            <div class="course-category__card__content">
                                <div class="course-category__card__icon-box">
                                    <span class="course-category__card__icon"><i class="{{ $c['i'] }}"></i></span>
                                </div>
                                <h4 class="course-category__card__title">{{ $c['t'] }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-center wow fadeInUp" data-wow-duration="1500ms" style="max-width: 760px; margin: 40px auto 0;">
                <strong>We cannot promise every student the same result. We can build a system that gives every student a better opportunity to improve.</strong>
            </p>
        </div>
        <div class="course-category__shape-one"></div>
        <div class="course-category__shape-two"></div>
    </section>

    {{-- ================= 13. FINAL CTA ================= --}}
    <section class="cta-one">
        <div class="container">
            <div class="cta-one__content wow fadeInUp" data-wow-duration="1500ms">
                <h2 class="cta-one__title">
                    Ready to Experience the <br />
                    SG Academic System?
                </h2>
                <a href="{{ url('/contact') }}" class="eduhive-btn">
                    <span>Book Academic Counselling</span>
                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                </a>
            </div>
        </div>
        <img src="{{ asset('assets/images/resources/cta-1-1.png') }}" alt="" class="cta-one__image-one" />
        <img src="{{ asset('assets/images/resources/cta-1-2.png') }}" alt="" class="cta-one__image-two" />
        <img src="{{ asset('assets/images/shapes/cta-shape-1-1.png') }}" alt="" class="cta-one__shape-one" />
        <img src="{{ asset('assets/images/shapes/cta-shape-1-1.png') }}" alt="" class="cta-one__shape-two" />
        <div class="cta-one__shape-box-one"></div>
        <div class="cta-one__shape-box-two wow fadeInRight" data-wow-duration="1500ms"></div>
    </section>

@endsection