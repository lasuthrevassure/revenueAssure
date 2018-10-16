@extends('layouts.master')
@section('content')


			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li >{{ $error }}</li>
					@endforeach
				</ul>
			@endif

<form method="post" action="{{route('update_signature', ['signature'=>$signature])}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{$signature->id}}" name="patient_id">
        <h4 class="px-4 pb-3"><img src="{{asset('assets/image/clipboard.svg')}}" class="wallet pr-2"><span>Update Signature</span></h4>

        <div class="form-group px-4">
            <label for="fname">Firstname</label>
            <div class="row">
                <div class="col-md-6"><input id="owner_firstname" class="form-control" value="{{$signature->owner_firstname}}" name="owner_firstname"></div>

            </div>
        </div>

        <div class="form-group px-4">
            <label for="fname">Lastname</label>
            <div class="row">
                <div class="col-md-6"><input id="owner_lastname" class="form-control" value="{{$signature->owner_lastname}}" name="owner_lastname"></div>
            </div>
        </div>

        <!--  -->
        <div class="form-group px-4">
            <label for="email">Email Address</label>
            <input id="email" class="form-control" name="owner_email" value="{{$signature->owner_email}}">
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="phone">Phone Number</label>
            <input id="phone" class="form-control" name="owner_phone" value="{{$signature->owner_phone}}">
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="address">Role</label>
            <input id="address" class="form-control" type="text" name="owner_role" value="{{$signature->owner_role}}">

        </div>

        <div class="form-group px-4">
					<label for="">Upload Document <span style="color:red;font-size:12px">* File must be in png, jpg</span></label>
				</div>

        <input type="hidden" name="signature_id"  value='{{ $signature->id }}'>

        <div class="form-group px-4">
					<input type="file" class="form-control" name="fileToUpload">
					@if ($errors->has('fileToUpload'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('fileToUpload') }}</strong>
						</span>
					@endif
				</div>


    <div class="form-group px-4">
        <button type="button" class="btn btncan" data-dismiss="modal">CANCEL</button>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </div>

</form>

@endsection
