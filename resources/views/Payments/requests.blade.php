@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Payments</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Payments</li>
        <li class="breadcrumb-item"><a href="#">Requests</a></li>
    </ul>
@stop
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Patient Registration No</th>
                    <th>Document Type</th>
                    <th>Document Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date Requested</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($requests as $patientrequest)
                    <tr>
                        <td>{{$patientrequest->patient->firstname}} {{$patientrequest->patient->lastname}}</td>
                        <td>{{$patientrequest->patient->registration_no}}</td>
                        <td>
                            @if($patientrequest->document->type == '1')
                                Certificate
                            @elseif($patientrequest->document->type == '2')
                                Report
                            @endif
                        </td>
                        <td>{{$patientrequest->document->name}}</td>
                        <td>{{$patientrequest->document->amount}}</td>
                        <td>In queue for payment</td>
                        <td>{{$patientrequest->created_at->format('d M Y h:i:a')}}</td>
                        <td><a href="{{route('createpayment',$patientrequest->id)}}" class="btn btn-xs btn-primary" >Update Payment</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@stop

@section('script')
<script type="text/javascript" src="{{asset('assets/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script>
	$(document).ready(function() {
            $('.paymentmana').addClass("is-expanded");
            $('.paymentRequest').addClass("active");
            
            
    });

</script>

@stop