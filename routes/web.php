<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

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



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/', [FrontEndController::class, 'index'])->name('index');
Route::get('/about', [FrontEndController::class, 'about'])->name('about');
Route::get('/faq', [FrontEndController::class, 'faq'])->name('faq');
Route::get('/blog', [FrontEndController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');

