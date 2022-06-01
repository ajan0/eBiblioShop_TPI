<x-dashboard-layout>
    <div class="row">
        <div class="col-6">
            <h1 class="h5 mb-4">Commandes</h1>
            <p>Vous trouverez toutes les informations concernant vos commandes dans l’aperçu de la commande. Vous pouvez vous y informer du statut ou y modifier les commandes. Vous avez des questions? Alors rendez-vous sur notre page de contact.</p>
        </div>
    </div>
    {{-- List all commandes --}}
    <div class="row my-3">
        <div class="col-9">
            @foreach (Auth::user()->orders as $order)
                <x-orders.overview :order="$order" />                                
            @endforeach
        </div>
    </div>
</x-dashboard-layout>