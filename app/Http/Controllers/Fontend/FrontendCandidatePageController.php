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
        $candidates=Candidate::Where(['profile_completion'=>0,'visibility'=>0])->get();
        return view('fontend.pages.candidate-index',compact('candidates'));
    }
}
