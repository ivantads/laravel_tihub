<?php $__env->startSection('title'); ?>
    ADMIN 
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-6">
                           <h4 class="m-t-5">
                               <i class="fa fa-dashboard"></i>
                               Indicadores
                           </h4>
                       </div>
                   </div>
                </div>
            </header> 
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col-lg-9 col-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> Atendimentos no &Uacute;ltimo Ano
                                </div>							
                                <div class="card-body">
									<div id="chartAtendimentosNoAno" style="min-height: 365px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> Atendimentos  por Canal (Ano)
                                </div>
                                <div class="card-body">
                                	<div id="chartPorCanalAno" style="min-height: 365px;"></div>    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> TOP 5 Clientes - &Uacute;ltimos 6 meses
                                </div>							
                                <div class="card-body">
									<div id="chartTop5Ultimos6Meses" style="max-height: 365px;"></div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> Atend. por Rede - Semestral
                                </div>
                                <div class="card-body">
                                    <div id="chartRedesPorAno"></div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> Atend. por Franquia - Semestral
                                </div>
                                <div class="card-body">
                                    <div id="chartFranquiasPorAno"></div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> Atendimentos - Fase P&oacute;s-Implanta&ccedil;&atilde;o 6 Meses (3 + 3)
                                </div>							
                                <div class="card-body">
									<div id="chartAcompanhamento6MesesImplant"></div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-table"></i> Per&iacute;odo Implanta&ccedil;&atilde;o
                                </div>
                                <div class="card-body">
                                    <div id="chartPeriodoImplantacao"></div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> &Uacute;ltimos 3 meses (Compara&ccedil;&atilde;o ano Anterior)
                                </div>							
                                <div class="card-body">
									<div id="chartUlt3MesesAtualEAnterior"></div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 m-t-25">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-bar-chart-o"></i> Por Departamento - &Uacute;ltimos 30 dias
                                </div>
                                <div class="card-body">
                                    <div id="chartPorDepartamentoUltimoMes"></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>					
            </div>
<?php $__env->stopSection(); ?>	

