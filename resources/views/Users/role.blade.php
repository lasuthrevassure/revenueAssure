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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Edit Role</span>
                    </div>
                </div>
                </div>
            </div>

            <a href="{{route('roles')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;"> Roles</span></a>
            </nav>
        </div>
    </div>

    <div class="container content1">
        <div class="row justify-content-start">
            <h5 class="align-self-center"><img src="{{asset('assets/image/adduser.svg')}}"
            class="adduser pr-2"><span>Create Role</span> </h5>
        </div>
    </div>
    <div class="container  bg-white content2">
    
        <div class="form-row rowpad">
            
            <div class="col-sm-4">
                <form action="{{ route('updaterole') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{$role->id}}" name="role_id">
                    <div class="form-group">
                        <label for="inputFullname">Name <span class="text-danger aster" >*</span> </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }} long" name="name" id="name" value="{{$role->name}}">
                        
                    </div>
                    <div class="form-group">
                        <label for="inputdesc">Description</label>
                        <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} long" name="description" value="{{$role->description}}">
                        
                    </div>
                    <p>Attach Priviledge</p>
                    <div class="row rowlen mx-0">
                        @foreach($priviledges as $priviledge)
                            
                            <div class="custom-control custom-checkbox checkbox my-2 col-sm-6">
                                <input type="checkbox" name ="permissions[]" class="custom-control-input" id="customCheck1_{{ $priviledge->id }}" value="{{$priviledge->id}}" @if (in_array($priviledge->id,$permissions)) checked @endif>
                                <label class="custom-control-label" for="customCheck1_{{ $priviledge->id }}">{{$priviledge->name}}</label>
                            </div>

                        @endforeach

                    </div>
                    <!-- button -->
                    <div class="d-flex my-3">
                        <button class="btn btn-createrole text-white" type="submit">UPDATE</button>
                        <button class="btn btn-transp"><a href="{{route('roles')}}">CANCEL</a> </button>
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

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

</script>

@stop