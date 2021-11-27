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
		                              <?php $__currentLoopData = $inovaLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroInova): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                            	  <div id="<?php echo e($registroInova->id); ?>" style="display:none;"><?php echo e($registroInova->SiteDownload); ?></div>
		                            	  <td><?php echo e($registroInova->Versao); ?></td>
                                          <td><?php echo e($registroInova->Descricao); ?></td>
										  <td><button class="btn btn-info" onclick="window.open('<?php echo e($registroInova->NotaVersao); ?>','Inovafarma')">Visualizar</button></td>
                                          <td><a href="<?php echo e($registroInova->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroInova->id); ?>')">Obter Link</button></td>
		                            	  <td><?php echo e($registroInova->SiteDownload); ?></td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroInova->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                              <?php $__currentLoopData = $serviceLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                            	  <div id="<?php echo e($registroService->id); ?>" style="display:none;"><?php echo e($registroService->SiteDownload); ?></div>
		                            	  <td><?php echo e($registroService->Versao); ?></td>
                                          <td><?php echo e($registroService->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroService->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroService->id); ?>')">Obter Link</button></td>
		                            	  <td><?php echo e($registroService->SiteDownload); ?></td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroService->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                              <?php $__currentLoopData = $importadorLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroImportador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                            	  <div id="<?php echo e($registroImportador->id); ?>" style="display:none;"><?php echo e($registroImportador->SiteDownload); ?></div>
		                            	  <td><?php echo e($registroImportador->Versao); ?></td>
                                          <td><?php echo e($registroImportador->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroImportador->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroImportador->id); ?>')">Obter Link</button></td>
		                            	  <td><?php echo e($registroImportador->SiteDownload); ?></td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroImportador->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
                                        </tr>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		                              <?php $__currentLoopData = $baseLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registroBase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
		                            	  <div id="<?php echo e($registroBase->id); ?>" style="display:none;"><?php echo e($registroBase->SiteDownload); ?></div>
		                            	  <td><?php echo e($registroBase->Versao); ?></td>
                                          <td><?php echo e($registroBase->Descricao); ?></td>
                                          <td><a href="<?php echo e($registroBase->SiteDownload); ?>" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                                          <td><button class="btn btn-primary" onclick="copyToClipboard('#<?php echo e($registroBase->id); ?>')">Obter Link</button></td>
		                            	  <td><?php echo e($registroBase->SiteDownload); ?></td>
										  <td><button class="delVersoes btn btn-danger btn-labeled" data-placement="top" title="Deletar" data-token="<?php echo e(csrf_token()); ?>" data-id="<?php echo e($registroBase->id); ?>"><span class="btn-label"><i class="fa fa-trash-o"></i></span></button></td>
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
                <div class="modal fade in display_none" id="modalDownloadADD" tabindex="-1" role="dialog" aria-hidden="false">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white">Adicionar nova vers&atilde;o</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php echo Form::open(['route' => 'versoes.store', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data']); ?>

					  <div class="modal-body">
                        <!-- <div class="box-body">-->
                        <div class="card-body">
                          <div class="row">
				            <div class="form-group col-md-6">
                              <?php echo Form::label('tTipo','Tipo Download:'); ?>

				          	  <?php echo Form::select('tTipo', array('1' => 'INOVAFARMA','2' => 'SERVICE','3' => 'IMPORTADOR','4' => 'BASE DE DADOS'),1, ['class' => 'form-control']); ?>

                            </div>		
				            <div class="form-group col-md-3">
                              <?php echo Form::label('tRelease','Release:'); ?>

				          	  <?php echo Form::text('tRelease','',['class' => 'form-control','placeholder' => 'Release']); ?>

                            </div>	
				            <div class="form-group col-md-3">
                              <?php echo Form::label('tVersao','Vers&atilde;o:'); ?>

				          	  <?php echo Form::text('tVersao','',['class' => 'form-control','placeholder' => 'Vers&atilde;o','required' => 'required']); ?>

                            </div>	
                          </div>	
                          <div class="row">				  
				            <div class="form-group col-md-12">
                              <?php echo Form::label('tDescricao','Descri&ccedil;&atilde;o:'); ?>

				          	  <?php echo Form::text('tDescricao','',['class' => 'form-control','placeholder' => 'Descri&ccedil;&atilde;o','required' => 'required']); ?>

                            </div>
                          </div>	
                          <div class="row">				  
				            <div class="form-group col-md-12">
                              <?php echo Form::label('tNotas','Notas da Vers&atilde;o:'); ?>

				          	  <?php echo Form::text('tNotas','',['class' => 'form-control','placeholder' => 'Link Notas Vers&atilde;o']); ?>

                            </div>
                          </div>							  
                          <div class="row">
				            <div class="form-group col-md-12">
                              <?php echo Form::label('tSite','URL:'); ?>

				          	  <?php echo Form::text('tSite','',['class' => 'form-control','placeholder' => 'URL','required' => 'required']); ?>

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

<?php $__env->stopSection(); ?>  

<?php $__env->startSection('js'); ?>
  <script>
	$(document).ready(function() {
	  $(document).on('click', '.delVersoes', function() {
		if (!confirm("Confirma exclusão do registro?")){
		  return false;
		}		  
		var id = $(this).data('id');
		var url = '<?php echo e(route("versoes.destroy", ":id")); ?>';
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
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tihub/laravel/resources/views/downloads/versoes.blade.php ENDPATH**/ ?>