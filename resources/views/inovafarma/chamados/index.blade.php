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
                                <i class="fa fa-clock-o"></i> Lembrete de chamados
								<a class="add-modal btn btn-success float-right" role="button" aria-pressed="true" data-toggle="modal" href="#" data-href="#">Adicionar Chamado</a>
                              </div>
                              <!-- /.card-header -->
							  {{ csrf_field() }}
                              <div class="card-body card_block_top_align ">
                                <table class="table table-striped" id="datatable">
                                  <thead>
                                    <tr>
                                      <th>Respons&aacute;vel</th>
                                      <th>CH</th>
									  <th>WI</th>
                                      <th>T&iacute;tulo</th>
                                      <th>Cliente</th>
									  <th>Tipo</th>
                                      <th>Status</th>
                                      <th>Vers&atilde;o OK</th>
									  <th>Abertura</th>
									  <th>A&ccedil;&otilde;es</th>									  
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($chamadosLista as $registro)
                                    <tr data-href="" style="cursor:pointer">
                                      <td>{{ $registro->Atendente }}</td>
                                      <td>{{ $registro->Chamado }}</td>
									  <td>{{ $registro->WI }}</td>
                                      <td>{{ $registro->Titulo }}</td>
                                      <td>{{ $registro->NomeFantasia }}</td>
                                      <td>{{ $registro->TextoTipo }}</td>
									  <td>{{ $registro->TextoStatus }}</td>
									  <td>{{ $registro->VersaoOK }}</td>
                                      <td>{{ date('d/m/Y', strtotime($registro->created_at)) }}</td>
									  <td><button class="edit-modal btn btn-info btn-labeled" data-toggle="tooltip" data-placement="top" title="Editar" data-id="{{$registro->id}}" data-chamado="{{$registro->Chamado}}"
									  		data-titulo="{{$registro->Titulo}}" data-empresa="{{$registro->EmpresaID}}"
											data-tipo="{{$registro->NrTipo}}" data-textotipo="{{$registro->TextoTipo}}"
											data-status="{{$registro->Status}}" data-versaook="{{$registro->VersaoOK}}" 
											data-wi="{{$registro->WI}}">
									  		<span class="btn-label"><i class="fa fa-pencil"></i></span>
									  	</button>
									  	<button class="delete-modal btn btn-danger btn-labeled" data-toggle="tooltip" data-placement="top" title="Deletar" data-id="{{$registro->id}}" data-chamado="{{$registro->Chamado}}">
									  		<span class="btn-label"><i class="fa fa-trash-o"></i></span>
									  	</button></td>									  
                                    </tr>
                                  @endforeach
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
                <div class="modal fade in display_none" id="editorModal" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title text-white"></h4><!-- aqui -->
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body m-t-35">
                                    {!! Form::open(['id' => 'form-edit','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']) !!}
                                    @include('inovafarma.chamados._form')
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="deletarRegistro">
                            	<div class="card-body">
								    <div class="alert alert-danger">
									    <strong>Aten&ccedil;&atilde;o!</strong> Tem certeza que deseja deletar o chamado n&uacute;mero  
										<span class="hidden delid"></span> <span class="hidden delchamado"></span> ? <br/>
									</div>									
								</div>
                            </div>							
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                <button type="submit" data-dismiss="modal" class="btn btn-success actionBtn"><span id="footer_action_button" class='glyphicon'> </span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END modal-->			
@stop
@section('css')
 <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">	
 <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">	
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<!-- Select2 -->
  <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.full.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/vendors/select2/js/i18n/pt-BR.js')}}"></script> 
  
<script>
  $(function (){
    //Initialize Select2 Elements
    $('.empresa-show-search').select2({
		dropdownParent: $('#editorModal'),
		placeholder: 'Selecione a Empresa',
		allowClear: true,
		language: 'pt-BR'
	});
    function upper(z){
        v = z.value.toUpperCase();
        z.value = v;
    };
  });
  
