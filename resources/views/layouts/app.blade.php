<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Shopping Cart</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--toastr -->
    <link rel="stylesheet"  href="{{ asset('css/toastr.min.css') }}">
    <!--toastr -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('styles')
</head>
<body>
     @include('partials.header')

    <div class="container">   
        <div class="row m-5">    
            @if(Auth::check())
            <div class="col-lg-3">
                
                <ul class="list-group" style="font:bold 15px/1 sans-serif;">
               
                    @if(Auth::user()->admin)
                    <li class="list-group-item">

                        <a href="{{route('categories')}}" >
                            <span class="glyphicons glyphicons-tags" style="font-size:20px;"></span>
                        Categories</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('category.create')}}" >
                        <i class="fa fa-plus-square" style="font-size:20px;"></i>
                        Create new category</a>
                    </li>

                    @endif
                </ul>
            </div>
            @endif
                <div class="col-lg-8">
                
                @yield('content');
                </div>
            </div>    
       </div>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script >
        @if(Session::has('success'))

            toastr.success("{{ Session::get('success') }}")

        @endif
        
        @if(Session::has('info'))

            toastr.info("{{ Session::get('info') }}")

        @endif
    </script>

    @yield('scripts')

</body>
</html>
