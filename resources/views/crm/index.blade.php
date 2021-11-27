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
                                <i class="fa fa-thumbs-o-up"></i> Empresas
								<a class="add-modal btn btn-success float-right" role="button" aria-pressed="true" data-toggle="modal" href="#" data-href="#">Adicionar Contato</a>
                              </div>
                              <div class="card-body card_block_top_align ">
                                <table class="table table-striped hover" id="datatable">
                                  <!--<thead>
                                    <tr>
                                      <th>#</th>
                                    </tr>
                                  </thead> -->
                                  <tbody>
                        		  <!--@ foreach($scriptsLista as $registro) -->
                                    <tr  style="cursor:pointer">
                                      <td>$registro->id </td>
                                    </tr>
                                  <!--@ endforeach -->
                        		  </tbody>
                                </table>
                              </div>                              	
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
        <!--- responsive modal-->
                <div class="modal fade in display_none" id="modalNovoContato" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title text-white">Vamos Come&ccedil;ar!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
		                    {!! Form::open(['route' => 'FunilVendas.addFase1','id' => 'formFase1','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'validade']) !!}
                            <div class="modal-body">
                                <div class="card-body m-t-35">

                                    @include('crm._formfase1')
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-light"> Fechar</button>
                                <button type="submit" class="formSubmit btn btn-success"> Avan&ccedil;ar</span></button>
                            </div>
							{!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- END modal-->			

@stop
@section('css')
<!-- Select2 -->
 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
  <style>
    .select2 {
       width: 100% !important;
  	 height: 36px;
    }
    .select2 .select2-selection--single{
  	 box-sizing:border-box;
  	 cursor:pointer;
  	 display:block;
  	 height:37px;
  	 user-select:none;
  	 -webkit-user-select:none;
    }
  </style>
@stop 
@section('js')
<!-- Select2 -->
 <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.full.min.js')}}"></script> 
 <script type="text/javascript" src="{{asset('assets/vendors/select2/js/i18n/pt-BR.js')}}"></script> 
 <script type="text/javascript" src="{{asset('assets/vendors/jquery-masked-input/jquery.maskedinput.min.js')}}"></script>  

<!--Plugin scripts-->
 <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('assets/vendors/jquery-bootstrap-wizard/js/jquery.bootstrap.wizard.min.js')}}"></script> 
 <script type="text/javascript" src="{{asset('assets/js/pages/crm_fase1.js')}}"></script> 


<script>

$(document).ready(function() {
  $('#formFase1').bootstrapValidator();
  $(document).on('click', '.add-modal', function() {
        $('.formModal').show();
        $('#modalNovoContato').modal('show');
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
});		
  //Initialize Select2 Elements
  $('.contato-show-search').select2({
	dropdownParent: $('#modalNovoContato'),
	placeholder: 'Selecione o Contato',
	allowClear: true,
	language: 'pt-BR'
  });
  function upper(z){
    v = z.value.toUpperCase();
    z.value = v;
  };
  function lower(z){
    l = z.value.toLowerCase();
    z.value = l;
  };

</script>	
@stop