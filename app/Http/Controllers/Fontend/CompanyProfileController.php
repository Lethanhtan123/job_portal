<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\CompanyInfoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\FileUploadTrait;

class CompanyProfileController extends Controller
{

    use FileUploadTrait;

    function index(): View
    {
        return view('fontend.company-dashboard.profile.index');
    }

    function updateComInfo(CompanyInfoUpdateRequest $request)
    {

        $logoPath = $this->uploadFile($request, 'logo');
        
        dd($logoPath);
    }
}
