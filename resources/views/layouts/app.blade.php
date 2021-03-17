<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ahora si</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @livewireStyles
</head>
<body class="bg-gray-200 p-10">
    {{-- laravel busca la vista del componente que
     estoy llamando (paises) con la ruta y lo renderiza en el {{slot}} --}}
    {{$slot}}
    @livewireScripts
</body>
</html>