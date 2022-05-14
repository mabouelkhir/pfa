@extends('layouts.master')
@section('content')
<body style="background-color: #e5e3f1">

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance.'/Qcm/'.$IdQcm)}}" style="margin:auto;">Retourner</a>

    <div class="alert alert-dismissible alert-success">
       <h4 class="text-center mt-3" >SOLUTIONS GENERALES</h4>
    </div>
      
      


    <div class="col-md-6 text-center mt-5 " style="margin: auto;">
        <form method="POST" action="{{route('proposition.store')}}" enctype="multipart/form-data">
            @csrf
               <div class="form-check">
                  <input class="form-check-input" type="hidden" value="non" id="flexCheckDefault" name="help" onchange="submit()">
                  <input class="form-check-input" type="checkbox" value="oui" id="flexCheckDefault" name="help" onchange="submit()" {{ App\Models\Proposition::where('proposition','TOUTES')->where('qcm_id',$IdQcm)->where('help','oui')->exists()  ? 'checked' : ''}}>
                  <input class="form-check-input" type="checkbox" value="TOUTES" id="flexCheckDefault" name="proposition" hidden checked />
                  <input type="text" class="form-control text-center center ml-5" placeholder="qcm_id" name="qcm_id" value="{{$IdQcm}}" required hidden>              
                  <label class="form-check-label" for="flexCheckDefault"><b>TOUTES</b> </label>
               </div><br>
          </form>
        <form method="POST" action="{{route('proposition.store')}}" enctype="multipart/form-data">
            @csrf
               <div class="form-check">
                  <input class="form-check-input" type="hidden" value="non" id="flexCheckDefault" name="help" onchange="submit()">
                  <input class="form-check-input" type="checkbox" value="oui" id="flexCheckDefault" name="help" onchange="submit()" {{ App\Models\Proposition::where('proposition','AUCUNE')->where('qcm_id',$IdQcm)->where('help','oui')->exists()  ? 'checked' : ''}}>
                  <input class="form-check-input" type="checkbox" value="AUCUNE" id="flexCheckDefault" name="proposition" hidden checked />
                  <input type="text" class="form-control text-center center ml-5" placeholder="qcm_id" name="qcm_id" value="{{$IdQcm}}" required hidden>              
                  <label class="form-check-label" for="flexCheckDefault"><b>AUCUNE</b> </label>
               </div><br>
          </form>
        <form method="POST" action="{{route('proposition.store')}}" enctype="multipart/form-data">
          @csrf
             <div class="form-check">
                <input class="form-check-input" type="hidden" value="non" id="flexCheckDefault" name="help" onchange="submit()">
                <input class="form-check-input" type="checkbox" value="oui" id="flexCheckDefault" name="help" onchange="submit()" {{ App\Models\Proposition::where('proposition','MANQUE DE DONNEE')->where('qcm_id',$IdQcm)->where('help','oui')->exists()  ? 'checked' : ''}}>
                <input class="form-check-input" type="checkbox" value="MANQUE DE DONNEE" id="flexCheckDefault" name="proposition" hidden checked />
                <input type="text" class="form-control text-center center ml-5" placeholder="qcm_id" name="qcm_id" value="{{$IdQcm}}" required hidden>              
                <label class="form-check-label" for="flexCheckDefault"><b>MANQUE DE DONNEE</b> </label>
             </div><br>
        </form>
        <form method="POST" action="{{route('proposition.store')}}" enctype="multipart/form-data">
            @csrf
               <div class="form-check">
                  <input class="form-check-input" type="hidden" value="non" id="flexCheckDefault" name="help" onchange="submit()">
                  <input class="form-check-input" type="checkbox" value="oui" id="flexCheckDefault" name="help" onchange="submit()" {{ App\Models\Proposition::where('proposition','ABSURDITE')->where('qcm_id',$IdQcm)->where('help','oui')->exists()  ? 'checked' : ''}}>
                  <input class="form-check-input" type="checkbox" value="ABSURDITE" id="flexCheckDefault" name="proposition" hidden checked />
                  <input type="text" class="form-control text-center center ml-5" placeholder="qcm_id" name="qcm_id" value="{{$IdQcm}}" required hidden>              
                  <label class="form-check-label" for="flexCheckDefault"><b>ABSURDITE</b> </label>
               </div><br>
          </form>
          </div>
</body>


    
         
    
      

   
     
                   
      
    
    </div>
      
   </form>

   @endsection