@extends('layouts.admin_master')



@section('page')


	<div class="row">
		
		<div class="col-md-12">
			
			<div class="panel panel-yellow">
				

				<div class="panel-heading">
					<h1>Orders</h1>
				</div>
				<div class="panel-body">
					
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Address</th>
							<th>Payment ID</th>
							<th>Amount</th>
							<th>Date Ordered</th>

						</thead>
						<tbody>
						@foreach($orders as $order)
								<tr>
									<td>
										{{$order->id}}
									</td>
									<td>
										{{$order->name}}
									</td>
									<td>
										{{$order->address}}
									</td>
									<td>
										{{$order->payment_id}}
									</td>
									<td>
										${{$order->cart->totalPrice}}
									</td>
									<td>
										{{$order->created_at}}
									</td>
								</tr>
								
						@endforeach
						
							
						</tbody>

					</table>
					<div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection