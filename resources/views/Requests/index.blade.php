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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Requests</span>
                    </div>
                </div>
                </div>
            </div>

            <a href="{{route('searchpatient')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;">Patients</span></a>
            </nav>
        </div>
    </div>
    <!-- page header -->
    <div class="container header">
        <div class="row justify-content-between">
            <h5>Request</h5>
            <!-- let me know if it's suppose to be a button or link -->
            <h6><i class="fas fa-file-download pr-2"></i>EXPORT TO EXCEL</h6>
        </div>
    </div>

    <div class="container bg-white content1" style="border: solid 1px #e0e2e5;">
        <form action="{{route('requestfilter')}}" method="post">
            @csrf
            <div class="form-row justify-content-around py-2 ">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Request No</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Enter request no" name="request_no">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">From date</label>
                    <input type="date" class="form-control datefade" id="inputEmail4" name="from">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">To date</label>
                    <input type="date" class="form-control datefade" id="inputEmail4" name="to">
                                    
                </div>
                <div class="col-md-3 editt">
                    <button class="btn text-white">Search</button>
                </div>  
            </div>
        </form>
        
    </div>
    <!--  -->
    <div class="container bg-white px-0 content2">
        <table class="table table-hover table-bordered text-muted table-responsive-xs">
            <thead class="table-borderless" >
                <tr>
                <th scope="col">S/N</th>
                <th scope="col">REQUEST NO</th>
                <th scope="col">PATIENT NAME</th>
                <th scope="col">AMOUNT</th>
                <th scope="col">SERVICE</th>
                <th scope="col">STATUS</th>
                <th scope="col">DATE REQUESTED</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patientrequests as $key => $patientrequest)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$patientrequest->request_no}}</td>
                        <td>{{$patientrequest->patient->firstname}} {{$patientrequest->patient->lastname}}</td>
                        <td>{{$patientrequest->document->amount}}</td>
                        <td>{{$patientrequest->document->name}}</td>
                        <td>
                            @if($patientrequest->status == '0')
                                <div class="dropdown pend">
                                    <a class="btn btn-pend" href="#" role="button">
                                        Pending
                                    </a>
                                </div>
                            @elseif($patientrequest->status == '1')
                                <div class="dropdown paid">
                                    <a class="btn btn-paid" href="#" role="button">
                                        Paid
                                    </a>
                                </div>
                            @else
                                <div class="dropdown paid">
                                    <a class="btn btn-paid" href="#" role="button">
                                        Closed
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>{{$patientrequest->created_at->format('d M Y')}}</td>
                        <td>
                            <ul class="list-inline action">                              
                                <li class="list-inline-item"><a href="" data-toggle="modal" data-target="#exampleModal" data-id="{{$patientrequest->id}}"><i class="fas fa-trash"></i>Delete</a></li>
                                <!-- view -->
                                <li class="list-inline-item"><a href="{{route('viewrequest',$patientrequest->id)}}"><i class="fas fa-eye"></i>View</a></li>
                            </ul>
                        </td>
                    </tr>
                  @endforeach
            </tbody>
        </table>

        @if(count($patientrequests) == 0 || $error_resp == '1')
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
                    <form action="{{route('deleterequest')}}" method="post">
                        @csrf
                        <input type="hidden" id="request_id" name="request_id">
                        <p class="text-center">Are you sure you want to delete this request</p>
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
            
            {{$patientrequests->links()}}
            </ul>
        </nav>
    </div>
@stop

@section('script')
<script>
	$(document).ready(function() {
        $('.request').addClass("active");
    });

    $(function() {
        $('#exampleModal').on("show.bs.modal", function (e) {
            $("#request_id").val($(e.relatedTarget).data('id'));
        });
    });

</script>

@stop