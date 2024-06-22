<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\JobCreateRequest;
use App\Models\AppliedJob;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\District;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobRole;
use App\Models\JobSkills;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\SalaryType;
use App\Models\Skill;
use App\Models\Tag;
use App\Services\Notify;
use App\Traits\Searchable;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\View\View;


class JobController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Job::query();
        $query->withCount('applications');
        $this->search($query, ['title', 'slug']);
        $jobs = $query->where('company_id', auth()->user()->company?->id)->orderBy('id', 'DESC')->paginate(20);
        return view('fontend.company-dashboard.job.index', compact('jobs'));
    }

    function applications(string $id): View
    {
        $applications = AppliedJob::where('job_id', $id)->paginate(20);

        $jobTitle = Job::select('title')->where('id', $id)->first();

        return view('fontend.company-dashboard.applications.index', compact('applications', 'jobTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View|RedirectResponse
    {
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        // $states = State::all();
        $districts = District::all();
        $cities = City::all();
        $salaryTypes = SalaryType::all();
        $experiences = Experience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('fontend.company-dashboard.job.create', compact(
            'companies',
            'categories',
            'countries',
            'salaryTypes',
            'experiences',
            'jobRoles',
            'educations',
            'jobTypes',
            'tags',
            'cities',
            'districts',
            // 'states',
            'skills'

        ));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //dd($request->all());
        $job = new Job();
        $job->title = $request->title;
        $job->company_id =auth()->user()->company->id;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        // $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->district_id = $request->district;
        $job->address = $request->address;

        $job->salary_mode = $request->salary_mode;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->custom_salary = $request->custom_salary;
        $job->salary_type_id = $request->salary_type;
        $job->tygia = $request->tygia;


        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;
        $job->job_type_id = $request->job_type;
        $job->featured = $request->featured;
        $job->highlight = $request->highlight;
        $job->description = $request->description;
        $job->status = 'active';
        $job->save();

         // insert tags
         foreach($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        // insert skills
        foreach($request->skills as $skill) {
            $createSkill = new JobSkills();
            $createSkill->job_id = $job->id;
            $createSkill->skill_id = $skill;
            $createSkill->save();
        }

        Notify::createdNotifycation();

        return to_route('company.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job= Job::FindOrFail($id);
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        // $states = State::all();
        $districts = District::all();
        $cities = City::all();
        $salaryTypes = SalaryType::all();
        $experiences = Experience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('fontend.company-dashboard.job.edit', compact(
            'companies',
            'categories',
            'countries',
            'salaryTypes',
            'experiences',
            'jobRoles',
            'educations',
            'jobTypes',
            'tags',
            'cities',
            'districts',
            // 'states',
            'skills',
            'job'

        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $job = Job::findOrFail($id);
        $job->title = $request->title;
        $job->company_id =auth()->user()->company->id;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        // $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->district_id = $request->district;
        $job->address = $request->address;

        $job->salary_mode = $request->salary_mode;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->custom_salary = $request->custom_salary;
        $job->salary_type_id = $request->salary_type;
        $job->tygia = $request->tygia;


        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;
        $job->job_type_id = $request->job_type;
        $job->featured = $request->featured;
        $job->highlight = $request->highlight;
        $job->description = $request->description;
        $job->status = 'active';
        $job->save();

         // insert tags
         foreach($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        // insert skills
        foreach($request->skills as $skill) {
            $createSkill = new JobSkills();
            $createSkill->job_id = $job->id;
            $createSkill->skill_id = $skill;
            $createSkill->save();
        }

        Notify::updatedNotifycation();

        return to_route('company.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::findOrFail($id)->delete();
        // try {

        //     Notify::deletedNotifycation();
        //     return response(['message' => 'success'], 200);

        // }catch(\Exception $e) {
        //     logger($e);
        //     return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        // }
    }
}
