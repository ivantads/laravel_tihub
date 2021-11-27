<!doctype html>
<html class="no-js" lang="pt-br">


<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171410752-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-171410752-1');
    </script>	
    <meta charset="utf-8">
	<meta name="robots" content="index, follow">
	<meta name="robot" content="All">
	<meta name="rating" content="general">
	<meta name="distribution" content="global">
	<meta name="language" content="pt-br">
	<meta name="author" content="Rodrigo Deniel">
    <title>
        @section('title')
        @show
    </title>
	<meta data-react-helmet="true" name="description" content="Melhore a gestão de sua farmácia! O InovaFarma é um sistema completo para farmácias e drogarias, planejado para organizar e agilizar os processos de sua empresa">
	<meta data-react-helmet="true" name="abstract" content="Melhore a gestão de sua farmácia! O InovaFarma é um sistema completo para farmácias e drogarias, planejado para organizar e agilizar os processos de sua empresa">
    <meta data-react-helmet="true" name="keywords" content="inovafarma, software de farmacia, programa de farmacia, sistema para farmacia, plataforma de farmacia, gestão de farmacia, programa, software, plataforma, farmacia popuplar, sngpc, anvisa, farmacia, nf-e, nfc-e, blog farmacia, gestão, drogaria, pbm, simplificar processos, relatórios gerenciais, legislações farmacia, atendimento farmacia, integração com multi lojas, plataforma completa para gestão e automatização de farmacias, automatização de farmacias,  software para manipulação, software farmacia, portal drogaria, consulta remedio, bulla, imendes, guia da farmacia, ABCFarma, Santa Cruz, Profarma, Panpharma, Vision, Destro, Bio Distribuidora, Anb Farma, Dimebras, Martins, Dalazen, Dispar, Werbran, Genesio Mendes, KFG Comercio, Ciamed, Medicamento, Drogacenter, Raia, Nissei, Linx, Softpharma, Big Sistemas, Trier, Smartphar, VSM, SysFar, Pharma Dream, Remedio, Antibiótico, Psicotrópico, histórico de medicamentos, medicamentos usuais, classificação psicotrópica, substância, fórmula medicamento, Pbms, Convênios, software house">	
	<meta data-react-helmet="true" property="og:title" content="home">
	<meta data-react-helmet="true" property="og:description" content="Melhore a gestão de sua farmácia! O InovaFarma é um sistema completo para farmácias e drogarias, planejado para organizar e agilizar os processos de sua empresa">
	<meta data-react-helmet="true" property="og:image" content="https://www.inovafarma.com.br/assets/img/seo/og-logo.png">
	<meta data-react-helmet="true" property="og:type" content="website">
	<meta data-react-helmet="true" name="twitter:card" content="summary_large_image">
	<meta data-react-helmet="true" name="twitter:image:src" content="https://www.inovafarma.com.br/assets/img/seo/og-logo.png">
	<meta data-react-helmet="true" name="twitter:creator" content="@insanydesign">
	<meta data-react-helmet="true" name="twitter:title" content="home">
	<meta data-react-helmet="true" name="twitter:description" content="Melhore a gestão de sua farmácia! O InovaFarma é um sistema completo para farmácias e drogarias, planejado para organizar e agilizar os processos de sua empresa">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
	<meta name="google-site-verification" content="FiJYpH4Mmqragtvxuz6bSVTMH5feAZIkxDtc6LFrVeE" />

	
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('suporte/assets/img/tihub.ico')}}"/>
	<link rel="apple-touch-icon" href="{{asset('suporte/assets/img/tihub.png')}}"/>
    <!-- Google font (font-family: 'Lato', Raleway, sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700,800" rel="stylesheet">
    <!-- Stylesheets -->
    <link type="text/css" rel="stylesheet" href="{{asset('suporte/assets/css/bootstrap.min.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('suporte/assets/css/font-awesome.min.css')}}"/>
    <!-- end of styles-->
    @yield('css')
</head>
<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Wrapper -->
    <div id="wrapper" class="wrapper">
        <!-- Header -->
        <div class="header sticky-header">
            <!-- Header Top Area -->
            <div class="header-middle-area bg-white">
                <div class="container">
                    <div class="header-top-inner">
                        <ul class="header-support-info">
                            
                            <li><span class="icon"><i class="fa fa-envelope-o"></i></span> E-mail: <a href="mailto:contato@tihub.com.br">contato@tihub.com.br</a></li>
                        </ul>
                        <ul class="header-social">
                            <li><span><i></i></span>Precisando de ajuda? Escolha um de nossos canais de suporte:</li>
							<li><a href="https://www.facebook.com/tihub.bot/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://web.telegram.org/#/im?p=@Tihubot" target="_blank"><i class="fa fa-telegram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--// Header Top Area -->
        </div>
        <!--// Header -->
		
		 @yield('content')

        <!-- Footer -->
        <div class="footer">
            <!-- Footer Top Area -->
            <div class="footer-top-area bg-theme">	
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="footer-social-icons">
                                <li><h4>Acesse agora nossos canais oficiais:</h4></li>							
                                <li><a href="https://www.facebook.com/tihub.bot/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://web.telegram.org/#/im?p=@Tihubot" target="_blank"><i class="fa fa-telegram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCkMlMaX65X_tMDHR8luXagQ" target="_blank"><i class="fa  fa-youtube-play"></i></a></li>
								

                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <form class="footer-newsletter-form" id="formNewsletter" enctype="multipart/form-data">
                                <h4>Novidades</h4>
                                {!! Form::email('EmailN','',['class' => 'form-control', 'id' => 'EmailN','placeholder' => 'Seu email...','required' => 'required','onkeyup' => 'lower(this)']) !!}
								<span class="errors">{{ $errors->first('EmailN') }}</span>
                                <input type="submit" value="Inscreva-se!">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Footer Top Area -->

            <!-- Footer Bottom Area -->
            <div class="footer-bottom-area bg-dark-light section-padding-sm">
                <div class="container">
                    <div class="row widgets footer-widgets">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-widget widget-about">
                                <h5 class="widget-title">Sobre a TIHUB</h5>
                                <img src="suporte/assets/img/TIHUBLOGO.png" alt="about widget image">
                                <p>A TIHUB é uma empresa... </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-widget widget-contact">
                                <h5 class="widget-title">Contato</h5>
                                <ul>
                                    <li class="address">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        <p>Endere&ccedil;o : Av. Brasil, 11793 - Santa Cruz, Cascavel PR.</p>
                                    </li>
                                   
                                    <li class="email">
                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                        <p><a href="mailto:contato@tihub.com.br">contato@tihub.com.br</a></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-widget widget-quick-links widget-about">
                                <h5 class="widget-title">Sobre o INOVAFARMA</h5>
                                <ul>
                                    <li><a href="https://www.inovafarma.com.br/sobre/">Quem Somos</a></li>
                                    <li><a href="https://universidade.inovafarma.com.br/">Universidade</a></li>
                                    <li><a href="https://www.inovafarma.com.br/blog/">Blog</a></li>
									<li><p>PRECIS&Atilde;O SISTEMAS | 02.433.981/0001-96</p></li>
                                </ul>
                            </div>
                        </div>

                    </div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.385979608374!2d-53.5067321708892!3d-24.952979220333653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3d133c750e6d1%3A0xc78633ddb0af8c0f!2sAv.%20Brasil%2C%2011793%20-%20Santa%20Cruz%2C%20Cascavel%20-%20PR%2C%2085806-070!5e0!3m2!1spt-BR!2sbr!4v1593605264013!5m2!1spt-BR!2sbr" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <!--// Footer Bottom Area -->

            <!-- Footer Copyright Area -->
            <div class="footer-copyright-area bg-dark">
                <div class="container">
                    <div class="footer-copyright text-center">
                        <p>Copyright © <a href="javascript:void(0)">TIHUB</a>. Todos os direitos reservados</p>
                    </div>
                </div>
            </div>
            <!--// Footer Copyright Area -->

        </div>
        <!--// Footer -->

    </div>
    <!--// Wrapper -->	
	
  <!-- JS Files -->
  <script type="text/javascript" src="{{asset('suporte/assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('suporte/assets/js/popper.js')}}"></script>
  <script type="text/javascript" src="{{asset('suporte/assets/js/bootstrap.min.js')}}"></script>
  @yield('js')
</body>

</html>
