{{--
============================================================================
  SG Educare — Master Layout  (Eduhive template → Laravel Blade)
  Place at: resources/views/layouts/main.blade.php   (pages use @extends('layouts.main'))

  Partials:
    @include('layouts.header')  → resources/views/layouts/header.blade.php
    @include('layouts.footer')  → resources/views/layouts/footer.blade.php

  Per-page usage:
    @extends('layouts.main')
    @section('title', 'JEE Coaching in Kalyan | SG Educare')
    @section('meta') ...custom og/description... @endsection   (optional)
    @section('content') ...page... @endsection

  Preloader:
    - Branded (logo + progress line + tagline), shown on the FIRST page of a visit only.
    - Hides on window load, minimum 500 ms (no flash), maximum 3 s (slow images never block).
    - Disabled for no-JS visitors; static for "reduce motion" users.

  TODO before go-live:
    - Replace logo-dark.png / logo-light.png / favicons / og-image.jpg with SG Educare assets
    - Fill real secondary phone + verify primary (+91 77159 16926) in Schema
    - Add real social profile URLs (sameAs) + campus street addresses/pincodes
    - Point newsletter form (footer) + /search to real routes
============================================================================
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{-- ===== Preloader bootstrap: runs before anything paints ===== --}}
    <script>
        (function () {
            var d = document.documentElement;
            window.__sgStart = Date.now();
            var seen = false;
            try { seen = sessionStorage.getItem('sg-visited') === '1'; } catch (e) { }
            d.classList.add(seen ? 'sg-no-preload' : 'sg-loading');
        })();
    </script>

    {{-- ===== Preloader critical CSS (inline so it shows instantly) ===== --}}
    <style>
        .sg-preloader {
            position: fixed;
            inset: 0;
            z-index: 100000;
            display: grid;
            place-items: center;
            background:
                radial-gradient(circle at 50% 42%, rgba(244, 129, 52, .07) 0%, transparent 42%),
                #ffffff;
            transition: opacity .55s ease, visibility .55s ease;
        }

        .sg-preloader::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(51, 65, 84, .08) 1px, transparent 1px);
            background-size: 22px 22px;
            -webkit-mask-image: radial-gradient(circle at 50% 45%, #000 0%, transparent 60%);
            mask-image: radial-gradient(circle at 50% 45%, #000 0%, transparent 60%);
            pointer-events: none;
        }

        .sg-preloader__inner {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 22px;
            padding: 24px;
            animation: sgPreIn .7s cubic-bezier(.22, 1, .36, 1) both;
            transition: transform .55s cubic-bezier(.22, 1, .36, 1), opacity .4s ease;
        }

        .sg-preloader__logo {
            display: block;
            width: 190px;
            max-width: 60vw;
            height: auto;
        }

        .sg-preloader__wordmark {
            display: none;
            margin: 0;
            font: 800 30px/1 'Plus Jakarta Sans', system-ui, sans-serif;
            letter-spacing: -.02em;
            color: #334154;
        }

        .sg-preloader__wordmark span {
            color: #F48134;
        }

        .sg-preloader__bar {
            position: relative;
            width: 190px;
            max-width: 60vw;
            height: 3px;
            border-radius: 3px;
            overflow: hidden;
            background: rgba(51, 65, 84, .1);
        }

        .sg-preloader__bar span {
            position: absolute;
            top: 0;
            left: 0;
            width: 38%;
            height: 100%;
            border-radius: 3px;
            background: #F48134;
            animation: sgPreBar 1.15s cubic-bezier(.65, 0, .35, 1) infinite;
        }

        .sg-preloader__tag {
            margin: 0;
            font: 600 13px/1.4 'Plus Jakarta Sans', system-ui, sans-serif;
            letter-spacing: .02em;
            color: rgba(51, 65, 84, .7);
            text-align: center;
        }

        /* Exit: content lifts slightly, panel fades */
        .sg-preloader.is-done {
            opacity: 0;
            visibility: hidden;
        }

        .sg-preloader.is-done .sg-preloader__inner {
            transform: translateY(-14px) scale(.98);
            opacity: 0;
        }

        /* Lock scroll only while visible */
        html.sg-loading,
        html.sg-loading body {
            overflow: hidden;
        }

        /* Repeat pages in the same visit: no preloader */
        html.sg-no-preload .sg-preloader {
            display: none;
        }

        @keyframes sgPreIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: none; }
        }

        @keyframes sgPreBar {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(265%); }
        }

        @media (prefers-reduced-motion: reduce) {
            .sg-preloader,
            .sg-preloader__inner {
                animation: none;
                transition: opacity .2s ease, visibility .2s ease;
            }

            .sg-preloader__bar span {
                width: 100%;
                animation: none;
            }

            .sg-preloader.is-done .sg-preloader__inner {
                transform: none;
            }
        }
    </style>
    <noscript>
        <style>.sg-preloader { display: none !important; } html.sg-loading, html.sg-loading body { overflow: auto !important; }</style>
    </noscript>
    <link rel="preload" as="image" href="{{ asset('assets/images/logo-dark.png') }}">

    <!-- ===== Global meta (always present) ===== -->
    <meta name="author" content="SG Educare" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <title>@yield('title', 'SG Educare | Best Coaching Classes in Kalyan for JEE, NEET, MHT-CET & Boards')</title>

    {{-- Per-page SEO override via @section('meta'); otherwise site defaults --}}
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description" content="SG Educare — Kalyan's results-focused coaching institute for JEE (Main + Advanced), NEET-UG, MHT-CET, NDA and School Boards (Classes 8–10). Small batches, weekly tests and personal mentoring across 3 Kalyan campuses.">
        <meta name="keywords" content="coaching classes Kalyan, JEE coaching Kalyan, NEET coaching Kalyan, MHT-CET classes Kalyan, best coaching classes Kalyan, NDA coaching Kalyan, board tuition Kalyan, SSC CBSE ICSE classes Kalyan, foundation classes Kalyan">

        <meta property="og:type" content="website">
        <meta property="og:title" content="SG Educare | Best Coaching Classes in Kalyan">
        <meta property="og:description" content="Results-focused coaching for JEE, NEET, MHT-CET, NDA & Boards (8–10). Small batches, weekly tests, 3 Kalyan campuses.">
        <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="SG Educare | Coaching Classes in Kalyan">
        <meta name="twitter:description" content="JEE, NEET, MHT-CET, NDA & Boards coaching in Kalyan. Small batches, weekly tests, personal mentoring.">
        <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">
    @endif

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- ===== Vendor styles ===== -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/eduhive-icons/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}" />

    <!-- Template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/eduhive.css') }}" />

    @yield('styles')
