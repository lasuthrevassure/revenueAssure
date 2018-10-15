@extends('layouts.master')




@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
{{ Form::open(['method' => 'POST', 'route' => ['storeForm', "document"=>$type, "patientRequest"=>$patientRequest] ]) }}
{{-- {{ Form::json($json_form) }} --}}

@include('document.forms.' . $form_fields )
{{ Form::hidden('type', $type) }}

<input id="doctor-signature" type="hidden" name="doctor_id" value="0" />

<div id="showID"></div>
{{ Form::submit('Submit', ['class' => 'form-control']) }}
{{ Form::close() }}

<button id="add_doctor" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Doctor</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          @foreach($signature as $doctor)
              <input class="doctor-signature" id ="doctor-{{$doctor->id}}" type="radio" name="signature_id" value="{{ $doctor->id }}" />
              <p>{{ $doctor->owner_firstname}} {{ $doctor->owner_lastname}}</p>

              <p> <img src="/images/{{ $doctor->signature}}" /></p>
          @endforeach
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

@section('script')
<script>
let doctorsSignature = @json($signature);

let doctorsMap = {};
for( doctor in doctorsSignature){
    console.log( doctor );
    doctorsMap[doctorsSignature[doctor]['id']] = doctorsSignature[doctor];
}

console.log( doctorsMap );

$(function() {
  $('.doctor-signature').change(function() {
    var value = $(this).val();
    //$('h1').html(value);
    showSignatureArea( value );
    $('#myModal').modal('hide');
  });
});

function showSignatureArea( id )
{
    let area = `<div class="span-full"> <p>doctor name: ${doctorsMap[id].owner_firstname} ${doctorsMap[id].owner_lastname}</p><p>signature: <img src="/images/${id}.png" /></div>`;
    $('#doctor-signature').val( id );
    $('#showID').html( area );

}

</script>
@endsection
