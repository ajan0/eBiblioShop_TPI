<x-app-layout :fullwidth="true">
    <div class="row justify-content-center my-5">
        <div class="col-6">
            <div class="d-flex">
                <div class="me-3">
                    <span class="material-icons md-48 text-warning">warning</span>
                </div>
                <div>
                    <h1 class="h2 mb-2">Commande annulée !</h1>
                    <p>Une erreur est survenu lors de traitement de votre paiement.</p>
                    
                    <div class="my-4">
                        <a href="{{ route('home') }}">Retourner à la page d'accueil</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>