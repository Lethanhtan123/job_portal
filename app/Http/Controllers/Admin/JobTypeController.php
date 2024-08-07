<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index() :View
    {
        $query= JobType::query();
        $this->search($query,['name','slug']);
        $Jobtype = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.job.job-type.index',compact('Jobtype'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job.job-type.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type = new JobType();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();
        return to_route('admin.job-types.index');
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
        $Jobtype = JobType::findOrFail($id);
        return view('admin.job.job-type.edit',compact('Jobtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type = JobType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();
        return to_route('admin.job-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            JobType::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
