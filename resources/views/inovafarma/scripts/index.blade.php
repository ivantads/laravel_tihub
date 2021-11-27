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
                                <i class="fa fa-bug"></i> Scripts
								<a class="add-modal btn btn-success float-right" role="button" aria-pressed="true" data-toggle="modal" href="#" data-href="#">Adicionar Script</a>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body card_block_top_align ">
                                <table class="table table-striped hover" id="datatable">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                        			  <th>Descri&ccedil;&atilde;o do Script</th>
                        			  <th>Informa&ccedil;&otilde;es</th>
									  <th>C&oacute;digo do Script</th>
                                      <th>A&ccedil;&otilde;es</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                        		  @foreach($scriptsLista as $registro)
                                    <tr style="cursor:pointer">
                                      <td>{{ $registro->id }}</td>
                        			  <td>{{ $registro->DescricaoScript }}</td>
                                      <td>{{ $registro->InformacoesScript }}</td>
									  <td>{{ $registro->CodigoScriptReduz }}</td>
									  <td>
									    <button class="btn btn-success btn-labeled" data-toggle="modal" data-placement="top" title="Abrir" data-target="#scriptModal{{ $registro->id }}"><span class="btn-label"><i class="fa fa-file-code-o"></i></span> </button>
										<button class="edit-modal btn btn-info btn-labeled" data-placement="top" title="Editar" data-id="{{$registro->id}}" data-descricao="{{$registro->DescricaoScript}}"
									  		data-informacoes="{{$registro->InformacoesScript}}" data-codigoscript="{{$registro->CodigoScript}}">
									  		<span class="btn-label"><i class="fa fa-pencil"></i></span>
									  	</button>
									  	<button class="delete-modal btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-id="{{$registro->id}}" data-descricao="{{$registro->DescricaoScript}}">
									  		<span class="btn-label"><i class="fa fa-trash-o"></i></span>
									  	</button></td>									  
                                    </tr>
                                    <!--- responsive modal-->
                                    <div class="modal fade in display_none" id="scriptModal{{ $registro->id }}" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title text-white">{{ $registro->DescricaoScript }}</h4><!-- aqui -->
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <pre name="code" class="sql">{{ $registro->CodigoScript }}</pre>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END modal-->
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
        <!--</div>-->
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
                                    @include('inovafarma.scripts._form')
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="deletarRegistro">
                            	<div class="card-body">
								    <div class="alert alert-danger">
									    <strong>Aten&ccedil;&atilde;o!</strong> Tem certeza que deseja deletar o Script 
										<span class="hidden delid"></span> ? <br/>
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
 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/syntaxhighlighter/css/syntaxhighlighter.css')}}"/>
 
@stop

@section('js')
<!--
USAR jquery do projeto, atualizado para a versão 3.5.1
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
-->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script type="text/javascript" src="{{asset('assets/vendors/syntaxhighlighter/js/shCore.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/vendors/syntaxhighlighter/js/shBrushSql.js')}}"></script>


<script language="javascript">
dp.SyntaxHighlighter.HighlightAll('code');
</script>

<script> 
$(document).ready(function() {
  $(document).on('click', '.add-modal', function() {
        $('#footer_action_button').text("Adicionar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('add');
        $('.modal-title').text('Adicionar Script');
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
        $('.modal-title').text('Editar Script');
        $('.deletarRegistro').hide();
        $('.formModal').show();
        $('#tId').val($(this).data('id'));
		$('#tDescricao').val($(this).data('descricao'));
		$('#tInformacoes').val($(this).data('informacoes'));
		$('#tScript').val($(this).data('codigoscript'));
        $('#editorModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Deletar");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Deletar Script');
        $('.delid').text($(this).data('id'));
		$('.deldescricao').text($(this).data('descricao'));
        $('.deletarRegistro').show();
        $('.formModal').hide();
        $('.delscript').html($(this).data('codigoscript'));
        $('#editorModal').modal('show');
    });

   $('.modal-footer').on('click', '.edit', function() {
		var id = $("#tId").val();
		var url = '{{ route("scripts.update", ":id") }}';
		url = url.replace(':id', id);
		$.ajax({
            type: 'PUT',
            url: url,
            data: {
                _token: $('input[name=_token]').val(),
				id: $("#tId").val(),
				Descricao: $("#tDescricao").val(),
				Informacoes: $("#tInformacoes").val(),
				Script: $("#tScript").val()
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
            url: '{{route('scripts.store')}}',
            data: {
                _token: $('input[name=_token]').val(),
				Descricao: $("#tDescricao").val(),
				Informacoes: $("#tInformacoes").val(),
				Script: $("#tScript").val()
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
		var id = $('.delid').text();
		var url = '{{ route("scripts.destroy", ":id") }}';
		url = url.replace(':id', id);	
alert(url);		
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
		"dom": 'Bfrtip',
		"autoWidth": false, //faz o auto ajuste do grid na tela
		"lengthChange": false,
		"ordering": false,
		"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
		"displayLength": 50,
		"columnDefs": [ {
			targets: 3,
			render: function ( data, type, row, meta ) {
				return data.length > 50 ?
					data.substr( 0, 50 ) + ' <b>…</b>' :
					data; 			   
			}
		}],
        "columns": [
          null,
          { "width": "25%" },
          { "width": "20%" },
          { "width": "35%" },
          null
        ],		
        "language":   {
           "sEmptyTable": "Nenhum registro encontrado",
           "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
           "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
           "sInfoFiltered": "(Filtrados de _MAX_ registros)",
           "sInfoPostFix": "",
           "sInfoThousands": ".",
           "sLengthMenu": "_MENU_ resultados por página",
           "sLoadingRecords": "Carregando...",
           "sProcessing": "Processando...",
           "sZeroRecords": "Nenhum registro encontrado",
           "sSearch": "Pesquisar",
           "oPaginate": {
               "sNext": "Próximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "Último"
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