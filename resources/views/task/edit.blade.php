<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <h4>EDIT TASK</h4>
        <div class="row">
            <div class="col-xl-12 my-1">
                <form action="{{route('task.update',$task->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group my-1">
                        <label for="task">Theme</label>
                        <input type="text" class="form-control" name="task" required maxlength='100'value="{{$task->task}}">
                    </div>
                    <div class="form-group my-1">
                        <label for="order">Descripcion</label>
                        <input type="text" class="form-control" name="order" required maxlength='100'value="{{$task->order}}">
                    </div>
                    <div class="from-group my-3">
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <a href="javascript:history.back()">RETURN</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>