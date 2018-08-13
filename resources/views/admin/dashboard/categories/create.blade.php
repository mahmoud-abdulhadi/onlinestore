@extends('layouts.admin_master')

@section('styles')

	<style>
		
		.control-button{

			border-radius: 0px;
		}


	</style>

@endsection
@section('page')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Create Category</h2>

				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<form method = "post" action="{{route('admin.category.store')}}">
								{{csrf_field()}}
								<div class="form-group">
									<label for="name">Category Title:</label>
									<input type="text" id="name" name="name" class="form-control">

								</div>

								<div class="form-group">
									
									<button type="submit" class="control-button btn btn-primary">Add Category</button>
									<a href="{{route('admin.dashboard')}}"  class="control-button btn btn-default">Cancel</a>
								</div>

							</form>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
	
</div>

@endsection