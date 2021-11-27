				  <?php echo csrf_field(); ?>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tId','#:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tDescricao') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tDescricao','Descri&ccedil;&atilde;o do Script:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tDescricao','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tDescricao')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tInformacoes') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tInformacoes','Informa&ccedil;&otilde;es:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tInformacoes','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tInformacoes')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tScript') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tScript','C&oacute;digo Script:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::textarea('tScript','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tScript')); ?></small>
                  </div>				  
                <div class="clearfix"></div>
                <div class="ln_solid"></div>

<?php /**PATH /home/tihub/laravel/resources/views/inovafarma/scripts/_form.blade.php ENDPATH**/ ?>