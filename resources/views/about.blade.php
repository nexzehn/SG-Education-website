{{--
============================================================================
  resources/views/about.blade.php
  SG Education — About page. Content from Website.docx, UI = Eduhive sections.
  Extends layouts/main.blade.php. Canonical lives in the layout.

  DEMO markers (replace before go-live):
    - Section images: Eduhive stock
    - Founder photo: public/assets/images/team/latesh-sir.jpg (fallback = stock)
    - Video link: Eduhive demo YouTube
============================================================================
--}}
@extends('layouts.main')

@section('title', 'About SG Education | The Dream Starts in Kalyan | Latesh Ghavat')

@section('meta')
    <meta name="description" content="About SG Education, Kalyan: founded by Latesh Ghavat with a dream of producing AIR 1 from Kalyan. Concept-first teaching, regular testing, performance analysis and mentorship for School, Foundation, JEE, NEET, MHT-CET and NDA.">
    <meta name="keywords" content="about SG Education, Latesh Ghavat, SG Education Kalyan, coaching institute Kalyan, JEE coaching Kalyan, NEET coaching Kalyan, MHT-CET Kalyan">

    <meta property="og:type" content="website">
    <meta property="og:title" content="About SG Education | The Dream Starts in Kalyan">
    <meta property="og:description" content="A coaching institute built so students from Kalyan can dream bigger, prepare systematically and compete with the best.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="About SG Education | Kalyan">
    <meta name="twitter:description" content="Dream bigger. Prepare systematically. Compete with the best.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
@endsection

@section('styles')
<style>
/* =====================================================================
   About page — custom blocks, styled to match the Eduhive light theme.
   All colours come from Eduhive CSS variables (brand-recoloured).
   Per-card accent: set --c / --c-rgb inline.
   ===================================================================== */

/* ---------- 3. Result highlights ---------- */
.sg-results { position: relative; padding: 110px 0 100px; background: var(--eduhive-white3); overflow: hidden; }
.sg-results .sec-title { margin-bottom: 50px; }
.sg-result {
    position: relative; height: 100%;
    padding: 36px 26px 30px; text-align: center;
    background: var(--eduhive-white);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(var(--eduhive-black-rgb), .06);
    border-top: 4px solid var(--c);
    transition: transform .35s ease, box-shadow .35s ease;
}
.sg-result:hover { transform: translateY(-8px); box-shadow: 0 20px 50px rgba(var(--c-rgb), .22); }
.sg-result__icon {
    position: relative;
    width: 70px; height: 70px; margin: 0 auto 22px;
    border-radius: 50%; display: grid; place-items: center;
    font-size: 30px; color: var(--c);
    background: rgba(var(--c-rgb), .12);
    transition: background .35s ease, color .35s ease;
}
.sg-result__icon::after {
    content: ""; position: absolute; inset: -6px; border-radius: 50%;
    border: 2px dashed rgba(var(--c-rgb), .45);
    animation: sgSpin 12s linear infinite;
}
.sg-result:hover .sg-result__icon { background: var(--c); color: #fff; }
@keyframes sgSpin { to { transform: rotate(360deg); } }
.sg-result__number {
    display: flex; justify-content: center; align-items: baseline; gap: 4px;
    font-size: clamp(36px, 3.4vw, 48px); font-weight: 800; line-height: 1;
    color: var(--eduhive-black); font-variant-numeric: tabular-nums; margin-bottom: 14px;
}
.sg-result__affix { font-size: .42em; font-weight: 700; color: var(--c); }
.sg-result__exam {
    display: inline-block; font-size: 13px; font-weight: 700;
    padding: 5px 14px; border-radius: 50px; margin-bottom: 12px;
    background: rgba(var(--c-rgb), .12); color: var(--c);
}
.sg-result__name { margin: 0; font-size: 16px; font-weight: 600; color: var(--eduhive-black); }
.sg-results__foot { margin-top: 45px; text-align: center; }
.sg-results__note { margin: 18px 0 0; font-size: 13px; color: var(--eduhive-text); }

/* ---------- 5. AIR 1 dream ---------- */
.sg-quote {
    position: relative; margin: 0 0 22px; padding: 20px 24px 20px 60px;
    background: var(--eduhive-light3); border-radius: 14px;
    border-left: 4px solid var(--eduhive-primary);
    font-size: 17px; font-weight: 600; font-style: italic; color: var(--eduhive-black);
}
.sg-quote i { position: absolute; left: 20px; top: 20px; font-size: 24px; color: var(--eduhive-primary); font-style: normal; }
.sg-quote cite { display: block; margin-top: 6px; font-size: 14px; font-style: normal; font-weight: 500; color: var(--eduhive-text); }
.sg-focus { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; list-style: none; margin: 22px 0 24px; padding: 0; }
.sg-focus li {
    display: flex; align-items: center; gap: 12px; min-height: 54px;
    padding: 10px 16px; border-radius: 12px;
    background: var(--eduhive-white); border: 1px solid var(--eduhive-border-color);
    font-size: 15px; font-weight: 600; line-height: 1.3; color: var(--eduhive-black);
    transition: border-color .3s ease, transform .3s ease;
}
.sg-focus li:hover { border-color: var(--eduhive-primary); transform: translateX(4px); }
.sg-focus__icon {
    flex-shrink: 0; width: 28px; height: 28px; border-radius: 50%;
    display: grid; place-items: center; font-size: 12px;
    color: #fff; background: var(--eduhive-primary);
}
.sg-callout {
    display: flex; align-items: center; gap: 14px;
    padding: 16px 20px; border-radius: 14px;
    background: var(--eduhive-base); color: #fff; font-weight: 700;
}
.sg-callout i { font-size: 22px; color: var(--eduhive-primary); }
@media (max-width: 575px) { .sg-focus { grid-template-columns: 1fr; } }

/* ---------- 6. Philosophy cards ---------- */
.sg-ability {
    height: 100%; padding: 32px 28px;
    border-radius: 20px;
    background: rgba(var(--c-rgb), .07);
    border: 1px solid rgba(var(--c-rgb), .18);
    transition: transform .35s ease, box-shadow .35s ease, background .35s ease;
}
.sg-ability:hover { transform: translateY(-8px); background: var(--eduhive-white); box-shadow: 0 18px 45px rgba(var(--c-rgb), .2); }
.sg-ability__top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; }
.sg-ability__icon {
    width: 62px; height: 62px; border-radius: 16px;
    display: grid; place-items: center; font-size: 28px;
    color: #fff; background: var(--c);
    box-shadow: 0 10px 22px rgba(var(--c-rgb), .35);
    transition: transform .35s ease;
}
.sg-ability:hover .sg-ability__icon { transform: rotate(-8deg) scale(1.05); }
.sg-ability__step {
    font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
    padding: 5px 12px; border-radius: 50px;
    background: var(--eduhive-white); color: var(--c);
}
.sg-ability__title { margin: 0 0 8px; font-size: 20px; color: var(--eduhive-black); }
.sg-ability__text  { margin: 0; font-size: 15px; line-height: 1.6; }

