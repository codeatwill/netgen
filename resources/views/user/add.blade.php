@extends('layouts.adminend.adminLayout') 
@section('dashboard')Users @endsection 
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
						<li class="breadcrumb-item active">Add User</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				
                <div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Add Users</h3>
						</div>
						<div class="row">
							<div class="col-md-12">
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
						<div class="col-md-2"></div>	
						<div class="col-md-8">	
							<div class="card-body">
								<form action="/admin/add/user" method="post" enctype="multipart/form-data" class="form-horizontal">
									{{ csrf_field() }}
									<div class="row form-group">
										<div class="col col-md-3"><label for="email-input" class=" form-control-label">User Email</label></div>
										<div class="col-12 col-md-9">
											<input type="email" id="email" value="{{ old('email') }}" name="email" placeholder="User Email" class="form-control">
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="email-input" class=" form-control-label">User Name</label></div>
										<div class="col-12 col-md-9">
											<input type="text" id="name" value="{{ old('name') }}" name="name" placeholder="User Name" class="form-control">
										</div>
									</div>
									
									<div class="row form-group">
										<div class="col col-md-3"><label for="email-input" class=" form-control-label">User Role</label></div>
										<div class="col-12 col-md-9">
											<select name="role_id" id="select" class="form-control">
												<option value="0">Select User Role</option>
												@foreach ($data['roles'] as $role)
													<option value="{{$role->id}}">{{$role->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
										<div class="col-12 col-md-9">
											<input type="password" id="password" value="{{ old('password') }}" name="password" placeholder="Enter Your Password" class="form-control">
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
										<div class="col-12 col-md-9">
											<input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Your Password" class="form-control">
										</div>
									</div>
									<div class="row form-group">
										<div class="col col-md-3"></div>
										<div class="col-12 col-md-9"><button type="submit" class="btn btn-success btn-sm">Create New User</button></div>
									</div>   
								</form>
							</div>
						</div>	
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- /.content-wrapper -->
@endsection 
@section('pageScripts') 
<script> 
	jQuery(document).ready(function($) {
    });
</script>
@endsection
