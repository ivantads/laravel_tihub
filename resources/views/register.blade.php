<!DOCTYPE html>
<html>
<head>
    <title>Register | Admire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
    <!-- Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/wow/css/animate.css')}}"/>
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login.css')}}"/>
    <!--End of Page level styles-->
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
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="row login_top_bottom">
        <div class="col-lg-10 push-lg-1 col-sm-10 push-sm-1">
            <div class="row">
                <div class="col-lg-6 push-lg-3 col-sm-10 push-sm-1">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="{{asset('assets/img/logow.png')}}" alt="josh logo" class="admire_logo"><span class="text-white"> ADMIRE<br/>
                                Sign Up</span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form class="form-horizontal login_validator m-b-20" id="register_valid"
                              action="{{URL::to('login')}}" >
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="username" class="col-form-label">Username *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                        <input type="text" class="form-control" name="UserName" id="username" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="email" class="col-form-label">Email *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope text-primary"></i>
                                    </span>
                                        <input type="text" placeholder="Email Address"  name="email" id="email" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="password" class="col-form-label text-sm-right">Password *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key text-primary"></i>
                                    </span>
                                        <input type="password" placeholder="Password"  id="password" name="password" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="confirmpassword" class="col-form-label">Confirm Password *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key text-primary"></i>
                                    </span>
                                        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="phone" class="col-form-label">Phone *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone text-primary"></i>
                                    </span>
                                        <input type="text" id="phone" placeholder="Phone Number" name="phone" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label">Gender</label>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="radio" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Male</a>
                                    </label>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="radio" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Female</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Send me latest news and updates.</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="submit" value="Submit" class="btn btn-primary"/>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <label class="col-form-label">Already have an account?</label> <a href="login" class="text-primary login_hover"><b>Log In</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="{{asset('assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/wow/js/wow.min.js')}}"></script>
<!--End of plugin js-->
<!--Page level js-->
<script type="text/javascript" src="{{asset('assets/js/pages/register.js')}}"></script>
<!-- end of page level js -->
</body>

</html>