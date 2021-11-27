<?php

namespace App\Http\Controllers\Config;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SiteServicos;
use App\SiteBlog;
use App\SiteLogo;
use App\SiteDepoimento;
use App\Posts;
use Response;

class SiteController extends Controller
{
    //
    public function Index()
    {
        $blogLista = DB::table('site_blog')
            ->select(DB::raw("id,Titulo,Descricao,Origem,URL,Data,Imagem"))
            ->orderBy("Data","DESC")
			->get(); 
        $logoLista = DB::table('site_clientesinova')
            ->select(DB::raw("id,Logo,Cliente,Site,CASE Ativo WHEN 0 THEN 'Ativo' WHEN 1 THEN 'Inativo' END AS Situacao" ))
            ->get();
        $depoimentosLista = DB::table('site_depoimento')
            ->select(DB::raw("id,Depoimento,Cliente,Cargo,ImageCliente,CASE Ativo WHEN 0 THEN 'Ativo' WHEN 1 THEN 'Inativo' END AS Situacao" ))
            ->get(); 			
        $servicosLista = DB::table('site_servicos')
            ->select(DB::raw("id,Servico,Descricao,Icone,updated_at"))
            ->get(); 			
		  return view('config/site/index',compact('blogLista','logoLista','depoimentosLista','servicosLista'));
    }	
	//SERVIÇO
    public function editServico(Request $request)
    {
		$updServicos = SiteServicos::findOrFail($request->id);
		$updServicos->update([
		  'Servico'   => $request->Servico,
		  'Descricao' => $request->Descricao,
		  'Icone'     => $request->Icone
		]);	
        return response()->json($updServicos);
    }
    //BLOG
    public function addBlog(Request $request)
    {
        $addBlog = SiteBlog::create([
		   'Titulo'    => $request->Titulo,
           'Descricao' => $request->Descricao,
           'Origem'    => $request->Origem,
           'URL'       => $request->URL,
           'Data'      => date('Y-m-d',strtotime(str_replace('/', '-',$request->Data))),
		   'Imagem'    => $request->Imagem
		]);	
        return response()->json($addBlog);	
    }
    public function delBlog(Request $request)
    {
        $delBlog = SiteBlog::findOrFail($request->id);
		$delBlog->delete();
		return response()->json();
    }	
    //LOGO
    public function addLogo(Request $request)
    {
        
		//$file = request()->file('URL');
		//$file->store('toPath', ['disk' => 'site-brand-logos']);
		//$logo = $request->file('Logo')->store('site-brand-logos');
		$file = $request->file('Logo2');
		//$extension = $file->getClientOriginalExtension();
		//Storage::disk('site-brand-logos')->put($file->getFilename().'.'.$extension,  File::get($file));
		
		$addLogo = SiteLogo::create([
		   'Logo'    => $file->getFilename(),
		   //'Logo' => $request->Logo2,
           'Cliente' => $request->Cliente,
           'Site'    => $request->Site
		]);
        //return response()->json($addLogo);	
		return response()->json($addLogo);	
    }
    public function delLogo(Request $request)
    {
        $delLogo = SiteLogo::findOrFail($request->id);
		$delLogo->delete();
		return response()->json();
    }	
	
    //DEPOIMENTO
    public function addDepoimento(Request $request)
    {
		$addDepoimento = SiteDepoimento::create([
		   'Depoimento'   => $request->Depoimento,
           'Cliente'      => $request->Cliente,
           'Cargo'        => $request->Cargo,
		   'ImageCliente' => $request->ImageCliente
		]);
		return response()->json($addDepoimento);	
    }
    public function delDepoimento(Request $request)
    {
        $delDepoimento = SiteDepoimento::findOrFail($request->id);
		$delDepoimento->delete();
		return response()->json();
    }	


	
	
}
