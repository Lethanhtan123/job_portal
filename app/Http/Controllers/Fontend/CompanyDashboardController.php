<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\view;

class CompanyDashboardController extends Controller
{
    function index() : view{
        return view('fontend.company-dashboard.dashboard');
    }
}