<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\Chapitre;
use App\Projet;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function store(Request $request)
    {
        $section=new Section();
        $section->nom_section=$request->input('nom_section');
       
        $section->chapitre_id=$request->input('chapitre_id');
       
       
        
        $section->save();
        
      
        return redirect()->back()->with('status', $section->nom_section.' est inséré dans la base de donné avec succès!');

    }
    public function edit(Section $section)
{
   dd($section);
}
    public function sectionview($id,$id1)
    {   $id_projet=$id;
        $id_chapitre=$id1;
        $projets=Projet::where('id',$id)->get();
        $sections=Section::where('chapitre_id',$id1)->get();
        $chapitres=Chapitre::where('id',$id1)->get();
        return view(('CreationTableDeSpecification.section'),['lesProjets' => $projets,'lesChapitres' => $chapitres,'lesSections' => $sections,'IdProjet'=>$id_projet,'IdChapitre' => $id_chapitre]);
    }
    public function sectionviewPost(Request $request)
    {   
        \DB::table('sections')->insert([
            'nom_section' => $request->Code, //This Code coming from ajax request
            'chapitre_id' => $request->Chief, //This Chief coming from ajax request
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
    
   
    public function destroy(Section $section)
    {    
        $section->delete();
        return redirect()->back();

    }
    
    
}
