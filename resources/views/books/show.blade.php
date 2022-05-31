<x-app-layout :showCategories="true" :showBreadcrumbs="true">

    <h1 class="h2 mb-4">Aperçu du livre</h1>

    {{-- Book information --}}
    <div class="row">
        <div class="col">
            <x-books.overview :book="$book" />
        </div>
    </div>

    {{-- Description of book/author --}}
    <div class="row mt-5">
        <div class="col-9">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#summary">Résumé</a>
                </li>
                @if ($book->description_author)
                    <li class="nav-item">
                        <a class="nav-link" href="#author">Auteur</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="summary" role="tabpanel">
                    <div class="border border-top-0 p-3">
                        {{ $book->description }}
                    </div>                    
                </div>
                @if ($book->description_author)
                    <div class="tab-pane fade" id="author" role="tabpanel">
                        <div class="border border-top-0 p-3">
                            {{ $book->description_author }}
                        </div>                    
                    </div>                    
                @endif
            </div>
        </div>
    </div>
</x-app-layout>