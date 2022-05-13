
@extends('layouts.master')
@section('content')



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
                        <h2 class="mb-5">Les Points à évaluers Disponnible en 
                          @foreach (App\Projet::where('id',$IdProjet)->get() as $projet )
                          {{$projet->nom}}
                         @endforeach
                      </h2>
                        
                  
                        <div class="table-responsive custom-table-responsive">
                  
                          <table class="table custom-table">
                            <thead>
                              <tr>  
                  
                                <th scope="col">
                                  
                                </th>
                                
                                <th scope="col">ID</th>
                                <th scope="col">Point à Evaluer</th>
                       
                                @foreach ($lesLiaisons as $liaison )
                                    @foreach ($lesPerformances->where('id',$liaison->performance_id) as $performance )
                                    <th><input type="checkbox" name="performance_id[]" value="{{$performance->id}}" checked hidden >{{$performance->nom_performance}}</th>
                                    @endforeach
                                @endforeach
                              </tr>
                            </thead>

                            @foreach ($lesProjets as $projet) 
                            @foreach ($projet->chapitres as $chapitre)
                             @foreach ($chapitre->sections as $section )
                              @foreach ($section->points as $points )
                            <tbody>
                              <tr scope="row">
                                <th></th>
                                <td>
                                  {{$points->id}}
                                </td>
                                <td>
                                    <a href="{{url('projet/'.$projet->id.'/chapitre/'.$chapitre->id.'/section/'.$section->id)}}" class="link-dark" >
                                        {{$points-> nom_point }}
                                    </a>
                                </td>
                             @foreach ($lesLiaisons as $liaison )
                                <td>
                                    <input type="checkbox" name="point_id[]" value="{{$points->id}}" checked hidden >
                                                   
                                    
                                        @if (App\Models\PerformancePoint::where('point_id',$points->id)->where('performance_id',$liaison->performance_id)->exists())
                                            @foreach ( App\Models\PerformancePoint::where('point_id',$points->id)->where('performance_id',$liaison->performance_id)->get() as $objet )
                                               @if ($objet->statut == 'oui')
                                                 
                                                 <a href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$points->id.'/categorie/'.$liaison->performance_id)}}"> 
                                                @foreach ( App\Models\Performance::where('id',$liaison->performance_id)->get() as $performance )
                                                  @if (count($points->qcms->where('nom_performance',$performance->nom_performance))==0)
                                                    ----
                                                  @else
                                                     {{count($points->qcms->where('nom_performance',$performance->nom_performance))}}
                                                  @endif
                                                  
                                                @endforeach
                                                
                                                  </a>
                                               @elseif ($objet->statut == 'non')
                                               <select name="ok[]"><option value="non"  {{$objet->statut == 'non' ? 'selected' : ''}} disabled>OFF</option></select>
                                               @elseif ($objet->doesntExist())
                                               <select name="ok1[]"><option value="oui" selected disabled>----</option></select>
                                               @endif
                                              
                                               
                                               
                                            @endforeach
                                
                                         @endif  
                                           
                                      
                                     
                               
                                </td>
                            @endforeach
                            </tr>
                            
                              
                              
                            
                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach
                             <tr></tr>
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
                


         



@endsection



