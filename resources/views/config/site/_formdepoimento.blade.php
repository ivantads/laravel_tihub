				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tId','#:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>				  
				  <div class="form-group row {{ $errors->has('tNomeCliente') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tNomeCliente','Nome Cliente:') !!}</div>
					 <div class="col-lg-4">{!! Form::text('tNomeCliente','',['class' => 'form-control','placeholder' => '','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tNomeCliente') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tImgCliente') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tImgCliente','Foto:') !!}</div>
					 <div class="col-lg-8">{!! Form::file('tImgCliente',['class' => 'file-loading','id' => 'tLogo','accept' => 'image/*','required'=>'required','disabled' => 'disabled']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tImgCliente') }}Funcionalidade ainda não disponível</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tCargo') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tCargo','Cargo:') !!}</div>
					 <div class="col-lg-4">{!! Form::text('tCargo','',['class' => 'form-control']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tCargo') }}</small>
                  </div>				  
				  <div class="form-group row {{ $errors->has('tDepoimento') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tDepoimento','Depoimento:') !!}</div>
					 <div class="col-lg-8">{!! Form::textarea('tDepoimento','',['class' => 'form-control','placeholder' => '','required'=>'required','rows' => 10]) !!}</div>
					 <small class="text-danger">{{ $errors->first('tDepoimento') }}</small>
                  </div>				  
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

