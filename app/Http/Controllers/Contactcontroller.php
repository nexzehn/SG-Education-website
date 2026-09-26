<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public const COURSES = [
        '9th-10th' => '9th–10th Coaching',
        '11th-12th-science' => '11th–12th Science',
        'jee' => 'JEE (Main & Advanced)',
        'neet' => 'NEET',
        'mht-cet' => 'MHT-CET',
        'nda' => 'NDA',
        'foundation' => 'Foundation',
        'not-sure' => 'Not sure yet, need guidance',
    ];

    public const CLASSES = [
        '6' => 'Class 6', '7' => 'Class 7', '8' => 'Class 8', '9' => 'Class 9',
        '10' => 'Class 10', '11' => 'Class 11', '12' => 'Class 12',
        '12-passed' => '12th passed',
    ];

    public function show(Request $request)
    {
        $course = (string) $request->query('course');

        return view('contact', [
            'courses' => self::COURSES,
            'classes' => self::CLASSES,
            'selectedCourse' => array_key_exists($course, self::COURSES) ? $course : null,
        ]);
    }

    public function store(Request $request)
    {
        $back = route('contact') . '#enquiry';

        // Honeypot: bots fill the hidden "website" field. Pretend success, keep nothing.
        if ($request->filled('website')) {
            return redirect()->to($back)->with('enquiry_success', 'there');
        }

        // Normalise mobile: "+91 98765 43210" → "9876543210"
        $mobile = preg_replace('/\D/', '', (string) $request->input('mobile'));
        if (strlen($mobile) === 12 && str_starts_with($mobile, '91')) {
            $mobile = substr($mobile, 2);
        } elseif (strlen($mobile) === 11 && str_starts_with($mobile, '0')) {
            $mobile = substr($mobile, 1);
        }
        $request->merge(['mobile' => $mobile]);

        // Tidy text inputs before validating
        foreach (['student_name', 'parent_name', 'school'] as $f) {
            if ($request->filled($f)) {
                $request->merge([$f => preg_replace('/\s+/u', ' ', trim((string) $request->input($f)))]);
            }
        }

        $name = "regex:/^[\pL\pM\s.'\-]+$/u";          // letters (incl. Devanagari), spaces, . ' -
        $school = "regex:/^[\pL\pM\pN\s.,'&()\/\-]+$/u"; // + numbers & common punctuation

        $data = $request->validate([
            'student_name' => ['required', 'string', 'min:2', 'max:80', $name],
            'parent_name' => ['nullable', 'string', 'min:2', 'max:80', $name],
            'mobile' => ['required', 'regex:/^[6-9]\d{9}$/'],
            'current_class' => ['required', Rule::in(array_keys(self::CLASSES))],
            'school' => ['nullable', 'string', 'max:120', $school],
            'interested_course' => ['required', Rule::in(array_keys(self::COURSES))],
            'message' => ['nullable', 'string', 'max:1000'],
        ], [
            'student_name.required' => 'Enter the student’s name.',
            'student_name.min' => 'Name looks too short.',
            'student_name.regex' => 'Name can contain only letters and spaces.',
            'parent_name.min' => 'Name looks too short.',
            'parent_name.regex' => 'Name can contain only letters and spaces.',
            'mobile.required' => 'Enter a mobile number so we can call you back.',
            'mobile.regex' => 'Enter a valid 10-digit Indian mobile number starting with 6, 7, 8 or 9.',
            'current_class.required' => 'Select the student’s current class.',
            'current_class.in' => 'Select the student’s current class.',
            'school.regex' => 'Special characters aren’t allowed in the school name.',
            'interested_course.required' => 'Select the course you’re interested in.',
            'interested_course.in' => 'Select the course you’re interested in.',
        ]);

        $data['current_class'] = self::CLASSES[$data['current_class']];
        $data['interested_course'] = self::COURSES[$data['interested_course']];

        // Always log first, so a lead is never lost if mail fails.
        Log::info('Website enquiry', $data);

        $to = config('services.enquiry.to');

        if (! $to) {
            Log::warning('ENQUIRY_MAIL_TO is not set. Enquiry was only logged.');

            return redirect()->to($back)->with('enquiry_success', $data['student_name']);
        }

        try {
            $body = collect($data)
                ->map(fn ($v, $k) => str_pad(ucwords(str_replace('_', ' ', $k)) . ':', 20) . ($v ?: '-'))
                ->implode("\n");

            Mail::raw("New enquiry from sgeducare.in\n\n{$body}", function ($m) use ($to, $data) {
                $m->to($to)->subject("Enquiry: {$data['student_name']} – {$data['interested_course']}");
            });
        } catch (\Throwable $e) {
            Log::error('Enquiry mail failed', ['error' => $e->getMessage()]);

            return redirect()->to($back)->withInput()->with('enquiry_error', true);
        }

        return redirect()->to($back)->with('enquiry_success', $data['student_name']);
    }
}