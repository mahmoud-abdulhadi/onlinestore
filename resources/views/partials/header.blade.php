
    <nav class="navbar  navbar-static-top navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="{{route('products.index')}}"><img src="{{asset('imgs/brand.png')}}" width ="60" height ="60" alt="" srcset=""><h4 style="display:inline">Smart Shop</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
          
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">Shop</a>
          </li>
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departments</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03" style="width :auto">
                @foreach($categories as $category)
                <a class="dropdown-item" href="/categories/{{$category->slug}}">{{$category->name}}</a>
                @endforeach
            </div>
          </li>
          
        </ul>

        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('shopping.cart')}}"><i class="fa fa-shopping-cart"></i> Shopping Cart
              @if(Session::has('cart'))
                <span class="badge badge-light">{{Session::get('cart')->totalQuantity}}</span>

              @endif
             <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown" style="margin-right:20px">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> 
            @if(Auth::check())
            {{Auth::user()->username}}
            @else
              Guest
            @endif</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              @if(Auth::check())
                <a class="dropdown-item" href="{{route('user.profile',['username' => Auth::user()->username])}}">Profile</a>
                <form action="{{route('session.destroy')}}" method="post">
                  {{csrf_field()}}
                <button type="submit" id="logout-btn" role="button" class="dropdown-item" href="/logout">Log out</button>
                </form>
                @if(Auth::user()->admin)
                    
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('admin.dashboard')}}"><span class="fa fa-dashboard"></span> Dashboard</a>

                @endif
              @else 
                <a class="dropdown-item" href="/register">Sign Up</a>
                <a class="dropdown-item" href="/login">Sign In</a>
              @endif
            </div>
          </li>
        </ul>
        
      </div>
    </nav>