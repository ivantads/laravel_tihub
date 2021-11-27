<?php
namespace App\Http\Controllers\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CalendarFastEvent;


class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
      $users = DB::table('users')
            ->select(DB::raw("id,name"))
			->get(); 

        return view('calendario.index', ['users' => $users]);
    }

}
