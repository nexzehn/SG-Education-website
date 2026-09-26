{{--
============================================================================
resources/views/blog/show.blade.php → /blog/{slug}
Data: $post (array or App\Models\BlogPost, via App\Services\BlogRepository), $related
Body: $post['body'] (resources/content/blog/{slug}.html, or blog_posts.body)
Content components available inside body HTML:
  .sg-lead  .sg-key  .sg-flow  .sg-ladder  .sg-cards/.sg-cardlet  .sg-phases
  .sg-mistakes/.sg-mistake  .sg-table  .sg-checklist  .sg-panel  .sg-takeaway
============================================================================
--}}
@extends('layouts.main')

@php
    $url = route('blog.show', $post['slug']);
    $published = \Illuminate\Support\Carbon::parse($post['published_at']);
    $author = ($post['author'] ?? null) ?: config('blog.author', 'SG Education');
    $shareText = rawurlencode($post['title'] . ' ' . $url);
    $waLink = 'https://wa.me/918591932112?text=' . rawurlencode('Hi SG Education, I read your blog and would like to know about courses and batches.');

    // Post CTA (falls back to counselling CTA when a post has none)
    $cta = $post['cta'] ?? null;
    $ctaTag = $cta['tag'] ?? ($post['category'] . ' preparation');
    $ctaTitle = $cta['title'] ?? 'Want a Plan Made for Your Goal?';
    $ctaText = trim(($cta['eyebrow'] ?? '') . ' ' . ($cta['text'] ?? 'Book a free academic counselling session and we’ll map the right program and preparation plan for you.'));
    $ctaButton = $cta['button'] ?? 'Book Academic Counselling';
    $ctaUrl = url($cta['url'] ?? '/contact#enquiry');
@endphp

@section('title', ($post['meta_title'] ?? $post['title']) . ' | SG Educare')

