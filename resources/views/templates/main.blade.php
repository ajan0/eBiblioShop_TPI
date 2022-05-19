<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-png">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    {{-- Material icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title', config('app.name'))</title>
</head>
<body>
    {{-- Header --}}
    <header>
        <div class="container py-3">
            <div class="row align-items-center">
                {{-- Logo --}}
                <div class="col-2">
                    <h1 class="fw-bold text-primary fs-2 m-0">Larastripe</h1>
                </div>

                {{-- Search bar --}}
                <div class="col-7 ps-4 d-flex align-items-center">
                    <form class="w-100" method="GET">
                        <input type="text" class="form-control" placeholder="Titre, auteur, mot clé" aria-label="Username" aria-describedby="basic-addon1">
                    </form>
                        
                </div>
                {{-- User menu --}}
                <div class="col-3 d-flex justify-content-end align-items-center">
                    {{-- Pinned items --}}
                    <a class="d-flex me-2" href="" type="button">
                        <span class="material-icons">push_pin</span>
                    </a>
                    {{-- Shopping cart --}}
                    <a class="d-flex me-2" href="" type="button">
                        <span class="material-icons">shopping_cart</span>
                        {{-- @if (count(Cart::content()) > 0)
                            <span class="badge rounded-pill bg-danger">
                                {{ count(Cart::content()) }}
                            </span>                                
                        @endif --}}
                    </a>
                    {{-- Login button --}}
                    @auth
                        <a class="text-black dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>                            
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form class="logout-form" method="POST" action="">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="document.querySelector('.logout-form').submit()">Déconnexion</a>
                                </form>
                            </li>
                        </ul>
                    @else
                        <a class="d-flex align-items-center" href="">
                            <span class="material-icons">account_circle</span>
                            <span class="ps-2">Connexion</span>
                        </a>
                    @endauth

                </div>
            </div>

        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        
    </footer>
</body>
</html>
