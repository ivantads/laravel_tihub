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
                                <i class="fa fa-download"></i> Aplicativos Diversos
                              </div>
                              <div class="card-body p-0" id="tabs">
		                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="nav-pbm-tab" data-toggle="pill" href="#nav-pbm" role="tab" aria-controls="nav-pbm" aria-selected="true"><i class="fa fa-medkit"></i> PBMs</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-impressoras-tab" data-toggle="pill" href="#nav-impressoras" role="tab" aria-controls="nav-impressoras" aria-selected="false"><i class="fa fa-print"></i> IMPRESSORAS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-bancodados-tab" data-toggle="pill" href="#nav-bancodados" role="tab" aria-controls="nav-bancodados" aria-selected="false"><i class="fa fa-database"></i> BANCO DE DADOS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-etiquetas-tab" data-toggle="pill" href="#nav-etiquetas" role="tab" aria-controls="nav-etiquetas" aria-selected="false"><i class="fa fa-tags"></i> MODELOS ETIQUETAS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-utilitarios-tab" data-toggle="pill" href="#nav-utilitarios" role="tab" aria-controls="nav-utilitarios" aria-selected="false"><i class="fa fa-wrench"></i> UTILITÁRIOS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-windows-tab" data-toggle="pill" href="#nav-windows" role="tab" aria-controls="nav-windows" aria-selected="false"><i class="fa fa-windows"></i> ATUALIZAÇÕES WINDOWS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link btn-success" data-toggle="modal" data-target="#modalAplicativosADD" data-whatever="@mdo" href="#">+ ADICIONAR</a>
                                    </li>			  
                                </ul>
                                <div class="tab-content" id="custom-content-above-tabContent">		 
 		                          <div class="tab-pane fade show active" id="nav-pbm" role="tabpanel" aria-labelledby="nav-pbm-tab">	 
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Descri&ccedil;&atilde;o</th>
		                              	  <th>Download</th>
                                          <th>Link para Download</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                                @foreach($pbmLista as $registroPBM)
                                        <tr>
		                              	  <div id="{{ $registroPBM->id }}" style="display:none;">{{ $registroPBM->SiteDownload }}</div>
		                              	  <td>{{ $registroPBM->Versao }}</td>
                                          <td>{{ $registroPBM->Descricao }}</td>
                                          <td><a href="{{ $registroPBM->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroPBM->id }}')">Obter Link</button></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroPBM->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                                </tbody>
                                    </table>
		                          </div>
                                  <div class="tab-pane fade" id="nav-impressoras" role="tabpanel" aria-labelledby="nav-impressoras-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Descri&ccedil;&atilde;o</th>
		                              	  <th>Download</th>
                                          <th>Link para Download</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                                @foreach($impressoraLista as $registroImpressora)
                                        <tr>
		                              	  <div id="{{ $registroImpressora->id }}" style="display:none;">{{ $registroImpressora->SiteDownload }}</div>
		                              	  <td>{{ $registroImpressora->Versao }}</td>
                                          <td>{{ $registroImpressora->Descricao }}</td>
                                          <td><a href="{{ $registroImpressora->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroImpressora->id }}')">Obter Link</button></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroImpressora->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                                </tbody>
                                    </table>
                                  </div>
                                  <div class="tab-pane fade" id="nav-bancodados" role="tabpanel" aria-labelledby="nav-bancodados-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Descri&ccedil;&atilde;o</th>
		                              	  <th>Download</th>
                                          <th>Link para Download</th>
		                              	  <th>Link Externo</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                                @foreach($bancoLista as $registroBanco)
                                        <tr>
		                              	  <div id="{{ $registroBanco->id }}" style="display:none;">{{ $registroBanco->SiteDownload }}</div>
		                              	  <td>{{ $registroBanco->Versao }}</td>
                                          <td>{{ $registroBanco->Descricao }}</td>
                                          <td><a href="{{ $registroBanco->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroBanco->id }}')">Obter Link</button></td>
		                              	  <td>{{ $registroBanco->SiteDownload }}</td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroBanco->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                                </tbody>
                                    </table>
                                  </div>		   
                                  <div class="tab-pane fade" id="nav-etiquetas" role="tabpanel" aria-labelledby="nav-etiquetas-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Descri&ccedil;&atilde;o</th>
		                              	  <th>Download</th>
                                          <th>Link para Download</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                                @foreach($etiquetasLista as $registroEtiquetas)
                                        <tr>
		                              	<div id="{{ $registroEtiquetas->id }}" style="display:none;">{{ $registroEtiquetas->SiteDownload }}</div>
		                              	<td>{{ $registroEtiquetas->Versao }}</td>
                                          <td>{{ $registroEtiquetas->Descricao }}</td>
                                          <td><a href="{{ $registroEtiquetas->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroEtiquetas->id }}')">Obter Link</button></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroEtiquetas->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                                </tbody>
                                    </table>
                                  </div>								 
                                  <div class="tab-pane fade" id="nav-utilitarios" role="tabpanel" aria-labelledby="nav-utilitarios-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Descri&ccedil;&atilde;o</th>
		                              	  <th>Download</th>
                                          <th>Link para Download</th>
		                              	  <th>Link Externo</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                                @foreach($utilitariosLista as $registroUtilitarios)
                                        <tr>
		                              	  <div id="{{ $registroUtilitarios->id }}" style="display:none;">{{ $registroUtilitarios->SiteDownload }}</div>
		                              	  <td>{{ $registroUtilitarios->Versao }}</td>
                                          <td>{{ $registroUtilitarios->Descricao }}</td>
                                          <td><a href="{{ $registroUtilitarios->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroUtilitarios->id }}')">Obter Link</button></td>
		                              	  <td>{{ $registroUtilitarios->SiteDownload }}</td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroUtilitarios->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
		                                </tbody>
                                    </table>
                                  </div>
                                  <div class="tab-pane fade" id="nav-windows" role="tabpanel" aria-labelledby="nav-windows-tab">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">#</th>
                                          <th>Descri&ccedil;&atilde;o</th>
		                              	  <th>Download</th>
                                          <th>Link para Download</th>
								  		  <th>Link Externo</th>
										  <th width="5%">A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
		                                @foreach($windowsLista as $registroWindows)
                                        <tr>
		                              	<div id="{{ $registroWindows->id }}" style="display:none;">{{ $registroWindows->SiteDownload }}</div>
		                              	<td>{{ $registroWindows->Versao }}</td>
                                          <td>{{ $registroWindows->Descricao }}</td>
                                          <td><a href="{{ $registroWindows->SiteDownload }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroWindows->id }}')">Obter Link</button></td>
								  		<td>{{ $registroWindows->SiteCopyOficial }}</td>
										<td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="{{csrf_token()}}" data-id="{{$registroWindows->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
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
                <div class="modal fade in display_none" id="modalAplicativosADD" tabindex="-1" role="dialog" aria-hidden="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white">Adicionar novo Arquivo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      {!! Form::open(['route' => 'aplicativos.store', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
					  <div class="modal-body">
                        <!-- <div class="box-body">-->
                        <div class="card-body">
                          <div class="row">
		          		  <div class="form-group col-md-8">
                              {!! Form::label('tTipoDownload','Se&ccedil;&atilde;o:') !!}
		          			  {!! Form::select('tTipoDownload', array('1' => 'PBMs','2' => 'IMPRESSORAS','3' => 'BANCO DE DADOS','6' => 'MODELOS ETIQUETAS','4' => 'UTILITÁRIOS','5' => 'ATUALIZAÇÕES WINDOWS'),1, ['class' => 'form-control']) !!}
                            </div>		
		          		  <div class="form-group col-md-4">
                              {!! Form::label('tVersao','Vers&atilde;o:') !!}
		          			  {!! Form::text('tVersao','',['class' => 'form-control','placeholder' => 'Vers&atilde;o']) !!}
                            </div>	
                          </div>	
                          <div class="row">				  
		          		  <div class="form-group col-md-12 {{ $errors->has('tInscEstadual') ? ' has-error' : '' }}">
                              {!! Form::label('tDescricao','Descri&ccedil;&atilde;o:') !!}
		          			  {!! Form::text('tDescricao','',['class' => 'form-control','required' => 'required','placeholder' => 'Descri&ccedil;&atilde;o']) !!}
                            <small class="text-danger">{{ $errors->first('tDescricao') }}</small>  
						  </div>
                          </div>	
                          <div class="row">
		          		  <div class="form-group col-md-12">
                              {!! Form::label('tSiteCopyOficial','URL Externo:') !!}
		          			  {!! Form::text('tSiteCopyOficial','',['class' => 'form-control','placeholder' => 'URL']) !!}
                            </div>
                          </div>	
                          <div class="row">				  
		          		  <div class="form-group col-md-12">
                              {!! Form::label('tArquivo','Arquivo:') !!}
		          			  {!! Form::file('tArquivo',['class' => 'file-loading','id' => 'tArquivo']) !!}
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
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fileinput/css/fileinput.min.css')}}"/>
@stop  

@section('js')
  <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/fileinput.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/theme.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/pt-BR.js')}}"></script>
  <script>
    $('#tArquivo').fileinput({
        theme: "fa",
		language: "pt-BR",
		showUpload: false,
        browseClass: "btn btn-success",
        browseLabel: "Abrir Arquivo",
        removeClass: "btn btn-danger",
        removeLabel: "Deletar"
    });	
	$(document).ready(function() {
	  $(document).on('click', '.delAplicativo', function() {
		if (!confirm("Confirma exclusão do registro?")){
		  return false;
		}		  
		var id = $(this).data('id');
		var url = '{{ route("aplicativos.destroy", ":id") }}';
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