<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            | Tihub
        @show
    </title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/tihub.ico')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/layouts.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('assets/css/skins/blue_black_skin.css')}}"/>
    <!-- end of global styles-->
    @yield('css')
</head>

<body class="fixedMenu_header">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="Carregando...">
    </div>
</div>
<div id="wrap" > <!--class="bg-dark"-->
    <div id="top" class="fixed">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand mr-0" href="index"> <!-- definir route pagina inicial -->
                    <h4 class="text-white"><img src="{{asset('assets/img/tihub.png')}}" class="admin_img" alt="logo"> TIHUB ADMIN</h4>
                </a>
                <div class="menu mr-sm-auto">
                        <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars text-white"></i>
                    </span>
                </div>
                <div class="navbar-toggleable-sm m-lg-auto d-none d-lg-flex top_menu">
                    <ul class="nav navbar-nav flex-row top_menubar">
						<li class="nav-item">
				          <button type="button" class="btn btn-block btn-danger" onclick="copyToClipboard('#resultado')">
				              <body onload="time()"></body>
				              <div id="resultado"></div>
				          </button>						
						</li>	
                    </ul>
                </div>
                <div class="topnav dropdown-menu-right ml-auto" id="nav-content" >
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{asset('assets/img/admin.jpg')}}" class="admin_img2 rounded-circle avatar-img" alt="avatar"> <strong>{{ Auth::user()->name }}</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <div class="popover-header">Suporte TIHUB</div>
                                <a class="dropdown-item" href="edit_user.html"><i class="fa fa-cogs"></i>
                                    Configura&ccedil;&otilde;es</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                     <i class="fa fa-power-off"></i>&nbsp;{{ __('Logout') }}
									</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
		</nav>
        <!-- /.navbar -->
        <!-- /.head -->
	</div>
    <!-- /#top -->
    <div class="wrapper">
        <div id="left">
            <div class="menu_scroll">
			<div class="left_media">
                <div class="media user-media">
                    <div class="user-media-toggleHover">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="user-wrapper">
                        <a class="user-link" href="">
                            <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                                 alt="User Picture" src="{{asset('assets/img/admin.jpg')}}">
                            <p class="text-blue user-info menu_hide">{{ Auth::user()->name }}</p>
							
                        </a>
                    </div>
                </div>
				<hr/>
			</div>	
				
		    	<!-- #menu -->
                    <ul id="menu" ><!--class="bg-blue dker"-->
                        <li {!! (Request::is('index')? 'class="active"':'') !!}>
                            <a href="{{ URL::to('index') }} ">
                                <i class="fa fa-home"></i>
                                <span class="link-title menu_hide">&nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li {!! (Request::is('index1')? 'class="active"':"") !!}>
                            <a href="{{ URL::to('cadastros/empresas') }} ">
                                <i class="fa fa-building"></i>
                                <span class="link-title menu_hide">&nbsp;Empresas</span>
                            </a>
                        </li>					
                        <li {!! (Request::is('index2')? 'class="active"':"") !!}>
                            <a href="{{ URL::to('index') }} ">
                                <i class="fa fa-tasks"></i>
                                <span class="link-title menu_hide">&nbsp;Projetos</span>
                            </a>
                        </li>
                        <li {!! (Request::is('index4')? 'class="active"':"") !!}>
                            <a href="{{ URL::to('index3') }} ">
                                <i class="fa fa-calendar"></i>
                                <span class="link-title menu_hide">&nbsp;Calend&aacute;rio</span>
                            </a>
                        </li>
                        <li {!! (Request::is('versoesinovafarma')|| Request::is('aplicativos') ? 'class="dropdown_menu"' : 'class="dropdown_menu"') !!}>
                            <a href="javascript:;">
                                <i class="fa fa-download"></i>
                                <span class="link-title menu_hide">&nbsp; Downloads</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li {!! (Request::is('versoesinovafarma') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('versoesinovafarma') }}">
                                        <i class="fa fa-heartbeat"></i>
                                        &nbsp; Vers&otilde;es Inovafarma
                                    </a>
                                </li>
                                <li {!! (Request::is('aplicativos') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('aplicativos') }}">
                                        <i class="fa fa-database"></i>
                                        &nbsp; Aplicativos
                                    </a>
                                </li>								
							</ul>
						</li>
                        <li {!! (Request::is('contratos') ? 'class="active"' : '') !!}>
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span class="link-title  menu_hide">&nbsp; Configura&ccedil;&otilde;es</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li {!! (Request::is('contratos') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('contratos') }}">
                                        <i class="fa fa-edit"></i>
                                        &nbsp; Contratos
                                    </a>
                                </li>
							</ul>
						</li>
                        <li {!! (Request::is('chamados')|| Request::is('erroversoes') ? 'class="active"' : '') !!}>
                            <a href="javascript:;">
                                <i class="fa fa-anchor"></i>
                                <span class="link-title  menu_hide">&nbsp; Inovafarma</span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li {!! (Request::is('chamados') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('chamados') }}">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Chamados
                                    </a>
                                </li>
                                <li {!! (Request::is('inovafarma/erroversoes') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('inovafarma/erroversoes') }}">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Erros de Vers&otilde;es
                                    </a>
                                </li>
                                <li {!! (Request::is('inovafarma/scripts') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('inovafarma/scripts') }}">
                                        <i class="fa fa-angle-right"></i>
                                        &nbsp; Scripts
                                    </a>
                                </li>								
							</ul>
						</li>
                        <li {!! (Request::is('index4')? 'class="active"':"") !!}>
                            <a href="{{ URL::to('index4') }} ">
                                <i class="fa fa-link"></i>
                                <span class="link-title  menu_hide">&nbsp;Links Diversos</span>
                            </a>
                        </li>						
					</ul>
                <!-- /#menu -->	
				
		    	<!-- /#menu -->
            </div>
        </div>
            <!-- /#left -->
            <div id="content" class="bg-container"><!--fixed_header_menu_conainer fixed_header_menu_page-->
                <!-- Content -->
                @yield('content')
                <!-- Content end -->
            </div> 
    </div><!-- /#wrapper  -->
	<!--@include('layouts.right_sidebar') -->
</div><!-- #wrap -->

<!-- global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!-- end of global scripts-->
<script src="{{asset('assets/js/pages/fixed_menu.js')}}"></script>
<script>
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    };
  function time() {
    base = new Date();
    s = base.getDay();
    d = base.getDate();
    m = base.getMonth();
    a = base.getFullYear();

    diasemana = s + 1
    mes = m + 1
    soma1 = d * mes * a * diasemana
    document.getElementById('resultado').innerHTML = soma1;
  };
</script>
<!-- page level js -->
@yield('js')
<!-- end page level js -->
</body>
</html>