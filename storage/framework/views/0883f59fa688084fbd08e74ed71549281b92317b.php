<?php $__env->startSection('title'); ?>
    ADMIN 
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
        <div class="outer">
            <div class="inner bg-container">
                <div class="row">
                    <div class="col-lg-8 col-12"><!-- m-t-25 -->
                        <div class="card">
                            <div class="card-header bg-white">
								<i class="fa fa-tasks"></i>Meus Projetos <?php echo $implantacoesLista; ?>

							</div>
							<div class="card-body">
								<table class="table table-inverse" id="tableProjetos">
									<thead class="thead-inverse">
										<tr>
											<th>Projeto</th> 
											<th>Per&iacute;odo</th> 
											<th>Status</th> 
										</tr>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $projetosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projeto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr data-href="route('Projetos')" style="cursor:pointer">
											<td><?php echo e($projeto->NomeFantasia); ?><br /><small><?php echo e($projeto->Cidade); ?></small></td>
											<td>De <?php echo e(date('d/m/Y' , strtotime($projeto->data_inicio))); ?> At&eacute; <?php echo e(date('d/m/Y' , strtotime($projeto->data_fim))); ?></td>
											<td>
												<?php if($projeto->status=='aguard'): ?>
												<button type="button"
													class="btn btn-block btn-danger btn-flat">Aguardando</button>
												<?php elseif($projeto->status=='pre'): ?>
												<button type="button"
													class="btn btn-block btn-info btn-flat">Pre-Implantacao</button>
												<?php elseif($projeto->status=='prod'): ?>
												<button type="button"
													class="btn btn-block btn-primary btn-flat">Produção</button>
												<?php elseif($projeto->status=='4'): ?>
												<button type="button"
													class="btn btn-block btn-primary btn-flat">Em-Implantacao</button>
												<?php elseif($projeto->status=='5'): ?>
												<button type="button"
													class="btn btn-block btn-Dark btn-flat">Bloqueado</button>
												<?php elseif($projeto->status=='6'): ?>
												<button type="button"
													class="btn btn-block btn-success btn-flat">Finalizado</button>
												<?php endif; ?>											
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr data-href="route('Projetos')" style="cursor:pointer">
											<td colspan="3"><p>Nenhum registro encontrado</p></td>
										</tr>
									<?php endif; ?>
									</tbody>
								</table>							
							</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12"><!--  m-t-25-->
                        <div class="card">
						    <div class="card-header bg-white">
								<i class="fa fa-calendar"></i>Meus Compromissos
								<a class="btn btn-sm float-right" style="background-color: #FF9933;" data-toggle="tooltip" title="Negoci&aacute;vel">&nbsp;</a>
								<a class="btn btn-sm float-right" style="background-color: #FF8086;" data-toggle="tooltip" title="N&Atilde;O Negoci&aacute;vel">&nbsp;</a>
								<a class="btn btn-sm float-right" style="background-color: #00CC99;" data-toggle="tooltip" title="Data Confirmada">&nbsp;</a>								
							</div>
							<div class="card-body">
								
								<div id="calendar" data-route-load-events="<?php echo e(route('routeLoadEventsUser')); ?>"></div> <!--  -->
							</div>							
                        </div>
                    </div>
				</div> <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-12"><!--  m-t-35-->
                        <div class="card">
						    <div class="card-header bg-white">
								<i class="fa fa-clock-o"></i>Chamados Pendentes
							</div>
							<div class="card-body">
								<table class="table table-inverse" id="tableChamados">
									<thead class="thead-inverse">
										<tr>
											<th>CH</th> 
											<th>T&iacute;tulo</th> 
											<th>Abertura</th> 
										</tr>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $chamadosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr data-href="<?php echo e(route('inovafarma.chamados')); ?>" style="cursor:pointer">
											<td><?php echo e($chamado->Chamado); ?></td>
											<td><?php echo e($chamado->Titulo); ?></td>
											<td><?php echo e(date('d/m/y', strtotime($chamado->created_at))); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><p>Nenhum registro encontrado</p></td>
										</tr>										
									<?php endif; ?>
									</tbody>
								</table>
							</div>								
                        </div>
                    </div>
                    <div class="col-lg-4 col-12"><!--  m-t-35-->
                        <div class="card">
						    <div class="card-header bg-white">
								<i class="fa fa-bug"></i>Erros de Vers&otilde;es
							</div>
							<div class="card-body">
								<table class="table table-responsive" id="datatable">
									<thead class="thead-inverse">
										<tr>
											<th>Vers&atilde;o</th> 
											<th>Detalhes</th> 
											<th>Resolv</th> 
											<th>Erro</th>
										</tr>
									</thead>
									<tbody>
									<?php $__currentLoopData = $erroVersoesLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr data-href="<?php echo e(route('inovafarma.erroversoes')); ?>" style="cursor:pointer">
											<td><?php echo e($erros->Versao); ?></td>
											<td><?php echo e($erros->DescricaoOcorrencia); ?></td>
											<td><?php echo e($erros->VersaoCorrigida); ?></td>
											<td align="center">
												<?php if($erros->TextoTipoErro=='ESTAVEL'): ?>
													<i class="fa fa-trophy fa-1x"></i>
												<?php else: ?>
													<?php echo e($erros->TextoTipoErro); ?>

												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
							</div>								
                        </div>
                    </div>
                    <div class="col-lg-4 col-12"><!--  m-t-35-->
                        <div class="card">
						    <div class="card-header bg-white">
								<i class="fa fa-building"></i>Ativa&ccedil;&otilde;es &Uacute;ltimos 6 meses
							</div>
							<div class="card-body">
								<table class="table table-inverse" id="tableClientes">
									<thead class="thead-inverse">
										<tr>
											<th>#</th> 
											<th>Raz&atilde;o Social</th> 
											<th>Ativa&ccedil;&atilde;o</th>
										</tr>
									</thead>
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $clientesLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										 <tr data-href="<?php echo e(route('Cadastros.Clientes.Editar',$clientes->id)); ?>" style="cursor:pointer">
											<td><?php echo e($clientes->id); ?></td>
											<td><?php echo e($clientes->RazaoSocial); ?></td>
											<td><?php echo e(date('d/m/Y', strtotime($clientes->DataAtivacao))); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><p>Nenhum registro encontrado</p></td>
										</tr>										
									<?php endif; ?>
									</tbody>
								</table>
								
							</div>								
                        </div>
                    </div>
				</div> <!-- row -->
            </div>
		</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/fullcalendar/css/fullcalendar.min.css')); ?>"/>
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/fullcalendar/css/fullcalendar.print.min.css')); ?>" media="print"/>
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/calendar_custom.css')); ?>"/>
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
.fc-toolbar {
  margin: 0; !important}
 </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/lang/pt-br.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/fullcalendar/js/locales-all.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/pluginjs/calendarcustom.js')); ?>"></script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>

<script>
$(document).ready(function() {
	var groupColumn = 0;
    var table = $('#datatable').DataTable({
		"searching": false,
		"bInfo": false,
		"paging": false,
		"lengthChange": false,
		"autoWidth": false, //faz o auto ajuste do grid na tela
		"lengthChange": false,
		"ordering": false,
		"columnDefs": [
            { "visible": false, "targets": groupColumn	}
        ],
		"createdRow": function ( row, data, index ) {
			if ( data[3] == 'Crítico'){	
                $('td', row).eq(2).addClass('highlight');
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
                        '<tr class="group"><td colspan="4">'+group+'</td></tr>'
                    );
                    last = group;
                }
            } );
        }

    });
	$('#tableClientes tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });			
	$('#datatable tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });	
	$('#tableChamados tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });	
	$('.calendar').css('font-size','8px !important');
});
</script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/pages/calendar_mini.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/index.blade.php ENDPATH**/ ?>