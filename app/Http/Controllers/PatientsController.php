<?php

namespace App\Http\Controllers;

use App\Patients;
use App\States;
use App\Locals;
use Session;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::all();
        return view('patients.all',compact('patients'));
    }

    public function fetchlga($id){
        $lga = Locals::where('state_id',$id)->get();
        if($lga){
            return response()->json($lga);
        }
        else{
            return [];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = States::all();
        return view('patients.new',compact('states'));
    }

    public function searchPatient()
    {
        return view('patients.searchpat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $joe = rand(1000,10000) .'/'.date("m") . '/'. date("y");
        $patient = Patients::create([
            'title' => $request->title,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'email' => $request->email,
            'phoneno' => $request->phone,
            'address' => $request->address,
            'lga_id' => $request->lga,
            'state_id' => $request->state,
            'joe_number' => $joe,
        ]);

        if($patient){
            Session::flash('status','Patient registered');
            return back();
        }else{
            Session::flash('error','Error registering patient');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
