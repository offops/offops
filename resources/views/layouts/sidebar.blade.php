
<header class="logo-env">

	<!-- logo -->
	<div class="logo">
		<a href="index.html">
			<img src="/assets/images/logo@2x.png" width="170" alt="{{ workspace('name') }}">
		</a>
	</div>

	<!-- logo collapse icon -->
	<div class="sidebar-collapse">
		<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
			<i class="entypo-menu"></i>
		</a>
	</div>

					
	<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
	<div class="sidebar-mobile-menu visible-xs">
		<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
			<i class="entypo-menu"></i>
		</a>
	</div>

</header>

<ul id="main-menu" class="main-menu">

	{{-- Dashboard --}}
	<li>
		<a href="/">
			<i class="fa fa-home"></i>
			<span class="title">Dashboard</span>
		</a>
	</li>

	{{-- Contracts --}}
	<li>
		<a href="/contracts">
			<i class="fa fa-file-text"></i>
			<span class="title">Contracts</span>
		</a>
		<ul>
			<li>
				<a href="/contracts">
					<span class="title">List Contracts</span>
				</a>
			</li>
			<li>
				<a href="/contracts/create">
					<span class="title">New Contract</span>
				</a>
			</li>
		</ul>
	</li>

	{{-- Events --}}
	<li>
		<a href="/events">
			<i class="fa fa-calendar"></i>
			<span class="title">Calendar</span>
		</a>
	</li>

	{{-- Payments --}}
	<li>
		<a href="/payments">
			<i class="fa fa-usd"></i>
			<span class="title">Payments</span>
		</a>
	</li>

	{{-- Companies --}}
	<li>
		<a href="/companies">
			<i class="fa fa-rocket"></i>
			<span class="title">Companies</span>
		</a>
		<ul>
			<li>
				<a href="/companies">
					<span class="title">List Companies</span>
				</a>
			</li>
			<li>
				<a href="/companies/create">
					<span class="title">New Company</span>
				</a>
			</li>
		</ul>
	</li>

	{{-- Users --}}
	<li>
		<a href="/users">
			<i class="fa fa-users"></i>
			<span class="title">Users</span>
		</a>
		<ul>
			<li>
				<a href="/users">
					<span class="title">List Users</span>
				</a>
			</li>
			<li>
				<a href="/users/create">
					<span class="title">New User</span>
				</a>
			</li>
		</ul>
	</li>
</ul>

