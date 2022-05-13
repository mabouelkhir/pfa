@extends('layouts.master')
<style>
  .everything{
    background-color:#efefef;
  }
</style>
<div class="everything">
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
      
      <div class="container">
        <h2 class="mb-5">Les Points à évaluers</h2>
        
  
        <div class="table-responsive custom-table-responsive">
  
          <table class="table custom-table">
            <thead>
              <tr style="background-color: black; color:white;">  
  
                <th scope="col">
                  
                </th>
                
                <th scope="col">ID</th>
                <th scope="col">Nom QCM</th>
                <th scope="col">Auteur</th>
                <th scope="col">Nom De Performance</th>
                <th scope="col">Supprimer</th>
                <th scope="col">Modifier</th>
       
              </tr>
            </thead>
        
            <tbody>
              @foreach ($lesQcms as $qcm )
              <tr scope="row">
                <th scope="row">
                  
                </th>
                <td>
                  {{$qcm->id}}
                </td>
                <td><a href="{{ url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance.'/Qcm/'.$qcm->id)}}" class="link-dark" >{{$qcm-> nom_qcm }}</a></td>
            
                <td>
                {{$qcm->auteur}}
                </td>
                <td>
                  {{$qcm->nom_performance}}
                </td>
                <td>
                  <form action="{{ route('qcm.destroy',$qcm->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="trash show_confirm" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </form>
                </td>
                <td></td>
                
           
            </tr>
             @endforeach
            <tr scope="row" >
              <td colspan="7" class="text-center"><a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance.'/creationqcm/')}}">Ajouter un QCM</a></td>
            </tr>
              
            
       
            
            </tbody>
          </table>
        </form>
        </div>
  
  
      </div>
  
    </div>
      
      
  
      
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

</div>
@endsection