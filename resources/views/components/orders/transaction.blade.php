<section class="row mb-4">
    <x-orders.item :order-item="$transaction" />
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <strong>Adresse de livraison :</strong>
            <x-address :address="$transaction->order->shippingAddress" />
        </div>
    </div>
</section>