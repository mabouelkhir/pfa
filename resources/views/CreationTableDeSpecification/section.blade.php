@extends('layouts.master')
@section('content')
@include('partials.analyseetdesign')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
   @foreach ($lesProjets as $projet )
       
       @foreach ($lesChapitres as $chapitre )
           <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">{{$projet->nom}}</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/projet/'.$IdProjet)}}">{{$chapitre->nom_chapitre}}</a></li>
            </ol>
       @endforeach
            
   @endforeach
            

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Créer Section
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
            <form method="POST" action="{{route('section.store')}}" enctype="multipart/form-data">
                @csrf
                
             
                 <div class="container rounded bg-white mt-5 mb-5">
                     <div class="row">
                         
                         <div class="col-md-5 border-right">
                             <div class="p-3 py-5">
                                 <div class="d-flex justify-content-between align-items-center mb-3">
                                     <h4 class="text-right">
                                         Section Setting
                                     </h4>
                                 </div>
                                 
                                 <div class="row mt-2">
                                     <div class="col-md-6"><label class="labels">Nom Section</label><input type="text" class="form-control" placeholder="nom section" name="nom_section"></div>
             
                                 </div>
                                 <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels"></label><input type="text" class="form-control" placeholder="Chapitre ID" name="chapitre_id" value="{{$IdChapitre}}" hidden></div>
                                    
                                </div>
                                 
                                 
                                    
                                 
                                 
                                 <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">ADD Section</button></div>
                             </div>
                         </div>
                        
                     </div>
                 </div>
                 </div>
                 </div>
                  
             </form>
                     
        </div>
      </div>
    </div>
  

    
    




                
@foreach ($lesSections as $section ) 
<div class="container">
    <div class="row">
        <div class="col-md-6">      
                <div class="list-group">
                    <form action="{{ route('section.destroy',$section->id)}}" method="POST">
                        <table>
                            <tr>
                                <td width="200px"> <a href="{{ url('projet/'.$IdProjet.'/chapitre/'.$IdChapitre.'/section/'.$section->id)}}" class="list-group-item list-group-item-action">{{$section -> nom_section }}</a></td>
                                <td>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="trash show_confirm" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                                
                            
                    </form>
                                <td>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="trash show_confirm" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                             </tr>  
                             
                        </table>
                   
                    
                  </div>
                </div>
            </div>
        </div>
        @endforeach
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
                    <script type="text/javascript">
                    
                        $('.show_confirm').click(function(event) {
                            var form =  $(this).closest("form");
                            var name = $(this).data("name");
                            event.preventDefault();
                            swal({
                                title: `Êtes-vous sûr de supprimer cette section??`,
                                text: "Si tu cliques sur OK, tu le perdras définitivement.",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                form.submit();
                                }
                            });
                        });
                    
                    </script>
                    


    

                

                




@endsection



