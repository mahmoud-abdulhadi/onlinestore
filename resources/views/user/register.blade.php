@extends('layouts.auth_master')


@section('title')

Register
    
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
                    <h1>Sign Up</h1>
                </div>
                <div class="card-body">
                    <!--@include('partials.errors')-->
                    <form action="{{route('user.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                                <label for="name"><h5>Name</h5></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control"  placeholder="Full Name" value="{{Request::old('name')}}">
                                    </div> 
                                    
                            @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                         </div>

                         <div class="form-group">
                                <label for="username"><h5>User Name</h5></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" name="username" class="form-control"  placeholder="username" value="{{Request::old('username')}}">
                                    </div>  
                                    @if($errors->has('username'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('username')}}
                                        </div>
                                    @endif
                         </div>
                          <div class="form-group">
                              <label for="email"><h5>Email Address</h5></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                 <input type="email" name="email" class="form-control"  placeholder="Email" value="{{Request::old('email')}}">
                                </div>  
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                              <label for="password"><h5>password</h5></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                 <input type="password" name="password" class="form-control"  >
                                </div> 
                                @if($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('password')}}
                                    </div>
                                
                                @endif
                            </div>

                            <div class="form-group">
                              <label for="password_confirmation"><h5>Password Confirmation</h5></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                </div>
                                 <input type="password" name="password_confirmation" class="form-control">
                                </div>  
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-user-circle" aria-hidden="true"></i>          Sign Up</button>
                            </div>
                             

                    </form>

                </div>

            </div>


        </div>

    </div>



@endsection