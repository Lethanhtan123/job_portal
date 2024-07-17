<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Job;
use App\Models\Language;
use App\Models\Skill;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCandidatePageController extends Controller
{
    function index(Request $request): View
    {
        // dd($request->all());

        $skills = Skill::all();

        $experiences = Experience::all();

        $languages = Language::all();

        $query = Candidate::query();
        $query->where(['profile_complete' => 1, 'visibility' => 1]);

        if ($request->has('skills') && $request->filled('skills')) {
            $ids = Skill::whereIn('slug', $request->skills)->pluck('id')->toArray();


            $query->whereHas('skills', function ($subquery) use ($ids) {
                $subquery->whereIn('skill_id', $ids);
            });
        }

        if ($request->has('experience') && $request->filled('experience')) {
            $query->where('experience_id', $request->experience);
        }

        if ($request->has('languages') && $request->filled('languages')) {
            $ids = Language::whereIn('slug',
                $request->languages
            )->pluck('id')->toArray();
            $query->whereHas('languages', function ($subquery) use ($ids) {
                $subquery->whereIn('language_id', $ids);
            });
        }

        $candidates = $query->paginate(12);

        return view('fontend.pages.candidate-index', compact('candidates', 'skills', 'experiences', 'languages'));
    }

    function show(string $slug): View
    {
        $candidate = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();

        return view('fontend.pages.candidate-details', compact('candidate'));
    }


    function show2(string $slug,string $id): View
    {
        $candidate = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        $job = Job::where('id', $id)->firstOrFail();
        $jobapply = AppliedJob::where('job_id', $id)->first();


        return view('fontend.pages.candidate-details2', compact('candidate','job','jobapply'));
    }

    public function ReplyUpdate(Request $request,string $id)
    {
        $reply = AppliedJob::findOrFail($id);

        $request->validate([
        'name' => ['required', 'max:255'],
        ]);
        $reply->company_reply = $request->input('name');
        $reply->save();

        Notify::replyNotifycation();

        return redirect()->back();

    }

}
