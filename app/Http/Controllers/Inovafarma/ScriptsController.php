<?php

namespace App\Http\Controllers\Inovafarma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Scripts;
use App\Posts;


class ScriptsController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
     //mostrar tela inicial cadastro de clientes
    {
      $scriptsLista = DB::table('inovafarma_scripts')
            ->select(DB::raw("id,created_at,updated_at,DescricaoScript,CodigoScript,SUBSTRING(CodigoScript,1,51) AS CodigoScriptReduz, InformacoesScript"))
			->get(); 
      
	  return view('inovafarma.scripts.index',compact('scriptsLista'));
    }
	
    public function store(Request $request)
    {
        $addScripts = Scripts::create([
		   'DescricaoScript'   => $request->Descricao,
           'InformacoesScript' => $request->Informacoes,
           'CodigoScript'      => $request->Script
		]);	

        return response()->json($addScripts);
    }

    public function update(Request $request)
    {
		$updScripts = Scripts::findOrFail($request->id);
		$updScripts->update([
		   'DescricaoScript'   => $request->Descricao,
           'InformacoesScript' => $request->Informacoes,
           'CodigoScript'      => $request->Script
	    ]);	
        return response()->json($updScripts);

    }

    public function destroy($id)
    {
		if(!$delScripts = Scripts::find($id))
            return redirect()->back();	

		$delScripts->delete();
		
        return response()->json();
    }

}		


    