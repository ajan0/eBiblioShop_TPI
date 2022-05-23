<article class="row">
    {{-- Cover --}}
    <div class="col-2">
        <img class="book-cover" src="{{ asset('img/covers/1.jpg') }}" alt="{{ 'title' }}">
    </div>
    {{-- Details --}}
    <div class="col-7 ps-5 position-relative">
        <h1 class="h4 fw-normal mb-1">Les victimes oubliées du IIIe Reich</h1>
        <h2 class="h5 fw-normal">Benno Tuchschmid</h2>
        <h3 class="h6">Histoire</h3>

        {{-- More details --}}
        <div class="my-4">
            <div>Editeur : Lorem ipsum</div>
            <div>Parution : mai 2022</div>
            <div>Pages : 192</div>
            <div>Ajouté par : John Doe</div>
        </div>

        {{-- Pricing --}}
        <div class="d-flex flex-column align-items-end position-absolute end-0 bottom-0 me-2">
            <div class="my-2">
                <x-pricetag amount="29.50" class="fw-bold fs-2"/>
            </div>
            <div>
                <button class="btn btn-primary">Ajouter au panier d'achat</button>
            </div>
        </div>
    </div>
</article>