{{--
  SG Educare — Redesigned Header (topbar + main nav)
  Place at: resources/views/layouts/header.blade.php
  Pure CSS — no JS needed for dropdown or animations.
--}}

<style>
/* =========================================================
   SG EDUCARE HEADER — VARIABLES
   ========================================================= */
:root {
  --sg-navy:       #0f1b3d;
  --sg-navy-light: #162350;
  --sg-accent:     #ff6b35;
  --sg-accent-alt: #f7c948;
  --sg-blue:       #2563eb;
  --sg-white:      #ffffff;
  --sg-gray-50:    #f8fafc;
  --sg-gray-100:   #f1f5f9;
  --sg-gray-400:   #94a3b8;
  --sg-gray-600:   #475569;
  --sg-gray-800:   #1e293b;
  --sg-radius:     12px;
  --sg-shadow:     0 4px 24px rgba(15, 27, 61, .10);
  --sg-shadow-lg:  0 12px 40px rgba(15, 27, 61, .16);
  --sg-transition: .3s cubic-bezier(.4, 0, .2, 1);
}

/* =========================================================
   TOPBAR
   ========================================================= */
.sg-topbar {
  background: linear-gradient(135deg, var(--sg-navy) 0%, var(--sg-navy-light) 100%);
  padding: 8px 0;
  font-size: .82rem;
  color: rgba(255,255,255,.75);
  position: relative;
  z-index: 1001;
}
.sg-topbar__inner {
  max-width: 1320px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 8px;
}

/* Info list */
.sg-topbar__info {
  display: flex;
  align-items: center;
  gap: 24px;
  list-style: none;
  margin: 0; padding: 0;
}
.sg-topbar__info li {
  display: flex;
  align-items: center;
  gap: 7px;
}
.sg-topbar__info a {
  color: rgba(255,255,255,.8);
  text-decoration: none;
  transition: color var(--sg-transition);
}
.sg-topbar__info a:hover {
  color: var(--sg-accent-alt);
}
.sg-topbar__icon {
  width: 28px; height: 28px;
  border-radius: 8px;
  background: rgba(255,255,255,.08);
  display: grid;
  place-items: center;
  flex-shrink: 0;
  transition: background var(--sg-transition);
}
.sg-topbar__info li:hover .sg-topbar__icon {
  background: rgba(255,107,53,.25);
}
.sg-topbar__icon svg {
  width: 13px; height: 13px;
  stroke: var(--sg-accent-alt);
}

/* Social */
.sg-topbar__social {
  display: flex;
  align-items: center;
  gap: 6px;
}
.sg-topbar__social a {
  width: 30px; height: 30px;
  border-radius: 8px;
  display: grid;
  place-items: center;
  color: rgba(255,255,255,.6);
  text-decoration: none;
  transition: all var(--sg-transition);
  background: transparent;
}
.sg-topbar__social a:hover {
  background: var(--sg-accent);
  color: #fff;
  transform: translateY(-2px);
}
.sg-topbar__social svg {
  width: 14px; height: 14px;
}

/* =========================================================
   MAIN HEADER
   ========================================================= */
.sg-header {
  background: var(--sg-white);
  position: sticky;
  top: 0;
  z-index: 1000;
  transition: box-shadow var(--sg-transition),
              background var(--sg-transition);
}
.sg-header.is-sticky {
  box-shadow: var(--sg-shadow);
  background: rgba(255,255,255,.92);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
}
.sg-header__inner {
  max-width: 1320px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 76px;
}

/* Logo */
.sg-header__logo img {
  height: 46px;
  width: auto;
  transition: transform var(--sg-transition);
}
.sg-header__logo:hover img {
  transform: scale(1.04);
}

/* Right wrapper */
.sg-header__right {
  display: flex;
  align-items: center;
  gap: 12px;
}

/* =========================================================
   NAVIGATION
   ========================================================= */
