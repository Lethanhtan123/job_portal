<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\CandidateAccountInfoUpdateRequest;
use App\Http\Requests\Fontend\CandidateBasicProfileUpdateRequest;
use App\Http\Requests\Fontend\CandidateProfileInfoUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;


class CandidateProfileController extends Controller
{

    use FileUploadTrait;

    function index(): View
    {
        $candidate = Candidate::with(['skills'])->where('user_id', auth()->user()->id)->first();
        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();
        $candidateEducations = CandidateEducation::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();


        $experiences = Experience::all();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();
        $countries = Country::all();
        $cities = City::where('country_id',$candidate?->country)->get();
        $districts = District::where('city_id',$candidate?->city)->get();

        return view('fontend.candidate-dashboard.profile.index', compact('candidate', 'experiences', 'professions', 'skills', 'languages', 'candidateExperiences', 'candidateEducations', 'countries','cities','districts'));
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

        $this->updateProfileStatus();

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

        $this->updateProfileStatus();

        Notify::updatedNotifycation();

        return redirect()->back();
    }

    //account info update
    function accountInfoUpdate(CandidateAccountInfoUpdateRequest $request): RedirectResponse
    {
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'country' => $request->country,
                'city' => $request->city,
                'disctrict' => $request->disctrict,
                'address' => $request->address,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
            ]
        );

        $this->updateProfileStatus();

        Notify::updatedNotifycation();

        return redirect()->back();
    }

    //account email update
    function accountEmailUpdate (Request $request) : RedirectResponse {
        $request->validate([
            'account_email' => ['required','email']
        ]);

        Auth::user()->update(['email'=>$request->account_email]);

        Notify::updatedNotifycation();

        return redirect()->back();

    }

    function accountPasswordUpdate (Request $request) : RedirectResponse {

        $request->validate([
            'password' =>  ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);

        Notify::updatedNotifycation();

        return redirect()->back();
    }

    //update profile complete
    function updateProfileStatus() : void {
        if(isCandidateProfileComplete()) {
          $candidate =  Candidate::where('user_id', auth()->user()->id)->first();
            $candidate->profile_complete = 1;
            $candidate->visibility = 1;
            $candidate->save();
        }
    }
}
