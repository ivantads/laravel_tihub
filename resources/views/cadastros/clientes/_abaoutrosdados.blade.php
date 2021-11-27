				<div class="row">
					<div class="col-lg-9">
						<div class="row">
						<div class="form-group col-md-3">
							{!! Form::label('tMegaEmail','Mega: Configura&ccedil;&atilde;o de E-mail') !!}
							{!! Form::text('tMegaEmail',isset($clienteDados->MegaEmail) ? $clienteDados->MegaEmail : null,['class' => 'form-control','placeholder' => 'email@yopmail.com']) !!}
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('tMegaSenha','Mega: Senha') !!}
							{!! Form::text('tMegaSenha',isset($clienteDados->MegaSenha) ? $clienteDados->MegaSenha : null,['class' => 'form-control','placeholder' => '********']) !!}
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('tMegaChaveRecuperacao','Mega: Chave de Recupera&ccedil;&atilde;o') !!}
							{!! Form::text('tMegaChaveRecuperacao',isset($clienteDados->MegaChaveRecuperacao) ? $clienteDados->MegaChaveRecuperacao : null,['class' => 'form-control','placeholder' => 'Chave recupera&ccedil;&atilde;o disponibilizada pelo portal Mega']) !!}
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('tLogmeinRedeID','Rede LogMeIn (Senha: inovafarmaI)') !!}
							{!! Form::text('tLogmeinRedeID',isset($clienteDados->LogmeinRedeID) ? $clienteDados->LogmeinRedeID : null,['class' => 'form-control']) !!}
						</div>						
						</div>
						<div class="row">
						<div class="form-group col-md-3">
							{!! Form::label('tServidorUsuario','Servidor: Usu&aacute;rio') !!}
							{!! Form::text('tServidorUsuario',isset($clienteDados->ServidorUsuario) ? $clienteDados->ServidorUsuario : null,['class' => 'form-control','placeholder' => 'Usu&aacute;rio']) !!}
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('tServidorSenha','Servidor: Senha') !!}
							{!! Form::text('tServidorSenha',isset($clienteDados->ServidorSenha) ? $clienteDados->ServidorSenha : null,['class' => 'form-control','placeholder' => '********']) !!}
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('tServidorIP','Servidor: IP') !!}
							{!! Form::text('tServidorIP',isset($clienteDados->ServidorIP) ? $clienteDados->ServidorIP : null,['class' => 'form-control','placeholder' => '999.999.999.999']) !!}
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('tSqlSenha','SQL Server: Senha') !!}
							{!! Form::text('tSqlSenha',isset($clienteDados->SqlSenha) ? $clienteDados->SqlSenha : null,['class' => 'form-control','placeholder' => '********']) !!}
						</div>
						</div>
						<div class="row">
						<div class="form-group col-md-4">
							{!! Form::label('tNomeRT','Nome RT (SNGPC)') !!}
							{!! Form::text('tNomeRT',isset($clienteDados->NomeRT) ? $clienteDados->NomeRT : null,['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-4">
							{!! Form::label('tEmailRT','E-Mail RT') !!}
							{!! Form::text('tEmailRT',isset($clienteDados->EmailRT) ? $clienteDados->EmailRT : null,['class' => 'form-control','placeholder' => 'email@provedor.com']) !!}
						</div>
						<div class="form-group col-md-4">
							{!! Form::label('tSenhaRT','Senha RT') !!}
							{!! Form::text('tSenhaRT',isset($clienteDados->SenhaRT) ? $clienteDados->SenhaRT : null,['class' => 'form-control','placeholder' => '********']) !!}
						</div>
						</div>				
						<div class="row">
						<div class="form-group col-md-4">
							{!! Form::label('tServidorProcessador','Processador') !!}
							{!! Form::text('tServidorProcessador',isset($clienteDados->ServidorProcessador) ? $clienteDados->ServidorProcessador : null,['class' => 'form-control','list' => 'processadores']) !!}
							@if(isset($processadoresLista))
								<datalist id = "processadores">
									@forelse($processadoresLista as $processador)
									<option value ="{!! $processador->ServidorProcessador !!}">
									@empty
									
									@endforelse
								</datalist>
							@endif								
						</div>
						<div class="form-group col-md-2">
							{!! Form::label('tServidorMemoria','Mem&oacute;ria (GB)') !!}
							{!! Form::number('tServidorMemoria',isset($clienteDados->ServidorMemoria) ? $clienteDados->ServidorMemoria : null,['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('tNomeApresentacao','Nome Apresenta&ccedil;&atilde;o') !!}
							{!! Form::text('tNomeApresentacao',isset($clienteDados->NomeApresentacao) ? $clienteDados->NomeApresentacao : null,['class' => 'form-control']) !!}
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
							@if(isset($vinculosLista))
							@forelse($vinculosLista as $vinculos)
								<tr>
									<td> {!!$vinculos->name!!} </td>
									<td></td>
								</tr>
							@empty
							<p>sem dados para mostrar</p>
							@endforelse
							@endif
							</tbody>
						</table>
						</div>
					</div>
			    </div>