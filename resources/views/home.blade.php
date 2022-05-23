<x-app-layout :showCategories="true">
    <div class="row">
        {{-- Featured item --}}
        <section class="col mb-3">
            <h1 class="h3 py-3">Choix d'aujourd'hui</h1>
            <x-books.card />
        </section>

    </div>
    <div class="row">
        {{-- Books for free --}}
        <section class="col my-3">
            <h1 class="h3 py-3">Assortiment gratuit</h1>
            <div class="d-flex">
                <x-books.cover class="me-3 shadow-lg" />
                <x-books.cover class="me-3 shadow-lg" />
                <x-books.cover class="me-3 shadow-lg" />
                <x-books.cover class="me-3 shadow-lg" />
                <x-books.cover class="me-3 shadow-lg" />
            </div>
        </section>

    </div>

    <div class="row">
        {{-- Most recent --}}
        <section class="col my-3">
            <h1 class="h3 py-3">Récemment ajoutés</h1>
            <div class="d-flex">
                <x-books.cover class="me-3 shadow" />
                <x-books.cover class="me-3 shadow" />
                <x-books.cover class="me-3 shadow" />
                <x-books.cover class="me-3 shadow" />
                <x-books.cover class="me-3 shadow" />
            </div>
        </section>

    </div>
</x-app-layout>