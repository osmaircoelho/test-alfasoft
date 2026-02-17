<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()->latest()->paginate(10);

        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact();

        return view('contact.create', compact('contact'));
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        //Por enquanto, redireciona para a lista.
        //depois podemos trocar para contact.show.
        return redirect()
            ->route('contacts.show', $contact)
            ->with('success', 'Contato criado com sucesso.');
    }

    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }
}
