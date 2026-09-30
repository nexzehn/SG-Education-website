{{--
============================================================================
  SG Education — Footer
  resources/views/layouts/footer.blade.php   (styles: public/assets/css/sg-custom.css §21)

  Contact details, WhatsApp and social links come from config/sg.php.
  Gallery uses the client photos in public/assets/images/sg/ (missing files are skipped).
============================================================================
--}}
@php
    $phones = config('sg.phones', ['8591932112']);
    $fmt = fn($n) => '+91 ' . substr($n, 0, 5) . ' ' . substr($n, 5);
    $wa = 'https://wa.me/91' . config('sg.whatsapp', $phones[0]) . '?text=' . rawurlencode('Hi SG Education, I would like to know about courses and batches.');
    $mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode('SG Education Whitefield Flower Valley Khadakpada Kalyan');
    $social = array_filter(config('sg.social', []));
    $socialIcons = ['facebook' => 'fab fa-facebook-f', 'instagram' => 'fab fa-instagram', 'youtube' => 'fab fa-youtube'];

    $quickLinks = [
        'About Us' => '/about',
        'Our Methodology' => '/our-methodology',
        'Results' => '/results',
        'Blog' => '/blog',
        'Contact Us' => '/contact',
    ];
    $courseLinks = [
        'JEE (Main + Advanced)' => '/courses/jee',
        'NEET' => '/courses/neet',
        'MHT-CET' => '/courses/mht-cet',
        '11th–12th Science' => '/courses/science',
        'All Courses' => '/courses',
    ];

    $galleryDir = config('sg.img_dir', 'assets/images/sg');
    $gallery = collect([
        'classroom-senior.webp' => 'Class 11–12 students',
        'classroom-junior.webp' => 'Class 9–10 students',
        'library-books.webp' => 'Study library',
        'counselling-cabin.webp' => 'Counselling cabin',
        'fp-student-self-study.webp' => 'Student practising',
        'fp-exam-hall.webp' => 'Students in class',
    ])->filter(fn($alt, $file) => file_exists(public_path("{$galleryDir}/{$file}")));
@endphp

<footer class="sg-footer">
    <div class="container">

        {{-- ================= Top band ================= --}}
        <div class="sg-footer__top">
            <a href="{{ url('/') }}" class="sg-footer__logo" aria-label="SG Education home">
                {{-- Light logo for the dark background; replace with SG's white/light logo file --}}
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="SG Education" width="200" height="56">
            </a>

            <div class="sg-footer__pitch">
                <p>Not sure which program fits? Talk to our academic team.</p>
                <a href="{{ url('/contact') }}#enquiry" class="sg-footer__btn">
                    Book free counselling <span><i class="icon-right-arrow" aria-hidden="true"></i></span>
                </a>
            </div>

            <div class="sg-footer__socials">
                @foreach ($social as $name => $link)
                    <a href="{{ $link }}" class="sg-footer__social" target="_blank" rel="noopener"
                        aria-label="SG Education on {{ ucfirst($name) }}">
                        <i class="{{ $socialIcons[$name] ?? 'fas fa-link' }}" aria-hidden="true"></i>
                    </a>
                @endforeach
                <a href="{{ $wa }}" class="sg-footer__social sg-footer__social--wa" target="_blank" rel="noopener"
                    aria-label="Chat with SG Education on WhatsApp">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        {{-- ================= Columns ================= --}}
        <div class="sg-footer__grid">

            <div class="sg-footer__col sg-footer__col--about">
                <h2 class="sg-footer__title">About SG Education</h2>
                <p class="sg-footer__about">Coaching institute in Khadakpada, Kalyan for Grades 8–12, JEE, NEET and
                    MHT-CET. Small batches, concept-first teaching, regular tests and performance tracking.</p>
                <ul class="sg-footer__contact">
                    <li>
                        <span class="sg-footer__contact-icon"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
                        <a href="{{ $mapUrl }}" target="_blank" rel="noopener">{{ config('sg.address') }}</a>
                    </li>
                    <li>
                        <span class="sg-footer__contact-icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></span>
                        <span>
                            @foreach ($phones as $p)
                                <a href="tel:+91{{ $p }}">{{ $fmt($p) }}</a>@if (!$loop->last)<br>@endif
                            @endforeach
                        </span>
                    </li>
                    <li>
                        <span class="sg-footer__contact-icon"><i class="fas fa-envelope" aria-hidden="true"></i></span>
                        <a href="mailto:{{ config('sg.email') }}">{{ config('sg.email') }}</a>
                    </li>
                </ul>
            </div>

            <div class="sg-footer__col">
                <h2 class="sg-footer__title">Quick Links</h2>
                <ul class="sg-footer__links">
                    @foreach ($quickLinks as $label => $url)
                        <li><a href="{{ url($url) }}"><i class="fas fa-chevron-right" aria-hidden="true"></i>{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="sg-footer__col">
                <h2 class="sg-footer__title">Our Courses</h2>
                <ul class="sg-footer__links">
                    @foreach ($courseLinks as $label => $url)
                        <li><a href="{{ url($url) }}"><i class="fas fa-chevron-right" aria-hidden="true"></i>{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            @if ($gallery->isNotEmpty())
                <div class="sg-footer__col sg-footer__col--gallery">
                    <h2 class="sg-footer__title">Inside SG Education</h2>
                    <ul class="sg-footer__gallery">
                        @foreach ($gallery as $file => $alt)
                            <li><img src="{{ asset("{$galleryDir}/{$file}") }}" alt="{{ $alt }}" loading="lazy" width="120" height="120"></li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>

        {{-- ================= Bottom bar ================= --}}
        <div class="sg-footer__bottom">
            <p>&copy; {{ date('Y') }} <strong>SG Education</strong>. All rights reserved.</p>
            <p>Website by <a href="https://nexzehn.com" target="_blank" rel="noopener">Nexzehn</a></p>
        </div>

    </div>
</footer>