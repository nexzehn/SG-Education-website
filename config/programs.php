<?php

/*
|--------------------------------------------------------------------------
| SG Education — Programs data (content from COURSES.docx)
|--------------------------------------------------------------------------
| Key = URL slug  →  /courses/{slug}
| Edit ke baad:  php artisan config:clear
|
| null = page shows "Ask us" (fees / duration / batches) or hides it (video).
| Fill real values only when the client confirms them.
|
| Program keys:
|   highlights   → Course Highlights chips
|   planner      → [['phase' => 'PHASE 1 — X', 'text' => '...'], ...]
|   methodology  → ['flow' => [...chips], 'steps' => [['t','d']...],
|                   'levels' => '...', 'note' => '...']  (sab optional except flow)
|   testing      → ['schedule' => [['1st Saturday','Physics'],...], 'along' => '...']
|   objective    → closing callout line
|   quote        → ['text' => ..., 'by' => ...]  (Mission IIT only)
|   image        → program photo (public/…); missing file → default photo
|   form_course  → course pre-selected on the contact form (ContactController::COURSES key)
*/

// From the website content: small batches, testing + analysis, mentorship, parent communication
$common = [
    'Small batches with focused attention for every student',
    'Regular tests followed by performance analysis',
    'Doubt-solving support and faculty mentorship',
    'Regular communication with parents on progress',
];

