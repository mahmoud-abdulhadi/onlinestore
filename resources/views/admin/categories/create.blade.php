@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')


	<div class="panel panel-default">
		
		<div class="panel-heading text-center" style="background: #d4d4f1;">
			<span class="badge">Create a new Category
		</div>
		<div class="panel-body">
		
			<form action="{{ route('category.store')}}" method="post" >
					{{ csrf_field() }}

					<div class="form-group">
						
						<input type="text" name="name" class="form-control" placeholder="New Category ....">
					</div>

					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">
							Store Category
						</button>
						
						</div>
					</div>
			</form>
		</div>
	</div>	
	
@stop