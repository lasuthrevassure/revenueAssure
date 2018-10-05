@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Patients</h1>
        <p><a href="{{route('addpatient')}}">Patient</a></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Patients</li>
        <li class="breadcrumb-item"><a href="#">Show</a></li>
    </ul>
@stop
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <ul>
                  <li>{{$patient->firstname}} {{$patient->lastname}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
@stop

@section('script')
<script type="text/javascript" src="{{asset('assets/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/dataTables.bootstrap.min.js')}}"></script>
<script>
		$(document).ready(function() {
            $('.pat').addClass("is-expanded");
            $('.allpat').addClass("active");
            
            
    });

</script>

@stop