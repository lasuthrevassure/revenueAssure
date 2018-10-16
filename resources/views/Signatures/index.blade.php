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
                        <span class="d-none d-lg-inline d-md-inline" style="font-size:13px;"> Signatory List</span>
            </div>
          </div>
        </div>
      </div>

      <a href="{{route('create_signature')}}" class="btn text-white rounded-0 w-25 pl-5" style="background-color: #7078b7;font-size:13px;"><img src="{{asset('assets/image/adduser.svg')}}"
        class="adduser pr-2 pl-3"> <span class="d-none d-lg-inline d-md-inline" style="padding-top:12px;"> Register New Signatory</span></a>
    </nav>
  </div>
</div>

<div class="container bg-white content1" style="border: solid 1px #e0e2e5;">

  <form action="{{route('patientfilter')}}" method="post">
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
              <th scope="col">DESIGNATION</th>
              <th scope="col">EMAIL</th>
              <th scope="col">PHONE NO</th>
              <th scope="col">ACTION</th>
          </tr>
          </thead>
          <tbody>
            @foreach($signatures as $key => $signature)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td><a href="{{route('show_signature',$signature->id)}}">{{$signature->owner_firstname}} {{$signature->owner_lastname}}</a></td>
                    <td>{{$signature->owner_role}}</td>
                    <td>{{$signature->owner_email}}</td>
                    <td>{{$signature->owner_phone}}</td>
                    <td>
                            <a href="{{route('edit_signature',['signature'=> $signature])}}" data-id="{{ $signature->id }}">EDIT</a>
                            &nbsp; <a href="{{route('show_signature',['signature'=> $signature])}}">SHOW</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
      </table>


</div>

<div class="container pag px-0">
  <nav>
    <ul class="pagination justify-content-end">

      {{$signatures->links()}}
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
      $('.pat').addClass("is-expanded");
      $('.allpat').addClass("active");
    });

    $(function() {
      $('#certtifcatemodal').on("show.bs.modal", function (e) {
          $("#patient_id").val($(e.relatedTarget).data('id'));
      });
    });


</script>

@stop
