<x-dashboard-layout>
    @section('addresses')
        <div class="row">
            <div class="col">
                <h1 class="h6">Adresses enregistrées</h1>
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
                    Vous n'avez enregistré aucune adresse pour l'instant.
                </div>
            </div>
        @endforelse
    @endsection
</x-dashboard-layout>