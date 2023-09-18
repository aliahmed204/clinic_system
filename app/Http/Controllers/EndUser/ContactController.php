<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('EndUser.pages.contact');
    }

    public function contact(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id,
        ]);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('ali.ah.mo.ali204@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with(['send'=>'email are sent']);

    }
}
