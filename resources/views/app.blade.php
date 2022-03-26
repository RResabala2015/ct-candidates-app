<!doctype html> 7
<html lang="{{ dtr_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"> |
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <title>Laravel + Vue</title> |
    <!-- CONs de Bootstrap 5 --> |
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@s.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- CDNs de Font-Awesome -->
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
   
    <link href=" {{ mix('css/app.css') }}" type="text/css" rel="stylesheet" /> i
</head>

<body>
    <div id="app">
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>