<?php

namespace App\Http\Controllers;

use App\PatientRequest;
use Illuminate\Http\Request;
use Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientrequests = PatientRequest::all();
        return view('Requests.index',compact('patientrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientrequest = PatientRequest::create([
            'user_id' => Auth::id(),
            'patient_id' => $request->patient_id,
            'document_id' => $request->document
        ]);
        
        if($patientrequest){
            session()->flash('status','Patient request made !');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patientrequest = PatientRequest::findOrFail($id);
        return view('Requests.show',compact('patientrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientRequest $patientrequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
