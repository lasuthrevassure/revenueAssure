@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Users</h1>
        <a href="{{ URL::previous() }}">Back</a>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
    </ul>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Create Role</h3>
                <div class="tile-body">
                    <form action="{{route('user',$user->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <p class="uptext mb-2">{{ __('Name') }} <span class="text-danger aster" >*</span></p>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input name="name" type="text" value="{{$user->name}}" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <div style="height:40px;"></div>

                        <!--row5-->
                        <div style="height:40px;"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <p class="uptext mb-2">{{ __('E-Mail Address') }}  <span class="text-danger aster" >*</span></p>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control">
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
                                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}" placeholder="+234">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">

                            </div><div class="col-md-2">

                            </div>
                        </div>

                        <div style="height:40px;"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <p class="uptext mb-2">{{ __('Password') }}</p>

                            </div>

                            <div class="col-md-6 ml-auto">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
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
                                                    <input type="checkbox" name ="role[]" class="custom-control-input" id="customCheck1_{{ $role->id }}" value="{{$role->id}}" @if ($user->hasRole($role->id)) checked @endif >
                                                    <label class="custom-control-label" for="customCheck1_{{ $role->id }}">{{$role->name}}</label>
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
                                                <button type="submit" class="btn btn-primary text-white">{{ __('Update') }}</button>
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
<script type="text/javascript" src="{{asset('assets/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script>
	$(document).ready(function() {
        $('.alluser').addClass("active");     
            
    });

</script>

@stop