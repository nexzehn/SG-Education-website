{{--
============================================================================
resources/views/methodology.blade.php
SG Education — Our Methodology (/our-methodology)
Content from Website.docx. UI aligned with home/about "sg-" blocks:
sg-way-step overview, sg-faq accordions, sg-cta dark cards.

DEMO markers (replace before go-live):
- Section images: Eduhive stock
- Video link: Eduhive demo YouTube
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

@section('styles')
    <style>
        /* =====================================================================
                                               Methodology page — sg- blocks shared with home/about + page-specific.
                                               If you've moved common blocks to sg-custom.css, delete them here.
                                               ===================================================================== */

        /* ---------- 4. Six steps overview (sg-way-step, same as About) ---------- */
        .sg-way__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 50px;
        }

        .sg-way-step {
            --smooth-ease: cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 34px 28px 28px;
            background: #ffffff;
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.08);
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(var(--eduhive-base-rgb), 0.03);
            overflow: hidden;
            transition: transform 0.45s var(--smooth-ease),
                box-shadow 0.45s var(--smooth-ease),
                border-color 0.35s ease;
        }

        .sg-way-step::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--eduhive-primary), var(--eduhive-base));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.55s var(--smooth-ease);
        }

        .sg-way-step:hover {
            transform: translateY(-8px);
            border-color: rgba(var(--eduhive-primary-rgb), 0.3);
            box-shadow: 0 22px 45px -12px rgba(var(--eduhive-base-rgb), 0.14);
        }

        .sg-way-step:hover::before {
            transform: scaleX(1);
        }

        .sg-way-step__head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .sg-way-step__icon {
            position: relative;
            width: 56px;
            height: 56px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), 0.08);
            box-shadow: 0 0 0 0 rgba(var(--eduhive-primary-rgb), 0);
            transition: transform 0.45s var(--smooth-ease),
                background 0.35s ease,
                color 0.35s ease,
                box-shadow 0.45s var(--smooth-ease);
        }

        .sg-way-step:hover .sg-way-step__icon {
            background: var(--eduhive-primary);
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 0 0 6px rgba(var(--eduhive-primary-rgb), 0.12),
                0 12px 22px rgba(var(--eduhive-primary-rgb), 0.28);
        }

        .sg-way-step__index {
            font-size: 40px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.02em;
            color: rgba(var(--eduhive-base-rgb), 0.08);
            font-variant-numeric: tabular-nums;
            user-select: none;
            transition: color 0.4s ease, transform 0.45s var(--smooth-ease);
        }

        .sg-way-step:hover .sg-way-step__index {
            color: rgba(var(--eduhive-primary-rgb), 0.22);
            transform: translateY(-2px);
        }

        .sg-way-step__title {
            margin: 0 0 8px;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.015em;
            line-height: 1.25;
            color: var(--eduhive-base);
            transition: color 0.3s ease;
        }

        .sg-way-step:hover .sg-way-step__title {
            color: var(--eduhive-primary);
        }

        .sg-way-step__text {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), 0.7);
        }

        .sg-way-step__go {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            align-self: flex-start;
            margin-top: auto;
            padding-top: 22px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(var(--eduhive-base-rgb), 0.4);
            transition: color 0.35s ease;
        }

        .sg-way-step__go::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            border-radius: 2px;
            background: var(--eduhive-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.45s var(--smooth-ease);
        }

        .sg-way-step__go i {
            font-size: 11px;
            transition: transform 0.45s var(--smooth-ease);
        }

        .sg-way-step:hover .sg-way-step__go {
            color: var(--eduhive-primary);
        }

        .sg-way-step:hover .sg-way-step__go::after {
            transform: scaleX(1);
        }

        .sg-way-step:hover .sg-way-step__go i {
            transform: translateX(4px);
        }

        .sg-way-step--last {
            background: linear-gradient(150deg,
                    rgba(var(--eduhive-primary-rgb), 0.05) 0%,
                    #ffffff 55%);
            border-color: rgba(var(--eduhive-primary-rgb), 0.18);
        }

        .sg-way-step--last .sg-way-step__go {
            color: var(--eduhive-primary);
        }

        .sg-way-step--last:hover .sg-way-step__go i {
            transform: rotate(180deg);
        }

        /* ---------- 5 + 9. Accordion (sg-faq, same as home/about) ---------- */
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
        }

        .sg-faq-a::before {
            content: "";
            display: block;
            height: 1px;
            background: rgba(var(--eduhive-base-rgb), .08);
            margin: 0 0 16px -54px;
        }

        /* ---------- 5. Six steps — journey timeline ---------- */
        .sg-steps {
            background: var(--eduhive-white3);
        }

        .sg-steps__track {
            position: relative;
            max-width: 860px;
            margin: 0 auto;
        }

        /* The continuous line */
        .sg-steps__track::before {
            content: "";
            position: absolute;
            top: 30px;
            bottom: 30px;
            left: 31px;
            border-left: 2px dashed rgba(var(--eduhive-base-rgb), .2);
        }

        .sg-steps__item {
            position: relative;
            display: flex;
            gap: 28px;
            padding-bottom: 36px;
        }

        .sg-steps__rail {
            flex-shrink: 0;
            width: 64px;
        }

        .sg-steps__node {
            position: relative;
            z-index: 1;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 26px;
            color: var(--eduhive-primary);
            background: #fff;
            border: 2px solid rgba(var(--eduhive-primary-rgb), .35);
            box-shadow: 0 0 0 8px var(--eduhive-white3);
            transition: background .35s ease, color .35s ease, border-color .35s ease;
        }

        .sg-steps__item:hover .sg-steps__node {
            background: var(--eduhive-primary);
            border-color: var(--eduhive-primary);
            color: #fff;
        }

        .sg-steps__panel {
            flex: 1;
            min-width: 0;
            padding: 30px 32px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(var(--eduhive-base-rgb), .04);
            transition: border-color .35s ease, box-shadow .4s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-steps__item:hover .sg-steps__panel {
            border-color: rgba(var(--eduhive-primary-rgb), .3);
            box-shadow: 0 16px 40px rgba(var(--eduhive-base-rgb), .09);
        }

        .sg-steps__panel-head {
            margin-bottom: 18px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(var(--eduhive-base-rgb), .08);
        }

        .sg-steps__no {
            display: inline-block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .12em;
            color: var(--eduhive-primary);
        }

        .sg-steps__name {
            margin: 0 0 6px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.015em;
            color: var(--eduhive-base);
        }

        .sg-steps__headline {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: rgba(var(--eduhive-base-rgb), .6);
        }

        .sg-steps__text {
            margin: 0 0 12px;
            font-size: 15px;
            line-height: 1.7;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        .sg-steps__subtitle {
            margin: 18px 0 12px;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: var(--eduhive-base);
        }

        /* Points as compact 2-col checklist */
        .sg-steps__points {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px 20px;
            list-style: none;
            margin: 0 0 20px;
            padding: 0;
        }

        .sg-steps__points li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.5;
            color: var(--eduhive-black);
        }

        .sg-steps__points li i {
            flex-shrink: 0;
            margin-top: 3px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 9px;
            color: #fff;
            background: var(--eduhive-primary);
        }

        .sg-steps__close {
            margin: 0;
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 15px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), .8);
            background: rgba(var(--eduhive-primary-rgb), .07);
            border-left: 3px solid var(--eduhive-primary);
        }

        /* Loop-back marker */
        .sg-steps__loop {
            position: relative;
            display: flex;
            align-items: center;
            gap: 20px;
            padding-left: 0;
        }

        .sg-steps__loop-icon {
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 22px;
            color: #fff;
            background: var(--eduhive-base);
            box-shadow: 0 0 0 8px var(--eduhive-white3);
        }

        .sg-steps__loop p {
            margin: 0;
            font-size: 16px;
            color: rgba(var(--eduhive-base-rgb), .75);
        }

        .sg-steps__loop strong {
            color: var(--eduhive-primary);
        }

        @media (max-width: 767px) {
            .sg-steps__track::before {
                left: 25px;
            }

            .sg-steps__item {
                gap: 18px;
            }

            .sg-steps__rail {
                width: 52px;
            }

            .sg-steps__node {
                width: 52px;
                height: 52px;
                font-size: 21px;
            }

            .sg-steps__panel {
                padding: 24px 20px;
            }

            .sg-steps__points {
                grid-template-columns: 1fr;
            }

            .sg-steps__loop-icon {
                width: 52px;
                height: 52px;
                font-size: 18px;
            }
        }

        /* ---------- Check list (sg-focus, same as home/about) ---------- */
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

        /* ---------- 12. Commitment (sg-feature-card, 3-col) ---------- */
        .sg-feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sg-feature-grid--3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .sg-feature-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px 18px;
            border-radius: 14px;
            background: rgba(var(--eduhive-base-rgb), 0.025);
            border: 1px solid rgba(var(--eduhive-base-rgb), 0.05);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .sg-feature-card i {
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(var(--eduhive-primary-rgb), 0.1);
            color: var(--eduhive-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .sg-feature-card span {
            font-size: 15px;
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

        /* ---------- 6 + 13. CTA (sg-cta, same as home/about) ---------- */
        .sg-cta {
            padding: 40px 0 110px;
        }

        .sg-cta--mid {
            padding: 40px 0 40px;
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
            box-shadow: 0 15px 20px rgba(var(--eduhive-base-rgb), .25);
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

        .sg-cta-repo {
            margin-bottom: 60px;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 991px) {
            .sg-way__grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 18px;
            }

            .sg-faq-a,
            .sg-faq-body {
                padding-left: 24px;
            }

            .sg-faq-a::before,
            .sg-faq-body::before {
                margin-left: 0;
            }

            .sg-feature-grid--3 {
                grid-template-columns: repeat(2, 1fr);
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

        @media (max-width: 575px) {
            .sg-way__grid {
                grid-template-columns: 1fr;
            }

            .sg-way-step {
                padding: 28px 22px 24px;
            }

            .sg-way-step__index {
                font-size: 34px;
            }

            .sg-focus {
                grid-template-columns: 1fr;
            }

            .sg-focus li:last-child:nth-child(odd) {
                grid-column: auto;
            }

            .sg-feature-grid--3 {
                grid-template-columns: 1fr;
            }

            .sg-cta__card {
                padding: 36px 24px;
                border-radius: 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .sg-way-step,
            .sg-way-step::before,
            .sg-way-step__icon,
            .sg-way-step__index,
            .sg-way-step__title,
            .sg-way-step__go,
            .sg-way-step__go::after,
            .sg-way-step__go i,
            .sg-focus li,
            .sg-feature-card,
            .sg-faq-item,
            .sg-faq-num,
            .sg-faq-toggle,
            .sg-faq-panel,
            .sg-cta__btn,
            .sg-cta__btn-icon {
                transition: none !important;
            }

            .sg-way-step:hover,
            .sg-focus li:hover,
            .sg-faq-item.is-open,
            .sg-cta__btn:hover {
                transform: none;
            }
        }

        .funfact-one__grid-repo {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 30px;
        }

        /* ---------- 7. Six dimensions grid ---------- */
        .sg-dims__intro {
            max-width: 720px;
            margin: 0 auto 50px;
            text-align: center;
            font-size: 16px;
            line-height: 1.75;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        .sg-dims__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .sg-dims__card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 26px 24px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 18px;
            box-shadow: 0 4px 14px rgba(var(--eduhive-base-rgb), .03);
            transition: transform .4s cubic-bezier(.22, 1, .36, 1),
                box-shadow .4s cubic-bezier(.22, 1, .36, 1),
                border-color .35s ease;
        }

        .sg-dims__card:hover {
            transform: translateY(-5px);
            border-color: rgba(var(--eduhive-primary-rgb), .3);
            box-shadow: 0 14px 32px rgba(var(--eduhive-base-rgb), .08);
        }

        .sg-dims__icon {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 22px;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .09);
            transition: background .35s ease, color .35s ease;
        }

        .sg-dims__card:hover .sg-dims__icon {
            background: var(--eduhive-primary);
            color: #fff;
        }

        .sg-dims__title {
            margin: 0 0 6px;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.01em;
            color: var(--eduhive-base);
        }

        .sg-dims__q {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), .65);
        }

        @media (max-width: 991px) {
            .sg-dims__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575px) {
            .sg-dims__grid {
                grid-template-columns: 1fr;
            }
        }

        /* ---------- 8. Focused batches ---------- */
        .sg-callout {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            border-radius: 14px;
            background: var(--eduhive-base);
            color: #fff;
            font-weight: 700;
        }

        .sg-callout i {
            flex-shrink: 0;
            font-size: 22px;
            color: var(--eduhive-primary);
        }

        .sg-batches__badge {
            position: absolute;
            bottom: 24px;
            left: -18px;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            box-shadow: 0 16px 40px rgba(var(--eduhive-base-rgb), .15);
        }

        .sg-batches__badge-icon {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 20px;
            color: #fff;
            background: var(--eduhive-primary);
        }

        .sg-batches__badge strong {
            display: block;
            font-size: 15px;
            font-weight: 800;
            color: var(--eduhive-base);
            line-height: 1.2;
        }

        .sg-batches__badge span:not(.sg-batches__badge-icon) {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: rgba(var(--eduhive-base-rgb), .6);
        }

        @media (max-width: 991px) {
            .sg-batches__badge {
                left: 12px;
                bottom: 12px;
            }
        }

        @media (max-width: 575px) {
            .sg-batches__badge {
                padding: 10px 14px;
                gap: 10px;
            }

            .sg-batches__badge-icon {
                width: 38px;
                height: 38px;
                font-size: 17px;
            }
        }

        /* ---------- 9. Parents + mentorship ---------- */
        .sg-parents__intro {
            margin: 0 0 26px;
            font-size: 16px;
            line-height: 1.7;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        .sg-parents__list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 22px;
        }

        .sg-parents__row {
            position: relative;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px 20px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 16px;
            overflow: hidden;
            transition: transform .4s cubic-bezier(.22, 1, .36, 1),
                box-shadow .4s cubic-bezier(.22, 1, .36, 1),
                border-color .35s ease;
        }

        .sg-parents__row:hover {
            transform: translateX(6px);
            border-color: rgba(var(--eduhive-primary-rgb), .3);
            box-shadow: 0 12px 28px rgba(var(--eduhive-base-rgb), .07);
        }

        /* Big faded number, right side */
        .sg-parents__num {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            font-size: 44px;
            font-weight: 800;
            line-height: 1;
            color: rgba(var(--eduhive-base-rgb), .06);
            font-variant-numeric: tabular-nums;
            user-select: none;
            pointer-events: none;
            transition: color .35s ease;
        }

        .sg-parents__row:hover .sg-parents__num {
            color: rgba(var(--eduhive-primary-rgb), .16);
        }

        .sg-parents__icon {
            flex-shrink: 0;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 20px;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .09);
            transition: background .35s ease, color .35s ease;
        }

        .sg-parents__row:hover .sg-parents__icon {
            background: var(--eduhive-primary);
            color: #fff;
        }

        .sg-parents__title {
            margin: 0 0 2px;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -.01em;
            color: var(--eduhive-base);
        }

        .sg-parents__q {
            margin: 0;
            font-size: 13px;
            font-weight: 600;
            color: rgba(var(--eduhive-base-rgb), .6);
        }

        /* Bridge card to mentorship column */
        .sg-parents__bridge {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            border-radius: 14px;
            background: var(--eduhive-base);
        }

        .sg-parents__bridge i {
            flex-shrink: 0;
            font-size: 22px;
            color: var(--eduhive-primary);
        }

        .sg-parents__bridge p {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.5;
            color: #fff;
        }

        @media (prefers-reduced-motion: reduce) {

            .sg-parents__row,
            .sg-parents__num,
            .sg-parents__icon {
                transition: none;
            }

            .sg-parents__row:hover {
                transform: none;
            }
        }

        /* ---------- 3. Capability chain strip ---------- */
        .sg-capability {
            padding: 22px 24px;
            border-radius: 16px;
            background: rgba(var(--eduhive-base-rgb), .03);
            border: 1px solid rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-capability__label {
            margin: 0 0 14px;
            font-size: 15px;
            font-weight: 800;
            color: var(--eduhive-base);
        }

        .sg-capability__chain {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px 6px;
            margin-bottom: 14px;
        }

        .sg-capability__chain span {
            padding: 4px 8px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 600;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .1);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .2);
        }

        .sg-capability__chain i {
            font-size: 9px;
            color: rgba(var(--eduhive-base-rgb), .3);
        }

        .sg-capability__note {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), .65);
        }
    </style>
