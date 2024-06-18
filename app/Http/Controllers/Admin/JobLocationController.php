<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobLocationCreateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\JobLocation;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobLocationController extends Controller
{
    use FileUploadTrait;

    // function __construct()
    // {
    //     $this->middleware(['permission:sections']);
    // }

    /**
     * Display a listing of the resource.
     */
    use Searchable;

    public function index() : View
    {
        $query= JobLocation::query();
        $this->search($query,['name','country','district','city','status']);
        $locations = JobLocation::paginate(20);
        return view('admin.job-location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();

        return view('admin.job-location.create', compact('countries','districts','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobLocationCreateRequest $request)
    {
        $imagePath = $this->uploadFile($request, 'image');

        $location = new JobLocation();
        $location->image = $imagePath;
        $location->country_id = $request->country;
        $location->city_id = $request->city;
        $location->district_id = $request->district;
        $location->status = $request->status;
        $location->save();

        Notify::createdNotifycation();

        return to_route('admin.job-location.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = JobLocation::findOrFail($id);
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        return view('admin.job-location.edit', compact('location', 'countries','districts','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobLocationCreateRequest $request, string $id)
    {
        $imagePath = $this->uploadFile($request, 'image');

        $location = JobLocation::findOrFail($id);
        if(!empty($imagePath)) $location->image = $imagePath;
        $location->country_id = $request->country;
        $location->city_id = $request->city;
        $location->district_id = $request->district;
        $location->status = $request->status;
        $location->save();

        Notify::updatedNotifycation();

        return to_route('admin.job-location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            JobLocation::findOrFail($id)->delete();
            Notify::deletedNotifycation();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}
