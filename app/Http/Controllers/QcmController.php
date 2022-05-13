<?php

namespace App\Http\Controllers;
use App\Models\Performance;
use App\Models\Proposition;
use App\Models\Qcm;
use App\Models\PerformanceProjet;
use App\Projet;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use DB;

class QcmController extends Controller
{
    public function indexbanque($id)
    {   $id_projet=$id; 
        
        $duplicate=array();
        $liaisons=PerformanceProjet::where('projet_id',$id)->where('statut','oui')->get();
        $performances=Performance::all();
        $projets=Projet::where('id',$id)->get();
       
        $pointevaluers=Point::all();
        return view(('banqueDeQuestion.redaction'),[
        'IdProjet'=>$id_projet,'lesPoints' => $pointevaluers,'duplicates'=>$duplicate,
        'lesProjets' => $projets,'lesPerformances' => $performances,
        'lesLiaisons'=>$liaisons]);
    }
    public function indexvalidationbanque($id)
    {   $id_projet=$id; 
        
        $duplicate=array();
        $liaisons=PerformanceProjet::where('projet_id',$id)->where('statut','oui')->get();
        $performances=Performance::all();
        $projets=Projet::where('id',$id)->get();
       
        $pointevaluers=Point::all();
        return view(('banqueDeQuestion.validation'),[
        'IdProjet'=>$id_projet,'lesPoints' => $pointevaluers,'duplicates'=>$duplicate,
        'lesProjets' => $projets,'lesPerformances' => $performances,
        'lesLiaisons'=>$liaisons]);
    }
    public function creationqcmview1($id,$id1,$id2){
        $id_projet = $id;
        $id_point = $id1;
        $id_performance = $id2;
      
        foreach(Performance::where('id',$id_performance)->get() as $performance){
            
            $nom_performance=$performance->nom_performance;
        }
        $qcms=Qcm::where('point_id',$id_point)->where('nom_performance',$nom_performance)->get();
        
        

        return view(('banqueDeQuestion.qcmIndex'),[
            'IdProjet'=>$id_projet,'IdPoint' => $id_point,'IdPerformance' => $id_performance, 'lesQcms' => $qcms]);
    }
    public function creationqcmview2($id,$id1,$id2){
        $id_projet = $id;
        $id_point = $id1;
        $id_performance = $id2;
        
      
        foreach(Performance::where('id',$id_performance)->get() as $performance){
            
            $nom_performance=$performance->nom_performance;
        }
        $qcms=Qcm::where('point_id',$id_point)->where('nom_performance',$nom_performance)->get();
        
        

        return view(('banqueDeQuestion.qcmCreation'),[
            'IdProjet'=>$id_projet,'IdPoint' => $id_point,'IdPerformance' => $id_performance, 'lesQcms' => $qcms]);
    }
    public function store(Request $request)
    {
        $qcm=new Qcm();
        $qcm->nom_qcm=$request->input('nom_qcm');
        $qcm->description=$request->input('description');
        $qcm->point_id=$request->input('point_id');
        $qcm->auteur=$request->input('auteur');
        $qcm->nom_performance=$request->input('nom_performance');
       
        $qcm->amorce=$request->input('amorce');
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            
            $qcm['image']= $filename;
        }
        
        $qcm->save();
        

        $propositions=$request->proposition;
        $helps=$request->help;
        for($i=0;$i<count($request->proposition);$i++){
                $proposition = new Proposition();
                $proposition->qcm_id = $qcm->id;
                $proposition->proposition = $propositions[$i];
                $proposition->help = $helps[$i];
                $proposition->save();
        
        }
      
       
        return redirect()->back()->with('status', $qcm->nom_qcm.' est inséré dans la base de donné avec succès!');

    }
    public function destroy(Qcm $qcm)
    {
        $qcm->delete();
        return redirect()->back();
    }
    public function specifiedqcmview($id,$id1,$id2,$id3){
        $id_projet = $id;
        $id_point = $id1;
        $id_performance = $id2;
        $id_qcm = $id3;
        $qcms = Qcm::where('id',$id_qcm)->get();
        $array_verfication=array('ABSURDITE','TOUTES','AUCUNE','MANQUE DE DONNEE');
        return view(('banqueDeQuestion.qcmview'),[
            'IdProjet'=>$id_projet,'IdPoint' => $id_point,'IdPerformance' => $id_performance, 'lesQcms' => $qcms,'IdQcm' => $id_qcm,'generale' => $array_verfication]);
    }
    public function addpropositionview($id,$id1,$id2,$id3){
        $id_projet = $id;
        $id_point = $id1;
        $id_performance = $id2;
        $id_qcm = $id3;
       
        return view(('banqueDeQuestion.addpropositionview'),[
            'IdProjet'=>$id_projet,'IdPoint' => $id_point,'IdPerformance' => $id_performance, 'IdQcm' => $id_qcm]);
    }
    public function editpropositionview($id,$id1,$id2,$id3,$id4){
        $id_projet = $id;
        $id_point = $id1;
        $id_performance = $id2;
        $id_qcm = $id3;
        $id_proposition= $id4;
       
        return view(('banqueDeQuestion.editpropositionview'),[
            'IdProjet'=>$id_projet,'IdPoint' => $id_point,'IdPerformance' => $id_performance, 'IdQcm' => $id_qcm,'IdProposition'=>$id_proposition]);
    }
    
    public function validation(Request $request,$id){

        DB::update('update qcms set statut = ? where id = ?',[$request->input('statut'),$request->input('id')]);
        return redirect('/projet/'.$id.'/banquedequestion/validation'); 
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