@endsection

@section('content')

    @php
        $demoVideo = 'https://www.youtube.com/watch?v=h9MbznbxlLc'; // DEMO
        $whatsapp = 'https://wa.me/917715916926?text=' . rawurlencode('Hi, I want to book an academic counselling session at SG Education.');
        $variants = ['primary', 'secondary', 'base'];

        // The 6 steps — used by the overview cards AND the detail accordion
        $steps = [
            [
                'id' => 'learn',
                'no' => '01',
                'name' => 'Learn',
                'icon' => 'icon-open-book',
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
                'id' => 'practise',
                'no' => '02',
                'name' => 'Practise',
                'icon' => 'icon-copy-writing',
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
                'id' => 'test',
                'no' => '03',
                'name' => 'Test',
                'icon' => 'icon-files',
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
                'id' => 'analyse',
                'no' => '04',
                'name' => 'Analyse',
                'icon' => 'icon-ranking',
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
                'id' => 'improve',
                'no' => '05',
                'name' => 'Improve',
                'icon' => 'icon-batch-assign',
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
                'id' => 'excel',
                'no' => '06',
                'name' => 'Excel',
                'icon' => 'icon-medal',
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
                            <img src="{{ asset('assets/images/about/about-1-1.jpg') }}"
                                alt="The SG Academic Excellence System" />
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
                            <h6 class="sec-title__tagline">the SG academic excellence system</h6>
                            <h3 class="sec-title__title">A Better Way to Learn. <br>A <span
                                    class="sec-title__title__shape">Smarter Way</span> to <span
                                    class="sec-title__title__text">Improve.</span></h3>
                        </div>

                        <p class="about-one__text wow fadeInUp" data-wow-duration="1500ms">At SG Education, we believe
                            academic success is not the result of one factor. It is the outcome of <strong>strong
                            concepts, deliberate practice, regular testing, honest analysis and continuous
                            improvement.</strong> Our methodology takes students through this complete academic cycle.</p>

                        {{-- The cycle, as chips (reuses sg-capability styles) --}}
                        <div class="sg-capability__chain wow fadeInUp" data-wow-duration="1500ms"
                            style="margin: 18px 0 24px;"
                            aria-label="Learn, Practise, Test, Analyse, Improve, Excel">
                            <span>Learn</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                            <span>Practise</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                            <span>Test</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                            <span>Analyse</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                            <span>Improve</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                            <span>Excel</span>
                        </div>

                        @php
                            $pillars = ['Strong Concepts', 'Honest Analysis', 'Continuous Improvement'];
                        @endphp
                        <ul class="sg-focus" style="margin-top: 0;">
                            @foreach ($pillars as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="about-one__button wow fadeInUp" data-wow-duration="1500ms"
                            style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <a href="{{ url('/courses') }}" class="about-one__btn eduhive-btn">
                                <span>Explore Our Programs</span>
                                <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                                            class="icon-right-arrow"></i></span></span>
                            </a>
                            <a href="{{ url('/contact') }}" class="about-one__btn eduhive-btn eduhive-btn--border">
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
                        <img src="{{ asset('assets/images/about/about-2-1.jpg') }}" alt="Student preparing for exams"
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
                            <h6 class="sec-title__tagline">why a methodology?</h6>
                            <h3 class="sec-title__title">Completing the Syllabus <span class="sec-title__title__shape">Is
                                    Not the Same as</span> <span class="sec-title__title__text">Preparing a Student.</span>
                            </h3>
                        </div>
                        <p class="about-two__text wow fadeInUp" data-wow-duration="1500ms">A chapter can be completed.
                            A notebook can be full. A test can be conducted. And yet, a student may still struggle in
                            the examination, because academic performance depends on more than content coverage.
                            Students need to know:</p>

                        @php
                            $needs = ['What to learn', 'How to practise', 'Whether they can apply it', 'Where they are making mistakes', 'Why they are making those mistakes', 'What they need to improve next'];
                        @endphp
                        <ul class="sg-focus">
                            @foreach ($needs as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="sg-capability wow fadeInUp" data-wow-duration="1500ms">
                            <p class="sg-capability__label">We don't just teach chapters. We build academic capability:</p>
                            <div class="sg-capability__chain"
                                aria-label="Understanding, Thinking, Applying, Solving, Analysing, Improving">
                                <span>Understanding</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                                <span>Thinking</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                                <span>Applying</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                                <span>Solving</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                                <span>Analysing</span><i class="fas fa-chevron-right" aria-hidden="true"></i>
                                <span>Improving</span>
                            </div>
                            <p class="sg-capability__note">This ability becomes increasingly important as students move
                                from school examinations to competitive examinations.</p>
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

    {{-- ================= 5. THE 6 STEPS — DETAIL (journey timeline) ================= --}}
    <section class="sg-steps section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">step by step</h6>
                <h3 class="sec-title__title">Inside <span class="sec-title__title__text">Each</span> <span
                        class="sec-title__title__shape">Step</span></h3>
            </div>

            <div class="sg-steps__track">
                @foreach ($steps as $step)
                    <article class="sg-steps__item wow fadeInUp" data-wow-duration="1200ms">

                        {{-- Left rail: icon node on the line --}}
                        <div class="sg-steps__rail">
                            <span class="sg-steps__node">
                                <i class="{{ $step['icon'] }}" aria-hidden="true"></i>
                            </span>
                        </div>

                        {{-- Right: content panel --}}
                        <div class="sg-steps__panel">
                            <div class="sg-steps__panel-head">
                                <span class="sg-steps__no">STEP {{ $step['no'] }}</span>
                                <h3 class="sg-steps__name">{{ $step['name'] }}</h3>
                                <p class="sg-steps__headline">{{ $step['headline'] }}</p>
                            </div>

                            @foreach ($step['intro'] as $para)
                                <p class="sg-steps__text">{{ $para }}</p>
                            @endforeach

                            <h5 class="sg-steps__subtitle">{{ $step['list_title'] }}</h5>
                            <ul class="sg-steps__points">
                                @foreach ($step['list'] as $item)
                                    <li><i class="icon-check-2" aria-hidden="true"></i>{{ $item }}</li>
                                @endforeach
                            </ul>

                            <p class="sg-steps__close">{{ $step['close_label'] }} <strong>{{ $step['close'] }}</strong></p>
                        </div>

                    </article>
                @endforeach

                {{-- Cycle closes: loop-back marker at the end of the line --}}
                <div class="sg-steps__loop wow fadeInUp" data-wow-duration="1200ms">
                    <span class="sg-steps__loop-icon"><i class="fas fa-redo-alt" aria-hidden="true"></i></span>
                    <p>Every test starts the next cycle. <strong>Back to Step 01.</strong></p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 6. MID CTA — THE CYCLE ================= --}}
    <section class="sg-cta-repo sg-cta--mid">
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
                        <span>Book Counselling</span>
                        <span class="sg-cta__btn-icon"><i class="icon-right-arrow" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 7. DIFFERENT STUDENTS, DIFFERENT GAPS ================= --}}
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
    <section class="sg-dims section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">beyond marks</h6>
                <h3 class="sec-title__title"><span class="sec-title__title__shape">One Classroom.</span> Different Students.
                    <span class="sec-title__title__text">Different Gaps.</span>
                </h3>
            </div>

            <p class="sg-dims__intro wow fadeInUp" data-wow-duration="1500ms">
                Not every student struggles for the same reason. One may need more conceptual support, another more
                practice, another more speed, another more consistency. That's why we look at every student through
                six dimensions, so support becomes targeted.
            </p>

            <div class="sg-dims__grid">
                @foreach ($dimensions as $dm)
                    <div class="sg-dims__card wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <div class="sg-dims__icon">
                            <i class="{{ $dm['i'] }}" aria-hidden="true"></i>
                        </div>
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
    <section class="about-two section-space sg-batches">
        <div class="container">
            <div class="row gutter-y-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <img src="{{ asset('assets/images/about/about-2-1.jpg') }}" alt="Focused batch classroom"
                            class="about-two__image__one">
                        <img src="{{ asset('assets/images/about/about-2-2.jpg') }}" alt="" class="about-two__image__two">
                        <img src="{{ asset('assets/images/shapes/about-shape-2-1.png') }}" alt=""
                            class="about-two__image__shape-one">
                        <div class="about-two__image__shape-box"></div>

                        {{-- Floating badge --}}
                        <div class="sg-batches__badge wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                            <span class="sg-batches__badge-icon"><i class="icon-multiple-users"
                                    aria-hidden="true"></i></span>
                            <div>
                                <strong>Small Batches</strong>
                                <span>Every student is visible</span>
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
                        <p class="about-two__text wow fadeInUp" data-wow-duration="1500ms">Our focused batch structure
                            is designed to create an environment where students can:</p>

                        @php
                            $batch = ['Ask questions', 'Participate actively', 'Receive classroom attention', 'Discuss difficult problems', 'Interact with faculty', 'Receive academic guidance'];
                        @endphp
                        <ul class="sg-focus">
                            @foreach ($batch as $item)
                                <li class="wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="{{ $loop->index * 60 }}ms">
                                    <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="sg-callout wow fadeInUp" data-wow-duration="1500ms">
                            <i class="icon-multiple-users" aria-hidden="true"></i>
                            The principle is simple: students shouldn't feel invisible in the classroom.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= 9. PARENTS + MENTORSHIP ================= --}}
    <section class="faq-one section-space sg-parents">
        <div class="container">
            <div class="row gutter-y-50 align-items-start">

                {{-- LEFT: Parents --}}
                <div class="col-lg-6">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">for parents</h6>
                        <h3 class="sec-title__title">Parents Should See the <span
                                class="sec-title__title__text">Journey,</span> Not Just the Result.</h3>
                    </div>
                    <p class="sg-parents__intro wow fadeInUp" data-wow-duration="1500ms">A parent shouldn't have to wait
                        for the final examination to discover that a student has been struggling. Meaningful academic
                        communication helps parents understand:</p>

                    @php
                        $parentView = [
                            ['t' => 'Progress', 'd' => 'Is the student improving?', 'i' => 'icon-ranking'],
                            ['t' => 'Strengths & Weaknesses', 'd' => 'What needs attention?', 'i' => 'icon-files'],
                            ['t' => 'Consistency', 'd' => 'Is preparation regular?', 'i' => 'icon-batch-assign'],
                            ['t' => 'Next Steps', 'd' => 'What to focus on now?', 'i' => 'icon-right-up'],
                        ];
                    @endphp
                    <div class="sg-parents__list">
                        @foreach ($parentView as $pv)
                            <div class="sg-parents__row wow fadeInUp" data-wow-duration="1200ms"
                                data-wow-delay="{{ $loop->index * 80 }}ms">
                                <span class="sg-parents__num">0{{ $loop->iteration }}</span>
                                <span class="sg-parents__icon"><i class="{{ $pv['i'] }}" aria-hidden="true"></i></span>
                                <div>
                                    <h4 class="sg-parents__title">{{ $pv['t'] }}</h4>
                                    <p class="sg-parents__q">{{ $pv['d'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Bridge to mentorship --}}
                    <div class="sg-parents__bridge wow fadeInUp" data-wow-duration="1500ms">
                        <i class="icon-instructors" aria-hidden="true"></i>
                        <p>This visibility comes from the same mentorship that guides students every week.</p>
                    </div>
                </div>

                {{-- RIGHT: Mentorship accordion (unchanged) --}}
                <div class="col-lg-6">
                    <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h6 class="sec-title__tagline">mentorship</h6>
                        <h3 class="sec-title__title">Teaching Happens in the Classroom. <span
                                class="sec-title__title__shape">Mentorship</span> <span class="sec-title__title__text">Goes
                                Beyond It.</span></h3>
                    </div>
                    @php
                        // Questions from docx; short answers written to describe the mentorship approach (review with SG team)
                        $mentor = [
                            ['q' => 'Am I studying correctly?', 'a' => 'Mentors review how a student studies, not just what they study, and help build a structured routine for learning, practice and revision.'],
                            ['q' => 'Why aren\'t my marks improving?', 'a' => 'Test analysis shows whether marks are lost to concept gaps, application gaps, careless errors or time pressure, so effort goes where it matters.'],
                            ['q' => 'Which subject needs more attention?', 'a' => 'Subject-wise and chapter-wise performance helps decide where extra practice and doubt-solving time should go.'],
                            ['q' => 'How should I revise?', 'a' => 'Students get guidance on revision cycles, retesting weak chapters and using past papers and mock tests effectively.'],
                            ['q' => 'How should I manage school and competitive preparation?', 'a' => 'Mentors help students plan their week so board preparation and JEE / NEET / MHT-CET preparation support each other instead of competing.'],
                        ];
                    @endphp
                    <div class="sg-faq-list wow fadeInUp" data-wow-duration="1500ms">
                        @foreach ($mentor as $m)
                            <div class="sg-faq-item {{ $loop->first ? 'is-open' : '' }}">
                                <button type="button" class="sg-faq-btn" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                    <span class="sg-faq-num">0{{ $loop->iteration }}</span>
                                    <h4 class="sg-faq-q">{{ $m['q'] }}</h4>
                                    <span class="sg-faq-toggle" aria-hidden="true"><i class="fas fa-plus"></i></span>
                                </button>
                                <div class="sg-faq-panel">
                                    <div class="sg-faq-panel__inner">
                                        <p class="sg-faq-a">{{ $m['a'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= 10. DIFFERENT STAGES, DIFFERENT FOCUS ================= --}}
    @php
        $stageFocus = [
            ['cat' => 'Grade 9', 'title' => 'Build the Foundation', 'focus' => 'Concepts • Habits • Fundamentals • Problem Solving', 'url' => '/courses/boards', 'img' => 'course-1-1.jpg'],
            ['cat' => 'Grade 10', 'title' => 'Master the Board Preparation', 'focus' => 'Syllabus • Practice • Revision • Testing • Examination Strategy', 'url' => '/courses/boards', 'img' => 'course-1-2.jpg'],
            ['cat' => 'Grade 11', 'title' => 'Build the Competitive Foundation', 'focus' => 'Deep Concepts • Problem Solving • Consistency • Competitive Thinking', 'url' => '/courses', 'img' => 'course-1-3.jpg'],
            ['cat' => 'Grade 12', 'title' => 'Strengthen. Revise. Perform.', 'focus' => 'Advanced Practice • Revision • Testing • Exam Strategy', 'url' => '/courses', 'img' => 'course-1-4.jpg'],
            ['cat' => 'JEE / NEET / CET', 'title' => 'Prepare to Perform Under Pressure', 'focus' => 'Concepts • Application • MCQs / Problems • Speed • Accuracy • Mock Tests • Analysis', 'url' => '/courses', 'img' => 'course-1-5.jpg'],
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
                @foreach ($stageFocus as $sf)
                    <div class="item">
                        <div class="course-card wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                            <div class="course-card__image">
                                <img src="{{ asset('assets/images/courses/' . $sf['img']) }}"
                                    alt="{{ $sf['cat'] }}: {{ $sf['title'] }}">
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
                                        <span>view programs</span>
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
                    style="background-image: url({{ asset('assets/images/resources/video-1-1.jpg') }});">
                    <img src="{{ asset('assets/images/resources/video-1-2.jpg') }}" alt="SG Education classroom">
                    <a href="{{ $demoVideo }}" class="video-one__video-btn video-btn video-popup" aria-label="Play video">
                        <i class="icon-play"></i><span></span><span></span><span></span><span></span>
                    </a>
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
    <section class="course-category section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">our commitment</h6>
                <h3 class="sec-title__title">What Every <span class="sec-title__title__text">Student</span> <span
                        class="sec-title__title__shape">Receives</span></h3>
            </div>
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
            <ul class="sg-feature-grid sg-feature-grid--3" style="margin-top: 50px;">
                @foreach ($commit as $c)
                    <li class="sg-feature-card wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                        <i class="{{ $c['i'] }}" aria-hidden="true"></i>
                        <span>{{ $c['t'] }}</span>
                    </li>
                @endforeach
            </ul>
            <p class="text-center wow fadeInUp" data-wow-duration="1500ms" style="max-width: 760px; margin: 40px auto 0;">
                <strong>We cannot promise every student the same result. We can build a system that gives every student a
                    better opportunity to improve.</strong>
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