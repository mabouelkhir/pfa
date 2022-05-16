
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color:#e5e3f1 !important;">
    <div class="container-fluid">
      
  
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{url('projet/'.$IdProjet.'/tabledespecification')}}"><h5>Table De Spécification</h5></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('/projet/performance/'.$IdProjet)}}"><h5>Catégorie De performance</h5>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/projet/'.$IdProjet)}}"><h5>Point à évaluer</h5></a>
          </li>
          
          <style>
            h5{
              color:black;
              
            }
          </style>
          
          
          
        </ul>
        
      </div>
    </div>
  </nav>