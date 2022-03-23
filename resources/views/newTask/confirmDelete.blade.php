@extends('layouts.base')

@section('content')
    <div class = 'row'>
        <div class = 'col'>
            <h1>DELETE TASK: {{$newTask -> id}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class ='btn btn-secondary' href="/new_task">CANCEL</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
           <form action="/new_task/{{$newTask -> id}}" method = "POST">
               @csrf
               @method('delete')
               <div class="form-group">
                   <label for="title">TITLE:</label>
                   <input type="text" class = "form-control" name="title" id="title"  value = "{{$newTask -> title}}" readonly>
               </div>
               <br>
               <div class="form-group">
                   <label for="title">Description:</label>
                   <input type="text" class = "form-control" name="Description" id="Description" placeholder = "Type a Description" value = "{{$newTask -> Description}}" readonly>
               </div>
                <br>
               <div class="form-group">
                   <label for="title">State:</label>
                   <input type="text" class = "form-control" name="estado" id="estado"  value = "{{$newTask -> estado}}" readonly>
               </div>
               <br>
               <button class="btn btn-primary" type = "submit">Delete</button>    
           </form>
        </div>
    </div>
@endsection