<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('service', [HomeController::class, 'service']);
Route::get('contact', [HomeController::class, 'contact']);
Route::post('sendemail', [HomeController::class, 'send'])->name('send.email');
Route::get('products', [HomeController::class, 'project']);
Route::get('our-work-corporate', [HomeController::class, 'corporate_work']);

// Programs — /courses (All Programs) and /courses/{slug} (jee, neet, mht-cet, foundation, boards, nda)
Route::get('courses', [ProgramController::class, 'index'])->name('programs.index');
Route::get('courses/{slug}', [ProgramController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('programs.show');