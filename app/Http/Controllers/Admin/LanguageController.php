<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Searchable;

    public function index() : View
    {
        $query = Language::query();
        $this->search($query, ['name']);
        $languages = $query->Orderby('id', 'DESC')->paginate(10);
        return view('admin.language.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:languages,name']
        ]);
        $lang = new Language();
        $lang->name = $request->name;
        $lang->save();

        Notify::createdNotifycation();

        return to_route('admin.languages.index');
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $language = Language::findOrFail($id);
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:languages,name,' .$id]
        ]);
        $lang = Language::findOrFail($id);
        $lang->name = $request->name;
        $lang->save();

        Notify::updatedNotifycation();


        return to_route('admin.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try {
            Language::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Somethings went wrong, please try again!'], 500);
        }
    }
}