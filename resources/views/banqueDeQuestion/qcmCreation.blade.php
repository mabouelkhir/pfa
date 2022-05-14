
    @extends('layouts.master')
    
    @section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
</head>
<body style="background-color:#e5e3f1 ">
    <div class="login">
       
    

   
    <div class="alert alert-dismissible alert-success">
           <h4 class="text-center mt-3" >QCM </h4>
        </div>

    
    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance)}}" style="margin:auto;">Retourner</a>
    <form method="POST" action="/create" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-group">
                <strong>  Intitule: </strong><br>
                <input type="text"  name="nom_qcm" class="form-control" placeholder="intitule" required>
                
            </div>
          
          
             
            <div class="form-group">
          
            <input type="text"class="form-control" placeholder="Description QCM" name="description" hidden>
            </div>
          <div class="col-md-6 "><label class="labels"></label>
            <input type="text" class="form-control ml-2" placeholder="POINT ID" name="point_id" value="{{$IdPoint}}" hidden >
            <input type="text" class="form-control ml-2" placeholder="Auteur" name="auteur" value="{{ Auth::user()->name }}" hidden >
            
            
            @foreach (App\Models\Performance::where('id',$IdPerformance)->get() as $performance )
                 <input type="text" class="form-control ml-2" placeholder="Nom performance" name="nom_performance" value="{{$performance->nom_performance}}" hidden >
            @endforeach
           
         </div>
        
         
                <label for="amorce" class="form-label mt-4"><strong> Amorce: </strong></label>
                <textarea class="form-control" id="amorce" rows="3"  name="amorce" required></textarea>
          
         
          
              <label for="proposition1" class="form-label mt-4"><h6>Proposition 1 : </h6></label>
              <textarea class="form-control mt-5" id="proposition1" rows="3"  name="proposition[]" required></textarea>
           
        
              <input type="hidden" value="oui" name="help[]">
              
        
      
              <label for="proposition2" class="form-label mt-4"><h6>Proposition 2 : </h6></label>
             
              <textarea class="form-control mt-5" id="proposition2" rows="3"  name="proposition[]" required></textarea>
              
             
    <input type="hidden" value="oui" name="help[]">
        
       
              <label for="proposition3" class="form-label mt-4"><h6>Proposition 3 : </h6></label>
              
              <textarea class="form-control mt-5" id="proposition3" rows="3"  name="proposition[]" required></textarea>
              
              <input type="hidden" value="oui" name="help[]">
          
      
              <label for="proposition4" class="form-label mt-4"><h6>Proposition 4 : </h6></label>
              
              <textarea class="form-control mt-5" id="proposition4" rows="3"  name="proposition[]" ></textarea>
              <input type="hidden" value="oui" name="help[]">
        
     
              <label for="proposition5" class="form-label mt-4"><h6>Proposition 5 : </h6></label>
              
              <textarea class="form-control mt-5" id="proposition5" rows="3"  name="proposition[]" ></textarea>
              <input type="hidden" value="oui" name="help[]">
              </div>
     
     </div>
          <br>
      
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
       <div class="form-check">
          
          <select name="help[]" id=""> 
             <option value="non">NON</option>
             <option value="oui">OUI</option>
            
          </select>
          <input class="form-check-input" type="checkbox" value="AUCUNE" id="flexCheckDefault" name="proposition[]" hidden checked />
        
          <label class="form-check-label" for="flexCheckDefault"><b> AUCUNE</b></label>
       </div>
    </div><br>
    
    <br>
      
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
       <div class="form-check">
          <select name="help[]" id="">
            <option value="non">NON</option>
            <option value="oui">OUI</option>
          </select>
          <input class="form-check-input" type="checkbox" value="ABSURDITE" id="flexCheckDefault" name="proposition[]" hidden checked  />
        
          <label class="form-check-label" for="flexCheckDefault"><b>ABSURDITE</b></label>
       </div>
    </div><br>
    
    <br>
      
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
       <div class="form-check">
          <select name="help[]" id="">
            <option value="non">NON</option>
            <option value="oui">OUI</option>
          </select>
          <input class="form-check-input" type="checkbox" value="TOUTES" id="flexCheckDefault" name="proposition[]" hidden checked />
        
          <label class="form-check-label" for="flexCheckDefault"><b> TOUTES</b></label>
       </div>
    </div><br>
    
    <br>
      
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
       <div class="form-check">
          <select name="help[]" id="">
            <option value="non">NON</option>
            <option value="oui">OUI</option>
          </select>
          <input class="form-check-input" type="checkbox" value="MANQUE DE DONNEE" id="flexCheckDefault" name="proposition[]" hidden checked />
        
          <label class="form-check-label" for="flexCheckDefault"><b> MANQUE DE DONNEE</b></label>
       </div>
    </div><br>
         
        
    
<div class="mt-3 text-center mb-5 " style="margin: auto;"><button class="btn btn-primary" type="submit">Ajouter QCM</button></div>
    
</div>
</form>   



<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#amorce' ),{
                                 ckfinder:{
                                        uploadUrl: "{{ route('qcm.upload').'?_token='.csrf_token()}}",
                                    }
                                })
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
             console.error( error );
                                } );
 </script>



 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#proposition1' ),{
                                 ckfinder:{
                                        uploadUrl: "{{ route('qcm.upload').'?_token='.csrf_token()}}",
                                    }
                                })
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
             console.error( error );
                                } );
 </script>
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

 <script>
                         ClassicEditor
                                 .create( document.querySelector( '#proposition2' ),{
                                    ckfinder:{
                                        uploadUrl: "{{ route('qcm.upload').'?_token='.csrf_token()}}",
                                    }
                                 })
                                 .then( editor => {
                                         console.log( editor );
                                 } )
                                 .catch( error => {
              console.error( error );
                                 } );
  </script>
 
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#proposition3' ),{
                                 ckfinder:{
                                        uploadUrl: "{{ route('qcm.upload').'?_token='.csrf_token()}}",
                                    }
                                })
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
             console.error( error );
                                } );
 </script>
 
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#proposition4' ),{
                                 ckfinder:{
                                        uploadUrl: "{{ route('qcm.upload').'?_token='.csrf_token()}}",
                                    }
                                })
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
             console.error( error );
                                } );
 </script>
 
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#proposition5' ),{
                                 ckfinder:{
                                        uploadUrl: "{{ route('qcm.upload').'?_token='.csrf_token()}}",
                                    }
                                })
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
             console.error( error );
                                } );
 </script>
 
 
       
    
       @endsection



  