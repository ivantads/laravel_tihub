@extends('layouts/default')

{{-- Page title --}}
@section('title')
    ADMIN 
    @parent
@stop

{{-- Page content --}}
@section('content')

            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-white">
                                <i class="fa fa-edit"></i> Editar Contrato
								<a class="btn btn-info float-right" href="{{route('contratos.index')}}">Voltar</a>
                                </div>
								  @if(count($errors))
								      <div class="alert alert-danger">
								  	      <i class="fa fa-ban"></i> Whoops!!</br>Houve alguns problemas ao salvar este formul&aacute;rio!
								  	      <br/>
								      </div>
								  @endif
								  @if (session()->has('success'))
								      <div class="alert alert-success">
								          <i class="fa fa-check"></i> Sucesso!!</br>
										  @if(is_array(session()->get('success')))
								              @foreach (session()->get('success') as $message)
								                  {{ $message }}
								              @endforeach
								          @else
								              {{ session()->get('success') }}
								          @endif
								      </div>
								  @endif	
								  {!! Form::open(['route' => ['contratos.update',$contratoDados->id], 'id' => '_form','method' => 'PUT','role' => 'form', 'enctype' => 'multipart/form-data']) !!}
									@include('config.contratos._form')
								  {!! Form::close() !!}
						    </div>
						</div>
					</div>
				</div>
			</div>	

@stop
@section('js')
<script>
	$("#_form").submit(function(e) {
		var self = this;
		e.preventDefault();
	
		var contrato = $('#tcontrato').code();
		$("#tcontrato").html(contrato); //populate text area
		self.submit();
		return false; 
	});
</script>
@stop