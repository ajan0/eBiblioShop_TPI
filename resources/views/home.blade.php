<x-app-layout :show-categories="true">
    <div class="row">
        {{-- Nouveautés --}}
        <section class="col-7 mb-3">
            <h1 class="h3 py-3">Nouveautés</h1>
            <x-books.card />
        </section>

    </div>
    <div class="row">
        {{-- Selection --}}
        <section class="col-7 my-3">
            <h1 class="h3 py-3">Selection</h1>
            <div class="d-flex">
                <x-books.cover class="me-3" />
                <x-books.cover class="me-3" />
                <x-books.cover class="me-3" />
                <x-books.cover class="me-3" />
                <x-books.cover class="me-3" />
            </div>
        </section>

    </div>
</x-app-layout>