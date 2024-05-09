<?php

use App\Http\Controllers\Fontend\CandidateDashboardController;
use App\Http\Controllers\Fontend\CandidateProfileController;
use App\Http\Controllers\Fontend\CompanyDashboardController;
use App\Http\Controllers\Fontend\CompanyFrofileController;
use App\Http\Controllers\Fontend\CompanyProfileController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\ProfileController;
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
    }
);