/* ---------- 7a. Pathway timeline ---------- */
.sg-path { padding: 110px 0; background: var(--eduhive-white3); }
.sg-path .sec-title { margin-bottom: 60px; }
.sg-path__list { position: relative; display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px; list-style: none; margin: 0; padding: 0; }
.sg-path__list::before {
    content: ""; position: absolute; top: 36px; left: 10%; right: 10%;
    border-top: 2px dashed rgba(var(--eduhive-base-rgb), .25);
}
.sg-path__item { position: relative; text-align: center; }
.sg-path__dot {
    position: relative; z-index: 1;
    width: 72px; height: 72px; margin: 0 auto 18px; border-radius: 50%;
    display: grid; place-items: center; font-size: 28px;
    color: var(--c); background: var(--eduhive-white);
    border: 2px solid var(--c);
    box-shadow: 0 0 0 8px var(--eduhive-white3);
    transition: background .35s ease, color .35s ease, transform .35s ease;
}
.sg-path__item:hover .sg-path__dot { background: var(--c); color: #fff; transform: translateY(-6px); }
.sg-path__no { display: block; font-size: 13px; font-weight: 700; color: var(--c); margin-bottom: 4px; }
.sg-path__label { margin: 0; font-size: 17px; font-weight: 700; line-height: 1.3; color: var(--eduhive-black); }
.sg-path__note { max-width: 720px; margin: 50px auto 0; text-align: center; }
@media (max-width: 991px) {
    .sg-path__list { grid-template-columns: 1fr; gap: 0; max-width: 420px; margin: 0 auto; }
    .sg-path__list::before { top: 36px; bottom: 36px; left: 35px; right: auto; border-top: 0; border-left: 2px dashed rgba(var(--eduhive-base-rgb), .25); }
    .sg-path__item { display: flex; align-items: center; gap: 20px; text-align: left; padding: 10px 0; }
    .sg-path__dot { margin: 0; flex-shrink: 0; }
}

/* ---------- 7b. What makes SG different ---------- */
.sg-diff__points { list-style: none; margin: 24px 0 30px; padding: 0; }
.sg-diff__points li { display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px dashed var(--eduhive-border-color); font-weight: 600; color: var(--eduhive-black); }
.sg-diff__points li:last-child { border-bottom: 0; }
.sg-diff__points i { color: var(--eduhive-primary); font-size: 16px; }

@media (prefers-reduced-motion: reduce) {
    .sg-result, .sg-ability, .sg-ability__icon, .sg-focus li, .sg-path__dot { transition: none; }
    .sg-result__icon::after { animation: none; }
    .sg-result:hover, .sg-ability:hover, .sg-path__item:hover .sg-path__dot { transform: none; }
}
/* ============================================================
   6. Our Philosophy — Pure Smooth Motion Cards
   Focus: Fluid transitions & natural micro-motion
   ============================================================ */

.sg-way {
    position: relative;
}

.sg-way__lead {
    margin: 0 0 12px;
    font-size: 16px;
    line-height: 1.75;
    color: rgba(var(--eduhive-base-rgb), .72);
}

.sg-way__cycle {
    display: inline-flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px 4px;
    margin: 0 0 14px;
    padding: 12px 16px;
    border-radius: 12px;
    background: rgba(var(--eduhive-base-rgb), .03);
    border: 1px solid rgba(var(--eduhive-base-rgb), .06);
    font-size: 14px;
    font-weight: 700;
    color: var(--eduhive-base);
}

.sg-way__cycle span {
    color: var(--eduhive-primary);
}

.sg-way__cycle i {
    font-size: 10px;
    color: rgba(var(--eduhive-base-rgb), .35);
    margin: 0 2px;
}

.sg-way__note {
    margin: 0;
    font-size: 15px;
    line-height: 1.65;
    color: rgba(var(--eduhive-base-rgb), .7);
}

/* ---------- Grid ---------- */
.sg-way__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 70px;
}

