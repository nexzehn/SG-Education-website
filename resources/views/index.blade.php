{{-- ============================================================
resources/views/home.blade.php
SG Education — Home page. Content from Website.docx, UI = Eduhive sections
+ a few scoped "sg-" blocks (same style language as the About page).
Extends layouts/main.blade.php. Canonical lives in the layout.

DEMO markers (replace before go-live):
- Slider / about / class-11 / events images: Eduhive stock
- Testimonials: placeholder quotes (docx had none)
- Video links: Eduhive demo YouTube
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

@section('styles')
    <style>
        /* =====================================================================
                                   Home page — custom blocks, same style language as About page.
                                   All colours from Eduhive CSS variables. Per-card accent via --c / --c-rgb.
                                   ===================================================================== */

        /* ============================================================
                                   2. Why SG — Premium Balanced Cards
                                   Palette: Navy (#334154) + Orange (#F48134)
                                   ============================================================ */

        .sg-why-wrap {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
        }

        .sg-why-card {
            position: relative;
            flex: 0 0 calc(33.333% - 20px);
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 35px;
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.06);
            box-shadow: 0 10px 30px rgba(var(--eduhive-base-rgb), 0.03);
            overflow: hidden;
            z-index: 1;
            cursor: default;
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-why-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(var(--eduhive-base-rgb), 0.1);
            border-color: rgba(var(--eduhive-primary-rgb), 0.3);
        }

        .sg-why-card__watermark {
            position: absolute;
            top: -15px;
            right: -10px;
            font-size: 130px;
            font-weight: 800;
            line-height: 1;
            color: rgba(var(--eduhive-base-rgb), 0.03);
            z-index: -1;
            pointer-events: none;
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-why-card:hover .sg-why-card__watermark {
            color: rgba(var(--eduhive-primary-rgb), 0.05);
            transform: scale(1.05) translate(-10px, 10px);
        }

        .sg-why-card__line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 4px;
            background: var(--eduhive-primary);
            transition: width 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-why-card:hover .sg-why-card__line {
            width: 100%;
        }

        .sg-why-card__icon {
            position: relative;
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(var(--eduhive-primary-rgb), 0.1);
            border-radius: 16px;
            margin-bottom: 25px;
            overflow: hidden;
        }

        .sg-why-card__icon i {
            position: relative;
            z-index: 2;
            font-size: 30px;
            color: var(--eduhive-primary);
            transition: color 0.4s ease;
        }

        .sg-why-card__icon::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: var(--eduhive-primary);
            z-index: 1;
            transition: height 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-why-card:hover .sg-why-card__icon::before {
            height: 100%;
        }

        .sg-why-card:hover .sg-why-card__icon i {
            color: #ffffff;
            animation: iconPop 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        }

        @keyframes iconPop {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15) translateY(-2px);
            }

            100% {
                transform: scale(1) translateY(0);
            }
        }

        .sg-why-card h4 {
            font-size: 22px;
            font-weight: 700;
            color: var(--eduhive-base);
            margin-bottom: 12px;
            letter-spacing: -0.01em;
            transition: color 0.4s ease;
        }

        .sg-why-card p {
            font-size: 16px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), 0.7);
            margin: 0;
        }

        .sg-why-card:hover h4 {
            color: var(--eduhive-primary);
        }

        @media (max-width: 1199px) {
            .sg-why-card {
                flex: 0 0 calc(50% - 15px);
            }
        }

        @media (max-width: 767px) {
            .sg-why-wrap {
                gap: 20px;
            }

            .sg-why-card {
                flex: 0 0 100%;
                padding: 30px 25px;
            }

            .sg-why-card__watermark {
                font-size: 100px;
            }
        }

        /* ---------- 6. Class 11 bullets (same as About AIR list) ---------- */
        .sg-focus {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            list-style: none;
            margin: 22px 0 22px;
            padding: 0;
        }

        .sg-focus li {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 54px;
            padding: 10px 16px;
            border-radius: 12px;
            background: var(--eduhive-white);
            border: 1px solid var(--eduhive-border-color);
            font-size: 15px;
            font-weight: 600;
            line-height: 1.3;
            color: var(--eduhive-black);
            transition: border-color .3s ease, transform .3s ease;
        }

        .sg-focus li:hover {
            border-color: var(--eduhive-primary);
            transform: translateX(4px);
        }

        .sg-focus li:last-child:nth-child(odd) {
            grid-column: span 2;
        }

        .sg-focus__icon {
            flex-shrink: 0;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 12px;
            color: #fff;
            background: var(--eduhive-primary);
        }

        .sg-chips {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin: 0 0 30px;
            padding: 0;
            list-style: none;
        }

        .sg-chips__label {
            font-weight: 700;
            color: var(--eduhive-black);
            margin-right: 4px;
        }

        .sg-chips li:not(.sg-chips__label) {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-base);
            background: rgba(var(--eduhive-base-rgb), .08);
        }

        @media (max-width: 575px) {
            .sg-focus {
                grid-template-columns: 1fr;
            }

            .sg-focus li:last-child:nth-child(odd) {
                grid-column: auto;
            }
        }

        /* ---------- 11a. Journey timeline ---------- */
        .sg-path {
            padding: 110px 0;
        }

        .sg-path .sec-title {
            margin-bottom: 60px;
        }

        .sg-path__list {
            position: relative;
            display: grid;
            grid-template-columns: repeat(var(--cols, 4), 1fr);
            gap: 24px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sg-path__list::before {
            content: "";
            position: absolute;
            top: 44px;
            left: 12%;
            right: 12%;
            border-top: 2px dashed rgba(var(--eduhive-base-rgb), .25);
        }

        .sg-path__item {
            position: relative;
            text-align: center;
            padding: 0 10px;
        }

        .sg-path__dot {
            position: relative;
            z-index: 1;
            width: 88px;
            height: 88px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 34px;
            color: var(--c);
            background: var(--eduhive-white);
            border: 2px solid var(--c);
            box-shadow: 0 0 0 10px var(--eduhive-white3);
            transition: background .35s ease, color .35s ease, transform .35s ease;
        }

        .sg-path__item:hover .sg-path__dot {
            background: var(--c);
            color: #fff;
            transform: translateY(-6px);
        }

        .sg-path__grade {
            display: inline-block;
            margin-bottom: 8px;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            color: var(--c);
            background: rgba(var(--c-rgb), .12);
        }

        .sg-path__label {
            margin: 0 0 6px;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: .02em;
            text-transform: uppercase;
            color: var(--eduhive-black);
        }

        .sg-path__text {
            margin: 0;
            font-size: 15px;
            line-height: 1.5;
        }

        .sg-callout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            max-width: 820px;
            margin: 55px auto 0;
            padding: 18px 24px;
            border-radius: 14px;
            background: var(--eduhive-base);
            color: #fff;
            font-weight: 700;
            text-align: center;
        }

        .sg-callout i {
            font-size: 22px;
            color: var(--eduhive-primary);
        }

        @media (max-width: 991px) {
            .sg-path__list {
                grid-template-columns: 1fr;
                gap: 0;
                max-width: 460px;
                margin: 0 auto;
            }

            .sg-path__list::before {
                top: 44px;
                bottom: 44px;
                left: 43px;
                right: auto;
                border-top: 0;
                border-left: 2px dashed rgba(var(--eduhive-base-rgb), .25);
            }

            .sg-path__item {
                display: flex;
                align-items: center;
                gap: 20px;
                text-align: left;
                padding: 12px 0;
            }

            .sg-path__dot {
                margin: 0;
                flex-shrink: 0;
            }

            .sg-callout {
                text-align: left;
                justify-content: flex-start;
            }
        }

        /* ============================================================
                                   5. Parents Q&A Cards — Premium Horizontal Tiles
                                   ============================================================ */

        .sg-qa-tile {
            display: flex;
            align-items: flex-start;
            gap: 24px;
            padding: 32px 30px;
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.06);
            box-shadow: 0 4px 15px rgba(var(--eduhive-base-rgb), 0.02);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
        }

        .sg-qa-tile:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(var(--eduhive-base-rgb), 0.08);
            border-color: rgba(var(--eduhive-primary-rgb), 0.3);
        }

        .sg-qa-tile__icon {
            flex-shrink: 0;
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(var(--eduhive-base-rgb), 0.03);
            color: var(--eduhive-base);
            font-size: 28px;
            border-radius: 16px;
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-qa-tile:hover .sg-qa-tile__icon {
            background: var(--eduhive-primary);
            color: #ffffff;
            border-radius: 20px;
            transform: scale(1.08) rotate(-5deg);
            box-shadow: 0 10px 20px rgba(var(--eduhive-primary-rgb), 0.25);
        }

        .sg-qa-tile__content {
            flex-grow: 1;
        }

        .sg-qa-tile__q {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--eduhive-base);
            margin: 0 0 16px 0;
            letter-spacing: -0.01em;
            transition: color 0.3s ease;
        }

        .sg-qa-tile:hover .sg-qa-tile__q {
            color: var(--eduhive-primary);
        }

        .sg-qa-tile__a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            background: rgba(var(--eduhive-base-rgb), 0.03);
            border-left: 3px solid var(--eduhive-primary);
            border-radius: 0 8px 8px 0;
            font-size: 15px;
            font-weight: 600;
            color: rgba(var(--eduhive-base-rgb), 0.75);
            transition: all 0.4s ease;
        }

        .sg-qa-tile__a i {
            color: var(--eduhive-primary);
            font-size: 16px;
            transition: transform 0.4s ease;
        }

        .sg-qa-tile:hover .sg-qa-tile__a {
            background: linear-gradient(90deg, rgba(var(--eduhive-primary-rgb), 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            color: var(--eduhive-base);
        }

        .sg-qa-tile:hover .sg-qa-tile__a i {
            transform: scale(1.2);
        }

        @media (max-width: 575px) {
            .sg-qa-tile {
                flex-direction: column;
                gap: 16px;
                padding: 25px;
            }

            .sg-qa-tile__icon {
                width: 55px;
                height: 55px;
                font-size: 24px;
            }
        }

        /* ============================================================
                                   14. About SG Education Summary — Executive Snapshot Card
                                   ============================================================ */

        .sg-summary-sec {
            padding: 70px 0 40px;
            border-top: 1px solid rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-summary-card {
            position: relative;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.08);
            box-shadow: 0 20px 50px rgba(var(--eduhive-base-rgb), 0.05);
            padding: 50px 45px;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 50px;
            align-items: center;
            overflow: hidden;
            z-index: 1;
        }

        .sg-summary-card::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(var(--eduhive-primary-rgb), 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            pointer-events: none;
            z-index: -1;
        }

        .sg-summary-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--eduhive-primary) 0%, var(--eduhive-base) 100%);
        }

        .sg-summary-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 50px;
            background: rgba(var(--eduhive-primary-rgb), 0.1);
            color: var(--eduhive-primary);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .sg-summary-title {
            font-size: clamp(26px, 2.4vw, 34px);
            font-weight: 800;
            line-height: 1.25;
            color: var(--eduhive-base);
            letter-spacing: -0.015em;
            margin: 0 0 16px;
        }

        .sg-summary-location {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
            color: rgba(var(--eduhive-base-rgb), 0.8);
            background: rgba(var(--eduhive-base-rgb), 0.03);
            padding: 8px 16px;
            border-radius: 50px;
            margin-bottom: 24px;
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.06);
        }

        .sg-summary-location i {
            color: var(--eduhive-primary);
            font-size: 16px;
        }

        .sg-chips-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sg-chip-item {
            font-size: 13px;
            font-weight: 600;
            color: var(--eduhive-base);
            background: #ffffff;
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.12);
            padding: 6px 14px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .sg-chip-item:hover {
            border-color: var(--eduhive-primary);
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), 0.04);
            transform: translateY(-2px);
        }

        .sg-summary-desc {
            font-size: 16px;
            line-height: 1.7;
            color: rgba(var(--eduhive-base-rgb), 0.75);
            margin: 0 0 28px;
        }

        .sg-feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sg-feature-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 14px;
            background: rgba(var(--eduhive-base-rgb), 0.025);
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.05);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-feature-card i {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(var(--eduhive-primary-rgb), 0.1);
            color: var(--eduhive-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .sg-feature-card span {
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-base);
        }

        .sg-feature-card:hover {
            background: #ffffff;
            border-color: rgba(var(--eduhive-primary-rgb), 0.3);
            box-shadow: 0 8px 20px rgba(var(--eduhive-base-rgb), 0.06);
            transform: translateY(-2px);
        }

        .sg-feature-card:hover i {
            background: var(--eduhive-primary);
            color: #ffffff;
        }

        @media (max-width: 991px) {
            .sg-summary-card {
                grid-template-columns: 1fr;
                gap: 35px;
                padding: 40px 30px;
            }
        }

        @media (max-width: 575px) {
            .sg-feature-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================================
                                   11b. FAQ — Premium Support Hub + Accordion
                                   ============================================================ */

        .sg-faq-support {
            margin-top: 28px;
            padding: 28px 26px;
            border-radius: 20px;
            background: linear-gradient(160deg, #2b3846 0%, var(--eduhive-base) 100%);
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(var(--eduhive-base-rgb), 0.22);
        }

        .sg-faq-support::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background-image: radial-gradient(circle, rgba(255, 255, 255, .12) 1.5px, transparent 1.5px);
            background-size: 14px 14px;
            opacity: .5;
            pointer-events: none;
        }

        .sg-faq-support::after {
            content: "";
            position: absolute;
            bottom: -50px;
            left: -30px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(var(--eduhive-primary-rgb), .35) 0%, transparent 70%);
            pointer-events: none;
        }

        .sg-faq-support__label {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .65);
        }

        .sg-faq-support__label i {
            color: var(--eduhive-primary);
        }

        .sg-faq-support__title {
            position: relative;
            z-index: 1;
            margin: 0 0 6px;
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -.01em;
        }

        .sg-faq-support__text {
            position: relative;
            z-index: 1;
            margin: 0 0 22px;
            font-size: 14px;
            color: rgba(255, 255, 255, .72);
        }

        .sg-faq-support__meta {
            position: relative;
            z-index: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 22px;
        }

        .sg-faq-support__chip {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .12);
        }

        .sg-faq-wa {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 20px;
            border-radius: 14px;
            background: #25D366;
            color: #fff !important;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none !important;
            box-shadow: 0 10px 24px rgba(37, 211, 102, .28);
            transition: transform .35s cubic-bezier(.22, 1, .36, 1), box-shadow .35s ease;
        }

        .sg-faq-wa:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 30px rgba(37, 211, 102, .4);
            color: #fff !important;
        }

        .sg-faq-wa i {
            font-size: 18px;
        }

        .sg-faq-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .sg-faq-item {
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(var(--eduhive-base-rgb), .03);
            transition: border-color .35s ease, box-shadow .4s cubic-bezier(.22, 1, .36, 1), transform .4s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-faq-item:hover {
            border-color: rgba(var(--eduhive-primary-rgb), .28);
            box-shadow: 0 14px 32px rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-faq-item.is-open {
            border-color: rgba(var(--eduhive-primary-rgb), .35);
            box-shadow: 0 16px 36px rgba(var(--eduhive-base-rgb), .08);
            transform: translateY(-2px);
        }

        .sg-faq-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px 24px;
            background: transparent;
            border: 0;
            text-align: left;
            cursor: pointer;
        }

        .sg-faq-num {
            flex-shrink: 0;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 800;
            color: var(--eduhive-base);
            background: rgba(var(--eduhive-base-rgb), .05);
            transition: background .35s ease, color .35s ease, transform .4s cubic-bezier(.34, 1.4, .64, 1);
        }

        .sg-faq-item:hover .sg-faq-num,
        .sg-faq-item.is-open .sg-faq-num {
            background: var(--eduhive-primary);
            color: #fff;
            transform: scale(1.06);
        }

        .sg-faq-q {
            flex: 1;
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--eduhive-base);
            letter-spacing: -.01em;
        }

        .sg-faq-toggle {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(var(--eduhive-base-rgb), .12);
            display: grid;
            place-items: center;
            color: rgba(var(--eduhive-base-rgb), .45);
            font-size: 14px;
            transition: all .4s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-faq-item:hover .sg-faq-toggle {
            border-color: rgba(var(--eduhive-primary-rgb), .35);
            color: var(--eduhive-primary);
        }

        .sg-faq-item.is-open .sg-faq-toggle {
            background: var(--eduhive-base);
            border-color: var(--eduhive-base);
            color: #fff;
            transform: rotate(45deg);
        }

        .sg-faq-panel {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows .45s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-faq-item.is-open .sg-faq-panel {
            grid-template-rows: 1fr;
        }

        .sg-faq-panel__inner {
            overflow: hidden;
        }

        .sg-faq-a {
            margin: 0;
            padding: 0 24px 22px 78px;
            font-size: 15px;
            line-height: 1.7;
            color: rgba(var(--eduhive-base-rgb), .72);
            border-top: 0;
        }

        .sg-faq-a::before {
            content: "";
            display: block;
            height: 1px;
            background: rgba(var(--eduhive-base-rgb), .08);
            margin: 0 0 16px -54px;
        }

        .sg-faq-intro {
            margin: 0 0 8px;
            font-size: 16px;
            line-height: 1.7;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        @media (max-width: 991px) {
            .sg-faq-a {
                padding-left: 24px;
            }

            .sg-faq-a::before {
                margin-left: 0;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .sg-why-card,
            .sg-why-card__icon,
            .sg-why-card__line,
            .sg-why-card__watermark,
            .sg-qa-tile,
            .sg-qa-tile__icon,
            .sg-focus li,
            .sg-path__dot,
            .sg-chip-item,
            .sg-feature-card,
            .sg-faq-item,
            .sg-faq-num,
            .sg-faq-toggle,
            .sg-faq-panel,
            .sg-faq-wa {
                transition: none;
            }

            .sg-why-card:hover,
            .sg-qa-tile:hover,
            .sg-focus li:hover,
            .sg-path__item:hover .sg-path__dot {
                transform: none;
            }
        }

        /* ---------- 14. CTA — dark card (same as About page) ---------- */
        .sg-cta {
            padding: 40px 0 110px;
        }

        .sg-cta__card {
            margin-bottom: 60px;
            margin-top: 60px;
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
            color: #fff;
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

        .sg-cta__btn--wa {
            background: rgba(37, 211, 102, .12);
            border: 1px solid rgba(37, 211, 102, .35);
            color: #fff !important;
        }

        .sg-cta__btn--wa .sg-cta__btn-icon {
            background: #25D366;
            color: #fff;
            font-size: 16px;
        }

        .sg-cta__btn--wa:hover {
            transform: translateY(-3px);
            background: rgba(37, 211, 102, .2);
            border-color: rgba(37, 211, 102, .6);
        }

        .sg-cta__btn--wa:hover .sg-cta__btn-icon {
            transform: translateX(4px);
        }

        @media (max-width: 991px) {
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

        @media (max-width: 575px) {
            .sg-cta__card {
                padding: 36px 24px;
                border-radius: 20px;
            }
        }
    </style>
@endsection

@section('content')

    @php
        $demoVideo = 'https://www.youtube.com/watch?v=h9MbznbxlLc'; // DEMO: replace with SG Education video
        $whatsapp = 'https://wa.me/917715916926?text=' . rawurlencode('Hi, I want to book an academic counselling session at SG Education.');
    @endphp

    {{-- ================= 1. HERO SLIDER ================= --}}
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

            @php
                $slides = [
                    [
                        'sub' => 'Focused Coaching Classes in Kalyan',
                        'title' => 'Building <span class="main-slider-one__title__shape">Concepts.</span><br>Creating <span class="main-slider-one__title__text">Achievers.</span>',
                        'text' => 'Grades 9–12, JEE, NEET & MHT-CET. Small batches, personalised attention, regular tests and performance tracking.',
                        'img' => ['main-slider-1-1.jpg', 'main-slider-1-2.jpg', 'main-slider-1-3.jpg'],
                    ],
                    [
                        'sub' => 'The SG Academic Excellence System',
                        'title' => 'Learn. Practise. <span class="main-slider-one__title__shape">Test.</span><br>Analyse. <span class="main-slider-one__title__text">Improve.</span>',
                        'text' => 'At SG Education, students don\'t just attend lectures. They learn, practise, test, analyse and improve.',
                        'img' => ['main-slider-1-4.jpg', 'main-slider-1-5.jpg', 'main-slider-1-6.jpg'],
                    ],
                ];
            @endphp

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
                                                <img src="{{ asset('assets/images/main-slider/' . $slide['img'][0]) }}"
                                                    alt="Students at SG Education, Kalyan" class="slider-image" />
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
                                            <img src="{{ asset('assets/images/main-slider/' . $slide['img'][1]) }}" alt=""
                                                class="slider-image" />
                                        </div>
                                        <div class="main-slider-one__image__three">
                                            <img src="{{ asset('assets/images/main-slider/' . $slide['img'][2]) }}" alt=""
                                                class="slider-image" />
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
                <h6 class="sec-title__tagline" style="color: var(--eduhive-primary);">why SG?</h6>
                <h3 class="sec-title__title">What Makes <span class="sec-title__title__text">SG</span>
                    <span class="sec-title__title__shape">Different</span>
                </h3>
            </div>

            <div class="sg-why-wrap">
                @foreach ($why as $index => $w)
                    {{-- Dynamic delay for a cascading reveal effect --}}
                    <div class="sg-why-card wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $index * 150 }}ms">

                        {{-- Giant subtle number in background --}}
                        <div class="sg-why-card__watermark">0{{ $index + 1 }}</div>

                        {{-- Icon with "Liquid Fill" hover --}}
                        <div class="sg-why-card__icon">
                            <i class="{{ $w['icon'] }}"></i>
                        </div>

                        {{-- Content --}}
                        <div class="sg-why-card__content">
                            <h4>{{ $w['title'] }}</h4>
                            <p>{{ $w['text'] }}</p>
                        </div>

                        {{-- Animated bottom line --}}
                        <div class="sg-why-card__line"></div>

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
                            <img src="{{ asset('assets/images/about/about-1-1.jpg') }}" alt="Classroom at SG Education" />
                            <div class="about-one__video">
                                <a href="{{ $demoVideo }}" class="about-one__video__btn video-btn video-popup"
                                    aria-label="Play video">
                                    <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                                </a>
                                <p class="about-one__video__text">play now</p>
                            </div>
                        </div>
                        <div class="about-one__image__two">
                            <img src="{{ asset('assets/images/about/about-1-2.jpg') }}" alt="" />
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
                        <div class="about-one__description wow fadeInUp" data-wow-duration="1500ms">
                            <p class="about-one__text">A student doesn't improve simply by attending lectures. They improve
                                when they <strong>learn, practise, test, analyse and improve</strong>, again and again.
                                That's the SG Academic Excellence System.</p>
                        </div>
                        <div class="about-one__inner wow fadeInUp" data-wow-duration="1500ms">
                            <ul class="about-one__info list-unstyled">
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Learn &amp;
                                    Practise</li>
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Test &amp;
                                    Analyse</li>
                                <li><span class="about-one__info__icon"><i class="icon-right-up"></i></span>Improve &amp;
                                    Excel</li>
                            </ul>
                            <div class="about-one__button">
                                <a href="{{ url('/our-methodology') }}"
                                    class="about-one__btn eduhive-btn eduhive-btn--border">
                                    <span>See How It Works</span>
                                    <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                                class="icon-right-arrow"></i></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 4. EVERY ACADEMIC STAGE ================= --}}
    @php
        $stages = [
            ['filter' => 'school', 'cat' => 'School', 'grades' => 'Grade 9 | 10', 'title' => 'School Courses (State Board)', 'text' => 'Build strong fundamentals and prepare with confidence.', 'info' => 'Grade 9 & 10', 'url' => '/courses/boards', 'img' => 'course-1-1.jpg', 'btn' => 'Explore School Courses'],
            ['filter' => 'foundation', 'cat' => 'Foundation', 'grades' => 'Grade 8 – 10', 'title' => 'JEE Foundation | NEET Foundation', 'text' => 'Start early. Build strong.', 'info' => 'Early preparation', 'url' => '/courses/foundation', 'img' => 'course-1-2.jpg', 'btn' => 'Explore Foundation'],
            ['filter' => 'competitive', 'cat' => 'Competitive', 'grades' => 'Class 11 & 12', 'title' => 'JEE Main & Advanced | NEET | MHT-CET', 'text' => 'Concepts. Problem Solving. Testing. Strategy.', 'info' => 'Entrance exams', 'url' => '/courses', 'img' => 'course-1-3.jpg', 'btn' => 'Explore Competitive Courses'],
            ['filter' => 'science', 'cat' => '11th–12th', 'grades' => 'Science', 'title' => 'PCMB | JEE | NEET | MHT-CET', 'text' => 'Build the foundation for the next level.', 'info' => 'Physics, Chemistry, Maths, Biology', 'url' => '/courses', 'img' => 'course-1-4.jpg', 'btn' => 'Explore Science Courses'],
        ];
    @endphp
    <section class="courses-two section-space" id="courses">
        <div class="courses-two__bg" style="background-image: url({{ asset('assets/images/shapes/courses-bg-2-1.png') }});">
        </div>
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our Courses</h6>
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
                                                                                                "0":    { "items": 1, "margin": 10 },
                                                                                                "576":  { "items": 1, "margin": 30, "stagePadding": 100 },
                                                                                                "768":  { "items": 1, "margin": 30, "stagePadding": 200 },
                                                                                                "992":  { "items": 2, "margin": 30, "stagePadding": 120 },
                                                                                                "1200": { "items": 2, "margin": 30, "stagePadding": 270 },
                                                                                                "1400": { "items": 3, "margin": 30, "stagePadding": 120 },
                                                                                                "1600": { "items": 3, "margin": 30, "stagePadding": 210 },
                                                                                                "1800": { "items": 3, "margin": 30, "stagePadding": 375 }
                                                                                            }
                                                                                        }'>
                @foreach ($stages as $s)
                    <div class="item {{ $s['filter'] }}">
                        <div class="course-card wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="course-card__image">
                                <img src="{{ asset('assets/images/courses/' . $s['img']) }}"
                                    alt="{{ $s['title'] }} at SG Education">
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

    {{-- ================= 5. WHAT PARENTS WANT TO KNOW =================
    Row 1 = image + intro · Row 2 = 6 Q&A cards (3 / 2 / 1 columns)
    --}}
    @php
        // Cleaned up array: Removed the 'c' (color) keys to enforce brand consistency
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
                        <img src="{{ asset('assets/images/resources/offer-1-1.jpg') }}"
                            alt="Parent and student at SG Education" class="offer-one__image__one">
                        <img src="{{ asset('assets/images/resources/offer-1-2.jpg') }}" alt=""
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
                        <p class="wow fadeInUp" data-wow-duration="1500ms">Every parent has the same six questions about
                            their child's preparation. At SG Education, each one has a clear answer built into the way we
                            teach, test and communicate.</p>
                        <p class="wow fadeInUp" data-wow-duration="1500ms"><strong>You shouldn't have to wait for the final
                                exam to know how your child is doing.</strong></p>
                        <a href="{{ url('/contact') }}" class="eduhive-btn wow fadeInUp" data-wow-duration="1500ms"
                            style="margin-top: 10px;">
                            <span>Talk to Our Team</span>
                            <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                        class="icon-right-arrow"></i></span></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row gutter-y-30" style="margin-top: 70px;">
                @foreach ($parents as $p)
                    {{-- Changed to col-lg-6 for a wider, sleeker 2-column layout --}}
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1500ms"
                        data-wow-delay="{{ ($loop->index % 2) * 150 }}ms">

                        <div class="sg-qa-tile">

                            {{-- Icon Area --}}
                            <div class="sg-qa-tile__icon">
                                <i class="{{ $p['icon'] }}" aria-hidden="true"></i>
                            </div>

                            {{-- Content Area --}}
                            <div class="sg-qa-tile__content">
                                <h4 class="sg-qa-tile__q">{{ $p['q'] }}</h4>

                                {{-- Highlighted Answer Badge --}}
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
                        <img src="{{ asset('assets/images/about/about-2-1.jpg') }}" alt="Class 11 science students"
                            class="about-two__image__one">
                        <img src="{{ asset('assets/images/about/about-2-2.jpg') }}" alt="" class="about-two__image__two">
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
                        <p class="about-two__text wow fadeInUp" data-wow-duration="1500ms">The jump from Grade 10 to science
                            can be significant: deeper concepts, a larger syllabus and more analytical questions. If the
                            goal is JEE, NEET or MHT-CET, Class 11 becomes even more important. SG Education helps students:
                        </p>

                        @php
                            $class11 = ['Understand deeper concepts', 'Build problem-solving ability', 'Stay on schedule', 'Test regularly', 'Identify weaknesses early'];
                        @endphp
                        <ul class="sg-focus">
                            @foreach ($class11 as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <ul class="sg-chips wow fadeInUp" data-wow-duration="1500ms">
                            <li class="sg-chips__label">Courses:</li>
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

    {{-- ================= 8. TESTIMONIALS (DEMO — docx had no testimonials) ================= --}}
    @php
        // DEMO: replace with real parent/student testimonials (with their consent) before go-live
        $testimonials = [
            ['name' => 'Parent of a Grade 10 student', 'role' => 'Kalyan', 'quote' => 'The regular tests and chapter-wise feedback showed us exactly where our child needed help. We could see the improvement month by month.', 'img' => 'testimonial-1-1.jpg'],
            ['name' => 'Class 12 Science student', 'role' => 'JEE aspirant', 'quote' => 'Small batches meant I could ask doubts without hesitation. The test analysis helped me stop repeating the same mistakes.', 'img' => 'testimonial-1-2.jpg'],
            ['name' => 'Parent of a Class 11 student', 'role' => 'NEET aspirant', 'quote' => 'The shift to Class 11 was tough, but the mentorship and regular parent updates kept us confident about the preparation.', 'img' => 'testimonial-1-3.jpg'],
        ];
    @endphp
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
                            <p class="testimonials-one__text">Hear from the students and parents who have experienced the SG
                                way of learning.</p>
                        </div>
                        <div class="testimonials-one__custome-navs"></div>
                    </div>
                </div>
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
                                                                                                            "0":{ "items": 1, "margin": 10 },
                                                                                                            "576":{ "items": 1.5 },
                                                                                                            "768":{ "items": 1.8 },
                                                                                                            "992":{ "items": 2.6 },
                                                                                                            "1200":{ "items": 2.3 },
                                                                                                            "1536":{ "items": 2.5 },
                                                                                                            "1800":{ "items": 2.94 }
                                                                                                        }
                                                                                                    }'>
                            @foreach ($testimonials as $t)
                                <div class="item wow fadeInUp" data-wow-duration="1500ms"
                                    data-wow-delay="{{ $loop->index * 100 }}ms">
                                    <div class="testimonial-card">
                                        <div class="testimonial-card__top">
                                            <div class="testimonial-card__image">
                                                <img src="{{ asset('assets/images/testimonials/' . $t['img']) }}"
                                                    alt="{{ $t['name'] }}" />
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

    {{-- ================= 9. VISION / FOUNDER ================= --}}
    @php
        $founderImg = 'assets/images/team/latesh-sir.jpg';
        $founderImg = file_exists(public_path($founderImg)) ? $founderImg : 'assets/images/courses/course-d-instructor-1-9.jpg'; // DEMO fallback
    @endphp
    <section class="course-instructor-details section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our founder</h6>
                <h3 class="sec-title__title">The <span class="sec-title__title__shape">Vision</span> Behind <span
                        class="sec-title__title__text">SG Education</span></h3>
            </div>
            <div class="course-instructor-details__inner">
                <div class="course-instructor-details__image">
                    <img src="{{ asset($founderImg) }}" alt="Latesh Ghavat, Founder, SG Education">
                </div>
                <div class="course-instructor-details__info">
                    <h3 class="course-instructor-details__name">Latesh Ghavat</h3>
                    <p class="course-instructor-details__designation">Founder, SG Education</p>
                    <p class="course-instructor-details__text"><strong>"Education is not about completing chapters. It is
                            about developing the ability to understand, think, solve and improve."</strong></p>
                    <p class="course-instructor-details__text">SG Education was built around a simple belief: <strong>strong
                            fundamentals + consistent practice + meaningful feedback = better academic growth.</strong> Our
                        aim is to create an academic environment where students receive the direction, discipline and
                        support required to keep improving.</p>
                    <a href="{{ url('/about') }}" class="eduhive-btn">
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
                    style="background-image: url({{ asset('assets/images/resources/video-1-1.jpg') }});">
                    <img src="{{ asset('assets/images/resources/video-1-2.jpg') }}" alt="SG Education events">
                    <a href="{{ $demoVideo }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
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

    {{-- ================= 11a. YOUR JOURNEY (timeline) ================= --}}
    @php
        $journey = [
            ['grade' => 'Grade 9', 'step' => 'Build', 'text' => 'Strong fundamentals and study habits.', 'icon' => 'icon-open-book', 'c' => 'primary'],
            ['grade' => 'Grade 10', 'step' => 'Master', 'text' => 'Board preparation with confidence.', 'icon' => 'icon-batch-assign', 'c' => 'secondary'],
            ['grade' => '11th – 12th', 'step' => 'Strengthen', 'text' => 'Deeper concepts and problem solving.', 'icon' => 'icon-graduation', 'c' => 'pink'],
            ['grade' => 'JEE / NEET / CET', 'step' => 'Compete', 'text' => 'Speed, accuracy and exam strategy.', 'icon' => 'icon-ranking', 'c' => 'green'],
        ];
    @endphp
    <section class="sg-path">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">your journey</h6>
                <h3 class="sec-title__title">Your Journey <span class="sec-title__title__text">Starts</span> <span
                        class="sec-title__title__shape">Here.</span></h3>
            </div>
            <ol class="sg-path__list" style="--cols: 4;">
                @foreach ($journey as $j)
                    <li class="sg-path__item wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ $loop->index * 120 }}ms"
                        style="--c: var(--eduhive-{{ $j['c'] }}); --c-rgb: var(--eduhive-{{ $j['c'] }}-rgb);">
                        <span class="sg-path__dot"><i class="{{ $j['icon'] }}" aria-hidden="true"></i></span>
                        <div>
                            <span class="sg-path__grade">{{ $j['grade'] }}</span>
                            <h4 class="sg-path__label">{{ $j['step'] }}</h4>
                            <p class="sg-path__text">{{ $j['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
            <div class="sg-callout wow fadeInUp" data-wow-duration="1500ms">
                <i class="icon-right-up" aria-hidden="true"></i>
                We don't just prepare students for the next examination. We prepare them for the next level.
            </div>
        </div>
    </section>

    {{-- ================= 11b. FAQ ================= --}}
    @php
        $faqs = [
            ['q' => 'Which classes does SG Education offer?', 'a' => 'Grades 8–10, Foundation, 11th–12th Science, JEE, NEET and MHT-CET Courses.'],
            ['q' => 'Where is SG Education located?', 'a' => 'SG Education is located at Khadakpada, Kalyan, offering School, Foundation and Competitive Courses.'],
            ['q' => 'How can I choose the right program?', 'a' => 'Book an academic counselling session and discuss your child\'s class, board, academic level and future goals with our team.'],
            ['q' => 'How are students tested and tracked?', 'a' => 'Through chapter tests, unit tests, cumulative tests and mock tests, followed by analysis of why marks were lost and a plan to improve.'],
        ];
    @endphp
    <section class="faq-one section-space" id="faq">
        <div class="container">
            <div class="row gutter-y-50 align-items-start">

                {{-- LEFT: Title + Support Hub --}}
                <div class="col-lg-5">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">faq’s</h6>
                        <h3 class="sec-title__title">Frequently
                            <span class="sec-title__title__text">Asked</span>
                            <span class="sec-title__title__shape">Questions</span>
                        </h3>
                    </div>

                    <p class="sg-faq-intro wow fadeInUp" data-wow-duration="1500ms">
                        Quick answers for parents and students. Still unsure?
                        Talk to our team and we’ll help you pick the right program.
                    </p>

                    <div class="sg-faq-support wow fadeInUp" data-wow-duration="1500ms">
                        <div class="sg-faq-support__label">
                            <i class="icon-location" aria-hidden="true"></i> Visit / Contact
                        </div>
                        <h4 class="sg-faq-support__title">SG Education, Khadakpada</h4>
                        <p class="sg-faq-support__text">Kalyan, Maharashtra</p>

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

                {{-- RIGHT: Custom Accordion --}}
                <div class="col-lg-7">
                    <div class="sg-faq-list wow fadeInUp" data-wow-duration="1500ms">
                        @foreach ($faqs as $f)
                            <div class="sg-faq-item {{ $loop->first ? 'is-open' : '' }}">
                                <button type="button" class="sg-faq-btn" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                    <span class="sg-faq-num">0{{ $loop->iteration }}</span>
                                    <h4 class="sg-faq-q">{{ $f['q'] }}</h4>
                                    <span class="sg-faq-toggle" aria-hidden="true">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </button>
                                <div class="sg-faq-panel">
                                    <div class="sg-faq-panel__inner">
                                        <p class="sg-faq-a">{{ $f['a'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ================= 12. BLOG / KNOWLEDGE HUB ================= --}}
    @php
        $posts = [
            ['title' => 'How to Score 95%+ in Class 10', 'img' => 'blog-1-1.jpg'],
            ['title' => 'How to Start JEE Preparation in Class 11', 'img' => 'blog-1-2.jpg'],
            ['title' => 'How to Prepare for NEET After Class 10', 'img' => 'blog-1-3.jpg'],
            ['title' => 'How to Choose Coaching Classes in Kalyan', 'img' => 'blog-1-4.jpg'],
            ['title' => 'JEE Main vs JEE Advanced', 'img' => 'blog-1-5.jpg'],
        ];
    @endphp
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
                            <p class="blog-three__text">Practical guides for students and parents on boards, JEE, NEET and
                                choosing the right preparation path.</p>
                            <a href="{{ url('/blog') }}" class="eduhive-btn eduhive-btn--border" style="margin-top: 20px;">
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
                                                                                                        "0":{ "items": 1, "margin": 10 },
                                                                                                        "576":{ "items": 1.5 },
                                                                                                        "768":{ "items": 2.2 },
                                                                                                        "992":{ "items": 1.55 },
                                                                                                        "1200":{ "items": 2.2 },
                                                                                                        "1400":{ "items": 2.35 },
                                                                                                        "1600":{ "items": 2.6 },
                                                                                                        "1800":{ "items": 2.94 }
                                                                                                    }
                                                                                                }'>
                            @foreach ($posts as $post)
                                <div class="item">
                                    <div class="blog-card wow fadeInUp" data-wow-duration="1500ms"
                                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                                        <div class="blog-card__image">
                                            <img src="{{ asset('assets/images/blog/' . $post['img']) }}"
                                                alt="{{ $post['title'] }}">
                                            <a href="{{ url('/blog') }}" class="blog-card__image__link"><span
                                                    class="sr-only">{{ $post['title'] }}</span></a>
                                        </div>
                                        <div class="blog-card__content">
                                            <ul class="list-unstyled blog-card__meta">
                                                <li>
                                                    <a href="{{ url('/blog') }}">
                                                        <span class="blog-card__meta__icon"><i class="far fa-user"></i></span>
                                                        by SG Education
                                                    </a>
                                                </li>
                                            </ul>
                                            <h3 class="blog-card__title"><a href="{{ url('/blog') }}">{{ $post['title'] }}</a>
                                            </h3>
                                            <a href="{{ url('/blog') }}" class="blog-card__link">
                                                read More
                                                <span class="blog-card__link__icon"><span
                                                        class="blog-card__link__icon__inner"><i
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

    {{-- ================= 13. ABOUT SG EDUCATION (SEO Summary) ================= --}}
    <section class="sg-summary-sec">
        <div class="container">
            <div class="row gutter-y-40 align-items-center">

                {{-- Left Column: Identity & Offerings --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                    <span class="sg-summary-badge">
                        <i class="icon-graduation" aria-hidden="true"></i> About SG Education
                    </span>

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

                {{-- Right Column: Narrative & Key Feature Pillars --}}
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                    <p class="sg-summary-desc">
                        SG Education is a premier coaching institute in Kalyan offering targeted academic Courses
                        for Grades 8 to 12 (Maharashtra State Board), JEE, NEET, and MHT-CET. Built on a foundation of
                        concept-first teaching and individual performance tracking, we empower students to achieve
                        consistent academic excellence.
                    </p>

                    <ul class="sg-feature-grid">
                        <li class="sg-feature-card">
                            <i class="icon-multiple-users" aria-hidden="true"></i>
                            <span>Focused Batches</span>
                        </li>
                        <li class="sg-feature-card">
                            <i class="icon-open-book" aria-hidden="true"></i>
                            <span>Concept Teaching</span>
                        </li>
                        <li class="sg-feature-card">
                            <i class="icon-files" aria-hidden="true"></i>
                            <span>Regular Tests</span>
                        </li>
                        <li class="sg-feature-card">
                            <i class="icon-ranking" aria-hidden="true"></i>
                            <span>Performance Analysis</span>
                        </li>
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
                    <span class="sg-cta__tag">
                        <i class="icon-graduation" aria-hidden="true"></i> Admissions Open
                    </span>
                    <h2 class="sg-cta__title">Ready to Build a Stronger<br>Academic Future?</h2>
                    <p class="sg-cta__text">Book a free academic counselling session or message us on WhatsApp. We'll help
                        you pick the right program for your child.</p>
                </div>

                <div class="sg-cta__actions">
                    <a href="{{ url('/contact') }}" class="sg-cta__btn sg-cta__btn--primary">
                        <span>Book Counselling</span>
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