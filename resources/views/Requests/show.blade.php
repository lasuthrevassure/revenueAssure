@extends('layouts.master')
@section('head')
    <style>
        .backarr{
            text-decoration:none !important;
            color:black;
        }
    </style>
    

@stop
@section('title')
    <div>
        <h1><i class="fa fa-edit"></i> Requests</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Requests</li>
        <li class="breadcrumb-item"><a href="#">View</a></li>
    </ul>
@stop
@section('content')
    <div class="container header">
        <div class="row justify-content-start">
            <!-- <h6><a class="backarr"><i class="fas fa-long-arrow-alt-left pr-2"></i>Back to Request</a> </h6> -->
        </div>
    </div>


    <!-- view request body -->
    <h5 class="text-center mt-4">Request</h5>

    <div class="container wrapper mb-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr style="padding-top:20px;">
                                <th scope="row">REQUEST NO</th>
                                <td>{{$patientrequest->request_no}}</td>
                                
                            </tr>
                            <tr >
                                <th scope="row">FULL NAME</th>
                                <td>{{ucfirst($patientrequest->patient->firstname)}} {{ucfirst($patientrequest->patient->lastname)}}</td>
                                
                            </tr>
                            
                            <tr>
                                <th scope="row">AMOUNT</th>
                                <td>₦ {{$patientrequest->document->amount}}</td>
                            </tr>
                            @if($patientrequest->status == '1')
                                <tr>
                                    <th scope="row">TRANSACTION ID</th>
                                    <td>{{$patientrequest->payment->transaction_id}}</td>
                                </tr>
                            @endif
                            <tr>
                                <th scope="row">SERVICE</th>
                                <td>
                                    <p> 
                                        <span class="pr-3"> {{$patientrequest->document->name}} </span> 
                                        @if($patientrequest->status == '0')  
                                            <span>
                                                <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{ $patientrequest->id }}" data-document="{{$patientrequest->document->name}}" data-documentId="{{$patientrequest->document->id}}" class="colorr">Change</a>
                                                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center rounded-0">
                                                                <h5 class="modal-title w-100"  id="updateModalTitle">CHANGE DOCUMENT TYPE</h5>
                                                            </div>
                                                            <form method="post" action="{{route('updaterequest')}}">
                                                                @csrf
                                                                <input type="hidden" id="request_id" name="request_id">
                                                                <div class="modal-body">
                                                                        
                                                                    <div class="form-group px-4">
                                                                        <label for="inputService">Select a certifcate/report</label>
                                                                        <select id="inputService" class="form-control" name="document">
                                                                            <option id="document" value=""></option>
                                                                            @foreach($documents as $document)
                                                                                <option value="{{$document->id}}">{{$document->name}} {{$document->amount}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                        
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
                                                                    <button type="submit" class="btn btn-primary">CHANGE</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span> 
                                        @endif
                                    </p>
                                    @if($patientrequest->status == '0') 
                                        <a href="" data-toggle="modal" data-target="#certtifcatemodal" data-id="{{ $patientrequest->patient->id }}"><i class="fas fa-plus-circle pr-2"></i>Add new service</a>
                                        <div class="modal fade" id="certtifcatemodal" tabindex="-1" role="dialog" aria-labelledby="certtifcatemodalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center rounded-0">

                                                    <h5 class="modal-title w-100"  id="certtifcatemodalTitle">SELECT DOCUMENT TYPE</h5>
                                                        
                                                    </div>
                                                    <form method="post" action="{{route('storerequest')}}">
                                                        @csrf
                                                        <input type="hidden" id="patient_id" name="patient_id">
                                                        <div class="modal-body">
                                                                
                                                            <div class="form-group px-4">
                                                                <label for="inputService">Select a certifcate/report</label>
                                                                <select id="inputService" class="form-control" name="document">
                                                                    <option>select certificate/report</option>
                                                                    @foreach($documents as $document)
                                                                        <option value="{{$document->id}}">{{$document->name}} {{$document->amount}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                                
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">DATE</th>
                                <td>{{$patientrequest->created_at->format('d M Y')}}</td>
                            </tr>

                            <tr>
                                <th scope="row">PAYMENT STATUS</th>
                                <td>
                                    @if($patientrequest->status == '0')
                                        <span class="dot" style="background-color: orange;"></span> Pending
                                    @elseif($patientrequest->status == '1')
                                        <span class="dot"></span> Paid
                                    @else
                                        <span class="dot"></span> Closed
                                    @endif
                                </td>
                            </tr>   
                                
                        </tbody>
                    </table>

                </div>
                <div class="row justify-content-center mt-5 mb-4">
                    <a href="window.history.go(-1); return false;" class="btn savebtn mr-3" style="color:black;margin-top:5px">BACK</a>
                    @if($patientrequest->status == '1' && count( $patientrequest->documentRequest) )
                           <button onclick="location.href = '{{ route('previewForm', ['documentRequest'=>$patientrequest->documentRequest->id]) }}'" class="btn generate text-white">VIEW REPORT</button> 
                    @elseif($patientrequest->status == '1')
                            <button onclick="location.href = '{{ route('showForm', ['document'=>$patientrequest->document_id, 'patientrequest'=>$patientrequest])}}'" class="btn generate text-white">GENERATE REPORT</button>
                    @endif
                </div>
            </div>

        </div>
    </div>

@stop

@section('script')
<script>
	$(document).ready(function() {
        $('.request').addClass("active");

        $(function() {
            $('#certtifcatemodal').on("show.bs.modal", function (e) {
                $("#patient_id").val($(e.relatedTarget).data('id'));
            });
        });

        $(function() {
            $('#updateModal').on("show.bs.modal", function (e) {
                $("#request_id").val($(e.relatedTarget).data('id'));
                $("#document").val($(e.relatedTarget).data('documentId'));
                $("#document").text($(e.relatedTarget).data('document'));
            });
        });

    });

</script>

@stop
