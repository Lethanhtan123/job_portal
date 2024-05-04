<?php

namespace App\Http\Controllers\Admin;
use App\Services\Notify;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index()
    {
        $query= Country::query();
        $this->search($query,['name']);
        $Country = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.location.country.index',compact('Country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.location.country.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $request->validate([
            'name'=>['required','max:255','unique:countries,name']
        ]);
        $type = new Country();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();
        return to_route('admin.country.index');
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
        $Country = Country::findOrFail($id);
        return view('admin.location.country.edit',compact('Country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','max:255','unique:countries,name,'.$id]
        ]);
        $type = Country::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotifycation();

        return to_route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Country::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=>'som things went wrong , try again'],500);
        }
    }
}
