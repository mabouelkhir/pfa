<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{   
    public function create($id)
    {
       $projet_id=$id;
    
        
     
        return view(('questionnaire.create'),['IdProjet'=>$projet_id]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'projet_id' => 'required'
        ]);
    
        Questionnaire::create($request->all());
     
        return redirect()->back();
    }
}
