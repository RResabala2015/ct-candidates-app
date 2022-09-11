<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Repositories\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    protected $task;
    public function __construct(Todo $task)
    {
        $this->task = $task;
    }

    public function store($data)
    {
        $task = $this->task::create($data);
        return $task;
    }

    public function show(int $id)
    {
        $task = $this->task::findOrFail($id);
        return $task;
    }

    public function all()
    {
        $tasks = $this->task::all();
        return $tasks;
    }

    public function update($data, int $id)
    {
        $task = $this->task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function destroy(int $id)
    {
        $task = $this->task::findOrFail($id);
        try {
            if ($task->delete_at == null) {
                $task->delete();
                $task->completed = 1;
                $task->save();
                return response()->json(['message' => '
                Task deleted successfully'], 200);
                
            } else {
                $task->delete_at = null;
                $task->save();
            }
           

        } catch (\Exception $e) {
            return response()->json(['message' => '
            Task not deleted'], 500);
        
        }
    }
}