<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <title>@yield('title') - Shopping Cart</title>

    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https:////fonts.googleapis.com/css?family=Ubuntu+Mono">
    <!--toastr -->


    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <style>

    body{

          background-color : #222 ;

    }
</style>



  
</head>
<body>
   
    @include('partials.header')

     
     <div class="row">

    @include('partials.sidebar')
    <div class="col-md-8">
    @yield('content')
    </div>
    
   
    
    </div>

 
    
       <script src="{{asset('js/app.js')}}"></script>
       <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script >
        @if(Session::has('success'))

            toastr.success("{{ Session::get('success') }}")



        @endif
        
        @if(Session::has('info'))

            toastr.info("{{ Session::get('info') }}")


            

        @endif
    </script>

    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
    
  
</body>
</html>