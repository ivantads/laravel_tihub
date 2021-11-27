@extends('layouts/treinamento')

{{-- Page title --}}
@section('title')
ADMIN
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="login-container  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
<div class="row">
<div class="col-lg-12 login_border_radius1 lockscreen_img">
<div id="output"></div>
<div class="avatar"></div>
</div>
<div class="col-lg-12 login_border_radius lockscreen_content">
<div class="form-box">
<form method="POST" name="screen">
<div class="form">
<p class="form-control-static">ENTRE COM SEU CNPJ</p>
<input type="text" name="user" class="form-control" placeholder="CNPJ">
<button class="btn btn-primary btn-block login" id="index_submit" type="submit">ACESSAR</button>
</div>
</form>
</div>
</div>
</div>
</div>
@stop

@section('css')
 <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/lockscreen.css')}}"/>	

 
 
@stop	

@section('js')	
<script type="text/javascript" src="{{asset('assets/vendors/wow/js/wow.min.js')}}"></script>
<script>
new WOW().init();
</script>

@stop
