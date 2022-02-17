<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
			<i class="fas fa-user"></i>
			<span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
		</a>
	</li>

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
