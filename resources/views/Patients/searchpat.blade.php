@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Patients</h1>
        <p><a href="{{route('addpatient')}}">Add Patient</a></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Patients</li>
        <li class="breadcrumb-item"><a href="#">Search</a></li>
    </ul>
@stop
@section('content')
    <div class="row">
        <h2>Search For Patient</h2>
        <div id="custom-search-input">
            <div class="input-group col-md-12">
                <input type="text" class="  search-query form-control" placeholder="Search" />
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                        <span class=" glyphicon glyphicon-search"></span>
                    </button>
                </span>
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
            $('.pat').addClass("is-expanded");
            $('.search').addClass("active");
            
            
    });

</script>

@stop