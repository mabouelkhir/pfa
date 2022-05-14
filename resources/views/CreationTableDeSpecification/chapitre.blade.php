
@extends('layouts.master')
<style>
  .everything{
    background-color:#efefef;
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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{url('/home')}}">{{$projet->nom}}</a></li>
                    </ol>
                    
                
                @endforeach

                <div class="overlay" id="overlay">
                    <div class="popup">
                      <div onclick="CloseModal()" class="CloseIcon">&#10006;</div>
                      <form method="POST" action="{{route('chapitre.store')}}" enctype="multipart/form-data">
                        @csrf
                          <h4 class="text-right mt-3" style="margin-right:255px;">Chapitre Setting</h4>
                          
                          <div class="col-md-6 text-center mt-5 " style="margin-left: 120px;">
                             <input type="text" class="form-control text-center center ml-5" placeholder="nom chapitre" name="nom_chapitre" >
                          </div>
                          
                          <div class="col-md-6 "><label class="labels"></label>
                            <input type="text" class="form-control ml-5" placeholder="PROJET ID" name="projet_id" value="{{$IdProjet}}" hidden>
                         </div>
                                            
                          <div class="mt-5 text-center " ><button class="btn btn-primary" type="submit">ADD Chapitre</button></div>
                        </div>
                          
                       </form>
                    
                  </div>
                  <button onclick="OpenModal()" class="btn btn-primary" style="margin-left: 35px;">Ajouter un chapitre</button>
              
                    


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
                
                    <title>Chapitre</title>
                  </head>
                  <body>
            
            
                    <div class="content">
                      
                      <div class="container">
                        <h2 class="mb-5">Les Chapitres</h2>
                        
                  
                        <div class="table-responsive custom-table-responsive">
                  
                          <table class="table custom-table">
                            <thead>
                              <tr >  
                              <tr style="background-color: black; color:white;">  
                  
                                <th scope="col">
                                  
                                </th>
                                
                                <th scope="col">ID</th>
                                <th scope="col">Chapitre</th>
                                <th scope="col">delete</th>
                                <th scope="col">edit</th>
                        
                              </tr>
                            </thead>
                         
                            <tbody>
                               @foreach ($lesChapitres as $chapitre )
                              <tr scope="row">
                                <th></th>
                                <td>{{$chapitre->id}}</td>
                                <td>
                                    <a href="{{ url('projet/'.$IdProjet.'/chapitre/'.$chapitre->id)}}" class="link-dark">{{$chapitre -> nom_chapitre }}</a>
                                </td>
                                <td>
                                    <form action="{{ route('chapitre.destroy',$chapitre->id)}}" method="POST">
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
                                title: `Êtes-vous sûr de supprimer ce chapitre??`,
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