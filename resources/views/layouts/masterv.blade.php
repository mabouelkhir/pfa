<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel pipe</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
    @yield('styleshets')
</head>
<body>

 
    @include('partials.verticalnavbar')
    <div class="container mt-5" > 
            @yield('content')
    </div>
    
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/Jquery.min.js') }}"></script>

      
     @yield('javascript')
</body>
</html>