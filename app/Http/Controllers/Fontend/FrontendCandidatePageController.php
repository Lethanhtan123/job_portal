<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCandidatePageController extends Controller
{
    function index(): View
    {
        $candidates=Candidate::where(['profile_complete'=>1,'visibility'=>1])->get();
        return view('fontend.pages.candidate-index',compact('candidates'));
    }

    function show(string $slug) : View
     {
        $candidate = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();

        return view('fontend.pages.candidate-details', compact('candidate'));
    }
}
