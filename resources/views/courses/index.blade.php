{{--
============================================================================
resources/views/courses/index.blade.php  →  /courses  (All Programs)
Data = config/programs.php (same file as the program pages — add a program
there and it appears here automatically).
Vars from ProgramController@index: $programs, $images

Shared pieces (public/assets/css/sg-custom.css + sg-custom.js):
  bullets .sg-focus · callout .sg-callout · CTA .sg-cta__*
============================================================================
--}}
@extends('layouts.main')

@php
    // Journey order: school → 11/12 → entrance → defence. Unknown slugs go to the end.
    $order = ['foundation', 'boards', 'science', 'jee', 'neet', 'mht-cet', 'nda'];
    $programs = collect($programs)
        ->sortBy(fn($p, $slug) => ($i = array_search($slug, $order, true)) === false ? 99 : $i)
        ->all();

    // Filter groups (slug → stage). New program without a stage → shows under "All" only.
    $stageOf = [
        'foundation' => 'school', 'boards' => 'school',
        'science' => 'science',
        'jee' => 'entrance', 'neet' => 'entrance', 'mht-cet' => 'entrance',
        'nda' => 'defence',
    ];
    $stages = [
        'school'   => ['label' => 'Class 8–10',      'icon' => 'icon-open-book'],
        'science'  => ['label' => '11th–12th Science', 'icon' => 'fas fa-flask'],
        'entrance' => ['label' => 'Entrance Exams',  'icon' => 'icon-ranking'],
        'defence'  => ['label' => 'Defence (NDA)',   'icon' => 'fas fa-shield-alt'],
    ];
    $stageCount = collect($programs)->keys()->countBy(fn($s) => $stageOf[$s] ?? 'other')->all();

    $iconOf = [
        'foundation' => 'icon-open-book', 'boards' => 'icon-files', 'science' => 'fas fa-flask',
        'jee' => 'icon-ranking', 'neet' => 'fas fa-stethoscope', 'mht-cet' => 'icon-medal',
        'nda' => 'fas fa-shield-alt',
    ];

    $fallbackImg = 'assets/images/sg/classroom-senior.webp';
    $imgOf = fn($slug, $p) => $images[$slug]
        ?? (!empty($p['image']) && file_exists(public_path($p['image'])) ? $p['image'] : $fallbackImg);

    $has = fn($slug) => isset($programs[$slug]);
    $ask = 'Ask us';

    // "Which program fits?" — only links to programs that exist in config
    $guide = [
        ['who' => 'In Class 8',                   'icon' => 'icon-open-book',     'go' => ['foundation']],
        ['who' => 'In Class 9 or 10',             'icon' => 'icon-files',         'go' => ['boards', 'foundation']],
        ['who' => 'In Class 11 or 12 Science',    'icon' => 'fas fa-flask',       'go' => ['science']],
        ['who' => 'Aiming for Engineering',       'icon' => 'icon-ranking',       'go' => ['jee', 'mht-cet']],
        ['who' => 'Aiming for Medical',           'icon' => 'fas fa-stethoscope', 'go' => ['neet', 'mht-cet']],
        ['who' => 'Aiming for Defence',           'icon' => 'fas fa-shield-alt',  'go' => ['nda']],
    ];

    $features = config('programs._common_features', []);
    $phoneUrl = 'tel:+91' . (config('sg.phones')[0] ?? '8591932112');
    $whatsapp = 'https://wa.me/91' . config('sg.whatsapp', '8591932112') . '?text='
        . rawurlencode('Hi SG Education, I would like help choosing the right program.');

    $metaTitle = 'Courses in Kalyan | JEE, NEET, MHT-CET, Boards, NDA | SG Education';
    $metaDesc = 'All SG Education programs in Khadakpada, Kalyan: Foundation, Class 9–10 Boards, 11th–12th Science, Mission IIT (JEE), Mission NEET, MHT-CET and NDA.';
    $heroImg = 'assets/images/sg/classroom-senior.webp';
@endphp

@section('title', $metaTitle)

