				  @csrf
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tId','#:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row {{ $errors->has('tVersao') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tVersao','Vers&atilde;o:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tVersao','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tVersao') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tOcorrencia') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tOcorrencia','Detalhes da Ocorr&ecirc;ncia:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tOcorrencia','',['class' => 'form-control','placeholder' => 'Detalhes da Ocorr&ecirc;ncia','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tOcorrencia') }}</small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tChamado','Nr. Chamado:') !!}</div>
					 <div class="col-lg-2">{!! Form::number('tChamado','',['class' => 'form-control']) !!}</div>
                  </div>				  
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tVersaoOK','Vers&atilde;o Corrigida:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tVersaoOK','',['class' => 'form-control']) !!}</div>
                  </div>					  
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tTipoErro','Tipo do Erro:') !!}</div>
					 <div class="col-lg-4">{!! Form::select('tTipoErro', array('0' => 'Erro Crítico','1' => 'Esporádico','2' => 'Versão Estável'), null, ['class' => 'form-control']) !!}</div>
                  </div>				  
                <div class="clearfix"></div>
                <div class="ln_solid"></div>

