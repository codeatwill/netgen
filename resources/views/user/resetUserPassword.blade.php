@extends('layouts.adminend.adminLayout') 
@section('dashboard')Edit User Details @endsection 

@section('content')

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit User</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="/admin/all/users">All Users</a></li>
						<li class="breadcrumb-item active">Edit User</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					@include('user.userLeftSide')
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link" href="/my-profile">Profile</a></li>
								<li class="nav-item "><a class="nav-link active" href="#">Reset Password</a></li>
							</ul>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content1">
								<div class="tab-pane" id="settings1">
									<form class="form-horizontal" method="post" action="/admin/update/user-password/{{$data['user']->id}}">
										{{ csrf_field() }}
										{{ method_field('patch') }}
										<div class="row">
											<div class="col-sm-12">
												@include('flash-message')
												@if($errors->any())
												<ul class="alert alert-danger">
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
												</ul>
												@endif 
											</div>
										</div>
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Enter New Password</label>
											<div class="col-sm-10">
												<input type="password" id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
											<div class="col-sm-10">
												<input id="password-confirm" type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirm Password">
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger">Reset Password</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.nav-tabs-custom -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection 
@section('pageScripts') 

@endsection
