<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Http\Requests\UpdatetaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = task::all();
        return response()->json($task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = task::create($request->post());
        return response()->json(['task'=> $task]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaskRequest  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        $task->fill($request->post())->save();
        return response()->json(['task'=> $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();

        return response()->json(['mensaje'=> 'Tarea eliminada']);
    }
}
