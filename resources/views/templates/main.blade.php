<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-png">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
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
                <div class="col-6 d-flex align-items-center">
                    <form class="w-100" method="GET">
                        <input type="text" class="form-control" placeholder="Titre, auteur, mot clé" aria-label="Username" aria-describedby="basic-addon1">
                    </form>
                        
                </div>
                {{-- User menu --}}
                <div class="col-3 d-flex align-items-center">
                    {{-- Pinned items --}}
                    <div class="">
                        <button type="button" class="btn">
                            <svg viewBox="0 0 16 16" fill="none" width="16" height="16" class="sc-1ex2yi3-0 jkkBGd"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.318 0 6.123 3.195l1.495 1.494-2.492 2.49H2.14L.644 8.675l2.99 2.989L0 15.294.705 16l3.632-3.633 2.99 2.988 1.493-1.494v-2.989l2.49-2.49 1.495 1.494L16 6.682 9.318 0ZM2.052 8.674l.5-.498h2.987l3.488-3.487-1.495-1.494 1.786-1.786 5.273 5.273-1.786 1.786-1.494-1.495-3.487 3.487v2.989l-.498.498-5.274-5.273Z" fill="#000" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#f8f5f2;"></path></svg>
                        </button>
                    </div>
                    {{-- Shopping cart --}}
                    <div class="me-3">
                        <a href="" type="button" class="btn btn-cart">
                            <svg viewBox="0 0 16 16" fill="none" width="16" height="16" class="sc-1ex2yi3-0 jkkBGd"><path fill-rule="evenodd" clip-rule="evenodd" d="M15 4H3.728l2.225 6.113L15 8.19V4Zm1-1v6L5.311 11.272 1.936 2H0V1h2.636l.728 2H16ZM3.5 12a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3ZM14 13.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" fill="#000" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#f8f5f2;"></path></svg>
                            
                            {{-- @if (count(Cart::content()) > 0)
                                <span class="badge rounded-pill bg-danger">
                                    {{ count(Cart::content()) }}
                                </span>                                
                            @endif --}}
                        </a>
                    </div>
                    {{-- Login button --}}
                    <div>
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
                            <a href="" class="btn btn-primary btn-sm" type="button">Se connecter</a>
                        @endauth

                    </div>
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
