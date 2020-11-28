@extends('layouts.adminend.userLayout') 
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
								<li class="nav-item"><a class="nav-link " href="/my-profile">Basic Information</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-2">Professional Skills</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-3">Work Experience</a></li>
								<li class="nav-item"><a class="nav-link active" href="/my-profile/step-4">Portfolio</a></li>
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-5">Work Contracts</a></li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content1">
								<div class="tab-pane" id="settings1">
									<form class="form-horizontal" enctype="multipart/form-data" method="post" action="/user/update/user/{{$data['user']->id}}">
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
											<label for="inputName" class="col-sm-4 col-form-label">Portfolio</label>
											<div class="col-sm-8">
												<button type="button" class="btn btn-success add-port float-right">Add Portfolio</button>
											</div>
										</div>
										@foreach($data['user_portfolio'] as $key => $user_portfolio) 
											@php 
												$key++;
											@endphp
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">{{ $key }}. Project Name </label>
												<div class="col-sm-8">
												<input type="text" name="p_name_{{ $key }}" value="{{ $user_portfolio->name }}" class="form-control" placeholder="Company Name">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Project Description</label>
												<div class="col-sm-8">
													<textarea name="desc_{{ $key }}" class="form-control" rows="4">{{ $user_portfolio->desc }}</textarea>
												</div>
											</div>
											
											<div class="form-group row">
												@if($user_portfolio->image != null)
												<div class="col-sm-12">
													<img src="/images/portfolio/{{ $user_portfolio->image }}" height="200px" width="200px">
												</div>
												@endif
												<label for="inputName" class="col-sm-4 col-form-label">Upload Images </label>
												<div class="col-sm-8">
													<div class="custom-file">
														<input type="file" name="image_{{ $key }}" class="form-control" id="exampleInputFile">
														<label class="custom-file-label" for="exampleInputFile">Choose file</label>
													</div>
												</div>
											</div>
											<hr />
										@endforeach
										
										<div class="port-div"></div>
																				
										<div class="form-group row save-div">
											<div class="col-sm-12">
												<button type="submit" class="btn btn-danger">Save</button>
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
<script> 
	$(document).ready(function() {
		var i = "{{ count($data['user_portfolio']) + 1 }}";
		if(i == 0){
			i = 1;
			$('.save-div').hide();
		}else{
			$('.save-div').show();
		}
		
        $(".add-port").click(function(){
			html = '<div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">'+i+'. Project Name  </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="p_name_'+i+'" value="" class="form-control" placeholder="Project Name">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">Project Description </label>';
			html += '<div class="col-sm-8">';
			html += '<textarea name="desc_'+i+'" class="form-control" rows="4"></textarea>';
			
			html += '</div></div><div class="form-group row">';
			
			html += '<label for="inputName" class="col-sm-4 col-form-label"> Upload Images </label>';
			html += '<div class="col-sm-8"><div class="custom-file">';
			html += '<input type="file" name="image_'+i+'" class="form-control" id="exampleInputFile">';
			
			html += '</div></div></div> <hr />';
			$('.port-div').append(html);
			$('.save-div').show();
			i++;
		});
    });
</script>
@endsection
