<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\Searchable;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;
    public function index() :View
    {
        $query= JobCategory::query();
        $this->search($query,['name','slug']);
        $Category = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.job.job-category.index',compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('admin.job.job-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $request -> validate([
            'icon'=>['required','max:255'],
            'name'=>['required','max:255']
        ]);

        $category = new JobCategory();
        $category->icon=$request->icon;
        $category->name=$request->name;
        $category->save();

        Notify::createdNotifycation();

        return to_route('admin.job-categories.index');
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
        $Category = JobCategory::findOrFail($id);
        return view('admin.job.job-category.edit',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request -> validate([
            'icon'=>['required','max:255'],
            'name'=>['required','max:255']
        ]);

        $category = JobCategory::findOrFail($id);
        if($request->filled('icon')) $category->icon=$request->icon;
        $category->name=$request->name;
        $category->save();

        Notify::updatedNotifycation();

        return to_route('admin.job-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            JobCategory::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
