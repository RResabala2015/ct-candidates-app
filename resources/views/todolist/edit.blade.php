@extends('layouts.base')

@section('content')
    <div class = 'row'>
        <div class = 'col'>
            <h1>EDIT TASK: {{$todo -> id}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class ='btn btn-secondary' href="/todolist">BACK</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
           <form action="/todolist/{{$todo -> id}}" method = "POST">
               @csrf
               @method('put')
               <div class="form-group">
                   <label for="title">TITLE:</label>
                   <input type="text" class = "form-control" name="title" id="title" placeholder = "Type a title" value = "{{$todo -> title}}">
               </div>
                <br>
               <div class="form-group">
               <label for="title">Status: </label>
               <select name="status"  id="status">
                    <option value ="{{$todo -> status}}" selected>{{$todo -> status}}</option>
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