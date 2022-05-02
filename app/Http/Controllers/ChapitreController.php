<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use  App\Models\Chapitre;
use  App\Projet;
use Illuminate\Support\Facades\Auth;

class ChapitreController extends Controller
{
    public function store(Request $request)
    {
        $chapitre=new Chapitre();
        $chapitre->nom_chapitre=$request->input('nom_chapitre');
        
        $chapitre->projet_id=$request->input('projet_id');
       
       
        
        $chapitre->save();
        
       
        return redirect()->back()->with('status', $chapitre->nom_chapitre.' est inséré dans la base de donné avec succès!');



    }
    
    public function chapitreview($id)
    {   
        $id_projet=$id;
        $chapitre=Chapitre::where('projet_id',$id)->get();
        $projets=Projet::where('id',$id)->get();
        $nbrspan=$chapitre->count();
        
        return view(('CreationTableDeSpecification.chapitre'),['lesProjets' => $projets,'lesChapitres' =>$chapitre,'IdProjet' => $id_projet,'n' => $nbrspan]);
    }

    public function chapitreviewPost(Request $request)
    {   
        \DB::table('chapitres')->insert([
            'nom_chapitre' => $request->Code, //This Code coming from ajax request
            'projet_id' => $request->Chief, //This Chief coming from ajax request
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function destroy(Chapitre $chapitre)
    {    
        $chapitre->delete();
        return redirect()->back();

    }
   
}
