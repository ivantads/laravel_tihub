<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\WSDeniel;

class WSDenielController extends Controller
{
    public function showView($name)
    {
        if(View::exists($name)){
            dd($name);
			return view($name);
        }
        else{
            return view('404');
        }
    }

    public function index()
    {
		return view('teste');
	}	
	public function store(Request $request)
    {
		dd($request->all());
		$addRegistro = WSDeniel::create($request->all());
		return response()->json();
    }
}	