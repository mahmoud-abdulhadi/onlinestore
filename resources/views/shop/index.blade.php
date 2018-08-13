@extends('layouts.master')


@section('title')

Home
@endsection


@section('content')



    <div class="view">
        <p>View as:</p> 
        <a href="#"><span title="List" class="fa fa-list"></span></a>
        <a href="#"><span title="Grid" class="fa fa-th"></span></a>
        
    </div>
    <div class="shop-header">
    @if(Route::has('categories'))
        
        <h1>{{$category->name}}</h1>
    @else 
    <h1>Shop</h1>


    @endif 
    </div>

    <!--@if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
    @endif-->
   
    @foreach($products->chunk(3) as $productsChunk)
        <div class="row mb-2">
            @foreach($productsChunk as $product)
            <div class="col-sm-6 col-md-4">
            <div class="card item-card">
            <div class="card-header">
            <img class="card-img-top" src="{{$product->cover}}" alt="Card image cap" div="img-fluid">
            <a href="{{route('product.add',['product' => $product->id])}}" class="btn btn-success btn-sm buy-button"><span class="fa fa-cart-plus fa-lg pull-left"></span> Add to Cart</a>
            </div>

            <div class="card-body clearfix">
                <div class="card-title-sec">
                <h5 class="card-title">{{str_limit($product->title,30)}}</h5>
                </div>
                <div class="description">
                <p class="card-text ">{{str_limit($product->description,200)}}</p>
                </div>
              
                <div class="footer">
                <div class="pull-left badge badge-pill badge-dark price">${{$product->price}}</div>
                <a href="{{route('product.show',['product' => $product->id,'category' => $product->category->slug])}}" class="btn btn-primary  view-button">View Details</a>
                </div>
            </div>
            </div>
        </div>

            @endforeach

        </div>
    @endforeach
   

 
@endsection


@section('scripts')

    <script src="{{asset('libs/sweetalert.min.js')}}"></script>

    <script>
        
        @if(Session::has('success-buy'))

            swal({
                  title: "Success",
                  text: "Items Successfully Purchased!",
                  icon: "success",
                });


        @endif
    </script>

@endsection

