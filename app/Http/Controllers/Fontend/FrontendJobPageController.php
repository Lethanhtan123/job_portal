<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Response;

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
            $query->where('country_id', $request->country);
        }

        if($request->has('city') && $request->filled('city')) {
            $query->where('city_id', $request->city);
            $selectedCities = City::where('country_id', $request->country)->get();
            $selectedDistricts = District::where('city_id', $request->city)->get();
        }

        if($request->has('district') && $request->filled('district')) {
            $query->where('district_id', $request->district);
        }

        if($request->has('category') && $request->filled('category')) {
            if(is_array($request->category)){
                $categoryIds = JobCategory::whereIn('slug', $request->category)->pluck('id')->toArray();
                $query->whereIn('job_category_id', $categoryIds);
            }else {
                $category = JobCategory::where('slug', $request->category)->first();
                $query->where('job_category_id', $category->id);
            }
        }

        if ($request->has('min_salary') && $request->filled('min_salary') && $request->min_salary > 0) {
            $query->where(function($q) use ($request) {
                $q->where('min_salary', '>=', $request->min_salary)
                  ->orWhere('max_salary', '>=', $request->min_salary);
            });
        }

        if($request->has('jobtype') && $request->filled('jobtype')) {
            $typeIds = JobType::whereIn('slug', $request->jobtype)->pluck('id')->toArray();
            $query->whereIn('job_type_id', $typeIds);
        }

        $jobs = $query->orderBy('id','DESC')->paginate(6);
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
        $alreadyApplied = AppliedJob::where(['job_id' => $job->id, 'candidate_id' => auth()->user()?->id])->exists();
        //$jopApplied = AppliedJob::where(['job_id' => $job->id, 'candidate_id' => auth()->user()?->id])->firstOrFail();

        return view('fontend.pages.job-show', compact('job','openJobs', 'alreadyApplied',));
    }

    function show2(string $slug) : View {
        $job = Job::where('slug', $slug)->firstOrFail();
        $openJobs = Job::where('company_id', $job->company->id)->where('status', 'active')->where('deadline', '>=', date('d-m-Y'))->count();
        $alreadyApplied = AppliedJob::where(['job_id' => $job->id, 'candidate_id' => auth()->user()?->id])->exists();
        $jopApplied = AppliedJob::where(['job_id' => $job->id, 'candidate_id' => auth()->user()?->id])->firstOrFail();

        return view('fontend.pages.job-show2', compact('job','openJobs', 'alreadyApplied','jopApplied'));
    }

    function applyJob(string $id) {
        if(!auth()->check()) {
            throw ValidationException::withMessages(['Vui lòng đăng nhập để ứng tuyển.']);
        }

        $alreadyApplied = AppliedJob::where(['job_id' => $id, 'candidate_id' => auth()->user()?->id])->exists();
        if($alreadyApplied) {
            throw ValidationException::withMessages(['Bạn đã ứng tuyển công việc này!']);
        }

        $apllyJob = new AppliedJob();
        $apllyJob->job_id = $id;
        $apllyJob->candidate_id = auth()->user()->id;
        $apllyJob->save();

        return response(['message' => 'Ứng tuyển thành công!'], 200);
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
