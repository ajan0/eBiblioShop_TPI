@extends('templates.main')

@section('content')
<div class="container">
    <div class="row">
        {{-- Categories --}}
        <aside class="col-2">
            <x-categories-list />
        </aside>
        
        {{-- Nouveautés --}}
        <section class="col-7 ps-4 mb-3">
            <h1 class="h3 py-3">Nouveautés</h1>
            <x-books.card />
        </section>

    </div>
    <div class="row">
        {{-- Spacer --}}
        <div class="col-2"></div>

        {{-- Selection --}}
        <section class="col-7 ps-4 my-3">
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

</div>
@endsection