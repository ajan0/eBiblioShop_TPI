<x-app-layout :showBreadcrumbs="true">
    {{-- Top row --}}
    <div class="row mt-4">
        <div class="col-2">
            <div class="d-flex flex-column align-items-center me-4">
                {{-- Profile picture --}}
                <div class="user-avatar rounded-circle">
                    <img class="w-100" src="{{ asset('img/avatars/laravel.jpg') }}" alt="Profile picture">
                </div>
                {{-- Change profile picture button --}}
                <a href="#" class="border rounded px-2 py-1 mt-3 text-black">
                    <svg aria-hidden="true" class="me-1" height="16" role="img" width="16"><symbol id="digicon--edit" viewBox="0 0 16 16"><path d="M9.64 2.12l-.71.71 4.24 4.24.71-.71-4.24-4.24zM0 12h1v4H0z"></path><path d="M4 15v1H0v-1z"></path><path d="M14.59 4.24L3.1 15.73l.27.27h.87L16 4.24 11.76 0 0 11.76v.87l.27.27L11.76 1.41l2.83 2.83z"></path></symbol><use xlink:href="#digicon--edit"></use></svg>
                    <span class="small">Change picture</span>
                </a>
            </div>
        </div>
        <div class="col-10">
            <div>
                <h1 class="h3 m-0">Ahmad Jano</h1>
                <span class="small text-muted">Membre depuis mai 2020</span>
            </div>
        </div>
    </div>
    {{-- Tabs --}}
    <div class="row mt-5">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#account" data-bs-toggle="list" role="tab">Compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#books" data-bs-toggle="list" role="tab">Mes livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#orders" data-bs-toggle="list" role="tab">Achats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#addresses" data-bs-toggle="list" role="tab">Adresses</a>
                </li>
            </ul>
            <div class="tab-content">
                {{-- Account information --}}
                <div class="tab-pane fade show active py-4" id="account" role="tabpanel">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="h5">Information</h1>
                            <form action="{{ route('dashboard.store') }}" method="POST">
                                @csrf
                                {{-- Input -> Title --}}
                                <div class="form-group mb-3">
                                    <label class="text-gray py-2" for="">Titre</label>
                                    <select class="form-select" name="gender">
                                        <option value="male" {{ auth()->user()->gender === 'male' ? 'selected' : '' }}>M.</option>
                                        <option value="female" {{ auth()->user()->gender === 'female' ? 'selected' : '' }}>Mme</option>
                                        <option value="other" {{ auth()->user()->gender === 'other' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                </div>

                                {{-- Input -> Firstname --}}
                                <div class="form-group mb-3">
                                    <label class="text-gray py-2" for="">Prénom</label>
                                    <x-input type="text" name="firstname" value="{{ auth()->user()->firstname }}" />
                                </div>

                                {{-- Input -> Lastname --}}
                                <div class="form-group mb-3">
                                    <label class="text-gray py-2" for="">Nom</label>
                                    <x-input type="text" name="lastname" value="{{ auth()->user()->lastname }}" />
                                </div>
                                
                                {{-- Input -> email --}}
                                <div class="form-group mb-3">
                                    <label class="text-gray py-2">Adresse e-mail privée</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->email }}" disabled>
                                </div>

                                <div class="from-group d-flex">
                                    <input class="btn btn-primary btn-sm ms-auto" type="submit" value="Enregistrer">
                                </div>
                            </form>
                        </div>
                        <div class="col-6">
                            <div class="mt-5">
                                <strong>Sécurité des données</strong>
                                <p>La protection des données est une affaire de confiance, et votre confiance compte pour nous. Nous respectons votre personnalité et votre sphère privée. C'est la raison pour laquelle nous cherchons à garantir la protection de vos données personnelles et leur traitement conforme à la législation.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="tab-pane fade py-4" id="books" role="tabpanel">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="h5 mb-4">Mes livres</h1>
                            <p>Vous trouverez toutes les informations concernant vos livres dans l’aperçu du livre. Vous pouvez vous y informer du statut. Vous avez des questions? Alors rendez-vous sur notre page de contact.</p>     
                        </div>
                        {{-- List all commandes --}}
                        <div class="row my-3">
                            <div class="col-9">
                                <x-orders.item />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade py-4" id="orders" role="tabpanel">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="h5 mb-4">Commandes</h1>
                            <p>Vous trouverez toutes les informations concernant vos commandes dans l’aperçu de la commande. Vous pouvez vous y informer du statut ou y modifier les commandes. Vous avez des questions? Alors rendez-vous sur notre page de contact.</p>
                        </div>
                    </div>
                    {{-- List all commandes --}}
                    <div class="row my-3">
                        <div class="col-9">
                            <x-orders.item />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade py-4" id="addresses" role="tabpanel">
                    <h1 class="h6">Adresses enregistrées</h1>

                    {{-- Addresses --}}
                    <div class="row">
                        <div class="col d-flex align-content-center border-top py-2">
                            <div>
                                Aveneu du Châtelard 2, 1814 Montreux
                            </div>

                            <div class="ms-auto">
                                {{-- Edit --}}
                                <a href="{{-- TODO --}}" class="btn btn-sm btn-link" type="submit">Modifier</a>

                                {{-- Delete --}}
                                <form class="d-inline-block" method="POST" action="{{-- TODO --}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-link" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>