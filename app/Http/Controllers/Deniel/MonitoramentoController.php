<?php

namespace App\Http\Controllers\Deniel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DenielMonitoramento;
use App\Posts;

class MonitoramentoController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function store(Request $request)
    {
        $data = DenielMonitoramento::create([
		   'Token'        => $request->token,
           'Tipo'         => $request->type,
           'Temperatura'  => $request->temp,
           'Umidade'      => $request->hum,
           'Luminosidade' => $request->ldri
		]);	
        return response()->json();
    }	
	
	public function index()
	{
	  $grafico = DB::table('monitoramento')
			//->select(DB::raw('count(a.id) as "Soma",departement_name as "Departamento"'))
			->select(DB::raw('Tipo,Temperatura,Umidade'))
			->whereBetween('created_at',[date("Y-m-d 00:00:01",strtotime("-1 day", time())),date("Y-m-d 23:59:59",time())])
			->get()
			->toJson();
		$s['data'] = $grafico;
		dd($grafico);
		return view('deniel.index')->with('grafico', json_decode($grafico, true));

		
		//view('your-view')->with('leads', json_decode($leads, true));
	}
}