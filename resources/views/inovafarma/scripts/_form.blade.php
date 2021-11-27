				  @csrf
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tId','#:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row {{ $errors->has('tDescricao') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tDescricao','Descri&ccedil;&atilde;o do Script:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tDescricao','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tDescricao') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tInformacoes') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tInformacoes','Informa&ccedil;&otilde;es:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tInformacoes','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tInformacoes') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tScript') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tScript','C&oacute;digo Script:') !!}</div>
					 <div class="col-lg-8">{!! Form::textarea('tScript','',['class' => 'form-control','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tScript') }}</small>
                  </div>				  
                <div class="clearfix"></div>
                <div class="ln_solid"></div>

