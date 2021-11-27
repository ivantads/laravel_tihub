<?php

namespace App\Http\Controllers\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\ContratoRequest;
use App\Http\Controllers\Controller;
use App\Models\Contratos;
use App\Posts;


class ContratoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }    
	//
    public function index()
    {
        $contratosLista = DB::table('contratos')
			->select(DB::raw("contratos.id,contratos.created_at,contratos.updated_at,
			(select name from users where id = contratos.UserID) AS UserCreate,
			(select name from users where id = contratos.UserIDUpdated) AS UserUpdate,
			Versao,TextoContrato,CASE Tipo WHEN 1 THEN 'Proposta Comercial' ELSE 'Outros' END AS Tipo,NomeContrato,Validade"))
			->get(); 
		return view('config/contratos/index',compact('contratosLista'));
    }	
	
	public function create()
	{
		return view('config/contratos/create');
	}
	
	public function store(ContratoRequest $request)
	{
		$save = Contratos::create([
		  'UserID'        => Auth::id(),
		  'updated_at'    => date("Y-m-d H:i:s"),
		  'UserIDUpdated' => Auth::id(),
		  'Tipo'          => $request->tTipo,
		  'NomeContrato'  => $request->tNomeContrato,
		  'Versao'        => $request->tVersao,
		  'TextoContrato' => $request->tContrato,
		  'Validade'      => date('Y-m-d',strtotime(str_replace('/', '-',$request->tValidade)))
        ]);	  
        //
		return redirect()->route('contratos.edit',$save->id)->withSuccess(['Os dados do formulário foram salvos!']);
	}

     public function edit($id)
    {
	  if (!$contratoDados = Contratos::find($id))
            return redirect()->back();	
	  //	
      return view('config/contratos/edit',compact('contratoDados'));
    }	
	
    public function update(ContratoRequest $request, $id)
    {
		$updContrato = Contratos::findOrFail($id);
		//
		$updContrato->update([
		  'updated_at'    => date("Y-m-d H:i:s"),
		  'UserIDUpdated' => Auth::id(),
		  'Tipo'          => $request->tTipo,
		  'NomeContrato'  => $request->tNomeContrato,
		  'Versao'        => $request->tVersao,		  
		  'TextoContrato' => $request->tContrato,
		  'Validade'      => date('Y-m-d',strtotime(str_replace('/', '-',$request->tValidade)))
        ]);	  
		//
        return redirect()->route('contratos.edit',$updContrato->id)->withSuccess(['Os dados do formulário foram atualizados!']);			
    }	

}
