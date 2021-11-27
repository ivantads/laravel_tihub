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
                    <div class="card-header bg-white" align="center">
                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                            src="{{asset('assets/img/tihub.png')}}">
                        <h4 class="card-title">Proposta Comercial Tihub</h4>
                        <div class="card-tools"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body card_block_top_align ">
                        <br>

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <h5 class="card-title">Dados da Empresa</h5>
                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Nome Fantasia:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->NomeFantasia) ? $projetosDados->NomeFantasia : ''}}" />
                            </div>
                            <div class="form-group col-md-5">
                                <label>Razao Social:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->RazaoSocial) ? $projetosDados->RazaoSocial : ''}}" />
                            </div>
                            <div class="form-group col-md-2">
                                <label>CNPJ:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->CNPJ) ? $projetosDados->CNPJ: ''}}" />
                            </div>
                            <div class="form-group col-md-2">
                                <label>Razao Social:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->IE) ? $projetosDados->IE : ''}}" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Fone Fixo:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->TelefoneFixo) ? $projetosDados->TelefoneFixo : ''}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Fone Celular:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->TelefoneCelular) ? $projetosDados->TelefoneCelular : ''}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email:</label>
                                <input type="text" class="form-control" disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->Email) ? $projetosDados->Email: ''}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Responsavel:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->IE) ? $projetosDados->IE : ''}}" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>endereço:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->Endereco) ? $projetosDados->Endereco : ''}}" />
                            </div>
                            <div class="form-group col-md-1">
                                <label>Numero:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->Numero) ? $projetosDados->Numero : ''}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Bairro:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->Bairro) ? $projetosDados->Bairro : ''}}" />
                            </div>
                            <div class="form-group col-md-2">
                                <label>CEP:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->CEP) ? $projetosDados->CEP: ''}}" />
                            </div>
                            <div class="form-group col-md-2">
                                <label>Cidade/UF:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->Cidade) ? $projetosDados->Cidade : ''}}" />
                            </div>
                        </div>

                        <br><br>
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <h5 class="card-title">Dados Tecnicos Empresa</h5>
                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Perfil de Loja:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->tipo_farmacia) ? $projetosDados->tipo_farmacia : ''}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Regime Tributário:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel"
                                    value="{{isset($projetosDados->regime_tributario) ? $projetosDados->regime_tributario : ''}}" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tipo Implantação:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel" @if($projetosDados->natureza_implantacao !=
                                'Loja Nova')
                                value="Conversão de Sistema" />
                                @elseif($projetosDados->natureza_implantacao =='Loja Nova')
                                value="Inauguração" />
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sistema anterior:</label>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    disabled="false" name="tResponsavel" @if($projetosDados->natureza_implantacao=='Loja
                                Nova')
                                value="" />
                                @elseif($projetosDados->natureza_implantacao !='Loja Nova')
                                value="{{isset($projetosDados->natureza_implantacao) ? $projetosDados->natureza_implantacao : ''}}"
                                />
                                @endif
                            </div>

                        </div>

                        <br><br>
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <h5 class="card-title">Dados a Importar</h5>
                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="cpa" name="cpa" onclick="return false;"
                                            {{isset($projetosDados->imp_cpa) && $projetosDados->imp_cpa == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="cpa">Contas a Pagar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="cpr" name="cpr" onclick="return false;"
                                            {{isset($projetosDados->imp_cpr) && $projetosDados->imp_cpr == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="cpr">Contas a Receber</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="prd" name="prd" onclick="return false;"
                                            {{isset($projetosDados->imp_prod) && $projetosDados->imp_prod == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="prd">Cadastro Produto/Grupos</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="cli" name="cli" onclick="return false;"
                                            {{isset($projetosDados->imp_cli) && $projetosDados->imp_cli == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="cli">Cadastro Clientes/Convenios</label>
                                    </div>
                                </div>
                            </div>


                            @if($projetosDados->import_info !=
                            '')
                            <div class="form-group col-md-12">
                                <label>Outras Informações importacao:</label>
                                <textarea class="form-control" rows="2" name="timport_info" disabled="false"
                                    placeholder="Descreva ...">{{isset($projetosDados->import_info) ? $projetosDados->import_info : ''}}
                            </textarea>
                            </div>
                            @endif


                        </div>

                        <br><br>
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <h5 class="card-title">Produtos Agregados</h5>
                            <p><em><small>Inovafarma contempla todos os produtos abaixo. mesmo nao sendo implantado no
                                        primeiro momento. poderam ocorrer
                                        após a implantação.</small></em></p>
                            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="fp" name="fp" onclick="return false;"
                                            {{isset($projetosDados->pbm_fp) && $projetosDados->pbm_fp == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="fp">Farmacia Popular</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="trn" name="trn" onclick="return false;"
                                            {{isset($projetosDados->pbm_trn) && $projetosDados->pbm_trn == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="trn">Portal Drogaria</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="func" name="func" onclick="return false;"
                                            {{isset($projetosDados->pbm_func) && $projetosDados->pbm_func == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="func">Funcional Card</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="eph" name="eph" onclick="return false;"
                                            {{isset($projetosDados->pbm_epha) && $projetosDados->pbm_epha == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="eph">E-pharma</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="pec" name="pec" onclick="return false;"
                                            {{isset($projetosDados->pbm_pec) && $projetosDados->pbm_pec == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="pec">Pec-Febrafar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="obj" name="obj" onclick="return false;"
                                            {{isset($projetosDados->pbm_obj) && $projetosDados->pbm_obj == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="obj">Object-Pro</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="rec" name="rec" onclick="return false;"
                                            {{isset($projetosDados->pbm_rec) && $projetosDados->pbm_rec == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="rec">Recarga</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="tef" name="tef" onclick="return false;"
                                            {{isset($projetosDados->tef) && $projetosDados->tef == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="tef">Tef</label>
                                    </div>
                                </div>
                            </div>


                            @if($projetosDados->gest_comp ==
                            1)
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="gest_comp" name="gest_comp" onclick="return false;"
                                            {{isset($projetosDados->gest_comp) && $projetosDados->gest_comp == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="gest_comp">Gestor Compras</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($projetosDados->fiscal_gest_trib ==
                            1)
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="fiscal_gest_trib" name="fiscal_gest_trib"
                                            onclick="return false;"
                                            {{isset($projetosDados->fiscal_gest_trib) && $projetosDados->fiscal_gest_trib == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="fiscal_gest_trib">Gestor Tributario</label>
                                    </div>
                                </div>
                            </div>

                            @endif
                        </div>

                        <hr>
                        <br><br>

                        <h5>Informações Fiscais e Contabeis:</h5>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-info d-inline">
                                        <input type="checkbox" id="fiscal_sped" name="fiscal_sped"
                                            onclick="return false;"
                                            {{isset($projetosDados->fiscal_sped) && $projetosDados->fiscal_sped == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="fiscal_sped">Sped</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-info d-inline">
                                        <input type="checkbox" id="fiscal_sintegra" name="fiscal_sintegra"
                                            onclick="return false;"
                                            {{isset($projetosDados->fiscal_sintegra) && $projetosDados->fiscal_sintegra == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="fiscal_sintegra">Sintegra</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-info d-inline">
                                        <input type="checkbox" id="fiscal_outros" name="fiscal_outros"
                                            onclick="return false;"
                                            {{isset($projetosDados->fiscal_outros) && $projetosDados->fiscal_outros == 1 ? 'checked' : '' }}
                                            value="true" />
                                        <label for="fiscal_outros">Outros</label>
                                    </div>
                                </div>
                            </div>
                            @if($projetosDados->fiscal_msg_outros !=
                            '')
                            <div class="form-group col-md-12">
                                <label>Outras Informações:</label>
                                <textarea class="form-control" rows="2" name="tfiscal_outros" disabled="false"
                                    placeholder="Descreva ...">{{isset($projetosDados->fiscal_msg_outros) ? $projetosDados->fiscal_msg_outros : ''}}
                            </textarea>
                            </div>
                            @endif

                        </div>









                    </div>
                    <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="summernote_editor">
                        <div class="form-group col-md-12 {{ $errors->has('tContrato') ? ' has-error' : '' }}">
                            @foreach($contrato as $reg)
                            {!! Form::label('tContrato','Contrato') !!}
                            {!! Form::textarea('tContrato',isset($reg->Contrato) ? $reg->Contrato :
                            null,['class' => 'form-control','rows' => 54, 'cols' => 54,'onkeyup' => 'upper(this)']) !!}
                       
                            @endforeach
                        </div>
                    </div>
                    </div>
                    
                        </div>
                    </div>
                   


                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

<!--</div>
        <!-- /#content -->
@stop
@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/daterangepicker-master/daterangepicker.css') }}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/summernote/css/summernote.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}" />

@stop
@section('js')
<script type="text/javascript" src="{{asset('assets/vendors/summernote/js/summernote.min.js') }}">
</script>
<script type="text/javascript" src="{{asset('assets/vendors/daterangepicker-master/moment.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/daterangepicker-master/daterangepicker.js') }}"></script>

<!-- InputMask -->
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.date.extensions.min.js') }}">
</script>
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.extensions.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/jquery.inputmask.bundle.js') }}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{{asset('assets/vendors/fastclick/fastclick.js') }}"></script>
<!-- Slimscroll -->
<script type="text/javascript" src="{{asset('assets/vendors/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script>
$(document).ready(function() {
    // Summernote
    $('#tContrato').summernote({
        lang: 'pt-BR', // default: 'en-US'
        height: 900, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true,
        airMode: true

    });


    // InputMask


});
</script>
@stop