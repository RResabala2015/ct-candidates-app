@extends('layouts.base')

@section('content')
    <div class = 'row'>
        <div class = 'col'>
            <h1>NEW TASK</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class ='btn btn-secondary' href="/new_task">BACK</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
           <br>
           <form action="/new_task" method = "POST">
               @csrf
               <div class="form-group">
                   <label for="title">Title:</label>
                   <input type="text" class = "form-control" name="title" id="title" placeholder = "Type a title" value = "{{old('title')}}">
               </div>
                
               <br>

               <div class="form-group">
                   <label for="title">Description:</label>
                   <input type="text" class = "form-control" name="Description" id="Description" placeholder = "Type a Description" value = "{{old('Description')}}">
               </div>
                
               <br>
               <button class="btn btn-primary" type = "submit">Submit</button>    
           </form>
           <br>
           @if ($errors ->any())
                <div class = "alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
@endsection