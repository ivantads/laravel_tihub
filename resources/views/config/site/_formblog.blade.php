				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tId','#:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row {{ $errors->has('tTitulo') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tTitulo','T&iacute;tulo:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tTitulo','',['class' => 'form-control','placeholder' => '','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tTitulo') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tDescricaoB') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tDescricaoB','Descri&ccedil;&atilde;o:') !!}</div>
					 <div class="col-lg-8">{!! Form::textarea('tDescricaoB','',['class' => 'form-control','required'=>'required','rows' => 5, 'cols' => 5]) !!}</div>
					 <small class="text-danger">{{ $errors->first('tDescricaoB') }}</small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tOrigem','Origem:') !!}</div>
					 <div class="col-lg-3">{!! Form::text('tOrigem','INOVAFARMA',['class' => 'form-control']) !!}</div>
                  </div>				  
				  <div class="form-group row {{ $errors->has('tURL') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tURL','Caminho URL:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tURL','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tURL') }}</small>
                  </div>				  
				  <div class="form-group row {{ $errors->has('tData') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tData','Data:') !!}</div>
					 <div class="col-lg-3">{!! Form::date('tData','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tData') }}</small>
                  </div>	
				  <div class="form-group row {{ $errors->has('tURLImagem') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tURLImagem','URL Imagem:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tURLImagem','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tURLImagem') }}</small>
                  </div>	
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

