<x-app-layout :fullwidth="true">
    <div class="row justify-content-center my-5">
        <div class="col-6">
            <div class="d-flex">
                <div class="me-3">
                    <span class="material-icons md-48 text-success">verified</span>
                </div>
                <div>
                    <h1 class="h2 mb-2">Merci pour votre commande !</h1>
                    <h2 class="h4 fw-normal mb-3">N° de votre commande : {{ $order->id }}</h2>
                    <p>Vous recevrez un message de confirmation à votre adresse e-mail <strong>{{ auth()->user()->email }}</strong></p>
                    <p>Les livres vous seront livrés dans le meilleur délai à votre adresse de livraison suivante :</p>
                    
                    <x-address :address="$order->shippingAddress->address" :multiline="true" class="d-block fst-italic" />

                    <div class="my-4">
                        <a href="{{ route('home') }}">Retourner à la page d'accueil</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>