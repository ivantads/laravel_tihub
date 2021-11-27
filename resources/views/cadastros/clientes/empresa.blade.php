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
                                <i class="fa fa-edit"></i> Novo Cliente
								<a class="btn btn-info float-right" href="{{route('Cadastros.Clientes')}}">Voltar</a>
                                </div>
								  @if(count($errors))
								      <div class="alert alert-danger">
								  	      <i class="fa fa-ban"></i> Whoops!!</br>Houve alguns problemas ao salvar este formul&aacute;rio.
								  	      <br/>
								      </div>
								  @endif
								  @if (session()->has('success'))
								      <div class="alert alert-success">
								          <i class="fa fa-check"></i> Sucesso!</br>
										  @if(is_array(session()->get('success')))
								              @foreach (session()->get('success') as $message)
								                  {{ $message }}
								              @endforeach
								          @else
								              {{ session()->get('success') }}
								          @endif
								      </div>
								  @endif	
								  {!! Form::open(['route' => 'Cadastros.Clientes.Salvar', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
									@include('cadastros.clientes._form')
								  {!! Form::close() !!}
						    </div>
						</div>
					</div>
				</div>
			</div>	
@stop