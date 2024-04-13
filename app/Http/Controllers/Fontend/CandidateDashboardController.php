<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CandidateDashboardController extends Controller
{
    function index() : View{
        return view('fontend.candidate-dashboard.dashboard');
    }
}
