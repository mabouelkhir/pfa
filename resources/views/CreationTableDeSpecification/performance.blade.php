@extends('layouts.master')
<style>
  .everything{
    background-color:#efefef;
  }
</style>
<div class="everything">
@section('content')
@include('partials.analyseetdesign')
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
          <h2 class="mb-5">Catégorie De Performance</h2>
          
    
          <div class="table-responsive custom-table-responsive">
    
            <table class="table custom-table">
              <thead>
                <tr style="background-color: black; color:white;">  
    
                  <th scope="col">
                    
                  </th>
                  
                  <th scope="col">ID</th>
                  <th scope="col">Catégorie De Performance</th>
                  
                </tr>
              </thead>
            @foreach ($performanceprojet as $objet )
              <form action="{{route('performanceprojet.store')}}" method="POST">  
               @csrf
              <tbody>
                <tr scope="row">
                  <th scope="row">
                    <label class="control control--checkbox">
                        <input type="hidden" name="etatdecat" id="" value="non" >
                        <input type="checkbox" name="etatdecat" id="" value="oui" onChange='submit();' {{ $objet->statut=="oui"  ? 'checked' : ''}}>
                      <div class="control__indicator"></div>
                    </label>
                  </th>
                  <td>{{$objet->performance_id}}</td>
                  <td>
                    <input type="text" name="projet_id" value="{{$IdProjet}}" hidden>
                    <input type="text" name="performance_id" value="{{$objet->performance_id}}" hidden >
                    @foreach ($lesPerformances as $performance )

                    @if(!in_array( $performance->firstWhere('id',$objet->performance_id)->nom_performance, $duplicates))
                          {{$performance->firstWhere('id',$objet->performance_id)->nom_performance}}
                    @php
                        $duplicates[] = $performance->firstWhere('id',$objet->performance_id)->nom_performance;
                    @endphp

                    @endif
            
                    @endforeach
                  </td>
                  
                  
                </tr>
                
                
              </tbody>
            </form>
        @endforeach
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
@endsection