.sg-nav__list {
  display: flex;
  align-items: center;
  gap: 4px;
  list-style: none;
  margin: 0; padding: 0;
}
.sg-nav__item {
  position: relative;
}
.sg-nav__link {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 10px 16px;
  font-size: .92rem;
  font-weight: 600;
  color: var(--sg-gray-800);
  text-decoration: none;
  border-radius: 10px;
  transition: color var(--sg-transition),
              background var(--sg-transition);
  position: relative;
}
.sg-nav__link::after {
  content: '';
  position: absolute;
  bottom: 4px;
  left: 16px; right: 16px;
  height: 2px;
  border-radius: 2px;
  background: var(--sg-accent);
  transform: scaleX(0);
  transform-origin: center;
  transition: transform var(--sg-transition);
}
.sg-nav__link:hover,
.sg-nav__item.current > .sg-nav__link {
  color: var(--sg-accent);
  background: rgba(255,107,53,.06);
}
.sg-nav__link:hover::after,
.sg-nav__item.current > .sg-nav__link::after {
  transform: scaleX(1);
}

/* ---- Caret Icon (rotates on hover) ---- */
.sg-nav__caret {
  width: 16px; height: 16px;
  transition: transform .35s cubic-bezier(.4, 0, .2, 1);
  flex-shrink: 0;
}
.sg-nav__item.dropdown:hover > .sg-nav__link .sg-nav__caret,
.sg-nav__item.dropdown:focus-within > .sg-nav__link .sg-nav__caret {
  transform: rotate(180deg);
}

/* =========================================================
   DROPDOWN  ✨  Smooth fade + slide
   ========================================================= */
.sg-dropdown {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  min-width: 260px;
  background: var(--sg-white);
  border-radius: var(--sg-radius);
  box-shadow: var(--sg-shadow-lg);
  border: 1px solid rgba(0,0,0,.06);
  padding: 8px 0;
  list-style: none;
  margin: 0;

  /* ---- hidden state ---- */
  opacity: 0;
  visibility: hidden;
  transform: translateY(10px);
  transition: opacity .3s ease,
              visibility .3s ease,
              transform .3s cubic-bezier(.4, 0, .2, 1);
  pointer-events: none;
  z-index: 999;
}
/* small arrow on top */
.sg-dropdown::before {
  content: '';
  position: absolute;
  top: -6px; left: 28px;
  width: 12px; height: 12px;
  background: var(--sg-white);
  border-left: 1px solid rgba(0,0,0,.06);
  border-top:  1px solid rgba(0,0,0,.06);
  transform: rotate(45deg);
  border-radius: 2px 0 0 0;
}

/* ---- visible state ---- */
.sg-nav__item.dropdown:hover > .sg-dropdown,
.sg-nav__item.dropdown:focus-within > .sg-dropdown {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
  pointer-events: auto;
}

/* Dropdown items */
.sg-dropdown__link {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 20px;
  font-size: .88rem;
  font-weight: 500;
  color: var(--sg-gray-600);
  text-decoration: none;
  transition: all var(--sg-transition);
  position: relative;
}
.sg-dropdown__link::before {
  content: '';
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--sg-gray-400);
  flex-shrink: 0;
  transition: all var(--sg-transition);
}
.sg-dropdown__link:hover {
  color: var(--sg-accent);
  background: rgba(255,107,53,.05);
  padding-left: 26px;
}
.sg-dropdown__link:hover::before {
  background: var(--sg-accent);
  box-shadow: 0 0 0 3px rgba(255,107,53,.15);
}

