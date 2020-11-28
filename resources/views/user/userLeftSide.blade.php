<!-- Profile Image -->
<div class="card card-primary card-outline">
	<div class="card-body box-profile">
		<div class="text-center">
			<img class="profile-user-img img-fluid img-circle" src="/dist/img/user4-128x128.jpg" alt="User profile picture">
		</div>

		<h3 class="profile-username text-center">{{$data['user']->name}}</h3>
		<p class="text-muted text-center">{{$data['user']->email}}</p>

		<ul class="list-group list-group-unbordered mb-3">
			<li class="list-group-item">
				<b>Role</b> <a class="float-right"><span class="badge badge-danger">{{$data['user']->role->name}}</span></a>
			</li>
			<li class="list-group-item">
				<b>User Since</b> <a class="float-right"><span class="badge badge-danger">{{$data['user']->created_at}}</span></a>
			</li>
			<li class="list-group-item">
				<p><b>User Status</b></p>
				@if($data['user']->is_blocked == 0)
					<span class="badge badge-success">User Active</span>
				@else
					<span class="badge badge-danger">User Blocked</span>
				@endif
				@if($data['user']->is_approved == 1)
					<span class="badge badge-success">User Verified</span>
				@else
					<span class="badge badge-danger">User Not Verified</span>
				@endif
			</li>
			<li class="list-group-item">
				@if($data['user']->role_id == 10)
					<a class="btn btn-primary float-left" href="/admin/change/user-password/{{$data['user']->id}}">Change Password</a>
				@else
					<a class="btn btn-primary float-left" href="/reset/user-password">Change Password</a>
				@endif
				<a class="btn btn-success float-right"target="_blank" href="/{{$data['user']->username}}">View Profile</a>
			</li>
		</ul>
	</div>
</div>
<!-- /.Profile Image -->
