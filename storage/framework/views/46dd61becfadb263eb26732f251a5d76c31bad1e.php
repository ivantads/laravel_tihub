				<div class="row">
					<div class="col-lg-9">
						<div class="row">
						<div class="form-group col-md-3">
							<?php echo Form::label('tMegaEmail','Mega: Configura&ccedil;&atilde;o de E-mail'); ?>

							<?php echo Form::text('tMegaEmail',isset($clienteDados->MegaEmail) ? $clienteDados->MegaEmail : null,['class' => 'form-control','placeholder' => 'email@yopmail.com']); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('tMegaSenha','Mega: Senha'); ?>

							<?php echo Form::text('tMegaSenha',isset($clienteDados->MegaSenha) ? $clienteDados->MegaSenha : null,['class' => 'form-control','placeholder' => '********']); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('tMegaChaveRecuperacao','Mega: Chave de Recupera&ccedil;&atilde;o'); ?>

							<?php echo Form::text('tMegaChaveRecuperacao',isset($clienteDados->MegaChaveRecuperacao) ? $clienteDados->MegaChaveRecuperacao : null,['class' => 'form-control','placeholder' => 'Chave recupera&ccedil;&atilde;o disponibilizada pelo portal Mega']); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('tLogmeinRedeID','Rede LogMeIn (Senha: inovafarmaI)'); ?>

							<?php echo Form::text('tLogmeinRedeID',isset($clienteDados->LogmeinRedeID) ? $clienteDados->LogmeinRedeID : null,['class' => 'form-control']); ?>

						</div>						
						</div>
						<div class="row">
						<div class="form-group col-md-3">
							<?php echo Form::label('tServidorUsuario','Servidor: Usu&aacute;rio'); ?>

							<?php echo Form::text('tServidorUsuario',isset($clienteDados->ServidorUsuario) ? $clienteDados->ServidorUsuario : null,['class' => 'form-control','placeholder' => 'Usu&aacute;rio']); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('tServidorSenha','Servidor: Senha'); ?>

							<?php echo Form::text('tServidorSenha',isset($clienteDados->ServidorSenha) ? $clienteDados->ServidorSenha : null,['class' => 'form-control','placeholder' => '********']); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('tServidorIP','Servidor: IP'); ?>

							<?php echo Form::text('tServidorIP',isset($clienteDados->ServidorIP) ? $clienteDados->ServidorIP : null,['class' => 'form-control','placeholder' => '999.999.999.999']); ?>

						</div>
						<div class="form-group col-md-3">
							<?php echo Form::label('tSqlSenha','SQL Server: Senha'); ?>

							<?php echo Form::text('tSqlSenha',isset($clienteDados->SqlSenha) ? $clienteDados->SqlSenha : null,['class' => 'form-control','placeholder' => '********']); ?>

						</div>
						</div>
						<div class="row">
						<div class="form-group col-md-4">
							<?php echo Form::label('tNomeRT','Nome RT (SNGPC)'); ?>

							<?php echo Form::text('tNomeRT',isset($clienteDados->NomeRT) ? $clienteDados->NomeRT : null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-4">
							<?php echo Form::label('tEmailRT','E-Mail RT'); ?>

							<?php echo Form::text('tEmailRT',isset($clienteDados->EmailRT) ? $clienteDados->EmailRT : null,['class' => 'form-control','placeholder' => 'email@provedor.com']); ?>

						</div>
						<div class="form-group col-md-4">
							<?php echo Form::label('tSenhaRT','Senha RT'); ?>

							<?php echo Form::text('tSenhaRT',isset($clienteDados->SenhaRT) ? $clienteDados->SenhaRT : null,['class' => 'form-control','placeholder' => '********']); ?>

						</div>
						</div>				
						<div class="row">
						<div class="form-group col-md-4">
							<?php echo Form::label('tServidorProcessador','Processador'); ?>

							<?php echo Form::text('tServidorProcessador',isset($clienteDados->ServidorProcessador) ? $clienteDados->ServidorProcessador : null,['class' => 'form-control','list' => 'processadores']); ?>

							<?php if(isset($processadoresLista)): ?>
								<datalist id = "processadores">
									<?php $__empty_1 = true; $__currentLoopData = $processadoresLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $processador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<option value ="<?php echo $processador->ServidorProcessador; ?>">
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
									<?php endif; ?>
								</datalist>
							<?php endif; ?>								
						</div>
						<div class="form-group col-md-2">
							<?php echo Form::label('tServidorMemoria','Mem&oacute;ria (GB)'); ?>

							<?php echo Form::number('tServidorMemoria',isset($clienteDados->ServidorMemoria) ? $clienteDados->ServidorMemoria : null,['class' => 'form-control']); ?>

						</div>
						<div class="form-group col-md-6">
							<?php echo Form::label('tNomeApresentacao','Nome Apresenta&ccedil;&atilde;o'); ?>

							<?php echo Form::text('tNomeApresentacao',isset($clienteDados->NomeApresentacao) ? $clienteDados->NomeApresentacao : null,['class' => 'form-control']); ?>

						</div>
						</div>				

					</div>
					<div class="col-lg-3">
						<div class="row">
						<table class="table table-inverse">
							<thead class="thead-inverse">
								<tr>
									<th>Contatos vinculados a esse cliente</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php if(isset($vinculosLista)): ?>
							<?php $__empty_1 = true; $__currentLoopData = $vinculosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vinculos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td> <?php echo $vinculos->name; ?> </td>
									<td></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<p>sem dados para mostrar</p>
							<?php endif; ?>
							<?php endif; ?>
							</tbody>
						</table>
						</div>
					</div>
			    </div><?php /**PATH /home/tihub/laravel/resources/views/cadastros/clientes/_abaoutrosdados.blade.php ENDPATH**/ ?>