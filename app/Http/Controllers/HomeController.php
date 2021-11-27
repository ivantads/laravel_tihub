<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\CalendarEvent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projetosLista = DB::table('projetos')
            ->select(DB::raw("projetos.id_projetos,clientes.NomeFantasia,data_inicio,data_fim,status,concat(Municipio,' / ',UF) as Cidade"))
            ->join('clientes', 'clientes.id', '=', 'projetos.id_cliente')
			->leftjoin('municipios_br', 'clientes.CodigoIbge', '=', 'municipios_br.CodigoIbge')
			->orderBy('data_inicio')
            ->where('Representante', '=','1')
			->where('analista','=',Auth::id())
			->limit(5)
            ->get(); 	 
        $chamadosLista = DB::table('inovafarma_chamados')
            ->select(DB::raw("id,UserID,Chamado,Titulo,created_at"))
			->where('Status','=',0)
			->where('UserID','=',Auth::id())
			->orderBy('Status')
			->limit(10)
			->get(); 
        $erroVersoesLista = DB::table('inovafarma_erroversoes')
            ->select(DB::raw("id,Versao,DescricaoOcorrencia,VersaoCorrigida,CASE WHEN TipoErro = 0 THEN 'Crítico' WHEN TipoErro = 1 THEN 'Esporád.' ELSE 'ESTAVEL' END as TextoTipoErro"))
			->orderBy('Versao', 'DESC')
			->limit(5)
			->get(); 
        $clientesLista = DB::table('clientes')
            ->select(DB::raw("id,SUBSTRING(RazaoSocial,1,30) as RazaoSocial,DataAtivacao"))
			->where('Representante', '=','1')
			->whereBetween('DataAtivacao',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			->orderBy('DataAtivacao', 'DESC')
			->limit(10)
			->get(); 
        //
		$newContact = DB::table('site_contatos')
			->select(DB::raw("count(id) as x"))
			->where('Assumido','=','1')
			//->limit(1)
			->get(); 
		$userId = Auth::user()->id;
		$implantacoesLista = DB::table('projetos')
			->select(DB::raw("(IFNULL(CASE when analista = $userId THEN COUNT(id_projetos) END ,0) - IFNULL(CASE when analista <> $userId THEN COUNT(id_projetos) END ,0)) AS Total"))
			->where('tipo','=','1')
			->where('data_inicio','>','2021-06-01')
			->groupBy('analista')
			->get();
		
        return view('index',compact('projetosLista','chamadosLista','erroVersoesLista','clientesLista','newContact','implantacoesLista'));
    }
	
    public function loadEventsUser(Request $request)
    {

        $returnedColumns = ['id', 'title', 'start', 'end', 'color', 'description', 'users', 'origin', 'url'];

        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end   = (!empty($request->end)) ? ($request->end) : ('');
		
        /** Retornaremos apenas os eventos ENTRE as datas iniciais e finais visiveis no calendário */
       // $events = CalendarEvent::whereBetween('start', [$start, $end])->get($returnedColumns); //->where('users','=',Auth::id())
	   $events = CalendarEvent::where('users','=',Auth::id())->get();

        return response()->json($events);
    }
}
