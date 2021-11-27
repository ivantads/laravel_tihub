				  <div class="form-group row">
					 <div class="col-lg-1"></div>
					 <div class="col-lg-9"><h4>Primeiro, defina um nome para esse projeto:</div>
				  </div>
				  <div class="form-group row <?php echo e($errors->has('tProjeto') ? ' has-error' : ''); ?>">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-11"><?php echo Form::text('tProjeto','',['class' => 'form-control','required'=>'required','onkeyup' => 'upper(this)']); ?></div>
					 <small class="text-danger"><?php echo e($errors->first('tProjeto')); ?></small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-2"></div>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-9"><h4>Agora, adicione os dados do contato ...</h4></div>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-1 text-lg-right"><?php echo Form::label('tContato','Nome:'); ?></div>
					 <div class="col-lg-5"><?php echo Form::text('tContato','',['class' => 'form-control','onkeyup' => 'upper(this)']); ?></div>
					 <div class="col-lg-1 text-lg-right"><?php echo Form::label('tTelefone','Telefone:'); ?></div>
					 <div class="col-lg-4"><?php echo Form::text('tTelefone','',['class' => 'form-control']); ?></div>
                  </div>					  
				  <div class="form-group row">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-1 text-lg-right"><?php echo Form::label('tEmail','Email:'); ?></div>
					 <div class="col-lg-6"><?php echo Form::text('tEmail','',['class' => 'form-control','onkeyup' => 'lower(this)']); ?></div>
					 <div class="col-lg-1 text-lg-right"><?php echo Form::label('tObs','Obs:'); ?></div>
					 <div class="col-lg-3"><?php echo Form::text('tObs','',['class' => 'form-control','onkeyup' => 'upper(this)']); ?></div>

				  </div>					  
				  <div class="form-group row">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-9"><h4>... ou selecione um contato j&aacute; existente!</h4></div>
                  </div>				  
				  <div class="form-group row">
				     <div class="col-lg-1"></div>
					 <div class="col-lg-11"><?php echo Form::select('tContatos', $contatosLista, null, ['class' => 'contato-show-search form-control','placeholder' => 'Selecione o Contato','onkeyup' => 'upper(this)']); ?></div>
                  </div>				  
                <div class="clearfix"></div>
                <div class="ln_solid"></div><?php /**PATH /home/tihub/laravel/resources/views/crm/_formfase1.blade.php ENDPATH**/ ?>