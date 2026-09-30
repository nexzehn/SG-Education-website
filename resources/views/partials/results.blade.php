{{--
  SG Education — Results carousel (Home + About)
  resources/views/partials/results.blade.php  →  @include('partials.results')
  Styles: public/assets/css/sg-custom.css §23 (same card style as the Results page)

  One card per student. A student with two results gets both on one card
  ('also'), so nobody repeats in the carousel.
  Photos: config/sg.php → 'student_photos' (same list as the Results page).
  Names must match that list exactly. No photo → initials.
--}}
@php
    $results = [
        ['name' => 'Prashik Ahire', 'exam' => 'JEE Advanced', 'prefix' => 'AIR', 'value' => '711'],
        ['name' => 'Kirti Pande', 'exam' => 'JEE Main', 'value' => '99.21', 'suffix' => '%ile', 'also' => 'MHT-CET 99.23%ile'],
        ['name' => 'Advait Gotkhinde', 'exam' => 'MHT-CET', 'value' => '99.78', 'suffix' => '%ile'],
        ['name' => 'Dhiraj Patil', 'exam' => 'NEET', 'value' => '627', 'suffix' => '/720', 'also' => '12th Board: PCB 94%'],
        ['name' => 'Aryan Shejwal', 'exam' => 'JEE Advanced', 'prefix' => 'AIR', 'value' => '1115', 'also' => 'JEE Main 98.28%ile'],
        ['name' => 'Ujwal Ghude', 'exam' => '10th Board', 'value' => '97.60', 'suffix' => '%'],
    ];

    $photoMap = config('sg.student_photos', []);
    $rcPhoto = function (string $name) use ($photoMap) {
        $file = $photoMap[$name] ?? null;
        $path = $file ? 'assets/images/results/' . $file : null;
        return $path && file_exists(public_path($path)) ? asset($path) : null;
    };
    $rcInitials = fn($name) => collect(preg_split('/\s+/', trim($name)))
        ->reject(fn($w) => str_ends_with($w, '.'))
        ->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))->take(2)->implode('');

    $rcOwl = [
        'items' => 1, 'margin' => 26, 'loop' => count($results) > 4, 'smartSpeed' => 700,
        'autoplay' => true, 'autoplayTimeout' => 4000, 'autoplayHoverPause' => true,
        'nav' => false, 'dots' => true,
        'responsive' => ['0' => ['items' => 1], '576' => ['items' => 2], '992' => ['items' => 3], '1200' => ['items' => 4]],
    ];
@endphp

<section class="sg-rc" id="results">
    <div class="container">
        <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
            <h6 class="sec-title__tagline">our results</h6>
            <h3 class="sec-title__title">Results That <span class="sec-title__title__text">Reflect</span> <span
                    class="sec-title__title__shape">the Journey</span></h3>
        </div>

        <div class="eduhive-owl__carousel owl-carousel owl-theme" data-owl-options="{{ json_encode($rcOwl) }}">
            @foreach ($results as $r)
                @php $photo = $rcPhoto($r['name']); @endphp
                <div class="item">
                    <article class="sg-rc__card">
                        @if ($photo)
                            <img src="{{ $photo }}" alt="{{ $r['name'] }}, {{ $r['exam'] }}, SG Education Kalyan"
                                width="600" height="600" loading="lazy" decoding="async">
                        @else
                            <span class="sg-rc__initials" aria-hidden="true">{{ $rcInitials($r['name']) }}</span>
                        @endif
                        <span class="sg-rc__exam"><i class="fas fa-trophy" aria-hidden="true"></i>{{ $r['exam'] }}</span>
                        <div class="sg-rc__body">
                            <div class="sg-rc__score">
                                @if (!empty($r['prefix']))<span class="sg-rc__affix">{{ $r['prefix'] }}</span>@endif
                                <span class="sg-rc__num">{{ $r['value'] }}</span>
                                @if (!empty($r['suffix']))<span class="sg-rc__affix">{{ $r['suffix'] }}</span>@endif
                            </div>
                            <h3 class="sg-rc__name">{{ $r['name'] }}</h3>
                            <p class="sg-rc__also">
                                @if (!empty($r['also']))
                                    <i class="fas fa-plus" aria-hidden="true"></i>{{ $r['also'] }}
                                @else
                                    SG Education, Kalyan
                                @endif
                            </p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="sg-rc__foot wow fadeInUp" data-wow-duration="1500ms">
            <a href="{{ url('/results') }}" class="eduhive-btn eduhive-btn--border">
                <span>View All Results</span>
                <span class="eduhive-btn__icon"><span class="eduhive-btn__icon__inner"><i
                            class="icon-right-arrow"></i></span></span>
            </a>
            <p>Results shown are student achievements and should not be interpreted as a guarantee of future performance.</p>
        </div>
    </div>
</section>