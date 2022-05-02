<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use  App\Projet;
use  App\Models\Chapitre;
use Illuminate\Support\Facades\Auth;



class ProjetController extends Controller
{
    
   public function __construct(){
       $this->middleware('auth');
   }
    public function projectview()
    {   if(auth()->user()->id == 1){
       
        return redirect()->route('voyager.login');
    }else{ 
        $projets=Projet::where('user_id',Auth::user()->id)->get();
        return view(('CreationTableDeSpecification.home'),['lesProjets' => $projets]);
    }}
    
    
   
    

    
}
