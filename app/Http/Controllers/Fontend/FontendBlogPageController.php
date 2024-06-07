<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FontendBlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    function index() : View {
        $query = Blog::query();
        $this->search($query, ['title', 'slug']);
        $blogs = $query->where('status', 1)->orderBy('id', 'DESC')->paginate(20);
        $featured = Blog::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->take(10)->get();

        return view('fontend.pages.blog-index', compact('blogs', 'featured'));
    }

    function show(string $slug) : View {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('fontend.pages.blog-details', compact('blog'));
    }
}