@section('meta')
    <meta name="description" content="{{ $post['description'] }}">
    <link rel="canonical" href="{{ $url }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post['title'] }}">
    <meta property="og:description" content="{{ $post['description'] }}">
    <meta property="og:image" content="{{ asset($post['image'] ?: 'assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:locale" content="en_IN">
    <meta property="article:published_time" content="{{ $published->toDateString() }}">
    <script type="application/ld+json">
        {!! json_encode(array_values(array_filter([
            [
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'headline' => $post['title'],
                'description' => $post['description'],
                'datePublished' => $published->toDateString(),
                'mainEntityOfPage' => $url,
                'image' => asset($post['image'] ?: 'assets/images/og-image.jpg'),
                'author' => ['@type' => 'Organization', 'name' => $author],
                'publisher' => ['@type' => 'Organization', 'name' => 'SG Education', 'url' => url('/')],
            ],
            $post['faqs'] ? [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => collect($post['faqs'])->map(fn($f) => [
                    '@type' => 'Question',
                    'name' => $f['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
                ])->all(),
            ] : null,
        ])), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection

@section('styles')
    <style>
        .sg-read {
            --sg-ink: var(--eduhive-base);
            --sg-ink-rgb: var(--eduhive-base-rgb);
            --sg-accent: var(--eduhive-primary);
            --sg-accent-rgb: var(--eduhive-primary-rgb);
            --sg-dark: #1e2833;
            --sg-line: rgba(var(--sg-ink-rgb), .12);
            --sg-muted: rgba(var(--sg-ink-rgb), .66);
            --sg-soft: #f6f7f9;
            --sg-sticky-top: 110px;
        }

        .sg-read :focus-visible {
            outline: 3px solid var(--sg-accent);
            outline-offset: 3px;
        }

        /* Reading progress */
        .sg-progress {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 100%;
            height: 4px;
            background: transparent;
            pointer-events: none;
        }

        .sg-progress span {
            display: block;
            width: 100%;
            height: 100%;
            background: var(--eduhive-primary);
            transform: scaleX(0);
            transform-origin: left;
        }

        /* ---------- Hero ---------- */
        .sg-hero {
            max-width: 860px;
            margin-bottom: 48px;
        }

        .sg-hero__tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 18px;
        }

        .sg-tag {
            padding: 5px 11px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
            color: var(--sg-ink);
            background: rgba(var(--sg-ink-rgb), .06);
            text-decoration: none;
        }

        .sg-tag--cat {
            color: var(--sg-accent);
            background: rgba(var(--sg-accent-rgb), .1);
        }

        .sg-hero__title {
            margin: 0 0 18px;
            font-size: clamp(30px, 4.2vw, 50px);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -.03em;
            color: var(--sg-ink);
        }

        .sg-hero__excerpt {
            margin: 0 0 26px;
            max-width: 720px;
            font-size: 19px;
            line-height: 1.65;
            color: var(--sg-muted);
        }

        .sg-hero__meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 20px;
            border-top: 1px solid var(--sg-line);
        }

        .sg-byline {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            color: var(--sg-muted);
        }

        .sg-byline strong {
            display: block;
            color: var(--sg-ink);
        }

        .sg-byline__logo {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 14px;
            font-weight: 800;
            color: #fff;
            background: var(--sg-ink);
        }

        .sg-share {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .sg-share a,
        .sg-share button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid var(--sg-line);
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            color: var(--sg-ink) !important;
            background: #fff;
            text-decoration: none !important;
            cursor: pointer;
        }

        .sg-share a:hover,
        .sg-share button:hover {
            border-color: var(--sg-ink);
        }

        .sg-share .fa-whatsapp {
            color: #1faa55;
        }

        /* ---------- Layout ---------- */
        .sg-layout {
            display: grid;
            grid-template-columns: minmax(0, 740px) 280px;
            justify-content: space-between;
            gap: 60px;
        }

        .sg-aside {
            position: sticky;
            top: var(--sg-sticky-top);
            align-self: start;
            max-height: calc(100vh - var(--sg-sticky-top) - 20px);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sg-toc {
            min-height: 0;
            overflow-y: auto;
            padding-right: 6px;
        }

        .sg-toc__title {
            margin: 0 0 12px;
            font-size: 15px;
            font-weight: 800;
            color: var(--sg-ink);
        }

        .sg-toc ol {
            margin: 0;
            padding: 0;
            list-style: none;
            border-left: 2px solid var(--sg-line);
        }

        .sg-toc a {
            display: block;
            margin-left: -2px;
            padding: 6px 0 6px 14px;
            border-left: 2px solid transparent;
            font-size: 14px;
            line-height: 1.45;
            color: var(--sg-muted);
            text-decoration: none;
            transition: color .2s ease, border-color .2s ease;
        }

        .sg-toc a.is-sub {
            padding-left: 26px;
            font-size: 13px;
        }

        .sg-toc a:hover {
            color: var(--sg-ink);
        }

        .sg-toc a.is-active {
            border-left-color: var(--sg-accent);
            font-weight: 700;
            color: var(--sg-ink);
        }

        .sg-aside-cta {
            flex-shrink: 0;
            padding: 22px;
            border-radius: 16px;
            color: #fff;
            background: var(--sg-dark);
        }

        .sg-aside-cta p {
            margin: 0 0 14px;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.45;
        }

        .sg-aside-cta a {
            display: block;
            padding: 12px 14px;
            border-radius: 10px;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            color: #fff !important;
            text-decoration: none !important;
            background: var(--sg-accent);
        }

        .sg-toc-m {
            display: none;
            margin-bottom: 32px;
            border: 1px solid var(--sg-line);
            border-radius: 14px;
            background: var(--sg-soft);
        }

        .sg-toc-m summary {
            padding: 16px 18px;
            font-weight: 800;
            color: var(--sg-ink);
            cursor: pointer;
        }

        .sg-toc-m .sg-toc {
            padding: 0 18px 16px;
            max-height: 50vh;
        }

        /* ---------- Article typography ---------- */
        .sg-article {
            font-size: 18px;
            line-height: 1.8;
            color: rgba(var(--sg-ink-rgb), .86);
        }

        .sg-article > * {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .sg-article h2 {
            margin: 60px 0 18px;
            font-size: clamp(25px, 2.6vw, 32px);
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -.02em;
            color: var(--sg-ink);
            scroll-margin-top: calc(var(--sg-sticky-top) + 10px);
        }

        .sg-article h3 {
            margin: 44px 0 14px;
            font-size: 22px;
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: -.01em;
            color: var(--sg-ink);
            scroll-margin-top: calc(var(--sg-sticky-top) + 10px);
        }

        .sg-article h4 {
            margin: 28px 0 8px;
            font-size: 18px;
            font-weight: 800;
            color: var(--sg-ink);
        }

        .sg-article strong {
            color: var(--sg-ink);
        }

        .sg-article ul:not([class]) {
            padding-left: 22px;
        }

        .sg-article ul:not([class]) li {
            margin-bottom: 6px;
        }

        .sg-article ul:not([class]) li::marker {
            color: var(--sg-accent);
        }

        .sg-lead {
            font-size: 20px;
            line-height: 1.7;
            color: var(--sg-ink);
        }

        /* Key statement */
        .sg-key {
            margin: 28px 0 !important;
            padding: 4px 0 4px 22px;
            border-left: 4px solid var(--sg-accent);
            font-size: 21px;
            font-weight: 800;
            line-height: 1.45;
            letter-spacing: -.01em;
            color: var(--sg-ink);
        }

        /* Inline process chain: A → B → C */
        .sg-flow {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px 0;
            margin: 24px 0 28px !important;
            padding: 0;
            list-style: none;
        }

        .sg-flow li {
            display: flex;
            align-items: center;
            font-size: 15px;
            font-weight: 800;
            color: var(--sg-ink);
        }

        .sg-flow li span {
            padding: 9px 14px;
            border-radius: 10px;
            background: rgba(var(--sg-accent-rgb), .1);
        }

        .sg-flow li:last-child span {
            color: #fff;
            background: var(--sg-accent);
        }

        .sg-flow li + li::before {
            content: "";
            width: 22px;
            height: 2px;
            margin: 0 4px;
            background: rgba(var(--sg-accent-rgb), .6);
        }

        /* Vertical ladder: increasing difficulty */
        .sg-ladder {
            position: relative;
            margin: 24px 0 30px !important;
            padding: 0;
            list-style: none;
        }

        .sg-ladder::before {
            content: "";
            position: absolute;
            top: 12px;
            bottom: 12px;
            left: 9px;
            width: 2px;
            background: linear-gradient(rgba(var(--sg-accent-rgb), .2), var(--sg-accent));
        }

        .sg-ladder li {
            position: relative;
            padding: 5px 0 5px 36px;
            font-size: 16px;
            font-weight: 700;
            color: var(--sg-ink);
        }

        .sg-ladder li::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 3px;
            width: 14px;
            height: 14px;
            margin-top: -7px;
            border-radius: 50%;
            background: #fff;
            border: 3px solid rgba(var(--sg-accent-rgb), .5);
        }

        .sg-ladder li:last-child::before {
            background: var(--sg-accent);
            border-color: var(--sg-accent);
        }

        .sg-ladder small {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--sg-muted);
        }

        /* Card grid */
        .sg-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin: 24px 0 30px !important;
        }

        .sg-cards--3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .sg-cardlet {
            padding: 20px 22px;
            border: 1px solid var(--sg-line);
            border-radius: 14px;
            background: #fff;
        }

        .sg-cardlet h4 {
            margin: 0 0 6px;
            font-size: 17px;
        }

        .sg-cardlet p {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: var(--sg-muted);
        }

        /* Phases timeline (a real sequence) */
        .sg-phases {
            margin: 26px 0 32px !important;
            padding: 0;
            list-style: none;
            counter-reset: phase;
        }

        .sg-phases > li {
            position: relative;
            padding: 0 0 26px 58px;
            counter-increment: phase;
        }

        .sg-phases > li::before {
            content: counter(phase);
            position: absolute;
            top: 0;
            left: 0;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 16px;
            font-weight: 800;
            color: #fff;
            background: var(--sg-ink);
        }

        .sg-phases > li:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 44px;
            bottom: 6px;
            left: 18px;
            width: 2px;
            background: var(--sg-line);
        }

        .sg-phases h4 {
            margin: 6px 0 6px;
        }

        .sg-phases p,
        .sg-phases ul {
            margin: 0 0 6px;
            font-size: 16px;
            line-height: 1.65;
        }

        .sg-phases ul {
            padding-left: 20px;
        }

        /* Mistakes */
        .sg-mistakes {
            display: grid;
            gap: 14px;
            margin: 24px 0 30px !important;
        }

        .sg-mistake {
            padding: 22px 24px;
            border-radius: 14px;
            background: var(--sg-soft);
        }

        .sg-mistake h4 {
            margin: 0 0 6px;
            font-size: 17px;
        }

        .sg-mistake p {
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }

        .sg-mistake .sg-fix {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px dashed var(--sg-line);
        }

        .sg-fix strong {
            color: #1b7a3d;
        }

        /* Table */
        .sg-table {
            margin: 24px 0 12px !important;
            overflow-x: auto;
            border: 1px solid var(--sg-line);
            border-radius: 14px;
        }

        .sg-table table {
            width: 100%;
            min-width: 460px;
            border-collapse: collapse;
            font-size: 16px;
        }

        .sg-table th {
            padding: 14px 18px;
            text-align: left;
            font-weight: 800;
            color: #fff;
            background: var(--sg-ink);
        }

        .sg-table td {
            padding: 14px 18px;
            border-top: 1px solid var(--sg-line);
            vertical-align: top;
        }

        .sg-table tr:nth-child(even) td {
            background: var(--sg-soft);
        }

        .sg-table td:first-child {
            font-weight: 700;
            color: var(--sg-ink);
            white-space: nowrap;
        }

        .sg-note {
            font-size: 15px;
            color: var(--sg-muted);
        }

        /* Checklist */
        .sg-checklist {
            margin: 24px 0 28px !important;
            padding: 8px 0;
            list-style: none;
            border: 1px solid var(--sg-line);
            border-radius: 14px;
        }

        .sg-checklist li {
            position: relative;
            padding: 11px 20px 11px 56px;
            font-size: 16px;
            line-height: 1.55;
        }

        .sg-checklist li + li {
            border-top: 1px solid var(--sg-line);
        }

        .sg-checklist li::before {
            content: "";
            position: absolute;
            top: 13px;
            left: 20px;
            width: 20px;
            height: 20px;
            border: 2px solid var(--sg-accent);
            border-radius: 6px;
        }

        /* Dark panel (SG approach) */
        .sg-panel {
            margin: 28px 0 32px !important;
            padding: 32px;
            border-radius: 20px;
            color: rgba(255, 255, 255, .78);
            background: var(--sg-dark);
        }

        .sg-panel h4,
        .sg-panel strong {
            color: #fff;
        }

        .sg-panel p {
            margin: 0 0 12px;
            font-size: 16px;
        }

        .sg-panel .sg-cardlet {
            border-color: rgba(255, 255, 255, .1);
            background: rgba(255, 255, 255, .04);
        }

        .sg-panel .sg-cardlet h4 {
            color: var(--sg-accent);
        }

        .sg-panel .sg-cardlet p {
            color: rgba(255, 255, 255, .7);
        }

        .sg-panel .sg-flow li {
            color: #fff;
        }

        .sg-panel .sg-flow li span {
            background: rgba(255, 255, 255, .08);
        }

        .sg-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 14px 0 0;
            padding: 0;
            list-style: none;
        }

        .sg-pills li {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background: rgba(var(--sg-accent-rgb), .25);
        }

        .sg-pills--light {
            margin-bottom: 24px !important;
        }

        .sg-pills--light li {
            color: var(--sg-ink);
            background: rgba(var(--sg-accent-rgb), .12);
        }

        .sg-panel .sg-table {
            border-color: rgba(255, 255, 255, .12);
        }

        .sg-panel .sg-table td {
            background: transparent !important;
            border-color: rgba(255, 255, 255, .1);
            color: rgba(255, 255, 255, .78);
        }

        .sg-panel .sg-table td:first-child {
            color: #fff;
        }

        .sg-panel .sg-panel__gap {
            margin-top: 22px;
        }

        .sg-cardlet h4:only-child {
            margin: 0;
        }

        .sg-takeaway .sg-takeaway__intro {
            margin-bottom: 14px;
        }

        /* Final takeaway */
        .sg-takeaway {
            margin: 28px 0 !important;
            padding: 30px 32px;
            border-radius: 20px;
            border: 2px solid var(--sg-accent);
        }

        .sg-takeaway ul {
            margin: 0 0 18px;
            padding: 0;
            list-style: none;
        }

        .sg-takeaway li {
            font-size: 20px;
            font-weight: 800;
            line-height: 1.6;
            color: var(--sg-ink);
        }

        .sg-takeaway p {
            margin: 0;
            font-size: 17px;
        }

        /* FAQ */
        .sg-faq {
            margin: 20px 0 30px !important;
            border: 1px solid var(--sg-line);
            border-radius: 16px;
            overflow: hidden;
        }

        .sg-faq details + details {
            border-top: 1px solid var(--sg-line);
        }

        .sg-faq summary {
            position: relative;
            padding: 20px 56px 20px 22px;
            font-size: 17px;
            font-weight: 800;
            line-height: 1.45;
            color: var(--sg-ink);
            cursor: pointer;
            list-style: none;
        }

        .sg-faq summary::-webkit-details-marker {
            display: none;
        }

        .sg-faq summary::after {
            content: "+";
            position: absolute;
            top: 50%;
            right: 22px;
            transform: translateY(-50%);
            font-size: 24px;
            font-weight: 500;
            color: var(--sg-accent);
        }

        .sg-faq details[open] summary::after {
            content: "−";
        }

        .sg-faq details p {
            margin: 0;
            padding: 0 22px 20px;
            font-size: 16px;
            line-height: 1.7;
        }

        /* End-of-article */
        .sg-endshare {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-top: 48px;
            padding: 20px 0;
            border-top: 1px solid var(--sg-line);
            border-bottom: 1px solid var(--sg-line);
            font-weight: 700;
            color: var(--sg-ink);
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

        .sg-blog-cta-sec {
            padding: 0 0 100px;
        }

        /* Related */
        .sg-related {
            padding: 90px 0 110px;
            background: var(--sg-soft);
        }

        .sg-related__title {
            margin: 0 0 28px;
            font-size: 28px;
            font-weight: 800;
            color: var(--sg-ink);
        }

        .sg-related__grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .sg-rcard {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid var(--sg-line);
            background: #fff;
            transition: box-shadow .3s ease;
        }

        .sg-rcard:hover {
            box-shadow: 0 16px 36px rgba(var(--sg-ink-rgb), .08);
        }

        .sg-rcard__body {
            padding: 22px 24px 26px;
        }

        .sg-rcard h3 {
            margin: 10px 0 0;
            font-size: 20px;
            font-weight: 800;
            line-height: 1.3;
        }

        .sg-rcard h3 a {
            color: var(--sg-ink);
            text-decoration: none;
        }

        .sg-rcard h3 a::after {
            content: "";
            position: absolute;
            inset: 0;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 1199px) {
            .sg-layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .sg-aside {
                display: none;
            }

            .sg-toc-m {
                display: block;
            }

            .sg-article {
                max-width: 760px;
            }
        }

        @media (max-width: 767px) {
            .sg-read {
                --sg-sticky-top: 80px;
            }

            .sg-article {
                font-size: 17px;
            }

            .sg-cards,
            .sg-cards--3,
            .sg-related__grid {
                grid-template-columns: 1fr;
            }

            .sg-key {
                font-size: 19px;
            }

            .sg-panel,
            .sg-takeaway {
                padding: 26px 20px;
            }

            .sg-flow li + li::before {
                width: 12px;
            }

            .sg-share a span,
            .sg-share button span {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .sg-read *,
            .sg-progress span {
                transition: none !important;
            }
        }
    </style>
@endsection

@section('content')

    <div class="sg-progress" aria-hidden="true"><span></span></div>

    {{-- ================= PAGE HEADER ================= --}}
    <section class="page-header" style="padding-top: 200px;">
        <div class="container">
            <div class="page-header__content">
                <ul class="eduhive-breadcrumb list-unstyled">
                    <li><span class="eduhive-breadcrumb__icon"><i class="icon-home"></i></span><a
                            href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><span>{{ $post['category'] }}</span></li>
                </ul>
                <p class="page-header__title">Blog</p>
            </div>
        </div>
        <img src="{{ asset('assets/images/shapes/page-header-shape-1.png') }}" alt="" class="page-header__shape-one">
        <img src="{{ asset('assets/images/shapes/page-header-shape-2.png') }}" alt="" class="page-header__shape-two">
        <div class="page-header__shape-three"></div>
        <div class="page-header__shape-four"></div>
    </section>

    <div class="sg-read">
        <section class="section-space">
            <div class="container">

                {{-- ---------- Hero ---------- --}}
                <header class="sg-hero">
                    <div class="sg-hero__tags">
                        <span class="sg-tag sg-tag--cat">{{ $post['category'] }}</span>
                        <span class="sg-tag">{{ $post['read_minutes'] }} min read</span>
                    </div>
                    <h1 class="sg-hero__title">{{ $post['title'] }}</h1>
                    <p class="sg-hero__excerpt">{{ $post['excerpt'] }}</p>
                    <div class="sg-hero__meta">
                        <div class="sg-byline">
                            <span class="sg-byline__logo" aria-hidden="true">SG</span>
                            <div>
                                <strong>{{ $author }}</strong>
                                <time datetime="{{ $published->toDateString() }}">{{ $published->format('j M Y') }}</time>
                            </div>
                        </div>
                        <div class="sg-share" aria-label="Share this guide">
                            <a href="https://wa.me/?text={{ $shareText }}" target="_blank" rel="noopener">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i><span>Share on WhatsApp</span></a>
                            <button type="button" class="js-copy" data-url="{{ $url }}" aria-label="Copy link">
                                <i class="fas fa-link" aria-hidden="true"></i><span>Copy link</span></button>
                        </div>
                    </div>
                </header>

                {{-- ---------- Body ---------- --}}
                <div class="sg-layout">
                    <div>
                        <details class="sg-toc-m">
                            <summary>In this guide</summary>
                            <nav class="sg-toc" aria-label="In this guide (mobile)"><ol data-toc></ol></nav>
                        </details>

                        <article class="sg-article" id="sg-article">
                            {!! $post['body'] !!}

                            @include('blog.partials.faq', ['faqs' => $post['faqs'] ?? []])
                        </article>

                        <div class="sg-endshare">
                            <span>Found this useful? Share it with a friend preparing too.</span>
                            <div class="sg-share">
                                <a href="https://wa.me/?text={{ $shareText }}" target="_blank" rel="noopener">
                                    <i class="fab fa-whatsapp" aria-hidden="true"></i><span>WhatsApp</span></a>
                                <button type="button" class="js-copy" data-url="{{ $url }}" aria-label="Copy link">
                                    <i class="fas fa-link" aria-hidden="true"></i><span>Copy link</span></button>
                            </div>
                        </div>

                    </div>

                    <aside class="sg-aside">
                        <nav class="sg-toc" aria-label="In this guide">
                            <p class="sg-toc__title">In this guide</p>
                            <ol data-toc></ol>
                        </nav>
                        <div class="sg-aside-cta">
                            <p>Want a preparation plan built around your goal?</p>
                            <a href="{{ url('/contact') }}#enquiry">Book free counselling</a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        {{-- ---------- CTA ---------- --}}
        <section class="sg-blog-cta-sec">
            <div class="container">
                <div class="sg-cta__card">
                    <div class="sg-cta__content">
                        <span class="sg-cta__tag"><i class="icon-medal" aria-hidden="true"></i> {{ $ctaTag }}</span>
                        <h2 class="sg-cta__title">{{ $ctaTitle }}</h2>
                        <p class="sg-cta__text">{{ $ctaText }}</p>
                    </div>
                    <div class="sg-cta__actions">
                        <a href="{{ $ctaUrl }}" class="sg-cta__btn sg-cta__btn--primary">
                            <span>{{ $ctaButton }}</span>
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

        @if ($related->isNotEmpty())
            <section class="sg-related">
                <div class="container">
                    <h2 class="sg-related__title">Keep reading</h2>
                    <div class="sg-related__grid">
                        @foreach ($related as $r)
                            <article class="sg-rcard">
                                @include('blog.partials.cover', ['post' => $r, 'size' => 'sm'])
                                <div class="sg-rcard__body">
                                    <span class="sg-tag sg-tag--cat">{{ $r['category'] }}</span>
                                    <span class="sg-tag">{{ $r['read_minutes'] }} min read</span>
                                    <h3><a href="{{ route('blog.show', $r['slug']) }}">{{ $r['title'] }}</a></h3>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>

@endsection

@section('scripts')
    <script>
        (function () {
            var article = document.getElementById('sg-article');
            if (!article) return;

            /* ---------- Table of contents (from h2/h3 with ids) ---------- */
            var heads = article.querySelectorAll('h2[id], h3[id]');
            var lists = document.querySelectorAll('[data-toc]');
            var links = [];

            lists.forEach(function (ol) {
                heads.forEach(function (h) {
                    var li = document.createElement('li');
                    var a = document.createElement('a');
                    a.href = '#' + h.id;
                    a.textContent = h.getAttribute('data-toc') || h.textContent;
                    if (h.tagName === 'H3') a.className = 'is-sub';
                    li.appendChild(a);
                    ol.appendChild(li);
                    links.push(a);
                    a.addEventListener('click', function () {
                        var d = ol.closest('details');
                        if (d) d.open = false;
                    });
                });
            });
            if (!heads.length) {
                document.querySelectorAll('.sg-toc-m, .sg-aside .sg-toc').forEach(function (n) { n.remove(); });
            }

            /* Scroll-spy: highlight the last heading above the reading line */
            function spy() {
                var line = window.innerHeight * 0.25;
                var current = null;
                heads.forEach(function (h) {
                    if (h.getBoundingClientRect().top <= line) current = h.id;
                });
                links.forEach(function (a) {
                    var on = current && a.getAttribute('href') === '#' + current;
                    a.classList.toggle('is-active', !!on);
                    if (on) a.setAttribute('aria-current', 'true'); else a.removeAttribute('aria-current');
                });
                // Keep active item visible inside the sticky TOC
                var active = document.querySelector('.sg-aside .sg-toc a.is-active');
                if (active) {
                    var box = active.closest('.sg-toc');
                    var top = active.offsetTop - box.offsetTop;
                    if (top < box.scrollTop || top > box.scrollTop + box.clientHeight - 40) {
                        box.scrollTop = top - box.clientHeight / 3;
                    }
                }
            }

            /* ---------- Reading progress ---------- */
            var bar = document.querySelector('.sg-progress span');
            function progress() {
                var rect = article.getBoundingClientRect();
                var total = rect.height - window.innerHeight * 0.6;
                var p = Math.min(Math.max(-rect.top / (total || 1), 0), 1);
                bar.style.transform = 'scaleX(' + p + ')';
            }

            var ticking = false;
            window.addEventListener('scroll', function () {
                if (ticking) return;
                ticking = true;
                requestAnimationFrame(function () { spy(); progress(); ticking = false; });
            }, { passive: true });
            spy(); progress();

            /* ---------- Copy link ---------- */
            document.querySelectorAll('.js-copy').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var url = btn.getAttribute('data-url');
                    var label = btn.querySelector('span');
                    var done = function () {
                        if (!label) return;
                        var old = label.textContent;
                        label.textContent = 'Link copied';
                        setTimeout(function () { label.textContent = old; }, 1800);
                    };
                    if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(url).then(done);
                    } else {
                        var t = document.createElement('textarea');
                        t.value = url; t.setAttribute('readonly', ''); t.style.position = 'fixed'; t.style.opacity = '0';
                        document.body.appendChild(t); t.select();
                        try { document.execCommand('copy'); done(); } catch (e) { }
                        t.remove();
                    }
                });
            });
        })();
    </script>
@endsection