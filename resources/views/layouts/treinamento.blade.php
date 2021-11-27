<!doctype html>
<html class="no-js" lang="pt-br">


<head>
    <meta charset="utf-8">
    <title>
        @section('title')
           Treinamentos | Tihub
        @show
    </title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/tihub.ico')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/layouts.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/wow/css/animate.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/wow/css/animate.css')}}"/>
    <!-- end of global styles-->
    @yield('css')
</head>




<body > <!--class="fixedMenu_header"> -->

<div>

                <!-- Content -->
                @yield('content')
                <!-- Content end -->


</div><!-- #wrap -->

<!-- global scripts-->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- end of global scripts-->




<!-- page level js -->
@yield('js')
<!-- end page level js -->
</body>
</html>