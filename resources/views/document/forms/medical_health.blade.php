<div class="container certform mt-4">

      <div class="card">
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
                  <h5 class="text-center">RE : ATANDA OLUWASEUN JOSEPH</h5>
                  <h5 class="text-center">MEDICAL CERTIFICATE OF FITNESS</h5>
                  <p class="text-left intro">I hearby Clearify that I have examined the above named person and therefore i have listed out various medical test for you to conduct.</p>
                  <p class="text-left test">The medical Tests are as follows:</p>

                      <div class="row details">
                          <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="temparature">1. Temparature</label>
                                        <input type="text" required="required" name='temperature' class="form-control" id="temparature" placeholder="|write something here">
                                    </div>

                                      <div class="form-group">
                                          <label for="temparature2">2. Hepatitis B&amp;C Antigen</label>
                                          <input type="text" required="required" name="hepatatitis" class="form-control" id="temparature2">
                                      </div>

                                      <div class="form-group">
                                          <label for="temparature3">3. HIV I &amp; II</label>
                                          <input type="text" required="required" name="hiv" class="form-control" id="temparature3">
                                      </div>
                                      <div class="form-group">
                                          <label for="temparature4">4. Blood Pressure</label>
                                          <input type="text" required="required" name="blood_pressure" class="form-control" id="temparature4">
                                      </div>
                                      <div class="form-group">
                                          <label for="temparature5">5. Genotype</label>
                                          <input type="text" required="required" name="genotype" class="form-control" id="temparature5">
                                      </div>
                                      <div class="form-group">
                                          <label for="temparature6">6. Blood group</label>
                                          <input type="text" required="required" name="blood_group" class="form-control" id="temparature6">
                                      </div>
                                      <div class="form-group">
                                          <label for="temparature7">7. PVG</label>
                                          <input type="text" required="required" name="pvg" class="form-control" id="temparature7">
                                      </div>
                                 </div>
                                <!-- form split -->
                                <div class="col-sm-6">

                                      <div class="form-group">
                                          <label for="temparature8">8. E.C.G</label>
                                          <input type="text" required="required" name="ecg" class="form-control" id="temparature8">
                                      </div>

                                      <div class="form-group">
                                          <label for="temparature9">9. FBS</label>
                                          <input type="text" required="required" name="fbs" class="form-control" id="temparature9">
                                      </div>

                                      <div class="form-group">
                                            <label for="temparature10">9. Stool</label>
                                            <input type="text" required="required" name="stool" class="form-control" id="temparature10">
                                      </div>

                                      <div class="form-group">
                                            <label for="temparature10">10. Urinalysis</label>
                                            <input type="text" required="required" name="urinalysis" class="form-control" id="temparature10">
                                      </div>

                                      <div class="form-group">
                                            <label for="temparature10">11. Anemia</label>
                                            <input type="text" required="required" name="anemia" class="form-control" id="temparature10">
                                      </div>

                                      <div class="form-group">
                                            <label for="temparature10">12. Ear, Nose and Throat</label>
                                            <input type="text" required="required" name="ent" class="form-control" id="temparature10">
                                      </div>

                                      <input id="doctor-signature" type="hidden" name="doctor_id" value="0" />

                                </div>
                      </div>

                      <!-- form-end -->
                      <p class="text-left certend">Please conduct these tests and get back to your doctor as soon as possible. In case of any medical emergencies or question please see your doctor.</p>
                      <!-- signatures -->
                      <div class="row stamp">
                          <div class="col-sm-7">
                              <div class="row">
                                  <div class="col-sm-5">
                                      <p>Date</p>
                                  </div>
                                  <div class="col-sm-7">
                                      <p class="mb-0 daate">
                                          <input type="datetime-local" id="party-time" name="party_time" value="2018-06-12T19:30" />
                                      </p>

                                      <p class="signature">____________________________</p>
                                      </div>
                              </div>
                              <div class="form-inline">

                                      <div class="form-group">
                                          <label for="inputdocname" class="docssign">Doctor’s Name  and signature</label>

                                              <input type="text" name="partytime" required="required" class="form-control readdocname" id="inputdocname" value="">

                                          </div>

                                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal" id="addsigna">
                                            <i class="fas fa-plus-circle"></i>
                                          </button>
                                    </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content contentmodal">
<div class="modal-header backcolor">
<h5 class="modal-title w-100" id="exampleModalLabel">Please select doctor's signature</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body body-modal">
<!-- modal-body -->
  <div class="container">
          <form>

              <div class="form-row">
                  <div class="col-sm-6">

                      @foreach($signature as $doctor)

                          @if( $doctor->id % 2 == 1 )
                            <div class="form-group wrap">
                                 <div class="form-check ml-2">
                                     <input class="form-check-input doctor-signature" id ="doctor-{{$doctor->id}}" type="radio" value="{{ $doctor->id }}" id="Check2" required="" name="signature_id" value="{{ $doctor->id }}" >
                                     <label class="form-check-label pl-1" for="Check2">
                                             Dr {{ $doctor->owner_firstname}} {{ $doctor->owner_lastname}}
                                       <br>
                                       <p>{{ $doctor->owner_role }}</p>
                                     </label>
                                 </div>
                             </div>
                          @endif

                      @endforeach
                  </div>
                  <!-- xx -->
                  <div class="col-sm-6">
                    @foreach($signature as $doctor)

                        @if( $doctor->id % 2 == 0 )
                          <div class="form-group wrap">
                               <div class="form-check ml-2">
                                   <input class="form-check-input doctor-signature" id ="doctor-{{$doctor->id}}" type="radio" value="{{ $doctor->id }}" id="Check2" required="" name="signature_id" value="{{ $doctor->id }}" />
                                   <label class="form-check-label pl-1" for="Check2">

                                    Dr {{ $doctor->owner_firstname}} {{ $doctor->owner_lastname}}

                                    <br>

                                     <p>{{ $doctor->owner_role }}</p>

                                   </label>
                               </div>
                           </div>
                        @endif

                    @endforeach
                      </div>
              </div>


                </form>
  </div>
</div>

<div class="modal-footer footer-modal">
        <button type="button" class="btn btn-close" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-savve">Select</button>
</div>

</div>
</div>
</div>
                          </div>
                          <div class="col-sm-5">
                              <button class="btn btn-preview float-right"> PREVIEW</button>
                              </div>
                      </div>
              </div>
          </div>
      </div>
   </div>



@section('script')
       <script>
             let doctorsSignature = @json($signature);

             let doctorsMap = {};
             for( doctor in doctorsSignature){
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
                   let area = `Dr. ${doctorsMap[id].owner_firstname} ${doctorsMap[id].owner_lastname}`;
                   $('#doctor-signature').val( id );
                   $('#inputdocname').val( area );
             }
       </script>
@endsection
