@extends('layouts.admin_master')


@section('styles')


<style>
	

	.form-control {


		border-radius: 0px;

	}

	textarea {

		resize: none;
	}

input.currency {
    text-align: right;
    padding-right: 15px;
}
.btn-file {
    position: relative;
    overflow: hidden;
}

input[type=file] {
   

	height : 100%;

	
	background:white;
	display: block;

  }

 .control-button {


 	border-radius: 0px;
 }


	
</style>

@endsection
@section('page')


	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Create Product</h2>

				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-10">

							<form class="form-horizontal" action={{route('admin.product.store')}} method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group">
									<label class="control-label col-sm-2" for="title">Title:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value={{Request::old('title')}}>
										@if($errors->has('title'))

											<span class="text-danger">*{{$errors->first('title')}}</span>
										@endif
									</div>


								</div>

								<div class="form-group">
									<label class="control-label col-sm-2" for="description">Description:</label>
									<div class="col-sm-10">
									<textarea name="description" rows="10" id="description" class="form-control" placeholder="Enter Some Description">{{old('description')}}</textarea>	
									@if($errors->has('description'))
										<span class="text-danger">*{{$errors->first('description')}}</span>
									@endif
									</div>



								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="category">Category:</label>
									<div class="col-sm-10">
									<select class="form-control btn btn-primary" name="category" id="category" data-style="btn-primary">
										<option value="">Select A Category</option>
										@foreach($categories as $category)

											<option value="{{$category->id}}" {{old('category') == $category->id? "selected" : ""}}>{{$category->name}}</option>

										@endforeach
									</select>
									@if($errors->has('category'))
									<span class="text-danger">*{{$errors->first('category')}}</span>
									@endif
									</div>



								</div>

								
								<div class="form-group">
									<label class="control-label col-sm-2" for="price">Price:</label>
									<div class="col-sm-10">
									<div class="input-group">
										
										<span class="input-group-addon">$</span>
										<input class="form-control currency" type="number" id="price" name="price" value="0.00" min="0" step="0.01" data-number-stepfactor="100"
										number-to-fixed="2">
									</div>
									@if($errors->has('price'))
									<span class="text-danger">*{{$errors->first('price')}}</span>
									@endif
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="cover">product Image:</label>
									<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-addon btn btn-primary">
										
													Browse...
											
										</span>
										<input  type="file" class="form-control"  id="cover" name="cover">
									</div>
									@if($errors->has('cover'))
									<span class="text-danger">*{{$errors->first('cover')}}</span>
									@endif
									</div>

								</div>

								<div class="form-group">

									  <div class="col-sm-offset-2 col-sm-10">
      								<button id="submit-button" type="submit" class="control-button btn btn-success">Post Product</button>
      								<a href="{{route('admin.dashboard')}}"  class="control-button btn btn-default">Cancel</a>
    								</div>
									
								</div>



							</form>
							
					</div>

				</div>

			</div>

		</div>

	</div>
	
</div>



@endsection

@section('scripts')




@endsection