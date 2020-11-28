@extends('layouts.adminend.adminLayout') 
@section('dashboard')All Users @endsection 
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
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
                <div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">All Users</h3>
							<div class="card-tools">
								<a type="button" href="/admin/add/user" class="btn btn-danger">Add Users</a>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="allUsers" class="table table-striped">
							<thead>
								<tr>
									<th class="serial">#ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Roles</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
						</div>
						<!-- /.card-body -->
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
	jQuery(document).ready(function($) {
        $('#allUsers').DataTable({
            language: {
                search: '',
                searchPlaceholder: "Search..."
            },
            "pageLength": 50,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "GET",
                "url": '/admin/users/datatable',
            },
            "columns": [
				{ data: 'id', id: 'id' },
				{ data: 'name', name: 'phone' },
				{ data: 'email', email: 'email' },
				{ data: 'phone', phone: 'phone' }, 
				{ data: 'role', role: 'role' }, 
				{ data: 'status', status: 'status' }, 
				{ data: 'action', action: 'action', searchable: false, orderable: false }
			]
        });
        $('#allUsers_filter input').addClass('form-control');
    });
</script>
@endsection
