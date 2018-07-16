<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SAT Bricks | Dashboard</title>
	<!-- ================== GOOGLE FONTS ==================-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<!-- ======================= GLOBAL VENDOR STYLES ========================-->
	<link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/metismenu/dist/metisMenu.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/switchery-npm/index.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
	<!-- ======================= LINE AWESOME ICONS ===========================-->
	<link rel="stylesheet" href="{{ asset('assets/css/icons/line-awesome.min.css') }}">
	<!-- ======================= DRIP ICONS ===================================-->
	<link rel="stylesheet" href="{{ asset('assets/css/icons/dripicons.min.css') }}">
	<!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
	<link rel="stylesheet" href="{{ asset('assets/css/icons/material-design-iconic-font.min.css') }}">
	<!-- ======================= PAGE VENDOR STYLES ===========================-->
	<link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap-next/jquery-jvectormap.css') }}">
	<!-- ======================= GLOBAL COMMON STYLES ============================-->
	<link rel="stylesheet" href="{{ asset('assets/css/common/main.bundle.css') }}">
	<!-- ======================= LAYOUT STYLES ===========================-->
	<link rel="stylesheet" href="{{ asset('assets/css/layouts/horizontal/core/main.css') }}">
	<!-- ======================= MENU TYPE ===========================-->
	<link rel="stylesheet" href="{{ asset('assets/css/layouts/horizontal/menu-type/auto-hide.css') }}">
	<!-- ======================= THEME COLOR STYLES ===========================-->
	<link rel="stylesheet" href="{{ asset('assets/css/layouts/horizontal/themes/theme-j.css') }}">
</head>


<body class="layout-horizontal menu-auto-hide">
	<!-- START APP WRAPPER -->
	<div id="app">
		<div class="header-wrapper">
			<div class="header-top">
				@include('admin.layout.common.navigation_top')
			</div>

			<div class="header-bottom">
				@include('admin.layout.common.navigation_bottom')
			</div>
		</div>


		<div class="content-wrapper">
			<div class="content container">
				<header class="page-header">
					@yield('breadcumb') 
				</header>

				<section class="page-content">   
					@yield('min_content')  
				</section>
			</div>
		</div>
	</div>
<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
	<script src="{{ asset('assets/vendor/modernizr/modernizr.custom.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/js-storage/js.storage.js') }}"></script>
	<script src="{{ asset('assets/vendor/js-cookie/src/js.cookie.js') }}"></script>
	<script src="{{ asset('assets/vendor/pace/pace.js') }}"></script>
	<script src="{{ asset('assets/vendor/metismenu/dist/metisMenu.js') }}"></script>
	<script src="{{ asset('assets/vendor/switchery-npm/index.js') }}"></script>
	<script src="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<!-- ================== PAGE LEVEL VENDOR SCRIPTS ==================-->
	<script src="{{ asset('assets/vendor/countup.js') }}/dist/countUp.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jvectormap-next/jquery-jvectormap-world-mill.js') }}"></script>
	<script src="{{ asset('assets/vendor/chartist/dist/chartist.js') }}"></script>
	<script src="{{ asset('assets/vendor/flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('assets/vendor/flot/jquery.flot.time.js') }}"></script>
	<script src="{{ asset('assets/vendor/flot.curvedlines/curvedLines.js') }}"></script>
	<!-- ================== GLOBAL APP SCRIPTS ==================-->
	<script src="{{ asset('assets/js/global/app.js') }}"></script>
	<!-- ================== PAGE LEVEL SCRIPTS ==================-->
	<script src="{{ asset('assets/js/cards/sessions-by-location.js') }}"></script>
	<script src="{{ asset('assets/js/components/countUp-init.js') }}"></script>
  	<script src="{{ asset('assets/js/cards/total-visits-chart.js') }}"></script>
  	<script src="{{ asset('assets/js/cards/total-unique-visits-chart.js') }}"></script>
	<script src="{{ asset('assets/js/cards/bar-chart-line-three.js') }}"></script>
  	<script src="{{ asset('assets/js/cards/traffic-sources.js') }}"></script>
		
	</body>
</html>

				