				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tId','#:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tIcon','Icone:') !!}</div>
					 <div class="col-lg-3">{!! Form::text('tIcon','',['class' => 'form-control']) !!}</div>
                  </div>
				  <div class="form-group row {{ $errors->has('tServico') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tServico','Servi&ccedil;o:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tServico','',['class' => 'form-control','placeholder' => '','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tServico') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tDescricao') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tDescricao','Descri&ccedil;&atilde;o:') !!}</div>
					 <div class="col-lg-8">{!! Form::textarea('tDescricao','',['class' => 'form-control','placeholder' => '','required'=>'required','rows' => 10]) !!}</div>
					 <small class="text-danger">{{ $errors->first('tDescricao') }}</small>
                  </div>
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

