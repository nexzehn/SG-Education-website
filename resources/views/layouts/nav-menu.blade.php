{{--
  SG Educare — shared menu items
  Place at: resources/views/layouts/nav-menu.blade.php

  Included twice from header.blade.php:
    @include('layouts.nav-menu', ['listClass' => 'sg-nav__list'])     → desktop (SG styles)
    @include('layouts.nav-menu', ['listClass' => 'main-menu__list'])  → hidden source that
                                                                         eduhive.js copies into
                                                                         the mobile drawer
  Edit menu items ONLY here.
--}}
<ul class="{{ $listClass }}">
    <li class="sg-nav__item {{ request()->is('/') ? 'current' : '' }}">
        <a href="{{ url('/') }}" class="sg-nav__link">Home</a>
    </li>
    <li class="sg-nav__item {{ request()->is('about') ? 'current' : '' }}">
        <a href="{{ url('/about') }}" class="sg-nav__link">About Us</a>
    </li>
    <li class="sg-nav__item {{ request()->is('our-methodology') ? 'current' : '' }}">
        <a href="{{ url('/our-methodology') }}" class="sg-nav__link">Our Methodology</a>
    </li>

    {{-- class "dropdown" is required by eduhive.js for the mobile accordion --}}
    <li class="sg-nav__item dropdown {{ request()->is('courses*') ? 'current' : '' }}">
        <a href="{{ url('/courses') }}" class="sg-nav__link" aria-haspopup="true">
            Programs
            <svg class="sg-nav__caret" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"/>
            </svg>
        </a>
        <ul class="sg-dropdown">
            <li><a href="{{ url('/courses/jee') }}"        class="sg-dropdown__link">JEE (Main + Advanced)</a></li>
            <li><a href="{{ url('/courses/neet') }}"       class="sg-dropdown__link">NEET-UG</a></li>
            <li><a href="{{ url('/courses/mht-cet') }}"    class="sg-dropdown__link">MHT-CET (Engg &amp; Pharmacy)</a></li>
            <li><a href="{{ url('/courses/foundation') }}" class="sg-dropdown__link">Foundation / Launchpad</a></li>
            <li><a href="{{ url('/courses/boards') }}"     class="sg-dropdown__link">Boards 8–10 (SSC / CBSE / ICSE)</a></li>
            <li><a href="{{ url('/courses/nda') }}"        class="sg-dropdown__link">NDA</a></li>
            <li class="sg-dropdown__divider" role="separator"></li>
            <li><a href="{{ url('/courses') }}"            class="sg-dropdown__link"><strong>All Programs →</strong></a></li>
        </ul>
    </li>

    <li class="sg-nav__item {{ request()->is('results') ? 'current' : '' }}">
        <a href="{{ url('/results') }}" class="sg-nav__link">Results</a>
    </li>
    <li class="sg-nav__item {{ request()->is('resources') ? 'current' : '' }}">
        <a href="{{ url('/resources') }}" class="sg-nav__link">Resources</a>
    </li>
    <li class="sg-nav__item {{ request()->is('blog*') ? 'current' : '' }}">
        <a href="{{ url('/blog') }}" class="sg-nav__link">Blog</a>
    </li>
    <li class="sg-nav__item {{ request()->is('contact') ? 'current' : '' }}">
        <a href="{{ url('/contact') }}" class="sg-nav__link">Contact</a>
    </li>
</ul>