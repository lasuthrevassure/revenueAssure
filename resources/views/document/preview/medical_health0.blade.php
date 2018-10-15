<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ public_path() . '/css/bootstrap.min.css' }}">
  <link rel="stylesheet" href="{{ public_path() . '/css/style.css' }}" type="text/css">
    <title>LRA</title>
    <style>
    .titresults {
      font-weight: bold;
    }
  </head>
  <body class="h-100" style="font-size:10px">
      <div class="container-fluid">
        <div class="row">

            <main class="main-content col-lg-12 col-md-12 col-sm-12  col-xs-12  p-0 ">

                   <table class="table text-center table-borderless">

                         <tbody>
                           <tr>

                             <td>
                                     <img src="{{ public_path() . '/image/lasuthlogo.png' }}" alt="">
                             </td>
                             <td> &nbsp;</td>
                             <td>
                               <p style="font-size:10px;" class="text-right cour"> {{  \Carbon\Carbon::now('UTC')->format('d F, Y') }} </p>
                               <p class="text-right cour">SUB/LASUTH/302/034</p>
                             </td>

                           </tr>

                              <tr>

                                <td colspan="3">
                                  <h5 class="text-center">RE : {{ strtoupper( $patient->firstname .' '. $patient->lastname ) }}</h5>
                                  <h5 class="text-center">MEDICAL CERTIFICATE OF FITNESS</h5>
                                  <p class="text-left intro">I hearby Clearify that I have examined the above named person and therefore i have listed out various medical test for you to conduct.</p>
                                  <p class="text-left test">The medical Tests are as follows:</p>

                                </td>

                              </tr>


                          <tr>

                            <td>
                                <div class="text-left">
                                 <table >
                                       <tbody>
                                         <tr>
                                           <td>
                                             <span class="titresults">1. Temparature</span>
                                             <span class="results">{{ $temperature }}</span>
                                           </td>
                                           <td>
                                             <span for="temparature8" class="titresults">8. E.C.G</span>
                                             <span class="results">{{ $ecg }}</span>
                                           </td>
                                         </tr>
                                         <!-- 1st line end -->
                                         <tr>
                                           <td>
                                             <span for="temparature2" class="titresults">2. Hepatitis B&C Antigen</span>
                                              <span class="results">{{ $hepatatitis }}</span>
                                           </td>
                                           <td>
                                             <span for="temparature9" class="titresults">9. FBS</span>
                                             <span class="results">{{ $fbs }}</span>
                                           </td>
                                         </tr>
                                         <!-- second-line end -->
                                         <tr>
                                           <td>
                                             <span for="temparature3" class="titresults">3. HIV I & II</span>
                                             <span class="results">{{ $hiv }}</span>
                                           </td>
                                           <td>
                                             <span for="temparature10" class="titresults">9. Stool</span>
                                             <span class="results">{{ $stool }}</span>
                                           </td>
                                         </tr>
                                         <!-- 3rd line end -->
                                         <tr>
                                             <td>
                                               <span for="temparature4" class="titresults">4. Blood Pressure</span>
                                               <span class="results">{{ $blood_pressure }}</span>
                                             </td>
                                             <td>
                                                 <span for="temparature10" class="titresults">10. Urinalysis</span>
                                                 <span class="results">{{ $urinalysis }}</span>
                                             </td>
                                           </tr>
                                             <!-- 4th line end -->

                                             <tr>
                                                <td>
                                                    <span for="temparature5" class="titresults">5. Genotype</span>
                                                    <span class="results">{{ $genotype }}</span>
                                               </td>
                                               <td>
                                                    <span for="temparature10" class="titresults">11. Anemia</span>
                                                    <span class="results">{{ $anemia }}</span>
                                               </td>
                                                 </tr>
                                                 <!-- 5th line end -->
                                                 <tr>
                                                       <td>
                                                         <span for="temparature6" class="titresults">6. Blood group</span>
                                                         <span class="results">{{ $blood_group }}</span>
                                                       </td>
                                                       <td>
                                                            <span for="temparature10" class="titresults">12. Ear, Nose and Throat</span>
                                                            <span class="results">{{ $ent }}</span>
                                                       </td>

                                                     </tr>
                                                     <!-- 6th line end -->
                                                     <tr>

                                                           <td>
                                                                <span for="temparature7" class="titresults">7. PVG</span>
                                                                <span class="results">{{ $pvg }}</span>
                                                           </td>
                                                           <td>

                                                           </td>

                                                      </tr>
                                                       <!-- 7th line end -->
                                                       </tbody>
                                                 </table>
                                              </div>
                                   </td>

                              </tr>
                              <tr>

                                       <td colspan="3"s>
                                         <p class="text-left">Please conduct these tests and get back to your doctor as soon as possible. In case of any medical emergencies or question please see your doctor.</p>
                                         <!-- signatures -->
                                         <p class="text-left mb-2 daate">{{ date('d F, Y', strtotime($party_time)) }}</p>
                                         <p class="text-left"><img src="{{ public_path() . '/images/' . $doctor_signature }}" /></p>
                                         <p class="text-left docsname">{{ $doctor_name }}</p>
                                         <p class="text-left docsdept">{{ $doctor_designation }}</p>
                                       </td>

                                     </tr>
                                   </tbody>
                                </table>
                             <!-- form-end -->

            </main>
        </div>


      </div>


  </body>
</html>