/* ---------- Card with Smooth Motion ---------- */
.sg-way-step {
    /* Custom Apple-like easing curve for buttery-smooth motion */
    --smooth-ease: cubic-bezier(0.16, 1, 0.3, 1);

    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 32px 28px;
    background: #ffffff;
    border: 1px solid rgba(var(--eduhive-base-rgb), 0.08);
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(var(--eduhive-base-rgb), 0.03);
    
    /* Hardware acceleration for smooth performance */
    will-change: transform, box-shadow, border-color;
    transition: transform 0.45s var(--smooth-ease),
                box-shadow 0.45s var(--smooth-ease),
                border-color 0.35s ease;
}

/* Main Card Hover Lift */
.sg-way-step:hover {
    transform: translateY(-8px);
    border-color: rgba(var(--eduhive-primary-rgb), 0.35);
    box-shadow: 0 20px 40px -10px rgba(var(--eduhive-base-rgb), 0.12);
}

/* Header Elements */
.sg-way-step__head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

/* Icon Smooth Transition */
.sg-way-step__icon {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: var(--eduhive-primary);
    background: rgba(var(--eduhive-primary-rgb), 0.08);
    
    will-change: transform, background, color;
    transition: transform 0.45s var(--smooth-ease),
                background 0.35s ease,
                color 0.35s ease,
                box-shadow 0.45s var(--smooth-ease);
}

.sg-way-step:hover .sg-way-step__icon {
    background: var(--eduhive-primary);
    color: #ffffff;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 10px 20px rgba(var(--eduhive-primary-rgb), 0.3);
}

/* Step Number Indicator */
.sg-way-step__index {
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 0.12em;
    color: rgba(var(--eduhive-base-rgb), 0.35);
    transition: color 0.35s ease, transform 0.45s var(--smooth-ease);
}

.sg-way-step:hover .sg-way-step__index {
    color: var(--eduhive-primary);
    transform: translateX(-3px);
}

/* Title & Text Motion */
.sg-way-step__title {
    margin: 0 0 10px;
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -0.015em;
    line-height: 1.25;
    color: var(--eduhive-base);
    transition: color 0.3s ease, transform 0.45s var(--smooth-ease);
}

.sg-way-step__text {
    margin: 0;
    font-size: 15px;
    line-height: 1.6;
    color: rgba(var(--eduhive-base-rgb), 0.7);
    transition: color 0.3s ease;
}

.sg-way-step:hover .sg-way-step__title {
    color: var(--eduhive-base);
    transform: translateX(3px);
}

