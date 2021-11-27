<!doctype html>
<html class="no-js" lang="pt-br">


<head>
    <meta charset="utf-8">
    <title>
        <?php $__env->startSection('title'); ?>
            | Tihub
        <?php echo $__env->yieldSection(); ?>
    </title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/tihub.ico')); ?>"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/layouts.css')); ?>" />
	<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/skins/blue_black_skin.css')); ?>"/>
    <!-- end of global styles-->
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="fixedMenu_left fixedNav_position"> <!--class="fixedMenu_header"> -->
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
        <img src="<?php echo e(asset('assets/img/loader.gif')); ?>" style=" width: 40px;" alt="Carregando...">
    </div>
</div>
<div id="wrap" > <!--class="bg-dark"-->
    <div id="top" class="fixed">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand mr-0" href="/"> <!-- definir route pagina inicial -->
                    <h4 class="text-white"><img src="<?php echo e(asset('assets/img/tihub.png')); ?>" class="admin_img" alt="logo"> TIHUB ADMIN</h4>
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
                                <img src="<?php echo e(asset('assets/img/admin.jpg')); ?>" class="admin_img2 rounded-circle avatar-img" alt="avatar"> <strong><?php echo e(Auth::user()->name); ?></strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <div class="popover-header">Suporte TIHUB</div>
								
                                <a class="dropdown-item" href="edit_user.html"><i class="fa fa-cogs"></i>
                                    Configura&ccedil;&otilde;es</a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
                                     <i class="fa fa-power-off"></i>&nbsp;<?php echo e(__('Logout')); ?>

									</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
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
    <div class="wrapper fixedNav_top">
        <div id="left" class="fixed">
            <div class="menu_scroll">
			<div class="left_media">
                <div class="media user-media">
                    <div class="user-media-toggleHover">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="user-wrapper">
                        <a class="user-link" href="">
                            <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                                 alt="User Picture" src="<?php echo e(asset('assets/img/admin.jpg')); ?>">
                            <p class="text-blue user-info menu_hide"><?php echo e(Auth::user()->name); ?></p>
							
                        </a>
                    </div>
                </div>
				<hr/>
			</div>	
				<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				
		    	<!-- /#menu -->
            </div>
        </div>
            <!-- /#left -->
            <div id="content" class="bg-container"><!--fixed_header_menu_conainer fixed_header_menu_page-->
                <!-- Content -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- Content end -->
            </div> 
    </div><!-- /#wrapper  -->
</div><!-- #wrap -->

<!-- global scripts-->
<script type="text/javascript" src="<?php echo e(asset('assets/js/components.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')); ?>"></script>
<!-- end of global scripts-->
<script src="<?php echo e(asset('assets/js/pages/fixed_menu.js')); ?>"></script>
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
<?php echo $__env->yieldContent('js'); ?>
<!-- end page level js -->
</body>
</html><?php /**PATH /home/tihub/laravel/resources/views/layouts/default.blade.php ENDPATH**/ ?>