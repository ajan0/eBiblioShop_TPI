<article class="row border-bottom py-3 me-3">
    {{-- Description --}}
    <div class="col-1">
        <img class="w-100" src="{{ asset('img/covers/1.jpg') }}" alt="{{-- TODO --}}">
    </div>
    <div class="col-4">
        <h1 class="h6 mb-1">Les victimes oubliées du IIIe Reich</h1>
        <div class="fs-6">Benno Tuchschmid</div>
        <div class="small text-muted pt-1">
            <p class="small m-0">
                EAN13: 9782828920036<br>
                192 pages
            </p>    
        </div>
    </div>
    {{-- Quantity + & - --}}
    <div class="col-2">
        <div class="d-flex justify-items-center">
            <form class="" action="{{-- TODO --}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ 1 }}">
                <input type="hidden" name="qty" value="{{ 1 }}">
                <input type="hidden" name="rowId" value="{{ 123 }}">
                <button class="btn btn-sm btn-outline-primary d-flex p-1" type="submit">
                    <span class="material-icons md-18">add</span>
                </button>                            
            </form>
            
            <input class="text-center mx-1" type="text" value="{{ 1 }}" style="width: 2rem;" disabled>
            
            <form class="" action="{{-- TODO --}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ 1 }}">
                <input type="hidden" name="qty" value="{{ 0 }}">
                <input type="hidden" name="rowId" value="{{ 123 }}">
                <button class="btn btn-sm btn-outline-primary d-flex p-1" type="submit">
                    <span class="material-icons md-18">remove</span>
                </button>                             
            </form>
        </div>
    </div>
    {{-- Price --}}
    <div class="col-2">
        CHF 30.-
    </div>
    {{-- Subtotal --}}
    <div class="col-2">
        CHF 30.-
    </div>
    {{-- Delete --}}
    <div class="col-1">
        <form action="{{-- TODO --}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="rowId" value="{{ 1 }}">
            <button type="submit" class="btn btn-sm btn-danger d-flex p-1">
                <span class="material-icons md-18">delete</span>
            </button>
        </form>
    </div>
</article>