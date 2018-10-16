<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Documents;
use App\DocumentRequests;
use App\Signature;
use App\PatientRequest;

use Validator;
use Auth;
use Storage;
use Spatie;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use \Dompdf\Dompdf;
use \Dompdf\Options;


class PDFGeneratorController extends Controller
{
  public function __construct()
  {
      return $this->middleware('auth');
  }

  public function showForm(Request $request, PatientRequest $patientRequest , Documents  $document)
  {
    $type = $document->id;

    $json_form =  public_path() . DIRECTORY_SEPARATOR . "json" . DIRECTORY_SEPARATOR . $document->form_fields . ".json";

    $form_fields = $document->form_fields;
    //$data = json_decode( $document_data, true );

    //dd( $json_form );
    $signature = Signature::all();

    return view('document.form',compact('json_form', 'type', 'signature', 'form_fields', 'patientRequest'));
  }


  public function storeForm(Request $request, PatientRequest $patientRequest, Documents  $document )
  {
    //dd(request()->all());

    $json_form =  public_path() . DIRECTORY_SEPARATOR . "json" . DIRECTORY_SEPARATOR . $document->form_fields ."_validation.json";

    $party_time = $request->input('party_time');


    $json = file_get_contents( $json_form );

    $validation = json_decode( $json, true );

    // Validation
    $validatedData = $this->validate($request, $validation);

    // get the signatory
    $signatory = Signature::find( $request->input('doctor_id') );
    $doctor_name = $signatory->owner_firstname .' '.$signatory->owner_lastname;
    $doctor_designation = $signatory->designation;
    $doctor_signature = $signatory->signature;

    $doctor_address = $signatory->address;

    $validatedData = array_merge($validatedData, compact('doctor_name', 'doctor_signature', 'doctor_designation', 'doctor_address') );

    $documentRequests = DocumentRequests::where("request_id", $patientRequest->id)->first();

    if (  is_null($documentRequests ) ){
        $documentRequests = new DocumentRequests;
        $documentRequests->request_id = $patientRequest->id;
    }

    $documentRequests->document_id = $document->id;
    $documentRequests->signature_id = $signatory->id;
    $documentRequests->user_id = auth()->id();
    $documentRequests->form_values =  json_encode( $validatedData );
    $documentRequests->save();

    return redirect()->route('previewForm',['documentRequests'=>$documentRequests]);

    //view('document.preview.' . $document->form_fields, compact('json_form', 'validatedData', 'type', 'signature', 'form_fields', 'patientRequest', 'documentRequests'));

  }

  public function previewForm(Request $request, DocumentRequests $documentRequest )
  {

    $validatedData = $this->getValidatedData( $documentRequest );

    return view('document.preview.' . $documentRequest->document->form_fields, compact('validatedData'));

  }


  public function indexForm( Request $request, DocumentRequests $documentRequest )
  {

    $validatedData = $this->getValidatedData( $documentRequest );

    $html = view('document.preview.' . $documentRequest->document->form_fields.'0', $validatedData )->render();

    // display
    return $this->display( $html );

  }

  public function emailForm( Request $request, DocumentRequests $documentRequest )
  {

      $validatedData = $this->getValidatedData( $documentRequest );

      $html = view('document.preview.' . $documentRequest->document->form_fields.'0', $validatedData )->render();

       \Mail::send('emails.medical_fit', ['name'=>"wole"], function($message) use ($html) {

            $message->to('olawolemoses@gmail.com','John Smith')->subject('Send Mail from Laravel');

            $message->from('info@lasuthreveassure.com','The Sender');

            $content = $this->getContent( $html );

            $message->attachData($content, 'filename.pdf');

       });

      request()->session()->flash('status', 'The mail has been sent to you.');

      return redirect()->route('previewForm',['documentRequest'=>$documentRequest]);

  }



  public function display( $html )
  {

    // print to PDF
    // instantiate and use the dompdf class

    $content = $this->getContent( $html );

    return response($content)
        ->header('Content-Type', 'application/pdf')
        ->header('filename', "filename.pdf")
        ->header('Content-Disposition', 'inline');
  }

  public function getContent( $html )
  {
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $options->set('defaultFont', 'Helvetica');
    $dompdf = new Dompdf( $options );
    $dompdf->loadHtml( $html );
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $content = $dompdf->output();

    return $content;
  }

  public function getValidatedData( $documentRequest )
  {
    $validatedData = json_decode( $documentRequest->form_values, true ) ;

    $document = Documents::find( $documentRequest->document_id );
    // template

    $patient = $documentRequest->patientRequest->patient;

    $documentRequestID = $documentRequest->id;

    $validatedData = array_merge($validatedData, compact('patient', 'document', 'documentRequestID') );

    return $validatedData;
  }

  public function index()
  {
      $documents = Documents::paginate(15);
      return view('document.index',compact('documents'));
  }

