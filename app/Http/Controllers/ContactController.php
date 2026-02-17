<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()->latest()->paginate(10);

        return view('contact.index', compact('contacts'));
    }
}
