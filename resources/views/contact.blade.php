{{--
============================================================================
resources/views/contact.blade.php → /contact
Data: $courses, $classes, $selectedCourse (from ContactController)
Confirm before go-live: other Kalyan branch addresses (only Khadakpada in doc).
============================================================================
--}}
@extends('layouts.main')

@section('title', 'Contact SG Education | Academic Counselling in Kalyan | JEE, NEET, MHT-CET')

@php
    // Fallbacks keep the page rendering even if a route bypasses ContactController
    $courses = $courses ?? \App\Http\Controllers\ContactController::COURSES;
    $classes = $classes ?? \App\Http\Controllers\ContactController::CLASSES;
    $selectedCourse = $selectedCourse
        ?? (array_key_exists((string) request('course'), $courses) ? (string) request('course') : null);

    $phone = '8591932112';
    $phoneIntl = '+91' . $phone;
    $phoneDisplay = '+91 85919 32112';
    $waText = rawurlencode('Hi SG Education, I would like to know about courses, batch timings and fees.');
    $waLink = "https://wa.me/91{$phone}?text={$waText}";

    // Add more branches here; the map switches between them automatically.
    $branches = [
        [
            'name' => 'Khadakpada',
            'address' => '109, Whitefield, Flower Valley, Above HDFC Bank, Opposite Gurudev NX Hotel, Khadakpada, Kalyan',
            'query' => 'Whitefield Flower Valley Khadakpada Kalyan HDFC Bank',
        ],
    ];
    foreach ($branches as &$b) {
        $b['embed'] = 'https://maps.google.com/maps?q=' . rawurlencode($b['query']) . '&z=16&output=embed';
        $b['directions'] = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode($b['query']);
    }
    unset($b);

    $courseIcons = [
        '9th-10th' => 'fa-book-open',
        '11th-12th-science' => 'fa-flask',
        'jee' => 'fa-atom',
        'neet' => 'fa-stethoscope',
        'mht-cet' => 'fa-calculator',
        'nda' => 'fa-shield-alt',
        'foundation' => 'fa-seedling',
        'not-sure' => 'fa-question-circle',
    ];

    $journey = [
        ['title' => 'Your current academic level', 'text' => 'Where you stand today, subject by subject.'],
        ['title' => 'Your target examination', 'text' => 'Boards, JEE, NEET, MHT-CET, NDA or Foundation.'],
        ['title' => 'The right preparation pathway', 'text' => 'How to get from here to there.'],
        ['title' => 'Suitable course & batch', 'text' => 'The program and timing that fit.'],
        ['title' => 'Your academic roadmap', 'text' => 'A clear plan you can start on.'],
    ];

    $success = session('enquiry_success');
    $oldCourse = old('interested_course', $selectedCourse);
@endphp

@section('meta')
    <meta name="description"
        content="Talk to SG Education, Kalyan about 9th–10th, 11th–12th Science, JEE, NEET, MHT-CET, NDA and Foundation courses. Call or WhatsApp {{ $phoneDisplay }} or book free academic counselling.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Contact SG Education | Kalyan">
    <meta property="og:description" content="Book free academic counselling for JEE, NEET, MHT-CET, NDA, Boards and Foundation.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
    {{-- Enables entrance animations only when JS runs (no flash, no hidden content without JS) --}}
    <script>document.documentElement.classList.add('sg-js');</script>
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'EducationalOrganization',
            'name' => 'SG Education',
            'url' => url('/'),
            'telephone' => $phoneIntl,
            'address' => collect($branches)->map(fn($b) => [
                '@type' => 'PostalAddress',
                'streetAddress' => $b['address'],
                'addressLocality' => 'Kalyan',
                'addressRegion' => 'Maharashtra',
                'addressCountry' => 'IN',
            ])->values()->all(),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection

