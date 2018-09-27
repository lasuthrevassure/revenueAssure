@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Patients</h1>
        <p><a href="{{route('addpatient')}}">Add Patient</a></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Patients</li>
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
                    <th>Name</th>
                    <th>Joe Number</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                    <tr>
                        <td>{{$patient->firstname}} {{$patient->lastname}}</td>
                        <td>{{$patient->joe_number}}</td>
                        <td>{{$patient->gender}}</td>
                        <td>{{$patient->email}}</td>
                        <td>{{$patient->dob}}</td>
                        <td>{{$patient->address}}</td>
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
            $('.pat').addClass("is-expanded");
            $('.allpat').addClass("active");
            
            
    });

    $('#state').on('change',function(){
        var value = $(this).val();
        $('#lga').empty();
        $('<option>').val('').text('loading....').appendTo('#lga');

        $.get("{{url('fetch-lga')}}/"+value, function(data, status){
            var len = data.length;
            $('#lga').empty();
            $('<option>').val('').text('Choose LGA').appendTo('#lga');

            if(len > 0){
                $.each(data, function(k, v){
                    $('<option>').val(v.local_id).text(v.local_name).appendTo('#lga');
                })
            }
        })
    });

</script>

@stop