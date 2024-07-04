<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\view;
use Carbon\Carbon;

class CompanyDashboardController extends Controller
{
    function index(): View
    {
        $now = Carbon::now();
        $activePosts = Job::where('company_id', auth()->user()->company->id)->where('status','active')->where('deadline', '>=', $now)->count();
        $totalPosts = Job::where('company_id', auth()->user()->company->id)->count();
        $expiredPosts = Job::where('company_id', auth()->user()->company->id)->where('deadline', '<', $now)->count();
        return view('fontend.company-dashboard.dashboard', compact('activePosts', 'totalPosts', 'expiredPosts'));
    }
}
