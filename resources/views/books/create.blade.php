<x-app-layout :showBreadcrumbs="true">
    <div class="row">
        <div class="col-8 mb-2 mt-3">
            <h1 class="h2">Ajouter un livre</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <x-books.form  />
        </div>
        @if (session()->has('searchedBook'))
            <div class="col-3">
                <div class="pt-5 ps-2">
                    <h6 class="">Nouvelle recherche</h6>
                    <p class="small mb-1">Vous pouvez abondonner votre ajout automatique actuel et faire une nouvelle recherche en cliquant sur le bouton ci-dessous.</p>
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('books.destroySaved') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Abondonner</button>
                        </form>
                    </div>                    
                </div>
                
            </div>            
        @endif
    </div>
</x-app-layout>