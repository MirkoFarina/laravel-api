<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    function store (Request $request){
        $data = $request->all();
        $success = true;
        $validator = Validator::make($data,
        [
            'name' => 'required|min:3|max:255',
            'email' => 'required|max:255|email',
            'message' => 'required|min:5'
        ]);

        // check validazione
        if($validator->fails()) {
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }
        // salvo dati nel db
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info-mirko@portfolio.com')->send(new NewContact($new_lead));

        return response()->json(compact('success'));
    }
}
