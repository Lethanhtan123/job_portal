<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\CompanyFoundingInfoUpdateRequest;
use App\Http\Requests\Fontend\CompanyInfoUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;
use Illuminate\Validation\Rules;
use App\Services\Notify;


use Auth;
use Illuminate\Http\RedirectResponse;

class CompanyProfileController extends Controller
{

    use FileUploadTrait;

    function index(): View
    {
        $companyInfo = Company::where('user_id', auth()->user()->id)->first();
        $IndustryType= IndustryType::all();
        $Country= Country::all();
        $State= State::all();
        $City= City::all();
        return view('fontend.company-dashboard.profile.index', compact('companyInfo','Country','IndustryType','City','State'));
    }

    function updateComInfo(CompanyInfoUpdateRequest $request): RedirectResponse
    {

        $logoPath = $this->uploadFile($request, 'logo');

        $data = [];

        if (!empty($logoPath)) $data['logo'] = $logoPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;


        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        if(isCompanyProfileComplete())
        {
            $companyProfile=Company::where('user_id',auth()->user()->id)->first();
            $companyProfile->profile_completion=1;
            $companyProfile->visibility=1;
            $companyProfile->save();
        }

        // notify()->success('Update Successfully', 'Success!');

        Notify::updatedNotifycation();

        return redirect()->back();
    }

    function updateFoundingInfo(CompanyFoundingInfoUpdateRequest $request) : RedirectResponse {
        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'industry_type_id' => $request->industry_type,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link
            ]
        );

        if(isCompanyProfileComplete()) {
            $companyProfile = Company::where('user_id', auth()->user()->id)->first();
            $companyProfile->profile_completion = 1;
            $companyProfile->visibility = 1;
            $companyProfile->save();
        }

        Notify::updatedNotifycation();

        return redirect()->back();
    }

    function updateAccountInfo(Request $request): RedirectResponse
    {

       $validatedData = $request->validate([
            'name' => ['required','string','max:50'],
            'email' => ['required', 'email'],
        ]);

        Auth::user()->update($validatedData);

        Notify::updatedNotifycation();

        return redirect()->back();

    }

    function updatePassword(Request $request): RedirectResponse
    {

         $request->validate([
            'password' =>  ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);

        Notify::updatedNotifycation();

        return redirect()->back();
    }
}
