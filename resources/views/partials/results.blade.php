{{--
  SG Education — Results carousel (Eduhive instructors-three markup)
  Place at: resources/views/partials/results.blade.php
  Used by: home.blade.php, about.blade.php  →  @include('partials.results')

  Student photos: public/assets/images/results/{photo}
  ⚠️ Photo missing → Eduhive stock image shows (DEMO). Real student photos daalo
     before go-live, warna kisi aur ka chehra real student ke naam ke saath dikhega.
--}}
@php
    $results = [
        ['name' => 'Prashik Ahire',     'exam' => 'JEE Advanced', 'score' => 'AIR 711',          'photo' => 'prashik-ahire.jpg'],
        ['name' => 'Kirti Pandey',      'exam' => 'JEE Main',     'score' => '99.21 Percentile', 'photo' => 'kirti-pandey.jpg'],
        ['name' => 'Advait Gotkhinde',  'exam' => 'MHT-CET',      'score' => '99.78 Percentile', 'photo' => 'advait-gotkhinde.jpg'],
        ['name' => 'Niraj Fatkal',      'exam' => 'NEET',         'score' => '627 Marks',        'photo' => 'niraj-fatkal.jpg'],
        ['name' => 'Niraj Fatkal',      'exam' => '12th Board',   'score' => '94% PCB',          'photo' => 'niraj-fatkal.jpg'],
        ['name' => 'Ujwal Ghude',       'exam' => '10th Board',   'score' => '97.60%',           'photo' => 'ujwal-ghude.jpg'],
    ];
@endphp

<section class="instructors-three section-space2" id="results">
    <div class="container">
        <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
            <h6 class="sec-title__tagline">our results</h6>
            <h3 class="sec-title__title">Results That <span class="sec-title__title__text">Reflect</span> <span class="sec-title__title__shape">the Journey</span></h3>
        </div>
        <div class="instructors-three__carousel eduhive-owl__carousel eduhive-owl__carousel--with-shadow eduhive-owl__carousel--basic-nav owl-carousel owl-theme"
            data-owl-options='{
            "items": 1,
            "margin": 10,
            "loop": true,
            "smartSpeed": 700,
            "nav": false,
            "dots": true,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
            "autoplay": true,
            "responsive": {
                "0":    { "items": 1, "nav": true, "dots": false, "margin": 10 },
                "576":  { "items": 2, "margin": 30 },
                "992":  { "items": 3, "margin": 30 },
                "1200": { "items": 4, "margin": 30, "dots": false }
            }
        }'>
            @foreach ($results as $r)
                @php
                    $photo = 'assets/images/results/' . $r['photo'];
                    // DEMO fallback: Eduhive stock photo until the real student photo is added
                    $photo = file_exists(public_path($photo)) ? $photo : 'assets/images/instructors/instructor-3-' . (($loop->index % 4) + 1) . '.jpg';
                @endphp
                <div class="item">
                    <div class="instructor-card-three {{ $loop->odd ? 'instructor-card-three--top-identity' : '' }} wow fadeInUp"
                        data-wow-duration="1500ms" data-wow-delay="{{ ($loop->index % 4) * 100 }}ms">
                        <div class="instructor-card-three__image">
                            <div class="instructor-card-three__image__inner">
                                <img src="{{ asset($photo) }}" alt="{{ $r['name'] }}, {{ $r['exam'] }} {{ $r['score'] }}, SG Education Kalyan">
                            </div>
                        </div>
                        <div class="instructor-card-three__identity">
                            <h3 class="instructor-card-three__name">{{ $r['name'] }}</h3>
                            <p class="instructor-card-three__designation">{{ $r['exam'] }} &bull; {{ $r['score'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-center" style="margin-top: 30px; font-size: 14px;">
            Results shown are student achievements and should not be interpreted as a guarantee of future performance.
        </p>
    </div>
</section>