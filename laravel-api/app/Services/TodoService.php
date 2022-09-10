<?php

namespace App\Services;

use App\Repositories\TodoRepository;

class TodoService
{
    protected $taskservice;

    public function __construct(TodoRepository $taskservice)
    {
        $this->taskservice = $taskservice;
    }

    public function store($data)
    {
       return  $this->taskservice->store($data);
    }

    public function show($id)
    {
        return $this->taskservice->show($id);
    }

    public function all()
    {
        return $this->taskservice->all();
    }

    public function update($data,$id)
    {
        return $this->taskservice->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->taskservice->destroy($id);
    }
}