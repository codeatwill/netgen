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
								<li class="nav-item"><a class="nav-link active" href="/my-profile/step-3">Work Experience</a></li>
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
											<label for="inputName" class="col-sm-4 col-form-label">Work Experience</label>
											<div class="col-sm-8">
												<button type="button" class="btn btn-success add-exp float-right">Add Experience</button>
											</div>
										</div>
										@foreach($data['user_exp'] as $key => $user_exp) 
											@php 
												$key++;
											@endphp
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">{{ $key }}. Company Name </label>
												<div class="col-sm-8">
												<input type="text" name="w_name_{{ $key }}" value="{{ $user_exp->name }}" class="form-control" placeholder="Company Name">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Position </label>
												<div class="col-sm-8">
												<input type="text" name="position_{{ $key }}" value="{{ $user_exp->position }}" class="form-control" placeholder="Position">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Duration </label>
												<div class="col-sm-8">
												<input type="text" name="duration_{{ $key }}" value="{{ $user_exp->duration }}" class="form-control" placeholder="Duration">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Work Description</label>
												<div class="col-sm-8">
													<textarea name="desc_{{ $key }}" class="form-control" rows="4">{{$user_exp->desc}}</textarea>
												</div>
											</div>
											<hr />
										@endforeach
										
										<div class="exp-div"></div>
										<hr />
										<div class="form-group row">
											<label for="inputName" class="col-sm-4 col-form-label">Education </label>
											<div class="col-sm-8">
												<button type="button" class="btn btn-success add-edu float-right">Add Education</button>
											</div>
										</div>
										@foreach($data['user_edu'] as $key1 => $user_edu) 
											@php 
												$key1++;
											@endphp
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">{{ $key1 }}. School/University </label>
												<div class="col-sm-8">
												<input type="text" name="e_name_{{ $key1 }}" value="{{ $user_edu->name }}" class="form-control" placeholder="Company Name">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Class </label>
												<div class="col-sm-8">
												<input type="text" name="position_{{ $key1 }}" value="{{ $user_edu->position }}" class="form-control" placeholder="Position">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Duration </label>
												<div class="col-sm-8">
												<input type="text" name="duration_{{ $key1 }}" value="{{ $user_edu->duration }}" class="form-control" placeholder="Duration">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Study Description</label>
												<div class="col-sm-8">
												<textarea name="desc_{{ $key1 }}" class="form-control" rows="4">{{$user_edu->desc}}</textarea>
												</div>
											</div>
											<hr />
										@endforeach
										
										<div class="edu-div"></div>
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
		var i = "{{ count($data['user_exp']) + 1 }}";
		if(i == 0){
			i = 1;
		}
		
        $(".add-exp").click(function(){
			html = '<div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">'+i+'. Company Name  </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="w_name_'+i+'" value="" class="form-control" placeholder="Company Name">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label"> Position </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="position_'+i+'" value="" class="form-control" placeholder="Position">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label"> Duration </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="duration_'+i+'" value="" class="form-control" placeholder="Duration">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">Work Description </label>';
			html += '<div class="col-sm-8">';
			html += '<textarea name="desc_'+i+'" class="form-control" rows="4"></textarea>';
			
			html += '</div></div> <hr />';
			$('.exp-div').append(html);
			i++;
		});
		
		var j = "{{ count($data['user_edu']) + 1 }}";
		if(j == 0){
			j = 1;
		}
		
        $(".add-edu").click(function(){
			html = '<div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">'+j+'. School/University  </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="e_name_'+j+'" value="" class="form-control" placeholder="Company Name">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label"> Class </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="position_'+j+'" value="" class="form-control" placeholder="Position">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label"> Duration </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="duration_'+j+'" value="" class="form-control" placeholder="Duration">';
			
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">Study Description </label>';
			html += '<div class="col-sm-8">';
			html += '<textarea name="desc_'+j+'" class="form-control" rows="4"></textarea>';
			
			html += '</div></div> <hr />';
			$('.edu-div').append(html);
			j++;
		});
    });
</script>
@endsection
