<?php

namespace App\Http\Controllers\Indicadores;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndicadoresSuporteController extends Controller
{
    public function Index()
    {
	/* ultimos 3 meses ano atual e anterior */
	  $graficoUlt3MesesAtual = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('year(a.created_at) as "Ano"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 1 THEN 1 ELSE 0 END) as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 2 THEN 1 ELSE 0 END) as "mes02"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 3 THEN 1 ELSE 0 END) as "mes03"'))
			->whereRaw('YEAR(a.created_at) BETWEEN YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND YEAR(CURRENT_DATE - INTERVAL 3 MONTH)')
			->whereRaw('MONTH(a.created_at) BETWEEN MONTH(CURRENT_DATE - INTERVAL 3 MONTH) AND MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')
			->groupBy('Ano')
			;
	  $graficoUlt3MesesAnterior = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('year(a.created_at) as "Ano"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 13 THEN 1 ELSE 0 END) as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 14 THEN 1 ELSE 0 END) as "mes02"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 15 THEN 1 ELSE 0 END) as "mes03"'))
			->whereRaw('YEAR(a.created_at) BETWEEN YEAR(CURRENT_DATE - INTERVAL 13 MONTH) AND YEAR(CURRENT_DATE - INTERVAL 15 MONTH)')
			->whereRaw('MONTH(a.created_at) BETWEEN MONTH(CURRENT_DATE - INTERVAL 15 MONTH) AND MONTH(CURRENT_DATE - INTERVAL 13 MONTH)')
			->groupBy('Ano')
			;
	  $graficoUlt3MesesAtualEAnterior = $graficoUlt3MesesAtual->union($graficoUlt3MesesAnterior)->get();


	/* acompanhamento 6 meses implantação */
	  $graficoAcompanhamento6MesesImplant = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('c.NomeFantasia'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 6 THEN 1 ELSE 0 END) as "mes06"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 5 THEN 1 ELSE 0 END) as "mes05"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 4 THEN 1 ELSE 0 END) as "mes04"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 3 THEN 1 ELSE 0 END) as "mes03"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 2 THEN 1 ELSE 0 END) as "mes02"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 1 THEN 1 ELSE 0 END) as "mes01"'))
				/*DB::raw('0 as "mes01"'))*/
				//DB::raw('a.id AS "Soma"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			//->whereRaw('YEAR(a.created_at) BETWEEN YEAR(CURRENT_DATE - INTERVAL 6 MONTH) AND YEAR(CURRENT_DATE - INTERVAL 1 MONTH)')
			//->whereRaw('MONTH(a.created_at) BETWEEN MONTH(CURRENT_DATE - INTERVAL 6 MONTH) AND MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')			
			->whereBetween('c.DataAtivacao',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('c.NomeFantasia')
			->get();

	/* Periodo implantação - ult 6 meses*/
	  $graficoPeriodoImplantacao = DB::table('calendario AS a')
			->select(DB::raw('c.NomeFantasia'),
				DB::raw('DATE(a.start) as "DataInicio"'), 
				DB::raw('DATE(a.end) as "DataFim"'))
			->join('projetos AS b','a.id_origin','=','b.id_projetos')
			->join('clientes AS c','b.id_cliente','=','c.id')			
			->whereBetween('c.DataAtivacao',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			->get();			

	/*top 5 clientes ultimos 6 meses */
	  $graficoTop5Ultimos6Meses = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('c.NomeFantasia'),
				/*DB::raw('0 as "mes01"'),*/
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 1 THEN 1 ELSE 0 END) as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 2 THEN 1 ELSE 0 END) as "mes02"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 3 THEN 1 ELSE 0 END) as "mes03"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 4 THEN 1 ELSE 0 END) as "mes04"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 5 THEN 1 ELSE 0 END) as "mes05"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 6 THEN 1 ELSE 0 END) as "mes06"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->where('c.id','<>','0')
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			//->whereRaw('YEAR(a.created_at) BETWEEN YEAR(CURRENT_DATE - INTERVAL 6 MONTH) AND YEAR(CURRENT_DATE - INTERVAL 1 MONTH)')
			//->whereRaw('MONTH(a.created_at) BETWEEN MONTH(CURRENT_DATE - INTERVAL 6 MONTH) AND MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')			
			->groupBy('c.NomeFantasia') 
			->orderBy(DB::raw('count(a.id)'),'DESC')
			->limit(5)
			->get();
			//->toJson();
			
	/* total redes semestre */
	  $graficoPorRedesSemestre = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('d.NomeRede,count(a.id) as "Soma"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->join('clientes_redes AS d','c.RedeID','=','d.id')
			->where('d.id','<>','0')
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			//->whereRaw('YEAR(a.created_at) BETWEEN YEAR(CURRENT_DATE - INTERVAL 6 MONTH) AND YEAR(CURRENT_DATE - INTERVAL 1 MONTH)')
			//->whereRaw('MONTH(a.created_at) BETWEEN MONTH(CURRENT_DATE - INTERVAL 6 MONTH) AND MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')			
			->groupBy('d.NomeRede')
			->orderBy(DB::raw('count(d.id)'),'DESC')
			->get();

	/*total franquias semestre */
	  $graficoPorFranquiasSemestre = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('d.NomeFranquia,count(a.id) as "Soma"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->join('clientes_franquias AS d','c.FranquiaID','=','d.id')
			->where('d.id','<>','0')
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			//->whereRaw('YEAR(a.created_at) BETWEEN YEAR(CURRENT_DATE - INTERVAL 6 MONTH) AND YEAR(CURRENT_DATE - INTERVAL 1 MONTH)')
			//->whereRaw('MONTH(a.created_at) BETWEEN MONTH(CURRENT_DATE - INTERVAL 6 MONTH) AND MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')			
			->groupBy('d.NomeFranquia')
			->orderBy(DB::raw('count(d.id)'),'DESC')
			->get();

	/* ANTIGO atendimetnos ano */
	  $graficoAtendimentosNoAno = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('0 as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 1 THEN 1 ELSE 0 END) as "mes02"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 2 THEN 1 ELSE 0 END) as "mes03"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 3 THEN 1 ELSE 0 END) as "mes04"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 4 THEN 1 ELSE 0 END) as "mes05"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 5 THEN 1 ELSE 0 END) as "mes06"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 6 THEN 1 ELSE 0 END) as "mes07"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 7 THEN 1 ELSE 0 END) as "mes08"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 8 THEN 1 ELSE 0 END) as "mes09"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 9 THEN 1 ELSE 0 END) as "mes10"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 10 THEN 1 ELSE 0 END) as "mes11"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 11 THEN 1 ELSE 0 END) as "mes12"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 12 THEN 1 ELSE 0 END) as "mes13"'))
			//->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-12 month", time())),date("Y-m-d 23:59:59",time())])
			->whereRaw('a.created_at >= DATE_FORMAT(CURRENT_DATE - INTERVAL 12 MONTH, "%Y/%m/01")')
			->whereRaw('a.created_at < DATE_FORMAT(CURRENT_DATE, "%Y/%m/01")')
			->get();

	/* NOVO atendimetnos ano 
	  $graficoAtendimentosNoAno = DB::table('huggy_indicadores AS a')
			->select(DB::raw('DATE_FORMAT(a.Data,"%m/%y") as x, a.Valor as y'))
			->where('a.Parametro','=','AtendimentosPorMes')
			->whereRaw('a.Data >= DATE_FORMAT(CURRENT_DATE - INTERVAL 12 MONTH, "%Y/%m/01")')
			->whereRaw('a.Data < DATE_FORMAT(CURRENT_DATE, "%Y/%m/01")')
			->orderBy(DB::raw('UNIX_TIMESTAMP(a.Data)'),'DESC')
			->get()
			->toJson();
*/
		
	/* ANTIGO - atendimentos por canal *
	  $graficoPorCanalAno = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('count(a.id) as "Soma"'),	 
				DB::raw('CASE channel_typeid WHEN 16 THEN "Telegram" ELSE "Messenger" END AS "Canal"'))
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-12 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('Canal')
			->get();
			
	/* NOVO - atendimentos por canal */
	  $graficoPorCanalAno = DB::table('huggy_indicadores AS a')
			->select(DB::raw('sum(a.Valor) as "Soma"'),	 
				DB::raw('Referencia as "Canal"'))
			->where('a.Parametro','=','AtendimentosPorCanal')
			->whereBetween('a.Data',[date("Y-m-d ",strtotime("-12 month", time())),date("Y-m-d",time())])
			->groupBy('Canal')
			->get();
			//->toJson();			
			
	/* atendimentos por departamento */
	  $graficoPorDepartamentoUltimoMes = DB::table('huggy_atendimentos AS a')
			//->select(DB::raw('count(a.id) as "Soma",departement_name as "Departamento"'))
			->select(DB::raw('count(a.id) as "y",department_name as "x"'))
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-1 month", time())),date("Y-m-d 23:59:59",time())])
			->where('a.department_id','<>','')
			->groupBy('x')
			->orderBy(DB::raw('count(a.id)'),'DESC')
			->get()
			->toJson();
			
      return view('indicadores.suporte',compact(
		'graficoUlt3MesesAtualEAnterior',
		'graficoAcompanhamento6MesesImplant',
		'graficoPeriodoImplantacao',
		'graficoTop5Ultimos6Meses',
		'graficoPorRedesSemestre',
		'graficoPorFranquiasSemestre',
		'graficoAtendimentosNoAno',
		'graficoPorCanalAno',
		'graficoPorDepartamentoUltimoMes')
      );		
    }
}	



