<?php

namespace App\Http\Controllers;

class ProgramController extends Controller
{
    /** All real programs (skips keys starting with "_") */
    private function programs(): array
    {
        return array_filter(
            config('programs', []),
            fn ($key) => ! str_starts_with($key, '_'),
            ARRAY_FILTER_USE_KEY
        );
    }

    /** /courses — All Programs */
    public function index()
    {
        return view('courses.index', [
            'programs' => $this->programs(),
        ]);
    }

    /** /courses/{slug} — single program page (jee, neet, mht-cet, ...) */
    public function show(string $slug)
    {
        $programs = $this->programs();
        abort_unless(isset($programs[$slug]), 404);

        $program = $programs[$slug];

        // Program image: public/assets/images/programs/{slug}.jpg, else Eduhive default
        $imagePath = 'assets/images/programs/' . $slug . '.jpg';
        $image = file_exists(public_path($imagePath))
            ? $imagePath
            : 'assets/images/courses/course-d-1-9.jpg';

        // Curriculum: config value, or subjects with no units
        $curriculum = $program['curriculum']
            ?? array_fill_keys($program['subjects'], []);

        return view('courses.show', [
            'slug'       => $slug,
            'program'    => $program,
            'image'      => $image,
            'curriculum' => $curriculum,
            'features'   => config('programs._common_features', []),
            'mentor'     => config('programs._mentor'),
            'others'     => array_diff_key($programs, [$slug => true]),
        ]);
    }
}