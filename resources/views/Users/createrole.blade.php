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
        <li class="breadcrumb-item">Roles</li>
        <li class="breadcrumb-item"><a href="#">add</a></li>
    </ul>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Create Role</h3>
                <div class="tile-body">
                    <form action="{{ route('addrole') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <p class="uptext mb-2">{{ __(' Name') }} <span class="text-danger aster" >*</span></p>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Set a name" required autofocus>
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
                                <p class="uptext mb-2">{{ __('Slug') }} <span class="text-danger aster" >*</span></p>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" placeholder="What will you like the role to be called" required autofocus>
                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>

                        <!--row5-->
                        <div style="height:40px;"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <p class="uptext mb-2">{{ __('Description') }} </p>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="role description">
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
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
                                <p class="uptext mb-2">{{ __('Attach Priviledge') }} <span class="text-danger aster" >*</span></p>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10" id="listResults">
                                        <div class="row text-muted">
                                            <div class="custom-control custom-checkbox mx-3 checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkAll"><label class="custom-control-label" for="checkAll">Check All</label>
                                            </div>
                                        </div>
                                        <hr/>       
                                        <div class="row text-muted">
                                            
                                            @foreach($priviledges as $priviledge)
                                                <div class="custom-control custom-checkbox mx-3 checkbox col-md-5">
                                                    <input type="checkbox" name ="permissions[]" class="custom-control-input" id="customCheck1_{{ $priviledge->id }}" value="{{$priviledge->id}}">
                                                    <label class="custom-control-label" for="customCheck1_{{ $priviledge->id }}">{{$priviledge->name}}</label>
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
        </div>
    </div>
@stop

@section('script')
<script>
	$(document).ready(function() {
        $('.user').addClass("is-expanded");
        $('.adroles').addClass("active");
    });

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

</script>

@stop