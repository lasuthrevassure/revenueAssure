@extends('layouts.master')
@section('content')
<div class="container pt-3 reg mb-5">
    <img src="{{asset('assets/image/clipboard.svg')}}" class="clipboard pr-4 pb-3"><span>Registration</span>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="bg-white pt-3 balance">
        <form action="{{route('storepatient')}}" method="post">
            @csrf
            <div class="row pt-4">
                <div class="col-md-3 labelname">
                    <p class="text-right">Enter full name</p>
                    <p class="text-right difcolor">Full name of patient</p>
                </div>
                <div class="col-md-6 labelform">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" class="form-control" name="firstname"  id="firstname" placeholder="John" required autofocus>
                            @if ($errors->has('firstname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Doe" required>
                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                </div>

                <!--  -->

                <div class="col-md-3 labelname">
                    <p class="text-right">Email Address</p>
                    <p class="text-right difcolor">Enter email id of patient</p>
                </div>
                <div class="col-md-6 labelform">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="john.doe@gmail.com">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                                    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>

                <!--  -->

                <div class="col-md-3 labelname">
                    <p class="text-right">Phone Number</p>
                    <p class="text-right difcolor">Enter phone number of patient</p>
                </div>
                <div class="col-md-6 labelform">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="+234 000 000 0000" required>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                                    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>

                <!--  -->

                <div class="col-md-3 labelname">
                    <p class="text-right">Residental Address</p>
                    <p class="text-right difcolor">Where does patient stay?</p>
                </div>
                <div class="col-md-6 labelform">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Home Address</label>
                            <input type="address" class="form-control" name="address" id="address" placeholder="Enter home address here" required>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">State</label>
                            <select class="form-control" name="state" id="state" required> 
                                <option value="">select state</option>
                                @foreach($states as $state)
                                    <option value="{{$state->state_id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">LGA</label>
                            <select class="form-control" name="lga" id="lga" required>
                                <option value="">select LGA</option>
                            </select>
                        </div>
                                    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <!--  -->
                <div class="col-md-3 labelname">
                    <p class="text-right">Gender</p>
                    <p class="text-right difcolor">What is the Sex of the patient?</p>
                </div>
                <div class="col-md-6 labelform">
                    <div class="form-row">
                            
                        <div class="form-group col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Male" id="inlineRadio1" required>
                                <label class="form-check-label" for="inlineRadio1">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Female" id="inlineRadio1" required>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6"></div>
                                    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <!--  -->
                <div class="col-md-3 labelname">
                    <p class="text-right">Date of Birth</p>
                    <p class="text-right difcolor">Day month and year of birth</p>
                </div>
                <div class="col-md-6 labelform">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="demoDate">Date of Birth</label>
                            <input class="form-control"  name="dob" id="demoDate" type="text" placeholder="Select Date" required>
                            @if ($errors->has('dob'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                            @endif
                        </div>
                                    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <!--  -->
                <div class="col-md-3 labelname">
                    <!-- leaveempty -->
                </div>
                <div class="col-md-6 labelform">
                        
                    <button type="submit" class="float-right my-4">REGISTER</button>
                                        
                        
                </div>
                <div class="col-md-3">
                    <!-- leave empty -->
                </div>
                <!--  -->
                                            
            </div>
        </form>
    </div>
</div>
                      
<!-- bodycontentend -->
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

    $('#demoDate').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });

</script>

@stop