				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tId','#:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tTitulo') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tTitulo','T&iacute;tulo:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tTitulo','',['class' => 'form-control','placeholder' => '','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tTitulo')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tDescricaoB') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tDescricaoB','Descri&ccedil;&atilde;o:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::textarea('tDescricaoB','',['class' => 'form-control','required'=>'required','rows' => 5, 'cols' => 5]); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tDescricaoB')); ?></small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tOrigem','Origem:'); ?></div>
					 <div class="col-lg-3"><?php echo Form::text('tOrigem','INOVAFARMA',['class' => 'form-control']); ?></div>
                  </div>				  
				  <div class="form-group row <?php echo e($errors->has('tURL') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tURL','Caminho URL:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tURL','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tURL')); ?></small>
                  </div>				  
				  <div class="form-group row <?php echo e($errors->has('tData') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tData','Data:'); ?></div>
					 <div class="col-lg-3"><?php echo Form::date('tData','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tData')); ?></small>
                  </div>	
				  <div class="form-group row <?php echo e($errors->has('tURLImagem') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tURLImagem','URL Imagem:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tURLImagem','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tURLImagem')); ?></small>
                  </div>	
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

<?php /**PATH /home/tihub/laravel/resources/views/config/site/_formblog.blade.php ENDPATH**/ ?>