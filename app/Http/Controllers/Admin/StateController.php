<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Services\Notify;
use Illuminate\View\View;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index()
    {
        $query= State::query();
        $query->with('country');
        $this->search($query,['name']);
        $State = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.location.state.index',compact('State'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Country= Country::all();
        return view('admin.location.state.create',compact('Country'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'country' => ['required', 'integer']
        ]);

        $state = new State();
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->save();
        
        Notify::createdNotifycation();

        return to_route('admin.state.index');
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
    public function edit(string $id) :View
    {
        $Country= Country::all();
        $State = State::findOrFail($id);
        return view('admin.location.state.edit',compact('Country','State'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'country' => ['required', 'integer']
        ]);

        $state = State::FindOrFail($id);
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->save();
        Notify::updatedNotifycation();

        return to_route('admin.state.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :Response
    {
        try{
            State::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=>'som things went wrong , try again'],500);
        }
    }
}
