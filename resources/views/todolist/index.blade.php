@extends('layouts.base')

@section('content')
    <div class = 'row'>
            <div class = 'col'>
                <h1>ToDoList</h1>
            </div>
        </div>

        <br>
        
        <div class="row">
            <div class="col">
                <a class ='btn btn-primary' href="/todolist/create"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Create New todo</a>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
              <form action="/todolist" method='get'>
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto">
                            <div class="col-auto my-1">
                                <input type="submit" class="btn btn-primary" value="SEARCH">
                            </div>
                        </div>
                        
                    </div>
                </form> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class = 'table'>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>State</td>
                    </tr>
                    @foreach($todo as $newtodo)
                        <tr>
                            <td>{{$newtodo ->id}}</td>
                            <td>{{$newtodo ->title}}</td>
                            <td>{{$newtodo ->status}}</td>
                            <td><a class="btn btn-warning" href="/todolist/{{$newtodo -> id}}/edit">Edit/State</a></td>
                            <td><a class="btn btn-danger" href="/todolist/{{$newtodo -> id}}/confirmDelete">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection