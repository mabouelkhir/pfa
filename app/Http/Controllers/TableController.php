<?php

namespace App\Http\Controllers;
use App\Projet;
use App\Models\Chapitre;
use App\Models\Section;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TableController extends Controller
{
    public function index($id)
    {   $id_projet=$id;
        $projets=Projet::where('id',$id)->get();
        return view(('table'),['lesProjets' => $projets,'IdProjet' => $id_projet]);
    }
    public function navbar($id)
    { 
        $id_projet=$id;
        return view(('partials.navbar'),['IdProjet' => $id_projet]);
    }
}
