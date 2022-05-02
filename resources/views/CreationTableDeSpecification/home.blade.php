



@extends('layouts.masterm')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-6">

                    
                     @foreach ($lesProjets as $projet ) 
                   
                        <div class="list-group">
                            
                            <a href="{{ url('projet/'.$projet->id)}}" class="list-group-item list-group-item-action" hidden>{{$projet->nom}}</a>
                            <a href="{{ url('projet/performance/'.$projet->id)}}" class="list-group-item list-group-item-action">{{$projet->nom}}</a>
                            <a href="{{ url('tabledespecification/'.$projet->id)}}" class="list-group-item list-group-item-action" hidden>{{$projet->nom}}</a>
                            
                        </div>
            
                    @endforeach
             
                    

             
            </div>
        </div>
    </div>

    


@endsection


