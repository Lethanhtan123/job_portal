<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Company;
use App\Models\Country;
use App\Models\Hero;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    //return home view
    function index() : View{
        $hero = Hero::first();
        $countries = Country::all();
        $jobCategories = JobCategory::all();
        $jobCount= Job::Count();

        $popularJobCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where('status', 'active')
                  ->where('deadline', '>=', now()->toDateString());
        }])
        ->where('show_at_popular', 1)
        ->get();

        $featuredCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where('status', 'active')
                  ->where('deadline', '>=', now()->toDateString());
        }])
        ->where('show_at_featured', 1)
        ->take(10)->get();

        $companies = Company::with('companyCountry', 'jobs')
        ->select('id', 'logo', 'name', 'slug', 'country', 'profile_completion', 'visibility')
        ->withCount(['jobs' => function ($query) {
            $query->where(['status' => 'active'])
                ->where('deadline', '>=', date('Y-m-d'));
        }])->where(['profile_completion' => 1, 'visibility' => 1])->latest()->take(15)->get();

        $locations = JobLocation::where(['status' => 'hot'])->latest()->take(8)->get();
        $blogs = Blog::latest()->take(6)->get();


        return view('fontend.home.index' ,
        compact(
            'hero',
            'jobCategories',
            'countries',
            'jobCount',
            'popularJobCategories',
            'featuredCategories',
            'companies',
            'locations',
            'blogs'

        ));
    }
}
