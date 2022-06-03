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

    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body>
    {{-- Header --}}
    <header>
        <div class="container py-3">
            <div class="row align-items-center">
                {{-- Logo --}}
                <div class="col-2">
                    <a href="{{ route('home') }}">
                        <h1 class="fw-bold text-primary fs-2 m-0">eBiblioShop</h1>                    
                    </a>
                </div>

                {{-- Search bar --}}
                <div class="col-7 ps-4 d-flex align-items-center">
                    <form class="w-100" action="{{ route('search') }}" method="GET">
                        <x-inputs.field type="text" name="query" placeholder="Titre, numéro ISBN, auteur, mot clé" value="{{ request()->input('query') }}" required />
                    </form>
                        
                </div>
                {{-- User menu --}}
                <div class="col-3 d-flex flex-row-reverse align-items-center">
                    {{-- Login button --}}
                    @auth
                        <a class="text-black dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->fullname }}
                        </a>                            
                        <ul class="dropdown-menu mt-2 py-2">
                            @if (auth()->user()->is_admin)
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.index') }}">Administration</a>
                            </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard.index') }}">Profil</a>
                            </li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li>
                                <form class="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="document.querySelector('.logout-form').submit()">Déconnexion</a>
                                </form>
                            </li>
                        </ul>
                    @else
                        <a class="d-flex align-items-center" href="{{ route('login') }}">
                            <span class="material-icons">account_circle</span>
                            <span class="ps-2">Connexion</span>
                        </a>
                    @endauth

                    {{-- Shopping cart --}}
                    <a class="d-flex me-2 position-relative" href="{{ route('cart.index') }}" type="button">
                        <span class="material-icons">shopping_cart</span>
                        @if (Cart::count() > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger p-1">
                                {{ Cart::count() }}
                            </span>                            
                        @endif
                    </a>

                    {{-- Pinned items --}}
                    <a class="d-flex me-2" href="" type="button">
                        <span class="material-icons">push_pin</span>
                    </a>

                    {{-- Create new book --}}
                    @auth
                        <a href="{{ route('books.create.step1') }}" class="btn btn-sm btn-primary me-auto ms-1">
                            Ajouter un livre
                        </a>                        
                    @endauth
                </div>
            </div>

        </div>
    </header>

    {{-- Main --}}
    <div class="container">
        <div class="row">
            @if ($fullwidth)
                <main class="col pt-3">
                    @if($showBreadcrumbs)
                        {{ Breadcrumbs::render() }}
                    @endif
                    {{ $slot }}
                </main>
            @else
                @if($showCategories)
                    <aside class="col-2 pt-4">
                        <x-categories-list />
                    </aside>
                @else
                    <div class="col-2"></div>
                @endif
                <main class="col-10 ps-4 pt-3">
                    @if($showBreadcrumbs)
                        {{ Breadcrumbs::render() }}
                    @endif
                    {{ $slot }}
                </main>
            @endif            
        </div>
    </div>

    {{-- Footer --}}
    <footer class="mt-5 bg-gray">
        <div class="container pt-5">
            <div class="row">
                <div class="col-3 py-4 pe-5">
                    <div class="d-flex justify-items-center">
                        <svg class="me-3" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.82667 14.3867C10.7467 18.16 13.84 21.24 17.6133 23.1733L20.5467 20.24C20.9067 19.88 21.44 19.76 21.9067 19.92C23.4 20.4133 25.0133 20.68 26.6667 20.68C27.4 20.68 28 21.28 28 22.0133V26.6667C28 27.4 27.4 28 26.6667 28C14.1467 28 4 17.8533 4 5.33333C4 4.6 4.6 4 5.33333 4H10C10.7333 4 11.3333 4.6 11.3333 5.33333C11.3333 7 11.6 8.6 12.0933 10.0933C12.24 10.56 12.1333 11.08 11.76 11.4533L8.82667 14.3867Z" fill="black"/></svg>
                        <a class="text-reset h4 m-0" href="tel:+312345678">123 456 78 99</a>
                        {{-- telephone icon --}}
                    </div>

                    <div class="my-4">
                        <p>Vous avez des questions ou vous souhaitez commander par téléphone? N'hesitez pas de nous contacter si vous avez des questions ou si vous avez besoin d'aider.</p>
                    </div>

                    <div>
                        <p>Lundi &ndash; vendredi<br>08h00 &ndash; 18h00</p>
                    </div>
                </div>

                <div class="col-6"></div>

                <div class="col-3 pt-4">
                    <p class="fw-bold mb-1">Aide et contact</p>
                    <p>N'hesitez pas de nous contacter si vous avez des questions</p>
                    <a href="{{ url('mailto:contact@ebiblioshop.ch') }}" class="btn w-100 btn-primary">Contact</a>
                </div>

            </div>

            <div class="row">
                <div class="col-9 py-4">
                    <strong class="fs-6 my-2">Modes de paiement</strong>
                    <p class="my-1">Vous trouverez plus d'infos dans l'espace service sous modes de paiement.</p>
                    <div class="my-3">
                        {{-- mastercard --}}
                        <svg class="me-3" width="60px" height="40px" viewBox="0 0 60 40"><g fill-rule="nonzero" fill="none"><rect fill="#000" width="60" height="40" rx="3"></rect><path fill="#FF5F00" d="M25 26.29h10.35V7.69H25.01z"></path><path d="M25.66 16.99a11.8 11.8 0 014.52-9.3 11.83 11.83 0 100 18.6 11.8 11.8 0 01-4.52-9.3" fill="#EB001B"></path><path d="M48.95 24.32v-.46h-.12l-.14.31-.14-.31h-.12v.46h.08v-.35l.13.3h.1l.12-.3v.35h.09zm-.76 0v-.38h.15v-.08h-.4v.08h.16v.38h.09zm1.12-7.33a11.83 11.83 0 01-19.13 9.3 11.8 11.8 0 000-18.6A11.83 11.83 0 0149.31 17z" fill="#F79E1B"></path><g fill="#FFF"><path d="M18.4 34.82V32.9c0-.75-.45-1.23-1.22-1.23-.39 0-.8.13-1.1.55a1.12 1.12 0 00-1.02-.55c-.32 0-.64.1-.9.45v-.38h-.67v3.1h.68V33.1c0-.55.28-.8.73-.8.45 0 .68.29.68.8v1.71h.67v-1.7c0-.56.32-.81.74-.81.44 0 .67.29.67.8v1.71h.74zm9.96-3.1h-1.09v-.93h-.67v.94h-.61v.6h.6v1.43c0 .7.3 1.13 1.06 1.13.3 0 .61-.1.84-.23l-.2-.58c-.19.13-.41.16-.57.16-.32 0-.45-.2-.45-.51v-1.4h1.09v-.6zm5.7-.06a.9.9 0 00-.8.45v-.38h-.67v3.1h.67v-1.75c0-.52.23-.8.64-.8.13 0 .29.03.42.06l.2-.65c-.14-.03-.33-.03-.46-.03zm-8.62.32a2.19 2.19 0 00-1.25-.32c-.76 0-1.28.39-1.28 1 0 .52.39.8 1.06.9l.32.04c.35.06.55.16.55.32 0 .22-.26.39-.71.39-.45 0-.8-.17-1.02-.33l-.33.52c.36.26.84.39 1.32.39.9 0 1.4-.42 1.4-1 0-.55-.4-.84-1.05-.94l-.32-.03c-.29-.03-.51-.1-.51-.3 0-.22.22-.35.57-.35.39 0 .77.17.97.26l.28-.55zm17.88-.32a.9.9 0 00-.8.45v-.38h-.67v3.1h.67v-1.75c0-.52.22-.8.64-.8.13 0 .29.03.42.06l.19-.65c-.13-.03-.32-.03-.45-.03zm-8.58 1.61c0 .94.64 1.62 1.63 1.62.45 0 .77-.1 1.09-.36l-.32-.55c-.26.2-.51.3-.8.3-.55 0-.93-.4-.93-1 0-.59.38-.97.93-1 .29 0 .54.1.8.28l.32-.54a1.59 1.59 0 00-1.1-.36c-.98 0-1.62.68-1.62 1.61zm6.21 0v-1.54h-.67v.38a1.15 1.15 0 00-.96-.45c-.87 0-1.54.68-1.54 1.61 0 .94.67 1.62 1.54 1.62.45 0 .77-.17.96-.46v.4h.67v-1.56zm-2.47 0c0-.54.36-1 .93-1 .55 0 .93.42.93 1 0 .55-.38 1-.93 1-.57-.03-.93-.45-.93-1zm-8.04-1.6c-.9 0-1.54.64-1.54 1.6 0 .97.64 1.62 1.57 1.62.45 0 .9-.13 1.25-.42l-.32-.49c-.25.2-.57.33-.9.33-.41 0-.83-.2-.92-.75h2.27v-.25c.03-1-.54-1.65-1.4-1.65zm0 .57c.42 0 .7.26.77.74h-1.6c.06-.42.35-.74.83-.74zm16.7 1.03V30.5h-.68v1.61a1.15 1.15 0 00-.96-.45c-.87 0-1.54.68-1.54 1.61 0 .94.67 1.62 1.54 1.62.45 0 .77-.17.96-.46v.4h.67v-1.56zm-2.47 0c0-.54.35-1 .93-1 .54 0 .93.42.93 1 0 .55-.39 1-.93 1-.58-.03-.93-.45-.93-1zm-22.5 0v-1.54h-.67v.38a1.15 1.15 0 00-.96-.45c-.86 0-1.54.68-1.54 1.61 0 .94.68 1.62 1.54 1.62.45 0 .77-.17.96-.46v.4h.68v-1.56zm-2.5 0c0-.54.36-1 .94-1 .54 0 .93.42.93 1 0 .55-.39 1-.93 1-.58-.03-.93-.45-.93-1zm28.42 1.41v.06h.09v-.03-.02h-.09zm.06-.04a.1.1 0 01.06.02c.02.01.03.03.03.05l-.02.05a.09.09 0 01-.06.02l.08.09h-.06l-.07-.09h-.02v.09h-.05v-.23h.1zm-.02.3h.07a.19.19 0 00.11-.18.2.2 0 00-.1-.18.19.19 0 00-.26.18.2.2 0 00.1.17l.08.02zm0-.43a.24.24 0 01.18.07.25.25 0 01.07.17.24.24 0 01-.07.18.24.24 0 01-.17.07.24.24 0 01-.24-.15.24.24 0 01-.01-.1l.01-.1a.25.25 0 01.13-.12.24.24 0 01.1-.02z"></path></g></g></svg>
                        {{-- visa --}}
                        <svg class="me-3" width="60px" height="40px" viewBox="0 0 60 40"><g fill="none" fill-rule="evenodd"><rect fill="#FFFFFE" fill-rule="nonzero" width="60" height="40" rx="4"></rect><g fill="#182E66" fill-rule="nonzero"><path d="M25.823 26h-3.521l2.201-13h3.52l-2.2 13M19.645 13l-3.198 8.941-.378-1.925-1.13-5.845S14.805 13 13.35 13H8.062L8 13.22s1.617.34 3.509 1.486L14.423 26h3.496l5.337-13h-3.61M41.849 22l1.83-5 1.03 5h-2.86ZM49 26l-2.575-13h-3.54c-1.193 0-1.484.969-1.484.969L36.605 26h3.352l.67-1.93h4.09l.376 1.93H49ZM37.103 16.245l.455-2.697S36.154 13 34.69 13c-1.583 0-5.341.71-5.341 4.158 0 3.245 4.41 3.285 4.41 4.988 0 1.704-3.956 1.4-5.261.325l-.475 2.82s1.424.709 3.6.709c2.177 0 5.46-1.156 5.46-4.3 0-3.265-4.45-3.57-4.45-4.989 0-1.42 3.106-1.237 4.47-.466"></path><path d="m15.628 20-1.067-5.832S14.43 13 13.056 13H8.058L8 13.22s2.402.53 4.707 2.516c2.202 1.898 2.92 4.264 2.92 4.264"></path></g><rect stroke="#CBCBCB" x=".5" y=".5" width="59" height="39" rx="3"></rect></g></svg>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <a href="{{ route('home') }}">
                        <h1 class="fw-bold text-primary fs-2 m-0">eBiblioShop</h1>                    
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
