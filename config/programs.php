<?php

/*
|--------------------------------------------------------------------------
| SG Educare — Programs data
|--------------------------------------------------------------------------
| Place at: config/programs.php
| Key = URL slug  →  /courses/{slug}
|
| Naya program: ek entry copy karke bharo, page auto ban jayega.
| Edit ke baad:  php artisan config:clear
|
| ⚠️  DEMO DATA: Har "// DEMO" wali value placeholder hai (fees, duration,
|     batches, video, mentor bio, foundation/boards curriculum).
|     Go-live se pehle file me "DEMO" search karke SG Educare ke real data
|     se replace karo. Galat fees/timing live jaana parents ke saath
|     trust issue banega.
|
| Optional keys:
|   duration, batches, fees   → sidebar
|   video                     → YouTube URL, image pe play button dikhega (null = hide)
|   curriculum                → ['Subject' => ['Unit', 'Unit', ...]]  (Curriculum tab)
| Image: public/assets/images/programs/{slug}.jpg  (nahi mili to default image)
*/

$common = [
    'Small, capped batches so every student gets attention',
    'Weekly, monthly and quarterly tests on the exam pattern',
    'Dedicated doubt-solving sessions outside lecture hours',
    'Parent-teacher meets and progress updates on WhatsApp',
];

$physics   = ['Mechanics', 'Thermodynamics', 'Electrostatics and Current Electricity', 'Magnetism and Electromagnetic Induction', 'Optics', 'Modern Physics'];
$chemistry = ['Physical Chemistry', 'Organic Chemistry', 'Inorganic Chemistry'];
$maths     = ['Algebra', 'Trigonometry', 'Coordinate Geometry', 'Calculus', 'Vectors and 3D Geometry', 'Probability and Statistics'];
$biology   = ['Diversity of Living Organisms', 'Cell Structure and Function', 'Plant Physiology', 'Human Physiology', 'Reproduction', 'Genetics and Evolution', 'Biology and Human Welfare', 'Biotechnology', 'Ecology and Environment'];

// DEMO: placeholder video (Eduhive template demo). Replace with SG Educare's own YouTube video, or set to null to hide the play button.
$demoVideo = 'https://www.youtube.com/watch?v=h9MbznbxlLc';

