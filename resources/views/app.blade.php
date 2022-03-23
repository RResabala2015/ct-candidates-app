<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getlocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" value= "{{ csrf_token() }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VUE PRICIPAL</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href ="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
        
    </head>
    <body>
        <div id='app'>

        </div>
        <script src = "{{ mix('js/app.js') }}" type = "text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    </body>
</html>