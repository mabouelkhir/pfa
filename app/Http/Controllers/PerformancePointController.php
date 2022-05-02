<?php

namespace App\Http\Controllers;
use App\Models\PerformancePoint;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
class PerformancePointController extends Controller
{
    public function store(Request $request){
        $data1=array();
        $data1h=array();
        $data1hh=array();
        $data2=array();
        $data3=array();
        $duplicates=array();
        for($i=0;$i<count($request->performance_id);$i++)
            for($j=0;$j<count($request->point_id);$j++)
                
                if(!in_array($request->performance_id[$i].'et'.$request->point_id[$j], $duplicates)){
                    
                    if(!in_array($request->performance_id[$i], $data1h)){
                      
                        $data1h[]=$request->performance_id[$i];
                       }
                   
                    
                    $data3h[]=$request->point_id[$j];
                    echo('<br>');
                    $duplicates[] = $request->performance_id[$i].'et'.$request->point_id[$j];
               }
        
        for($z=0;$z<count($request->ok);$z++){
                 $data2[]=$request->ok[$z];
        }
        for($z=0;$z<count($request->point_id);$z++){
            $data1=array_merge($data1,$request->performance_id);
   }
        
        
        $data3=array_values(Arr::sort($data3h));
        $data1hh=array_slice($data1,0,count($data3));

       for($i=0;$i<count($data3);$i++){
            if(PerformancePoint::where('point_id', $data3[$i])->where('performance_id',$data1hh[$i])->doesntExist()){
                $insert=[
                    'performance_id' => $data1hh[$i],
                    'point_id' => $data3[$i],
                    'statut' => $data2[$i]
                ];
                DB::table('performance_point')->insert($insert);
        }else{
            DB::update('update performance_point set statut = ? where point_id = ? and performance_id = ?',[$data2[$i],$data3[$i],$data1hh[$i]]);
        }
        }return redirect()->back();
   
}
}