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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;">Edit User</span>
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
            class="adduser pr-2"><span>Edit user</span> </h5>
            
        </div>
    </div>
    <div class="container  bg-white content2 mb-5">
        <div class="form-row rowpad">
            <div class="col-sm-4">
                <form action="{{route('user',$user->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="inputFullname">{{ __('Full Name') }}</label>
                        <input type="text" class="form-control long" name="name" value="{{$user->name}}" id="name">
                    </div>
                    <div class="form-group">
                        <label for="inputFullname">{{ __('E-Mail Address') }} </label>
                        <input id="email" type="email" class="form-control long" name="email" value="{{$user->email}}">
                        
                    </div>
                    <div class="form-group">
                        <label for="inputsystemname">{{ __('Phone Number') }} </label>
                        <input id="phone" type="text" class="form-control long" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="inputdesc">{{ __('Department') }} </label>
                        <select name="department_id" id="department" class="form-control long" required autofocus>
                            <option value="{{$user->department_id}}">{{$user->department->name}}</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mb-0">Roles</p>

                    <div class="form-row rowrole">
                        @foreach($roles as $role)
                            <div class="custom-control custom-checkbox checkbox my-2">
                                <input type="checkbox" name ="role[]" class="custom-control-input" id="customCheck1_{{ $role->id }}" value="{{$role->id}}" @if ($user->hasRole($role->id)) checked @endif>
                                <label class="custom-control-label alignthem" for="customCheck1_{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <!-- button -->
                    <div class="d-flex my-3">
                        <button class="btn btn-createrole text-white" type="submit">UPDATE</button>
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
        $('.user').addClass("active");     
            
    });

</script>

@stop