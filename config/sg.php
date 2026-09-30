<?php

/*
|--------------------------------------------------------------------------
| SG Education — site-wide details (one place, used by every page)
|--------------------------------------------------------------------------
| Numbers below match the Khadakpada signboard + the Contact Us document.
| ⚠️ Confirm with the client which number is on WhatsApp.
*/

return [

    'name' => 'SG Education',
    'tagline' => 'Building Concepts. Creating Achievers.',

    'phones' => ['8591932112', '8591942112'],   // 10-digit, no +91
    'whatsapp' => '8591932112',
    'email' => 'info@sgeducare.in',

    'address' => '109, Whitefield, Flower Valley, Above HDFC Bank, Opposite Gurudev NX Hotel, Khadakpada, Kalyan',

    // Social profiles — leave null to hide the icon
    'social' => [
        'facebook' => null,   // e.g. 'https://www.facebook.com/sgeducation'
        'instagram' => null,
        'youtube' => null,
    ],

    /*
    | Student photos (public/assets/images/results/) — ONE list for the whole site:
    | Results page + the results carousel on Home/About both read this.
    | null = no confirmed photo yet → initials show instead.
    */
    'student_photos' => [
        'Prashik Ahire' => 'student-17.webp',
        'Aryan Shejwal' => 'student-13.webp',
        'Vinayak Diwakar' => 'student-01.webp',
        'Dhruv Shirsat' => 'student-12.webp',
        'Kirti Pande' => 'student-16.webp',
        'Kunal Choudhary' => 'student-08.webp',      // student-08 was also on Aditya Sonar — confirm who it is
        'Aditya Sonar' => null,         // student-08 — confirm
        'Advait Gotkhinde' => 'student-15.webp',     // student-15 was also on Nishant Patil — confirm
        'Pranit Bhosale' => 'student-09.webp',
        'Soham Bangar' => 'student-04.webp',
        'Sneha Bhundere' => 'student-05.webp',
        'Gaurav Ghude' => 'student-06.webp',
        'Mohd. Adnan Shaikh' => null,   // student-14 was also on Dhiraj Patil — confirm
        'Nishant Patil' => null,        // student-15 — confirm
        'Dhiraj Patil' => 'student-14.webp',         // student-14 — confirm
        'Ruchi Dalvi' => 'student-10.webp',
        'Karan Bankar' => 'student-07.webp',
        'Vedant Mandhare' => 'student-02.webp',
        'Ujwal Ghude' => 'student-03.webp',
        'Vishnu Pillai' => 'student-18.webp',
        'Sai Sarvanan' => 'student-11.webp',
    ],

    // DEMO: replace with SG Education's own YouTube video
    'video' => 'https://www.youtube.com/watch?v=h9MbznbxlLc',

    // Client photos go in public/assets/images/sg/ — pages fall back to template stock if a file is missing
    'img_dir' => 'assets/images/sg',
];