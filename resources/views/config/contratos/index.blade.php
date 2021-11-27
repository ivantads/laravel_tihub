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
                                <i class="fa fa-edit"></i> Manuten&ccedil;&atilde;o de contratos
								<a class="btn btn-success float-right" role="button" aria-pressed="true" href="{{ Route('contratos.create') }}">Adicionar Contrato</a>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body card_block_top_align ">
                                <table class="table table-striped" id="datatable">
                                  <thead>
                                    <tr>
                                      <th style="width: 10px">#</th>
                                      <th>Tipo</th>
									  <th>Nome</th>
                        			  <th>Vers&atilde;o</th>
									  <th>Validade</th>
                                      <th>Criado por</th>
                                      <th>Data cria&ccedil;&atilde;o</th>
                        			  <th>Alterado por</th>
                        			  <th>Data altera&ccedil;&atilde;o</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                        		  @foreach($contratosLista as $registro)
                                    <tr data-href="{{ route('contratos.edit',$registro->id)}}" style="cursor:pointer">
                                      <td>{{ $registro->id }}</td>
                                      <td>{{ $registro->Tipo }}</td>
									  <td>{{ $registro->NomeContrato }}</td>
                                      <td>{{ $registro->Versao }}</td>
									  <td>{{ date('d/m/Y', strtotime($registro->Validade)) }}</td>
                                      <td>{{ $registro->UserCreate }}</td>
                        			  <td>{{ date('d/m/Y', strtotime($registro->created_at)) }}</td>
                        			  <td>{{ $registro->UserUpdate }}</td>
                        			  <td>{{ date('d/m/Y H:i:s', strtotime($registro->updated_at)) }}</td>
                                    </tr>
                                  @endforeach
                        		  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
@stop

@section('js')
<script>
	/*
	/*Configuração da link da table
	*/
	$(document).ready(function(){
		$('#datatable tbody').on( 'click', 'tr', function () {  
			window.location = $(this).data('href');
		});
	});  
</script>
@stop