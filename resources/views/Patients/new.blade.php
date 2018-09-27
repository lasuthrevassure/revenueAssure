@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Patients</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Patients</li>
        <li class="breadcrumb-item"><a href="#">add</a></li>
    </ul>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
            <h3 class="tile-title">Create Patient</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="{{route('storepatient')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <select class="form-control col-md-8" name="title" id=""> 
                                <option value="">select title</option>
                                <option value="Mr">Mr</option>
                                <option value="Ms">Ms</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Fistname</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" type="text" name="firstname" placeholder="Enter firstname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Lastname</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" type="text" name="lastname" placeholder="Enter lastname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" name="email" type="email" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" name="phone" type="text" placeholder="+234">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Date of birth</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" name="dob" type="date" placeholder="Enter date of birth">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control col-md-8" rows="4" name="address" placeholder="Enter address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">State</label>
                        <div class="col-md-8">
                            <select class="form-control col-md-8" name="state" id="state"> 
                                <option value="">select state</option>
                                @foreach($states as $state)
                                    <option value="{{$state->state_id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Local government</label>
                        <div class="col-md-8">
                            <select class="form-control col-md-8" name="lga" id="lga">
                                <option value="">select LGA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-9">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" name="gender" value="Male" type="radio" name="gender">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" name="gender" value="Female" type="radio" name="gender">Female
                            </label>
                        </div>
                        </div>
                    </div>
                
            </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{route('patient')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@stop

@section('script')
<script>
		$(document).ready(function() {
            $('.pat').addClass("is-expanded");
            $('.addpat').addClass("active");
            
            
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