<x-app-layout :showBreadcrumbs="true" :showCategories="true">
    <div class="row">
        <div class="col-9">
            <h1 class="h4 mb-1">Caisse</h1>
            <span class="fs-6 fw-500">{{ Cart::count() }} article(s)</span>
            @if(Cart::count() > 0)
                <div class="mb-4">
                
                    {{-- Table headers --}}
                    <div class="border-bottom py-2 me-3">
                        <div class="row">
                            <div class="col-5">
                                <span class="small">Description</span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="small">Quantité</span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="small">Prix</span>
                            </div>
                            <div class="col-2 text-center">
                                <span class="small">Sous-total</span>
                            </div>
                        </div>
                    </div>
                
                    {{-- Cart items --}}                    
                    @foreach (Cart::content() as $item)
                        <x-cart.item :book="$item->model" :item="$item" />            
                    @endforeach
                </div>

                
                @auth
                {{-- Address information --}}
                <h2 class="h4 mb-3">Livraison</h2>
                <span>Sélectionnez la façon dont vous souhaitez recevoir vos livres</span>

                <div class="accordion my-3" id="accordionExample">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <button class="accordion-button align-items-start" type="button" data-bs-toggle="collapse" data-bs-target="#expedition">
                                <div>
                                    <div class="fs-6 fw-bold">Expédition</div>
                                    <div class="text-muted small">Recevez vos livres à la maison ou au travail.</div>
                                </div>
                            </button>
                        </div>
                        <div id="expedition" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="pb-2 ps-3">
                                    <strong>Adresse de livraison</strong>
                                </div>
                                @forelse (Auth::user()->addresses as $address)
                                    <div class="d-flex ms-3 py-3 border-top">
                                        <div class="me-3">
                                            <input type="radio" name="shipping_address" data-id="{{ $address->id }}" class="form-check-input mt-1 me-1" style="width:16px;height:16px;" {{ $address->is_default ? 'checked' : null }}>
                                        </div>
                                        <div>
                                            <x-address id="availableAddress{{$address->id}}" :address="$address->address" :multiline="true" />
                                        </div>
                                    </div>
                                @empty
                                    <div class="ps-3">
                                        Vous n'avez enregistré aucune adresse de livraison pour l'instant. <a href="{{ route('addresses.create') }}">Cliquez ici</a> pour procéder à ajouter une adresse de livraison.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="py-3">
                    <h2 class="h6">Adresse de facturation</h2>
                    <div class="form-check py-2">
                        <input class="form-check-input" type="radio" checked>
                        <label class="form-check-label">Même que l'adresse de livraison</label>
                    </div>
                </div>
                @endauth
            @else
                <div class="my-2">
                    Le panier d'achat est vide pour l'instant.
                </div>
            @endif
        </div>
        {{-- Cart summary --}}
        <div class="col-3">
            <x-cart.summary />
        </div>
    </div>
    @push('scripts')
    <script>
        const addresses = document.querySelectorAll('input[name=shipping_address]')
        const shippingAddressInput = document.querySelector('input[name=shipping_address_id]')
        const selectedAddress = document.querySelector('#selectedAddress')

        if (addresses && shippingAddressInput && selectedAddress)
        {
            addresses.forEach(address => {
                address.onchange = (e) => {
                    shippingAddressInput.value = e.srcElement.dataset.id
                    selectedAddress.innerHTML = document.querySelector('#availableAddress' + e.srcElement.dataset.id).innerHTML
                }
            })
        }
    
    </script>
    @endpush
</x-app-layout>