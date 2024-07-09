<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\JobBookmark;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CandidateDashboardController extends Controller
{
    function index() : View{
        $jobAppliedCount = AppliedJob::where('candidate_id', auth()->user()->id)->count();
        $jobBookmarkCount = JobBookmark::where('candidate_id', auth()->user()->candidateProfile?->id)->count();
        return view('fontend.candidate-dashboard.dashboard',compact('jobAppliedCount','jobBookmarkCount'));
    }
}
