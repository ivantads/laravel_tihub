              @csrf
			  <div class="card-body">
                <div class="row">
				  <div class="form-group col-md-1">
                    {!! Form::label('tId','ID:') !!}
					{!! Form::text('tId',$contratoDados->id ?? old('tID'),['class' => 'form-control','readonly' => 'readonly']) !!}
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tTipo') ? ' has-error' : '' }}">
                    {!! Form::label('tTipo','Tipo:') !!}
					{!! Form::select('tTipo', array('1' => 'Proposta Comercial','2' => 'Outros'), isset($contratoDados->Tipo) ? $contratoDados->Tipo : 1, ['class' => 'form-control'])!!}
					<small class="text-danger">{{ $errors->first('tTipo') }}</small>	
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('tNomeContrato') ? ' has-error' : '' }}">
                    {!! Form::label('tNomeContrato','Nome Contrato:') !!}
					{!! Form::text('tNomeContrato',$contratoDados->NomeContrato ?? old('tNomeContrato'),['class' => 'form-control','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tNomeContrato') }}</small>	
                  </div>				  
                  <div class="form-group col-md-2 {{ $errors->has('tValidade') ? ' has-error' : '' }}">
                    {!! Form::label('tValidade','Validade:') !!}
					{!! Form::date('tValidade',isset($contratoDados->Validade) ? \Carbon\Carbon::createFromFormat('Y-m-d',$contratoDados->Validade) : null,['class' => 'form-control','data-date-format' => 'dd/mm/yyyy']) !!}
					<small class="text-danger">{{ $errors->first('tValidade') }}</small>	
                  </div>				  
				  <div class="form-group col-md-1">
                    {!! Form::label('tVersao','Vers&atilde;o:') !!}
					{!! Form::text('tVersao',$contratoDados->Versao ?? old('tVersao'),['class' => 'form-control']) !!}
                  </div>				
                </div>
                <div class="row"><!--summernote_editor -->
                  <div class="form-group col-md-12 {{ $errors->has('tContrato') ? ' has-error' : '' }}">
                    {!! Form::label('tContrato','Texto do Contrato:') !!}
					{!! Form::textarea('tContrato',$contratoDados->TextoContrato ?? old('tContrato'),['class' => 'form-control','id' => 'tinymce_full','rows' => 20, 'cols' => 54]) !!}
					<small class="text-danger">{{ $errors->first('tContrato') }}</small>	
                  </div>
                </div>
              </div>				
              <div class="card-footer bg-white">
                  {!! Form::submit('Gravar', ['class' => 'btn btn-success float-right']); !!}
			  </div>				

@section('css')
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}"/>
@stop

@section('js')
  <script type="text/javascript" src="{{asset('assets/vendors/tinymce/js/tinymce.min.js') }}"></script>
  <!-- InputMask -->
  <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.js') }}"></script>
  <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.date.extensions.js') }}"></script>
  <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.extensions.js') }}"></script>
  <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/jquery.inputmask.bundle.js') }}"></script> 
  <script>
	$(document).ready(function() {
		// TinyMCE Full
		tinymce.init({
			selector: "#tinymce_full",
			menubar: false,
			statusbar: false,
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor"
			],
			toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code print preview",
			image_advtab: true,
		});
		// InputMask
		$("input[id*='tVersao']").inputmask({
			mask: ['9.99'],
			keepStatic: true
		});	
		// Upper
		function upper(z){
			v = z.value.toUpperCase();
			z.value = v;
		}	
	});
  </script>
@stop			  