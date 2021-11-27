@extends('layouts/site')

{{-- Page title --}}
@section('title')
    TIHUB | INOVAFARMA - Software para farmácia e drogarias
    @parent
@stop

{{-- Page content --}}
@section('content')
        <!-- Page Content -->
        <main id="page-content">
            <!-- Why Choose Area -->
            <div class="bk-section why-choose-area bg-image-1 section-padding-lg" data-white-overlay="5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-8 col-sm-10 col-12">
                            <div class="section-title">
                                <h1><span>CONHE&Ccedil;A O </span>INOVAFARMA</h1>
                                <p>R&aacute;pido de aprender e f&aacute;cil de usar! O modelo de implementa&ccedil;&atilde;o INOVAFARMA garante uma melhor experi&ecirc;ncia na instala&ccedil;&atilde;o, configura&ccedil;&atilde;o e treinamento da sua equipe com o sistema.</p>
                            </div>
                        </div>
                    </div>
                    <ul class="list-style-1 mt-2 mb-0">
                        <li>Integra&ccedil;&atilde;o de v&aacute;rias filiais</li>
                        <li>Relat&oacute;rios gerenciais</li>
                        <li>Treinamento personalizado</li>
                        <li>Integra&ccedil;&atilde;o com principais PBMs</li>
                        <li>Atendimento as legisla&ccedil;&otilde;es</li>
                        <li>Agilidade e descomplica&ccedil;&atilde;o</li>
                    </ul>
                </div>
            </div>
            <!--// Why Choose Area -->

            <!-- Services Area -->
            <div class="bk-section services-area bg-theme">
                <div class="container">
                    <div class="row no-gutters">
						@foreach($servicosLista as $servicos)
                        <!-- Single Service -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="bk-service text-center">
                                <i class="{{ $servicos->Icone }}"></i>
                                <h3>{{ $servicos->Servico }}</h3>
                                <span class="seemore">VEJA MAIS</span>
                                <p>{{ $servicos->Descricao }}</p>
                            </div>    
                        </div>
                        <!--// Single Service -->
						@endforeach
                    </div>
                </div>
            </div>
            <!--// Services Area -->

            <!-- Video & Services -->
            <div class="bk-section appointment-area section-padding-lg bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            
                            <!-- Video -->
                            <div class="appointment-box">
								<iframe width="669" height="430" src="https://www.youtube.com/embed/hESYkQP0JHA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
							</div>
                            <!--// Video -->

                        </div>
                        <div class="col-lg-4 bk-service-3-wrapper">
                            <div class="bk-service-3">
                                <span class="icon"><i class="fa fa-shopping-basket"></i></span>
                                <div class="bk-service-3-content">
                                    <h5>Venda</h5>
                                    <p>Melhore seu processo agilizando o atendimento</p>
                                </div>
                            </div>
                            <div class="bk-service-3">
                                <span class="icon"><i class="fa fa-money"></i></span>
                                <div class="bk-service-3-content">
                                    <h5>Financeiro</h5>
                                    <p>Gerencie todas as entradas e sa&iacute;das da sua farm&aacute;cia</p>
                                </div>
                            </div>
                            <div class="bk-service-3">
                                <span class="icon"><i class="fa fa-truck"></i></span>
                                <div class="bk-service-3-content">
                                    <h5>Compra</h5>
                                    <p>Compre certo atrav&eacute;s das ferramentas adequadas</p>
                                </div>
                            </div>
                            <div class="bk-service-3">
                                <span class="icon"><i class="fa fa-medkit"></i></span>
                                <div class="bk-service-3-content">
                                    <h5>Estoque</h5>
                                    <p>Controle seu estoque e n&atilde;o tenha mais problemas de rupturas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointment -->
            <div class="bk-section appointment-area section-padding-lg bg-grey cr-border cr-border-top" id="contato">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <!-- Appointment Form -->
							{{ csrf_field() }}
                            <div class="appointment-box">
                                <h3><span>MARQUE UM </span>ATENDIMENTO</h3>
                                <p>N&oacute;s ligamos para voc&ecirc;! Preencha o formul&aacute;rio abaixo para que possamos conversar.</p>
                                <form class="appointment-form mt-3" id="formContato" enctype="multipart/form-data">
                                    <div class="row">
                                        <div tabindex="0" class="col-lg-6 col-md-6 single-input {{ $errors->has('NomeCompleto') ? ' has-error' : '' }}">
                                            {!! Form::label('NomeCompleto','Nome Completo(*)') !!}
											{!! Form::text('NomeCompleto','',['class' => 'form-control','required' => 'required','onkeyup' => 'upper(this)']) !!}
											<small class="text-danger">{{ $errors->first('NomeCompleto') }}</small>
                                        </div>
                                        <div tabindex="1" class="col-lg-6 col-md-6 single-input {{ $errors->has('Assunto') ? ' has-error' : '' }}">
                                            {!! Form::label('Assunto','Assunto(*)') !!}
											{!! Form::select('Assunto', array('' => 'Selecione','1' => 'Solicitar Demonstra&ccedil;&atilde;o','2' => 'Solicitar uma Proposta','3' => 'Quest&otilde;es Comerciais'), null, ['class' => 'form-control','required' => 'required' ]) !!}
											<small class="text-danger">{{ $errors->first('Assunto') }}</small>
                                        </div>
                                        <div tabindex="2" class="col-lg-6 col-md-6 single-input {{ $errors->has('NomeFarmacia') ? ' has-error' : '' }}">
                                            {!! Form::label('NomeFarmacia','Nome da Farmácia(*)') !!}
											{!! Form::text('NomeFarmacia','',['class' => 'form-control','required' => 'required','onkeyup' => 'upper(this)']) !!}
											<small class="text-danger">{{ $errors->first('NomeFarmacia') }}</small>
                                        </div>
                                        <div tabindex="3" class="col-lg-6 col-md-6 single-input {{ $errors->has('MelhorHorario') ? ' has-error' : '' }}">
                                            {!! Form::label('MelhorHorario','Melhor Horário') !!}
											{!! Form::select('MelhorHorario', array('0' => 'Qualquer Horário','1' => 'Apenas pela Manh&atilde;','2' => 'Apenas a Tarde'), null, ['class' => 'form-control' ]) !!}
											<small class="text-danger">{{ $errors->first('MelhorHorario') }}</small>
                                        </div>
                                        <div tabindex="4" class="col-lg-6 col-md-6 single-input {{ $errors->has('Email') ? ' has-error' : '' }}">
                                            {!! Form::label('EmailC','E-mail(*)') !!}
											{!! Form::email('EmailC','',['class' => 'form-control','required' => 'required','onkeyup' => 'lower(this)']) !!}
											<small class="text-danger">{{ $errors->first('EmailC') }}</small>
                                        </div>
                                        <div tabindex="5" class="col-lg-6 col-md-6 single-input {{ $errors->has('Telefone') ? ' has-error' : '' }}">
                                            {!! Form::label('Telefone','Telefone(*)') !!}
                                            {!! Form::text('Telefone','',['class' => 'telefone form-control','required' => 'required']) !!}
											<small class="text-danger">{{ $errors->first('Telefone') }}</small>
                                        </div>
                                        <div class="col-12 single-input text-right">
                                            <input type="submit" value="ENVIAR">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--// Appointment Form -->
                        </div>
                    </div>
                </div>
            </div>				
			<!-- Appointment -->
			
            <!-- Call To Action Area -->
            <div class="bk-section call-to-action-area bg-theme">
                <div class="container">
                    <div class="call-to-action">
                        <div class="call-to-action-text">
                            <h3>N&atilde;o consegue extrair informa&ccedil;&atilde;o?</h3>
                            <h6>No INOVAFARMA s&atilde;o mais de 100 relat&oacute;rios gerenciais dispon&iacute;veis para <br />voc&ecirc; acompanhar seus resultados de todas as perspectivas.</h6>
                        </div>
                        <div class="call-to-action-button">
                            <a href="#contato" class="bk-button bk-button-transparent bk-button-white"><span>SOLICITE UMA DEMONSTRA&Ccedil;&Atilde;O!</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Call To Action Area -->

            <!-- Testimonial & Brand Logos Area -->
			<div class="cr-section testimonial-brand-logo-area bg-white section-padding-bottom-lg">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 section-padding-top-lg">
							<div class="section-title">
								<h3><span>Depoimento de </span>CLIENTES</h3>
							</div>
							<div class="testimonial2-wrapper slider-dots-style-1">

								<!-- Testimonial Single -->
								@foreach($depoimentosLista as $depoimento)
								<div class="testimonial2">
									<div class="testimonial2-text">
										<p>{{ $depoimento->Depoimento }}</p>
									</div>
									<div class="testimonial2-author">
										<div class="testimonial2-author-image">
											<img src="suporte/assets/img/testimonial/{{ $depoimento->ImageCliente }}" alt="author image">
										</div>
										<div class="testimonial2-author-content">
											<h5>{{ $depoimento->Cliente }}</h5>
											<h6>{{ $depoimento->Cargo }}</h6>
										</div>
									</div>
								</div>
								@endforeach
								<!--// Testimonial Single -->

							</div>

						</div>
						<div class="col-lg-6 section-padding-top-lg">
							<div class="section-title">
								<h3>Utilizam o <span>INOVAFARMA</span></h3>
							</div>

							<!-- Brand Logos -->
							<div class="brand-logos">
							@foreach($logoLista as $logo)
								<a href="{{ $logo->Site }}" target="_blank" class="brand-logo">
									<img src="suporte/assets/img/brand-logos/{{ $logo->Logo }}" title="{{ $logo->Cliente }}" alt="brand logo">
								</a>
							@endforeach
							</div>
							<!--// Brand Logos -->

						</div>
					</div>
				</div>
			</div>
			<!--// Testimonial & Brand Logos Area -->

            <!-- Latest Blogs -->
            <div class="bk-section latest-blogs-area bg-white section-padding-lg cr-border cr-border-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-10 col-12">
                            <div class="section-title text-center">
                                <h2>BLOG <span>farmac&ecirc;utico</span></h2>
                                <p>Confira todas as &uacute;ltimas novidades do setor farma!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row blog-slider-active slider-navigation-style-1">

                        <!-- Single Blog -->
						@foreach($blogLista as $blog)
                        <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="blog-item-meta">
                                    <span class="blog-item-meta-date">{{ date('d/m/Y', strtotime($blog->Data)) }}</span>
                                    <span><a href="{{ $blog->URL }}" target="_blank"><i class="fa fa-edit"></i>{{ $blog->Origem }}</a></span>
                                </div>
                                <a href="{{ $blog->URL }}" target="_blank" class="blog-item-image">
                                    <img src="{{ $blog->Imagem }}" alt="blog item">
                                </a>
                                <h6><a href="{{ $blog->URL }}" target="_blank">{{ $blog->Titulo }} </a></h6>
                                <p>{{ $blog->Descricao }}</p>
                                <a href="{{ $blog->URL }}" target="_blank" class="bk-readmore">Continue</a>
							</div>
                        </div>
						@endforeach
                        <!--// Single Blog -->

                    </div>
                </div>
            </div>
            <!--// Latest Blogs -->

        </main>
        <!--// Page Content -->
