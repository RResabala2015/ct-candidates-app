<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Awesome To Do List</title>
    </head>
    <style>
        .checked {
            text-decoration: line-through;
        }
    </style>
    <body>
    <div class="card container p-4 mt-4">
        <h1>Awesome To Do List</h1>
        <h2>What do you need to do today?</h2>
        <hr>
        <h2>Add new task</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/todos') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="task" placeholder="Add new task">
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="submit">Store</button>
                </div>
            </div>
        </form>
        <hr>
        <h2>Pending tasks</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <ul class="list-group">
            @foreach($todos as $todo)
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <p class="fs-5"><input class="form-check-input box" type="checkbox" value="" id="flexCheckDefault"> {{ $todo->task }}</p>
                    </div>
                    <div class="col col-lg-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                            Edit
                        </button>
                        <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                    <div class="card card-body">
                        <form action="{{ url('todos/'.$todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="task" value="{{ $todo->task }}">
                            <button class="btn btn-secondary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script>
            var elems = document.getElementsByClassName('box');
                Array.from(elems).forEach(v => v.addEventListener('change', function(){
                this.parentNode.classList.toggle('checked');
            }));
        </script>
    </body>
</html>
