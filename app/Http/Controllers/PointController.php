<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Chapitre;
use App\Models\Performance;
use App\Models\PerformanceProjet;
use App\Projet;
use App\Models\Point;





class PointController extends Controller
{
    public function store(Request $request)
    {
        $point=new Point();
        $point->nom_point=$request->input('nom_point');
       
        $point->section_id=$request->input('section_id');
       
       
        
        $point->save();
        
      
        return redirect()->back()->with('status', $point->nom_point.' est inséré dans la base de donné avec succès!');
    }
    public function edit(Point $point)
{
   dd($point);
}

    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->back();
    }
    public function pointview($id,$id1,$id2)
    {   $id_projet=$id; 
        $id_chapitre=$id1; 
        $id_section=$id2; 
        $duplicate=array();
        $liaisons=PerformanceProjet::where('projet_id',$id)->where('statut','oui')->get();
        $performances=Performance::all();
        $projets=Projet::where('id',$id)->get();
        $chapitres=Chapitre::where('id',$id1)->get();
        $sections=Section::where('id',$id2)->get();
        $pointevaluers=Point::where('section_id',$id2)->get();
        return view(('CreationTableDeSpecification.pointevaluer'),['IdChapitre' => $id_chapitre,'IdSection' => $id_section,
        'IdProjet'=>$id_projet,'lesPoints' => $pointevaluers,'lesChapitres' => $chapitres,'duplicates'=>$duplicate,
        'lesSections' => $sections,'lesProjets' => $projets,'lesPerformances' => $performances,
        'lesLiaisons'=>$liaisons]);
    }
    public function pointviewPost(Request $request)
    {   
        \DB::table('points')->insert([
            'nom_point' => $request->Code, //This Code coming from ajax request
            'section_id' => $request->Chief, //This Chief coming from ajax request
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
}
