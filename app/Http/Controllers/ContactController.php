<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\ContactMailer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendContactEmail(Request $request) {

        $details['name'] = $request->name;
        $details['email'] = $request->email;
        $details['number'] = $request->phone;
        $details['subject'] = $request->subject;
        $details['message'] = $request->message;
        $details['to_email'] = "enquiries@missveefamouslook.store";
        $details['to_name'] = "MissVee Enquiries";
        
        Mail::to($details['to_email'], $details['to_name'])->send(new ContactMailer($details));
        
        return redirect()->route('contact')->with('success', 'Thank you! We will review your message and respond accordingly.');
    }
}
