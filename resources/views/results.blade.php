{{--
============================================================================
resources/views/results.blade.php → /results
Confirm before go-live: Kirti Pandey/Pande spelling; NEET 627 attribution
(docx: Dhiraj Patil, about page: Niraj Fatkal); Dhiraj Patil 12th dual figure.
============================================================================
--}}
@extends('layouts.main')

@section('title', 'Results | JEE, NEET, MHT-CET & Board Toppers | SG Educare Kalyan')

@section('meta')
    <meta name="description"
        content="SG Educare results: JEE Advanced AIR 711, JEE Main 99.21 percentile, MHT-CET 99.78 percentile, NEET 627 and 10th Board 97.60%. Student achievements from Kalyan.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Results | SG Educare Kalyan">
    <meta property="og:description" content="JEE, NEET, MHT-CET and Board results achieved by SG Educare students.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
@endsection

@section('styles')
    <style>
        /* ==========================================================
           Tokens (inherit Eduhive theme colours)
           Adjust --sg-sticky-top to your sticky header height.
           ========================================================== */
        .sg-results {
            --sg-ink: var(--eduhive-base);
            --sg-ink-rgb: var(--eduhive-base-rgb);
            --sg-accent: var(--eduhive-primary);
            --sg-accent-rgb: var(--eduhive-primary-rgb);
            --sg-dark: #1e2833;
            --sg-line: rgba(var(--sg-ink-rgb), .1);
            --sg-muted: rgba(var(--sg-ink-rgb), .62);
            --sg-ease: cubic-bezier(.22, 1, .36, 1);
            --sg-sticky-top: 100px;
        }

        .sg-results :focus-visible {
            outline: 3px solid var(--sg-accent);
            outline-offset: 3px;
        }

        .sg-results__intro {
            max-width: 640px;
            margin: 0 auto 40px;
            text-align: center;
            font-size: 16px;
            line-height: 1.75;
            color: var(--sg-muted);
        }

        /* ==========================================================
           Scoreboard (headline numbers)
           ========================================================== */
        .sg-board {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-radius: 22px;
            overflow: hidden;
            background: var(--sg-dark);
            box-shadow: 0 24px 60px rgba(var(--sg-ink-rgb), .22);
        }

        .sg-board__item {
            position: relative;
            padding: 34px 28px 30px;
        }

        .sg-board__item+.sg-board__item {
            border-left: 1px solid rgba(255, 255, 255, .08);
        }

        .sg-board__item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 28px;
            width: 32px;
            height: 3px;
            border-radius: 0 0 3px 3px;
            background: var(--sg-accent);
        }

        .sg-board__label {
            display: block;
            margin-bottom: 14px;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, .62);
        }

        .sg-board__value {
            display: flex;
            align-items: baseline;
            gap: 6px;
            font-variant-numeric: tabular-nums;
            color: #fff;
        }

        .sg-board__num {
            font-size: clamp(34px, 3.6vw, 50px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.03em;
        }

        .sg-board__affix {
            font-size: 16px;
            font-weight: 700;
            color: var(--sg-accent);
        }

        .sg-board__who {
            display: block;
            margin-top: 10px;
            font-size: 13px;
            color: rgba(255, 255, 255, .5);
        }

        /* ==========================================================
           Exam filter (sticky)
           ========================================================== */
        .sg-filter {
            margin: 56px 0 8px;
            padding: 10px 0;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: saturate(1.4) blur(10px);
            -webkit-backdrop-filter: saturate(1.4) blur(10px);
        }

        .sg-filter__track {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            scrollbar-width: none;
            padding: 4px 2px;
        }

        .sg-filter__track::-webkit-scrollbar {
            display: none;
        }

        .sg-filter__btn {
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
            color: var(--sg-ink);
            cursor: pointer;
            transition: background .25s ease, color .25s ease, border-color .25s ease;
        }

        .sg-filter__btn:hover {
            border-color: rgba(var(--sg-accent-rgb), .5);
        }

        .sg-filter__count {
            min-width: 22px;
            padding: 2px 7px;
            border-radius: 50px;
            font-size: 12px;
            font-variant-numeric: tabular-nums;
            text-align: center;
            background: rgba(var(--sg-ink-rgb), .07);
        }

        .sg-filter__btn[aria-pressed="true"] {
            background: var(--sg-ink);
            border-color: var(--sg-ink);
            color: #fff;
        }

        .sg-filter__btn[aria-pressed="true"] .sg-filter__count {
            background: var(--sg-accent);
            color: #fff;
        }

        /* ==========================================================
           Exam group
           ========================================================== */
        .sg-group {
            padding-top: 48px;
            scroll-margin-top: calc(var(--sg-sticky-top) + 80px);
        }

        .sg-group[hidden] {
            display: none;
        }

        .sg-group.is-entering {
            animation: sgFade .45s var(--sg-ease);
        }

        @keyframes sgFade {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .sg-group__head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--sg-line);
        }

        .sg-group__title {
            margin: 0;
            font-size: clamp(24px, 2.4vw, 30px);
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--sg-ink);
        }

        .sg-group__meta {
            font-size: 14px;
            font-weight: 600;
            color: var(--sg-muted);
            white-space: nowrap;
        }

        /* ---------- Topper spotlight ---------- */
        .sg-topper {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 32px;
            margin-bottom: 22px;
            padding: 28px 40px 28px 28px;
            border-radius: 22px;
            color: #fff;
            background:
                radial-gradient(circle at 100% 0%, rgba(var(--sg-accent-rgb), .28) 0%, transparent 45%),
                var(--sg-dark);
        }

        .sg-topper__media {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .sg-topper__media img,
        .sg-topper__media .sg-fallback {
            width: 100%;
            height: 100%;
            border-radius: 18px;
            object-fit: cover;
            object-position: top center;
            box-shadow: 0 0 0 3px var(--sg-accent), 0 16px 34px rgba(0, 0, 0, .35);
        }

        .sg-topper__media .sg-fallback {
            font-size: 44px;
            color: #fff;
            background: rgba(255, 255, 255, .08);
        }

        .sg-topper__crown {
            position: absolute;
            top: -12px;
            right: -12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            color: #fff;
            background: var(--sg-accent);
            border: 3px solid var(--sg-dark);
        }

        .sg-topper__badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .14);
        }

        .sg-topper__name {
            margin: 0;
            font-size: clamp(22px, 2.3vw, 30px);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -.015em;
            color: #fff;
        }

        .sg-topper__note {
            margin: 8px 0 0;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, .6);
        }

        .sg-topper__score {
            text-align: right;
        }

        .sg-topper__score-label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .55);
        }

        .sg-topper__score-value {
            display: inline-flex;
            align-items: baseline;
            gap: 6px;
            font-variant-numeric: tabular-nums;
        }

        .sg-topper__score-value .sg-num {
            font-size: clamp(48px, 5.6vw, 76px);
            font-weight: 800;
            line-height: .95;
            letter-spacing: -.04em;
            color: #fff;
        }

        .sg-topper__score-value .sg-affix {
            font-size: 20px;
            font-weight: 800;
            color: var(--sg-accent);
        }

        /* ---------- Student tiles ---------- */
        .sg-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .sg-tile {
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--sg-line);
            border-radius: 16px;
            transition: border-color .25s ease;
        }

        .sg-tile:hover {
            border-color: rgba(var(--sg-accent-rgb), .55);
        }

        .sg-tile__media {
            aspect-ratio: 4 / 4.4;
            overflow: hidden;
            background: rgba(var(--sg-ink-rgb), .04);
        }

        .sg-tile__media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        .sg-tile__media .sg-fallback {
            font-size: 42px;
            color: rgba(var(--sg-accent-rgb), .7);
            background: linear-gradient(160deg, rgba(var(--sg-accent-rgb), .08), rgba(var(--sg-ink-rgb), .05));
        }

        .sg-tile__body {
            padding: 14px 16px 16px;
        }

        .sg-tile__score {
            display: flex;
            align-items: baseline;
            gap: 5px;
            margin-bottom: 4px;
            font-variant-numeric: tabular-nums;
        }

        .sg-tile__score .sg-num {
            font-size: 26px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.02em;
            color: var(--sg-ink);
        }

        .sg-tile__score .sg-affix {
            font-size: 13px;
            font-weight: 800;
            color: var(--sg-accent);
        }

        .sg-tile__name {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--sg-ink);
        }

        .sg-tile__note {
            margin: 3px 0 0;
            font-size: 12px;
            font-weight: 600;
            color: var(--sg-muted);
        }

        /* Shared initials fallback */
        .sg-fallback {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            font-weight: 800;
            letter-spacing: .02em;
        }

        .sg-results__disclaimer {
            max-width: 680px;
            margin: 64px auto 0;
            text-align: center;
            font-size: 13px;
            line-height: 1.7;
            color: var(--sg-muted);
        }

        /* ---------- CTA ---------- */
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

        /* ==========================================================
           Responsive
           ========================================================== */
        @media (max-width: 1199px) {
            .sg-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .sg-board {
                grid-template-columns: repeat(2, 1fr);
            }

            .sg-board__item:nth-child(3) {
                border-left: 0;
            }

            .sg-board__item:nth-child(n+3) {
                border-top: 1px solid rgba(255, 255, 255, .08);
            }

            .sg-topper {
                grid-template-columns: auto 1fr;
                gap: 24px;
                padding: 24px;
            }

            .sg-topper__score {
                grid-column: 1 / -1;
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                padding-top: 18px;
                border-top: 1px solid rgba(255, 255, 255, .1);
                text-align: left;
            }

            .sg-cta__card {
                grid-template-columns: 1fr;
                gap: 28px;
                padding: 40px 32px;
            }

            .sg-cta__btn {
                justify-self: start;
            }
        }

        @media (max-width: 767px) {
            .sg-results {
                --sg-sticky-top: 70px;
            }

            .sg-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }

            .sg-topper__media {
                width: 96px;
                height: 96px;
            }

            .sg-topper__media .sg-fallback {
                font-size: 30px;
            }
        }

        @media (max-width: 575px) {
            .sg-board__item {
                padding: 26px 18px 22px;
            }

            .sg-board__item::before {
                left: 18px;
            }

            .sg-board__label {
                font-size: 13px;
            }

            .sg-group__meta {
                display: none;
            }

            .sg-topper {
                gap: 18px;
                padding: 20px;
                border-radius: 18px;
            }

            .sg-topper__media {
                width: 80px;
                height: 80px;
            }

            .sg-topper__badge {
                font-size: 12px;
            }

            .sg-tile__body {
                padding: 12px;
            }

            .sg-tile__score .sg-num {
                font-size: 22px;
            }

            .sg-tile__name {
                font-size: 14px;
            }

            .sg-cta__card {
                padding: 32px 22px;
                border-radius: 20px;
            }

            .sg-cta__btn {
                width: 100%;
                justify-content: space-between;
                white-space: normal;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .sg-group.is-entering {
                animation: none;
            }

            .sg-filter__btn,
            .sg-tile,
            .sg-cta__btn {
                transition: none !important;
            }

            .sg-cta__btn:hover {
                transform: none;
            }
        }
    </style>
@endsection

@section('content')

    @php
        // ⚠️ Confirm before go-live: Kirti Pandey/Pande spelling; NEET 627 attribution
        //    (docx: Dhiraj Patil; about page: Niraj Fatkal); Dhiraj Patil 12th dual figure.
        // Order each group best → lowest. The first entry is shown as the topper.
        $resultGroups = [
            [
                'title' => 'JEE Advanced',
                'metric' => 'All India Rank',
                'results' => [
                    ['name' => 'Prashik Ahire', 'prefix' => 'AIR', 'value' => '711'],
                    ['name' => 'Aryan Shejwal', 'prefix' => 'AIR', 'value' => '1115'],
                    ['name' => 'Vinayak Diwakar', 'prefix' => 'AIR', 'value' => '2546'],
                    ['name' => 'Dhruv Shirsat', 'prefix' => 'AIR', 'value' => '4675'],
                    ['name' => 'Kirti Pandey', 'prefix' => 'AIR', 'value' => '7770'],
                ],
            ],
            [
                'title' => 'JEE Main',
                'metric' => 'Percentile',
                'results' => [
                    ['name' => 'Kirti Pandey', 'value' => '99.21', 'suffix' => '%ile'],
                    ['name' => 'Kunal Choudhary', 'value' => '98.78', 'suffix' => '%ile'],
                    ['name' => 'Aryan Shejwal', 'value' => '98.28', 'suffix' => '%ile'],
                    ['name' => 'Aditya Sonar', 'value' => '98.00', 'suffix' => '%ile'],
                    ['name' => 'Vinayak Diwakar', 'value' => '97.00', 'suffix' => '%ile'],
                ],
            ],
            [
                'title' => 'MHT-CET',
                'metric' => 'Percentile',
                'results' => [
                    ['name' => 'Advait Gotkhinde', 'value' => '99.78', 'suffix' => '%ile'],
                    ['name' => 'Pranit Bhosale', 'value' => '99.33', 'suffix' => '%ile'],
                    ['name' => 'Kirti Pandey', 'value' => '99.23', 'suffix' => '%ile'],
                    ['name' => 'Soham Bangar', 'value' => '99.19', 'suffix' => '%ile'],
                    ['name' => 'Kunal Choudhary', 'value' => '97.68', 'suffix' => '%ile'],
                    ['name' => 'Sneha Bhundere', 'value' => '97.52', 'suffix' => '%ile'],
                    ['name' => 'Gaurav Ghude', 'value' => '97.15', 'suffix' => '%ile'],
                    ['name' => 'Mohd. Adnan Shaikh', 'value' => '96.87', 'suffix' => '%ile'],
                    ['name' => 'Nishant Patil', 'value' => '95.98', 'suffix' => '%ile'],
                ],
            ],
            [
                'title' => 'NEET',
                'metric' => 'Score',
                'results' => [
                    ['name' => 'Dhiraj Patil', 'value' => '627', 'suffix' => '/720'],
                    ['name' => 'Ruchi Dalvi', 'value' => '610', 'suffix' => '/720'],
                    ['name' => 'Karan Bankar', 'value' => '595', 'suffix' => '/720'],
                    ['name' => 'Vedant Mandhare', 'value' => '586', 'suffix' => '/720'],
                ],
            ],
            [
                'title' => '12th Board',
                'metric' => 'Overall',
                'results' => [
                    ['name' => 'Dhiraj Patil', 'value' => '88.33', 'suffix' => '%', 'note' => 'PCB 94%'],
                    ['name' => 'Kirti Pandey', 'value' => '88.00', 'suffix' => '%'],
                    ['name' => 'Soham Bangar', 'value' => '87.87', 'suffix' => '%'],
                    ['name' => 'Gaurav Ghude', 'value' => '86.17', 'suffix' => '%'],
                ],
            ],
            [
                'title' => '10th Board',
                'metric' => 'Overall',
                'results' => [
                    ['name' => 'Ujwal Ghude', 'value' => '97.60', 'suffix' => '%'],
                    ['name' => 'Vishnu Pillai', 'value' => '96.80', 'suffix' => '%'],
                    ['name' => 'Sai Sarvanan', 'value' => '96.60', 'suffix' => '%'],
                ],
            ],
        ];

        $groups = collect($resultGroups)->map(function ($g) {
            $g['slug'] = \Illuminate\Support\Str::slug($g['title']);
            return $g;
        });

        // Photo: public/assets/images/results/{slug}.(jpg|jpeg|png|webp). Missing → initials.
        $photoCache = [];
        $resPhoto = function ($name) use (&$photoCache) {
            $slug = \Illuminate\Support\Str::slug($name);
            if (array_key_exists($slug, $photoCache)) {
                return $photoCache[$slug];
            }
            foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                $p = "assets/images/results/{$slug}.{$ext}";
                if (file_exists(public_path($p))) {
                    return $photoCache[$slug] = $p;
                }
            }
            return $photoCache[$slug] = null;
        };
        $resInitials = fn($name) => collect(preg_split('/\s+/', trim($name)))
            ->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))->take(2)->implode('');
        $decimalsOf = fn($v) => str_contains((string) $v, '.') ? strlen(substr(strrchr((string) $v, '.'), 1)) : 0;

        // Headline numbers derived from the data above (single source of truth)
        $topOf = fn($title) => $groups->firstWhere('title', $title)['results'][0] ?? null;
        $totalEntries = $groups->sum(fn($g) => count($g['results']));
        $uniqueStudents = $groups->flatMap(fn($g) => array_column($g['results'], 'name'))->unique()->count();

        $board = array_values(array_filter([
            ($t = $topOf('JEE Advanced')) ? ['label' => 'Best JEE Advanced rank', 'prefix' => 'AIR', 'value' => $t['value'], 'who' => $t['name']] : null,
            ($t = $topOf('MHT-CET')) ? ['label' => 'Top MHT-CET percentile', 'value' => $t['value'], 'suffix' => '%ile', 'who' => $t['name']] : null,
            ($t = $topOf('NEET')) ? ['label' => 'Top NEET score', 'value' => $t['value'], 'suffix' => '/720', 'who' => $t['name']] : null,
            ['label' => 'Students featured', 'value' => $uniqueStudents, 'who' => 'Across ' . $groups->count() . ' exams'],
        ]));
    @endphp

    {{-- ================= PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
                    <li><span>Results</span></li>
                </ul>
                <h1 class="page-header__title">Results</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    {{-- ================= RESULTS ================= --}}
    <section class="sg-results section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">results that speak</h6>
                <h3 class="sec-title__title">Proof of the <span class="sec-title__title__text">SG</span> <span
                        class="sec-title__title__shape">Process</span></h3>
            </div>
            <p class="sg-results__intro">
                Behind every result is the same system: learn, practise, test, analyse and improve.
                These are the students who worked it, exam after exam.
            </p>

            {{-- Scoreboard --}}
            <div class="sg-board" role="list">
                @foreach ($board as $s)
                    <div class="sg-board__item" role="listitem">
                        <span class="sg-board__label">{{ $s['label'] }}</span>
                        <div class="sg-board__value">
                            @if (!empty($s['prefix']))<span class="sg-board__affix">{{ $s['prefix'] }}</span>@endif
                            <span class="sg-board__num" data-count="{{ $s['value'] }}"
                                data-decimals="{{ $decimalsOf($s['value']) }}">{{ $s['value'] }}</span>
                            @if (!empty($s['suffix']))<span class="sg-board__affix">{{ $s['suffix'] }}</span>@endif
                        </div>
                        <span class="sg-board__who">{{ $s['who'] }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Exam filter --}}
            <nav class="sg-filter" aria-label="Filter results by exam">
                <div class="sg-filter__track">
                    <button type="button" class="sg-filter__btn" data-filter="all" aria-pressed="true">
                        All exams <span class="sg-filter__count">{{ $totalEntries }}</span>
                    </button>
                    @foreach ($groups as $g)
                        <button type="button" class="sg-filter__btn" data-filter="{{ $g['slug'] }}" aria-pressed="false">
                            {{ $g['title'] }} <span class="sg-filter__count">{{ count($g['results']) }}</span>
                        </button>
                    @endforeach
                </div>
            </nav>

            {{-- Groups --}}
            <div id="sg-groups" aria-live="polite">
                @foreach ($groups as $g)
                    @php
                        $top = $g['results'][0];
                        $rest = array_slice($g['results'], 1);
                        $topPhoto = $resPhoto($top['name']);
                    @endphp
                    <section class="sg-group" id="{{ $g['slug'] }}" data-group="{{ $g['slug'] }}"
                        aria-labelledby="sg-title-{{ $g['slug'] }}">
                        <header class="sg-group__head">
                            <h2 class="sg-group__title" id="sg-title-{{ $g['slug'] }}">{{ $g['title'] }}</h2>
                            <span class="sg-group__meta">{{ count($g['results']) }} achievers</span>
                        </header>

                        {{-- Topper spotlight --}}
                        <article class="sg-topper">
                            <div class="sg-topper__media">
                                @if ($topPhoto)
                                    <img src="{{ asset($topPhoto) }}" alt="{{ $top['name'] }}, {{ $g['title'] }} topper"
                                        width="300" height="300" loading="lazy" decoding="async">
                                @else
                                    <span class="sg-fallback" aria-hidden="true">{{ $resInitials($top['name']) }}</span>
                                @endif
                                <span class="sg-topper__crown" aria-hidden="true"><i class="fas fa-crown"></i></span>
                            </div>
                            <div class="sg-topper__info">
                                <span class="sg-topper__badge"><i class="fas fa-trophy" aria-hidden="true"></i>
                                    {{ $g['title'] }} topper</span>
                                <h3 class="sg-topper__name">{{ $top['name'] }}</h3>
                                @if (!empty($top['note']))
                                    <p class="sg-topper__note">{{ $top['note'] }}</p>
                                @endif
                            </div>
                            <div class="sg-topper__score">
                                <span class="sg-topper__score-label">{{ $g['metric'] }}</span>
                                <span class="sg-topper__score-value">
                                    @if (!empty($top['prefix']))<span class="sg-affix">{{ $top['prefix'] }}</span>@endif
                                    <span class="sg-num">{{ $top['value'] }}</span>
                                    @if (!empty($top['suffix']))<span class="sg-affix">{{ $top['suffix'] }}</span>@endif
                                </span>
                            </div>
                        </article>

                        {{-- Other achievers --}}
                        @if (count($rest))
                            <div class="sg-grid">
                                @foreach ($rest as $r)
                                    @php $photo = $resPhoto($r['name']); @endphp
                                    <article class="sg-tile">
                                        <div class="sg-tile__media">
                                            @if ($photo)
                                                <img src="{{ asset($photo) }}" alt="{{ $r['name'] }}, {{ $g['title'] }}"
                                                    width="400" height="440" loading="lazy" decoding="async">
                                            @else
                                                <span class="sg-fallback" aria-hidden="true">{{ $resInitials($r['name']) }}</span>
                                            @endif
                                        </div>
                                        <div class="sg-tile__body">
                                            <div class="sg-tile__score">
                                                @if (!empty($r['prefix']))<span class="sg-affix">{{ $r['prefix'] }}</span>@endif
                                                <span class="sg-num">{{ $r['value'] }}</span>
                                                @if (!empty($r['suffix']))<span class="sg-affix">{{ $r['suffix'] }}</span>@endif
                                            </div>
                                            <h3 class="sg-tile__name">{{ $r['name'] }}</h3>
                                            @if (!empty($r['note']))
                                                <p class="sg-tile__note">{{ $r['note'] }}</p>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @endif
                    </section>
                @endforeach
            </div>

            <p class="sg-results__disclaimer">
                Results shown are individual student achievements and should not be interpreted as a guarantee of
                future performance.
            </p>
        </div>
    </section>

    {{-- ================= CTA ================= --}}
    <section class="sg-cta-repo">
        <div class="container">
            <div class="sg-cta__card wow fadeInUp" data-wow-duration="1500ms">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-medal" aria-hidden="true"></i> Your Turn</span>
                    <h2 class="sg-cta__title">The Next Result on This Page<br>Could Be Yours.</h2>
                    <p class="sg-cta__text">Book a free academic counselling session and we'll map the right program
                        and preparation plan for your goal.</p>
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

@endsection

@section('scripts')
    <script>
        (function () {
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            /* ---------- Scoreboard count-up (runs once, on view) ---------- */
            var nums = document.querySelectorAll('.sg-board__num[data-count]');

            function countUp(el) {
                var target = parseFloat(el.getAttribute('data-count'));
                var decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
                var final = target.toFixed(decimals);
                if (reduce || !('requestAnimationFrame' in window)) { el.textContent = final; return; }
                var duration = 1400, start = null;
                function step(ts) {
                    if (!start) start = ts;
                    var p = Math.min((ts - start) / duration, 1);
                    el.textContent = (target * (1 - Math.pow(1 - p, 3))).toFixed(decimals);
                    if (p < 1) requestAnimationFrame(step); else el.textContent = final;
                }
                requestAnimationFrame(step);
            }

            if (nums.length && 'IntersectionObserver' in window && !reduce) {
                // Server renders final values (SEO / no-JS); reset only when JS will animate
                Array.prototype.forEach.call(nums, function (n) { n.textContent = '0'; });
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) { countUp(e.target); io.unobserve(e.target); }
                    });
                }, { threshold: 0.4 });
                Array.prototype.forEach.call(nums, function (n) { io.observe(n); });
            }

            /* ---------- Exam filter ---------- */
            var bar = document.querySelector('.sg-filter');
            var btns = document.querySelectorAll('.sg-filter__btn');
            var groups = document.querySelectorAll('.sg-group');
            var wrap = document.getElementById('sg-groups');
            if (!bar || !btns.length || !groups.length) return;

            var valid = ['all'];
            Array.prototype.forEach.call(groups, function (g) { valid.push(g.getAttribute('data-group')); });

            function apply(filter, opts) {
                opts = opts || {};
                if (valid.indexOf(filter) === -1) filter = 'all';

                Array.prototype.forEach.call(btns, function (b) {
                    var on = b.getAttribute('data-filter') === filter;
                    b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    if (on && b.scrollIntoView && opts.scrollChip) {
                        b.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduce ? 'auto' : 'smooth' });
                    }
                });

                Array.prototype.forEach.call(groups, function (g) {
                    var show = filter === 'all' || g.getAttribute('data-group') === filter;
                    g.hidden = !show;
                    g.classList.remove('is-entering');
                    if (show && opts.animate && !reduce) {
                        void g.offsetWidth; // restart animation
                        g.classList.add('is-entering');
                    }
                });

                if (opts.updateUrl && window.history && history.replaceState) {
                    history.replaceState(null, '', filter === 'all'
                        ? location.pathname + location.search
                        : '#' + filter);
                }

                // If user has scrolled past the list start, bring them back to it
                if (opts.scrollToList) {
                    var offset = bar.offsetHeight + (parseInt(getComputedStyle(bar).top, 10) || 0) + 8;
                    var y = wrap.getBoundingClientRect().top + window.pageYOffset - offset;
                    if (window.pageYOffset > y) {
                        window.scrollTo({ top: y, behavior: reduce ? 'auto' : 'smooth' });
                    }
                }
            }

            Array.prototype.forEach.call(btns, function (b) {
                b.addEventListener('click', function () {
                    apply(b.getAttribute('data-filter'), { animate: true, updateUrl: true, scrollToList: true, scrollChip: true });
                });
            });

            // Deep link: /results#neet
            var hash = (location.hash || '').replace('#', '');
            if (hash && valid.indexOf(hash) !== -1) {
                apply(hash, { scrollChip: true });
            }
        })();
    </script>
@endsection