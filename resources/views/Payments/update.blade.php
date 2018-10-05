@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Payments</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Payments</li>
        <li class="breadcrumb-item"><a href="#">Update</a></li>
    </ul>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Update Payments</h3>
                <form class="form-horizontal" action="{{route('createpayment',$request->id)}}" method="post">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group row">
                            <label class="control-label col-md-3">Amount</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="amount" value="{{$request->document->amount}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tansaction ID</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="transaction_id" placeholder="Enter transaction id" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Receipt No</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="receipt_no" type="text" placeholder="Enter receipt no" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Bill Reference</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="bill_reference" type="text" placeholder="Enter bill reference">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Patient Joe No</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="patient_joe_number" type="text" value="{{$request->patient->joe_number}}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ URL::previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>   
        </div>
    </div>
@stop

@section('script')
<script>
	$(document).ready(function() {
        $('.paymentmana').addClass("is-expanded");
    });

</script>

@stop