<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Show the contact form
    public function show()
    {
        return view('contact.show');
    }

    // Handle form submission
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send email to admin
        Mail::to('admin@ehb.be')->send(new ContactFormMail($validated));

        return redirect()->route('contact.show')->with('success', 'Your message has been sent successfully!');
    }
}
