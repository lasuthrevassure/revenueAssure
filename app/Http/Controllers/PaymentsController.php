<?php

namespace App\Http\Controllers;

use App\Payments;
use App\PatientRequest;
use Illuminate\Http\Request;
use App\Documents;
use Auth;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payments = Payments::paginate(10);
        $documents = Documents::all();
        $error_resp = '0';
        $transaction_id = $request->transaction_id;
        $fromDate = $request->from;
        $toDate = $request->to;
        $document = $request->document;
        $bill_no = $request->bill_no;
        
        if (!is_null($transaction_id) ) 
        {  
            $payments = Payments::where('transaction_id', $transaction_id)->paginate(10);
            if(count($payments) == 0 ){
                $error_resp = '1';
            }
        }

        if (!is_null($document) ) 
        {  
            $payments = Payments::whereHas('request', 
                function ($query) use ($request) {
                    $query->where('document_id', $request->document);
                })->paginate(10);

            if(count($payments) == 0 ){
                $error_resp = '1';
            }
        }

        if (!is_null($bill_no) ) 
        {  
            $payments = Payments::where('bill_reference', $bill_no)->paginate(10);
            if(count($payments) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fromDate) && !is_null($toDate) )
        {
            $payments = Payments::whereBetween('created_at', [$fromDate, $toDate])->paginate(10);
            if(count($payments) == 0 ){
                $error_resp = '1';
            }
        }



        if( !is_null($transaction_id) &&  !is_null($fromDate) && !is_null($toDate) )
        {
            $payments = Payments::where('transaction_id', $transaction_id)->whereBetween('created_at', [$fromDate, $toDate])->paginate(10);

            if(count($payments) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($document) &&  !is_null($fromDate) && !is_null($toDate) )
        {
            $payments = Payments::whereHas('request', 
            function ($query) use ($request) {
                $query->where('document_id', $request->document);
            })->whereBetween('created_at', [$fromDate, $toDate])->paginate(10);

            if(count($payments) == 0 ){
                $error_resp = '1';
            }
        }

        return view('Payments.index',compact('payments','error_resp','documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function payemntRequests(Request $request)
    {
        $requests = PatientRequest::where('status','0')->paginate(10);

        $error_resp = '0';
        $request_no = $request->request_no;
        $fromDate = $request->from;
        $toDate = $request->to;
        
        if (!is_null($request_no) ) 
        {  
            $requests = PatientRequest::where([
                ['status', '0'],
                ['request_no', $request_no]
            ])->paginate(10);

            if(count($requests) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($fromDate) && !is_null($toDate) )
        {
            $requests = PatientRequest::where('status','0')->whereBetween('created_at', [$fromDate, $toDate])->paginate(10);
            if(count($requests) == 0 ){
                $error_resp = '1';
            }
        }



        if( !is_null($request_no) &&  !is_null($fromDate) && !is_null($toDate) )
        {
            $requests = PatientRequest::where([
                ['status', '0'],
                ['request_no', $request_no]
            ])->whereBetween('created_at', [$fromDate, $toDate])->paginate(10);

            if(count($requests) == 0 ){
                $error_resp = '1';
            }
        }

        return view('Payments.requests',compact('requests','error_resp'));
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
    public function store(Request $request)
    {
        $id = $request->request_id;
        $payment = Payments::create([
            'request_id' => $id,
            'user_id' => Auth::id(),
            'transaction_id' => $request->transaction_id,
            'receipt_no' => $request->receipt_no,
            'bill_reference' => $request->bill_reference,
            'amount' => $request->amount

        ]);

        if($payment){
            PatientRequest::where('id',$id)->update(['status' => '1']);
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
    public function show($id)
    {
        $payment = Payments::findOrFail($id);
        return view('Payments.show',compact('payment'));
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
