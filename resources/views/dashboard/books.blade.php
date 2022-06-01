<x-dashboard-layout>
    <div class="row">
        <div class="col-6">
            <h1 class="h5 mb-4">Mes livres</h1>
            <p>Vous trouverez toutes les informations concernant vos livres dans l’aperçu du livre. Vous pouvez vous y informer du statut. Vous avez des questions? Alors rendez-vous sur notre page de contact.</p>     
        </div>
        {{-- List all books --}}
        <div class="row py-2 fw-bold">
            <div class="col-9">
                <div class="row">
                    <div class="col-5">Description</div>
                    <div class="col-2 text-center">Quantité</div>
                    <div class="col-2 text-center">Prix</div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-9">
                @foreach ($books as $book)
                    <x-books.item :book="$book" />                                   
                @endforeach
            </div>
        </div>
    </div>
</x-dashboard-layout>