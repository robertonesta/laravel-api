<?php

namespace App\Http\Controllers\API;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        //dump the payload to the page
        //dd($request->all());
        $data = $request->all();
        //Validate the request fields
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required',
        ]);

        //check if validation fails and returns the validation error messages
        if($validator->fails()){
           return response()->json([
            'success'=>false,
            'error'=> $validator->errors(),
           ]);
        }

        //save the lead into the db
        $newLead = New Lead();
        $newLead->fill($data);
        $newLead->save();

        //send the mailable
        Mail::to('info@boolpress.com')->send(new NewLead($newLead));
        //return a success response
        return response()->json([
            'success'=>true
        ]);
    }
}
