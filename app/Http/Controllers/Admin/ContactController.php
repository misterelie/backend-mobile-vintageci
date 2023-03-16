<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function __construct()
    {
        parent::boot();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Gestion des messages de contact.";
        $contacts = Contact::latest()->paginate(10);
        return view("admin/about/contact", compact(["page_title", "contacts"]));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "nom" => "required|min:3",
            "objet" => "required",
            "message" => 'required|min:8',
        ]);
        $message = Contact::create([
            'email'=> Str::lower($request->email),
            'objet'=> Str::lower($request->objet),
            'nom'=> Str::lower($request->nom),
            'message'=> Helpers::encodeText($request->message),
        ]);
        if($message)
        {
            return redirect()->back()->with('success', 'Félicitations! Votre message a été envoyé avec succès. Notre équipe vous contactera éventuellement. ');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $query = $contact->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
