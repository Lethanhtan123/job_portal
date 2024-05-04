<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use Searchable;

    public function index() : View
    {
        $query = Profession::query();
        $this->search($query, ['name']);
        $professions = $query->Orderby('id', 'DESC')->paginate(10);

        return view('admin.profession.index',compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profession.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:professions,name']
        ]);
        $profession = new Profession();
        $profession->name = $request->name;
        $profession->save();

        Notify::createdNotifycation();

        return to_route('admin.professions.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $profession = Profession::findOrFail($id);
        return view('admin.profession.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:professions,name,' . $id]
        ]);
        $profession = Profession::findOrFail($id);
        $profession->name = $request->name;
        $profession->save();

        Notify::updatedNotifycation();

        return to_route('admin.professions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Profession::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Somethings went wrong, please try again!'], 500);
        }
    }
}
