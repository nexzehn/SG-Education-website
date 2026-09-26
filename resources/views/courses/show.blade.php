{{--
============================================================================
resources/views/courses/show.blade.php
ONE template for every program: /courses/{slug}
Data = config/programs.php (COURSES.docx structure)
Vars from controller: $slug, $program, $image, $features, $mentor, $others
($curriculum ab use nahi hota — controller me rehne do, harmless)
============================================================================
--}}
@extends('layouts.main')

@section('title', $program['meta_title'])

@section('meta')
    <meta name="description" content="{{ $program['meta_desc'] }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $program['meta_title'] }}">
    <meta property="og:description" content="{{ $program['meta_desc'] }}">
    <meta property="og:image" content="{{ asset($image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $program['meta_title'] }}">
    <meta name="twitter:description" content="{{ $program['meta_desc'] }}">
    <meta name="twitter:image" content="{{ asset($image) }}">
@endsection

@section('styles')
    <style>
        /* ---------- Program page blocks (sg- language) ---------- */
        .sg-prog__section {
            margin-top: 44px;
        }

        /* ---------- Hero head ---------- */
        .sg-hero {
            margin-bottom: 24px;
        }

        .sg-hero__title {
            margin: 0 0 16px;
            font-size: clamp(28px, 3.2vw, 40px);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -.02em;
            color: var(--eduhive-base);
        }

        .sg-hero__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .sg-hero__meta-item {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 16px;
            border-radius: 50px;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--eduhive-base);
            background: rgba(var(--eduhive-base-rgb), .04);
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            transition: border-color .3s ease, background .3s ease;
        }

        .sg-hero__meta-item:hover {
            border-color: rgba(var(--eduhive-primary-rgb), .35);
            background: rgba(var(--eduhive-primary-rgb), .06);
        }

        .sg-hero__meta-item i {
            font-size: 15px;
            color: var(--eduhive-primary);
        }

        /* Hero image */
        .sg-hero__media {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .sg-hero__media::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(var(--eduhive-base-rgb), .45) 0%, transparent 40%);
            pointer-events: none;
        }

        .sg-hero__media img {
            width: 100%;
            display: block;
            aspect-ratio: 16 / 8;
            object-fit: cover;
            transition: transform .9s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-hero__media:hover img {
            transform: scale(1.035);
        }

        .sg-hero__category {
            position: absolute;
            z-index: 1;
            left: 20px;
            bottom: 18px;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            background: var(--eduhive-primary);
            box-shadow: 0 8px 22px rgba(var(--eduhive-base-rgb), .3);
        }

        /* ---------- Section head (replaces old .sg-prog__h block) ---------- */
        .sg-prog__section {
            margin-top: 48px;
        }

        .sg-prog__head {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 22px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(var(--eduhive-base-rgb), .08);
        }

        .sg-prog__head-icon {
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 18px;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .1);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .18);
        }

        .sg-prog__h {
            margin: 0;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.015em;
            color: var(--eduhive-base);
        }

        .sg-prog__text {
            margin: 0 0 14px;
            font-size: 15.5px;
            line-height: 1.85;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        .sg-prog__text:last-child {
            margin-bottom: 0;
        }

        /* Quote (Mission IIT) */
        .sg-quote {
            position: relative;
            margin: 0 0 22px;
            padding: 20px 24px 20px 60px;
            background: rgba(var(--eduhive-primary-rgb), .06);
            border-radius: 14px;
            border-left: 4px solid var(--eduhive-primary);
            font-size: 17px;
            font-weight: 600;
            font-style: italic;
            color: var(--eduhive-base);
        }

        .sg-quote i {
            position: absolute;
            left: 20px;
            top: 20px;
            font-size: 24px;
            color: var(--eduhive-primary);
            font-style: normal;
        }

        .sg-quote cite {
            display: block;
            margin-top: 6px;
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            color: rgba(var(--eduhive-base-rgb), .6);
        }

        /* Pathways chips */
        .sg-pathways {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin: 0 0 6px;
        }

        .sg-pathways__label {
            font-weight: 800;
            font-size: 14px;
            color: var(--eduhive-base);
        }

        .sg-pathways span:not(.sg-pathways__label) {
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .1);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .22);
        }

        /* Highlights (sg-focus) */
        .sg-focus {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sg-focus li {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 52px;
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

        /* Planner — numbered phase rail */
        .sg-plan {
            position: relative;
        }

        .sg-plan::before {
            content: "";
            position: absolute;
            top: 22px;
            bottom: 22px;
            left: 21px;
            border-left: 2px dashed rgba(var(--eduhive-base-rgb), .18);
        }

        .sg-plan__item {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 18px;
            padding-bottom: 20px;
        }

        .sg-plan__item:last-child {
            padding-bottom: 0;
        }

        .sg-plan__num {
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            font-weight: 800;
            color: var(--eduhive-primary);
            background: #fff;
            border: 2px solid rgba(var(--eduhive-primary-rgb), .35);
            box-shadow: 0 0 0 6px var(--eduhive-white, #fff);
            transition: background .3s ease, color .3s ease;
        }

        .sg-plan__item:hover .sg-plan__num {
            background: var(--eduhive-primary);
            color: #fff;
        }

        .sg-plan__body {
            flex: 1;
            padding: 14px 18px;
            background: rgba(var(--eduhive-base-rgb), .025);
            border: 1px solid rgba(var(--eduhive-base-rgb), .06);
            border-radius: 14px;
        }

        .sg-plan__phase {
            margin: 0 0 4px;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: .02em;
            color: var(--eduhive-base);
        }

        .sg-plan__text {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), .68);
        }

        /* Methodology chain + step rows */
        .sg-capability__chain {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px 6px;
            margin: 0 0 18px;
        }

        .sg-capability__chain span {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .1);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .2);
        }

        .sg-capability__chain i {
            font-size: 9px;
            color: rgba(var(--eduhive-base-rgb), .3);
        }

        .sg-method__steps {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 0 0 18px;
        }

        .sg-method__step {
            display: flex;
            align-items: baseline;
            gap: 14px;
            padding: 13px 18px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 12px;
        }

        .sg-method__step strong {
            flex-shrink: 0;
            min-width: 150px;
            font-size: 14px;
            font-weight: 800;
            color: var(--eduhive-primary);
        }

        .sg-method__step span {
            font-size: 14px;
            line-height: 1.5;
            color: rgba(var(--eduhive-base-rgb), .7);
        }

        .sg-method__levels {
            margin: 0 0 12px;
            padding: 13px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-base);
            background: rgba(var(--eduhive-base-rgb), .04);
            border: 1px solid rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-method__note {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: rgba(var(--eduhive-base-rgb), .65);
        }

        /* Testing schedule */
        .sg-testing__grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 16px;
        }

        .sg-testing__cell {
            padding: 18px 14px;
            text-align: center;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 14px;
            transition: border-color .3s ease, box-shadow .35s ease;
        }

        .sg-testing__cell:hover {
            border-color: rgba(var(--eduhive-primary-rgb), .3);
            box-shadow: 0 10px 24px rgba(var(--eduhive-base-rgb), .06);
        }

        .sg-testing__day {
            display: block;
            margin-bottom: 6px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--eduhive-primary);
        }

        .sg-testing__what {
            font-size: 15px;
            font-weight: 700;
            color: var(--eduhive-base);
        }

        .sg-testing__along {
            margin: 0;
            padding: 13px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            color: rgba(var(--eduhive-base-rgb), .75);
            background: rgba(var(--eduhive-primary-rgb), .06);
            border-left: 3px solid var(--eduhive-primary);
        }

        /* Objective callout */
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

        /* FAQs — static open cards, no JS */
        .sg-qa-static {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .sg-qa-static__item {
            padding: 20px 22px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 14px;
        }

        .sg-qa-static__q {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 0 0 8px;
            font-size: 16px;
            font-weight: 800;
            color: var(--eduhive-base);
        }

        .sg-qa-static__q i {
            flex-shrink: 0;
            margin-top: 3px;
            font-size: 14px;
            color: var(--eduhive-primary);
        }

        .sg-qa-static__a {
            margin: 0;
            padding-left: 24px;
            font-size: 14px;
            line-height: 1.7;
            color: rgba(var(--eduhive-base-rgb), .7);
        }

        /* ---------- Sidebar (sg-side) ---------- */
        .sg-side {
            position: sticky;
            top: 110px;
        }

        .sg-side__card {
            position: relative;
            overflow: hidden;
            padding: 28px 26px;
            background: #fff;
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            border-radius: 20px;
            box-shadow: 0 14px 40px rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-side__card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--eduhive-primary), var(--eduhive-base));
        }

        .sg-side__head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .sg-side__title {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.01em;
            color: var(--eduhive-base);
        }

        .sg-side__pill {
            padding: 5px 13px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .1);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .22);
        }

        /* Detail rows */
        .sg-side__list {
            list-style: none;
            margin: 0 0 20px;
            padding: 0;
        }

        .sg-side__row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 11px 0;
            border-bottom: 1px dashed rgba(var(--eduhive-base-rgb), .1);
            transition: transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-side__row:last-child {
            border-bottom: 0;
        }

        .sg-side__row:hover {
            transform: translateX(4px);
        }

        .sg-side__row-icon {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            font-size: 17px;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .09);
            transition: background .3s ease, color .3s ease, transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-side__row:hover .sg-side__row-icon {
            background: var(--eduhive-primary);
            color: #fff;
            transform: scale(1.06);
        }

        .sg-side__row-body {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 0;
        }

        .sg-side__row-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: rgba(var(--eduhive-base-rgb), .45);
        }

        .sg-side__row-value {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--eduhive-base);
        }

        /* Fees strip */
        .sg-side__fees {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 2px;
            margin-bottom: 18px;
            padding: 18px 20px;
            border-radius: 15px;
            background: linear-gradient(150deg, #2b3846 0%, var(--eduhive-base) 100%);
        }

        .sg-side__fees::after {
            content: "";
            position: absolute;
            top: 0;
            left: -80%;
            width: 55%;
            height: 100%;
            background: linear-gradient(105deg, transparent, rgba(255, 255, 255, .08), transparent);
            transform: skewX(-18deg);
            transition: left .8s cubic-bezier(.22, 1, .36, 1);
            pointer-events: none;
        }

        .sg-side__card:hover .sg-side__fees::after {
            left: 130%;
        }

        .sg-side__fees-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .55);
        }

        .sg-side__fees-value {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.01em;
            color: var(--eduhive-primary);
        }

        .sg-side__fees-note {
            font-size: 12px;
            color: rgba(255, 255, 255, .55);
        }

        /* Actions */
        .sg-side__actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 22px;
        }

        /* WA button on white card — darker text variant */
        .sg-cta__btn--wa-dark {
            color: #1e9e4f !important;
            background: rgba(37, 211, 102, .08);
            border-color: rgba(37, 211, 102, .35);
        }

        .sg-cta__btn--wa-dark:hover {
            background: rgba(37, 211, 102, .14);
        }

        .sg-side__assure {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin: 0;
            font-size: 12px;
            font-weight: 600;
            color: rgba(var(--eduhive-base-rgb), .55);
        }

        .sg-side__assure i {
            font-size: 11px;
            color: var(--eduhive-primary);
        }

        /* Includes */
        .sg-side__includes {
            padding-top: 18px;
            border-top: 1px solid rgba(var(--eduhive-base-rgb), .08);
        }

        .sg-side__includes-title {
            margin: 0 0 10px;
            font-size: 14px;
            font-weight: 800;
            color: var(--eduhive-base);
        }

        .sg-side__includes-list {
            list-style: none;
            margin: 0 0 20px;
            padding: 0;
        }

        .sg-side__includes-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 5px 0;
            font-size: 13.5px;
            line-height: 1.55;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        .sg-side__includes-list li i {
            flex-shrink: 0;
            margin-top: 4px;
            font-size: 11px;
            color: var(--eduhive-primary);
        }

        /* Share */
        .sg-side__share {
            display: flex;
            align-items: center;
            gap: 14px;
            padding-top: 18px;
            border-top: 1px solid rgba(var(--eduhive-base-rgb), .08);
        }

        .sg-side__share-label {
            font-size: 13px;
            font-weight: 800;
            color: var(--eduhive-base);
        }

        .sg-side__share-links {
            display: flex;
            gap: 8px;
        }

        .sg-side__share-links a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            color: var(--eduhive-base);
            background: rgba(var(--eduhive-base-rgb), .05);
            border: 1px solid rgba(var(--eduhive-base-rgb), .08);
            transition: background .3s ease, color .3s ease, transform .35s cubic-bezier(.22, 1, .36, 1),
                border-color .3s ease;
        }

        .sg-side__share-links a:hover {
            background: var(--eduhive-primary);
            border-color: var(--eduhive-primary);
            color: #fff;
            transform: translateY(-3px);
        }

        @media (max-width: 991px) {
            .sg-side {
                position: static;
            }
        }

        /* CTA (shared sg-cta) */
        .sg-cta {
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

        /* ---------- Mentor (sg-mentor) ---------- */
        .sg-mentor__card {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 45px;
            align-items: center;
            padding: 45px 50px;
            border-radius: 24px;
            background: rgba(var(--eduhive-base-rgb), .03);
            border: 1px solid rgba(var(--eduhive-base-rgb), .07);
        }

        .sg-mentor__card--no-img {
            grid-template-columns: 1fr;
        }

        .sg-mentor__card::after {
            content: "";
            position: absolute;
            top: -70px;
            right: -70px;
            width: 240px;
            height: 240px;
            background: radial-gradient(circle, rgba(var(--eduhive-primary-rgb), .12) 0%, transparent 70%);
            pointer-events: none;
        }

        .sg-mentor__media {
            position: relative;
        }

        .sg-mentor__img {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            aspect-ratio: 4 / 4.6;
        }

        .sg-mentor__img::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 20px;
            border: 2px solid rgba(var(--eduhive-primary-rgb), .25);
            pointer-events: none;
        }

        .sg-mentor__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .8s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-mentor__card:hover .sg-mentor__img img {
            transform: scale(1.04);
        }

        .sg-mentor__badge {
            position: absolute;
            bottom: 18px;
            right: -16px;
            display: flex;
            flex-direction: column;
            padding: 13px 18px;
            border-radius: 14px;
            background: var(--eduhive-primary);
            color: #fff;
            box-shadow: 0 12px 30px rgba(var(--eduhive-primary-rgb), .4);
            animation: sgMentorFloat 4s ease-in-out infinite;
        }

        @keyframes sgMentorFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-7px);
            }
        }

        .sg-mentor__badge-value {
            font-size: 21px;
            font-weight: 800;
            line-height: 1.1;
        }

        .sg-mentor__badge-label {
            font-size: 11px;
            font-weight: 600;
            opacity: .85;
        }

        .sg-mentor__body {
            position: relative;
            z-index: 1;
        }

        .sg-mentor__tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
            padding: 7px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--eduhive-primary);
            background: rgba(var(--eduhive-primary-rgb), .1);
            border: 1px solid rgba(var(--eduhive-primary-rgb), .22);
        }

        .sg-mentor__tag i {
            font-size: 14px;
        }

        .sg-mentor__name {
            margin: 0 0 6px;
            font-size: clamp(26px, 2.6vw, 34px);
            font-weight: 800;
            letter-spacing: -.015em;
            color: var(--eduhive-base);
        }

        .sg-mentor__role {
            display: inline-block;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 700;
            color: var(--eduhive-primary);
        }

        .sg-mentor__bio {
            margin: 0 0 20px;
            max-width: 560px;
            font-size: 15.5px;
            line-height: 1.8;
            color: rgba(var(--eduhive-base-rgb), .72);
        }

        .sg-mentor__exp {
            margin: 0 0 16px;
            font-size: 14px;
            color: var(--eduhive-base);
        }

        .sg-mentor__link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            font-weight: 700;
            color: var(--eduhive-base) !important;
            text-decoration: none !important;
        }

        .sg-mentor__link i {
            font-size: 13px;
            color: var(--eduhive-primary);
            transition: transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-mentor__link:hover i {
            transform: translateX(5px);
        }

        .sg-mentor__link span,
        .sg-mentor__link {
            background-image: linear-gradient(var(--eduhive-primary), var(--eduhive-primary));
            background-size: 0% 2px;
            background-repeat: no-repeat;
            background-position: left bottom;
            transition: background-size .45s cubic-bezier(.22, 1, .36, 1);
        }

        .sg-mentor__link:hover {
            background-size: calc(100% - 23px) 2px;
        }

        @media (max-width: 991px) {
            .sg-mentor__card {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 34px 28px;
            }

            .sg-mentor__media {
                max-width: 320px;
            }

            .sg-mentor__badge {
                right: 14px;
            }
        }

        @media (max-width: 575px) {
            .sg-mentor__card {
                padding: 28px 20px;
                border-radius: 20px;
            }
        }

        @media (max-width: 991px) {
            .sg-testing__grid {
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
            .sg-focus {
                grid-template-columns: 1fr;
            }

            .sg-focus li:last-child:nth-child(odd) {
                grid-column: auto;
            }

            .sg-method__step {
                flex-direction: column;
                gap: 4px;
            }

            .sg-method__step strong {
                min-width: 0;
            }

            .sg-testing__grid {
                grid-template-columns: 1fr;
            }

            .sg-cta__card {
                padding: 36px 24px;
                border-radius: 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .sg-focus li,
            .sg-plan__num,
            .sg-testing__cell,
            .sg-cta__btn,
            .sg-cta__btn-icon {
                transition: none !important;
            }

            .sg-focus li:hover,
            .sg-cta__btn:hover {
                transform: none;
            }

            .sg-side__row,
            .sg-side__row-icon,
            .sg-side__fees::after,
            .sg-side__share-links a {
                transition: none !important;
            }

            .sg-mentor__img img,
            .sg-mentor__badge,
            .sg-mentor__link,
            .sg-mentor__link i {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
@endsection

@section('content')

    @php
        $ask = 'Ask us';
        $contactUrl = url('/contact') . '?program=' . $slug;
        $pageUrl = urlencode(url()->current());
        $shareText = rawurlencode($program['name'] . ' at SG Educare, Kalyan');
        $whatsapp = 'https://wa.me/917715916926?text=' . rawurlencode('Hi, I want to know more about ' . $program['name'] . ' at SG Educare.');
    @endphp

    {{-- ================= PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span>
                        href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/courses') }}">Courses</a></li>
                    <li><span>{{ $program['short'] }}</span></li>
                </ul>
                <h1 class="page-header__title">{{ $program['name'] }}</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    {{-- ================= COURSE DETAILS ================= --}}
    <section class="course-details section-space">
        <div class="container">
            <div class="row gutter-y-40">

                {{-- ---------- MAIN COLUMN ---------- --}}
                <div class="col-xl-8 col-lg-7">
                    <div class="course-details__inner">

                        {{-- HERO HEAD --}}
                        <div class="sg-hero wow fadeInUp" data-wow-duration="1200ms">
                            <h2 class="sg-hero__title">{{ $program['tagline'] }}</h2>
                            <div class="sg-hero__meta">
                                <span class="sg-hero__meta-item"><i class="icon-graduation"
                                        aria-hidden="true"></i>{{ $program['for'] }}</span>
                                <span class="sg-hero__meta-item"><i class="icon-ranking"
                                        aria-hidden="true"></i>{{ $program['exam'] }}</span>
                                <span class="sg-hero__meta-item"><i class="icon-open-book"
                                        aria-hidden="true"></i>{{ count($program['subjects']) }} Subjects</span>
                            </div>
                        </div>

                        {{-- HERO IMAGE --}}
                        <div class="sg-hero__media wow fadeInUp" data-wow-duration="1200ms">
                            <img src="{{ asset($image) }}" alt="{{ $program['name'] }} coaching at SG Educare">
                            <span class="sg-hero__category">{{ $program['short'] }}</span>
                            @if (!empty($program['video']))
                                <a href="{{ $program['video'] }}" class="course-details__video-btn video-btn video-popup"
                                    aria-label="Play video">
                                    <i class="icon-play"></i>
                                    <span></span><span></span><span></span><span></span>
                                </a>
                            @endif
                        </div>

                        {{-- ABOUT --}}
                        <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                            <div class="sg-prog__head">
                                <span class="sg-prog__head-icon"><i class="icon-open-book" aria-hidden="true"></i></span>
                                <h3 class="sg-prog__h">About this program</h3>
                            </div>

                            @if (!empty($program['quote']))
                                <blockquote class="sg-quote">
                                    <i class="icon-quote" aria-hidden="true"></i>
                                    "{{ $program['quote']['text'] }}"
                                    — {{ $program['quote']['by'] }}
                                </blockquote>
                            @endif

                            @foreach ($program['overview'] as $para)
                                <p class="sg-prog__text">{{ $para }}</p>
                            @endforeach

                            @if (!empty($program['pathways']))
                                <div class="sg-pathways" style="margin-top: 16px;">
                                    <span class="sg-pathways__label">Pathways:</span>
                                    @foreach ($program['pathways'] as $pw)
                                        <span>{{ $pw }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- HIGHLIGHTS --}}
                        <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                            <div class="sg-prog__head">
                                <span class="sg-prog__head-icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                <h3 class="sg-prog__h">Course highlights</h3>
                            </div>
                            <ul class="sg-focus">
                                @foreach ($program['highlights'] as $h)
                                    <li class="wow fadeInUp" data-wow-duration="1000ms"
                                        data-wow-delay="{{ ($loop->index % 2) * 60 }}ms">
                                        <span class="sg-focus__icon"><i class="icon-check-2" aria-hidden="true"></i></span>
                                        {{ $h }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- COURSE PLANNER --}}
                        <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                            <div class="sg-prog__head">
                                <span class="sg-prog__head-icon"><i class="icon-clipboard" aria-hidden="true"></i></span>
                                <h3 class="sg-prog__h">Course planner</h3>
                            </div>
                            <div class="sg-plan">
                                @foreach ($program['planner'] as $ph)
                                    <div class="sg-plan__item wow fadeInUp" data-wow-duration="1000ms"
                                        data-wow-delay="{{ $loop->index * 70 }}ms">
                                        <span class="sg-plan__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        <div class="sg-plan__body">
                                            <h4 class="sg-plan__phase">{{ $ph['phase'] }}</h4>
                                            <p class="sg-plan__text">{{ $ph['text'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- TEACHING METHODOLOGY --}}
                        <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                            <div class="sg-prog__head">
                                <span class="sg-prog__head-icon"><i class="icon-teacher" aria-hidden="true"></i></span>
                                <h3 class="sg-prog__h">Teaching methodology</h3>
                            </div>

                            <div class="sg-capability__chain"
                                aria-label="{{ implode(', ', $program['methodology']['flow']) }}">
                                @foreach ($program['methodology']['flow'] as $chip)
                                    <span>{{ $chip }}</span>
                                    @if (!$loop->last)<i class="fas fa-chevron-right" aria-hidden="true"></i>@endif
                                @endforeach
                            </div>

                            @if (!empty($program['methodology']['steps']))
                                <div class="sg-method__steps">
                                    @foreach ($program['methodology']['steps'] as $st)
                                        <div class="sg-method__step wow fadeInUp" data-wow-duration="1000ms"
                                            data-wow-delay="{{ $loop->index * 60 }}ms">
                                            <strong>{{ $st['t'] }}</strong>
                                            <span>{{ $st['d'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if (!empty($program['methodology']['levels']))
                                <p class="sg-method__levels">{{ $program['methodology']['levels'] }}</p>
                            @endif

                            @if (!empty($program['methodology']['note']))
                                <p class="sg-method__note">{{ $program['methodology']['note'] }}</p>
                            @endif
                        </div>

                        {{-- TESTING SYSTEM --}}
                        @if (!empty($program['testing']))
                            <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                                <div class="sg-prog__head">
                                    <span class="sg-prog__head-icon"><i class="icon-exam" aria-hidden="true"></i></span>
                                    <h3 class="sg-prog__h">Testing system</h3>
                                </div>
                                <div class="sg-testing__grid">
                                    @foreach ($program['testing']['schedule'] as $slot)
                                        <div class="sg-testing__cell wow fadeInUp" data-wow-duration="1000ms"
                                            data-wow-delay="{{ $loop->index * 70 }}ms">
                                            <span class="sg-testing__day">{{ $slot[0] }}</span>
                                            <span class="sg-testing__what">{{ $slot[1] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <p class="sg-testing__along"><strong>Along with:</strong>
                                    {{ $program['testing']['along'] }}
                                </p>
                            </div>
                        @endif

                        {{-- OBJECTIVE --}}
                        @if (!empty($program['objective']))
                            <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                                <div class="sg-callout">
                                    <i class="icon-ranking" aria-hidden="true"></i>
                                    {{ $program['objective'] }}
                                </div>
                            </div>
                        @endif

                        {{-- FAQS (static, no JS) --}}
                        @if (!empty($program['faqs']))
                            <div class="sg-prog__section wow fadeInUp" data-wow-duration="1200ms">
                                <div class="sg-prog__head">
                                    <span class="sg-prog__head-icon"><i class="fas fa-question" aria-hidden="true"></i></span>
                                    <h3 class="sg-prog__h">Frequently asked</h3>
                                </div>
                                <div class="sg-qa-static">
                                    @foreach ($program['faqs'] as $faq)
                                        <div class="sg-qa-static__item">
                                            <h4 class="sg-qa-static__q">
                                                <i class="fas fa-question-circle" aria-hidden="true"></i>
                                                {{ $faq['q'] }}
                                            </h4>
                                            <p class="sg-qa-static__a">{{ $faq['a'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- ---------- SIDEBAR ---------- --}}
                <div class="col-xl-4 col-lg-5">
                    <aside class="sg-side wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="sg-side__card">

                            <div class="sg-side__head">
                                <h3 class="sg-side__title">Program Details</h3>
                                <span class="sg-side__pill">{{ $program['short'] }}</span>
                            </div>

                            <ul class="sg-side__list">
                                @php
                                    $rows = [
                                        ['icon-graduation', 'Classes', $program['for']],
                                        ['icon-ranking', 'Exam', $program['exam']],
                                        ['icon-clock-1', 'Duration', $program['duration'] ?? $ask],
                                        ['icon-multiple-users', 'Batches', $program['batches'] ?? $ask],
                                        ['icon-open-book', 'Subjects', implode(', ', $program['subjects'])],
                                        ['icon-globe', 'Mode', $program['mode'] ?? $ask],
                                    ];
                                @endphp
                                @foreach ($rows as [$icon, $label, $value])
                                    <li class="sg-side__row">
                                        <span class="sg-side__row-icon"><i class="{{ $icon }}" aria-hidden="true"></i></span>
                                        <span class="sg-side__row-body">
                                            <span class="sg-side__row-label">{{ $label }}</span>
                                            <span class="sg-side__row-value">{{ $value }}</span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="sg-side__fees">
                                <span class="sg-side__fees-label">Program Fees</span>
                                <span class="sg-side__fees-value">{{ $program['fees'] ?? 'Ask Us' }}</span>
                                <span class="sg-side__fees-note">Discussed transparently during counselling</span>
                            </div>

                            <div class="sg-side__actions">
                                <a href="{{ $contactUrl }}" class="sg-cta__btn sg-cta__btn--primary">
                                    <span>Book Free Counselling</span>
                                    <span class="sg-cta__btn-icon"><i class="icon-right-arrow"
                                            aria-hidden="true"></i></span>
                                </a>
                                <a href="{{ $whatsapp }}" class="sg-cta__btn sg-cta__btn--wa sg-cta__btn--wa-dark"
                                    target="_blank" rel="noopener">
                                    <span>Enquire on WhatsApp</span>
                                    <span class="sg-cta__btn-icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
                                </a>
                                <p class="sg-side__assure"><i class="icon-check-2" aria-hidden="true"></i> Free session
                                    · No obligation</p>
                            </div>

                            <div class="sg-side__includes">
                                <h4 class="sg-side__includes-title">Every SG program includes</h4>
                                <ul class="sg-side__includes-list">
                                    @foreach ($features as $feature)
                                        <li><i class="icon-check-2" aria-hidden="true"></i>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="sg-side__share">
                                <span class="sg-side__share-label">Share:</span>
                                <div class="sg-side__share-links">
                                    <a href="https://wa.me/?text={{ $shareText }}%20{{ $pageUrl }}" target="_blank"
                                        rel="noopener" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"
                                            aria-hidden="true"></i></a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $pageUrl }}" target="_blank"
                                        rel="noopener" aria-label="Share on Facebook"><i class="fab fa-facebook-f"
                                            aria-hidden="true"></i></a>
                                    <a href="https://x.com/intent/tweet?url={{ $pageUrl }}&text={{ $shareText }}"
                                        target="_blank" rel="noopener" aria-label="Share on X"><i class="fab fa-twitter"
                                            aria-hidden="true"></i></a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $pageUrl }}"
                                        target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i
                                            class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>

    {{-- ================= MENTOR ================= --}}
    @if (!empty($mentor['bio']))
        @php $hasMentorImg = !empty($mentor['image']) && file_exists(public_path($mentor['image'])); @endphp
        <section class="sg-mentor section-space2" style="padding-top: 0px !important;">
            <div class="container">
                <div class="sg-mentor__card {{ $hasMentorImg ? '' : 'sg-mentor__card--no-img' }} wow fadeInUp"
                    data-wow-duration="1500ms">

                    @if ($hasMentorImg)
                        <div class="sg-mentor__media">
                            <div class="sg-mentor__img">
                                <img src="{{ asset($mentor['image']) }}" alt="{{ $mentor['name'] }}">
                            </div>
                            @if (!empty($mentor['experience']))
                                <div class="sg-mentor__badge">
                                    <span class="sg-mentor__badge-value">{{ $mentor['experience'] }}</span>
                                    <span class="sg-mentor__badge-label">of teaching</span>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="sg-mentor__body">
                        <span class="sg-mentor__tag"><i class="icon-graduation" aria-hidden="true"></i> Your Mentor</span>
                        <h3 class="sg-mentor__name">{{ $mentor['name'] }}</h3>
                        @if (!empty($mentor['designation']))
                            <span class="sg-mentor__role">{{ $mentor['designation'] }}</span>
                        @endif
                        <p class="sg-mentor__bio">{{ $mentor['bio'] }}</p>

                        @if (!$hasMentorImg && !empty($mentor['experience']))
                            <p class="sg-mentor__exp"><strong>Experience:</strong> {{ $mentor['experience'] }}</p>
                        @endif

                        <a href="{{ $contactUrl }}" class="sg-mentor__link">
                            Meet the team in a free counselling session
                            <i class="icon-right-arrow" aria-hidden="true"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- ================= OTHER PROGRAMS ================= --}}
    @if (!empty($others))
        <section class="courses-four section-space2">
            <div class="container">
                <div class="courses-four__top">
                    <div class="row gutter-y-50 align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <h6 class="sec-title__tagline">our programs</h6>
                                <h3 class="sec-title__title"><span>Explore</span> <span
                                        class="sec-title__title__shape">Other</span> <span
                                        class="sec-title__title__text">Programs</span></h3>
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
                    @foreach ($others as $oSlug => $o)
                        @php
                            $oUrl = url('/courses/' . $oSlug);
                            $oImg = 'assets/images/programs/' . $oSlug . '.jpg';
                            $oImg = file_exists(public_path($oImg)) ? $oImg : 'assets/images/courses/course-1-' . (($loop->index % 9) + 1) . '.jpg';
                        @endphp
                        <div class="item">
                            <div class="course-card wow fadeInUp" data-wow-duration="1500ms"
                                data-wow-delay="{{ ($loop->index % 3) * 100 }}ms">
                                <div class="course-card__image">
                                    <img src="{{ asset($oImg) }}" alt="{{ $o['name'] }}">
                                </div>
                                <div class="course-card__content">
                                    <div class="course-card__content__top">
                                        <div class="course-card__category">{{ $o['short'] }}</div>
                                        <div class="course-card__duration">
                                            <span class="course-card__duration__icon"><i class="icon-clock"></i></span>
                                            {{ $o['for'] }}
                                        </div>
                                    </div>
                                    <h3 class="course-card__title"><a href="{{ $oUrl }}">{{ $o['name'] }}</a></h3>
                                    <div class="course-card__info">
                                        <div class="course-card__lessons">
                                            <span class="course-card__lessons__icon"><i class="icon-open-book"></i></span>
                                            {{ count($o['subjects']) }} Subjects
                                        </div>
                                    </div>
                                </div>
                                <div class="course-card__hover"
                                    style="background-image: url({{ asset('assets/images/shapes/course-card-bg-1-1.png') }});">
                                    <div class="course-card__hover__content">
                                        <div class="course-card__content__top course-card__content__top--hover">
                                            <div class="course-card__category">{{ $o['short'] }}</div>
                                            <div class="course-card__duration">
                                                <span class="course-card__duration__icon"><i class="icon-clock"></i></span>
                                                {{ $o['for'] }}
                                            </div>
                                        </div>
                                        <h3 class="course-card__title course-card__title--hover">
                                            href="{{ $oUrl }}">{{ $o['name'] }}</a></h3>
                                        <p class="course-card__text">{{ $o['tagline'] }}</p>
                                        <a href="{{ $oUrl }}" class="course-card__btn eduhive-btn eduhive-btn--border">
                                            <span>view program</span>
                                            <span class="eduhive-btn__icon">
                                                <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ================= CTA ================= --}}
    <section class="sg-cta-repo" style="margin-bottom: 60px;">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-graduation" aria-hidden="true"></i> Ready to Start?</span>
                    <h2 class="sg-cta__title">Your Goal Deserves a Plan.</h2>
                    <p class="sg-cta__text">Talk to our academic team to understand the right program, preparation
                        pathway and batch structure for your student.</p>
                </div>
                <div class="sg-cta__actions">
                    <a href="{{ $contactUrl }}" class="sg-cta__btn sg-cta__btn--primary">
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
    <script type="application/ld+json">
                            {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Course',
        'name' => $program['name'],
        'description' => $program['meta_desc'],
        'url' => url()->current(),
        'provider' => [
            '@type' => 'EducationalOrganization',
            'name' => 'SG Educare',
            'sameAs' => url('/'),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                        </script>
@endsection