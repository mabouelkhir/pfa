@extends('layouts.masterv')
@section('content')

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('tableclickable/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('tableclickable/css/owl.carousel.min.css')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('tableclickable/css/bootstrap.min.css')}}">
  
  <!-- Style -->
  <link rel="stylesheet" href="{{asset('tableclickable/css/style.css')}}">

  <title>Les Projets</title>
</head>

<div class="content">
    
  <div class="container">
    <h2 class="mb-5">Les Projets : </h2>

    <div class="table-responsive">

      <table class="table custom-table">
        <thead>
          <tr style="background-color: black; color:white">
            
            <th scope="col">ID</th>
            <th scope="col">Nom Projet </th>
            
            
          </tr>
        </thead>
        <tbody>
          @foreach ($lesProjets as $projet ) 
          <tr scope="row">

            
                    
                    <td>
                     {{$projet->id}}
                    </td>
                   
                    <td>
                     
                           <a href="{{ url('projet/'.$projet->id)}}" class="list-group-item list-group-item-action" hidden></a>
                            <a href="{{ url('projet/performance/'.$projet->id)}}" class="link-dark"  hidden>{{$projet->nom}}</a>
                            <form method="POST" action="{{route('prepare')}}" enctype="multipart/form-data">
                               @csrf
                               
                              @for ($i=1;$i<7;$i++)
                              <input type="hidden" value="{{ $projet->id }}" name="projet_id[]">
                              <input type="hidden" value="{{ $i }}" name="performance_id[]">    
                              <input type="hidden" value="oui" name="statut[]">                      
                              @endfor
                               
                               <button type="submit" class="btn btn-link">{{$projet->nom}}</button>

                            </form>
                            <a href="{{ url('tabledespecification/'.$projet->id)}}" class="list-group-item list-group-item-action" hidden>{{$projet->nom}}</a>
                      <small class="d-block">{{$projet->description}}</small>
                    </td>
                    
          
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>


  </div>

</div>
<script src="{{asset('tableclickable/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('tableclickable/js/popper.min.js')}}"></script>
<script src="{{asset('tableclickable/js/bootstrap.min.js')}}"></script>
<script src="{{asset('tableclickable/js/main.js')}}"></script>



@endsection


