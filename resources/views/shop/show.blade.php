@extends('layouts.master')



@section('content')


	
		<div class="row">
			<div class="col-md-6 item-img">
				<!-- Product Image -->
				<a href="{{$product->cover}}">
				<img src="{{$product->cover}}" alt="{{$product->title}}" class="image-responsive">
				</a>

			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<h1>{{$product->title}}</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<span class="monospaced">NO.{{$product->id}}</span>
					</div>

				</div>
				<!-- Item Description -->
				<div class="row">
					
					<div class="col-md-12">
						<p class="description">
							{{$product->description}}
						</p>
					</div>
				</div>

				<!-- Review Section --> 
				<div class="row">
					<div class="col-md-4 " >
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="badge badge-success">61</span>
					</div>
					<div class="col-md-4">
						<span class="btn btn-success">Rate</span>
						
					</div>
					
				</div>
				<!-- Price Section -->
				<div class="row">
					<div class="col-md-12 bottom-rule">
						<h2 class="product-price">
							${{$product->price}}
						</h2>
					</div>
				</div>
				<hr style="color : white">
				<!-- Quantity -->
				<div class="row add-to-cart">
					<div class="col-md-5 product-qty">
						<span  id ="plus-qty-control" class="btn btn-default  btn-qty qty-control">
							<span class="fa fa-plus"></span>
						</span>
						<input id="qty-control" type="text" class="btn btn-default btn-md btn-qty" value="1" readonly="">
						<span id="minus-qty-control" class="btn btn-default btn-qty qty-control">
							<span class="fa fa-minus"></span>
						</span>
					</div>
					<div class="col-md-4 offset-md-2">
						<a href="{{route('product.add',['product' =>$product->id ])}}" class="btn btn-lg btn-primary btn-full-width"><span class="fa fa-cart-plus"></span> Add To Cart</a>
					</div>
				</div>

				<div class="row mt-4">
					<div class="col-md-4 ">
						<span id="qty-status" class=" badge badge-success monospaced" style="padding:12px;font-size:1.2em">In Stock</span>
					</div>
				</div>
			

			</div>

		</div>



@endsection