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
                                <i class="fa fa-heartbeat"></i> Vers&otilde;es da Precis&atilde;o Sistemas
                              </div>
                              <div class="card-body p-0" id="tabs">
		                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="nav-inova-tab" data-toggle="pill" href="#nav-inova" role="tab" aria-controls="nav-inova" aria-selected="true"><i class="fa fa-desktop"></i> INOVAFARMA</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-service-tab" data-toggle="pill" href="#nav-service" role="tab" aria-controls="nav-service" aria-selected="false"><i class="fa fa-cogs"></i> SERVICE</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-importador-tab" data-toggle="pill" href="#nav-importador" role="tab" aria-controls="nav-importador" aria-selected="false"><i class="fa fa-magic"></i> IMPORTADOR</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-basedados-tab" data-toggle="pill" href="#nav-basedados" role="tab" aria-controls="nav-basedados" aria-selected="false"><i class="fa fa-database"></i> BASE DE DADOS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link btn-success" data-toggle="modal" data-target="#modalDownloadADD" data-whatever="@mdo" href="#">+ ADICIONAR</a> 
                                    </li>			  
                                </ul>
                                <div class="tab-content" id="custom-content-above-tabContent">		 
 		                          <div class="tab-pane fade show active" id="nav-inova" role="tabpanel" aria-labelledby="nav-inova-tab">	
 		                           <div class="card-body table-responsive p-0" style="height: 100%;">		  
                                    <table class="table table-striped table-head-fixed">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">Versão</th>
                                          <th>Descrição</th>
										  <th>Notas da Vers&atilde;o</th>
		                            	  <th>Download</th>
                                          <th>Link para Download</th>
		                            	  <th>Link do Github</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                              @foreach($inovaLista as $registroInova)
                                        <tr>
		                            	  <div id="{{ $registroInova->id }}" style="display:none;">{{ $registroInova->SiteDownload }}</div>
		                            	  <td>{{ $registroInova->Versao }}</td>
                                          <td>{{ $registroInova->Descricao }}</td>
										  <td><button class="btn btn-info" onclick="window.open('{{ $registroInova->NotaVersao }}','Inovafarma')">Visualizar</button></td>
                                          <td><a href="{{ $registroInova->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroInova->id }}')">Obter Link</button></td>
		                            	  <td>{{ $registroInova->SiteDownload }}</td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroInova->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                              </tbody>
                                    </table>
 		                           </div>			
		                          </div>
                                  <div class="tab-pane fade" id="nav-service" role="tabpanel" aria-labelledby="nav-service-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">Versão</th>
                                          <th>Descrição</th>
		                            	  <th>Download</th>
                                          <th>Link para Download</th>
		                            	  <th>Link do Github</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                              @foreach($serviceLista as $registroService)
                                        <tr>
		                            	  <div id="{{ $registroService->id }}" style="display:none;">{{ $registroService->SiteDownload }}</div>
		                            	  <td>{{ $registroService->Versao }}</td>
                                          <td>{{ $registroService->Descricao }}</td>
                                          <td><a href="{{ $registroService->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroService->id }}')">Obter Link</button></td>
		                            	  <td>{{ $registroService->SiteDownload }}</td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroService->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                              </tbody>
                                    </table>
                                   </div>
                                  <div class="tab-pane fade" id="nav-importador" role="tabpanel" aria-labelledby="nav-importador-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">Versão</th>
                                          <th>Descrição</th>
		                            	  <th>Download</th>
                                          <th>Link para Download</th>
		                            	  <th>Link do Github</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                              @foreach($importadorLista as $registroImportador)
                                        <tr>
		                            	  <div id="{{ $registroImportador->id }}" style="display:none;">{{ $registroImportador->SiteDownload }}</div>
		                            	  <td>{{ $registroImportador->Versao }}</td>
                                          <td>{{ $registroImportador->Descricao }}</td>
                                          <td><a href="{{ $registroImportador->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroImportador->id }}')">Obter Link</button></td>
		                            	  <td>{{ $registroImportador->SiteDownload }}</td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroImportador->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                              </tbody>
                                    </table>
                                   </div>
                                  <div class="tab-pane fade" id="nav-basedados" role="tabpanel" aria-labelledby="nav-basedados-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">Versão</th>
                                          <th>Descrição</th>
		                            	  <th>Download</th>
                                          <th>Link para Download</th>
		                            	  <th>Link do Github</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                              @foreach($baseLista as $registroBase)
                                        <tr>
		                            	  <div id="{{ $registroBase->id }}" style="display:none;">{{ $registroBase->SiteDownload }}</div>
		                            	  <td>{{ $registroBase->Versao }}</td>
                                          <td>{{ $registroBase->Descricao }}</td>
                                          <td><a href="{{ $registroBase->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroBase->id }}')">Obter Link</button></td>
		                            	  <td>{{ $registroBase->SiteDownload }}</td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroBase->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                              </tbody>
                                    </table>
                                  </div>		   
		                        </div><!-- /.nav-bar -->
							  </div>	
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>

                <!-- /.modal -->
                <div class="modal fade in display_none" id="modalDownloadADD" tabindex="-1" role="dialog" aria-hidden="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white">Adicionar nova vers&atilde;o</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      {!! Form::open(['route' => 'versoes.store', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
					  <div class="modal-body">
                        <!-- <div class="box-body">-->
                        <div class="card-body">
                          <div class="row">
				            <div class="form-group col-md-6">
                              {!! Form::label('tTipo','Tipo Download:') !!}
				          	  {!! Form::select('tTipo', array('1' => 'INOVAFARMA','2' => 'SERVICE','3' => 'IMPORTADOR','4' => 'BASE DE DADOS'),1, ['class' => 'form-control']) !!}
                            </div>		
				            <div class="form-group col-md-3">
                              {!! Form::label('tRelease','Release:') !!}
				          	  {!! Form::text('tRelease','',['class' => 'form-control','placeholder' => 'Release']) !!}
                            </div>	
				            <div class="form-group col-md-3">
                              {!! Form::label('tVersao','Vers&atilde;o:') !!}
				          	  {!! Form::text('tVersao','',['class' => 'form-control','placeholder' => 'Vers&atilde;o','required' => 'required']) !!}
                            </div>	
                          </div>	
                          <div class="row">				  
				            <div class="form-group col-md-12">
                              {!! Form::label('tDescricao','Descri&ccedil;&atilde;o:') !!}
				          	  {!! Form::text('tDescricao','',['class' => 'form-control','placeholder' => 'Descri&ccedil;&atilde;o','required' => 'required']) !!}
                            </div>
                          </div>	
                          <div class="row">				  
				            <div class="form-group col-md-12">
                              {!! Form::label('tNotas','Notas da Vers&atilde;o:') !!}
				          	  {!! Form::text('tNotas','',['class' => 'form-control','placeholder' => 'Link Notas Vers&atilde;o']) !!}
                            </div>
                          </div>							  
                          <div class="row">
				            <div class="form-group col-md-12">
                              {!! Form::label('tSite','URL:') !!}
				          	  {!! Form::text('tSite','',['class' => 'form-control','placeholder' => 'URL','required' => 'required']) !!}
                            </div>
                          </div>	
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
		          		{!! Form::button('Fechar', ['class' => 'btn btn-default','data-dismiss' => 'modal']); !!}
		          		{!! Form::submit('Adicionar', ['class' => 'btn btn-primary']); !!}
                      </div>
					{!! Form::close() !!}  
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

@stop
@section('css')

@stop  

@section('js')
  <script>
	$(document).ready(function() {
	  $(document).on('click', '.delVersoes', function() {
		if (!confirm("Confirma exclusão do registro?")){
		  return false;
		}		  
		var id = $(this).data('id');
		var url = '{{ route("versoes.destroy", ":id") }}';
		url = url.replace(':id', id);
		$.ajax({
            type: 'DELETE',
			url: url,
            data: {
				_token: $('input[name=_token]').val(),
				},
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			},
        });
      });
	});	  
  </script>
@stop