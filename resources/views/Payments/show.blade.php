@extends('layouts.master')
@section('head')
    <style>
        .backarr{
            text-decoration:none !important;
            color:black;
        }
    </style>
    
@stop
@section('content')
    <div class="container header">
        <div class="row justify-content-start">
            <h6><a href="{{route('payments')}}" class="backarr"><i class="fas fa-long-arrow-alt-left pr-2"></i>Back to Payment</a> </h6>
        </div>
    </div>


    <!-- view request body -->
    <h5 class="text-center mt-4">Payment</h5>

    <div class="container wrapper mb-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr style="padding-top:20px;">
                                <th scope="row">TRANSACTIO ID</th>
                                <td>{{$payment->transaction_id}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">RECEIP NO</th>
                                <td>{{$payment->receipt_no}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">AMOUNT</th>
                                <td>₦ {{$payment->amount}}</td>
                            </tr>
                            <tr>
                                <th scope="row">BILL REFERENCE</th>
                                <td>{{$payment->bill_reference}}</td>
                            </tr>
                            <tr>
                                <th scope="row">DATE</th>
                                <td>{{$payment->created_at->format('d M Y')}}</td>
                            </tr>

                            <tr>
                                <th scope="row">DOCUMENT NAME</th>
                                <td>{{$payment->request->document->name}}</td>
                            </tr>
                            
                            <tr>
                                <th scope="row">PAID BY</th>
                                <td>{{$payment->request->patient->firstname}} {{$payment->request->patient->lastname}}</td>
                            </tr>   
                                
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center mt-5 mb-4">
                    <button class="btn generate text-white">PRINT</button>
                </div>
            </div>
                
        </div>
    </div>
@stop

@section('script')
<script>
	$(document).ready(function() {
        $('.paymentmana').addClass("active");     
            
    });

</script>

@stop