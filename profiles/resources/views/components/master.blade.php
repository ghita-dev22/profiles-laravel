<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    {{-- <title>social network | @yield('title')</title> --}}
    <title>social network | {{$title}}</title> 
    
    
</head>
<body>
    @include('partials.nav')
    <main>
    
        {{-- @yield('main') --}}
        <div class="container m-3">
            <div class="row my-3">
                @include('partials.flashbag')
                </div>
                
          
          
                
            
            {{$slot}}
        </div>
       
     
    </main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>