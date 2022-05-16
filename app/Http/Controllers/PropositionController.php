<?php

namespace App\Http\Controllers;
use App\Models\Proposition;
use Illuminate\Http\Request;
use DB;
class PropositionController extends Controller
{
    public function store(Request $request)
    {
        $proposition=new Proposition();
        $proposition->proposition=$request->input('proposition');
        $proposition->help=$request->input('help');
        $proposition->qcm_id=$request->input('qcm_id');

        
        
     
       if(Proposition::where('qcm_id',$request->input('qcm_id'))->where('proposition',$request->input('proposition'))->exists()){
        DB::update('update propositions set help = ? where qcm_id = ? and proposition = ?',[$request->input('help'),$request->input('qcm_id'),$request->input('proposition')]);
        return redirect()->back()->with('status', '  Modifié avec succes ! ');
      
       }else{
           $proposition->save();
           return redirect()->back()->with('status', '  Inseré avec succes ! ');
       }
       
       
       
        
        
        
       
       

    }
    public function updatestatut(Request $request,$id,$id1)
    {
        $proposition = Proposition::find($id);
        $statutupdated = $request->input('statut');
        $proposition->statut = $statutupdated;
       
        if(Proposition::where('qcm_id',$id1)->where('statut','oui')->where('proposition',$proposition->proposition)->exists()){
            $proposition->save();
       
            return redirect()->back()->with('status', '  inséré dans la base de donné avec succès!');
        }elseif(Proposition::where('qcm_id',$id1)->where('statut','oui')->count()<1){
            $proposition->save();
       
            return redirect()->back()->with('status', '  inséré dans la base de donné avec succès!');
        }else{
            return redirect()->back()->with('status', "  Vous avez le droit qu'à une réponse !");
        }
        

    }
    public function updateproposition(Request $request,$id,$id1,$id2,$id3,$id4)
    {
        $proposition = Proposition::find($id);
        $propositionupdated = $request->input('proposition');
        $proposition->proposition = $propositionupdated;
        $proposition->save();
       
        return redirect('projet/'.$id4.'/banquedequestion/'.$id3.'/categorie/'.$id2.'/Qcm/'.$id1)->with('status', '  proposition modifier dans la base de donné avec succès!');

    }
    public function destroy(Proposition $proposition)
    {
        $proposition->delete();
        return redirect()->back();
    }
    public function uploadimage(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
           
            $request->file('upload')->move(public_path('images'), $fileName);
      
            
            $url = asset('images/'. $fileName); 
            return response()->json(['fileNme' =>$fileName,'uploaded'=>1, 'url' =>$url]);
        }
 
   }
}
