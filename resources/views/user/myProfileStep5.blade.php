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
								<li class="nav-item"><a class="nav-link " href="/my-profile/step-4">Portfolio</a></li>
								<li class="nav-item"><a class="nav-link active" href="/my-profile/step-5">Work Contracts</a></li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content1">
								<div class="tab-pane" id="timeline">
									<div class="timeline timeline-inverse">
										@foreach($data['user_contracts'] as $user_contract)
											<div class="time-label">
												<span class="bg-danger">
													@php
														$date = date_create($user_contract->created_at);
														$D = date_format($date,"d");
														$M = date_format($date,"M");
														$Y = date_format($date,"Y");
													@endphp
													{{ $D }} {{ $M }}. {{ $Y }}
												</span>
											</div>
											<div>
												<i class="fas fa-envelope bg-primary"></i>
												<div class="timeline-item">
													<span class="time"><i class="far fa-clock"></i> {{ time_elapsed_string($user_contract->created_at) }} days ago</span>
													<h3 class="timeline-header"><a href="#">{{ $user_contract->to_name }}</a> sent you a hire request.</h3>
													<div class="timeline-body">{{ $user_contract->msg }}</div>
													<div class="timeline-footer"></div>
												</div>
											</div>
										@endforeach
										<div>
											<i class="far fa-clock bg-gray"></i>
										</div>
										
									</div>
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
		
    });
</script>
@endsection