@section('meta')
    <meta name="description" content="{{ $metaDesc }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:image" content="{{ asset($heroImg) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDesc }}">
    <meta name="twitter:image" content="{{ asset($heroImg) }}">
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'SG Education Programs',
            'itemListElement' => collect($programs)->values()->map(fn($p, $i) => [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'item' => [
                    '@type' => 'Course',
                    'name' => $p['name'],
                    'description' => $p['meta_desc'] ?? $p['tagline'],
                    'url' => url('/courses/' . array_keys($programs)[$i]),
                    'provider' => ['@type' => 'EducationalOrganization', 'name' => 'SG Education', 'sameAs' => url('/')],
                ],
            ])->all(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection

@section('styles')
    <style>
        /* ================= Intro ================= */
        .sg-pl-intro {
            max-width: 760px;
            margin: 0 auto 10px;
            text-align: center;
        }

        .sg-pl-intro p {
            margin: 18px 0 0;
            font-size: 17px;
            line-height: 1.7;
            color: var(--sg-muted);
        }

        /* ================= Filter ================= */
        .sg-pl-filter {
            /* position: sticky;
            top: 100px; */
            z-index: 20;
            margin: 36px 0 34px;
            padding: 10px 0;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: saturate(1.4) blur(10px);
            -webkit-backdrop-filter: saturate(1.4) blur(10px);
        }

        .sg-pl-filter__track {
            display: flex;
            justify-content: center;
            gap: 8px;
            overflow-x: auto;
            padding: 4px 2px;
            scrollbar-width: none;
        }

        .sg-pl-filter__track::-webkit-scrollbar {
            display: none;
        }

        .sg-pl-filter__btn {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid var(--sg-line);
            border-radius: 50px;
            background: #fff;
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-base);
            cursor: pointer;
            transition: background .25s ease, color .25s ease, border-color .25s ease;
        }

        .sg-pl-filter__btn i {
            font-size: 14px;
            color: var(--eduhive-primary);
            transition: color .25s ease;
        }

        .sg-pl-filter__btn:hover {
            border-color: rgba(var(--eduhive-primary-rgb), .5);
        }

        .sg-pl-filter__count {
            min-width: 22px;
            padding: 2px 7px;
            border-radius: 50px;
            font-size: 12px;
            text-align: center;
            background: rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-pl-filter__btn[aria-pressed="true"] {
            color: #fff;
            background: var(--eduhive-base);
            border-color: var(--eduhive-base);
        }

        .sg-pl-filter__btn[aria-pressed="true"] i {
            color: #fff;
        }

        .sg-pl-filter__btn[aria-pressed="true"] .sg-pl-filter__count {
            color: #fff;
            background: var(--eduhive-primary);
        }

        /* ================= Program grid ================= */
        .sg-pl-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 30px;
        }

        .sg-pcard {
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
            border-radius: var(--sg-radius);
            background: #fff;
            border: 1px solid var(--sg-line);
            box-shadow: var(--sg-shadow);
            transition: transform .45s var(--sg-ease), box-shadow .45s var(--sg-ease), border-color .3s ease;
        }

        .sg-pcard[hidden] {
            display: none;
        }

        .sg-pcard.is-entering {
            animation: sgPlFade .45s var(--sg-ease);
        }

        @keyframes sgPlFade {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: none; }
        }

        .sg-pcard:hover {
            transform: translateY(-6px);
            box-shadow: var(--sg-shadow-hover);
            border-color: rgba(var(--eduhive-primary-rgb), .35);
        }

        .sg-pcard__media {
            position: relative;
            display: block;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            background: var(--sg-soft);
        }

        .sg-pcard__media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .8s var(--sg-ease);
        }

        .sg-pcard:hover .sg-pcard__media img {
            transform: scale(1.06);
        }

        .sg-pcard__media::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(var(--eduhive-base-rgb), 0) 45%, rgba(var(--eduhive-base-rgb), .55) 100%);
            pointer-events: none;
        }

        .sg-pcard__tag {
            position: absolute;
            left: 16px;
            top: 16px;
            z-index: 1;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: #fff;
            background: var(--eduhive-primary);
        }

        .sg-pcard__icon {
            position: absolute;
            right: 18px;
            bottom: -26px;
            z-index: 2;
            display: grid;
            place-items: center;
            width: 56px;
            height: 56px;
            border-radius: 16px;
            font-size: 24px;
            color: var(--eduhive-primary);
            background: #fff;
            box-shadow: 0 10px 24px -8px rgba(var(--eduhive-base-rgb), .3);
            transition: background .3s ease, color .3s ease;
        }

        .sg-pcard:hover .sg-pcard__icon {
            color: #fff;
            background: var(--eduhive-primary);
        }

        /* Icon sits over the image edge, so the media box must not clip it */
        .sg-pcard__head {
            position: relative;
        }

        .sg-pcard__body {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 30px 26px 26px;
        }

        .sg-pcard__for {
            margin: 0 0 8px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: var(--eduhive-primary);
        }

        .sg-pcard__title {
            margin: 0 0 8px;
            padding-right: 40px;
            font-size: 21px;
            font-weight: 800;
            line-height: 1.3;
        }

        .sg-pcard__title a {
            color: var(--eduhive-base);
            transition: color .25s ease;
        }

        .sg-pcard__title a:hover {
            color: var(--eduhive-primary);
        }

        .sg-pcard__tagline {
            margin: 0 0 18px;
            font-size: 15px;
            line-height: 1.55;
            color: var(--sg-muted);
        }

        .sg-pcard__meta {
            display: grid;
            gap: 10px;
            margin: 0 0 18px;
            padding: 16px 0 0;
            list-style: none;
            border-top: 1px dashed var(--sg-line);
        }

        .sg-pcard__meta li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            line-height: 1.45;
            color: var(--eduhive-base);
        }

        .sg-pcard__meta i {
            flex-shrink: 0;
            width: 18px;
            margin-top: 2px;
            font-size: 15px;
            text-align: center;
            color: var(--eduhive-primary);
        }

        .sg-pcard__meta strong {
            font-weight: 700;
        }

        .sg-pcard__meta .is-ask {
            color: var(--sg-muted);
            font-style: italic;
        }

        .sg-pcard__subjects {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin: 0 0 22px;
            padding: 0;
            list-style: none;
        }

        .sg-pcard__subjects li {
            padding: 5px 11px;
            border-radius: 50px;
            font-size: 12.5px;
            font-weight: 700;
            color: var(--eduhive-base);
            background: var(--sg-tint);
        }

        .sg-pcard__foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: auto;
        }

        .sg-pcard__btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background: var(--eduhive-base);
            transition: background .3s ease, gap .3s ease;
        }

        .sg-pcard__btn:hover {
            gap: 14px;
            color: #fff;
            background: var(--eduhive-primary);
        }

        .sg-pcard__enq {
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-base);
            text-decoration: underline;
            text-decoration-color: rgba(var(--eduhive-primary-rgb), .5);
            text-underline-offset: 4px;
        }

        .sg-pcard__enq:hover {
            color: var(--eduhive-primary);
        }

        .sg-pl-empty {
            padding: 40px 20px;
            text-align: center;
            color: var(--sg-muted);
        }

        /* ================= Which program fits? ================= */
        .sg-fit {
            background: var(--sg-soft);
        }

        .sg-fit__grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .sg-fit__card {
            display: flex;
            gap: 16px;
            padding: 24px;
            border-radius: var(--sg-radius-sm);
            background: #fff;
            border: 1px solid var(--sg-line);
            transition: border-color .3s ease, transform .4s var(--sg-ease);
        }

        .sg-fit__card:hover {
            border-color: var(--eduhive-primary);
            transform: translateY(-4px);
        }

        .sg-fit__icon {
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            font-size: 20px;
            color: var(--eduhive-primary);
            background: var(--sg-tint);
        }

        .sg-fit__who {
            margin: 0 0 10px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: var(--sg-muted);
        }

        .sg-fit__links {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sg-fit__links a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: 800;
            color: var(--eduhive-base);
            transition: color .25s ease, gap .25s ease;
        }

        .sg-fit__links a i {
            font-size: 12px;
            color: var(--eduhive-primary);
        }

        .sg-fit__links a:hover {
            gap: 12px;
            color: var(--eduhive-primary);
        }

        /* ================= Every program includes ================= */
        .sg-incl__media {
            position: relative;
            overflow: hidden;
            border-radius: var(--sg-radius);
            aspect-ratio: 4 / 3;
        }

        .sg-incl__media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sg-incl__badge {
            position: absolute;
            left: 20px;
            bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            max-width: calc(100% - 40px);
            padding: 14px 18px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 10px 30px -10px rgba(var(--eduhive-base-rgb), .35);
            font-size: 14px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--eduhive-base);
        }

        .sg-incl__badge i {
            font-size: 22px;
            color: var(--eduhive-primary);
        }

        /* ================= Responsive ================= */
        @media (max-width: 1199px) {
            .sg-pl-grid,
            .sg-fit__grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 767px) {
            .sg-pl-grid,
            .sg-fit__grid {
                grid-template-columns: 1fr;
            }

            .sg-pl-filter {
                top: 70px;
                margin: 26px 0 24px;
            }

            .sg-pl-filter__track {
                justify-content: flex-start;
            }

            .sg-pcard__body {
                padding: 28px 20px 22px;
            }

            .sg-pcard__foot {
                flex-wrap: wrap;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .sg-pcard,
            .sg-pcard__media img,
            .sg-fit__card {
                transition: none;
            }

            .sg-pcard.is-entering {
                animation: none;
            }

            .sg-pcard:hover,
            .sg-fit__card:hover {
                transform: none;
            }
        }
    </style>
@endsection

@section('content')

    {{-- ================= PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
                    <li><span>Courses</span></li>
                </ul>
                <h1 class="page-header__title">Our Programs</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    {{-- ================= PROGRAMS ================= --}}
    <section class="section-space" id="programs">
        <div class="container">
            <div class="sg-pl-intro">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h6 class="sec-title__tagline">all programs</h6>
                    <h3 class="sec-title__title">One Institute, <span class="sec-title__title__text">Every Stage</span>
                        <span class="sec-title__title__shape">of the Journey</span></h3>
                </div>
                <p class="wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    From Class 8 foundation to JEE, NEET, MHT-CET and NDA preparation — every program at SG Education
                    follows the same system: clear concepts, regular practice, testing and analysis, and close
                    mentorship.
                </p>
            </div>

            {{-- Filter --}}
            <nav class="sg-pl-filter" aria-label="Filter programs by stage">
                <div class="sg-pl-filter__track">
                    <button type="button" class="sg-pl-filter__btn" data-filter="all" aria-pressed="true">
                        All programs <span class="sg-pl-filter__count">{{ count($programs) }}</span>
                    </button>
                    @foreach ($stages as $key => $st)
                        @if (!empty($stageCount[$key]))
                            <button type="button" class="sg-pl-filter__btn" data-filter="{{ $key }}" aria-pressed="false">
                                <i class="{{ $st['icon'] }}" aria-hidden="true"></i>
                                {{ $st['label'] }} <span class="sg-pl-filter__count">{{ $stageCount[$key] }}</span>
                            </button>
                        @endif
                    @endforeach
                </div>
            </nav>

            {{-- Cards --}}
            <div class="sg-pl-grid" id="sg-programs" aria-live="polite">
                @forelse ($programs as $slug => $p)
                    @php
                        $url = url('/courses/' . $slug);
                        $enquire = url('/contact') . '?course=' . ($p['form_course'] ?? $slug) . '#enquiry';
                    @endphp
                    <article class="sg-pcard wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms" data-stage="{{ $stageOf[$slug] ?? 'other' }}">
                        <div class="sg-pcard__head">
                            <a href="{{ $url }}" class="sg-pcard__media" tabindex="-1" aria-hidden="true">
                                <img src="{{ asset($imgOf($slug, $p)) }}" alt="" loading="lazy" decoding="async">
                                <span class="sg-pcard__tag">{{ $p['short'] }}</span>
                            </a>
                            <span class="sg-pcard__icon" aria-hidden="true"><i class="{{ $iconOf[$slug] ?? 'icon-graduation' }}"></i></span>
                        </div>
                        <div class="sg-pcard__body">
                            <p class="sg-pcard__for">{{ $p['for'] }}</p>
                            <h2 class="sg-pcard__title"><a href="{{ $url }}">{{ $p['name'] }}</a></h2>
                            <p class="sg-pcard__tagline">{{ $p['tagline'] }}</p>

                            <ul class="sg-pcard__meta">
                                @if (!empty($p['exam']))
                                    <li><i class="icon-files" aria-hidden="true"></i><span><strong>Prepares for:</strong> {{ $p['exam'] }}</span></li>
                                @endif
                                <li><i class="icon-clock" aria-hidden="true"></i><span><strong>Duration:</strong>
                                        @if (!empty($p['duration']))
                                            {{ $p['duration'] }}
                                        @else
                                            <span class="is-ask">{{ $ask }}</span>
                                        @endif
                                    </span></li>
                                <li><i class="icon-location" aria-hidden="true"></i><span><strong>Mode:</strong> {{ $p['mode'] ?? 'Classroom, Khadakpada, Kalyan' }}</span></li>
                            </ul>

                            @if (!empty($p['subjects']))
                                <ul class="sg-pcard__subjects" aria-label="Subjects">
                                    @foreach ($p['subjects'] as $sub)
                                        <li>{{ $sub }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="sg-pcard__foot">
                                <a href="{{ $url }}" class="sg-pcard__btn">
                                    View program <i class="icon-right-arrow" aria-hidden="true"></i>
                                </a>
                                <a href="{{ $enquire }}" class="sg-pcard__enq">Enquire</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="sg-pl-empty">Programs will be listed here soon. Call us on
                        <a href="{{ $phoneUrl }}">{{ config('sg.phones')[0] ?? '8591932112' }}</a> for details.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ================= WHICH PROGRAM FITS? ================= --}}
    <section class="sg-fit section-space2">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">not sure where to start?</h6>
                <h3 class="sec-title__title">Find the <span class="sec-title__title__text">Right</span>
                    <span class="sec-title__title__shape">Program</span></h3>
            </div>
            <div class="sg-fit__grid">
                @foreach ($guide as $g)
                    @php $links = array_values(array_filter($g['go'], $has)); @endphp
                    @if ($links)
                        <div class="sg-fit__card wow fadeInUp" data-wow-duration="1200ms"
                            data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                            <span class="sg-fit__icon" aria-hidden="true"><i class="{{ $g['icon'] }}"></i></span>
                            <div>
                                <p class="sg-fit__who">{{ $g['who'] }}</p>
                                <div class="sg-fit__links">
                                    @foreach ($links as $s)
                                        <a href="{{ url('/courses/' . $s) }}">{{ $programs[$s]['short'] }}
                                            <i class="icon-right-arrow" aria-hidden="true"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <p class="sg-callout sg-callout--center wow fadeInUp" data-wow-duration="1500ms" style="margin-top: 40px;">
                <i class="icon-instructors" aria-hidden="true"></i>
                Still unsure? Our academic team will help you choose after understanding your student's class, goal
                and current level.
            </p>
        </div>
    </section>

    {{-- ================= EVERY PROGRAM INCLUDES ================= --}}
    @if ($features)
        <section class="section-space2">
            <div class="container">
                <div class="row gutter-y-40 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="sg-incl__media">
                            <img src="{{ asset('assets/images/sg/classroom-junior.webp') }}"
                                alt="Students in a classroom at SG Education, Khadakpada, Kalyan" loading="lazy" decoding="async">
                            <div class="sg-incl__badge">
                                <i class="icon-location" aria-hidden="true"></i>
                                <span>Classroom programs at Khadakpada, Kalyan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">in every program</h6>
                            <h3 class="sec-title__title">The SG <span class="sec-title__title__text">System</span>
                                <span class="sec-title__title__shape">Behind Every Batch</span></h3>
                        </div>
                        <ul class="sg-focus sg-focus--1col">
                            @foreach ($features as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ url('/methodology') }}" class="eduhive-btn eduhive-btn--border">
                            <span>See Our Methodology</span>
                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                        class="icon-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ================= CTA (styles: sg-custom.css §19) ================= --}}
    <section class="sg-cta-repo">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-graduation" aria-hidden="true"></i> Ready to Start?</span>
                    <h2 class="sg-cta__title">Your Goal Deserves a Plan.</h2>
                    <p class="sg-cta__text">Talk to our academic team to understand the right program, preparation
                        pathway and batch structure for your student.</p>
                </div>
                <div class="sg-cta__actions">
                    <a href="{{ url('/contact') }}#enquiry" class="sg-cta__btn sg-cta__btn--primary">
                        <span>Book Academic Counselling</span>
                        <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                    </a>
                    <a href="{{ $whatsapp }}" class="sg-cta__btn sg-cta__btn--wa" target="_blank" rel="noopener">
                        <span>Enquire on WhatsApp</span>
                        <span class="sg-cta__btn-icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        (function () {
            var btns = document.querySelectorAll('.sg-pl-filter__btn');
            var cards = document.querySelectorAll('.sg-pcard');
            if (!btns.length || !cards.length) return;

            var valid = Array.prototype.map.call(btns, function (b) { return b.getAttribute('data-filter'); });

            function apply(filter, animate) {
                if (valid.indexOf(filter) === -1) filter = 'all';

                btns.forEach(function (b) {
                    b.setAttribute('aria-pressed', b.getAttribute('data-filter') === filter ? 'true' : 'false');
                });

                cards.forEach(function (c) {
                    var show = filter === 'all' || c.getAttribute('data-stage') === filter;
                    c.hidden = !show;
                    c.classList.remove('is-entering');
                    if (show && animate) {
                        // WOW may still hold the card invisible — reveal it
                        c.style.visibility = 'visible';
                        c.style.animationName = '';
                        void c.offsetWidth;
                        c.classList.add('is-entering');
                    }
                });
            }

            btns.forEach(function (b) {
                b.addEventListener('click', function () {
                    var f = b.getAttribute('data-filter');
                    apply(f, true);
                    var url = new URL(window.location.href);
                    if (f === 'all') url.searchParams.delete('stage'); else url.searchParams.set('stage', f);
                    history.replaceState(null, '', url);
                    b.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                });
            });

            // /courses?stage=entrance opens pre-filtered
            var start = new URLSearchParams(window.location.search).get('stage');
            if (start) apply(start, false);
        })();
    </script>
@endsection