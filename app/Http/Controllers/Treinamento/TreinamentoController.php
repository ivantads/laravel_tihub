<?php
namespace App\Http\Controllers\Treinamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreinamentoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        return view('treinamento.index');
    }
}		


    