@extends('layouts/default')

{{-- Page title --}}
@section('title')
    ADMIN 
    @parent
@stop

{{-- Page content --}}
@section('content')
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
@stop	

@section('css')
 <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/apexcharts/apexcharts.css')}}"/>
 
 <style>
	.head{
		margin-bottom: 0;
	}
 </style>
@stop
@section('js')
<script type="text/javascript" src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/moment/js/lang/pt-br.js')}}"></script>
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
  	      @foreach($graficoAtendimentosNoAno as $AtendimentosNoAno)	
		  {!!$AtendimentosNoAno->mes01!!},{!!$AtendimentosNoAno->mes02!!}, {!!$AtendimentosNoAno->mes03!!}, {!!$AtendimentosNoAno->mes04!!}, {!!$AtendimentosNoAno->mes05!!}, {!!$AtendimentosNoAno->mes06!!},
		  {!!$AtendimentosNoAno->mes07!!},{!!$AtendimentosNoAno->mes08!!},{!!$AtendimentosNoAno->mes09!!},{!!$AtendimentosNoAno->mes10!!},{!!$AtendimentosNoAno->mes11!!},{!!$AtendimentosNoAno->mes12!!},{!!$AtendimentosNoAno->mes13!!}
	      @endforeach
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
	    @foreach($graficoPorCanalAno as $PorCanalAno)	
		  {!!$PorCanalAno->Soma!!},
	    @endforeach
		],
      chart: {
        width: 380,
        type: 'pie',
      },
      labels:  
	  [
	    @foreach($graficoPorCanalAno as $PorCanalAno)	
	       '{!!$PorCanalAno->Canal!!}',
	    @endforeach	
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
	    @foreach($graficoTop5Ultimos6Meses as $Top5Ultimos6Meses)	
	    {
          name: "{!!$Top5Ultimos6Meses->NomeFantasia!!}",
          data: [{!!$Top5Ultimos6Meses->mes01!!}, {!!$Top5Ultimos6Meses->mes02!!}, {!!$Top5Ultimos6Meses->mes03!!}, {!!$Top5Ultimos6Meses->mes04!!}, {!!$Top5Ultimos6Meses->mes05!!}, {!!$Top5Ultimos6Meses->mes06!!}]
        },	     
	  @endforeach		  
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
  	      @foreach($graficoPorRedesSemestre as $PorRedesSemestre)	
		  {!!$PorRedesSemestre->Soma!!},
	      @endforeach
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
	      @foreach($graficoPorRedesSemestre as $PorRedesSemestre)	
	         '{!!$PorRedesSemestre->NomeRede!!}',
	      @endforeach	
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
  	      @foreach($graficoPorFranquiasSemestre as $PorFranquiasSemestre)	
		  {!!$PorFranquiasSemestre->Soma!!},
	      @endforeach
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
	      @foreach($graficoPorFranquiasSemestre as $PorFranquiasSemestre)	
	         '{!!$PorFranquiasSemestre->NomeFranquia!!}',
	      @endforeach	
        ],
      }
    };
    var chart = new ApexCharts(document.querySelector("#chartFranquiasPorAno"), options5);
    chart.render();

	
	//chartAcompanhamento6MesesImplant -OK
    var options6 = {
      series: [
	    @foreach($graficoAcompanhamento6MesesImplant as $Acompanhamento6MesesImplant)	
	    {
          name: "{!!$Acompanhamento6MesesImplant->NomeFantasia!!}",
          data: [{!!$Acompanhamento6MesesImplant->mes01!!}, {!!$Acompanhamento6MesesImplant->mes02!!}, {!!$Acompanhamento6MesesImplant->mes03!!}, {!!$Acompanhamento6MesesImplant->mes04!!}, {!!$Acompanhamento6MesesImplant->mes05!!}, {!!$Acompanhamento6MesesImplant->mes06!!}]
        },	     
		@endforeach	  
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
	    @foreach($graficoPeriodoImplantacao as $PeriodoImplantacao)	
          {
            x: "{!!$PeriodoImplantacao->NomeFantasia!!}",
            y: [ 
              new Date('{!!$PeriodoImplantacao->DataInicio!!}').getTime(),
              new Date('{!!$PeriodoImplantacao->DataFim!!}').getTime()
            ]
          },
		@endforeach	  
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
  	      @foreach($graficoUlt3MesesAtualEAnterior as $Ult3MesesAtualEAnterior)	
		  {
		  name: '{!!$Ult3MesesAtualEAnterior->Ano!!}',
		  data: [{!!$Ult3MesesAtualEAnterior->mes01!!},{!!$Ult3MesesAtualEAnterior->mes02!!},{!!$Ult3MesesAtualEAnterior->mes03!!}]
		  },	  
		  @endforeach	  
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
	  	data: {!! $graficoPorDepartamentoUltimoMes !!}
	  }]
	};

	var chart = new ApexCharts(document.querySelector("#chartPorDepartamentoUltimoMes"), options9);
	chart.render();




	
  });
 </script> 
@stop	