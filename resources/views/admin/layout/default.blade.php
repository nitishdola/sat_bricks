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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.10/css/bootstrap/zebra_datepicker.min.css">
	
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
	<!-- ======================= USER DEFINE STYLE ===========================-->
	<link rel="stylesheet" href="{{ asset('assets/css/common/mystyle.css') }}">

	@yield('pageCss')
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
					@if(Session::has('message'))
			        <div class="row">
			           <div class="col-lg-12">
			                 <div class="alert alert-class {{ Session::get('class') }}">
			                       <button type="button" class="close" data-dismiss="alert">×</button>
			                       {!! Session::get('message') !!}
			                 </div>
			              </div>
			        </div>
			        @endif  
					@yield('main_content')  
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
	<script src="{{ asset('assets/js/components/zebra_cal.js') }}" ></script>
	<script src="{{ asset('assets/js/components/jquery-1.7.1.min.js') }}" ></script>
	<script src="{{ asset('assets/js/cards/sessions-by-location.js') }}"></script>
	<script src="{{ asset('assets/js/components/countUp-init.js') }}"></script>
  	<script src="{{ asset('assets/js/cards/total-visits-chart.js') }}"></script>
  	<script src="{{ asset('assets/js/cards/total-unique-visits-chart.js') }}"></script>
	<script src="{{ asset('assets/js/cards/bar-chart-line-three.js') }}"></script>
  	<script src="{{ asset('assets/js/cards/traffic-sources.js') }}"></script>  
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.10/zebra_datepicker.min.js"></script>
  	<script>
  		$('.pick-a-date').Zebra_DatePicker({
		    format: 'd-m-Y'
		});
  	</script>
  	@yield('pageJs')
	</body>
</html>

				