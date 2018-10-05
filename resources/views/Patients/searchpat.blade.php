@extends('layouts.master')

@section('head') 
    <meta name="_token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="container-fluid p-0 search">
        <div class="main-navbar bg-white">
            <nav class="navbar d-flex align-items-stretch navbar-light flex-md-nowrap p-0">
                <form action="#" class="main-navbar__search w-75" style=" background-color: #8188bf;">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                        <div class="input-group-text">
                            <img src="{{asset('assets/image/twotone-how-to-reg-24-px.svg')}}" class="pr-2">
                        </div>
                        </div>
                        <input class="navbar-search form-control" id="search" name="search" type="text" placeholder="Search for patient..." aria-label="Search" style=" background-color: #8188bf;"> 
                    </div>
                </form>

                <a href="{{route('addpatient')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}" class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;"> Register New Patient</span></a>
            </nav>
        </div>
    </div>

    <div class="container bg-white content1">
        <form action="{{route('searchpatientfilter')}}" method="post">
            @csrf
            <div class="form-row justify-content-around py-2 ">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Registration Number</label>
                    <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Registration no">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob">
                    
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
                    <th scope="col">FULL NAME</th>
                    <th scope="col">REGISTRATION NO</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE NO</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($patients))
                    @foreach($patients as $key => $patient)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><a href="{{route('viewpatient',$patient->id)}}">{{$patient->firstname}} {{$patient->lastname}}</a></td>
                            <td>{{$patient->registration_no}}</td>
                            <td>{{$patient->gender}}</td>
                            <td>{{$patient->email}}</td>
                            <td>{{$patient->dob}}</td>
                            <td><a href="" data-toggle="modal" data-target="#ModalCenter" data-id="{{ $patient->id }}">Initiate request</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if($error_resp == '1')
            <div class="row justify-content-center" style="height:30vh;"> 
                <img src="{{asset('assets/image/thought.svg')}}" class="thought">
            </div>
            <p class="text-center pt-5 size">No Record Found</p>
            <p class="text-center pb-5 size2">Try changing the filter or search term  or <span><a href="{{route('addpatient')}}">Register Patient</a> </span></p>
        @endif
        <div id="no-response">
            
        </div>
        

    </div>

    <div class="modal fade" id="certtifcatemodal" tabindex="-1" role="dialog" aria-labelledby="certtifcatemodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header text-center rounded-0">

                <h5 class="modal-title w-100"  id="certtifcatemodalTitle">SELECT REQUEST TYPE</h5>
                
            </div>
            <form method="post" action="{{route('storerequest')}}">
                @csrf
                <input type="hidden" id="patient_id" name="patient_id">
                <div class="modal-body">
                <div class="form-group px-4">
                    <label for="inputService">Select a certifcate/report</label><p></p>
                    <select id="inputService" name="document" class="form-control">
                    <option>select certificate/report</option>
                    @foreach($documents as $document)
                        <option value="{{$document->id}}">{{$document->name}} {{$document->amount}}</option>
                    @endforeach
                    </select>
                </div>
                        
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
                <button type="submit" class="btn btn-primary">INITIATE</button>
                </div>
            </form>
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
            $('.pat').addClass("is-expanded");
            $('.search').addClass("active");
        });

</script>
<script type="text/javascript">
    
    $('#search').on('keyup',function(){
    
        $value=$(this).val();
        
        $.ajax({
        
            type : 'get',
            
            url : '{{URL::to('search')}}',
            
            data:{'search':$value},

            dataType:'json',
            
            success:function(data){
            
                $('tbody').html(data.table_data);
                $('#patient_id').val(data.patient);
                $('#no-response').html(data.no_res);
            }
        
        });
    
    })

</script>

<script type="text/javascript">

    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>

@stop