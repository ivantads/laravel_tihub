@extends('layouts/default')

{{-- Page title --}}
@section('title')
    ADMIN 
    @parent
@stop

{{-- Page content --}}
@section('content')

            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-white">
                                <i class="fa fa-trophy"></i> For&ccedil;a de Vendas
								<a class="btn btn-info float-right" href="{{route('FunilVendas')}}">Voltar</a>
                                </div>
                                <div class="card-body m-t-20">
                                    <!--main content-->
                                    <div class="row">
                                        <div class="col">
                                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                            <form id="commentForm" method="post" action="#" class="validate">
                                                <div id="rootwizard">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab1" data-toggle="tab">
                                                                <span class="userprofile_tab1">1</span>Prospec&ccedil;&atilde;o
                                                                (Smart Leads)</a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab2" data-toggle="tab">
                                                                <span class="userprofile_tab2">2</span>Demonstra&ccedil;&atilde;o
                                                                (MQL)</a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab3" data-toggle="tab">
                                                                <span class="userprofile_tab3">3</span>Negocia&ccedil;&atilde;o
                                                                </a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab4" data-toggle="tab">
															    <span>4</span>Fechamento (Cliente)</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content m-t-20">
                                                        <div class="tab-pane" id="tab1">
		    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="nav-dadosbasicos-tab" data-toggle="pill" href="#nav-dadosbasicos" role="tab" aria-controls="nav-dadosbasicos" aria-selected="true">DADOS BASICOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nav-contato-tab" data-toggle="pill" href="#nav-contato" role="tab" aria-controls="nav-contato" aria-selected="false">CONTATOS</a>
                </li>
            </ul>														
            <div class="tab-content" id="custom-content-above-tabContent">		 
              <div class="tab-pane fade show active" id="nav-principal" role="tabpanel" aria-labelledby="nav-principal-tab">			
														
														
														
                                                            <div class="form-group">

                                                            </div>
                                                            <div class="row">
				                                              <div class="form-group col-md-1">
                                                                {!! Form::label('tCod','C&oacute;digo:') !!}
				                                            	{!! Form::text('tCod',$crmDados->id,['class' => 'form-control','readonly' => 'readonly']) !!}
                                                              </div>
                                                              <div class="form-group col-md-5 {{ $errors->has('tNome') ? ' has-error' : '' }}">
                                                                {!! Form::label('tNome','Nome:') !!}
				                                            	{!! Form::text('tNome',$crmDados->NomeFunil,['class' => 'form-control','required' => 'required']) !!}
				                                            	<small class="text-danger">{{ $errors->first('tNome') }}</small>
                                                              </div>
                                                              <div class="form-group col-md-3 {{ $errors->has('tCategoria') ? ' has-error' : '' }}">
                                                                {!! Form::label('tCategoria','Categoria:') !!}
				                                            	{!! Form::select('tCategoria', $categoriasLista, $crmDados->CategoriaID, ['class' => 'form-control','required' => 'required']) !!}
				                                            	<small class="text-danger">{{ $errors->first('tCategoria') }}</small>
                                                              </div>
                                                              <div class="form-group col-md-3 {{ $errors->has('tOrigem') ? ' has-error' : '' }}">
				                                            	{!! Form::label('tOrigem','Origem:') !!}
				                                            	{!! Form::select('tOrigem', $origemLista, $crmDados->OrigemID, ['class' => 'form-control','required' => 'required']) !!}
				                                            	<small class="text-danger">{{ $errors->first('tOrigem') }}</small>
                                                              </div>				  
                                                            </div>
                                                            <div class="row">
                                                              <div class="form-group col-md-6">
                                                                {!! Form::label('tRazaoSocial','Raz&atilde;o:') !!}
				                                            	{!! Form::text('tRazaoSocial',$crmDados->RazaoSocial,['class' => 'form-control','placeholder' => 'Raz&atilde;o Social','onkeyup' => 'upper(this)']) !!}
                                                              </div> 
                                                              <div class="form-group col-md-6">
                                                                {!! Form::label('tFantasia','Fantasia:') !!}
				                                            	{!! Form::text('tFantasia',$crmDados->NomeFantasia,['class' => 'form-control','placeholder' => 'Fantasia','onkeyup' => 'upper(this)']) !!}
                                                              </div>															
                                                            </div>
															<div class="row">
                                                              <div class="form-group col-md-2">
                                                                {!! Form::label('tCnpj','CNPJ:') !!}
                                                            	{!! Form::text('tCnpj',$crmDados->CNPJ,['class' => 'form-control','placeholder' => 'CNPJ']) !!}
                                                              </div>
                                                              <div class="form-group col-md-2">
                                                                {!! Form::label('tInscEstadual','Insc Estadual:') !!}
                                                            	{!! Form::text('tInscEstadual',$crmDados->IE,['class' => 'form-control','placeholder' => 'Inscri&ccedil;&atilde;o Estadual']) !!}
                                                              </div>
                                                              <div class="form-group col-md-2">
                                                                {!! Form::label('tTelefone','Telefone:') !!}
                                                            	{!! Form::text('tTelefone',$crmDados->TelefoneFixo,['class' => 'form-control','placeholder' => 'Fixo']) !!}
                                                              </div>
                                                              <div class="form-group col-md-2">
                                                                {!! Form::label('tCelular','Celular:') !!}
                                                            	{!! Form::text('tCelular',$crmDados->TelefoneCelular,['class' => 'form-control','placeholder' => 'Celular']) !!}
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                {!! Form::label('tSite','Site:') !!}
                                                            	{!! Form::text('tSite',$crmDados->Site,['class' => 'form-control','placeholder' => 'Site / Facebook','onkeyup' => 'lower(this)']) !!}
                                                              </div>
                                                            </div>
                                                            <div class="row">
                                                              <div class="form-group col-md-2">
                                                                {!! Form::label('tCep','CEP:') !!}
                                                            	{!! Form::text('tCep',$crmDados->CEP,['class' => 'form-control','placeholder' => '99.999-99']) !!}
                                                              </div>				
                                                              <div class="form-group col-md-5">
                                                                {!! Form::label('tEndereco','Endere&ccedil;o:') !!}
                                                            	{!! Form::text('tEndereco',$crmDados->Endereco,['class' => 'form-control','placeholder' => 'Endere&ccedil;o','onkeyup' => 'upper(this)']) !!}
                                                              </div>
                                                              <div class="form-group col-md-1">
                                                                {!! Form::label('tNum','Num:') !!}
                                                            	{!! Form::number('tNum',$crmDados->Numero,['class' => 'form-control','placeholder' => '99']) !!}
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                {!! Form::label('tComplemento','Complemento:') !!}
                                                            	{!! Form::text('tComplemento',$crmDados->Complemento,['class' => 'form-control','placeholder' => 'Complemento','onkeyup' => 'upper(this)']) !!}
                                                              </div>
                                                            </div>	
                                                            <div class="row">
                                                              <div class="form-group col-md-6">
                                                                {!! Form::label('tBairro','Bairro:') !!}
                                                            	{!! Form::text('tBairro',$crmDados->Bairro,['class' => 'form-control','placeholder' => 'Bairro','onkeyup' => 'upper(this)']) !!}
                                                              </div>				
                                                              <div class="form-group col-md-4">
                                                                {!! Form::label('tCidade','Cidade:') !!}
                                                            	{!! Form::select('tCidade', $cidadesLista, null,['class' => 'city-show-search form-control','placeholder' => 'Selecione a Cidade','onkeyup' => 'upper(this)']) !!}
                                                              </div>
                                                              <div class="form-group col-md-2">
                                                            	{!! Form::label('tSistemaAtual','Software Atual:') !!}
                                                            	{!! Form::select('tSistemaAtual', array('1' => 'SOFTPHARMA','2' => 'TRIER','3' => 'ETC'), null, ['class' => 'form-control'])!!}
                                    <span class="form-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <span class="fa fa-plus-square" aria-hidden="true"></span>
									</button>
                                    </span>
                                                              </div>
                                                            </div>	



                                                              </div>
                                                            </div>																
															
															</br><hr class="dashed"></br>
                                                            <div class="form-group">
                                                              <h5><b>Registrar um evento</b></h5>
                                                            </div>
										                    <div class="row">
                                                              <div class="col-lg-8 col-12">
                                                                <div class="row">
																  <div class="form-group col-md-6">
																	{!! Form::label('tTipo','Tipo:') !!}
												<div class="diff_colored_radio">
                                                    <div class="btn-group d-inline-block" data-toggle="buttons">
                                                        <label class="btn btn-success fa fa-envelope-o fa-2x active">
                                                            <input type="radio" name="options" id="option0" checked>
                                                            <span class="fa fa-circle"></span>
                                                        </label>
                                                        <label class="btn btn-primary fa fa-phone fa-2x">
                                                            <input type="radio" name="options" id="option1">
                                                            <span class="fa fa-circle"></span>
                                                        </label>
                                                        <label class="btn btn-info fa fa-file-text-o fa-2x">
                                                            <input type="radio" name="options" id="option3">
                                                            <span class="fa fa-circle"></span>
                                                        </label>
                                                        <label class="btn btn-mint fa fa-group fa-2x">
                                                            <input type="radio" name="options" id="option4">
                                                            <span class="fa fa-circle"></span>
                                                        </label>
                                                        <label class="btn btn-warning fa fa-map-marker fa-2x">
                                                            <input type="radio" name="options" id="option5">
                                                            <span class="fa fa-circle"></span>
                                                        </label>
                                                    </div>
                                                </div>
												
												
												
												
																  </div>
																  <div class="form-group col-md-3">
																    {!! Form::label('tData2','De:') !!}
																    <div class='input-group' id='dtpicker1'> 
																	   <span class="input-group-addon">
																	      <i class="fa fa-calendar"></i>
																	   </span>
																	   {!! Form::text('tData2',null,['class' => 'form-control']) !!}
																	</div>
																  </div>
																  <div class="form-group col-md-3">
																    {!! Form::label('tData2','At&eacute;:') !!}
																    <div class='input-group' id='dtpicker2'> 
																	   <span class="input-group-addon">
																	      <i class="fa fa-calendar"></i>
																	   </span>
																	   {!! Form::text('tData2',null,['class' => 'form-control']) !!}
																	</div>
																  </div>

                                                                </div>
                                                                <div class="row">
																  <div class="form-group col-md-12">
																	{!! Form::label('tEvento','Descreva os Detalhes:') !!}
																	{!! Form::textarea('tEvento',null,['class' => 'form-control','onkeyup' => 'upper(this)']) !!}
																  </div>				
                                                                </div>																
                                                              </div>
                                                              <div class="col-lg-4 col-12">
                                                                <div class="row">
                                                              	  <div id="calendar" data-route-load-events="{{ route('routeLoadEventsUser') }}"></div>
                                                                </div>
                                                              </div>
                                                            </div>					
															
                                                            <ul class="pager wizard pager_a_cursor_pointer">
                                                                <li class="previous">
                                                                    <a><i class="fa fa-long-arrow-left"></i>Anterior</a>
                                                                </li> 
                                                                <li class="next">
                                                                    <a>Avan&ccedil;ar <i class="fa fa-long-arrow-right"></i></a>
                                                                </li>
                                                                <li class="next finish" style="display:none;">
                                                                    <a>Gerar Projeto!</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                            <div class="form-group">
                                                                <label for="name1" class="control-label">First name
                                                                    *</label>
                                                                <input id="name1" name="val_first_name"
                                                                       placeholder="Enter your First name"
                                                                       type="text"
                                                                       class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="surname1" class="control-label">Last
                                                                    name *</label>
                                                                <input id="surname1" name="lname" type="text"
                                                                       placeholder=" Enter your Last name"
                                                                       class="form-control required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Gender</label>
                                                                <select class="custom-select form-control"
                                                                        id="gender"
                                                                        title="Select an account type...">
                                                                    <option>Select</option>
                                                                    <option>MALE</option>
                                                                    <option>FEMALE</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address *</label>
                                                                <input id="address" name="val_address" type="text"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="age" class="control-label">Age *</label>
                                                                <input id="age" name="val_age" type="text"
                                                                       maxlength="3"
                                                                       class="form-control required number">
                                                            </div>
                                                            <ul class="pager wizard pager_a_cursor_pointer">
                                                                <li class="previous">
                                                                    <a><i class="fa fa-long-arrow-left"></i>
                                                                        Previous</a>
                                                                </li>
                                                                <li class="next">
                                                                    <a>Next <i class="fa fa-long-arrow-right"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="next finish" style="display:none;">
                                                                    <a>Finish</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            <div class="form-group">
                                                                <label>Home number *</label>
                                                                <input type="text" class="form-control" id="phone1"
                                                                       name="phone1"
                                                                       placeholder="(999)999-9999">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Personal number *</label>
                                                                <input type="text" class="form-control" id="phone2"
                                                                       name="phone2"
                                                                       placeholder="(999)999-9999">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alternate number *</label>
                                                                <input type="text" class="form-control" id="phone3"
                                                                       name="phone3"
                                                                       placeholder="(999)999-9999">
                                                            </div>
                                                            <div class="form-group">
                                                                <span>Terms and Conditions *</span>
                                                                <br>
                                                                <label class="custom-control custom-checkbox wizard_label_block">
                                                                    <input type="checkbox" id="acceptTerms"
                                                                           name="acceptTerms"
                                                                           class="custom-control-input">
                                                                    <span class="custom-control-indicator"></span>
                                                                    <span class="custom-control-description custom_control_description_color">I agree with the Terms and Conditions.</span>
                                                                </label>

                                                            </div>
                                                            <ul class="pager wizard pager_a_cursor_pointer">
                                                                <li class="previous">
                                                                    <a><i class="fa fa-long-arrow-left"></i>
                                                                        Previous</a>
                                                                </li>
                                                                <li class="next">
                                                                    <a>Next <i class="fa fa-long-arrow-right"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="next finish" style="display:none;">
                                                                    <a>Finish</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="myModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h4 class="modal-title">Wizard</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>You Submitted Successfully.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    OK
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--main content end-->
						    </div>
						</div>
					</div>
				</div>
			</div>	

