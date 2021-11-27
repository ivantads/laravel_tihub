        <!-- <div class="box-body">-->
          <div class="card-body">
		    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="nav-principal-tab" data-toggle="pill" href="#nav-principal" role="tab" aria-controls="nav-principal" aria-selected="true">PRINCIPAL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nav-tecnico-tab" data-toggle="pill" href="#nav-tecnico" role="tab" aria-controls="nav-tecnico" aria-selected="false">OUTROS DADOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nav-estatistica-tab" data-toggle="pill" href="#nav-estatistica" role="tab" aria-controls="nav-estatistica" aria-selected="false">ESTAT&Iacute;STICAS</a>
                </li>				
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">		 
              <div class="tab-pane fade show active" id="nav-principal" role="tabpanel" aria-labelledby="nav-principal-tab">	
				 <?php echo $__env->make('cadastros.clientes._abaprincipal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>			  
			  <div class="tab-pane fade" id="nav-tecnico" role="tabpanel" aria-labelledby="nav-tecnico-tab">
				 <?php echo $__env->make('cadastros.clientes._abaoutrosdados', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			  </div>
			  <div class="tab-pane fade" id="nav-estatistica" role="tabpanel" aria-labelledby="nav-estatistica-tab">
				 <?php echo $__env->make('cadastros.clientes._abaestatisticas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>	
          </div>
          <div class="card-footer bg-white">
            <?php echo Form::submit('Gravar', ['class' => 'btn btn-success float-right']);; ?>

		  </div>	

			  
<?php $__env->startSection('css'); ?>
<!-- Select2 -->
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/select2/css/select2.min.css')); ?>"/>
  <style>
    .select2 {
       width: 100% !important;
  	 height: 36px;
    }
    .select2 .select2-selection--single{
  	 box-sizing:border-box;
  	 cursor:pointer;
  	 display:block;
  	 height:37px;
  	 user-select:none;
  	 -webkit-user-select:none;
    }
	.source{
     width: 90%;
	}
  </style>
<!-- Notificacoes -->  
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweetalert/css/sweetalert2.min.css')); ?>"/>
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/pages/toastr.css')); ?>"/>	
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastr/css/toastr.min.css')); ?>"/>	
<!-- ApexCharts -->
  <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/apexcharts/apexcharts.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- Select2 -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/select2/js/select2.full.min.js')); ?>"></script> 
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/select2/js/i18n/pt-BR.js')); ?>"></script> 
<!-- InputMask -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/inputmask.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/inputmask.date.extensions.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/inputmask.extensions.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/inputmask/js/jquery.inputmask.js')); ?>"></script> 
<!-- FastClick -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fastclick/fastclick.js')); ?>"></script>
<!-- Slimscroll -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/slimscroll/js/jquery.slimscroll.min.js')); ?>"></script>
<!-- ApexCharts -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/apexcharts/apexcharts.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/lang/pt-br.js')); ?>"></script>
<!-- Notificacoes -->
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/sweetalert/js/sweetalert2.min.js')); ?>"></script> 
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/noty/js/jquery.noty.packaged.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/vendors/toastr/js/toastr.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/toastr_notifications.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	//label meses apexcharts  
    var date = new Date();
    var lastMonths12 = [], lastMonths06 = []
        monthNames = new Array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');
    date.setDate(1);
	for (var i = 0; i < 13; i++) {
        lastMonths12.push(monthNames[date.getMonth()]);
        date.setMonth(date.getMonth() - 1);
    }
	for (var i = 0; i < 6; i++) {
        lastMonths06.push(monthNames[date.getMonth()]);
        date.setMonth(date.getMonth() - 1);
    }

    // chartAtendimentosNoAno -OK
	var options1 = {
	  chart: {
	  	type: 'area',
	  	height: 350,
	  	zoom: {
	  	enabled: false
	  	}	
	  },
	  series: [
	  <?php if(isset($estatisticaLista)): ?>
	  <?php $__currentLoopData = $estatisticaLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estatistica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    {
	  	name: '<?php echo $estatistica->atendimento; ?>',
	  	data: [<?php echo $estatistica->mes01; ?>,<?php echo $estatistica->mes02; ?>,<?php echo $estatistica->mes03; ?>,<?php echo $estatistica->mes04; ?>,<?php echo $estatistica->mes05; ?>,<?php echo $estatistica->mes06; ?>,
		  <?php echo $estatistica->mes07; ?>,<?php echo $estatistica->mes08; ?>,<?php echo $estatistica->mes09; ?>,<?php echo $estatistica->mes10; ?>,<?php echo $estatistica->mes11; ?>,<?php echo $estatistica->mes12; ?>]
	    },
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  <?php endif; ?>
	  ],
	  xaxis: {
	  	categories: lastMonths12 
	  }
	}
	var chart = new ApexCharts(document.querySelector("#chartAtendimentosNoAno"), options1);
	chart.render();

    // chartAtendPorDepartamentoSemestre -OK
	var options2 = {
	  chart: {
	  	type: 'area',
	  	height: 350,
	  	zoom: {
	  	enabled: false
	  	}	
	  },
	  series: [
	  <?php if(isset($graficoAtendPorDepartamentoSemestre)): ?>
	  <?php $__currentLoopData = $graficoAtendPorDepartamentoSemestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $AtendPorDepartamentoSemestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	    {
	  	name: '<?php echo $AtendPorDepartamentoSemestre->Departamento; ?>',
	  	data: [<?php echo $AtendPorDepartamentoSemestre->mes01; ?>,<?php echo $AtendPorDepartamentoSemestre->mes02; ?>,<?php echo $AtendPorDepartamentoSemestre->mes03; ?>,
		<?php echo $AtendPorDepartamentoSemestre->mes04; ?>,<?php echo $AtendPorDepartamentoSemestre->mes05; ?>,<?php echo $AtendPorDepartamentoSemestre->mes06; ?>,
		<?php echo $AtendPorDepartamentoSemestre->mes07; ?>,<?php echo $AtendPorDepartamentoSemestre->mes08; ?>,<?php echo $AtendPorDepartamentoSemestre->mes09; ?>,
		<?php echo $AtendPorDepartamentoSemestre->mes10; ?>,<?php echo $AtendPorDepartamentoSemestre->mes11; ?>,<?php echo $AtendPorDepartamentoSemestre->mes12; ?>,
		]
	    },
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  <?php endif; ?>
	  ],
	  xaxis: {
	  	categories: lastMonths12 
	  }
	}
	var chart = new ApexCharts(document.querySelector("#chartAtendPorDepartamentoSemestre"), options2);
	chart.render();


	//$("#tCnpj").blur(function(){
	//$(document).on('click', '.atualizaDadosInova', function() {} 
	$(".atualizaDadosInova").click(function() {
	   var CNPJInova = $("#tCnpj").val().replace(/[^0-9]+/g, '');
	   if (CNPJInova != "") {
		   $.getJSON("https://portalpsapi.azurewebsites.net/api/Contrato/VisualizarContrato?cnpj="+CNPJInova, function(portalps) {
			   if (portalps.sucesso != false) {
				   //.val(portalps.data.codigoContrato);
				   $("#tInscEstadual").val(portalps.data.cadastro.ie);
				   $("#tRazaoSocial").val(portalps.data.cadastro.razaoSocial);
				   $("#tFantasia").val(portalps.data.cadastro.nomeFantasia);
				   $("#tCep").val(portalps.data.cadastro.cep);
				   $("#tEndereco").val(portalps.data.cadastro.endereco);
				   $("#tNum").val(portalps.data.cadastro.numero);
				   $("#tComplemento").val(portalps.data.cadastro.complemento);
				   $("#tBairro").val(portalps.data.cadastro.bairro);
				   //$("#tCidade").val(portalps.data.cadastro.nomeCidade);
				   //$("#tCadastro").val(portalps.data.cadastro.dataCadastro);
				   toastr.success('Dados atualizados com sucesso.', 'Sucesso!');
			   }else{
				   swal({
				       title: 'Erro ao efetuar requisição',
				       text: 'CNPJ incorreto/inexistente ou portal inovafarma offline',
				       type: 'error',
				       confirmButtonColor: '#4fb7fe'
				   }).done();
				   return false;				   
			   }
		   });
	   }else{
		   swal({
		       title: 'Erro ao efetuar requisição',
		       text: 'CNPJ não informado',
		       type: 'error',
		       confirmButtonColor: '#4fb7fe'
		   }).done();
		   return false;				   
		   $("#tCnpj").focus();
	   }
	});	
});	
	

  $(function (){
    //Initialize Select2 Elements
    $('.city-show-search').select2({
		placeholder: 'Selecione a cidade',
		allowClear: true,
		language: 'pt-BR'
	});
  });




  $('#tRede').change(function() {
    var rede = $(this).val();
    if (rede != 0) {
		$('#tFG').removeAttr('disabled');
	} else{
		$('#tFG').val(0);
		$('#tFG').attr('disabled','disabled');
	}
  });
  $("input[id*='tCnpj']").inputmask({
    mask: ['99.999.999/9999-99'],
    keepStatic: true
  });
  $("input[id*='tCep']").inputmask({
    mask: ['99.999-999'],
    keepStatic: true
  });
  $("input[id*='tTelefone']").inputmask({
    mask: ['(99)9999-9999'],
    keepStatic: true
  });
  $("input[id*='tCelular']").inputmask({
    mask: ['(99)99999-9999'],
    keepStatic: true
  });
  $("input[id*='tPessoaFone']").inputmask({
    mask: ['(99)99999-9999'],
    keepStatic: true
  });
  function upper(z){
    v = z.value.toUpperCase();
    z.value = v;
 }
  function lower(z){
    l = z.value.toLowerCase();
    z.value = l;
  } 
toastr.options = {
  "closeButton": false,
  "debug": false,
  "positionClass": "toast-top-full-width",
  "onclick": null,
  "showDuration": "500",
  "hideDuration": "500",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "swing",
  "showMethod": "slideDown",
  "hideMethod": "slideUp"
}  
</script>

<?php $__env->stopSection(); ?><?php /**PATH /home/tihub/laravel/resources/views/cadastros/clientes/_form.blade.php ENDPATH**/ ?>