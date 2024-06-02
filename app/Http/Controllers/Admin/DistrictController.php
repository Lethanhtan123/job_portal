<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index()
    {
        $query= District::query();
        $query->with('city');
        $this->search($query,['name']);
        $District = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.location.district.index',compact('District'));
    }

    /**
     * Show the form for creating a new resource.w
     */
    public function create()
    {
        $City= City::all();
        return view('admin.location.district.create',compact('City'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'district' => ['required', 'string', 'max:255']
        ]);

        $district = new District();
        $district->name = $request->district;
        $district->city_id = $request->city;
        $district->save();

        Notify::createdNotifycation();

        return to_route('admin.district.index');
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
        $District= District::FindOrFail($id);
        $City= City::all();
        //$State= State::where('country_id',$City->country_id)->get();
        return view('admin.location.district.edit',compact('District','City'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request->validate([
            'district' => ['required', 'string', 'max:255']
        ]);

        $district = District::FindOrFail($id);
        $district->name = $request->district;
        $district->city_id = $request->city;
        $district->save();

        Notify::updatedNotifycation();

        return to_route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            District::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