/* Stagger animation for items */
.sg-dropdown li {
  opacity: 0;
  transform: translateX(-8px);
  transition: opacity .25s ease, transform .25s ease;
}
.sg-nav__item.dropdown:hover .sg-dropdown li,
.sg-nav__item.dropdown:focus-within .sg-dropdown li {
  opacity: 1;
  transform: translateX(0);
}
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(1),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(1) { transition-delay: .04s; }
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(2),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(2) { transition-delay: .08s; }
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(3),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(3) { transition-delay: .12s; }
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(4),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(4) { transition-delay: .16s; }
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(5),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(5) { transition-delay: .20s; }
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(6),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(6) { transition-delay: .24s; }
.sg-nav__item.dropdown:hover .sg-dropdown li:nth-child(7),
.sg-nav__item.dropdown:focus-within .sg-dropdown li:nth-child(7) { transition-delay: .28s; }

/* Divider before "All Programs" */
.sg-dropdown__divider {
  height: 1px;
  background: var(--sg-gray-100);
  margin: 6px 16px;
}

/* =========================================================
   CTA BUTTON
   ========================================================= */
.sg-cta {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 11px 24px;
  font-size: .88rem;
  font-weight: 700;
  color: #fff;
  background: linear-gradient(135deg, var(--sg-accent), #ff8c5a);
  border: none;
  border-radius: 50px;
  text-decoration: none;
  white-space: nowrap;
  transition: transform var(--sg-transition),
              box-shadow var(--sg-transition);
  box-shadow: 0 4px 16px rgba(255,107,53,.3);
}
.sg-cta:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(255,107,53,.4);
}
.sg-cta svg {
  width: 16px; height: 16px;
  transition: transform var(--sg-transition);
}
.sg-cta:hover svg {
  transform: translateX(3px);
}

/* =========================================================
   MOBILE TOGGLE
   ========================================================= */
.sg-mobile-toggle {
  display: none;
  flex-direction: column;
  gap: 5px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
  border-radius: 8px;
  transition: background var(--sg-transition);
}
.sg-mobile-toggle:hover {
  background: var(--sg-gray-100);
}
.sg-mobile-toggle span {
  display: block;
  width: 22px; height: 2px;
  background: var(--sg-gray-800);
  border-radius: 2px;
  transition: all var(--sg-transition);
}
.sg-mobile-toggle.active span:nth-child(1) {
  transform: rotate(45deg) translate(5px, 5px);
}
.sg-mobile-toggle.active span:nth-child(2) {
  opacity: 0;
}
.sg-mobile-toggle.active span:nth-child(3) {
  transform: rotate(-45deg) translate(5px, -5px);
}

/* =========================================================
   RESPONSIVE
   ========================================================= */
@media (max-width: 1024px) {
  .sg-nav__link { padding: 10px 10px; font-size: .85rem; }
  .sg-cta { padding: 10px 18px; font-size: .82rem; }
}
@media (max-width: 768px) {
  .sg-topbar__info { gap: 14px; }
  .sg-topbar__info li:last-child { display: none; }

  .sg-mobile-toggle { display: flex; }

  .sg-header__right {
    position: fixed;
    top: 0; right: -100%;
    width: 300px; height: 100vh;
    background: var(--sg-white);
    flex-direction: column;
    align-items: stretch;
    padding: 80px 24px 24px;
    box-shadow: var(--sg-shadow-lg);
    transition: right var(--sg-transition);
    z-index: 998;
    overflow-y: auto;
  }
  .sg-header__right.open { right: 0; }

  .sg-nav__list {
    flex-direction: column;
    gap: 0;
  }
  .sg-nav__link { padding: 14px 0; border-radius: 0; }
  .sg-nav__link::after { display: none; }

  .sg-dropdown {
    position: static;
    box-shadow: none;
    border: none;
    padding: 0 0 0 16px;
    max-height: 0;
    overflow: hidden;
    opacity: 1;
    visibility: visible;
    transform: none;
    pointer-events: auto;
    transition: max-height .35s ease;
  }
  .sg-dropdown::before { display: none; }
  .sg-nav__item.dropdown.open > .sg-dropdown {
    max-height: 500px;
  }
  .sg-dropdown li {
    opacity: 1;
    transform: none;
  }

  .sg-cta {
    margin-top: 16px;
    justify-content: center;
  }
}

