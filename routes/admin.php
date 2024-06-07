<?php


use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobExperienceController;
use App\Http\Controllers\Admin\JobRoleController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\SalaryTypeController;
use App\Http\Controllers\Admin\SearchMainController;
use App\Http\Controllers\Admin\SkillController;

use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\TagController;
use App\Models\Search_Main;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=> ['guest:admin'],'prefix'=> 'admin','as'=>'admin.'], function () {


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group(['middleware'=>['auth:admin'],'prefix'=>'admin','as'=>'admin.'],function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

    /** Dashboard Route */
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    /** Industry Type Route */
    Route::resource('industry-types', IndustryTypeController::class);

    /** Organization Type Route */
    Route::resource('organization-types', OrganizationTypeController::class);

    /** Country Route */
    Route::resource('country', CountryController::class);

    /** State Route */
    Route::resource('state', StateController::class);

    Route::resource('district', DistrictController::class);
    //Route::get('get-states/{country_id}', [LocationController::class, 'getStatesOfCountry'])->name('get-states');
    Route::get('get-cities/{country_id}', [LocationController::class, 'getCityOfCountry'])->name('get-cities');
    Route::get('get-districts/{city_id}', [LocationController::class, 'getDistrictsOfCity'])->name('get-districts');

    /** City Route */
    Route::resource('city', CityController::class);
    Route::get('get-states/{country_id}', [LocationController::class, 'getStatesOfCountry'])->name('get-states');

     /** Language Route */
    Route::resource('languages', LanguageController::class);

    /** Profession Route */
    Route::resource('professions', ProfessionController::class);

    /** Skill Route */
    Route::resource('skills', SkillController::class);

    /** Job Category Routes */
    Route::resource('job-categories', JobCategoryController::class);

    /** Education Routes */
    Route::resource('educations', EducationController::class);

    /** Job Type Routes */
    Route::resource('job-types', JobTypeController::class);

    /** Salary Type Routes */
    Route::resource('salary-types', SalaryTypeController::class);

    /** Job Role Routes */
    Route::resource('job-roles', JobRoleController::class);

    /** Job Experience Routes */
    Route::resource('job-experiences', JobExperienceController::class);

    /** Job Tag */
    Route::resource('job-tags', TagController::class);

    /** Job Routes */
    Route::post('job-status/{id}', [JobController::class, 'changeStatus'])->name('job-status.update');
    Route::resource('jobs', JobController::class);

    /** Blog Routes */
    Route::resource('blogs', BlogController::class);

      /** Hero Section */
      Route::resource('hero', HeroController::class);
});

