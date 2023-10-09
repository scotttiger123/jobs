<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\DashboardController\DashboardController;
use App\Http\Controllers\FindJob\FindJobController;
use App\Http\Controllers\PostJobController;




/* login */

// Route::get('/', [LoginController::class,'index'])->name('login');
Route::get('/login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class,'login'])->name('login');
Route::get('auth/google', [LoginController::class, 'loginWithGoogle'])->name('google-login');
Route::any('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('callback');

/* register */
Route::get('register', [LoginController::class,'register'])->name('register');
Route::post('register', [LoginController::class,'register_user'])->name('register');

/* forgot password */
Route::get('forgot', [LoginController::class,'forgot'])->name('forgot');


/* Dashboard */
Route::get('/', [FindJobController::class,'index'])->name('find.job');
Route::get('/search-jobs', [FindJobController::class,'findJob'])->name('search-jobs');
Route::get('/get-job-details/{jobId}', [FindJobController::class,'getJobDetails'])->name('get-job-detail');



Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('logout', [LoginController::class,'logout'])->name('logout');



Route::get('error', [LoginController::class,'error'])->name('error');
Route::get('postJob', [PostJobController::class,'index'])->name('post-job');
Route::post('/job', [PostJobController::class, 'store'])->name('job.store');

// Route::get('/', function () {
//     return view('welcome');
// });
