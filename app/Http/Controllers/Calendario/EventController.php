<?php

namespace App\Http\Controllers\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Requests\CalendarEventRequest;
use App\Http\Controllers\Controller;
use App\CalendarEvent;
use App\Posts;


class EventController extends Controller
{
    public function loadEvents(Request $request)
    {

        $returnedColumns = ['id', 'title', 'start', 'end', 'color', 'description', 'users'];

        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        /** Retornaremos apenas os eventos ENTRE as datas iniciais e finais visiveis no calendário */
        $events = CalendarEvent::whereBetween('start', [$start, $end])->get($returnedColumns);

        return response()->json($events);

    }

    public function store(EventRequest $request)
    {
        CalendarEvent::create($request->all());

        return response()->json(true);
    }

    public function update(EventRequest $request)
    {
        $event = CalendarEvent::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        CalendarEvent::where('id', $request->id)->delete();

        return response()->json(true);
    }
}
