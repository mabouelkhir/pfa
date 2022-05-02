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
                
                @foreach ($lesSections as $section )

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{$projet->nom}}</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/projet/'.$IdProjet)}}">{{$chapitre->nom_chapitre}}</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/projet/'.$IdProjet.'/chapitre/'.$IdChapitre)}}">{{$section->nom_section}}</a></li>
                    </ol>

                @endforeach
                
            @endforeach
        
    @endforeach


<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Créer Point à evaluer
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
            <form method="POST" action="{{route('point.store')}}" enctype="multipart/form-data">
                @csrf
                
             
                 <div class="container rounded bg-white mt-5 mb-5">
                     <div class="row">
                         
                         <div class="col-md-5 border-right">
                             <div class="p-3 py-5">
                                 <div class="d-flex justify-content-between align-items-center mb-3">
                                     <h4 class="text-right">
                                         Point à evaluer Setting
                                     </h4>
                                 </div>
                                 
                                 <div class="row mt-2">
                                     <div class="col-md-6"><label class="labels">Nom Point à évaluer</label><input type="text" class="form-control" placeholder="nom point a evaluer" name="nom_point"></div>
             
                                 </div>
                                 <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels"></label><input type="text" class="form-control" placeholder="Section Id" name="section_id" value="{{$IdSection}}" hidden ></div>
                                    
                                </div>
                                 
                                 
                                    
                                 
                                 
                                 <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">ADD Point à évaluer</button></div>
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
                        <h2 class="mb-5">Les Points à évaluers</h2>
                        
                  
                        <div class="table-responsive custom-table-responsive">
                  
                          <table class="table custom-table">
                            <thead>
                              <tr>  
                  
                                <th scope="col">
                                  
                                </th>
                                
                                <th scope="col">ID</th>
                                <th scope="col">Point à Evaluer</th>
                        <form action="{{route('performancepoint.store')}}" method="POST">
                            @csrf
                                @foreach ($lesLiaisons as $liaison )
                                    @foreach ($lesPerformances->where('id',$liaison->performance_id) as $performance )
                                    <th><input type="checkbox" name="performance_id[]" value="{{$performance->id}}" checked hidden >{{$performance->nom_performance}}</th>
                                    @endforeach
                                @endforeach
                              </tr>
                            </thead>
                        @foreach ($lesPoints as $points ) 
                            <tbody>
                              <tr scope="row">
                                <th></th>
                                <td>
                                  {{$points->id}}
                                </td>
                                <td><a href="{{ url('projet/'.$IdProjet.'/chapitre/'.$IdChapitre.'/section/'.$IdSection.'/pointaevaluer/'.$points->id)}}" class="list-group-item list-group-item-action" hidden></a>{{$points-> nom_point }}</td>
                             @foreach ($lesLiaisons as $liaison )
                                <td>
                                    <input type="checkbox" name="point_id[]" value="{{$points->id}}" checked hidden >
                                                   
                                    <select name="ok[]">
                                        @if (App\Models\PerformancePoint::where('point_id',$points->id)->where('performance_id',$liaison->performance_id)->exists())
                                            @foreach ( App\Models\PerformancePoint::where('point_id',$points->id)->where('performance_id',$liaison->performance_id)->get() as $objet )
                                               <option value="oui" {{$objet->statut == 'oui' ? 'selected' : ''}}>ON</option>
                                               <option value="non"  {{$objet->statut == 'non' ? 'selected' : ''}} >OFF</option>
                                            @endforeach
                                        @else
                                           <option value="oui" selected>ON</option>
                                           <option value="non"  >OFF</option>
                                        @endif
                                     </select>
                               
                                </td>
                            @endforeach
                            </tr>
                            
                              
                              
                            
                        @endforeach
                             <tr><button type="submit">save</button></tr>
                            </tbody>
                          </table>
                        </form>
                        </div>
                  
                  
                      </div>
                  
                    </div>
                      
                      
                  
                      <script src="js/jquery-3.3.1.min.js"></script>
                      <script src="js/popper.min.js"></script>
                      <script src="js/bootstrap.min.js"></script>
                      <script src="js/main.js"></script>
                    </body>
                
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
                


         



@endsection



