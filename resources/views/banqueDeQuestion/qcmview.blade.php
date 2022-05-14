@extends('layouts.master')
<style>
  .everything{
    background-color:#e5e3f1;
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

    <title>Qcm view</title>
  </head>
  <body>
    
    <div class="content">
@foreach ($lesQcms as $qcm )      
      <div class="container">
        
        
        
  
        <div>
  
          <table class="table custom-table">
            <!-- <thead>
              <tr >
                
               
              <tr style="background-color: black; color:white ;width:100px ;height:100px">  
                  
                <th scope="col" >
                   Amorce:
                  </th>
                  <th></th>
                  <th></th>
                <th scope="col" >
                 @php
                    echo($qcm->amorce) ;
                 @endphp 
                </th>
                <th scope="col">
                  
                 </th>
                 <th scope="col">
                  
                </th>
                
              </tr>
            </thead> -->
            <strong>Enoncé de la question:</strong>
            <div  class="text open">
        <div id="question_preview_core">
            <p>  @php
                    echo($qcm->amorce) ;
                 @endphp  </p></div>
            </div>
        
            <tbody>
            @foreach ($qcm->propositions as $proposition )
               @if ($proposition->help =='oui')
                 <tr scope="row">
                    <th scope="row">Choix:</th>
                    <form action="{{route('updatestatut',[$proposition->id,$proposition->qcm_id])}}" method="POST" >
                      <th><input type="hidden" name="statut" id="" value="non" ></th>
                      <th scope="row">
                      
                        @csrf
                       
                       <label class="control control--checkbox">
                        
                           <input type="checkbox" name="statut" id="" value="oui" onChange='submit();' {{ $proposition->statut=="oui"  ? 'checked' : ''  }}>
                     
                      
                        <div class="control__indicator"></div>
                    </label>
                    </form>
                  </th>
                  <td>
                    @php
                        echo($proposition->proposition);
                    @endphp
                  </td>
                  <td>
                    <form action="{{ route('proposition.destroy',$proposition->id)}}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="trash show_confirm" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                  </form>
                  </td>
                  @if (!in_array($proposition->proposition,$generale) )
                    <td><a class="btn btn-success" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance.'/Qcm/'.$qcm->id.'/editproposition/'.$proposition->id)}}">Modifier</a></td>
                 
                 @else
                  <td></td>

                 @endif
                  
            </tr>
               @endif
            
               
            @endforeach
           
               
               
               
                <tr scope="row">
                    <td colspan="6" class="text-center">
                        <a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance)}}">Retourner</a>
                         <a class="btn btn-primary" href="{{url('projet/'.$IdProjet.'/banquedequestion/'.$IdPoint.'/categorie/'.$IdPerformance.'/Qcm/'.$qcm->id.'/addproposition/')}}" >Ajouter des solutions générale</a>
                    </td>
                </tr>
         </tbody>
          </table>
        
        </div>
  
  
      </div>
  @endforeach
    </div>
      



      
  
      
    
    <script src="{{asset('tablecheck/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('tablecheck/js/popper.min.js')}}"></script>
    <script src="{{asset('tablecheck/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('tablecheck/js/main.js')}}"></script>
  </body>


  <script src="{{asset('js/pop.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
                    <script type="text/javascript">
                    
                        $('.show_confirm').click(function(event) {
                            var form =  $(this).closest("form");
                            var name = $(this).data("name");
                            event.preventDefault();
                            swal({
                                title: `Êtes-vous sûr de supprimer cette proposition??`,
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
</div>
@endsection