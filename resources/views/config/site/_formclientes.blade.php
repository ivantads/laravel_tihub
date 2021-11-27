				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tId','#:') !!}</div>
					 <div class="col-lg-2">{!! Form::text('tId','',['class' => 'form-control','disabled' => 'disabled']) !!}</div>
                  </div>
				  <div class="form-group row {{ $errors->has('tEmpresa') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tEmpresa','Nome Cliente:') !!}</div>
					 <div class="col-lg-4">{!! Form::text('tEmpresa','',['class' => 'form-control','placeholder' => '','required'=>'required']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tEmpresa') }}</small>
                  </div>
				  <div class="form-group row {{ $errors->has('tLogo') ? ' has-error' : '' }}">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tLogo','Logotipo:') !!}</div>
					 <div class="col-lg-8">{!! Form::file('tLogo',['class' => 'file-loading','id' => 'tLogo','accept' => 'image/*','required'=>'required','disabled' => 'disabled']) !!}</div>
					 <small class="text-danger">{{ $errors->first('tLogo') }}Funcionalidade ainda não disponível</small>
                  </div>
				  <div class="form-group row">
				     <div class="col-lg-3 text-lg-right">{!! Form::label('tSite','Site:') !!}</div>
					 <div class="col-lg-8">{!! Form::text('tSite','',['class' => 'form-control']) !!}</div>
                  </div>				  
				<div class="clearfix"></div>
                <div class="ln_solid"></div>

