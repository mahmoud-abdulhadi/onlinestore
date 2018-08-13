@extends('layouts.auth_master')

@section('title')
		Checkout
		
@endsection

@section('styles')
<style>
	.card-header h1 ,.card-header h4{

		color : white;

	}
	.card { 


		margin : 40px auto ;
		
	 }



</style>


@endsection


@section('content')

	<div class="row">
		<div class="col-sm-6 col-md-4 offset-md-4 offset-sm-3">
			
			<div class="card">
				<div class="card-header">
					<h1>Checkout</h1>
					<h4>Your Total is :&nbsp;&nbsp;<span class="badge badge-primary">${{$totalPrice}}</span></h4>
				</div>
				<div class="card-body">
						
						<div class="alert text-danger" id="charge-error">
							{{Session::get('error')}}
						</div>
						
				
					<form action="{{route('buy')}}" method="post" id="checkout-form">
						<div class="row">
							<div class="col-12 col-xs-12">
								<div class="form-group">
									<label class="control-label" for="name">Name</label>
									<input type="text" id="name" class="form-control" name="name" required>
								</div>

							</div>

							<div class="col-12 col-xs-12">
								<div class="form-group">
									<label for="address">Address</label>
								<input id="address" type="text" class="form-control" name="address" required></div>
							</div>

							<div class="col-12 col-xs-12">
									<div class="form-group">
										<label for="card-name">Card Holder Name</label>
										<input id="card-name" type="text" class="form-control" required>

									</div>

							</div>

							<div class="col-12 col-xs-12">
								<div class="form-group">
									<label for="card-number">Credit Card Number</label>
									<input type="text" class="form-control" id="card-number" required="">
								</div>
							</div>
							<div class="col-12 col-xs-12">
								
								<div class="row">
									<div class="col-6 col-xs-6">
										<div class="form-group">
										<label for="month-expire">Expiration Month</label>
										<input id="month-expire" type="text" class="form-control" required="">
										</div>
									</div>

									<div class="col-6 col-xs-6">
										<div class="form-group">
										<label for="year-expire">Expiration year</label>
										<input class ="form-control" type="text" id="year-expire" required="">
										</div>
									</div>

								</div>
							</div>

							<div class="col-12 col-xs-12">
								<div class="form-group">
									<label for="cvc">CVC</label>
									<input id="cvc" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						{{csrf_field()}}
						<div class="col-12 col-xs-12 text-center">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-lg"><i class="fa fa-usd" aria-hidden="true"></i> Buy Now</button>
							</div>
						</div>
					</form>
				</div>

			</div>


		</div>



	</div>

@endsection


@section('scripts')

 <script src="https://js.stripe.com/v2/"></script>
 <script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
@endsection

