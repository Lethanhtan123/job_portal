<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    //return home view
    function index() : View{
        return view('fontend.home.index');
    }
}
