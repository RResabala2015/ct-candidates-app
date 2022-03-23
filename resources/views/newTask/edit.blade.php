@extends('layouts.base')

@section('content')
    <div class = 'row'>
        <div class = 'col'>
            <h1>EDIT TASK: {{$newTask -> id}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class ='btn btn-secondary' href="/new_task">BACK</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
           <form action="/new_task/{{$newTask -> id}}" method = "POST">
               @csrf
               @method('put')
               <div class="form-group">
                   <label for="title">TITLE:</label>
                   <input type="text" class = "form-control" name="title" id="title" placeholder = "Type a title" value = "{{$newTask -> title}}">
               </div>
                <br>

                <div class="form-group">
                   <label for="title">Description:</label>
                   <input type="text" class = "form-control" name="Description" id="Description" placeholder = "Type a Description" value = "{{$newTask -> Description}}">
               </div>
                <br>

               <div class="form-group">
               <label for="title">State: </label>
               <select name="select"  name="estado" id="estado">
                    <option value ="{{$newTask -> estado}}" selected>{{$newTask -> estado}}</option>
                    <option value ="REALIZADO">REALIZADO</option>
                    <option value ="NO REALIZADO">NO REALIZADO</option>
                </select>
               </div>

               <br>
               <button class="btn btn-primary" type = "submit">Submit</button>    
           </form>
        </div>
    </div>
@endsection