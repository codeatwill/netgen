<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="/" class="nav-link">Home</a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				Hi, {{ \Auth::user()->name }} <i class="fas fa-th-large"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="/my-profile" class="dropdown-item">
					<i class="fas fa-user mr-2"></i> My Profile
				</a>
				<div class="dropdown-divider"></div>
				<a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
					<i class="fas fa-large mr-2"></i> Logout
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
		
	</ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="/home" class="brand-link">
		<img src="/dist//img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
		<span class="brand-text font-weight-light">Dashboard</span>
	</a>

	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="/admin/all/users" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Users</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>Reports</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
