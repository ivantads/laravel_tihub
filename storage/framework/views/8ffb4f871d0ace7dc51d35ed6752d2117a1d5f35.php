<?php $__env->startSection('title'); ?>
    ADMIN 
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
                <header class="head">
                    <div class="main-bar">
	                    <!--Info Box-->
                        <div class="row">
                     	    <div class="col-md-3 col-sm-6 col-12">
                                <div class="icon_align bg-gradient-success section_border">
                                    <div class="float-left progress_icon">
                                        <i class="fa fa-check " aria-hidden="true"></i>
                                    </div>
                                    <div class="text">
                     	    	        <span class="info-box-text">&nbsp;Clientes Ativos</span>
                                    </div>
                                    <span class="info-box-number">&nbsp;<?php echo e($totalClientesAtivas); ?> / <?php echo e($totalClientes); ?></span>
                                    <div class="progress">
                                        <div class="progress-bar progress-striped bg-white " role="progressbar" style="width: <?php echo e($percClientesAtivas); ?>%"></div>
                                    </div>
                                    <span class="progress-description">&nbsp;<?php echo e($percClientesAtivas); ?>% da carteira</span>								
                                </div>
                             </div>	
                     	    <div class="col-md-3 col-sm-6 col-12">
                                <div class="icon_align bg-gradient-info section_border">
                                    <div class="float-left progress_icon">
                                        <i class="fa fa-check-circle " aria-hidden="true"></i>
                                    </div>
                                    <div class="text">
                     	    	        <span class="info-box-text">&nbsp;Ativa&ccedil;&otilde;es neste ano (<?php echo e(date("Y",time())); ?>)</span>
                                    </div>
                                    <span class="info-box-number">&nbsp;<?php echo e($totalClientesAtivasAno); ?></span>
                                    <div class="progress">
                                        <div class="progress-bar progress-striped bg-white " role="progressbar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">&nbsp;<?php echo e($totalClientesAtivas90dias); ?> &uacute;ltimos 90 dias / <?php echo e($totalClientesAtivasMes); ?> neste m&ecirc;s</span>								
                                </div>
                            </div>	
                     	    <div class="col-md-3 col-sm-6 col-12">
                                 <div class="icon_align bg-gradient-warning section_border">
                                     <div class="float-left progress_icon">
                                         <i class="fa fa-exclamation-triangle " aria-hidden="true"></i>
                                     </div>
                                     <div class="text">
                     	    	         <span class="info-box-text">&nbsp;Cancelados neste ano (<?php echo e(date("Y",time())); ?>)</span>
                                     </div>
                                     <span class="info-box-number">&nbsp;<?php echo e($totalClientesCanceladasAno); ?></span>
                                     <div class="progress">
                                         <div class="progress-bar progress-striped bg-white " role="progressbar" style="width: 100%"></div>
                                     </div>
                                     <span class="progress-description">&nbsp;<?php echo e($totalClientesCanceladas90dias); ?> &uacute;ltimos 90 dias / <?php echo e($totalClientesCanceladasMes); ?> neste m&ecirc;s</span>								
                                 </div>
                            </div>		
                     	    <div class="col-md-3 col-sm-6 col-12">
                                 <div class="icon_align bg-gradient-danger section_border">
                                     <div class="float-left progress_icon">
                                         <i class="fa fa-ban " aria-hidden="true"></i>
                                     </div>
                                     <div class="text">
                     	    	         <span class="info-box-text">&nbsp;Clientes Bloq / Cancelados</span>
                                     </div>
                                     <span class="info-box-number">&nbsp;<?php echo e($totalClientesBloqueadasCanceladas); ?> / <?php echo e($totalClientes); ?></span>
                                     <div class="progress">
                                         <div class="progress-bar progress-striped bg-white " role="progressbar" style="width: <?php echo e($percClientesBloqueadasCanceladas); ?>%"></div>
                                     </div>
                                     <span class="progress-description">&nbsp;<?php echo e($percClientesBloqueadasCanceladas); ?>% da carteira</span>								
                                 </div>
                             </div>
						</div>
					<!-- #info box -->
					</div>
				</header>

                <div class="outer">
                    <div class="inner bg-container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                  <div class="card-header bg-white">
                                    <i class="fa fa-building"></i> Clientes Cadastrados
									<a href="<?php echo e(route('Cadastros.Clientes.Novo')); ?>" class="btn btn-success float-right" role="button" aria-pressed="true">Adicionar Cliente</a>
                                  </div>
                                  <div class="card-body card_block_top_align ">
                                    <table class="table table-striped" id="datatable">
                                      <thead>
                                        <tr>
                                          <th>#</th>
										  <th><i class="fa fa-exclamation-triangle" ></i></th>
                                      	  <th>Inova</th>
                                      	  <th>CNPJ</th>
                                          <th>Raz&atilde;o</th>
                                          <th>Fantasia</th>
                                      	  <th>Contato</th>
                                          <th>Fone Fixo</th>
                                      	  <th>Celular</th>
                                      	  <th>Cidade</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php $__currentLoopData = $clientesLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-href="<?php echo e(route('Cadastros.Clientes.Editar',$registro->id)); ?>" style="cursor:pointer">
                                          <td><?php echo e($registro->id); ?></td>
										  <td>
											<?php switch($registro->ServidorMemoria):
												case (2): ?>
												<i class="fa fa-exclamation-triangle text-danger">
												<?php break; ?>
												<?php case (3): ?>
												<i class="fa fa-exclamation-triangle text-danger">
												<?php break; ?>
												<?php case (4): ?>
												<i class="fa fa-exclamation-triangle text-danger">
												<?php break; ?>
												<?php case (6): ?>
												<i class="fa fa-exclamation-triangle text-warning">
												<?php break; ?>
												<?php case (8): ?>
												<i class="fa fa-exclamation-triangle text-info">
												<?php break; ?>
												<?php case (10): ?>
												<i class="fa fa-exclamation-triangle text-info">
												<?php break; ?>
												<?php case (12): ?>
												<i class="fa fa-exclamation-triangle text-success">
												<?php break; ?>												
												<?php case (16): ?>
												<i class="fa fa-exclamation-triangle text-success">
												<?php break; ?>											
												<?php case (32): ?>
												<i class="fa fa-exclamation-triangle text-success">
												<?php break; ?>											
												<?php case (64): ?>
												<i class="fa fa-exclamation-triangle text-success">
												<?php break; ?>	
												<?php default: ?>
												<i class="fa fa-exclamation-triangle" data-background="" data-tipso="Servidor memória informada!" data-position="right" >
											<?php endswitch; ?>
										  </td>
                                      	  <td><?php echo e($registro->ContratoInova); ?></td>
                                      	  <td><?php echo e($registro->CNPJ); ?></td>
                                      	  <td><?php echo e($registro->RazaoSocial); ?></td>
                                      	  <td><?php echo e($registro->NomeFantasia); ?></td>
                                      	  <td><?php echo e($registro->NomeContato); ?></td>
                                      	  <td><?php echo e($registro->TelefoneFixo); ?></td>
                                      	  <td><?php echo e($registro->TelefoneCelular); ?></td>
                                      	  <td><?php echo e($registro->Cidade); ?></td>
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
        <!-- /#content -->					
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('css'); ?>
<!-- dataTable.net -->
 <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">  
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/widgets.css')); ?>"/>
 
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/tipso/css/tipso.min.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- dataTable.net -->	
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script> 
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script> 
 
 <script type="text/javascript" src="<?php echo e(asset('assets/vendors/tipso/js/tipso.min.js')); ?>"></script> 
 
 <script>
 /*
  * Confirguracoes gerais da dataTable
  * Parametrize de acordo com as configuracoes abaixo
 */
  $(function () {

	$('#datatable').DataTable({
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false,
	  "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
	  "dom": 'Bf<"toolbar">rtip',
      "buttons": [
            {
                "extend":    "copyHtml5",
                "text":      '<i class="fa fa-copy"></i>',
                "titleAttr": "Copiar"
            },
            {
                "extend":    "excelHtml5",
                "text":      "<i class='fa fa-file-excel-o'></i>",
                "titleAttr": "Excel"
            },
            {
                "extend":    "csvHtml5",
                "text":      "<i class='fa fa-file-text'></i>",
                "titleAttr": "CSV"
            },
            {
                "extend": "print",
                "text": "<i class='fa fa-print'></i>",
				"titleAttr": "Imprimir",
                "autoPrint": true
            }			
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
	$("div.toolbar").html('');
	
  });
  /*
    /*Configuração da link da table
  */
  $(document).ready(function(){
	$('#datatable tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });
	
  });
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/cadastros/clientes/index.blade.php ENDPATH**/ ?>