<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;


class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Searchable;

    public function index() :View
    {
        $query= IndustryType::query();
        $this->search($query,['name']);
        $industryType = $query->Orderby('id','DESC')->paginate(10);
        return view('admin.industry-type.index',compact('industryType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {

        return view('admin.industry-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','max:255','unique:industry_types,name']
        ]);
        $type = new IndustryType();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotifycation();

        return to_route('admin.industry-types.index');
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
        $industryType = IndustryType::findOrFail($id);
        return view('admin.industry-type.edit',compact('industryType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','max:255','unique:industry_types,name,'.$id]
        ]);
        $type = IndustryType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotifycation();

        return to_route('admin.industry-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            IndustryType::findOrFail($id)->delete();
            Notify::deletedNotifycation();

            return response(['message'=>'success'],200);
        }catch(\Exception $e){
            logger($e);
            return response(['message'=>'som things went wrong , try again'],500);
        }
    }
}
