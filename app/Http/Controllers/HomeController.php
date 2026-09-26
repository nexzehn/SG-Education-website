<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function index()
      {
            return view('index');
      }
      public function about()
      {
            return view('about');
      }
      public function methodology()
      {
            return view('methodology');
      }
      public function results()
      {
            return view('results');
      }
      public function service()
      {
            return view('service');
      }
      public function contact()
      {
            return view('contact');
      }
      public function send(Request $request)
      {
            $request->validate([
                  'name' => 'required|string|max:255',
                  'email' => 'required|email|max:255',
                  'phone' => 'required|string|max:20',
                  'message' => 'required|string|max:2000',
            ]);

            $data = $request->only(['name', 'email', 'phone', 'services', 'message']);
            // print_r($data);die();

            // Send email
            Mail::send('emails.contactemail', ['data' => $data], function ($message) use ($data) {
                  $message->to('WeGrow ITmedia@gmail.com', 'WeGrow IT')
                        ->from($data['email'], $data['name'])
                        ->subject('New Contact Message');
            });

            return redirect()->back()->with('success', 'Message Sent Successfully!');

      }
      public function project()
      {
            return view('project');
      }
      public function corporate_work()
      {
            return view('corporate_work');
      }

}
