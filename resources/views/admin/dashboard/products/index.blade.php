@extends('layouts.admin_master')


@section('styles')

<style>
	.control-button{

		border-radius: 0px ; 
	}

</style>
@endsection

@section('page')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						@if(Route::has('categories'))
								<h2>{{$category->name}}</h2>

						@else 
								<h2>Products</h2>

						@endif
						
					</div>
					<div class="panel-body">
						<table class="table table-responsive table-striped">
							<tr>
								<th>Cover</th>
								<th>Title</th>
								<th>Price</th>
								<th>Category</th>
								<th></th>
								<th></th>
							</tr>
							@foreach($products as $product)
								<tr>
										<td>
											<div class="image-wrapper">
												<a href="{{$product->cover}}"><img width="100" src="{{$product->cover}}" alt="{{$product->title}}"></a>
											</div>

										</td>	
										<td >
											<a href="{{route('product.show',['product'=>$product->id ,'category'=>$product->category->slug])}}"><h4>{{$product->title}}</h4></a>
										</td>						
										<td>
											<h3><span style="font-size:1em" class="label label-success">${{$product->price}}</span></h3>
										</td>	
										<td>
											
											<a href="{{route('admin.category.show',['category'=>$product->category->slug])}}"><h4>{{$product->category->name}}</h4></a>
										</td>	
										<td>
											<a href="{{route('admin.product.edit',['product' =>$product->id ])}}" class="control-button btn btn-info btn-lg"><span class="fa fa-edit"></span> Edit</a>
										</td>
										<td>
											<button onclick="deleteProduct('{{addslashes($product->title)}}','{{$product->id}}')" class="control-button btn btn-danger btn-lg"><span class="fa fa-trash"></span> Remove</button>
										</td>


								</tr>

							@endforeach

						</table>
						
					</div>
				</div>
			</div>
		</div>

	</div>
	

@endsection

@section('scripts')

	<script>
		function deleteProduct(name,id){
			
			id = parseInt(id);
					swal({
		  			title: "Are you sure ?",
		  			text: "Once " + name +  " Product deleted, It will be lost",
		  			icon: "warning",
		  			buttons: true,
		  		dangerMode: true,
				})
			.then((willDelete) => {


		  		if (willDelete) {
		  			
		  		window.location = 'products/delete/'+id ; 
		    	swal("Poof!"+ name + " Product was deleted!", {
		      	icon: "success",
		    });
		    		  } else {
		    swal(name + " Product is safe!");
		  }
		});



		}	



	</script>
	
@endsection