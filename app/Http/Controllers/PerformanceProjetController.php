<?php

namespace App\Http\Controllers;
use  App\Models\PerformanceProjet;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use DB;

class PerformanceProjetController extends Controller
{
    public function store(Request $request){
        $verif=PerformanceProjet::where('projet_id',$request->input('projet_id'))->where('performance_id',$request->input('performance_id'));
        
       if($verif_p=$verif->where('statut',$request->input('etatdecat'))->doesntExist()){ 
             
            
            
        DB::update('update performance_projet set statut = ? where projet_id = ? and performance_id = ?',[$request->input('etatdecat'),$request->input('projet_id'),$request->input('performance_id')]);
        return redirect()->back()->with('status', ' Modification dans la base de donné avec succès!');

            
        
        }elseif($verif->where('statut',$request->input('etatdecat'))->exists()){
            
            return redirect()->back();

        }else{
        $liaison=new PerformanceProjet();
        $liaison->performance_id=$request->input('performance_id');
        
        $liaison->projet_id=$request->input('projet_id');
        $liaison->statut=$request->input('etatdecat');
       
        
        $liaison->save();
        
       
        return redirect()->back()->with('status', ' inséré dans la base de donné avec succès!');
        }

        
    }
    public function destroy(PerformanceProjet $objet)
    {    
        $objet->delete();
        return redirect()->back();

    }
    public function prepare(Request $request){
        
        $performance_id=$request->input('performance_id');
        $projet_id=$request->input('projet_id');
       
        for($i=0;$i<6;$i++){
            $liaison=new PerformanceProjet();
            $liaison->performance_id=$performance_id[$i];
            
            $liaison->projet_id=$projet_id[$i];
            
            if(PerformanceProjet::where('projet_id',$projet_id[$i])->where('performance_id',$performance_id[$i])->exists()){
                
            }else{
                $liaison->save();
            }
            
           
             
        } return redirect('projet/performance/'.$projet_id[0]);
       
        
    }
    
        
}
