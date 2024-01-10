<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
        return view('event.index');
    }

    public function listEvent(Request $request)
    {

        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));


        $data = Event::whereDate('start', '>=', $start)
            ->whereDate('end',   '<=', $end)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->title,
                'start' => $item->start,
                'end' => $item->end,
            ]);

        return response()->json($data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request): JsonResponse
    {

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
