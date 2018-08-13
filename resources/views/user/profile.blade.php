@extends('layouts.auth_master')


@section('title')

  Profile
@endsection

@section('styles')
  <style>
    
  .panel-body{

    color : black;
  }

  </style>

@endsection

@section('content')
    <div class="row m-5">
        <div class="col-sm-8 col-md-8 offset-sm-3 offset-md-2">
            
            <div class="card-header">
            <h2>My Orders</h2>
          </div>
          <div class="card-body" style="background-color: gray">
          
            @foreach($orders as $order)
            <div class="panel panel-default">
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item" style="background-color: lightgray">
                  <span><b>Buyer Name: {{$user->username}} <br>Date: 
                    {{$order->created_at->toFormattedDateString()}}</b></span>
                  </li>
                  @foreach($order->cart->items as $item)

                  <li class="list-group-item">
                    Name  :<span class="badge"> {{$item['item']['title']}}</span>
                    <br>
                    Price:<span class="badge">${{$item['price']}}</span>
                    <br>
                    quantity: <span class="badge">{{$item['quantity']}} Units</span>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="panel-footer btn-success ">
                <strong >Total Price: ${{$order->cart->totalPrice}}</strong>
              </div>
            </div>
            <br>
            @endforeach
            
        </div>
      </div>
    </div>

@endsection