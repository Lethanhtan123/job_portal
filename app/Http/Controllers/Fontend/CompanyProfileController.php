<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\CompanyInfoUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;
use Auth;


class CompanyProfileController extends Controller
{

    use FileUploadTrait;

    function index(): View
    {
        $companyInfo = Company::where('user_id',auth()->user()->id)->first();
        return view('fontend.company-dashboard.profile.index',compact('companyInfo'));
    }

    function updateComInfo(CompanyInfoUpdateRequest $request)
    {

        $logoPath = $this->uploadFile($request, 'logo');

        $data = [];

        if (!empty($logoPath)) $data['logo'] = $logoPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
            $data['user_id']= auth()->user()->id;

        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        notify()->success('Update Successfully', 'Success!');
    
        return redirect()->back();
    }
}
