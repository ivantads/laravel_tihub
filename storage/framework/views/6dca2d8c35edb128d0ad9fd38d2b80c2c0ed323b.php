				  <?php echo csrf_field(); ?>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tCanal','Canal #:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tCanal','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tHuggyID','Huggy ID:'); ?></div>
					 <div class="col-lg-3"><?php echo Form::text('tHuggyID','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('HuggyName') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tHuggyName','Nome Contato:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tHuggyName','',['class' => 'form-control','placeholder' => '','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('HuggyName')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tEmpresa') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tEmpresa','Empresa:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::select('tEmpresa', $clientesLista, null, ['class' => 'empresa-show-search form-control','placeholder' => 'Selecione a Empresa','onkeyup' => 'upper(this)']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tEmpresa')); ?></small>
                  </div>
				<div class="clearfix"></div>
                <div class="ln_solid"></div>
<?php /**PATH /home/tihub/laravel/resources/views/huggy/_formvincularatendimento.blade.php ENDPATH**/ ?>