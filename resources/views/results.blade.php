{{--
============================================================================
resources/views/results.blade.php → /results
Photos: public/assets/images/results/  (student-01.webp … student-17.webp)
        Map each photo to a student in $photos below. No photo → initials.
CTA styles come from public/assets/css/sg-custom.css (§19).

⚠️ Confirm before go-live: Kirti Pande/Pande spelling; NEET 627 attribution
   (docx: Dhiraj Patil, About page: Niraj Fatkal); Dhiraj Patil 12th figure.
============================================================================
--}}
@extends('layouts.main')

@section('title', 'Results | JEE, NEET, MHT-CET & Board Toppers | SG Education Kalyan')

@section('meta')
    <meta name="description"
        content="SG Education results: JEE Advanced AIR 711, JEE Main 99.21 percentile, MHT-CET 99.78 percentile, NEET 627 and 10th Board 97.60%. Student achievements from Kalyan.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Results | SG Education Kalyan">
    <meta property="og:description" content="JEE, NEET, MHT-CET and Board results achieved by SG Education students.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
@endsection

@section('styles')
    <style>
        .sg-res {
            --ink: var(--eduhive-base);
            --ink-rgb: var(--eduhive-base-rgb);
            --acc: var(--eduhive-primary);
            --acc-rgb: var(--eduhive-primary-rgb);
            --dark: #1e2833;
            --line: rgba(var(--ink-rgb), .1);
            --muted: rgba(var(--ink-rgb), .62);
            --ease: cubic-bezier(.22, 1, .36, 1);
            --sticky: 100px;
        }

        .sg-res :focus-visible {
            outline: 3px solid var(--acc);
            outline-offset: 3px;
        }

        .sg-res__intro {
            max-width: 640px;
            margin: 0 auto 44px;
            text-align: center;
            font-size: 16px;
            line-height: 1.75;
            color: var(--muted);
        }

        /* Shared photo / initials */
        .sg-ph {
            position: relative;
            overflow: hidden;
            background: rgba(var(--ink-rgb), .05);
        }

        .sg-ph img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 20%;
            transition: transform .7s var(--ease);
        }

        .sg-ph__initials {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            font-weight: 800;
            letter-spacing: .02em;
            color: rgba(var(--acc-rgb), .75);
            background: linear-gradient(160deg, rgba(var(--acc-rgb), .1), rgba(var(--ink-rgb), .06));
        }

        /* ============ Hall of fame (4 headline toppers) ============ */
        .sg-fame {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .sg-fame__card {
            position: relative;
            overflow: hidden;
            border-radius: 22px;
            background: var(--dark);
            color: #fff;
            box-shadow: 0 18px 40px rgba(var(--ink-rgb), .18);
            transition: transform .45s var(--ease), box-shadow .45s var(--ease);
        }

        .sg-fame__card:hover {
            transform: translateY(-6px);
            box-shadow: 0 26px 50px rgba(var(--ink-rgb), .26);
        }

        .sg-fame__card:hover .sg-ph img {
            transform: scale(1.05);
        }

        .sg-fame__card .sg-ph {
            aspect-ratio: 1 / 1.08;
        }

        .sg-fame__card .sg-ph__initials {
            font-size: 56px;
            color: rgba(255, 255, 255, .55);
            background: linear-gradient(160deg, #2b3846, var(--dark));
        }

        .sg-fame__card .sg-ph::after {
            content: "";
            position: absolute;
            inset: 45% 0 0;
            background: linear-gradient(transparent, rgba(30, 40, 51, .96));
            pointer-events: none;
        }

        .sg-fame__exam {
            position: absolute;
            top: 14px;
            left: 14px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .04em;
            color: #fff;
            background: var(--acc);
            box-shadow: 0 6px 14px rgba(0, 0, 0, .2);
        }

        .sg-fame__body {
            position: relative;
            z-index: 2;
            margin-top: -84px;
            padding: 0 20px 22px;
        }

        .sg-fame__score {
            display: flex;
            align-items: baseline;
            gap: 5px;
            font-variant-numeric: tabular-nums;
        }

        .sg-fame__num {
            font-size: clamp(34px, 3vw, 44px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.03em;
        }

        .sg-fame__affix {
            font-size: 15px;
            font-weight: 800;
            color: var(--acc);
        }

        .sg-fame__name {
            margin: 8px 0 0;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
        }

        .sg-fame__label {
            display: block;
            margin-top: 2px;
            font-size: 13px;
            color: rgba(255, 255, 255, .6);
        }

        /* ============ Filter ============ */
        .sg-filter {
            position: sticky;
            top: var(--sticky);
            z-index: 20;
            margin: 60px 0 0;
            padding: 12px 0;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: saturate(1.4) blur(10px);
            -webkit-backdrop-filter: saturate(1.4) blur(10px);
        }

        .sg-filter__track {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding: 4px 2px;
            scrollbar-width: none;
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
            border: 1px solid var(--line);
            border-radius: 50px;
            background: #fff;
            font-size: 14px;
            font-weight: 700;
            color: var(--ink);
            cursor: pointer;
            transition: background .25s ease, color .25s ease, border-color .25s ease;
        }

        .sg-filter__btn:hover {
            border-color: rgba(var(--acc-rgb), .5);
        }

        .sg-filter__count {
            min-width: 22px;
            padding: 2px 7px;
            border-radius: 50px;
            font-size: 12px;
            text-align: center;
            background: rgba(var(--ink-rgb), .07);
        }

        .sg-filter__btn[aria-pressed="true"] {
            color: #fff;
            background: var(--ink);
            border-color: var(--ink);
        }

        .sg-filter__btn[aria-pressed="true"] .sg-filter__count {
            color: #fff;
            background: var(--acc);
        }

        /* ============ Exam group ============ */
        .sg-group {
            padding-top: 50px;
            scroll-margin-top: calc(var(--sticky) + 80px);
        }

        .sg-group[hidden] {
            display: none;
        }

        .sg-group.is-entering {
            animation: sgResFade .45s var(--ease);
        }

        @keyframes sgResFade {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: none; }
        }

        .sg-group__head {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .sg-group__icon {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 21px;
            color: #fff;
            background: var(--acc);
            box-shadow: 0 8px 20px rgba(var(--acc-rgb), .3);
        }

        .sg-group__title {
            margin: 0;
            font-size: clamp(24px, 2.4vw, 30px);
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .sg-group__meta {
            margin-left: auto;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            color: var(--acc);
            background: rgba(var(--acc-rgb), .1);
            white-space: nowrap;
        }

        /* Topper spotlight */
        .sg-top {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 220px 1fr auto;
            align-items: center;
            gap: 36px;
            margin-bottom: 22px;
            padding: 24px 44px 24px 24px;
            border-radius: 24px;
            color: #fff;
            background:
                radial-gradient(circle at 100% 0%, rgba(var(--acc-rgb), .3) 0%, transparent 45%),
                var(--dark);
        }

        .sg-top::before {
            content: "";
            position: absolute;
            right: -40px;
            bottom: -40px;
            width: 220px;
            height: 220px;
            background-image: radial-gradient(circle, rgba(255, 255, 255, .08) 1.5px, transparent 1.5px);
            background-size: 16px 16px;
            pointer-events: none;
        }

        .sg-top .sg-ph {
            aspect-ratio: 1;
            border-radius: 18px;
            box-shadow: 0 0 0 3px var(--acc), 0 18px 36px rgba(0, 0, 0, .35);
        }

        .sg-top .sg-ph__initials {
            font-size: 60px;
            color: rgba(255, 255, 255, .6);
            background: linear-gradient(160deg, #2b3846, #1a232d);
        }

        .sg-top__crown {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 15px;
            color: #fff;
            background: var(--acc);
            border: 3px solid var(--dark);
        }

        .sg-top__badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--acc);
            background: rgba(var(--acc-rgb), .15);
        }

        .sg-top__name {
            margin: 0;
            font-size: clamp(24px, 2.6vw, 34px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -.02em;
            color: #fff;
        }

        .sg-top__note {
            margin: 10px 0 0;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, .62);
        }

        .sg-top__score {
            position: relative;
            text-align: right;
        }

        .sg-top__label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .55);
        }

        .sg-top__value {
            display: inline-flex;
            align-items: baseline;
            gap: 6px;
            font-variant-numeric: tabular-nums;
        }

        .sg-top__num {
            font-size: clamp(52px, 6vw, 80px);
            font-weight: 800;
            line-height: .95;
            letter-spacing: -.04em;
        }

        .sg-top__affix {
            font-size: 20px;
            font-weight: 800;
            color: var(--acc);
        }

        /* Student cards */
        .sg-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .sg-card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            transition: transform .4s var(--ease), box-shadow .4s var(--ease), border-color .3s ease;
        }

        .sg-card:hover {
            transform: translateY(-6px);
            border-color: rgba(var(--acc-rgb), .45);
            box-shadow: 0 20px 40px rgba(var(--ink-rgb), .12);
        }

        .sg-card:hover .sg-ph img {
            transform: scale(1.05);
        }

        .sg-card .sg-ph {
            aspect-ratio: 1 / 1.02;
        }

        .sg-card .sg-ph__initials {
            font-size: 44px;
        }

        .sg-card__rank {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
            min-width: 34px;
            height: 34px;
            padding: 0 8px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 800;
            color: var(--ink);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .12);
        }

        .sg-card__score {
            position: absolute;
            right: 12px;
            bottom: 12px;
            z-index: 2;
            display: inline-flex;
            align-items: baseline;
            gap: 4px;
            padding: 8px 12px;
            border-radius: 12px;
            color: #fff;
            background: var(--ink);
            box-shadow: 0 8px 18px rgba(var(--ink-rgb), .3);
            font-variant-numeric: tabular-nums;
        }

        .sg-card__num {
            font-size: 22px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.02em;
        }

        .sg-card__affix {
            font-size: 12px;
            font-weight: 800;
            color: var(--acc);
        }

        .sg-card__body {
            padding: 14px 16px 16px;
            border-top: 3px solid var(--acc);
        }

        .sg-card__name {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--ink);
        }

        .sg-card__note {
            margin: 3px 0 0;
            font-size: 13px;
            font-weight: 600;
            color: var(--muted);
        }

        .sg-res__disclaimer {
            max-width: 680px;
            margin: 64px auto 0;
            text-align: center;
            font-size: 13px;
            line-height: 1.7;
            color: var(--muted);
        }

        /* ============ Responsive ============ */
        @media (max-width: 1199px) {
            .sg-cards {
                grid-template-columns: repeat(3, 1fr);
            }

            .sg-top {
                grid-template-columns: 180px 1fr auto;
                gap: 28px;
            }
        }

        @media (max-width: 991px) {
            .sg-fame {
                grid-template-columns: repeat(2, 1fr);
            }

            .sg-top {
                grid-template-columns: 150px 1fr;
                gap: 24px;
                padding: 22px;
            }

            .sg-top__score {
                grid-column: 1 / -1;
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                padding-top: 18px;
                border-top: 1px solid rgba(255, 255, 255, .1);
                text-align: left;
            }
        }

        @media (max-width: 767px) {
            .sg-res {
                --sticky: 70px;
            }

            .sg-cards {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }

            .sg-top {
                grid-template-columns: 100px 1fr;
                gap: 18px;
            }

            .sg-top .sg-ph__initials {
                font-size: 34px;
            }

            .sg-top__crown {
                width: 30px;
                height: 30px;
                top: 6px;
                left: 6px;
                font-size: 11px;
            }

            .sg-card__num {
                font-size: 18px;
            }
        }

        @media (max-width: 575px) {
            .sg-fame {
                gap: 14px;
            }

            .sg-fame__body {
                margin-top: -70px;
                padding: 0 14px 16px;
            }

            .sg-fame__name {
                font-size: 14px;
            }

            .sg-fame__label {
                display: none;
            }

            .sg-group__meta {
                display: none;
            }

            .sg-top__name {
                font-size: 22px;
            }

            .sg-card__body {
                padding: 12px;
            }

            .sg-card__name {
                font-size: 14px;
            }

            .sg-card__score {
                right: 8px;
                bottom: 8px;
                padding: 6px 9px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .sg-group.is-entering {
                animation: none;
            }

            .sg-res *,
            .sg-res .sg-ph img {
                transition: none !important;
            }

            .sg-card:hover,
            .sg-fame__card:hover,
            .sg-card:hover .sg-ph img,
            .sg-fame__card:hover .sg-ph img {
                transform: none;
            }
        }
    </style>
@endsection

@section('content')

    @php
        /*
        |------------------------------------------------------------------
        | 1. Student photos — map each photo file to a student name.
        |    Files are in public/assets/images/results/. Leave null → initials.
        |    Only add a photo you are sure belongs to that student.
        |------------------------------------------------------------------
        */
        // Photo map lives in config/sg.php → 'student_photos' (shared with the Home/About carousel)
        $photos = config('sg.student_photos', []);

        /*
        |------------------------------------------------------------------
        | 2. Results — order each group best → lowest (first = topper).
        |------------------------------------------------------------------
        */
        $resultGroups = [
            ['title' => 'JEE Advanced', 'icon' => 'icon-ranking', 'metric' => 'All India Rank', 'results' => [
                ['name' => 'Prashik Ahire', 'prefix' => 'AIR', 'value' => '711'],
                ['name' => 'Aryan Shejwal', 'prefix' => 'AIR', 'value' => '1115'],
                ['name' => 'Vinayak Diwakar', 'prefix' => 'AIR', 'value' => '2546'],
                ['name' => 'Dhruv Shirsat', 'prefix' => 'AIR', 'value' => '4675'],
                ['name' => 'Kirti Pande', 'prefix' => 'AIR', 'value' => '7770'],
            ]],
            ['title' => 'JEE Main', 'icon' => 'icon-medal', 'metric' => 'Percentile', 'results' => [
                ['name' => 'Kirti Pande', 'value' => '99.21', 'suffix' => '%ile'],
                ['name' => 'Kunal Choudhary', 'value' => '98.78', 'suffix' => '%ile'],
                ['name' => 'Aryan Shejwal', 'value' => '98.28', 'suffix' => '%ile'],
                ['name' => 'Aditya Sonar', 'value' => '98.00', 'suffix' => '%ile'],
                ['name' => 'Vinayak Diwakar', 'value' => '97.00', 'suffix' => '%ile'],
            ]],
            ['title' => 'MHT-CET', 'icon' => 'icon-graduation', 'metric' => 'Percentile', 'results' => [
                ['name' => 'Advait Gotkhinde', 'value' => '99.78', 'suffix' => '%ile'],
                ['name' => 'Pranit Bhosale', 'value' => '99.33', 'suffix' => '%ile'],
                ['name' => 'Kirti Pande', 'value' => '99.23', 'suffix' => '%ile'],
                ['name' => 'Soham Bangar', 'value' => '99.19', 'suffix' => '%ile'],
                ['name' => 'Kunal Choudhary', 'value' => '97.68', 'suffix' => '%ile'],
                ['name' => 'Sneha Bhundere', 'value' => '97.52', 'suffix' => '%ile'],
                ['name' => 'Gaurav Ghude', 'value' => '97.15', 'suffix' => '%ile'],
                ['name' => 'Mohd. Adnan Shaikh', 'value' => '96.87', 'suffix' => '%ile'],
                ['name' => 'Nishant Patil', 'value' => '95.98', 'suffix' => '%ile'],
            ]],
            ['title' => 'NEET', 'icon' => 'icon-students', 'metric' => 'Score', 'results' => [
                ['name' => 'Dhiraj Patil', 'value' => '627', 'suffix' => '/720'],
                ['name' => 'Ruchi Dalvi', 'value' => '610', 'suffix' => '/720'],
                ['name' => 'Karan Bankar', 'value' => '595', 'suffix' => '/720'],
                ['name' => 'Vedant Mandhare', 'value' => '586', 'suffix' => '/720'],
            ]],
            ['title' => '12th Board', 'icon' => 'icon-open-book', 'metric' => 'Overall', 'results' => [
                ['name' => 'Dhiraj Patil', 'value' => '88.33', 'suffix' => '%', 'note' => 'PCB 94%'],
                ['name' => 'Kirti Pande', 'value' => '88.00', 'suffix' => '%'],
                ['name' => 'Soham Bangar', 'value' => '87.87', 'suffix' => '%'],
                ['name' => 'Gaurav Ghude', 'value' => '86.17', 'suffix' => '%'],
            ]],
            ['title' => '10th Board', 'icon' => 'icon-batch-assign', 'metric' => 'Overall', 'results' => [
                ['name' => 'Ujwal Ghude', 'value' => '97.60', 'suffix' => '%'],
                ['name' => 'Vishnu Pillai', 'value' => '96.80', 'suffix' => '%'],
                ['name' => 'Sai Sarvanan', 'value' => '96.60', 'suffix' => '%'],
            ]],
        ];

        $groups = collect($resultGroups)->map(fn($g) => $g + ['slug' => \Illuminate\Support\Str::slug($g['title'])]);

        // Photo URL: mapped file first, then results/{name-slug}.(webp|jpg|png); missing → null
        $photoCache = [];
        $photoOf = function (string $name) use ($photos, &$photoCache) {
            if (array_key_exists($name, $photoCache)) {
                return $photoCache[$name];
            }
            $candidates = [];
            if (!empty($photos[$name])) {
                $candidates[] = 'assets/images/results/' . $photos[$name];
            }
            foreach (['webp', 'jpg', 'jpeg', 'png'] as $ext) {
                $candidates[] = 'assets/images/results/' . \Illuminate\Support\Str::slug($name) . '.' . $ext;
            }
            foreach ($candidates as $p) {
                if (file_exists(public_path($p))) {
                    return $photoCache[$name] = asset($p);
                }
            }
            return $photoCache[$name] = null;
        };
        $initials = fn($name) => collect(preg_split('/\s+/', trim($name)))
            ->reject(fn($w) => str_ends_with($w, '.'))
            ->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))->take(2)->implode('');

        $totalEntries = $groups->sum(fn($g) => count($g['results']));
        $fame = $groups->whereIn('title', ['JEE Advanced', 'JEE Main', 'MHT-CET', 'NEET'])->values();

        $whatsapp = 'https://wa.me/91' . config('sg.whatsapp', '8591932112') . '?text=' . rawurlencode('Hi SG Education, I saw your results and would like to know about courses and batches.');
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

    <section class="sg-res section-space">
        <div class="container">
            <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <h6 class="sec-title__tagline">results that speak</h6>
                <h3 class="sec-title__title">Proof of the <span class="sec-title__title__text">SG</span> <span
                        class="sec-title__title__shape">Process</span></h3>
            </div>
            <p class="sg-res__intro wow fadeInUp" data-wow-duration="1500ms">Behind every result is the same system:
                learn, practise, test, analyse and improve. These are the students who worked it, exam after exam.</p>

            {{-- ================= Hall of fame ================= --}}
            <div class="sg-fame">
                @foreach ($fame as $g)
                    @php $t = $g['results'][0]; $ph = $photoOf($t['name']); @endphp
                    <a href="#{{ $g['slug'] }}" class="sg-fame__card wow fadeInUp" data-wow-duration="1200ms"
                        data-wow-delay="{{ $loop->index * 100 }}ms" data-jump="{{ $g['slug'] }}"
                        aria-label="{{ $t['name'] }}, {{ $g['title'] }} topper, {{ $t['prefix'] ?? '' }} {{ $t['value'] }}{{ $t['suffix'] ?? '' }}">
                        <span class="sg-fame__exam"><i class="fas fa-trophy" aria-hidden="true"></i>{{ $g['title'] }}</span>
                        <div class="sg-ph">
                            @if ($ph)
                                <img src="{{ $ph }}" alt="" width="600" height="600" loading="lazy" decoding="async">
                            @else
                                <span class="sg-ph__initials" aria-hidden="true">{{ $initials($t['name']) }}</span>
                            @endif
                        </div>
                        <div class="sg-fame__body">
                            <div class="sg-fame__score">
                                @if (!empty($t['prefix']))<span class="sg-fame__affix">{{ $t['prefix'] }}</span>@endif
                                <span class="sg-fame__num">{{ $t['value'] }}</span>
                                @if (!empty($t['suffix']))<span class="sg-fame__affix">{{ $t['suffix'] }}</span>@endif
                            </div>
                            <p class="sg-fame__name">{{ $t['name'] }}</p>
                            <span class="sg-fame__label">Top {{ $g['metric'] === 'All India Rank' ? 'rank' : strtolower($g['metric']) }}</span>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- ================= Filter ================= --}}
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

            {{-- ================= Groups ================= --}}
            <div id="sg-groups" aria-live="polite">
                @foreach ($groups as $g)
                    @php $top = $g['results'][0]; $topPh = $photoOf($top['name']); @endphp
                    <section class="sg-group" id="{{ $g['slug'] }}" data-group="{{ $g['slug'] }}"
                        aria-labelledby="sg-title-{{ $g['slug'] }}">
                        <header class="sg-group__head">
                            <span class="sg-group__icon"><i class="{{ $g['icon'] }}" aria-hidden="true"></i></span>
                            <h2 class="sg-group__title" id="sg-title-{{ $g['slug'] }}">{{ $g['title'] }}</h2>
                            <span class="sg-group__meta">{{ count($g['results']) }} achievers</span>
                        </header>

                        {{-- Topper --}}
                        <article class="sg-top">
                            <div class="sg-ph">
                                <span class="sg-top__crown" aria-hidden="true"><i class="fas fa-crown"></i></span>
                                @if ($topPh)
                                    <img src="{{ $topPh }}" alt="{{ $top['name'] }}, {{ $g['title'] }} topper"
                                        width="600" height="600" loading="lazy" decoding="async">
                                @else
                                    <span class="sg-ph__initials" aria-hidden="true">{{ $initials($top['name']) }}</span>
                                @endif
                            </div>
                            <div>
                                <span class="sg-top__badge"><i class="fas fa-trophy" aria-hidden="true"></i>
                                    {{ $g['title'] }} topper</span>
                                <h3 class="sg-top__name">{{ $top['name'] }}</h3>
                                @if (!empty($top['note']))
                                    <p class="sg-top__note">{{ $top['note'] }}</p>
                                @endif
                            </div>
                            <div class="sg-top__score">
                                <span class="sg-top__label">{{ $g['metric'] }}</span>
                                <span class="sg-top__value">
                                    @if (!empty($top['prefix']))<span class="sg-top__affix">{{ $top['prefix'] }}</span>@endif
                                    <span class="sg-top__num">{{ $top['value'] }}</span>
                                    @if (!empty($top['suffix']))<span class="sg-top__affix">{{ $top['suffix'] }}</span>@endif
                                </span>
                            </div>
                        </article>

                        {{-- Other achievers --}}
                        @if (count($g['results']) > 1)
                            <div class="sg-cards">
                                @foreach (array_slice($g['results'], 1) as $r)
                                    @php $ph = $photoOf($r['name']); @endphp
                                    <article class="sg-card">
                                        <div class="sg-ph">
                                            <span class="sg-card__rank" aria-label="Rank {{ $loop->iteration + 1 }} in {{ $g['title'] }}">#{{ $loop->iteration + 1 }}</span>
                                            @if ($ph)
                                                <img src="{{ $ph }}" alt="{{ $r['name'] }}, {{ $g['title'] }}" width="600"
                                                    height="600" loading="lazy" decoding="async">
                                            @else
                                                <span class="sg-ph__initials" aria-hidden="true">{{ $initials($r['name']) }}</span>
                                            @endif
                                            <span class="sg-card__score">
                                                @if (!empty($r['prefix']))<span class="sg-card__affix">{{ $r['prefix'] }}</span>@endif
                                                <span class="sg-card__num">{{ $r['value'] }}</span>
                                                @if (!empty($r['suffix']))<span class="sg-card__affix">{{ $r['suffix'] }}</span>@endif
                                            </span>
                                        </div>
                                        <div class="sg-card__body">
                                            <h3 class="sg-card__name">{{ $r['name'] }}</h3>
                                            @if (!empty($r['note']))
                                                <p class="sg-card__note">{{ $r['note'] }}</p>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @endif
                    </section>
                @endforeach
            </div>

            <p class="sg-res__disclaimer">Results shown are individual student achievements and should not be
                interpreted as a guarantee of future performance.</p>
        </div>
    </section>

    {{-- ================= CTA (styles: sg-custom.css §19) ================= --}}
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
                    <a href="{{ url('/contact') }}#enquiry" class="sg-cta__btn sg-cta__btn--primary">
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

