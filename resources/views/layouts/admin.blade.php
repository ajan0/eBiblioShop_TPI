<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-png">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    {{-- Material icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body class="h-100">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <aside class="col-2 bg-dark h-100 py-4">
                <h1 class="h2 text-secondary">Administration</h1>
                <h2 class="h4 text-secondary fw-semibold">{{ config('app.name') }}</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" aria-current="page" href="#">Utilsateurs</a>
                    </li>
                  </ul>
            </aside>
        
            <main class="col-10 ps-4 mt-5">

            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
