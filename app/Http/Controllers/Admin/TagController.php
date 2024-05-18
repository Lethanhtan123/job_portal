<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;
use View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index() :ViewView
    {
        $query= Tag::query();
        $this->search($query,['name','slug']);
        $Jobtag = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.job.job-tag.index',compact('Jobtag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job.job-tag.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type = new Tag();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();
        return to_route('admin.job-tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Jobtag = Tag::findOrFail($id);
        return view('admin.job.job-tag.edit',compact('Jobtag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type =  Tag::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotifycation();
        return to_route('admin.job-tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Tag::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
