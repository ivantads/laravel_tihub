


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
                                <i class="fa fa-comments-o"></i> Atendimentos da plataforma Huggy
                              </div>
                              <!-- /.card-header -->
							  <?php echo e(csrf_field()); ?>

                              <div class="card-body card_block_top_align icon-list-demop-0" id="tabs">
		                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="nav-vincular-tab" data-toggle="pill" href="#nav-vincular" role="tab" aria-controls="nav-vincular" aria-selected="true"><i class="fa fa-unlink"></i> CLIENTES A VINCULAR</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-vinculados-tab" data-toggle="pill" href="#nav-vinculados" role="tab" aria-controls="nav-vinculados" aria-selected="false"><i class="fa fa-link"></i> CLIENTES VINCULADOS</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="custom-content-above-tabContent">
								  <!-- VINCULAR -->
 		                          <div class="tab-pane fade show active" id="nav-vincular" role="tabpanel" aria-labelledby="nav-vincular-tab">	 
                                    <table class="table fa-icon">
                                      <thead>
                                        <tr>
										  <th>ID</th>
										  <th>Contato</th>
										  <th>Atendimentos</th>
                                          <th>Canal</th>
								    	  <th>A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        		      <?php $__empty_1 = true; $__currentLoopData = $clientesSemVinculoLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vincular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr style="cursor:pointer">
										  <td><?php echo e($vincular->HuggyID); ?></td>
								    	  <td><?php echo e($vincular->HuggyName); ?></td>
										  <td><?php echo e($vincular->Atendimento); ?></td>
                                          <td>
											<?php if($vincular->channel_typeid == '4'): ?>
												<i class="fa fa-facebook-square fa-2x"></i>
											<?php else: ?>
												<i class="fa fa-telegram fa-2x"></i>
											<?php endif; ?>
										  </td>										  
                                          <td><button class="vincular-modal btn btn-info btn-labeled" data-placement="top" title="Vincular" data-id="<?php echo e($vincular->HuggyID); ?>" data-contato="<?php echo e($vincular->HuggyName); ?>" data-canal="<?php echo e($vincular->channel_typeid); ?>">
											  <span class="btn-label"><i class="fa fa-pencil"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="5"><p>Nenhum registro a vincular</p></td>
										</tr>	
                                      <?php endif; ?>									  
                        		      </tbody>
                                    </table>
 		                          </div>
                                  <!--- responsive modal-->
                                  <div class="modal fade in display_none" id="modalVincular" tabindex="-1" role="dialog" aria-hidden="false">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                  <h4 class="modal-title text-white">Vincular Contato</h4><!-- aqui -->
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="card-body m-t-35">
                                                      <?php echo Form::open(['id' => 'form-vincular-atendimento','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']); ?>

                                                      <?php echo $__env->make('huggy._formvincularatendimento', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                      <?php echo Form::close(); ?>

                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                                  <button type="submit" data-dismiss="modal" class="btn btn-success actionBtn"><span id="footer_action_button" class='glyphicon'></span> Vincular</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END modal-->
								  <!-- VINCULADOS -->
								  <div class="tab-pane fade" id="nav-vinculados" role="tabpanel" aria-labelledby="nav-vinculados-tab">
                                    <table class="table " id="datatable">
                                      <thead>
                                        <tr>
                                          <th>Canal</th>
										  <th>Empresa</th>
                        		    	  <th>ID Huggy</th>
										  <th>Nome Contato</th>
								    	  <th>A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        		      <?php $__currentLoopData = $clientesVinculadosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vinculados): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="cursor:pointer">
                                          <td>
											<?php if($vinculados->CustomerID == ''): ?>
												<i class="fa fa-facebook-square fa-2x" title="Facebook"></i>
											<?php elseif($vinculados->CustomerMessengerID == ''): ?>
												<i class="fa fa-telegram fa-2x" title="Telegram"></i>
											<?php endif; ?>
										  </td>	
                                          <td><?php echo e($vinculados->NomeApresentacao); ?></td>
										  <td>
											<?php if($vinculados->CustomerID == ''): ?>
												<?php echo e($vinculados->CustomerMessengerID); ?>

											<?php elseif($vinculados->CustomerMessengerID == ''): ?>
												<?php echo e($vinculados->CustomerID); ?>

											<?php endif; ?>
										  </td>	
										  <td><?php echo e($vinculados->NomeContato); ?></td>
								    	  <td><button class="deleteVinculo btn btn-danger btn-labeled" data-placement="top" title="Desfazer Vinculo" data-id="<?php echo e($vinculados->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        		      </tbody>
                                    </table>
 		                          </div>
								  
		                        </div><!-- /.nav-bar -->
							  </div>	
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
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
    .toolbar {
        float: left;
    }
 </style>
 <!-- Select2 -->
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2/css/select2.min.css')); ?>"/>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- Select2 -->
 <script type="text/javascript" src="<?php echo e(asset('assets/vendors/select2/js/select2.full.min.js')); ?>"></script> 
 <script type="text/javascript" src="<?php echo e(asset('assets/vendors/select2/js/i18n/pt-BR.js')); ?>"></script> 
 <script>
  $(function (){
    //Initialize Select2 Elements
    $('.empresa-show-search').select2({
		dropdownParent: $('#modalVincular'),
		placeholder: 'Selecione a Empresa',
		allowClear: true,
		language: 'pt-BR'
	});
    function upper(z){
        v = z.value.toUpperCase();
        z.value = v;
    };
  });
 </script> 
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script>
$(document).ready(function() {
	//VINCULAR
    $(document).on('click', '.vincular-modal', function() {
        $('.actionBtn').addClass('addVinculo');
		$('.formModal').show();
        $('#tHuggyID').val($(this).data('id'));
		$('#tHuggyName').val($(this).data('contato'));
		$('#tCanal').val($(this).data('canal'));
        $('#modalVincular').modal('show');
    }); 
    $('.modal-footer').on('click', '.addVinculo', function() {
		$.ajax({
            type: 'POST',
            url: '<?php echo e(route('atendimentos.store')); ?>',
            data: {
                _token: $('input[name=_token]').val(),
				Canal: $("#tCanal").val(),
				HuggyID: $("#tHuggyID").val(),
				NomeContato: $("#tHuggyName").val(),
				ClienteID: $("#tEmpresa").val()
            },
            success: function(data) {
				location.reload();
            },
			error: function(data) { 
				alert(JSON.stringify(data));
			}		
        });
    });
	//VINCULADOS

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
          null,
          null,
          { "width": "5%" }
        ],		

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
    } ); 
	$("div.toolbar").html('Clientes vinculados a TIHUB estão automaticamente descartados');
	//
    $(document).on('click', '.deleteVinculo', function() {
		if (!confirm("Confirma exclusão do registro?")){
		  return false;
		}
		var id = $(this).data('id');
		var url = '<?php echo e(route("atendimentos.destroy", ":id")); ?>';
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
	//MANTEM TAB ATUAL COM REFRESH
    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('#custom-content-above-tab a[href="' + activeTab + '"]').tab('show');
    }	
});  
</script>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/huggy/atendimentos.blade.php ENDPATH**/ ?>