$(document).ready(function() {
  $(document).on('click', '.add-modal', function() {
        $('#footer_action_button').text("Adicionar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('add');
        $('.modal-title').text('Adicionar Chamado');
        $('.deletarRegistro').hide();
        $('.formModal').show();
        $('#editorModal').modal('show');
    });	
  $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Atualizar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar Chamado');
        $('.deletarRegistro').hide();
        $('.formModal').show();
        $('#tId').val($(this).data('id'));
		$('#tChamado').val($(this).data('chamado'));
		$('#tTitulo').val($(this).data('titulo'));
		$('#tEmpresa').val($(this).data('empresa'));
		$('#tStatus').val($(this).data('status'));
		$('#tVersaoOK').val($(this).data('versaook'));
		$('#tWI').val($(this).data('wi'));
		$('#tTipo').val($(this).data('tipo'));
        $('#editorModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Deletar");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Deletar Ocorr??ncia');
        $('.delid').text($(this).data('id'));
        $('.deletarRegistro').show();
        $('.formModal').hide();
        $('.delchamado').html($(this).data('chamado'));
        $('#editorModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
		var id = $("#tId").val();
		var url = '{{ route("chamados.update", ":id") }}';
		url = url.replace(':id', id);	
		$.ajax({
            type: 'PUT',
            url: url,
            data: {
                _token: $('input[name=_token]').val(),
				id : $("#tId").val(),
				Chamado: $("#tChamado").val(),
				Titulo: $("#tTitulo").val(),
				Empresa: $("#tEmpresa").val(),
				Status: $("#tStatus").val(),
				VersaoOK: $("#tVersaoOK").val(),
				WI: $("#tWI").val(),
				Tipo: $("#tTipo").val()
            },
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			}		
        });
    });

	$('.modal-footer').on('click', '.add', function() {
		$.ajax({
            type: 'POST',
            url: '{{route('chamados.store')}}',
            data: {
                _token: $('input[name=_token]').val(),
				Chamado: $("#tChamado").val(),
				Titulo: $("#tTitulo").val(),
				Empresa: $("#tEmpresa").val(),
				Status: $("#tStatus").val(),
				VersaoOK: $("#tVersaoOK").val(),
				WI: $("#tWI").val(),
				Tipo: $("#tTipo").val()
            },
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			}		

        });
    });
	
    $('.modal-footer').on('click', '.delete', function() {
		/*if (!confirm("Confirma exclus??o do registro?")){
		  return false;
		}*/	
		var id = $('.delid').text();
		var url = '{{ route("chamados.destroy", ":id") }}';
		url = url.replace(':id', id);
		$.ajax({
            type: 'DELETE',
            url: url,
            data: {
				_token: $('input[name=_token]').val(),
				},
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			},
        });
    });

    var table = $('#datatable').DataTable({
        "autoWidth": false, //faz o auto ajuste do grid na tela
		"lengthChange": false,
		"ordering": false,
		"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
        "displayLength": 25,
        "columns": [
          null,
          null,
          null,
          { "width": "20%" },
          { "width": "25%" },
          null,
          null,
          null,
          null,
          null
        ],
        "language":   {
           "sEmptyTable": "Nenhum registro encontrado",
           "sInfo": "Mostrando de _START_ at?? _END_ de _TOTAL_ registros",
           "sInfoEmpty": "Mostrando 0 at?? 0 de 0 registros",
           "sInfoFiltered": "(Filtrados de _MAX_ registros)",
           "sInfoPostFix": "",
           "sInfoThousands": ".",
           "sLengthMenu": "_MENU_ resultados por p??gina",
           "sLoadingRecords": "Carregando...",
           "sProcessing": "Processando...",
           "sZeroRecords": "Nenhum registro encontrado",
           "sSearch": "Pesquisar",
           "oPaginate": {
               "sNext": "Pr??ximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "??ltimo"
           },
           "oAria": {
               "sSortAscending": ": Ordenar colunas de forma ascendente",
               "sSortDescending": ": Ordenar colunas de forma descendente"
           },
           "select": {
               "rows": {
                   "_": "Selecionado %d linhas",
                   "0": "Nenhuma linha selecionada",
                   "1": "Selecionado 1 linha"
               }		   
           }	  
        }		
    });
});
 
</script>
@stop