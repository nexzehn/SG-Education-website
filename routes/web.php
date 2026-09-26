<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('our-methodology', [HomeController::class, 'methodology']);
Route::get('results', [HomeController::class, 'results']);
Route::get('service', [HomeController::class, 'service']);
Route::post('sendemail', [HomeController::class, 'send'])->name('send.email');
Route::get('products', [HomeController::class, 'project']);
Route::get('our-work-corporate', [HomeController::class, 'corporate_work']);

// Contact — enquiry form (replaces HomeController@contact)
Route::get('contact', [ContactController::class, 'show'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1') // 5 submissions per minute per IP
    ->name('contact.store');

// Blog — /blog (listing) and /blog/{slug} (article)
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [BlogController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('blog.show');

// Programs — /courses (All Programs) and /courses/{slug} (jee, neet, mht-cet, foundation, boards, nda)
Route::get('courses', [ProgramController::class, 'index'])->name('programs.index');
Route::get('courses/{slug}', [ProgramController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('programs.show');