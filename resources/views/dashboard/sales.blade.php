<x-dashboard-layout>
    <div class="row">
        <div class="col-6">
            <h1 class="h5 mb-4">Transactions</h1>
            <p>Vous trouverez toutes les informations concernant les livres vendus/troqués dans l’aperçu ci-dessous.</p>
        </div>
    </div>
    {{-- List all commandes --}}
    <div class="row my-3">
        <div class="col-9">
            @foreach ($transactions as $date => $items)
                <h3 class="h6">{{ $date }}</h3>
                @foreach ($items as $item)
                    <x-orders.transaction :transaction="$item" />                                
                @endforeach                
            @endforeach
        </div>
    </div>
</x-dashboard-layout>