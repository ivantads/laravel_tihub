<?php
namespace App\Http\Controllers\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\ProjetoRequest;
use App\Http\Controllers\Controller;
use App\Projetos;
use App\CalendarEvent;
use App\Clientes;
use App\Contratos;
use App\Posts;

class ProjetoController extends Controller{
    
    public function index(){
       //mostrar tela inicial mostra projetos
      $projetosLista = DB::table('projetos')
		  ->join('clientes', 'clientes.id', '=', 'projetos.id_cliente')
		  ->leftjoin('municipios_br', 'clientes.CodigoIbge', '=', 'municipios_br.CodigoIbge')
      ->select(DB::raw("projetos.id_projetos,
      (select name from users where id = projetos.analista) AS analista,
			(select name from users where id = projetos.agente_comercial) AS agente_comercial,
      clientes.NomeFantasia,clientes.TelefoneFixo,responsavel_implantacao,data_inicio,data_fim,data_negociada,status,concat(Municipio,' / ',UF) as Cidade"))
		  ->orderBy('data_inicio','DESC')
		  ->where('status', '!=','finalizado')
		  ->get(); 	 
		  return view('projetos.index',compact('projetosLista')
		  );
    }



    public function create(){
      
        $clientesLista = DB::table('clientes')
        ->select(DB::raw("id,SUBSTRING(NomeFantasia,1,40) as NomeFantasia,NomeApresentacao"))
        ->where('Representante', '=',1)
        ->get(); 	

        $usersLista = DB::table('users')
        ->orderBy('name')
        ->get()
        ->pluck('name','id');			

          return view('projetos.projeto',compact('clientesLista','usersLista'));
    }


    public function store(Request $request){
    

      $projeto = new Projetos();


      //separa intervalo de datas para persistir no banco
      $data  = $request->input('periodo');
      $result = explode(" - ", $data);
      $time1 = ($result[0]);
      $data1 = date('Y-m-d 08:00:00',strtotime(str_replace('/', '-',$time1)));
      $time2 = ($result[1]);
      $data2 = date('Y-m-d 18:00:00',strtotime(str_replace('/', '-',$time2)));

      //separa id cliente e nome cliente para nome ser inserido no calendar
      $cliente  = $request->input('id_cliente');
      $result_cli = explode("*+", $cliente);
      $idCliente = ($result_cli[0]);
      $fantasiaCliente = ($result_cli[1]);

      $angendaNegocivel = $request->input('data_negociada');


          $projeto->id_cliente = $idCliente;
          $projeto->data_inicio = $data1;
          $projeto->data_fim = $data2;
          $projeto->data_negociada = $request->input('data_negociada');
          $projeto->natureza_implantacao = $request->input('natureza_implantacao');
          $projeto->responsavel_implantacao = $request->input('responsavel_implantacao');
          $projeto->tipo_farmacia = $request->input('tipo_farmacia');
          $projeto->regime_tributario = $request->input('regime_tributario');
          $projeto->analista = $request->input('id_analista');
		  $projeto->tipo = $request->input('tipo');
          $projeto->agente_comercial = $request->input('agente_comercial'); 
          $projeto->imp_cpa = isset($request->cpa)? 1 : 0;
          $projeto->imp_cpr = isset($request->cpr)? 1 : 0;
          $projeto->imp_prod = isset($request->prd)? 1 : 0;
          $projeto->imp_cli = isset($request->cli)? 1 : 0;
          $projeto->imp_out = isset($request->out)? 1 : 0;
          $projeto->pbm_fp = isset($request->fp)? 1 : 0;
          $projeto->pbm_trn = isset($request->trn)? 1 : 0;
          $projeto->pbm_func = isset($request->func)? 1 : 0;
          $projeto->pbm_epha = isset($request->eph)? 1 : 0;
          $projeto->pbm_vd = isset($request->vd)? 1 : 0;
          $projeto->pbm_phar = isset($request->phar)? 1 : 0;
          $projeto->pbm_pec = isset($request->pec)? 1 : 0;
          $projeto->pbm_obj = isset($request->obj)? 1 : 0;
          $projeto->pbm_rec = isset($request->rec)? 1 : 0;
          $projeto->tef = isset($request->tef)? 1 : 0;
          $projeto->gest_comp = isset($request->tef)? 1 : 0;
          $projeto->fiscal_gest_trib = isset($request->fiscal_gest_trib)? 1 : 0;
          $projeto->fiscal_sped = isset($request->fiscal_sped)? 1 : 0;
          $projeto->fiscal_sintegra = isset($request->fiscal_sintegra)? 1 : 0;
          $projeto->fiscal_outros = isset($request->fiscal_outros)? 1 : 0;
          $projeto->fiscal_msg_outros = $request->input('tfiscal_outros'); 
          $projeto->import_info = $request->input('timport_info'); 
          $projeto->status = 'aguardando';
          $projeto->save();

          //apos salvar projeto captura id para inserir na url do calendario
          $idUrl =$projeto->id_projetos;


          $calendario = new CalendarEvent();          
          $calendario->title = $fantasiaCliente;
          $calendario->description = $fantasiaCliente;
          $calendario->start = $data1;
          $calendario->end = $data2;
          $calendario->users = $request->input('id_analista');
          $calendario->url = "/Projetos/$idUrl/edit";
          $de = $request->input('data_negociada');
          $calendario->id_origin = $idUrl;
      
          if($angendaNegocivel =='SIM'){
            $calendario->color = '#FF9933';
          }else if($angendaNegocivel =='NAO'){
            $calendario->color = '#FF8086';
          }
          
          $calendario->origin = "1";
          $calendario->save();
      
          return redirect('Projetos');
         // ->action('ProjetoController@index')
      //return view('Projetos.index');
    }






    public function show($id){
        //
    }

    
    public function edit($id){
      $projetosDados = DB::table('projetos')
	    ->join('clientes', 'clientes.id', '=', 'projetos.id_cliente')
	    ->select('projetos.*', 'clientes.NomeFantasia', 'clientes.id')
	    ->where('id_projetos', '=', $id)
	    ->first();
      $usersLista = DB::table('users')
      ->where('tipo', '1')
      ->orderBy('name')
      ->get()
      ->pluck('name','id');			
      $clientesLista = Clientes::all();
      return view('projetos.editar',compact('projetosDados','clientesLista','usersLista'));
    }

    public function update(Request $request,$id){
        $valida  = $request->input('status');
        if($valida == 'pre'){
        $projeto = Projetos::findOrFail($id);
        $projeto->status = 'pre';
        $projeto->save();
        return redirect('Projetos');
        }else{
          $projeto = Projetos::findOrFail($id);
          $data  = $request->input('datefilter');
      $result = explode(" - ", $data);
      $time1 = ($result[0]);
      $data1 = date('Y-m-d',strtotime(str_replace('/', '-',$time1)));
      $time2 = ($result[1]);
      $data2 = date('Y-m-d',strtotime(str_replace('/', '-',$time2)));
      
        $projeto->id_cliente = $request->input('id_cliente');
        $projeto->data_inicio = $data1;
      $projeto->data_fim = $data2;
          $projeto->data_negociada = $request->input('data_negociada');
          $projeto->natureza_implantacao = $request->input('natureza_implantacao');
          $projeto->responsavel_implantacao = $request->input('responsavel_implantacao');
          $projeto->tipo_farmacia = $request->input('tipo_farmacia');
          $projeto->regime_tributario = $request->input('regime_tributario');
          $projeto->analista = $request->input('id_analista');
          $projeto->tipo = $request->input('tipo');
		  $projeto->agente_comercial = $request->input('agente_comercial'); 
          $projeto->imp_cpa = isset($request->cpa)? 1 : 0;
          $projeto->imp_cpr = isset($request->cpr)? 1 : 0;
          $projeto->imp_prod = isset($request->prd)? 1 : 0;
          $projeto->imp_cli = isset($request->cli)? 1 : 0;
          $projeto->imp_out = isset($request->out)? 1 : 0;
          $projeto->pbm_fp = isset($request->fp)? 1 : 0;
          $projeto->pbm_trn = isset($request->trn)? 1 : 0;
          $projeto->pbm_func = isset($request->func)? 1 : 0;
          $projeto->pbm_epha = isset($request->eph)? 1 : 0;
          $projeto->pbm_vd = isset($request->vd)? 1 : 0;
          $projeto->pbm_phar = isset($request->phar)? 1 : 0;
          $projeto->pbm_pec = isset($request->pec)? 1 : 0;
          $projeto->pbm_obj = isset($request->obj)? 1 : 0;
          $projeto->pbm_rec = isset($request->rec)? 1 : 0;
          $projeto->tef = isset($request->tef)? 1 : 0;
          $projeto->gest_comp = isset($request->tef)? 1 : 0;
          $projeto->fiscal_gest_trib = isset($request->fiscal_gest_trib)? 1 : 0;
          $projeto->fiscal_sped = isset($request->fiscal_sped)? 1 : 0;
          $projeto->fiscal_sintegra = isset($request->fiscal_sintegra)? 1 : 0;
          $projeto->fiscal_outros = isset($request->fiscal_outros)? 1 : 0;
          $projeto->fiscal_msg_outros = $request->input('tfiscal_outros'); 
          $projeto->import_info = $request->input('timport_info'); 
          $projeto->save();
      
        }
        return redirect('Projetos');
      }
    

    public function destroy($id)
    {
        //
    }





    public function geraProposta($id){

      $projetosDados = DB::table('projetos')
      ->join('clientes', 'clientes.id', '=', 'projetos.id_cliente')
		  ->leftjoin('municipios_br', 'clientes.CodigoIbge', '=', 'municipios_br.CodigoIbge')
      ->select(DB::raw("projetos.id_projetos,
      clientes.NomeFantasia,
      clientes.RazaoSocial,
      clientes.CNPJ,
      clientes.IE,
      clientes.TelefoneFixo,
      clientes.TelefoneCelular,
      clientes.Email,
      clientes.Endereco,
      clientes.Numero,
      clientes.Bairro,
      clientes.CEP,
      agente_comercial,
      regime_tributario,
      tipo_farmacia,
      natureza_implantacao,
      analista,
      responsavel_implantacao,
      data_inicio,data_fim,
      data_negociada,
      import_info,
      pbm_fp,
      pbm_trn,
      pbm_func,
      pbm_epha,
      pbm_pec,
      pbm_obj,
      pbm_rec,
      tef,
      imp_prod,
      imp_cli,
      imp_cpa,
      imp_cpr,
      fiscal_gest_trib,
      fiscal_sped,
      fiscal_sintegra,
      fiscal_outros,
      fiscal_msg_outros,
      gest_comp,
      status,
      concat(Municipio,' / ',UF) as Cidade"))
	    ->where('id_projetos', '=', $id)
	    ->first();
      $usersLista = DB::table('users')
      ->where('tipo', '1')
      ->orderBy('name')
      ->get()
      ->pluck('name','id');			
      $clientesLista = Empresas::all();
      $contrato = Contratos::all();
      return view('projetos.proposta',compact('projetosDados','clientesLista','usersLista','contrato'));
    }




}