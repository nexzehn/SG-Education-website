{{--
============================================================================
resources/views/about.blade.php
SG Education — About page. Content from Website.docx, UI = Eduhive sections
+ shared "sg-" components from public/assets/css/sg-custom.css.
Extends layouts/main.blade.php.

⚠️ Confirm before go-live: NEET 627 is "Niraj Fatkal" here but "Dhiraj Patil"
   on the Results page. Use one name on both.
============================================================================
--}}
@extends('layouts.main')

@section('title', 'About SG Education | The Dream Starts in Kalyan | Latesh Ghavat')

@section('meta')
    <meta name="description"
        content="About SG Education, Kalyan: founded by Latesh Ghavat with a dream of producing AIR 1 from Kalyan. Concept-first teaching, regular testing, performance analysis and mentorship for School, Foundation, JEE, NEET, MHT-CET and NDA.">
    <meta name="keywords"
        content="about SG Education, Latesh Ghavat, SG Education Kalyan, coaching institute Kalyan, JEE coaching Kalyan, NEET coaching Kalyan, MHT-CET Kalyan">

    <meta property="og:type" content="website">
    <meta property="og:title" content="About SG Education | The Dream Starts in Kalyan">
    <meta property="og:description"
        content="A coaching institute built so students from Kalyan can dream bigger, prepare systematically and compete with the best.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="About SG Education | Kalyan">
    <meta name="twitter:description" content="Dream bigger. Prepare systematically. Compete with the best.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
@endsection

