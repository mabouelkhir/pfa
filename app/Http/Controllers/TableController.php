<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Performance;
use App\Models\PerformanceProjet;
use App\Projet;
use App\Models\Point;



class TableController extends Controller
{
    public function index($id)
    {   $id_projet=$id; 
        
        $duplicate=array();
        $liaisons=PerformanceProjet::where('projet_id',$id)->where('statut','oui')->get();
        $performances=Performance::all();
        $projets=Projet::where('id',$id)->get();
       
        $pointevaluers=Point::all();
        return view(('CreationTableDeSpecification.table'),[
        'IdProjet'=>$id_projet,'lesPoints' => $pointevaluers,'duplicates'=>$duplicate,
        'lesProjets' => $projets,'lesPerformances' => $performances,
        'lesLiaisons'=>$liaisons]);
    }
    
    public function navbar($id)
    { 
        $id_projet=$id;
        return view(('partials.navbar'),['IdProjet' => $id_projet]);
    }
}
