<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAT Login | @yield('loginFor') </title>
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
    <div class="container">
        @yield('main_content')
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
    <!-- ================== GLOBAL APP SCRIPTS ==================-->
    <script src="{{ asset('assets/js/global/app.js') }}"></script>
</body>
</html>
