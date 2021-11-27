<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Sistema Interno TIHUB | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('assets/img/tihub.ico')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/wow/css/animate.css')}}"/>
    <!--End of Plugin styles-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">	
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login1.css')}}"/>
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
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="Carregando...">
    </div>
</div>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 login_top_bottom">
            <div class="row">
				<div class="col-lg-5  col-md-8  col-sm-12 mx-auto">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="{{asset('assets/img/tihub.png')}}" alt="TIHUB" class="admire_logo"><span class="text-white"> TIHUB &nbsp;<br/>
                                Log In</span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form action="{{ route('login') }}" method="POST" id="login_validator"  class="login_validator">
						 @csrf
                            <div class="form-group">
                                <!--<label for="email" class="col-form-label"> E-mail</label>-->
								<label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                                class="fa fa-envelope text-primary"></i></span>
                                    <!--<input type="text" class="form-control  form-control-md" id="email" name="username" placeholder="E-mail">-->
									<input type="email" class="form-control form-control-md @error('email') is-invalid @enderror" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="password" class="col-form-label">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                                class="fa fa-lock text-primary"></i></span>
                                    <!--<input type="password" class="form-control form-control-md" id="password" name="password" placeholder="Senha"> -->
									<input type="password" class="form-control form-control-md @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Senha">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror									
                                </div>
                            </div>
                            <!--<<div class="form-group">
                                <div class="row" style="background-image: url('http://suporte.tihub.com.br/assets/img/notrobot.png');height:180px; padding:60px 0;" >
									<div class="g-recaptcha" data-theme="dark" data-callback="enableBtn" data-sitekey="6LeXbawaAAAAAAE9eKNN36bpRicnARE3GkMVwCb9"></div>								
                                </div>
                            </div>	-->							
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--<input type="submit" value="Log In" class="btn btn-primary btn-block login_button">-->
                                        <button type="submit" class="btn btn-primary btn-block login_button"  disabled="disabled" id="entry" value="Log In" >
                                            {{ __('Login') }}
                                        </button>										
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description"> {{ __('Remember Me') }}</a>
                                    </label>
                                </div>
                                <div class="col-6 text-right forgot_pwd">
                                    <!--<a href="{{URL::to('forgot_password')}}" class="custom-control-description forgottxt_clr">Esqueceu a senha?</a>-->
								
                                @if (Route::has('password.request'))
                                    <a class="custom-control-description forgottxt_clr" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif									
										
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/wow/js/wow.min.js')}}"></script>
<!--End of plugin js-->
<script type="text/javascript" src="{{asset('assets/js/pages/login1.js')}}"></script>
<script>
 function enableBtn(){
   document.getElementById("entry").disabled = false;
 }
</script>
</body>

</html>