@extends('layouts.master')
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Users</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Users</li>
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
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if(count($user->roles) > 0 )
                                @foreach($user->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            @else
                                    No role
                            @endif
                        </td>
                        <td>{{$user->created_at->format('d M Y h:i:a')}}</td>
                        <td><a href="{{route('user',$user->id)}}" class="btn btn-xs btn-primary" >View</a></td>
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
        $('.alluser').addClass("active");     
            
    });

</script>

@stop