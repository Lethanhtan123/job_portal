<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\CandidateBasicProfileUpdateRequest;
use App\Http\Requests\Fontend\CandidateProfileInfoUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateProfileController extends Controller
{

    use FileUploadTrait;

    function index(): View
    {
        $candidate = Candidate::with(['skills'])->where('user_id', auth()->user()->id)->first();
        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();


        $experiences = Experience::all();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();

        return view('fontend.candidate-dashboard.profile.index', compact('candidate', 'experiences', 'professions', 'skills', 'languages', 'candidateExperiences'));
    }

    // uppdate basic info of cadidate
    function basicInfoUpdate(CandidateBasicProfileUpdateRequest $request): RedirectResponse
    {

        $imagePath = $this->uploadFile($request, 'profile_picture');
        $cvPath = $this->uploadFile($request, 'cv');

        $data = [];
        if (!empty($imagePath)) $data['image'] = $imagePath;
        if (!empty($cvPath)) $data['cv'] = $cvPath;
        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->birth_date;

        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        Notify::updatedNotifycation();

        return redirect()->back();
    }

    // update profile candidate
    function profileInfoUpdate(CandidateProfileInfoUpdateRequest $request): RedirectResponse
    {

        $data = [];

        $data['gender'] = $request->gender;
        $data['marital_status'] = $request->marital_status;
        $data['profession_id'] = $request->profession;
        $data['status'] = $request->availability;
        $data['bio'] = $request->biography;

        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );


        $candidate = Candidate::where('user_id', auth()->user()->id)->first();

        CandidateLanguage::where('candidate_id', $candidate->id)?->delete();

        foreach ($request->language_you_know as $lang) {
            $candidateLang = new CandidateLanguage();
            $candidateLang->candidate_id = $candidate->id;
            $candidateLang->language_id = $lang;
            $candidateLang->save();
        }

        CandidateSkill::where('candidate_id', $candidate->id)?->delete();

        foreach ($request->skill as $skillC) {
            $candidateSkill = new CandidateSkill();
            $candidateSkill->candidate_id =  $candidate->id;
            $candidateSkill->skill_id = $skillC;
            $candidateSkill->save();
        }

        // $this->updateProfileStatus();

        Notify::updatedNotifycation();

        return redirect()->back();
    }
}
