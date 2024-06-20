<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateMyJobController extends Controller
{
    function index() : View {

        $appliedJobs = AppliedJob::with('job')->where('candidate_id',auth()->user()->id)->paginate();

        return view('fontend.candidate-dashboard.my-job.index',compact('appliedJobs'));
    }
}