/* Footer Indicator */
.sg-way-step__go {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: auto;
    padding-top: 22px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: rgba(var(--eduhive-base-rgb), 0.35);
    transition: color 0.35s ease, transform 0.45s var(--smooth-ease);
}

.sg-way-step__go i {
    font-size: 11px;
    transition: transform 0.45s var(--smooth-ease);
}

.sg-way-step:hover .sg-way-step__go {
    color: var(--eduhive-primary);
    transform: translateX(4px);
}

.sg-way-step:hover .sg-way-step__go i {
    transform: translateX(4px);
}

/* Last step styling */
.sg-way-step--last .sg-way-step__go {
    color: var(--eduhive-primary);
}

/* ---------- Responsive ---------- */
@media (max-width: 991px) {
    .sg-way__grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-top: 50px;
    }
}

@media (max-width: 575px) {
    .sg-way__grid {
        grid-template-columns: 1fr;
    }

    .sg-way-step {
        padding: 26px 22px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .sg-way-step,
    .sg-way-step__icon,
    .sg-way-step__index,
    .sg-way-step__title,
    .sg-way-step__go,
    .sg-way-step__go i {
        transition: none !important;
    }

    .sg-way-step:hover {
        transform: none;
    }
}
</style>
@endsection

@section('scripts')
<script>
/* About › Result highlights: count-up on scroll (supports decimals) */
(function () {
    var els = document.querySelectorAll('.sg-count');
    if (!els.length) return;
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce || !('IntersectionObserver' in window)) return; // final values already in HTML

    function animate(el) {
        var target   = parseFloat(el.getAttribute('data-target')) || 0;
        var decimals = parseInt(el.getAttribute('data-decimals'), 10) || 0;
        var duration = 1800;
        var start    = null;
        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - p, 3);            // easeOutCubic
            el.textContent = (target * eased).toFixed(decimals);
            if (p < 1) requestAnimationFrame(step);
            else el.textContent = target.toFixed(decimals);
        }
        requestAnimationFrame(step);
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                animate(entry.target);
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.4 });

    els.forEach(function (el) {
        el.textContent = (0).toFixed(parseInt(el.getAttribute('data-decimals'), 10) || 0);
        io.observe(el);
    });
})();
</script>
@endsection

