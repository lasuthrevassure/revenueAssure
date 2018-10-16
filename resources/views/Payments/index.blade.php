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
                          <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Payments</span>
                      </div>
                  </div>
                  </div>
              </div>

              <a href="{{route('paymentrequests')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
                  class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;">Requests</span></a>
            </nav>
        </div>
    </div>

    <!-- page header -->
    <div class="container header">
        <div class="row justify-content-between">
            <h5>Payments</h5>
            <!-- let me know if it's suppose to be a button or link -->
            <h6><i class="fas fa-file-download pr-2"></i>EXPORT TO EXCEL</h6>
        </div>
    </div>

    <div class="container bg-white content1" style="border: solid 1px #e0e2e5;">
        <form action="{{route('paymentfilter')}}" method="post">
            @csrf
            <div class="form-row justify-content-around py-2 ">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Document paid for</label>
                    <select name="document" class="form-control">
                        <option value="">select document</option>
                        @foreach($documents as $document)
                            <option value="{{$document->id}}">{{$document->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">From date</label>
                    <input type="date" class="form-control datefade" id="inputEmail4" name="from">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">To date</label>
                    <input type="date" class="form-control datefade" id="inputEmail4" name="to">
                                    
                </div>
                 
            </div>
            <div class="form-row justify-content-around py-2 ">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Transaction id</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Enter transaction" name="transaction_id">
                </div>
                
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Bill Reference</label>
                    <input type="text" class="form-control " id="inputEmail4" placeholder="Enter bill no" name="bill_no">
                </div>
                
                <div class="col-md-3 editt">
                    <button class="btn btn-block text-white" style="width:100% !important;">Search</button>
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
                  <th>DOCUMENT PAID FOR</th>
                  <th>TRANSACTION ID</th>
                  <th>AMOUNT</th>
                  <th>BILL NO</th>
                  <th>UPDATED BY</th>
                  <th>DATE UPDATED</th>
                  <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $key => $payment)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment->request->document->name}}</td>
                        <td>{{$payment->transaction_id}} </td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->bill_reference}}</td>
                        <td>{{$payment->user->name}}</td>
                        <td>{{$payment->created_at->format('d M Y')}}</td>
                        <td><a href="{{route('viewpayment',$payment->id)}}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($payments) == 0 || $error_resp == '1')
            <div class="row justify-content-center" style="height:30vh;"> 
                <img src="{{asset('assets/image/empty.svg')}}" class="thought">
            </div>
            <p class="text-center pt-5 size">No Record Found</p>
        @endif
    </div>
                    
    <div class="container pag px-0 ">
        <nav>
                    
            <ul class="nav">
                {{$payments->links()}}
            </ul>
        </nav>
    </div>
@stop

@section('script')
<script>
    $(document).ready(function() {
      $('.paymentmana').addClass("active");      
    });

</script>

@stop