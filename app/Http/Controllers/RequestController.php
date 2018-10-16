<?php

namespace App\Http\Controllers;

use App\PatientRequest;
use Illuminate\Http\Request;
use Auth;
use App\Documents;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patientrequests = PatientRequest::paginate(10);
        $error_resp = '0';
        $request_no = $request->request_no;
        $fromDate = $request->from;
        $toDate = $request->to;
        
        if (!is_null($request_no) ) 
        {  
            $patientrequests = PatientRequest::where('request_no', $request_no)->paginate(10);
            if(count($patientrequests) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fromDate) && !is_null($toDate) )
        {
            $patientrequests = PatientRequest::whereBetween('created_at', [$fromDate, $toDate])->paginate(10);
            if(count($patientrequests) == 0 ){
                $error_resp = '1';
            }
        }



        if( !is_null($request_no) &&  !is_null($fromDate) && !is_null($toDate) )
        {
            $patientrequests = PatientRequest::where('request_no', $request_no)->whereBetween('created_at', [$fromDate, $toDate])->paginate(10);

            if(count($patientrequests) == 0 ){
                $error_resp = '1';
            }
        }

        return view('Requests.index',compact('patientrequests','error_resp'));
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
            $request_no = 'Req' . '/'.$patientrequest->id. '/' . date("y") . date("m") . sprintf('%05d',rand(1000,10000));

            PatientRequest::where('id',$patientrequest->id)->update(['request_no' => $request_no]);

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
        $documents = Documents::all();
        return view('Requests.show',compact('patientrequest','documents'));
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
        $patientrequest = PatientRequest::where('id',$request->request_id)->update(['document_id' => $request->document]);
        
        if($patientrequest){
            session()->flash('status','Request updated !');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deletedpatientrequest = PatientRequest::find($request->request_id);

        $deletedpatientrequest->delete();

        if ($deletedpatientrequest->trashed()) {
            session()->flash('status','Request deleted !');
            return back();
        }
    }
}
