<article class="row">
    {{-- Cover --}}
    <div class="col-3">
        <img class="w-100" src="{{ asset('img/covers/1.jpg') }}" alt="{{ 'title' }}">
    </div>
    {{-- Details --}}
    <div class="col-6 position-relative">
        <h1 class="h4 fw-normal">Les victimes oubliées du IIIe Reich</h1>
        <h2 class="h5 fw-normal">Benno Tuchschmid</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus perspiciatis optio dolore velit enim voluptatum vero non obcaecati minus quia? Esse maiores ullam aperiam soluta nostrum consequatur modi sapiente recusandae.</p>
        <span class="position-absolute bottom-0 small text-muted">
            <span>EAN: 9782828920036</span><br>
            <span>192 pages, parution: mai 2022</span>
        </span>
    </div>
    {{-- Pricing --}}
    <div class="col-3 d-flex justify-content-end align-items-center">
        <div class="d-flex flex-column">
            <div class="my-2">
                <x-pricetag amount="29.50" class="fw-bold fs-2"/>
            </div>
            <div>
                <button class="btn btn-primary">Ajouter au panier d'achat</button>
            </div>
        </div>
    </div>
</article>