</head>

<body class="custom-cursor">

    {{-- ===== Branded preloader (replaces template .preloader) ===== --}}
    <div class="sg-preloader" id="sg-preloader" role="status" aria-live="polite" aria-label="Loading SG Educare">
        <div class="sg-preloader__inner">
            <img class="sg-preloader__logo" src="{{ asset('assets/images/logo-dark.png') }}" width="190" alt=""
                onerror="this.style.display='none';this.nextElementSibling.style.display='block';">
            <p class="sg-preloader__wordmark" aria-hidden="true">SG <span>Educare</span></p>
            <div class="sg-preloader__bar" aria-hidden="true"><span></span></div>
            <p class="sg-preloader__tag">Building Concepts. Creating Achievers.</p>
        </div>
    </div>
    <script>
        (function () {
            var el = document.getElementById('sg-preloader');
            var root = document.documentElement;
            if (!el) return;

            // Repeat page in this visit → already hidden by CSS; just clean up.
            if (root.classList.contains('sg-no-preload')) { el.remove(); return; }

            var MIN = 500;   // never flash for less than this
            var MAX = 3000;  // never block longer than this, even if images are slow
            var done = false;

            function hide() {
                if (done) return;
                done = true;
                var wait = Math.max(0, MIN - (Date.now() - (window.__sgStart || Date.now())));
                setTimeout(function () {
                    el.classList.add('is-done');
                    root.classList.remove('sg-loading');
                    try { sessionStorage.setItem('sg-visited', '1'); } catch (e) { }
                    setTimeout(function () { if (el.parentNode) el.parentNode.removeChild(el); }, 650);
                }, wait);
            }

            if (document.readyState === 'complete') hide();
            else window.addEventListener('load', hide);
            setTimeout(hide, MAX);

            // Back/forward cache: never show a stale preloader
            window.addEventListener('pageshow', function (e) {
                if (e.persisted) { root.classList.remove('sg-loading'); if (el.parentNode) el.parentNode.removeChild(el); }
            });
        })();
    </script>

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">

        {{-- Header --}}
        @include('layouts.header')

        {{-- Page content --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.footer')

    </div><!-- /.page-wrapper -->

    {{-- Mobile nav (mirrors header menu; JS clones .main-menu__list into .mobile-nav__container) --}}
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box logo-retina">
                <a href="{{ url('/') }}" aria-label="SG Educare">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" width="209" alt="SG Educare" />
                </a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                    <a href="mailto:info@sgeducare.in">info@sgeducare.in</a>
                </li>
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-phone-alt"></i></span>
                    <a href="tel:+917715916926">+91 77159 16926</a>
                </li>
            </ul>
            <div class="mobile-nav__social social-links-two">
                <a href="#"><span class="social-links-two__icon"><i class="fab fa-facebook-f" aria-hidden="true"></i></span><span class="sr-only">Facebook</span></a>
                <a href="#"><span class="social-links-two__icon"><i class="fab fa-instagram" aria-hidden="true"></i></span><span class="sr-only">Instagram</span></a>
                <a href="#"><span class="social-links-two__icon"><i class="fab fa-youtube" aria-hidden="true"></i></span><span class="sr-only">YouTube</span></a>
                <a href="#"><span class="social-links-two__icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span><span class="sr-only">WhatsApp</span></a>
            </div>
        </div>
    </div><!-- /.mobile-nav__wrapper -->

    {{-- Search popup (remove this + .search-toggler in header if you don't want search) --}}
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="{{ url('/search') }}">
                <input type="text" name="q" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="eduhive-btn">
                    <i class="icon-search"></i>
                </button>
            </form>
        </div>
    </div><!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

    <!-- ===== Vendor scripts ===== -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/js/owlcarousel2-filter.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/js/owlcarousel2-progressbar.js') }}"></script>
    <script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>

    <!-- Template js -->
    <script src="{{ asset('assets/js/eduhive.js') }}"></script>

    @yield('scripts')

    {{-- ===== EducationalOrganization + multi-campus schema (local SEO / rich results) ===== --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "SG Educare",
        "alternateName": "SG Education",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/images/logo-dark.png') }}",
        "description": "SG Educare is a Kalyan-based coaching institute for JEE (Main + Advanced), NEET-UG, MHT-CET, NDA and School Boards (Classes 8-10), known for small batches, frequent testing and personal mentoring across three Kalyan campuses.",
        "areaServed": ["Kalyan", "Dombivli", "Ulhasnagar", "Ambernath", "Badlapur", "Bhiwandi", "Thane"],
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+91-77159-16926",
            "contactType": "admissions",
            "email": "info@sgeducare.in",
            "areaServed": "IN",
            "availableLanguage": ["English", "Hindi", "Marathi"]
        }],
        "location": [
            {
                "@type": "Place",
                "name": "SG Educare - Khadakpada Campus",
                "address": { "@type": "PostalAddress", "streetAddress": "Khadakpada", "addressLocality": "Kalyan (West)", "addressRegion": "Maharashtra", "postalCode": "421301", "addressCountry": "IN" }
            },
            {
                "@type": "Place",
                "name": "SG Educare - Prem Auto Compound Campus",
                "address": { "@type": "PostalAddress", "streetAddress": "Prem Auto Compound", "addressLocality": "Kalyan", "addressRegion": "Maharashtra", "addressCountry": "IN" }
            },
            {
                "@type": "Place",
                "name": "SG Educare - Adharwadi Campus",
                "address": { "@type": "PostalAddress", "streetAddress": "Near Adharwadi Jail", "addressLocality": "Kalyan (West)", "addressRegion": "Maharashtra", "addressCountry": "IN" }
            }
        ],
        "sameAs": [
            "TODO: https://www.facebook.com/your-page",
            "TODO: https://www.instagram.com/your-handle",
            "TODO: https://www.youtube.com/@your-channel"
        ]
    }
    </script>

</body>
</html>