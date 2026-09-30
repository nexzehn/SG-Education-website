{{--
============================================================================
resources/views/methodology.blade.php → /our-methodology
SG Education — Our Methodology. Content from Website.docx, UI = Eduhive
sections + shared "sg-" components from public/assets/css/sg-custom.css.
============================================================================
--}}
@extends('layouts.main')

@section('title', 'Our Methodology | SG Academic Excellence System | SG Education Kalyan')

@section('meta')
    <meta name="description"
        content="The SG Academic Excellence System: Learn, Practise, Test, Analyse, Improve, Excel. How SG Education, Kalyan uses regular testing, performance analysis, mentorship and parent communication to help students improve.">
    <meta name="keywords"
        content="SG Education methodology, SG Academic Excellence System, coaching methodology Kalyan, regular tests performance analysis, JEE NEET preparation method, Kalyan coaching classes">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Our Methodology | The SG Academic Excellence System">
    <meta property="og:description"
        content="Learn → Practise → Test → Analyse → Improve → Excel. A better way to learn, a smarter way to improve.">
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
        $video = config('sg.video');
        $whatsapp = 'https://wa.me/91' . config('sg.whatsapp') . '?text=' . rawurlencode('Hi, I want to book an academic counselling session at SG Education.');
        $img = function (string $file, string $stock) {
            $p = config('sg.img_dir', 'assets/images/sg') . '/' . $file;
            return asset(file_exists(public_path($p)) ? $p : $stock);
        };
        $cycle = ['Learn', 'Practise', 'Test', 'Analyse', 'Improve', 'Excel'];

        // The 6 steps — used by the overview cards AND the detailed timeline
        $steps = [
            [
                'no' => '01', 'name' => 'Learn', 'icon' => 'icon-open-book',
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
                'no' => '02', 'name' => 'Practise', 'icon' => 'icon-copy-writing',
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
                'no' => '03', 'name' => 'Test', 'icon' => 'icon-files',
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
                'no' => '04', 'name' => 'Analyse', 'icon' => 'icon-ranking',
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
                'no' => '05', 'name' => 'Improve', 'icon' => 'icon-batch-assign',
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
                'no' => '06', 'name' => 'Excel', 'icon' => 'icon-medal',
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
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
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
        <div class="about-one__bg" style="background-image: url({{ asset('assets/images/shapes/about-bg-1-1.png') }})">
        </div>
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-one__image">
                        <div class="about-one__image__one">
                            <img src="{{ $img('classroom-senior.webp', 'assets/images/about/about-1-1.jpg') }}"
                                alt="The SG Academic Excellence System in class" />
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
                            <h6 class="sec-title__tagline">the SG academic excellence system</h6>
                            <h3 class="sec-title__title">A Better Way to Learn. <br>A <span
                                    class="sec-title__title__shape">Smarter Way</span> to <span
                                    class="sec-title__title__text">Improve.</span></h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">At SG Education, we believe academic
                            success is not the result of one factor. It is the outcome of <strong>strong concepts,
                                deliberate practice, regular testing, honest analysis and continuous improvement.</strong>
                            Our methodology takes students through this complete academic cycle.</p>

                        @include('partials.sg-chain', ['steps' => $cycle, 'live' => true, 'endIcon' => 'icon-medal'])

                        <ul class="sg-focus">
                            @foreach (['Strong Concepts', 'Honest Analysis', 'Continuous Improvement'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="wow fadeInUp" data-wow-duration="1500ms" style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <a href="{{ url('/courses') }}" class="eduhive-btn">
                                <span>Explore Our Programs</span>
                                <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                            class="icon-right-arrow"></i></span></span>
                            </a>
                            <a href="{{ url('/contact') }}" class="eduhive-btn eduhive-btn--border">
                                <span>Book Academic Counselling</span>
                                <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                            class="icon-right-arrow"></i></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 3. SYLLABUS ≠ PREPARATION ================= --}}
    <section class="about-two section-space">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ $img('fp-student-thinking.webp', 'assets/images/about/about-2-1.jpg') }}"
                            alt="Student preparing for exams" class="about-two__image__one">
                        <img src="{{ $img('fp-exam-hall.webp', 'assets/images/about/about-2-2.jpg') }}" alt=""
                            class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt=""
                            class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">why a methodology?</h6>
                            <h3 class="sec-title__title">Completing the Syllabus <span class="sec-title__title__shape">Is
                                    Not the Same as</span> <span class="sec-title__title__text">Preparing a Student.</span>
                            </h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">A chapter can be completed. A notebook
                            can be full. A test can be conducted. And yet, a student may still struggle in the examination,
                            because academic performance depends on more than content coverage. Students need to know:</p>

                        <ul class="sg-focus">
                            @foreach (['What to learn', 'How to practise', 'Whether they can apply it', 'Where they are making mistakes', 'Why they are making those mistakes', 'What they need to improve next'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="sg-box wow fadeInUp" data-wow-duration="1500ms">
                            <p class="sg-box__label">We don't just teach chapters. We build academic capability:</p>
                            @include('partials.sg-chain', ['steps' => ['Understanding', 'Thinking', 'Applying', 'Solving', 'Analysing', 'Improving'], 'endIcon' => null])
                            <p class="sg-box__note">This ability becomes increasingly important as students move from school
                                examinations to competitive examinations.</p>
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
                <h3 class="sec-title__title">Six Steps. <span class="sec-title__title__text">One</span> <span
                        class="sec-title__title__shape">Continuous Cycle.</span></h3>
            </div>
            <div class="sg-way__grid">
                @foreach ($steps as $step)
                    <article class="sg-way-step {{ $loop->last ? 'sg-way-step--last' : '' }} wow fadeInUp"
                        data-wow-duration="1200ms" data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="sg-way-step__head">
                            <span class="sg-way-step__icon"><i class="{{ $step['icon'] }}" aria-hidden="true"></i></span>
                            <span class="sg-way-step__index">{{ $step['no'] }}</span>
                        </div>
                        <h4 class="sg-way-step__title">{{ $step['name'] }}</h4>
                        <p class="sg-way-step__text">{{ $step['headline'] }}</p>
                        <div class="sg-way-step__go">
                            {{ $loop->last ? 'Repeat' : 'Next' }}
                            <i class="{{ $loop->last ? 'fas fa-redo-alt' : 'fas fa-arrow-right' }}" aria-hidden="true"></i>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="course-category__shape-one"></div>
        <div class="course-category__shape-two"></div>
    </section>

    {{-- ================= 5. THE 6 STEPS — DETAIL ================= --}}
    <section class="sg-timeline section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">step by step</h6>
                <h3 class="sec-title__title">Inside <span class="sec-title__title__text">Each</span> <span
                        class="sec-title__title__shape">Step</span></h3>
            </div>

            <div class="sg-timeline__track">
                @foreach ($steps as $step)
                    <article class="sg-timeline__item wow fadeInUp" data-wow-duration="1200ms">
                        <span class="sg-timeline__node"><i class="{{ $step['icon'] }}" aria-hidden="true"></i></span>
                        <div class="sg-timeline__panel">
                            <div class="sg-timeline__head">
                                <span class="sg-timeline__no">STEP {{ $step['no'] }}</span>
                                <h3 class="sg-timeline__name">{{ $step['name'] }}</h3>
                                <p class="sg-timeline__headline">{{ $step['headline'] }}</p>
                            </div>
                            @foreach ($step['intro'] as $para)
                                <p class="sg-timeline__text">{{ $para }}</p>
                            @endforeach
                            <h4 class="sg-timeline__subtitle">{{ $step['list_title'] }}</h4>
                            <ul class="sg-checks">
                                @foreach ($step['list'] as $item)
                                    <li><i class="icon-check-2" aria-hidden="true"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                            <p class="sg-timeline__close">{{ $step['close_label'] }} <strong>{{ $step['close'] }}</strong></p>
                        </div>
                    </article>
                @endforeach

                <div class="sg-timeline__loop wow fadeInUp" data-wow-duration="1200ms">
                    <span class="sg-timeline__loop-icon"><i class="fas fa-redo-alt" aria-hidden="true"></i></span>
                    <p>Every test starts the next cycle. <strong>Back to Step 01.</strong></p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 6. MID CTA ================= --}}
    <section class="sg-cta-repo sg-cta-repo--mid">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-ranking" aria-hidden="true"></i> The Cycle</span>
                    <h2 class="sg-cta__title">Every Test Starts the Next Cycle.</h2>
                    <p class="sg-cta__text">Improvement is a process, not an event. See how the system works for your
                        child's current level.</p>
                </div>
                <div class="sg-cta__actions">
                    <a href="{{ url('/contact') }}" class="sg-cta__btn sg-cta__btn--primary">
                        <span>Book Academic Counselling</span>
                        <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 7. DIFFERENT STUDENTS, DIFFERENT GAPS ================= --}}
    @php
        $dimensions = [
            ['t' => 'Conceptual Understanding', 'd' => 'Does the student truly understand the underlying ideas?', 'i' => 'icon-open-book'],
            ['t' => 'Problem Solving', 'd' => 'Can they apply concepts to unfamiliar questions?', 'i' => 'icon-copy-writing'],
            ['t' => 'Accuracy', 'd' => 'How many marks are lost to avoidable errors?', 'i' => 'icon-check-2'],
            ['t' => 'Speed', 'd' => 'Can they finish the paper within the time limit?', 'i' => 'icon-clock'],
            ['t' => 'Consistency', 'd' => 'Is preparation regular, week after week?', 'i' => 'icon-batch-assign'],
            ['t' => 'Test Performance', 'd' => 'How do scores move across chapter, unit and mock tests?', 'i' => 'icon-ranking'],
        ];
    @endphp
    <section class="section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">beyond marks</h6>
                <h3 class="sec-title__title"><span class="sec-title__title__shape">One Classroom.</span> Different Students.
                    <span class="sec-title__title__text">Different Gaps.</span>
                </h3>
            </div>
            <p class="sg-lede sg-dims__intro wow fadeInUp" data-wow-duration="1500ms">Not every student struggles for
                the same reason. One may need more conceptual support, another more practice, another more speed,
                another more consistency. That's why we look at every student through six dimensions, so support
                becomes targeted.</p>
            <div class="sg-dims__grid">
                @foreach ($dimensions as $dm)
                    <div class="sg-dims__card wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="sg-dims__icon"><i class="{{ $dm['i'] }}" aria-hidden="true"></i></div>
                        <div>
                            <h4 class="sg-dims__title">{{ $dm['t'] }}</h4>
                            <p class="sg-dims__q">{{ $dm['d'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= 8. FOCUSED BATCHES ================= --}}
    <section class="about-two section-space">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ $img('classroom-junior.webp', 'assets/images/about/about-2-1.jpg') }}"
                            alt="Focused batch at SG Education" class="about-two__image__one">
                        <img src="{{ $img('fp-teacher-teaching.webp', 'assets/images/about/about-2-2.jpg') }}" alt=""
                            class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt=""
                            class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                        <div class="sg-batches__badge wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                            <span class="sg-batches__badge-icon"><i class="icon-multiple-users" aria-hidden="true"></i></span>
                            <div>
                                <strong>Small Batches</strong>
                                <small>Every student is visible</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">focused batches</h6>
                            <h3 class="sec-title__title">Focused Batches. <span class="sec-title__title__shape">Better
                                    Academic</span> <span class="sec-title__title__text">Interaction.</span></h3>
                        </div>
                        <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">Our focused batch structure is designed
                            to create an environment where students can:</p>
                        <ul class="sg-focus">
                            @foreach (['Ask questions', 'Participate actively', 'Receive classroom attention', 'Discuss difficult problems', 'Interact with faculty', 'Receive academic guidance'] as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                        <p class="sg-callout wow fadeInUp" data-wow-duration="1500ms">
                            <i class="icon-multiple-users" aria-hidden="true"></i>
                            The principle is simple: students shouldn't feel invisible in the classroom.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 9. PARENTS + MENTORSHIP ================= --}}
    @php
        $parentView = [
            ['t' => 'Progress', 'd' => 'Is the student improving?', 'i' => 'icon-ranking'],
            ['t' => 'Strengths & Weaknesses', 'd' => 'What needs attention?', 'i' => 'icon-files'],
            ['t' => 'Consistency', 'd' => 'Is preparation regular?', 'i' => 'icon-batch-assign'],
            ['t' => 'Next Steps', 'd' => 'What to focus on now?', 'i' => 'icon-right-up'],
        ];
        // Questions from docx; answers describe the mentorship approach (review with SG team)
        $mentor = [
            ['q' => 'Am I studying correctly?', 'a' => 'Mentors review how a student studies, not just what they study, and help build a structured routine for learning, practice and revision.'],
            ['q' => 'Why aren\'t my marks improving?', 'a' => 'Test analysis shows whether marks are lost to concept gaps, application gaps, careless errors or time pressure, so effort goes where it matters.'],
            ['q' => 'Which subject needs more attention?', 'a' => 'Subject-wise and chapter-wise performance helps decide where extra practice and doubt-solving time should go.'],
            ['q' => 'How should I revise?', 'a' => 'Students get guidance on revision cycles, retesting weak chapters and using past papers and mock tests effectively.'],
            ['q' => 'How should I manage school and competitive preparation?', 'a' => 'Mentors help students plan their week so board preparation and JEE / NEET / MHT-CET preparation support each other instead of competing.'],
        ];
    @endphp
    <section class="faq-one section-space">
        <div class="container">
            <div class="row gutter-y-50 align-items-start">
                <div class="col-lg-6">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">for parents</h6>
                        <h3 class="sec-title__title">Parents Should See the <span
                                class="sec-title__title__text">Journey,</span> Not Just the Result.</h3>
                    </div>
                    <p class="sg-lede wow fadeInUp" data-wow-duration="1500ms">A parent shouldn't have to wait for the
                        final examination to discover that a student has been struggling. Meaningful academic communication
                        helps parents understand:</p>
                    <div class="sg-parents__list">
                        @foreach ($parentView as $pv)
                            <div class="sg-parents__row wow fadeInUp" data-wow-duration="1200ms"
                                data-wow-delay="{{ $loop->index * 80 }}ms">
                                <span class="sg-parents__num" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="sg-parents__icon"><i class="{{ $pv['i'] }}" aria-hidden="true"></i></span>
                                <div>
                                    <h4 class="sg-parents__title">{{ $pv['t'] }}</h4>
                                    <p class="sg-parents__q">{{ $pv['d'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="sg-callout wow fadeInUp" data-wow-duration="1500ms">
                        <i class="icon-instructors" aria-hidden="true"></i>
                        This visibility comes from the same mentorship that guides students every week.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">mentorship</h6>
                        <h3 class="sec-title__title">Teaching Happens in the Classroom. <span
                                class="sec-title__title__shape">Mentorship</span> <span class="sec-title__title__text">Goes
                                Beyond It.</span></h3>
                    </div>
                    @include('partials.sg-accordion', ['items' => $mentor])
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 10. DIFFERENT STAGES, DIFFERENT FOCUS ================= --}}
    @php
        $stageFocus = [
            ['cat' => 'Grade 9', 'title' => 'Build the Foundation', 'focus' => 'Concepts • Habits • Fundamentals • Problem Solving', 'url' => '/courses/boards', 'img' => $img('classroom-junior.webp', 'assets/images/courses/course-1-1.jpg')],
            ['cat' => 'Grade 10', 'title' => 'Master the Board Preparation', 'focus' => 'Syllabus • Practice • Revision • Testing • Examination Strategy', 'url' => '/courses/boards', 'img' => $img('fp-exam-hall.webp', 'assets/images/courses/course-1-2.jpg')],
            ['cat' => 'Grade 11', 'title' => 'Build the Competitive Foundation', 'focus' => 'Deep Concepts • Problem Solving • Consistency • Competitive Thinking', 'url' => '/courses', 'img' => $img('classroom-senior.webp', 'assets/images/courses/course-1-3.jpg')],
            ['cat' => 'Grade 12', 'title' => 'Strengthen. Revise. Perform.', 'focus' => 'Advanced Practice • Revision • Testing • Exam Strategy', 'url' => '/courses', 'img' => $img('fp-science-lab.webp', 'assets/images/courses/course-1-4.jpg')],
            ['cat' => 'JEE / NEET / CET', 'title' => 'Prepare to Perform Under Pressure', 'focus' => 'Concepts • Application • MCQs / Problems • Speed • Accuracy • Mock Tests • Analysis', 'url' => '/courses', 'img' => $img('fp-student-self-study.webp', 'assets/images/courses/course-1-5.jpg')],
        ];
    @endphp
    <section class="courses-four section-space2">
        <div class="container">
            <div class="courses-four__top">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">stage-wise focus</h6>
                            <h3 class="sec-title__title"><span>Different</span> <span
                                    class="sec-title__title__shape">Stages.</span> <span>Different</span> <span
                                    class="sec-title__title__text">Focus.</span></h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="courses-four__custome-navs"></div>
                    </div>
                </div>
            </div>
            <div class="courses-four__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{"items": 1, "margin": 10, "loop": true, "smartSpeed": 700, "nav": false, "dots": false, "navContainer": ".courses-four__custome-navs", "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"], "autoplay": true, "responsive": {"0": {"items": 1, "nav": true, "margin": 10}, "768": {"items": 2, "margin": 30}, "992": {"items": 3, "margin": 30}}}'>
                @foreach ($stageFocus as $sf)
                    <div class="item">
                        <div class="course-card">
                            <div class="course-card__image">
                                <img src="{{ $sf['img'] }}" alt="{{ $sf['cat'] }}: {{ $sf['title'] }}" loading="lazy">
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
                            <div class="course-card__hover"
                                style="background-image: url({{ asset('assets/images/shapes/course-card-bg-1-1.png') }});">
                                <div class="course-card__hover__content">
                                    <div class="course-card__content__top course-card__content__top--hover">
                                        <div class="course-card__category">{{ $sf['cat'] }}</div>
                                    </div>
                                    <h3 class="course-card__title course-card__title--hover"><a
                                            href="{{ url($sf['url']) }}">{{ $sf['title'] }}</a></h3>
                                    <p class="course-card__text">Focus on: {{ $sf['focus'] }}</p>
                                    <a href="{{ url($sf['url']) }}" class="course-card__btn eduhive-btn eduhive-btn--border">
                                        <span>view Courses</span>
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
    </section>

    {{-- ================= 11. WHAT MAKES OUR APPROACH DIFFERENT ================= --}}
    <section class="online-class section-space-bottom">
        <div class="online-class__inner">
            <div class="online-class__inner__bg"
                style="background-image: url({{ asset('assets/images/shapes/online-class-bg-1-1.png') }});"></div>
        </div>
        <div class="container">
            <div class="video-one wow fadeInUp" data-wow-duration="1500ms">
                <div class="video-one__bg"
                    style="background-image: url({{ $img('classroom-senior.webp', 'assets/images/resources/video-1-1.jpg') }});">
                    <!-- <img src="{{ $img('fp-group-study.webp', 'assets/images/resources/video-1-2.jpg') }}"
                        alt="Students discussing problems at SG Education">
                    <a href="{{ $video }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
                        <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                    </a> -->
                </div>
            </div>
            <div class="online-class__content">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h6 class="sec-title__tagline">what makes our approach different?</h6>
                    <h3 class="sec-title__title"><span>We Make</span> <span class="sec-title__title__shape">the Academic
                            Process</span> <span class="sec-title__title__text">Visible.</span></h3>
                </div>
                <div class="online-class__description wow fadeInUp" data-wow-duration="1500ms">
                    <p class="online-class__text">Not "we teach better than everyone else." Instead: students know what
                        they're learning. They practise it, test it, analyse mistakes, work on weaknesses and test again.
                        Parents can understand the journey. Teachers can identify gaps. <strong>That creates accountability
                            at every stage.</strong></p>
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
    @php
        $commit = [
            ['t' => 'Clear Concepts', 'i' => 'icon-open-book'],
            ['t' => 'Structured Preparation', 'i' => 'icon-copy-writing'],
            ['t' => 'Regular Assessment', 'i' => 'icon-files'],
            ['t' => 'Meaningful Feedback', 'i' => 'icon-ranking'],
            ['t' => 'Academic Guidance', 'i' => 'icon-instructors'],
            ['t' => 'Continuous Opportunities to Improve', 'i' => 'icon-medal'],
        ];
    @endphp
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our commitment</h6>
                <h3 class="sec-title__title">What Every <span class="sec-title__title__text">Student</span> <span
                        class="sec-title__title__shape">Receives</span></h3>
            </div>
            <ul class="sg-feature-grid sg-feature-grid--3">
                @foreach ($commit as $c)
                    <li class="sg-feature-card wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <i class="{{ $c['i'] }}" aria-hidden="true"></i>
                        <span>{{ $c['t'] }}</span>
                    </li>
                @endforeach
            </ul>
            <p class="sg-callout sg-callout--center wow fadeInUp" data-wow-duration="1500ms">
                <i class="icon-check-2" aria-hidden="true"></i>
                We cannot promise every student the same result. We can build a system that gives every student a better
                opportunity to improve.
            </p>
        </div>
        <div class="course-category__shape-one"></div>
        <div class="course-category__shape-two"></div>
    </section>

    {{-- ================= 13. FINAL CTA ================= --}}
    <section class="sg-cta-repo">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-graduation" aria-hidden="true"></i> Admissions Open</span>
                    <h2 class="sg-cta__title">Ready to Experience the<br>SG Academic System?</h2>
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