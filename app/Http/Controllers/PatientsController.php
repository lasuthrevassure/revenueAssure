<?php

namespace App\Http\Controllers;

use App\Patients;
use App\States;
use App\Locals;
use App\Documents;
use Session;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = Patients::paginate(10);
        $documents = Documents::all();
        $error_resp = '0';
        $fullname = $request->fullname;
        $regno = $request->reg_no;
        $dob = $request->dob;

        $names = explode(" ", $request->fullname);
        
        if (!is_null($fullname) ) 
        {  
            $patients = Patients::whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);
            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($regno) )
        {
            $patients = Patients::where('registration_no', $regno)->paginate(10);
            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        
        if( !is_null($dob) )
        { 
            $patients = Patients::where('dob', $dob)->paginate(10);
            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fullname) &&  !is_null($regno) && !is_null($dob) )
        {
            $patients = Patients::where([
                ['registration_no', $regno],
                ['dob', $dob]
            ])->whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($regno) && !is_null($dob) )
        {
            $patients = Patients::where([
                ['registration_no', $regno],
                ['dob', $dob]
            ])->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fullname) &&  !is_null($regno) )
        {
            $patients = Patients::where('registration_no', $regno)->whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fullname) &&  !is_null($dob) )
        {
            $patients = Patients::where('dob', $dob)->whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);
            
            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        return view('patients.all',compact('patients','documents','error_resp'));
    }

    public function searchPatient(Request $request)
    {
        $documents = Documents::all();
        $patients = Patients::paginate(10);
        $error_resp = '0';
        $fullname = $request->fullname;
        $regno = $request->reg_no;
        $dob = $request->dob;

        $names = explode(" ", $request->fullname);
        
        if (!is_null($fullname) ) 
        {  
            $patients = Patients::whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);
            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($regno) )
        {
            $patients = Patients::where('registration_no', $regno)->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        
        if( !is_null($dob) )
        { 
            $patients = Patients::where('dob', $dob)->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fullname) &&  !is_null($regno) && !is_null($dob) )
        {
            $patients = Patients::where([
                ['registration_no', $regno],
                ['dob', $dob]
            ])->whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($regno) && !is_null($dob) )
        {
            $patients = Patients::where([
                ['registration_no', $regno],
                ['dob', $dob]
            ])->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fullname) &&  !is_null($regno) )
        {
            $patients = Patients::where('registration_no', $regno)->whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);

            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fullname) &&  !is_null($dob) )
        {
            $patients = Patients::where('dob', $dob)->whereIn('firstname', $names)->whereIn('lastname', $names)->paginate(10);
            
            if(count($patients) == 0 ){
                $error_resp = '1';
            }
        }

        return view('patients.searchpat',compact('documents','patients','error_resp'));
    }
 
 
 
    public function search(Request $request)
    {
        if($request->ajax())
        {
        
            $output="";
            $patient_detail = "";
            $no_res = "";

            $patients =Patients::where('registration_no','LIKE','%'.$request->search."%")
            ->orWhere('lastname','LIKE','%'.$request->search."%")
            ->orWhere('firstname','LIKE','%'.$request->search."%")
            ->orWhere('dob','LIKE','%'.$request->search."%")
            ->get();

            $total_row = $patients->count();
            
            if($total_row > 0)
            
            {
                foreach ($patients as $key => $patient) {
                
                    $output.='
                    <tr>
                        <th scope="row">'.$key.'</th>
                        <td>'.$patient->firstname. ' '. $patient->lastname .'</td>
                        <td>'.$patient->registration_no.'</td>
                        <td>'.$patient->gender.'</td>
                        <td>'.$patient->email.'</td>
                        <td>'.$patient->dob.'</td>
                        <td><a href="" data-toggle="modal" data-target="#certtifcatemodal"  data-id="'. $patient->id.'">Initiate Request</a></td>
                    </tr>
                    ';

                    $patient_detail = $patient->id;
            
                }
                

            }else
            {
                $no_res = '
                    <div class="row justify-content-center" style="height:30vh;"> 
                        <img src="'.url('assets/image/empty.svg').'" class="thought">
                    </div>
                    <p class="text-center pt-5 size">No Record Found</p>
                    <p class="text-center pb-5 size2">Try changing the filter or search term  or <span><a href="'.route('addpatient').'">Register Patient</a> </span></p>
                ';
            }
            
            $data = array(
                'table_data'  => $output,
                'patient' => $patient_detail,
                'no_res' => $no_res
               );

            return response()->json($data);
 
 
        }
 
    }

    public function fetchlga($id)
    {
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

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email|unique:patients',
            'phone' => 'required|max:14',
            'address' => 'required',
            'dob' => 'required',
        ]);

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
            
        ]);

        if($patient){
            $joe = rand(1000,10000) . $patient->id .'/'.date("m") . '/'. date("y");

            Patients::where('id',$patient->id)->update(['registration_no' => $joe]);

            Session::flash('status','Patient has been registered sucessfully');

            return redirect('patient');
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
    public function show($id)
    {
        $patient = Patients::findOrFail($id);
        $states = States::all();
        return view('Patients.patient',compact('patient','states'));
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
    public function update(Request $request)
    {
        $patient = Patients::where('id',$request->patient_id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phoneno' => $request->phone,
            'address' => $request->address,
            'lga_id' => $request->lga,
            'state_id' => $request->state,
            
        ]);

        if($patient){
            Session::flash('status','Patient details updated sucessfully');
            return back();
        }else{
            Session::flash('error','Error updating patient');
            return back();
        }
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