return [

    'jee' => [
        'name'       => 'JEE (Main + Advanced)',
        'short'      => 'JEE',
        'tagline'    => 'Engineering entrance preparation for JEE Main and JEE Advanced.',
        'for'        => 'Class 11 & 12',
        'exam'       => 'JEE Main, JEE Advanced',
        'subjects'   => ['Physics', 'Chemistry', 'Mathematics'],
        'duration'   => '2 Years (Class 11 + 12)',            // DEMO
        'batches'    => 'Mon–Sat, 4:00 PM – 7:00 PM',          // DEMO
        'fees'       => '₹85,000 / year',                      // DEMO
        'mode'       => 'Classroom, Kalyan',
        'video'      => $demoVideo,                            // DEMO
        'overview'   => [
            'Our JEE program builds strong concepts in Physics, Chemistry and Mathematics alongside the Class 11 and 12 board syllabus, then trains students to apply them at JEE speed and difficulty.',
            'Students start with fundamentals, move to advanced problem-solving, and practise with full-length mock tests so exam day feels familiar.',
        ],
        'curriculum' => ['Physics' => $physics, 'Chemistry' => $chemistry, 'Mathematics' => $maths],
        'faqs' => [
            ['q' => 'Does the JEE program also cover the board syllabus?', 'a' => 'Yes. Teaching follows the Class 11 and 12 syllabus, so board preparation happens alongside JEE preparation.'],
            ['q' => 'Is there a separate batch for JEE Advanced?',         'a' => 'Ask us. Batch structure depends on the current academic year.'],
        ],
        'meta_title' => 'JEE Coaching in Kalyan | JEE Main + Advanced Classes | SG Educare',
        'meta_desc'  => 'JEE Main and Advanced coaching in Kalyan for Class 11 & 12. Small batches, weekly tests, doubt sessions and parent updates at SG Educare.',
    ],

    'neet' => [
        'name'       => 'NEET-UG',
        'short'      => 'NEET',
        'tagline'    => 'Medical entrance preparation for NEET-UG.',
        'for'        => 'Class 11 & 12',
        'exam'       => 'NEET-UG',
        'subjects'   => ['Physics', 'Chemistry', 'Biology'],
        'duration'   => '2 Years (Class 11 + 12)',            // DEMO
        'batches'    => 'Mon–Sat, 4:00 PM – 7:00 PM',          // DEMO
        'fees'       => '₹80,000 / year',                      // DEMO
        'mode'       => 'Classroom, Kalyan',
        'video'      => $demoVideo,                            // DEMO
        'overview'   => [
            'NEET rewards accuracy across a large NCERT-based syllabus. Our program covers Physics, Chemistry and Biology in depth, with heavy practice on NEET-style multiple-choice questions.',
            'Regular tests track speed and accuracy, and each test is followed by analysis so students know exactly which chapters need more work.',
        ],
        'curriculum' => ['Physics' => $physics, 'Chemistry' => $chemistry, 'Biology (Botany + Zoology)' => $biology],
        'faqs' => [
            ['q' => 'Is the teaching NCERT-based?',        'a' => 'Yes. NCERT is the base, with additional practice material for NEET-level questions.'],
            ['q' => 'Can Class 12 students join mid-way?', 'a' => 'Ask us. We will check the current batch and suggest the right option.'],
        ],
        'meta_title' => 'NEET Coaching in Kalyan | NEET-UG Classes | SG Educare',
        'meta_desc'  => 'NEET-UG coaching in Kalyan for Class 11 & 12. NCERT-based teaching, NEET-pattern tests, doubt sessions and parent updates at SG Educare.',
    ],

    'mht-cet' => [
        'name'       => 'MHT-CET (Engineering & Pharmacy)',
        'short'      => 'MHT-CET',
        'tagline'    => 'State entrance preparation for engineering and pharmacy admissions in Maharashtra.',
        'for'        => 'Class 11 & 12',
        'exam'       => 'MHT-CET (PCM / PCB)',
        'subjects'   => ['Physics', 'Chemistry', 'Mathematics', 'Biology'],
        'duration'   => '1 Year (Class 12)',                   // DEMO
        'batches'    => 'Mon–Sat, 5:00 PM – 7:30 PM',          // DEMO
        'fees'       => '₹45,000 / year',                      // DEMO
        'mode'       => 'Classroom, Kalyan',
        'video'      => $demoVideo,                            // DEMO
        'overview'   => [
            'MHT-CET is about speed and coverage of the Maharashtra State Board syllabus. Our program focuses on quick, accurate solving with plenty of timed practice.',
            'Students choose the PCM group for engineering or the PCB group, and practise with CET-pattern mock tests throughout the year.',
        ],
        'curriculum' => ['Physics' => $physics, 'Chemistry' => $chemistry, 'Mathematics (PCM)' => $maths, 'Biology (PCB)' => $biology],
        'faqs' => [
            ['q' => 'Can I prepare for MHT-CET and JEE together?', 'a' => 'Yes, the syllabus overlaps a lot. Talk to us and we will suggest the right combination.'],
            ['q' => 'Which group should I choose, PCM or PCB?',    'a' => 'PCM is for engineering. For pharmacy, check the current CET cell rules or ask us during counselling.'],
        ],
        'meta_title' => 'MHT-CET Classes in Kalyan | Engineering & Pharmacy | SG Educare',
        'meta_desc'  => 'MHT-CET coaching in Kalyan for PCM and PCB groups. Timed practice, CET-pattern mock tests and personal mentoring at SG Educare.',
    ],

    'foundation' => [
        'name'       => 'Foundation / Launchpad',
        'short'      => 'Foundation',
        'tagline'    => 'Early preparation that builds the base for JEE, NEET and Olympiads.',
        'for'        => 'Class 8 to 10',
        'exam'       => 'School + competitive foundation',
        'subjects'   => ['Mathematics', 'Science', 'Mental Ability'],
        'duration'   => '1 Year (per class)',                  // DEMO
        'batches'    => 'Mon, Wed, Fri, 5:00 PM – 7:00 PM',    // DEMO
        'fees'       => '₹35,000 / year',                      // DEMO
        'mode'       => 'Classroom, Kalyan',
        'video'      => $demoVideo,                            // DEMO
        'overview'   => [
            'The Foundation program strengthens Maths and Science concepts early, so students enter Class 11 ready for JEE or NEET preparation instead of catching up.',
            'It runs alongside school, supports board exam scores, and introduces competitive-style problem-solving step by step.',
        ],
        'curriculum' => [                                      // DEMO: replace with SG Educare's actual chapter plan
            'Mathematics'    => ['Number Systems', 'Algebraic Expressions and Identities', 'Linear Equations', 'Geometry and Mensuration', 'Data Handling and Probability'],
            'Science'        => ['Motion and Force', 'Light and Sound', 'Atoms, Molecules and Chemical Reactions', 'Cells and Life Processes', 'Electricity and Magnetism'],
            'Mental Ability' => ['Series and Patterns', 'Coding-Decoding', 'Logical Reasoning', 'Olympiad-style Problem Solving'],
        ],
        'faqs' => [
            ['q' => 'Will this affect my child\'s school studies?', 'a' => 'No. The program follows the school syllabus and goes deeper, so it supports school performance.'],
        ],
        'meta_title' => 'Foundation Classes in Kalyan | Class 8–10 | SG Educare',
        'meta_desc'  => 'Foundation coaching for Class 8–10 in Kalyan. Strong Maths and Science base for JEE, NEET and Olympiads, alongside school, at SG Educare.',
    ],

    'boards' => [
        'name'       => 'Boards 8–10 (SSC / CBSE / ICSE)',
        'short'      => 'Boards',
        'tagline'    => 'School and board exam coaching for Classes 8, 9 and 10.',
        'for'        => 'Class 8 to 10',
        'exam'       => 'SSC, CBSE, ICSE',
        'subjects'   => ['Mathematics', 'Science'],   // TODO: add other subjects if taught
        'duration'   => '1 Year (per class)',                  // DEMO
        'batches'    => 'Mon–Sat, 4:00 PM – 6:00 PM',          // DEMO
        'fees'       => '₹30,000 / year',                      // DEMO
        'mode'       => 'Classroom, Kalyan',
        'video'      => $demoVideo,                            // DEMO
        'overview'   => [
            'Board-wise batches for SSC, CBSE and ICSE students, taught to each board\'s syllabus and paper pattern.',
            'Chapter tests, board-pattern prelims and answer-writing practice help students score well in school and in the Class 10 board exam.',
        ],
        'curriculum' => [                                      // DEMO: replace with SG Educare's actual chapter plan
            'Mathematics' => ['Real Numbers and Polynomials', 'Linear Equations and Quadratic Equations', 'Arithmetic Progression', 'Triangles and Circles', 'Coordinate Geometry', 'Trigonometry', 'Mensuration', 'Statistics and Probability'],
            'Science'     => ['Chemical Reactions and Equations', 'Acids, Bases and Salts', 'Metals and Non-metals', 'Carbon Compounds', 'Life Processes', 'Heredity', 'Light', 'Electricity and Magnetism'],
        ],
        'faqs' => [
            ['q' => 'Are SSC, CBSE and ICSE taught in the same batch?', 'a' => 'Ask us. Batches are arranged by board wherever possible.'],
        ],
        'meta_title' => 'Class 8–10 Tuition in Kalyan | SSC, CBSE, ICSE | SG Educare',
        'meta_desc'  => 'Board exam coaching in Kalyan for Class 8–10 (SSC, CBSE, ICSE). Board-pattern tests, answer-writing practice and parent updates at SG Educare.',
    ],

    'nda' => [
        'name'       => 'NDA',
        'short'      => 'NDA',
        'tagline'    => 'Written exam preparation for the UPSC NDA examination.',
        'for'        => 'Class 11, 12 & passed-out',
        'exam'       => 'UPSC NDA & NA',
        'subjects'   => ['Mathematics', 'General Ability Test'],
        'duration'   => '1 Year',                              // DEMO
        'batches'    => 'Mon–Sat, 7:00 AM – 9:00 AM',          // DEMO
        'fees'       => '₹50,000 / year',                      // DEMO
        'mode'       => 'Classroom, Kalyan',
        'video'      => $demoVideo,                            // DEMO
        'overview'   => [
            'The NDA written exam has two papers: Mathematics and the General Ability Test. Our program prepares students for both with regular practice papers.',
            'Students build speed in Maths and cover English and General Knowledge in a structured way, with timed tests on the UPSC pattern.',
        ],
        'curriculum' => [
            'Mathematics' => ['Algebra', 'Matrices and Determinants', 'Trigonometry', 'Analytical Geometry', 'Differential and Integral Calculus', 'Vectors', 'Statistics and Probability'],
            'General Ability Test' => ['English: grammar, vocabulary, comprehension', 'Physics and Chemistry', 'General Science', 'History and Freedom Movement', 'Geography', 'Current Events'],
        ],
        'faqs' => [
            ['q' => 'Do you prepare students for the SSB interview?', 'a' => 'Ask us. We will share what support is currently available.'],
        ],
        'meta_title' => 'NDA Coaching in Kalyan | UPSC NDA Written Exam | SG Educare',
        'meta_desc'  => 'NDA coaching in Kalyan for Mathematics and the General Ability Test. UPSC-pattern practice papers and personal mentoring at SG Educare.',
    ],

    /* ---------- Shared (keys starting with "_" are not programs) ---------- */

    '_common_features' => $common,

    // Instructor section shows ONLY when 'bio' is filled
    '_mentor' => [
        'name'        => 'Latesh Sir',
        'designation' => 'Founder & Senior Faculty',           // DEMO
        'experience'  => '15+ Years',                          // DEMO
        'bio'         => 'Latesh Sir founded SG Education with one goal: give every student in Kalyan the kind of personal attention that large coaching centres cannot. He teaches, mentors and personally reviews student progress, and keeps parents closely involved at every step of the preparation journey.', // DEMO
        'image'       => 'assets/images/team/latesh-sir.jpg',
    ],
];