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
                                <i class="fa fa-edit"></i> Manuten&ccedil;&atilde;o de contratos
								<a class="btn btn-success float-right" role="button" aria-pressed="true" href="<?php echo e(Route('contratos.create')); ?>">Adicionar Contrato</a>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body card_block_top_align ">
                                <table class="table table-striped" id="datatable">
                                  <thead>
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Tipo</th>
									  <th>Nome</th>
                        			  <th>Vers&atilde;o</th>
									  <th>Validade</th>
                                      <th>Criado por</th>
                                      <th>Data cria&ccedil;&atilde;o</th>
                        			  <th>Alterado por</th>
                        			  <th>Data altera&ccedil;&atilde;o</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                        		  <?php $__currentLoopData = $contratosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-href="<?php echo e(route('contratos.edit',$registro->id)); ?>" style="cursor:pointer">
                                      <td><?php echo e($registro->id); ?></td>
                                      <td><?php echo e($registro->Tipo); ?></td>
									  <td><?php echo e($registro->NomeContrato); ?></td>
                                      <td><?php echo e($registro->Versao); ?></td>
									  <td><?php echo e(date('d/m/Y', strtotime($registro->Validade))); ?></td>
                                      <td><?php echo e($registro->UserCreate); ?></td>
                        			  <td><?php echo e(date('d/m/Y', strtotime($registro->created_at))); ?></td>
                        			  <td><?php echo e($registro->UserUpdate); ?></td>
                        			  <td><?php echo e(date('d/m/Y H:i:s', strtotime($registro->updated_at))); ?></td>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
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
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/config/contratos/index.blade.php ENDPATH**/ ?>