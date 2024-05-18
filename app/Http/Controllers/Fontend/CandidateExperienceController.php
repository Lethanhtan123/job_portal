<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fontend\CandidateExperienceStoreRequest;
use App\Models\CandidateExperience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateExperienceStoreRequest $request): Response
    {
        $experience = new CandidateExperience();
        $experience->candidate_id = auth()->user()->candidateProfile->id;
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->responsibilities = $request->responsibilities;
        $experience->start = $request->start;
        $experience->end = $request->end;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;

        $experience->save();

        return response(['message', 'Create Successfully'], 200);
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
    public function edit(string $id): Response
    {
        $experience = CandidateExperience::findOrFail($id);
        return response($experience);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateExperienceStoreRequest $request, string $id)
    {

        $experience =  CandidateExperience::findOrFail($id);

        if(auth()->user()->candidateProfile->id !== $experience->candidate_id) {
            abort(404);
        }

        $experience->candidate_id = auth()->user()->candidateProfile->id;
        $experience->company = $request->company;
        $experience->department = $request->department;
        $experience->designation = $request->designation;
        $experience->responsibilities = $request->responsibilities;
        $experience->start = $request->start;
        $experience->end = $request->end;
        $experience->currently_working = $request->filled('currently_working') ? 1 : 0;

        $experience->save();

        return response(['message', 'Update Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            CandidateExperience::finOrFail($id)->dalete();
            return response(['message', 'Delete Successfully'], 500);
        } catch(\Exception $e) {
            logger($e);
            return response(['message', 'Something went wrong. Please try again!'], 500);
        }
    }
}
