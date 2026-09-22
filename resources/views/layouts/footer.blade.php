{{--
  SG Educare — Premium Redesigned Footer Partial
  Place at: resources/views/layouts/footer.blade.php
  Pure CSS-driven animations, high-impact typography, and lightweight inline SVGs.
--}}

<style>
/* =========================================================
   SG EDUCARE FOOTER — VARIABLES & GLOBAL THEME
   ========================================================= */
.sg-footer {
  --sg-f-bg:        #0a0f24; /* Ultra-deep premium dark navy */
  --sg-f-surface:   #111836; /* Slightly lighter surface navy */
  --sg-f-accent:    #ff6b35; /* Brand orange */
  --sg-f-accent-lt: rgba(255, 107, 53, 0.15);
  --sg-f-text:      #94a3b8; /* Muted slate */
  --sg-f-light:     #f8fafc; /* Near-white */
  --sg-f-border:    rgba(255, 255, 255, 0.06);
  --sg-f-radius:    14px;
  --sg-f-transition:.3s cubic-bezier(.4, 0, .2, 1);

  background-color: var(--sg-f-bg);
  color: var(--sg-f-text);
  padding: 80px 0 0 0;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
  position: relative;
  overflow: hidden;
  border-top: 1px solid var(--sg-f-border);
}

/* Ambient Radial Glows (Replacing heavy background PNG shapes) */
.sg-footer::before,
.sg-footer::after {
  content: '';
  position: absolute;
  border-radius: 50%;
  filter: blur(120px);
  pointer-events: none;
  opacity: 0.12;
  z-index: 0;
}
.sg-footer::before {
  width: 400px; height: 400px;
  background: var(--sg-f-accent);
  top: -100px; left: -150px;
}
.sg-footer::after {
  width: 500px; height: 500px;
  background: #2563eb;
  bottom: -150px; right: -100px;
}

.sg-footer__container {
  max-width: 1320px;
  margin: 0 auto;
  padding: 0 24px;
  position: relative;
  z-index: 1;
}

/* =========================================================
   FOOTER TOP PANEL (Logo, Newsletter & Socials)
   ========================================================= */
.sg-footer__top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 32px;
  padding-bottom: 56px;
  border-bottom: 1px solid var(--sg-f-border);
}
.sg-footer__brand {
  flex-shrink: 0;
}
.sg-footer__logo-img {
  height: 60px;
  width: auto;
  transition: transform var(--sg-f-transition);
}
.sg-footer__logo-img:hover {
  transform: scale(1.03);
}

/* Newsletter Panel */
.sg-footer__newsletter-wrapper {
  display: flex;
  align-items: center;
  gap: 24px;
  flex-grow: 1;
  max-width: 680px;
}
.sg-footer__newsletter-text {
  max-width: 200px;
  font-size: 0.88rem;
  line-height: 1.5;
  color: var(--sg-f-light);
  font-weight: 500;
}
.sg-footer__newsletter-form {
  display: flex;
  align-items: center;
  background: var(--sg-f-surface);
  border: 1px solid var(--sg-f-border);
  border-radius: 50px;
  padding: 6px 6px 6px 20px;
  flex-grow: 1;
  transition: border-color var(--sg-f-transition), box-shadow var(--sg-f-transition);
}
.sg-footer__newsletter-form:focus-within {
  border-color: var(--sg-f-accent);
  box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.15);
}
.sg-footer__newsletter-form input {
  background: transparent;
  border: none;
  outline: none;
  color: var(--sg-f-light);
  font-size: 0.9rem;
  flex-grow: 1;
  padding-right: 12px;
}
.sg-footer__newsletter-form input::placeholder {
  color: #64748b;
}
.sg-footer__newsletter-btn {
  background: var(--sg-f-accent);
  color: var(--sg-f-light);
  border: none;
  border-radius: 50px;
  padding: 11px 24px;
  font-size: 0.88rem;
  font-weight: 600;
  cursor: pointer;
  transition: background var(--sg-f-transition), transform var(--sg-f-transition);
}
.sg-footer__newsletter-btn:hover {
  background: #ff8253;
  transform: translateY(-1px);
}

/* Social icons on top banner */
.sg-footer__socials {
  display: flex;
  align-items: center;
  gap: 8px;
}
.sg-footer__social-link {
  width: 42px; height: 42px;
  border-radius: 12px;
  background: var(--sg-f-surface);
  border: 1px solid var(--sg-f-border);
  color: var(--sg-f-text);
  display: grid;
  place-items: center;
  text-decoration: none;
  transition: all var(--sg-f-transition);
}
.sg-footer__social-link:hover {
  color: var(--sg-f-light);
  background: var(--sg-f-accent);
  border-color: var(--sg-f-accent);
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(255, 107, 53, 0.25);
}
.sg-footer__social-link svg {
  width: 18px; height: 18px;
}

/* =========================================================
   GRID & WIDGETS
   ========================================================= */
