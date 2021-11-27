<?php $__env->startSection('title'); ?>
    ADMIN 
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <section class="outer">
    <div class="inner bg-container">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
		  <?php if(count($errors)): ?>
		      <div class="alert alert-danger">
		  	      <strong>Whoops!</strong> Houve alguns problemas ao salvar este formul&acute;rio.
		  	      <br/>
		      </div>
		  <?php endif; ?>
		  <?php if(session()->has('success')): ?>
		      <div class="alert alert-success">
		          <?php if(is_array(session()->get('success'))): ?>
		          <ul>
		              <?php $__currentLoopData = session()->get('success'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                  <li><?php echo e($message); ?></li>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          </ul>
		          <?php else: ?>
		              <?php echo e(session()->get('success')); ?>

		          <?php endif; ?>
		      </div>
		  <?php endif; ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dados da Empresa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
			
            <?php echo Form::open(['route' => ['Projetos.update',$projetosDados->id_projetos], 'role' => 'form', 'enctype' => 'multipart/form-data']); ?>

                    <?php echo method_field('PUT'); ?>
                    <?php echo $__env->make('projetos._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo Form::close(); ?>

          </div>
          <!-- /.general form elements -->
        </div>
        <!-- /.left column -->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/projetos/editar.blade.php ENDPATH**/ ?>