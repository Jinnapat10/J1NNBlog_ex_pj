<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactPage(Request $request) {

        $data = [];

        return view('frontend.pages.contact_page',$data); //about me
    }

    public function sendMessage(Request $request) {
        // validate form here
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('jinnapat.ch10@gmail.com')->send(new ContactMail($data));
        return redirect()->back()->with('success', 'Your message has been successfully sent.');
    }
}