@section('content')

    @php
        $video = config('sg.video');
        $img = function (string $file, string $stock) {
            $p = config('sg.img_dir', 'assets/images/sg') . '/' . $file;
            return asset(file_exists(public_path($p)) ? $p : $stock);
        };
    @endphp

    {{-- ================= 1. PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
                    <li><span>About us</span></li>
                </ul>
                <h1 class="page-header__title">About SG Education</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    {{-- ================= 2. THE DREAM STARTS IN KALYAN ================= --}}
    <section class="about-one section-space">
        <div class="about-one__bg" style="background-image: url({{ asset('assets/images/shapes/about-bg-1-1.png') }})">
        </div>
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-one__image">
                        <div class="about-one__image__one">
                            <img src="{{ $img('classroom-senior.webp', 'assets/images/about/about-1-1.jpg') }}"
                                alt="Students in class at SG Education, Kalyan" />
                            <div class="about-one__video">
                                <a href="{{ $video }}" class="about-one__video__btn video-btn video-popup"
                                    aria-label="Play video">
                                    <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                                </a>
                                <p class="about-one__video__text">play now</p>
                            </div>
                        </div>
                        <div class="about-one__image__two">
                            <img src="{{ $img('counselling-cabin.webp', 'assets/images/about/about-1-2.jpg') }}"
                                alt="SG Education office, Khadakpada, Kalyan" />
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
                            <h6 class="sec-title__tagline">about SG education</h6>
                            <h3 class="sec-title__title">The Dream <span class="sec-title__title__shape">Starts in</span>
                                <span class="sec-title__title__text">Kalyan.</span>
                            </h3>
                        </div>
                        <blockquote class="sg-quote wow fadeInUp" data-wow-duration="1500ms">
                            <i class="icon-quote" aria-hidden="true"></i>
                            "I have a dream of producing AIR 1 from Kalyan."
                            <cite>— Latesh Ghavat, Founder, SG Education</cite>
                        </blockquote>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">We believe a student's potential should
                            never be limited by where they come from. SG Education was built with a vision to create an
                            academic environment in Kalyan where students can dream bigger, prepare systematically and
                            compete with the best.</p>

                        <ul class="sg-focus">
                            @foreach (['Dream Bigger', 'Prepare Systematically', 'Compete With the Best'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="wow fadeInUp" data-wow-duration="1500ms" style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <a href="{{ url('/courses') }}" class="eduhive-btn">
                                <span>Explore Our Courses</span>
                                <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                            class="icon-right-arrow"></i></span></span>
                            </a>
                            <a href="{{ url('/our-methodology') }}" class="eduhive-btn eduhive-btn--border">
                                <span>Our Methodology</span>
                                <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                            class="icon-right-arrow"></i></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 3. RESULT HIGHLIGHTS =================
    Final numbers rendered in HTML (SEO / no-JS safe); sg-custom.js counts them up on scroll.
    --}}
    @php
        $highlights = [
            ['prefix' => 'AIR', 'value' => 711, 'decimals' => 0, 'suffix' => '', 'exam' => 'JEE Advanced', 'name' => 'Prashik Ahire', 'icon' => 'icon-ranking'],
            ['prefix' => '', 'value' => 99.21, 'decimals' => 2, 'suffix' => '%ile', 'exam' => 'JEE Main', 'name' => 'Kirti Pandey', 'icon' => 'icon-medal'],
            ['prefix' => '', 'value' => 99.78, 'decimals' => 2, 'suffix' => '%ile', 'exam' => 'MHT-CET', 'name' => 'Advait Gotkhinde', 'icon' => 'icon-graduation'],
            ['prefix' => '', 'value' => 627, 'decimals' => 0, 'suffix' => '/720', 'exam' => 'NEET', 'name' => 'Dhiraj Patil', 'icon' => 'icon-students'], // ⚠️ see header note
        ];
    @endphp
    <section class="sg-highlights">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">results that speak</h6>
                <h3 class="sec-title__title">Proof of the <span class="sec-title__title__text">SG</span> <span
                        class="sec-title__title__shape">Process</span></h3>
            </div>
            <div class="row gutter-y-30">
                @foreach ($highlights as $h)
                    <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ $loop->index * 120 }}ms">
                        <div class="sg-hl">
                            <div class="sg-hl__icon"><i class="{{ $h['icon'] }}" aria-hidden="true"></i></div>
                            <div class="sg-hl__number">
                                @if ($h['prefix'])<span class="sg-hl__affix">{{ $h['prefix'] }}</span>@endif
                                <span class="sg-countup" data-target="{{ $h['value'] }}"
                                    data-decimals="{{ $h['decimals'] }}">{{ number_format($h['value'], $h['decimals']) }}</span>
                                @if ($h['suffix'])<span class="sg-hl__affix">{{ $h['suffix'] }}</span>@endif
                            </div>
                            <span class="sg-hl__exam">{{ $h['exam'] }}</span>
                            <p class="sg-hl__name">{{ $h['name'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sg-highlights__foot wow fadeInUp" data-wow-duration="1500ms">
                <a href="{{ url('/results') }}" class="eduhive-btn eduhive-btn--border">
                    <span>View All Results</span>
                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                class="icon-right-arrow"></i></span></span>
                </a>
                <p class="sg-highlights__note">Results shown are student achievements and should not be interpreted as
                    a guarantee of future performance.</p>
            </div>
        </div>
    </section>

    {{-- ================= 4. WHY SG + VISION ================= --}}
    <section class="online-class section-space-bottom">
        <div class="online-class__inner">
            <div class="online-class__inner__bg"
                style="background-image: url({{ asset('assets/images/shapes/online-class-bg-1-1.png') }});"></div>
        </div>
        <div class="container">
            <div class="video-one wow fadeInUp" data-wow-duration="1500ms">
                <div class="video-one__bg"
                    style="background-image: url({{ $img('classroom-junior.webp', 'assets/images/resources/video-1-1.jpg') }});">
                    <!-- <img src="{{ $img('classroom-junior.webp', 'assets/images/resources/video-1-2.jpg') }}"
                        alt="Grade 9–10 students at SG Education">
                    <a href="{{ $video }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
                        <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                    </a> -->
                </div>
            </div>
            <div class="online-class__content">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h6 class="sec-title__tagline">why SG education?</h6>
                    <h3 class="sec-title__title"><span>Because</span> <span class="sec-title__title__shape">Talent Is</span>
                        <span class="sec-title__title__text">Everywhere.</span>
                    </h3>
                </div>
                <div class="online-class__description wow fadeInUp" data-wow-duration="1500ms">
                    <p class="online-class__text">Kalyan has talented students, ambitious parents and hardworking families.
                        But ambition needs direction. SG Education provides the academic planning, conceptual learning,
                        practice, testing, analysis and guidance required to turn ambition into measurable progress.</p>
                    <p class="online-class__text">We don't want a student to think, <em>"I'm from Kalyan, so I should aim
                            for what is available around me."</em> We want them to think, <strong>"I'm from Kalyan. Why
                            can't I compete with the best?"</strong></p>
                    <p class="online-class__text"><strong>Our vision: From Kalyan. To the Best.</strong> One ecosystem,
                        multiple pathways: School → Foundation → Science → Competitive Exams → Career.</p>
                </div>
                <div class="online-class__class-wrapper">
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="online-class__class__icon online-class__class__icon--audio">
                            <span class="online-class__class__icon__inner"><i class="icon-open-book"></i></span>
                        </div>
                        <h4 class="online-class__class__title">9th – 10th Academics</h4>
                    </div>
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="online-class__class__icon online-class__class__icon--live">
                            <span class="online-class__class__icon__inner"><i class="icon-graduation"></i></span>
                        </div>
                        <h4 class="online-class__class__title">11th – 12th Science</h4>
                    </div>
                    <div class="online-class__class wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="online-class__class__icon online-class__class__icon--recorded">
                            <span class="online-class__class__icon__inner"><i class="icon-ranking"></i></span>
                        </div>
                        <h4 class="online-class__class__title">JEE, NEET, CET &amp; NDA</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="online-class__shape"></div>
        <div class="online-class__box"></div>
    </section>

    {{-- ================= 5. THE AIR 1 DREAM ================= --}}
    <section class="about-two section-space">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ $img('fp-student-self-study.webp', 'assets/images/about/about-2-1.jpg') }}"
                            alt="Serious preparation at SG Education" class="about-two__image__one">
                        <img src="{{ $img('library-books.webp', 'assets/images/about/about-2-2.jpg') }}" alt=""
                            class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt=""
                            class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">the AIR 1 dream</h6>
                            <h3 class="sec-title__title">A Dream This Big <span class="sec-title__title__shape">Needs a
                                    Serious</span> <span class="sec-title__title__text">System.</span></h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">This is an ambition, not a promise. We
                            cannot promise AIR 1 or a particular rank. What we can do is build an environment where serious
                            students can dream at that level and prepare at that level. That means focusing on:</p>

                        <ul class="sg-focus">
                            @foreach (['Deep Concepts', 'Advanced Problem Solving', 'Consistent Practice', 'Regular Testing', 'Performance Analysis', 'Targeted Improvement', 'Mentorship', 'Discipline'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <p class="sg-callout wow fadeInUp" data-wow-duration="1500ms">
                            <i class="icon-ranking" aria-hidden="true"></i>
                            The rank is the outcome. The system comes first.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 6. OUR PHILOSOPHY ================= --}}
    @php
        $philosophy = [
            ['t' => 'Concepts', 'd' => 'Understand before memorising.', 'i' => 'icon-open-book'],
            ['t' => 'Practice', 'd' => 'Turn understanding into ability.', 'i' => 'icon-copy-writing'],
            ['t' => 'Testing', 'd' => 'Measure actual preparation.', 'i' => 'icon-files'],
            ['t' => 'Analysis', 'd' => 'Understand why marks were lost.', 'i' => 'icon-ranking'],
            ['t' => 'Improvement', 'd' => 'Work specifically on weaknesses.', 'i' => 'icon-batch-assign'],
            ['t' => 'Consistency', 'd' => 'Repeat the process until performance improves.', 'i' => 'icon-medal'],
        ];
    @endphp
    <section class="offer-one section-space">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="offer-one__image">
                        <img src="{{ $img('fp-teacher-teaching.webp', 'assets/images/resources/offer-1-1.jpg') }}"
                            alt="Concept-first learning at SG Education" class="offer-one__image__one">
                        <img src="{{ $img('fp-group-study.webp', 'assets/images/resources/offer-1-2.jpg') }}" alt=""
                            class="offer-one__image__two">
                        <img src="{{ asset('assets/images/shapes/offer-shape-1-1.png') }}" alt=""
                            class="offer-one__image__shape">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-one__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">our philosophy</h6>
                            <h3 class="sec-title__title"><span class="sec-title__title__shape">Don't Just Chase
                                    Marks.</span> Build the <span class="sec-title__title__text">Ability Behind Them.</span>
                            </h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">Marks and ranks matter, but they are
                            outcomes. Behind strong academic performance are abilities that students develop over time.</p>

                        @include('partials.sg-chain', ['live' => true])

                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">A test isn't the end of preparation. It's
                            the beginning of the next improvement cycle.</p>

                        <a href="{{ url('/our-methodology') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms">
                            <span>Explore Our Methodology</span>
                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                        class="icon-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="sg-way__grid">
                @foreach ($philosophy as $ph)
                    <article class="sg-way-step {{ $loop->last ? 'sg-way-step--last' : '' }} wow fadeInUp"
                        data-wow-duration="1200ms" data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="sg-way-step__head">
                            <span class="sg-way-step__icon"><i class="{{ $ph['i'] }}" aria-hidden="true"></i></span>
                            <span class="sg-way-step__index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <h4 class="sg-way-step__title">{{ $ph['t'] }}</h4>
                        <p class="sg-way-step__text">{{ $ph['d'] }}</p>
                        <div class="sg-way-step__go">
                            {{ $loop->last ? 'Repeat' : 'Next' }}
                            <i class="{{ $loop->last ? 'fas fa-redo-alt' : 'fas fa-arrow-right' }}" aria-hidden="true"></i>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="offer-one__shape-box"></div>
    </section>

    {{-- ================= 7a. WHERE WE ARE GOING ================= --}}
    @php
        $path = [
            ['t' => 'School Education', 'i' => 'icon-open-book'],
            ['t' => 'Foundation', 'i' => 'icon-batch-assign'],
            ['t' => '11th – 12th Science', 'i' => 'icon-graduation'],
            ['t' => 'JEE / NEET / CET / NDA', 'i' => 'icon-ranking'],
            ['t' => 'Career & Higher Education', 'i' => 'icon-medal'],
        ];
    @endphp
    <section class="sg-path sg-path--tinted">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">where we are going</h6>
                <h3 class="sec-title__title">From Coaching Institute to <span
                        class="sec-title__title__text">Educational</span> <span
                        class="sec-title__title__shape">Institution</span></h3>
            </div>
            <ol class="sg-path__list" style="--cols: 5;">
                @foreach ($path as $step)
                    <li class="sg-path__item wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 120 }}ms">
                        <span class="sg-path__dot"><i class="{{ $step['i'] }}" aria-hidden="true"></i></span>
                        <div>
                            <span class="sg-path__grade">Stage {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <h4 class="sg-path__label">{{ $step['t'] }}</h4>
                        </div>
                    </li>
                @endforeach
            </ol>
            <p class="sg-callout sg-callout--center wow fadeInUp" data-wow-duration="1500ms">
                <i class="icon-right-up" aria-hidden="true"></i>
                Our ambition isn't simply to build a bigger coaching centre. It is to contribute to a stronger educational
                ecosystem in Kalyan.
            </p>
        </div>
    </section>

    {{-- ================= 7b. WHAT MAKES SG DIFFERENT ================= --}}
    @php
        $different = [
            ['q' => 'Structured Academic Planning', 'a' => 'Students follow a defined roadmap rather than studying randomly.'],
            ['q' => 'Regular Assessment', 'a' => 'Preparation is measured throughout the academic journey.'],
            ['q' => 'Performance Analysis', 'a' => 'Marks are only the starting point. We examine why a student performed the way they did.'],
            ['q' => 'Targeted Improvement', 'a' => 'Weak areas become specific improvement targets.'],
            ['q' => 'Small-Batch Attention', 'a' => 'A focused learning environment allows students to receive meaningful academic attention.'],
            ['q' => 'Competitive Preparation', 'a' => 'JEE and NEET require a level of depth, practice and testing beyond conventional classroom preparation.'],
        ];
    @endphp
    <section class="faq-one section-space">
        <div class="container">
            <div class="row gutter-y-50 align-items-start">
                <div class="col-lg-5">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">what makes SG different?</h6>
                        <h3 class="sec-title__title">A Better <span class="sec-title__title__text">Academic</span> <span
                                class="sec-title__title__shape">Process</span></h3>
                    </div>
                    <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">We don't differentiate SG with generic
                        claims like "best faculty" or "guaranteed success". Instead, our focus is on building a better
                        academic process, one that students can follow, parents can see and teachers can improve.</p>
                    <ul class="sg-focus sg-focus--1col">
                        @foreach (['A defined roadmap, not random study', 'Every test followed by analysis', 'Weak areas turned into targets'] as $item)
                            <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ url('/our-methodology') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms">
                        <span>See Our Methodology</span>
                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                    class="icon-right-arrow"></i></span></span>
                    </a>
                </div>
                <div class="col-lg-7">
                    @include('partials.sg-accordion', ['items' => $different])
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 8. ACADEMIC ECOSYSTEM ================= --}}
    @php
        $ecosystem = [
            ['t' => 'Academic Programs', 'd' => '9th–10th, 11th–12th Science, JEE, NEET, MHT-CET, NDA & Foundation', 'i' => 'icon-open-book'],
            ['t' => 'Testing & Assessment', 'd' => 'Chapter tests, cumulative tests, PYQs and mock examinations', 'i' => 'icon-files'],
            ['t' => 'Career Guidance', 'd' => 'Understanding academic and career pathways', 'i' => 'icon-graduation'],
            ['t' => 'Seminars & Workshops', 'd' => 'Exposure to examinations, careers and opportunities', 'i' => 'icon-live-streaming'],
            ['t' => 'Student Development', 'd' => 'Confidence, discipline and problem-solving ability', 'i' => 'icon-students'],
            ['t' => 'Performance Tracking', 'd' => 'Using performance data to find areas for improvement', 'i' => 'icon-ranking'],
        ];
    @endphp
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our academic ecosystem</h6>
                <h3 class="sec-title__title">More Than <span class="sec-title__title__text">Classroom</span> <span
                        class="sec-title__title__shape">Teaching</span></h3>
            </div>
            <div class="sg-dims__grid" style="margin-top: 50px;">
                @foreach ($ecosystem as $e)
                    <div class="sg-dims__card wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="sg-dims__icon"><i class="{{ $e['i'] }}" aria-hidden="true"></i></div>
                        <div>
                            <h4 class="sg-dims__title">{{ $e['t'] }}</h4>
                            <p class="sg-dims__q">{{ $e['d'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="course-category__shape-one"></div>
        <div class="course-category__shape-two"></div>
    </section>

    {{-- ================= 9. MESSAGE FROM THE FOUNDER ================= --}}
    <section class="course-instructor-details section-space" id="founder">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">a message from the founder</h6>
                <h3 class="sec-title__title">The Dream Is <span class="sec-title__title__shape">Bigger Than</span> <span
                        class="sec-title__title__text">a Rank.</span></h3>
            </div>
            <div class="course-instructor-details__inner">
                <div class="course-instructor-details__image">
                    <img src="{{ $img('founder-latesh-ghavat.webp', 'assets/images/courses/course-d-instructor-1-9.jpg') }}"
                        alt="Latesh Ghavat, Founder, SG Education">
                </div>
                <div class="course-instructor-details__info">
                    <h3 class="course-instructor-details__name">Latesh Ghavat</h3>
                    <p class="course-instructor-details__designation">Founder, SG Education</p>
                    <p class="sg-lede">"I started SG Education with a belief that students from Kalyan should not have to
                        lower their ambitions because of where they live. My dream is to see a student from Kalyan achieve
                        AIR 1.</p>
                    <p class="sg-lede">But that dream is not really about one rank. It is about creating an environment
                        where a student can believe that the highest level is within their reach, and then giving them the
                        system, guidance and discipline required to pursue it.</p>
                    <p class="sg-lede">The journey will be difficult. There will be failures, setbacks and difficult
                        examinations. Our responsibility is to help students learn from them, improve and keep moving
                        forward. <strong>The dream starts in Kalyan."</strong></p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 10. RESULTS ================= --}}
    @include('partials.results')

    {{-- ================= 11. CTA ================= --}}
    <section class="sg-cta-repo">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-graduation" aria-hidden="true"></i> Start Your Journey</span>
                    <h2 class="sg-cta__title">Have a Bigger Dream?<br>Let's Build the Right Path to It.</h2>
                    <p class="sg-cta__text">Book a free academic counselling session. We'll understand your child's class,
                        goals and current level, and suggest the right program.</p>
                </div>
                <div class="sg-cta__actions">
                    <a href="{{ url('/contact') }}" class="sg-cta__btn sg-cta__btn--primary">
                        <span>Book Academic Counselling</span>
                        <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                    </a>
                    <a href="{{ url('/results') }}" class="sg-cta__btn sg-cta__btn--glass">
                        <span>View Our Results</span>
                        <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection