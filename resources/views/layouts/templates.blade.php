 <!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
  			<meta http-equiv="X-UA-Compatible" content="IE=edge">
  			<title>@yield('page-title')</title>
  			<!-- Tell the browser to be responsive to screen width -->
  			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  			@include('layouts.head')
  			@yield('page-css')
  		</head>
 		<body class="hold-transition skin-blue sidebar-mini">
			<div class="wrapper">
				<header class="main-header">
 					@include('layouts.header')
 				</header>
				<!-- Left side column. contains the logo and sidebar -->
				<aside class="main-sidebar">
					<!-- sidebar: style can be found in sidebar.less -->
					<section class="sidebar">
						@include('layouts.left')
					</section>
				</aside>
				<!-- /.sidebar -->
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					@yield('main-content') 						
				</div>
				<!-- /.content-wrapper -->
				@include('layouts.footer')
				@yield('page-js')
 			</div>
 		</body>
 	</html>