/*select * from huggy_atendimentos where created_at between '2020-09-01 00:00:01' and '2020-09-30 23:59:59';
select * from huggy_atendimentos where id = 43937159;

/*tempo espera minutos*
DROP TEMPORARY TABLE espera;
CREATE TEMPORARY TABLE espera
select created_at,attended_at,id,(TIME_TO_SEC(attended_at) - TIME_TO_SEC(created_at)) AS `segundos`  from huggy_atendimentos 
WHERE 
/*YEAR(created_at) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
AND MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)*
created_at between '2020-05-01 00:00:01' and '2020-05-31 23:59:59'
AND WEEKDAY(created_at) not in(5,6)
AND TIME(created_at) not between '00:00:01' AND '07:55:00'
AND TIME(created_at) not between '12:00:01' AND '13:20:00'
having segundos between 0 and 900;
#select * from espera;
select sum(segundos),count(id),min(segundos),max(segundos) from espera;#4,33



/*atendimento minutos*
DROP TEMPORARY TABLE atendimento;
CREATE TEMPORARY TABLE atendimento
select id,(TIME_TO_SEC(closed_at) - TIME_TO_SEC(attended_at)) AS `segundos`,tabulation from huggy_atendimentos 
WHERE
/* YEAR(created_at) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
AND MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)*
created_at between '2020-09-01 00:00:01' and '2020-09-30 23:59:59'
AND WEEKDAY(created_at) not in(5,6)
AND TIME(created_at) not between '00:00:01' AND '07:55:00'
AND TIME(created_at) not between '12:00:01' AND '13:20:00'
having minutes between 0 and 60;
select sum(segundos),count(id),min(segundos),max(segundos),tabulation from atendimento group by tabulation;
*/