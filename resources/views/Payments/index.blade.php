@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Payments</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Payments</li>
        <li class="breadcrumb-item"><a href="#">All</a></li>
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
                    <th>Trasaction ID</th>
                    <th>Amount</th>
                    <th>Receipt No</th>
                    <th>Updated By</th>
                    <th>Document paid for</th>
                    <th>Patient name</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td><a href="{{route('viewpatient',$patient->id)}}">{{$payment->firstname}} </a></td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->receipt_no}}</td>
                        <td>{{$payment->user->name}}</td>
                        <td>{{$payment->request->documend->name}}</td>
                        <td>{{$payment->request->patient->firstname}} {{$patient->request->patient->lastname}}</td>
                        <td>{{$payment->created_at->format('d M Y h:i:a')}}</td>
                        <td><a class="btn btn-primary" href="{{route('viewpatient',$patient->id)}}">View</a></td>
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
            $('.payments').addClass("active");
            
            
    });

</script>

@stop