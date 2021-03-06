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
                                <i class="fa fa-edit"></i> Site - Configura&ccedil;&otilde;es
                              </div>
                              <!-- /.card-header -->
							  {{ csrf_field() }}
                              <div class="card-body card_block_top_align icon-list-demop-0" id="tabs">
		                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="nav-servicos-tab" data-toggle="pill" href="#nav-servicos" role="tab" aria-controls="nav-servicos" aria-selected="true"><i class="fa fa-wrench"></i> SERVI&Ccedil;OS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-depoimento-tab" data-toggle="pill" href="#nav-depoimento" role="tab" aria-controls="nav-depoimento" aria-selected="false"><i class="fa fa-comments-o"></i> DEPOIMENTOS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-clientesinova-tab" data-toggle="pill" href="#nav-clientesinova" role="tab" aria-controls="nav-clientesinova" aria-selected="false"><i class="fa fa-building-o"></i> CLIENTES INOVA</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="nav-blog-tab" data-toggle="pill" href="#nav-blog" role="tab" aria-controls="nav-blog" aria-selected="false"><i class="fa fa-rss-square"></i> BLOG</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="custom-content-above-tabContent">
								  <!-- SERVICOS -->
 		                          <div class="tab-pane fade show active" id="nav-servicos" role="tabpanel" aria-labelledby="nav-servicos-tab">	 
                                    <table class="table fa-icon">
                                      <thead>
                                        <tr>
                                          <th>Icone</th>
										  <th>Servi&ccedil;o</th>
                        		    	  <th>Descri&ccedil;&atilde;o</th>
								    	  <th>A&ccedil;&atilde;o</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        		      @foreach($servicosLista as $servico)
                                        <tr style="cursor:pointer">
                                          <td><i class="{{ $servico->Icone }} fa-2x"></i></td>
										  <td>{{ $servico->Servico }}</td>
								    	  <td>{{ $servico->Descricao }}</td>
                                          <td><button class="edit-servico-modal btn btn-info btn-labeled" data-placement="top" title="Editar" data-id="{{$servico->id}}" data-icone="{{$servico->Icone}}" data-servico="{{$servico->Servico}}" data-descricao="{{$servico->Descricao}}">
											  <span class="btn-label"><i class="fa fa-pencil"></i></span></button></td>
                                        </tr>
                                      @endforeach
                        		      </tbody>
                                    </table>
 		                          </div>
                                  <!--- responsive modal-->
                                  <div class="modal fade in display_none" id="editServicos" tabindex="-1" role="dialog" aria-hidden="false">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                  <h4 class="modal-title text-white">Editar Servi&ccedil;o</h4><!-- aqui -->
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="card-body m-t-35">
                                                      {!! Form::open(['id' => 'form-servico-edit','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']) !!}
                                                      @include('config.site._formservicos')
                                                      {!! Form::close() !!}
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                                  <button type="submit" data-dismiss="modal" class="btn btn-success actionBtn"><span id="footer_action_button" class='glyphicon'></span> Atualizar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END modal-->
								  <!-- END SERVICOS -->
								  
								  <!-- DEPOIMENTOS -->
								  <div class="tab-pane fade" id="nav-depoimento" role="tabpanel" aria-labelledby="nav-depoimento-tab">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>Foto</th>
                        		    	  <th>Cliente</th>
								    	  <th>Cargo</th>
										  <th>Depoimento</th>
										  <th width="5%"><button class="add-depoimento-modal btn btn-success" data-placement="top" title="Adicionar"><span class="btn-label"><i class="fa fa-plus"></i></span></button></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        		      @foreach($depoimentosLista as $depoimento)
                                        <tr style="cursor:pointer">
                                          <td><img src="../assets/img/testimonial/{{ $depoimento->ImageCliente }}" class="rounded-circle img-fluid pull-left adjust_depoimento_img" alt="Image"></td>
								    	  <td>{{ $depoimento->Cliente }}</td>
                                          <td>{{ $depoimento->Cargo }}</td>
										  <td>{{ $depoimento->Depoimento }}</td>
										  <td><button class="deleteDepoimento btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-id="{{$depoimento->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
                        		      </tbody>
                                    </table>
 		                          </div>	
                                  <!--- responsive modal-->
                                  <div class="modal fade in display_none" id="addDepoimento" tabindex="-1" role="dialog" aria-hidden="false">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                  <h4 class="modal-title text-white">Adicionar Depoimentos</h4><!-- aqui -->
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="card-body m-t-35">
                                                      {!! Form::open(['id' => 'form-logo-edit','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']) !!}
                                                      @include('config.site._formdepoimento')
                                                      {!! Form::close() !!}
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                                  <button type="submit" data-dismiss="modal" class="btn btn-success actionBtn"><span id="footer_action_button" class='glyphicon'></span> Adicionar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END modal-->
								  <!-- END DEPOIMENTOS -->
								  
								  <!-- CLIENTES -->
								  <div class="tab-pane fade" id="nav-clientesinova" role="tabpanel" aria-labelledby="nav-clientesinova-tab">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>Logo</th>
										  <th>Cliente</th>
                        		    	  <th>Site</th>
								    	  <th width="5%"><button class="add-logo-modal btn btn-success" data-placement="top" title="Adicionar"><span class="btn-label"><i class="fa fa-plus"></i></span></button></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        		      @foreach($logoLista as $logo)
                                        <tr style="cursor:pointer">
                                          <td><img src="../assets/img/brand-logos/{{ $logo->Logo }}" class="rounded-circle img-fluid pull-left adjust_cliente_img" alt="Image"></td>
										  <td>{{ $logo->Cliente }}</td>
								    	  <td>{{ $logo->Site }}</td>
								    	  <td><button class="deleteLogo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-id="{{$logo->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
                        		      </tbody>
                                    </table>
 		                          </div>								  
                                  <!--- responsive modal-->
                                  <div class="modal fade in display_none" id="addLogo" tabindex="-1" role="dialog" aria-hidden="false">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                  <h4 class="modal-title text-white">Adicionar Logo de Clientes</h4><!-- aqui -->
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="card-body m-t-35">
                                                      {!! Form::open(['id' => 'form-logo-edit','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']) !!}
                                                      @include('config.site._formclientes')
                                                      {!! Form::close() !!}
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                                  <button type="submit" data-dismiss="modal" class="btn btn-success actionBtn"><span id="footer_action_button" class='glyphicon'></span> Adicionar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END modal-->
								  <!-- END CLIENTES -->
								  
								  <!-- BLOG -->
								  <div class="tab-pane fade" id="nav-blog" role="tabpanel" aria-labelledby="nav-blog-tab">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>Data</th>
                        		    	  <th>Origem</th>
								    	  <th>Titulo</th>
										  <th width="5%"><button class="add-blog-modal btn btn-success" data-placement="top" title="Adicionar"><span class="btn-label"><i class="fa fa-plus"></i></span></button></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                        		      @foreach($blogLista as $blog)
                                        <tr style="cursor:pointer">
                                          <td>{{ date('d/m/Y', strtotime($blog->Data)) }}</td>
								    	  <td>{{ $blog->Origem }}</td>
                                          <td>{{ $blog->Titulo }}</td>
										  <td><button class="deleteBlog btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-id="{{$blog->id}}"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      @endforeach
                        		      </tbody>
                                    </table>
 		                          </div>								  
                                  <!--- responsive modal-->
                                  <div class="modal fade in display_none" id="addBlog" tabindex="-1" role="dialog" aria-hidden="false">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                  <h4 class="modal-title text-white">Adicionar Noticia Blog</h4><!-- aqui -->
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="card-body m-t-35">
                                                      {!! Form::open(['id' => 'form-blog-edit','role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'formModal']) !!}
                                                      @include('config.site._formblog')
                                                      {!! Form::close() !!}
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" data-dismiss="modal" class="btn btn-light"><span class='glyphicon glyphicon-remove'></span> Fechar</button>
                                                  <button type="submit" data-dismiss="modal" class="btn btn-success actionBtn"><span id="footer_action_button" class='glyphicon'></span> Adicionar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END modal-->
								  <!-- END BLOG -->
		                        </div><!-- /.nav-bar -->
							  </div>	
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>					
            </div>
@stop
@section('css')
  <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fileinput/css/fileinput.min.css')}}"/>
  <style>
  .adjust_cliente_img {
      width: 80px;
      height: 40px;
  }
  .adjust_depoimento_img {
      width: 45px;
      height: 45px;
  }    
  </style>
@stop
@section('js')
 <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/fileinput.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/theme.js')}}"></script>
 <script type="text/javascript" src="{{asset('assets/vendors/fileinput/js/pt-BR.js')}}"></script>
<script>
$(document).ready(function() {
	//SERVI??OS
    $(document).on('click', '.edit-servico-modal', function() {
        $('.actionBtn').addClass('edit');
		$('.formModal').show();
        $('#tId').val($(this).data('id'));
		$('#tIcon').val($(this).data('icone'));
		$('#tServico').val($(this).data('servico'));
		$('#tDescricao').val($(this).data('descricao'));
        $('#editServicos').modal('show');
    });  
   $('.modal-footer').on('click', '.edit', function() {
		$.ajax({
            type: 'POST',
            url: '{{route('Config.Site.EditarServico')}}',
            data: {
                _token: $('input[name=_token]').val(),
				id: $("#tId").val(),
				Descricao: $("#tDescricao").val(),
				Servico: $("#tServico").val(),
				Icone: $("#tIcon").val()
            },
            success: function(data) {
				location.reload();
            },
			error: function(data) { 
				alert(JSON.stringify(data));
			}		
        });
    });	
	//BLOG
	$(document).on('click', '.add-blog-modal', function() {
        $('.actionBtn').addClass('addBlog');
		$('.formModal').show();
        $('#addBlog').modal('show');
    });  
   $('.modal-footer').on('click', '.addBlog', function() {
		$.ajax({
            type: 'POST',
			url: '{{route('Config.Site.AdicionarBlog')}}',
            data: {
                _token: $('input[name=_token]').val(),
				id: $("#tId").val(),
				Titulo: $("#tTitulo").val(),
				Descricao: $("#tDescricaoB").val(),
				Origem: $("#tOrigem").val(),
				URL: $("#tURL").val(),
				Data: $("#tData").val(),
				Imagem: $("#tURLImagem").val()
            },
            success: function(data) {
				location.reload();
            },
			error: function(data) { 
				alert(JSON.stringify(data));
			}		
        });
    });	
    $(document).on('click', '.deleteBlog', function() {
		var id = $(this).data('id');
		$.ajax({
            type: 'POST',
            url: '{{route('Config.Site.DeletarBlog')}}',
            data: {
				_token: $('input[name=_token]').val(),
				id: id,
				},
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			},
        });
    });
	//CLIENTES INOVA
	$(document).on('click', '.add-logo-modal', function() {
        $('.actionBtn').addClass('add');
		$('.formModal').show();
        $('#addLogo').modal('show');
    });  
   $('.modal-footer').on('click', '.add', function() {
		//var fd = new FormData();
		//var files = $("#tLogo")[0].files[0];
		var filer = document.getElementById('tLogo').files[0];
		alert(filer);
		$.ajax({
            type: 'POST',
			url: '{{route('Config.Site.AdicionarLogo')}}',
			    contentType: false,
    processData: false,
            data: {
                _token: $('input[name=_token]').val(),
				id: $("#tId").val(),
				Logo2: filer,
				//Logo: $("#tLogo").val(),
				Cliente: $("#tEmpresa").val(),
				Site: $("#tSite").val()
            },
            success: function(data) {
				alert(JSON.stringify(data));
				location.reload();
            },
			error: function(data) { 
				alert(JSON.stringify(data));
			}		
        });
    });	
    $(document).on('click', '.deleteLogo', function() {
		var id = $(this).data('id');
		$.ajax({
            type: 'POST',
            url: '{{route('Config.Site.DeletarLogo')}}',
            data: {
				_token: $('input[name=_token]').val(),
				id: id,
				},
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			},
        });
    });	
    $('#tLogo').fileinput({
        theme: "fa",
		language: "pt-BR",
		showUpload: false,
        previewFileType: "image",
        browseClass: "btn btn-success",
        browseLabel: "Abrir Imagem",
        removeClass: "btn btn-danger",
        removeLabel: "Deletar"
    });		
	//DEPOIMENTOS
	$(document).on('click', '.add-depoimento-modal', function() {
        $('.actionBtn').addClass('addDepoimento');
		$('.formModal').show();
        $('#addDepoimento').modal('show');
    });  
   $('.modal-footer').on('click', '.addDepoimento', function() {
		$.ajax({
            type: 'POST',
			url: '{{route('Config.Site.AdicionarDepoimento')}}',
			contentType: false,
			processData: false,
            data: {
                _token: $('input[name=_token]').val(),
				id: $("#tId").val(),
				Cliente: $("#tNomeCliente").val(),
				ImageCliente: $("#tImgCliente").val(),
				Cargo: $("#tCargo").val(),
				Depoimento: $("#tDepoimento").val(),
				Ativo: $("#tStatus").val()
            },
            success: function(data) {
				location.reload();
            },
			error: function(data) { 
				alert(JSON.stringify(data));
			}		
        });
    });	
    $(document).on('click', '.deleteDepoimento', function() {
		var id = $(this).data('id');
		$.ajax({
            type: 'POST',
            url: '{{route('Config.Site.DeletarDepoimento')}}',
            data: {
				_token: $('input[name=_token]').val(),
				id: id,
				},
            success: function(data) {
				location.reload();
            },
			error: function(data) {     
				alert(JSON.stringify(data));
			},
        });
    });	
    $('#tImgCliente').fileinput({
        theme: "fa",
		language: "pt-BR",
		showUpload: false,
        previewFileType: "image",
        browseClass: "btn btn-success",
        browseLabel: "Abrir Imagem",
        removeClass: "btn btn-danger",
        removeLabel: "Deletar"
    });		
	
	//
	$('#datatable tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });	
	//MANTEM TAB ATUAL COM REFRESH
    $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      $('#custom-content-above-tab a[href="' + activeTab + '"]').tab('show');
    }
		
});  
</script>
@stop