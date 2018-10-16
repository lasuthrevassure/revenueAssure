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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Roles</span>
                    </div>
                </div>
                </div>
            </div>

            <a href="{{route('addrole')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;">Add Role</span></a>
            </nav>
        </div>
    </div>
    <!-- page header -->
    <div class="container content1">
        <div class="row justify-content-between">
        <h5 class="align-self-center">Role Management</h5>
        <button class="btn mt-0"><a href="{{route('addrole')}}" class="text-white"><i class="fas fa-user-plus pr-2"></i>CREATE ROLE</a></button>
        </div>
    </div>
    <div class="container bg-white px-0 content2">
        <table class="table table-hover table-bordered text-muted table-responsive-xs">
            <thead class="table-borderless" >
                <tr>
                <th scope="col">ROLE NAME</th>
                <th scope="col">SYSTEM NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">ACTION</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$role->name}}</th>
                        <td>{{$role->slug}}</td>
                        
                        <td>{{$role->description}}</td>
                        
                        <td>
                            <ul class="list-inline action">
                                <li class="list-inline-item"><a data-toggle="modal" data-target="#exampleModal" data-id="{{$role->id}}" data-name="{{$role->name}}"><i class="fas fa-trash"></i>Delete</a></li>
                                <li class="list-inline-item"><a href="{{route('showrole',$role->id)}}"><i class="fas fa-pencil-alt"></i>Edit</a></li>
                            </ul> 
                        </td>
                    </tr>
                @endforeach     
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="difftype">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <img src="{{asset('assets/image/dump.svg')}}" class="dump">
                        </div>
                    </div>
                    <form action="{{route('deleterole')}}" method="post">
                        @csrf
                        <input type="hidden" id="role_id" name="role_id">
                        <p class="text-center">Are you sure you want to delete <span id="role_name"></span></p>
                        <div class="modal-footer">
                            <button type="button" class="btn btncan" data-dismiss="modal">DON'T DELETE</button>
                            <button type="submit" class="btn btn-primary">DELETE</button>
                        </div>
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
        $('.user').addClass("active");     
            
    });

    $(function() {
        $('#exampleModal').on("show.bs.modal", function (e) {
            $("#role_id").val($(e.relatedTarget).data('id'));
            $("#role_name").text($(e.relatedTarget).data('name'));
        });
    });

</script>

@stop