<?php

namespace App\Http\Controllers\Huggy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\HuggyAtendimentosClientes;
//use App\Models\HuggyAtendimentos;

class HuggyAtendimentosClientesController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    } 
	
    public function index()
    {
      $clientesTelegram = DB::table('huggy_atendimentos AS a')
            ->select(DB::raw('COUNT(customer_id) AS "Atendimento"'),DB::raw('customer_id AS "HuggyID" ,customer_name AS "HuggyName",channel_typeid'))
			->leftjoin('huggy_atendimentos_clientes AS b', 'a.customer_id', '=', 'b.CustomerID')
			->where('customer_id', '<>','')
			->whereNull('CustomerID')
			->whereBetween('a.closed_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('customer_id','customer_name','channel_typeid')
			->orderBy(DB::raw('COUNT(a.customer_id)','DESC'));
      $clientesMessenger = DB::table('huggy_atendimentos AS a')
            ->select(DB::raw('COUNT(customer_messenger_id) AS "Atendimento",customer_messenger_id  AS "HuggyID",customer_messenger_name AS "HuggyName",channel_typeid'))
			->leftjoin('huggy_atendimentos_clientes AS b', 'a.customer_messenger_id', '=', 'b.CustomerMessengerID')
			->where('a.customer_messenger_id', '<>','')
			->whereNull('b.CustomerMessengerID')
			->whereBetween('a.closed_at',[date("Y-m-d 00:00:01",strtotime("-6 month", time())),date("Y-m-d 23:59:59",time())])
			->groupBy('a.customer_messenger_id','customer_messenger_name','channel_typeid')
			->orderBy(DB::raw('COUNT(a.customer_messenger_id)','DESC'));
      $clientesSemVinculoLista = $clientesTelegram->union($clientesMessenger)->get();
	  
	  $clientesVinculadosLista = DB::table('huggy_atendimentos_clientes AS a')
            ->select(DB::raw("a.id,a.NomeContato,CustomerID,CustomerMessengerID,c.NomeFantasia,c.id as Cliente,CONCAT(c.id,' - ',c.NomeFantasia) as IDNomeFantasia,NomeApresentacao"))
			->join('clientes AS c', 'a.ClienteID', '=', 'c.id')
			->where('c.id', '<>','0')
			->orderBy('a.ClienteID')
			->get();

	  $clientesLista = DB::table('clientes')
            ->select(DB::raw('CONCAT(id," - ",NomeFantasia) AS NomeFantasia'), 'id','NomeApresentacao')
			->where('Situacao', '!=','C')
			->where('Representante', '=','1')	
			->orderBy('id')
			->get()
			->pluck('NomeApresentacao','id');

			
      return view('huggy.atendimentos',compact('clientesSemVinculoLista','clientesVinculadosLista','clientesLista'));
    }
	
    public function store(Request $request)
    {
	  if ($request->Canal == '4'){
		$addVinculo = HuggyAtendimentosClientes::create([
		   'ClienteID'   => $request->ClienteID,
		   'NomeContato' => $request->NomeContato,
		   'CustomerMessengerID' => $request->HuggyID
		]);	
	  }else{
		$addVinculo = HuggyAtendimentosClientes::create([
		   'ClienteID'   => $request->ClienteID,
		   'NomeContato' => $request->NomeContato,
		   'CustomerID'  => $request->HuggyID
		]);	
	  }	
      return response()->json($addVinculo);
    }	
	
	public function destroy($id)
	{	
		if(!$delVinculo = HuggyAtendimentosClientes::find($id))
            return redirect()->back();	
		
		$delVinculo->delete();
		return response()->json();
	}
	
}