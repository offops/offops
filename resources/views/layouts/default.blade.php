<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Neon | Forms</title>

	<link rel="stylesheet" href="/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/neon-core.css">
	<link rel="stylesheet" href="/assets/css/neon-theme.css">
	<link rel="stylesheet" href="/assets/css/neon-forms.css">
	<link rel="stylesheet" href="/assets/css/custom.css">

	<script src="/assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">

	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		
		<div class="sidebar-menu">

			<div class="sidebar-menu-inner">
				@include('layouts.sidebar')
			</div>

		</div>

		<div class="main-content">
			
			<div class="row">
				@include('layouts.topnav')
			</div>
			
			<hr />
			
			<ol class="breadcrumb bc-3" >
				@yield('breadcrumbs', '<li><a href="/"><i class="fa-home"></i>Home</a></li>')
			</ol>

			@yield('content')

			<!-- Footer -->
			<footer class="main hide">
				
				&copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
				
			</footer>
		</div>

	</div>


	<!-- Bottom scripts (common) -->
	<script src="/assets/js/gsap/main-gsap.js"></script>
	<script src="/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="/assets/js/bootstrap.js"></script>
	<script src="/assets/js/joinable.js"></script>
	<script src="/assets/js/resizeable.js"></script>
	<script src="/assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="/assets/js/bootstrap-switch.min.js"></script>
	<script src="/assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="/assets/js/neon-demo.js"></script>

	@yield('tail')

</body>
</html>