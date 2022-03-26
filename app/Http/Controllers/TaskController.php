<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $search=DB::table('task')
                    ->select('id','task','order')
                    ->where('task','LIKE','%'.$texto.'%')
                    ->orderBy('task','asc');
        $task = Task::orderBy('completed')->get();
        return view('task.index',compact('search','texto'))->with(['task'=> $task]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->task=$request->input('task');
        $task->order=$request->input('order');
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Task::findOrFail($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task=Task::findOrfail($id);
        $task->task=$request->input('task');
        $task->order=$request->input('order');
        $task->save();
        return redirect()->route('task.index');
    }

    public function completed($id){
        $task = Task::find($id);
        if ($task->completed){
            $task->update(['completed'=> false]);
            return redirect()->back()->with('success',"incomplete");
        }else {
            $task->update(['completed'=> true]);
            return redirect()->back()->with('success',"completed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index');
    }
}
