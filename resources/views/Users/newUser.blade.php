@extends('layouts.master')
@section('content')
    <div class="container-fluid p-0 search">
        <div class="main-navbar bg-white">
            <nav class="navbar d-flex align-items-stretch navbar-light flex-md-nowrap p-0">
            <div class="main-navbar__search w-75" style=" background-color: #8188bf;">
                <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                    <div class="input-group-text" style=" background-color: #8188bf;">
                                <img src="{{asset('assets/image/twotone-how-to-reg-24-px.svg')}}" class="pr-2">
                                <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;">Create User</span>
                    </div>
                </div>
                </div>
            </div>

            <a href="{{route('users')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;"> Users</span></a>
            </nav>
        </div>
    </div>
    <!--  -->
    <div class="container content1">
        <div class="row justify-content-start">
            <h5 class="align-self-center"><img src="{{asset('assets/image/adduser.svg')}}"
            class="adduser pr-2"><span>Create new user</span> </h5>
            
        </div>
    </div>
    <div class="container  bg-white content2 mb-5">
        <div class="form-row rowpad">
            <div class="col-sm-4">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputFullname">{{ __('Full Name') }} <span class="text-danger aster" >*</span></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} long" name="name" value="{{ old('name') }}" id="name" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputFullname">{{ __('E-Mail Address') }}  <span class="text-danger aster" >*</span></label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} long" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputsystemname">{{ __('Phone Number') }} <span class="text-danger aster" >*</span></label>
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} long" name="phone" value="{{ old('phone') }}" required>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputdesc">{{ __('Department') }} <span class="text-danger aster" >*</span></label>
                        <select name="department_id" id="department" class="form-control long" required autofocus>
                            <option value="">select department</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mb-0">Roles</p>

                    <div class="form-row rowrole">
                        @foreach($roles as $role)
                            <div class="custom-control custom-checkbox checkbox my-2">
                                <input type="checkbox" name ="role[]" class="custom-control-input" id="customCheck1_{{ $role->id }}" value="{{$role->id}}">
                                <label class="custom-control-label alignthem" for="customCheck1_{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <!-- button -->
                    <div class="d-flex my-3">
                        <button class="btn btn-createrole text-white" type="submit">CREATE</button>
                        <button class="btn btn-transp"><a href="{{route('users')}}">CANCEL</a> </button>
                    </div>
                    <!-- buttton end -->
                </form>
            </div>
            <div class="col-sm-6 offset-sm-2 d-none d-md-block">
                <img src="{{asset('assets/image/doctors.png')}}" alt="" style="padding-top:180px;">
            </div>
            
                
        </div>           
                        
    </div>
@stop

@section('script')
<script>
		$(document).ready(function() {
            $('.user').addClass("is-expanded");
            $('.aduser').addClass("active");
            
            
    });

</script>

@stop