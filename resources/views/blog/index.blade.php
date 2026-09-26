{{--
============================================================================
resources/views/blog/index.blade.php → /blog
Data: $posts (paginator), $categories, $category (BlogController@index)
============================================================================
--}}
@extends('layouts.main')

@section('title', 'Blog | JEE, NEET & Board Exam Study Guides | SG Educare Kalyan')

@section('meta')
    <meta name="description"
        content="Practical study guides from SG Education, Kalyan: JEE preparation, Class 10 board strategy, testing, revision and exam planning.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Blog | SG Educare Kalyan">
    <meta property="og:description" content="Practical study guides for JEE, NEET, MHT-CET and Board exams.">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="en_IN">
@endsection

@section('styles')
    <style>
        .sg-blog {
            --sg-ink: var(--eduhive-base);
            --sg-ink-rgb: var(--eduhive-base-rgb);
            --sg-accent: var(--eduhive-primary);
            --sg-accent-rgb: var(--eduhive-primary-rgb);
            --sg-line: rgba(var(--sg-ink-rgb), .12);
            --sg-muted: rgba(var(--sg-ink-rgb), .64);
        }

        .sg-blog :focus-visible {
            outline: 3px solid var(--sg-accent);
            outline-offset: 3px;
        }

        .sg-blog__head {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 40px;
        }

        .sg-blog__title {
            margin: 0 0 10px;
            font-size: clamp(30px, 3.6vw, 44px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -.025em;
            color: var(--sg-ink);
        }

        .sg-blog__sub {
            margin: 0;
            max-width: 560px;
            font-size: 17px;
            line-height: 1.7;
            color: var(--sg-muted);
        }

        .sg-cats {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .sg-cats a {
            padding: 9px 16px;
            border: 1px solid var(--sg-line);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: var(--sg-ink);
            background: #fff;
            text-decoration: none;
            transition: border-color .2s ease;
        }

        .sg-cats a:hover {
            border-color: var(--sg-accent);
        }

        .sg-cats a[aria-current="page"] {
            color: #fff;
            background: var(--sg-ink);
            border-color: var(--sg-ink);
        }

        /* Pagination (Bootstrap 5 markup) */
        .sg-pager {
            display: flex;
            justify-content: center;
            margin-top: 48px;
        }

        .sg-pager .pagination {
            gap: 6px;
            margin: 0;
        }

        .sg-pager .page-link {
            min-width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px !important;
            border: 1px solid var(--sg-line);
            font-weight: 700;
            color: var(--sg-ink);
        }

        .sg-pager .page-item.active .page-link {
            color: #fff;
            background: var(--sg-ink);
            border-color: var(--sg-ink);
        }

        .sg-pager .page-link:focus {
            box-shadow: 0 0 0 3px rgba(var(--sg-accent-rgb), .3);
        }

        /* Hide Bootstrap's "Showing x to y" text row */
        .sg-pager nav > div:first-child.d-sm-none,
        .sg-pager .small.text-muted {
            display: none;
        }

        /* Cards */
        .sg-posts {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .sg-post {
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid var(--sg-line);
            border-radius: 20px;
            background: #fff;
            transition: border-color .25s ease, box-shadow .3s ease;
        }

        .sg-post:hover {
            border-color: rgba(var(--sg-accent-rgb), .5);
            box-shadow: 0 18px 40px rgba(var(--sg-ink-rgb), .08);
        }

        .sg-post--featured {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
        }

        .sg-post--featured .sg-cover {
            height: 100%;
            aspect-ratio: auto;
            min-height: 340px;
        }

        .sg-post__body {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 26px 26px 28px;
        }

        .sg-post--featured .sg-post__body {
            justify-content: center;
            padding: 44px;
        }

        .sg-post__tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .sg-tag {
            padding: 5px 11px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
            color: var(--sg-ink);
            background: rgba(var(--sg-ink-rgb), .06);
        }

        .sg-tag--cat {
            color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .1);
        }

        .sg-post__title {
            margin: 0 0 12px;
            font-size: 21px;
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: -.015em;
        }

        .sg-post--featured .sg-post__title {
            font-size: clamp(24px, 2.6vw, 34px);
            line-height: 1.2;
        }

        .sg-post__title a {
            color: var(--sg-ink);
            text-decoration: none;
        }

        /* Whole card clickable, single link for screen readers */
        .sg-post__title a::after {
            content: "";
            position: absolute;
            inset: 0;
        }

        .sg-post__excerpt {
            margin: 0 0 22px;
            font-size: 16px;
            line-height: 1.65;
            color: var(--sg-muted);
        }

        .sg-post__more {
            margin-top: auto;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 700;
            color: var(--sg-accent);
        }

        .sg-post__more i {
            transition: transform .25s ease;
        }

        .sg-post:hover .sg-post__more i {
            transform: translateX(4px);
        }

        .sg-empty {
            padding: 60px 20px;
            text-align: center;
            font-size: 17px;
            color: var(--sg-muted);
        }

        /* ---------- CTA (same system as Results / Contact) ---------- */
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
            background: #1faa55;
        }

        .sg-cta__btn--ghost:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .35);
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

            .sg-cta__actions {
                max-width: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .sg-cta__btn,
            .sg-cta__btn-icon {
                transition: none !important;
            }

            .sg-cta__btn:hover,
            .sg-cta__btn:hover .sg-cta__btn-icon {
                transform: none !important;
            }
        }

        .sg-blog .sg-cta__card {
            margin-top: 80px;
        }

        @media (max-width: 1199px) {
            .sg-posts {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 991px) {
            .sg-post--featured {
                grid-template-columns: 1fr;
            }

            .sg-post--featured .sg-cover {
                min-height: 0;
                aspect-ratio: 1200 / 630;
            }

            .sg-post--featured .sg-post__body {
                padding: 28px;
            }
        }

        @media (max-width: 767px) {
            .sg-posts {
                grid-template-columns: 1fr;
                gap: 20px;
            }

        }

        @media (prefers-reduced-motion: reduce) {
            .sg-post,
            .sg-post__more i {
                transition: none;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $waLink = 'https://wa.me/918591932112?text=' . rawurlencode('Hi SG Education, I read your blog and would like to know about courses and batches.');
    @endphp

    {{-- ================= PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
                    <li><span>Blog</span></li>
                </ul>
                <h1 class="page-header__title">Blog</h1>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    <section class="sg-blog section-space">
        <div class="container">

            <div class="sg-blog__head">
                <div>
                    <h2 class="sg-blog__title">Study guides that build a system</h2>
                    <p class="sg-blog__sub">Practical, step-by-step guidance for students and parents on JEE, NEET,
                        MHT-CET and Board preparation.</p>
                </div>
                @if ($categories->count() > 1)
                    <nav class="sg-cats" aria-label="Filter guides by topic">
                        <a href="{{ route('blog.index') }}" @if (!$category) aria-current="page" @endif>All</a>
                        @foreach ($categories as $cat)
                            <a href="{{ route('blog.index', ['category' => $cat]) }}"
                                @if ($category === $cat) aria-current="page" @endif>{{ $cat }}</a>
                        @endforeach
                    </nav>
                @endif
            </div>

            @if ($posts->isEmpty())
                <p class="sg-empty">
                    @if ($category)
                        No {{ $category }} guides yet. <a href="{{ route('blog.index') }}">See all guides</a>.
                    @else
                        New guides are on the way. Meanwhile,
                        <a href="{{ url('/contact') }}">book a free counselling session</a>.
                    @endif
                </p>
            @else
                <div class="sg-posts">
                    @foreach ($posts as $post)
                        @php $featured = $loop->first && $posts->onFirstPage() && !$category; @endphp
                        <article class="sg-post {{ $featured ? 'sg-post--featured' : '' }}">
                            @include('blog.partials.cover', ['post' => $post, 'size' => $featured ? 'lg' : 'sm'])
                            <div class="sg-post__body">
                                <div class="sg-post__tags">
                                    <span class="sg-tag sg-tag--cat">{{ $post['category'] }}</span>
                                    <span class="sg-tag">{{ $post['read_minutes'] }} min read</span>
                                </div>
                                @if ($featured)
                                    <h2 class="sg-post__title"><a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h2>
                                @else
                                    <h3 class="sg-post__title"><a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h3>
                                @endif
                                <p class="sg-post__excerpt">{{ $post['excerpt'] }}</p>
                                <span class="sg-post__more" aria-hidden="true">Read the guide <i class="icon-right-arrow"></i></span>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($posts->hasPages())
                    <nav class="sg-pager" aria-label="Blog pages">
                        {{ $posts->onEachSide(1)->links('pagination::bootstrap-5') }}
                    </nav>
                @endif
            @endif

            <div class="sg-cta__card">
                <div class="sg-cta__content">
                    <span class="sg-cta__tag"><i class="icon-medal" aria-hidden="true"></i> Free academic counselling</span>
                    <h2 class="sg-cta__title">Want a Plan Made<br>for Your Child?</h2>
                    <p class="sg-cta__text">Book a free academic counselling session and we’ll map the right program and preparation plan for your child’s goal.</p>
                </div>
                <div class="sg-cta__actions">
                    <a href="{{ url('/contact') }}#enquiry" class="sg-cta__btn sg-cta__btn--primary">
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
@endsection