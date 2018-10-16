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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Users</span>
                    </div>
                </div>
                </div>
            </div>

            <a href="{{route('register')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;">Add User</span></a>
            </nav>
        </div>
    </div>
    <!-- page header -->
    <div class="container content1">
        <div class="row justify-content-between">
        <h5 class="align-self-center">User Management</h5>
        <button class="btn mt-0"><a href="{{route('register')}}" class=" text-white"> <i class="fas fa-user-plus pr-2"></i>CREATE USER</a></button>
        </div>
    </div>

    <div class="container bg-white content1" style="border: solid 1px #e0e2e5;">
        <form action="{{route('userfilter')}}" method="post">
            @csrf
            <div class="form-row justify-content-around py-2 ">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Department</label>
                    <select name="department" id="department" class="form-control">
                        <option value="">Select department</option>
                        @foreach($depts as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select status</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                                    
                </div>
                <div class="col-md-3 editt">
                    <button class="btn text-white">Search</button>
                </div>  
            </div>
        </form>
        
    </div>

    <div class="container bg-white px-0 content2">
        <table class="table table-hover table-bordered text-muted table-responsive-xs">
            <thead class="table-borderless" >
                <tr>
                <th scope="col">FULL NAME</th>
                <th scope="col">EMAIL ADDRESS</th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">ROLE</th>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->name}}</th>
                        <td>{{$user->email}}</td>
                        <td>{{$user->department->name}}</td>
                        <td>
                            @if(count($user->roles) > 0 )
                                @foreach($user->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            @else
                                    No role
                            @endif
                        </td>
                        <td>
                            <div class="row justify-content-start mx-0">
                                <p>deactivate</p>
                                <label class="switch mx-2">
                                    <input type="checkbox" @if($user->status == '1') checked @endif value="{{$user->id}}">
                                    <span class="slider round"></span>
                                </label>
                                <p>activate</p>
                            </div>
                                
                        </td>
                        
                        <td>
                            <ul class="list-inline action">
                                <li class="list-inline-item"><a data-toggle="modal" data-target="#exampleModal" data-id="{{$user->id}}" data-name="{{$user->name}}"><i class="fas fa-trash"></i>Delete</a></li>
                                <li class="list-inline-item"><a href="{{route('user',$user->id)}}"><i class="fas fa-pencil-alt"></i>Edit</a></li>
                            </ul> 
                        </td>
                    </tr>                         
                @endforeach          
            </tbody>
        </table>

        @if($error_resp == '1')
            <div class="row justify-content-center" style="height:30vh;"> 
                <img src="{{asset('assets/image/empty.svg')}}" class="thought">
            </div>
            <p class="text-center pt-5 size">No Record Found</p>
        @endif

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
                    <form action="{{route('deleteuser')}}" method="post">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id">
                        <p class="text-center">Are you sure you want to delete <span id="user_name"></span></p>
                        <div class="modal-footer">
                            <button type="button" class="btn btncan" data-dismiss="modal">DON'T DELETE</button>
                            <button type="submit" class="btn btn-primary">DELETE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="container pag px-0 ">
        <nav>
            <ul class="pagination justify-content-end">
            
            {{$users->links()}}
            </ul>
        </nav>
    </div>
@stop

@section('script')
<script type="text/javascript" src="{{asset('assets/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script>
	$(document).ready(function() {
        $('.user').addClass("active");

       $("input[type='checkbox']").change(function() {
            if(this.checked) {

                $id=$(this).val();
                $status = "1";
                
                $.ajax({
                
                    type : 'get',
                    
                    url : '{{URL::to('activate')}}',
                    
                    data:{'id':$id,'status':$status},

                    dataType:'text',
                    
                    success:function(data){
                        toastr.success(data);
                    }
                
                });
            }
            else{
                $id=$(this).val();

                $status = "2";

                $.ajax({
                
                    type : 'get',
                    
                    url : '{{URL::to('deactivate')}}',
                    
                    data:{'id':$id,'status':$status},

                    dataType:'text',
                    
                    success:function(data){
                        toastr.success(data);
                    }
            
                });
            }
        });
    });

    $(function() {
        $('#exampleModal').on("show.bs.modal", function (e) {
            $("#user_id").val($(e.relatedTarget).data('id'));
            $("#user_name").text($(e.relatedTarget).data('name'));
        });
    });

</script>

@stop