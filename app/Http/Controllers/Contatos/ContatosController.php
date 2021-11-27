<?php

namespace App\Http\Controllers\Contatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ContatosController extends Controller
{
    //
    public function Index()
    {
        $contatosLista = DB::table('site_contatos')
			->select(DB::raw("id,created_at,NomeCompleto,NomeFarmacia,Email,Telefone,
			CASE Assunto WHEN 1 THEN 'Solicitar Demonstração' WHEN 2 THEN 'Solicitar uma Proposta' WHEN 3 THEN 'Questões Comerciais' END AS Assunto,
			CASE Assunto WHEN 1 THEN 'Demonstração' WHEN 2 THEN 'Proposta' WHEN 3 THEN 'Comercial' END AS AssuntoX,
			CASE MelhorHorario WHEN 0 THEN 'Qualquer Horário' WHEN 1 THEN 'Apenas pela Manhã' WHEN 2 THEN 'Apenas a Tarde' END AS MelhorHorario,
			(CASE 
				when TIMESTAMPDIFF(HOUR, created_at, now())<1 
				then concat(TIMESTAMPDIFF(MINUTE, created_at, now()), ' min atrás')
				when TIMESTAMPDIFF(DAY, created_at, now())<=2 
				then concat(TIMESTAMPDIFF(HOUR, created_at, now()), ' hrs atrás')
				else concat(TIMESTAMPDIFF(DAY, created_at, now()), ' dias') 
			END) AS Tempo "))
			->where('Assumido','=','0')
			->orderBy('created_at','desc')
			->get(); 
		
		return view('contatos/index',compact('contatosLista'));
    }	

    public function AssumirContato(Request $request)
    {
	
	
	}		
}	