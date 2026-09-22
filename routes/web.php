<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('about', [HomeController::class, 'about']);
Route::get('service', [HomeController::class, 'service']);
Route::get('contact', [HomeController::class, 'contact']);
Route::post('sendemail', [HomeController::class, 'send'])->name('send.email');
Route::get('products', [HomeController::class, 'project']);
Route::get('our-work-corporate', [HomeController::class, 'corporate_work']);







