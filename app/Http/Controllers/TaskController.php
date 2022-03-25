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
        return task::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        return $task;
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
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        $task->update($data);

        return response()->json($task, 200);
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

        return response('Deleted task', 200);
    }
}
