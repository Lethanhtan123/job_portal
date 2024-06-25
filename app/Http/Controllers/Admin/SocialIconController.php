<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialIcon;
use App\Services\Notify;
use Illuminate\Http\Request;

class SocialIconController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware(['permission:site footer']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $icons = SocialIcon::paginate(20);

        return view('admin.social-icon.index', compact('icons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-icon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'string'],
            'url' => ['required']
        ]);

        $social = new SocialIcon();
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->save();

        Notify::createdNotifycation();
        return to_route('admin.social-icon.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $icon = SocialIcon::findOrFail($id);
        return view('admin.social-icon.edit', compact('icon'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'url' => ['required']
        ]);

        $social = SocialIcon::findOrFail($id);
        if($request->filled('icon')) $social->icon = $request->icon;
        $social->url = $request->url;
        $social->save();

        Notify::updatedNotifycation();
        return to_route('admin.social-icon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            SocialIcon::findOrFail($id)->delete();
            Notify::deletedNotifycation();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}
