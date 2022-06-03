<section class="row mb-4">
    <div class="row">
        <div class="col">
            <h3 class="h5">Commande {{ $order->id }} du {{ $order->created_at->format('d.m.Y') }}</h3>
        </div>
    </div>
    <div class="row pb-2">
        <div class="col-4">
            <span>Statut de paiement : <span class="{{ $order->status === 'paid' ? 'text-success' : '' }}">{{ trans($order->status) }}</span></span>
        </div>
        <div class="col-auto">
            <span>Montant total : <x-pricetag :amount="$order->total / 100" class="fw-bold" /></span>            
        </div>
    </div>
    @foreach ($order->items as $orderItem)
        <x-orders.item :order-item="$orderItem" />
    @endforeach
</section>