  public function create()
  {
      $categories = Category::all();
      return view('admin.documents.adddocument',compact('categories'));
  }

  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'fileToUpload'   => 'mimes:pdf|required',
          'document_name' => 'required',
          'document_description' => 'required',
          'document_price' => 'required',
          'document_category' => 'required',
      ]);

      if ($validator->fails()) {
          return redirect('admin/adddocument')
                      ->withErrors($validator)
                      ->withInput();
      }else{

          $file = $request->file('fileToUpload');
          $destinationPath = public_path() . "/file/documents/";
          $filename = $file->getClientOriginalName();
          $docPdf = $file->move($destinationPath, $filename);

          //dd( $docPdf );

          $document = Document::create([
              'user_id' => Auth::id(),
              'title' => $request->document_name,
              'description' => $request->document_description,
              'amount' => $request->document_price,
              'filename' => $filename,
              'category_id' => $request->document_category
          ]);

          $getPreviewPdfFIle = $this->performGeneratePreviewPDF( $document );

          $document->preview = $getPreviewPdfFIle;

          $document->save();

          if($document){
              return redirect('admindocuments')->with("success","document successfully created");;
          }else{
              return back()->withErrors('error','error creating document');
          }
      }
  }


  public function destroy(Request $request)
  {

      $document = Document::where('id','=',$request->document_id)->delete();

      if($document)
      {
          return back()->with('success','Document successfully deleted');
      }
      else
      {
          return back()->withErrors('error','error deleting document');
      }
  }


  public function previewDocument($id)
  {
      $document = Document::findOrFail($id);

      // get the pdf file
      $getPreviewPdfFIle = $this->performGeneratePreviewPDF( $document );

      return $getPreviewPdfFIle;
  }

  public function show($id)
  {
      $document = Document::findOrFail($id);
      $categories = Category::all();
      return view('admin.documents.editDocument',compact('document','categories'));
  }

  public function update(Request $request)
  {
      $document = Document::findOrFail($request->document_id);
      $validator = Validator::make($request->all(), [
          'fileToUpload'   => 'mimes:doc,pdf,docx,zip'
      ]);

      if ($validator->fails()) {
          return redirect('admin/adddocument')
                      ->withErrors($validator)
                      ->withInput();
      }else{

          if($request->hasFile('fileToUpload')){
              $file = $request->file('fileToUpload');
              $destinationPath = public_path(). "/file/documents/";
              $filename = $file->getClientOriginalName();
              $file->move($destinationPath, $filename);
          }else{
              $filename = $document->filename;
          }

          $new_document = Document::where('id',$request->document_id)->update([
              'user_id' => Auth::id(),
              'title' => $request->document_name,
              'description' => $request->document_description,
              'amount' => $request->document_price,
              'filename' => $filename,
              'category_id' => $request->document_category
          ]);

          $getPreviewPdfFIle = $this->performGeneratePreviewPDF( $new_document );

          $new_document->preview = $getPreviewPdfFIle;

          $new_document->save();

          if($new_document){
              return redirect('admindocuments')->with("success","document successfully created");;
          }else{
              return back()->withErrors('error','error creating document');
          }
      }
  }

  public function configdocuments(Request $request, Document $document)
  {
      $form = json_decode( $document->json_form );
      return view('document.configdocument', ['document' => $document, 'form'=>$form ]);
  }

  public function configdata(Request $request, Document $document)
  {
      //$document = Document::find(1);
      $data = $request->all();
      $data['today']= date('d-m-Y');
      session(['document' => $data]);
      return view('document.template_document', ['document'=>$document]);
  }

  public function configdata2(Document $document, OrderDocument $order)
  {
      if( $this->hasDocumentOrdered($order, $document ) )
      {
          $template = $document->json_template;
          $php = \Blade::compileString($template);
          $data = json_decode( $order->document_data, true );
          $php = render($php, ['data'=>$data ]);
      }
      else
      {
          $data =  session('document');
          $template = $document->json_template_excerpt;
          $php = \Blade::compileString($template);
          $php = render($php, ['data'=>$data ]);
          $php = $php . " " . "<div><img src='http://sbscdemo.com/blur.jpg' /></div>";
      }

      // instantiate and use the dompdf class
      $options = new Options();
      $options->set('isRemoteEnabled', TRUE);
      $options->set('defaultFont', 'Helvetica');
      $dompdf = new Dompdf( $options );
      $dompdf->loadHtml( $php );
      $dompdf->setPaper('A4', 'landscape');
      $dompdf->render();

      $content = $dompdf->output();

      return response($content)
          ->header('Content-Type', 'application/pdf')
          ->header('filename', "filename.pdf")
          ->header('Content-Disposition', 'inline');
  }

  public function performGeneratePreviewPDF( $document )
  {
      $document_path = public_path() . "/file/documents/";

      //dd( $document_path );

      $pathToPdf = $document_path . $document->filename;

      $package = [];

      $pdf = new Spatie\PdfToImage\Pdf($pathToPdf);

      $filename = uniqid();

      $filepath =  $document_path . "preview/". $filename;

      $pathToImg = $filepath ."_1.jpg";
      $pdf->saveImage($pathToImg);


      $package[] = $pathToImg;

      $noOfPages = $pdf->getNumberOfPages();
      if( $noOfPages > 1)
      {
          for( $i = 2; $i <= $noOfPages; $i++)
          {
              $pathToImg = $filepath .'_'.$i.'.jpg';
              $pdf->setPage($i)->saveImage($pathToImg);
              $imgBlur = new \Imagick($pathToImg);
              $imgBlur->blurImage(5, 4);
              $imgBlur->writeImage( $pathToImg );
              $package[] =  $pathToImg;
              $imgBlur->clear();
              $imgBlur->destroy();
          }
      }

      $pdf = new \Imagick($package);
      $pdf->setImageFormat('pdf');

      $pathToPreviewPdf = $filepath .'.pdf';
      $pdf->writeImages( $pathToPreviewPdf, true);

      foreach( $package as $file)
          unlink($file);

      return $filename . '.pdf';
  }
}
