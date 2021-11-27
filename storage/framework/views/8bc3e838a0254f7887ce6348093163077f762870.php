<?php $__env->startSection('title'); ?>
    ADMIN 
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

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
		                                <?php $__currentLoopData = $pbmLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroPBM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                              	  <div id="<?php echo e($registroPBM->id); ?>" style="display:none;"><?php echo e($registroPBM->SiteDownload); ?></div>
		                              	  <td><?php echo e($registroPBM->Versao); ?></td>
                                          <td><?php echo e($registroPBM->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroPBM->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroPBM->id); ?>')">Obter Link</button></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroPBM->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                                <?php $__currentLoopData = $impressoraLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroImpressora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                              	  <div id="<?php echo e($registroImpressora->id); ?>" style="display:none;"><?php echo e($registroImpressora->SiteDownload); ?></div>
		                              	  <td><?php echo e($registroImpressora->Versao); ?></td>
                                          <td><?php echo e($registroImpressora->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroImpressora->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroImpressora->id); ?>')">Obter Link</button></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroImpressora->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                                <?php $__currentLoopData = $bancoLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroBanco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                              	  <div id="<?php echo e($registroBanco->id); ?>" style="display:none;"><?php echo e($registroBanco->SiteDownload); ?></div>
		                              	  <td><?php echo e($registroBanco->Versao); ?></td>
                                          <td><?php echo e($registroBanco->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroBanco->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroBanco->id); ?>')">Obter Link</button></td>
		                              	  <td><?php echo e($registroBanco->SiteDownload); ?></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroBanco->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                                <?php $__currentLoopData = $etiquetasLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroEtiquetas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                              	<div id="<?php echo e($registroEtiquetas->id); ?>" style="display:none;"><?php echo e($registroEtiquetas->SiteDownload); ?></div>
		                              	<td><?php echo e($registroEtiquetas->Versao); ?></td>
                                          <td><?php echo e($registroEtiquetas->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroEtiquetas->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroEtiquetas->id); ?>')">Obter Link</button></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroEtiquetas->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                                <?php $__currentLoopData = $utilitariosLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroUtilitarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                              	  <div id="<?php echo e($registroUtilitarios->id); ?>" style="display:none;"><?php echo e($registroUtilitarios->SiteDownload); ?></div>
		                              	  <td><?php echo e($registroUtilitarios->Versao); ?></td>
                                          <td><?php echo e($registroUtilitarios->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroUtilitarios->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroUtilitarios->id); ?>')">Obter Link</button></td>
		                              	  <td><?php echo e($registroUtilitarios->SiteDownload); ?></td>
										  <td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroUtilitarios->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                                <?php $__currentLoopData = $windowsLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroWindows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                              	<div id="<?php echo e($registroWindows->id); ?>" style="display:none;"><?php echo e($registroWindows->SiteDownload); ?></div>
		                              	<td><?php echo e($registroWindows->Versao); ?></td>
                                          <td><?php echo e($registroWindows->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroWindows->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroWindows->id); ?>')">Obter Link</button></td>
								  		<td><?php echo e($registroWindows->SiteCopyOficial); ?></td>
										<td><button class="delAplicativo btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroWindows->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                      <?php echo Form::open(['route' => 'aplicativos.store', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data']); ?>

					  <div class="modal-body">
                        <!-- <div class="box-body">-->
                        <div class="card-body">
                          <div class="row">
		          		  <div class="form-group col-md-8">
                              <?php echo Form::label('tTipoDownload','Se&ccedil;&atilde;o:'); ?>

		          			  <?php echo Form::select('tTipoDownload', array('1' => 'PBMs','2' => 'IMPRESSORAS','3' => 'BANCO DE DADOS','6' => 'MODELOS ETIQUETAS','4' => 'UTILITÁRIOS','5' => 'ATUALIZAÇÕES WINDOWS'),1, ['class' => 'form-control']); ?>

                            </div>		
		          		  <div class="form-group col-md-4">
                              <?php echo Form::label('tVersao','Vers&atilde;o:'); ?>

		          			  <?php echo Form::text('tVersao','',['class' => 'form-control','placeholder' => 'Vers&atilde;o']); ?>

                            </div>	
                          </div>	
                          <div class="row">				  
		          		  <div class="form-group col-md-12 <?php echo e($errors->has('tInscEstadual') ? ' has-error' : ''); ?>">
                              <?php echo Form::label('tDescricao','Descri&ccedil;&atilde;o:'); ?>

		          			  <?php echo Form::text('tDescricao','',['class' => 'form-control','required' => 'required','placeholder' => 'Descri&ccedil;&atilde;o']); ?>

                            <small class="text-danger"><?php echo e($errors->first('tDescricao')); ?></small>  
						  </div>
                          </div>	
                          <div class="row">
		          		  <div class="form-group col-md-12">
                              <?php echo Form::label('tSiteCopyOficial','URL Externo:'); ?>

		          			  <?php echo Form::text('tSiteCopyOficial','',['class' => 'form-control','placeholder' => 'URL']); ?>

                            </div>
                          </div>	
                          <div class="row">				  
		          		  <div class="form-group col-md-12">
                              <?php echo Form::label('tArquivo','Arquivo:'); ?>

		          			  <?php echo Form::file('tArquivo',['class' => 'file-loading','id' => 'tArquivo']); ?>

                            </div>				  
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
		          		<?php echo Form::button('Fechar', ['class' => 'btn btn-default','data-dismiss' => 'modal']);; ?>

		          		<?php echo Form::submit('Adicionar', ['class' => 'btn btn-primary']);; ?>

                      </div>
					<?php echo Form::close(); ?>  
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/fileinput/css/fileinput.min.css')); ?>"/>
<?php $__env->stopSection(); ?>  

<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fileinput/js/fileinput.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fileinput/js/theme.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fileinput/js/pt-BR.js')); ?>"></script>
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
		var url = '<?php echo e(route("aplicativos.destroy", ":id")); ?>';
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/downloads/aplicativos.blade.php ENDPATH**/ ?>