@section('styles')
    <style>
        /* ==========================================================
           Tokens
           ========================================================== */
        .sg-contact {
            --sg-ink: var(--eduhive-base);
            --sg-ink-rgb: var(--eduhive-base-rgb);
            --sg-accent: var(--eduhive-primary);
            --sg-accent-rgb: var(--eduhive-primary-rgb);
            --sg-dark: #1e2833;
            --sg-line: #e3e6eb;
            --sg-muted: rgba(var(--sg-ink-rgb), .64);
            --sg-soft: #f5f6f8;
            --sg-ok: #16a34a;
            --sg-err: #dc2626;
            --sg-wa: #1faa55;
            --sg-ease: cubic-bezier(.22, 1, .36, 1);
            --sg-sticky: 120px;
        }

        /* .sg-contact :focus-visible {
            outline: 3px solid var(--sg-accent);
            outline-offset: 3px;
        } */

        .sg-contact h2,
        .sg-contact h3 {
            color: var(--sg-ink);
            letter-spacing: -.02em;
        }

        /* Entrance reveal (only when JS is on) */
        .sg-js .sg-rv {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .8s var(--sg-ease) var(--d, 0ms), transform .8s var(--sg-ease) var(--d, 0ms);
        }

        .sg-js .sg-rv.is-in {
            opacity: 1;
            transform: none;
        }

        /* ==========================================================
           Intro
           ========================================================== */
        .sg-intro-sec {
            position: relative;
            padding: 100px 0 90px;
            overflow: hidden;
        }

        .sg-intro-sec::before {
            content: "";
            position: absolute;
            top: -120px;
            right: -160px;
            width: 520px;
            height: 520px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(var(--sg-accent-rgb), .12) 0%, transparent 65%);
            pointer-events: none;
        }

        .sg-intro {
            position: relative;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 64px;
            align-items: center;
        }

        .sg-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding: 7px 14px 7px 10px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: var(--sg-ink);
            background: #fff;
            border: 1px solid var(--sg-line);
            box-shadow: 0 6px 18px rgba(var(--sg-ink-rgb), .06);
        }

        .sg-kicker__dot {
            position: relative;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--sg-wa);
        }

        .sg-kicker__dot::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: var(--sg-wa);
            animation: sgPing 2s ease-out infinite;
        }

        @keyframes sgPing {
            0% { transform: scale(1); opacity: .6; }
            80%, 100% { transform: scale(2.6); opacity: 0; }
        }

        .sg-intro__title {
            margin: 0 0 18px;
            font-size: clamp(34px, 4.4vw, 56px);
            font-weight: 800;
            line-height: 1.06;
            letter-spacing: -.035em;
        }

        .sg-intro__text {
            margin: 0;
            max-width: 540px;
            font-size: 18px;
            line-height: 1.7;
            color: var(--sg-muted);
        }

        .sg-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 28px 0 34px;
            padding: 0;
            list-style: none;
        }

        .sg-chips a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border: 1px solid var(--sg-line);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: var(--sg-ink);
            background: #fff;
            text-decoration: none;
            transition: border-color .2s ease, background .2s ease, transform .25s var(--sg-ease);
        }

        .sg-chips a i {
            font-size: 12px;
            color: var(--sg-accent);
        }

        .sg-chips a:hover {
            border-color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .06);
            transform: translateY(-2px);
        }

        .sg-intro__cta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px 22px;
        }

        .sg-intro__call {
            font-size: 15px;
            font-weight: 600;
            color: var(--sg-muted);
        }

        .sg-intro__call a {
            font-weight: 800;
            color: var(--sg-ink);
            text-decoration: none;
            border-bottom: 2px solid rgba(var(--sg-accent-rgb), .4);
        }

        /* Buttons */
        .sg-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 16px 16px 16px 24px;
            border: 0;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.2;
            text-decoration: none !important;
            cursor: pointer;
            transition: transform .3s var(--sg-ease), box-shadow .3s var(--sg-ease), background .2s ease;
        }

        .sg-btn__icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 12px;
            background: rgba(255, 255, 255, .2);
            transition: transform .3s var(--sg-ease);
        }

        .sg-btn--primary {
            color: #fff !important;
            background: var(--sg-accent);
            box-shadow: 0 12px 28px rgba(var(--sg-accent-rgb), .32);
        }

        .sg-btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(var(--sg-accent-rgb), .42);
        }

        .sg-btn--primary:hover .sg-btn__icon {
            transform: translateX(3px);
        }

        .sg-btn--wa {
            padding: 14px 20px;
            color: #fff !important;
            background: var(--sg-wa);
        }

        .sg-btn--wa:hover {
            transform: translateY(-2px);
        }

        .sg-btn--line {
            padding: 14px 20px;
            color: var(--sg-ink) !important;
            background: #fff;
            border: 1.5px solid var(--sg-line);
        }

        .sg-btn--line:hover {
            border-color: var(--sg-ink);
        }

        /* Reach cards */
        .sg-reach {
            display: grid;
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sg-reach__card {
            position: relative;
            display: grid;
            grid-template-columns: 56px 1fr auto;
            align-items: center;
            gap: 18px;
            padding: 22px 22px 22px 20px;
            border: 1px solid var(--sg-line);
            border-radius: 20px;
            background: #fff;
            text-decoration: none !important;
            box-shadow: 0 8px 24px rgba(var(--sg-ink-rgb), .04);
            transition: transform .35s var(--sg-ease), box-shadow .35s var(--sg-ease), border-color .25s ease;
        }

        .sg-reach__card:hover {
            transform: translateY(-3px);
            border-color: rgba(var(--sg-accent-rgb), .45);
            box-shadow: 0 18px 40px rgba(var(--sg-ink-rgb), .09);
        }

        .sg-reach__icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 22px;
            color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .1);
        }

        .sg-reach__card--wa .sg-reach__icon {
            color: var(--sg-wa);
            background: rgba(31, 170, 85, .1);
        }

        .sg-reach__label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--sg-muted);
        }

        .sg-reach__value {
            display: block;
            margin: 2px 0 4px;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -.01em;
            font-variant-numeric: tabular-nums;
            color: var(--sg-ink);
        }

        .sg-reach__sub {
            display: block;
            font-size: 14px;
            line-height: 1.5;
            color: var(--sg-muted);
        }

        .sg-reach__go {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 13px;
            color: var(--sg-ink);
            background: var(--sg-soft);
            transition: background .25s ease, color .25s ease, transform .3s var(--sg-ease);
        }

        .sg-reach__card:hover .sg-reach__go {
            color: #fff;
            background: var(--sg-accent);
            transform: translateX(3px);
        }

        /* ==========================================================
           Enquiry
           ========================================================== */
        .sg-enquiry {
            position: relative;
            padding: 100px 0;
            background:
                radial-gradient(circle at 0% 0%, rgba(var(--sg-accent-rgb), .07) 0%, transparent 40%),
                radial-gradient(rgba(var(--sg-ink-rgb), .07) 1px, transparent 1px) 0 0 / 22px 22px,
                var(--sg-soft);
        }

        .sg-enquiry__grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(0, 1fr);
            gap: 36px;
            align-items: start;
        }

        .sg-form-card {
            position: relative;
            padding: 44px;
            border-radius: 28px;
            background: #fff;
            box-shadow: 0 30px 70px rgba(var(--sg-ink-rgb), .1);
            scroll-margin-top: var(--sg-sticky);
        }

        .sg-form-card__head {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 30px;
        }

        .sg-form-card__title {
            margin: 0 0 6px;
            font-size: clamp(26px, 2.6vw, 34px);
            font-weight: 800;
        }

        .sg-form-card__sub {
            margin: 0;
            font-size: 16px;
            color: var(--sg-muted);
        }

        /* Completion meter */
        .sg-meter {
            min-width: 190px;
        }

        .sg-meter__label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--sg-muted);
        }

        .sg-meter__label b {
            color: var(--sg-ink);
            font-variant-numeric: tabular-nums;
        }

        .sg-meter__track {
            height: 6px;
            border-radius: 6px;
            overflow: hidden;
            background: var(--sg-soft);
        }

        .sg-meter__bar {
            height: 100%;
            width: 0;
            border-radius: 6px;
            background: linear-gradient(90deg, var(--sg-accent), #f7a263);
            transition: width .5s var(--sg-ease), background .3s ease;
        }

        .sg-meter.is-done .sg-meter__bar {
            background: var(--sg-ok);
        }

        /* Groups */
        .sg-group {
            margin: 0 0 30px;
            padding: 0;
            border: 0;
            min-width: 0;
        }

        .sg-group__title {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            margin: 0 0 18px;
            padding: 0;
            font-size: 16px;
            font-weight: 800;
            color: var(--sg-ink);
        }

        .sg-group__title::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--sg-line);
        }

        .sg-group__num {
            width: 26px;
            height: 26px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            font-size: 13px;
            color: #fff;
            background: var(--sg-ink);
        }

        .sg-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 20px;
        }

        /* .sg-row + .sg-row,
        .sg-row + .sg-field,
        .sg-field + .sg-field {
            margin-top: 20px;
        } */

        /* Field */
        .sg-field {
            position: relative;
            min-width: 0;
            margin: 0;
            padding: 0;
            border: 0;
        }

        .sg-field > label,
        .sg-field > legend {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 10px;
            width: 100%;
            margin-bottom: 8px;
            padding: 0;
            font-size: 14px;
            font-weight: 700;
            color: var(--sg-ink);
        }

        .sg-req {
            color: var(--sg-accent);
        }

        .sg-opt {
            font-size: 13px;
            font-weight: 500;
            color: var(--sg-muted);
        }

        .sg-input {
            position: relative;
            display: flex;
            align-items: center;
            border: 1.5px solid var(--sg-line);
            border-radius: 14px;
            background: #fbfbfc;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .sg-input:hover {
            border-color: #cfd4db;
        }

        .sg-input:focus-within {
            border-color: var(--sg-accent);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(var(--sg-accent-rgb), .13);
        }

        .sg-input__icon {
            position: absolute;
            left: 16px;
            font-size: 15px;
            color: rgba(var(--sg-ink-rgb), .38);
            pointer-events: none;
            transition: color .2s ease;
        }

        .sg-input:focus-within .sg-input__icon {
            color: var(--sg-accent);
        }

        .sg-input input,
        .sg-input textarea {
            width: 100%;
            min-width: 0;
            height: 54px;
            padding: 0 44px 0 46px;
            border: 0;
            outline: 0;
            background: transparent;
            font: inherit;
            font-size: 16px; /* ≥16px prevents iOS zoom */
            color: var(--sg-ink);
        }

        .sg-input input::placeholder,
        .sg-input textarea::placeholder {
            color: rgba(var(--sg-ink-rgb), .35);
        }

        .sg-input textarea {
            height: auto;
            min-height: 120px;
            padding: 15px 18px;
            line-height: 1.6;
            resize: vertical;
        }

        .sg-input--area .sg-input__icon {
            display: none;
        }

        .sg-input__prefix {
            flex-shrink: 0;
            align-self: stretch;
            display: grid;
            place-items: center;
            margin-left: 42px;
            padding-right: 12px;
            border-right: 1.5px solid var(--sg-line);
            font-weight: 800;
            color: var(--sg-ink);
        }

        .sg-input--phone input {
            padding-left: 12px;
            letter-spacing: .06em;
            font-variant-numeric: tabular-nums;
        }

        .sg-input__ok {
            position: absolute;
            right: 14px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 10px;
            color: #fff;
            background: var(--sg-ok);
            opacity: 0;
            transform: scale(.4);
            transition: opacity .25s ease, transform .35s var(--sg-ease);
            pointer-events: none;
        }

        .sg-field.is-valid .sg-input {
            border-color: rgba(22, 163, 74, .55);
        }

        .sg-field.is-valid .sg-input__ok {
            opacity: 1;
            transform: scale(1);
        }

        .sg-field.is-invalid .sg-input {
            border-color: var(--sg-err);
            background: #fff;
        }

        .sg-field.is-invalid .sg-input:focus-within {
            box-shadow: 0 0 0 4px rgba(220, 38, 38, .12);
        }

        .sg-field.is-invalid .sg-input__icon {
            color: var(--sg-err);
        }

        .sg-field.is-blocked .sg-input {
            animation: sgShake .32s ease;
        }

        @keyframes sgShake {
            25% { transform: translateX(-4px); }
            50% { transform: translateX(4px); }
            75% { transform: translateX(-2px); }
        }

        .sg-meta {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            min-height: 20px;
            margin-top: 6px;
        }

        .sg-hint {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.4;
            color: var(--sg-err);
        }

        .sg-hint:empty {
            display: none;
        }

        .sg-field.is-blocked:not(.is-invalid) .sg-hint {
            color: #b45309;
        }

        .sg-count {
            margin-left: auto;
            font-size: 12px;
            font-weight: 700;
            color: var(--sg-muted);
            font-variant-numeric: tabular-nums;
        }

        .sg-field.is-valid .sg-count {
            color: var(--sg-ok);
        }

        /* Choice: shared visually-hidden radio */
        .sg-choice input {
            position: absolute;
            opacity: 0;
            width: 1px;
            height: 1px;
            pointer-events: none;
        }

        /* Class pills */
        .sg-seg {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        .sg-seg label {
            position: relative;
            margin: 0;
            cursor: pointer;
        }

        .sg-seg span {
            display: grid;
            place-items: center;
            height: 46px;
            padding: 0 8px;
            border: 1.5px solid var(--sg-line);
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            color: var(--sg-ink);
            background: #fbfbfc;
            transition: all .2s ease;
        }

        .sg-seg label:hover span {
            border-color: rgba(var(--sg-accent-rgb), .6);
        }

        .sg-seg input:checked + span {
            color: #fff;
            border-color: var(--sg-ink);
            background: var(--sg-ink);
            box-shadow: 0 8px 18px rgba(var(--sg-ink-rgb), .18);
        }

        .sg-choice input:focus-visible + span {
            outline: 3px solid var(--sg-accent);
            outline-offset: 2px;
        }

        /* Course tiles */
        .sg-tiles {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .sg-tiles label {
            position: relative;
            margin: 0;
            cursor: pointer;
        }

        .sg-tile {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            height: 100%;
            padding: 14px;
            border: 1.5px solid var(--sg-line);
            border-radius: 14px;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.3;
            color: var(--sg-ink);
            background: #fbfbfc;
            transition: border-color .2s ease, background .2s ease, transform .25s var(--sg-ease), box-shadow .25s ease;
        }

        .sg-tile__icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 14px;
            color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .1);
            transition: background .2s ease, color .2s ease;
        }

        .sg-tile__check {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 9px;
            color: #fff;
            background: var(--sg-accent);
            opacity: 0;
            transform: scale(.4);
            transition: opacity .2s ease, transform .3s var(--sg-ease);
        }

        .sg-tiles label:hover .sg-tile {
            border-color: rgba(var(--sg-accent-rgb), .6);
            transform: translateY(-2px);
        }

        .sg-tiles input:checked + .sg-tile {
            border-color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .06);
            box-shadow: 0 10px 22px rgba(var(--sg-accent-rgb), .15);
        }

        .sg-tiles input:checked + .sg-tile .sg-tile__icon {
            color: #fff;
            background: var(--sg-accent);
        }

        .sg-tiles input:checked + .sg-tile .sg-tile__check {
            opacity: 1;
            transform: scale(1);
        }

        .sg-field.is-invalid .sg-seg span,
        .sg-field.is-invalid .sg-tile {
            border-color: rgba(220, 38, 38, .45);
        }

        .sg-hp {
            position: absolute !important;
            left: -9999px;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }

        .sg-form__foot {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid var(--sg-line);
        }

        .sg-form__privacy {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 0;
            max-width: 330px;
            font-size: 13px;
            line-height: 1.55;
            color: var(--sg-muted);
        }

        .sg-form__privacy i {
            margin-top: 3px;
            color: var(--sg-ok);
        }

        .sg-submit {
            min-width: 220px;
        }

        .sg-submit[disabled] {
            cursor: progress;
            opacity: .85;
            transform: none !important;
        }

        .sg-spinner {
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255, 255, 255, .4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: sgSpin .7s linear infinite;
        }

        @keyframes sgSpin {
            to { transform: rotate(360deg); }
        }

        /* Alerts */
        .sg-alert {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 12px;
            margin-bottom: 24px;
            padding: 16px 18px;
            border-radius: 14px;
            font-size: 15px;
            line-height: 1.55;
            color: var(--sg-err);
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .sg-alert i {
            margin-top: 3px;
        }

        .sg-alert strong {
            display: block;
        }

        .sg-alert a {
            font-weight: 700;
            color: inherit;
            text-decoration: underline;
        }

        /* Success state */
        .sg-success {
            padding: 30px 10px 10px;
            text-align: center;
            outline: none;
        }

        .sg-success__mark {
            width: 88px;
            height: 88px;
            margin: 0 auto 22px;
        }

        .sg-success__mark circle {
            fill: rgba(22, 163, 74, .1);
            stroke: var(--sg-ok);
            stroke-width: 3;
            stroke-dasharray: 260;
            stroke-dashoffset: 260;
            animation: sgDraw .8s var(--sg-ease) forwards;
        }

        .sg-success__mark path {
            fill: none;
            stroke: var(--sg-ok);
            stroke-width: 5;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 60;
            stroke-dashoffset: 60;
            animation: sgDraw .5s var(--sg-ease) .6s forwards;
        }

        @keyframes sgDraw {
            to { stroke-dashoffset: 0; }
        }

        .sg-success__title {
            margin: 0 0 10px;
            font-size: clamp(24px, 2.6vw, 30px);
            font-weight: 800;
        }

        .sg-success__text {
            max-width: 440px;
            margin: 0 auto 26px;
            font-size: 16px;
            line-height: 1.7;
            color: var(--sg-muted);
        }

        .sg-success__actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
        }

        /* Journey aside */
        .sg-journey {
            position: sticky;
            top: var(--sg-sticky);
            overflow: hidden;
            padding: 38px 34px;
            border-radius: 28px;
            color: #fff;
            background:
                radial-gradient(circle at 100% 0%, rgba(var(--sg-accent-rgb), .3) 0%, transparent 45%),
                var(--sg-dark);
        }

        .sg-journey__title {
            margin: 0 0 10px;
            font-size: 26px;
            font-weight: 800;
            line-height: 1.2;
            color: #fff !important;
        }

        .sg-journey__text {
            margin: 0 0 28px;
            font-size: 15px;
            line-height: 1.65;
            color: rgba(255, 255, 255, .66);
        }

        .sg-steps {
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none;
            counter-reset: step;
        }

        .sg-steps::before,
        .sg-steps::after {
            content: "";
            position: absolute;
            top: 16px;
            bottom: 16px;
            left: 16px;
            width: 2px;
        }

        .sg-steps::before {
            background: rgba(255, 255, 255, .1);
        }

        .sg-steps::after {
            background: var(--sg-accent);
            transform-origin: top;
            transition: transform 1.4s var(--sg-ease) .3s;
        }

        .sg-js .sg-journey:not(.is-in) .sg-steps::after {
            transform: scaleY(0);
        }

        .sg-steps li {
            position: relative;
            z-index: 1;
            padding: 0 0 22px 52px;
            counter-increment: step;
        }

        .sg-steps li:last-child {
            padding-bottom: 0;
        }

        .sg-steps li::before {
            content: counter(step);
            position: absolute;
            top: 0;
            left: 0;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            font-weight: 800;
            color: #fff;
            background: var(--sg-dark);
            border: 2px solid var(--sg-accent);
        }

        .sg-steps li:last-child::before {
            background: var(--sg-accent);
        }

        .sg-steps strong {
            display: block;
            padding-top: 5px;
            font-size: 16px;
            line-height: 1.4;
        }

        .sg-steps span {
            display: block;
            font-size: 14px;
            color: rgba(255, 255, 255, .55);
        }

        .sg-journey__foot {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            font-size: 14px;
            color: rgba(255, 255, 255, .7);
        }

        .sg-journey__foot a {
            font-weight: 800;
            color: #fff;
            text-decoration: none;
        }

        .sg-journey__foot i {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .15);
        }

        /* ==========================================================
           Why contact (strike-through moment)
           ========================================================== */
        .sg-why {
            padding: 110px 0;
        }

        .sg-why__inner {
            max-width: 880px;
            margin: 0 auto;
            text-align: center;
        }

        .sg-why__lead,
        .sg-why__turn {
            margin: 0 0 14px;
            font-size: 18px;
            color: var(--sg-muted);
        }

        .sg-why__turn {
            margin: 26px 0 14px;
        }

        .sg-why__q {
            display: inline-block;
            position: relative;
            margin: 0;
            font-size: clamp(28px, 4vw, 50px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -.03em;
        }

        .sg-why__q--old {
            color: rgba(var(--sg-ink-rgb), .32);
        }

        .sg-why__q--old::after {
            content: "";
            position: absolute;
            left: -2%;
            top: 54%;
            width: 104%;
            height: 5px;
            border-radius: 5px;
            background: var(--sg-accent);
            transform-origin: left;
            transition: transform .8s var(--sg-ease) .35s;
        }

        .sg-js .sg-why:not(.is-in) .sg-why__q--old::after {
            transform: scaleX(0);
        }

        .sg-why__q--new {
            color: var(--sg-ink);
            background: linear-gradient(transparent 62%, rgba(var(--sg-accent-rgb), .22) 62%) no-repeat 0 0 / 100% 100%;
            transition: background-size 1s var(--sg-ease) 1.1s;
        }

        .sg-js .sg-why:not(.is-in) .sg-why__q--new {
            background-size: 0 100%;
        }

        .sg-why__text {
            max-width: 640px;
            margin: 34px auto 0;
            font-size: 17px;
            line-height: 1.75;
            color: var(--sg-muted);
        }

        .sg-why__text strong {
            color: var(--sg-ink);
        }

        /* ==========================================================
           Visit
           ========================================================== */
        .sg-visit {
            padding-bottom: 60px;
        }

        .sg-visit__card {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            border: 1px solid var(--sg-line);
            border-radius: 28px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 20px 50px rgba(var(--sg-ink-rgb), .06);
        }

        .sg-visit__info {
            padding: 44px;
        }

        .sg-visit__title {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 800;
        }

        .sg-visit__text {
            margin: 0 0 24px;
            font-size: 16px;
            color: var(--sg-muted);
        }

        .sg-branches {
            display: grid;
            gap: 10px;
            margin: 0 0 26px;
            padding: 0;
            list-style: none;
        }

        .sg-branch {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 14px;
            width: 100%;
            padding: 18px;
            border: 1.5px solid var(--sg-line);
            border-radius: 16px;
            text-align: left;
            background: #fff;
            cursor: pointer;
            transition: border-color .2s ease, background .2s ease;
        }

        .sg-branch i {
            margin-top: 3px;
            color: var(--sg-accent);
        }

        .sg-branch[aria-pressed="true"] {
            border-color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .05);
        }

        .sg-branch strong {
            display: block;
            margin-bottom: 4px;
            font-size: 17px;
            color: var(--sg-ink);
        }

        .sg-branch span {
            display: block;
            font-size: 14px;
            line-height: 1.55;
            color: var(--sg-muted);
        }

        .sg-visit__map {
            position: relative;
            min-height: 440px;
            background: var(--sg-soft);
        }

        .sg-visit__map iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: 0;
            filter: saturate(.9);
        }

        /* ==========================================================
           Final CTA (same system as Results page)
           ========================================================== */
        .sg-cta-repo {
            padding: 40px 0 110px;
        }

        .sg-cta__card {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
            align-items: center;
            padding: 60px 55px;
            border-radius: 26px;
            background: linear-gradient(150deg, #2b3846 0%, var(--eduhive-base) 100%);
            box-shadow: 0 25px 60px rgba(var(--eduhive-base-rgb), .25);
        }

        .sg-cta__card::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 260px;
            height: 260px;
            background-image: radial-gradient(circle, rgba(255, 255, 255, .1) 1.5px, transparent 1.5px);
            background-size: 16px 16px;
            opacity: .5;
            pointer-events: none;
        }

        .sg-cta__card::after {
            content: "";
            position: absolute;
            bottom: -90px;
            left: -60px;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(var(--eduhive-primary-rgb), .3) 0%, transparent 70%);
            pointer-events: none;
        }

        .sg-cta__content {
            position: relative;
            z-index: 1;
        }

        .sg-cta__tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            padding: 7px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #fff;
            background: rgba(var(--eduhive-primary-rgb), .18);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .35);
        }

        .sg-cta__tag i {
            color: var(--eduhive-primary);
            font-size: 14px;
        }

        .sg-cta__title {
            margin: 0 0 14px;
            font-size: clamp(28px, 3vw, 40px);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -.015em;
            color: #fff !important;
        }

        .sg-cta__text {
            margin: 0;
            max-width: 480px;
            font-size: 16px;
            line-height: 1.7;
            color: rgba(255, 255, 255, .72);
        }

        .sg-cta__actions {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            gap: 14px;
            justify-self: end;
            width: 100%;
            max-width: 320px;
        }

        .sg-cta__btn {
            --btn-ease: cubic-bezier(.22, 1, .36, 1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 16px 20px 16px 24px;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none !important;
            transition: transform .4s var(--btn-ease), box-shadow .4s var(--btn-ease),
                background .35s ease, border-color .35s ease;
        }

        .sg-cta__btn-icon {
            flex-shrink: 0;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 13px;
            transition: transform .4s var(--btn-ease), background .35s ease;
        }

        .sg-cta__btn--primary {
            background: var(--eduhive-primary);
            color: #fff !important;
            box-shadow: 0 12px 28px rgba(var(--eduhive-primary-rgb), .35);
        }

        .sg-cta__btn--primary .sg-cta__btn-icon {
            background: rgba(255, 255, 255, .18);
            color: #fff;
        }

        .sg-cta__btn--primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 38px rgba(var(--eduhive-primary-rgb), .45);
        }

        .sg-cta__btn--primary:hover .sg-cta__btn-icon {
            transform: translateX(4px);
            background: rgba(255, 255, 255, .28);
        }

        .sg-cta__btn--ghost {
            color: #fff !important;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .18);
        }

        .sg-cta__btn--ghost .sg-cta__btn-icon {
            color: #fff;
            background: var(--sg-wa);
        }

        .sg-cta__btn--ghost:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .35);
        }

        /* ==========================================================
           Responsive
           ========================================================== */
        @media (max-width: 1199px) {
            .sg-enquiry__grid {
                grid-template-columns: 1fr;
            }

            .sg-journey {
                position: relative;
                top: 0;
            }

            .sg-tiles {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 991px) {
            .sg-intro {
                grid-template-columns: 1fr;
                gap: 44px;
            }

            .sg-visit__card {
                grid-template-columns: 1fr;
            }

            .sg-visit__map {
                min-height: 320px;
            }

            .sg-tiles {
                grid-template-columns: repeat(3, 1fr);
            }

            .sg-cta__card {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 44px 34px;
            }

            .sg-cta__actions {
                justify-self: start;
                max-width: 420px;
            }
        }

        @media (max-width: 767px) {
            .sg-contact {
                --sg-sticky: 90px;
            }

            .sg-intro-sec {
                padding: 70px 0 60px;
            }

            .sg-enquiry {
                padding: 64px 0;
            }

            .sg-form-card {
                padding: 30px 20px;
                border-radius: 22px;
            }

            .sg-form-card__head {
                flex-direction: column;
                align-items: stretch;
            }

            .sg-row {
                grid-template-columns: 1fr;
            }

            .sg-seg {
                grid-template-columns: repeat(4, 1fr);
            }

            .sg-seg span {
                font-size: 13px;
            }

            .sg-tiles {
                grid-template-columns: repeat(2, 1fr);
            }

            .sg-form__foot {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .sg-submit {
                width: 100%;
            }

            .sg-journey {
                padding: 30px 22px;
                border-radius: 22px;
            }

            .sg-why {
                padding: 76px 0;
            }

            .sg-visit__info {
                padding: 28px 22px;
            }

            .sg-reach__card {
                grid-template-columns: 48px 1fr;
                padding: 18px;
            }

            .sg-reach__icon {
                width: 48px;
                height: 48px;
                font-size: 19px;
            }

            .sg-reach__go {
                display: none;
            }
        }

        @media (max-width: 575px) {
            .sg-cta__card {
                padding: 36px 24px;
                border-radius: 20px;
            }

            .sg-cta__actions {
                max-width: none;
            }
        }

        @media (max-width: 380px) {
            .sg-seg {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .sg-js .sg-rv {
                opacity: 1;
                transform: none;
            }

            .sg-contact *,
            .sg-contact *::before,
            .sg-contact *::after {
                animation: none !important;
                transition: none !important;
            }

            .sg-js .sg-why .sg-why__q--old::after,
            .sg-js .sg-journey .sg-steps::after {
                transform: none !important;
            }

            .sg-js .sg-why .sg-why__q--new {
                background-size: 100% 100% !important;
            }

            .sg-success__mark circle,
            .sg-success__mark path {
                stroke-dashoffset: 0;
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
                    <li><span>Contact Us</span></li>
                </ul>
                <h1 class="page-header__title">Contact Us</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    <div class="sg-contact">

        {{-- ================= INTRO + WAYS TO REACH US ================= --}}
        <section class="sg-intro-sec">
            <div class="container">
                <div class="sg-intro">
                    <div class="sg-rv">
                        <span class="sg-kicker"><span class="sg-kicker__dot" aria-hidden="true"></span>
                            Talk to our academic team</span>
                        <h2 class="sg-intro__title">Let’s plan your academic journey.</h2>
                        <p class="sg-intro__text">Choosing the right course is an important decision. Tell us the goal,
                            and our team will help you find the right program for it.</p>

                        <ul class="sg-chips" aria-label="Pick a course to enquire about">
                            @foreach ($courses as $key => $label)
                                @continue($key === 'not-sure')
                                <li><a href="{{ url('/contact?course=' . $key) }}#enquiry" data-course="{{ $key }}">
                                        <i class="fas {{ $courseIcons[$key] ?? 'fa-book' }}" aria-hidden="true"></i>{{ $label }}</a></li>
                            @endforeach
                        </ul>

                        <div class="sg-intro__cta">
                            <a href="#enquiry" class="sg-btn sg-btn--primary">Book academic counselling
                                <span class="sg-btn__icon"><i class="icon-right-arrow" aria-hidden="true"></i></span></a>
                            <span class="sg-intro__call">or call <a href="tel:{{ $phoneIntl }}">{{ $phoneDisplay }}</a></span>
                        </div>
                    </div>

                    <ul class="sg-reach">
                        <li class="sg-rv" style="--d:100ms">
                            <a class="sg-reach__card" href="tel:{{ $phoneIntl }}">
                                <span class="sg-reach__icon" aria-hidden="true"><i class="fas fa-phone-alt"></i></span>
                                <span>
                                    <span class="sg-reach__label">Call us</span>
                                    <span class="sg-reach__value">{{ $phoneDisplay }}</span>
                                    <span class="sg-reach__sub">Courses, batches, fees or admissions</span>
                                </span>
                                <span class="sg-reach__go" aria-hidden="true"><i class="icon-right-arrow"></i></span>
                            </a>
                        </li>
                        <li class="sg-rv" style="--d:200ms">
                            <a class="sg-reach__card sg-reach__card--wa" href="{{ $waLink }}" target="_blank" rel="noopener">
                                <span class="sg-reach__icon" aria-hidden="true"><i class="fab fa-whatsapp"></i></span>
                                <span>
                                    <span class="sg-reach__label">WhatsApp us</span>
                                    <span class="sg-reach__value">{{ $phoneDisplay }}</span>
                                    <span class="sg-reach__sub">Batch timings, fees, admission process, JEE / NEET planning</span>
                                </span>
                                <span class="sg-reach__go" aria-hidden="true"><i class="icon-right-arrow"></i></span>
                            </a>
                        </li>
                        <li class="sg-rv" style="--d:300ms">
                            <a class="sg-reach__card" href="{{ $branches[0]['directions'] }}" target="_blank" rel="noopener">
                                <span class="sg-reach__icon" aria-hidden="true"><i class="fas fa-map-marker-alt"></i></span>
                                <span>
                                    <span class="sg-reach__label">Visit us · {{ $branches[0]['name'] }}</span>
                                    <span class="sg-reach__sub">{{ $branches[0]['address'] }}</span>
                                </span>
                                <span class="sg-reach__go" aria-hidden="true"><i class="icon-right-arrow"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- ================= ENQUIRY FORM + COUNSELLING JOURNEY ================= --}}
        <section class="sg-enquiry">
            <div class="container">
                <div class="sg-enquiry__grid">

                    <div class="sg-form-card sg-rv" id="enquiry">
                        @if ($success)
                            {{-- ---------- Success ---------- --}}
                            <div class="sg-success" role="status" tabindex="-1" id="sg-success">
                                <svg class="sg-success__mark" viewBox="0 0 88 88" aria-hidden="true">
                                    <circle cx="44" cy="44" r="40"></circle>
                                    <path d="M28 45 l11 11 l22 -24"></path>
                                </svg>
                                <h2 class="sg-success__title">Thanks, {{ $success }}. We’ve received your enquiry.</h2>
                                <p class="sg-success__text">Our academic team will call you back on the number you
                                    shared. Need a quicker answer? Message us on WhatsApp.</p>
                                <div class="sg-success__actions">
                                    <a href="{{ $waLink }}" target="_blank" rel="noopener" class="sg-btn sg-btn--wa">
                                        <i class="fab fa-whatsapp" aria-hidden="true"></i> Chat on WhatsApp</a>
                                    <a href="{{ route('contact') }}#enquiry" class="sg-btn sg-btn--line">Send another enquiry</a>
                                </div>
                            </div>
                        @else
                            {{-- ---------- Form ---------- --}}
                            <div class="sg-form-card__head">
                                <div>
                                    <h2 class="sg-form-card__title">Send us an enquiry</h2>
                                    <p class="sg-form-card__sub">Fill in your details and our team will get back to you.</p>
                                </div>
                                <div class="sg-meter" aria-hidden="true">
                                    <div class="sg-meter__label"><span>Required details</span><b><span data-meter-count>0</span> / 4</b></div>
                                    <div class="sg-meter__track"><div class="sg-meter__bar"></div></div>
                                </div>
                            </div>

                            @if (session('enquiry_error'))
                                <div class="sg-alert" role="alert">
                                    <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                                    <div><strong>Your enquiry couldn’t be sent.</strong>
                                        Please try again, or call <a href="tel:{{ $phoneIntl }}">{{ $phoneDisplay }}</a>.</div>
                                </div>
                            @elseif ($errors->any())
                                <div class="sg-alert" role="alert">
                                    <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                                    <div><strong>A few details need fixing.</strong> Check the highlighted fields below.</div>
                                </div>
                            @endif

                            <form class="sg-form" method="POST" action="{{ route('contact.store') }}" novalidate>
                                @csrf

                                <div class="sg-hp" aria-hidden="true">
                                    <label for="website">Website</label>
                                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                                </div>

                                {{-- 1. Student details --}}
                                <fieldset class="sg-group">
                                    <legend class="sg-group__title"><span class="sg-group__num">1</span>Student details</legend>

                                    <div class="sg-row">
                                        <div class="sg-field @error('student_name') is-invalid @enderror" data-field="student_name">
                                            <label for="student_name"><span>Student name <span class="sg-req" aria-hidden="true">*</span></span></label>
                                            <div class="sg-input">
                                                <i class="fas fa-user-graduate sg-input__icon" aria-hidden="true"></i>
                                                <input type="text" id="student_name" name="student_name"
                                                    value="{{ old('student_name') }}" autocomplete="name"
                                                    autocapitalize="words" spellcheck="false" maxlength="80"
                                                    placeholder="e.g. Aarav Patil" required aria-required="true"
                                                    aria-describedby="hint-student_name"
                                                    @error('student_name') aria-invalid="true" @enderror
                                                    data-only="letters">
                                                <span class="sg-input__ok" aria-hidden="true"><i class="fas fa-check"></i></span>
                                            </div>
                                            <div class="sg-meta"><p class="sg-hint" id="hint-student_name" aria-live="polite">@error('student_name'){{ $message }}@enderror</p></div>
                                        </div>

                                        <div class="sg-field @error('parent_name') is-invalid @enderror" data-field="parent_name">
                                            <label for="parent_name"><span>Parent / guardian name</span><span class="sg-opt">Optional</span></label>
                                            <div class="sg-input">
                                                <i class="fas fa-user sg-input__icon" aria-hidden="true"></i>
                                                <input type="text" id="parent_name" name="parent_name"
                                                    value="{{ old('parent_name') }}" autocapitalize="words"
                                                    spellcheck="false" maxlength="80" placeholder="e.g. Sunita Patil"
                                                    aria-describedby="hint-parent_name"
                                                    @error('parent_name') aria-invalid="true" @enderror
                                                    data-only="letters">
                                                <span class="sg-input__ok" aria-hidden="true"><i class="fas fa-check"></i></span>
                                            </div>
                                            <div class="sg-meta"><p class="sg-hint" id="hint-parent_name" aria-live="polite">@error('parent_name'){{ $message }}@enderror</p></div>
                                        </div>
                                    </div>

                                    <div class="sg-field @error('mobile') is-invalid @enderror" data-field="mobile">
                                        <label for="mobile"><span>Mobile number <span class="sg-req" aria-hidden="true">*</span></span><span class="sg-opt">We’ll call you on this</span></label>
                                        <div class="sg-input sg-input--phone">
                                            <i class="fas fa-mobile-alt sg-input__icon" aria-hidden="true"></i>
                                            <span class="sg-input__prefix" aria-hidden="true">+91</span>
                                            <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}"
                                                inputmode="numeric" pattern="[0-9]*" autocomplete="tel-national"
                                                maxlength="16" placeholder="98765 43210" required aria-required="true"
                                                aria-describedby="hint-mobile count-mobile"
                                                @error('mobile') aria-invalid="true" @enderror
                                                data-only="digits">
                                            <span class="sg-input__ok" aria-hidden="true"><i class="fas fa-check"></i></span>
                                        </div>
                                        <div class="sg-meta">
                                            <p class="sg-hint" id="hint-mobile" aria-live="polite">@error('mobile'){{ $message }}@enderror</p>
                                            <span class="sg-count" id="count-mobile"><span data-count>{{ strlen((string) old('mobile')) }}</span>/10</span>
                                        </div>
                                    </div>
                                </fieldset>

                                {{-- 2. Academic details --}}
                                <fieldset class="sg-group">
                                    <legend class="sg-group__title"><span class="sg-group__num">2</span>Academic details</legend>

                                    <fieldset class="sg-field sg-choice @error('current_class') is-invalid @enderror" data-field="current_class"
                                        aria-describedby="hint-current_class">
                                        <legend><span>Current class <span class="sg-req" aria-hidden="true">*</span></span></legend>
                                        <div class="sg-seg">
                                            @foreach ($classes as $key => $label)
                                                <label>
                                                    <input type="radio" name="current_class" value="{{ $key }}" required
                                                        @checked((string) old('current_class') === (string) $key)>
                                                    <span>{{ str_replace('Class ', '', $label) === $label ? $label : str_replace('Class ', '', $label) . 'th' }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class="sg-meta"><p class="sg-hint" id="hint-current_class" aria-live="polite">@error('current_class'){{ $message }}@enderror</p></div>
                                    </fieldset>

                                    <div class="sg-field @error('school') is-invalid @enderror" data-field="school">
                                        <label for="school"><span>School / college name</span><span class="sg-opt">Optional</span></label>
                                        <div class="sg-input">
                                            <i class="fas fa-school sg-input__icon" aria-hidden="true"></i>
                                            <input type="text" id="school" name="school" value="{{ old('school') }}"
                                                autocapitalize="words" maxlength="120"
                                                placeholder="e.g. K. C. Gandhi School, Kalyan"
                                                aria-describedby="hint-school"
                                                @error('school') aria-invalid="true" @enderror
                                                data-only="school">
                                            <span class="sg-input__ok" aria-hidden="true"><i class="fas fa-check"></i></span>
                                        </div>
                                        <div class="sg-meta"><p class="sg-hint" id="hint-school" aria-live="polite">@error('school'){{ $message }}@enderror</p></div>
                                    </div>

                                    <fieldset class="sg-field sg-choice @error('interested_course') is-invalid @enderror" data-field="interested_course"
                                        aria-describedby="hint-interested_course">
                                        <legend><span>Interested course <span class="sg-req" aria-hidden="true">*</span></span></legend>
                                        <div class="sg-tiles">
                                            @foreach ($courses as $key => $label)
                                                <label>
                                                    <input type="radio" name="interested_course" value="{{ $key }}" required
                                                        @checked($oldCourse === $key)>
                                                    <span class="sg-tile">
                                                        <span class="sg-tile__icon" aria-hidden="true"><i class="fas {{ $courseIcons[$key] ?? 'fa-book' }}"></i></span>
                                                        {{ $label }}
                                                        <span class="sg-tile__check" aria-hidden="true"><i class="fas fa-check"></i></span>
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class="sg-meta"><p class="sg-hint" id="hint-interested_course" aria-live="polite">@error('interested_course'){{ $message }}@enderror</p></div>
                                    </fieldset>

                                    <div class="sg-field" data-field="message">
                                        <label for="message"><span>Your message</span><span class="sg-opt">Optional</span></label>
                                        <div class="sg-input sg-input--area">
                                            <textarea id="message" name="message" maxlength="1000"
                                                aria-describedby="count-message"
                                                placeholder="Current marks, target exam, preferred batch timing or any question.">{{ old('message') }}</textarea>
                                        </div>
                                        <div class="sg-meta"><span class="sg-count" id="count-message"><span data-count>{{ mb_strlen((string) old('message')) }}</span>/1000</span></div>
                                    </div>
                                </fieldset>

                                <div class="sg-form__foot">
                                    <p class="sg-form__privacy"><i class="fas fa-lock" aria-hidden="true"></i>
                                        Your details are used only to respond to this enquiry.</p>
                                    <button type="submit" class="sg-btn sg-btn--primary sg-submit">
                                        <span data-label>Submit enquiry</span>
                                        <span class="sg-btn__icon" data-icon><i class="icon-right-arrow" aria-hidden="true"></i></span>
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>

                    <aside class="sg-journey sg-rv" style="--d:150ms" aria-labelledby="sg-journey-title">
                        <h2 class="sg-journey__title" id="sg-journey-title">Not sure which program is right for you?</h2>
                        <p class="sg-journey__text">You don’t have to figure it out alone. In a counselling session we
                            work through:</p>
                        <ol class="sg-steps">
                            @foreach ($journey as $step)
                                <li><strong>{{ $step['title'] }}</strong><span>{{ $step['text'] }}</span></li>
                            @endforeach
                        </ol>
                        <div class="sg-journey__foot">
                            <i class="fas fa-phone-alt" aria-hidden="true"></i>
                            <span>Prefer to talk now? Call <a href="tel:{{ $phoneIntl }}">{{ $phoneDisplay }}</a></span>
                        </div>
                    </aside>

                </div>
            </div>
        </section>

        {{-- ================= WHY CONTACT ================= --}}
        <section class="sg-why sg-rv">
            <div class="container">
                <div class="sg-why__inner">
                    <p class="sg-why__lead">Choosing a coaching class shouldn’t begin with</p>
                    <p class="sg-why__q sg-why__q--old">“How much are the fees?”</p>
                    <p class="sg-why__turn">It should begin with</p>
                    <p class="sg-why__q sg-why__q--new">“What does my child actually need?”</p>
                    <p class="sg-why__text">We help students and parents understand the <strong>goal, preparation
                            pathway and academic requirements</strong> before choosing a program.</p>
                </div>
            </div>
        </section>

        {{-- ================= VISIT ================= --}}
        <section class="sg-visit">
            <div class="container">
                <div class="sg-visit__card sg-rv">
                    <div class="sg-visit__info">
                        <h2 class="sg-visit__title">Visit SG Education</h2>
                        <p class="sg-visit__text">Meet our academic team at your nearest branch.</p>

                        <ul class="sg-branches">
                            @foreach ($branches as $i => $b)
                                <li>
                                    <button type="button" class="sg-branch" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}"
                                        data-embed="{{ $b['embed'] }}" data-directions="{{ $b['directions'] }}">
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                        <span><strong>{{ $b['name'] }}</strong><span>{{ $b['address'] }}</span></span>
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ $branches[0]['directions'] }}" target="_blank" rel="noopener"
                            class="sg-btn sg-btn--primary" id="sg-directions">Get directions
                            <span class="sg-btn__icon"><i class="icon-right-arrow" aria-hidden="true"></i></span></a>
                    </div>
                    <div class="sg-visit__map">
                        <iframe id="sg-map" src="{{ $branches[0]['embed'] }}" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Map: SG Education {{ $branches[0]['name'] }} branch"></iframe>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= FINAL CTA ================= --}}
        <section class="sg-cta-repo">
            <div class="container">
                <div class="sg-cta__card sg-rv">
                    <div class="sg-cta__content">
                        <span class="sg-cta__tag"><i class="icon-medal" aria-hidden="true"></i> Start your SG journey</span>
                        <h2 class="sg-cta__title">Your Goal.<br>Our Strategy.</h2>
                        <p class="sg-cta__text">Stronger school academics, Science, IIT through JEE, medicine through
                            NEET, MHT-CET, NDA or Foundation. Let’s start with a conversation.</p>
                    </div>
                    <div class="sg-cta__actions">
                        <a href="#enquiry" class="sg-cta__btn sg-cta__btn--primary">
                            <span>Book Academic Counselling</span>
                            <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                        </a>
                        <a href="{{ $waLink }}" target="_blank" rel="noopener" class="sg-cta__btn sg-cta__btn--ghost">
                            <span>Chat on WhatsApp</span>
                            <span class="sg-cta__btn-icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