<?php $__env->startSection('css'); ?>
 <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/vendors/apexcharts/apexcharts.css')); ?>"/>
 
 <style>
	.head{
		margin-bottom: 0;
	}
 </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/apexcharts/apexcharts.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/lang/pt-br.js')); ?>"></script>
 <script>
  $(function (){

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
	  series: [{
        name: "Atendimentos",
		data: [
  	      <?php $__currentLoopData = $graficoAtendimentosNoAno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $AtendimentosNoAno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		  <?php echo $AtendimentosNoAno->mes01; ?>,<?php echo $AtendimentosNoAno->mes02; ?>, <?php echo $AtendimentosNoAno->mes03; ?>, <?php echo $AtendimentosNoAno->mes04; ?>, <?php echo $AtendimentosNoAno->mes05; ?>, <?php echo $AtendimentosNoAno->mes06; ?>,
		  <?php echo $AtendimentosNoAno->mes07; ?>,<?php echo $AtendimentosNoAno->mes08; ?>,<?php echo $AtendimentosNoAno->mes09; ?>,<?php echo $AtendimentosNoAno->mes10; ?>,<?php echo $AtendimentosNoAno->mes11; ?>,<?php echo $AtendimentosNoAno->mes12; ?>,<?php echo $AtendimentosNoAno->mes13; ?>

	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    ]	  
	   
	  }],
	  annotations: {
          yaxis: [{
            y: 590,
            y2: 655,
            borderColor: '#000',
            fillColor: '#FEB019',
            opacity: 0.2,
            label: {
              borderColor: '#333',
              style: {
                fontSize: '10px',
                color: '#333',
                background: '#FEB019',
              },
              text: 'Média Atendimentos',
            }
          }],
          xaxis: [{
			x: 'Mar',
            strokeDashArray: 0,
            borderColor: '#775DD0',
            label: {
              borderColor: '#775DD0',
              style: {
                color: '#fff',
                background: '#775DD0',
              },
              text: 'Impressoras',
            }
          },{
			x: 'Abr',
            strokeDashArray: 0,
            borderColor: '#775DD0',
            label: {
              borderColor: '#775DD0',
              style: {
                color: '#fff',
                background: '#775DD0',
              },
              text: 'Preços',
            }
          },{
			x: 'Ago',
            strokeDashArray: 0,
            borderColor: '#775DD0',
            label: {
              borderColor: '#775DD0',
              style: {
                color: '#fff',
                background: '#775DD0',
              },
              text: 'Lei LGPD',
            }
          },{
			x: 'Set',
            strokeDashArray: 0,
            borderColor: '#775DD0',
            label: {
              borderColor: '#775DD0',
              style: {
                color: '#fff',
                background: '#775DD0',
              },
              text: 'kb5005565',
            }
          }
		  ]
	  },
      xaxis: {
        categories: lastMonths12,
      },
	  yaxis: {
		max: 1000  
	  }

	};

	var chart = new ApexCharts(document.querySelector("#chartAtendimentosNoAno"), options1);
	chart.render();
	
	//chartPorCanalAno -OK
    var options2 = {
      series: [
	    <?php $__currentLoopData = $graficoPorCanalAno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PorCanalAno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		  <?php echo $PorCanalAno->Soma; ?>,
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		],
      chart: {
        width: 380,
        type: 'pie',
      },
      labels:  
	  [
	    <?php $__currentLoopData = $graficoPorCanalAno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PorCanalAno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	       '<?php echo $PorCanalAno->Canal; ?>',
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
	  ],
      legend: {
        show: true,
	    position: 'bottom',
	    horizontalAlign: 'center'
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartPorCanalAno"), options2);
    chart.render();	
	
	//chartTop5Ultimos6Meses -OK
    var options3 = {
      series: [
	    <?php $__currentLoopData = $graficoTop5Ultimos6Meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Top5Ultimos6Meses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	    {
          name: "<?php echo $Top5Ultimos6Meses->NomeFantasia; ?>",
          data: [<?php echo $Top5Ultimos6Meses->mes01; ?>, <?php echo $Top5Ultimos6Meses->mes02; ?>, <?php echo $Top5Ultimos6Meses->mes03; ?>, <?php echo $Top5Ultimos6Meses->mes04; ?>, <?php echo $Top5Ultimos6Meses->mes05; ?>, <?php echo $Top5Ultimos6Meses->mes06; ?>]
        },	     
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		  
	  ],
      chart: {
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      xaxis: {
        categories: lastMonths06,
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartTop5Ultimos6Meses"), options3);
    chart.render();
	
	//chartPorRedesAno -OK
    var options4 = {
      series: [{
        name: "Atendimentos",
		data: [
  	      <?php $__currentLoopData = $graficoPorRedesSemestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PorRedesSemestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		  <?php echo $PorRedesSemestre->Soma; ?>,
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    ]
      }],
      chart: {
      type: 'bar',
      height: 350
      },
      plotOptions: {
        bar: {
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: true
      },
      xaxis: {
        categories: [
	      <?php $__currentLoopData = $graficoPorRedesSemestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PorRedesSemestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	         '<?php echo $PorRedesSemestre->NomeRede; ?>',
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
        ],
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartRedesPorAno"), options4);
    chart.render();	

	//chartPorFranquiasAno -OK
    var options5 = {
      series: [{
        name: "Atendimentos",
		data: [
  	      <?php $__currentLoopData = $graficoPorFranquiasSemestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PorFranquiasSemestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		  <?php echo $PorFranquiasSemestre->Soma; ?>,
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    ]
      }],
      chart: {
      type: 'bar',
      height: 350
      },
      plotOptions: {
        bar: {
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: true
      },
      xaxis: {
        categories: [
	      <?php $__currentLoopData = $graficoPorFranquiasSemestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PorFranquiasSemestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	         '<?php echo $PorFranquiasSemestre->NomeFranquia; ?>',
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
        ],
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartFranquiasPorAno"), options5);
    chart.render();

	
	//chartAcompanhamento6MesesImplant -OK
    var options6 = {
      series: [
	    <?php $__currentLoopData = $graficoAcompanhamento6MesesImplant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Acompanhamento6MesesImplant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	    {
          name: "<?php echo $Acompanhamento6MesesImplant->NomeFantasia; ?>",
          data: [<?php echo $Acompanhamento6MesesImplant->mes01; ?>, <?php echo $Acompanhamento6MesesImplant->mes02; ?>, <?php echo $Acompanhamento6MesesImplant->mes03; ?>, <?php echo $Acompanhamento6MesesImplant->mes04; ?>, <?php echo $Acompanhamento6MesesImplant->mes05; ?>, <?php echo $Acompanhamento6MesesImplant->mes06; ?>]
        },	     
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  
      ],
      chart: {
      height: 350,
      type: 'line',
      zoom: {
        enabled: false
      }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      xaxis: {
        categories: lastMonths06,
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartAcompanhamento6MesesImplant"), options6);
    chart.render();
	
	//chartPeriodoImplantacao
    var options7 = {
      series: [
      {
        data: [
	    <?php $__currentLoopData = $graficoPeriodoImplantacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PeriodoImplantacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
          {
            x: "<?php echo $PeriodoImplantacao->NomeFantasia; ?>",
            y: [ 
              new Date('<?php echo $PeriodoImplantacao->DataInicio; ?>').getTime(),
              new Date('<?php echo $PeriodoImplantacao->DataFim; ?>').getTime()
            ]
          },
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  
        ]
      }],
      chart: {
		locales: [{
		  "name": "pt-br",
		  "options": {
		  	"months": [
		  	"Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"
		  	],
		  	"shortMonths": [
		  	"Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"
		  	],
		  	"days": [
		  	"Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"
		  	],
		  	"shortDays": ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
		  	"toolbar": {
		  	"exportToSVG": "Baixar SVG",
		  	"exportToPNG": "Baixar PNG",
		  	"exportToCSV": "Baixar CSV",
		  	"menu": "Menu",
		  	"selection": "Selecionar",
		  	"selectionZoom": "Selecionar Zoom",
		  	"zoomIn": "Aumentar",
		  	"zoomOut": "Diminuir",
		  	"pan": "Navegação",
		  	"reset": "Reiniciar Zoom"
		  	}
		  }
		}],
		defaultLocale: 'pt-br',
        height: 350,
        type: 'rangeBar'		
      },
      plotOptions: {
        bar: {
          horizontal: true
        }
      },
      xaxis: {
        type: 'datetime'
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartPeriodoImplantacao"), options7);
    chart.render();
	
	//chartUlt3MesesAtualEAnterior -OK
     var options8 = {
      series: [
  	      <?php $__currentLoopData = $graficoUlt3MesesAtualEAnterior; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ult3MesesAtualEAnterior): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
		  {
		  name: '<?php echo $Ult3MesesAtualEAnterior->Ano; ?>',
		  data: [<?php echo $Ult3MesesAtualEAnterior->mes01; ?>,<?php echo $Ult3MesesAtualEAnterior->mes02; ?>,<?php echo $Ult3MesesAtualEAnterior->mes03; ?>]
		  },	  
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  
      ],
      chart: {
        height: 350,
        type: 'area',
        zoom: {
          enabled: false
        }		
      },
      dataLabels: {
        enabled: true
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
		categories: [moment().subtract(1, 'months').locale('pt-br').format('MMM'),moment().subtract(2, 'months').locale('pt-br').format('MMM'),moment().subtract(3, 'months').locale('pt-br').format('MMM')]
      },
      tooltip: {
        x: 'Atendimentos'
      },
    };
    var chart = new ApexCharts(document.querySelector("#chartUlt3MesesAtualEAnterior"), options8);
    chart.render();



    // chartPorDepartamentoUltimoMes -OK
	var options9 = {
	  chart: {
	  	type: 'bar',
	  	height: 350,
	  	zoom: {
	  	enabled: false
	  	}	
	  },
	  series: [{
	  	name: 'Atendimentos',
	  	data: <?php echo $graficoPorDepartamentoUltimoMes; ?>

	  }]
	};

	var chart = new ApexCharts(document.querySelector("#chartPorDepartamentoUltimoMes"), options9);
	chart.render();




	
  });
 </script> 
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/wfwebc75/laravel/resources/views/indicadores/suporte.blade.php ENDPATH**/ ?>