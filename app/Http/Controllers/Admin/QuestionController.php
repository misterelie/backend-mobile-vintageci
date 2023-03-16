<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
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
        $page_title = "Gestion des questions fréquentes";
        $questions = Question::latest()->paginate(10);
        return view("admin/about/question", compact(["page_title", "questions"]));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null($request->question)){
            return redirect()->back()->with('error', 'Veuillez compléter les champs.');
        }
        $message = Question::create([
            'question'=> Str::lower($request->question),
            'reponse'=> Helpers::encodeText($request->reponse),
        ]);
        if($message)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

   
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $array = [
            'question'=> Str::lower($request->question),
            'reponse'=> Helpers::encodeText($request->reponse),
        ];
        if($question->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $query = $question->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
