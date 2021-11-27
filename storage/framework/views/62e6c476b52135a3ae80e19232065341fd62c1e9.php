				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tId','#:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>				  
				  <div class="form-group row <?php echo e($errors->has('tNomeCliente') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tNomeCliente','Nome Cliente:'); ?></div>
					 <div class="col-lg-4"><?php echo Form::text('tNomeCliente','',['class' => 'form-control','placeholder' => '','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tNomeCliente')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tImgCliente') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tImgCliente','Foto:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::file('tImgCliente',['class' => 'file-loading','id' => 'tLogo','accept' => 'image/*','required'=>'required','disabled' => 'disabled']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tImgCliente')); ?>Funcionalidade ainda não disponível</small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tCargo') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tCargo','Cargo:'); ?></div>
					 <div class="col-lg-4"><?php echo Form::text('tCargo','',['class' => 'form-control']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tCargo')); ?></small>
                  </div>				  
				  <div class="form-group row <?php echo e($errors->has('tDepoimento') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tDepoimento','Depoimento:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::textarea('tDepoimento','',['class' => 'form-control','placeholder' => '','required'=>'required','rows' => 10]); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tDepoimento')); ?></small>
                  </div>				  
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

<?php /**PATH /home/tihub/laravel/resources/views/config/site/_formdepoimento.blade.php ENDPATH**/ ?>