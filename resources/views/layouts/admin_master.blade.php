<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin ECommerce Dashboard">
    <meta name="author" content="Mahmoud Abdulhadi">

    <title>Smart Shop - Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{asset('libs/metisMenu.min.css')}}">
    

    <!-- Custom CSS -->
    <link href="{{asset('libs/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    

    <!-- Custom Fonts -->
    <link href="{{asset('libs/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        

        .navbar-header  .navbar-brand {

             
             padding:0;
         }

         .navbar-header  #brand-name {

            padding : 10px;
         }
         .navbar-right a{

            color: white;
         }
         .navbar-right a:hover{

            color: black;
         }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"   href="#"> <img src="{{asset('imgs/brand.png')}}" width ="40" height ="40" alt=""></a>
                <a id="brand-name" class="navbar-brand " href="{{route('products.index')}}">Smart Shop</a>
               
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{route('products.index')}}">Shop</a></li>
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
          <ul class="dropdown-menu">
           @foreach($categories as $category)
                <li><a href="/categories/{{$category->slug}}">{{$category->name}}</a></li>

           @endforeach
          </ul>
        </li>
                
            </ul>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" >
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-tasks fa-fw"></i>&nbsp;Categories&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li><a href="{{route('admin.category.create')}}"><span class="fa fa-plus"></span> Create Category</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('admin.categories.index')}}"><span class="fa fa-shopping-bag"></span> Manage Categories</a></li>
                           
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-support fa-fw"> </i>&nbsp; Products&nbsp; <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="{{route('admin.product.create')}}">
                               <span class="fa fa-plus-circle"></span> Create Product
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin.products.index')}}">
                               <span class="fa fa-product-hunt"></span> Manage Products
                            </a>
                        </li>
                        <li class="divider"></li>
                       
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-shopping-basket fa-fw"></i>&nbsp;Orders&nbsp;<i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="{{route('admin.orders.index')}}">
                                view Orders
                            </a>
                        </li>
                        
                        
                </ul>
            </li>
                <!-- /.dropdown -->
                   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="fa  fa-user "></span> 
            @if(Auth::check())
                {{Auth::user()->name}}
            @else
                Guest
            @endif
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('user.profile',['user' => Auth::user()->username])}}">Profile</a></li>
            
            <li>
                 <form id="delete-form" action="{{route('session.destroy')}}" method="post">
                  {{csrf_field()}}
                    <a onclick="submitLogout()" style="cursor:pointer;color:black">Logout</a>
                </form>
            </li>
            @if(Auth::user()->admin)
                <li role="separator" class="divider"></li>
                <li><a href="{{route('admin.dashboard')}}"><span class="fa fa-tachometer"></span> Dashboard</a></li>

            @endif
            
          </ul>
        </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="/admin/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i>Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.category.create')}}">Create Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.categories.index')}}">Manage Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-support fa-fw"></i>Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.product.create')}}">Create Product</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.products.index')}}">Manage Products</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('admin.users.index')}}"><i class="fa fa-user fa-fw"></i>Users</a>
                        </li>
                        <li>
                            <a href="{{route('admin.orders.index')}}"><i class="fa fa-shopping-cart fa-fw"></i> Orders</a>
                        </li>
                       
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
            <div id="page-wrapper">
                    @yield('page')
        
            </div>
            <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{asset('libs/metisMenu.min.js')}}"></script>
  
    
     <script src="{{asset('js/toastr.min.js')}}"></script>


   

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('libs/sb-admin-2.js')}}"></script>



   
    <script src="{{asset('libs/sweetalert.min.js')}}"></script>
        



      <script >
        @if(Session::has('success'))

            toastr.success("{{ Session::get('success') }}")



        @endif
        
        @if(Session::has('info'))

            toastr.info("{{ Session::get('info') }}")


            

        @endif

        function submitLogout(){

            $('#delete-form').submit();

        }


    </script>

    @yield('scripts')



</body>

</html>