/* Screen-reader only */
.sr-only {
  position: absolute; width: 1px; height: 1px;
  padding: 0; margin: -1px; overflow: hidden;
  clip: rect(0,0,0,0); border: 0;
}
</style>


<!-- ======================== HTML ======================== -->
<div class="home-main-header">

  <!-- ======== TOPBAR ======== -->
  <div class="sg-topbar">
    <div class="sg-topbar__inner">

      <ul class="sg-topbar__info">
        <li>
          <span class="sg-topbar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="4" width="20" height="16" rx="2"/>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
            </svg>
          </span>
          <a href="mailto:info@sgeducare.in">info@sgeducare.in</a>
        </li>
        <li>
          <span class="sg-topbar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07
                       19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18
                       2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81
                       a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27
                       a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7
                       A2 2 0 0 1 22 16.92Z"/>
            </svg>
          </span>
          <a href="tel:+917715916926">+91 77159 16926</a>
        </li>
        <li>
          <span class="sg-topbar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 1 1 16 0Z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
          </span>
          <a href="{{ url('/campuses') }}">Khadakpada &bull; Prem Auto &bull; Adharwadi, Kalyan</a>
        </li>
      </ul>

      <div class="sg-topbar__social">
        <a href="#" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
        <a href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="2" width="20" height="20" rx="5"/>
            <circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/>
          </svg>
        </a>
        <a href="#" aria-label="YouTube">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.43Z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#fff"/></svg>
        </a>
        <a href="#" aria-label="WhatsApp">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347ZM12.05 21.785h-.01a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374A9.86 9.86 0 0 1 2.17 12.01c0-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884Zm8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
        </a>
      </div>

    </div>
  </div>


  <!-- ======== MAIN HEADER ======== -->
  <header class="sg-header" id="sgHeader">
    <div class="sg-header__inner">

      <!-- Logo -->
      <a href="{{ url('/') }}" class="sg-header__logo">
        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="SG Educare" width="209">
      </a>

      <!-- Right: Nav + CTA + Toggle -->
      <div class="sg-header__right" id="sgNav">

        <nav aria-label="Main navigation">
          <ul class="sg-nav__list">
            <li class="sg-nav__item {{ request()->is('/') ? 'current' : '' }}">
              <a href="{{ url('/') }}" class="sg-nav__link">Home</a>
            </li>
            <li class="sg-nav__item {{ request()->is('about') ? 'current' : '' }}">
              <a href="{{ url('/about') }}" class="sg-nav__link">About Us</a>
            </li>

            {{-- ★ PROGRAMS DROPDOWN ★ --}}
            <li class="sg-nav__item dropdown {{ request()->is('courses*') ? 'current' : '' }}">
              <a href="{{ url('/courses') }}" class="sg-nav__link">
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
        </nav>

        <!-- Mobile Toggle -->
        <button class="sg-mobile-toggle" id="sgToggle" aria-label="Toggle menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>

        <!-- CTA -->
        <a href="{{ url('/contact') }}" class="sg-cta">
          Get Free Counselling
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>

      </div>
    </div>
  </header>

</div>


<!-- ======== Minimal JS (sticky + mobile only) ======== -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  /* Sticky shadow on scroll */
  const header = document.getElementById('sgHeader');
  const onScroll = () => header.classList.toggle('is-sticky', scrollY > 40);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* Mobile toggle */
  const toggle = document.getElementById('sgToggle');
  const nav    = document.getElementById('sgNav');
  toggle?.addEventListener('click', () => {
    const open = nav.classList.toggle('open');
    toggle.classList.toggle('active');
    toggle.setAttribute('aria-expanded', open);
  });

  /* Mobile dropdown accordion */
  document.querySelectorAll('.sg-nav__item.dropdown > .sg-nav__link').forEach(link => {
    link.addEventListener('click', e => {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        link.parentElement.classList.toggle('open');
      }
    });
  });
});
</script>