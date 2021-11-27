<?php

namespace App\Http\Controllers\Cadastros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\Posts;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function Index()
     //mostrar tela inicial cadastro de clientes
    {
      $clientesLista = DB::table('clientes')
            ->join('municipios_br', 'clientes.CodigoIbge', '=', 'municipios_br.CodigoIbge')
			->leftjoin('clientes_pessoas','clientes.id','=','cliente_id')
			->leftjoin('clientes_redes','clientes.RedeID','=','clientes_redes.id')
            ->select(DB::raw("clientes.id,CNPJ,SUBSTRING(RazaoSocial,1,30) as RazaoSocial,SUBSTRING(NomeFantasia,1,40) as NomeFantasia,NomeApresentacao,TelefoneFixo,TelefoneCelular,concat(Municipio,' / ',uf) as Cidade, CASE Representante WHEN 1 THEN 'TIHUB' WHEN 2 THEN 'MVPRIME' ELSE 'TIHUB' END AS Representante,ContratoInova,NomeContato,MegaEmail,MegaSenha,MegaChaveRecuperacao,ServidorUsuario,ServidorSenha,SqlSenha,ServidorMemoria"))
			->where('Representante', '=','1')
			->where('clientes.Situacao', '=' ,'A')
			->get(); 	  

	  $clientesTotal = DB::table('clientes')
            ->where('Representante', '=','1');
      $totalClientes = $clientesTotal->count();
			
	  $clientesAtivas = DB::table('clientes')
            ->where('Situacao', '=','A')
            ->where('Representante', '=','1');
      $totalClientesAtivas = $clientesAtivas->count();
	  $percClientesAtivas = number_format(($totalClientesAtivas / $totalClientes) * 100,2);

      $clientesBloqueadasCanceladas = DB::table('clientes')
            ->where('Situacao', '!=' ,'A')
            ->where('Representante', '=','1');
      $totalClientesBloqueadasCanceladas = $clientesBloqueadasCanceladas->count();
	  $percClientesBloqueadasCanceladas = number_format(($totalClientesBloqueadasCanceladas / $totalClientes) * 100,2);

	  $clientesAtivasAno = DB::table('clientes')
            ->whereYear('DataAtivacao', '=',date("Y"))
            ->where('Representante', '=','1');	  
	  $totalClientesAtivasAno = $clientesAtivasAno->count();

	  $clientesAtivas90dias = DB::table('clientes')
			->whereBetween('DataAtivacao',[date("Y-m-d 00:00:01",strtotime("-3 month", time())),date("Y-m-d 23:59:59",time())])
			->where('Representante', '=','1');	  
	  $totalClientesAtivas90dias = $clientesAtivas90dias->count();

	  $clientesAtivasMes = DB::table('clientes')
			->whereMonth('DataAtivacao', '=',date("m"))
			->whereYear('DataAtivacao', '=',date("Y"))
			->where('Representante', '=','1');
	  $totalClientesAtivasMes = $clientesAtivasMes->count();
	  
	  $clientesCanceladasAno = DB::table('clientes')
			->where('Situacao', '=','C')
			->whereYear('DataCancelamento', '=',date("Y"))
			->where('Representante', '=','1');
	  $totalClientesCanceladasAno = $clientesCanceladasAno->count();
	  
	  $clientesCanceladas90dias = DB::table('clientes')
			->where('Situacao', '=','C')
			->whereBetween('DataCancelamento',[date("Y-m-d 00:00:01",strtotime("-3 month", time())),date("Y-m-d 23:59:59",time())])
			->where('Representante', '=','1');
	  $totalClientesCanceladas90dias = $clientesCanceladas90dias->count();
	  
	  $clientesCanceladasMes = DB::table('clientes')
			->where('Situacao', '=','C')
			->whereMonth('DataCancelamento', '=',date("m"))
			->whereYear('DataCancelamento', '=',date("Y"))
			->where('Representante', '=','1');
	  $totalClientesCanceladasMes = $clientesCanceladasMes->count();
	  
      return view('cadastros.clientes.index',compact(
		'clientesLista',
		'totalClientes',
		'totalClientesAtivas',
		'percClientesAtivas',
		'totalClientesBloqueadasCanceladas',
		'percClientesBloqueadasCanceladas',
		'totalClientesAtivasAno',
		'totalClientesAtivas90dias',
		'totalClientesAtivasMes',
		'totalClientesCanceladasAno',
		'totalClientesCanceladas90dias',
		'totalClientesCanceladasMes')
      );
    }

    public function Novo()
    //direciona para incluir novo registro
    {
	  //popula campos com as redes cadastradas
	  $redesLista = DB::table('clientes_redes')
            ->where('Situacao', 'A')
			->orderBy('NomeRede')
			->get()
			->pluck('NomeRede','id');

	  //popula campos com as franquias cadastradas
	  $franquiasLista = DB::table('clientes_franquias')
            ->where('Situacao', 'A')
			->orderBy('NomeFranquia')
			->get()
			->pluck('NomeFranquia','id');			
			
	  //popula campos com as cidades cadastradas
	  $cidadesLista = DB::table('municipios_br')
            ->select(DB::raw('CONCAT(Municipio," - ",UF) AS Municipio'), 'CodigoIbge')
			->whereIn('UF',['PR','SC','RS'])
            ->groupBy('UF','Municipio','CodigoIbge')
			->orderBy('Municipio')
            ->get()
			->pluck('Municipio','CodigoIbge');

	  $processadoresLista = DB::table('clientes')
            ->select(DB::raw('ServidorProcessador'))
			->groupBy('ServidorProcessador')
			->get();
			
			
      return view('cadastros.clientes.empresa',compact('redesLista','franquiasLista','cidadesLista','processadoresLista'));
    }

    public function Salvar(ClienteRequest $request)
    //salva novo registro no banco de dados
    {
		$this->validate($request, [
		  'tCnpj' => 'required|unique:clientes,CNPJ'
		]);  
		//$request->validate(['tCnpj' => 'unique:clientes,inscricao_federal']);
		$pontuacao = array('.','-','/');
		
		if ($request->tNomeApresentacao) {
			$NomeApresentacao = $request->tNomeApresentacao;
		}else{
			$NomeApresentacao = $request->tRazaoSocial . ' - ' . $request->tFantasia;
		}
		
		$save = clientes::create([
		  'ContratoInova'      => $request->tContratoInova,
		  'RazaoSocial'        => $request->tRazaoSocial,
		  'NomeFantasia'       => $request->tFantasia,
		  'CNPJ'               => $request->tCnpj,
		  'CNPJLimpo'          => str_replace($pontuacao,'',$request->tCnpj),
		  'IE'                 => $request->tInscEstadual,
		  'Endereco'           => $request->tEndereco,
		  'Numero'             => $request->tNum,
		  'Bairro'             => $request->tBairro,
		  'Complemento'        => $request->tComplemento,
		  'CEP'                => $request->tCep,
		  'CodigoIbge'         => $request->tCidade,
		  'TelefoneFixo'       => $request->tTelefone,
		  /*'TelefoneFixo2'     => $request->,*/
		  'TelefoneCelular'    => $request->tCelular,
		  /*'TelefoneCelular2'  => $request->,*/
		  'Representante'      => $request->tRepresentante,
		  'RedeID'             => $request->tRede,
		  'Filial'             => $request->tFG,
		  'FranquiaID'         => $request->tFranquia,
		  'Email'              => $request->tEmail,
		  'Site'               => $request->tSite,
		  'Situacao'           => 'A', //$request->tSituacao
		  'NomeContato'        => $request->tContato,
		  'Representante'      => '1', //seta tihub como representante
		  'Observacao'         => $request->tObservacao,
		  'UserID'            => Auth::user()->id,
		  /*'codigo_antigo'      => $request->,*/
		  'Sistema'            => $request->tUnNegocio,
		  'MegaEmail'=> $request->tMegaEmail,
		  'MegaSenha'=> $request->tMegaSenha,
		  'MegaChaveRecuperacao'=> $request->tMegaChaveRecuperacao,
		  'ServidorUsuario'=> $request->tServidorUsuario,
		  'ServidorSenha'=> $request->tServidorSenha,
		  'SqlSenha'  => $request->tSqlSenha,
		  'ServidorIP' => $request->tServidorIP,
		  'EmailRT' => $request->tEmailRT,
		  'SenhaRT' => $request->tSenhaRT,
		  'NomeRT' => $request->tNomeRT,
		  'LogmeinRedeID' => $request->tLogmeinRedeID,
		  'ServidorProcessador' => $request->tServidorProcessador,
		  'ServidorMemoria' => $request->tServidorMemoria,
		  'NomeApresentacao' => $NomeApresentacao
        ]);	  
//|unique:clientes,inscricao_federal
        
		return redirect()->route('Cadastros.Clientes.Editar',$save->id)->withSuccess(['Cadastro inserido com sucesso!']);	
    }
	
     public function Editar($id)
     //direciona para editar o registro selecionado
    {
	  $clienteDados = clientes::find($id);	
	  
	  $redesLista = DB::table('clientes_redes')
            ->where('Situacao', 'A')
			->orderBy('NomeRede')
			->get()
			->pluck('NomeRede','id');
			
	  //popula campos com as franquias cadastradas
	  $franquiasLista = DB::table('clientes_franquias')
            ->where('Situacao', 'A')
			->orderBy('NomeFranquia')
			->get()
			->pluck('NomeFranquia','id');
			
	  //popula campos com as cidades cadastradas
	  $cidadesLista = DB::table('municipios_br')
            ->select(DB::raw('CONCAT(Municipio," - ",UF) AS Municipio'), 'CodigoIbge')
			->whereIn('UF',['PR','SC','RS'])
            ->groupBy('UF','Municipio','CodigoIbge')
			->orderBy('Municipio')
            ->get()
			->pluck('Municipio','CodigoIbge');
			
	  $processadoresLista = DB::table('clientes')
            ->select(DB::raw('ServidorProcessador'))
			->groupBy('ServidorProcessador')
			->get();
			
			
	  $estatisticaA = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('b.NomeContato as "atendimento"'),
				//DB::raw('0 as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 0 THEN 1 ELSE 0 END) as "mes01"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 1 THEN 1 ELSE 0 END) as "mes02"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 2 THEN 1 ELSE 0 END) as "mes03"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 3 THEN 1 ELSE 0 END) as "mes04"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 4 THEN 1 ELSE 0 END) as "mes05"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 5 THEN 1 ELSE 0 END) as "mes06"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 6 THEN 1 ELSE 0 END) as "mes07"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 7 THEN 1 ELSE 0 END) as "mes08"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 8 THEN 1 ELSE 0 END) as "mes09"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 9 THEN 1 ELSE 0 END) as "mes10"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 10 THEN 1 ELSE 0 END) as "mes11"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.closed_at,"%Y%m")) = 11 THEN 1 ELSE 0 END) as "mes12"')) 
			->leftjoin('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})				
			->join('clientes AS c','b.ClienteID','=','c.id')
			->whereRaw('a.created_at >= DATE_FORMAT(CURRENT_DATE - INTERVAL 12 MONTH, "%Y/%m/01")')
			->whereRaw('a.created_at < DATE_FORMAT(CURRENT_DATE, "%Y/%m/01")')
			->where('c.id','=',$id)
			->groupBy('atendimento');
			
	  $estatisticaB = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('c.NomeFantasia as "atendimento"'),
			    //DB::raw('0 as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 0 THEN 1 ELSE 0 END) as "mes01"'),
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
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 11 THEN 1 ELSE 0 END) as "mes12"'))
				//DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 12 THEN 1 ELSE 0 END) as "mes13"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->whereRaw('a.created_at >= DATE_FORMAT(CURRENT_DATE - INTERVAL 12 MONTH, "%Y/%m/01")')
			->whereRaw('a.created_at < DATE_FORMAT(CURRENT_DATE, "%Y/%m/01")')
			->where('c.id','=',$id)
			->groupBy('atendimento');
	  $estatisticaLista = $estatisticaB->union($estatisticaA)->get();
	  
	  $vinculosLista = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('a.channel_typename'),
				DB::raw('b.id'),
				DB::raw('CASE WHEN a.customer_name = "" THEN a.customer_messenger_name WHEN a.customer_messenger_name = "" THEN a.customer_name END AS "name"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->where('c.id','=',$id)
			->groupBy('name','b.id','a.channel_typename')
			->get();

	  $vinculosLista = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('a.channel_typename'),
				DB::raw('b.id'),
				DB::raw('b.NomeContato AS "name"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->where('c.id','=',$id)
			->groupBy('name','b.id','a.channel_typename')
			->get();

	  $graficoAtendPorDepartamentoSemestre = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('a.department_name as "Departamento"'),
			    //DB::raw('0 as "mes01"'),
				
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 0 THEN 1 ELSE 0 END) as "mes01"'),
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
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.created_at,"%Y%m")) = 11 THEN 1 ELSE 0 END) as "mes12"'))
				
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->where('c.id','=',$id)
			->whereRaw('a.department_id <> ""')
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-12 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('Departamento')
			->orderBy(DB::raw('count(a.department_id)'),'DESC')
			->get();

	  $topDepartamentoSemestre = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('count(a.department_id) as "Soma"'))
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->where('c.id','=',$id)
			->whereRaw('a.department_id <> ""')
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('a.department_id')
			->orderBy(DB::raw('count(a.department_id)'),'DESC')
			->limit(1);
			
	  $GraficoDepartamentoUsuarioSemestre = DB::table('huggy_atendimentos AS a')
			->select(DB::raw('b.NomeContato'),
				DB::raw('count(a.department_id) as "mes01"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.department_id,"%Y%m")) = 1 THEN 1 ELSE 0 END) as "mes02"'),
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.department_id,"%Y%m")) = 2 THEN 1 ELSE 0 END) as "mes03"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.department_id,"%Y%m")) = 3 THEN 1 ELSE 0 END) as "mes04"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.department_id,"%Y%m")) = 4 THEN 1 ELSE 0 END) as "mes05"'), 
				DB::raw('SUM(CASE WHEN PERIOD_DIFF(date_format(now(),"%Y%m"),date_format(a.department_id,"%Y%m")) = 5 THEN 1 ELSE 0 END) as "mes06"'))			
			->join('huggy_atendimentos_clientes AS b',function($join){
				$join->on('b.CustomerID','=','a.customer_id')->orOn('b.CustomerMessengerID','=','a.customer_messenger_id');
			})
			->join('clientes AS c','b.ClienteID','=','c.id')
			->where('c.id','=',$id)
			//->where('a.department_id','=',$topDepartamentoSemestre->get())
			->whereBetween('a.created_at',[date("Y-m-d 00:00:01",strtotime("-12 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('b.NomeContato')
			->orderBy(DB::raw('count(a.department_id)'),'DESC')
			->get();

	
      return view('cadastros.clientes.editar',compact('clienteDados','redesLista','franquiasLista','cidadesLista','processadoresLista','estatisticaLista','vinculosLista',
	  'graficoAtendPorDepartamentoSemestre','GraficoDepartamentoUsuarioSemestre'));
    }

    public function Atualizar(ClienteRequest $request, $id)
     //salva a atualização no banco de dados
    {
		$updEmpresa = clientes::findOrFail($id);
		$pontuacao = array('.','-','/');

		$updEmpresa->update([
		  'ContratoInova'      => $request->tContratoInova,
		  'RazaoSocial'       => $request->tRazaoSocial,
		  'NomeFantasia'      => $request->tFantasia,
		  //'CNPJ'  => $request->tCnpj,
		  'CNPJLimpo'          => str_replace($pontuacao,'',$request->tCnpj),
		  'IE' => $request->tInscEstadual,
		  'Endereco'           => $request->tEndereco,
		  'Numero'             => $request->tNum,
		  'Bairro'             => $request->tBairro,
		  'Complemento'        => $request->tComplemento,
		  'CEP'                => $request->tCep,
		  'CodigoIbge'        => $request->tCidade,
		  'TelefoneFixo'      => $request->tTelefone,
		  /*'TelefoneFixo2'     => $request->,*/
		  'TelefoneCelular'   => $request->tCelular,
		  /*'TelefoneCelular2'  => $request->,*/
		  'NomeContato'        => $request->tContato,
		  'Representante'      => $request->tRepresentante,
		  'RedeID'             => $request->tRede,
		  'Filial'             => $request->tFG,
		  'FranquiaID'         => $request->tFranquia,
		  'Email'              => $request->tEmail,
		  'Site'               => $request->tSite,
		  'Situacao'           => 'A', //$request->tSituacao
		  'Representante'           => '1',  //seta tihub como representante
		  'Observacao'         => $request->tObservacao,
		  //'UserID'            => Auth::user()->id,
		  /*'codigo_antigo'      => $request->,*/
		  'Sistema'            => $request->tUnNegocio,
		  'MegaEmail'=> $request->tMegaEmail,
		  'MegaSenha'=> $request->tMegaSenha,
		  'MegaChaveRecuperacao'=> $request->tMegaChaveRecuperacao,
		  'ServidorUsuario'=> $request->tServidorUsuario,
		  'ServidorSenha'=> $request->tServidorSenha,
		  'SqlSenha'  => $request->tSqlSenha,
		  'ServidorIP' => $request->tServidorIP,
		  'EmailRT' => $request->tEmailRT,
		  'SenhaRT' => $request->tSenhaRT,
		  'NomeRT' => $request->tNomeRT,
		  'LogmeinRedeID' => $request->tLogmeinRedeID,
		  'ServidorProcessador' => $request->tServidorProcessador,
		  'ServidorMemoria' => $request->tServidorMemoria,
		  'NomeApresentacao' => $request->tNomeApresentacao
		  
        ]);	  
		
        return redirect()->route('Cadastros.Clientes.Editar',$updEmpresa->id)->withSuccess(['Atualizado com sucesso!']);			
    }
	
    public function BuscaCep(Request $request)
	//Funcao para buscar o endereco conforme cep informado
    {
      $data = [];
      $cep = $request->all();
	  //$cep = '85.806-000';
	  if (!empty($cep)) {
		  $data = DB::table("cep_br")
		     ->join('municipios_br', 'cep_br.CodigoIbge', '=', 'municipios_br.CodigoIbge')
			 ->select(DB::raw('CONCAT(TipoEndereco," ",Endereco) AS Endereco'), 'Bairro','cep_br.CodigoIbge','Municipio','UF')
		     ->where('CEP','=',$cep)
		     ->get();
		  
		  return response()->json($data);
	  } else {
		  return response()->json($data);
	  }	  
    }


}	














/*
    }

    public function adicionar()
    {
      return view('cadastros.clientes.adicionar');
    }

    public function salvar(request $req)
    {
        //executa o salvar no banco de dados
      $dados = $req->all();

      clientes::create($dados);

      return redirect()->route('cadastros.clientes');
    }

    public function Update($id)
     //executa a e no banco de dados
    {
      $registro = clientes::find($id);
      return view('cadastros.clientes.update',compact('registro'));
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = clientes::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->NomeFantasia];
        }

        return \Response::json($formatted_tags);
    }
    public function busca(Request $request)
    {
    	$data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("clientes")
            		->select("id","NomeFantasia")
            		->where('NomeFantasia','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }
}
*/