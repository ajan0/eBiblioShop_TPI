<x-app-layout :showCategories="true" :showBreadcrumbs="true">
    <div class="row">
        <div class="col">
            @isset($query)
                <h1 class="h2 mb-3 fw-normal">Résultats pour <span class="fw-semibold">{{ $query }}<span></h1>
            @else
                <h1 class="h2 mb-3 fw-normal">{{ count($results) }} résultats trouvés</h1>
            @endisset
                    
            @forelse ($results as $result)
                <x-books.list-item :book="$result"/>
            @empty
                Aucun résultat trouvé.
            @endforelse
        </div>
    </div>
</x-app-layout>