        <!-- <div class="box-body">-->
          <div class="card-body">
		    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="nav-principal-tab" data-toggle="pill" href="#nav-principal" role="tab" aria-controls="nav-principal" aria-selected="true">PRINCIPAL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nav-tecnico-tab" data-toggle="pill" href="#nav-tecnico" role="tab" aria-controls="nav-tecnico" aria-selected="false">OUTROS DADOS</a>
                </li>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">		 
              <div class="tab-pane fade show active" id="nav-principal" role="tabpanel" aria-labelledby="nav-principal-tab">			
                <div class="row">
				  <div class="form-group col-md-1">
                    {!! Form::label('tEmpresa','Empresa:') !!}
					{!! Form::text('tEmpresa',isset($clienteDados->id) ? $clienteDados->id : null,['class' => 'form-control','readonly' => 'readonly']) !!}
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tCnpj') ? ' has-error' : '' }}">
                    {!! Form::label('tCnpj','CNPJ:') !!}
					{!! Form::text('tCnpj',isset($clienteDados->CNPJ) ? $clienteDados->CNPJ : null,['class' => 'form-control','placeholder' => 'CNPJ']) !!}
					<small class="text-danger">{{ $errors->first('tCnpj') }}</small>
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tInscEstadual') ? ' has-error' : '' }}">
                    {!! Form::label('tInscEstadual','Insc Estadual:') !!}
					{!! Form::text('tInscEstadual',isset($clienteDados->IE) ? $clienteDados->IE : null,['class' => 'form-control','placeholder' => 'Inscri&ccedil;&atilde;o Estadual']) !!}
					<small class="text-danger">{{ $errors->first('tInscEstadual') }}</small>
                  </div>
                  <div class="form-group col-md-3 ">
					{!! Form::label('tFranquia','Franquia:') !!}
					{!! Form::select('tFranquia', $franquiasLista, isset($clienteDados->FranquiaID) ? $clienteDados->FranquiaID : 0, ['class' => 'form-control']) !!}
                  </div>				  
                  <div class="form-group col-md-4 ">
					{!! Form::label('tRede','Rede:') !!}
					{!! Form::select('tRede', $redesLista, isset($clienteDados->RedeID) ? $clienteDados->RedeID : 0, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-5 {{ $errors->has('tRazaoSocial') ? ' has-error' : '' }}">
                    {!! Form::label('tRazaoSocial','Raz&atilde;o:') !!}
					{!! Form::text('tRazaoSocial',isset($clienteDados->RazaoSocial) ? $clienteDados->RazaoSocial : null,['class' => 'form-control','placeholder' => 'Raz&atilde;o Social','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tRazaoSocial') }}</small>
                  </div>
                  <div class="form-group col-md-5 {{ $errors->has('tFantasia') ? ' has-error' : '' }}">
                    {!! Form::label('tFantasia','Fantasia:') !!}
					{!! Form::text('tFantasia',isset($clienteDados->NomeFantasia) ? $clienteDados->NomeFantasia : null,['class' => 'form-control','placeholder' => 'Fantasia','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tFantasia') }}</small>
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tFG') ? ' has-error' : '' }}">
                    {!! Form::label('tFG','Filial:') !!}
					{!! Form::select('tFG', array('1' => 'Matriz [Loja 1]','2' => 'Filial [Loja 2]','3' => 'Filial [Loja 3]','4' => 'Filial [Loja 4]','5' => 'Filial [Loja 5]','6' => 'Filial [Loja 6]','7' => 'Filial [Loja 7]','99' => 'Depósito'),	isset($clienteDados->Filial) ? $clienteDados->Filial : 1, ['class' => 'form-control','disabled' => 'disabled']) !!}
					<small class="text-danger">{{ $errors->first('tFG') }}</small>
                  </div>
                </div>	
                <div class="row">
                  <div class="form-group col-md-2 {{ $errors->has('tCep') ? ' has-error' : '' }}">
                    {!! Form::label('tCep','CEP:') !!}
					{!! Form::text('tCep',isset($clienteDados->CEP) ? $clienteDados->CEP : null,['class' => 'form-control','placeholder' => 'CEP']) !!}
					<small class="text-danger">{{ $errors->first('tCep') }}</small>
                  </div>				
                  <div class="form-group col-md-5 {{ $errors->has('tEndereco') ? ' has-error' : '' }}">
                    {!! Form::label('tEndereco','Endere&ccedil;o:') !!}
					{!! Form::text('tEndereco',isset($clienteDados->Endereco) ? $clienteDados->Endereco : null,['class' => 'form-control','placeholder' => 'Endere&ccedil;o','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tEndereco') }}</small>				  
                  </div>
                  <div class="form-group col-md-1 {{ $errors->has('tNum') ? ' has-error' : '' }}">
                    {!! Form::label('tNum','Num:') !!}
					{!! Form::number('tNum',isset($clienteDados->Numero) ? $clienteDados->Numero : null,['class' => 'form-control','placeholder' => '99']) !!}
					<small class="text-danger">{{ $errors->first('tNum') }}</small>	
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('tComplemento') ? ' has-error' : '' }}">
                    {!! Form::label('tComplemento','Complemento:') !!}
					{!! Form::text('tComplemento',isset($clienteDados->Complemento) ? $clienteDados->Complemento : null,['class' => 'form-control','placeholder' => 'Complemento','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tComplemento') }}</small>	
                  </div>
                </div>				
                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('tBairro') ? ' has-error' : '' }}">
                    {!! Form::label('tBairro','Bairro:') !!}
					{!! Form::text('tBairro',isset($clienteDados->Bairro) ? $clienteDados->Bairro : null,['class' => 'form-control','placeholder' => 'Bairro','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tBairro') }}</small>					  
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('tCidade') ? ' has-error' : '' }}">
                    {!! Form::label('tCidade','Cidade:') !!}
					{!! Form::select('tCidade', $cidadesLista, isset($clienteDados->CodigoIbge) ? $clienteDados->CodigoIbge : null, ['class' => 'city-show-search form-control','placeholder' => 'Selecione a Cidade','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tCidade') }}</small>	
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tRepresentante') ? ' has-error' : '' }}">
                    {!! Form::label('tRepresentante','Representante:') !!}
					{!! Form::select('tRepresentante', array('1' => 'TIHUB','2' => 'MVPRIME'), isset($clienteDados->Representante) ? $clienteDados->Representante : '1', ['class' => 'form-control','disabled' => 'disabled'])!!}
					<small class="text-danger">{{ $errors->first('tRepresentante') }}</small>	
                  </div>	
                </div>				
                <div class="row">
                  <div class="form-group col-md-4 {{ $errors->has('tContato') ? ' has-error' : '' }}">
                    {!! Form::label('tContato','Contato:') !!}
					{!! Form::text('tContato',isset($clienteDados->NomeContato) ? $clienteDados->NomeContato : null,['class' => 'form-control','placeholder' => 'Contato','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tContato') }}</small>	
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tTelefone') ? ' has-error' : '' }}">
                    {!! Form::label('tTelefone','Telefone:') !!}
					{!! Form::text('tTelefone',isset($clienteDados->TelefoneFixo) ? $clienteDados->TelefoneFixo : null,['class' => 'form-control','placeholder' => 'Fixo']) !!}
					<small class="text-danger">{{ $errors->first('tTelefone') }}</small>					  
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tCelular') ? ' has-error' : '' }}">
                    {!! Form::label('tCelular','Celular:') !!}
					{!! Form::text('tCelular',isset($clienteDados->TelefoneCelular) ? $clienteDados->TelefoneCelular : null,['class' => 'form-control','placeholder' => 'Celular']) !!}
					<small class="text-danger">{{ $errors->first('tCelular') }}</small>	
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('tSite') ? ' has-error' : '' }}">
                    {!! Form::label('tSite','Site:') !!}
					{!! Form::text('tSite',isset($clienteDados->Site) ? $clienteDados->Site : null,['class' => 'form-control','placeholder' => 'Site','onkeyup' => 'lower(this)']) !!}
					<small class="text-danger">{{ $errors->first('tSite') }}</small>	
                  </div>				  
                </div>				
                <div class="row">
                  <div class="form-group col-md-4 {{ $errors->has('tEmail') ? ' has-error' : '' }}">
                    {!! Form::label('tEmail','E-mail:') !!}
					{!! Form::email('tEmail',isset($clienteDados->Email) ? $clienteDados->Email : null,['class' => 'form-control','placeholder' => 'E-mail','onkeyup' => 'lower(this)']) !!}
					<small class="text-danger">{{ $errors->first('tEmail') }}</small>	
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tSistema') ? ' has-error' : '' }}">
                    {!! Form::label('tSistema','Sistema:') !!}
					{!! Form::select('tSistema', array('1' => 'INOVA FARMA','2' => 'PROCFIT'), isset($clienteDados->Sistema) ? $clienteDados->Sistema : 1, ['class' => 'form-control']) !!}
					<small class="text-danger">{{ $errors->first('tSistema') }}</small>
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tSituacao') ? ' has-error' : '' }}">
                    {!! Form::label('tSituacao','Situa&ccedil;&atilde;o:') !!}
					{!! Form::select('tSituacao', array('A' => 'Ativo','B' => 'Bloqueado','C' => 'Cancelado'), isset($clienteDados->Situacao) ? $clienteDados->Situacao : 'A', ['class' => 'form-control','disabled' => 'disabled']) !!}
					<small class="text-danger">{{ $errors->first('tSituacao') }}</small>				  
                  </div>
                  <div class="form-group col-md-2">
                    {!! Form::label('tCadastro','Cadastro:') !!}
					{!! Form::text('tCadastro',isset($clienteDados->created_at) ? \Carbon\Carbon::parse($clienteDados->created_at)->format('d/m/Y H:i:s') : null,['class' => 'form-control','disabled' => 'disabled']) !!}
                  </div>
                  <div class="form-group col-md-2">
                    {!! Form::label('tAtivacao','Ativa&ccedil;&atilde;o:') !!}
					{!! Form::text('tAtivacao',isset($clienteDados->DataAtivacao) ? \Carbon\Carbon::parse($clienteDados->DataAtivacao)->format('d/m/Y H:i:s') : null,['class' => 'form-control','disabled' => 'disabled']) !!}	
                  </div>				  
                </div>				
                <div class="row">
                  <div class="form-group col-md-12 {{ $errors->has('tObservacao') ? ' has-error' : '' }}">
                    {!! Form::label('tObservacao','Observa&ccedil;&otilde;es:') !!}
					{!! Form::textarea('tObservacao',isset($clienteDados->Observacao) ? $clienteDados->Observacao : null,['class' => 'form-control','rows' => 4, 'cols' => 54,'onkeyup' => 'upper(this)']) !!}
                  </div>
                </div>	
              </div>
              <div class="tab-pane fade" id="nav-tecnico" role="tabpanel" aria-labelledby="nav-tecnico-tab">
                <div class="row">
				  <div class="form-group col-md-3">
                    {!! Form::label('tMegaEmail','Mega: Configura&ccedil;&atilde;o de E-mail') !!}
					{!! Form::text('tMegaEmail',isset($clienteDados->MegaEmail) ? $clienteDados->MegaEmail : null,['class' => 'form-control','placeholder' => 'email@yopmail.com']) !!}
                  </div>
                  <div class="form-group col-md-3">
                    {!! Form::label('tMegaSenha','Mega: Senha') !!}
					{!! Form::text('tMegaSenha',isset($clienteDados->MegaSenha) ? $clienteDados->MegaSenha : null,['class' => 'form-control','placeholder' => '********']) !!}
                  </div>
                  <div class="form-group col-md-6">
                    {!! Form::label('tMegaChaveRecuperacao','Mega: Chave de Recupera&ccedil;&atilde;o') !!}
					{!! Form::text('tMegaChaveRecuperacao',isset($clienteDados->MegaChaveRecuperacao) ? $clienteDados->MegaChaveRecuperacao : null,['class' => 'form-control','placeholder' => 'Chave recupera&ccedil;&atilde;o disponibilizada pelo portal Mega']) !!}
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
                  <div class="form-group col-md-6">
                    {!! Form::label('tSqlSenha','SQL Server: Senha') !!}
					{!! Form::text('tSqlSenha',isset($clienteDados->SqlSenha) ? $clienteDados->SqlSenha : null,['class' => 'form-control','placeholder' => '********']) !!}
                  </div>
                </div>				
              </div>								  
            </div>	
          </div>
          <div class="card-footer bg-white">
            {!! Form::submit('Gravar', ['class' => 'btn btn-success float-right']); !!}
		  </div>	

			  
@section('css')

@stop

@section('js')

<script type="text/javascript">
function upper(z){
    v = z.value.toUpperCase();
    z.value = v;
 }
function lower(z){
    l = z.value.toLowerCase();
    z.value = l;
  } 
</script>
@stop