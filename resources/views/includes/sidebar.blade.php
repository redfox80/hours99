<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
		<div class="sidebar-brand-text mx-3">HOURS 99</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item {{ Request::is('home') ? 'active':'' }}">
		<a class="nav-link" href="{{ route('home') }}">
			<i class="fas fa-home"></i>
			<span>Home</span>
		</a>
	</li>

    <li class="nav-item {{ Request::is('hours') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('hours') }}">
            <i class="fas fa-clock"></i>
            <span>Hours</span>
        </a>
    </li>

	<li class="nav-item {{ Request::is('settings*') ? 'active':'' }}">
		<a class="nav-link" href="{{ route('settings') }}">
			<i class="fas fa-cog"></i>
			<span>Settings</span>
		</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="{{ route('logout') }}">
			<i class="fas fa-sign-out-alt"></i>
			<span>Log out</span>
		</a>
	</li>

	<!-- Sidebar Message -->
	<div class="sidebar-card d-none d-lg-flex">
		<p class="text-center mb-2">Logged in as: <strong>{{Auth::user()->firstname . " " . Auth::user()->lastname}}</strong></p>
	</div>

</ul>
<!-- End of Sidebar -->
