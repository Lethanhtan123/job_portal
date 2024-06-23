<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactMailRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index() : View {
        return view('fontend.pages.contact');
    }
    function sendMail(ContactMailRequest $request) {
        Mail::to(config('settings.site_email'))->send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

        return response(['message' => 'Message sent successfully'], 200);
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
