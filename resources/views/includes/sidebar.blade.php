<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-text mx-3">HOURS 99</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="index.html">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Interface
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
			aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Components</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Components:</h6>
				<a class="collapse-item" href="buttons.html">Buttons</a>
				<a class="collapse-item" href="cards.html">Cards</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="{{ route('logout') }}">
			<i class="fas fa-sign-out-alt"></i>
			<span>Log out</span>
		</a>
	</li>

	{{-- <!-- Sidebar Message -->
	<div class="sidebar-card d-none d-lg-flex">
		<img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
		<p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
		<a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
	</div> --}}

</ul>
<!-- End of Sidebar -->