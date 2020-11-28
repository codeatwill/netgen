
@extends('layouts.adminend.adminLayout')
@section('title')User Profile @endsection 
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Profile</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User Profile</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

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
								<li class="nav-item"><a class="nav-link active" href="/my-profile">Basic Information</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-2">Professional Skills</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-3">Work Experience</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-4">Portfolio</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-5">Work Contracts</a></li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content1">
								<div class="tab-pane" id="settings1">
									<form class="form-horizontal" method="post" action="/user/update/user/{{$data['user']->id}}">
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
											<label for="inputName" class="col-sm-4 col-form-label">Basic Information </label>
										</div>
										<div class="form-group row">
											<label for="inputName" class="col-sm-4 col-form-label">Name</label>
											<div class="col-sm-8">
												<input type="text" name="name" value="{{$data['user']->name}}" class="form-control" id="inputName" placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Position</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="pos" value="{{$data['user']->position}}" id="inputPosition" placeholder="Position">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Website</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="web" value="{{$data['user']->website}}" id="inputWebsite" placeholder="Website">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
											<div class="col-sm-8">
												<input type="email" value="{{$data['user']->email}}" name="email" class="form-control" id="inputEmail" placeholder="Email">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Phone</label>
											<div class="col-sm-8">
												<input type="number" class="form-control" name="phone" value="{{$data['user']->phone}}" id="inputPhone" placeholder="Phone Number">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">DOB</label>
											<div class="col-sm-8">
												<input type="date" class="form-control" name="dob" value="{{$data['user']->dob}}" id="inputDob" placeholder="DOB">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Language</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="language" value="{{$data['user']->language}}" id="inputLanguage" placeholder="Language">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Address</label>
											<div class="col-sm-8">
												<input type="test" class="form-control" name="address" value="{{$data['user']->address}}" id="inputAddress" placeholder="Address">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Change Template</label>
											<div class="col-sm-8">
												<select name="template_id" class="form-control custom-select">
													<option value="1" >Select Template</option>
													@foreach($data['templates'] as $templates)
														<option value="{{ $templates->id }}" {{ $templates->id == $data['user']->template_id ? 'selected' : '' }} > {{ $templates->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Career Objective</label>
											<div class="col-sm-8">
												<textarea id="inputObj" name="obj" class="form-control" rows="4">{{$data['user']->obj}}</textarea>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="inputPhone" class="col-sm-4 col-form-label">Description / About You</label>
											<div class="col-sm-8">
												<textarea id="inputDescription" name="desc" class="form-control" rows="10">{{$data['user']->desc}}</textarea>
											</div>
										</div>
										
										
										<hr />
										<div class="form-group row">
											<div class="col-sm-12">
												<button type="submit" class="btn btn-danger">Save Profile</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection 
@section('pageScripts') 
<link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
<script> 
	$(document).ready(function() {
        
    });
</script>
@endsection
