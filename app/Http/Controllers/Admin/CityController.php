<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Traits\Searchable;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index()
    {
        $query= City::query();
        $query->with('country','state');
        $this->search($query,['name']);
        $City = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.location.city.index',compact('City'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Country= Country::all();
        $State= State::all();
        return view('admin.location.city.create',compact('Country','State'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255']
        ]);

        $city = new City();
        $city->name = $request->city;
        $city->state_id = $request->state;
        $city->country_id = $request->country;
        $city->save();

        Notify::createdNotifycation();

        return to_route('admin.city.index');
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
        $City= City::FindOrFail($id);
        $Country= Country::all();
        $State= State::where('country_id',$City->country_id)->get();
        return view('admin.location.city.edit',compact('State','City','Country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255']
        ]);

        $city = City::FindOrFail($id);
        $city->name = $request->city;
        $city->state_id = $request->state;
        $city->country_id = $request->country;
        $city->save();

        Notify::updatedNotifycation();

        return to_route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try{
            City::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=> 'Somethings went wrong, please try again!'],500);
        }
    }
}
