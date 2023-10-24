<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\DashboardController\DashboardController;
use App\Http\Controllers\FindJob\FindJobController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\Candidate\CreateProfileController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
Route::get('view-posted-jobs', [PostJobController::class,'viewPostedJobs'])->name('view-posted-job');
Route::get('/fetch-job-details/{jobId}', [PostJobController::class,'fetchJobPost'])->name('fetch-detail');
Route::get('add-company', [PostJobController::class,'addCompany'])->name('add-company');

/* Candidate */
Route::get('create-profile', [CreateProfileController::class,'index'])->name('create-profile');
Route::get('profile', [CreateProfileController::class,'profile'])->name('profile');
Route::get('save-info', [CreateProfileController::class,'saveInfo'])->name('save-info');
Route::get('save-work', [CreateProfileController::class,'saveWork'])->name('save-work');
Route::get('edit-work', [CreateProfileController::class,'editWork'])->name('edit-work');
Route::get('work-experiences/{id}', [CreateProfileController::class,'destroy'])->name('delete-work');
Route::get('save-education', [CreateProfileController::class,'saveEducation'])->name('save-education');
Route::get('destory-education/{id}', [CreateProfileController::class,'destroyEducation'])->name('delete-education');
Route::get('edit-education', [CreateProfileController::class,'editEducation'])->name('edit-education');
Route::get('save-skill', [CreateProfileController::class,'saveSkill'])->name('save-skill');
Route::get('delete-skill/{id}', [CreateProfileController::class,'destroySkill'])->name('delete-skill');
Route::get('edit-skill', [CreateProfileController::class,'editSkill'])->name('edit-skill');
Route::get('save-certification', [CreateProfileController::class,'saveCertification'])->name('save-certification');
Route::get('delete-certificate/{id}', [CreateProfileController::class,'destroyCertificate'])->name('delete-certificate');

/*apply-job*/
Route::get('apply-job', [CreateProfileController::class,'applyJob'])->name('apply-job');
Route::get('get-candidate-cv', [CreateProfileController::class,'getCandidateCV'])->name('get-candidate-cv');




// Route::get('/', function () {
//     return view('welcome');
// });
