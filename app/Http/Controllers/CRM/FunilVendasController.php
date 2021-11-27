<?php

namespace App\Http\Controllers\CRM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CRMFunilVendas;
use App\CRMContatos;
use App\CRMFunilVendasContatos;
use App\Posts;
//use Auth;


class FunilVendasController extends Controller
{
    //
    public function Index()
    {
	  $contatosLista = DB::table('crm_contatos')
			->select(DB::raw('id,CONCAT(NomeContato," - ",Telefone) as "NomeContato"'))
			->orderBy('NomeContato')
			->get()
			->pluck('NomeContato','id');
	  //verificar necessidade ainda.
	  $origemLista = DB::table('crm_funilvendas_config')
			->select(DB::raw('id,Descricao'))
			->where('Ativo','=','0')
			->where('Tipo','=','3')
			->orderBy('Descricao')
			->get()
			->pluck('Descricao','id');

		return view('crm/index',compact('contatosLista','origemLista'));
    }		

    public function addFase1(Request $request)
    {
		
		if ($request->tContatos == '') {
		    $Contatos = CRMContatos::create([
		      'NomeContato'=> $request->tContato,
		      'Telefone'   => $request->tTelefone,
		      'Email'      => $request->tEmail,
		      'Observacao' => $request->tObs
		    ]);
			$FunilVendas = CRMFunilVendas::create([
			  'NomeFunil' => $request->tProjeto,
			  'Fase'      => '1'
			]);
			$FunilVendasContatos = CRMFunilVendasContatos::create([
			  'FunilVendaID' => $FunilVendas->id,
			  'CrmContatoID' => $Contatos->id
			]);
		} else {
			$FunilVendas = CRMFunilVendas::create([
			  'NomeFunil' => $request->tProjeto,
			  'Fase'      => '1'
			]);
			$FunilVendasContatos = CRMFunilVendasContatos::create([
			  'FunilVendaID' => $FunilVendas->id,
			  'CrmContatoID' => $request->tContatos
			]);
		}
		return redirect()->route('FunilVendas.addFase2',$FunilVendas->id);

    }

    public function addFase2($id)
    {
	  $crmDados = CRMFunilVendas::find($id);
	  
	  $categoriasLista = DB::table('crm_funilvendas_config')
			->select(DB::raw('id,Descricao'))
			->where('Tipo','=','1')
			->where('Ativo','=','0')
			->orderBy('Descricao')
			->get()
			->pluck('Descricao','id');
			
	  $origemLista = DB::table('crm_funilvendas_config')
			->select(DB::raw('id,Descricao'))
			->where('Tipo','=','3')
			->where('Ativo','=','0')
			->orderBy('Descricao')
			->get()
			->pluck('Descricao','id');	
			
	  $cidadesLista = DB::table('municipios_br')
            ->select(DB::raw('CONCAT(Municipio," - ",UF) AS Municipio'), 'CodigoIbge')
			->whereIn('UF',['PR','SC','RS'])
            ->groupBy('UF','Municipio','CodigoIbge')
			->orderBy('Municipio')
            ->get()
			->pluck('Municipio','CodigoIbge');
					
		return view('crm/create',compact('crmDados','categoriasLista','origemLista','cidadesLista'));
    }

    public function Editar()
    {
		return view('funilvendas/index');
    }

    public function Atualizar()
    {
		return view('funilvendas/index');
    }	
	
	
}