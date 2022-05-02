<?php

namespace App\Http\Controllers;
use App\Models\Performance;
use App\Models\PerformanceProjet;
use App\Projet;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function performanceview($id)
    {   $id_projet=$id; 
        $duplicate=array();
        $performances=Performance::all();
        $projets=Projet::where('id',$id)->get();
        $performanceprojet=PerformanceProjet::where('projet_id',$id)->get();
        
        return view(('CreationTableDeSpecification.performance'),['duplicates'=>$duplicate,'IdProjet'=>$id_projet,'lesProjets' => $projets,'lesPerformances' => $performances,'performanceprojet'=>$performanceprojet]);
    }
    
}
