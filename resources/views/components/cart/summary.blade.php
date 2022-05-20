<div class="card">
    <div class="card-body">
        <h1 class="h5 card-title">Caisse</h1>
        <h2 class="h6 card-subtitle mb-2 text-muted">{{ 0 }} articles</h2>
        <p class="mb-2">Les livres physiques sont envoyés à votre adresse de livraison.</p>

        {{-- Address --}}
        <div>
            <h2 class="h6 mb-1">Livraison</h2>
        </div>
        @auth
            
        @else
            <span class="small">Vous devez vous inscrire afin de pouvoir continuer l'achat.</span>
        @endauth
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex border-0 pb-0">
            <span class="me-auto">Sous-total</span>
            <span class="">CHF 30.-</span>
        </li>
        <li class="list-group-item d-flex">
            <span class="me-auto small">TVA incl.</span>
            <span class="small">CHF 30.-</span>
        </li>
        <li class="list-group-item d-flex">
            <span class="fw-bolder me-auto">Total</span>
            <span class="">CHF 30.-</span>
        </li>
    </ul>
    <div class="card-body">
        <a href="#" class="btn btn-primary btn-sm w-100">Acheter maintenant</a>
    </div>
</div>
