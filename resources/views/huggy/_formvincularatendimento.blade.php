				  @csrf
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tCanal','Canal #:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tCanal','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tHuggyID','Huggy ID:') !!}</div>
					 <div class="col-lg-3">{!! Form::text('tHuggyID','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row {{ $errors->has('HuggyName') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tHuggyName','Nome Contato:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tHuggyName','',['class' => 'form-control','placeholder' => '','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('HuggyName') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tEmpresa') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tEmpresa','Empresa:') !!}</div>
					 <div class="col-lg-8">{!! Form::select('tEmpresa', $clientesLista, null, ['class' => 'empresa-show-search form-control','placeholder' => 'Selecione a Empresa','onkeyup' => 'upper(this)']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tEmpresa') }}</small>
                  </div>
				<div class="clearfix"></div>
                <div class="ln_solid"></div>
