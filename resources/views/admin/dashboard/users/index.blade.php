@extends('layouts.admin_master')


@section('styles')
<style>
	 .panel-dark .panel-heading{

	background : #222222 ;


	color : white;
}
</style>

@endsection
@section('page')
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Users</h1>
				</div>
				<div class="panel-body">
					@foreach($users as $user)
						<div class="panel panel-default panel-dark">
							
							<div class="panel-heading">
								<h2 ><span class="fa fa-user fa-x4"></span>&nbsp;{{$user->name}}</h2>
							</div>

							<div class="panel-body">
								
								<div class="row">
									<div class="col-md-2">
										<h4>User Name :</h4>
									</div>
									<div class="col-md-8">
										<h4> @ {{$user->username}}</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<h4>Email:</h4>
									</div>
									<div class="col-md-8">
										<h4>{{$user->email}}</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<a href="{{route('user.profile',['user' => $user->username])}}" class="btn btn-primary btn-md">View Profile</a>
									</div>
								</div>
							</div>
						</div>
			
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection