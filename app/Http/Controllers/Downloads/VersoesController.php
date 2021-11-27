<?php

namespace App\Http\Controllers\Downloads;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DownloadVersoes;


class VersoesController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    } 

    //
    public function index()
    {
        $inovaLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao,Releases,NotaVersao'))
			->where('TipoDownload', '=', '1')
			->orderBy('Versao','desc')
			->get(); 

        $serviceLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao,Releases,NotaVersao'))
			->where('TipoDownload', '=', '2')
			->orderBy('Versao','desc')
			->get(); 
			
        $importadorLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao,Releases,NotaVersao'))
			->where('TipoDownload', '=', '3')
			->orderBy('Versao','desc')
			->get(); 			
			
        $baseLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao,Releases,NotaVersao'))
			->where('TipoDownload', '=', '4')
			->orderBy('Versao','desc')
			->get(); 			
		return view('downloads/versoes',compact('inovaLista','serviceLista','importadorLista','baseLista'));
    }	

	public function store(Request $request)
	{
		
		$save = DownloadVersoes::create([
		  'TipoDownload' => $request->tTipo,
		  'Descricao'    => $request->tDescricao,
		  'SiteDownload' => $request->tSite,
		  'SiteCopy'     => $request->tSite,
		  'Releases'     => $request->tRelease,
		  'Versao'       => $request->tVersao,
		  'NotaVersao'   => $request->tNotas
        ]);	 		
        return redirect('downloads/versoes');
	}
	
	public function destroy($id)
	{	
		if(!$delVersoes = DownloadVersoes::find($id))
            return redirect()->back();	
		
		$delVersoes->delete();
		return response()->json();
	}
}
