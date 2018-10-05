@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Requests</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Requests</li>
        <li class="breadcrumb-item"><a href="#">View</a></li>
    </ul>
@stop
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <p>This request is for {{$patientrequest->document->name}} requested by {{ucfirst($patientrequest->patient->firstname)}} {{ucfirst($patientrequest->patient->lastname)}} </p>
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
        $('.request').addClass("active");     
            
    });

</script>

@stop