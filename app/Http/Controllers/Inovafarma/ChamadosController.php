<?php

namespace App\Http\Controllers\Inovafarma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Chamados;
use App\Posts;


class ChamadosController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
	  $clientesLista = DB::table('clientes')
            ->where('Situacao', '!=','C')
			->where('Representante', '=','1')	
			->orderBy('NomeApresentacao')
			->get()
			->pluck('NomeApresentacao','id');
			
      $chamadosLista = DB::table('inovafarma_chamados')
            ->select(DB::raw("inovafarma_chamados.id,inovafarma_chamados.created_at,inovafarma_chamados.updated_at,inovafarma_chamados.UserID,users.name as Atendente,Chamado,Titulo,EmpresaID,NomeFantasia,NomeApresentacao,
				CASE Status WHEN 0 THEN 'Aberto' WHEN 1 THEN 'Finalizado' END AS TextoStatus,Status,VersaoOK,WI,
				CASE inovafarma_chamados.Tipo WHEN 1 THEN 'Atendimento' WHEN 2 THEN 'Dúvida' WHEN 3 THEN 'Incidente' WHEN 4 THEN 'Melhoria'  END AS TextoTipo,inovafarma_chamados.Tipo as NrTipo"))
			->join('clientes','EmpresaID','=','clientes.id')
			->join('users','inovafarma_chamados.UserID','=','users.id')
			->orderBy('Status')
			->orderBy('Chamado', 'desc')
			->get(); 
			
      return view('inovafarma.chamados.index',compact('chamadosLista','clientesLista'));
    }
	
    public function store(Request $request)
    {
        $addChamados = Chamados::create([
		   'UserID'    => Auth::user()->id,
		   'Chamado'   => $request->Chamado,
           'Titulo'    => $request->Titulo,
           'EmpresaID' => $request->Empresa,
           'Status'    => $request->Status,
           'VersaoOK'  => $request->VersaoOK,
		   'WI'        => $request->WI,
		   'Tipo'      => $request->Tipo
		]);	
        return response()->json($addChamados);
    }

    public function update(Request $request)
    {
		$updChamados = Chamados::findOrFail($request->id);
		$updChamados->update([
		   'UserID'    => Auth::user()->id,
		   'Chamado'   => $request->Chamado,
           'Titulo'    => $request->Titulo,
           'EmpresaID' => $request->Empresa,
           'Status'    => $request->Status,
           'VersaoOK'  => $request->VersaoOK,
		   'WI'        => $request->WI,
		   'Tipo'      => $request->Tipo
		]);	
        return response()->json($updChamados);
    }

    public function destroy($id)
    {
		if(!$delChamados = Chamados::find($id))
            return redirect()->back();	

		$delChamados->delete();
		
        return response()->json();
    }

}		