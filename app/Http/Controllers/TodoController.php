<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoController extends Controller
{
    //
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = TodoList::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->where('user', auth()->user()->name)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }
    }

    public function getKegiatan(Request $request)
    {

        if ($request->ajax()) {
            $kegiatan = TodoList::orderBy('start')
            ->where('user', auth()->user()->name)
            ->get();
            if ($kegiatan) {
                return response()->json(['kegiatan' => $kegiatan]);
            } else {
                return response()->json(['kegiatan' => 'Tidak ada kegiatan']);
            }
        }
    }

    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $TodoList = TodoList::create([
                    'user' => $request->name,
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($TodoList);
                break;

            case 'update':
                $TodoList = TodoList::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($TodoList);
                break;

            case 'delete':
                $TodoList = TodoList::find($request->id)->delete();

                return response()->json($TodoList);
                break;

            default:
                break;
        }
    }

}