@section('content')

    @php
        $demoVideo  = 'https://www.youtube.com/watch?v=h9MbznbxlLc'; // DEMO
        $founderImg = 'assets/images/team/latesh-sir.jpg';
        $founderImg = file_exists(public_path($founderImg)) ? $founderImg : 'assets/images/courses/course-d-instructor-1-9.jpg'; // DEMO fallback
    @endphp

    {{-- ================= 1. PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a href="{{ url('/') }}">Home</a></li>
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
        <div class="about-one__bg" style="background-image: url({{ asset('assets/images/shapes/about-bg-1-1.png') }})"></div>
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="about-one__image">
                        <div class="about-one__image__one">
                            <img src="{{ asset('assets/images/about/about-1-1.jpg') }}" alt="SG Education, Kalyan" />
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
                            <h6 class="sec-title__tagline">about SG education</h6>
                            <h3 class="sec-title__title">The Dream <span class="sec-title__title__shape">Starts in</span> <span class="sec-title__title__text">Kalyan.</span></h3>
                        </div>
                        <div class="about-one__description wow fadeInUp" data-wow-duration="1500ms">
                            <p class="about-one__text"><strong>"I have a dream of producing AIR 1 from Kalyan."</strong><br>— Latesh Ghavat, Founder, SG Education</p>
                            <p class="about-one__text">We believe a student's potential should never be limited by where they come from. SG Education was built with a vision to create an academic environment in Kalyan where students can dream bigger, prepare systematically and compete with the best.</p>
                        </div>
                        <div class="about-one__inner wow fadeInUp" data-wow-duration="1500ms">
                            <ul class="about-one__info list-unstyled">
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Dream Bigger</li>
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Prepare Systematically</li>
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Compete With the Best</li>
                            </ul>
                            <div class="about-one__button" style="display: flex; flex-wrap: wrap; gap: 15px;">
                                <a href="{{ url('/courses') }}" class="about-one__btn eduhive-btn">
                                    <span>Explore Our Courses</span>
                                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                                </a>
                                <a href="{{ url('/our-methodology') }}" class="about-one__btn eduhive-btn eduhive-btn--border">
                                    <span>Our Methodology</span>
                                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 3. RESULT HIGHLIGHTS =================
         Final numbers rendered in HTML (SEO / no-JS safe); JS counts them up on scroll.
    --}}
    @php
        $highlights = [
            ['prefix' => 'AIR', 'value' => 711,   'decimals' => 0, 'suffix' => '',     'exam' => 'JEE Advanced', 'name' => 'Prashik Ahire',    'icon' => 'icon-ranking',    'c' => 'primary'],
            ['prefix' => '',    'value' => 99.21, 'decimals' => 2, 'suffix' => '%ile', 'exam' => 'JEE Main',     'name' => 'Kirti Pandey',     'icon' => 'icon-medal',      'c' => 'secondary'],
            ['prefix' => '',    'value' => 99.78, 'decimals' => 2, 'suffix' => '%ile', 'exam' => 'MHT-CET',      'name' => 'Advait Gotkhinde', 'icon' => 'icon-graduation', 'c' => 'pink'],
            ['prefix' => '',    'value' => 627,   'decimals' => 0, 'suffix' => '/720', 'exam' => 'NEET',         'name' => 'Niraj Fatkal',     'icon' => 'icon-students',   'c' => 'green'],
        ];
    @endphp
    <section class="sg-results">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">results that speak</h6>
                <h3 class="sec-title__title">Proof of the <span class="sec-title__title__shape">SG</span> <span class="sec-title__title__text">Process</span></h3>
            </div>
            <div class="row gutter-y-30">
                @foreach ($highlights as $h)
                    <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 120 }}ms">
                        <div class="sg-result" style="--c: var(--eduhive-{{ $h['c'] }}); --c-rgb: var(--eduhive-{{ $h['c'] }}-rgb);">
                            <div class="sg-result__icon"><i class="{{ $h['icon'] }}" aria-hidden="true"></i></div>
                            <div class="sg-result__number">
                                @if ($h['prefix'])<span class="sg-result__affix">{{ $h['prefix'] }}</span>@endif
                                <span class="sg-count" data-target="{{ $h['value'] }}" data-decimals="{{ $h['decimals'] }}">{{ number_format($h['value'], $h['decimals']) }}</span>
                                @if ($h['suffix'])<span class="sg-result__affix">{{ $h['suffix'] }}</span>@endif
                            </div>
                            <span class="sg-result__exam">{{ $h['exam'] }}</span>
                            <p class="sg-result__name">{{ $h['name'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="sg-results__foot wow fadeInUp" data-wow-duration="1500ms">
                <a href="{{ url('/results') }}" class="eduhive-btn eduhive-btn--border">
                    <span>View All Results</span>
                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                </a>
                <p class="sg-results__note">Results shown are student achievements and should not be interpreted as a guarantee of future performance.</p>
            </div>
        </div>
    </section>

    {{-- ================= 4. WHY SG + VISION ================= --}}
    <section class="online-class section-space-bottom">
        <div class="online-class__inner">
            <div class="online-class__inner__bg" style="background-image: url({{ asset('assets/images/shapes/online-class-bg-1-1.png') }});"></div>
        </div>
        <div class="container">
            <div class="video-one wow fadeInUp" data-wow-duration="1500ms">
                <div class="video-one__bg" style="background-image: url({{ asset('assets/images/resources/video-1-1.jpg') }});">
                    <img src="{{ asset('assets/images/resources/video-1-2.jpg') }}" alt="SG Education">
                    <a href="{{ $demoVideo }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
                        <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                    </a>
                </div>
            </div>
            <div class="online-class__content">
                <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <h6 class="sec-title__tagline">why SG education?</h6>
                    <h3 class="sec-title__title"><span>Because</span> <span class="sec-title__title__shape">Talent Is</span> <span class="sec-title__title__text">Everywhere.</span></h3>
                </div>
                <div class="online-class__description wow fadeInUp" data-wow-duration="1500ms">
                    <p class="online-class__text">Kalyan has talented students, ambitious parents and hardworking families. But ambition needs direction. SG Education provides the academic planning, conceptual learning, practice, testing, analysis and guidance required to turn ambition into measurable progress.</p>
                    <p class="online-class__text">We don't want a student to think, <em>"I'm from Kalyan, so I should aim for what is available around me."</em> We want them to think, <strong>"I'm from Kalyan. Why can't I compete with the best?"</strong></p>
                    <p class="online-class__text"><strong>Our vision: From Kalyan. To the Best.</strong> One ecosystem, multiple pathways: School → Foundation → Science → Competitive Exams → Career.</p>
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
                        <img src="{{ asset('assets/images/about/about-2-1.jpg') }}" alt="Serious preparation at SG Education" class="about-two__image__one">
                        <img src="{{ asset('assets/images/about/about-2-2.jpg') }}" alt="" class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt="" class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <h6 class="sec-title__tagline">the AIR 1 dream</h6>
                            <h3 class="sec-title__title">A Dream This Big <span class="sec-title__title__shape">Needs a Serious</span> <span class="sec-title__title__text">System.</span></h3>
                        </div>

                        <blockquote class="sg-quote wow fadeInUp" data-wow-duration="1500ms">
                            <i class="icon-quote" aria-hidden="true"></i>
                            "I have a dream of producing AIR 1 from Kalyan."
                            <cite>— Latesh Ghavat, Founder</cite>
                        </blockquote>

                        <p class="about-two__text wow fadeInUp" data-wow-duration="1500ms">This is an ambition, not a promise. We cannot promise AIR 1 or a particular rank. What we can do is build an environment where serious students can dream at that level and prepare at that level. That means focusing on:</p>

                        @php
                            $air = ['Deep Concepts', 'Advanced Problem Solving', 'Consistent Practice', 'Regular Testing', 'Performance Analysis', 'Targeted Improvement', 'Mentorship', 'Discipline'];
                        @endphp
                        <ul class="sg-focus">
                            @foreach ($air as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="sg-callout wow fadeInUp" data-wow-duration="1500ms">
                            <i class="icon-ranking" aria-hidden="true"></i>
                            The rank is the outcome. The system comes first.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 6. OUR PHILOSOPHY / THE SG WAY ================= --}}
@php
    $philosophy = [
        ['t' => 'Concepts',    'd' => 'Understand before memorising.',                  'i' => 'icon-open-book',    'go' => 'Next'],
        ['t' => 'Practice',    'd' => 'Turn understanding into ability.',               'i' => 'icon-copy-writing', 'go' => 'Next'],
        ['t' => 'Testing',     'd' => 'Measure actual preparation.',                    'i' => 'icon-files',        'go' => 'Next'],
        ['t' => 'Analysis',    'd' => 'Understand why marks were lost.',                'i' => 'icon-ranking',      'go' => 'Next'],
        ['t' => 'Improvement', 'd' => 'Work specifically on weaknesses.',               'i' => 'icon-batch-assign', 'go' => 'Next'],
        ['t' => 'Consistency', 'd' => 'Repeat the process until performance improves.', 'i' => 'icon-medal',        'go' => 'Repeat'],
    ];
@endphp
<section class="offer-one section-space sg-way">
    <div class="container">

        {{-- Intro --}}
        <div class="row gutter-y-60 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                <div class="offer-one__image">
                    <img src="{{ asset('assets/images/resources/offer-1-1.jpg') }}"
                        alt="Concept-first learning at SG Education" class="offer-one__image__one">
                    <img src="{{ asset('assets/images/resources/offer-1-2.jpg') }}" alt=""
                        class="offer-one__image__two">
                    <img src="{{ asset('assets/images/shapes/offer-shape-1-1.png') }}" alt=""
                        class="offer-one__image__shape">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="offer-one__content">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">our philosophy</h6>
                        <h3 class="sec-title__title">
                            <span class="sec-title__title__shape">Don't Just Chase Marks.</span>
                            Build the <span class="sec-title__title__text">Ability Behind Them.</span>
                        </h3>
                    </div>

                    <p class="sg-way__lead wow fadeInUp" data-wow-duration="1500ms">
                        Marks and ranks matter, but they are outcomes. Behind strong academic performance
                        are abilities that students develop over time.
                    </p>

                    <div class="sg-way__cycle wow fadeInUp" data-wow-duration="1500ms">
                        <span>Learn</span> <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span>Practise</span> <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span>Test</span> <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span>Analyse</span> <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span>Improve</span> <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span>Repeat</span>
                    </div>

                    <p class="sg-way__note wow fadeInUp" data-wow-duration="1500ms">
                        A test isn’t the end of preparation. It’s the beginning of the next improvement cycle.
                    </p>

                    <a href="{{ url('/our-methodology') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms"
                        style="margin-top: 18px;">
                        <span>Explore Our Methodology</span>
                        <span class="eduhive-btn__icon">
                            <span class="eduhive-btn__icon__inner">
                                <i class="icon-right-arrow"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        {{-- 6 Process Steps Grid --}}
        <div class="sg-way__grid">
            @foreach ($philosophy as $ph)
                <article class="sg-way-step {{ $loop->last ? 'sg-way-step--last' : '' }} wow fadeInUp"
                    data-wow-duration="1200ms"
                    data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">

                    <div class="sg-way-step__head">
                        <span class="sg-way-step__icon">
                            <i class="{{ $ph['i'] }}" aria-hidden="true"></i>
                        </span>
                        <span class="sg-way-step__index">STEP {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>

                    <h4 class="sg-way-step__title">{{ $ph['t'] }}</h4>
                    <p class="sg-way-step__text">{{ $ph['d'] }}</p>

                    <div class="sg-way-step__go">
                        {{ $ph['go'] }}
                        <i class="{{ $loop->last ? 'fas fa-redo-alt' : 'fas fa-arrow-right' }}" aria-hidden="true"></i>
                    </div>

                </article>
            @endforeach
        </div>

    </div>
    <div class="offer-one__shape-box"></div>
</section>

    {{-- ================= 7a. WHERE WE ARE GOING (timeline) ================= --}}
    @php
        $path = [
            ['t' => 'School Education',         'i' => 'icon-open-book',    'c' => 'primary'],
            ['t' => 'Foundation',               'i' => 'icon-batch-assign', 'c' => 'secondary'],
            ['t' => '11th – 12th Science',      'i' => 'icon-graduation',   'c' => 'pink'],
            ['t' => 'JEE / NEET / CET / NDA',   'i' => 'icon-ranking',      'c' => 'purple'],
            ['t' => 'Career & Higher Education','i' => 'icon-medal',        'c' => 'green'],
        ];
    @endphp
    <section class="sg-path">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">where we are going</h6>
                <h3 class="sec-title__title">From Coaching Institute to <span class="sec-title__title__text">Educational</span> <span class="sec-title__title__shape">Institution</span></h3>
            </div>
            <ol class="sg-path__list">
                @foreach ($path as $step)
                    <li class="sg-path__item wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 120 }}ms"
                        style="--c: var(--eduhive-{{ $step['c'] }}); --c-rgb: var(--eduhive-{{ $step['c'] }}-rgb);">
                        <span class="sg-path__dot"><i class="{{ $step['i'] }}" aria-hidden="true"></i></span>
                        <div>
                            <span class="sg-path__no">Stage {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <h4 class="sg-path__label">{{ $step['t'] }}</h4>
                        </div>
                    </li>
                @endforeach
            </ol>
            <p class="sg-path__note wow fadeInUp" data-wow-duration="1500ms">Our ambition isn't simply to build a bigger coaching centre. <strong>It is to contribute to a stronger educational ecosystem in Kalyan.</strong></p>
        </div>
    </section>

    {{-- ================= 7b. WHAT MAKES SG DIFFERENT ================= --}}
    @php
        $different = [
            ['q' => 'Structured Academic Planning', 'a' => 'Students follow a defined roadmap rather than studying randomly.'],
            ['q' => 'Regular Assessment',           'a' => 'Preparation is measured throughout the academic journey.'],
            ['q' => 'Performance Analysis',         'a' => 'Marks are only the starting point. We examine why a student performed the way they did.'],
            ['q' => 'Targeted Improvement',         'a' => 'Weak areas become specific improvement targets.'],
            ['q' => 'Small-Batch Attention',        'a' => 'A focused learning environment allows students to receive meaningful academic attention.'],
            ['q' => 'Competitive Preparation',      'a' => 'JEE and NEET require a level of depth, practice and testing beyond conventional classroom preparation.'],
        ];
    @endphp
    <section class="faq-one section-space">
        <div class="container">
            <div class="row gutter-y-50 align-items-center">
                <div class="col-lg-5">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">what makes SG different?</h6>
                        <h3 class="sec-title__title">A Better <span class="sec-title__title__text">Academic</span> <span class="sec-title__title__shape">Process</span></h3>
                    </div>
                    <p class="wow fadeInUp" data-wow-duration="1500ms">We don't differentiate SG with generic claims like "best faculty" or "guaranteed success". Instead, our focus is on building a better academic process, one that students can follow, parents can see and teachers can improve.</p>
                    <ul class="sg-diff__points wow fadeInUp" data-wow-duration="1500ms">
                        <li><i class="icon-check-2" aria-hidden="true"></i> A defined roadmap, not random study</li>
                        <li><i class="icon-check-2" aria-hidden="true"></i> Every test followed by analysis</li>
                        <li><i class="icon-check-2" aria-hidden="true"></i> Weak areas turned into targets</li>
                    </ul>
                    <a href="{{ url('/our-methodology') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms">
                        <span>See Our Methodology</span>
                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="faq-one__content">
                        <div class="faq-one__accordion">
                            <div class="eduhive-accordion" data-grp-name="eduhive-accordion-different">
                                @foreach ($different as $d)
                                    <div class="accordion {{ $loop->first ? 'active' : '' }} wow fadeInUp" data-wow-duration="1500ms">
                                        <div class="accordion-title">
                                            <h4>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}. {{ $d['q'] }}</h4>
                                            <span class="accordion-title__icon"><i class="icon-double-arrow"></i></span>
                                        </div>
                                        <div class="accordion-content">
                                            <div class="inner"><p>{{ $d['a'] }}</p></div>
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

    {{-- ================= 8. ACADEMIC ECOSYSTEM ================= --}}
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our academic ecosystem</h6>
                <h3 class="sec-title__title">More Than <span class="sec-title__title__text">Classroom</span> <span class="sec-title__title__shape">Teaching</span></h3>
            </div>
            @php
                $ecosystem = [
                    ['t' => 'Academic Programs',     'd' => '9th–10th, 11th–12th Science, JEE, NEET, MHT-CET, NDA & Foundation', 'i' => 'icon-open-book'],
                    ['t' => 'Testing & Assessment',  'd' => 'Chapter tests, cumulative tests, PYQs and mock examinations',       'i' => 'icon-files'],
                    ['t' => 'Career Guidance',       'd' => 'Understanding academic and career pathways',                        'i' => 'icon-graduation'],
                    ['t' => 'Seminars & Workshops',  'd' => 'Exposure to examinations, careers and opportunities',               'i' => 'icon-live-streaming'],
                    ['t' => 'Student Development',   'd' => 'Confidence, discipline and problem-solving ability',                'i' => 'icon-students'],
                    ['t' => 'Performance Tracking',  'd' => 'Using performance data to find areas for improvement',              'i' => 'icon-ranking'],
                ];
            @endphp
            <div class="row gutter-y-30">
                @foreach ($ecosystem as $e)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="course-category__card course-category__card--{{ $loop->iteration }}">
                            <div class="course-category__card__inner">
                                <div class="course-category__card__bg" style="background-image: url({{ asset('assets/images/course-category/course-category-card-bg-1-' . $loop->iteration . '.jpg') }});"></div>
                            </div>
                            <div class="course-category__card__content">
                                <div class="course-category__card__icon-box">
                                    <span class="course-category__card__icon"><i class="{{ $e['i'] }}"></i></span>
                                </div>
                                <h4 class="course-category__card__title">{{ $e['t'] }}</h4>
                                <p class="course-category__card__text" style="margin: 6px 0 0;">{{ $e['d'] }}</p>
                            </div>
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
                <h3 class="sec-title__title">The Dream Is <span class="sec-title__title__shape">Bigger Than</span> <span class="sec-title__title__text">a Rank.</span></h3>
            </div>
            <div class="course-instructor-details__inner">
                <div class="course-instructor-details__image">
                    <img src="{{ asset($founderImg) }}" alt="Latesh Ghavat, Founder, SG Education">
                </div>
                <div class="course-instructor-details__info">
                    <h3 class="course-instructor-details__name">Latesh Ghavat</h3>
                    <p class="course-instructor-details__designation">Founder, SG Education</p>
                    <p class="course-instructor-details__text">"I started SG Education with a belief that students from Kalyan should not have to lower their ambitions because of where they live. My dream is to see a student from Kalyan achieve AIR 1.</p>
                    <p class="course-instructor-details__text">But that dream is not really about one rank. It is about creating an environment where a student can believe that the highest level is within their reach, and then giving them the system, guidance and discipline required to pursue it.</p>
                    <p class="course-instructor-details__text">The journey will be difficult. There will be failures, setbacks and difficult examinations. Our responsibility is to help students learn from them, improve and keep moving forward. <strong>The dream starts in Kalyan."</strong></p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 10. RESULTS ================= --}}
    @include('partials.results')

    {{-- ================= 11. CTA ================= --}}
    <section class="cta-one">
        <div class="container">
            <div class="cta-one__content wow fadeInUp" data-wow-duration="1500ms">
                <h2 class="cta-one__title">
                    Have a Bigger Dream? <br />
                    Let's Build the Right Path to It.
                </h2>
                <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                    <a href="{{ url('/contact') }}" class="eduhive-btn">
                        <span>Book Academic Counselling</span>
                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                    </a>
                    <a href="{{ url('/results') }}" class="eduhive-btn eduhive-btn--border">
                        <span>View Our Results</span>
                        <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span></span>
                    </a>
                </div>
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