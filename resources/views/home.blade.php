<x-app-layout :showCategories="true">
    <div class="row">
        {{-- Featured item --}}
        <section class="col mb-3">
            <h1 class="h3 py-3">Nos choix</h1>
            <x-books.card :book="$book_feautred" />
        </section>

    </div>
    <div class="row">
        {{-- Books for free --}}
        <section class="col my-3">
            <h1 class="h3 py-3">Assortiment gratuit</h1>
            <div class="d-flex">
                @forelse ($books_free as $book)
                    <x-books.cover :book="$book" class="me-4 shadow-lg" />
                @empty
                    Pas de livres à afficher pour l'instant.
                @endforelse
            </div>
        </section>

    </div>

    <div class="row">
        {{-- Most recent --}}
        <section class="col my-3">
            <h1 class="h3 py-3">Récemment ajoutés</h1>
            <div class="d-flex">
                @forelse ($books_recent as $book)
                    <x-books.cover :book="$book" class="me-4 shadow-lg" />
                @empty
                    Pas de livres à afficher pour l'instant.
                @endforelse
            </div>
        </section>

    </div>
</x-app-layout>