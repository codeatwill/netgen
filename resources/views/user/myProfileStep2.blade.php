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
								<li class="nav-item"><a class="nav-link active" href="/my-profile/step-2">Professional Skills</a></li>
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
											<label for="inputName" class="col-sm-4 col-form-label">Professional Skills </label>
											<div class="col-sm-8">
												<button type="button" class="btn btn-success add-skill float-right">Add Skill</button>
											</div>
										</div>
										@foreach($data['user_skills'] as $key => $user_skills) 
											@php 
												$key++;
											@endphp
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">{{ $key }}. Skill Name </label>
												<div class="col-sm-8">
												<input type="text" name="name_{{ $key }}" value="{{ $user_skills->name }}" class="form-control" placeholder="Skill Name">
												</div>
											</div>
											
											<div class="form-group row">
												<label for="inputName" class="col-sm-4 col-form-label">Experience Level [1 - 100]</label>
												<div class="col-sm-8">
												<input type="text" name="exp_rating_{{ $key }}" value="{{ $user_skills->exp_rating }}" class="form-control" placeholder="Experience Level [1 - 100]">
												</div>
											</div>
											<hr />
										@endforeach
										
										<div class="skill-div"></div>
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
		var i = "{{ count($data['user_skills']) + 1 }}";
		if(i == 0){
			i = 1;
			$('.save-div').hide();
		}else{
			$('.save-div').show();
		}
		
        $(".add-skill").click(function(){
			html = '<div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">'+i+'. Skill Name  </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="name_'+i+'" value="" class="form-control" placeholder="Skill Name">';
			html += '</div></div><div class="form-group row">';
			html += '<label for="inputName" class="col-sm-4 col-form-label">Experience Level [1 - 100] </label>';
			html += '<div class="col-sm-8">';
			html += '<input type="text" name="exp_rating_'+i+'" value="" class="form-control" placeholder="Experience Level [1 - 100]">';
			html += '</div></div> <hr />';
			$('.skill-div').append(html);
			$('.save-div').show();
			i++;
		});
    });
</script>
@endsection