@section('scripts')
    <script>
        (function () {
            'use strict';
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var root = document.querySelector('.sg-contact');
            if (!root) return;

            /* ==========================================================
               1. Scroll reveal
               ========================================================== */
            var revealTargets = root.querySelectorAll('.sg-rv, .sg-journey');
            if ('IntersectionObserver' in window && !reduce) {
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); }
                    });
                }, { threshold: 0.18, rootMargin: '0px 0px -40px 0px' });
                revealTargets.forEach(function (el) { io.observe(el); });
            } else {
                revealTargets.forEach(function (el) { el.classList.add('is-in'); });
            }

            /* Success state: bring it into view and announce */
            var success = document.getElementById('sg-success');
            if (success) {
                success.closest('.sg-rv') && success.closest('.sg-rv').classList.add('is-in');
                setTimeout(function () { success.focus({ preventScroll: true }); }, 50);
            }

            /* ==========================================================
               2. Input filters: letters-only / digits-only while typing & pasting
               ========================================================== */
            var RE = {};
            try {
                RE.letters = /[^\p{L}\p{M}\s.'-]/gu;
                RE.school = /[^\p{L}\p{M}\p{N}\s.,'&()\/-]/gu;
            } catch (e) { // very old browsers
                RE.letters = /[^A-Za-z\u00C0-\u024F\u0900-\u097F\s.'-]/g;
                RE.school = /[^A-Za-z0-9\u00C0-\u024F\u0900-\u097F\s.,'&()\/-]/g;
            }
            var BLOCK_MSG = {
                letters: 'Only letters are allowed in a name.',
                digits: 'Only numbers can be entered here.',
                school: 'Special characters aren’t allowed here.'
            };

            function cleanDigits(v) {
                var d = v.replace(/\D/g, '');
                if (d.length > 10) {
                    if (d.length === 12 && d.indexOf('91') === 0) d = d.slice(2);   // +91 pasted
                    else if (d.length === 11 && d.charAt(0) === '0') d = d.slice(1); // 0 prefix
                }
                return d.slice(0, 10);
            }

            function cleanText(v, re) {
                return v.replace(re, '').replace(/^\s+/, '').replace(/\s{2,}/g, ' ');
            }

            var blockTimers = {};
            function flashBlocked(field, type) {
                var wrap = field.closest('.sg-field');
                var hint = wrap.querySelector('.sg-hint');
                wrap.classList.remove('is-blocked');
                void wrap.offsetWidth; // restart shake
                wrap.classList.add('is-blocked');
                if (!wrap.classList.contains('is-invalid')) hint.textContent = BLOCK_MSG[type];
                clearTimeout(blockTimers[field.name]);
                blockTimers[field.name] = setTimeout(function () {
                    wrap.classList.remove('is-blocked');
                    if (!wrap.classList.contains('is-invalid')) hint.textContent = '';
                }, 1800);
            }

            root.querySelectorAll('[data-only]').forEach(function (field) {
                var type = field.getAttribute('data-only');

                // Block disallowed keystrokes before they appear (desktop keyboards)
                field.addEventListener('beforeinput', function (e) {
                    if (!e.data || e.inputType !== 'insertText') return;
                    if (RE[type]) RE[type].lastIndex = 0;
                    var bad = type === 'digits' ? /\D/.test(e.data) : RE[type].test(e.data);
                    if (bad) { e.preventDefault(); flashBlocked(field, type); }
                });

                // Sanitize everything else (paste, autofill, mobile keyboards, IME)
                field.addEventListener('input', function () {
                    var v = field.value;
                    var pos = field.selectionStart || v.length;
                    var clean = type === 'digits' ? cleanDigits(v) : cleanText(v, RE[type]);
                    if (clean !== v) {
                        var before = type === 'digits' ? cleanDigits(v.slice(0, pos)) : cleanText(v.slice(0, pos), RE[type]);
                        field.value = clean;
                        var caret = Math.min(before.length, clean.length);
                        try { field.setSelectionRange(caret, caret); } catch (e) { }
                        // Only warn if the user typed something invalid (not when we just trimmed +91)
                        var typedBad = type === 'digits' ? /[^\d\s+\-()]/.test(v) : clean.length < v.replace(/\s{2,}/g, ' ').trimStart().length;
                        if (typedBad) flashBlocked(field, type);
                    }
                });
            });

            /* Title-case names on blur if typed all lower/upper case: "aarav patil" → "Aarav Patil" */
            root.querySelectorAll('[data-only="letters"]').forEach(function (f) {
                f.addEventListener('blur', function () {
                    var v = f.value.trim().replace(/\s{2,}/g, ' ');
                    if (v && (v === v.toLowerCase() || v === v.toUpperCase())) {
                        v = v.toLowerCase().replace(/(^|[\s'.-])(\S)/g, function (m, a, b) { return a + b.toUpperCase(); });
                    }
                    f.value = v;
                });
            });

            /* ==========================================================
               3. Validation (mirrors ContactController rules)
               ========================================================== */
            var form = root.querySelector('.sg-form');
            if (form) {
                var letterCount = function (v) { return v.replace(/[\s.'-]/g, '').length; };

                var rules = {
                    student_name: function (v) {
                        v = v.trim();
                        if (!v) return 'Enter the student’s name.';
                        if (letterCount(v) < 2) return 'Name looks too short.';
                        return '';
                    },
                    parent_name: function (v) {
                        v = v.trim();
                        if (v && letterCount(v) < 2) return 'Name looks too short.';
                        return '';
                    },
                    mobile: function (v) {
                        if (!v) return 'Enter a mobile number so we can call you back.';
                        if (!/^[6-9]/.test(v)) return 'Indian mobile numbers start with 6, 7, 8 or 9.';
                        if (v.length < 10) return 'Enter all 10 digits (' + v.length + '/10 so far).';
                        return '';
                    },
                    school: function () { return ''; },
                    current_class: function (v) { return v ? '' : 'Select the student’s current class.'; },
                    interested_course: function (v) { return v ? '' : 'Select the course you’re interested in.'; }
                };
                var required = ['student_name', 'mobile', 'current_class', 'interested_course'];
                var touched = {};

                function valueOf(name) {
                    if (form.querySelector('input[type="radio"][name="' + name + '"]')) {
                        var c = form.querySelector('input[name="' + name + '"]:checked');
                        return c ? c.value : '';
                    }
                    var el = form.elements[name];
                    return el ? el.value : '';
                }

                function wrapOf(name) { return form.querySelector('[data-field="' + name + '"]'); }

                function show(name, force) {
                    var wrap = wrapOf(name);
                    if (!wrap) return true;
                    var val = valueOf(name);
                    var msg = rules[name] ? rules[name](val) : '';
                    var hint = wrap.querySelector('.sg-hint');
                    var input = wrap.querySelector('input:not([type="radio"]), textarea');

                    if (msg && (force || touched[name])) {
                        wrap.classList.add('is-invalid');
                        wrap.classList.remove('is-valid');
                        hint.innerHTML = '<i class="fas fa-exclamation-circle" aria-hidden="true"></i>';
                        hint.appendChild(document.createTextNode(msg));
                        if (input) input.setAttribute('aria-invalid', 'true');
                    } else {
                        wrap.classList.remove('is-invalid');
                        if (!wrap.classList.contains('is-blocked')) hint.textContent = '';
                        if (input) input.removeAttribute('aria-invalid');
                        // Green tick only for filled, valid text fields
                        wrap.classList.toggle('is-valid', !msg && !!val && !!input);
                    }
                    return !msg;
                }

                function updateMeter() {
                    var done = required.filter(function (n) { return !rules[n](valueOf(n)); }).length;
                    var meter = root.querySelector('.sg-meter');
                    if (!meter) return;
                    meter.querySelector('[data-meter-count]').textContent = done;
                    meter.querySelector('.sg-meter__bar').style.width = (done / required.length * 100) + '%';
                    meter.classList.toggle('is-done', done === required.length);
                }

                function updateCount(field) {
                    var meta = field.closest('.sg-field').querySelector('[data-count]');
                    if (meta) meta.textContent = field.value.length;
                }

                Object.keys(rules).forEach(function (name) {
                    var wrap = wrapOf(name);
                    if (!wrap) return;
                    var radios = wrap.querySelectorAll('input[type="radio"]');

                    if (radios.length) {
                        radios.forEach(function (r) {
                            r.addEventListener('change', function () { touched[name] = true; show(name); updateMeter(); });
                        });
                    } else {
                        var f = form.elements[name];
                        f.addEventListener('blur', function () {
                            if (f.value) touched[name] = true;
                            show(name); updateMeter();
                        });
                        f.addEventListener('input', function () {
                            // Mobile: become "touched" once 10 digits are in, so errors don't nag mid-typing
                            if (name === 'mobile' && (f.value.length === 10 || /^[0-5]/.test(f.value))) touched[name] = true;
                            show(name); updateMeter(); updateCount(f);
                        });
                    }
                    // Server-side errors already rendered count as touched
                    if (wrap.classList.contains('is-invalid')) touched[name] = true;
                });

                var msg = form.elements.message;
                if (msg) msg.addEventListener('input', function () { updateCount(msg); });

                // Initial state (old() values after a failed submit)
                Object.keys(rules).forEach(function (n) { if (valueOf(n)) show(n); });
                updateMeter();

                var submitting = false;
                form.addEventListener('submit', function (e) {
                    if (submitting) { e.preventDefault(); return; }

                    // Final tidy of text values
                    ['student_name', 'parent_name', 'school'].forEach(function (n) {
                        if (form.elements[n]) form.elements[n].value = form.elements[n].value.trim();
                    });

                    var firstBad = null;
                    Object.keys(rules).forEach(function (n) {
                        touched[n] = true;
                        if (!show(n, true) && !firstBad) firstBad = n;
                    });

                    if (firstBad) {
                        e.preventDefault();
                        var wrap = wrapOf(firstBad);
                        var target = wrap.querySelector('input:not([type="radio"])') || wrap.querySelector('input[type="radio"]');
                        wrap.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
                        setTimeout(function () { target && target.focus({ preventScroll: true }); }, reduce ? 0 : 350);
                        return;
                    }

                    submitting = true;
                    var btn = form.querySelector('.sg-submit');
                    btn.disabled = true;
                    btn.querySelector('[data-label]').textContent = 'Sending…';
                    btn.querySelector('[data-icon]').innerHTML = '<span class="sg-spinner" aria-hidden="true"></span>';
                });

                // Restore button if the user comes back via browser Back (bfcache)
                window.addEventListener('pageshow', function (ev) {
                    if (!ev.persisted) return;
                    submitting = false;
                    var btn = form.querySelector('.sg-submit');
                    btn.disabled = false;
                    btn.querySelector('[data-label]').textContent = 'Submit enquiry';
                    btn.querySelector('[data-icon]').innerHTML = '<i class="icon-right-arrow" aria-hidden="true"></i>';
                });

                /* Course chips in the intro → pick course in the form */
                root.querySelectorAll('.sg-chips a[data-course]').forEach(function (a) {
                    a.addEventListener('click', function (e) {
                        var radio = form.querySelector('input[name="interested_course"][value="' + a.getAttribute('data-course') + '"]');
                        if (!radio) return;
                        e.preventDefault();
                        radio.checked = true;
                        radio.dispatchEvent(new Event('change', { bubbles: true }));
                        var card = document.getElementById('enquiry');
                        card.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
                        setTimeout(function () {
                            var first = form.elements.student_name;
                            if (first && !first.value) first.focus({ preventScroll: true });
                        }, reduce ? 0 : 600);
                    });
                });
            }

            /* ==========================================================
               4. Branch switcher (only matters with 2+ branches)
               ========================================================== */
            var map = document.getElementById('sg-map');
            var dir = document.getElementById('sg-directions');
            root.querySelectorAll('.sg-branch').forEach(function (b) {
                b.addEventListener('click', function () {
                    root.querySelectorAll('.sg-branch').forEach(function (x) {
                        x.setAttribute('aria-pressed', x === b ? 'true' : 'false');
                    });
                    if (map && map.getAttribute('src') !== b.dataset.embed) {
                        map.src = b.dataset.embed;
                        map.title = 'Map: SG Education ' + b.querySelector('strong').textContent + ' branch';
                    }
                    if (dir) dir.href = b.dataset.directions;
                });
            });
        })();
    </script>
@endsection