return [

    /* ================= 01 — 9TH & 10TH STATE BOARD ================= */
    'boards' => [
        'image'       => 'assets/images/sg/classroom-junior.webp',
        'form_course' => '9th-10th',
        'name'     => '9th & 10th State Board',
        'short'    => 'Boards 9–10',
        'tagline'  => 'Build Strong Foundations. Finish Strong.',
        'for'      => 'Class 9 & 10',
        'exam'     => 'Maharashtra State Board',
        'subjects' => ['Mathematics', 'Science'],
        'duration' => '1 Year (per class)',            // confirm
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,                            // "Ask us"
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'overview' => [
            'Board-focused coaching for Class 9 and 10 State Board students, built around concept-first teaching, complete syllabus planning and regular assessment.',
            'Students build strong fundamentals in Class 9 and carry them into a structured, board-oriented Class 10 preparation.',
        ],
        'highlights' => [
            'Concept-focused classroom teaching', 'Complete syllabus planning', 'Regular chapter-wise practice',
            'Board-oriented preparation', 'Writing and presentation practice', 'Regular tests and assessments',
            'Systematic revision', 'Doubt-solving and academic guidance', 'Prelim and Board examination preparation',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Foundation',         'text' => 'Build conceptual clarity and establish strong academic habits.'],
            ['phase' => 'Phase 2 — Syllabus Building',  'text' => 'Complete chapters systematically with classroom teaching and practice.'],
            ['phase' => 'Phase 3 — Practice',           'text' => 'Move from basic questions to application and HOTS-level questions.'],
            ['phase' => 'Phase 4 — Testing',            'text' => 'Chapter tests, unit tests and cumulative assessments.'],
            ['phase' => 'Phase 5 — Revision',           'text' => 'Identify weak chapters and conduct targeted revision.'],
            ['phase' => 'Phase 6 — Board Preparation',  'text' => 'Full papers, writing practice, time management and examination strategy.'],
        ],
        'methodology' => [
            'flow'   => ['Concept', 'Example', 'Practice', 'Test', 'Correction'],
            'note'   => 'Teachers focus on understanding rather than simply completing chapters.',
            'levels' => 'Basic → Application → HOTS → Board-Level Questions',
        ],
        'objective' => "Don't prepare only for the next test. Build the student for the entire academic year.",
        'faqs' => [
            ['q' => 'Does the program follow the school syllabus?', 'a' => 'Yes. Teaching follows the Maharashtra State Board syllabus, so school performance and board preparation move together.'],
        ],
        'meta_title' => 'Class 9 & 10 State Board Coaching in Kalyan | SG Education',
        'meta_desc'  => 'State Board coaching in Kalyan for Class 9 & 10. Concept-first teaching, board-pattern tests, writing practice and parent updates at SG Education.',
    ],

    /* ================= 02 — 11TH & 12TH SCIENCE ================= */
    'science' => [
        'image'       => 'assets/images/sg/classroom-senior.webp',
        'form_course' => '11th-12th-science',
        'name'     => '11th & 12th Science',
        'short'    => '11th–12th Science',
        'tagline'  => 'Build the Foundation for Your Future.',
        'for'      => 'Class 11 & 12',
        'exam'     => 'HSC Board + JEE / NEET / MHT-CET readiness',
        'subjects' => ['Physics', 'Chemistry', 'Mathematics', 'Biology'],
        'duration' => '2 Years (Class 11 + 12)',       // confirm
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'overview' => [
            'A complete academic program for Class 11 and 12 Science that combines board preparation with competitive-exam readiness.',
            'Students choose their pathway — PCM, PCB or PCMB — and follow a structured plan across both years.',
        ],
        'pathways' => ['PCM', 'PCB', 'PCMB'],
        'highlights' => [
            'Physics, Chemistry, Mathematics & Biology', 'Concept-oriented teaching', 'Academic + competitive preparation',
            'Regular problem-solving sessions', 'Chapter-wise testing', 'Cumulative testing', 'PYQ practice',
            'Revision planning', 'Performance tracking', 'JEE / NEET / MHT-CET readiness',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Concept Foundation',   'text' => 'Build fundamentals required for 11th and 12th Science.'],
            ['phase' => 'Phase 2 — Syllabus Coverage',    'text' => 'Systematic completion of Physics, Chemistry, Mathematics and/or Biology.'],
            ['phase' => 'Phase 3 — Application',          'text' => 'Increase the difficulty and introduce competitive-level questions.'],
            ['phase' => 'Phase 4 — Revision + Testing',   'text' => 'Regular chapter and cumulative assessments.'],
            ['phase' => 'Phase 5 — Integration',          'text' => 'Connect Class 11 and Class 12 concepts.'],
            ['phase' => 'Phase 6 — Exam Preparation',     'text' => 'Board + JEE / NEET / MHT-CET focused preparation.'],
        ],
        'methodology' => [
            'flow'   => ['Understand', 'Apply', 'Practise', 'Test', 'Analyse'],
            'note'   => 'Every concept moves through multiple levels:',
            'levels' => 'Concept → Illustration → Solved Examples → Guided Practice → Independent Practice → Competitive Problems',
        ],
        'faqs' => [
            ['q' => 'Can I take PCMB and decide my direction later?', 'a' => 'Yes. PCMB keeps both engineering and medical pathways open. Our counsellors help students choose at the right time.'],
        ],
        'meta_title' => '11th & 12th Science Classes in Kalyan | PCM, PCB, PCMB | SG Education',
        'meta_desc'  => 'Class 11 & 12 Science coaching in Kalyan with PCM, PCB and PCMB pathways. Board + JEE / NEET / MHT-CET readiness at SG Education.',
    ],

    /* ================= 03 — SG MISSION IIT 2029 (JEE) ================= */
    'jee' => [
        'image'       => 'assets/images/sg/fp-student-thinking.webp',
        'form_course' => 'jee',
        'name'     => 'SG Mission IIT 2029 — JEE Main & Advanced',
        'short'    => 'Mission IIT',
        'tagline'  => 'The Dream: AIR 1 From Kalyan.',
        'for'      => 'Class 11 & 12',
        'exam'     => 'JEE Main, JEE Advanced',
        'subjects' => ['Physics', 'Chemistry', 'Mathematics'],
        'duration' => '2 Years (Class 11 + 12)',       // confirm
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'quote'    => [
            'text' => 'I have a dream of producing AIR 1 from Kalyan.',
            'by'   => 'Latesh Ghavat, Founder, SG Education',
        ],
        'overview' => [
            'We cannot promise AIR 1. We can build a serious preparation system for students who want to compete at the highest level.',
            'A two-year structured JEE roadmap covering Physics, Chemistry and Mathematics with conceptual depth, daily practice and detailed performance analysis.',
        ],
        'highlights' => [
            'Two-year structured JEE roadmap', 'Physics + Chemistry + Mathematics', 'Conceptual depth',
            'JEE Main + Advanced preparation', 'Daily Practice Problems', 'JEE-level problem solving',
            'PYQ-based preparation', 'Advanced problem-solving', 'Regular subject tests',
            'Full-syllabus tests', 'Mock examinations', 'Detailed performance analysis', 'Individual improvement targets',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Class 11 Foundation',              'text' => 'Build strong fundamentals in Physics, Chemistry and Mathematics. Focus on concepts, basic application and problem solving.'],
            ['phase' => 'Phase 2 — Advanced Practice',                'text' => 'Increase problem difficulty: JEE Main → JEE Advanced → multi-concept problems.'],
            ['phase' => 'Phase 3 — Class 12 + Class 11 Integration',  'text' => 'Complete Class 12 while continuously revising and strengthening Class 11.'],
            ['phase' => 'Phase 4 — JEE Main Preparation',             'text' => 'PYQs + revision + speed + accuracy + full-syllabus tests.'],
            ['phase' => 'Phase 5 — JEE Advanced Preparation',         'text' => 'Advanced problems + multi-concept questions + full tests + exam strategy.'],
        ],
        'methodology' => [
            'flow'  => ['Learn', 'Practise', 'Challenge', 'Test', 'Analyse', 'Improve'],
            'steps' => [
                ['t' => 'Concept Depth',     'd' => 'Understand why, not just how.'],
                ['t' => 'Problem Solving',   'd' => 'Apply concepts to progressively difficult problems.'],
                ['t' => 'PYQs',              'd' => 'Understand actual examination patterns.'],
                ['t' => 'Advanced Practice', 'd' => 'Develop the ability to solve unfamiliar and multi-concept problems.'],
                ['t' => 'Testing',           'd' => 'Regularly simulate examination conditions.'],
                ['t' => 'Analysis',          'd' => 'Identify conceptual gaps, careless errors, speed and question-selection issues.'],
            ],
        ],
        'testing' => [
            'schedule' => [
                ['1st Saturday', 'Physics'], ['2nd Saturday', 'Chemistry'],
                ['3rd Saturday', 'Mathematics'], ['4th / 5th Saturday', 'Combined Test'],
            ],
            'along' => 'DPPs • Chapter Tests • Cumulative Tests • PYQs • Full-Syllabus Tests • Mock Tests',
        ],
        'faqs' => [
            ['q' => 'Does the program also cover the board syllabus?', 'a' => 'Yes. Teaching follows the Class 11 and 12 syllabus, so board preparation happens alongside JEE preparation.'],
        ],
        'meta_title' => 'JEE Coaching in Kalyan | SG Mission IIT 2029 | Main + Advanced | SG Education',
        'meta_desc'  => 'Two-year JEE Main & Advanced program in Kalyan. Conceptual depth, DPPs, PYQs, mock tests and detailed performance analysis at SG Education.',
    ],

    /* ================= 04 — SG MISSION NEET 2029 ================= */
    'neet' => [
        'image'       => 'assets/images/sg/fp-science-lab.webp',
        'form_course' => 'neet',
        'name'     => 'SG Mission NEET 2029 — NEET-UG',
        'short'    => 'Mission NEET',
        'tagline'  => 'Build Knowledge. Build Accuracy. Build Consistency.',
        'for'      => 'Class 11 & 12',
        'exam'     => 'NEET-UG',
        'subjects' => ['Physics', 'Chemistry', 'Biology'],
        'duration' => '2 Years (Class 11 + 12)',       // confirm
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'overview' => [
            'A structured NEET-UG program built on NCERT-focused preparation, extensive MCQ practice and regular full-length mocks.',
            'Every test is followed by error analysis, accuracy and time-management training, so preparation keeps improving.',
        ],
        'highlights' => [
            'Physics + Chemistry + Biology', 'NCERT-focused preparation', 'Conceptual clarity', 'Extensive MCQ practice',
            'PYQs', 'Regular revision', 'Chapter-wise testing', 'Cumulative testing', 'Full-length NEET mocks',
            'Error analysis', 'Accuracy and time-management training', 'Performance tracking',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Concept Foundation',        'text' => 'Build strong fundamentals in Physics, Chemistry and Biology.'],
            ['phase' => 'Phase 2 — NCERT + MCQ',               'text' => 'Master NCERT content and develop question-solving ability.'],
            ['phase' => 'Phase 3 — Application + PYQs',        'text' => 'Apply concepts and understand previous examination patterns.'],
            ['phase' => 'Phase 4 — Cumulative Revision',       'text' => 'Regularly revisit older chapters to improve retention.'],
            ['phase' => 'Phase 5 — Full-Syllabus Preparation', 'text' => 'Integrate the entire syllabus through comprehensive tests.'],
            ['phase' => 'Phase 6 — Final Revision + Mocks',    'text' => 'Full-length examinations, analysis and targeted improvement.'],
        ],
        'methodology' => [
            'flow'  => ['Learn', 'Practise', 'Test', 'Analyse', 'Revise'],
            'steps' => [
                ['t' => 'Physics',   'd' => 'Concept → Formula → Application → Numerical → PYQ'],
                ['t' => 'Chemistry', 'd' => 'Concept → NCERT → Practice → PYQ → Revision'],
                ['t' => 'Biology',   'd' => 'NCERT → Active Recall → MCQ → Analysis → Repetition'],
            ],
        ],
        'testing' => [
            'schedule' => [
                ['1st Saturday', 'Physics'], ['2nd Saturday', 'Chemistry'],
                ['3rd Saturday', 'Biology'], ['4th / 5th Saturday', 'Combined NEET Test'],
            ],
            'along' => 'DPPs • Chapter Tests • Cumulative Tests • PYQs • Full-Length Tests • Mock Tests',
        ],
        'faqs' => [
            ['q' => 'Is the teaching NCERT-based?', 'a' => 'Yes. NCERT is the base, with additional practice material for NEET-level questions.'],
        ],
        'meta_title' => 'NEET Coaching in Kalyan | SG Mission NEET 2029 | SG Education',
        'meta_desc'  => 'NEET-UG program in Kalyan with NCERT-focused teaching, MCQ practice, full-length mocks and error analysis at SG Education.',
    ],

    /* ================= 05 — MHT-CET ================= */
    'mht-cet' => [
        'image'       => 'assets/images/sg/fp-exam-hall.webp',
        'form_course' => 'mht-cet',
        'name'     => 'MHT-CET (Engineering & Pharmacy)',
        'short'    => 'MHT-CET',
        'tagline'  => 'Concepts Matter. Speed Matters Too.',
        'for'      => 'Class 11 & 12',
        'exam'     => 'MHT-CET (PCM / PCB)',
        'subjects' => ['Physics', 'Chemistry', 'Mathematics', 'Biology'],
        'duration' => null,                           // confirm with client
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'overview' => [
            'MHT-CET rewards accuracy at speed on the Maharashtra syllabus. Our program combines concept-focused teaching with timed practice and CET-pattern testing.',
        ],
        'highlights' => [
            'Maharashtra syllabus alignment', 'Concept-focused teaching', 'Extensive MCQ practice',
            'Speed-building exercises', 'Accuracy training', 'Timed practice', 'Previous-year questions',
            'Regular CET-pattern tests', 'Full-length mock examinations', 'Performance analysis',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Concept Building',    'text' => 'Strengthen the complete syllabus.'],
            ['phase' => 'Phase 2 — MCQ Practice',        'text' => 'Develop familiarity with question patterns.'],
            ['phase' => 'Phase 3 — Speed Development',   'text' => 'Solve accurately within time limits.'],
            ['phase' => 'Phase 4 — Testing',             'text' => 'Chapter → Subject → Cumulative → Full Test.'],
            ['phase' => 'Phase 5 — Final Preparation',   'text' => 'Mocks + analysis + revision + exam strategy.'],
        ],
        'methodology' => [
            'flow'  => ['Concept', 'MCQ', 'Timed Practice', 'Analysis', 'Mock'],
            'steps' => [
                ['t' => 'Concept',        'd' => 'Understand the topic.'],
                ['t' => 'MCQ',            'd' => 'Apply the concept.'],
                ['t' => 'Timed Practice', 'd' => 'Improve speed.'],
                ['t' => 'Analysis',       'd' => 'Identify recurring mistakes.'],
                ['t' => 'Mock',           'd' => 'Simulate the actual examination.'],
            ],
            'levels' => 'Core Formula: Concept + Speed + Accuracy',
        ],
        'faqs' => [
            ['q' => 'Can I prepare for MHT-CET and JEE together?', 'a' => 'Yes, the syllabus overlaps a lot. Talk to us and we will suggest the right combination.'],
        ],
        'meta_title' => 'MHT-CET Classes in Kalyan | Engineering & Pharmacy | SG Education',
        'meta_desc'  => 'MHT-CET coaching in Kalyan for PCM and PCB. Timed practice, CET-pattern tests and performance analysis at SG Education.',
    ],

    /* ================= 06 — NDA ================= */
    'nda' => [
        'image'       => 'assets/images/sg/fp-group-study.webp',
        'form_course' => 'nda',
        'name'     => 'NDA',
        'short'    => 'NDA',
        'tagline'  => 'Prepare Academically. Think With Discipline.',
        'for'      => 'Class 11, 12 & passed-out',
        'exam'     => 'UPSC NDA & NA',
        'subjects' => ['Mathematics', 'General Ability Test'],
        'duration' => null,                           // confirm with client
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'overview' => [
            'Written-exam preparation for the UPSC NDA examination across Mathematics and the General Ability Test — English, Science, History, Geography and General Knowledge.',
        ],
        'highlights' => [
            'Mathematics preparation', 'General Ability Test preparation', 'English', 'Science', 'History',
            'Geography', 'General Knowledge', 'Regular practice', 'Timed tests', 'Mock examinations', 'Performance analysis',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Foundation',         'text' => 'Build Mathematics and GAT fundamentals.'],
            ['phase' => 'Phase 2 — Syllabus Coverage',  'text' => 'Systematic preparation across the major examination areas.'],
            ['phase' => 'Phase 3 — Practice',           'text' => 'Topic-wise and mixed-question practice.'],
            ['phase' => 'Phase 4 — Testing',            'text' => 'Regular timed tests.'],
            ['phase' => 'Phase 5 — Mocks',              'text' => 'Full NDA-pattern examinations.'],
            ['phase' => 'Phase 6 — Final Revision',     'text' => 'Weak-area revision + examination strategy.'],
        ],
        'methodology' => [
            'flow'   => ['Understand', 'Practise', 'Time', 'Test', 'Improve'],
            'levels' => 'Focus: Knowledge + Accuracy + Speed + Examination Discipline',
        ],
        'faqs' => [
            ['q' => 'Do you prepare students for the SSB interview?', 'a' => 'Ask us. We will share what support is currently available.'],
        ],
        'meta_title' => 'NDA Coaching in Kalyan | UPSC NDA Written Exam | SG Education',
        'meta_desc'  => 'NDA coaching in Kalyan for Mathematics and the General Ability Test. UPSC-pattern timed tests and mocks at SG Education.',
    ],

    /* ================= 07 — FOUNDATION ================= */
    'foundation' => [
        'image'       => 'assets/images/sg/fp-student-self-study.webp',
        'form_course' => 'foundation',
        'name'     => 'Foundation',
        'short'    => 'Foundation',
        'tagline'  => 'Start Early. Build Strong.',
        'for'      => 'Class 8 to 10',
        'exam'     => 'School + competitive foundation',
        'subjects' => ['Mathematics', 'Science', 'Mental Ability'],
        'duration' => '1 Year (per class)',            // confirm
        'batches'  => null,                           // confirm timings with client
        'fees'     => null,
        'mode'     => 'Classroom, Khadakpada, Kalyan',
        'video'    => null,                           // add SG's own YouTube link
        'overview' => [
            "Foundation isn't about putting younger students under unnecessary competitive-exam pressure.",
            'It is about developing the skills that make advanced learning easier.',
        ],
        'highlights' => [
            'Strong Mathematics fundamentals', 'Scientific thinking', 'Logical reasoning', 'Problem solving',
            'Application-based learning', 'HOTS development', 'Mental ability', 'Curiosity-driven learning', 'Regular assessments',
        ],
        'planner' => [
            ['phase' => 'Phase 1 — Fundamentals',           'text' => 'Build strong basic concepts.'],
            ['phase' => 'Phase 2 — Logical Thinking',       'text' => 'Develop reasoning and analytical ability.'],
            ['phase' => 'Phase 3 — Application',            'text' => 'Use concepts in unfamiliar situations.'],
            ['phase' => 'Phase 4 — Problem Solving',        'text' => 'Develop structured approaches to problems.'],
            ['phase' => 'Phase 5 — Higher-Order Thinking',  'text' => 'Introduce challenging questions progressively.'],
        ],
        'methodology' => [
            'flow' => ['Understand', 'Think', 'Apply', 'Solve'],
            'note' => 'We encourage students to ask Why? How? What if? rather than simply memorising answers.',
        ],
        'faqs' => [
            ['q' => "Will this affect my child's school studies?", 'a' => 'No. The program follows the school syllabus and goes deeper, so it supports school performance.'],
        ],
        'meta_title' => 'Foundation Classes in Kalyan | Class 8–10 | SG Education',
        'meta_desc'  => 'Foundation coaching for Class 8–10 in Kalyan. Strong Maths, Science and reasoning base for future JEE and NEET preparation at SG Education.',
    ],

    /* ---------- Shared ---------- */
    '_common_features' => $common,

    // Bio uses the founder's own words from the website content (About page)
    '_mentor' => [
        'name'        => 'Latesh Ghavat',
        'designation' => 'Founder, SG Education',
        'experience'  => null,                          // add real years only if the client confirms
        'bio'         => 'Latesh Sir started SG Education with a belief that students from Kalyan should not have to lower their ambitions because of where they live. His focus is building the system, guidance and discipline students need to understand, think, solve and keep improving.',
        'image'       => 'assets/images/sg/founder-latesh-ghavat.webp',
    ],
];