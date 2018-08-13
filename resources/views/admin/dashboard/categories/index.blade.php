@extends('layouts.admin_master')


@section('styles')
<style>
	.control-button{

		border-radius: 0px ;
}
</style>
@endsection

@section('page')
<div class="container-flui">
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-default">
	                        <div class="panel-heading">
	                            <h2><i class="fa fa-tasks fa-fw"></i> Categories</h2>
	                        </div>
	                        <!-- /.panel-heading -->
	                        <div class="panel-body">
	                        	<ul class="list-group">
	                            @foreach($categories as $category)
	                            		<li class="list-group-item">
											<div class="row">

												<div class="col-md-6">
													
													<!-- Category Title -->
													<a href="{{route('admin.category.show',['category'=>$category->slug])}}"><h3>{{$category->name}}</h3></a>
												</div>
												<div class="col-md-3">
													
													<!-- Edit Button -->
													<a  href="{{route('admin.category.edit',['slug'=>$category->slug])}}" class="control-button btn btn-info btn-lg edit-button"><span class="fa fa-edit"></span> Edit</a>
												</div>

												<div class="col-md-3">
													<!-- Delete Button -->
													<button onclick="deleteCategory('{{$category->name}}','{{$category->slug}}')" class="btn btn-danger btn-lg delete-button control-button"><span class="fa fa-trash"></span> Remove</button>
												</div>

											</div>
										</li>

	                            @endforeach
	                            </ul>
	                            <!-- /.list-group -->
	                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
	                        </div>
	                        <!-- /.panel-body -->
	    </div>
	</div>
</div>
@endsection

@section('scripts')

	<script>
		function deleteCategory(name,slug){

					swal({
		  			title: "Are you sure ?",
		  			text: "Once " + name +  " category deleted, All products associated with wil will be removed",
		  			icon: "warning",
		  			buttons: true,
		  		dangerMode: true,
				})
			.then((willDelete) => {
		  		if (willDelete) {
		  		
		    	swal("Poof!"+ name + " Category deleted!", {
		      	icon: "success",
		    });
		    window.location = 'categories/delete/'+slug ; 
		  } else {
		    swal(name + " Category is safe!");
		  }
		});


		};
	</script>

@endsection