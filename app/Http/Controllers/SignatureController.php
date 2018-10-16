<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signatures = Signature::paginate(15);

        //dd( $signatures );

        return view('Signatures.index',compact('signatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Signatures.new_signature');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileToUpload'   => 'mimes:png',
            'user_id' => 'required',
            'owner_firstname' => 'required',
            'owner_lastname' => 'required',
            'owner_phone' => 'required',
            'owner_email' => 'required',
            'owner_role' => 'required',
            'signature' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                      ->withErrors($validator)
                      ->withInput();
        } else {
            $file = $request->file('fileToUpload');
            $destinationPath = public_path() . "/file/documents/";
            $filename = $file->getClientOriginalName();
            $docPdf = $file->move($destinationPath, $filename);

            $new_signature = Signature::create([
                'user_id' => Auth::id(),
                'owner_firstname' => $request->owner_firstname,
                'owner_lastname' => $request->owner_lastname,
                'owner_phone' => $request->owner_phone,
                'owner_email' => $request->owner_email,
                'owner_role' => $request->owner_role,
                'signature' => $filename
            ]);

            $new_signature->save();

            if($new_signature){
                return redirect('signatures')->with("success","signature successfully created");;
            }else{
                return back()->withErrors('error','error creating new_signature');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
      return view('Signatures.show_signatures',compact('signature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */

    public function edit(Signature $signature)
    {
        return view('Signatures.edit_signatures',compact('signature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signature $signature)
    {
         $validator = Validator::make($request->all(), [
             'fileToUpload'   => 'mimes:png',
             'owner_firstname' => 'required',
             'owner_lastname' => 'required',
             'owner_phone' => 'required',
             'owner_email' => 'required',
             'owner_role' => 'required',
             'signature_id' => 'required'
         ]);

         if ($validator->fails()) {
             return back()
                         ->withErrors($validator)
                         ->withInput();
         }else{

             if($request->hasFile('fileToUpload')){
                 $file = $request->file('fileToUpload');
                 $destinationPath = public_path(). "/file/documents/";
                 $filename = $file->getClientOriginalName();
                 $file->move($destinationPath, $filename);
             }else{
                 $filename = $signature->signature;
             }


             $new_signature = Signature::where('id',$request->signature_id)->first();

             $new_signature->update([
                 'user_id' => Auth::id(),
                 'owner_firstname' => $request->owner_firstname,
                 'owner_lastname' => $request->owner_lastname,
                 'owner_phone' => $request->owner_phone,
                 'owner_email' => $request->owner_email,
                 'owner_role' => $request->owner_role,
                 'signature' => $filename
             ]);

             $new_signature->save();

             if($new_signature){
                 return redirect('signatures')->with("success","signature successfully created");;
             }else{
                 return back()->withErrors('error','error creating new_signature');
             }
         }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $signature)
    {
          $signature = $signature->delete();

          if($signature)
          {
              return redirect('signatures')->with('success','Signature successfully deleted');
          } else {
              return back()->withErrors('error','error deleting signature');
          }
    }
}
