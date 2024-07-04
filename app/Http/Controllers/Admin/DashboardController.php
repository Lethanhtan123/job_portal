<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function index(): View
    {
        $totalCandidate = Candidate::count();
        $totalCompany = Company::count();
        $totalBlogs = Blog::count();
        $totalJobs = Job::count();
        $totalActiveJobs = Job::where('deadline', '>=', date('Y-m-d'))->count();
        $totalExpiredJobs = Job::where('deadline', '<', date('Y-m-d'))->count();
        $totalPendingJobs = Job::where('status','pending')->count();

        return view('admin.dashboard.index', compact('totalCandidate', 'totalCompany', 'totalJobs', 'totalActiveJobs', 'totalExpiredJobs','totalPendingJobs','totalBlogs'));
    }
}
