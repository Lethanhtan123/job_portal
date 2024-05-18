<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalaryType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index() :View
    {
        $query= SalaryType::query();
        $this->search($query,['name','slug']);
        $Salarytype = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.job.salary-type.index',compact('Salarytype'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job.salary-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type = new SalaryType();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();
        return to_route('admin.salary-types.index');
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
        $Salarytype = SalaryType::findOrFail($id);
        return view('admin.job.salary-type.edit',compact('Salarytype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255']
        ]);
        $type =  SalaryType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotifycation();
        return to_route('admin.salary-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            SalaryType::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