.sg-footer__grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr 1fr 1fr;
  gap: 48px;
  padding: 64px 0;
}
.sg-footer__widget-title {
  color: var(--sg-f-light);
  font-size: 1.05rem;
  font-weight: 700;
  margin: 0 0 24px 0;
  position: relative;
  display: inline-block;
}
.sg-footer__widget-title::after {
  content: '';
  position: absolute;
  bottom: -6px; left: 0;
  width: 32px; height: 2px;
  background: var(--sg-f-accent);
  border-radius: 2px;
}

/* About Widget Info */
.sg-footer__about-desc {
  font-size: 0.9rem;
  line-height: 1.65;
  margin: 0 0 24px 0;
}
.sg-footer__contact-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.sg-footer__contact-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
}
.sg-footer__contact-icon {
  width: 32px; height: 32px;
  background: var(--sg-f-surface);
  border: 1px solid var(--sg-f-border);
  border-radius: 8px;
  display: grid;
  place-items: center;
  flex-shrink: 0;
  margin-top: 2px;
  color: var(--sg-f-accent);
}
.sg-footer__contact-icon svg {
  width: 14px; height: 14px;
}
.sg-footer__contact-link {
  font-size: 0.88rem;
  color: var(--sg-f-text);
  text-decoration: none;
  line-height: 1.5;
  transition: color var(--sg-f-transition);
}
.sg-footer__contact-link:hover {
  color: var(--sg-f-light);
}

/* Links Widget */
.sg-footer__links-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.sg-footer__link-item a {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: var(--sg-f-text);
  font-size: 0.9rem;
  text-decoration: none;
  transition: all var(--sg-f-transition);
}
.sg-footer__link-arrow {
  width: 14px; height: 14px;
  stroke: var(--sg-f-text);
  transition: transform var(--sg-f-transition), stroke var(--sg-f-transition);
}
.sg-footer__link-item a:hover {
  color: var(--sg-f-light);
  transform: translateX(4px);
}
.sg-footer__link-item a:hover .sg-footer__link-arrow {
  stroke: var(--sg-f-accent);
  transform: translateX(2px);
}

/* Gallery Widget */
.sg-footer__gallery-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
}
.sg-footer__gallery-item {
  position: relative;
  aspect-ratio: 1;
  border-radius: 8px;
  overflow: hidden;
  background: var(--sg-f-surface);
  border: 1px solid var(--sg-f-border);
  display: block;
}
.sg-footer__gallery-item img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}
.sg-footer__gallery-overlay {
  position: absolute;
  inset: 0;
  background: rgba(10, 15, 36, 0.75);
  display: grid;
  place-items: center;
  opacity: 0;
  transition: opacity var(--sg-f-transition);
}
.sg-footer__gallery-overlay svg {
  width: 20px; height: 20px;
  color: var(--sg-f-light);
  transform: scale(0.6);
  transition: transform 0.35s cubic-bezier(.34, 1.56, .64, 1);
}
.sg-footer__gallery-item:hover img {
  transform: scale(1.15);
}
.sg-footer__gallery-item:hover .sg-footer__gallery-overlay {
  opacity: 1;
}
.sg-footer__gallery-item:hover .sg-footer__gallery-overlay svg {
  transform: scale(1);
}

/* =========================================================
   FOOTER BOTTOM (Copyright)
   ========================================================= */
.sg-footer__bottom {
  border-top: 1px solid var(--sg-f-border);
  padding: 24px 0;
  margin-top: 16px;
}
.sg-footer__bottom-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 0.8rem;
  color: #64748b;
}
.sg-footer__credit-link {
  color: var(--sg-f-text);
  text-decoration: none;
  font-weight: 500;
  transition: color var(--sg-f-transition);
}
.sg-footer__credit-link:hover {
  color: var(--sg-f-light);
}

/* =========================================================
   RESPONSIVE DESIGN (BREAKPOINTS)
   ========================================================= */
@media (max-width: 1200px) {
  .sg-footer__grid {
    grid-template-columns: 1.2fr 0.8fr 1fr;
    gap: 32px;
  }
  .sg-footer__gallery-grid {
    grid-template-columns: repeat(6, 1fr);
  }
  /* Push Gallery Full Width when 3 Cols */
  .sg-footer__gallery-widget {
    grid-column: span 3;
  }
}

@media (max-width: 991px) {
  .sg-footer__top {
    flex-direction: column;
    align-items: flex-start;
    gap: 24px;
  }
  .sg-footer__newsletter-wrapper {
    width: 100%;
    max-width: 100%;
  }
}

@media (max-width: 768px) {
  .sg-footer {
    padding-top: 56px;
  }
  .sg-footer__newsletter-wrapper {
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
  }
  .sg-footer__grid {
    grid-template-columns: 1fr;
    gap: 36px;
    padding: 48px 0;
  }
  .sg-footer__gallery-widget {
    grid-column: span 1;
  }
  .sg-footer__gallery-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  .sg-footer__bottom-inner {
    flex-direction: column;
    gap: 12px;
    text-align: center;
  }
}
</style>


