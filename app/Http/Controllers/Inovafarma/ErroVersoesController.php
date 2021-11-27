<?php

namespace App\Http\Controllers\Inovafarma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\ErroVersoesRequest;
use App\Http\Controllers\Controller;
use App\Models\ErroVersoes;
use App\Posts;
use Validator;
use Response;


class ErroVersoesController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
      $erroversoesLista = DB::table('inovafarma_erroversoes')
            ->select(DB::raw("id,created_at,updated_at,Versao,DescricaoOcorrencia,Chamado,VersaoCorrigida,CASE WHEN TipoErro = 0 THEN 'Erro Crítico' WHEN TipoErro = 1 THEN 'Esporádico' ELSE 'ESTAVEL' END as TextoTipoErro,TipoErro"))
			->orderBy('Versao', 'DESC')
			->get(); 
      return view('inovafarma.erroversoes.index',compact(
		'erroversoesLista')
      );
    }
	
    public function store(Request $request)
    {
        $addErroVersoes = ErroVersoes::create([
		   'Versao'              => $request->Versao,
           'DescricaoOcorrencia' => $request->Ocorrencia,
           'Chamado'             => $request->Chamado,
           'VersaoCorrigida'     => $request->VersaoOK,
           'TipoErro'            => $request->TipoErro
		]);	
        return response()->json($addErroVersoes);
    }
	
    public function update(Request $request)
    {
		$updErroVersoes = ErroVersoes::findOrFail($request->id);
		$updErroVersoes->update([
		  'Versao'              => $request->Versao,
		  'DescricaoOcorrencia' => $request->Ocorrencia,
		  'Chamado'             => $request->Chamado,
		  'VersaoCorrigida'     => $request->VersaoOK,
		  'TipoErro'            => $request->TipoErro
		]);	
        return response()->json($updErroVersoes);
    }
	
    public function destroy($id)
    {
		if(!$delErroVersoes = ErroVersoes::find($id))
            return redirect()->back();	

		$delErroVersoes->delete();
		
        return response()->json();
    }



}		


    