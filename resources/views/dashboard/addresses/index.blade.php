<x-dashboard-layout>
    @section('addresses')
        <div class="row">
            <div class="col-10">
                <h1 class="h6">Adresses enregistrées</h1>
            </div>
            <div class="col-2 d-flex">
                <div class="ms-auto">
                    <a href="{{ route('addresses.create') }}" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center">
                        <span class="material-icons me-1">add</span>
                        <span>Ajouter</span>
                    </a>
                </div>
            </div>
        </div>
        @forelse (Auth::user()->addresses as $customerAddress)
        <div class="row">
            <div class="col-8">
                <div class="d-flex align-content-center py-2 border-top">
                    <div>
                        <x-address :address="$customerAddress->address" />
                    </div>
    
                    <div class="ms-auto">
                        {{-- Edit --}}
                        <a href="{{ route('addresses.edit', $customerAddress) }}" class="btn btn-sm btn-link" type="submit">Modifier</a>
    
                        {{-- Delete --}}
                        <form class="d-inline-block" method="POST" action="{{ route('addresses.destroy', $customerAddress) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-link" type="submit">Supprimer</button>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
        @empty
            <div class="row">
                <div class="col-8 py-2">
                    Vous n'avez enregistré aucune adresse pour l'instant. <a href="{{ route('addresses.create') }}">Créer une maintenant</a>.
                </div>
            </div>
        @endforelse
    @endsection
@push('scripts')
<script>
    new bootstrap.Tab(document.querySelector('#dashboardTabs button[data-bs-target="#addresses"]')).show()
</script>
@endpush
</x-dashboard-layout>