<?php

namespace App\Http\Controllers;

class ProgramController extends Controller
{
    /** Fallback when a program's photo is missing (SG's own classroom). */
    private const FALLBACK_IMAGE = 'assets/images/sg/classroom-senior.webp';

    /** Programs only — keys starting with "_" (_mentor, _common_features) are shared data. */
    private function programs(): array
    {
        return array_filter(
            config('programs', []),
            fn($value, $key) => is_array($value) && !str_starts_with((string) $key, '_'),
            ARRAY_FILTER_USE_BOTH
        );
    }

    /** /courses — All Programs listing. */
    public function index()
    {
        $programs = $this->programs();

        // Keep your existing listing view; if it's missing, don't throw a 500.
        if (!view()->exists('courses.index')) {
            return redirect()->to(url('/') . '#courses');
        }

        return view('courses.index', [
            'programs' => $programs,
            'images'   => array_map(fn($p) => $this->imageFor($p), $programs),
        ]);
    }

    /** Config image if the file exists, else SG's own classroom photo. */
    private function imageFor(array $program): string
    {
        return !empty($program['image']) && file_exists(public_path($program['image']))
            ? $program['image']
            : self::FALLBACK_IMAGE;
    }

    public function show(string $slug)
    {
        $programs = $this->programs();
        abort_unless(isset($programs[$slug]), 404);

        $program = $programs[$slug];

        $image = $this->imageFor($program);

        return view('courses.show', [
            'slug'     => $slug,
            'program'  => $program,
            'image'    => $image,
            'features' => config('programs._common_features', []),
            'mentor'   => config('programs._mentor'),
            'others'   => array_diff_key($programs, [$slug => true]),
        ]);
    }
}