<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\Searchable;
use App\Models\OrganizationType;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;


    public function index() :View
    {
        $query= OrganizationType::query();
        $this->search($query,['name']);
        $OrganizationType = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.organization-type.index',compact('OrganizationType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization-type.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255','unique:organization_types,name']
        ]);
        $type = new OrganizationType();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();

        return to_route('admin.organization-types.index');
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
        $OrganizationType = OrganizationType::findOrFail($id);
        return view('admin.organization-type.edit',compact('OrganizationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','max:255','unique:organization_types,name,'.$id]
        ]);
        $type = OrganizationType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotifycation();

        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :Response
    {
        try{
            OrganizationType::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
