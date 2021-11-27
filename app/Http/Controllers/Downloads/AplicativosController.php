<?php

namespace App\Http\Controllers\Downloads;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\DownloadAplicativos;


class AplicativosController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }    
    //
    public function index()
    {
        $pbmLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao'))
			->where('TipoDownload', '=', '1')
			->orderBy('Descricao','asc')
			->get(); 

        $impressoraLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,Descricao,Arquivo,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy, Versao'))
			->where('TipoDownload', '=', '2')
			->orderBy('Descricao','asc')
			->get(); 
			
        $bancoLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao'))
			->where('TipoDownload', '=', '3')
			->orderBy('Descricao','asc')
			->get(); 			
			
        $utilitariosLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,Descricao,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,Versao'))
			->where('TipoDownload', '=', '4')
			->orderBy('Descricao','asc')
			->get(); 			
        $windowsLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,Descricao,Arquivo,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,SiteCopyOficial,Versao'))
			->where('TipoDownload', '=', '5')
			->orderBy('Descricao','asc')
			->get(); 
        $etiquetasLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,Descricao,Arquivo,CONCAT(SiteDownload,Arquivo) AS SiteDownload,CONCAT(SiteCopy,Arquivo) AS SiteCopy,SiteCopyOficial,Versao'))
			->where('TipoDownload', '=', '6')
			->orderBy('Descricao','asc')
			->get();			
		return view('downloads/aplicativos',compact('pbmLista','impressoraLista','bancoLista','utilitariosLista','windowsLista','etiquetasLista'));
    }	

	public function store(Request $request)
	{
		switch ($request->tTipoDownload) {
			case 1:
				$path = 'public/downloads/pbms';
				break;
			case 2:
				$path = 'public/downloads/impressoras';
				break;
			case 3:
				$path = 'public/downloads/bancodados';
				break;
			case 4:
				$path = 'public/downloads/utilitarios';
				break;
			case 5:
				$path = 'public/downloads/windows';
				break;
			case 6:
				$path = 'public/downloads/etiquetas';
				break;
		}
		if($request->hasFile('tArquivo') && $request->file('tArquivo')->isValid()){
			$fileName = $request->file('tArquivo')->getClientOriginalName();
			$imagePath = $request->file('tArquivo')->storeAs($path,$fileName);
			$SiteDownload = 'http://suporte.tihub.com.br/'.$path;
			$SiteCopy = 'http://suporte.tihub.com.br/'.$path;
		} else {
			$fileName = null;
			$imagePath = null;
			$SiteDownload = $request->tSiteCopyOficial;
			$SiteCopy = $request->tSiteCopyOficial;
		}
		
		$save = DownloadAplicativos::create([
		  'TipoDownload'    => $request->tTipoDownload,
		  'Descricao'       => $request->tDescricao,
		  'Arquivo'         => $fileName,
		  'SiteDownload'    => $SiteDownload,
		  'SiteCopy'        => $SiteCopy,
		  'SiteCopyOficial' => $request->tSiteCopyOficial,
		  'Versao'          => $request->tVersao,
		  'ImagePath'       => $imagePath
		  
        ]);	 		
        return redirect('downloads/aplicativos');
	}
	
	public function destroy($id)
	{	
		if(!$delAplicativo = DownloadAplicativos::find($id))
            return redirect()->back();	
		
		if($delAplicativo->Arquivo && Storage::exists($delAplicativo->ImagePath)){
			Storage::delete($delAplicativo->ImagePath);
		}
		
		$delAplicativo->delete();
		return response()->json();
	}
}
