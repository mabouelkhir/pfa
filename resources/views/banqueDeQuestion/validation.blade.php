@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('css/pop.css')}}">

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif


 
  
 
  
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
    @foreach ($lesProjets as $projet )
    @foreach ($projet->chapitres as $chapitre )
     @foreach ($chapitre->sections as $section )
      @foreach ($section->points as $point)
    
      @if (count($point->qcms)>0)
          
      <div class="container">
        @if(!in_array( $chapitre->nom_chapitre, $duplicates))

           <div class="alert alert-dismissible alert-info mt-5">
            <h4 class="text-center mt-3" >{{$chapitre->nom_chapitre}}</h4>
         </div>

        @php
            $duplicates[] = $chapitre->nom_chapitre;
        @endphp

        @endif
        
        
  
        <div class="table-responsive custom-table-responsive">
 
      
          
      @foreach (App\Models\Performance::get() as $performance)
      @if (App\Models\Qcm::where('nom_performance',$performance->nom_performance)->where('point_id',$point->id)->exists())
          <table class="table custom-table" >
            <thead>
                <tr ><th scope="col" colspan="4">{{$section->nom_section}}</th></tr>
                <tr><th scope="col" colspan="4">{{$point->nom_point}}</th></tr>
                
                @foreach (App\Models\Qcm::where('nom_performance',$performance->nom_performance)->where('point_id',$point->id)->get() as $qcm)
                            @if(!in_array( $qcm->nom_performance, $duplicates))

                            <tr><th scope="col" colspan="4">  {{$qcm->nom_performance}}</th></tr>
                            
                    
                            @php
                                $duplicates[] =$qcm->nom_performance;
                            @endphp
                    
                            @endif
                     
                @endforeach
                <tr><th scope="col" colspan="4"></th></tr>
                
                <tr  style="background-color: black; color:white;">  
  
                <th scope="col">
                  
                </th>
                <th scope="col">ID</th>
                <th scope="col">NOM QCM</th>
        
       
              </tr>
            </thead>
        
            <tbody>
                @foreach (App\Models\Qcm::where('nom_performance',$performance->nom_performance)->where('point_id',$point->id)->get() as $qcm)
              <tr scope="row">
                <form action="{{route('validation',$projet->id)}}" method="POST">
                    @csrf
                        <input type="hidden" value="{{ $qcm->id }}" name="id" >
                        <input type="hidden" value="non" name="statut" >
                <th scope="row">
                   
                            
                        <label class="control control--checkbox">
                               
                                <input type="checkbox" value="oui" name="statut" onchange="submit()" {{$qcm->statut=='oui' ? 'checked':''}} >
                              
                                <div class="control__indicator"></div>
                        </label>
                </form>
                
                </th>
                <td>
                  {{$qcm->id}} 
                </td>
                <td><a href="{{ url('/projet/'.$projet->id.'/banquedequestion/'.$point->id.'/categorie/'.$performance->id.'/Qcm/'.$qcm->id)}}" class="link-dark" >{{$qcm->nom_qcm }}</a></td>
            
               
               
               
                
           
            </tr>
           
             
              
            
       
            @endforeach
         
            </tbody>
          </table>
      @endif
      
        
          @endforeach
          
   
         
       
        </div>
        <br>
        
      

  
  
      </div>
  
      @endif

    </div>
    
    @endforeach  
    @endforeach
        
    @endforeach
       
  @endforeach

   
    
      
      
  
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
                    
                        $('.show_confirm').click(function(event) {
                            var form =  $(this).closest("form");
                            var name = $(this).data("name");
                            event.preventDefault();
                            swal({
                                title: `Êtes-vous sûr de supprimer ce qcm??`,
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
    <script src="{{asset('tablecheck/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('tablecheck/js/popper.min.js')}}"></script>
    <script src="{{asset('tablecheck/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('tablecheck/js/main.js')}}"></script>
  </body>
</html>

  <script src="{{asset('js/pop.js')}}"></script>
@endsection