<!-- ======================== HTML ======================== -->
<footer class="sg-footer">
  <div class="sg-footer__container">

    <!-- ======== TOP BAR (Logo, Newsletter, Socials) ======== -->
    <div class="sg-footer__top">
      
      <!-- Brand Logo -->
      <div class="sg-footer__brand">
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/images/logo-dark.png') }}" class="sg-footer__logo-img" alt="SG Educare">
        </a>
      </div>

      <!-- Action-driven Newsletter Subscribe -->
      <div class="sg-footer__newsletter-wrapper">
        <span class="sg-footer__newsletter-text">Subscribe to our newsletter for crucial education updates.</span>
        <form action="{{ url('/newsletter') }}" method="post" class="sg-footer__newsletter-form">
          @csrf
          <input type="email" name="email" placeholder="Enter your email address" required aria-label="Email address">
          <button type="submit" class="sg-footer__newsletter-btn">Subscribe</button>
        </form>
      </div>

      <!-- Rounded Squircle Social Channels -->
      <div class="sg-footer__socials">
        <a href="#" class="sg-footer__social-link" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
        <a href="#" class="sg-footer__social-link" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" class="sg-footer__social-link" aria-label="YouTube">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.43Z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#fff"/></svg>
        </a>
        <a href="#" class="sg-footer__social-link" aria-label="WhatsApp">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347ZM12.05 21.785h-.01a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374A9.86 9.86 0 0 1 2.17 12.01c0-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884Zm8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
        </a>
      </div>

    </div>

    <!-- ======== GRID COLUMNS ======== -->
    <div class="sg-footer__grid">

      <!-- Column 1: Brand details & Contact points -->
      <div class="sg-footer__widget">
        <h3 class="sg-footer__widget-title">About SG Educare</h3>
        <p class="sg-footer__about-desc">
          Kalyan's results-focused coaching institute for JEE, NEET, MHT-CET, NDA and Boards (8–10). Small batches, weekly testing and personal mentoring across three Kalyan campuses.
        </p>
        <ul class="sg-footer__contact-list">
          <li class="sg-footer__contact-item">
            <span class="sg-footer__contact-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            </span>
            <a href="{{ url('/campuses') }}" class="sg-footer__contact-link">Khadakpada &bull; Prem Auto Compound &bull; Adharwadi, Kalyan</a>
          </li>
          <li class="sg-footer__contact-item">
            <span class="sg-footer__contact-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </span>
            <a href="mailto:info@sgeducare.in" class="sg-footer__contact-link">info@sgeducare.in</a>
          </li>
          <li class="sg-footer__contact-item">
            <span class="sg-footer__contact-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>
            </span>
            <a href="tel:+917715916926" class="sg-footer__contact-link">+91 77159 16926</a>
          </li>
        </ul>
      </div>

      <!-- Column 2: Quick navigation -->
      <div class="sg-footer__widget">
        <h3 class="sg-footer__widget-title">Quick Links</h3>
        <ul class="sg-footer__links-list">
          <li class="sg-footer__link-item">
            <a href="{{ url('/about') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              About Us
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/courses') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              Our Courses
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/campuses') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              Campuses
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/results') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              Results &amp; Toppers
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/contact') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              Contact Us
            </a>
          </li>
        </ul>
      </div>

      <!-- Column 3: Target Course streams -->
      <div class="sg-footer__widget">
        <h3 class="sg-footer__widget-title">Our Courses</h3>
        <ul class="sg-footer__links-list">
          <li class="sg-footer__link-item">
            <a href="{{ url('/courses/jee') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              JEE (Main + Advanced)
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/courses/neet') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              NEET-UG
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/courses/mht-cet') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              MHT-CET
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/courses/foundation') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              Foundation / Launchpad
            </a>
          </li>
          <li class="sg-footer__link-item">
            <a href="{{ url('/courses/nda') }}">
              <svg class="sg-footer__link-arrow" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
              NDA
            </a>
          </li>
        </ul>
      </div>

      <!-- Column 4: Highly interactive zoom campus gallery -->
      <div class="sg-footer__widget sg-footer__gallery-widget">
        <h3 class="sg-footer__widget-title">Campus Gallery</h3>
        <div class="sg-footer__gallery-grid">
          @for ($i = 1; $i <= 6; $i++)
            <a href="{{ url('/gallery') }}" class="sg-footer__gallery-item" aria-label="View Campus Gallery Image {{ $i }}">
              <img src="{{ asset('assets/images/gallery/footer-widget-gallery-'.$i.'.jpg') }}" alt="SG Campus View {{ $i }}" loading="lazy">
              <span class="sg-footer__gallery-overlay">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              </span>
            </a>
          @endfor
        </div>
      </div>

    </div>

    <!-- ======== FOOTER BOTTOM (Copyright bar) ======== -->
    <div class="sg-footer__bottom">
      <div class="sg-footer__bottom-inner">
        <p class="sg-footer__copyright">
          &copy; {{ date('Y') }} <strong>SG Educare</strong>. All rights reserved.
        </p>
        <p class="sg-footer__designer">
          Website by <a href="https://nexzehn.com" class="sg-footer__credit-link" target="_blank" rel="noopener">Nexzehn</a>
        </p>
      </div>
    </div>

  </div>
</footer>