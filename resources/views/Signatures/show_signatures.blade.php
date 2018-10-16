@extends('layouts.master')
@section('content')


			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach ($errors->all() as $error)
						<li >{{ $error }}</li>
					@endforeach
				</ul>
			@endif


    <input type="hidden" value="{{$signature->id}}" name="patient_id">
        <h4 class="px-4 pb-3"><img src="{{asset('assets/image/clipboard.svg')}}" class="wallet pr-2"><span>Signature</span></h4>

        <div class="form-group px-4">
            <label for="fname">Firstname</label>
            <div class="row">
                <div class="col-md-6">{{ $signature->owner_firstname }}</div>

            </div>
        </div>

        <div class="form-group px-4">
            <label for="fname">Lastname</label>
            <div class="row">
                <div class="col-md-6"> {{$signature->owner_lastname}} </div>
            </div>
        </div>

        <!--  -->
        <div class="form-group px-4">
            <label for="email">Email Address</label>
            {{$signature->owner_email}}
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="phone">Phone Number</label>
            {{$signature->owner_phone}}
        </div>
        <!--  -->
        <div class="form-group px-4">
            <label for="address">Role</label>
            {{$signature->owner_role}}

        </div>

        <div class="form-group px-4">
					<label for="">Signature<span style="color:red;font-size:12px">* File must be in png, jpg</span></label>
				</div>

        <div class="form-group px-4">
						<img src="/images/{{ $signature->signature }}" />
				</div>


    <div class="form-group px-4">
        <button onclick="location.href = '{{ route('edit_signature', ['signature'=>$signature]) }}'" type="button" class="btn btncan" data-dismiss="modal">Edit</button>

				<form method="post" action="{{ route('delete_signature', ['signature'=>$signature]) }}">@csrf
        		<button type="submit" class="btn btn-danger">Delete</button>
				</form>
    </div>

</form>

@endsection
