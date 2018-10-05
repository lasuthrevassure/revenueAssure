<?php

namespace App\Http\Controllers;

use App\Payments;
use App\PatientRequest;
use Illuminate\Http\Request;
use Auth;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payments::all();
        return view('Payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function payemntRequests()
    {
        $requests = PatientRequest::where('status','0')->get();
        return view('Payments.requests',compact('requests'));
    }

    public function create($id)
    {
        $request = PatientRequest::findOrFail($id);
        return view('Payments.update',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $payment = Payments::create([
            'request_id' => $id,
            'user_id' => Auth::id(),
            'transaction_id' => $request->transaction_id,
            'receipt_no' => $request->receipt_no,
            'bill_reference' => $request->bill_reference,
            'amount' => $request->amount

        ]);

        if($payment){
            session()->flash('status','payment updated !');
            return redirect('payments/requests');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
