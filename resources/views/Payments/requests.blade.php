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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Payment Requests</span>
                    </div>
                </div>
                </div>
            </div>

            <a href="{{route('payments')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;">Payments</span></a>
            </nav>
        </div>
    </div>

    <!-- page header -->
    <div class="container header">
        <div class="row justify-content-between">
            <h5>Requests</h5>
            <!-- let me know if it's suppose to be a button or link -->
            <h6><i class="fas fa-file-download pr-2"></i>EXPORT TO EXCEL</h6>
        </div>
    </div>

    <div class="container bg-white content1" style="border: solid 1px #e0e2e5;">

        <form action="{{route('paymentrequestfilter')}}" method="post">
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
                <th scope="col">DOCUMENT</th>
                <th scope="col">STATUS</th>
                <th scope="col">DATE REQUESTED</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $key => $patientrequest)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$patientrequest->request_no}}</td>
                        <td>{{$patientrequest->patient->firstname}} {{$patientrequest->patient->lastname}}</td>
                        
                        <td>{{$patientrequest->document->amount}}</td>
                        <td>{{$patientrequest->document->name}}</td>
                        <td>
                            <div class="dropdown pend">
                                <a class="btn btn-pend" href="#" role="button">
                                    Pending
                                </a>
                            </div>
                        </td>
                        <td>{{$patientrequest->created_at->format('d M Y')}}</td>
                        <td><a href="" data-toggle="modal" data-target="#exampleModal" data-id="{{ $patientrequest->id }}" data-amount="{{$patientrequest->document->amount}}">Update Payment</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($requests) == 0 || $error_resp == '1')
            <div class="row justify-content-center" style="height:30vh;"> 
                <img src="{{asset('assets/image/empty.svg')}}" class="thought">
            </div>
            <p class="text-center pt-5 size">No Record Found</p>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('createpayment')}}">
                        @csrf
                        <input type="hidden" id="request_id" name="request_id">
                        <div class="modal-body">
                            <h4 class="px-4 pb-3"><img src="{{asset('assets/image/wallet.svg')}}" class="wallet pr-2"><span>Update payment</span></h4>
                            <div class="form-group px-4">
                                <label for="inputService">Amount</label>
                                <input id="payamount" class="form-control" name="amount" placeholder="|write something here">      
                                        
                            </div>
                            <div class="form-group px-4">
                                <label for="inputService">Transaction ID</label>
                                <input id="inputService" class="form-control" name="transaction_id" placeholder="|write something here">      
                                        
                            </div>
                            <!-- 1 -->
                            <div class="form-group px-4">
                                <label for="inputService">Reciept Number</label>
                                <input id="inputService" class="form-control" name="receipt_no" placeholder="|write something here">                      
                            </div>
                            <!-- 2 -->
                            <div class="form-group px-4">

                                <label for="inputService">Bill Reference</label>
                                <input id="inputService" class="form-control" name="bill_reference" placeholder="|write something here">
                                                        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    
    <div class="container pag px-0 ">
        <nav>
                    
            <ul class="nav">
                {{$requests->links()}}
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
            $('.paymentmana').addClass("active");
            
            $(function() {
                $('#exampleModal').on("show.bs.modal", function (e) {
                    $("#request_id").val($(e.relatedTarget).data('id'));
                    $("#payamount").val($(e.relatedTarget).data('amount'));
                });
            });
            
    });

</script>

@stop