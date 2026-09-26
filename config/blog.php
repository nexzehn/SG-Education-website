<?php

/*
|--------------------------------------------------------------------------
| Blog settings
|--------------------------------------------------------------------------
| driver = 'file'      → posts below + HTML in resources/content/blog/{slug}.html
| driver = 'database'  → table blog_posts (App\Models\BlogPost)
|
| Switching to the database later (no view/controller changes needed):
|   1. .env → BLOG_DRIVER=database
|   2. php artisan migrate
|   3. php artisan db:seed --class=BlogPostSeeder   (imports the posts below)
*/

return [

    'driver' => env('BLOG_DRIVER', 'file'),

    // Shown when a post has no author set
    'author' => 'SG Education Academic Team',

    // Posts per page on /blog
    'per_page' => 12,

    // Where post bodies live (file driver + seeder)
    'content_path' => resource_path('content/blog'),

    /*
    |--------------------------------------------------------------------------
    | Posts (file driver)
    |--------------------------------------------------------------------------
    | Key = slug → /blog/{slug}, body = resources/content/blog/{slug}.html
    | Only title, category and published_at are required. Everything else
    | (excerpt, description, read time) is auto-filled if left out.
    | 'status' => 'draft' hides a post; a future published_at schedules it.
    */
    'posts' => [

        'how-to-start-jee-preparation-in-class-11' => [
            'title' => 'How to Start JEE Preparation in Class 11: Complete Guide for JEE Main & Advanced',
            'meta_title' => 'How to Start JEE Preparation in Class 11 | JEE Main & Advanced Guide',
            'description' => 'A practical guide to starting JEE preparation in Class 11: how to study Physics, Chemistry and Maths, when to start PYQs, testing, error books and a two-year roadmap.',
            'excerpt' => 'Class 11 gives you time to build properly. How to study PCM, when to start PYQs, how to test yourself and how to plan the full two-year JEE journey.',
            'category' => 'JEE',
            'published_at' => '2026-09-26',  // ⚠️ set the real publish date
            'cta' => [
                'eyebrow' => 'Thinking about JEE preparation in Kalyan?',
                'title' => 'SG Mission IIT 2029',
                'text' => 'A structured JEE Main & Advanced program built around concepts, problem solving, PYQs, testing, analysis and revision.',
                'button' => 'Book academic counselling',
                'url' => '/contact?course=jee#enquiry',
            ],
            'faqs' => [
                ['q' => 'Can I start JEE preparation in Class 11?',
                 'a' => 'Yes. Class 11 is an important stage to begin systematic JEE preparation because it provides time to build concepts, practise extensively and revise before the final examination phase.'],
                ['q' => 'How many hours should a Class 11 student study for JEE?',
                 'a' => 'There is no universal number. The right amount depends on school, coaching, homework and the student’s current level. Focus on consistent, distraction-free study rather than chasing an arbitrary number of hours.'],
                ['q' => 'Should I prepare for JEE Main and Advanced together?',
                 'a' => 'Build strong fundamentals first and progressively increase the difficulty from basic questions to JEE Main and then JEE Advanced-level problems.'],
                ['q' => 'When should I start solving JEE PYQs?',
                 'a' => 'Start chapter-wise PYQ practice after learning the relevant concepts. You don’t need to wait until Class 12.'],
                ['q' => 'Is coaching necessary for JEE preparation?',
                 'a' => 'Not necessarily. Some students can prepare independently. Coaching can be useful when a student needs structured planning, teaching, regular testing, doubt support and performance tracking.'],
                ['q' => 'What is the biggest mistake in Class 11 JEE preparation?',
                 'a' => 'Inconsistency. Students often begin aggressively, fall behind, accumulate backlogs and then spend the rest of the year trying to recover. Avoid backlog before it becomes a strategy.'],
            ],
        ],

        'how-to-score-95-in-class-10' => [
            'title' => 'How to Score 95+ in Class 10: A Complete Study Plan for Board Exams',
            'meta_title' => 'How to Score 95+ in Class 10 | Board Exam Study Plan',
            'description' => 'A practical Class 10 study plan for 95+: subject-wise strategy, the 24-hour revision rule, testing, mistake analysis, board answer writing and a final checklist.',
            'excerpt' => 'Scoring 95+ is not about 12-hour days. It is a clear plan, consistent practice, regular testing and disciplined revision, all year long.',
            'category' => 'Boards',
            'published_at' => '2026-09-26',  // ⚠️ set the real publish date
            'cta' => [
                'eyebrow' => 'Preparing for Class 10 Boards in Kalyan?',
                'title' => 'Your board year deserves a plan.',
                'text' => 'Concept building, regular practice, testing, revision, board strategy and performance analysis in one structured program.',
                'button' => 'Explore the 9th–10th program',
                'url' => '/courses/boards',
            ],
            'faqs' => [],
        ],

    ],

];