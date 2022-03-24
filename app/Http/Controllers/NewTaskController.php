<?php

namespace App\Http\Controllers;

use App\Models\NewTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewTaskController extends Controller
{
    
    public function index()
    {
        $tasks = Newtask::all();
        return response() -> json($tasks);

    }


    public function store(Request $request)
    {
        $newtask = NewTask::create($request -> post());
        return response() -> json([
            'newtask' => $newtask
        ]);
        
    }

    public function show($id)
    {
        $task = NewTask::find($id);
        return response() -> json($task);
    }

    public function edit($id)
    {
       //
    }

    
    public function update(Request $request, $id)
    {
        $task = NewTask::find($id);
        $task -> fill($request -> post()) -> save();
        return response() -> json([
            'newtask' => $task
        ]);
    }

    public function destroy($id)
    {
        $task = NewTask::find($id);
        $task ->delete();
        return response()-> json([
            'mensaje' => 'TAREA ELIMINADA'
        ]);
    }

    public function getname($title)
    {
        $task = NewTask::find($title);
        return response() -> json($task);
    }

    public function searchData($data)
    {
            $newdata = NewTask::where('estado','LIKE', $data.'%') -> get();
            return $newdata;
           
    }

}