@section('scripts')
    <script>
        (function () {
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var bar = document.querySelector('.sg-filter');
            var btns = document.querySelectorAll('.sg-filter__btn');
            var groups = document.querySelectorAll('.sg-group');
            var wrap = document.getElementById('sg-groups');
            if (!bar || !btns.length || !groups.length) return;

            var valid = ['all'];
            groups.forEach(function (g) { valid.push(g.getAttribute('data-group')); });

            function apply(filter, opts) {
                opts = opts || {};
                if (valid.indexOf(filter) === -1) filter = 'all';

                btns.forEach(function (b) {
                    var on = b.getAttribute('data-filter') === filter;
                    b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    if (on && opts.scrollChip) b.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduce ? 'auto' : 'smooth' });
                });

                groups.forEach(function (g) {
                    var show = filter === 'all' || g.getAttribute('data-group') === filter;
                    g.hidden = !show;
                    g.classList.remove('is-entering');
                    if (show && opts.animate && !reduce) { void g.offsetWidth; g.classList.add('is-entering'); }
                });

                if (opts.updateUrl && history.replaceState) {
                    history.replaceState(null, '', filter === 'all' ? location.pathname + location.search : '#' + filter);
                }

                if (opts.scrollToList) {
                    var offset = bar.offsetHeight + (parseInt(getComputedStyle(bar).top, 10) || 0) + 8;
                    var y = wrap.getBoundingClientRect().top + window.pageYOffset - offset;
                    if (opts.force || window.pageYOffset > y) window.scrollTo({ top: y, behavior: reduce ? 'auto' : 'smooth' });
                }
            }

            btns.forEach(function (b) {
                b.addEventListener('click', function () {
                    apply(b.getAttribute('data-filter'), { animate: true, updateUrl: true, scrollToList: true, scrollChip: true });
                });
            });

            // Hall-of-fame card → open that exam
            document.querySelectorAll('[data-jump]').forEach(function (a) {
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    apply(a.getAttribute('data-jump'), { animate: true, updateUrl: true, scrollToList: true, scrollChip: true, force: true });
                });
            });

            // Deep link: /results#neet
            var hash = (location.hash || '').replace('#', '');
            if (hash && valid.indexOf(hash) !== -1) apply(hash, { scrollChip: true });
        })();
    </script>
@endsection