
    @extends('layouts.master')

    
    @section('content')
    
    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance)}}" style="margin:auto;">Retourner</a>
    <form method="POST" action="/create" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="alert alert-dismissible alert-info">
           <h4 class="text-center mt-3" >QCM PARAMETRAGE</h4>
        </div>
          
          
          <div class="col-md-6 text-center mt-5 " style="margin: auto;">
             <input type="text" class="form-control text-center center ml-5" placeholder="Intitulé" name="nom_qcm" required>
          </div>
          <div class="col-md-6 text-center mt-2 " style="margin: auto;">
            <input type="text" class="form-control text-center center ml-5" placeholder="Description QCM" name="description" required>
         </div>
          <div class="col-md-6 "><label class="labels"></label>
            <input type="text" class="form-control ml-2" placeholder="POINT ID" name="point_id" value="{{$IdPoint}}" hidden >
            <input type="text" class="form-control ml-2" placeholder="Auteur" name="auteur" value="{{ Auth::user()->name }}" hidden >
            
            
            @foreach (App\Models\Performance::where('id',$IdPerformance)->get() as $performance )
                 <input type="text" class="form-control ml-2" placeholder="Nom performance" name="nom_performance" value="{{$performance->nom_performance}}" hidden >
            @endforeach
           
         </div>
        
         <div class="col-md-6 text-center mt-2 " style="margin: auto;">
            <label for="image"> <h6>Image Pour l'Amorce :</h6> </label>
            <input type="file" class="form-control text-center center ml-5" placeholder="Image" name="image" >
         </div>
         <div class="col-md-6 text-center mt-2 " style="margin: auto;">
            <div class="form-group">
                <label for="amorce" class="form-label mt-4"><h6>Amorce :</h6></label>
                <textarea class="form-control" id="amorce" rows="3"  name="amorce" required></textarea>
            </div>
     
         </div>
         <div class="col-md-6 text-center mt-2 " style="margin: auto;">
          <div class="form-group">
              <label for="proposition1" class="form-label mt-4"><h6>Proposition 1 : </h6></label>
              <input type="hidden" value="oui" name="help[]">
              <textarea class="form-control" id="proposition1" rows="3"  name="proposition[]" required></textarea>
          </div>
    
       </div>
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
          <div class="form-group">
              <label for="proposition2" class="form-label mt-4"><h6>Proposition 2 : </h6></label>
              <input type="hidden" value="oui" name="help[]">
              <textarea class="form-control" id="proposition2" rows="3"  name="proposition[]" required></textarea>
          </div>
    
       </div>
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
          <div class="form-group">
              <label for="proposition3" class="form-label mt-4"><h6>Proposition 3 : </h6></label>
              <input type="hidden" value="oui" name="help[]">
              <textarea class="form-control" id="proposition3" rows="3"  name="proposition[]" required></textarea>
          </div>
    
       </div>
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
          <div class="form-group">
              <label for="proposition4" class="form-label mt-4"><h6>Proposition 4 : </h6></label>
              <input type="hidden" value="oui" name="help[]">
              <textarea class="form-control" id="proposition4" rows="3"  name="proposition[]" ></textarea>
          </div>
    
       </div>
       <div class="col-md-6 text-center mt-2 " style="margin: auto;">
          <div class="form-group">
              <label for="proposition5" class="form-label mt-4"><h6>Proposition 5 : </h6></label>
              <input type="hidden" value="oui" name="help[]">
              <textarea class="form-control" id="proposition5" rows="3"  name="proposition[]" ></textarea>
          </div>
       </div><br>
      
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



  