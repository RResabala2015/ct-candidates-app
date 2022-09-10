<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Services\AuthService;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    protected $todoservice;
    protected $authservice;
    public function __construct(TodoService $todoservice, AuthService $authservice)
    {
        $this->todoservice = $todoservice;
        $this->authservice = $authservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $task = $this->todoservice->all();
        if(count($task) <= 0) {
            return response(['message' => 'no tasks found!'], 404);
        }
        return response()->json($task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {

        $validator = $request->all();

        if(!$validator) {
            return response([
                'Message' => 'Request could not be completed',
                'Error' => $validator->errors()
            ]);
        }

        $response = $this->todoservice->store([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'completed' => $request->get('completed')
        ]);

    //    $response = $this->taskservice->store($request->all());

       if(!$response) {
           return response([
               'Message' => 'Task not created!',
               'status' => 'error'
           ],500);
       }
       return response([
           'Message' => 'Task Created successfully!',
           'status' => 'success',
           'data' => $response
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->todoservice->show($id);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $data = $request->all();

        //to get a particular task
        $task = $this->todoservice->show($id);

        //to check permission to update task
        if($task['user_id'] == Auth::id()) {
            $response = $this->todoservice->update($data, $id);
             return response([
            'Message' => 'Task Updated!',
            'data' => $response
        ], 200);
        }
        return response([
            'Message' => 'Permission denied! Task does not belong to you!'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = $this->todoservice->show($id);

        //to check permission to update task
        if($task['user_id'] == Auth::id()) {
        $response = $this->todoservice->destroy($id);
         return response([
                'status' => 'success',
                'Message' => 'Task Deleted successfully!'
            ], 200);
        }
        return response([
            'status' => 'failed!',
            'Message' => 'Permission denied!, Not your Task!'
        ]);

    }
}