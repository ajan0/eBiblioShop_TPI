<x-app-layout :showCategories="true">
<h1 class="h3">Votre commande : 1 article(s)</h1>
<div class="row">
    {{-- Cart items --}}
    <div class="col-9">
        <div class="row border-bottom py-2 me-3">
            <div class="col-5">
                <span>Description</span>
            </div>
            <div class="col-2">
                <span>Quantité</span>
            </div>
            <div class="col-2">
                <span>Prix</span>
            </div>
            <div class="col-2">
                <span>Sous-total</span>
            </div>
        </div>
        
        <x-cart.item />
        <x-cart.item />
        <x-cart.item />
        <x-cart.item />
    </div>
    {{-- Cart summary --}}
    <div class="col-3">
        <x-cart.summary />
    </div>
</div>
</x-app-layout>