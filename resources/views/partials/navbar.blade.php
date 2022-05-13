<nav class="navbar navbar-expand-lg navbar-light bg-light " id="navbar" >
    <div class="container-fluid">
      <a class="navbar-brand" href="/">MyEval</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav me-auto">
         
          <li class="nav-item">
            <a class="nav-link scrollto active" href="/home">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scrollto active"  href="{{url('projet/'.$IdProjet.'/tabledespecification')}}" >Analyse et design</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Banque De Question</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('projet/'.$IdProjet.'/banquedequestion/')}}">Redaction</a>
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('projet/'.$IdProjet.'/banquedequestion/validation')}}">Validation</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/questionnaire/'.$IdProjet)}}">Questionnaires</a>
          </li>
          
          <ul class="navbar-nav ms-auto">
          @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                           
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
          </ul>
        </ul>
        
      </div>
    </div>
  </nav>
  