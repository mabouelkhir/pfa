@extends('layouts.master')
@section('content')


@foreach (App\Models\Proposition::where('id',$IdProposition)->get() as $proposition)
<a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance.'/Qcm/'.$proposition->qcm_id)}}" style="margin:auto;">Retourner</a>   
<form action="{{route('updateproposition',[$IdProposition,$IdQcm,$IdPerformance,$IdPoint,$IdProjet])}}" method="POST">
    @csrf
     
     
      

    <div class="alert alert-dismissible alert-success">
        <h4 class="text-center mt-3" >PROPOSITION PARAMETRAGE</h4>
     </div>
       
       
       <div class="col-md-6 text-center mt-5 " style="margin: auto;">
        <label for="nom_qcm" class="form-label mt-4"><h6>Nom QCM:</h6></label>
          <input type="text" class="form-control text-center center ml-5"  value="{{$proposition->qcm->nom_qcm}}" name="nom_qcm" disabled>
       </div>
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
        <label for="description" class="form-label mt-4"><h6>QCM DESCRIPTION :</h6></label>
         <input type="text" class="form-control text-center center ml-5" value="{{$proposition->qcm->description}}" name="description" disabled hidden>
      </div>
       <div class="col-md-6 "><label class="labels"></label>
         <input type="text" class="form-control ml-2" placeholder="POINT ID" name="point_id" value="{{$IdPoint}}" hidden >
         <input type="text" class="form-control ml-2" placeholder="Auteur" name="auteur" value="{{ Auth::user()->name }}" hidden >
         
         
         @foreach (App\Models\Performance::where('id',$IdPerformance)->get() as $performance )
         
              <input type="text" class="form-control ml-2" placeholder="Nom performance" name="nom_performance" value="{{$performance->nom_performance}}" hidden >
         @endforeach
        
      </div>
      
      <div class="col-md-6 text-center mt-2 " style="margin: auto;">
         
         <strong>Enoncé de la question:</strong>
            <div  class="text open">
        <div id="exampleTextarea">
            <p> @php echo($proposition->qcm->amorce); @endphp </p></div>
            </div>
         
  
      </div>
      <div class="col-md-6 text-center mt-2 " style="margin: auto;">
        <div class="form-group">
            <label for="proposition" class="form-label mt-4"><h6>Proposition :</h6></label>
            <textarea class="form-control" id="proposition" rows="3"  name="proposition">
               @php
                  echo($proposition->proposition);
               @endphp
               
            </textarea>
        </div>
 
     </div>
      
                         
       <div class="mt-3 text-center mb-5 " style="margin: auto;"><button class="btn btn-primary" type="submit">Modifier QCM</button></div>
     
     </div>
    

</form>







@endforeach
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#proposition' ),{
                                   
                                })
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
             console.error( error );
                                } );
 </script>


@endsection


