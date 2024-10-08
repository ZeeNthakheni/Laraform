<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\submissions;

class submissions_controller extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }

    public function submit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required' 
        ]);

        //ZeeNN

        $submission = new submissions;
        $submission->name = $request->input('name');
        $submission->email = $request->input('email');
        $submission->message = $request->input('message');
        $submission->save();

        return view('pages.thank_you')->with(['name' => $submission->name, 'email' => $submission->email]);

    }
}

