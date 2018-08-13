@extends('layouts.auth_master')

@section('title')

Login
@endsection

@section('styles')

    <style>
        
        .card-header h1{
            
            color : white;

        }
    </style>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-sm-6 col-md-4 offset-sm-3 offset-md-4">
            <div class="card">

                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    @include('partials.errors')
                    <form action="{{route('session.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="form-group">
                              <label for="email"><h5>Email</h5></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                 <input type="email" name="email" class="form-control" required placeholder="Email" value={{old('email')}}>
                                </div>  
                            </div>

                            <div class="form-group">
                              <label for="password"><h5>password</h5></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                 <input type="password" name="password" class="form-control" required >
                                </div>  
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-sign-in"></span>           Login</button>
                            </div>
                             

                    </form>
                    <p>Don't have an account? <a href="{{route('register')}}">SignUp</a></p>

                </div>

            </div>


        </div>

    </div>



@endsection