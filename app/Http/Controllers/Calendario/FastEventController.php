<?php


namespace App\Http\Controllers\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Http\Requests\CalendarFastEventRequest;
use App\Http\Requests\CalendarEventRequest;
use App\Http\Controllers\Controller;
use App\CalendarFastEvent;
use App\Posts;

class FastEventController extends Controller
{
    public function store(FastEventRequest $request)
    {
        $fastEvent = FastEvent::create($request->all());

        return response()->json(['created' => $fastEvent->id]);
    }

    public function update(FastEventRequest $request)
    {
        $event = FastEvent::where('id', $request->id)->first();

        $event->fill($request->all());

        $event->save();

        return response()->json(['updated' => $event->id]);
    }

    public function destroy(Request $request)
    {
        FastEvent::where('id', $request->id)->delete();

        return response()->json(true);
    }
}
