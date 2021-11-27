				  <?php echo csrf_field(); ?>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tId','#:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']); ?></div>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tChamado') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tChamado','Chamado:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::number('tChamado','',['class' => 'form-control','required'=>'required']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tChamado')); ?></small>
                  </div>
				  <div class="form-group row <?php echo e($errors->has('tTitulo') ? ' has-error' : ''); ?>">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tTitulo','T&iacute;tulo:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::text('tTitulo','',['class' => 'form-control','placeholder' => 'T&iacute;tulo do chamado','required'=>'required','onkeyup' => 'upper(this)']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tTitulo')); ?></small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tEmpresa','Empresa:'); ?></div>
					 <div class="col-lg-8"><?php echo Form::select('tEmpresa', $clientesLista, null, ['class' => 'empresa-show-search form-control','placeholder' => 'Selecione a Empresa','onkeyup' => 'upper(this)']); ?></div>
                  </div>				  
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tTipo','Tipo:'); ?></div>
					 <div class="col-lg-3"><?php echo Form::select('tTipo', array('1' => 'Atendimento','2' => 'Dúvida','3' => 'Incidente','4' => 'Melhoria'), null, ['class' => 'form-control']); ?></div>
                  </div>					  
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tStatus','Status:'); ?></div>
					 <div class="col-lg-3"><?php echo Form::select('tStatus', array('0' => 'Em Andamento','1' => 'Finalizado'), null, ['class' => 'form-control']); ?></div>
                  </div>					  
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tVersaoOK','Vers&atilde;o OK:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tVersaoOK','',['class' => 'form-control']); ?></div>
                  </div>				  
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right"><?php echo Form::label('tWI','Wi:'); ?></div>
					 <div class="col-lg-2"><?php echo Form::text('tWI','',['class' => 'form-control']); ?></div>
                  </div>				  
                <div class="clearfix"></div>
                <div class="ln_solid"></div>

<?php /**PATH /home/tihub/laravel/resources/views/inovafarma/chamados/_form.blade.php ENDPATH**/ ?>