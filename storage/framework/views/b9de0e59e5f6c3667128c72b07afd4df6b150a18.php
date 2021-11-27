				<div class="row">
				  <div class="form-group col-md-1">
                    <?php echo Form::label('tEmpresa','Empresa:'); ?>

					<?php echo Form::text('tEmpresa',isset($clienteDados->id) ? $clienteDados->id : null,['class' => 'form-control','readonly' => 'readonly']); ?>

                  </div>
                  <div class="form-group-btn col-md-2 <?php echo e($errors->has('tCnpj') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tCnpj','CNPJ:'); ?>

					<div class="input-group">					
					  <?php echo Form::text('tCnpj',isset($clienteDados->CNPJ) ? $clienteDados->CNPJ : null,['class' => 'form-control','placeholder' => 'CNPJ']); ?>

					  <span class="input-group-prepend input-group-btn">
						<button class="atualizaDadosInova btn btn-primary" id="tCnpj" data-toggle="tooltip" data-placement="top" type="button" title="Obter dados da Inovafarma!"> <i class="fa fa-refresh"></i></button>
					  </span>
					</div>
					<small class="text-danger"><?php echo e($errors->first('tCnpj')); ?></small>
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tInscEstadual') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tInscEstadual','Insc Estadual:'); ?>

					<?php echo Form::text('tInscEstadual',isset($clienteDados->IE) ? $clienteDados->IE : null,['class' => 'form-control','placeholder' => 'Inscri&ccedil;&atilde;o Estadual']); ?>

					<small class="text-danger"><?php echo e($errors->first('tInscEstadual')); ?></small>
                  </div>
                  <div class="form-group col-md-1 <?php echo e($errors->has('tContratoInova') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tContratoInova','Contrato:'); ?>

					<?php echo Form::text('tContratoInova',isset($clienteDados->ContratoInova) ? $clienteDados->ContratoInova : null,['class' => 'form-control']); ?>

					<small class="text-danger"><?php echo e($errors->first('tContratoInova')); ?></small>
                  </div>
                  <div class="form-group col-md-3 ">
					<?php echo Form::label('tFranquia','Franquia:'); ?>

					<?php echo Form::select('tFranquia', $franquiasLista, isset($clienteDados->FranquiaID) ? $clienteDados->FranquiaID : 0, ['class' => 'form-control']); ?>

                  </div>				  
                  <div class="form-group col-md-3 ">
					<?php echo Form::label('tRede','Rede:'); ?>

					<?php echo Form::select('tRede', $redesLista, isset($clienteDados->RedeID) ? $clienteDados->RedeID : 0, ['class' => 'form-control']); ?>

                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-5 <?php echo e($errors->has('tRazaoSocial') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tRazaoSocial','Raz&atilde;o:'); ?>

					<?php echo Form::text('tRazaoSocial',isset($clienteDados->RazaoSocial) ? $clienteDados->RazaoSocial : null,['class' => 'form-control','placeholder' => 'Raz&atilde;o Social','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tRazaoSocial')); ?></small>
                  </div>
                  <div class="form-group col-md-5 <?php echo e($errors->has('tFantasia') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tFantasia','Fantasia:'); ?>

					<?php echo Form::text('tFantasia',isset($clienteDados->NomeFantasia) ? $clienteDados->NomeFantasia : null,['class' => 'form-control','placeholder' => 'Fantasia','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tFantasia')); ?></small>
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tFG') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tFG','Filial:'); ?>

					<?php echo Form::select('tFG', array('1' => 'Matriz [Loja 1]','2' => 'Filial [Loja 2]','3' => 'Filial [Loja 3]','4' => 'Filial [Loja 4]','5' => 'Filial [Loja 5]','6' => 'Filial [Loja 6]','7' => 'Filial [Loja 7]','99' => 'Depósito'),	isset($clienteDados->Filial) ? $clienteDados->Filial : 1, ['class' => 'form-control','disabled' => 'disabled']); ?>

					<small class="text-danger"><?php echo e($errors->first('tFG')); ?></small>
                  </div>
                </div>	
                <div class="row">
                  <div class="form-group col-md-2 <?php echo e($errors->has('tCep') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tCep','CEP:'); ?>

					<?php echo Form::text('tCep',isset($clienteDados->CEP) ? $clienteDados->CEP : null,['class' => 'form-control','placeholder' => 'CEP']); ?>

					<small class="text-danger"><?php echo e($errors->first('tCep')); ?></small>
                  </div>				
                  <div class="form-group col-md-5 <?php echo e($errors->has('tEndereco') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tEndereco','Endere&ccedil;o:'); ?>

					<?php echo Form::text('tEndereco',isset($clienteDados->Endereco) ? $clienteDados->Endereco : null,['class' => 'form-control','placeholder' => 'Endere&ccedil;o','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tEndereco')); ?></small>				  
                  </div>
                  <div class="form-group col-md-1 <?php echo e($errors->has('tNum') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tNum','Num:'); ?>

					<?php echo Form::number('tNum',isset($clienteDados->Numero) ? $clienteDados->Numero : null,['class' => 'form-control','placeholder' => '99']); ?>

					<small class="text-danger"><?php echo e($errors->first('tNum')); ?></small>	
                  </div>
                  <div class="form-group col-md-4 <?php echo e($errors->has('tComplemento') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tComplemento','Complemento:'); ?>

					<?php echo Form::text('tComplemento',isset($clienteDados->Complemento) ? $clienteDados->Complemento : null,['class' => 'form-control','placeholder' => 'Complemento','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tComplemento')); ?></small>	
                  </div>
                </div>				
                <div class="row">
                  <div class="form-group col-md-6 <?php echo e($errors->has('tBairro') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tBairro','Bairro:'); ?>

					<?php echo Form::text('tBairro',isset($clienteDados->Bairro) ? $clienteDados->Bairro : null,['class' => 'form-control','placeholder' => 'Bairro','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tBairro')); ?></small>					  
                  </div>
                  <div class="form-group col-md-4 <?php echo e($errors->has('tCidade') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tCidade','Cidade:'); ?>

					<?php echo Form::select('tCidade', $cidadesLista, isset($clienteDados->CodigoIbge) ? $clienteDados->CodigoIbge : null, ['class' => 'city-show-search form-control','placeholder' => 'Selecione a Cidade','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tCidade')); ?></small>	
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tRepresentante') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tRepresentante','Representante:'); ?>

					<?php echo Form::select('tRepresentante', array('1' => 'TIHUB','2' => 'MVPRIME'), isset($clienteDados->Representante) ? $clienteDados->Representante : '1', ['class' => 'form-control','disabled' => 'disabled']); ?>

					<small class="text-danger"><?php echo e($errors->first('tRepresentante')); ?></small>	
                  </div>	
                </div>				
                <div class="row">
                  <div class="form-group col-md-4 <?php echo e($errors->has('tContato') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tContato','Contato:'); ?>

					<?php echo Form::text('tContato',isset($clienteDados->NomeContato) ? $clienteDados->NomeContato : null,['class' => 'form-control','placeholder' => 'Contato','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tContato')); ?></small>	
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tTelefone') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tTelefone','Telefone:'); ?>

					<?php echo Form::text('tTelefone',isset($clienteDados->TelefoneFixo) ? $clienteDados->TelefoneFixo : null,['class' => 'form-control','placeholder' => 'Fixo']); ?>

					<small class="text-danger"><?php echo e($errors->first('tTelefone')); ?></small>					  
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tCelular') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tCelular','Celular:'); ?>

					<?php echo Form::text('tCelular',isset($clienteDados->TelefoneCelular) ? $clienteDados->TelefoneCelular : null,['class' => 'form-control','placeholder' => 'Celular']); ?>

					<small class="text-danger"><?php echo e($errors->first('tCelular')); ?></small>	
                  </div>
                  <div class="form-group col-md-4 <?php echo e($errors->has('tSite') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tSite','Site:'); ?>

					<?php echo Form::text('tSite',isset($clienteDados->Site) ? $clienteDados->Site : null,['class' => 'form-control','placeholder' => 'Site','onkeyup' => 'lower(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tSite')); ?></small>	
                  </div>				  
                </div>				
                <div class="row">
                  <div class="form-group col-md-4 <?php echo e($errors->has('tEmail') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tEmail','E-mail:'); ?>

					<?php echo Form::email('tEmail',isset($clienteDados->Email) ? $clienteDados->Email : null,['class' => 'form-control','placeholder' => 'E-mail','onkeyup' => 'lower(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tEmail')); ?></small>	
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tSistema') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tSistema','Sistema:'); ?>

					<?php echo Form::select('tSistema', array('1' => 'INOVA FARMA','2' => 'PROCFIT'), isset($clienteDados->Sistema) ? $clienteDados->Sistema : 1, ['class' => 'form-control']); ?>

					<small class="text-danger"><?php echo e($errors->first('tSistema')); ?></small>
                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tSituacao') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tSituacao','Situa&ccedil;&atilde;o:'); ?>

					<?php echo Form::select('tSituacao', array('A' => 'Ativo','B' => 'Bloqueado','C' => 'Cancelado'), isset($clienteDados->Situacao) ? $clienteDados->Situacao : 'A', ['class' => 'form-control','disabled' => 'disabled']); ?>

					<small class="text-danger"><?php echo e($errors->first('tSituacao')); ?></small>				  
                  </div>
                  <div class="form-group col-md-2">
                    <?php echo Form::label('tCadastro','Cadastro:'); ?>

					<?php echo Form::text('tCadastro',isset($clienteDados->created_at) ? \Carbon\Carbon::parse($clienteDados->created_at)->format('d/m/Y H:i:s') : null,['class' => 'form-control','disabled' => 'disabled']); ?>

                  </div>
                  <div class="form-group col-md-2">
                    <?php echo Form::label('tAtivacao','Ativa&ccedil;&atilde;o:'); ?>

					<?php echo Form::text('tAtivacao',isset($clienteDados->DataAtivacao) ? \Carbon\Carbon::parse($clienteDados->DataAtivacao)->format('d/m/Y H:i:s') : null,['class' => 'form-control','disabled' => 'disabled']); ?>	
                  </div>				  
                </div>				
                <div class="row">
                  <div class="form-group col-md-12 <?php echo e($errors->has('tObservacao') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tObservacao','Observa&ccedil;&otilde;es:'); ?>

					<?php echo Form::textarea('tObservacao',isset($clienteDados->Observacao) ? $clienteDados->Observacao : null,['class' => 'form-control','rows' => 4, 'cols' => 54]); ?>

                  </div>
                </div>	<?php /**PATH /home/tihub/laravel/resources/views/cadastros/clientes/_abaprincipal.blade.php ENDPATH**/ ?>