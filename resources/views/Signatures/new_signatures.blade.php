@extends('layouts.master')
@section('content')

<form method="post" action="{{route('updatepatient')}}">
    @csrf
    <input type="hidden" value="{{$patient->id}}" name="patient_id">
    <div class="modal-body">
        <h4 class="px-4 pb-3"><img src="{{asset('assets/image/clipboard.svg')}}" class="wallet pr-2"><span>Update patient</span></h4>
        <div class="form-group px-4">
            <label for="fname">Fullname</label>
            <div class="row">
                <div class="col-md-6"><input id="fname" class="form-control" value="{{$patient->firstname}}" name="firstname"></div>
                <div class="col-md-6"><input id="lname" class="form-control" value="{{$patient->lastname}}" name="lastname"></div>
            </div>
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="email">Email Address</label>
            <input id="email" class="form-control" name="email" value="{{$patient->email}}">
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="phone">Phone Number</label>
            <input id="phone" class="form-control" name="phone" value="{{$patient->phoneno}}">
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="address">Home Address</label>
            <input id="address" class="form-control" name="address" value="{{$patient->address}}">
        </div>
        <div class="form-group px-4">
            <label for="address">State $ lga</label>
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" name="state" id="state" required>
                        <option value="{{$patient->state_id}}">{{$patient->patstate->name}}</option>
                        @foreach($states as $state)
                            <option value="{{$state->state_id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="lga" id="lga" required>
                        <option value="{{$patient->lga_id}}">{{$patient->lga->local_name}}</option>
                        <option value="">select LGA</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </div>
</form>

@endsection

@section('script')
  <script type="text/javascript" src="{{asset('assets/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/plugins/dataTables.bootstrap.min.js')}}"></script>
@endsection
