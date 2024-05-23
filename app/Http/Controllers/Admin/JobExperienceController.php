<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobExperience;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index() :View
    {
        $query= JobExperience::query();
        $this->search($query,['name','slug']);
        $Jobexperience = $query->paginate(10);
        return view('admin.job.job-experience.index',compact('Jobexperience'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job.job-experience.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type = new JobExperience();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();
        return to_route('admin.job-experiences.index');
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
        $Jobexperience = JobExperience::findOrFail($id);
        return view('admin.job.job-experience.edit',compact('Jobexperience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type =  JobExperience::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotifycation();
        return to_route('admin.job-experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            JobExperience::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
