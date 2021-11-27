<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\SiteContatos;
use App\SiteNewsletter;

class SiteController extends Controller{
    
    public function index()
	{
        $blogLista = DB::table('site_blog')
            ->select(DB::raw("id,Titulo,Descricao,Origem,URL,Data,Imagem"))
			->orderBY('Data','DESC')
			->limit(10)
            ->get(); 
        $logoLista = DB::table('site_clientesinova')
            ->select(DB::raw("id,Logo,Cliente,Site"))
			->where('Ativo','=',0)
			->inRandomOrder()
			->limit(9)
            ->get();
        $depoimentosLista = DB::table('site_depoimento')
            ->select(DB::raw("id,Depoimento,Cliente,Cargo,ImageCliente"))
			->where('Ativo','=',0)
			->inRandomOrder()
			->limit(5)
            ->get(); 			
        $servicosLista = DB::table('site_servicos')
            ->select(DB::raw("id,Servico,Descricao,Icone"))
            ->get(); 			
		  //return view('site.index');
		  return view('site.index',compact('blogLista','logoLista','depoimentosLista','servicosLista'));
    }

    public function addContatos(Request $request)
    {
        /*$data = $request()->validate([
            'email' => 'required|email',
        ]);*/
        $addContato = SiteContatos::create([
		   'NomeCompleto'  => $request->NomeCompleto,
           'NomeFarmacia'  => $request->NomeFarmacia,
           'Assunto'       => $request->Assunto,
           'MelhorHorario' => $request->MelhorHorario,
           'Email'         => $request->Email,
		   'Telefone'      => $request->Telefone
		]);	
		$arr = array('message' => 'Nossos consultores em breve entrarão em contato conforme horário combinado!', 'title' => 'Fique tranquilo...');
		return response()->json($arr);		
    }
    public function addNewsletter(Request $request)
    {
        /*$data = $request()->validate([
            'email' => 'required|email',
        ]);*/
        $addNewsletter = SiteNewsletter::create(['Email' => $request->Email]);	
		$arr = array('message' => 'Você estará sempre atualizado com todas as novidades!', 'title' => 'Sucesso...');
		return response()->json($arr);		
    }


}