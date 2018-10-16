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
            <h6><a href="{{route('searchpatient')}}" class="backarr"><i class="fas fa-long-arrow-alt-left pr-2"></i>Back to Patients</a> </h6>
        </div>
    </div>


    <!-- view request body -->
    <h5 class="text-center mt-4">Patient</h5>

    <div class="container wrapper mb-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr style="padding-top:20px;">
                                <th scope="row">FULL NAME</th>
                                <td>{{ucfirst($patient->firstname)}} {{ucfirst($patient->lastname)}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">REGISTRATION NO</th>
                                <td>{{$patient->registration_no}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">GENDER</th>
                                <td>{{$patient->gender}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">DATE OF BIRTH</th>
                                <td>{{$patient->dob}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">ADDRESS</th>
                                <td>{{$patient->address}}, {{$patient->patstate->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">PHONE NUMBER</th>
                                <td>{{$patient->phoneno}}</td>
                            </tr>
                            <tr>
                                <th scope="row">EMAIL</th>
                                <td>{{$patient->email}}</td>
                            </tr>   
                                
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center mt-5 mb-4">
                    <button class="btn generate text-white" data-toggle="modal" data-target="#exampleModal">EDIT</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{route('updatepatient')}}">
                                    @csrf
                                    <input type="hidden" value="{{$patient->id}}" name="patient_id">
                                    <div class="modal-body">
                                        <h4 class="px-4 pb-3"><img src="{{asset('assets/image/clipboard.svg')}}" class="wallet pr-2"><span>Update patient</span></h4>
                                        <div class="form-group px-4">
                                            <label for="fname">Fullname</label>
                                            <div class="row">
                                                <div class="col-md-6"><input id="fname" class="form-control" value="{{$patient->firstname}}" name="firstname"></div>
                                                <div class="col-md-6"><input id="lname" class="form-control" value="{{$patient->lastname}}" name="lastname"></div>
                                            </div>    
                                        </div>
                                        <!--  -->
                                        <div class="form-group px-4">
                                            <label for="email">Email Address</label>
                                            <input id="email" class="form-control" name="email" value="{{$patient->email}}">                      
                                        </div>
                                        <!--  -->
                                        <div class="form-group px-4">
                                            <label for="phone">Phone Number</label>
                                            <input id="phone" class="form-control" name="phone" value="{{$patient->phoneno}}">                 
                                        </div>
                                        <!--  -->
                                        <div class="form-group px-4">
                                            <label for="address">Home Address</label>
                                            <input id="address" class="form-control" name="address" value="{{$patient->address}}">                 
                                        </div>
                                        <div class="form-group px-4">
                                            <label for="address">State $ lga</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="state" id="state" required> 
                                                        <option value="{{$patient->state_id}}">{{$patient->patstate->name}}</option>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->state_id}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="lga" id="lga" required>
                                                        <option value="{{$patient->lga_id}}">{{$patient->lga->local_name}}</option>
                                                        <option value="">select LGA</option>
                                                    </select>
                                                </div>
                                            </div>
                                                             
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
      $('.pat').addClass("active");
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