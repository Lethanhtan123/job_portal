<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCompanyPageController extends Controller
{
    function index(): View
    {
        $companies=Company::Where(['profile_completion'=>1,'visibility'=>1])->get();
        return view('fontend.pages.company-index',compact('companies'));
    }

    function show(string $slug): View
    {
        $company=Company::Where(['profile_completion'=>1,'visibility'=>1,'slug'=>$slug])->firstOrFail();

        return view('fontend.pages.company-details',compact('company'));
    }
}
