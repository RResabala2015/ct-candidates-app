@extends('layouts.base')

@section('content')
    <div class = 'row'>
        <div class = 'col'>
            <h1>DELETE TASK: {{$todo -> id}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class ='btn btn-secondary' href="/todolist">CANCEL</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
           <form action="/todolist/{{$todo -> id}}" method = "POST">
               @csrf
               @method('delete')
               <div class="form-group">
                   <label for="title">Title:</label>
                   <input type="text" class = "form-control" name="title" id="title"  value = "{{$todo -> title}}" readonly>
               </div>
               <br>
               <div class="form-group">
                   <label for="title">Status:</label>
                   <input type="text" class = "form-control" name="status" id="status"  value = "{{$todo -> status}}" readonly>
               </div>
               <br>
               <button class="btn btn-primary" type = "submit">Delete</button>    
           </form>
        </div>
    </div>
@endsection