@stop
@section('css')
 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
 
 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.min.css')}}"/>
 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.print.min.css')}}" media="print"/>
 <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/calendar_custom.css')}}"/>
 <style type="text/css" class="init">
	.fc-toolbar {
	  margin: 0; !important
	},
	.fc h2 {
      font-size: 10px;
    }
.fc-center h2 {
 font-size: 16px; 
}	
 </style>
<style>
.diff_colored_radio .btn span.fa {
    opacity: 0;
}
.diff_colored_radio .btn.active span.fa {
    opacity: 1;
}
.sub_title{
    line-height: 25px;
}
.diff_colored_radio .btn,.diff_colored_checkbox .btn{
    margin-right:-2px;
}

.radio_grouped_checkbox{
    margin-top: 15px;
}


</style> 
 <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/wizards.css')}}"/>
 <style>
	/* Dashed border */
	hr.dashed {
	border-top: 3px dashed #bbb;
	} 
 </style>
 
 



@stop 
@section('js')
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/lang/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/locales-all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pluginjs/calendarcustom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/calendar_crm.js')}}"></script>

<script type="text/javascript">
  $(function () {
    $('#dtpicker1').datetimepicker({
	  locale: 'pt-br',
	  format: 'DD/MM/YYYY HH:mm:00',
    });
    $('#dtpicker2').datetimepicker({
       useCurrent: false,
	   locale: 'pt-br',
	   format: 'DD/MM/YYYY HH:mm:00',
    });	
    $("#dtpicker1").on("dp.change", function (e) {
       $('#dtpicker2').data("DateTimePicker").minDate(e.date);
    });
    $("#dtpicker2").on("dp.change", function (e) {
       $('#dtpicker1').data("DateTimePicker").maxDate(e.date); 
    });	
	
	
  });
</script>

@stop