@extends('layouts.master')
<style>
  .everything{
    background-color:#efefef;
  };
 

</style>
<div class="everything">
@section('content')
@include('partials.analyseetdesign')


<link rel="stylesheet" href="{{asset('css/pop.css')}}">
              


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
                
                    <title>Catégorie De Performance</title>
                  </head>
                  <body>
  

                    <div class="content">
                      
                      <div class="container">
                        <h2 class="mb-5">Tableau De Spécification</h2>
                        
                  
                        <div class="table-responsive custom-table-responsive">
                  
                          <table class="table custom-table">
                            <thead>
                              <tr style=" background-color: black; color:white;">  
                  
                                <th scope="col">
                                  
                                </th>
                                
                                <th scope="col"> Chapitre</th>
                                <th scope="col"> Section</th>
                                <th scope="col">Point à Evaluer</th>
                                <th scope="col">Supprimer</th>
                        
                           
                              </tr>
                            </thead>
                            <tbody>
                                        @foreach ($lesProjets as $projet) 
                                         @foreach ($projet->chapitres as $chapitre)
                                          @foreach ($chapitre->sections as $section )
                                           @foreach ($section->points as $point )
                                            
                                        
                                            
                                            <tr scope="row">
                                                <th></th>
                                                <td>
                                                <a href="{{url('projet/'.$projet->id)}}" class="link-dark">{{$chapitre->nom_chapitre}}</a>
                                                </td>
                                                <td>
                                                   <a href="{{url('projet/'.$projet->id.'/chapitre/'.$chapitre->id  )}}" class="link-dark">{{$section->nom_section  }}</a> 
                                                </td>
                                                <td>
                                                  <a href="{{url('projet/'.$projet->id.'/chapitre/'.$chapitre->id.'/section/'.$section->id )}}" class="link-dark">{{$point->nom_point}}</a>  
                                                </td>
                                                <td>
                                                    <form action="{{ route('point.destroy',$point->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="trash show_confirm" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </form>
                                                </td>
                                            
                                            </tr>
                                           @endforeach
                                          @endforeach
                                         @endforeach
                                        @endforeach
                                            
                            </tbody>
                          </table>
                        </form>
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
                            title: `Êtes-vous sûr de supprimer ce point à évaluer??`,
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



