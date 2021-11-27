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
                                <i class="fa fa-edit"></i> Novo Cliente
								<a class="btn btn-info float-right" href="<?php echo e(route('Cadastros.Clientes')); ?>">Voltar</a>
                                </div>
								  <?php if(count($errors)): ?>
								      <div class="alert alert-danger">
								  	      <i class="fa fa-ban"></i> Whoops!!</br>Houve alguns problemas ao salvar este formul&aacute;rio.
								  	      <br/>
								      </div>
								  <?php endif; ?>
								  <?php if(session()->has('success')): ?>
								      <div class="alert alert-success">
								          <i class="fa fa-check"></i> Sucesso!</br>
										  <?php if(is_array(session()->get('success'))): ?>
								              <?php $__currentLoopData = session()->get('success'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								                  <?php echo e($message); ?>

								              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								          <?php else: ?>
								              <?php echo e(session()->get('success')); ?>

								          <?php endif; ?>
								      </div>
								  <?php endif; ?>	
								  <?php echo Form::open(['route' => 'Cadastros.Clientes.Salvar', 'role' => 'form', 'enctype' => 'multipart/form-data']); ?>

									<?php echo $__env->make('cadastros.clientes._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								  <?php echo Form::close(); ?>

						    </div>
						</div>
					</div>
				</div>
			</div>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/cadastros/clientes/empresa.blade.php ENDPATH**/ ?>