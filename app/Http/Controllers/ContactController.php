<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Kirim email ke pengelola
        Mail::to(users: 'mujinalim@gmail.com')->send(new ContactMail($validated));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim! Terima kasih 😊');
    }
}

