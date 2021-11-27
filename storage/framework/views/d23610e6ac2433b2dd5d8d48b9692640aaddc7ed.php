				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tId','#:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tEmpresa') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tEmpresa','Nome Cliente:'); ?></div>
					 <div class="col-lg-4"><?php echo Form::text('tEmpresa','',['class' => 'form-control','placeholder' => '','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tEmpresa')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tLogo') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tLogo','Logotipo:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::file('tLogo',['class' => 'file-loading','id' => 'tLogo','accept' => 'image/*','required'=>'required','disabled' => 'disabled']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tLogo')); ?>Funcionalidade ainda não disponível</small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tSite','Site:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tSite','',['class' => 'form-control']); ?></div>
                  </div>				  
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

<?php /**PATH /home/tihub/laravel/resources/views/config/site/_formclientes.blade.php ENDPATH**/ ?>