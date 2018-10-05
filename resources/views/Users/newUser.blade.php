@extends('layouts.master')
@section('head')
    <style>
        #listResults .checkbox label::before {
            background-color: white;
            border: solid 1px grey;
            border-radius: 0px !important;
        }
        #listResults .checkbox input[type="checkbox"]:checked + label::after{
            background-color:green;
        }

        .custom-checkbox label{
            font-size:16px;
        }
    </style>                              
@stop
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Users</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item"><a href="#">add</a></li>
    </ul>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
            <h3 class="tile-title">Create User</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tile-body">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <p class="uptext mb-2">{{ __('Name') }} <span class="text-danger aster" >*</span></p>

                    </div>
                    <div class="col-md-6 ml-auto">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div style="height:40px;"></div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="uptext mb-2">{{ __('E-Mail Address') }}  <span class="text-danger aster" >*</span></p>

                    </div>
                    <div class="col-md-6 ml-auto">
                        <div class="row">
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div style="height:40px;"></div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="uptext mb-2">{{ __('Phone Number') }} <span class="text-danger aster" >*</span></p>

                    </div>
                    <div class="col-md-6 ml-auto">
                        <div class="row">
                            <div class="col-md-10">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div style="height:40px;"></div>

                <div class="row">
                    <div class="col-md-3">
                        <p class="uptext mb-2">{{ __('Attach Role') }} <span class="text-danger aster" >*</span></p>

                    </div>
                    <div class="col-md-6 ml-auto">
                        <div class="row">
                            <div class="col-md-10" id="listResults">
                                            
                                <div class="row text-muted">
                                    
                                    @foreach($roles as $role)
                                        <div class="custom-control custom-checkbox mx-3 checkbox">
                                            <input type="checkbox" name ="role[]" class="custom-control-input" id="customCheck1_{{ $role->id }}" value="{{$role->id}}">
                                            <label class="custom-control-label" for="customCheck1_{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                    
                                </div> 
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div style="height:40px;"></div>

                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6 ml-auto">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="container-fluid">
                                    <div class="row justify-content-end">
                                        <button type="submit" class="btn btn-primary text-white">{{ __('Create') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-2">

                    </div>
                </div>
                
                <div style="height:60px;"></div>
                <div style="height:60px;"></div>
            </form>
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