<div class="sticky-top pt-5">
    <div class="card">
        <div class="card-body p-3">
            <h1 class="h5 card-title">Caisse</h1>
            <h2 class="h6 card-subtitle mb-2 text-muted">{{ Cart::count() }} articles</h2>
            <p class="mb-2 small">Les livres physiques sont envoyés à votre adresse de livraison.</p>
    
            {{-- Address --}}
            
            @auth
                <div>
                    <h2 class="h6 mb-1">Livraison</h2>
                    @can('make-purchase')
                        <x-address id="selectedAddress" :address="Auth::user()->addresses->first()->address" :multiline="true" />
                    @else
                        <strong class="fw-500 small">Vous devez <a href="{{ route('dashboard.index') }}">enregistrer une adresse de livraison</a> avant de continuer la commande.</strong>
                    @endcan
                </div>
            @else
                <span class="small">Vous devez vous inscrire afin de pouvoir continuer l'achat.</span>
            @endauth
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex border-0 py-2 px-3">
                <span class="me-auto">Sous-total</span>
                <x-pricetag :amount="Cart::subtotal()" />
            </li>
            <li class="list-group-item d-flex py-2 px-3">
                <span class="me-auto small">TVA excl.</span>
                <x-pricetag :amount="Cart::tax()" :show-free-tag="false" />
            </li>
            <li class="list-group-item d-flex py-2 px-3">
                <span class="fw-bolder me-auto">Total</span>
                <x-pricetag :amount="Cart::total()" />
            </li>
        </ul>
        <div class="card-body">
            <form action="{{ route('payments.store') }}" method="post">
                @csrf
                @can('make-purchase')
                    <input type="hidden" name="shipping_address_id" value="{{ Auth::user()->addresses->first()->address->id }}">
                @endcan
                <button type="submit" class="btn btn-primary btn-sm w-100" @if(Auth::user()->cannot('make-purchase') || Cart::count() < 1) disabled @endif>Acheter maintenant</button>
            </form>
        </div>
    </div>
</div>
