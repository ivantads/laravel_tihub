


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
                                <i class="fa fa-bell-o"></i> Novos contatos via SITE
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body padding">
                                <div class="feed">
                                  <ul>
								  <?php $__empty_1 = true; $__currentLoopData = $contatosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li style="cursor:pointer" data-toggle="tooltip" data-placement="top" title="Clique para assumir esse contato!" onClick="confirm('Tem certeza que deseja assumir esse contato?\n<?php echo e($contato->AssuntoX); ?>: <?php echo e($contato->NomeCompleto); ?> - <?php echo e($contato->NomeFarmacia); ?>');">
                                      <span>
                                        <img src="../images/mail.png" alt="text_image" class="rounded-circle img-fluid adjust_feeds_img"/>
                                      </span>
                                      <h5><?php echo e($contato->AssuntoX); ?>: <?php echo e($contato->NomeCompleto); ?> - <?php echo e($contato->NomeFarmacia); ?></h5>
                                      <p><strong>Melhor hor&aacute;rio para contato:</strong> <?php echo e($contato->MelhorHorario); ?> <strong>| Telefone:</strong> <?php echo e($contato->Telefone); ?> <strong>| E-mail:</strong> <?php echo e($contato->Email); ?> </p>
                                      <i><?php echo e($contato->Tempo); ?></i>
                                    </li>
								  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								    <li>
									  <p>Nenhum novo contato por aqui</p>
									</li>
								  <?php endif; ?>
								  </ul>		
								</div>			
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
        <!--</div>-->
	
			

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/contato.css')); ?>"/>
 <!--<link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/tipso/css/tipso.min.css')); ?>"/>-->
  <style>
  .adjust_feeds_img {
      width: 35px;
      height: 35px;
  }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
 <!--<script type="text/javascript" src="<?php echo e(asset('assets/vendors/tipso/js/tipso.min.js')); ?>"></script>-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/contatos/index.blade.php ENDPATH**/ ?>