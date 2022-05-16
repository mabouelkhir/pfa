@extends('layouts.master')
<style>
  .everything{
    background-color:#e5e3f1;
  }
</style>
<div class="everything">
@section('content')
@include('partials.analyseetdesign')
<link rel="stylesheet" href="{{asset('css/pop.css')}}">
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
            



    
    <div class="overlay" id="overlay">
        <div class="popup">
          <div onclick="CloseModal()" class="CloseIcon">&#10006;</div>
          <form method="POST" action="{{route('section.store')}}" enctype="multipart/form-data">
            @csrf
              <h4 class="text-right mt-3 justify-content-center" style="margin-right:255px;">Section Setting</h4>
              
              <div class="col-md-6 text-center mt-5 " style="margin-left: 120px;">
                 <input type="text" class="form-control text-center center ml-5" placeholder="nom section" name="nom_section"  >
              </div>
              
              <div class="col-md-6 "><label class="labels"></label>
                <input type="text" class="form-control ml-5" placeholder="Chapitre ID" name="chapitre_id" value="{{$IdChapitre}}" hidden>
             </div>
                                
              <div class="mt-5 text-center " ><button class="btn btn-primary" style="background-color:#553592 ;border-color:#553592!important;" type="submit">Ajouter une Section</button></div>
            </div>
              
           </form>
        
      </div>
      <button onclick="OpenModal()" class="btn btn-primary" style="margin-left: 35px;background-color:#553592 ;border-color:#553592!important;">Ajouter une section</button>
  


      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    
        <link rel="stylesheet" href="{{asset('tablecheck/fonts/icomoon/style.css')}}">
         
        <link rel="stylesheet" href="{{asset('tablecheck/css/owl.carousel.min.css')}}">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('tablecheck/css/bootstrap.min.css')}}">
        
        <!-- Style -->
        <link rel="stylesheet" href="{{asset('tablecheck/css/style.css')}}">
    
        <title>Section</title>
      </head>
      <body>


        <div class="content">
          
          <div class="container">
            <h2 class="mb-5">Les Sections</h2>
            
      
            <div class="table-responsive custom-table-responsive">
      
              <table class="table custom-table">
                <thead>
                  <tr style=" background-color: black; color:white;">  
      
                    <th scope="col">
                      
                    </th>
                    
                    <th scope="col">ID</th>
                    <th scope="col">Section</th>
                    <th scope="col">delete</th>
                    <th scope="col">edit</th>
            
                  </tr>
                </thead>
             
                <tbody>
                   @foreach ($lesSections as $section )
                  <tr scope="row">
                    <th></th>
                    <td>{{$section->id}}</td>
                    <td>
                        <a href="{{ url('projet/'.$IdProjet.'/chapitre/'.$IdChapitre.'/section/'.$section->id)}}" class="link-dark">{{$section -> nom_section }}</a>
                    </td>
                    <td>
                        <form action="{{ route('section.destroy',$section->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="trash show_confirm" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                    </td>
                   
                    <td> </td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
           
            </div>
      
      
          </div>
      
        </div>
          
          
      
          
    
        <script src="{{asset('tablecheck/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('tablecheck/js/popper.min.js')}}"></script>
        <script src="{{asset('tablecheck/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('tablecheck/js/main.js')}}"></script>
      </body>
    </html>



                


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
                    <script src="{{asset('js/pop.js')}}"></script>


    

                
</div>
                




@endsection



