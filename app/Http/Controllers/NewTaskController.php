<?php

namespace App\Http\Controllers;

use App\Models\NewTask;
use Illuminate\Http\Request;

class NewTaskController extends Controller
{
    
    public function index()
    {
        return view('newTask.index', [
            'newTasks' => NewTask::all()
        ]);
    }

    
    public function create()
    {
        return view('newTask.create');
    }

    
    public function store(Request $request)
    {
        $validaData = $request -> validate([
            'title' => 'required|min:3',
            'Description' => 'required|min:3'
        ]);

        $newTask = new NewTask();
        $newTask -> title = $request -> get('title');
        $newTask -> Description = $request -> get('Description');
        $newTask -> estado =  "NO REALIZADO";
        $newTask -> save();
        
        return redirect('/new_task');
    }

   
    public function show(newTask $newTask)
    {
        //
    }

   
    public function edit($id)
    {
        $newTask = NewTask::find($id);
        return view('newTask.edit',[
            'newTask' => $newTask
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $newTask = NewTask::find($id);
        $newTask -> title = $request -> get('title');
        $newTask -> Description = $request -> get('Description');
        $newTask -> estado = $request -> get('estado');
        $newTask -> save();
        
        return redirect('/new_task');
    }

    public function confirmDelete($id)
    {
        $newTask = NewTask::find($id);
        return view('newTask.confirmDelete', [
            'newTask' => $newTask
        ]);
    }

    public function destroy($id)
    {
        $newTask = NewTask::find($id);
        $newTask -> delete();
        
        return redirect('/new_task');
    }
}