<!-- Init code Huggy.chat  //--><script>var $_Huggy = { defaultCountry: '+55', widget_id: '27687', company: '7626' }; (function(i,s,o,g,r,a,m){ i[r]={context:{id:'96f7ed19f098572673cfbec04536c805'}};a=o;o=s.createElement(o); o.async=1;o.src=g;m=s.getElementsByTagName(a)[0];m.parentNode.insertBefore(o,m); })(window,document,'script','https://js.huggy.chat/widget.min.js','pwz');</script><!-- End code Huggy.chat  //-->		
@stop

@section('css')
 <link type="text/css" rel="stylesheet" href="{{asset('suporte/assets/css/site.css')}}"/>	
 <link type="text/css" rel="stylesheet" href="{{asset('suporte/assets/css/pages/toastr.css')}}"/>	
 <link type="text/css" rel="stylesheet" href="{{asset('suporte/assets/vendors/toastr/css/toastr.min.css')}}"/>	
@stop	

@section('js')	
 <script type="text/javascript" src="{{asset('suporte/assets/js/site/plugins.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/js/site/active.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/js/site/scripts.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/js/site/modernizr-3.5.0.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/vendors/jquery-masked-input/jquery.maskedinput.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/vendors/moment/js/moment.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/vendors/noty/js/jquery.noty.packaged.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/vendors/toastr/js/toastr.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('suporte/assets/js/pages/toastr_notifications.js')}}"></script>
 
 <script>
  $(document).ready(function() {
	$("#formContato").submit(function(e) {
    	e.preventDefault();
		$.ajax({
            type: 'POST',
			dataType: 'JSON',
            url: '{{route('Site.addContatos')}}',
            data: {
				_token: $('input[name=_token]').val(),
				NomeCompleto: $("#NomeCompleto").val(),
				Assunto: $("#Assunto").val(),
				NomeFarmacia: $("#NomeFarmacia").val(),
				MelhorHorario: $("#MelhorHorario").val(),
				Email: $("#EmailC").val(),
				Telefone: $("#Telefone").val()
				},			
            success: function(data) {
				toastr.success(data.message, data.title);
				$("#formContato")[0].reset();
            },
			error: function(data) {   
				alert(JSON.stringify(data));
				console.log(data);
			},
        });
		return false;
    });	 
	$("#formNewsletter").submit(function(e) {
    	e.preventDefault();
		$.ajax({
            type: 'POST',
			dataType: 'JSON',
            url: '{{route('Site.addNewsletter')}}',
            data: {
				_token: $('input[name=_token]').val(),
				Email: $("#EmailN").val()
				},			
            success: function(data) {
				toastr.success(data.message, data.title);
				$("#formNewsletter")[0].reset();
            },
			error: function(data) {   
				toastr.success('Estaremos encaminhando no seu e-mail todas as novidades', 'Sucesso!');
				$("#formNewsletter")[0].reset();
				//corrigir
				/*
				alert(JSON.stringify(data));
				console.log(data);
				*/
			},
        });
		return false;
    });		
  });
 
  $("input[id*='Telefone']")
    .mask("(99) 9999-9999?9",{placeholder:" "})
    .focusout(function (event) {  
        let target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, '');
        element = $(target);  
        element.unmask();  
        if(phone.length > 10) {  
            element.mask("(99) 99999-999?9",{placeholder:" "});  
        } else {  
            element.mask("(99) 9999-9999?9",{placeholder:" "});  
        }  
    });
  function upper(z){
    v = z.value.toUpperCase();
    z.value = v;
  }
  function lower(z){
    l = z.value.toLowerCase();
    z.value = l;
  } 
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "positionClass": "toast-top-full-width",
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "linear",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
 </script>

@stop
