<?php $__env->startSection('title'); ?>
    ADMIN 
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                              <div class="card-header bg-white">
                                <i class="fa fa-bug"></i> Problemas conhecidos nas vers&otilde;es
								<a class="add-modal btn btn-success float-right" role="button" aria-pressed="true" data-toggle="modal" href="#" data-href="#">Adicionar Ocorr&ecirc;ncia</a>
                              </div>
                              <!-- /.card-header -->
							  <?php echo e(csrf_field()); ?>

                              <div class="card-body card_block_top_align ">
                                <table class="table table-striped " id="datatable">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                        			  <th>Vers&atilde;o</th>
                        			  <th>Detalhes da Ocorr&ecirc;ncia</th>
                        			  <th>Chamado</th>
                        			  <th>Vers&atilde;o OK</th>
                        			  <th>Tipo</th>
                                      <th>Inclus&atilde;o</th>
									  <th>A&ccedil;&otilde;es</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                        		  <?php $__currentLoopData = $erroversoesLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="item<?php echo e($registro->id); ?>" style="cursor:pointer">
                                      <td><?php echo e($registro->id); ?></td>
                        			  <td><?php echo e($registro->Versao); ?></td>
                                      <td><?php echo e($registro->DescricaoOcorrencia); ?></td>
                                      <td><?php echo e($registro->Chamado); ?></td>
                                      <td><?php echo e($registro->VersaoCorrigida); ?></td>			  
                        			  <td>
										<?php if($registro->TextoTipoErro=='ESTAVEL'): ?>
											<i class="fa fa-trophy fa-2x"></i>
										<?php else: ?>
											<?php echo e($registro->TextoTipoErro); ?>

										<?php endif; ?>
									  </td>	
                        			  <td><?php echo e(date('d/m/Y', strtotime($registro->created_at))); ?></td>
									  <td><button class="edit-modal btn btn-info btn-labeled" data-toggle="tooltip" data-placement="top" title="Editar" data-id="<?php echo e($registro->id); ?>" data-versao="<?php echo e($registro->Versao); ?>"
									  		data-ocorrencia="<?php echo e($registro->DescricaoOcorrencia); ?>" data-chamado="<?php echo e($registro->Chamado); ?>"
											data-versaook="<?php echo e($registro->VersaoCorrigida); ?>" data-tipoerro="<?php echo e($registro->TipoErro); ?>">
									  		<span class="btn-label"><i class="fa fa-pencil"></i></span>
									  	</button>
									  	<button class="delete-modal btn btn-danger btn-labeled" data-toggle="tooltip" data-placement="top" title="Deletar" data-id="<?php echo e($registro->id); ?>">
									  		<span class="btn-label"><i class="fa fa-trash-o"></i></span>
									  	</button></td>
                                    </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <!--</div>
        <!-- /#content -->	
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
									<?php echo Form::open(['id' => 'form-edit','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']); ?>

                                    <?php echo $__env->make('inovafarma.erroversoes._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                            <div class="deletarRegistro">
                            	<div class="card-body">
								    <div class="alert alert-danger">
									    <strong>Aten&ccedil;&atilde;o!</strong> Tem certeza que deseja deletar a ocorr&ecirc;ncia n&uacute;mero  
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
				
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
 <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">	
 <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">	
 <style type="text/css" class="init">
    tr.group,
    tr.group:hover {
	    background-color: #F5F5F5 !important;
	    font-weight: bold;
    },
	td.highlight {
		font-weight: bold;
		color: blue;
	}	
 </style>
 <style type="text/css" class="init">
	td.highlight {
		font-weight: bold;
		color: red;
	}
 </style>
 <style type="text/css" class="init">
	td.highlight2 {
		font-weight: bold;
		color: green;
	}
 </style> 
 <style type="text/css" class="init">	
    .toolbar {
        float: left;
    }
 </style>	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script>
/*
/*Configura????o da link da table
*/
$(document).ready(function() {
  $(document).on('click', '.add-modal', function() {
        $('#footer_action_button').text("Adicionar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('add');
        $('.modal-title').text('Adicionar Ocorr??ncia');
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
        $('.modal-title').text('Editar Ocorr??ncia');
        $('.deletarRegistro').hide();
        $('.formModal').show();
        $('#tId').val($(this).data('id'));
		$('#tVersao').val($(this).data('versao'));
		$('#tOcorrencia').val($(this).data('ocorrencia'));
		$('#tChamado').val($(this).data('chamado'));
		$('#tVersaoOK').val($(this).data('versaook'));
		$('#tTipoErro').val($(this).data('tipoerro'));
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
        $('.delocorrencia').html($(this).data('ocorrencia'));
        $('#editorModal').modal('show');
    });

   $('.modal-footer').on('click', '.edit', function() {
		var id = $("#tId").val();
		var url = '<?php echo e(route("erroversoes.update", ":id")); ?>';
		url = url.replace(':id', id);	
		$.ajax({
            type: 'PUT',
            url: url,
            data: {
                _token: $('input[name=_token]').val(),
				id: $("#tId").val(),
				Versao: $("#tVersao").val(),
				Ocorrencia: $("#tOcorrencia").val(),
				Chamado: $("#tChamado").val(),
				VersaoOK: $("#tVersaoOK").val(),
				TipoErro: $("#tTipoErro").val()
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
            url: '<?php echo e(route('erroversoes.store')); ?>',
            data: {
                _token: $('input[name=_token]').val(),
				Versao: $("#tVersao").val(),
				Ocorrencia: $("#tOcorrencia").val(),
				Chamado: $("#tChamado").val(),
				VersaoOK: $("#tVersaoOK").val(),
				TipoErro: $("#tTipoErro").val()
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
		var url = '<?php echo e(route("erroversoes.destroy", ":id")); ?>';
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

	var groupColumn = 1;
    var table = $('#datatable').DataTable({
		"dom": 'fr<"toolbar">tip',
        "autoWidth": false, //faz o auto ajuste do grid na tela
		"lengthChange": false,
		"ordering": false,
		"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
		"columnDefs": [
            { "visible": false, "targets": groupColumn	}
        ],
        "columns": [
          null,
          null,
          { "width": "40%" },
          null,
          null,
          null,
          null,
          null
        ],		
		"createdRow": function ( row, data, index ) {
			if ( data[5] == 'Erro Cr??tico'){	
                $('td', row).eq(4).addClass('highlight');
            } else {
				$('td', row).eq(4).addClass('highlight2');
			}
        },
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                    );
                    last = group;
                }
            } );
        },
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
	table.columns.adjust().draw();
    // Order by the grouping
    $('#datatable tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } ); //href="#" data-href="#"
	$("div.toolbar").html('Legenda: Erro Cr??tico = Envolve toda carteira/ Erro Espor??dico = Ocorreu em alguns clientes');
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/inovafarma/erroversoes/index.blade.php ENDPATH**/ ?>