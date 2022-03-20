<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h4>TASKS</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('task.index')}}" method='get'>
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="SEARCH">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('task.create')}}" class="btn btn-success">NEW</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lx-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>TASK</th>
                            <th>OPTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($task)<=0)
                        <tr>
                            <td colspan="2">No hay resultado</td>
                        </tr>
                        @else
                        @foreach ($task as $task)
                        <tr>
                            <td>{{$task->task}}</td>
                            <td>
                            <form action="{{route('task.destroy',$task->id)}}" method="post" >
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger btn-sm" value="DELETE">
                            </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
</body>
</html>