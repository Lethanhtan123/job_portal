<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hero;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    //return home view
    function index() : View{
        $hero = Hero::first();
        $countries = Country::all();
        $jobCategories = JobCategory::all();
        return view('fontend.home.index' ,compact('hero','jobCategories','countries'));
    }
}
