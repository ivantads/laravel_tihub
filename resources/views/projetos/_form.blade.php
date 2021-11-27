<div class="card-body">
    <div class="row">
        <div class="form-group col-md-3">
            {!! Form::label('tCliente','Cliente:') !!}
            <select  name="id_cliente" class="company-show-search form-control select2">
                <option value="{{isset($projetosDados->id) ? $projetosDados->id : ''}}">
                    {{isset($projetosDados->NomeApresentacao) ? $projetosDados->NomeApresentacao : ''}}</option>
                @foreach($clientesLista as $registro)
                <option value="{{ $registro->id}}*+{{ $registro->NomeApresentacao}}">{!! $registro->NomeApresentacao !!} </option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('tCliente') }}</small>
        </div>

        <div class="form-group col-md-3">
        {!! Form::label('tResponsavel_implantacao','Responsável Acompanhamento:') !!}
            <input type="text" style="text-transform: uppercase" class="form-control" name="responsavel_implantacao"
                value="{{isset($projetosDados->responsavel_implantacao) ? $projetosDados->responsavel_implantacao : ''}}" />
            <small class="text-danger">{{ $errors->first('tResponsavel_implantacao') }}</small>
        </div>



        <div class="form-group col-md-3 ">
            {!! Form::label('tPeriodo','Periodo de Implantação:') !!}
            <input type="text" class="form-control" name="periodo" id="tPeriodo" autocomplete="off"
                value="{{isset($projetosDados->data_inicio) ? date('d/m/Y' , strtotime($projetosDados->data_inicio  ))  : ''}}{{isset($projetosDados->data_fim) ? ' - ': ''}}{{isset($projetosDados->data_fim) ? date('d/m/Y' , strtotime($projetosDados->data_fim))  : ''}}" required/>
               
        </div>

        <div class="form-group col-md-3">
            {!!Form::label('data_negociada','Data Negoci&aacute;vel')!!}
            {!!Form::select('data_negociada',array('SIM' => 'SIM','NAO' => 'NÃO'), isset($projetosDados->data_negociada)
            ? $projetosDados->data_negociada : '', ['class' => 'form-control select2','name' => 'data_negociada']) !!}
        </div>

    </div>
    <br>

    <!--separando tabela-->
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <h5 class="card-title">Informações Adicionais</h5><br>
        <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
    </div>
    <!--separando tabela-->




    <div class="row">
        <div class="form-group col-md-2">
            {!!Form::label('tipo','Tipo')!!}
            {!!Form::select('tipo',array('1' => 'Implantação','2' => 'Treinamento/Visita'), isset($projetosDados->tipo)
            ? $projetosDados->tipo : '', ['class' => 'form-control select2','name' => 'tipo']) !!}
        </div>
		
        <div class="form-group col-md-2">
            {!!Form::label('tipo_farmacia','Tipo de Loja')!!}
            {!!Form::select('tipo_farmacia',array('' => '','Farmácia Individual' => 'Farmácia Individual','Rede
            Sincronizada' => 'Rede Sincronizada'
            ,'Abertura de filial Sincronismo' => 'Abertura de filial Sincronismo','Abertura de filial Independente' =>
            'Abertura de filial Independente'), isset($projetosDados->tipo_farmacia)
            ? $projetosDados->tipo_farmacia : '', ['class' => 'form-control select2','name' => 'tipo_farmacia']) !!}
        </div>

        <div class="form-group col-md-2">
            {!!Form::label('natureza_implantacao','Tipo de Conversão')!!}
            {!!Form::select('natureza_implantacao',array('Loja Nova' => 'Loja Nova','Softpharma' => 'Softpharma'
            ,'Big' => 'Big','SoftIse farma' => 'SoftIse farma','SoftIse farma NG' => 'SoftIse farma NG','Trier' =>
            'Trier','VSM' => 'VSM','Far' => 'Far','CES' => 'CES'), isset($projetosDados->natureza_implantacao)
            ? $projetosDados->natureza_implantacao : '', ['class' => 'form-control select2','name' =>
            'natureza_implantacao']) !!}
        </div>


        <div class="form-group col-md-2">
            {!!Form::label('regime_tributario','Regime Tribut&aacute;rio')!!}
            {!!Form::select('regime_tributario',array('Simples Nacional' => 'Simples Nacional','Lucro Presumido' =>
            'Lucro Presumido','Lucro Real' => 'Lucro Real'), isset($projetosDados->regime_tributario)
            ? $projetosDados->regime_tributario : '', ['class' => 'form-control select2','name' => 'tData_negocial'])
            !!}
        </div>

        <div class="form-group col-md-2 ">
            {!! Form::label('tanalista','Agente Comerical:') !!}
            {!! Form::select('agente_comercial', $usersLista, isset($projetosDados->agente_comercial) ?
            $projetosDados->agente_comercial : 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-2 ">
            {!! Form::label('tanalista','Analista:') !!}
            {!! Form::select('id_analista', $usersLista, isset( $projetosDados->id_analista) ?
            $projetosDados->id_analista : 0, ['class' => 'form-control']) !!}
        </div>
    </div>


    <!--separando tabela-->
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title">Dados a Importar</h5>
        </div>
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="cpa" name="cpa"
                                {{isset($projetosDados->imp_cpa) && $projetosDados->imp_cpa == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="cpa">Contas a Pagar</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="cpr" name="cpr"
                                {{isset($projetosDados->imp_cpr) && $projetosDados->imp_cpr == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="cpr">Contas a Receber</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="prd" name="prd"
                                {{isset($projetosDados->imp_prod) && $projetosDados->imp_prod == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="prd">Cadastro Produto/Grupos</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="cli" name="cli"
                                {{isset($projetosDados->imp_cli) && $projetosDados->imp_cli == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="cli">Cadastro Clientes/Convenios</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="out" name="out"
                                {{isset($projetosDados->imp_out) && $projetosDados->imp_out == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="out">Outros</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Outras Informações importacao</label>
                    <textarea class="form-control" rows="2" name="timport_info" placeholder="Descreva ...">{{isset($projetosDados->import_info) ? $projetosDados->import_info : ''}}
                        </textarea>
                    <small class="text-danger">{{ $errors->first('timport_info') }}</small>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!--separando tabela-->

    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title">Produtos Contratados</h5>
        </div>
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="fp" name="fp"
                                {{isset($projetosDados->pbm_fp) && $projetosDados->pbm_fp == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="fp">Farmacia Popular</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="trn" name="trn"
                                {{isset($projetosDados->pbm_trn) && $projetosDados->pbm_trn == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="trn">Portal Drogaria</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="func" name="func"
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
                            <input type="checkbox" id="eph" name="eph"
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
                            <input type="checkbox" id="pec" name="pec"
                                {{isset($projetosDados->pbm_pec) && $projetosDados->pbm_pec == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="pec">Pec-Febrafar</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="obj" name="obj"
                                {{isset($projetosDados->pbm_obj) && $projetosDados->pbm_obj == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="obj">Object-Pro</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="rec" name="rec"
                                {{isset($projetosDados->pbm_rec) && $projetosDados->pbm_rec == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="rec">Recarga</label>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="tef" name="tef"
                                {{isset($projetosDados->tef) && $projetosDados->tef == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="tef">Tef</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="fiscal_gest_trib" name="fiscal_gest_trib"
                                {{isset($projetosDados->fiscal_gest_trib) && $projetosDados->fiscal_gest_trib == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="fiscal_gest_trib">Gestor Tributario</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="gest_comp" name="gest_comp"
                                {{isset($projetosDados->gest_comp) && $projetosDados->gest_comp == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="gest_comp">Gestor Compras</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <!--separando tabela-->

    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title">Dados Fiscais</h5>
        </div>
        <div class="card-body">
            <br>


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group clearfix">
                        <div class="icheck-info d-inline">
                            <input type="checkbox" id="fiscal_sped" name="fiscal_sped"
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
                                {{isset($projetosDados->fiscal_outros) && $projetosDados->fiscal_outros == 1 ? 'checked' : '' }}
                                value="true" />
                            <label for="fiscal_outros">Outros</label>
                        </div>
                    </div>
                </div>




                <div class="form-group col-md-12">
                    <label>Outras Informações Fiscais</label>
                    <textarea class="form-control" rows="2" name="tfiscal_outros" placeholder="Descreva ...">{{isset($projetosDados->fiscal_msg_outros) ? $projetosDados->fiscal_msg_outros : ''}}
                        </textarea>
                </div>





            </div>
        </div>
    </div>
    <br>
    <!--separando tabela-->

    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title">Informações Financeiras</h5>
        </div>
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Investimento inicial:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                            class="dinheiro form-control" style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Valor Mensalidade:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                            class="dinheiro form-control" style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="tValor_mensal">Data 1º Mensalidade:</label>
                    <input type="text" class="form-control" name="data_vencimento" autocomplete="off">

                </div>
                <div class="col-sm-3">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Faturamento Anual:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                            class="dinheiro form-control" style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Numero Terminais:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" class="form-control"
                            style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--separando tabela-->

    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title">Informações de DEA</h5>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Deslocamento:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                            class="dinheiro form-control" style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Hospedagem:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                            class="dinheiro form-control" style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="tValor_mensal">Alimentacao:</label>
                    <input type="text" class="form-control" name="data_vencimento" autocomplete="off">

                </div>

                <div class="col-sm-3">
                    <div class="form-group clearfix">
                        <label for="tValor_mensal">Quantidade de Dias:</label>
                        <input type="text" id="tValor_inicial" name="tValor_inicial" class="form-control"
                            style="display:inline-block" />
                        <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>




















</div>


</div>

<div class="form-group">
    {!! Form::submit('Gravar', ['class' => 'btn btn-default btn-xs']); !!}
</div>

@section('css')
<!-- Select2 -->
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}">



<style>
.select2 {
    width: 100% !important;
    height: 36px;
}

.select2 .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 37px;
    user-select: none;
    -webkit-user-select: none;
}
</style>
@stop

@section('js')
<!--
USAR jquery do projeto, atualizado para a versão 3.5.1
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Select2 -->
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/select2/js/i18n/pt-BR.js')}}"></script>

<!-- datapicker -->

<script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}"></script>

<!-- InputMask -->
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.date.extensions.js') }}">
</script>
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.extensions.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/jquery.inputmask.bundle.js') }}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{{asset('assets/vendors/fastclick/fastclick.js') }}"></script>
<!-- Slimscroll -->
<script type="text/javascript" src="{{asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js') }}"></script>

<script type="text/javascript">
$(function() {
    //Initialize Select2 Elements
    $('.company-show-search').select2({
        placeholder: 'Selecione cliente',
        allowClear: true,
        language: 'pt-BR'
    });
});
</script>
<script type="text/javascript">
$(function() {

    $('input[name="periodo"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            "startDate": 'd',
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"
            ],
            "monthNames": [
                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
                "Setembro", "Outubro", "Novembro", "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('input[name="periodo"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
            'DD/MM/YYYY'));

    });

    $('input[name="periodo"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

});
</script>
@stop