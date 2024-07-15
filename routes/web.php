<?php

use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Fontend\CandidateBookmarkController;
use App\Http\Controllers\Fontend\CandidateDashboardController;
use App\Http\Controllers\Fontend\CandidateEducationController;
use App\Http\Controllers\Fontend\CandidateExperienceController;
use App\Http\Controllers\Fontend\CandidateMyJobController;
use App\Http\Controllers\Fontend\CandidateProfileController;
use App\Http\Controllers\Fontend\CompanyDashboardController;
use App\Http\Controllers\Fontend\CompanyFrofileController;
use App\Http\Controllers\Fontend\CompanyProfileController;
use App\Http\Controllers\Fontend\ContactController;
use App\Http\Controllers\Fontend\FontendBlogPageController as FontendFontendBlogPageController;
use App\Http\Controllers\Fontend\FrontendCandidatePageController;
use App\Http\Controllers\Fontend\FrontendCompanyPageController;
use App\Http\Controllers\Fontend\FrontendJobPageController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\Fontend\JobController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\FontendBlogPageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('get-cities/{country_id}', [LocationController::class, 'getCityOfCountry'])->name('get-cities');
Route::get('get-districts/{city_id}', [LocationController::class, 'getDistrictsOfCity'])->name('get-districts');


Route::get('companies', [FrontendCompanyPageController::class, 'index'])->name('companies.index');
Route::get('companies/{slug}', [FrontendCompanyPageController::class, 'show'])->name('companies.show');

Route::get('candidates', [FrontendCandidatePageController::class, 'index'])->name('candidates.index');
Route::get('candidates/{slug}', [FrontendCandidatePageController::class, 'show'])->name('candidates.show');

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
        Route::post('/profile/basic-info-update', [CandidateProfileController::class, 'basicInfoUpdate'])->name('profile.basic-info.update');
        Route::post('/profile/profile-info-update', [CandidateProfileController::class, 'profileInfoUpdate'])->name('profile.profile-info.update');
        Route::post('/profile/account-info-update', [CandidateProfileController::class, 'accountInfoUpdate'])->name('profile.account-info.update');
        Route::post('/profile/account-email-update', [CandidateProfileController::class, 'accountEmailUpdate'])->name('profile.account-email.update');
        Route::post('/profile/account-password-update', [CandidateProfileController::class, 'accountPasswordUpdate'])->name('profile.account-password.update');

        Route::resource('experience', CandidateExperienceController::class);
        Route::resource('education', CandidateEducationController::class);

        Route::get('applied-jobs', [CandidateMyJobController::class, 'index'])->name('applied-jobs.index');
        Route::get('bookmarked-jobs', [CandidateBookmarkController::class, 'index'])->name('bookmarked-jobs.index');
        Route::delete('bookmark-delete/{id}', [CandidateBookmarkController::class, 'destroy'])->name('job-bookmark.destroy');
    }


);

Route::delete('applied-delete/{id}', [CandidateMyJobController::class, 'destroy'])->name('job-apply.destroy');

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
        // Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile.index');
        Route::post('/profile/company-info', [CompanyProfileController::class, 'updateComInfo'])->name('profile.company-info');
        Route::post('/profile/founding-info', [CompanyProfileController::class, 'updateFoundingInfo'])->name('profile.founding-info');
        Route::post('/profile/account-info', [CompanyProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
        Route::post('/profile/password-update', [CompanyProfileController::class, 'updatePassword'])->name('profile.password-update');

        /** Job Routes */
        Route::get('applications/{id}', [JobController::class, 'applications'])->name('job.applications');
        Route::resource('jobs', JobController::class);
    }
);


/** Find a job route */
Route::get('jobs', [FrontendJobPageController::class, 'index'])->name('jobs.index');
Route::get('jobs/{slug}', [FrontendJobPageController::class, 'show'])->name('jobs.show');
Route::post('apply-job/{id}', [FrontendJobPageController::class, 'applyJob'])->name('apply-job.store');
Route::get('job-bookmark/{id}', [CandidateBookmarkController::class, 'save'])->name('job.bookmark');



/** Blog Routes */
Route::get('blogs', [FontendFontendBlogPageController::class, 'index'])->name('blogs.index');
Route::get('blogs/{slug}', [FontendFontendBlogPageController::class, 'show'])->name('blogs.show');

/** Count Routes */
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'sendMail'])->name('send-mail');
