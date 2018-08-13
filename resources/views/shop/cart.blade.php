@extends('layouts.auth_master')



@section('styles')
<style>
.card {

    margin : 40px auto;
}
 .card-header h2 { 

    color : white
}

.list-group-item {
    color : black;
}

    </style>
@endsection

@section('content')
<div class="container">

    @if(Session::has('cart'))

        <div class="row m-5">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <ul class="list-group">

                
                    @foreach($products as $product)
                       
                        <li class="list-group-item">
                             <div class="row">
                                <div class="col-sm-6">

                                 <strong>{{$product['item']['title']}}</strong>
                            
                            </div>
                            <div class="col-sm-2">
                        
                       
                            
                            <span class="badge badge-pill badge-success">${{$product['price']}}</span>
                        </div>
                        <div class="col-sm-2">
                            <h4> <span class="badge badge-secondary">{{$product['quantity']}}</span></h4>
                        </div>
                        <div class="col-sm-2">
                        <!-- remove item-->
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a href="{{route('product.reduceByOne',['id'=>$product['item']]['id'])}}"> Remove 1 item</a></li>
                                
                                <li class="dropdown-item"><a href="{{route('product.addOneItem',['id'=>$product['item']]['id'])}}"> add 1 item</a></li>

                                <li class="dropdown-item"><a 
                                    href="{{route('product.remove',['id'=>$product['item']]['id'])}}"> Remove All</a></li>
                            </ul>
                        </div>
                        </div>
                        <!-- remove item-->
                            </div>
                            
                        </li>
                    
                    @endforeach
                
                </ul>
            </div>
        
        </div>

        <div class="row m-4" style="color: darkred">

            <div class="col-sm-6 offset-sm-3 col-md-6 offset-md-3">
                <h1 id="total"><span class="badge badge-primary">Total : <span class="badge badge-pill badge-success">${{$totalPrice}}</span></span></h1>
            </div>
        
        </div>

        <div class="row m-3">
            <div class="col-sm-6 offset-sm-3 col-md-6 offset-md-3 text-center">
                <a href="{{route('checkout')}}" id="checkout-btn" class="btn btn-success btn-lg"><strong>Checkout</strong></a>
            </div>
        
        </div>
        
    @else 
    <div class="row">
            <div class="col-sm-6 offset-sm-3 col-md-6 offset-md-3">
               
              <div class="card">
                <div class="card-header">
                    <h2 class="card-header-title">No Items In The Cart</h2>
                </div>
              </div>
            </div>
        
    </div>


    @endif 


</div>
@endsection
