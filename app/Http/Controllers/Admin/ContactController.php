<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::with('user')->latest()->paginate();
        return view('admin.pages.contact.index',compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with(['deleted'=>'Contact Deleted Successfully']);
    }
}
