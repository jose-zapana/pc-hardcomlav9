<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function showContact()
    {
        return view('contact.contact');
    }
}
