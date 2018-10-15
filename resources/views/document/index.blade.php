@extends('layouts.master')

@section('content')
<div class="container">

<div class="row justify-content-start">

  @foreach( $documents as $document )
  <div class="card" style="width: 18rem;">
  <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
  <div class="card-body">
    <h5 class="card-title">{{ $document->name }}</h5>
    <p class="card-text"> description... </p>

    <a href="/document/form/{{ $document->id }}" class="btn btn-primary">Go</a>

  </div>
</div>
@endforeach



</div>




</div>
@endsection
