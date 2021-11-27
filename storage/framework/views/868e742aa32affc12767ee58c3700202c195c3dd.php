              <?php echo csrf_field(); ?>
			  <div class="card-body">
                <div class="row">
				  <div class="form-group col-md-1">
                    <?php echo Form::label('tId','ID:'); ?>

					<?php echo Form::text('tId',$contratoDados->id ?? old('tID'),['class' => 'form-control','readonly' => 'readonly']); ?>

                  </div>
                  <div class="form-group col-md-2 <?php echo e($errors->has('tTipo') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tTipo','Tipo:'); ?>

					<?php echo Form::select('tTipo', array('1' => 'Proposta Comercial','2' => 'Outros'), isset($contratoDados->Tipo) ? $contratoDados->Tipo : 1, ['class' => 'form-control']); ?>

					<small class="text-danger"><?php echo e($errors->first('tTipo')); ?></small>	
                  </div>
                  <div class="form-group col-md-6 <?php echo e($errors->has('tNomeContrato') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tNomeContrato','Nome Contrato:'); ?>

					<?php echo Form::text('tNomeContrato',$contratoDados->NomeContrato ?? old('tNomeContrato'),['class' => 'form-control','onkeyup' => 'upper(this)']); ?>

					<small class="text-danger"><?php echo e($errors->first('tNomeContrato')); ?></small>	
                  </div>				  
                  <div class="form-group col-md-2 <?php echo e($errors->has('tValidade') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tValidade','Validade:'); ?>

					<?php echo Form::date('tValidade',isset($contratoDados->Validade) ? \Carbon\Carbon::createFromFormat('Y-m-d',$contratoDados->Validade) : null,['class' => 'form-control','data-date-format' => 'dd/mm/yyyy']); ?>

					<small class="text-danger"><?php echo e($errors->first('tValidade')); ?></small>	
                  </div>				  
				  <div class="form-group col-md-1">
                    <?php echo Form::label('tVersao','Vers&atilde;o:'); ?>

					<?php echo Form::text('tVersao',$contratoDados->Versao ?? old('tVersao'),['class' => 'form-control']); ?>

                  </div>				
                </div>
                <div class="row"><!--summernote_editor -->
                  <div class="form-group col-md-12 <?php echo e($errors->has('tContrato') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('tContrato','Texto do Contrato:'); ?>

					<?php echo Form::textarea('tContrato',$contratoDados->TextoContrato ?? old('tContrato'),['class' => 'form-control','id' => 'tinymce_full','rows' => 20, 'cols' => 54]); ?>

					<small class="text-danger"><?php echo e($errors->first('tContrato')); ?></small>	
                  </div>
                </div>
              </div>				
              <div class="card-footer bg-white">
                  <?php echo Form::submit('Gravar', ['class' => 'btn btn-success float-right']);; ?>

			  </div>				

<?php $__env->startSection('css'); ?>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/form_elements.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/tinymce/js/tinymce.min.js')); ?>"></script>
  <!-- InputMask -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/inputmask.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/inputmask.date.extensions.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/inputmask.extensions.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/jquery.inputmask.bundle.js')); ?>"></script> 
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
<?php $__env->stopSection(); ?>			  <?php /**PATH /home/tihub/laravel/resources/views/config/contratos/_form.blade.php ENDPATH**/ ?>