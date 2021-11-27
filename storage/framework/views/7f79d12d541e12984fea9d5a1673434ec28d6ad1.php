<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title>Esqueceu sua Senha | TIHUB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/tihub.ico')); ?>"/>
     <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<!--Global styles -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>"/>
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/wow/css/animate.css')); ?>"/>
    <!--End of Plugin styles-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">	
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/login1.css')); ?>"/>
</head>
<body>
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
<div class="container wow slideInDown" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!--<div class="col-lg-4 col-sm-8 col-md-6 mx-auto forgotpwd_margin ">-->
				<div class="col-lg-5 col-md-8 col-sm-12 mx-auto forgotpwd_margin">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="<?php echo e(asset('assets/img/tihub.png')); ?>" alt="TIHUB" class="admire_logo"><span class="text-white"> TIHUB &nbsp;<br/>
                               Esqueceu a senha</span>
                        </h3>
                    </div>
					<form method="POST" action="<?php echo e(route('password.email')); ?>" id="login_validator1" class="form-group  login_validator">
					 <?php echo csrf_field(); ?>
                        <div class="bg-white login_content login_border_radius">
                            <div class="form-group">
                                <label for="email_modal"><?php echo e(__('E-Mail Address')); ?></label>
                                <div class="input-group">
                            <span class="input-group-addon addon_email"><i
                                    class="fa fa-envelope text-primary"></i></span>
                                    <!--<input type="text" class="form-control email_forgot form-control-md"
                                           id="email_modal" name="email_modal" placeholder="E-mail"> -->
										   
                                    <input id="email" type="email" class="form-control  email_forgot form-control-md <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="E-mail">										   
                                </div>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-primary submit_email login_button"><?php echo e(__('Send Password Reset Link')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- global js -->
<script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/index.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/wow/js/wow.min.js')); ?>"></script>
<!--End of plugin js-->
<script type="text/javascript" src="<?php echo e(asset('assets/js/pages/forgot_password.js')); ?>"></script>
</body>

</html><?php /**PATH /home/tihub/laravel/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>