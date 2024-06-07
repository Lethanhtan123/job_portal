<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendJobPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View {

        $countries = Country::all();
        $jobCategories = JobCategory::withCount(['jobs' => function($query) {
            $query->where('status', 'active')->where('deadline', '>=', date('Y-m-d'));
        }])->get();

        $JobType=JobType::all();
        $selectedCites = null;
        $selectedDistricts = null;

        $query = Job::query();
        $query->where(['status' => 'active'])
        ->where('deadline', '>=', date('Y-m-d'));

        if($request->has('search') && $request->filled('search')) {
            $query->where('title', 'like', '%'. $request->search . '%');
        }

        if($request->has('country') && $request->filled('country')) {
            $query->where('country', $request->country);
        }

        if($request->has('city') && $request->filled('city')) {
            $query->where('city', $request->city);
            $selectedCities = City::where('country_id', $request->country)->get();
            $selectedDistricts = District::where('city_id', $request->city)->get();
        }

        if($request->has('district') && $request->filled('district')) {
            $query->where('district', $request->district);
        }

        if($request->has('category') && $request->filled('category')) {
                $categoryIds = JobCategory::whereIn('slug', $request->category)->pluck('id')->toArray();
                $query->whereIn('job_category_id', $categoryIds);
        }

        if($request->has('min_salary') && $request->filled('min_salary') && $request->min_salary > 0) {
            $query->where('min_salary', '>=', $request->min_salary)->orWhere('max_salary', '>=', $request->min_salary);
        }

        if($request->has('jobtype') && $request->filled('jobtype')) {
            $typeIds = JobType::whereIn('slug', $request->jobtype)->pluck('id')->toArray();
            $query->whereIn('job_type_id', $typeIds);
        }

        $jobs = $query->paginate(6);
        return view('fontend.pages.jobs-index',compact('jobs','countries','jobCategories','selectedDistricts','selectedCites','JobType'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    function show(string $slug) : View {
        $job = Job::where('slug', $slug)->firstOrFail();
        $openJobs = Job::where('company_id', $job->company->id)->where('status', 'active')->where('deadline', '>=', date('d-m-Y'))->count();
        // $alreadyApplied = AppliedJob::where(['job_id' => $job->id, 'candidate_id' => auth()->user()?->id])->exists();
        return view('fontend.pages.job-show', compact('job','openJobs' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
