<x-app-layout :showBreadcrumbs="true">
    <div class="row">
        <div class="col-9">
            <h1 class="h3 pt-3">Ajouter un livre</h1>
            <h2 class='h4 pt-3 fw-normal'>Recherche ISBN</h2>
            <div class="row mb-3">
                <div class="col-6">
                    <p>Nous pouvons vous faciliter la démarche de l'ajout des informations de votre livre. Si vous avez le numéro ISBN de votre livre, indiquez-le pour qu'on puisse automatiquement remplir toutes les informations nécessaires par rapport au livre.</p>                    
                    <form action="{{ route('books.store.step1') }}" method="post">
                        @csrf
                        <x-inputs.field name="isbn" type="number" maxlength="13" placeholder="Ex: 9782828920036" />
                        <button type="submit" class="btn btn-primary my-2 w-100">Suivant</button>
                    </form>
                </div>
                <div class="col-6">
                    <img class="d-flex ms-auto" src="{{ asset('img/isbn-location.png') }}" alt="ISBN Location">
                </div>
            </div>

            <h3 class='h5 pt-3 fw-normal'>Vous n'avez pas de numéro ISBN ?</h3>
            <p>Aucun problème ! Vous pouvez aller directement sur la page de création d'un livre et saisir manuellement les informations nécessaires. Pour aller à la page de création, cliquer <a href="{{ route('books.create') }}?manual">ici</a>.</p>
        </div>
    </div>
</x-app-layout>