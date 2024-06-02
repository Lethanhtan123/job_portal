<?php

use App\Http\Controllers\Fontend\CandidateDashboardController;
use App\Http\Controllers\Fontend\CandidateExperienceController;
use App\Http\Controllers\Fontend\CandidateProfileController;
use App\Http\Controllers\Fontend\CompanyDashboardController;
use App\Http\Controllers\Fontend\CompanyFrofileController;
use App\Http\Controllers\Fontend\CompanyProfileController;
use App\Http\Controllers\Fontend\FrontendCandidatePageController;
use App\Http\Controllers\Fontend\FrontendCompanyPageController;
use App\Http\Controllers\Fontend\FrontendJobPageController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\Fontend\JobController;
use App\Http\Controllers\ProfileController;
use App\Models\CandidateExperience;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('companies', [FrontendCompanyPageController::class, 'index'])->name('companies.index');
Route::get('companies/{slug}', [FrontendCompanyPageController::class, 'show'])->name('companies.show');

Route::get('candidates', [FrontendCandidatePageController::class, 'index'])->name('candidates.index');

//**Candidate Routes */
Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:candidate'],
        'prefix' => 'candidate',
        'as' => 'candidate.',
    ],
    function () {
        Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile.index');
        Route::post('/profile/basic-info-upate',[CandidateProfileController::class,'basicInfoUpdate'])->name('profile.basic-info.update');
        Route::post('/profile/profile-info-upate', [CandidateProfileController::class, 'profileInfoUpdate'])->name('profile.profile-info.update');

        Route::resource('experience', CandidateExperienceController::class);
    }
);

//**Company Routes */
Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:company'],
        'prefix' => 'company',
        'as' => 'company.',
    ],
    function () {

        /** dashboard */
        Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');

        /** Company profile dashboard */
        Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
        Route::post('/profile/company-info', [CompanyProfileController::class, 'updateComInfo'])->name('profile.company-info');
        Route::post('/profile/founding-info', [CompanyProfileController::class, 'updateFoundingInfo'])->name('profile.founding-info');
        Route::post('/profile/account-info', [CompanyProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
        Route::post('/profile/password-update', [CompanyProfileController::class, 'updatePassword'])->name('profile.password-update');

        /** Job Routes */
        //Route::get('applications/{id}', [JobController::class, 'applications'])->name('job.applications');
        Route::resource('jobs', JobController::class);
    }
);


/** Find a job route */
Route::get('jobs', [FrontendJobPageController::class, 'index'])->name('jobs.index');
Route::get('jobs/{slug}', [FrontendJobPageController::class, 'show'])->name('jobs.show');
//Route::post('apply-job/{id}', [FrontendJobPageController::class, 'applyJob'])->name('apply-job.store');
//Route::get('job-bookmark/{id}', [CandidateJobBookmarkController::class, 'save'])->name('job.bookmark');
