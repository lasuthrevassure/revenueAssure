@extends('layouts.master')

@section('head')
  <script type="text/JavaScript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
  <link type="text/css" rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css" />
@stop

@section('content')

@if(Session::has('status'))
<p class="alert alert-info">{{ Session::get('status') }}</p>
@endif

<div class="container certform mt-4">

  <ul class="nav nav-fill bg-white my-3 final">
        <li class="nav-item">
              <a class="nav-link" href="{{ route('indexForm', ['documentRequest'=>$validatedData['documentRequestID'] ]) }}" download="{{ $validatedData['patient']->firstname }}_medical_fitness.pdf"><img src="/image/save.svg" class="pr-2"/><span> Save report</span></a>
        </li>
        <li class="nav-item  border-right border-left">
              <a class="nav-link " id="printDoc" href="#" onclick="printJS('{{ route('indexForm', ['documentRequest'=>$validatedData['documentRequestID'] ]) }}')"><img src="/image/print.svg" class="pr-2"/><span>Print report</span></a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="{{ route('emailForm', ['documentRequest'=>$validatedData['documentRequestID'] ]) }}"><img src="/image/mail.svg" class="pr-2"/><span>Send to email</span></a>
        </li>
  </ul>

<div class="card" id="printArea">
     <div class="card-body">

         <div class="clearfix certhead">
             <div class="float-left">
                 <img src="/image/lasuthlogo.png" alt="">
             </div>

             <div class="float-right">
                 <p class="text-right cour">{{  \Carbon\Carbon::now('UTC')->format('d F, Y') }}</p>
                 <p class="text-right cour">SUB/LASUTH/302/034</p>
             </div>
         </div>

         <div class="container certbody">
             <h5 class="text-center">RE : {{ strtoupper( $validatedData['patient']->firstname .' '. $validatedData['patient']->lastname ) }}</h5>
             <h5 class="text-center">MEDICAL CERTIFICATE OF FITNESS</h5>
             <p class="text-left intro">I hearby Clearify that I have examined the above named person and therefore i have listed out various medical test for you to conduct.</p>
             <p class="text-left test">The medical Tests are as follows:</p>
             <form action="" id="medical">
                 <div class="row details">
                     <div class="col-sm-6">
                         <div class="form-group pb-2">
                             <label for="temparature" class="titresults">1. Temparature</label>
                             <ul>
                                     <li class="results">{{ $validatedData['temperature'] }}</li>
                             </ul>

                         </div>
                         <div class="form-group pb-2">
                                 <label for="temparature2" class="titresults">2. Hepatitis B&C Antigen</label>
                                 <ul>
                                         <li class="results">{{ $validatedData['hepatatitis'] }}</li>
                                 </ul>
                             </div>
                             <div class="form-group pb-2">
                                     <label for="temparature3" class="titresults">3. HIV I & II</label>
                                     <ul>
                                             <li class="results">{{ $validatedData['hiv'] }}</li>
                                     </ul>
                                 </div>

                                 <div class="form-group pb-2">
                                         <label for="temparature4" class="titresults">4. Blood Pressure</label>
                                         <ul>
                                                 <li class="results">{{ $validatedData['blood_pressure'] }}</li>
                                         </ul>
                                     </div>
                                     <div class="form-group pb-2">
                                             <label for="temparature5" class="titresults">5. Genotype</label>
                                             <ul>
                                                     <li class="results">{{ $validatedData['genotype'] }}</li>
                                             </ul>
                                         </div>
                                         <div class="form-group pb-2">
                                                 <label for="temparature6" class="titresults">6. Blood group</label>
                                                 <ul>
                                                         <li class="results">{{ $validatedData['blood_group'] }}</li>
                                                 </ul>
                                             </div>
                                             <div class="form-group pb-2">
                                                     <label for="temparature7" class="titresults">7. PVG</label>
                                                     <ul>
                                                             <li class="results">{{ $validatedData['pvg'] }}</li>
                                                     </ul>
                                                 </div>
                            </div>
                     <!-- form split -->
                     <div class="col-sm-6">
                             <div class="form-group pb-2">
                                 <label for="temparature8" class="titresults">8. E.C.G</label>
                                 <ul>
                                         <li class="results">{{ $validatedData['ecg'] }}</li>
                                 </ul>
                             </div>
                                 <div class="form-group pb-2">
                                     <label for="temparature9" class="titresults">9. FBS</label>
                                     <ul>
                                             <li class="results">{{ $validatedData['fbs'] }}</li>
                                     </ul>
                                 </div>
                                 <div class="form-group pb-2">
                                     <label for="temparature10" class="titresults">9. Stool</label>
                                     <ul>
                                             <li class="results">{{ $validatedData['stool'] }}</li>
                                     </ul>
                                 </div>
                                <div class="form-group pb-2">
                                   <label for="temparature10" class="titresults">10. Urinalysis</label>
                                   <ul>
                                           <li class="results">{{ $validatedData['urinalysis'] }}</li>
                                   </ul>
                                </div>
                                <div class="form-group pb-2">
                                       <label for="temparature10" class="titresults">11. Anemia</label>
                                       <ul>
                                               <li class="results">{{ $validatedData['anemia'] }}</li>
                                       </ul>
                                 </div>
                                 <div class="form-group pb-2">
                                     <label for="temparature10" class="titresults">12. Ear, Nose and Throat</label>
                                     <ul>
                                             <li class="results">{{ $validatedData['ent'] }}</li>
                                     </ul>
                                 </div>

                         </div>
                 </div>
             </form>

                 <!-- form-end -->
                 <p class="text-left certend">Please conduct these tests and get back to your doctor as soon as possible. In case of any medical emergencies or question please see your doctor.</p>
                 <!-- signatures -->
                 <p class="mb-2 daate">{{ $validatedData['party_time'] }}</p>
                 <p> <img src="{{ '/images/' . $validatedData['doctor_signature'] }}"/> </p>
                 <p class="docsname">{{ $validatedData['doctor_name'] }}</p>
                 <p class="docsdept">{{ $validatedData['doctor_designation'] }}</p>
         </div>
     </div>
 </div>

</div>

@endsection

@section('script')

@endsection
